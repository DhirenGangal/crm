<?php

class DBAPI extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->load->library(array('cart'));
		$this->load->library('');
		$this->load->helper('url');
		$this->load->database();
	}

	function getOrdersCnt() {
		$this->db->select("COUNT(1) as CNT");
		$this->db->order_by("m.order_no DESC");
		$query = $this->db->get("tbl_orders m");
		if ($query->num_rows() > 0) {
			$row = $query->row_array();
			return $row['CNT'];
		}
		return false;
	}

	function checkMemberExists($email) {
		$this->db->select("m.email");
		$this->db->where("m.email like '%" . $email . "%'");
		$this->db->where("m.role", "DEALER");
		$query = $this->db->get("tbl_members m");
		if ($query->num_rows() > 0) {
			return true;
		}
		return false;
	}

	function checkClientExists($client_name) {
		$this->db->select("m.client_name");
		$this->db->where("m.client_name LIKE '%" . $client_name . "%'");
		$query = $this->db->get("tbl_clients m");
		if ($query->num_rows() > 0) {
			return true;
		}
		return false;
	}

	function checkCustomerExists($email) {
		$this->db->select("m.email");
		$this->db->where("m.email LIKE '%" . $email . "%'");
		$query = $this->db->get("tbl_users m");
		if ($query->num_rows() > 0) {
			return true;
		}
		return false;
	}

	function getMainProductList() {
		$this->db->select("m.*");
		$this->db->where("m.parent_id", "0");
		$query = $this->db->get("tbl_products m");
		if ($query->num_rows() > 0) {
			$rows = array();
			foreach ($query->result_array() as $row) {
				$rows[$row['product_id']] = $row['product_name'];
			}
			return $rows;
		}
		return false;
	}

	function getRolesList() {
		$this->db->select("m.*");
		//  $this->db->where_not_in("m.role", 'CLIENT');
		$query = $this->db->get("tbl_members m");
		if ($query->num_rows() > 0) {
			$rows = array();
			foreach ($query->result_array() as $row) {
				$rows[$row['member_id']] = $row['role'];
			}
			return $rows;
		}
		return false;
	}

	function getStatesList() {
		$this->db->select("m.*");
		$query = $this->db->get("tbl_states m");
		if ($query->num_rows() > 0) {
			$rows = array();
			foreach ($query->result_array() as $row) {
				$rows[$row['state_code']] = $row['state_name'];
			}
			return $rows;
		}
		return false;
	}

	function getProductDetailsByName($product_name) {
		$this->db->select("m.*");
		$this->db->where("m.product_name", $product_name);
		$query = $this->db->get("tbl_products m");
		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
	}

	function getItemMasterListDB($s = []) {
		$this->db->select("m.*");
		if (!empty($s['item_id'])) {
			$this->db->where('m.item_id', $s['item_id']);
		}
		if (!empty($s['item_name'])) {
			$this->db->where("m.item_name LIKE '%" . $s['item_name'] . "%'");
		}
		$query = $this->db->get("tbl_item_master m");
		if ($query->num_rows() > 0) {
			$rows = [];
			foreach ($query->result_array() as $row) {
				$rows[$row['item_id']] = $row['item_name'];
			}
			return $rows;
		}
		return false;
	}

	function getHsnCodeListDB($s = []) {
		$this->db->select("m.*");
		if (!empty($s['pk_id'])) {
			$this->db->where('m.pk_id', $s['pk_id']);
		}
		if (!empty($s['hsn_code'])) {
			$this->db->where("m.hsn_code LIKE '%" . $s['hsn_code'] . "%'");
		}
		$query = $this->db->get("tbl_hsn_codes m");
		if ($query->num_rows() > 0) {
			$rows = [];
			foreach ($query->result_array() as $row) {
				$rows[$row['pk_id']] = $row['hsn_code'];
			}
			return $rows;
		}
		return false;
	}

	function getCustomersList() {
		$this->db->select("m.*");
		$query = $this->db->get("tbl_users m");
		if ($query->num_rows() > 0) {
			$rows = array();
			foreach ($query->result_array() as $row) {
				$rows[$row['user_id']] = $row['first_name'] . ' ' . $row['last_name'];
			}
			return $rows;
		}
		return false;
	}

	function getMainProducts() {
		$this->db->select("m.*");
		$this->db->where("parent_id", "0");
		$this->db->where("is_active", "1");
		$query = $this->db->get('tbl_products m');
		if ($query->num_rows() > 0) {
			$rows = array();
			foreach ($query->result_array() as $row) {
				$rows[$row['product_id']] = $row['product_name'];
			}
			return $rows;
		}
		return false;
	}

	function getSubProductsList($parent_id) {
		$this->db->select("m.*");
		$this->db->where("m.parent_id", "$parent_id");
		$this->db->where("m.is_active", "1");
		$query = $this->db->get('tbl_products m');
		//
		if ($query->num_rows() > 0) {
			$rows = array();
			foreach ($query->result_array() as $row) {
				$rows[$row['product_id']] = $row['product_name'];
			}
			return $rows;
		}
		return false;
	}

	function getMembersList() {
		$this->db->select("m.*");
		$query = $this->db->get("tbl_members m");
		if ($query->num_rows() > 0) {
			$rows = array();
			foreach ($query->result_array() as $row) {
				$rows[$row['member_id']] = $row['first_name'] . ' ' . $row['last_name'];
			}
			return $rows;
		}
		return false;
	}

	function getGSTByHsnCodeDB($hsn_code) {
		$this->db->select("m.*");
		$this->db->where("m.hsn_code", "$hsn_code");
		$query = $this->db->get('tbl_hsn_codes m');
		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
	}

	function getSubProductsList1() {
		$this->db->select("m.*");
		$query = $this->db->get('tbl_products m');
		if ($query->num_rows() > 0) {
			$rows = array();
			foreach ($query->result_array() as $row) {
				$rows[$row['product_id']] = $row['product_name'];
			}
			return $rows;
		}
		return false;
	}

	function getChildProductsList() {
		$this->db->select("m.*");
		$query = $this->db->get('tbl_products m');
		if ($query->num_rows() > 0) {
			$rows = array();
			foreach ($query->result_array() as $row) {
				$rows[$row['product_id']] = $row['product_name'];
			}
			return $rows;
		}
		return false;
	}

	function getProductPriceDetails($product_id) {
		$this->db->select("m.dealer_price,m.mrp_price,p.product_name");
		$this->db->where("m.product_id", $product_id);
		$this->db->join("tbl_products p", "p.product_id = m.product_id");
		$query = $this->db->get("tbl_product_info m");
		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
	}

	function orderNo() {
		$this->db->select("m.order_no");
		$query = $this->db->get("tbl_orders m");
		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
	}

	function getCountryList() {
		$this->db->select("m.*");
		$query = $this->db->get('tbl_countries m');
		if ($query->num_rows() > 0) {
			$rows = array();
			foreach ($query->result_array() as $row) {
				$rows[$row['country_code']] = $row['country_name'];
			}
			return $rows;
		}
		return false;
	}

	function getZonesList($country_code) {
		$this->db->select("m.*");
		$this->db->where("m.country_code", $country_code);
		$query = $this->db->get('tbl_zones m');
		if ($query->num_rows() > 0) {
			$rows = array();
			foreach ($query->result_array() as $row) {
				$rows[$row['zone_id']] = $row['zone_name'];
			}
			return $rows;
		}
		return false;
	}

	function getZonesList1() {
		$this->db->select("m.*");
		$query = $this->db->get('tbl_zones m');
		if ($query->num_rows() > 0) {
			$rows = array();
			foreach ($query->result_array() as $row) {
				$rows[$row['zone_id']] = $row['zone_name'];
			}
			return $rows;
		}
		return false;
	}

	function userLogin($email, $pwd) {
		$this->db->select("u.*,r.role");
		$this->db->where("u.email", $email);
		$this->db->where("u.password", $pwd);
		$this->db->where("u.is_active", '1');
		$this->db->join("tbl_members r", "r.role=u.role");
		$query = $this->db->get("tbl_members u");
		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
	}

	function checkUserEmail($email, $member_id = '') {
		$this->db->select("m.*");
		$this->db->where("email", $email);
		if (!empty($member_id)) {
			$this->db->where("$member_id !=", $member_id);
		}
		$query = $this->db->get("tbl_members m");
		if ($query->num_rows() > 0) {
			return true;
		}
		return false;
	}

	function checkEmailExists($email) {
		$this->db->select("m.email");
		$this->db->where("m.email like '%" . $email . "%'");
		$query = $this->db->get("tbl_users m");
		if ($query->num_rows() > 0) {
			return true;
		}
		return false;
	}

	function checkDealerEmailExists($email) {
		$this->db->select("m.email");
		$this->db->where("m.email like '%" . $email . "%'");
		$this->db->where("m.role", "DEALER");
		$query = $this->db->get("tbl_members m");
		if ($query->num_rows() > 0) {
			return true;
		}
		return false;
	}

	function getMacOrderStatus($order_item_id) {
		$this->db->select("m.order_item_id");
		$this->db->where("m.order_item_id", $order_item_id);
		$query = $this->db->get("tbl_mac_ids m");
		if ($query->num_rows() > 0) {
			return true;
		}
		return false;
	}

	function checkProductExists($product_name) {
		$this->db->select("m.product_name");
		$this->db->where("m.product_name", $product_name);
		$query = $this->db->get("tbl_products m");
		if ($query->num_rows() > 0) {
			return true;
		}
		return false;
	}

	function checkOrderNoExists($order_no) {
		$this->db->select("m.order_no");
		$this->db->where("m.order_no", $order_no);
		$query = $this->db->get("tbl_orders m");
		if ($query->num_rows() > 0) {
			return true;
		}
		return false;
	}

	function ownerLogin($email, $pwd) {
		$this->db->select("u.*");
		$this->db->where("u.email", $email);
		$this->db->where("u.password", $pwd);
		$this->db->where("u.is_active", '1');
		$query = $this->db->get("tbl_users u");

		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
	}

	function getOwnerById($user_id) {
		$this->db->select("m.*,c.country_name,s.state_name,CONCAT_WS('',mem.first_name,mem.last_name) as dealer_name,mem.state as ofc_state,oi.product_id");
		$this->db->where("m.user_id", $user_id);
		$this->db->join("tbl_countries c", "c.country_code = m.country_code", "LEFT");
		$this->db->join("tbl_states s", "s.state_code = m.state", "LEFT");
		$this->db->join("tbl_members mem", "mem.member_id = m.dealer_id", "LEFT");
		$this->db->join("tbl_order_items oi", "oi.mac_id = m.mac_id", "LEFT");
		$query = $this->db->get("tbl_users m");
		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
	}

	function getCustomersByCustom($key, $value) {
		$this->db->select("m.pk_id,CONCAT_WS(' ',m.first_name,m.last_name) as customer_name,q.company_name,q.company_mail,q.phone as company_mobile,q.gst_no,q.contact_name,cc.company_id,m.email,m.customer_id,m.branch_id,m.customer_no,m.mobile,m.img,m.img_path,m.thumb_img", FALSE);
		$this->db->where("m.branch_id", $_SESSION['BRANCH_ID']);
		if (!empty($key) && $key == 'mobile') {
			$this->db->where("m.mobile", $value);
		} elseif (!empty($key) && $key == 'email') {
			$this->db->where("m.email", $value);
		} elseif (!empty($key) && $key == 'name') {
			$this->db->where("m.first_name LIKE '%" . $value . "%' OR m.last_name LIKE '%" . $value . "%'");
		} elseif (!empty($key) && $key == 'customer_id') {
			$this->db->where("(m.customer_no LIKE '%" . $value . "' OR m.customer_id = '" . $value . "' )");
		}
		$this->db->join("tbl_company_customers cc", "cc.customer_id = m.pk_id", "LEFT");
		$this->db->join("tbl_client_companies q", "q.pk_id = cc.company_id", "LEFT");
		$query = $this->db->get("tbl_customers m");
		//echo $this->db->last_query();
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}

		return false;
	}

	function addNewUser($pdata) {
		$this->db->set("created_on", "NOW()", false);
		$this->db->insert("tbl_users", $pdata);
		return $this->db->insert_id();
	}

	function updateNewUser($pdata, $user_id) {
		$this->db->where("user_id", $user_id);
		return $this->db->update("tbl_users", $pdata);

	}

	function delNewUser($user_id) {
		$this->db->where("user_id", $user_id);
		return $this->db->delete("tbl_users");
	}

	function getUserByTokenFromMembers($reset_token) {
		$this->db->select("m.*");
		$this->db->where("m.reset_token", $reset_token);
		$query = $this->db->get("tbl_members m");
		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
	}

	function getUserByToken($reset_token) {
		$this->db->select("m.*");
		$this->db->where("m.reset_token", $reset_token);
		$query = $this->db->get("tbl_users m");
		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
	}

	function searchNewUsers($s = array(), $mode = "DATA") {
		if ($mode == "CNT") {
			$this->db->select("COUNT(1) as CNT");
		} else {
			$this->db->select("m.*");
		}
		if (isset($s['is_active'])) {
			$this->db->where("m.is_active", $s['is_active']);
		}
		if (isset($s['type']) && $s['type'] == 'account_name') {
			$this->db->where("m.account_name LIKE '%" . $s['query'] . "%'");
		} elseif (isset($s['type']) && $s['type'] == 'email') {
			$this->db->where("m.email LIKE '%" . $s['query'] . "%'");
		} elseif (isset($s['type']) && $s['type'] == 'mac_id') {
			$this->db->where("m.mac_id", $s['query']);
		}
		if (isset($s['limit']) && isset($s['offset'])) {
			$this->db->limit($s['limit'], $s['offset']);
		}
		$this->db->order_by("m.user_id DESC");
		$query = $this->db->get("tbl_users m");
		// echo $this->db->last_query();
		if ($query->num_rows() > 0) {
			if ($mode == "CNT") {
				$row = $query->row_array();
				return $row['CNT'];
			}
			return $query->result_array();
		}
		return false;
	}

	function addUser($pdata) {
		$this->db->set("created_on", "NOW()", false);
		$this->db->insert("tbl_members", $pdata);
		return $this->db->insert_id();
	}

	function updateUser($pdata, $member_id) {
		$this->db->where("member_id", $member_id);
		return $this->db->update("tbl_members", $pdata);
	}

	function delUser($member_id) {
		$this->db->where("member_id", $member_id);
		return $this->db->delete("tbl_members");
	}

	function getUserByEmail($email) {
		$this->db->select("m.*");
		$this->db->where("m.email", $email);
		$query = $this->db->get("tbl_members m");
		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
	}

	function getUserByEmailFromUsers($email) {
		$this->db->select("m.*");
		$this->db->where("m.email", $email);
		$query = $this->db->get("tbl_members m");
		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
	}

	function getUserById($member_id) {
		//$this->db->select("m.*,c.country_name,s.state_name");
		$this->db->select("m.*,s.state_name");
		$this->db->where("m.member_id", $member_id);
		//  $this->db->join("tbl_countries c", "c.country_code = m.country_code");
		$this->db->join("tbl_states s", "s.state_code = m.state", "LEFT");
		$query = $this->db->get("tbl_members m");
		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
	}

	function getUserByRole($role) {
		$this->db->select("m.*");
		$this->db->where("m.role", $role);
		$query = $this->db->get("tbl_members m");
		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
	}

	function searchUsers($s = array(), $mode = "DATA") {
		if ($mode == "CNT") {
			$this->db->select("COUNT(1) as CNT");
		} else {
			$this->db->select("m.*");
		}
		if (isset($s['created_by'])) {
			$this->db->where("m.created_by", $s['created_by']);
		}
		if (isset($s['role']) && !empty($s['role'])) {
			$this->db->where("m.role", $s['role']);
		}
		if (isset($s['is_active'])) {
			$this->db->where("m.is_active", $s['is_active']);
		}
		if (isset($s['limit']) && isset($s['offset'])) {
			$this->db->limit($s['limit'], $s['offset']);
		}
		$this->db->order_by("m.member_id DESC");
		$query = $this->db->get("tbl_members m");
		//
		if ($query->num_rows() > 0) {
			if ($mode == "CNT") {
				$row = $query->row_array();
				return $row['CNT'];
			}
			return $query->result_array();
		}
		return false;
	}

	//Product
	function addProduct($pdata) {
		$this->db->set("created_on", "NOW()", false);
		$this->db->insert("tbl_products", $pdata);
		return $this->db->insert_id();
	}

	function delProduct($product_id) {
		$this->db->where("product_id", $product_id);
		return $this->db->delete("tbl_products");
	}

	function updateProduct($pdata, $product_id) {
		$this->db->where("product_id", $product_id);
		return $this->db->update("tbl_products", $pdata);
	}

	function getProductsByParentId($parent_id) {
		$this->db->select("m.*");
		$this->db->where("m.parent_id", $parent_id);
		$query = $this->db->get("tbl_products m");
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
		return false;
	}

	function getProductById($product_id) {
		$this->db->select("m.*");
		$this->db->where("m.product_id", $product_id);

		$query = $this->db->get("tbl_products m");
		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
	}

	function searchProducts($s = array(), $mode = "DATA") {
		if ($mode == "CNT") {
			$this->db->select("COUNT(1) as CNT");
		} else {
			//$this->db->select("m.product_id");
			$this->db->select("m.*,p.product_name as main_product");
		}
		if (!empty($s['is_active']) && ($s['is_active'] == '1')) {
			$this->db->where("m.is_active", $s['is_active']);
		}
		if (!empty($s['key'])) {
			$this->db->where("m.parent_id", $s['key']);
		} else {
			$this->db->where("m.parent_id", '0');
		}
		if (isset($s['limit']) && isset($s['offset'])) {
			$this->db->limit($s['limit'], $s['offset']);
		}
		$this->db->order_by("m.product_id ASC");
		//       $this->db->group_by("m.product_id");

		$this->db->join("tbl_products p", "p.product_id=m.parent_id", "LEFT");
		$query = $this->db->get("tbl_products m");
		if ($query->num_rows() > 0) {
			if ($mode == "CNT") {
				$row = $query->row_array();
				return $row['CNT'];
			}
			return $query->result_array();
		}
		return false;
	}

