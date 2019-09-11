<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'home';
$route['404_override'] = 'home/page_not_found';
$route['translate_uri_dashes'] = FALSE;
$route['products/(:num)']='products/index/$1';
$route['products/(:num)/(:num)']='products/index/$1/$2';
$route['product-discription/(:num)'] = 'products/product_desc/$1';
// $route['product-desc']='products/discription';
$route['register']='login/register';
$route['contact']='home/contact';
$route['contact-us']='home/contact_us';
$route['about-us']='home/about_us';

