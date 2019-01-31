<?php
include_once 'models/Basket.php';
include_once 'models/Products.php';

class C_Product extends C_Base{

  private $products = null;
  private $basket = null;

  function __construct($page)
  {
    parent::__construct($page);
    $this->products = new Products();
    $this->basket = new Basket();
  }

  public function action_index() {

    $varsContent = [
      'sidenav' => $this->TemplateDir('sidenav.tmpl', []),
      'choose' => $this->TemplateDir('choose.tmpl', []),
      'sort' => $this->TemplateDir('sort.tmpl', []),
      'goods' => $this->TemplateDir('goods.tmpl', []),
    ];

    $this->header = $this->Template('header.tmpl', []);
    $this->nav = $this->Template('nav.tmpl', []);
    $this->breadcrumb = $this->Template('breadcrumb.tmpl', []);
    $this->content = $this->TemplateDir('content.tmpl', $varsContent);
    $this->footer = $this->Template('footer.tmpl', []);
    $this->script = $this->TemplateDir('script.tmpl', []);
  }

  public function method_index()
  {
    if($this->isGet())
    echo $this->products->getProducts(9, $_GET['gender']);
  }


}