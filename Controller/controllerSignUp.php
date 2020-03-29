<?php

  class ControllerSignUp
  {

    public function __construct()
    {

    }
    public static function register() {
      if(isset($_SESSION['login']))
      {
        header('Location: /projetwebsse/games');
      }
      else
      {
        return View::render('SignUp');
      }
    }

    public function test()
    {
      if (isset($_POST['login']) && isset($_POST['passwrd']) && isset($_POST['mail']) && isset($_POST['passwrdConfirm']) && isset($_POST['role'])) {
        if(is_string($_POST['passwrd']))
        {
          $mdp = password_hash($_POST['passwrd'], PASSWORD_DEFAULT);
          if(password_verify($_POST['passwrdConfirm'], $mdp))
          {
            try {
              $this->createUser($mdp);
              header('Location: connect');
            } catch (Exception $e) {
              $_SESSION['error'] =  $e->getMessage();
            }
          }
          else {
            $_SESSION['error'] =  "Les mots de passe ne correspondent pas.";
          }
        }
        else {
          $_SESSION['error'] =  "Le mot de passe doit contenir une lettre minimum.";
        }
      }
      return View::render('Connect');
    }

    function createUser($password)
    {
      include("./bdd/connexion.php");
      $stm = $dbh->prepare("INSERT INTO UTILISATEURS VALUES (:login, :mdp, :mail)");
      $stm->bindParam(':login', $login);
      $login = $_POST['login'];
      $stm->bindParam(':mdp', $mdp);
      $mdp = $password;
      $stm->bindParam(':mail', $mail);
      $mail = $_POST['mail'];
      $stm->execute();
    }
  }


?>
