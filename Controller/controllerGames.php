<?php
  include('../Model/SeriousGame.php');
  include('../Controller/loadXML.php');
  include('../bdd/connexion.php');

  function getParties()
  {
    $games =  load("parties.xml");
    $players = $dbh->query('SELECT login, role FROM UTILISATEURS');
    createGameEnvt($games, $players);
    return $games;
  }

  function createGameEnvt($games, $players)
  {

    $jeu = SeriousGame::getInstance();
    $jeu->fillListeParties($games);
    $jeu->fillListeUtilisateurs($players);
  }

?>
