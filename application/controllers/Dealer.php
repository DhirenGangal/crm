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

    public function index()
    {
        if (!empty($_POST['LOGIN']) && !empty($_POST['email']) && !empty($_POST['password'])) {
            $user = $this->dbapi->userLogin($_POST['email'], $_POST['password']);
            if (!empty($user['member_id'])) {
                $_SESSION = array();
                $_SESSION['USER_ID'] = $user['member_id'];
                $_SESSION['USER_NAME'] = $user['first_name'] . $user['last_name'];
                $_SESSION['USER_EMAIL'] = $user['email'];
                $_SESSION['IMG'] = $user['profile_logo'];
                $_SESSION['ROLE'] = $user['role'];
                $_SESSION['STATE'] = $user['state'];
                redirect(base_url() . "dealer/dashboard/");
            } else if (!empty($user['is_active']) && $user['is_active'] != "1") {
                $_SESSION['error'] = "Your account is not active.";
            } else {
                $_SESSION['error'] = "Invalid Email/Password.";
            }
        }
        $data['user'] = $_POST;
        if (!empty($_SESSION['USER_ID'])) {
            redirect(base_url() . 'dealer/dashboard/');
        }
        $data['title'] = $this->header_data['title'];
        $this->load->view("dealer/login", $data);
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
        $this->_dealer('dashboard', $data);
    }

    public function fetch_sub_products()
    {
        if (!empty($this->_REQ['main_product_id'])) {
            $sub_products = $this->dbapi->getSubProductsList($this->_REQ['main_product_id']);
            echo json_encode($sub_products);
        }
    }

    public function fetch_child_products()
    {
        if (!empty($this->_REQ['sub_product_id'])) {
            $child_products = $this->dbapi->getSubProductsList($this->_REQ['sub_product_id']);
            echo json_encode($child_products);
        }
    }

    public function fetch_product_price()
    {
        if (!empty($this->_REQ['product_id'])) {
            $product_price = $this->dbapi->getProductPriceDetails($this->_REQ['product_id']);
            echo json_encode($product_price);
        }
    }

    public function products()
    {
        $this->header_data['title'] = "Products";
        $data = array();
        _logged();

        if (!empty($this->_REQ['product_id'])) {
            $products = $this->dbapi->searchProducts(["is_active" => '1']);
            if (!empty($products)) {
                $lp1 = 0;
                foreach ($products as &$product) {
                    if (!empty($product)) {
                        $child_product = $this->dbapi->searchProducts(["is_active" => '1', 'key' => $product['product_id']]);
                        if (!empty($child_product)) {
                            foreach ($child_product as &$sub_child) {
                                $childproduct_info = $this->dbapi->searchProducts(["is_active" => '1', 'key' => $this->_REQ['product_id']]);
                                if ($lp1 == 1) {
                                    if (!empty($childproduct_info)) {
                                        foreach ($childproduct_info as &$info) {
                                            $information = $this->dbapi->searchChildProductInfo(['product_id' => $info['product_id']]);
                                            if (!empty($information)) {
                                                foreach ($information as &$price) {
                                                    $price_range = $this->dbapi->searchRangeDetails(['product_id' => $price['info_product_id']]);
                                                    $price['price_range'] = $price_range;
                                                }

                                            }
                                            $info['product_details'] = $information;
                                        }
                                    }
                                    $sub_child['child_products'] = $childproduct_info;
                                }
                                $lp1++;
                            }
                            $product['sub_products'] = $child_product;
                        }
                    }

                }

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
                                        if (!empty($information)) {
                                            foreach ($information as &$price) {
                                                $price_range = $this->dbapi->searchRangeDetails(['product_id' => $price['info_product_id']]);
                                                $price['price_range'] = $price_range;
                                            }

                                        }
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
        $this->_dealer('products', $data);

    }

    public function print_po()
    {
        $this->header_data['title'] = "Products";
        $data = array();
        _logged();
        $this->_dealer('dealer/print-po');
    }

    public function fetch_product_details()
    {
        if (!empty($this->_REQ['product_info_id'])) {
            $product_details = $this->dbapi->getChildProductInfoById($this->_REQ['product_info_id']);
            if (!empty($product_details)) {
                $data['product_details'] = $product_details;
                $this->load->view('dealer/product-details', $data);
            }
        }
    }

    public function cart_info()
    {
        if (!empty($this->_REQ['product']) && isset($this->_REQ['quantity'])) {
            $product_details = $this->dbapi->getChildProductInfoById($this->_REQ['product']);
            $q = $this->_REQ['quantity'];
            if (!empty($product_details)) {
                $data['product_details'] = $product_details;
                $this->load->view('dealer/cart-info', $data);
            }
        }
    }

    public function fetch_price_ranges1()
    {
        if (isset($this->_REQ['product']) && isset($this->_REQ['quantity'])) {
            // if (!empty($product) && !empty($quantity)) {
            $quantity = $this->_REQ['quantity'];

            $product_details = $this->dbapi->getChildProductInfoById($this->_REQ['product']);
            // $product_details = $this->dbapi->getChildProductInfoById($product);
            $ranges = $this->dbapi->getPriceRangeDetails($product_details['product_id']);
            if (!empty($ranges)) {
                $i = 0;
                //print_r($ranges);
                foreach ($ranges as $range) {

                    if (!empty($range['value_range'])) {

                        if ($quantity > 1 && $range['value_range'] > $quantity) {
                            $total = $quantity * $ranges[$i - 1]['dealer_price'];
                            echo $total;
                            return false;
                        } else if ($quantity > 1 && $range['value_range'] == $quantity) {
                            $total = $range['dealer_price'] * $quantity;
                            echo $total;
                            return false;
                        } else if ($quantity == 1) {
                            $total = $range['dealer_price'];
                            echo $total;
                            return false;
                        }
                        $i++;
                    } else {
                        $total = $range['dealer_price'] * $quantity;
                        echo $total;
                        return false;
                    }


                }
            }/*else {
                if(!empty($ranges)){
                    foreach ($ranges as $range){
                        if(!empty($range['value_range'])){
                            $mrp = $range['dealer_price'];
                        }
                    }
                }
                $total = $quantity * $mrp;
                echo $total;
            }*/
        }

    }

    public function fetch_price_ranges($product = '', $quantity = '')
    {
        //if (isset($this->_REQ['product']) && isset($this->_REQ['quantity'])) {
        if (!empty($product) && !empty($quantity)) {
            //$quantity = $this->_REQ['quantity'];
            //echo $quantity;
            //$product_details = $this->dbapi->getChildProductInfoById($this->_REQ['product']);
            $product_details = $this->dbapi->getChildProductInfoById($product);
            $ranges = $this->dbapi->getPriceRangeDetails($product_details['product_id']);
            if (!empty($ranges)) {
                $i = 0;
                //print_r($ranges);
                foreach ($ranges as $range) {

                    if (!empty($range['value_range'])) {

                        if ($quantity > 1 && $range['value_range'] > $quantity) {
                            $total = $quantity * $ranges[$i - 1]['dealer_price'];
                            return $total;
                            //return false;
                        } else if ($quantity > 1 && $range['value_range'] == $quantity) {
                            $total = $range['dealer_price'] * $quantity;
                            return $total;
                            //return false;
                        } else if ($quantity == 1) {
                            $total = $range['dealer_price'];
                            return $total;
                            //return false;
                        }
                        $i++;
                    } else {
                        $total = $range['dealer_price'] * $quantity;
                        return $total;
                        // return false;

                    }


                }
            }/*else {
                if(!empty($ranges)){
                    foreach ($ranges as $range){
                        if(!empty($range['value_range'])){
                            $mrp = $range['dealer_price'];
                        }
                    }
                }
                $total = $quantity * $mrp;
                echo $total;
            }*/
        }

    }

    public function add_cart_info()
    {
        $this->header_data['title'] = "Cart Items";
        $data = array();
        _logged();
        if (!empty($_GET['act']) && $_GET['act'] == 'del' && !empty($_GET['pk_id'])) {
            $this->dbapi->delCartItem($_GET['pk_id']);
            redirect(base_url() . "dealer/products");
        }
        if (!empty($this->_REQ['product']) && isset($this->_REQ['quantity'])) {
            $product = $this->_REQ['product'];
            $quantity = $this->_REQ['quantity'];
            $total = $this->fetch_price_ranges($product, $quantity);
            $discount = $this->_REQ['discount'];
            if (!empty($discount)) {
                $t = $total;
                $d = ($t * $discount) / 100;
                $total_with_disc = $t - $d;
            } else {
                $total_with_disc = $total;
            }
            $p_details = $this->dbapi->getChildProductInfoById($product);

            if (!empty($quantity) || !empty($p_details)) {
                $data['product_details'] = $p_details;
                $data['qty'] = $quantity;
                $data['total'] = $total_with_disc;
                $this->load->view('dealer/cart-info', $data);
                $pdata = [];
                $pdata['product_info_id'] = $product;
                $pdata['quantity'] = $quantity;
                $pdata['sub_total'] = $total_with_disc;
                $pdata['full_total'] = $total;
                $pdata['created_by'] = !empty($_SESSION['USER_ID']) ? trim($_SESSION['USER_ID']) : '';
                $pdata['role'] = !empty($_SESSION['ROLE']) ? trim($_SESSION['ROLE']) : '';
                $product_details = $this->dbapi->getCartItemByProductId($product);
                if (!empty($product_details)) {
                    $tdata = array();
                    $tdata['quantity'] = $pdata['quantity'] + $product_details['quantity'];
                    $tdata['sub_total'] = $pdata['sub_total'] + $product_details['sub_total'];
                    $this->dbapi->updateCartItemsByProductId($tdata, $product);
                    $data['cart_items'] = $this->dbapi->searchCartItems(['created_by' => $_SESSION['USER_ID'], 'role' => $_SESSION['ROLE']]);
                    $this->load->view('dealer/cart-data', $pdata);
                    //  echo $this->cart_table();
                } else {
                    $this->dbapi->addToCart($pdata);
                    $data['cart_items'] = $this->dbapi->searchCartItems(['created_by' => $_SESSION['USER_ID'], 'role' => $_SESSION['ROLE']]);
                    $this->load->view('dealer/cart-data', $pdata);
                    // echo $this->cart_table();
                }
            }


        }

    }


    public function load_cart_table1()
    {
        $created_by = $this->_REQ['created_by'];
        $role = $this->_REQ['role'];
        //  $data['cart_items'] = $this->dbapi->searchCartItems(['created_by' => $created_by, 'role' => $role]);
        $cart_items = $this->dbapi->searchCartItems(['created_by' => $created_by, 'role' => $role]);
        $output = "";
        $output .= '<a href="#" class="dropdown-toggle" data-toggle="dropdown">';
        $output .= 'Cart <i class="fa fa-cart-plus"></i>';
        $output .= '<span class="label label-warning cart-cnt">' . count($cart_items) . '</span>';
        $output .= '</a>';
        $output .= '<ul class="dropdown-menu">';
        $output .= '<li class="header">You have ' . count($cart_items) . ' items in cart</li>';
        $output .= '<li>';
        $output .= '<table class="table table-bordered">';
        $output .= '<thead>';
        $output .= '<tr>';
        $output .= '<th>Name</th>';
        $output .= '<th>HSN/SAC</th>';
        $output .= '<th class="w-20">Qty</th>';
        $output .= '<th>Total</th>';
        $output .= '<th>Action</th>';
        $output .= '</tr>';
        $output .= '</thead>';
        $output .= '<tbody>';
        if (!empty($cart_items)) {
            foreach ($cart_items as $cart_item) {
                $output .= '<tr>';
                $output .= '<td>' . $cart_item["product_name"] . '</td>';
                $output .= '<td>' . $cart_item["hsn_code"] . '</td>';
                $output .= '<td>' . $cart_item["quantity"] . '</td>';
                $output .= '<td>' . $cart_item["sub_total"] . '</td>';
                $output .= '<td><a data-toggle="tooltip" data-placement="bottom" href="' . base_url() . 'dealer/add_to_cart/?act=del&pk_id=' . $cart_item['pk_id'] . '"  title="Delete"  class="btn btn-sm btn-default"><i class="fa fa-trash text-danger"></i></a></td>';
                $output .= '</tr>';
            }
        }
        $output .= '</tbody>';
        $output .= '</table>';
        $output .= '</li>';
        $output .= '<li class="footer">';
        $output .= '<ul class="list-inline list-unstyled text-center">';
        $output .= '<li><a class="btn btn-sm btn-primary" href="' . base_url() . 'dealer/view-cart">View all</a></li>';
        $output .= '<li><a class="btn btn-sm btn-danger clear-cart"  href="' . base_url() . 'dealer/clear_cart/?created_by=' . $_SESSION['USER_ID'] . '">ClearCart</a></li>';
        $output .= '</ul>';
        $output .= '</li>';
        $output .= '</ul>';
        echo '<pre>';
        print_r($output);
        echo '</pre>';
        //return $output;
    }

    public function load_cart_table()
    {
        $data = [];
        $created_by = $this->_REQ['created_by'];
        $role = $this->_REQ['role'];
        $data['cart_items'] = $this->dbapi->searchCartItems(['created_by' => $created_by, 'role' => $role]);
        $this->load->view('dealer/cart-data', $data);
    }

    public function view_cart()
    {
        $this->header_data['title'] = "Cart Items";
        $data = array();
        _logged();
        if (!empty($_GET['act']) && $_GET['act'] == 'del' && !empty($_GET['pk_id'])) {
            $this->dbapi->delCartItem($_GET['pk_id']);
            redirect(base_url() . "dealer/view-cart");
        }
        $cart_items = $this->dbapi->searchCartItems(['created_by' => $_SESSION['USER_ID']], ['role' => $_SESSION['ROLE']]);
        if (!empty($cart_items)) {
            foreach ($cart_items as &$cart_item) {
                $cart_item['ranges'] = $this->dbapi->searchRangeDetails(["product_id" => $cart_item['product_id']]);
            }
        }
        $data['cart_items'] = $cart_items;

        $this->_dealer('view-cart', $data);
    }

    public function update_cart()
    {

        $pdata = array();
        if (!empty($_POST['product'])) {
            $pdata['product_info_id'] = !empty($_POST['product']) ? trim($_POST['product']) : "";
            $pdata['quantity'] = !empty($_POST['quantity']) ? trim($_POST['quantity']) : "0";
            $pdata['full_total'] = !empty($_POST['total']) ? trim($_POST['total']) : "";

            if (!empty($_POST['sub_total'])) {
                $pdata['sub_total'] = !empty($_POST['sub_total']) ? trim($_POST['sub_total']) : "";
            } else {
                $pdata['sub_total'] = !empty($_POST['total']) ? trim($_POST['total']) : "";
            }
            $pdata['created_by'] = !empty($_SESSION['USER_ID']) ? trim($_SESSION['USER_ID']) : "";
            $pdata['role'] = !empty($_SESSION['ROLE']) ? trim($_SESSION['ROLE']) : "";
            $last_id = $this->dbapi->updateCartItemsByProductId($pdata, $_POST['product']);
            if (!empty($last_id)) {
                echo 'TRUE';
            } else {
                echo 'FALSE';
            }
        }
    }

    public function clear_cart()
    {
        $user_id = $this->_REQ['created_by'];
        if (!empty($user_id)) {
            $this->dbapi->emptyCartTable($user_id);
            redirect(base_url() . "dealer/view-cart");
        }
    }


    public function product_orders()
    {
        $this->header_data['title'] = "Product Orders";
        $data = array();
        _logged();

        $this->_dealer('product-orders', $data);

    }

    public function orders1($act = '', $str = '')
    {
        $this->header_data['title'] = "Orders";
        _logged();
        $data = array();
        if (!empty($_GET['act']) && $_GET["act"] == "del" && !empty($_GET['order_id'])) {
            $this->dbapi->delOrder($_GET['order_id']);
            $this->dbapi->delOrderItem($_GET['order_id']);
            redirect(base_url() . 'dealer/orders/');
        }
        if (!empty($_GET['act']) && $_GET['act'] == 'status' && !empty($_GET['order_id']) && isset($_GET['sta'])) {
            $is_active = (!empty($_GET['sta']) && $_GET['sta'] == '1') ? "1" : "0";
            $this->dbapi->updateOrder(array("is_active" => $is_active), $_GET['order_id']);
            redirect(base_url() . "dealer/orders/");

        }

        if ($act == "add") {
            if (!empty($_POST['order_date'])) {
                $data['order_date'] = !empty($_POST['order_date']) ? dateForm2DB($_POST['order_date']) : '';
                $data['expected_date'] = !empty($_POST['expected_date']) ? dateForm2DB($_POST['expected_date']) : '';
                $data['delivery_within'] = !empty($_POST['delivery_within']) ? trim($_POST['delivery_within']) : '';
                $data['remarks'] = !empty($_POST['remarks']) ? trim($_POST['remarks']) : '';
                $data['created_by'] = !empty($_SESSION['USER_ID']) ? trim($_SESSION['USER_ID']) : '';
                // $data['sub_amount'] = !empty($_POST['sub_amount']) ? trim($_POST['sub_amount']) : '0.00';
                //  $data['discount_total'] = !empty($_POST['discount_total']) ? trim($_POST['discount_total']) : '0';
                $data['final_total'] = !empty($_POST['final_total']) ? trim($_POST['final_total']) : '0.00';
                $order_data = $this->dbapi->getOrdersCnt();
                $order_no_cnt = str_pad($order_data + 1, 3, '0', STR_PAD_LEFT);
                $order_no = orderFormat($order_no_cnt);
                $data['order_no'] = $order_no;
                $last_id = $this->dbapi->addOrder($data);
                if (!empty($last_id)) {
                    if (!empty($_POST['product_id'])) {
                        foreach ($_POST['product_id'] as $key => $value) {
                            $odata = [];
                            $odata['order_id'] = $last_id;
                            $odata['product_id'] = $_POST['product_id'][$key];
                            $odata['product_name'] = $_POST['product_name'][$key];
                            //  $odata['unit_price'] = !empty($_POST['dealer_price']) ? $_POST['dealer_price'][$key] : '0.00';
                            $odata['quantity'] = !empty($_POST['quantity']) ? $_POST['quantity'][$key] : '0';
                            $odata['total_amount'] = !empty($_POST['item_amount']) ? $_POST['item_amount'][$key] : '0.00';
                            //$odata['discount_amount'] = !empty($_POST['discount_amount']) ? $_POST['discount_amount'][$key] : '0.00';
                            $this->dbapi->addOrderItem($odata);

                        }
                    }

                }
                $_SESSION['message'] = 'Order Added Successfully';
                redirect(base_url() . "dealer/orders/");
            }
            $data['main_products'] = $this->dbapi->getMainProducts();
            $this->_dealer('orders/form', $data);
        } else if ($act == "edit") {
            if (!empty($_POST['order_id'])) {
                $data['order_date'] = !empty($_POST['order_date']) ? dateForm2DB($_POST['order_date']) : '';
                $data['expected_date'] = !empty($_POST['expected_date']) ? dateForm2DB($_POST['expected_date']) : '';
                $data['delivery_within'] = !empty($_POST['delivery_within']) ? trim($_POST['delivery_within']) : '';
                $data['remarks'] = !empty($_POST['remarks']) ? trim($_POST['remarks']) : '';
                $data['created_by'] = !empty($_SESSION['USER_ID']) ? trim($_SESSION['USER_ID']) : '';
                //  $data['sub_amount'] = !empty($_POST['sub_amount']) ? trim($_POST['sub_amount']) : '0.00';
                //   $data['discount_total'] = !empty($_POST['discount_total']) ? trim($_POST['discount_total']) : '0';
                $data['final_total'] = !empty($_POST['final_total']) ? trim($_POST['final_total']) : '0.00';
                $this->dbapi->updateOrder($data, $_POST['order_id']);
                if (!empty($_POST['order_id'])) {
                    if (!empty($_POST['product_id'])) {
                        foreach ($_POST['product_id'] as $key => $value) {
                            $odata = [];
                            $odata['order_id'] = $_POST['order_id'];
                            $odata['product_id'] = $_POST['product_id'][$key];
                            $odata['product_name'] = $_POST['product_name'][$key];
                            //    $odata['unit_price'] = !empty($_POST['dealer_price']) ? $_POST['dealer_price'][$key] : '0.00';
                            $odata['quantity'] = !empty($_POST['quantity']) ? $_POST['quantity'][$key] : '0';
                            $odata['total_amount'] = !empty($_POST['item_amount']) ? $_POST['item_amount'][$key] : '0.00';
                            //  $odata['discount_amount'] = !empty($_POST['discount_amount']) ? $_POST['discount_amount'][$key] : '0.00';
                            $order_item_id = !empty($_POST['order_item_id']) ? $_POST['order_item_id'][$key] : '';
                            $this->dbapi->updateOrderItem($odata, $order_item_id);
                        }
                    }
                }
                $_SESSION['message'] = 'Order Updated Successfully';
                redirect(base_url() . "dealer/orders/");

            }


            $order = $this->dbapi->getOrderById($str);
            if (!empty($order)) {
                $order['order_items'] = $this->dbapi->searchOrderItems(["order_id" => $order['order_id']]);

            }
            $data['order'] = $order;
            $data['main_products'] = $this->dbapi->getMainProducts();
            $data['sub_products'] = $this->dbapi->getSubProductsList1();
            $data['child_products'] = $this->dbapi->getChildProductsList();
            $this->_dealer('orders/form', $data);
        } else if ($act == "po") {

            $data['site_info'] = $this->dbapi->getSiteSettings(1);
            $order = $this->dbapi->getOrderById($str);
            if (!empty($order)) {
                $order['order_items'] = $this->dbapi->searchOrderItems(["order_id" => $order['order_id']]);
            }
            $data['order'] = $order;
            $this->_dealer('orders/po', $data);
        } else {
            $data['orders'] = $this->dbapi->searchOrders();
            $this->_dealer('orders/index', $data);
        }
    }

    public function orders($act = '', $str = '')
    {
        $this->header_data['title'] = "Orders";
        _logged();
        $data = array();
        if (!empty($_GET['act']) && $_GET["act"] == "del" && !empty($_GET['order_id'])) {
            $this->dbapi->delOrder($_GET['order_id']);
            $this->dbapi->delOrderItem($_GET['order_id']);
            redirect(base_url() . 'dealer/orders/');
        }
        if (!empty($_GET['act']) && $_GET['act'] == 'status' && !empty($_GET['order_id']) && isset($_GET['sta'])) {
            $is_active = (!empty($_GET['sta']) && $_GET['sta'] == '1') ? "1" : "0";
            $this->dbapi->updateOrder(array("is_active" => $is_active), $_GET['order_id']);
            redirect(base_url() . "dealer/orders/");
        }

        if ($act == "add") {
            if (!empty($_POST['order_date'])) {
                $data['order_date'] = !empty($_POST['order_date']) ? dateForm2DB($_POST['order_date']) : '';
                $data['expected_date'] = !empty($_POST['expected_date']) ? dateForm2DB($_POST['expected_date']) : '';
                $data['delivery_within'] = !empty($_POST['delivery_within']) ? trim($_POST['delivery_within']) : '';
                $data['remarks'] = !empty($_POST['remarks']) ? trim($_POST['remarks']) : '';
                $data['created_by'] = !empty($_SESSION['USER_ID']) ? trim($_SESSION['USER_ID']) : '';
                $data['dealer_id'] = !empty($_SESSION['USER_ID']) ? trim($_SESSION['USER_ID']) : '';
                $data['sub_amount'] = !empty($_POST['sub_amount']) ? trim($_POST['sub_amount']) : '0.00';
                $data['tax_amount'] = !empty($_POST['tax_amount']) ? trim($_POST['tax_amount']) : '0.00';
                $data['cgst_amount'] = !empty($_POST['cgst_amount']) ? trim($_POST['cgst_amount']) : '0.00';
                $data['sgst_amount'] = !empty($_POST['sgst_amount']) ? trim($_POST['sgst_amount']) : '0.00';
                $data['igst_amount'] = !empty($_POST['igst_amount']) ? trim($_POST['igst_amount']) : '0.00';
                $data['discount_total'] = !empty($_POST['discount_total']) ? trim($_POST['discount_total']) : '0.00';
                $data['tax_amount'] = !empty($_POST['tax_amount']) ? trim($_POST['tax_amount']) : '0.00';
                $data['final_total'] = !empty($_POST['final_total']) ? trim($_POST['final_total']) : '0.00';
                $data['text_amount'] = !empty($_POST['text_amount']) ? trim($_POST['text_amount']) : '0.00';
                $data['admin_visible'] = '1';

                $_seq_cnt = $this->api->getOrderCountByMember($_SESSION['USER_ID']);
                $data['order_no'] = !empty($_POST['order_no']) ? $_POST['order_no'] : 'SCIE-' . $_seq_cnt['cnt'];
                $latest_seq = $_seq_cnt['cnt'] + 1;
                $this->api->updatePrefix(['series_start' => $latest_seq], $_SESSION['USER_ID']);
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
                    $order = $this->dbapi->getOrderById($last_id);
                    if (!empty($order)) {
                        $order['order_items'] = $this->dbapi->searchOrderItems(["order_id" => $order['order_id']]);
                    }
                    $pdata['subject'] = "Product Orders  In Vscie Technologies";
                    $pdata['order'] = $order;
                    $site_info = $this->dbapi->getSiteSettings(1);
                    $pdata['from_address'] = $this->dbapi->getUserByRole('ADMIN');
                    $to_address = $this->dbapi->getUserById($order['dealer_id']);
                    $pdata['to'] = $to_address['email'];
                    $pdata['to_name'] = $to_address['first_name'] . '  ' . $to_address['last_name'];
                    // $pdata['to'] = 'raghu@mydwayz.com';
                    $pdata['cc'] = $site_info['email'];
                    //  $pdata['cc'] = 'gopinadh@mydwayz.com';
                    $this->sendEmail("email/purchase_order", $pdata);

                }
                $this->dbapi->emptyCartTable($_SESSION['USER_ID']);
                $_SESSION['message'] = 'Order Added Successfully';
                redirect(base_url() . "dealer/orders/");
            }
            $data['sequence'] = $this->api->getSequenceByMemberId($_SESSION['USER_ID']);
            $data['main_products'] = $this->dbapi->getMainProducts();
            $data['site_info'] = $this->dbapi->getSiteSettings(1);
            $data['user'] = $this->dbapi->getUserById($_SESSION['USER_ID']);
            $data['cart_tems'] = $this->dbapi->searchCartItems();
            $this->_dealer('orders/form', $data);
        } else if ($act == "edit") {
            if (!empty($_POST['order_id'])) {
                $data['remarks'] = !empty($_POST['remarks']) ? trim($_POST['remarks']) : '';
                $data['order_status'] = 'PROGRESS';
                $data['admin_visible'] = '1';
                $this->dbapi->updateOrder($data, $_POST['order_id']);

                $_SESSION['message'] = 'Order Updated Successfully';
                redirect(base_url() . "dealer/orders/");
            }
            $order = $this->dbapi->getOrderById($str);
            if (!empty($order)) {
                $order['order_items'] = $this->dbapi->searchOrderItems(["order_id" => $order['order_id']]);
            }
            $data['order'] = $order;
            $data['main_products'] = $this->dbapi->getMainProducts();
            $data['sub_products'] = $this->dbapi->getSubProductsList1();
            $data['child_products'] = $this->dbapi->getChildProductsList();
            $this->_dealer('orders/form', $data);
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
            $data['to_address'] = $this->dbapi->getUserById($_SESSION['USER_ID']);
            $this->_dealer('orders/po', $data);
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
            $data['to_address'] = $this->dbapi->getUserById($_SESSION['USER_ID']);
            $this->load->view('dealer/po-print', $data);
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
            $data['to_address'] = $this->dbapi->getUserById($_SESSION['USER_ID']);

            $this->_dealer('orders/print-po', $data);
        } else {
            /* $orders1 = $this->dbapi->searchOrders(['created_by' => $_SESSION['USER_ID']]);
             $orders2 = $this->dbapi->searchOrders(['dealer_id' => $_SESSION['USER_ID']]);
             $data['orders'] = array_merge($orders1, $orders2);*/
            $data['orders'] = $this->dbapi->searchOrders(['dealer_id' => $_SESSION['USER_ID']]);

            $this->_dealer('orders/index', $data);
        }
    }

    public
    function view_users()
    {
        $this->header_data['title'] = "View Users";
        $data = array();
        _logged();
        if (!empty($_GET['act']) && $_GET['act'] == 'status' && !empty($_GET['user_id']) && isset($_GET['sta'])) {
            $is_active = (!empty($_GET['sta']) && $_GET['sta'] == '1') ? "1" : "0";
            $this->dbapi->updateNewUser(array("is_active" => $is_active), $_GET['user_id']);
            redirect(base_url() . "dealer/view-users");

        }
        $data['users'] = $this->dbapi->searchNewUsers();
        $this->_dealer('view-users', $data);

    }

    public function tickets($act = '', $str = '')
    {
        $this->header_data['title'] = "Ticketing System";
        if(!empty($_GET['ticket_id']) && $_GET['act'] == 'del'){
            $this->dbapi->delTicket($_GET['ticket_id']);
            $_SESSION['message'] = 'Ticket Deleted Successfully';
            redirect(base_url().'dealer/tickets');
        }
        $data = array();
        _logged();
        if($act == 'add'){
            if(!empty($_POST['ticket_issue_title'])){
                $data['ticket_issue_title'] = !empty($_POST['ticket_issue_title']) ? trim($_POST['ticket_issue_title']) : '' ;
                $data['priority'] = !empty($_POST['priority']) ? trim($_POST['priority']) : '' ;
                $data['product_name'] = !empty($_POST['product_name']) ? trim($_POST['product_name']) : '' ;
                $data['dealer_id'] = !empty($_SESSION['USER_ID']) ? trim($_SESSION['USER_ID']) : '' ;
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
                $_SESSION['message'] = 'Ticket Raised Successfully';
                redirect(base_url().'dealer/tickets');
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
            $this->_dealer('tickets/form', $data);
        }else if($act == 'edit'){
            if(!empty($_POST['ticket_id'])){
                $data['issue_status'] = !empty($_POST['issue_status']) ? trim($_POST['issue_status']) : '';
                $data['dealer_description'] = !empty($_POST['dealer_description']) ? trim($_POST['dealer_description']) : '';
                $this->dbapi->updateTicket($data,$_POST['ticket_id']);
                $_SESSION['message']='Ticket Updated Successfully';
                redirect(base_url().'dealer/tickets');
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
            $this->_dealer('tickets/form', $data);
        }else{
            $data['tickets']=$this->dbapi->searchTickets();
            $this->_dealer('tickets/index', $data);
        }


    }

    public function product_order()
    {
        $this->header_data['title'] = "PO";
        $data = array();
        _logged();


        $this->_dealer('po', $data);

    }

    public function profile()
    {
        $this->header_data['title'] = "Profile";
        $data = array();
        _logged();
        if (!empty($_POST['member_id'])) {
            $data['company_name'] = !empty($_POST['company_name']) ? trim($_POST['company_name']) : '';
            $data['user_name'] = !empty($_POST['user_name']) ? trim($_POST['user_name']) : '';
            $data['email'] = !empty($_POST['email']) ? trim($_POST['email']) : '';
            $data['password'] = !empty($_POST['password']) ? trim($_POST['password']) : '';
            $data['confirm_password'] = !empty($_POST['confirm_password']) ? trim($_POST['confirm_password']) : '';
            $data['address'] = !empty($_POST['address']) ? trim($_POST['address']) : '';
            $data['city'] = !empty($_POST['city']) ? trim($_POST['city']) : '';
            $data['state'] = !empty($_POST['state']) ? trim($_POST['state']) : '';
            $data['postal_code'] = !empty($_POST['postal_code']) ? trim($_POST['postal_code']) : '';
            $data['phone_no'] = !empty($_POST['phone_no']) ? trim($_POST['phone_no']) : '';
            $folder = 'data/profile/';
            if (!empty($_FILES['profile_logo']['name'])) {
                $data['profile_logo'] = imgUpload('profile_logo', $folder, slugify($data['user_name']));

            }
            $this->dbapi->updateUser($data, $_POST['member_id']);
            $_SESSION['message'] = 'Profile Updated Successfully';
            redirect(base_url() . "dealer/profile");
        }
        $data['states'] = $this->dbapi->getStatesList();
        $data['profile'] = $this->dbapi->getUserById($_SESSION['USER_ID']);
        $this->_dealer('profile', $data);

    }

    public function forgot_password()
    {
        $data = [];
        $this->header_data['title'] = ":: Forget Password ::";
        if (!empty($_POST['FORGOT']) && !empty($_POST['email'])) {
            $user = $this->dbapi->getUserByEmail($_POST['email']);

            if (!empty($user['member_id'])) {
                $reset_token = generateOTP(6);
                $this->dbapi->updateUser(["reset_token" => $reset_token], $user['member_id']);
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

    public
    function logout()
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

    public function test()
    {
        $ranges = array("1" => 25, "10" => 20, "100" => 15);
        $quantity = 2;
        $mrp = 2;
        if (count($ranges) > 1) {
            foreach ($ranges as $range => $price) {
                if ($quantity >= 1 && $range >= $quantity) {
                    echo "Range : " . $range . " ,your quantity : " . $quantity . "<br/>";
                    return false;
                }
            }
        } else {

            $t = $quantity * $mrp;
            echo $t;
        }
    }
}

?>