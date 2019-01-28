<?php

require_once 'DataBase.php';

class M_Index extends DataBase{

  protected static $limit;

  function __construct($limit)
  {
    parent::__construct();
    self::setLimit($limit);
  }

  function getGoods(){
    return json_encode(parent::SelectGoods('index', 'id_catalog', self::$limit));
  }

  protected function setLimit($limit){
    return self::$limit = $limit;
  }

}
