<?php

require_once 'DataBase.php';

class Basket extends DataBase
{

  protected static $where;
  private static $id_user;
  private static $status;
  private static $id_catalog;
  private static $quantity;

  private function setIdUser($idUser)
  {
    return self::$id_user = $idUser;
  }

  private function setStatus($status)
  {
    return self::$status = (int)($status);
  }

  private function setIdCatalog($idCatalog)
  {
    return self::$id_catalog = (int)($idCatalog);
  }

  private function setQuantity($quantity)
  {
    return self::$quantity = (int)($quantity);
  }

  function selectBasket($idUser)
  {
    $this->setIdUser($idUser);
    return json_encode(parent::Select('basket', 'id_user', self::$id_user, null, true));
  }

  function insertGood($idUser, $idCatalog = null, $quantity = null, $status = null)
  {
    $this->setIdUser($idUser);
    $this->setIdCatalog($idCatalog);
    $this->setQuantity($quantity);
    $this->setStatus($status);
    $object = [
      'id_user' => self::$id_user,
      'id_catalog' => self::$id_catalog,
      'quantity' => self::$quantity,
      'id_status' => self::$status
    ];
    parent::Insert('cart', $object);
  }

  function updateGood($quantity, $status, $where)
  {
    if ($quantity && $status) {
      $object = [
        'quantity' => $quantity,
        'id_status' => $status
      ];
    }
    if ($quantity && ($status == null)) {
      $object = [
        'quantity' => $quantity
      ];
    }
    if ($status && ($quantity == null)) {
      $object = [
        'id_status' => $status
      ];
    }
    self::$where = $where;
    parent::Update('cart', $object, self::$where);
  }

  function deleteGoods($where)
  {
    self::$where = $where;
    echo $where;
    parent::Delete('cart', $where);
  }
}