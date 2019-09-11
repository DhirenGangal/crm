<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index($id = "", $sub_products_id = "")
    {
        $data = array();
        $data['page'] = 'products';
        $search = FALSE;
        if ($this->input->get()) {
            $get = $this->input->get();
            $data['products'] = find_products($get);
            
            if(!empty($data['products'])) {
                $search = TRUE;
                $id =  $data['products'][0]['mp_product_id'];      
            }
        }
        $data['main_product_id'] = $id;
        $data['sub_products'] = get_sub_products($id);
        
        if(empty($sub_products_id) || $sub_products_id <= 0) {
            $sub_products_id = $data['sub_products'][0]['product_id'];   
        }

        $data['sub_products_id'] = $sub_products_id;
        if (!$search) {
            $data['products'] = get_products($sub_products_id); 
        }
        $this->_home('products', $data);
    }

    public function product_desc($product_id = "")
    {
        $data = [];
        $data['page'] = 'products description';
        $data['product'] = get_product_detail($product_id);
        $this->_home('product-description', $data);
    }
}
