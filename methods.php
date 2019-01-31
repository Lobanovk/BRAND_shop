<?php
function __autoload($classname)
{
  include_once("controller/$classname.php");
}

$method = "method_";
$method .= (isset($_GET['m'])) ? $_GET['m'] : 'index';

switch ($_GET['page']) {
  case 'checkout':
    $controller = new C_Checkout('checkout');
    break;
  case 'product':
    $controller = new C_Product('product');
    break;
  case 'account':
    $controller = new C_Account('account');
    break;
  case 'shopping-cart':
    $controller = new C_ShoppingCart('shopping-cart');
    break;
  case 'single-page':
    $controller = new C_SinglePage('single-page');
    break;
  case 'registration':
    $controller = new C_Registration('registration');
    break;
  case 'index':
    $controller = new C_Index('index');
  default:
    $controller = new C_Index('index');
}
$controller->$method();