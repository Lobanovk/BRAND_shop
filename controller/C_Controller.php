<?php

session_start();
abstract class C_Controller
{

  protected static $twig1 = null;
  protected static $twig2 = null;

  protected abstract function renderPage();

  protected abstract function before();

  public function Request($action)
  {
    $this->before();
    $this->$action();
    $this->renderPage();
  }

  protected function IsGet()
  {
    return $_SERVER['REQUEST_METHOD'] == 'GET';
  }

  protected function IsPost()
  {
    return $_SERVER['REQUEST_METHOD'] == 'POST';
  }

  protected function __construct($page = null)
  {
    require_once 'Twig/Autoloader.php';

    //Настраимаем подключение к шаблонизатору
    Twig_Autoloader::register();

    try {
      $loader1 = new Twig_Loader_Filesystem('templates');
      $loader2 = new Twig_Loader_Filesystem('templates/'.$page);

      self::$twig1 = new Twig_Environment($loader1);
      self::$twig2 = new Twig_Environment($loader2);

    } catch (Exception $e) {
      die ('ERROR: ' . $e->getMessage());
    }
  }

  protected function Template($fileName, $vars = [])
  {
    $template = self::$twig1->loadTemplate($fileName);
    return $template->render($vars);
  }

  protected function TemplateDir($fileName, $vars = []){
    $template = self::$twig2->loadTemplate($fileName);
    return $template->render($vars);
  }

  public function __call($name, $params)
  {
    die('Не пишите фигню в url-адресе!!!');
  }
}
