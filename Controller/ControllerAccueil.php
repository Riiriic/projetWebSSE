<?php

class ControllerAccueil
{

  public function __construct()
  {

  }

  public static function index() {
    $vue = View::getInstance();
    return $vue->render('Home');
  }

  public static function connect() {
    $vue = View::getInstance();
    return $vue->render('Connect');
  }

  public static function register() {
    $vue = View::getInstance();
    return $vue->render('SignUp');
  }
}

?>
