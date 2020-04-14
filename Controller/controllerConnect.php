<?php

  class ControllerConnect
  {
    public function __construct()
    {

    }
    public static function connect() {
      if(isset($_SESSION['login']))
      {
        header('Location: /projetwebsse/games');
      }
      else {
        return View::render('Connect');
      }
    }

    public function test()
    {
      if(isset($_POST['login']) && isset($_POST['passwrd'])) {
        $row = $this->getUser($_POST['login']);
        if($row != -1)
        {
          if(!$this->testMdp($_POST['passwrd'], $row[1]))
          {
            $_SESSION['error'] = "Le mot de passe ne correspond pas au login saisi.";
          }
          else {
            $_SESSION['login'] = $row[0];
            header('Location: /projetwebsse/games');
          }
        }
        else {
          $_SESSION['error'] = "Le login saisi n'existe pas.";
        }
      }
      return View::render('Connect');
    }

    function getUser($login)
    {
      include("./bdd/connexion.php");
      $stm = $dbh->prepare("SELECT * FROM UTILISATEURS WHERE LOGIN=:login");
      $stm->bindParam(':login', $login);
      $login = $_POST['login'];
      $row = -1;
      if($stm->execute()>0)
      {
        $row = $stm->fetch();
      }
      return $row;
    }

    function testMdp($mdp, $mdpBDD)
    {
      return password_verify($mdp, $mdpBDD);
    }
  }


?>
