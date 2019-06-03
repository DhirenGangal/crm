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
}