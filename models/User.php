<?php
require_once 'DataBase.php';

class User extends DataBase{

  private static $id_user;
  private static $username;
  private static $email;
  private static $password;
  private static $credit_card;
  private static $id_gender;
  private static $role;

  private function setIdUser($id_user){
    return self::$id_user = $id_user;
  }

  private function setUserName($username){
    return self::$username = (string)(strip_tags($username));
  }

  private function setEmail($email){
    return self::$email = (string)(strip_tags($email));
  }

  private function setPassword($password){
    return self::$password = (string)(strip_tags($password));
  }

  private function setCreditCard($credit_card){
    return self::$credit_card = (string)(strip_tags($credit_card));
  }

  private function setIdGender($id_gender){
    return self::$id_gender = (int)(strip_tags($id_gender));
  }

  private function setRole($role){
    return self::$role = (int)(strip_tags($role));
  }

  public function getUser($id_user){
    $this->setIdUser($id_user);
    return json_encode(parent::Select('user', 'id_user', self::$id_user));
  }

  public function newUser($username, $email, $password, $credit_card, $id_gender, $role){
    $this->setUserName($username);
    $this->setEmail($email);
    $this->setPassword($password);
    $this->setCreditCard($credit_card);
    $this->setIdGender($id_gender);
    $this->setRole($role);

    $object = [
      'username' => self::$username,
      'email' => self::$email,
      'password' =>md5(self::$password),
      'credit_card' => self::$credit_card,
      'id_gender' =>self::$id_gender,
      'role' => self::$role
    ];

    $user = parent::Select('user', 'email', self::$emai);

    if(!$user){
      parent::Insert('users', $object);
      return 'Registration completed successfully!';
    } else {
      return 'This user already exists!';
    }
  }

  public function updateUser($id_user = null, $username = null, $email = null, $credit_card=null, $id_gender=null){
    $this->setUserName($username);
    $this->setEmail($email);
    $this->setCreditCard($credit_card);
    $this->setIdGender($id_gender);
    $this->setIdUser($id_user);

    $object = [
      'username' => self::$username,
      'email' => self::$email,
      'credit_card' => self::$credit_card,
      'id_gender' =>self::$id_gender,
    ];

    parent::Update('users', $object, 'id_user ='. self::$id_user);

    return  self::$id_user;
  }

  public function login($email, $password){
    $this->setEmail($email);
    $this->setPassword($password);

    $user = parent::Select('user', 'email', self::$email);

    if ($user){
      if ($user['password'] == md5(self::$password)){
        $_SESSION['id_user'] = $user['id_user'];
       return 1;
      }
    } else return 0;
  }

  public function logout (){
    if ($_SESSION['id_user']){
      unset($_SESSION['id_user']);
      session_destroy();
    }
  }

  public function getOrders($id_user){
  $this->setIdUser($id_user);

  return json_encode(parent::Select('orders', 'id_user', self::$id_user, null, true));
  }
}
