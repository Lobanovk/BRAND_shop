<?php

class C_Checkout extends C_Base {

  public function __construct($page)
  {
    parent::__construct($page);
    //self::$database = new M_Index();
  }

  public function action_index() {

    $varsContent = [
      'check' => $this->TemplateDir('check-register.tmpl', []),
      'sign_in' => $this->TemplateDir('sign-in.tmpl', []),
    ];

    $this->header = $this->Template('header.tmpl', []);
    $this->nav = $this->Template('nav.tmpl', []);
    $this->breadcrumb = $this->Template('breadcrumb.tmpl', []);
    $this->content = $this->TemplateDir('content.tmpl', $varsContent);
    $this->footer = $this->Template('footer.tmpl', []);
    $this->script = $this->TemplateDir('script.tmpl', []);
  }
}