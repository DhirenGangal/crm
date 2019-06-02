<?php

Class Export extends CI_Controller{
    function __construct()
    {
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

    function export_dealers()
    {
        $filename = "Dealers-" . date('d-m-Y h:m:i');
        header("Cache-Control: max-age=0");
        header("Content-Disposition: attachment; filename=$filename.xls");  //File name extension was wrong
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: private", false);
        $dealers = $this->dbapi->searchUsers(["role"=>"DEALER"]);
        echo "<pre>";
        print_r($dealers);
        echo "</pre>";
        $sep = "\t";
        $fields = ["S.NO","USER NAME","NAME","EMAIL","COMPANY NAME", "GSTIN ", "ADDRESS", "CITY", "STATE ", "POSTAL CODE", "PHONE NO", "COUNTRY CODE", "ROLE","CREATED BY","IS ACTIVE"];
        foreach ($fields as $field) {
            echo $field . "\t";
        }
        print("\n");
        foreach ($dealers as $row) {
            $schema_insert = "";
            $j = 0;
            foreach ($fields as $field) {
                if ($j == 0) {
                    $schema_insert .= $row['member_id'] . $sep;
                    $schema_insert .= $row['user_name'] . $sep;
                    $schema_insert .= $row['first_name'].' '.$row['last_name'] . $sep;
                    $schema_insert .= $row['email'] . $sep;
                    $schema_insert .= $row['company_name'] . $sep;
                    $schema_insert .= $row['gst'] . $sep;
                    $schema_insert .= $row['address'] . $sep;
                    $schema_insert .= $row['city'] . $sep;
                    $schema_insert .= $row['state'] . $sep;
                    $schema_insert .= $row['postal_code'] . $sep;
                    $schema_insert .= $row['phone_no'] . $sep;
                    $schema_insert .= $row['country_code'] . $sep;
                    $schema_insert .= $row['role'] . $sep;
                    $schema_insert .= $row['created_by'] . $sep;
                    $schema_insert .= $row['is_active'] . $sep;
                }
                $j++;
            }
            $schema_insert = str_replace($sep . "$", "", $schema_insert);
            $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
            $schema_insert .= "\t";
            print(trim($schema_insert));
            print "\n";
        }
    }
}





?>