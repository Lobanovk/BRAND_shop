<?php

class C_SinglePage extends C_Base{
  public function __construct($page)
  {
    parent::__construct($page);
    //self::$database = new M_Index();
  }

  public function action_index() {

    $varsSliderGood = [
      'image_good' => $this->TemplateDir('image-good.tmpl', [])
    ];

    $varsContent = [
      'slider_good' => $this->TemplateDir('slider-good.tmpl', $varsSliderGood),
      'info_good' => $this->TemplateDir('info-good.tmpl', []),
      'color_size' => $this->TemplateDir('color-size.tmpl', []),
    ];

    $this->header = $this->Template('header.tmpl', []);
    $this->nav = $this->Template('nav.tmpl', []);
    $this->breadcrumb = $this->Template('breadcrumb.tmpl', []);
    $this->content = $this->TemplateDir('content.tmpl', $varsContent);
    $this->footer = $this->Template('footer.tmpl', []);
    $this->script = $this->TemplateDir('script.tmpl', []);
  }
}