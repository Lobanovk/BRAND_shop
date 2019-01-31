<?php

require_once 'DataBase.php';

class Products extends DataBase{

  private static $id_gender;
  private static $limit;
  private static $id_catalog;

  private function setIdGender($id_gender){
    return self::$id_gender = $id_gender;
  }

  private function setLimit($limit){
    return self::$limit = $limit;
  }

  private function setIdCatalog($id_catalog){
    return self::$id_catalog = $id_catalog;
  }

  function getGoods ($limit){
    $this->setLimit($limit);
    return json_encode(parent::Select('index', 'id_catalog', self::$limit, '<', true));
  }

  public function getProducts ($limit, $id_gender){
    $this->setIdGender($id_gender);
    $this->setLimit($limit);

    return json_encode(parent::Select('index', 'id_gender', self::$id_gender, '=', true, self::$limit));
  }

  public function getProduct($id_catalog){
    $this->setIdCatalog($id_catalog);
    return parent::Select('index', 'id_catalog', self::$id_catalog, '=');
  }

  public function getSingle($id_catalog){
    $this->setIdCatalog($id_catalog);
    return json_encode(parent::Select('index', 'id_catalog', self::$id_catalog, '>', true));
  }
}