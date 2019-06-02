<?php

class Owner extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session', 'cart');
        $this->load->model("DBAPI", "dbapi", TRUE);
        $this->load->model("SAIDBAPI", "api", TRUE);
        $this->header_data['site_title'] = $this->header_data['title'];
        $_loggedUser = !empty($_SESSION['USER_ID']) ? $_SESSION['USER_ID'] : '';
        $_loggedUserRole = !empty($_SESSION['ROLE']) ? $_SESSION['ROLE'] : '';
        $this->header_data['user_data'] = $this->dbapi->getUserById($_loggedUser);
        $cart_items = $this->dbapi->searchCartItems(['created_by' => $_loggedUser], ['role' => $_loggedUserRole]);
        $this->header_data['cart_items'] = $cart_items;
    }

    public function index()
    {
        if (!empty($_POST['LOGIN']) && !empty($_POST['email']) && !empty($_POST['password'])) {
            $user = $this->dbapi->ownerLogin($_POST['email'], $_POST['password']);
            // echo $this->db->last_query();exit;
            if (!empty($user['user_id'])) {
                $_SESSION = array();
                $_SESSION['USER_ID'] = $user['user_id'];
                $_SESSION['USER_NAME'] = $user['first_name'];
                $_SESSION['USER_EMAIL'] = $user['email'];
                $_SESSION['ROLE'] = $user['role'];
                $_SESSION['IMG'] = $user['user_logo'];
                $_SESSION['STATE'] = $user['state'];
                $_SESSION['DEALER_ID'] = $user['dealer_id'];
                redirect(base_url() . "owner/dashboard/");
            } else if (!empty($user['is_active']) && $user['is_active'] != "1") {
                $_SESSION['error'] = "Your account is not active.";
            } else {
                $_SESSION['error'] = "Invalid Email/Password.";
            }
        }
        $data['user'] = $_POST;
        if (!empty($_SESSION['USER_ID'])) {
            redirect(base_url() . 'owner/dashboard/');
        }
        $data['title'] = $this->header_data['title'];
        $this->load->view("owner/login", $data);
    }

    function dashboard()
    {
        $data = array();
        _logged();
        $this->header_data['title'] .= " | Dashboard ";
        $data['p_cnt'] = $this->dbapi->searchProducts(['is_active' => 1], "CNT");
        $data['sp_cnt'] = $this->dbapi->searchProducts(['parent_id' => '0', 'is_active' => 1], "CNT");
        $data['cp_cnt'] = $this->dbapi->searchChildProductInfo(['offset' => '0'], "CNT");
        $data['dealers_cnt'] = $this->dbapi->searchUsers(['role' => 'DEALER', 'is_active' => 1], "CNT");
        $data['users_cnt'] = $this->dbapi->searchNewUsers(['role' => 'ADMIN', 'is_active' => 1], "CNT");
        $this->_owner('dashboard', $data);
    }

    public function products()
    {
        $this->header_data['title'] = "Products";
        $data = array();
        _logged();
        if (!empty($this->_REQ['product_id']))
            $products = $this->dbapi->searchProducts(["is_active" => '1']);
        if (!empty($products)) {
            $lp1 = 0;
            foreach ($products as &$product) {
                if (!empty($product) && $lp1 == 0) {
                    $child_product = $this->dbapi->searchProducts(["is_active" => '1', 'key' => $product['product_id']]);
                    if (!empty($child_product)) {

                        foreach ($child_product as &$sub_child) {

                            $childproduct_info = $this->dbapi->searchProducts(["is_active" => '1', 'key' => $this->_REQ['product_id']]);
                            if (!empty($childproduct_info)) {
                                foreach ($childproduct_info as &$info) {
                                    $information = $this->dbapi->searchChildProductInfo(['product_id' => $info['product_id']]);
                                    $info['product_details'] = $information;
                                }
                            }
                            $sub_child['child_products'] = $childproduct_info;
                        }
                        $product['sub_products'] = $child_product;
                    }
                }
                $lp1++;
            }
        } else {
            $products = $this->dbapi->searchProducts(["is_active" => '1']);
            if (!empty($products)) {
                foreach ($products as &$product) {
                    if (!empty($product)) {
                        $child_product = $this->dbapi->searchProducts(["is_active" => '1', 'key' => $product['product_id']]);
                        if (!empty($child_product)) {
                            foreach ($child_product as &$sub_child) {
                                $childproduct_info = $this->dbapi->searchProducts(["is_active" => '1', 'key' => $sub_child['product_id']]);
                                if (!empty($childproduct_info)) {
                                    foreach ($childproduct_info as &$info) {
                                        $information = $this->dbapi->searchChildProductInfo(['product_id' => $info['product_id']]);
                                        $info['product_details'] = $information;
                                    }
                                }
                                $sub_child['child_products'] = $childproduct_info;
                            }
                            $product['sub_products'] = $child_product;
                        }
                    }
                }
            }
        }
        $data['products'] = $products;
        $data['main_products'] = $this->dbapi->getMainProducts();
        $data['sub_products'] = $this->dbapi->getSubProductsList1();


        $this->_owner('products', $data);
    }

    public function add_cart_infobkup()
    {
        if (!empty($this->_REQ['product'])) {
            $p_id = $this->_REQ['product'];
            $data['product_info_id'] = !empty($p_id) ? trim($p_id) : '';
            $data['quantity'] = !empty($_POST['quantity']) ? trim($_POST['quantity']) : '';
            $data['created_by'] = !empty($_SESSION['USER_ID']) ? trim($_SESSION['USER_ID']) : '';
            $product_details = $this->dbapi->getCartItemByProductId($this->_REQ['product']);
            if (!empty($product_details)) {
                $tdata = array();
                $tdata['quantity'] = $product_details['quantity'];
                $last_id = $this->dbapi->updateCartItemsByProductId($tdata['quantity'], $p_id);
            } else {
                $last_id = $this->dbapi->addToCart($data);
            }
            $data['cart_items'] = $this->dbapi->searchCartItems(['created_by' => $_SESSION['USER_ID']]);
            if (!empty($this->_REQ['product']) && isset($this->_REQ['quantity']) && !empty($last_id)) {
                $product_details = $this->dbapi->getChildProductInfoById($this->_REQ['product']);
                $q = $this->_REQ['quantity'];
                $price = $this->_REQ['mrp'];
                if (!empty($q) && !empty($price) && !empty($product_details)) {
                    $total = $q * $price;
                    $data['product_details'] = $product_details;
                    $data['qty'] = $q;
                    $data['total'] = $total;
                    $pdata['sub_total'] = !empty($total);
                    //  $this->dbapi->updateCartItems($pdata['sub_total'], $last_id);
                    $this->load->view('owner/cart-info', $data);
                }
            }
        }
    }

    public function add_cart_info()
    {
        if (!empty($_GET['act']) && $_GET['act'] == 'del' && !empty($_GET['pk_id'])) {
            $this->dbapi->delCartItem($_GET['pk_id']);
            redirect(base_url() . "owner/products");
        }

        if (!empty($this->_REQ['product']) && isset($this->_REQ['quantity'])) {
            $p = $this->_REQ['product'];
            $q = $this->_REQ['quantity'];
            $d = $this->_REQ['discount'];
            $product_details = $this->dbapi->getChildProductInfoById($p);
            $price = $this->_REQ['mrp'];
            if (!empty($q) && !empty($price) && !empty($product_details)) {
                if (!empty($d)) {
                    $item_total = $q * $price;
                    $discount = ($item_total * $d) / 100;
                    $total = ($item_total - $discount);
                    $data['product_details'] = $product_details;
                    $data['qty'] = $q;
                    $data['total'] = $total;
                    $this->load->view('owner/cart-info', $data);
                } else {
                    $total = ($q * $price);
                    $data['product_details'] = $product_details;
                    $data['qty'] = $q;
                    $data['total'] = $total;
                    $this->load->view('owner/cart-info', $data);
                }


            }
            $pdata['product_info_id'] = $p;
            $pdata['quantity'] = $q;
            $pdata['sub_total'] = $total;
            $pdata['created_by'] = !empty($_SESSION['USER_ID']) ? trim($_SESSION['USER_ID']) : "";
            $pdata['role'] = !empty($_SESSION['ROLE']) ? trim($_SESSION['ROLE']) : "";
            $product_details = $this->dbapi->getCartItemByProductId($p);
            if (!empty($product_details)) {
                $tdata = array();
                $tdata['quantity'] = $pdata['quantity'] + $product_details['quantity'];
                $tdata['sub_total'] = $pdata['sub_total'] + $product_details['sub_total'];
                $this->dbapi->updateCartItemsByProductId($tdata, $p);
                $data['cart_items'] = $this->dbapi->searchCartItems(['created_by' => $_SESSION['USER_ID']], ['role' => $_SESSION['ROLE']]);
                $this->load->view('owner/cart-data', $data);
            } else {
                $this->dbapi->addToCart($pdata);
                $data['cart_items'] = $this->dbapi->searchCartItems(['created_by' => $_SESSION['USER_ID']], ['role' => $_SESSION['ROLE']]);
                $this->load->view('owner/cart-data', $data);
            }
        }
    }

    public function add_to_cart()
    {
        $this->header_data['title'] = "Cart Items";
        $data = array();
        _logged();
        if (!empty($_GET['act']) && $_GET['act'] == 'del' && !empty($_GET['pk_id'])) {
            $this->dbapi->delCartItem($_GET['pk_id']);
            redirect(base_url() . "owner/products");
        }
        if (!empty($_POST['product_info_id'])) {
            $p_id = $this->_REQ['product_info_id'];
            $pdata = array();
            $pdata['product_info_id'] = !empty($_POST['product_info_id']) ? trim($_POST['product_info_id']) : "";
            $pdata['quantity'] = !empty($_POST['quantity']) ? trim($_POST['quantity']) : "0";
            $pdata['sub_total'] = !empty($_POST['sub_total']) ? trim($_POST['sub_total']) : "";
            $pdata['created_by'] = !empty($_SESSION['USER_ID']) ? trim($_SESSION['USER_ID']) : "";
            $product_details = $this->dbapi->getCartItemByProductId($this->_REQ['product_info_id']);
            if (!empty($product_details)) {
                $tdata = array();
                $tdata['quantity'] = $pdata['quantity'] + $product_details['quantity'];
                $tdata['sub_total'] = $pdata['sub_total'] + $product_details['sub_total'];
                $this->dbapi->updateCartItemsByProductId($tdata, $p_id);
                $data['cart_items'] = $this->dbapi->searchCartItems(['created_by' => $_SESSION['USER_ID']]);
                $this->load->view('owner/cart-data', $data);
            } else {
                $this->dbapi->addToCart($pdata);
                $data['cart_items'] = $this->dbapi->searchCartItems(['created_by' => $_SESSION['USER_ID']]);
                $this->load->view('owner/cart-data', $data);
            }

        }
    }

    public function view_cart()
    {
        $this->header_data['title'] = "Cart Items";
        $data = array();
        _logged();
        if (!empty($_GET['act']) && $_GET['act'] == 'del' && !empty($_GET['pk_id'])) {
            $this->dbapi->delCartItem($_GET['pk_id']);
            redirect(base_url() . "owner/view-cart");
        }
        $data['cart_items'] = $this->dbapi->searchCartItems(['created_by' => $_SESSION['USER_ID']], ['role' => $_SESSION['ROLE']]);
        $this->_owner('view-cart', $data);
    }

    public function update_cart()
    {
        $pdata = array();
        if (!empty($_POST['product_info_id'])) {
            $pdata['product_info_id'] = !empty($_POST['product_info_id']) ? trim($_POST['product_info_id']) : "";
            $pdata['quantity'] = !empty($_POST['quantity']) ? trim($_POST['quantity']) : "0";
            $pdata['sub_total'] = !empty($_POST['sub_total']) ? trim($_POST['sub_total']) : "";
            $pdata['created_by'] = !empty($_SESSION['USER_ID']) ? trim($_SESSION['USER_ID']) : "";
            $pdata['role'] = !empty($_SESSION['ROLE']) ? trim($_SESSION['ROLE']) : "";
            $last_id = $this->dbapi->updateCartItemsByProductId($pdata, $_POST['product_info_id']);
            if (!empty($last_id)) {
                $total = $pdata['quantity'] * $_POST['mrp_price'];
                echo $total;
                return true;
            } else {
                return false;
            }
        }
    }

    public function clear_cart()
    {
        $user_id = $this->_REQ['created_by'];
        if (!empty($user_id)) {
            $res = $this->dbapi->emptyCartTable($user_id);
            redirect(base_url() . "owner/view-cart");
        }

    }

    public function fetch_product_details()
    {
        if (!empty($this->_REQ['product_info_id'])) {
            $product_details = $this->dbapi->getChildProductInfoById($this->_REQ['product_info_id']);
            if (!empty($product_details)) {
                $data['product_details'] = $product_details;
                $this->load->view('owner/product-details', $data);
            }
        }
    }

    public function product_orders()
    {
        $this->header_data['title'] = "Product Orders";
        $data = array();
        _logged();
        $this->_owner('product-orders', $data);
    }

    public function view_orders()
    {
        $this->header_data['title'] = "View Orders";
        $data = array();
        _logged();
        $this->_owner('view-orders', $data);
    }

    public function orders($act = '', $str = '')
    {
        $this->header_data['title'] = "Orders";
        _logged();
        $data = array();
        if (!empty($_GET['act']) && $_GET["act"] == "del" && !empty($_GET['order_id'])) {
            $this->dbapi->delOrder($_GET['order_id']);
            $this->dbapi->delOrderItem($_GET['order_id']);
            redirect(base_url() . 'owner/orders/');
        }
        if (!empty($_GET['act']) && $_GET['act'] == 'status' && !empty($_GET['order_id']) && isset($_GET['sta'])) {
            $is_active = (!empty($_GET['sta']) && $_GET['sta'] == '1') ? "1" : "0";
            $this->dbapi->updateOrder(array("is_active" => $is_active), $_GET['order_id']);
            redirect(base_url() . "owner/orders/");
        }
        if ($act == "add") {
            if (!empty($_POST['order_date'])) {
                $data['order_date'] = !empty($_POST['order_date']) ? dateForm2DB($_POST['order_date']) : '';
                $data['expected_date'] = !empty($_POST['expected_date']) ? dateForm2DB($_POST['expected_date']) : '';
                $data['delivery_within'] = !empty($_POST['delivery_within']) ? trim($_POST['delivery_within']) : '';
                $data['remarks'] = !empty($_POST['remarks']) ? trim($_POST['remarks']) : '';
                $data['created_by'] = !empty($_SESSION['USER_ID']) ? trim($_SESSION['USER_ID']) : '';
                $data['user_id'] = !empty($_SESSION['USER_ID']) ? trim($_SESSION['USER_ID']) : '';
                $data['dealer_id'] = !empty($_POST['dealer_id']) ? trim($_POST['dealer_id']) : '';
                $data['sub_amount'] = !empty($_POST['sub_amount']) ? trim($_POST['sub_amount']) : '0.00';
                $data['cgst_amount'] = !empty($_POST['cgst_amount']) ? trim($_POST['cgst_amount']) : '0.00';
                $data['sgst_amount'] = !empty($_POST['sgst_amount']) ? trim($_POST['sgst_amount']) : '0.00';
                $data['igst_amount'] = !empty($_POST['igst_amount']) ? trim($_POST['igst_amount']) : '0.00';
                $data['discount_total'] = !empty($_POST['discount_amount']) ? trim($_POST['discount_amount']) : '0.00';
                $data['tax_amount'] = !empty($_POST['tax_amount']) ? trim($_POST['tax_amount']) : '0.00';
                $data['final_total'] = !empty($_POST['final_total']) ? trim($_POST['final_total']) : '0.00';
                $data['text_amount'] = !empty($_POST['text_amount']) ? trim($_POST['text_amount']) : '0.00';
                $_seq_cnt = $this->api->getOrderCountByMember($data['dealer_id']);
                $data['order_no'] = !empty($_POST['order_no']) ? $_POST['order_no'] : 'SCIE-' . $_seq_cnt['cnt'];
                $latest_seq = $_seq_cnt['cnt'] + 1;
                $this->api->updatePrefix(['series_start' => $latest_seq], $data['dealer_id']);
                $last_id = $this->dbapi->addOrder($data);
                if (!empty($last_id)) {
                    if (!empty($_POST['product_id'])) {
                        foreach ($_POST['product_id'] as $key => $value) {
                            $odata = [];
                            $odata['order_id'] = $last_id;
                            $odata['product_id'] = $_POST['product_id'][$key];
                            $odata['product_name'] = $_POST['product_name'][$key];
                            $odata['unit_price'] = !empty($_POST['mrp_price']) ? $_POST['mrp_price'][$key] : '0.00';
                            $odata['quantity'] = !empty($_POST['quantity']) ? $_POST['quantity'][$key] : '0';
                            $odata['amount'] = $odata['unit_price'] * $odata['quantity'];
                            $odata['amnt_aft_discount'] = !empty($_POST['input_amount']) ? $_POST['input_amount'][$key] : '0.00';
                            $odata['cgst_amount'] = !empty($_POST['input_cgst']) ? $_POST['input_cgst'][$key] : '0.00';
                            $odata['sgst_amount'] = !empty($_POST['input_sgst']) ? $_POST['input_sgst'][$key] : '0.00';
                            $odata['igst_amount'] = !empty($_POST['input_igst']) ? $_POST['input_igst'][$key] : '0.00';
                            $odata['total_amount'] = !empty($_POST['sub_total']) ? $_POST['sub_total'][$key] : '0.00';
                            $odata['discount_amount'] = !empty($_POST['discount']) ? $_POST['discount'][$key] : '0.00';
                            $this->dbapi->addOrderItem($odata);
                        }
                    }
                    $pdata['user_id'] = $last_id;
                    $order = $this->dbapi->getOrderById($last_id);

                    if (!empty($order)) {
                        $order['order_items'] = $this->dbapi->searchOrderItems(["order_id" => $order['order_id']]);
                    }
                    $pdata['subject'] = "Product Orders  In Vscie Technologies";
                    $pdata['order'] = $order;
                    $site_info = $this->dbapi->getSiteSettings(1);
                    $pdata['user'] = $this->dbapi->getOwnerById($_SESSION['USER_ID']);
                    $pdata['from_address'] = $this->dbapi->getUserByRole('ADMIN');
                    $to_address = $this->dbapi->getOwnerById($order['user_id']);
                    $pdata['to'] = $to_address['email'];
                    // $pdata['to'] = 'raghu@mydwayz.com';
                    $pdata['cc'] = $site_info['email'];
                    // $pdata['cc'] = 'raghudandu7@gmal.com';
                    $this->sendEmail("email/purchase_order", $pdata);
                }
                $this->dbapi->emptyCartTable($_SESSION['USER_ID']);
                $_SESSION['message'] = 'Order Added Successfully';
                redirect(base_url() . "owner/orders/");
            }
            $data['main_products'] = $this->dbapi->getMainProducts();
            $data['site_info'] = $this->dbapi->getSiteSettings(1);
            $data['user'] = $this->dbapi->getOwnerById($_SESSION['USER_ID']);
            $data['cart_tems'] = $this->dbapi->searchCartItems();
            $data['sequence'] = $this->api->getSequenceByMemberId($data['user']['dealer_id']);
            $this->_owner('orders/form', $data);
        } else if ($act == "edit") {
            if (!empty($_POST['order_id'])) {
                $data['order_date'] = !empty($_POST['order_date']) ? dateForm2DB($_POST['order_date']) : '';
                $data['expected_date'] = !empty($_POST['expected_date']) ? dateForm2DB($_POST['expected_date']) : '';
                $data['delivery_within'] = !empty($_POST['delivery_within']) ? trim($_POST['delivery_within']) : '';
                $data['remarks'] = !empty($_POST['remarks']) ? trim($_POST['remarks']) : '';
                $data['created_by'] = !empty($_SESSION['USER_ID']) ? trim($_SESSION['USER_ID']) : '';
                $data['sub_amount'] = !empty($_POST['sub_amount']) ? trim($_POST['sub_amount']) : '0.00';
                $data['discount_total'] = !empty($_POST['discount_total']) ? trim($_POST['discount_total']) : '0';
                $data['final_total'] = !empty($_POST['final_total']) ? trim($_POST['final_total']) : '0.00';
                $data['text_amount'] = !empty($_POST['text_amount']) ? trim($_POST['text_amount']) : '';
                $this->dbapi->updateOrder($data, $_POST['order_id']);
                if (!empty($_POST['order_id'])) {
                    if (!empty($_POST['product_id'])) {
                        foreach ($_POST['product_id'] as $key => $value) {
                            $odata = [];
                            $odata['order_id'] = $_POST['order_id'];
                            $odata['product_id'] = $_POST['product_id'][$key];
                            $odata['product_name'] = $_POST['product_name'][$key];
                            $odata['unit_price'] = !empty($_POST['mrp_price']) ? $_POST['mrp_price'][$key] : '0.00';
                            $odata['quantity'] = !empty($_POST['quantity']) ? $_POST['quantity'][$key] : '0';
                            $odata['cgst_amount'] = !empty($_POST['cgst_amount']) ? $_POST['cgst_amount'][$key] : '0.00';
                            $odata['sgst_amount'] = !empty($_POST['sgst_amount']) ? $_POST['sgst_amount'][$key] : '0.00';
                            $odata['igst_amount'] = !empty($_POST['igst_amount']) ? $_POST['igst_amount'][$key] : '0.00';
                            $odata['total_amount'] = !empty($_POST['item_amount']) ? $_POST['item_amount'][$key] : '0.00';
                            $odata['discount_amount'] = !empty($_POST['discount']) ? $_POST['discount'][$key] : '0.00';
                            $order_item_id = !empty($_POST['order_item_id']) ? $_POST['order_item_id'][$key] : '';
                            $this->dbapi->updateOrderItem($odata, $order_item_id);
                        }
                    }
                }
                $_SESSION['message'] = 'Order Updated Successfully';
                redirect(base_url() . "owner/orders/");
            }
            $order = $this->dbapi->getOrderById($str);
            if (!empty($order)) {
                $order['order_items'] = $this->dbapi->searchOrderItems(["order_id" => $order['order_id']]);
            }
            $data['order'] = $order;
            $data['main_products'] = $this->dbapi->getMainProducts();
            $data['sub_products'] = $this->dbapi->getSubProductsList1();
            $data['child_products'] = $this->dbapi->getChildProductsList();
            $this->_owner('orders/form', $data);
        } else if ($act == "po") {
            $data['site_info'] = $this->dbapi->getSiteSettings(1);
            $order = $this->dbapi->getOrderById($str);
            if (!empty($order)) {
                $order['order_items'] = $this->dbapi->searchOrderItems(["order_id" => $order['order_id']]);
            }
            $data['order'] = $order;
            $data['site_info'] = $this->dbapi->getSiteSettings(1);
            $data['user'] = $this->dbapi->getOwnerById($_SESSION['USER_ID']);
            $data['from_address'] = $this->dbapi->getUserByRole('ADMIN');
            $data['to_address'] = $this->dbapi->getOwnerById($_SESSION['USER_ID']);
            $this->_owner('orders/po', $data);
        } else if ($act == "preview") {
            $data['site_info'] = $this->dbapi->getSiteSettings(1);
            $order = $this->dbapi->getOrderById($str);
            if (!empty($order)) {
                $order['order_items'] = $this->dbapi->searchOrderItems(["order_id" => $order['order_id']]);
            }
            $data['order'] = $order;
            $data['site_info'] = $this->dbapi->getSiteSettings(1);
            $data['user'] = $this->dbapi->getOwnerById($_SESSION['USER_ID']);
            $data['from_address'] = $this->dbapi->getUserByRole('ADMIN');
            $data['to_address'] = $this->dbapi->getOwnerById($_SESSION['USER_ID']);
            $this->_owner('orders/print-po', $data);
        } else if ($act == "print") {
            $data['site_info'] = $this->dbapi->getSiteSettings(1);
            $order = $this->dbapi->getOrderById($str);
            if (!empty($order)) {
                $order['order_items'] = $this->dbapi->searchOrderItems(["order_id" => $order['order_id']]);
            }
            $data['order'] = $order;
            $data['site_info'] = $this->dbapi->getSiteSettings(1);
            $data['user'] = $this->dbapi->getOwnerById($_SESSION['USER_ID']);
            $data['from_address'] = $this->dbapi->getUserByRole('ADMIN');
            $data['to_address'] = $this->dbapi->getOwnerById($_SESSION['USER_ID']);
            $this->load->view('owner/po-print', $data);
        } else if ($act == "download") {
            $data['site_info'] = $this->dbapi->getSiteSettings(1);
            $order = $this->dbapi->getOrderById($str);
            if (!empty($order)) {
                $order['order_items'] = $this->dbapi->searchOrderItems(["order_id" => $order['order_id']]);
            }
            $data['order'] = $order;
            $data['site_info'] = $this->dbapi->getSiteSettings(1);
            $data['user'] = $this->dbapi->getOwnerById($_SESSION['USER_ID']);
            $data['from_address'] = $this->dbapi->getUserByRole('ADMIN');
            $data['to_address'] = $this->dbapi->getOwnerById($_SESSION['USER_ID']);
            $this->load->view('owner/print', $data);
        } else {
            $data['orders'] = $this->dbapi->searchOrdersForOwner(['user_id' => $_SESSION['USER_ID']]);
            $this->_owner('orders/index', $data);
        }
    }

    public function tickets($act = '', $str = '')
    {
        $this->header_data['title'] = "Ticketing System";
        if(!empty($_GET['ticket_id']) && $_GET['act'] == 'del'){
            $this->dbapi->delTicket($_GET['ticket_id']);
            $_SESSION['message']='Ticket Deleted Successfully';
            redirect(base_url().'owner/tickets');
        }

        $data = array();
        _logged();
        if ($act == "add") {
            if (!empty($_POST['ticket_issue_title'])) {
                $data['ticket_issue_title'] = !empty($_POST['ticket_issue_title']) ? trim($_POST['ticket_issue_title']) : '';
                $data['priority'] = !empty($_POST['priority']) ? trim($_POST['priority']) : '';
                $data['product_name'] = !empty($_POST['product_name']) ? trim($_POST['product_name']) : '';
                $data['description'] = !empty($_POST['description']) ? trim($_POST['description']) : '';
                $data['user_id'] = !empty($_SESSION['USER_ID']) ? trim($_SESSION['USER_ID']) : '';
                $data['dealer_id'] = !empty($_SESSION['DEALER_ID']) ? trim($_SESSION['DEALER_ID']) : '';
                $last_id = $this->dbapi->addTicket($data);
                $site_info = $this->dbapi->getSiteSettings(1);
                if(!empty($last_id)){
                    $pdata['to'] = $_SESSION['USER_EMAIL'];
                    $pdata['cc'] = $site_info['email'];
                    $pdata['site_email'] = $site_info['email'];
                    $pdata['ticket_issue_title'] = $data['ticket_issue_title'];
                    $pdata['produc_name'] = $data['product_name'];
                    $pdata['priority'] = $data['priority'];
                    $pdata['description'] = $data['description'];
                    $pdata['user_name'] = $_SESSION['USER_NAME'];
                    $pdata['subject'] = "Ticket Raising";
                    $this->sendEmail("email/ticket_mail", $pdata);
                }
                $_SESSION['message'] = 'Ticked Raised Successfully';
                redirect(base_url().'owner/tickets');
            }
            $products = $this->dbapi->searchProducts(["is_active" => '1']);
            if (!empty($products)) {
                foreach ($products as &$product) {
                    if (!empty($product)) {
                        $child_product = $this->dbapi->searchProducts(["is_active" => '1', 'key' => $product['product_id']]);
                        if (!empty($child_product)) {
                            foreach ($child_product as &$sub_child) {
                                $childproduct_info = $this->dbapi->searchProducts(["is_active" => '1', 'key' => $sub_child['product_id']]);
                                if (!empty($childproduct_info)) {
                                    foreach ($childproduct_info as &$info) {
                                        $information = $this->dbapi->searchChildProductInfo(['product_id' => $info['product_id']]);
                                        $info['product_details'] = $information;
                                    }
                                }
                                $sub_child['child_products'] = $childproduct_info;
                            }
                            $product['sub_products'] = $child_product;
                        }
                    }
                }
            }
            $data['products'] = $products;
            $this->_owner('tickets/form', $data);
        } else if ($act == "edit") {

            if (!empty($_POST['ticket_id'])) {
                $data['ticket_issue_title'] = !empty($_POST['ticket_issue_title']) ? trim($_POST['ticket_issue_title']) : '';
                $data['priority'] = !empty($_POST['priority']) ? trim($_POST['priority']) : '';
                $data['product_name'] = !empty($_POST['product_name']) ? trim($_POST['product_name']) : '';
                $data['description'] = !empty($_POST['description']) ? trim($_POST['description']) : '';
                $data['user_id'] = !empty($_SESSION['USER_ID']) ? trim($_SESSION['USER_ID']) : '';
                $data['dealer_id'] = !empty($_SESSION['DEALER_ID']) ? trim($_SESSION['DEALER_ID']) : '';
                $this->dbapi->updateTicket($data,$_POST['ticket_id']);
                $_SESSION['message'] = 'Ticked Updated Successfully';
                redirect(base_url().'owner/tickets');
            }



            $products = $this->dbapi->searchProducts(["is_active" => '1']);
            if (!empty($products)) {
                foreach ($products as &$product) {
                    if (!empty($product)) {
                        $child_product = $this->dbapi->searchProducts(["is_active" => '1', 'key' => $product['product_id']]);
                        if (!empty($child_product)) {
                            foreach ($child_product as &$sub_child) {
                                $childproduct_info = $this->dbapi->searchProducts(["is_active" => '1', 'key' => $sub_child['product_id']]);
                                if (!empty($childproduct_info)) {
                                    foreach ($childproduct_info as &$info) {
                                        $information = $this->dbapi->searchChildProductInfo(['product_id' => $info['product_id']]);
                                        $info['product_details'] = $information;
                                    }
                                }
                                $sub_child['child_products'] = $childproduct_info;
                            }
                            $product['sub_products'] = $child_product;
                        }
                    }
                }
            }
            $data['products'] = $products;
            $data['ticket'] = $this->dbapi->getTicketById($str);
            $this->_owner('tickets/form', $data);
        } else {
            $data['tickets'] = $this->dbapi->searchTickets();
            $this->_owner('tickets/index', $data);
        }
    }

    public function register()
    {

        $data = array();
        $this->header_data['title'] .= " | Resistration Page ";
        if (!empty($_POST['email'])) {
            $data['account_name'] = !empty($_POST['account_name']) ? trim($_POST['account_name']) : '';
            $data['installation_type'] = !empty($_POST['installation_type']) ? trim($_POST['installation_type']) : '';
            $data['project_type'] = !empty($_POST['project_type']) ? trim($_POST['project_type']) : '';
            $data['date_installed'] = !empty($_POST['date_installed']) ? date('Y-m-d', strtotime($_POST['date_installed'])) : '';
            // $data['date_installed'] = !empty($_POST['date_installed']) ? dateForm2DB($_POST['date_installed']) : '';
            $date = $_POST['date_installed'];
            $date = strtotime($date);
            $new_date = strtotime('+ 1 year', $date);
            $final = date('Y-m-d', $new_date);
            $data['subscr_end_date'] = $final;
            $data['dealer_id'] = !empty($_POST['dealer_id']) ? trim($_POST['dealer_id']) : '';
            $data['mac_id'] = !empty($_POST['mac_id']) ? trim($_POST['mac_id']) : '';
            $data['company_name'] = !empty($_POST['company_name']) ? trim($_POST['company_name']) : '';
            $data['first_name'] = !empty($_POST['first_name']) ? trim($_POST['first_name']) : '';
            $data['last_name'] = !empty($_POST['last_name']) ? trim($_POST['last_name']) : '';
            $data['email'] = !empty($_POST['email']) ? trim($_POST['email']) : '';
            $data['password'] = !empty($_POST['password']) ? trim($_POST['password']) : '';
            $data['confirm_password'] = !empty($_POST['confirm_password']) ? trim($_POST['confirm_password']) : '';
            $data['setting_password'] = !empty($_POST['setting_password']) ? trim($_POST['setting_password']) : '';
            $data['confirm_password1'] = !empty($_POST['confirm_password1']) ? trim($_POST['confirm_password1']) : '';
            $data['phone_no'] = !empty($_POST['phone_no']) ? trim($_POST['phone_no']) : '';
            $data['address'] = !empty($_POST['address']) ? trim($_POST['address']) : '';
            $data['city'] = !empty($_POST['city']) ? trim($_POST['city']) : '';
            $data['state'] = !empty($_POST['state']) ? trim($_POST['state']) : '';
            $data['postal_code'] = !empty($_POST['postal_code']) ? trim($_POST['postal_code']) : '';
            $data['country_code'] = !empty($_POST['country_code']) ? trim($_POST['country_code']) : '';
            $data['zone_id'] = !empty($_POST['zone_id']) ? trim($_POST['zone_id']) : '';
            $data['path_id'] = !empty($_POST['path_id']) ? trim($_POST['path_id']) : '0';
            $last_id = $this->dbapi->addNewUser($data);
            $udata['user_id'] = $last_id;
            $order_details = $this->dbapi->getOrderDetailsByMacId($data['mac_id']);
            $this->dbapi->updateOrderByUserId($udata, $order_details['order_id']);
            $this->dbapi->updateMacDetailsByMacId($udata, $data['mac_id']);
            $this->dbapi->updateMacLogByMacId($udata, $data['mac_id']);
            if (!empty($pdata['email'])) {
                $pdata['to'] = $pdata['email'];
                $pdata['user_id'] = $last_id;
                $pdata['subject'] = "User Registration";
                $this->sendEmail("user-registration", $pdata);
            }
            $folder = 'data/profile/';
            if (!empty($_FILES['user_logo']['name'])) {
                $img = imgUpload('user_logo', $folder, slugify($data['first_name']));
                $this->dbapi->updateNewUser(['user_logo' => $img], $last_id);
            }
            if (!empty($last_id)) {
                $reset_token = md5($data['email']);
                $this->dbapi->updateNewUser(["reset_token" => $reset_token], $last_id);
                $person['reset_token'] = $reset_token;
                $person['to'] = $data['email'];
                $person['to_name'] = $data['first_name'] . $data['last_name'];
                $person['subject'] = "Account Activation";
                $this->sendEmail("email/acnt_activation", $person);
                $_SESSION['message'] = "Please Check Your Email to Activate Your Account";
                redirect(base_url() . 'owner/');
            } else {
                $_SESSION['error'] = "Your Email is not in Our Records..!";
                redirect(base_url() . 'owner/');
            }
            $_SESSION['message'] = 'User added Successfully';
            redirect(base_url() . "owner/register");
        }
        $data['countries'] = $this->dbapi->getCountryList();
        $data['states'] = $this->dbapi->getStatesList();
        $data['settings'] = $this->dbapi->getSiteSettings(1);
        $this->load->view('owner/register', $data);
    }

    public function account_activation()
    {
        $data = [];
        $reset_token = $this->_REQ['reset_token'];
        if (!empty($reset_token)) {
            $user = $this->dbapi->getUserByToken($reset_token);
            if (!empty($this->_REQ['reset_token']) && !empty($user['user_id'])) {
                if ($user['reset_token'] == $reset_token) {
                    $this->dbapi->updateNewUser(["reset_token" => "", "is_active" => "1"], $user['user_id']);
                    $person['to'] = $user['email'];
                    $person['pwd'] = $user['password'];
                    $person['to_name'] = $user['first_name'] . $user['last_name'];
                    $person['subject'] = "Login Credentials";
                    $this->sendEmail("email/login_details", $person);
                    $_SESSION['message'] = "Your Account Activated Successfully..!";
                    redirect(base_url() . 'owner/');
                }
            } else {
                $_SESSION['warning'] = "Invalid request or already expired your request!";
                redirect(base_url() . 'owner/');
            }
        }
        $this->_owner("email/acnt_activation", $data);
    }

    public function profile()
    {
        $this->header_data['title'] = "Profile";
        $data = array();
        _logged();
        if (!empty($_POST['user_id'])) {
            $data['account_name'] = !empty($_POST['account_name']) ? trim($_POST['account_name']) : '';
            $data['installation_type'] = !empty($_POST['installation_type']) ? trim($_POST['installation_type']) : '';
            $data['project_type'] = !empty($_POST['project_type']) ? trim($_POST['project_type']) : '';
            $data['date_installed'] = !empty($_POST['date_installed']) ? dateForm2DB($_POST['date_installed']) : '';
            $data['dealer_id'] = !empty($_POST['dealer_id']) ? trim($_POST['dealer_id']) : '';
            $data['mac_id'] = !empty($_POST['mac_id']) ? trim($_POST['mac_id']) : '';
            $data['company_name'] = !empty($_POST['company_name']) ? trim($_POST['company_name']) : '';
            $data['first_name'] = !empty($_POST['first_name']) ? trim($_POST['first_name']) : '';
            $data['last_name'] = !empty($_POST['last_name']) ? trim($_POST['last_name']) : '';
            $data['email'] = !empty($_POST['email']) ? trim($_POST['email']) : '';
            $data['password'] = !empty($_POST['password']) ? trim($_POST['password']) : '';
            $data['confirm_password'] = !empty($_POST['confirm_password']) ? trim($_POST['confirm_password']) : '';
            $data['address'] = !empty($_POST['address']) ? trim($_POST['address']) : '';
            $data['phone_no'] = !empty($_POST['phone_no']) ? trim($_POST['phone_no']) : '';
            $data['city'] = !empty($_POST['city']) ? trim($_POST['city']) : '';
            $data['state'] = !empty($_POST['state']) ? trim($_POST['state']) : '';
            $data['postal_code'] = !empty($_POST['postal_code']) ? trim($_POST['postal_code']) : '';
            $data['country_code'] = !empty($_POST['country_code']) ? trim($_POST['country_code']) : '';
            $data['zone_id'] = !empty($_POST['zone_id']) ? trim($_POST['zone_id']) : '';
            $folder = 'data/profile/';
            if (!empty($_FILES['user_logo']['name'])) {
                $data['user_logo'] = imgUpload('user_logo', $folder, slugify($data['first_name']));
            }
            $this->dbapi->updateNewUser($data, $_POST['user_id']);
            $_SESSION['message'] = 'Profile Updated Successfully';
            redirect(base_url() . "owner/profile");
        }
        $data['profile'] = $this->dbapi->getOwnerById($_SESSION['USER_ID']);
        $data['countries'] = $this->dbapi->getCountryList();
        $data['states'] = $this->dbapi->getStatesList();
        $data['zones'] = $this->dbapi->getZonesList1();
        $this->_owner('profile', $data);
    }

    public function check_macIid_exists()
    {
        $stmt = '';
        $mac_id = $this->_REQ['mac_id'];

        if (isset($mac_id)) {
            $macid = strtoupper($mac_id);
            $omac = $this->dbapi->getMacFromOrders($macid);
            if (strtoupper($omac['mac_id']) == $macid) {
                $stmt .= '<span class="text-danger"><b>' . $macid . '</b> is Already Used </span>';
            } else {
                $stmt .= '<span class="text-success"><b>' . $macid . '</b> is Correct.  </span>';
            }
            echo $stmt;
        }
    }

    public function check_mac_id()
    {
        $stmt = '';
        $mac_id = $this->_REQ['mac_id'];
        if (isset($mac_id)) {
            $macid = strtoupper($mac_id);
            $omac = $this->dbapi->getMacFromOrders($macid);
            if ($omac['mac_id'] == $macid) {
                $cmac = $this->dbapi->getMacFromUsers($macid);
                if (($cmac['mac_id'] != $omac['mac_id'])) {
                    $mac_deatils = $this->dbapi->getMacDetailsFromOrders($macid);
                    $dealername = $mac_deatils['dealer_name'];
                    if (!empty($dealername)) {
                        $stmt .= '<span class="text-success"><b>' . $macid . '</b> is Correct.  </span>';
                    }
                } else {
                    $stmt .= '<span class="text-danger"><b>' . $cmac['mac_id'] . '</b> is Already Used </span>';
                }
            } else {
                $stmt .= 'OK';
            }
            echo $stmt;
        }


        /*$mac_id = $this->_REQ['mac_id'];
        if (!empty($mac_id)) {
            $macid = strtoupper($mac_id);
            $omac = $this->dbapi->getMacFromOrders($macid);
            $mc = explode(',', $omac['mac_id']);
            if (in_array($macid, $mc)) {
                for ($i = 0; $i < count($mc); $i++) {
                    if ($mc[$i] == $macid) {
                        $cmac = $this->dbapi->getMacFromUsers($macid);
                        if ($cmac['mac_id'] != $mc[$i]) {
                            $mac_deatils = $this->dbapi->getMacDetailsFromOrders($macid);
                            $dealername = $mac_deatils['dealer_name'];
                            if (!empty($dealername)) {
                               echo '<span class="text-success"><b>' . $macid . '</b> is Correct</h4> </span>';
                            }

                        } else {
                           echo '<span class="text-danger"><b>' . $cmac['mac_id'] . '</b> is Already Used </span>';
                        }
                    }
                }
            }
        } else {
            echo 'OK';
        }*/

    }

    public function print_po()
    {

        $this->_owner('print-details');
    }

    public function getMacDetails()
    {
        $mac_id = $this->_REQ['mac_id'];
        if (!empty($mac_id)) {
            $mac_deatils = $this->dbapi->getMacDetailsFromOrders($mac_id);
            echo json_encode($mac_deatils);
        }

    }

    public function forgot_password()
    {
        $data = [];
        $this->header_data['title'] = ":: Forget Password ::";
        if (!empty($_POST['FORGOT']) && !empty($_POST['email'])) {
            $user = $this->dbapi->getUserByEmailFromUsers($_POST['email']);

            if (!empty($user['user_id'])) {
                $reset_token = generateOTP(6);
                $this->dbapi->updateNewUser(["reset_token" => $reset_token], $user['user_id']);
                $person['reset_token'] = $reset_token;
                $person['to'] = $user['email'];
                $person['to_name'] = $user['first_name'] . ' ' . $user['last_name'];
                $person['password'] = $user['password'];
                $person['subject'] = "Reset Password";
                $this->sendEmail("email/forgot_pwd", $person);
                $_SESSION['message'] = "Please Check Your Email to Reset Password";
                redirect(base_url());
            } else { // If Email not Exists in DB
                $_SESSION['error'] = "Your Email is not in Our Records..!";
                redirect(base_url());
            }
        }
        $this->load->view("forgot-pwd", $data);
    }

    public function reset_password()
    {
        $data = [];
        if (!empty($this->_REQ['reset']) && !empty($_POST['password']) && !empty($_POST['confirm_password'])) {
            $user = $this->dbapi->getUserByTokenFromMembers($this->_REQ['reset']);
            if (!empty($user['member_id'])) {
                if (trim($_POST['password']) == trim($_POST['confirm_password'])) {
                    $this->dbapi->updateUser(["password" => trim($_POST['password']), "confirm_password" => trim($_POST['confirm_password']), "reset_token" => ""], $user['member_id']);
                    $_SESSION['message'] = "Your Password Updated Successfully..!";
                    redirect(base_url());
                } else {
                    $_SESSION['message'] = "Your Password and Retype Password must same!";
                }
            } else {
                $_SESSION['warning'] = "Invalid request or already expired your request!";
                redirect(base_url());
            }
        }
        $this->load->view("reset-password", $data);
    }

    public function logout()
    {
        $_SESSION = [];
        $this->session->sess_destroy();
        $_SESSION['error'] = "All sessions are destroyed";
        if (isset($_GET)) {
            redirect(base_url());
        } else {
            redirect(base_url());
        }
    }
}

?>