<?php

include_once 'models/m_index.php';

class C_Index extends C_Base
{

  private $model = null;

  public function __construct($page)
  {
    parent::__construct($page);
    $this->model = new M_Index(9);
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

  public function action_goods()
  {
   echo "FKFKFKFKF";
   //$this->model->getGoods();
  }
}
