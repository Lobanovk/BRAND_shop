<?php
include_once 'models/User.php';

class C_Account extends C_Base {

  private $user = null;

  public function __construct($page)
  {
    parent::__construct($page);
    $this->user = new User();
  }

  public function action_index() {

    $varsContent = [
      'sidenav' => $this->TemplateDir('sidenav.tmpl', []),
      'personal' => $this->TemplateDir('personal.tmpl', []),
    ];

    if ($_SESSION['id_user']) {
      $this->header = $this->Template('header.tmpl', []);
      $this->nav = $this->Template('nav.tmpl', []);
      $this->content = $this->TemplateDir('content.tmpl', $varsContent);
      $this->footer = $this->Template('footer.tmpl', []);
      $this->script = $this->TemplateDir('script.tmpl', []);
    } else {header('Location: index.php?page=checkout');}
  }

  public function action_settings(){
    $varsContent = [
      'sidenav' => $this->TemplateDir('sidenav.tmpl', []),
      'personal' => $this->TemplateDir('form.tmpl', []),
    ];

    $this->header = $this->Template('header.tmpl', []);
    $this->nav = $this->Template('nav.tmpl', []);
    $this->content = $this->TemplateDir('content.tmpl', $varsContent);
    $this->footer = $this->Template('footer.tmpl', []);
    $this->script = $this->TemplateDir('script.tmpl', []);
  }

  public function method_settings(){
    if(isset($_SESSION['id_user'])){
      echo $this->user->getUser($_SESSION['id_user']);
    }
  }

  public function method_update_info(){
    if ($this->isPost()) {
      echo $this->user->updateUser($_SESSION['id_user'], $_POST['username'], $_POST['email'], $_POST['credit_card'], $_POST['id_gender']);
    }
  }

  public function method_logout(){
    if($_SESSION['id_user'])
      $this->user->logout();
      header('Location: index.php?page=checkout');
  }

  public function method_index(){
      if(isset($_SESSION['id_user'])){
        echo $this->user->getOrders($_SESSION['id_user']);
      }
  }


}