<?php
include_once 'models/Products.php';
include_once 'models/Basket.php';

class C_SinglePage extends C_Base
{

  private $id_catalog;
  private static $product;

  public function __construct($page)
  {
    parent::__construct($page);
    self::$product = new Products();
    $this->SetIdCatalog($_GET['id_catalog']);
  }

  private function SetIdCatalog($id_catalog)
  {
    return $this->id_catalog = $id_catalog;
  }

  public function action_index()
  {

    $product = self::$product->getProduct($this->id_catalog);

    $varsSliderGood = [
      'image_good' => $this->TemplateDir('image-good.tmpl', ['product' => $product['src']])
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

  public function method_index()
  {
    echo self::$product->getSingle(17);
  }


}