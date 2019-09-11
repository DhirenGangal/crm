<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('cookie');
        $this->load->model('common_model');
    }

    public function index()
    {
        if ($this->session->has_userdata('user')) {
            redirect('home','refresh');
            exit();
        }
        
        $data = array();
        $data['page'] = 'login';
        $this->_home('login', $data);
    }

    /*
        @Author:      Dhiraj Gangal
        @Description: Authenticate user credential for login
        @Input:       (string) email_id
        @Input:       (string) password
        @Output:      If Authenticate success then manage account and apply job
        @Date:        07-Dec-2017
    */
    public function do_login()
    {
        $response = array('status' => 'error', 'message' => 'Something went to wrong !');
        $redirect_url = base_url('login');
        if (!$this->input->is_ajax_request() ) 
        {
            $post = $this->input->post();
            $user = $this->common_model->select_data_row('*','tbl_members',array('email' => strtolower(trim($post['email']))));

            $message = "Something went to wrong. Please try again.";

            if (empty($user)) 
            {
                $response = array('status' => 'error', 'message' => 'Invalid email id.');
            }
            else 
            {
                if ( $user['password'] != trim($post['password'])) 
                {
                    $response = array('status' => 'error', 'message' => 'You have entered invalid password.');
                }
                else 
                {
                    $redirect_url = base_url('home');
                    
                    if (isset($post['logged'])) 
                    {
                        $keep_data = serialize(array('email' => $post['email'], 'password' => $post['password']));

                        $cookie= array(
                           'name'   => 'remember_me',
                           'value'  => $keep_data,
                           'expire' => 86400 * 30,// 30 days
                        );
                        
                        set_cookie($cookie);
                    }
                    
                    $this->session->set_userdata(['user' => $user]);
                    $response = array('status' => 'success', 'message' => 'Login successful.','redirect_url' => $redirect_url);
                }
            }
        }
        show_alert($response['message'],$response['status']);
        redirect($redirect_url);
        // header('Content-Type: application/json');
        // echo json_encode( $response );
    }

    /*
        @Author:      Dhiraj Gangal
        @Description: Authenticate user credential for login
        @Input:       (string) email_id
        @Input:       (string) password
        @Output:      If Authenticate success then manage account and apply job
        @Date:        07-Dec-2017
    */
    public function logout()
    {
        if ($this->session->has_userdata('user')) {
            $this->session->unset_userdata('user');
        }

        redirect('login','refresh');
    }

    public function register()
    {
        if ($this->session->has_userdata('user')) {
            redirect('home','refresh');
            exit();
        }
        
        $data = array();
        $data['page'] = 'register';
        $this->_home('register', $data);   
    }
}
