<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller
{
    public $header_data = array();

    function __construct()
    {
        parent::__construct();
        $this->load->model("DBAPI","dbapi", TRUE);
        $site_info = $this->dbapi->getSiteSettings(1);
        $this->header_data['site_info'] = $site_info;
        $products = $this->dbapi->searchProducts(["is_active" => '1',"parent_id" => '0']);
        if (!empty($products)) {
            foreach ($products as &$product) {
                $product['sub_products'] = $this->dbapi->searchProducts(["key" => $product['product_id']]);
                if (!empty($product['sub_products'])) {
                    foreach ($product['sub_products'] as &$child_p) {
                        $child_p['child_products'] = $this->dbapi->searchChildProductInfo(["product_id" => $child_p['product_id'],"limit"=>"5"]);

                    }
                }
            }
        }
        $this->header_data['products'] = $products;
    }

    public function index()
    {
        $data = array();
        $products = $this->dbapi->searchProducts(["is_active" => '1',"parent_id" => '0']);
        if (!empty($products)) {
            foreach ($products as &$product) {
                $product['sub_products'] = $this->dbapi->searchProducts(["key" => $product['product_id']]);
                if (!empty($product['sub_products'])) {
                    foreach ($product['sub_products'] as &$child_p) {
                        $child_p['child_products'] = $this->dbapi->searchChildProductInfo(["product_id" => $child_p['product_id']]);

                    }
                }
            }
        }
        $data['products'] = $products;
        $data['banners'] = $this->dbapi->searchBanners(['is_active'=>'1']);
        $this->_home('index', $data);
        // $this->load->view('redirect');
        //redirect('http://vscietechnologies.com/');
    }

    public function product()
    {
        $data = [];
        $this->_home('product', $data);
    }
    public function product_desc()
    {
        $data = [];
        $this->_home('product-desc', $data);
    }
    public function contact()
    {
        $data = [];
        $data['site_info']=$this->dbapi->getSiteSettings(1);
        if($_POST)
        {
            $data = array();
            $data['name'] = !empty($_POST['name']) ? $_POST['name'] : '';
            $data['email'] = !empty($_POST['email']) ? $_POST['email'] : '';
            $data['phone_no'] = !empty($_POST['phone_no']) ? $_POST['phone_no'] : '';
            $data['subject'] = !empty($_POST['subject']) ? $_POST['subject'] : '';
            $data['message'] = !empty($_POST['message']) ? $_POST['message'] : '';

            $this->dbapi->addContactInfo($data);
            $_SESSION['message'] = "Your request sent successfully";
            redirect(base_url() . 'contact');
        }
        else{
            $this->_home('contact', $data);
        }

    }

    public function logout()
    {
        $_SESSION = [];
         $this->session->sess_destroy();
         $_SESSION['error'] = "All sessions are destroyed";
        redirect(base_url());
    }
}
