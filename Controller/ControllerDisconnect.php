<?php

class ControllerDisconnect
{

  public function __construct()
  {

  }

  public function disconnect()
  {
    unset($_SESSION['login']);
    unset($_SESSION['inGame']);
    return View::render('Disconnect');
  }



}

?>
