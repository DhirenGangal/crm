<?php

if (!function_exists("getMessage")) {

    function getMessage($sub = '')
    {
        $msg = "";
        if (!empty($sub) && !empty($_SESSION[$sub]['message'])) {
            $msg = '<div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert">&times;</button> ' . $_SESSION[$sub]['message'] . '</div>';
            $_SESSION[$sub]['message'] = "";
        }// if end.
        if (empty($sub) && !empty($_SESSION['message'])) {
            $msg = '<div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert">&times;</button> ' . $_SESSION['message'] . '</div>';
            $_SESSION['message'] = "";
        }// if end.
        if (!empty($sub) && !empty($_SESSION[$sub]['error'])) {
            $msg = '<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button> ' . $_SESSION[$sub]['error'] . '</div>';
            $_SESSION[$sub]['error'] = "";
        }// if end.
        if (empty($sub) && !empty($_SESSION['error'])) {
            $msg = '<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button> ' . $_SESSION['error'] . '</div>';
            $_SESSION['error'] = "";
        }// if end.
        return $msg;
    }

}

if (!function_exists("generatePassword")) {
    function generatePassword($length = 8)
    {
        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        //'0123456789``-=~!@#$%^&*()_+,./<>?;:[]{}\|';
        $str = '';
        $max = strlen($chars) - 1;
        for ($i = 0; $i < $length; $i++)
            $str .= $chars[rand(0, $max)];
        return $str;
    }
}

if (!function_exists("generateOTP")) {

    function generateOTP($length = 6)
    {
        $chars = '0123456789';
        $str = '';
        $max = strlen($chars) - 1;
        for ($i = 0; $i < $length; $i++)
            $str .= $chars[rand(0, $max)];
        return $str;
    }

}

if (!function_exists("dateDB2SHOW")) {

    function dateDB2SHOW($db_date = "", $format = "", $display = "")
    {
        if (!empty($db_date) && $db_date != "0000-00-00" && $db_date != "0000-00-00 00:00:00") {
            $db_date = strtotime($db_date);
            if (!empty($format)) {
                return date($format, $db_date);
            }
            return date("d/m/Y", $db_date);
        }
        return $display;
    }
}
if (!function_exists("limit_words")) {
    function limit_words($string, $word_limit)
    {
        $words = explode(" ", $string);
        return implode(" ", array_splice($words, 0, $word_limit));
    }
}
if (!function_exists("slugify")) {
    function slugify($text)
    {
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
        $text = trim($text, '-');
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        $text = strtolower($text);
        $text = preg_replace('~[^-\w]+~', '', $text);
        if (empty($text)) {
            return 'n-a';
        }
        return $text;
    }
}
if (!function_exists("dateNameDB2SHOW")) {
    function dateNameDB2SHOW($db_date = "", $display = "")
    {
        if (!empty($db_date) && $db_date != "0000-00-00" && $db_date != "0000-00-00 00:00:00") {
            $db_date = strtotime($db_date);
            return date("d M Y", $db_date);
        }
        return $display;
    }
}
if (!function_exists("timeDB2SHOW")) {

    function timeDB2SHOW($db_date = "", $display = "")
    {
        if (!empty($db_date) && $db_date != "0000-00-00" && $db_date != "0000-00-00 00:00:00") {
            $db_date = strtotime($db_date);
            return date("h:m A", $db_date);
        }
        return $display;
    }
}
if (!function_exists("dateTimeDB2SHOW")) {
    function dateTimeDB2SHOW($db_date = "", $format = "", $display = "")
    {
        if (!empty($db_date) && $db_date != "0000-00-00" && $db_date != "0000-00-00 00:00:00") {
            $db_date = strtotime($db_date);
            if (!empty($format)) {
                return date($format, $db_date);
            } else {
                return date("d/m/Y h:i A", $db_date);
            }
        }
        return $display;
    }

}
if (!function_exists("dateForm2DB")) {

    function dateForm2DB($frm_date)
    {
        $frm_date = explode("/", $frm_date);
        if (!empty($frm_date[0]) && !empty($frm_date[1]) && !empty($frm_date[2])) {
            return $frm_date[2] . "-" . $frm_date[1] . "-" . $frm_date[0];
        } else {
            return "";
        }
    }

}

