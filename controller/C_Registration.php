<?php
include_once 'models/Basket.php';
include_once 'models/User.php';

class C_Registration extends C_Base
{

  private $user;

  public function __construct($page)
  {
    parent::__construct($page);
    $this->user = new User();
  }

  public function action_index()
  {

    $varsContent = [
      'form' => $this->TemplateDir('form.tmpl', []),
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
    if ($this->isPost()) {
     echo $this->user->newUser($_POST['username'], $_POST['email'], $_POST['password'], $_POST['credit_card'], $_POST['id_gender'], 0);
    }
  }



}