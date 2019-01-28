<?php

class Query
{

  private static $db;

  function __construct()
  {
    include 'config/constante.php';

    $connect_str = DB_DRIVER . ':host=' . DB_HOST . ';dbname=' . DB_NAME;
    self::$db = new PDO($connect_str, DB_USER, DB_PASS);

    $error_arr = self::$db->errorInfo();

    if (self::$db->errorCode() != 0000)
      echo "SQL ошибка: " . $error_arr[2] . "<br>";
  }

  function sign_in($email, $password)
  {
    $query = self::$db->prepare("select * from users where email = ? and password = ?");
    $query -> execute([$email, (string)(md5($password))]);

    if ($query->fetchColumn()){
      echo 1;
    } else {
      echo 0;
    }
  }

  function getInfo($email, $password){
    $query = self::$db->prepare("select * from users where email = ? and password = ?");
    $query -> execute([$email, (string)(md5($password))]);
    return $query->fetch();
  }
}

//$b = new Query();
//print_r($b->getInfo('mymail@list.ru', 12345678));