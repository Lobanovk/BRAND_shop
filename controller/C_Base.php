<?php

abstract class C_Base extends C_Controller
{
  protected $content;
  protected $header;
  protected $nav;
  protected $breadcrumb;
  protected $footer;
  protected $script;

  function __construct($page)
  {
    parent::__construct($page);
  }

  protected function before()
  {
    $this->content = null;
    $this->header = null;
    $this->menu=null;
    $this->footer=null;
  }

  public function renderPage()
  {
    $vars = [
      'header' => $this->header,
      'nav' => $this->nav,
      'breadcrumb' => $this->breadcrumb,
      'content' => $this->content,
      'footer' => $this->footer,
      'script' => $this->script,
    ];

    $page = $this->Template('v-index.tmpl', $vars);

    echo $page;
  }
}