//Child Product
	function addChildProductInfo($pdata) {
		$this->db->insert("tbl_product_info", $pdata);
		return $this->db->insert_id();
	}

	function updateChildProductInfo($pdata, $product_info_id) {
		$this->db->where("product_info_id", $product_info_id);
		return $this->db->update("tbl_product_info", $pdata);

	}

	function delChildProductInfoByProductId($product_id) {
		$this->db->where("product_id", $product_id);

		return $this->db->delete("tbl_product_info");
	}

	function delChildProductInfo($product_info_id) {
		$this->db->where("product_info_id", $product_info_id);

		return $this->db->delete("tbl_product_info");
	}

	function getChildProductInfoById($product_info_id) {
		$this->db->select("m.*,csp.product_id ,csp.product_name as child_product_name,sp.product_id as sub_prodcut_id,sp.product_name as sub_product_name,sp.product_logo as sub_product_img,p.product_id as main_product_id,p.product_name as main_product_name,csp.product_logo");
		$this->db->where("m.product_info_id", $product_info_id);
		$this->db->join("tbl_products csp", "csp.product_id=m.product_id");
		$this->db->join("tbl_products sp", "sp.product_id=csp.parent_id");
		$this->db->join("tbl_products p", "p.product_id=sp.parent_id");
		$query = $this->db->get("tbl_product_info m");
		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
	}

	function searchChildProductInfo1($s = array(), $mode = "DATA") {
		if ($mode == "CNT") {
			$this->db->select("COUNT(1) as CNT");
		} else {
			$this->db->select("m.*,csp.product_id,p.product_logo,csp.product_name as child_product_name,sp.product_name as sub_prodcut_name,p.product_name as main_product_name,GROUP_CONCAT(value_range) as price_range,GROUP_CONCAT(dealer_price) as dealer_price");
		}
		if (!empty($s['product_id'])) {
			$this->db->where("sp.product_id", $s['product_id']);
		}
		if (!empty($s['is_active']) && ($s['is_active'] == '1')) {
			$this->db->where("m.is_active", $s['is_active']);
		}
		if (isset($s['limit']) && isset($s['offset'])) {
			$this->db->limit($s['limit'], $s['offset']);
		}
		$this->db->join("tbl_products p", "p.product_id=m.product_id", "LEFT");
		$this->db->join("tbl_products sp", "sp.product_id=p.parent_id", "LEFT");
		$this->db->join("tbl_products csp", "csp.product_id=sp.parent_id", "LEFT");
		$this->db->join("tbl_ranges r", "r.product_id=p.parent_id", "LEFT");
		$this->db->order_by("m.product_info_id DESC");
		$this->db->group_by("m.product_info_id ASC");
		$query = $this->db->get("tbl_product_info m");
		if ($query->num_rows() > 0) {
			if ($mode == "CNT") {
				$row = $query->row_array();
				return $row['CNT'];
			}
			return $query->result_array();
		}
		return false;
	}

	function searchChildProductInfo($s = array(), $mode = "DATA") {
		if ($mode == "CNT") {
			$this->db->select("COUNT(1) as CNT");
		} else {
			// $this->db->select("i.product_info_id");
			//$this->db->select("i.product_info_id,i.gst,i.is_active,i.mrp_price,i.discount,i.product_id as info_product_id,i.description_1,i.datasheet,i.hsn_code,p.product_name as main_product_name,sp.product_name as sub_product_name,csp.product_name as child_product_name,csp.product_logo");
			$this->db->select("i.*,ip.path_name,dp.path_name as datasheet_path,csp.product_id,csp.product_logo,csp.product_name as child_product_name,sp.product_name as sub_product_name,p.product_name as main_product_name,GROUP_CONCAT(r.value_range) as price_range,
            GROUP_CONCAT(r.dealer_price) as dealer_price,csp.product_url,csp.seo_title,csp.seo_keywords,csp.seo_description,csp.created_on");
		}
		if (!empty($s['is_active'])) {
			$this->db->where("i.is_active", $s['is_active']);
		}
		if (isset($s['limit']) && isset($s['offset'])) {
			$this->db->limit($s['limit'], $s['offset']);
		}
		if (isset($s['product_id'])) {
			$this->db->where("i.product_id", $s['product_id']);
		}
		$this->db->join("tbl_products csp", "csp.product_id=i.product_id", "LEFT");
		$this->db->join("tbl_products sp", "csp.parent_id=sp.product_id", "LEFT");
		$this->db->join("tbl_products p", "sp.parent_id=p.product_id", "LEFT");
		$this->db->join("tbl_ranges r", "r.product_id=csp.product_id", "LEFT");
		$this->db->join("tbl_image_paths ip", "ip.path_id=csp.path_id", "LEFT");
		$this->db->join("tbl_image_paths dp", "dp.path_id=i.datasheet_path_id", "LEFT");
		$this->db->order_by("i.product_info_id DESC");
		$query = $this->db->get("tbl_product_info i");

		if ($query->num_rows() > 0) {
			if ($mode == "CNT") {
				$row = $query->row_array();
				return $row['CNT'];
			}
			return $query->result_array();
		}
		return false;
	}

//add Item
	function addItemMaster($pdata) {
		$this->db->insert("tbl_item_master", $pdata);
		return $this->db->insert_id();
	}

	function getItemMasterById($item_id) {
		$this->db->select("m.*");
		$this->db->where("m.item_id", $item_id);
		$query = $this->db->get("tbl_item_master m");
		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
	}

	function getItemMasterByName($item_name) {
		$this->db->select("m.*");
		$this->db->where("m.item_name LIKE '%" . $item_name . "%'");
		$query = $this->db->get("tbl_item_master m");
		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
	}

//Mac Log Data
	function addMacLogData($mdata) {
		$date = date('Y-m-d');
		$this->db->set("created_on", $date);
		$this->db->insert("tbl_mac_log", $mdata);
		return $this->db->insert_id();
	}

	function updateMacLogData($pdata, $changed_on) {
		$this->db->where("changed_on", $changed_on);
		return $this->db->update("tbl_mac_log", $pdata);
	}

	function updateMacLogByUserId($pdata, $user_id) {
		$this->db->where("user_id", $user_id);
		return $this->db->update("tbl_mac_log", $pdata);
	}

	function updateMacLogByMacId($pdata, $mac_id) {
		$this->db->where("mac_id", $mac_id);
		return $this->db->update("tbl_mac_log", $pdata);
	}

//Mac Data

	function addMacData($mdata) {
		$this->db->insert("tbl_mac_ids", $mdata);
		return $this->db->insert_id();
	}

	function updateMacData($pdata, $order_item_id) {
		$this->db->where("order_item_id", $order_item_id);
		return $this->db->update("tbl_mac_ids", $pdata);
	}

	function updateMacDetailsByMacId($pdata, $mac_id) {
		$this->db->where("mac_id", $mac_id);
		return $this->db->update("tbl_mac_ids", $pdata);
	}

	function updateMacDetailsByUserId($pdata, $user_id) {
		$this->db->where("user_id", $user_id);
		return $this->db->update("tbl_mac_ids", $pdata);
	}

	function getMacFromUsers($mac_id) {
		$this->db->select("m.mac_id");
		$this->db->where("m.mac_id", $mac_id);
		$query = $this->db->get("tbl_users m");
		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
	}

	function getMacFromMacLog($mac_id) {
		$this->db->select("m.mac_id");
		$this->db->where("m.mac_id", $mac_id);
		$query = $this->db->get("tbl_mac_log m");
		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
	}

	function getMacFromOrders($mac_id) {
		$this->db->select("m.mac_id");
		$this->db->where("m.mac_id LIKE '%" . $mac_id . "%'");
		$this->db->group_by("m.mac_id");
		$query = $this->db->get("tbl_order_items m");
		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
	}

	function getMacFromMacIds($s = array(), $mode = "DATA") {
		$this->db->select("m.*");
		//  $this->db->where("m.mac_id LIKE '%" . $s['mac_id'] . "%'");
		if (!empty($s['mac_id'])) {
			$this->db->where("m.mac_id", $s['mac_id']);
		}
		$this->db->group_by("m.mac_id");
		$query = $this->db->get("tbl_mac_ids m");
		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
	}

	function getMacDetailsFromOrders($mac_id) {
		$this->db->select("m.mac_id,u.member_id as dealer_id,CONCAT_WS(' ',u.first_name,u.last_name) as dealer_name");
		$this->db->where("m.mac_id", $mac_id);
		$this->db->join("tbl_orders o", "o.order_id = m.order_id");
		$this->db->join("tbl_members u", "u.member_id = o.dealer_id");
		$query = $this->db->get("tbl_order_items m");
		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
	}

//ADd HSN Code
	function addHsnCode($pdata) {
		$this->db->insert("tbl_hsn_codes", $pdata);
		return $this->db->insert_id();
	}

	function getHsnCodeById($pk_id) {
		$this->db->select("m.*");
		$this->db->where("m.pk_id", $pk_id);
		$query = $this->db->get("tbl_hsn_codes m");
		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
	}

	//orders
	function addOrder($pdata) {
		$date = date('Y-m-d h:i:s');
		$this->db->set("created_on", $date);
		$this->db->insert("tbl_orders", $pdata);
		return $this->db->insert_id();
	}

	function delOrder($order_id) {
		$this->db->where("order_id", $order_id);
		return $this->db->delete("tbl_orders");
	}

	function updateOrder($pdata, $order_id) {
		$this->db->where("order_id", $order_id);
		return $this->db->update("tbl_orders", $pdata);
	}

	function updateOrderItemByUserId($mac_id, $product_id, $user_id) {
		$q = "";
		$q .= "UPDATE tbl_order_items oi SET mac_id='" . $mac_id . "' WHERE oi.order_id IN(SELECT o.order_id FROM tbl_orders o WHERE o.user_id ='" . $user_id . "' ) AND oi.product_id ='" . $product_id . "'";
		//  echo $q;
		return $this->db->query($q);
	}

	function updateOldMacInOrderItems($mac_id, $old_mac_id, $user_id, $product_id) {
		$q = "";
		$q .= "UPDATE tbl_order_items oi SET oi.mac_id='" . $mac_id . "' WHERE oi.mac_id IN(SELECT m.mac_id FROM tbl_mac_ids m LEFT JOIN tbl_users u ON u.user_id=m.user_id LEFT JOIN tbl_product_info p ON p.product_id=m.product_id WHERE oi.product_id='" . $product_id . "' AND m.user_id='" . $user_id . "') AND oi.mac_id='" . $old_mac_id . "'";

		return $this->db->query($q);
	}

	function updateOldMac($mac_id, $old_mac_id, $user_id, $product_id) {
		$q = "";
		$q .= "UPDATE tbl_mac_ids SET mac_id='" . $mac_id . "' WHERE mac_id='" . $old_mac_id . "' AND product_id='" . $product_id . "' AND user_id='" . $user_id . "'";
		//echo $q;
		return $this->db->query($q);

	}

	function updateOldMacUser($new_mac, $old_mac, $user_id) {
		$this->db->where("mac_id", $old_mac);
		$this->db->where("user_id", $user_id);
		return $this->db->update("tbl_users", ['mac_id' => $new_mac]);
	}

	function updateOrderByUserId($pdata, $order_id) {
		$this->db->where("order_id", $order_id);
		return $this->db->update("tbl_orders", $pdata);
	}

	function getExistedProductMacByCustomerProductId($existed_user_id, $product_id) {

		$this->db->select("o.order_id,oi.product_id,mc.mac_id,u.user_id");
		$this->db->where("mc.user_id", $existed_user_id);
		$this->db->where("mc.product_id", $product_id);
		$this->db->join("tbl_users u", "u.user_id = o.user_id", "LEFT");
		$this->db->join("tbl_order_items oi", "oi.order_id = o.order_id", "LEFT");
		$this->db->join("tbl_mac_ids mc", "mc.order_item_id = oi.order_item_id", "LEFT");
		$query = $this->db->get("tbl_orders o");
		// echo $this->db->last_query();
		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
	}

	function getOrderDetailsByMacId($mac_id) {
		$this->db->select("m.*,o.order_id");
		$this->db->where("m.mac_id", $mac_id);
		$this->db->join("tbl_orders o", "o.order_id = m.order_id", "LEFT");
		$query = $this->db->get("tbl_order_items m");
		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
	}

	function getOrderById($order_id) {
		//$this->db->select("m.*,CONCAT_WS(' ',u.first_name,u.last_name) as created_person,CONCAT_WS(' ',mem.first_name,mem.last_name) as dealer_name");

		$this->db->select("m.*,CONCAT_WS(' ',mem.first_name,mem.last_name) as dealer_name,,CONCAT_WS(' ',ad.first_name,ad.last_name) as approved_by_name");
		$this->db->where("m.order_id", $order_id);
		$this->db->join("tbl_members mem", "mem.member_id = m.created_by", "LEFT");
		$this->db->join("tbl_members ad", "ad.member_id = m.approved_by", "LEFT");
		// $this->db->join("tbl_users u", "u.user_id = m.user_id");
		$query = $this->db->get("tbl_orders m");

		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
	}

	/* function getOrderById($order_id)
		     {
		         $this->db->select("m.*,i.*,pi.product_id as child_product_id,pi.product_name as child_product,sp.product_id as sub_product_id,sp.product_name as sub_product,mp.product_id as main_product_id,mp.product_name as main_product,CONCAT_WS(' ',mem.first_name,mem.last_name) as created_by");
		         $this->db->where("m.order_id", $order_id);
		         $this->db->join("tbl_order_items i", "i.order_id=m.order_id");
		         $this->db->join("tbl_products pi", "pi.product_id=i.product_id");
		         $this->db->join("tbl_products sp", "sp.product_id=pi.parent_id");
		         $this->db->join("tbl_products mp", "mp.product_id=sp.parent_id");
		         $this->db->join("tbl_members mem", "mem.member_id=m.created_by");
		      //   $this->db->join("tbl_members ap", "ap.member_id=m.approved_by");
		         $query = $this->db->get("tbl_orders m");
		        //
		         if ($query->num_rows() > 0) {
		             return $query->result_array();
		         }
		         return false;
	*/
	function searchOrders($s = array(), $mode = "DATA") {
		if ($mode == "CNT") {
			$this->db->select("COUNT(1) as CNT");
		} else {
			$this->db->select("m.*,CONCAT_WS(' ',mem.first_name,mem.last_name) as dealer_name,CONCAT_WS(' ',u.first_name,u.last_name) as created_person");
		}
		if (!empty($s['is_active']) && ($s['is_active'] == '1')) {
			$this->db->where("m.is_active", $s['is_active']);
		}
		if (isset($s['limit']) && isset($s['offset'])) {
			$this->db->limit($s['limit'], $s['offset']);
		}
		if (!empty($s['created_by'])) {
			$this->db->where("m.created_by", $s['created_by']);
		}
		if (isset($s['user_id'])) {
			$this->db->where("m.user_id", $s['user_id']);
		}
		if (!empty($s['order_type'])) {
			$this->db->where("m.order_type", $s['order_type']);
		}
		if (isset($s['admin_visible'])) {
			$this->db->where("m.admin_visible", $s['admin_visible']);
		}
		if (!empty($s['dealer_id'])) {
			$this->db->where("m.dealer_id", $s['dealer_id']);
		}
		$this->db->join("tbl_members mem", "mem.member_id=m.dealer_id", "LEFT");
		$this->db->join("tbl_users u", "u.user_id=m.user_id", "LEFT");
		$this->db->order_by("m.order_id ASC");
		$query = $this->db->get("tbl_orders m");
		if ($query->num_rows() > 0) {
			if ($mode == "CNT") {
				$row = $query->row_array();
				return $row['CNT'];
			}
			return $query->result_array();
		}
		return false;
	}

	function searchOrdersForOwner($s = array(), $mode = "DATA") {
		if ($mode == "CNT") {
			$this->db->select("COUNT(1) as CNT");
		} else {
			$this->db->select("m.*");
		}
		if (!empty($s['is_active']) && ($s['is_active'] == '1')) {
			$this->db->where("m.is_active", $s['is_active']);
		}
		if (isset($s['limit']) && isset($s['offset'])) {
			$this->db->limit($s['limit'], $s['offset']);
		}
		if (!empty($s['user_id'])) {
			$this->db->where("m.user_id", $s['user_id']);
		}
		$this->db->order_by("m.order_id ASC");
		$query = $this->db->get("tbl_orders m");
		if ($query->num_rows() > 0) {
			if ($mode == "CNT") {
				$row = $query->row_array();
				return $row['CNT'];
			}
			return $query->result_array();
		}
		return false;
	}

	function searchCustomOrders($s = array(), $mode = "DATA") {
		if ($mode == "CNT") {
			$this->db->select("COUNT(1) as CNT");
		} else {
			//  $this->db->select("m.*,CONCAT_WS(' ',mem.first_name,mem.last_name) as created_person,CONCAT_WS(' ',u.first_name,u.last_name) as customer_name");
			$this->db->select("m.*,CONCAT_WS(' ',u.first_name,u.last_name) as customer_name");
		}
		if (!empty($s['is_active']) && ($s['is_active'] == '1')) {
			$this->db->where("m.is_active", $s['is_active']);
		}
		if (isset($s['limit']) && isset($s['offset'])) {
			$this->db->limit($s['limit'], $s['offset']);
		}
		if (!empty($s['created_by'])) {
			$this->db->where("m.created_by", $s['created_by']);
		}
		if (!empty($s['order_type'])) {
			$this->db->where("m.order_type", "CUSTOM");
		}

		//  $this->db->join("tbl_members mem", "mem.member_id=m.created_by", "LEFT");
		$this->db->join("tbl_users u", "u.user_id=m.user_id", "LEFT");
		$this->db->order_by("m.order_id ASC");
		$query = $this->db->get("tbl_orders m");
		//
		if ($query->num_rows() > 0) {
			if ($mode == "CNT") {
				$row = $query->row_array();
				return $row['CNT'];
			}
			return $query->result_array();
		}
		return false;
	}

	//order items
	function addOrderItem($pdata) {
		$this->db->insert("tbl_order_items", $pdata);
		return $this->db->insert_id();
	}

	function delOrderItem($order_id) {
		$this->db->where("order_id", $order_id);
		return $this->db->delete("tbl_order_items");
	}

	function updateOrderItem($pdata, $order_item_id) {
		$this->db->where("order_item_id", $order_item_id);
		return $this->db->update("tbl_order_items", $pdata);
	}

	function getCustomOrderById($order_id) {
		$this->db->select("m.*");
		$this->db->where("m.order_id", $order_id);
		$query = $this->db->get("tbl_orders m");
		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
	}

	function getOrderItemById($order_item_id) {
		$this->db->select("m.*");
		$this->db->where("m.order_item_id", $order_item_id);
		$query = $this->db->get("tbl_order_items m");
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
		return false;
	}

	function searchCustomOrderItems($s = array(), $mode = "DATA") {
		if ($mode == "CNT") {
			$this->db->select("COUNT(1) as CNT");
		} else {
			$this->db->select("m.*,i.hsn_code,i.gst");
		}
		if (!empty($s['is_active']) && ($s['is_active'] == '1')) {
			$this->db->where("m.is_active", $s['is_active']);
		}
		if (isset($s['limit']) && isset($s['offset'])) {
			$this->db->limit($s['limit'], $s['offset']);
		}
		if (!empty($s['order_id'])) {
			$this->db->where("m.order_id", $s['order_id']);
		}
		$this->db->join("tbl_orders o", "o.order_id=m.order_id");

		$this->db->join("tbl_item_master i", "i.item_name = m.product_name");
		$this->db->order_by("m.order_item_id ASC");
		$query = $this->db->get("tbl_order_items m");
		//
		if ($query->num_rows() > 0) {
			if ($mode == "CNT") {
				$row = $query->row_array();
				return $row['CNT'];
			}
			return $query->result_array();
		}
		return false;
	}

	function searchOrderItems($s = array(), $mode = "DATA") {
		if ($mode == "CNT") {
			$this->db->select("COUNT(1) as CNT");
		} else {
			$this->db->select("m.*,pinfo.hsn_code,pinfo.discount,pinfo.gst,pi.product_id as child_product_id,pi.product_name as child_product,pi.product_logo,sp.product_id as sub_product_id,sp.product_name as sub_product,mp.product_id as main_product_id,mp.product_name as main_product,CONCAT_WS(' ',mem.first_name,mem.last_name) as created_person");
		}
		if (!empty($s['is_active']) && ($s['is_active'] == '1')) {
			$this->db->where("m.is_active", $s['is_active']);
		}
		if (isset($s['limit']) && isset($s['offset'])) {
			$this->db->limit($s['limit'], $s['offset']);
		}
		if (!empty($s['order_id'])) {
			$this->db->where("m.order_id", $s['order_id']);
		}
		if (!empty($s['product_name'])) {
			$this->db->where("m.product_name", $s['product_name']);
		}
		$this->db->join("tbl_orders o", "o.order_id=m.order_id");
		$this->db->join("tbl_products pi", "pi.product_id=m.product_id");
		$this->db->join("tbl_products sp", "sp.product_id=pi.parent_id");
		$this->db->join("tbl_products mp", "mp.product_id=sp.parent_id");
		$this->db->join("tbl_members mem", "mem.member_id=o.created_by");
		$this->db->join("tbl_product_info pinfo", "pinfo.product_id=pi.product_id");
		$this->db->order_by("m.order_item_id ASC");
		$query = $this->db->get("tbl_order_items m");
		//
		if ($query->num_rows() > 0) {
			if ($mode == "CNT") {
				$row = $query->row_array();
				return $row['CNT'];
			}
			return $query->result_array();
		}
		return false;
	}

	//Attachments
	function addAttachment($pdata) {
		$this->db->set("created_on", "NOW()", false);
		$this->db->insert("tbl_downloads", $pdata);
		return $this->db->insert_id();
	}

	function delAttachment($download_id) {
		$this->db->where("download_id", $download_id);
		return $this->db->delete("tbl_downloads");
	}

	function updateAttachment($pdata, $download_id) {
		$this->db->where("download_id", $download_id);
		return $this->db->update("tbl_downloads", $pdata);
	}

	function getAttachmentById($download_id) {
		$this->db->select("m.*");
		$this->db->where("m.download_id", $download_id);
		$query = $this->db->get("tbl_downloads m");
		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
	}

	function searchAttachments($s = array(), $mode = "DATA") {
		if ($mode == "CNT") {
			$this->db->select("COUNT(1) as CNT");
		} else {
			$this->db->select("m.*");
		}
		if (!empty($s['is_active']) && ($s['is_active'] == '1')) {
			$this->db->where("m.is_active", $s['is_active']);
		}
		if (isset($s['limit']) && isset($s['offset'])) {
			$this->db->limit($s['limit'], $s['offset']);
		}
		$this->db->order_by("m.download_id DESC");
		$query = $this->db->get("tbl_downloads m");
		if ($query->num_rows() > 0) {
			if ($mode == "CNT") {
				$row = $query->row_array();
				return $row['CNT'];
			}
			return $query->result_array();
		}
		return false;
	}

	//Banners
	function addBanner($pdata) {
		$this->db->insert("tbl_banners", $pdata);
		return $this->db->insert_id();
	}

	function delBanner($banner_id) {
		$this->db->where("banner_id", $banner_id);
		return $this->db->delete("tbl_banners");
	}

	function updateBanner($pdata, $banner_id) {
		$this->db->where("banner_id", $banner_id);
		return $this->db->update("tbl_banners", $pdata);
	}

	function getBannerById($banner_id) {
		$this->db->select("m.*");
		$this->db->where("m.banner_id", $banner_id);
		$query = $this->db->get("tbl_banners m");
		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
	}

	function searchBanners($s = array(), $mode = "DATA") {
		if ($mode == "CNT") {
			$this->db->select("COUNT(1) as CNT");
		} else {
			$this->db->select("m.*");
		}
		if (!empty($s['is_active']) && ($s['is_active'] == '1')) {
			$this->db->where("m.is_active", $s['is_active']);
		}
		if (isset($s['limit']) && isset($s['offset'])) {
			$this->db->limit($s['limit'], $s['offset']);
		}
		$this->db->order_by("m.banner_id DESC");
		$query = $this->db->get("tbl_banners m");
		if ($query->num_rows() > 0) {
			if ($mode == "CNT") {
				$row = $query->row_array();
				return $row['CNT'];
			}
			return $query->result_array();
		}
		return false;
	}

	//Clients
	function addClient($pdata) {
		$this->db->set("created_on", "NOW()", false);
		$this->db->insert("tbl_clients", $pdata);
		return $this->db->insert_id();
	}

	function delClient($client_id) {
		$this->db->where("client_id", $client_id);
		return $this->db->delete("tbl_clients");
	}

	function updateClient($pdata, $client_id) {
		$this->db->where("client_id", $client_id);
		return $this->db->update("tbl_clients", $pdata);
	}

	function getClientById($client_id) {
		$this->db->select("m.*");
		$this->db->where("client_id", $client_id);
		$query = $this->db->get("tbl_clients m");
		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
	}

	function searchClients($s = array(), $mode = "DATA") {
		if ($mode == "CNT") {
			return $this->db->select("COUNT(1) as CNT");
		} else {
			$this->db->select("m.*");
		}
		if (!empty($s['is_active']) && $s['is_active'] == '1') {
			$this->db->where("m.is_active", $s['is_active']);
		}
		if (isset($s['limit']) && isset($s['offset'])) {
			$this->db->limit($s['limit'], $s['offset']);
		}
		$this->db->order_by("m.client_id DESC");
		$query = $this->db->get("tbl_clients m");
		if ($query->num_rows() > 0) {
			if ($mode == "CNT") {
				$row = $query->row_array();
				return $row['CNT'];
			}
			return $query->result_array();
		}
		return false;
	}

//Item Master

	function addItem($pdata) {
		$this->db->set("created_on", "NOW()", false);
		$this->db->insert("tbl_item_master", $pdata);
		return $this->db->insert_id();
	}

	function delItem($item_id) {
		$this->db->where("item_id", $item_id);
		return $this->db->delete("tbl_item_master");
	}

	function updateItem($pdata, $item_id) {
		$this->db->where("item_id", $item_id);
		return $this->db->update("tbl_item_master", $pdata);
	}

	function getItemById($item_id) {
		$this->db->select("m.*");
		$this->db->where("item_id", $item_id);
		$query = $this->db->get("tbl_item_master m");
		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
	}

	function searchItems($s = array(), $mode = "DATA") {
		if ($mode == "CNT") {
			return $this->db->select("COUNT(1) as CNT");
		} else {
			$this->db->select("m.*");
		}
		if (!empty($s['is_active']) && $s['is_active'] == '1') {
			$this->db->where("m.is_active", $s['is_active']);
		}
		if (isset($s['limit']) && isset($s['offset'])) {
			$this->db->limit($s['limit'], $s['offset']);
		}
		$this->db->order_by("m.item_id DESC");
		$query = $this->db->get("tbl_item_master m");
		if ($query->num_rows() > 0) {
			if ($mode == "CNT") {
				$row = $query->row_array();
				return $row['CNT'];
			}
			return $query->result_array();
		}
		return false;
	}

	//Settings
	function updateSiteSettings($pdata, $pk_id) {
		$this->db->where("pk_id", $pk_id);
		return $this->db->update("tbl_site_info", $pdata);
	}

	function getSiteSettings($pk_id) {
		$this->db->select("m.*");
		$this->db->where("pk_id", $pk_id);
		$query = $this->db->get("tbl_site_info m");
		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
	}

	//Value Range Info
	function addRangeInfo($pdata) {
		$this->db->insert("tbl_ranges", $pdata);
		return $this->db->insert_id();
	}

	function updateRangeDetails($pdata, $pk_id) {
		$this->db->where("pk_id", $pk_id);
		//
		return $this->db->update("tbl_ranges", $pdata);
	}

	function delRangeDetails($product_id) {
		$this->db->where("product_id", $product_id);
		return $this->db->delete("tbl_ranges");
	}

	function getPriceRangeDetails($product_id) {
		$this->db->select("m.*");
		$this->db->where("product_id", $product_id);
		$query = $this->db->get("tbl_ranges m");
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
		return false;
	}

	function searchRangeDetails($s = array(), $mode = "DATA") {
		if ($mode == "CNT") {
			$this->db->select("COUNT(1) as CNT");
		} else {
			$this->db->select("m.*");
		}
		if (!empty($s['is_active']) && ($s['is_active'] == '1')) {
			$this->db->where("m.is_active", $s['is_active']);
		}
		if (isset($s['limit']) && isset($s['offset'])) {
			$this->db->limit($s['limit'], $s['offset']);
		}
		if (!empty($s['product_id'])) {
			$this->db->where("m.product_id", $s['product_id']);
		}
		$this->db->order_by("m.pk_id ASC");
		$this->db->group_by("m.pk_id ");
		$query = $this->db->get("tbl_ranges m");
		if ($query->num_rows() > 0) {
			if ($mode == "CNT") {
				$row = $query->row_array();
				return $row['CNT'];
			}
			return $query->result_array();
		}
		return false;
	}

	//contatc info
	function addContactInfo($pdata) {
		$this->db->set("created_on", "NOW()", false);
		$this->db->insert("tbl_contact_info", $pdata);
		return $this->db->insert_id();
	}

	//cart
	function addToCart($pdata) {
		$this->db->set("created_on", "NOW()", false);
		$this->db->insert("tbl_cart_items", $pdata);
		return $this->db->insert_id();
	}

	function updateCartItems($pdata, $pk_id) {
		$this->db->where("pk_id", $pk_id);
		return $this->db->update("tbl_cart_items", $pdata);
	}

	function updateCartItemsByProductId($pdata, $product_info_id) {
		$this->db->where("product_info_id", $product_info_id);
		return $this->db->update("tbl_cart_items", $pdata);
	}

	function delCartItem($pk_id) {
		$this->db->where("pk_id", $pk_id);
		return $this->db->delete("tbl_cart_items");
	}

	function emptyCartTable($created_by) {
		$this->db->where("created_by", $created_by);
		return $this->db->delete("tbl_cart_items");
	}

	function getCartItemById($pk_id) {
		$this->db->select("m.*");
		$this->db->where("pk_id", $pk_id);
		$query = $this->db->get("tbl_cart_items m");
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
		return false;
	}

	function getCartItemByProductId($product_info_id) {
		$this->db->select("m.*");
		$this->db->where("product_info_id", $product_info_id);
		$query = $this->db->get("tbl_cart_items m");
		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
	}

	function searchCartItems($s = array(), $mode = "DATA") {
		if ($mode == "CNT") {
			$this->db->select("COUNT(1) as CNT");
		} else {
			$this->db->select("m.*,p.product_id,i.hsn_code,p.product_name,p.product_logo,i.mrp_price,i.gst,i.discount");
		}
		if (isset($s['limit']) && isset($s['offset'])) {
			$this->db->limit($s['limit'], $s['offset']);
		}
		if (isset($s['created_by'])) {
			$this->db->where('m.created_by', $s['created_by']);
		}
		$this->db->join("tbl_product_info i", "i.product_info_id = m.product_info_id", "LEFT");
		$this->db->join("tbl_products p", "i.product_id = p.product_id", "LEFT");
		$this->db->order_by("m.pk_id ASC");
		$query = $this->db->get("tbl_cart_items m");
		if ($query->num_rows() > 0) {
			if ($mode == "CNT") {
				$row = $query->row_array();
				return $row['CNT'];
			}
			return $query->result_array();
		}
		return false;
	}

	//Ticketing
	function addTicket($pdata) {
		$this->db->insert("tbl_tickets", $pdata);
		return $this->db->insert_id();
	}

	function updateTicket($pdata, $ticket_id) {
		$this->db->where("m.ticket_id", $ticket_id);
		return $this->db->update("tbl_tickets m", $pdata);
	}

	function delTicket($ticket_id) {
		$this->db->where("ticket_id", $ticket_id);
		return $this->db->delete("tbl_tickets");
	}

	function getTicketById($ticket_id) {
		$this->db->select("m.*");
		$this->db->where("m.ticket_id", $ticket_id);
		$query = $this->db->get("tbl_tickets m");
		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
	}

	function searchTickets($s = array(), $mode = "DATA") {

		if ($mode == "CNT") {
			$this->db->select("COUNT(1) AS CNT");
		} else {
			$this->db->select("m.*,CONCAT_WS('',u.first_name,u.last_name) as user_name");
		}
		if (isset($s['limit']) && isset($s['offset'])) {
			$this->db->limit($s['limit'], $s['offset']);
		}
		if (isset($s['product_name'])) {
			$this->db->where("m.product_name", $s['product_name']);
		}
		//    $this->db->order_by("m.ticket_id as DESC");
		$this->db->join("tbl_users u", "u.user_id = m.user_id");
		$query = $this->db->get("tbl_tickets m");
		if ($query->num_rows() > 0) {
			if ($mode == "CNT") {
				$row = $query->row_array();
				return $row['CNT'];
			}
			return $query->result_array();
		}
		return false;
	}
}