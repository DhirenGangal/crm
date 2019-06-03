<?php

class Admin extends MY_Controller {
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

	public function index() {
		if (!empty($_POST['LOGIN']) && !empty($_POST['email']) && !empty($_POST['password'])) {
			$user = $this->dbapi->userLogin($_POST['email'], $_POST['password']);
			if (!empty($user['member_id'])) {
				$_SESSION = array();
				$_SESSION['USER_ID'] = $user['member_id'];
				$_SESSION['USER_NAME'] = $user['user_name'];
				$_SESSION['USER_EMAIL'] = $user['email'];
				$_SESSION['IMG'] = $user['profile_logo'];
				$_SESSION['ROLE'] = $user['role'];
				redirect(base_url() . "admin/dashboard/");
			} else if (!empty($user['is_active']) && $user['is_active'] != "1") {
				$_SESSION['error'] = "Your account is not active.";
			} else {
				$_SESSION['error'] = "Invalid Email/Password.";
			}
		} /* else {
	            $_SESSION['error'] = "Invalid Email/Password.";
*/
		$data['user'] = $_POST;
		if (!empty($_SESSION['USER_ID'])) {
			redirect(base_url() . 'admin/dashboard/');
		}
		$data['title'] = $this->header_data['title'];
		$this->load->view("admin/login", $data);
	}

	public function check_email() {
		$email = $this->_REQ['email'];
		if ($this->dbapi->checkEmailExists($email)) {
			echo "false";
			exit;
		}
		echo "true";
		exit;
	}

	public function check_email_exists() {
		$email = $this->_REQ['email'];
		if ($this->dbapi->checkDealerEmailExists($email)) {
			echo "false";
			exit;
		}
		echo "true";
		exit;
	}

	public function check_product_exists() {
		$product_name = $this->_REQ['product_name'];
		if ($this->dbapi->checkProductExists($product_name)) {
			echo "false";
			exit;
		}
		echo "true";
		exit;
	}

	public function check_order_no_exists() {
		$order_no = $this->_REQ['order_no'];
		if ($this->dbapi->checkOrderNoExists($order_no)) {
			echo "false";
			exit;
		}
		echo "true";
		exit;
	}

	public function register() {
		$data = array();
		$this->header_data['title'] .= " | Resistration Page ";
		if (!empty($_POST['email'])) {
			$data['account_name'] = !empty($_POST['account_name']) ? trim($_POST['account_name']) : '';
			$data['installation_type'] = !empty($_POST['installation_type']) ? trim($_POST['installation_type']) : '';
			$data['project_type'] = !empty($_POST['project_type']) ? trim($_POST['project_type']) : '';
			$data['date_installed'] = !empty($_POST['date_installed']) ? trim($_POST['date_installed']) : '';
			$data['dealer_id'] = !empty($_POST['dealer_id']) ? trim($_POST['dealer_id']) : '';
			$data['mac_id'] = !empty($_POST['mac_id']) ? trim($_POST['mac_id']) : '';
			$data['company_name'] = !empty($_POST['company_name']) ? trim($_POST['company_name']) : '';
			$data['first_name'] = !empty($_POST['first_name']) ? trim($_POST['first_name']) : '';
			$data['last_name'] = !empty($_POST['last_name']) ? trim($_POST['last_name']) : '';
			$data['email'] = !empty($_POST['email']) ? trim($_POST['email']) : '';
			$data['password'] = !empty($_POST['password']) ? trim($_POST['password']) : '';
			$data['confirm_password'] = !empty($_POST['confirm_password']) ? trim($_POST['confirm_password']) : '';
			$data['setting_password'] = !empty($_POST['setting_password']) ? trim($_POST['setting_password']) : '';
			$data['confirm_password1'] = !empty($_POST['confirm_password1']) ? trim($_POST['confirm_password1']) : '';
			$data['phone_no'] = !empty($_POST['phone_no']) ? trim($_POST['phone_no']) : '';
			$data['address'] = !empty($_POST['address']) ? trim($_POST['address']) : '';
			$data['city'] = !empty($_POST['city']) ? trim($_POST['city']) : '';
			$data['state'] = !empty($_POST['state']) ? trim($_POST['state']) : '';
			$data['postal_code'] = !empty($_POST['postal_code']) ? trim($_POST['postal_code']) : '';
			$data['country_code'] = !empty($_POST['country_code']) ? trim($_POST['country_code']) : '';
			$data['zone_id'] = !empty($_POST['zone_id']) ? trim($_POST['zone_id']) : '';
			$data['path_id'] = !empty($_POST['path_id']) ? trim($_POST['path_id']) : '0';
			$last_id = $this->dbapi->addNewUser($data);
			$folder = 'data/profile/';
			if (!empty($_FILES['user_logo']['name'])) {
				$img = imgUpload('user_logo', $folder, slugify($data['first_name']));
				$this->dbapi->updateNewUser(['user_logo' => $img], $last_id);
			}
			$_SESSION['message'] = 'User added Successfully';
			redirect(base_url() . "admin/register");
		}
		$data['countries'] = $this->dbapi->getCountryList();
		$data['settings'] = $this->dbapi->getSiteSettings(1);
		$this->load->view('admin/register', $data);
	}

	public function fetch_zones() {
		if (!empty($this->_REQ['country_code'])) {
			$zones = $this->dbapi->getZonesList($this->_REQ['country_code']);
			echo json_encode($zones);
		}
	}

	public function fetch_sub_products() {
		if (!empty($this->_REQ['main_product_id'])) {
			$sub_products = $this->dbapi->getSubProductsList($this->_REQ['main_product_id']);
			echo json_encode($sub_products);
		}
	}

	public function fetch_user_details() {
		$user_id = $this->_REQ['user_id'];
		if (!empty($user_id)) {
			$user_details = $this->dbapi->getOwnerById($user_id);
			if (!empty($user_details)) {
				$data['user_details'] = $user_details;
				$this->load->view('admin/user-details', $data);
			}
		}
	}

	public function fetchClientDetails() {
		$client_id = $this->_REQ['client_id'];
		if (!empty($client_id)) {
			$client_details = $this->dbapi->getClientById($client_id);
			if (!empty($client_details)) {
				$data['client_details'] = $client_details;
				$this->load->view('admin/client-details', $data);
			}
		}
	}

	public function getGSTByHsnCode() {
		if (!empty($this->_REQ['hsn_code'])) {
			$gst = $this->dbapi->getGSTByHsnCodeDB($this->_REQ['hsn_code']);
			echo json_encode($gst);
		}
	}

	public function dashboard() {
		$this->_user_login_check(["ADMIN"]);
		$data = array();
		_logged();
		$this->header_data['title'] .= " | Dashboard ";
		$data['p_cnt'] = $this->dbapi->searchProducts(['is_active' => '1', 'parent_id' => 0], "CNT");
		$data['sp_cnt'] = $this->dbapi->searchProducts(['is_active' => '1', 'parent_id' => 0], "CNT");
		//$data['sp_cnt'] = $this->dbapi->searchProducts(['key'=> $product_id],$mode = 'CNT');
		$data['cp_cnt'] = $this->dbapi->searchChildProductInfo(['is_active' => '1'], "CNT");
		$data['dealers_cnt'] = $this->dbapi->searchUsers(['role' => 'DEALER', 'is_active' => 1], "CNT");
		$data['users_cnt'] = $this->dbapi->searchNewUsers(['role' => 'ADMIN', 'is_active' => 1], "CNT");
		$data['o_cnt'] = $this->dbapi->searchOrders(['order_type' => 'PRODUCT'], "CNT");
		$data['co_cnt'] = $this->dbapi->searchOrders(['order_type' => 'CUSTOM'], "CNT");
		$this->_admin('dashboard', $data);
	}

	public function get_state() {
		if (!empty($this->_REQ['user_id'])) {
			$user_details = $this->dbapi->getOwnerById($this->_REQ['user_id']);
			echo json_encode($user_details);
		}
	}

	public function main_products($act = '', $str = '') {
		$this->_user_login_check(["ADMIN"]);
		$this->header_data['title'] = "Main Products";
		_logged();
		$data = array();
		if (!empty($_GET['act']) && $_GET['act'] == "del" && !empty($_GET['product_id'])) {
			$sub_products = $this->dbapi->getProductsByParentId($_GET['product_id']);
			$this->dbapi->delProduct($_GET['product_id']);
			if (!empty($sub_products)) {
				foreach ($sub_products as $sub_product) {
					$this->dbapi->delProduct($sub_product['product_id']);
					$child_products = $this->dbapi->getProductsByParentId($sub_product['product_id']);
					if (!empty($child_products)) {
						foreach ($child_products as $child_product) {
							$this->dbapi->delProduct($child_product['product_id']);
							$this->dbapi->delRangeDetails($child_product['product_id']);
							$this->dbapi->delChildProductInfoByProductId($child_product['product_id']);
						}
					}
				}
			}
			redirect(base_url() . "admin/main-products/");
		}
		if (!empty($_GET['act']) && $_GET['act'] == "status" && !empty($_GET['product_id']) && isset($_GET['sta'])) {
			$is_active = (!empty($_GET['sta']) && $_GET['sta'] == "1") ? "1" : "0";
			$this->dbapi->updateProduct(array("is_active" => $is_active), $_GET['product_id']);
			redirect(base_url() . "admin/main-products/");
		}
		if ($act == "add") {
			if (!empty($_POST['product_name'])) {
				$data['product_name'] = !empty($_POST['product_name']) ? trim($_POST['product_name']) : "";
				$last_id = $this->dbapi->addProduct($data);
				if ($last_id) {
					$_SESSION['message'] = "Product added Successfully";
					redirect(base_url() . "admin/main-products/");
				}
			}
			$this->_admin('main-products/form', $data);
		} else if ($act == "edit") {
			if (!empty($_POST['product_id'])) {
				$product_id = $_POST['product_id'];
				$data['product_name'] = !empty($_POST['product_name']) ? trim($_POST['product_name']) : "";
				$this->dbapi->updateProduct($data, $product_id);
				$_SESSION['message'] = "Product Updated Successfully";
				redirect(base_url() . "admin/main-products/");
			}
			$data['product'] = $this->dbapi->getProductById($str);
			$this->_admin('main-products/form', $data);
		} else {
			$data['products'] = $this->dbapi->searchProducts();
			$this->_admin('main-products/index', $data);
		}
	}

	public function sub_products($act = '', $str = '') {
		$this->header_data['title'] = "Sub Products";
		_logged();
		$data = array();
		if (!empty($_GET['act']) && $_GET["act"] == "del" && !empty($_GET['product_id'])) {
			$sub = $this->dbapi->getProductsByParentId($_GET['product_id']);
			$this->dbapi->delProduct($_GET['product_id']);
			foreach ($sub as $child) {
				$this->dbapi->delChildProductInfoByProductId($child['product_id']);
				$this->dbapi->delProduct($child['product_id']);
				$this->dbapi->delRangeDetails($child['product_id']);
			}
			redirect(base_url() . 'admin/sub-products');
		}
		if (!empty($_GET['act']) && $_GET['act'] == 'status' && !empty($_GET['product_id']) && isset($_GET['sta'])) {
			$is_active = (!empty($_GET['sta']) && $_GET['sta'] == '1') ? "1" : "0";
			$this->dbapi->updateProduct(array("is_active" => $is_active), $_GET['product_id']);
			redirect(base_url() . "admin/sub-products/");
		}
		if ($act == "add") {
			if (!empty($_POST['product_name'])) {
				$data['product_name'] = !empty($_POST['product_name']) ? trim($_POST['product_name']) : '';
				$data['parent_id'] = !empty($_POST['main_product_id']) ? trim($_POST['main_product_id']) : '';
				$data['product_url'] = !empty($_POST['product_url']) ? trim($_POST['product_url']) : '#';
				$last_id = $this->dbapi->addProduct($data);
				$folder = 'data/sub-products/';
				if (!empty($_FILES['product_logo']['name'])) {
					$img = imgUpload("product_logo", $folder, slugify($data['product_name']));
					$this->dbapi->updateProduct(["product_logo" => $img], $last_id);
				}
				$_SESSION['message'] = 'Sub Product added Successfully';
				redirect(base_url() . "admin/sub-products/");
			}
			$data['main_products'] = $this->dbapi->getMainProducts();
			$this->_admin('sub-products/form', $data);
		} else if ($act == "edit") {
			if (!empty($_POST['product_id'])) {
				$product_id = $_POST['product_id'];
				$data['product_name'] = !empty($_POST['product_name']) ? trim($_POST['product_name']) : '';
				$data['parent_id'] = !empty($_POST['main_product_id']) ? trim($_POST['main_product_id']) : '';
				$data['product_url'] = !empty($_POST['product_url']) ? trim($_POST['product_url']) : '#';
				$folder = 'data/sub-products/';
				if (!empty($_FILES['product_logo']['name'])) {
					$data['product_logo'] = imgUpload("product_logo", $folder, slugify($data['product_name']));
				}
				$this->dbapi->updateProduct($data, $product_id);
				$_SESSION['message'] = 'Sub Product Updated Successfully';
				redirect(base_url() . "admin/sub-products/");
			}
			$data['sub_product'] = $this->dbapi->getProductById($str);
			$data['main_products'] = $this->dbapi->getMainProducts();
			$this->_admin('sub-products/form', $data);
		} else {
			$main_products = $this->dbapi->searchProducts(["is_active" => "1", "parent_id" => '0']);
			if (!empty($main_products)) {
				foreach ($main_products as &$sub_product) {
					$sub_product['sub_products'] = $this->dbapi->searchProducts(["key" => $sub_product['product_id']]);
				}
			}
			$data['products'] = $main_products;
			$this->_admin('sub-products/index', $data);
		}
	}

