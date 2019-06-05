<?php

class Import extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->model("DBAPI", "dbapi", TRUE);
		$this->load->model("SAIDBAPI", "api", TRUE);
		$this->header_data['site_title'] = $this->header_data['title'];
		$_loggedUser = !empty($_SESSION['USER_ID']) ? $_SESSION['USER_ID'] : '';
		$_loggedUserRole = !empty($_SESSION['ROLE']) ? $_SESSION['ROLE'] : '';
		$this->header_data['user_data'] = $this->dbapi->getUserById($_loggedUser);
		$cart_items = $this->dbapi->searchCartItems(['created_by' => $_loggedUser], ['role' => $_loggedUserRole]);
		$this->header_data['cart_items'] = $cart_items;
	}

	/***** PRODUCT SECTION *******/
	/**
	 * @description: Export sample product CSV file
	 * @author : Dhiraj Gangal
	 * @email : dhiraj.gangal@gmail.com
	 * @date : 29-Jan-2019
	 */
	public function products_sample_csv() {
		$csv_header = get_product_csv_header();
		header('Content-Type: text/csv; charset=utf-8');
		header('Content-Disposition: attachment; filename=product-sample.csv');
		$output = fopen('php://output', 'w');
		fputcsv($output, $csv_header);
	}

	/**
	 * @description: Export all product data in CSV file from database
	 * @author : Dhiraj Gangal
	 * @email : dhiraj.gangal@gmail.com
	 * @date : 29-Jan-2019
	 */
	public function export_products() {
		$filename = "Products-" . date('d-m-Y').".csv";
		$this->load->model("product");
		$result = $this->product->get_all_model_product();
		$delimiter = ",";
		$fields = get_product_csv_header();
		$f = fopen('php://memory', 'w');
		fputcsv($f, $fields, $delimiter);
		foreach ($result as $key => $row) {
			$datasheet_path = (!empty($row['datasheet_path']) ? $row['datasheet_path'] : '#');
			$sub_product_url = !empty($row['sub_product_image']) ? $row['sub_product_image'] : '#';
			$product_url = !empty($row['product_image']) ? $row['product_image'] : '#';
			$schema_insert = array(
				$row['main_product_name'], $row['sub_product_name'], $row['product_name'],
				$row['mfr_no'], $product_url, $sub_product_url, $datasheet_path, $row['hsn_code'] ,$row['hsn_description'], $row['gst'],$row['mrp_price'],$row['discount'] , $row['price_range'], $row['dealer_price'], $row['has_mac_id'],$row['description_1'],$row['status']
			);
			fputcsv($f, $schema_insert, $delimiter);
		}

		 //move back to beginning of file
		 fseek($f, 0);
		 //set headers to download file rather than displayed
		 header('Content-Type: text/csv');
		 header('Content-Disposition: attachment; filename="' . $filename . '";');
		 //output all remaining data on a file pointer
		 fpassthru($f);
	}

	/**
	 * @Description : Load import product view
	 * @author : Dhiraj Gangal
	 * @email : dhiraj.gangal@gmail.com
	 * @date : 29-Jan-2019
	 */
	public function import_products() {
		$data = array();
		$this->header_data['title'] = 'Import Products'; 
		$this->_admin('child-sub-products/import');
	}

	/**
	 * @Description : Import product data into database using csv file
	 * @author : Dhiraj Gangal
	 * @email : dhiraj.gangal@gmail.com
	 * @date : 29-Jan-2019
	 * @param file
	 */
	public function import_products_ajax() {

		$response = array('status' => 'error', 'message' => 'Bad Request !');
		try {

			if (!$this->input->is_ajax_request()) {
				throw new Exception("Error Processing Request", 1);
			}
			if (!isset($_FILES['import_csv'])) {
				throw new Exception("Products file required to upload.", 1);
			}

			if ($_FILES['import_csv']['error'] > 0) {
				throw new Exception("FIle uploading error. Please try again.", 1);
			}
			$allowed_types = array('text/csv', 'application/vnd.ms-excel');

			if (!in_array($_FILES['import_csv']['type'], $allowed_types)) {
				throw new Exception("Please upload only CSV file.", 1);
			}

			try {
				$res = $this->save_csv_product();
			} catch (Exception $ex) {
				throw new Exception($ex->getMessage());
			}

			$response = array('status' => 'success', 'message' => $res);

		} catch (Exception $e) {
			$response = array('status' => 'error', 'message' => $e->getMessage());
		} finally {
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		}
	}

	/**
	 * @description : Save CSV file data into database
	 * @author : Dhiraj Gangal
	 * @email : dhiraj.gangal@gmail.com
	 * @date : 29-Jan-2019
	 * @param array of file data
	 */
	private function save_csv_product() {
		$upload_path = FCPATH . '/data/tmp/';
		if (!is_dir($upload_path)) {
			mkdir($upload_path, 0777, true);
		}

		$config = array();
		$filename = uniqid();
		$upload_file_name = "import_csv";
		$config['file_name'] = $filename;
		$config['upload_path'] = $upload_path;
		$config['allowed_types'] = 'csv';

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if ($this->upload->do_upload($upload_file_name)) {
			$file_data = $this->upload->data();

			$inputFileName = $file_data['full_path'];

			$insert_row = $update_row = $total_row = $error = 0;
			$file = fopen($inputFileName, "r");
			$done = TRUE;
			$error_array = array();
			$this->load->model("product");

			$firt_row = true;
			while (!feof($file)) {
				$row = fgetcsv($file);
				$parent_product_name = trim($row[0]);
				if ($firt_row && strtolower($parent_product_name) == 'main product name') {
					$firt_row = false;
					continue;
				}

				$child_product_name = trim($row[1]);
				$product_name = trim($row[2]);
				if (empty($parent_product_name) || empty($child_product_name) || empty($product_name)) {
					//$error++;
					continue;
				}

				$model_product = $this->product->is_exits_model_product($product_name, $child_product_name, $parent_product_name);


				$row_data = array(
					'product_name' => $product_name,
					'product_url' => "#",
					'product_logo' => (isset($row[5]) && !empty($row[5]) ? trim($row[5]) : ''),
					'is_active' => '1',
				);

				if (empty($model_product)) {
					$exists_row = $this->master_model->select_data_row(['product_id'], 'tbl_products', ['product_name' => $parent_product_name]);
					if (empty($exists_row)) {
						$parent_id = $this->dbapi->addProduct(['product_name' => $parent_product_name, 'is_active' => '1']);
					} else {
						$parent_id = $exists_row['product_id'];
					}

					$exists_row = $this->master_model->select_data_row(['product_id'], 'tbl_products', ['product_name' => $child_product_name,'parent_id' => $parent_id]);

					if (empty($exists_row)) {
						$sub_product_id = $this->dbapi->addProduct(['product_name' => $child_product_name, 'parent_id' => $parent_id, 'is_active' => '1', 'product_logo' => (isset($row[4]) && !empty($row[4]) ? trim($row[4]) : '')]);

					} else {
						$sub_product_id = $exists_row['product_id'];
					}
					$row_data['parent_id'] = $sub_product_id;
					$product_id = $this->dbapi->addProduct($row_data);
					$insert_row++;
					$total_row++; // print_r($row);exit;

				} else {
					$product_id  = $model_product['model_id'];
					$row_data['parent_id'] = $model_product['sub_product_id'];
					$this->dbapi->updateProduct($row_data, $model_product['model_id']);
					$update_row++;
					$total_row++; 
				}
				
				if ($product_id) {
					if (is_numeric(trim($row[14])) && $row[14] <= 1 && $row[14] >= 0) {
						$mac_id = trim($row[14]);
					} else {
						if (strtolower(trim($row[14])) == 'yes') {
							$mac_id = 1;
						} else {
							$mac_id = 0;
						}
					}
					$pdata['product_id'] = $product_id;
					$pdata['mfr_no'] = (isset($row[3]) && !empty($row[3]) ? trim($row[3]) : '');
					$pdata['datasheet'] = (isset($row[6]) && !empty($row[6]) ? trim($row[6]) : '');
					$pdata['hsn_code'] = (isset($row[7]) && !empty($row[7]) ? trim($row[7]) : '');
					$pdata['hsn_description'] = (isset($row[8]) && !empty($row[8]) ? trim($row[8]) : '');
					$pdata['gst'] = (isset($row[9]) && !empty($row[9]) ? trim($row[9]) : '');
					$pdata['mrp_price'] = (isset($row[10]) && !empty($row[10]) ? trim($row[10]) : '');
					$pdata['discount'] = (isset($row[11]) && !empty($row[11]) ? trim($row[11]) : '');
					$pdata['has_mac_id'] = $mac_id;
					$pdata['description_1'] = (isset($row[15]) && !empty($row[15]) ? trim($row[15]) : '');
					$is_active = "0";
					if (isset($row[16])) {
						if($row[16] == '1') {
							$is_active = '1';
						} else {
							if (strtolower($row[16]) == 'public') {
								$is_active = '1';
							}
						}
					}
					$pdata['is_active'] = $is_active;
					/**** if old record exits then remove it ***/
					$this->dbapi->delChildProductInfoByProductId($product_id);
					$this->dbapi->addChildProductInfo($pdata);
					/*** remove old price range first ****/
					$this->master_model->delete_data('tbl_ranges', ['product_id' => $product_id]);
					$value_range = explode(',', $row[12]);
					$dealer_price = explode(',', $row[13]);
					for ($i = 0; $i < count($value_range); $i++) {
						$rinfo['product_id'] = $product_id;
						$rinfo['value_range'] = (isset($value_range[$i]) && !empty($value_range[$i]) ? trim($value_range[$i]) : '0-0');
						$rinfo['dealer_price'] = (isset($dealer_price[$i]) && !empty($dealer_price[$i]) ? trim($dealer_price[$i]) : '0-0');
						$this->dbapi->addRangeInfo($rinfo);
					}

				} else {
					$error++;
				}
			}
			fclose($file);
			unlink($upload_path.$filename.'.csv');
			if ($done == true) {
				return "<span class='text-primary'>Total Products : <b>" . ($total_row) . "</b></span> <br/>
                <span class='text-success'>Inserted : <b>" . ($insert_row) . "</b>  </span>
                <br/><span class='text-warning'> Updated : <b>" . $update_row . "</b> </span><br><span class='text-danger'> Notice : <b>" . $error . "</b></span>";

			} else {
				new Exception("Error : Column and value not match in <b> " . ($insert_row) . " </b> row.<br> Please check and upload again.", 1);
			}
		} else {
			new Exception($this->upload->display_errors('<span>', '</span>'));
		}
	}
	/**** END PRODUCT SECTION ****/

	/**** START DEALER SECTION ****/
	/**
	 * @Description : Export all dealer data using csv file
	 * @author : Dhiraj Gangal
	 * @email : dhiraj.gangal@gmail.com
	 * @date : 06-Jun-2019
	 */
	public function export_dealers() {
		$filename = "Dealers-" . date('d-m-Y').".csv";
		$this->load->model("product");
		$result = $this->dbapi->searchUsers(["role" => "DEALER"]);
		$delimiter = ",";
		$fields = get_dealer_csv_header();
		$f = fopen('php://memory', 'w');
		fputcsv($f, $fields, $delimiter);
		foreach ($result as $key => $row) {
			$schema_insert = array(
				$row['member_id'], $row['user_name'], $row['first_name'] . ' ' . $row['last_name'], $row['email'], $row['company_name'], $row['gstin'], $row['address'], $row['city'], $row['state'], $row['postal_code'], $row['phone_no'], $row['country_code'], $row['role']
			);
			fputcsv($f, $schema_insert, $delimiter);
		}

		 //move back to beginning of file
		 fseek($f, 0);
		 //set headers to download file rather than displayed
		 header('Content-Type: text/csv');
		 header('Content-Disposition: attachment; filename="' . $filename . '";');
		 //output all remaining data on a file pointer
		 fpassthru($f);
	}

	public function import_dealers() {
		$data = array();
		$this->header_data['title'] = 'Import Dealers';
		if (!empty($_POST['import'])) {
			$file_name = date("YmdHis");
			$upload_path = FCPATH . '/data/tmp/';
			if (!file_exists($upload_path) || !is_dir($upload_path)) {
				mkdir($upload_path);
			}
			$file_info = pathinfo($_FILES['import_csv']['name']);
			$csv_file_path = $upload_path . $file_name . "." . $file_info['extension'];
			@move_uploaded_file($_FILES["import_csv"]["tmp_name"], $csv_file_path);
			$csv_file = fopen($csv_file_path, "r");
			fgetcsv($csv_file);
			while (!feof($csv_file)) {
				$row = fgetcsv($csv_file);
				if (!empty($row[1])) {
					$pData = [];
					$pData['user_name'] = !empty($row[0]) ? $row[0] : "";
					$pData['first_name'] = !empty($row[1]) ? $row[1] : "";
					$pData['last_name'] = !empty($row[2]) ? $row[2] : "";
					$email = !empty($row[3]) ? $row[3] : "";
					$pData['email'] = $email;
					$pData['company_name'] = !empty($row[4]) ? $row[4] : "";
					$pData['gstin'] = !empty($row[5]) ? $row[5] : "";
					$pData['address'] = !empty($row[6]) ? $row[6] : "";
					$pData['city'] = !empty($row[7]) ? $row[7] : "";
					$pData['state'] = !empty($row[8]) ? $row[8] : "";
					$pData['postal_code'] = !empty($row[9]) ? $row[9] : "";
					$pData['phone_no'] = !empty($row[10]) ? $row[10] : "";
					$pData['country_code'] = !empty($row[11]) ? $row[11] : "";
					$pData['profile_logo'] = !empty($row[12]) ? $row[12] : "";
					$pData['role'] = !empty($row[13]) ? $row[13] : "";
					$pData['created_by'] = !empty($row[14]) ? $row[14] : "";
					$pData['is_active'] = !empty($row[15]) ? $row[15] : "";
					if (!$this->dbapi->checkMemberExists($email)) {
						$this->dbapi->addUser($pData);
					} else {
						$error = "";
						$error .= "Failed to import data because of following reasons";
						$error .= "<div class='container'><ul><li>1.Field  already exists  !</li>";
						$error .= "<li>2.CSV data mismatched or something wrong data it had</li></ul></div>";
						$_SESSION['error'] = $error;
					}
				}
			}
			fclose($csv_file);
			unlink($csv_file_path);
			$_SESSION['message'] = 'Dealers Imported Successfully';
			redirect(base_url() . 'admin/dealers');
		}
		$this->_admin('dealers/import');
	}

	/**
	 * @description: Export sample dealer CSV file
	 * @author : Dhiraj Gangal
	 * @email : dhiraj.gangal@gmail.com
	 * @date : 05-Jun-2019
	 */
	public function dealers_sample_csv() {
		$csv_header = get_dealer_csv_header();
		header('Content-Type: text/csv; charset=utf-8');
		header('Content-Disposition: attachment; filename=Dealer-Sample.csv');
		$output = fopen('php://output', 'w');
		fputcsv($output, $csv_header);
	}
	/**** END DEALER SECTION ****/

	/*CLIENTS*/
	function import_clients() {
		$data = array();
		$this->header_data['title'] = 'Import Clients';
		if (!empty($_POST['import'])) {
			$file_name = date("YmdHis");
			$upload_path = FCPATH . '/data/tmp/';
			if (!file_exists($upload_path) || !is_dir($upload_path)) {
				mkdir($upload_path);
			}
			$file_info = pathinfo($_FILES['import_csv']['name']);
			$csv_file_path = $upload_path . $file_name . "." . $file_info['extension'];
			@move_uploaded_file($_FILES["import_csv"]["tmp_name"], $csv_file_path);
			$csv_file = fopen($csv_file_path, "r");
			fgetcsv($csv_file);
			while (!feof($csv_file)) {
				$row = fgetcsv($csv_file);
				if (!empty($row[1])) {
					$pData = [];
					$client_name = !empty($row[0]) ? $row[0] : "";
					$pData['client_name'] = $client_name;
					$alt_name = !empty($row[1]) ? $row[1] : "";
					$alt_name = slugify($pData['client_name']);

					$pData['alt_name'] = $alt_name;
					$pData['is_active'] = !empty($row[2]) ? $row[2] : "";
					if (!$this->dbapi->checkClientExists($client_name)) {
						$this->dbapi->addClient($pData);
					} else {
						$error = "";
						$error .= "Failed to import data because of following reasons";
						$error .= "<div class='container'><ul><li>Field  already exists  !</li>";
						$error .= "<li>CSV data mismatched or something wrong data it had</li></ul></div>";
						$_SESSION['error'] = $error;
					}
				}
			}
			fclose($csv_file);
			unlink($csv_file_path);
			$_SESSION['message'] = 'Clients Imported Successfully';
			redirect(base_url() . 'admin/clients');
		}
		$this->_admin('clients/import');
	}

	function clients_sample_csv() {
		$csv_data = array();
		$csv_header = array("CLIENT NAME");
		header('Content-Type: text/csv; charset=utf-8');
		header('Content-Disposition: attachment; filename=sample.csv');
		$output = fopen('php://output', 'w');
		fputcsv($output, $csv_header);
		foreach ($csv_data as $csv_row) {
			fputcsv($output, $csv_row);
		}
	}

	function export_clients() {
		$filename = "Clients-" . date('d-m-Y h:m:i');
		header("Cache-Control: max-age=0");
		header("Content-Disposition: attachment; filename=$filename.xls"); //File name extension was wrong
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Cache-Control: private", false);
		$dealers = $this->dbapi->searchClients();
		$sep = "\t";
		$fields = ["S.NO", "CLIENT NAME", "CREATED ON"];
		foreach ($fields as $field) {
			echo $field . "\t";
		}
		print("\n");
		foreach ($dealers as $row) {
			$schema_insert = "";
			$j = 0;
			foreach ($fields as $field) {
				if ($j == 0) {
					$schema_insert .= $row['client_id'] . $sep;
					$schema_insert .= $row['client_name'] . $sep;
					$schema_insert .= $row['created_on'] . $sep;

				}
				$j++;
			}
			$schema_insert = str_replace($sep . "$", "", $schema_insert);
			$schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
			$schema_insert .= "\t";
			print(trim($schema_insert));
			print "\n";
		}
	}

	/*CUSTOMERS*/
	function export_customers() {
		$filename = "Customers-" . date('d-m-Y h:m:i');
		header("Cache-Control: max-age=0");
		header("Content-Disposition: attachment; filename=$filename.xls"); //File name extension was wrong
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Cache-Control: private", false);
		$dealers = $this->dbapi->searchNewUsers();
		$sep = "\t";
		$fields = ["S.NO", "ACCOUNT NAME", "INSTALLATION TYPE", "PROJECT TYPE", "DATE INSTALLED", "SUBSCRIPTION END DATE", "DEALER ID", "MAC ID", "COMPANY NAME", "FIRST NAME", "LAST NAME", "EMAIL", "PHONE NO", "ADDRESS", "CITY", "STATE ", "POSTAL CODE", "COUNTRY CODE", "ZONE ID", "IS ACTIVE", "CREATED ON"];
		foreach ($fields as $field) {
			echo $field . "\t";
		}
		print("\n");
		foreach ($dealers as $row) {
			$schema_insert = "";
			$j = 0;
			foreach ($fields as $field) {
				if ($j == 0) {
					$schema_insert .= $row['user_id'] . $sep;
					$schema_insert .= $row['account_name'] . $sep;
					$schema_insert .= $row['installation_type'] . $sep;
					$schema_insert .= $row['project_type'] . $sep;
					$schema_insert .= $row['date_installed'] . $sep;
					$schema_insert .= $row['subscr_end_date'] . $sep;
					$schema_insert .= $row['dealer_id'] . $sep;
					$schema_insert .= $row['mac_id'] . $sep;
					$schema_insert .= $row['company_name'] . $sep;
					$schema_insert .= $row['first_name'] . $sep;
					$schema_insert .= $row['last_name'] . $sep;
					$schema_insert .= $row['email'] . $sep;
					$schema_insert .= $row['phone_no'] . $sep;
					$schema_insert .= $row['address'] . $sep;
					$schema_insert .= $row['city'] . $sep;
					$schema_insert .= $row['state'] . $sep;
					$schema_insert .= $row['postal_code'] . $sep;
					$schema_insert .= $row['country_code'] . $sep;
					$schema_insert .= $row['zone_id'] . $sep;
					$schema_insert .= $row['is_active'] . $sep;
					$schema_insert .= $row['created_on'] . $sep;

				}
				$j++;
			}
			$schema_insert = str_replace($sep . "$", "", $schema_insert);
			$schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
			$schema_insert .= "\t";
			print(trim($schema_insert));
			print "\n";
		}
	}

	function import_customers() {
		$data = array();
		$this->header_data['title'] = 'Import Customers';
		if (!empty($_POST['import'])) {
			$file_name = date("YmdHis");
			$upload_path = FCPATH . '/data/tmp/';
			if (!file_exists($upload_path) || !is_dir($upload_path)) {
				mkdir($upload_path);
			}
			$file_info = pathinfo($_FILES['import_csv']['name']);
			$csv_file_path = $upload_path . $file_name . "." . $file_info['extension'];
			@move_uploaded_file($_FILES["import_csv"]["tmp_name"], $csv_file_path);
			$csv_file = fopen($csv_file_path, "r");
			fgetcsv($csv_file);
			while (!feof($csv_file)) {
				$row = fgetcsv($csv_file);
				if (!empty($row[1])) {
					$pData = [];
					$pData['account_name'] = !empty($row[0]) ? $row[0] : "";
					$pData['installation_type'] = !empty($row[1]) ? $row[1] : "";
					$pData['project_type'] = !empty($row[2]) ? $row[2] : "";
					$pData['date_installed'] = !empty($row[3]) ? $row[3] : "";
					$pData['subscr_end_date'] = !empty($row[4]) ? $row[4] : "";
					$pData['dealer_id'] = !empty($row[5]) ? $row[5] : "";
					$pData['mac_id'] = !empty($row[6]) ? $row[6] : "";
					$pData['company_name'] = !empty($row[7]) ? $row[7] : "";
					$pData['first_name'] = !empty($row[8]) ? $row[8] : "";
					$pData['last_name'] = !empty($row[9]) ? $row[9] : "";
					$email = !empty($row[10]) ? $row[10] : "";
					$pData['email'] = $email;
					$pData['phone_no'] = !empty($row[11]) ? $row[11] : "";
					$pData['address'] = !empty($row[12]) ? $row[12] : "";
					$pData['city'] = !empty($row[13]) ? $row[13] : "";
					$pData['state'] = !empty($row[14]) ? $row[14] : "";
					$pData['postal_code'] = !empty($row[15]) ? $row[15] : "";
					$pData['country_code'] = !empty($row[16]) ? $row[16] : "";
					$pData['zone_id'] = !empty($row[17]) ? $row[17] : "";
					$pData['is_active'] = !empty($row[18]) ? $row[18] : "";
					//  $pData['created_on'] = !empty($row[19]) ? $row[19] : "";
					if (!$this->dbapi->checkCustomerExists($email)) {
						$this->dbapi->addNewUser($pData);
					} else {
						$error = "";
						$error .= "Failed to import data because of following reasons";
						$error .= "<div class='container'><ul><li>1.Field  already exists  !</li>";
						$error .= "<li>2.CSV data mismatched or something wrong data it had</li></ul></div>";
						$_SESSION['error'] = $error;
					}
				}
			}
			fclose($csv_file);
			unlink($csv_file_path);
			$_SESSION['message'] = 'Customers Imported Successfully';
			redirect(base_url() . 'admin/customers');
		}
		$this->_admin('customers/import');
	}

	function customers_sample_csv() {
		$csv_data = array();
		$csv_header = array("ACCOUNT NAME", "INSTALLATION TYPE", "PROJECT TYPE", "DATE INSTALLED", "SUBSCRIPTION END DATE", "DEALER ID", "MAC ID", "COMPANY NAME", "FIRST NAME", "LAST NAME", "EMAIL", "PHONE NO", "ADDRESS", "CITY", "STATE ", "POSTAL CODE", "COUNTRY CODE", "ZONE ID", "IS ACTIVE");
		header('Content-Type: text/csv; charset=utf-8');
		header('Content-Disposition: attachment; filename=sample.csv');
		$output = fopen('php://output', 'w');
		fputcsv($output, $csv_header);
		foreach ($csv_data as $csv_row) {
			fputcsv($output, $csv_row);
		}
	}

	
}