if (!function_exists("uploadImage")) {
    function uploadImage($field, $folder_name = '/data/', $file_name = '', $width)
    {
        if (!empty($_FILES[$field]['name'])) {
            if (!file_exists(FCPATH . $folder_name)) {
                mkdir(FCPATH . $folder_name, 0775);
            }
            $upload_path = FCPATH . $folder_name;
            if ($_FILES[$field]['error'] === 0) {
                $file_info = pathinfo($_FILES[$field]['name']);
                $tmp = $_FILES[$field]['tmp_name'];
                $file_name = $file_name . "." . $file_info['extension'];
                $file_path = $upload_path . $file_name;
                $file_thumb_path = $upload_path . "thumb_" . $file_name;
                try {
                    if (@move_uploaded_file($tmp, $file_path)) {
                        if (@copy($file_path, $file_thumb_path)) {
                            $img = new abeautifulsite\SimpleImage($file_thumb_path);
                            $img->fit_to_width($width)->save($file_thumb_path);
                        }
                        return $file_name;
                    }

                } catch (Exception $e) {
                }
            }
        }
        return false;
    }
}
if (!function_exists("dateTimeForm2DB")) {

    function dateTimeForm2DB($frm_date)
    {
        $frm_date_time = explode(" ", $frm_date);
        $frm_date = explode("/", $frm_date_time[0]);
        $frm_time = explode(":", $frm_date_time[1]);
        if (!empty($frm_date[0]) && !empty($frm_date[1]) && !empty($frm_date[2])) {
            if (!isset($frm_time[0]))
                $frm_time[0] = "00";
            if (!isset($frm_time[1]))
                $frm_time[1] = "00";
            if (!isset($frm_time[2]))
                $frm_time[2] = "00";
            if (!empty($frm_date_time[2]) && $frm_date_time[2] == "AM" && $frm_time[0] == 12) {
                $frm_time[0] = "00";
            } else if (!empty($frm_date_time[2]) && $frm_date_time[2] == "PM" && $frm_time[0] < 12) {
                $frm_time[0] = (int)$frm_time[0];
                $frm_time[0] = $frm_time[0] + 12;
            }
            return $frm_date[2] . "-" . $frm_date[1] . "-" . $frm_date[0] . " " . $frm_time[0] . ":" . $frm_time[1] . ":" . $frm_time[2];
        } else {
            return "";
        }
    }

}


if (!function_exists("imgUpload")) {

    function imgUpload($field, $folder = '/data/', $file_name = '', $overwrite = true)
    {
        $allowed_types = 'gif|jpg|jpeg|png';
        if (!empty($_FILES[$field]['name'])) {
            if (!file_exists(FCPATH . $folder)) {
                mkdir(FCPATH . $folder, 0775);
            }
            $upload_path = FCPATH . $folder;
            if ($_FILES[$field]['error'] === 0) {
                $file_info = pathinfo($_FILES[$field]['name']);
                $file_name = $file_name . "." . $file_info['extension'];
                $file_path = $upload_path . $file_name;

                if (@move_uploaded_file($_FILES[$field]["tmp_name"], $file_path)) {
                    return $file_name;
                    // return $upload_path;
                }
            }
        }
        return false;
    }

}

if (!function_exists("uploadFiles")) {

    function uploadFiles($folder = '/data/', $field_name)
    {

        $allowed_types = 'gif|jpg|jpeg|png';
        $path_to_store = FCPATH . $folder;
        $sent_file_name = $field_name;
        $tmp_files = $_FILES[$sent_file_name]['tmp_name'];

        if (!file_exists($path_to_store)) {
            mkdir($path_to_store, 0755, true);
        }

        foreach ($tmp_files as $key => $tmp_name) {
            $files = $_FILES[$sent_file_name]['name'][$key];
            @move_uploaded_file($tmp_name, $path_to_store . '/' . $files);
        }

    }
}

if (!function_exists("createFolder")) {

    function createFolder($folder = '/data/')
    {
        if (!file_exists(FCPATH . $folder)) {
            mkdir(FCPATH . $folder, 0755, true);
        }
    }

}

if (!function_exists("shortDesc")) {

    function shortDesc($str, $len = 300)
    {
        $str = substr($str, 0, $len);
        return $str;
    }

}

function lchar($str, $val)
{
    return strlen($str) <= $val ? $str : substr($str, 0, $val) . '...';
}

function curl_get_contents($url)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}