	public function child_sub_products($act = '', $str = '') {
		$post = $this->input->post();
		$this->header_data['title'] = "Child Sub Products";
		_logged();
		$data = array();
		$pdata = array();
		if (!empty($_GET['act']) && $_GET["act"] == "del" && !empty($_GET['product_info_id'])) {
			$p = $this->dbapi->getChildProductInfoById($_GET['product_info_id']);
			$price_range = $this->dbapi->getPriceRangeDetails($p['product_id']);
			$this->dbapi->delChildProductInfo($_GET['product_info_id']);
			$this->dbapi->delProduct($p['product_id']);
			if (!empty($price_range)) {
				foreach ($price_range as $pr) {
					$this->dbapi->delRangeDetails($pr['product_id']);
				}
			}
			redirect(base_url() . 'admin/child-sub-products/');
		}
		if (!empty($_GET['act']) && $_GET['act'] == 'status' && !empty($_GET['product_info_id']) && isset($_GET['sta'])) {
			$is_active = (!empty($_GET['sta']) && $_GET['sta'] == '1') ? "1" : "0";
			$this->dbapi->updateChildProductInfo(array("is_active" => $is_active), $_GET['product_info_id']);
			redirect(base_url() . "admin/child-sub-products/");
		}
		if ($act == "add") {
			$data['main_products'] = $this->dbapi->getMainProductList();

			if (!empty($_POST['mproduct_name'])) {
				$mproduct_name = !empty($_POST['mproduct_name']) ? trim($_POST['mproduct_name']) : '';
				$mproduct = $this->dbapi->getProductDetailsByName($_POST['mproduct_name']);

				if (!empty($mproduct)) {
					$product_id = $mproduct['product_id'];
				} else {
					$product_id = $this->dbapi->addProduct(['product_name' => $mproduct_name]);
				}
				if (!empty($product_id)) {
					$parent_id = $product_id;
					$sproduct_name = !empty($_POST['sub_product_name']) ? trim($_POST['sub_product_name']) : '';
					$sproduct_url = !empty($_POST['sub_product_url']) ? trim($_POST['sub_product_url']) : '#';

					$sproduct = $this->dbapi->getProductDetailsByName($sproduct_name);
					if (!empty($sproduct)) {
						$folder = 'data/sub-products/';
						if (!empty($_FILES['sub_product_img']['name'])) {
							$img = imgUpload("sub_product_img", $folder, slugify($sproduct_name) . date('Y-m-d'));
							$this->dbapi->updateProduct(['product_logo' => $img], $sproduct['product_id']);
						}
						$sproduct_id = $sproduct['product_id'];
					} else {
						$folder = 'data/sub-products/';
						if (!empty($_FILES['product_logo']['name'])) {
							$img = imgUpload("product_logo", $folder, slugify($sproduct_name) . date('Y-m-d'));
							$sproduct_id = $this->dbapi->addProduct(['product_name' => $sproduct_name, 'product_url' => $sproduct_url, 'parent_id' => $parent_id, 'product_logo' => $img]);
						}
					}

					if (!empty($sproduct_id) && !empty($_POST['product_name'])) {
						$csproduct_name = !empty($_POST['product_name']) ? trim($_POST['product_name']) : '';
						$csproduct_url = !empty($_POST['product_url']) ? trim($_POST['product_url']) : '#';
						$csproduct_id = $this->dbapi->addProduct(['product_name' => $csproduct_name, 'product_url' => $csproduct_url, 'parent_id' => $sproduct_id]);
						$folder = 'data/child-sub-products/';
						if (!empty($_FILES['product_logo']['name'])) {
							$img = imgUpload("product_logo", $folder, slugify($csproduct_name) . $csproduct_id);
							$this->dbapi->updateProduct(["product_logo" => $img], $csproduct_id);
						}
						$pdata['product_id'] = $csproduct_id;
						$pdata['mfr_no'] = !empty($_POST['mfr_no']) ? trim($_POST['mfr_no']) : '';
						$pdata['hsn_code'] = !empty($_POST['hsn_code']) ? trim($_POST['hsn_code']) : '';
						$pdata['mrp_price'] = !empty($_POST['mrp_price']) ? trim($_POST['mrp_price']) : '';
						$pdata['gst'] = !empty($_POST['gst']) ? trim($_POST['gst']) : '';
						$pdata['discount'] = !empty($_POST['discount']) ? trim($_POST['discount']) : '0';
						$pdata['has_mac_id'] = !empty($_POST['has_mac_id']) ? trim($_POST['has_mac_id']) : '0';
						$pdata['description_1'] = !empty($_POST['description_1']) ? trim($_POST['description_1']) : '';
						//$pdata['description_2'] = !empty($_POST['description_2']) ? trim($_POST['description_2']) : '';
						$pdata['description_2'] = !empty($_POST['description_2']) ? trim($_POST['description_2']) : '';
						$pdata['description_3'] = !empty($_POST['description_3']) ? trim($_POST['description_3']) : '';
						//$pdata['description_3'] = !empty($_POST['description_3']) ? trim($_POST['description_3']) : '';
						//$pdata['description_3'] = !empty($_POST['description_3']) ? trim($_POST['description_3']) : '';
						$pdata['demo_video_type'] = !empty($_POST['demo_video_type']) ? trim($_POST['demo_video_type']) : '';
						$pdata['demo_video'] = !empty($_POST['demo_video']) ? trim($_POST['demo_video']) : '';
						$pdata['demo_text'] = !empty($_POST['demo_text']) ? trim($_POST['demo_text']) : '';
						$last_id1 = $this->dbapi->addChildProductInfo($pdata);
						$folder = 'data/datasheets/';
						if (!empty($_FILES['datasheet']['name'])) {
							$img = imgUpload("datasheet", $folder, slugify($pdata['product_name']) . $csproduct_id);
							$this->dbapi->updateChildProductInfo(["datasheet" => $img], $csproduct_id);
						}
					}
					if (!empty($csproduct_id) && !empty($last_id1)) {
						if (!empty($_POST['value_range'])) {
							foreach ($_POST['value_range'] as $key => $value) {
								$rinfo = [];
								$rinfo['product_id'] = $csproduct_id;
								$rinfo['value_range'] = !empty($_POST['value_range']) ? $_POST['value_range'][$key] : '0-0';
								$rinfo['dealer_price'] = !empty($_POST['dealer_price']) ? $_POST['dealer_price'][$key] : '0.00';
								$this->dbapi->addRangeInfo($rinfo);
							}
						}
						$_SESSION['message'] = 'Child Sub Product added Successfully';
						redirect(base_url() . "admin/child-sub-products/");
					}
				}
			}
			$data['hsn_codes'] = $this->dbapi->getHsnCodeListDB();
			$data['main_products'] = $this->dbapi->getMainProducts();
			$this->_admin('child-sub-products/form', $data);
		} else if ($act == "edit") {
			if (!empty($_POST['product_id'])) {

				$this->load->model("product");
				if (empty($post['mproduct_name']) || empty($post['sub_product_name']) || empty($post['product_name'])) {
					$_SESSION['error'] = 'Main Product name, Sub Product Name And Model name are required';
					redirect(base_url() .'admin/child-sub-products/edit/'.$str);
				} 
				
				$product_name = $post['product_name'];
				$child_product_name = $post['sub_product_name'];
				$parent_product_name = $post['mproduct_name'];
				$model_product = $this->product->is_exits_model_product($product_name, $child_product_name, $parent_product_name, $post['product_id']);

				if (!empty($model_product)) {
					$_SESSION['error'] = "Duplicate product entry";
					redirect(base_url() .'admin/child-sub-products/edit/'.$str);
				} 
				/*** Check if mail product exits or no ***/
				$exists_row = $this->master_model->select_data_row(['product_id'], 'tbl_products', ['product_name' => $parent_product_name]);
				if (empty($exists_row)) {
					$_POST['mproduct_id'] = $this->dbapi->addProduct(['product_name' => $parent_product_name, 'is_active' => '1']);
				} else {
					$_POST['mproduct_id'] = $exists_row['product_id'];
				}

				/**** Check if sub product exits or not ****/

				$exists_row = $this->master_model->select_data_row(['product_id'], 'tbl_products', ['product_name' => $child_product_name,'parent_id' => $_POST['mproduct_id']]);

				if (empty($exists_row)) {
					$_POST['sproduct_id'] = $this->dbapi->addProduct(['product_name' => $child_product_name, 'parent_id' => $_POST['mproduct_id'], 'is_active' => '1']);

				} else {
					$_POST['sproduct_id'] = $exists_row['product_id'];
				}

				$sproduct_name = !empty($_POST['sub_product_name']) ? trim($_POST['sub_product_name']) : '';

				$sproduct_url = !empty($_POST['sub_product_url']) ? trim($_POST['sub_product_url']) : '#';
				$sparent_id = !empty($_POST['mproduct_id']) ? trim($_POST['mproduct_id']) : '#';
				$folder = 'data/sub-products/';
				$img = '';
				if (!empty($_FILES['sub_product_img']['name'])) {
					// $img = imgUpload("sub_product_img", $folder, slugify($sproduct_name) . $_POST['sproduct_id']);
				}
				// $this->dbapi->updateProduct(['product_name'=>$sproduct_name,'parent_id'=>$sparent_id,'product_url'=>$sproduct_url,'product_logo'=>$img],$_POST['sproduct_id']);
				

				$pdata['parent_id'] = !empty($_POST['sproduct_id']) ? trim($_POST['sproduct_id']) : '';
				$pdata['product_name'] = !empty($_POST['product_name']) ? trim($_POST['product_name']) : '';
				$pdata['product_url'] = !empty($_POST['product_url']) ? trim($_POST['product_url']) : '';
				$folder = 'data/child-sub-products/';
				if (!empty($_FILES['product_logo']['name'])) {
					$pdata['product_logo'] = imgUpload("product_logo", $folder, slugify($pdata['product_name']) . $_POST['product_id']);
				}
				$this->dbapi->updateProduct($pdata, $_POST['product_id']);
				$data['mfr_no'] = !empty($_POST['mfr_no']) ? trim($_POST['mfr_no']) : '';
				$data['hsn_code'] = !empty($_POST['hsn_code']) ? trim($_POST['hsn_code']) : '';
				$data['hsn_description'] = !empty($_POST['hsn_description']) ? trim($_POST['hsn_description']) : '';
				$data['mrp_price'] = !empty($_POST['mrp_price']) ? trim($_POST['mrp_price']) : '';
				$data['gst'] = !empty($_POST['gst']) ? trim($_POST['gst']) : '';
				$data['discount'] = !empty($_POST['discount']) ? trim($_POST['discount']) : '0';
				$data['has_mac_id'] = !empty($_POST['has_mac_id']) ? trim($_POST['has_mac_id']) : '0';
				$data['description_1'] = !empty($_POST['description_1']) ? trim($_POST['description_1']) : '';
				$data['description_2'] = !empty($_POST['description_2']) ? trim($_POST['description_2']) : '';
				$data['description_3'] = !empty($_POST['description_3']) ? trim($_POST['description_3']) : '';
				$data['demo_video_type'] = !empty($_POST['demo_video_type']) ? trim($_POST['demo_video_type']) : '';
				$data['demo_video'] = !empty($_POST['demo_video']) ? trim($_POST['demo_video']) : '';
				$data['demo_text'] = !empty($_POST['demo_text']) ? trim($_POST['demo_text']) : '';
				$folder = 'data/datasheets/';
				if (!empty($_FILES['datasheet']['name'])) {
					$data['datasheet'] = imgUpload("datasheet", $folder, slugify($pdata['product_name']) . $_POST['product_id']);
				}
				$this->dbapi->updateChildProductInfo($data, $_POST['product_info_id']);
				foreach ($_POST['value_range'] as $key => $value) {
					$rinfo = [];
					$rinfo['product_id'] = $_POST['product_id'];
					$rinfo['value_range'] = !empty($_POST['value_range']) ? $_POST['value_range'][$key] : '0-0';
					$rinfo['dealer_price'] = !empty($_POST['dealer_price']) ? $_POST['dealer_price'][$key] : '0.00';
					$pk_id = !empty($_POST['pk_id']) ? $_POST['pk_id'][$key] : '';
					$this->dbapi->updateRangeDetails($rinfo, $pk_id);
				}
				$_SESSION['message'] = 'Child Sub Product Updated Successfully';
				redirect(base_url() . "admin/child-sub-products/");
			}
			$sub_product = $this->dbapi->getChildProductInfoById($str);
			if (!empty($sub_product)) {
				$sub_product['ranges'] = $this->dbapi->searchRangeDetails(["product_id" => $sub_product['product_id']]);
			}
			$data['sub_product'] = $sub_product;
			$data['hsn_codes'] = $this->dbapi->getHsnCodeListDB();
			$data['main_products'] = $this->dbapi->getMainProducts();
			$data['sub_products'] = $this->dbapi->getSubProductsList($sub_product['main_product_id']);
			$this->_admin('child-sub-products/form', $data);
		} else if ($act == 'view') {
			$sub_product = $this->dbapi->getChildProductInfoById($str);

			if (!empty($sub_product)) {
				$sub_product['ranges'] = $this->dbapi->searchRangeDetails(["product_id" => $sub_product['product_id']]);
			}
			$data['sub_product'] = $sub_product;
			$products = $this->dbapi->searchProducts(["is_active" => '1']);
			if (!empty($products)) {
				foreach ($products as &$product) {
					if (!empty($product)) {
						$child_product = $this->dbapi->searchProducts(["is_active" => '1', 'key' => $product['product_id']]);
						if (!empty($child_product)) {
							foreach ($child_product as &$sub_child) {
								$childproduct_info = $this->dbapi->searchProducts(["is_active" => '1', 'key' => $sub_child['product_id']]);
								if (!empty($childproduct_info)) {
									foreach ($childproduct_info as &$info) {
										$information = $this->dbapi->searchChildProductInfo(['limit' => '3', 'offset' => '0', 'product_id' => $info['product_id']]);
										$info['product_details'] = $information;
									}
								}
								$sub_child['child_products'] = $childproduct_info;
							}
							$product['sub_products'] = $child_product;
						}
					}
				}
			}
			$data['products'] = $products;
			$data['tickets'] = $this->dbapi->searchTickets(['product_name' => $sub_product['child_product_name']]);
			$data['invoices'] = $this->dbapi->searchOrderItems(['product_name' => $sub_product['child_product_name']]);

			$this->_admin('child-sub-products/view', $data);
		} else {

			$products = $this->dbapi->searchProducts(["is_active" => '1']);
			if (!empty($products)) {
				foreach ($products as &$product) {
					if (!empty($product)) {
						$child_product = $this->dbapi->searchProducts(["is_active" => '1', 'key' => $product['product_id']]);
						if (!empty($child_product)) {
							foreach ($child_product as &$sub_child) {
								$childproduct_info = $this->dbapi->searchProducts(["is_active" => '1', 'key' => $sub_child['product_id']]);
								if (!empty($childproduct_info)) {
									foreach ($childproduct_info as &$info) {
										$information = $this->dbapi->searchChildProductInfo(['product_id' => $info['product_id']]);
										$info['product_details'] = $information;
									}
								}
								$sub_child['child_products'] = $childproduct_info;
							}
							$product['sub_products'] = $child_product;
						}
					}
				}
			}
			$data['products'] = $products;
			$this->_admin('child-sub-products/index', $data);
		}
	}

