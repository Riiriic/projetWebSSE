<?php
/**
 *
 */


class View
{
  private static $_instance = null;

  private function __construct()
  {
  }

  public static function getInstance()
  {
    if(is_null(self::$_instance))
    {
      self::$_instance = new View();
    }
    return self::$_instance;
  }

  public static function render($filename) {
    ob_start();
    require "./View/view" . $filename . ".php";
  }
}


 ?>
