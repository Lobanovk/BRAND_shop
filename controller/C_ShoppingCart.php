<?php
include_once 'models/Basket.php';
class C_ShoppingCart extends C_Base{

  private $basket = null;
  public function __construct($page)
  {
    parent::__construct($page);
    $this->basket = new Basket();
  }

  public function action_index() {

    $varsContent = [
      'product_info' => $this->TemplateDir('product-info.tmpl', []),
      'good' => $this->TemplateDir('good.tmpl', []),
      'addres_discount_check' => $this->TemplateDir('addres-discount-check.tmpl', []),
    ];

    $this->header = $this->Template('header.tmpl', []);
    $this->nav = $this->Template('nav.tmpl', []);
    $this->breadcrumb = $this->Template('breadcrumb.tmpl', []);
    $this->content = $this->TemplateDir('content.tmpl', $varsContent);
    $this->footer = $this->Template('footer.tmpl', []);
    $this->script = $this->TemplateDir('script.tmpl', []);
  }

  public function method_index(){
    if(isset($_SESSION['id_user'])){
      echo $this->basket->selectBasket($_SESSION['id_user']);
    }
  }

  public function method_delete_cart(){
    if ($this->isPost()) {
      if (isset($_SESSION['id_user']))
        $this->basket->deleteGoods("id_catalog =". $_POST['id_catalog']. " and id_user = ". $_SESSION['id_user']);
    }
  }

  public function method_update_orders(){
      if ($this->isPost()){
        if(isset($_SESSION['id_user']))
          echo  $this->basket->updateGood($_POST['quantity'],2,"id_cart=" .$_POST['id_cart']);
      }
  }
}