<?php

  function getUser($login)
  {
    include("../bdd/connexion.php");
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

?>
