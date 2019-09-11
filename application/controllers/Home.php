<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller
{
    public $header_data = array();

    function __construct()
    {
        parent::__construct();
        /*$this->load->model("DBAPI","dbapi", TRUE);
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
        $this->header_data['products'] = $products;*/
    }

    public function index()
    {
        $data = array();
        $data['page'] = 'home';
        $this->_home('index', $data);
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

    public function contact_us()
    {
        $this->load->helper(array('form', 'url'));
        $data = array();
        $data['page'] = 'contact us';
        $this->_home('contact-us', $data);
    }

    public function submit_contact_us()
    {
        // $this->load->library('form_validation');
        // $this->form_validation->set_rules('name', 'Name', 'required');
        // $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        // $this->form_validation->set_rules('phone_no', 'Phone No', 'required');
        // $this->form_validation->set_rules('subject', 'Subject', 'required');
        // $this->form_validation->set_rules('message', 'Message', 'required|min_length[10]');

        // if ($this->form_validation->run() == FALSE)
        // {
        //     echo validation_errors();
        //     $this->contact_us();
        // }
        // else
        // {
        //      redirect('contact-us');
        // }

        $post = $this->input->post();
        try {
            if (empty($post['name']) || trim($post['name']) == '') {
                throw new Exception("Name filed required!", 1);
            }

            if (empty($post['email']) || trim($post['email']) == '') {
                throw new Exception("Email filed required!", 1);
            }

            if (!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^",$post['email'])) {
                throw new Exception("Invalid email", 1);
            }

            if (empty($post['subject']) || trim($post['subject']) == '') {
                throw new Exception("Subject filed required!", 1);
            }

            if (empty($post['message']) || trim($post['message']) == '') {
                throw new Exception("Message filed required!", 1);
            }

            $data = array();
            $data['name'] = !empty($post['name']) ? $post['name'] : '';
            $data['email'] = !empty($post['email']) ? $post['email'] : '';
            $data['phone_no'] = !empty($post['phone_no']) ? $post['phone_no'] : '';
            $data['subject'] = !empty($post['subject']) ? $post['subject'] : '';
            $data['message'] = !empty($post['message']) ? $post['message'] : '';
            $this->load->model("DBAPI","dbapi", TRUE);
            $this->dbapi->addContactInfo($data);
            show_alert("Your query send successfully. We will contact you soon.","success");

            
        } catch (Exception $e) {
            show_alert($ex->getMessage(),'danger');
        } finally {
            redirect('contact-us');
        }
    }

    public function about_us()
    {
        $this->load->helper(array('form', 'url'));
        $data = array();
        $data['page'] = 'about us';
        $this->_home('about-us', $data);
    }

    public function logout()
    {
        $_SESSION = [];
        $this->session->sess_destroy();
        $_SESSION['error'] = "All sessions are destroyed";
        redirect(base_url());
    }

    public function page_not_found()
    {
        $this->load->library('user_agent');
        $data['page'] = '404 page not found';
        $this->_home('page-not-found', $data);
        // $this->load->view('error-404');
    }
}
