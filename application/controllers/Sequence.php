<?php

class Sequence extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');

        $this->load->model("SAIDBAPI", "dbapi", TRUE);
        $this->load->model("DBAPI", "dbapi1", TRUE);
        $this->header_data['site_title'] = $this->header_data['title'];
        $_loggedUser = !empty($_SESSION['USER_ID']) ? $_SESSION['USER_ID'] : '';
        $_loggedUserRole = !empty($_SESSION['ROLE']) ? $_SESSION['ROLE'] : '';
        $this->header_data['user_data'] = $this->dbapi1->getUserById($_loggedUser);
        $cart_items = $this->dbapi1->searchCartItems(['created_by' => $_loggedUser], ['role' => $_loggedUserRole]);
        $this->header_data['cart_items'] = $cart_items;
        $_SESSION['backUrl'] = !empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

    }

    function index()
    {
        $data = array();
        $search_data = array();
        if (!empty($this->_REQ['member_id'])) {
            $search_data['member_id'] = $this->_REQ['member_id'];
        }
        $data['sequences'] = $this->dbapi->getSequences($search_data);
        $data['members'] = $this->dbapi1->getMembersList();
        $this->_admin('sequences/index', $data);
    }

    function ajx()
    {
        if (!empty($this->_REQ)) {
            $pdata['member_id'] = !empty($this->_REQ['member']) ? $this->_REQ['member'] : '';
            $pdata['prefix'] = !empty($this->_REQ['prefix']) ? $this->_REQ['prefix'] : '';
            $pdata['series_start'] = !empty($this->_REQ['start']) ? $this->_REQ['start'] : '';
          //  $pdata['pk'] = !empty($this->_REQ['pk']) ? $this->_REQ['pk'] : '';
            $seq = $this->dbapi->getPrefixByMember($pdata['member_id']);
            if (!empty($seq)) {
                    $this->dbapi->updatePrefix($pdata, $pdata['member_id']);
                    echo "201";
            } else {
                $last_id = $this->dbapi->addSequence($pdata);
                if ($last_id) {
                    echo "200";
                }
            }

            /*if ($this->dbapi->checkPrefix( $pdata['prefix'])) {
                echo "409";
                return false;
            } else {


            }
            if (isset($pk)) {
                $this->dbapi->updatePrefix($pdata, $pdata['member_id']);
                echo "201";
            }*/
        }
    }

}

?>