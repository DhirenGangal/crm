<?php

class SORTAPI extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->library(array('cart'));
        $this->load->library('');
        $this->load->helper('url');
        $this->load->database();
    }

    function updateProductsOrder(){

    }

}


?>