	public function getProdcutIdByName() {
		$p_name = $this->_REQ['product_name'];
		if (!empty($p_name)) {
			$products = $this->dbapi->getProductDetailsByName($p_name);
			// print_r($products);exit;
			echo json_encode($products);
		}
	}

	public function getSubProductsList() {
		$p_id = $this->_REQ['product_id'];
		if (!empty($p_id)) {
			$products = $this->dbapi->getSubProductsList($p_id);
			echo json_encode($products);

		}
	}

	public function add_hsn_code() {
		if (!empty($_POST['hsn_code'])) {
			$pdata['hsn_code'] = !empty($_POST['hsn_code']) ? trim($_POST['hsn_code']) : "";
			$pdata['description'] = !empty($_POST['description']) ? trim($_POST['description']) : "";
			$pdata['gst'] = !empty($_POST['gst']) ? trim($_POST['gst']) : "";
			$last_id = $this->dbapi->addHsnCode($pdata);
			if (!empty($last_id)) {
				$hsn_code = $this->dbapi->getHsnCodeById($last_id);
				echo json_encode($hsn_code);
			} else {
				return false;
			}
		}
	}

	public function create_order($act = '', $str = '') {
		$this->header_data['title'] = "Create Order";
		$data = array();
		_logged();
		if (!empty($_GET['act']) && $_GET["act"] == "del" && !empty($_GET['order_id'])) {
			$this->dbapi->delOrder($_GET['order_id']);
			$this->dbapi->delOrderItem($_GET['order_id']);
			redirect(base_url() . 'admin/create-order/');
		}
		if ($act == "add") {
			if (!empty($_POST['order_date'])) {
				$data['order_date'] = !empty($_POST['order_date']) ? dateForm2DB($_POST['order_date']) : '';
				$data['order_type'] = 'CUSTOM';
				$data['expected_date'] = !empty($_POST['expected_date']) ? dateForm2DB($_POST['expected_date']) : '';
				$data['delivery_within'] = !empty($_POST['delivery_within']) ? trim($_POST['delivery_within']) : '';
				$data['remarks'] = !empty($_POST['remarks']) ? trim($_POST['remarks']) : '';
				$data['created_by'] = !empty($_SESSION['USER_ID']) ? trim($_SESSION['USER_ID']) : '';
				$data['sub_amount'] = !empty($_POST['input_total']) ? trim($_POST['input_total']) : '0.00';
				$data['cgst_amount'] = !empty($_POST['cgst_amount']) ? trim($_POST['cgst_amount']) : '0.00';
				$data['sgst_amount'] = !empty($_POST['sgst_amount']) ? trim($_POST['sgst_amount']) : '0.00';
				$data['igst_amount'] = !empty($_POST['igst_amount']) ? trim($_POST['igst_amount']) : '0.00';
				$data['discount_total'] = !empty($_POST['discount_total']) ? trim($_POST['discount_total']) : '0';
				$data['final_total'] = !empty($_POST['final_total']) ? trim($_POST['final_total']) : '0.00';
				$data['text_amount'] = !empty($_POST['text_amount']) ? trim($_POST['text_amount']) : '0.00';
				$data['tax_amount'] = !empty($_POST['tax_amount']) ? trim($_POST['tax_amount']) : '0.00';
				$data['user_id'] = !empty($_POST['user_id']) ? trim($_POST['user_id']) : '';
				$_seq_cnt = $this->api->getOrderCountByMember($_SESSION['USER_ID']);
				$data['order_no'] = !empty($_POST['order_no']) ? $_POST['order_no'] : 'SCIE-' . $_seq_cnt['cnt'];
				$latest_seq = $_seq_cnt['cnt'] + 1;
				$this->api->updatePrefix(['series_start' => $latest_seq], $_SESSION['USER_ID']);
				// $found=$this->dbapi->checkOrderNo($data['order_no']);
				$last_id = $this->dbapi->addOrder($data);
				if (!empty($last_id)) {
					if (!empty($_POST['item_id'])) {
						foreach ($_POST['item_id'] as $key => $value) {
							$odata = [];
							$odata['order_id'] = $last_id;
							$odata['product_id'] = $_POST['item_id'][$key];
							$odata['product_name'] = $_POST['item_name'][$key];
							$odata['unit_price'] = !empty($_POST['mrp_price']) ? $_POST['mrp_price'][$key] : '0.00';
							$odata['quantity'] = !empty($_POST['quantity']) ? $_POST['quantity'][$key] : '0';
							$odata['amount'] = $odata['unit_price'] * $odata['quantity'];
							$odata['amnt_aft_discount'] = !empty($_POST['amnt_aft_discount']) ? $_POST['amnt_aft_discount'][$key] : '0.00';
							$odata['cgst_amount'] = !empty($_POST['input_cgst']) ? $_POST['input_cgst'][$key] : '0.00';
							$odata['sgst_amount'] = !empty($_POST['input_sgst']) ? $_POST['input_sgst'][$key] : '0.00';
							$odata['igst_amount'] = !empty($_POST['input_igst']) ? $_POST['input_igst'][$key] : '0.00';
							$odata['tax_amount'] = !empty($_POST['indvidual_tax_amount']) ? $_POST['indvidual_tax_amount'][$key] : '0.00';
							$odata['total_amount'] = !empty($_POST['sub_total']) ? $_POST['sub_total'][$key] : '0.00';
							$odata['discount_amount'] = !empty($_POST['discount']) ? $_POST['discount'][$key] : '0.00';
							$this->dbapi->addOrderItem($odata);
						}
					}
					$order = $this->dbapi->getOrderById($last_id);
					if (!empty($order)) {
						$order['order_items'] = $this->dbapi->searchOrderItems(["order_id" => $order['order_id']]);
					}
					$pdata['subject'] = "Product Orders  In Vscie Technologies";
					$pdata['order'] = $order;
					$data['site_info'] = $this->dbapi->getSiteSettings(1);
					$pdata['user'] = $this->dbapi->getOwnerById($_SESSION['USER_ID']);
					$pdata['from_address'] = $this->dbapi->getUserByRole('ADMIN');
					$to_address = $this->dbapi->getOwnerById($data['user_id']);
					$pdata['to'] = $to_address['email'];
					//$pdata['to'] = 'raghu@mydwayz.com';
					$pdata['cc'] = $data['site_info']['email'];
					// $pdata['cc'] = 'gopinadh@mydwayz.com';
					$this->sendEmail("email/purchase_order", $pdata);
				}
				$data['site_info'] = $this->dbapi->getSiteSettings(1);
				$data['customers'] = $this->dbapi->getCustomersList();
				$_SESSION['message'] = 'Custom Order Added Successfully';
				redirect(base_url() . "admin/create-order/");
			}
			$data['site_info'] = $this->dbapi->getSiteSettings(1);
			$data['customers'] = $this->dbapi->getCustomersList();
			$data['sequence'] = $this->api->getSequenceByMemberId($_SESSION['USER_ID']);
			$this->_admin('create-order/form', $data);
		} else if ($act == "edit") {
			if (!empty($_POST['order_id'])) {
				$data['order_status'] = !empty($_POST['order_status']) ? trim($_POST['order_status']) : '';
				$data['approved_by'] = !empty($_SESSION['USER_ID']) ? trim($_SESSION['USER_ID']) : '';
				$data['approved_on'] = date('Y-m-d H:i:s');
				$this->dbapi->updateOrder($data, $_POST['order_id']);
				if (!empty($_POST['order_id'])) {
					if (!empty($_POST['product_name'])) {
						foreach ($_POST['product_name'] as $key => $value) {
							$odata = [];
							$odata['mac_id'] = !empty($_POST['mac_id']) ? $_POST['mac_id'][$key] : '0';
							$mdata['mac_id'] = $_POST['mac_id'][$key];
							$mdata['order_id'] = $_POST['order_item_id'][$key];
							$mdata['created_on'] = $data['approved_on'][$key];
							$mdata['created_by'] = $_POST['mac_created_by'][$key];
							$order_item_id = !empty($_POST['order_item_id']) ? $_POST['order_item_id'][$key] : '';
							$this->dbapi->updateOrderItem($odata, $order_item_id);
							$mac = $this->dbapi->getMacFromMacIds($mdata['mac_id']);
							if (!empty($mac['mac_id'])) {
							} else {
								$this->dbapi->addMacData($mdata);
							}
						}
					}
				}
				$_SESSION['message'] = 'Order Updated Successfully';
				redirect(base_url() . "admin/create-order/");
			}
			$order = $this->dbapi->getCustomOrderById($str);
			if (!empty($order)) {
				$order['order_items'] = $this->dbapi->searchCustomOrderItems(["order_id" => $order['order_id']]);
			}
			$data['order'] = $order;
			$data['customers'] = $this->dbapi->getCustomersList();
			$this->_admin('create-order/form', $data);
		} else if ($act == "po") {
			$data['site_info'] = $this->dbapi->getSiteSettings(1);
			$order = $this->dbapi->getCustomOrderById($str);
			if (!empty($order)) {
				$order['order_items'] = $this->dbapi->searchCustomOrderItems(["order_id" => $order['order_id']]);
			}
			$data['order'] = $order;
			$data['site_info'] = $this->dbapi->getSiteSettings(1);
			$data['from_address'] = $this->dbapi->getUserByRole('ADMIN');
			$data['to_address'] = $this->dbapi->getOwnerById($order['user_id']);
			$this->_admin('create-order/po', $data);
		} else if ($act == "preview") {
			$data['site_info'] = $this->dbapi->getSiteSettings(1);
			$order = $this->dbapi->getCustomOrderById($str);
			if (!empty($order)) {
				$order['order_items'] = $this->dbapi->searchCustomOrderItems(["order_id" => $order['order_id']]);
			}
			$data['order'] = $order;
			$data['site_info'] = $this->dbapi->getSiteSettings(1);
			$data['from_address'] = $this->dbapi->getUserByRole('ADMIN');
			$data['to_address'] = $this->dbapi->getOwnerById($order['user_id']);
			$this->_admin('create-order/print-po', $data);
		} else if ($act == "print") {
			$data['site_info'] = $this->dbapi->getSiteSettings(1);
			$order = $this->dbapi->getCustomOrderById($str);
			if (!empty($order)) {
				$order['order_items'] = $this->dbapi->searchCustomOrderItems(["order_id" => $order['order_id']]);
			}
			$data['order'] = $order;
			$data['site_info'] = $this->dbapi->getSiteSettings(1);
			$data['from_address'] = $this->dbapi->getUserByRole('ADMIN');
			$data['to_address'] = $this->dbapi->getOwnerById($order['user_id']);
			$this->_admin('create-order/po-print', $data);
		} else {
			$data['orders'] = $this->dbapi->searchCustomOrders(['created_by' => $_SESSION['USER_ID'], 'order_type' => 'CUSTOM']);
			$this->_admin('create-order/index', $data);
		}
	}

