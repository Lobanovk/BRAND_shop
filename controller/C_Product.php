<?php

class C_Product extends C_Base{

  function __construct($page)
  {
    parent::__construct($page);
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
}