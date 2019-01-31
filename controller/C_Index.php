<?php

include_once 'models/Products.php';
include_once 'models/Basket.php';

class C_Index extends C_Base
{

  private $model = null;
  private $db = null;

  public function __construct($page)
  {
    parent::__construct($page);
    $this->model = new Products();
    $this->db = new Basket();
    //unset($_SESSION['id_user']);
  }

  public function action_index()
  {

    $varsContent = [
      'slider' => $this->TemplateDir('slider.tmpl', []),
      'offer' => $this->TemplateDir('offer.tmpl', []),
      'goods' => $this->TemplateDir('goods.tmpl', []),
      'special_offer' => $this->TemplateDir('special-offer.tmpl', []),
    ];

    $this->header = $this->Template('header.tmpl', []);
    $this->nav = $this->Template('nav.tmpl', []);
    $this->content = $this->TemplateDir('content.tmpl', $varsContent);
    $this->footer = $this->Template('footer.tmpl', []);
    $this->script = $this->TemplateDir('script.tmpl', []);
  }

  public function method_index()
  {
    echo $this->model->getGoods(9);
  }

  public function method_addcart()
  {
    if ($this->isPost()) {
      if (isset($_SESSION['id_user']))
        $this->db->insertGood($_SESSION['id_user'], $_POST['id_catalog'], $_POST['quantity'], 1);
    }
  }

  public function method_see_cart()
  {
    if($_SESSION['id_user'])
    echo $this->db->selectBasket($_SESSION['id_user']);
  }

  public function method_update_cart()
  {
    if ($this->isPost()) {
      if (isset($_SESSION['id_user']))
        $this->db->updateGood($_POST['quantity'], null, "id_catalog =". $_POST['id_catalog']. " and id_user = ". $_SESSION['id_user'] );
    }
  }

  public function method_delete_cart(){
    if ($this->isPost()) {
      if (isset($_SESSION['id_user']))
        $this->db->deleteGoods("id_catalog =". $_POST['id_catalog']. " and id_user = ". $_SESSION['id_user']);
    }
  }
}