	public function getHsnCodeList() {
		if (!empty($this->_REQ['hsn_code'])) {
			$name = $this->_REQ['hsn_code'];
			$hsn_codes = $this->dbapi->getHsnCodeListDB(['hsn_code' => $name]);
			$content = "";
			$content .= "<ul class='list-unstyled' id='hsn-list'>";
			if (!empty($hsn_codes)) {
				foreach ($hsn_codes as $pk_id => $code) {
					$content .= "<li class='hsn' onclick='selectHSN(" . $code . ");'>" . $code . "</li>";
				}
			} else {
				$content .= "<li ><p>No HSN Code found !</p></li>";
				$content .= "<li style='padding: 0;'><button style='width:100%;height: 35px;font-size: 16px;'  type='button'  class='btn btn-sm btn-primary modal-toggle'>Add this HSN CODE</button></li>";
			}
			$content .= "</ul>";
			echo $content;
		}
	}

	public function get_item_deatils() {
		if (!empty($this->_REQ['item_name'])) {
			$items = $this->dbapi->getItemMasterByName($this->_REQ['item_name']);
			echo json_encode($items);
		}
	}

	public function getSubProductsListByName() {
		$p_name = $this->_REQ['product_name'];
		if (!empty($p_name)) {
			$product = $this->dbapi->getProductDetailsByName($p_name);
			$sub_products = $this->dbapi->getSubProductsList($product['product_id']);
			echo json_encode($sub_products);
		}
	}

	public function getItemMasterList() {
		if (!empty($this->_REQ['item_name'])) {
			$name = $this->_REQ['item_name'];
			$items = $this->dbapi->getItemMasterListDB(['item_name' => $name]);
			$list = "";
			$list .= "<ul class='list-unstyled item-list' id='item'>";
			if (!empty($items)) {
				foreach ($items as $item_id => $item_name) {
					// $list .= "<li class='hi' onclick='itemName(\"" . $item_name . "\");'>" . $item_name . "</li>";
					$list .= "<li class='hi' onclick='itemName();'>" . $item_name . "</li>";
				}
			} else {
				$list .= "<li ><p>No Item found !</p></li>";
				$list .= "<li style='padding: 0;'><button style='width:100%;height: 40px;font-size: 16px;'  type='button'  class='btn btn-sm btn-primary modal-toggle'>Add this Item</button></li>";
			}
			$list .= "</ul>";
			echo $list;
		}
	}

	public function add_item() {
		$pdata = [];
		if (!empty($_POST['item_name'])) {
			$pdata['item_name'] = !empty($_POST['item_name']) ? trim($_POST['item_name']) : "";
			$pdata['hsn_code'] = !empty($_POST['hsn_code']) ? trim($_POST['hsn_code']) : "";
			$pdata['mrp_price'] = !empty($_POST['mrp_price']) ? trim($_POST['mrp_price']) : "";
			$pdata['description'] = !empty($_POST['description']) ? trim($_POST['description']) : "";
			$pdata['gst'] = !empty($_POST['gst']) ? trim($_POST['gst']) : "";
			$last_id = $this->dbapi->addItemMaster($pdata);
			if (!empty($last_id)) {
				$items = $this->dbapi->getItemMasterById($last_id);
				echo json_encode($items);
			}
		}
		exit();
	}

	public function dealers($act = '', $str = '') {
		_logged();
		$this->header_data['title'] = "Dealers";
		$data = array();
		if (!empty($_GET['act']) && $_GET["act"] == "del" && !empty($_GET['member_id'])) {
			$this->dbapi->delUser($_GET['member_id']);
			redirect(base_url() . 'admin/dealers');
		}
		if (!empty($_GET['act']) && $_GET['act'] == 'status' && !empty($_GET['member_id']) && isset($_GET['sta'])) {
			$is_active = (!empty($_GET['sta']) && $_GET['sta'] == '1') ? "1" : "0";
			$this->dbapi->updateUser(array("is_active" => $is_active), $_GET['member_id']);
			$data['dealer'] = $this->dbapi->getUserById($_GET['member_id']);
			$dealer = $data['dealer'];
			if ($dealer['is_active'] == '0') {
				$pdata['subject'] = "Account Deativated";
				//$pdata['c_name'] = $dealer['company_name'];
				//  $pdata['to'] = 'raghu@mydwayz.com';
				$pdata['to'] = $dealer['email'];
				$pdata['to_name'] = $dealer['first_name'] . ' ' . $dealer['last_name'];
				$this->sendEmail("email/dealer_act", $pdata);
			}
			redirect(base_url() . "admin/dealers/");
		}
		if ($act == "add") {
			if (!empty($_POST['email'])) {
				$data['user_name'] = !empty($_POST['user_name']) ? trim($_POST['user_name']) : '';
				$data['first_name'] = !empty($_POST['first_name']) ? trim($_POST['first_name']) : '';
				$data['last_name'] = !empty($_POST['last_name']) ? trim($_POST['last_name']) : '';
				$data['email'] = !empty($_POST['email']) ? trim($_POST['email']) : '';
				$data['password'] = !empty($_POST['password']) ? trim($_POST['password']) : '';
				$data['confirm_password'] = !empty($_POST['confirm_password']) ? trim($_POST['confirm_password']) : '';
				$data['company_name'] = !empty($_POST['company_name']) ? trim($_POST['company_name']) : '';
				$data['address'] = !empty($_POST['address']) ? trim($_POST['address']) : '';
				$data['phone_no'] = !empty($_POST['phone_no']) ? trim($_POST['phone_no']) : '';
				$data['role'] = !empty($_POST['role']) ? trim($_POST['role']) : '';
				$data['state'] = !empty($_POST['state']) ? trim($_POST['state']) : '';
				$data['created_by'] = !empty($_SESSION['USER_NAME']) ? trim($_SESSION['USER_NAME']) : '';
				$last_id = $this->dbapi->addUser($data);
				$folder = 'data/profile/';
				if (!empty($_FILES['profile_logo']['name'])) {
					$img = imgUpload('profile_logo', $folder, slugify($data['user_name']));
					$this->dbapi->updateUser(['profile_logo' => $img], $last_id);
				}
				$pdata['subject'] = "Welcome to VSCIE Technologies";
				$pdata['c_name'] = $data['company_name'];
				$pdata['to'] = $data['email'];
				$pdata['pwd'] = $data['password'];
				$pdata['u_name'] = $data['user_name'];
				$pdata['to_name'] = $data['first_name'] . ' ' . $data['last_name'];
				$this->sendEmail("email/dealer_mail", $pdata);
				$_SESSION['message'] = 'Dealer Added Successfully';
				redirect(base_url() . "admin/dealers/");
			}
			$data['states'] = $this->dbapi->getStatesList();
			$this->_admin('dealers/form', $data);
		} else if ($act == "edit") {
			if (!empty($_POST['member_id'])) {
				$data['user_name'] = !empty($_POST['user_name']) ? trim($_POST['user_name']) : '';
				$data['first_name'] = !empty($_POST['first_name']) ? trim($_POST['first_name']) : '';
				$data['last_name'] = !empty($_POST['last_name']) ? trim($_POST['last_name']) : '';
				$data['email'] = !empty($_POST['email']) ? trim($_POST['email']) : '';
				$data['password'] = !empty($_POST['password']) ? trim($_POST['password']) : '';
				$data['confirm_password'] = !empty($_POST['confirm_password']) ? trim($_POST['confirm_password']) : '';
				$data['company_name'] = !empty($_POST['company_name']) ? trim($_POST['company_name']) : '';
				$data['address'] = !empty($_POST['address']) ? trim($_POST['address']) : '';
				$data['phone_no'] = !empty($_POST['phone_no']) ? trim($_POST['phone_no']) : '';
				$data['role'] = !empty($_POST['role']) ? trim($_POST['role']) : '';
				$data['state'] = !empty($_POST['state']) ? trim($_POST['state']) : '';
				$data['created_by'] = !empty($_SESSION['USER_NAME']) ? trim($_SESSION['USER_NAME']) : '';
				$folder = 'data/profile/';
				if (!empty($_FILES['profile_logo']['name'])) {
					$data['profile_logo'] = imgUpload('profile_logo', $folder, slugify($data['user_name']));
				}
				$this->dbapi->updateUser($data, $_POST['member_id']);
				$_SESSION['message'] = 'Dealer Updated Successfully';
				redirect(base_url() . "admin/dealers/");
			}
			$data['states'] = $this->dbapi->getStatesList();
			$data['dealer'] = $this->dbapi->getUserById($str);
			$this->_admin('dealers/form', $data);
		} else {
			$data['dealers'] = $this->dbapi->searchUsers(['role' => 'DEALER']);
			$this->_admin('dealers/index', $data);
		}
	}

	public function banners($act = '', $str = '') {
		_logged();
		$this->header_data['title'] = "Banners";
		$data = array();
		if (!empty($_GET['act']) && $_GET["act"] == "del" && !empty($_GET['member_id'])) {
			$this->dbapi->delBanner($_GET['banner_id']);
			redirect(base_url() . 'admin/banners/');
		}
		if (!empty($_GET['act']) && $_GET['act'] == 'status' && !empty($_GET['banner_id']) && isset($_GET['sta'])) {
			$is_active = (!empty($_GET['sta']) && $_GET['sta'] == '1') ? "1" : "0";
			$this->dbapi->updateBanner(array("is_active" => $is_active), $_GET['banner_id']);
			redirect(base_url() . "admin/banners/");
		}
		if ($act == "add") {
			if (!empty($_POST['banner_name'])) {
				$data['banner_name'] = !empty($_POST['banner_name']) ? trim($_POST['banner_name']) : '';
				$data['banner_desc'] = !empty($_POST['banner_desc']) ? trim($_POST['banner_desc']) : '';
				$last_id = $this->dbapi->addBanner($data);
				$folder = 'data/banners/';
				if (!empty($_FILES['banner_img']['name'])) {
					$img = imgUpload('banner_img', $folder, slugify($data['banner_name'] . $last_id));
					$this->dbapi->updateBanner(['banner_img' => $img], $last_id);
				}
				$_SESSION['message'] = 'Banner Added Successfully';
				redirect(base_url() . "admin/banners/");
			}
			$this->_admin('banners/form', $data);
		} else if ($act == "edit") {
			if (!empty($_POST['banner_id'])) {
				$data['banner_name'] = !empty($_POST['banner_name']) ? trim($_POST['banner_name']) : '';
				$data['banner_desc'] = !empty($_POST['banner_desc']) ? trim($_POST['banner_desc']) : '';
				$folder = 'data/banners/';
				if (!empty($_FILES['banner_img']['name'])) {
					$data['banner_img'] = imgUpload('banner_img', $folder, slugify($data['banner_name'] . $last_id));
				}
				$this->dbapi->updateBanner($data, $_POST['banner_id']);
				$_SESSION['message'] = 'Banner Updated Successfully';
				redirect(base_url() . "admin/banners/");
			}
			$data['banner'] = $this->dbapi->getBannerById($str);
			$this->_admin('banners/form', $data);
		} else {
			$data['banners'] = $this->dbapi->searchBanners();
			$this->_admin('banners/index', $data);
		}
	}

