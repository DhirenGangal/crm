<?php

class Dealer extends MY_Controller
{
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
        $this->header_data['user_data'] = $this->dbapi->getUserById($_loggedUser);
        $this->header_data['cart_items'] = $cart_items;
    }

    public function sort_products()
    {
        $i = 1;
        foreach ($_POST['item'] as $value) {
            $data = array();
            $data['display_order'] = $i;
            $this->dbapi->updateProductsOrder($data, $value);
            $i++;
        }
    }


}

?>