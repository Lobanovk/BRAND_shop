<?php

class C_ShoppingCart extends C_Base{

  public function __construct($page)
  {
    parent::__construct($page);
    //self::$database = new M_Index();
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
   //$this->script = $this->TemplateDir('script.tmpl', []);
  }
}