	public function products() {
		$this->header_data['title'] = "Products";
		$data = array();
		_logged();
		if (!empty($this->_REQ['product_id'])) {
			$products = $this->dbapi->searchProducts(["is_active" => '1']);
			if (!empty($products)) {
				$lp1 = 0;
				foreach ($products as &$product) {
					if (!empty($product) && $lp1 == 1) {
						$child_product = $this->dbapi->searchProducts(["is_active" => '1', 'key' => $product['product_id']]);
						if (!empty($child_product)) {
							$lp = 1;
							foreach ($child_product as &$sub_child) {
								if ($lp == 1) {
									$sub_child['product_id'] = $this->_REQ['product_id'];
									$childproduct_info = $this->dbapi->searchProducts(["is_active" => '1', 'key' => $sub_child['product_id']]);
									if (!empty($childproduct_info)) {
										foreach ($childproduct_info as &$info) {
											$information = $this->dbapi->searchChildProductInfo(['product_id' => $info['product_id']]);
											$info['product_details'] = $information;
										}
									}
									$sub_child['child_products'] = $childproduct_info;
								}
								$lp++;
							}
							$product['sub_products'] = $child_product;
						}
					}
					$lp1++;
				}
			}
		} else {
			$products = $this->dbapi->searchProducts(["is_active" => '1']);
			if (!empty($products)) {
				foreach ($products as &$product) {
					if (!empty($product)) {
						$child_product = $this->dbapi->searchProducts(["is_active" => '1', 'key' => $product['product_id']]);
						if (!empty($child_product)) {
							foreach ($child_product as &$sub_child) {
								$childproduct_info = $this->dbapi->searchProducts(["is_active" => '1', 'key' => $sub_child['product_id']]);
								if (!empty($childproduct_info)) {
									foreach ($childproduct_info as &$info) {
										$information = $this->dbapi->searchChildProductInfo(['product_id' => $info['product_id'], "is_active" => '1']);
										$info['product_details'] = $information;
									}
								}
								$sub_child['child_products'] = $childproduct_info;
							}
							$product['sub_products'] = $child_product;
						}
					}
				}
			}
		}
		$data['products'] = $products;
		$data['main_products'] = $this->dbapi->getMainProducts();
		$parent_id = !empty($this->_REQ['product_id']) ? $this->_REQ['product_id'] : '';
		$data['sub_products'] = $this->dbapi->getSubProductsList($parent_id);
		$data['sub_products'] = $this->dbapi->getSubProductsList1();
		$this->_admin('orders/products', $data);
	}

	public function add_cart_info() {
		if (!empty($_GET['act']) && $_GET['act'] == 'del' && !empty($_GET['pk_id'])) {
			$this->dbapi->delCartItem($_GET['pk_id']);
			redirect(base_url() . "admin/products");
		}
		if (!empty($this->_REQ['product']) && isset($this->_REQ['quantity'])) {
			$p = $this->_REQ['product'];
			$q = $this->_REQ['quantity'];
			$d = $this->_REQ['discount'];
			$product_details = $this->dbapi->getChildProductInfoById($p);
			$price = $this->_REQ['mrp'];
			if (!empty($q) && !empty($price) && !empty($product_details)) {
				if (!empty($d)) {
					$item_total = $q * $price;
					$discount = ($item_total * $d) / 100;
					$total = ($item_total - $discount);
					$data['product_details'] = $product_details;
					$data['qty'] = $q;
					$data['total'] = $total;
					$this->load->view('admin/cart-info', $data);
				} else {
					$total = ($q * $price);
					$data['product_details'] = $product_details;
					$data['qty'] = $q;
					$data['total'] = $total;
					$this->load->view('admin/cart-info', $data);
				}
			}
			$pdata['product_info_id'] = $p;
			$pdata['quantity'] = $q;
			$pdata['sub_total'] = $total;
			$pdata['created_by'] = !empty($_SESSION['USER_ID']) ? trim($_SESSION['USER_ID']) : "";
			$pdata['role'] = !empty($_SESSION['ROLE']) ? trim($_SESSION['ROLE']) : "";
			$product_details = $this->dbapi->getCartItemByProductId($p);
			if (!empty($product_details)) {
				$tdata = array();
				$tdata['quantity'] = $pdata['quantity'] + $product_details['quantity'];
				$tdata['sub_total'] = $pdata['sub_total'] + $product_details['sub_total'];
				$this->dbapi->updateCartItemsByProductId($tdata, $p);
				$data['cart_items'] = $this->dbapi->searchCartItems(['created_by' => $_SESSION['USER_ID']], ['role' => $_SESSION['ROLE']]);
				$this->load->view('admin/cart-data', $data);
			} else {
				$this->dbapi->addToCart($pdata);
				$data['cart_items'] = $this->dbapi->searchCartItems(['created_by' => $_SESSION['USER_ID']], ['role' => $_SESSION['ROLE']]);
				$this->load->view('admin/cart-data', $data);
			}
		}
	}

	public function view_cart() {
		$this->header_data['title'] = "Cart Items";
		$data = array();
		_logged();
		if (!empty($_GET['act']) && $_GET['act'] == 'del' && !empty($_GET['pk_id'])) {
			$this->dbapi->delCartItem($_GET['pk_id']);
			redirect(base_url() . "admin/view-cart");
		}
		$data['cart_items'] = $this->dbapi->searchCartItems(['created_by' => $_SESSION['USER_ID']], ['role' => $_SESSION['ROLE']]);
		$this->_admin('view-cart', $data);
	}

	public function update_cart() {
		$pdata = array();
		if (!empty($_POST['product_info_id'])) {
			$pdata['product_info_id'] = !empty($_POST['product_info_id']) ? trim($_POST['product_info_id']) : "";
			$pdata['quantity'] = !empty($_POST['quantity']) ? trim($_POST['quantity']) : "0";
			$pdata['sub_total'] = !empty($_POST['sub_total']) ? trim($_POST['sub_total']) : "";
			$pdata['full_total'] = !empty($_POST['full_total']) ? trim($_POST['full_total']) : "";
			$pdata['created_by'] = !empty($_SESSION['USER_ID']) ? trim($_SESSION['USER_ID']) : "";
			$pdata['role'] = !empty($_SESSION['ROLE']) ? trim($_SESSION['ROLE']) : "";
			$last_id = $this->dbapi->updateCartItemsByProductId($pdata, $_POST['product_info_id']);
			if (!empty($last_id)) {
				$total = $pdata['quantity'] * $_POST['mrp_price'];
				echo $total;
				return true;
			} else {
				return false;
			}
		}
	}

	public function clear_cart() {
		$user_id = $this->_REQ['created_by'];
		if (!empty($user_id)) {
			$res = $this->dbapi->emptyCartTable($user_id);
			redirect(base_url() . "admin/view-cart");
		}
	}

