<?php
  function createUser($password)
  {
    include("../bdd/connexion.php");

    $stm = $dbh->prepare("INSERT INTO UTILISATEURS VALUES (:login, :mdp, :mail, :role)");
    $stm->bindParam(':login', $login);
    $login = $_POST['login'];
    $stm->bindParam(':mdp', $mdp);
    $mdp = $password;
    $stm->bindParam(':mail', $mail);
    $mail = $_POST['mail'];
    $stm->bindParam(':role', $role);
    $role = $_POST['role'];
    $stm->execute();
  }

?>