if (!function_exists("getIPInfo")) {

    function getIPInfo($ip = '')
    {
        if (empty($ip)) {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return json_decode(curl_get_contents("http://ipinfo.io/{$ip}/json"));
    }

}

if (!function_exists("getFiles")) {
    function getFiles($folder_name, $flag = "")
    {
        // $files = glob(FCPATH.$folder_name);
        $files = scandir($folder_name);
        if ($flag == "") {
            foreach ($files as $f) {
                if (is_dir($f)) {
                    $files = array_merge($files, getFiles($f . '/*.*')); // scan subfolder
                }
            }
            natsort($files);
            return $files;
        } else if ($flag == '1') {
            return $files[0];
        }
    }
}

if (!function_exists("getSmallTitle")) {
    function getSmallTitle($string = '')
    {
        $words = explode(' ', $string);
        if (!empty($words)) {
            $count = count($words);
            $fc = '';
            for ($i = 0; $i < $count; $i++) {
                $fc .= $words[$i][0];
            }
            return $fc;
        }
    }
}
if (!function_exists("isLoginExists")) {
    function isLoginExists()
    {
        if (isset($_SESSION['LAST_REQUEST_TIME'])) {
            if (time() - $_SESSION['LAST_REQUEST_TIME'] > 800) {
                $_SESSION = array();
                session_destroy();
                redirect(base_url() . 'admin/logout/');
            }
        }
        $_SESSION['LAST_REQUEST_TIME'] = time();
    }
}
if (!function_exists("_logged")) {
    function _logged()
    {
        if (isset($_SESSION)) {
            if (empty($_SESSION['USER_ID'])) {
                session_destroy();
                redirect(base_url() . 'admin/logout/');
            }
        }
    }
}
if (!function_exists("dummyLogo")) {
    function dummyLogo()
    {
        return base_url().'data/dummy.jpg';
    }
}
if (!function_exists("financialYear")) {
    function financialYear()
    {
        $financialYear = '';
        $prev_year = substr(date('Y'), 2, 2) - 1;
        $current_year = substr(date('Y'), 2, 2);
        $next_year = substr(date('Y'), 2, 2) + 1;
        if (date('m') >= '04') {
            $financialYear =  $current_year . '-' . $next_year;
        }
        if (date('m') <= '03') {
            $financialYear =  $prev_year . '-' . $current_year;
        }
        return $financialYear;
    }
}

if (!function_exists("orderFormat")) {
    function orderFormat($number)
    {
        $finance_year = financialYear();
        return 'SCIE'. '-'.financialYear() .'/O-'. $number; //SCIE-17-18/O-001
    }
}

if (!function_exists("get_product_csv_header")) {

    function get_product_csv_header()
    {
        return ["Main Product Name", "Sub Product", "Product Model", "Manufacture No", "Product Image", "Sub Product Image", "DataSheet", "HSN Code", "HSN Description", "GST%", "MRP", "Discount", "Price Range", "Dealer Price", "Has Mac ID", "Description", "Product Status"];
    }
}
if (!function_exists("get_dealer_csv_header")) {

    function get_dealer_csv_header()
    {
        return ["USER NAME", "FIRST NAME", "LAST NAME", "EMAIL", "COMPANY NAME", "GSTIN ", "ADDRESS", "CITY", "STATE ", "POSTAL CODE", "PHONE NO", "COUNTRY CODE", "PROFILE LOGO", "STATUS"];
    }
}

if (!function_exists("get_main_products")) {

    function get_main_products()
    {
        $CI = &get_instance();
        $CI->db->select("mp.product_id, mp.product_name main_product_name");
        $CI->db->from('tbl_products mp');
        $CI->db->where("mp.parent_id","0");
        $CI->db->where("mp.parent_id IN (SELECT parent_id FROM tbl_products)");
        $query = $CI->db->get();
        if($query) {
            return $query->result_array();
        }
        else {
            $error = $CI->db->error();
            throw new Exception("Error [".$error['code']."] ".$error['message'], 1);
        }
    }
}

if (!function_exists("get_sub_products")) {

    function get_sub_products($parent_id)
    {
        $CI = &get_instance();
        $CI->db->select("mp.product_id, mp.product_name sub_product_name, (SELECT count(product_id) FROM tbl_products WHERE parent_id = mp.product_id AND is_active = '1') as model_cnt");
        $CI->db->from('tbl_products mp');
        $CI->db->where("mp.parent_id", $parent_id);
        $CI->db->where("mp.is_active", '1');
        $query = $CI->db->get();
        if($query) {
            return $query->result_array();
        }
        else {
            $error = $CI->db->error();
            throw new Exception("Error [".$error['code']."] ".$error['message'], 1);
        }
    }
}

if (!function_exists("get_products")) {

    function get_products($parent_id)
    {
        $CI = &get_instance();
        $CI->db->select("mp.product_id, mp.product_name product_name, mp.product_logo, pd.*");
        $CI->db->from('tbl_products mp');
        $CI->db->join('tbl_product_info pd','pd.product_id = mp.product_id','left');
        $CI->db->where("mp.parent_id", $parent_id);
        $CI->db->where("mp.is_active", '1');
        $CI->db->order_by('mp.product_id','desc');
        $query = $CI->db->get();
        if($query) {
            return $query->result_array();
        }
        else {
            $error = $CI->db->error();
            throw new Exception("Error [".$error['code']."] ".$error['message'], 1);
        }
    }
}

if (!function_exists("get_product_name")) {

    function get_product_name($product_id)
    {
        $CI = &get_instance();
        $CI->db->select("mp.product_name");
        $CI->db->from('tbl_products mp');
        $CI->db->where("mp.product_id", $product_id);
        $CI->db->where("mp.is_active", '1');
        $CI->db->limit(1);
        $query = $CI->db->get();
        if($query) {
            $result = $query->row_array();
            return ucwords(strtolower($result['product_name']));
        }
        else {
            $error = $CI->db->error();
            throw new Exception("Error [".$error['code']."] ".$error['message'], 1);
        }
    }
}

if (!function_exists("get_product_detail")) {

    function get_product_detail($product_id)
    {
        $CI = &get_instance();
        $CI->db->select("p.*, de.*, mp.product_id as mp_product_id, mp.product_name as mp_product_name, sp.product_id as sp_product_id, sp.product_name as sp_product_name");
        $CI->db->from('tbl_products p');
        $CI->db->join('tbl_product_info de','de.product_id = p.product_id','left');
        $CI->db->join('tbl_products sp','sp.product_id = p.parent_id','left');
        $CI->db->join('tbl_products mp','mp.product_id = sp.parent_id','left');
        $CI->db->where("p.product_id", $product_id);
        $CI->db->where("p.is_active", '1');
        $query = $CI->db->get();
        if($query) {
            return $query->row_array();
        }
        else {
            $error = $CI->db->error();
            throw new Exception("Error [".$error['code']."] ".$error['message'], 1);
        }
    }
}

if (!function_exists("get_latest_products")) {

    function get_latest_products($limit = 5)
    {
        $CI = &get_instance();
        $CI->db->select("p.*, de.*, mp.product_id as mp_product_id, mp.product_name as mp_product_name, sp.product_id as sp_product_id, sp.product_name as sp_product_name");
        $CI->db->from('tbl_products p');
        $CI->db->join('tbl_product_info de','de.product_id = p.product_id','left');
        $CI->db->join('tbl_products sp','sp.product_id = p.parent_id','left');
        $CI->db->join('tbl_products mp','mp.product_id = sp.parent_id','left');
        $CI->db->where("p.is_active", '1');
        $CI->db->limit($limit);
        $CI->db->order_by('p.product_id','desc');
        $query = $CI->db->get();
        if($query) {
            return $query->result_array();
        }
        else {
            $error = $CI->db->error();
            throw new Exception("Error [".$error['code']."] ".$error['message'], 1);
        }
    }
}

if (!function_exists("find_products")) {

    function find_products($where = '')
    {
        $CI = &get_instance();
        $CI->db->select("p.*, de.*, mp.product_id as mp_product_id, mp.product_name as mp_product_name, sp.product_id as sp_product_id, sp.product_name as sp_product_name");
        $CI->db->from('tbl_products p');
        $CI->db->join('tbl_product_info de','de.product_id = p.product_id','left');
        $CI->db->join('tbl_products sp','sp.product_id = p.parent_id','left');
        $CI->db->join('tbl_products mp','mp.product_id = sp.parent_id','left');
        $CI->db->where("p.is_active", '1');
        // $CI->db->limit($limit);
        if (isset($where['keyword']) && trim($where['keyword']) != '') { 
            $CI->db->like('p.product_name',$where['keyword'],'both');
        }

        if (isset($where['price_from']) && $where['price_from'] > 0) {
            $CI->db->where('de.mrp_price >= '. $where['price_from']);
        }

        if (isset($where['price_to']) && $where['price_to'] > 0) {
            $CI->db->where('de.mrp_price <= '. $where['price_to']);
        }

        $CI->db->order_by('p.product_id','desc');
        $query = $CI->db->get();
        if($query) {
            return $query->result_array();
        }
        else {
            $error = $CI->db->error();
            throw new Exception("Error [".$error['code']."] ".$error['message'], 1);
        }
    }
}

if ( ! function_exists('show_alert')) 
{
    function show_alert($message, $type="success")
    {
        if($type == 'error') {
            $type = 'danger';
        }

        $class='';
        if($type=='success')
            $class="fa fa-check";
        elseif($type=='danger')
            $class="fa fa-exclamation-circle";
        elseif($type=='warning')
            $class="fa fa-exclamation-triangle";
        elseif($type=='info')
            $class="fa fa-info-circle";

        $CI = & get_instance();
        $CI->session->set_flashdata("alert", "
        <div class='alert alert-$type fade in'>
            <span class='close' data-dismiss='alert'>×</span>
            <p><i class='$class pull-left'></i>  $message</p>
        </div>");
    }
}

if ( ! function_exists('is_user_login')) 
{
    function is_user_login()
    {
        $CI = &get_instance();
        if ($CI->session->has_userdata('user')) {
            return true;
        }
        return false;
    }
}
?>