	public function orders($act = '', $str = '') {
		$this->header_data['title'] = "Orders";
		_logged();
		$data = array();
		if (!empty($_GET['act']) && $_GET["act"] == "del" && !empty($_GET['order_id'])) {
			$this->dbapi->delOrder($_GET['order_id']);
			$this->dbapi->delOrderItem($_GET['order_id']);
			redirect(base_url() . 'admin/orders/');
		}
		if (!empty($_GET['act']) && $_GET['act'] == 'status' && !empty($_GET['order_id']) && isset($_GET['sta'])) {
			$is_active = (!empty($_GET['sta']) && $_GET['sta'] == '1') ? "1" : "0";
			$this->dbapi->updateOrder(array("is_active" => $is_active), $_GET['order_id']);
			redirect(base_url() . "admin/orders/");
		}
		if ($act == "add") {
			if (!empty($_POST['order_date'])) {
				$data['order_date'] = !empty($_POST['order_date']) ? dateForm2DB($_POST['order_date']) : '';
				$data['expected_date'] = !empty($_POST['expected_date']) ? dateForm2DB($_POST['expected_date']) : '';
				$data['delivery_within'] = !empty($_POST['delivery_within']) ? trim($_POST['delivery_within']) : '';
				$data['remarks'] = !empty($_POST['remarks']) ? trim($_POST['remarks']) : '';
				$data['created_by'] = !empty($_SESSION['USER_ID']) ? trim($_SESSION['USER_ID']) : '';
				$data['sub_amount'] = !empty($_POST['sub_amount']) ? trim($_POST['sub_amount']) : '0.00';
				$data['tax_amount'] = !empty($_POST['tax_amount']) ? trim($_POST['tax_amount']) : '0.00';
				$data['cgst_amount'] = !empty($_POST['cgst_amount']) ? trim($_POST['cgst_amount']) : '0.00';
				$data['sgst_amount'] = !empty($_POST['sgst_amount']) ? trim($_POST['sgst_amount']) : '0.00';
				$data['igst_amount'] = !empty($_POST['igst_amount']) ? trim($_POST['igst_amount']) : '0.00';
				$data['discount_total'] = !empty($_POST['discount_total']) ? trim($_POST['discount_total']) : '0';
				$data['final_total'] = !empty($_POST['final_total']) ? trim($_POST['final_total']) : '0.00';
				$data['text_amount'] = !empty($_POST['text_amount']) ? trim($_POST['text_amount']) : '0.00';
				$data['user_id'] = !empty($_POST['user_id']) ? trim($_POST['user_id']) : '';
				$data['admin_visible'] = '1';
				$_seq_cnt = $this->api->getOrderCountByMember($_SESSION['USER_ID']);
				$data['order_no'] = !empty($_POST['order_no']) ? $_POST['order_no'] : 'SCIE-' . $_seq_cnt['cnt'];
				$latest_seq = $_seq_cnt['cnt'] + 1;
				$this->api->updatePrefix(['series_start' => $latest_seq], $_SESSION['USER_ID']);
				$last_id = $this->dbapi->addOrder($data);
				if (!empty($last_id)) {
					if (!empty($_POST['product_id'])) {
						foreach ($_POST['product_id'] as $key => $value) {
							$odata = [];
							$odata['order_id'] = $last_id;
							$odata['product_id'] = $_POST['product_id'][$key];
							$odata['product_name'] = $_POST['product_name'][$key];
							$odata['unit_price'] = !empty($_POST['mrp_price']) ? $_POST['mrp_price'][$key] : '0.00';
							$odata['quantity'] = !empty($_POST['quantity']) ? $_POST['quantity'][$key] : '0';
							$odata['amount'] = $odata['unit_price'] * $odata['quantity'];
							$odata['amnt_aft_discount'] = !empty($_POST['input_amount']) ? $_POST['input_amount'][$key] : '0.00';
							$odata['cgst_amount'] = !empty($_POST['input_cgst']) ? $_POST['input_cgst'][$key] : '0.00';
							$odata['sgst_amount'] = !empty($_POST['input_sgst']) ? $_POST['input_sgst'][$key] : '0.00';
							$odata['igst_amount'] = !empty($_POST['input_igst']) ? $_POST['input_igst'][$key] : '0.00';
							$odata['tax_amount'] = !empty($_POST['indvidual_tax_amount']) ? $_POST['indvidual_tax_amount'][$key] : '0.00';
							$odata['total_amount'] = !empty($_POST['sub_total']) ? $_POST['sub_total'][$key] : '0.00';
							$odata['discount_amount'] = !empty($_POST['discount']) ? $_POST['discount'][$key] : '0.00';
							$this->dbapi->addOrderItem($odata);
						}
					}
					$pdata['user_id'] = $last_id;
					$order = $this->dbapi->getOrderById($last_id);
					if (!empty($order)) {
						$order['order_items'] = $this->dbapi->searchOrderItems(["order_id" => $order['order_id']]);
					}
					$pdata['subject'] = "Product Orders  In Vscie Technologies";
					$pdata['order'] = $order;
					$site_info = $this->dbapi->getSiteSettings(1);
					$pdata['user'] = $this->dbapi->getOwnerById($_SESSION['USER_ID']);
					$pdata['from_address'] = $this->dbapi->getUserByRole('ADMIN');
					if (!empty($order['user_id'])) {
						$to_address = $this->dbapi->getOwnerById($order['user_id']);
					} else {
						$to_address = $this->dbapi->getUserById($order['created_by']);
					}
					$pdata['to'] = $to_address['email'];
					//    $pdata['to'] = 'raghu@mydwayz.com';
					$pdata['cc'] = $site_info['email'];
					//  $pdata['cc'] = 'raghudandu7@gmal.com';
					$this->sendEmail("email/purchase_order", $pdata);
				}
				$this->dbapi->emptyCartTable($_SESSION['USER_ID']);
				$_SESSION['message'] = 'Order Added Successfully';
				redirect(base_url() . "admin/orders/");
			}
			$data['sequence'] = $this->api->getSequenceByMemberId($_SESSION['USER_ID']);
			$data['main_products'] = $this->dbapi->getMainProducts();
			$data['site_info'] = $this->dbapi->getSiteSettings(1);
			$data['user'] = $this->dbapi->getOwnerById($_SESSION['USER_ID']);
			$data['customers'] = $this->dbapi->getCustomersList();
			$data['cart_tems'] = $this->dbapi->searchCartItems();
			$this->_admin('orders/form', $data);
		} else if ($act == "edit") {
			if (!empty($_POST['order_id'])) {
				$data['order_status'] = !empty($_POST['order_status']) ? trim($_POST['order_status']) : '';
				$data['approved_by'] = !empty($_SESSION['USER_ID']) ? trim($_SESSION['USER_ID']) : '';
				$data['approved_on'] = date('Y-m-d H:i:s');
				$this->dbapi->updateOrder($data, $_POST['order_id']);
				if (!empty($_POST['order_id'])) {
					if (!empty($_POST['product_id'])) {
						foreach ($_POST['product_id'] as $key => $value) {
							$odata = [];
							$odata['mac_id'] = !empty($_POST['mac_id']) ? $_POST['mac_id'][$key] : '0';
							$mdata['mac_id'] = !empty($_POST['mac_id'][$key]) ? $_POST['mac_id'][$key] : '';
							$mldata['mac_id'] = !empty($_POST['mac_id'][$key]) ? $_POST['mac_id'][$key] : '';
							$qldata['mac_id'] = !empty($_POST['mac_id'][$key]) ? $_POST['mac_id'][$key] : '';
							$mdata['order_item_id'] = !empty($_POST['order_item_id'][$key]) ? $_POST['order_item_id'][$key] : '';
							$mdata['dealer_id'] = !empty($_POST['dealer_id'][$key]) ? $_POST['dealer_id'][$key] : '';
							$mdata['created_on'] = !empty($data['approved_on'][$key]) ? $data['approved_on'][$key] : '';
							$mdata['created_by'] = !empty($_POST['created_by'][$key]) ? $_POST['created_by'][$key] : '';
							$mdata['product_id'] = !empty($_POST['product_id'][$key]) ? $_POST['product_id'][$key] : '';
							$qldata['product_id'] = !empty($_POST['product_id'][$key]) ? $_POST['product_id'][$key] : '';
							$mldata['product_id'] = !empty($_POST['product_id'][$key]) ? $_POST['product_id'][$key] : '';
							$qdata['old_mac_id'] = !empty($_POST['old_mac_id'][$key]) ? $_POST['old_mac_id'][$key] : '';
							$qdata['old_user_id'] = !empty($_POST['old_user_id'][$key]) ? $_POST['old_user_id'][$key] : '';
							$qldata['user_id'] = !empty($_POST['old_user_id'][$key]) ? $_POST['old_user_id'][$key] : '';
							$order_item_id = !empty($_POST['order_item_id']) ? $_POST['order_item_id'][$key] : '';
							if ((isset($qdata['old_mac_id']) && !empty($qdata['old_mac_id'])) && (isset($qdata['old_user_id']) && !empty($qdata['old_user_id']))) {
								$this->dbapi->updateOldMacInOrderItems($mdata['mac_id'], $_POST['old_mac_id'][$key], $_POST['old_user_id'][$key], $mdata['product_id'][$key]);
								$this->dbapi->updateOldMac($mdata['mac_id'], $_POST['old_mac_id'][$key], $_POST['old_user_id'][$key], $mdata['product_id'][$key]);
								$this->dbapi->updateOldMacUser($mdata['mac_id'], $_POST['old_mac_id'][$key], $_POST['old_user_id'][$key]);
								$this->dbapi->addMacData($mdata);
								$this->dbapi->addMacLogData($qldata);
							} else {
								$mac_status = $this->dbapi->getMacOrderStatus($mdata['order_item_id']);
								if ($mac_status) {
									$this->dbapi->updateMacData($mdata, $mdata['order_item_id']);
								} else {
									$this->dbapi->addMacData($mdata);
									//add maclog
								}
							}
							if (isset($_POST['set_mac'][$key]) && empty($_POST['set_mac'][$key])) {
								$this->dbapi->addMacLogData($mldata);
							} else {
								if (isset($qdata['old_mac_id']) && !empty($qdata['old_mac_id']) && isset($qdata['old_user_id']) && !empty($qdata['old_user_id'])) {
									// $date= date('Y-m-d');
									//  $this->dbapi->updateMacLogByMacId($date,$qldata['mac_id']);
									$this->dbapi->addMacLogData($qldata);
								}
							}
							$this->dbapi->updateOrderItem($odata, $order_item_id);
						}
					}
					$_SESSION['message'] = 'Order Updated Successfully';
					redirect(base_url() . "admin/orders/");
				}
			}
			$order = $this->dbapi->getOrderItemsById($str);
			if (!empty($order)) {
				if (!empty($order['user_id'])) {
					$order['order_items'] = $this->dbapi->searchOrderItems(["order_id" => $order['order_id']]);
					foreach ($order['order_items'] as &$oitem) {
						$macs = $this->dbapi->getExistedProductMacByCustomerProductId($order['user_id'], $oitem['product_id']);
						if (!empty($macs)) {
							$oitem['old_mac_id'] = $macs['mac_id'];
							$oitem['old_user_id'] = $macs['user_id'];
						}
					}
				} else {
					$order['order_items'] = $this->dbapi->searchOrderItems(["order_id" => $order['order_id']]);
				}
			}
			$data['order'] = $order;
			$data['main_products'] = $this->dbapi->getMainProducts();
			$data['sub_products'] = $this->dbapi->getSubProductsList1();
			$data['customers'] = $this->dbapi->getCustomersList();
			$data['child_products'] = $this->dbapi->getChildProductsList();
			$this->_admin('orders/form', $data);
		} else if ($act == "po") {
			$data['site_info'] = $this->dbapi->getSiteSettings(1);
			$order = $this->dbapi->getOrderById($str);
			if (!empty($order)) {
				$order['order_items'] = $this->dbapi->searchOrderItems(["order_id" => $order['order_id']]);
			}
			$data['order'] = $order;
			$data['site_info'] = $this->dbapi->getSiteSettings(1);
			$data['user'] = $this->dbapi->getOwnerById($_SESSION['USER_ID']);
			$data['from_address'] = $this->dbapi->getUserByRole('ADMIN');
			$data['to_address'] = $this->dbapi->getOwnerById($_SESSION['USER_ID']);
			$this->_admin('orders/po', $data);
		} else if ($act == "preview") {
			$data['site_info'] = $this->dbapi->getSiteSettings(1);
			$order = $this->dbapi->getOrderById($str);
			if (!empty($order)) {
				$order['order_items'] = $this->dbapi->searchOrderItems(["order_id" => $order['order_id']]);
			}
			$data['order'] = $order;
			$data['site_info'] = $this->dbapi->getSiteSettings(1);
			$data['user'] = $this->dbapi->getOwnerById($_SESSION['USER_ID']);
			$data['from_address'] = $this->dbapi->getUserByRole('ADMIN');
			if (!empty($order['user_id'])) {
				$data['to_address'] = $this->dbapi->getOwnerById($order['user_id']);
			} else {
				$data['to_address'] = $this->dbapi->getUserById($order['created_by']);
			}
			$this->_admin('orders/print-po', $data);
		} else if ($act == "download") {
			$data['site_info'] = $this->dbapi->getSiteSettings(1);
			$order = $this->dbapi->getOrderById($str);
			if (!empty($order)) {
				$order['order_items'] = $this->dbapi->searchOrderItems(["order_id" => $order['order_id']]);
			}
			$data['order'] = $order;
			$data['site_info'] = $this->dbapi->getSiteSettings(1);
			$data['user'] = $this->dbapi->getOwnerById($_SESSION['USER_ID']);
			$data['from_address'] = $this->dbapi->getUserByRole('ADMIN');
			if (!empty($order['user_id'])) {
				$data['to_address'] = $this->dbapi->getOwnerById($order['user_id']);
			} else {
				$data['to_address'] = $this->dbapi->getUserById($order['created_by']);
			}
			$this->load->view('admin/orders/test_pdf', $data);
		} else if ($act == "print") {
			$data['site_info'] = $this->dbapi->getSiteSettings(1);
			$order = $this->dbapi->getOrderById($str);
			if (!empty($order)) {
				$order['order_items'] = $this->dbapi->searchOrderItems(["order_id" => $order['order_id']]);
			}
			$data['order'] = $order;
			$data['site_info'] = $this->dbapi->getSiteSettings(1);
			$data['user'] = $this->dbapi->getOwnerById($_SESSION['USER_ID']);
			$data['from_address'] = $this->dbapi->getUserByRole('ADMIN');
			if (!empty($order['user_id'])) {
				$data['to_address'] = $this->dbapi->getOwnerById($order['user_id']);
			} else {
				$data['to_address'] = $this->dbapi->getUserById($order['created_by']);
			}
			$this->load->view('admin/po-print', $data);
		} else {
			$data['orders'] = $this->dbapi->searchOrders(["admin_visible" => '1']);
			$this->_admin('orders/index', $data);
		}
	}

	public function orders1($act = '', $str = '') {
		$this->header_data['title'] = "Orders";
		_logged();
		$data = array();
		if (!empty($_GET['act']) && $_GET["act"] == "del" && !empty($_GET['order_id'])) {
			$this->dbapi->delOrder($_GET['order_id']);
			$this->dbapi->delOrderItem($_GET['order_id']);
			redirect(base_url() . 'admin/orders/');
		}
		if (!empty($_GET['act']) && $_GET['act'] == 'status' && !empty($_GET['order_id']) && isset($_GET['sta'])) {
			$is_active = (!empty($_GET['sta']) && $_GET['sta'] == '1') ? "1" : "0";
			$this->dbapi->updateOrder(array("is_active" => $is_active), $_GET['order_id']);
			redirect(base_url() . "admin/orders/");
		}
		if ($act == 'edit') {
			if (!empty($_POST['order_id'])) {
				$data['order_status'] = !empty($_POST['order_status']) ? trim($_POST['order_status']) : '';
				$data['approved_by'] = !empty($_SESSION['USER_ID']) ? trim($_SESSION['USER_ID']) : '';
				$data['approved_on'] = date('Y-m-d H:i:s');
				$this->dbapi->updateOrder($data, $_POST['order_id']);
				$_SESSION['message'] = 'Order Updated Successfully';
				redirect(base_url() . "admin/orders/");
			}
			$order = $this->dbapi->getOrderById($str);
			if (!empty($order)) {
				$order['order_items'] = $this->dbapi->searchOrderItems(["order_id" => $order['order_id']]);
			}
			$data['order'] = $order;
			$data['main_products'] = $this->dbapi->getMainProducts();
			$data['sub_products'] = $this->dbapi->getSubProductsList1();
			$data['child_products'] = $this->dbapi->getChildProductsList();
			$this->_admin('orders/form', $data);
		} else if ($act == "po") {
			$data['site_info'] = $this->dbapi->getSiteSettings(1);
			$order = $this->dbapi->getOrderById($str);
			if (!empty($order)) {
				$order['order_items'] = $this->dbapi->searchOrderItems(["order_id" => $order['order_id']]);
			}
			$data['order'] = $order;
			$this->_admin('orders/po', $data);
		} else {
			$data['orders'] = $this->dbapi->searchOrders();
			$this->_admin('orders/index', $data);
		}
	}

	public function printo($order_id = '') {
		$data = [];
		$data['site_info'] = $this->dbapi->getSiteSettings(1);
		$data['order'] = $this->dbapi->getOrderById($order_id);
		$this->load->view("admin/orders/print_po", $data);
	}

