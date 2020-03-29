<?php

include_once('./Model/SeriousGame.php');

  class ControllerGames
  {
    public function __construct()
    {

    }

    public static function hubGames() {
      if(isset($_SESSION['login']))
      {
        $datas = self::getDatas();
        return View::render('Games',compact('datas', 'user'));
      }
      else {
        header('Location: /projetwebsse/connect');
      }
    }

    function getDatas()
    {
      include("./bdd/connexion.php");
      try {
        $games = $dbh->query('SELECT nomPartie, date, etat FROM PARTIE');
        $players = $dbh->query('SELECT login FROM UTILISATEURS');
        $participe = $dbh->query('SELECT nomPartie, login, role FROM PARTICIPEPARTIE');
        self::createGameEnvt($games, $players, $participe);
        return projetWebSSE\SeriousGame::getInstance()->getListeParties();
      } catch (Exception $e) {
        echo $e;
      }

    }

    function createGameEnvt($games, $players, $participe)
    {
      $jeu = projetWebSSE\SeriousGame::getInstance();
      $jeu->fillListeUtilisateurs($players);
      $jeu->fillListeParties($games, $participe);
    }
  }


?>
