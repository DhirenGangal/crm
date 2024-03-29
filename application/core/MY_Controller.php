<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

    public $header_data = [];
    function __construct()
    {
        //session_start();
        parent::__construct();
        $this->_REQ = $_POST + $_GET;
        $this->load->helper('common');
        $this->header_data['title']="VSCI-E Technologies";
    }

    public function _user_login_check($roles = array(""))
    {
        if (!empty($roles)) {
            if (!empty($_SESSION['USER_ID']) && (in_array($_SESSION['ROLE'], $roles))) {
            } else {
                redirect(base_url());
            }
        }
    }

    public function sendEmail($view, $data = [])
    {
        if (empty($data['from'])) {
            $data['from'] = "info@vscietechnologies.com";
        }
        include_once(rtrim(APPPATH, "/") . "/third_party/phpmailer/class.phpmailer.php");
        $body = $this->load->view($view, $data, true);
        try {
            $mail = new PHPMailer();
            if (!empty($data['from']) && !empty($data['from_name'])) {
                $mail->SetFrom($data['from'], $data['from_name']);
            } else if (!empty($data['from'])) {
                $mail->SetFrom($data['from']);
            }
            if (!empty($data['to']) && !empty($data['to_name'])) {
                $mail->AddAddress($data['to']);
            } else if (!empty($data['to'])) {
                $mail->AddAddress($data['to']);
            }
            if (!empty($data['cc'])) {
                $mail->AddAddress($data['cc']);
            }
            $mail->Subject = !empty($data['subject']) ? $data['subject'] : "";
            $mail->isHTML(true);
            $mail->Body = $body;
            return $mail->Send();
        } catch (phpmailerException $e) {
            echo $e->errorMessage(); //Pretty error messages from PHPMailer
        } catch (Exception $e) {
            echo $e->getMessage(); //Boring error messages from anything else!
        }
    }


    public function _remap($method, $params = array())
    {
        $data = array();
        $this->header_data['page_name'] = $method;
        $method = str_replace("-", "_", $method);
        $this->method = $method;
        if (method_exists($this, $method)) {
            return call_user_func_array(array($this, $method), $params);
        } else {
            //redirect(base_url());
        }
    }
    function lchar($str, $val)
    {
        return strlen($str) <= $val ? $str : substr($str, 0, $val) . '...';
    }
    public function _json_out($response = [])
    {
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }
    public function _admin($page_name = 'index', $data = array())
    {
        $this->load->view('admin/header', $this->header_data);
        $this->load->view('admin/'.$page_name, $data);
        $this->load->view('admin/footer');
    }
    public function _dealer($page_name = 'index', $data = array())
    {
        $this->load->view('dealer/header1', $this->header_data);
        $this->load->view('dealer/'.$page_name, $data);
        $this->load->view('dealer/footer1');
    }
    public function _owner($page_name = 'index', $data = array())
    {
        $this->load->view('owner/header1', $this->header_data);
        $this->load->view('owner/'.$page_name, $data);
        $this->load->view('owner/footer1');
    }
    public function _iframe($page_name = 'index', $data = array())
    {
        $this->load->view('admin/iframe_header', $this->header_data);
        $this->load->view($page_name, $data);
        $this->load->view('admin/iframe_footer');
    }
    public function _home($page_name = 'index', $data = array())
    {
        $this->load->view('header', $data);
        $this->load->view($page_name, $data);
        $this->load->view('footer',$data);
    }

}