	public function downloads($act = '', $str = '') {
		_logged();
		$this->header_data['title'] = "Downloads";
		$data = array();
		if (!empty($_GET['act']) && $_GET['act'] == 'del' && !empty($_GET['download_id'])) {
			$this->dbapi->delAttachment($_GET['download_id']);
			redirect(base_url() . "admin/downloads/");
		}
		if (!empty($_GET['act']) && $_GET['act'] == 'status' && !empty($_GET['download_id']) && isset($_GET['sta'])) {
			$is_active = (!empty($_GET['sta']) && $_GET['sta'] == '1') ? "1" : "0";
			$this->dbapi->updateAttachment(array("is_active" => $is_active), $_GET['download_id']);
			redirect(base_url() . "admin/downloads/");
		}
		if ($act == "add") {
			if (!empty($_POST['title'])) {
				$data['title'] = !empty($_POST['title']) ? trim($_POST['title']) : '';
				$data['video_type'] = !empty($_POST['video_type']) ? trim($_POST['video_type']) : '';
				$data['youtube_url'] = !empty($_POST['youtube_url']) ? trim($_POST['youtube_url']) : '';
				$data['description'] = !empty($_POST['description']) ? trim($_POST['description']) : '';
				$last_id = $this->dbapi->addAttachment($data);
				$folder = 'data/downloads/';
				if (!empty($_FILES['download_file']['name'])) {
					$img = imgUpload('download_file', $folder, slugify($data['title']) . $last_id);
					$this->dbapi->updateAttachment(['download_file' => $img], $last_id);
				}
				$_SESSION['message'] = 'Attachment Added Successfully';
				redirect(base_url() . "admin/downloads/");
			}
			$this->_admin('downloads/form', $data);
		} else if ($act == "edit") {
			if (!empty($_POST['download_id'])) {
				$data['title'] = !empty($_POST['title']) ? trim($_POST['title']) : '';
				$data['youtube_url'] = !empty($_POST['youtube_url']) ? trim($_POST['youtube_url']) : '';
				$data['description'] = !empty($_POST['description']) ? trim($_POST['description']) : '';
				//  $folder = 'data/downloads/';
				if (!empty($_FILES['download_file']['name'])) {
					$data['download_file'] = imgUpload('download_file', $folder, slugify($data['title']) . $_POST['download_id']);
				} //
				// $this->dbapi->updateAttachment($data, $_POST['download_id']);
				$_SESSION['message'] = 'Attachment Added Successfully';
				redirect(base_url() . "admin/downloads/");
			}
			$data['download'] = $this->dbapi->getAttachmentById($str);
			$this->_admin('downloads/form', $data);
		} else {
			$data['downloads'] = $this->dbapi->searchAttachments();
			$this->_admin('downloads/index', $data);
		}
	}

	public function clients($act = '', $str = '') {
		$this->header_data['title'] = "Clients";
		$data = array();
		_logged();
		if (!empty($_GET['act']) && $_GET['act'] == 'del' && !empty($_GET['client_id'])) {
			$this->dbapi->delClient($_GET['client_id']);
			redirect(base_url() . "admin/clients/");
		}
		if (!empty($_GET['act']) && $_GET['act'] == 'status' && !empty($_GET['client_id']) && isset($_GET['sta'])) {
			$is_active = (!empty($_GET['sta']) && $_GET['sta'] == '1') ? "1" : "0";
			$this->dbapi->updateClient(array("is_active" => $is_active), $_GET['client_id']);
			redirect(base_url() . "admin/clients/");
		}
		if ($act == "add") {
			if (!empty($_POST['client_name'])) {
				$data['client_name'] = !empty($_POST['client_name']) ? trim($_POST['client_name']) : '';
				$data['alt_name'] = !empty($_POST['alt_name']) ? slugify($_POST['alt_name']) : '';
				$last_id = $this->dbapi->addClient($data);
				$folder = 'data/clients/';
				if (!empty($_FILES['client_logo']['name'])) {
					$img = imgUpload('client_logo', $folder, slugify($data['client_name']));
					$this->dbapi->updateClient(['client_logo' => $img], $last_id);
				}
				$_SESSION['message'] = 'Client Added Successfully';
				redirect(base_url() . 'admin/clients/');
			}
			$this->_admin('clients/form', $data);
		} else if ($act == "edit") {
			if (!empty($_POST['client_id'])) {
				$data['client_name'] = !empty($_POST['client_name']) ? trim($_POST['client_name']) : '';
				$data['alt_name'] = !empty($_POST['alt_name']) ? slugify($_POST['alt_name']) : '';
				$folder = 'data/clients/';
				if (!empty($_FILES['client_logo']['name'])) {
					$data['client_logo'] = imgUpload('client_logo', $folder, slugify($data['client_name']));
				}
				$this->dbapi->updateClient($data, $_POST['client_id']);
				$_SESSION['message'] = 'Client Added Successfully';
				redirect(base_url() . 'admin/clients/');
			}
			$data['client'] = $this->dbapi->getClientById($str);
			$this->_admin('clients/form', $data);
		} else {
			$data['clients'] = $this->dbapi->searchClients();
			$this->_admin('clients/index', $data);
			//$this->load->view('email/purchase_order', $data);
		}
	}

	public function item_master($act = '', $str = '') {
		$this->header_data['title'] = "Item Master";
		$data = array();
		_logged();
		if (!empty($_GET['act']) && $_GET['act'] == 'del' && !empty($_GET['item_id'])) {
			$this->dbapi->delItem($_GET['item_id']);
			redirect(base_url() . "admin/item-master/");
		}
		if (!empty($_GET['act']) && $_GET['act'] == 'status' && !empty($_GET['item_id']) && isset($_GET['sta'])) {
			$is_active = (!empty($_GET['sta']) && $_GET['sta'] == '1') ? "1" : "0";
			$this->dbapi->updateItem(array("is_active" => $is_active), $_GET['item_id']);
			redirect(base_url() . "admin/item-master/");
		}
		if ($act == "add") {
			if (!empty($_POST['item_name'])) {
				$data['item_name'] = !empty($_POST['item_name']) ? trim($_POST['item_name']) : '';
				$data['hsn_code'] = !empty($_POST['hsn_code']) ? trim($_POST['hsn_code']) : '';
				$data['mrp_price'] = !empty($_POST['mrp_price']) ? trim($_POST['mrp_price']) : '';
				$data['discount'] = !empty($_POST['discount']) ? trim($_POST['discount']) : '';
				$this->dbapi->addItem($data);
				$_SESSION['message'] = 'Item Added Successfully';
				redirect(base_url() . "admin/item-master/");
			}
			$this->_admin('item-master/form', $data);
		} else if ($act == "edit") {
			if (!empty($_POST['item_id'])) {
				$data['item_name'] = !empty($_POST['item_name']) ? trim($_POST['item_name']) : '';
				$data['hsn_code'] = !empty($_POST['hsn_code']) ? trim($_POST['hsn_code']) : '';
				$data['mrp_price'] = !empty($_POST['mrp_price']) ? trim($_POST['mrp_price']) : '';
				$data['discount'] = !empty($_POST['discount']) ? trim($_POST['discount']) : '';
				$this->dbapi->updateItem($data, $_POST['item_id']);
				$_SESSION['message'] = 'Product Updated Successfully';
				redirect(base_url() . "admin/item-master/");
			}
			$data['item'] = $this->dbapi->getItemById($str);
			$this->_admin('item-master/form', $data);
		} else {
			$data['items'] = $this->dbapi->searchItems();
			$this->_admin('item-master/index', $data);
		}
	}

	public function agreement() {
		$this->header_data['title'] = "Agreement";
		$data = array();
		$this->_admin('agreement', $data);
	}

	public function customers($act = '', $str = '') {
		$this->header_data['title'] = "Customers";
		$data = array();
		_logged();
		if (!empty($_GET['act']) && $_GET['act'] == 'del' && !empty($_GET['user_id'])) {
			$this->dbapi->delNewUser($_GET['user_id']);
			redirect(base_url() . "admin/customers/");
		}
		if (!empty($_GET['act']) && $_GET['act'] == 'status' && !empty($_GET['user_id']) && isset($_GET['sta'])) {
			$is_active = (!empty($_GET['sta']) && $_GET['sta'] == '1') ? "1" : "0";
			$this->dbapi->updateNewUser(array("is_active" => $is_active), $_GET['user_id']);
			redirect(base_url() . "admin/customers/");
		}
		if ($act == 'add') {
			if (!empty($_POST['email'])) {
				$data['account_name'] = !empty($_POST['account_name']) ? trim($_POST['account_name']) : '';
				$data['installation_type'] = !empty($_POST['installation_type']) ? trim($_POST['installation_type']) : '';
				$data['project_type'] = !empty($_POST['project_type']) ? trim($_POST['project_type']) : '';
				$data['date_installed'] = !empty($_POST['date_installed']) ? date('Y-m-d', strtotime($_POST['date_installed'])) : '';
				// $data['date_installed'] = !empty($_POST['date_installed']) ? dateForm2DB($_POST['date_installed']) : '';
				$date = $_POST['date_installed'];
				$date = strtotime($date);
				$new_date = strtotime('+ 1 year', $date);
				$final = date('Y-m-d', $new_date);
				$data['subscr_end_date'] = $final;
				$data['dealer_id'] = !empty($_POST['dealer_id']) ? trim($_POST['dealer_id']) : '';
				$data['mac_id'] = !empty($_POST['mac_id']) ? trim($_POST['mac_id']) : '';
				$data['company_name'] = !empty($_POST['company_name']) ? trim($_POST['company_name']) : '';
				$data['first_name'] = !empty($_POST['first_name']) ? trim($_POST['first_name']) : '';
				$data['last_name'] = !empty($_POST['last_name']) ? trim($_POST['last_name']) : '';
				$data['email'] = !empty($_POST['email']) ? trim($_POST['email']) : '';
				$data['password'] = !empty($_POST['password']) ? trim($_POST['password']) : '';
				$data['confirm_password'] = !empty($_POST['confirm_password']) ? trim($_POST['confirm_password']) : '';
				$data['setting_password'] = !empty($_POST['setting_password']) ? trim($_POST['setting_password']) : '';
				$data['confirm_password1'] = !empty($_POST['confirm_password1']) ? trim($_POST['confirm_password1']) : '';
				$data['phone_no'] = !empty($_POST['phone_no']) ? trim($_POST['phone_no']) : '';
				$data['address'] = !empty($_POST['address']) ? trim($_POST['address']) : '';
				$data['city'] = !empty($_POST['city']) ? trim($_POST['city']) : '';
				$data['state'] = !empty($_POST['state']) ? trim($_POST['state']) : '';
				$data['postal_code'] = !empty($_POST['postal_code']) ? trim($_POST['postal_code']) : '';
				$data['country_code'] = !empty($_POST['country_code']) ? trim($_POST['country_code']) : '';
				$data['zone_id'] = !empty($_POST['zone_id']) ? trim($_POST['zone_id']) : '';
				$data['path_id'] = !empty($_POST['path_id']) ? trim($_POST['path_id']) : '0';
				$last_id = $this->dbapi->addNewUser($data);
				if (!empty($pdata['email'])) {
					$pdata['to'] = $pdata['email'];
					$pdata['user_id'] = $last_id;
					$pdata['subject'] = "User Registration";
					$this->sendEmail("user-registration", $pdata);
				}
				$folder = 'data/profile/';
				if (!empty($_FILES['user_logo']['name'])) {
					$img = imgUpload('user_logo', $folder, slugify($data['first_name']));
					$this->dbapi->updateNewUser(['user_logo' => $img], $last_id);
				}
				$_SESSION['message'] = 'Customer added Successfully';
				redirect(base_url() . "admin/customers");
			}
			$data['countries'] = $this->dbapi->getCountryList();
			$data['states'] = $this->dbapi->getStatesList();
			$data['customer'] = $this->dbapi->getOwnerById($str);
			$this->_admin('customers/form', $data);
		} else if ($act == 'edit') {
			if (!empty($_POST['user_id'])) {
				$data['account_name'] = !empty($_POST['account_name']) ? trim($_POST['account_name']) : '';
				$data['installation_type'] = !empty($_POST['installation_type']) ? trim($_POST['installation_type']) : '';
				$data['project_type'] = !empty($_POST['project_type']) ? trim($_POST['project_type']) : '';
				//   $data['date_installed'] = !empty($_POST['date_installed']) ? date('Y-m-d',strtotime($_POST['date_installed'])) : '';
				$data['date_installed'] = !empty($_POST['date_installed']) ? dateForm2DB($_POST['date_installed']) : '';
				$date = !empty($_POST['subscr_end_date']) ? dateForm2DB($_POST['subscr_end_date']) : '';
				$date = strtotime($date);
				//  $new_date = strtotime('+ 1 year', $date);
				$final = date('Y-m-d', $date);
				$data['subscr_end_date'] = $final;
				$data['dealer_id'] = !empty($_POST['dealer_id']) ? trim($_POST['dealer_id']) : '';
				$data['mac_id'] = !empty($_POST['mac_id']) ? trim($_POST['mac_id']) : '';
				$data['company_name'] = !empty($_POST['company_name']) ? trim($_POST['company_name']) : '';
				$data['first_name'] = !empty($_POST['first_name']) ? trim($_POST['first_name']) : '';
				$data['last_name'] = !empty($_POST['last_name']) ? trim($_POST['last_name']) : '';
				$data['email'] = !empty($_POST['email']) ? trim($_POST['email']) : '';
				$data['password'] = !empty($_POST['password']) ? trim($_POST['password']) : '';
				$data['confirm_password'] = !empty($_POST['confirm_password']) ? trim($_POST['confirm_password']) : '';
				$data['setting_password'] = !empty($_POST['setting_password']) ? trim($_POST['setting_password']) : '';
				$data['confirm_password1'] = !empty($_POST['confirm_password1']) ? trim($_POST['confirm_password1']) : '';
				$data['phone_no'] = !empty($_POST['phone_no']) ? trim($_POST['phone_no']) : '';
				$data['address'] = !empty($_POST['address']) ? trim($_POST['address']) : '';
				$data['city'] = !empty($_POST['city']) ? trim($_POST['city']) : '';
				$data['state'] = !empty($_POST['state']) ? trim($_POST['state']) : '';
				$data['postal_code'] = !empty($_POST['postal_code']) ? trim($_POST['postal_code']) : '';
				$data['country_code'] = !empty($_POST['country_code']) ? trim($_POST['country_code']) : '';
				$data['zone_id'] = !empty($_POST['zone_id']) ? trim($_POST['zone_id']) : '';
				$data['path_id'] = !empty($_POST['path_id']) ? trim($_POST['path_id']) : '0';
				if (!empty($pdata['email'])) {
					$pdata['to'] = $pdata['email'];
					$pdata['user_id'] = $_POST['user_id'];
					$pdata['subject'] = "User Registration";
					//  $this->sendEmail("user-registration", $pdata);
				}
				$folder = 'data/profile/';
				if (!empty($_FILES['user_logo']['name'])) {
					$data['user_logo'] = imgUpload('user_logo', $folder, slugify($data['first_name']));
				}
				$product_id = $mdata['product_id'] = !empty($_POST['product_id']) ? trim($_POST['product_id']) : '';
				$mdata['user_id'] = !empty($_POST['user_id']) ? trim($_POST['user_id']) : '';
				$qdata['mac_id'] = $mdata['mac_id'] = $mac_id = $data['mac_id'];
				$mac = $this->dbapi->getMacFromMacLog($data['mac_id']);
				if (!empty($mac) && $mac['mac_id'] == $data['mac_id']) {
					$this->dbapi->updateMacLogByUserId($mdata, $data['mac_id']);
				} else {
					$this->dbapi->addMacLogData($mdata);
				}
				$this->dbapi->updateOrderItemByUserId($mac_id, $product_id, $_POST['user_id']);
				$this->dbapi->updateMacDetailsByUserId($qdata, $_POST['user_id']);
				$this->dbapi->updateNewUser($data, $_POST['user_id']);
				$_SESSION['message'] = 'Customer Updated Successfully';
				redirect(base_url() . "admin/customers");
			}
			$data['countries'] = $this->dbapi->getCountryList();
			$data['states'] = $this->dbapi->getStatesList();
			$data['zones'] = $this->dbapi->getZonesList1();
			$data['customer'] = $this->dbapi->getOwnerById($str);
			$this->_admin('customers/form', $data);
		} else if ($act == 'view') {

			$data['customer'] = $this->dbapi->getOwnerById($str);

			$data['orders'] = $this->dbapi->searchOrders(['user_id' => $str]);
			$this->_admin('customers/view', $data);
		} else {
			if (isset($_GET['select_type']) && !empty($_GET['select_type']) && !empty($_GET['name'])) {
				$type = $_GET['select_type'];
				$query = $_GET['name'];
				$data['users'] = $this->dbapi->searchNewUsers(["type" => $type, "query" => $query]);
			} else {
				$data['users'] = $this->dbapi->searchNewUsers();
			}
			$this->_admin('customers/index', $data);
		}
	}

