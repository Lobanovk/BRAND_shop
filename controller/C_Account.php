<?php

class C_Account extends C_Base {

  public function __construct($page)
  {
    parent::__construct($page);
  }

  public function action_index() {

    $varsContent = [
      'sidenav' => $this->TemplateDir('sidenav.tmpl', []),
      'personal' => $this->TemplateDir('personal.tmpl', []),
    ];

    $this->header = $this->Template('header.tmpl', []);
    $this->nav = $this->Template('nav.tmpl', []);
    $this->content = $this->TemplateDir('content.tmpl', $varsContent);
    $this->footer = $this->Template('footer.tmpl', []);
    //$this->script = $this->TemplateDir('script.tmpl', []);
  }
}