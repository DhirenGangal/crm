<?php

class Product extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	function is_exits_model_product($model_name, $sub_product_name, $main_product_name,$product_id = NULL) {
		$this->db->select("m.product_id as model_id, m.product_name as model_name, s.product_id as sub_product_id, s.product_name as sub_product, p.product_id as main_product_id, p.product_name as main_product"); 
		$this->db->from('tbl_products as m');
		$this->db->join("tbl_products as s", "s.product_id = m.parent_id", "left");
		$this->db->join("tbl_products as p", "p.product_id = s.parent_id", "left");
		$this->db->where("m.product_name", $model_name);
		$this->db->where("s.product_name", $sub_product_name);
		$this->db->where("p.product_name", $main_product_name);
		$this->db->where("m.parent_id > 0 and p.product_id IS NOT NULL");
		if(!is_null($product_id)) {
			$this->db->where("m.product_id != $product_id");
		}
		$query = $this->db->get();
		if($query) {
            return $query->row_array();
        }
        else {
            $error = $this->db->error();
            throw new Exception("Error [".$error['code']."] ".$error['message'], 1);
        }
	}

	function get_all_model_product() {
		$this->db->select("mp.product_name main_product_name,sp.product_name sub_product_name,p.product_name,
                pi.mfr_no,p.product_logo product_image,sp.product_logo sub_product_image,
                pi.datasheet as datasheet_path,pi.hsn_code,pi.hsn_description,pi.gst,pi.mrp_price,pi.discount,
                IF(pi.has_mac_id = '1','YES','NO') as has_mac_id,pi.description_1,
                IF(pi.is_active = '1','PUBLIC','PRIVATE') as status,
                GROUP_CONCAT(pr.value_range SEPARATOR ',') price_range,
                GROUP_CONCAT(pr.dealer_price SEPARATOR ',') dealer_price"); 

		$this->db->from('tbl_products p');
		$this->db->join("tbl_products sp", "sp.product_id = p.parent_id", "left");
		$this->db->join("tbl_products mp", "mp.product_id = sp.parent_id", "left");
		$this->db->join("tbl_product_info pi", "pi.product_id = p.product_id", "left");
		$this->db->join("tbl_ranges pr", "pr.product_id = p.product_id", "left");
		$this->db->where("p.product_id NOT IN (SELECT parent_id FROM tbl_products)");
		$this->db->group_by("p.product_id");

		$query = $this->db->get();
		if($query) {
            return $query->result_array();
        }
        else {
            $error = $this->db->error();
            throw new Exception("Error [".$error['code']."] ".$error['message'], 1);
        }
	}

}