	public function tickets($act = '', $str = '') {
		$this->header_data['title'] = "Ticketing System";
		if (!empty($_GET['ticket_id']) && $_GET['act'] == 'del') {
			$this->dbapi->delTicket($_GET['ticket_id']);
			$_SESSION['message'] = 'Ticket Deleted Successfully';
			redirect(base_url() . 'admin/tickets');
		}
		$data = array();
		_logged();
		if ($act == 'add') {
			if (!empty($_POST['ticket_issue_title'])) {
				$data['ticket_issue_title'] = !empty($_POST['ticket_issue_title']) ? trim($_POST['ticket_issue_title']) : '';
				$data['priority'] = !empty($_POST['priority']) ? trim($_POST['priority']) : '';
				$data['product_name'] = !empty($_POST['product_name']) ? trim($_POST['product_name']) : '';
				$data['dealer_id'] = !empty($_SESSION['USER_ID']) ? trim($_SESSION['USER_ID']) : '';
				$this->dbapi->addTicket($data);
				$_SESSION['message'] = 'Ticket Raised Successfully';
				redirect(base_url() . 'admin/tickets');
			}
			$products = $this->dbapi->searchProducts(["is_active" => '1']);
			if (!empty($products)) {
				foreach ($products as &$product) {
					if (!empty($product)) {
						$child_product = $this->dbapi->searchProducts(["is_active" => '1', 'key' => $product['product_id']]);
						if (!empty($child_product)) {
							foreach ($child_product as &$sub_child) {
								$childproduct_info = $this->dbapi->searchProducts(["is_active" => '1', 'key' => $sub_child['product_id']]);
								if (!empty($childproduct_info)) {
									foreach ($childproduct_info as &$info) {
										$information = $this->dbapi->searchChildProductInfo(['product_id' => $info['product_id']]);
										$info['product_details'] = $information;
									}
								}
								$sub_child['child_products'] = $childproduct_info;
							}
							$product['sub_products'] = $child_product;
						}
					}
				}
			}
			$data['products'] = $products;
			$this->_admin('tickets/form', $data);
		} else if ($act == 'edit') {
			if (!empty($_POST['ticket_id'])) {
				$data['issue_status'] = !empty($_POST['issue_status']) ? trim($_POST['issue_status']) : '';
				$data['admin_description'] = !empty($_POST['admin_description']) ? trim($_POST['admin_description']) : '';
				$this->dbapi->updateTicket($data, $_POST['ticket_id']);
				$_SESSION['message'] = 'Ticket Updated Successfully';
				redirect(base_url() . 'admin/tickets');
			}

			$products = $this->dbapi->searchProducts(["is_active" => '1']);
			if (!empty($products)) {
				foreach ($products as &$product) {
					if (!empty($product)) {
						$child_product = $this->dbapi->searchProducts(["is_active" => '1', 'key' => $product['product_id']]);
						if (!empty($child_product)) {
							foreach ($child_product as &$sub_child) {
								$childproduct_info = $this->dbapi->searchProducts(["is_active" => '1', 'key' => $sub_child['product_id']]);
								if (!empty($childproduct_info)) {
									foreach ($childproduct_info as &$info) {
										$information = $this->dbapi->searchChildProductInfo(['product_id' => $info['product_id']]);
										$info['product_details'] = $information;
									}
								}
								$sub_child['child_products'] = $childproduct_info;
							}
							$product['sub_products'] = $child_product;
						}
					}
				}
			}
			$data['products'] = $products;
			$data['ticket'] = $this->dbapi->getTicketById($str);
			$this->_admin('tickets/form', $data);
		} else {
			$data['tickets'] = $this->dbapi->searchTickets();
			$this->_admin('tickets/index', $data);
		}

	}

	public function profile() {
		$this->header_data['title'] = "Profile";
		$data = array();
		if (!empty($_POST['member_id'])) {
			$data['user_name'] = !empty($_POST['user_name']) ? trim($_POST['user_name']) : '';
			$data['first_name'] = !empty($_POST['first_name']) ? trim($_POST['first_name']) : '';
			$data['last_name'] = !empty($_POST['last_name']) ? trim($_POST['last_name']) : '';
			$data['email'] = !empty($_POST['email']) ? trim($_POST['email']) : '';
			$data['password'] = !empty($_POST['password']) ? trim($_POST['password']) : '';
			$data['confirm_password'] = !empty($_POST['confirm_password']) ? trim($_POST['confirm_password']) : '';
			$data['address'] = !empty($_POST['address']) ? trim($_POST['address']) : '';
			$data['phone_no'] = !empty($_POST['phone_no']) ? trim($_POST['phone_no']) : '';
			$folder = 'data/profile/';
			if (!empty($_FILES['profile_logo']['name'])) {
				$data['profile_logo'] = imgUpload('profile_logo', $folder, slugify($data['user_name']));
			}
			$this->dbapi->updateUser($data, $_POST['member_id']);
			$_SESSION['message'] = 'Profile Updated Successfully';
			redirect(base_url() . "admin/profile");
		}
		$data['profile'] = $this->dbapi->getUserById($_SESSION['USER_ID']);
		$this->_admin('profile', $data);
	}

	public function settings() {
		$this->header_data['title'] = "Site Settings";
		$data = array();
		if (!empty($_POST['pk_id'])) {
			$data['web_url'] = !empty($_POST['web_url']) ? trim($_POST['web_url']) : '';
			$data['email'] = !empty($_POST['email']) ? trim($_POST['email']) : '';
			$data['is_mail_send'] = !empty($_POST['is_mail_send']) ? trim($_POST['is_mail_send']) : '';
			$data['state'] = !empty($_POST['state']) ? trim($_POST['state']) : '';
			$data['address'] = !empty($_POST['address']) ? trim($_POST['address']) : '';
			$data['agreement'] = !empty($_POST['agreement']) ? trim($_POST['agreement']) : '';
			$data['privacy_policy'] = !empty($_POST['privacy_policy']) ? trim($_POST['privacy_policy']) : '';
			$data['about_us'] = !empty($_POST['about_us']) ? trim($_POST['about_us']) : '';
			$data['meta_description'] = !empty($_POST['meta_description']) ? trim($_POST['meta_description']) : '';
			$data['meta_keywords'] = !empty($_POST['meta_keywords']) ? trim($_POST['meta_keywords']) : '';
			$data['google_map'] = !empty($_POST['google_map']) ? trim($_POST['google_map']) : '';
			$data['facebook'] = !empty($_POST['facebook']) ? trim($_POST['facebook']) : '#';
			$data['twitter'] = !empty($_POST['twitter']) ? trim($_POST['twitter']) : '#';
			$data['youtube'] = !empty($_POST['youtube']) ? trim($_POST['youtube']) : '#';
			$data['instagram'] = !empty($_POST['instagram']) ? trim($_POST['instagram']) : '#';
			$folder = 'data/settings/';
			if (!empty($_FILES['logo']['name'])) {
				$data['logo'] = imgUpload('logo', $folder, 'Logo');
			}
			$this->dbapi->updateSiteSettings($data, $_POST['pk_id']);
			$_SESSION['message'] = 'Site Settings Updated Successfully';
			redirect(base_url() . "admin/settings");
		}
		$data['states'] = $this->dbapi->getStatesList();
		$data['settings'] = $this->dbapi->getSiteSettings($_SESSION['USER_ID']);
		$this->_admin('site-settings', $data);
	}

	public function forgot_password() {
		$data = [];
		$this->header_data['title'] = ":: Forget Password ::";
		if (!empty($_POST['FORGOT']) && !empty($_POST['email'])) {
			$user = $this->dbapi->getUserByEmail($_POST['email']);
			if (!empty($user['member_id'])) {
				$reset_token = generateOTP(6);
				$this->dbapi->updateUser(["reset_token" => $reset_token], $user['member_id']);
				$person['reset_token'] = $reset_token;
				$person['to'] = $user['email'];
				$person['to_name'] = $user['first_name'] . ' ' . $user['last_name'];
				$person['password'] = $user['password'];
				$person['subject'] = "Reset Password";
				$this->sendEmail("email/forgot_pwd", $person);
				$_SESSION['message'] = "Please Check Your Email to Reset Password";
				redirect(base_url());
			} else {
				$_SESSION['error'] = "Your Email is not in Our Records..!";
				redirect(base_url());
			}
		}
		$this->load->view("forgot-pwd", $data);
	}

	public function reset_password() {
		$data = [];
		if (!empty($this->_REQ['reset']) && !empty($_POST['password']) && !empty($_POST['confirm_password'])) {
			$user = $this->dbapi->getUserByTokenFromMembers($this->_REQ['reset']);
			if (!empty($user['member_id'])) {
				if (trim($_POST['password']) == trim($_POST['confirm_password'])) {
					$this->dbapi->updateUser(["password" => trim($_POST['password']), "confirm_password" => trim($_POST['confirm_password']), "reset_token" => ""], $user['member_id']);
					$_SESSION['message'] = "Your Password Updated Successfully..!";
					redirect(base_url());
				} else {
					$_SESSION['message'] = "Your Password and Retype Password must same!";
				}
			} else {
				$_SESSION['warning'] = "Invalid request or already expired your request!";
				redirect(base_url());
			}
		}
		$this->load->view("reset-password", $data);
	}

	public function logout() {
		$_SESSION = [];
		$this->session->sess_destroy();
		$_SESSION['error'] = "All sessions are destroyed";
		if (isset($_GET)) {
			redirect(base_url());
		} else {
			redirect(base_url());
		}
	}
}

?>