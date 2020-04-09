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
        $_SESSION['waitDecision'] = false;
        $seriousGame = self::getDatas();
        if(isset($_SESSION['inGame']))
        {
          //header('Location: /projetwebsse/partie');
          //Redirection vers la page du jeu.
        }
        else {
          if(isset($_SESSION['joinedGame']))
          {
            $partieJoueur = $seriousGame->getPartie($_SESSION['joinedGame']);
            $parties = $seriousGame->getPartiesSauf($_SESSION['joinedGame']);
          }
          else {
            $parties = $seriousGame->getListeParties();
          }
          return View::render('Games',compact('partieJoueur','parties'));
        }
      }
      else {
        header('Location: /projetwebsse/connect');
      }
    }

    function getDatas()
    {
      include("./bdd/connexion.php");
      try {

        $testIngame = $dbh->prepare("SELECT distinct(nomPartie) FROM PARTICIPEPARTIE WHERE login=:loginPlayer");
        $testIngame->bindParam(':loginPlayer', $login);
        $login = $_SESSION['login'];
        if($testIngame->execute()>0)
        {
          $row = $testIngame->fetch();
        }
        if($row)
        {
          $_SESSION['joinedGame'] = $row[0];
          $nbParticipantsQuery = $dbh->prepare("SELECT count(role) FROM PARTICIPEPARTIE WHERE nomPartie=:nom");
          $nbParticipantsQuery->bindParam(':nom', $partie);
          $partie = $row[0];
          if($nbParticipantsQuery->execute()>0)
          {
            $nbParticipants = $nbParticipantsQuery->fetch();
          }
          if($nbParticipants[0] == 7)
          {
            $_SESSION['inGame'] = $row[0];
          }
        }
        $res = "";
        if(!isset($_SESSION['inGame']))
        {
          $games = $dbh->query('SELECT nomPartie, date, etat FROM PARTIE');
          $players = $dbh->query('SELECT login FROM UTILISATEURS');
          $participe = $dbh->query('SELECT nomPartie, login, role FROM PARTICIPEPARTIE');
          self::createGameEnvt($games, $players, $participe);
          $res =  projetWebSSE\SeriousGame::getInstance();
        }
        return $res;
      } catch (Exception $e) {
        echo $e;
      }

    }

    public static function refresh()
    {
      $seriousGame = self::getDatas();
      if(isset($_SESSION['inGame']))
      {
        //header('Location: /projetwebsse/partie');
        //Redirection vers la page du jeu.
      }
      else {
        if(isset($_SESSION['joinedGame']))
        {

          $partieJoueur = $seriousGame->getPartie($_SESSION['joinedGame']);
          $parties = $seriousGame->getPartiesSauf($_SESSION['joinedGame']);
          $temp = [];
          foreach($parties as $partie)
          {
            $temp[] = $partie->toJson();
          }
          $res = ['partieJoueur' => $partieJoueur->toJson(), 'parties' => $temp];
        }
        else {
          $parties = $seriousGame->toJson();
          $res = ['partieJoueur' => '', 'parties' => $parties];
        }
        return json_encode($res);
      }

  }

    public static function quitGame()
    {
      include("./bdd/connexion.php");
      if(isset($_POST['idGame']))
      {
        $id = $_POST['idGame'];
        if($_SESSION['waitDecision'])
        {
          $stm = $dbh->prepare("DELETE FROM PARTICIPEPARTIE WHERE NOMPARTIE=:idGame AND LOGIN=:loginPlayer");
          $stm->bindParam(':idGame', $partie);
          $partie = $id;
          $stm->bindParam(':loginPlayer', $login);
          $login = $_SESSION['login'];
          $stm->execute();
          unset($_SESSION['joinedGame']);
          header('Location: /projetwebsse/games');
        }
        else {
          $_SESSION['waitDecision'] = true;
          return View::render('Quit',compact('id'));
        }

      }
      else{
        header('Location: /projetwebsse/games');
      }
    }

    public static function joinGame()
    {
      if(isset($_POST['idGame']))
      {
        if($_SESSION['waitDecision'])
        {
          include("./bdd/connexion.php");
          $stm = $dbh->prepare("INSERT INTO PARTICIPEPARTIE VALUES(:idGame, :loginPlayer, :role)");
          $stm->bindParam(':idGame', $partie);
          $partie = $_POST['idGame'];
          $stm->bindParam(':loginPlayer', $login);
          $login = $_SESSION['login'];
          $stm->bindParam(':role', $role);
          $role = $_POST['selectRole'];
          $stm->execute();
          $_SESSION['joinedGame'] = $_POST['idGame'];
          header('Location: /projetwebsse/games');
        }
        else {
          $availableRoles = array('chefPolice' => 'Chef de la Police', 'chefPompier' => 'Chef des Pompiers', 'chefSamu' => 'Médecin Responsable', 'crra' => 'CRRA', 'maitreJeu' => 'Maître du Jeu', 'medecinTrieur' => 'Médecin Trieur', 'medecinRepartiteur' => 'Médecin répartiteur');
          $takenRoles = self::getInfos();
          foreach($takenRoles as $role)
          {
            unset($availableRoles[$role]);
          }
          $id = $_POST['idGame'];
          $_SESSION['waitDecision'] = true;
          return View::render('Join',compact('availableRoles', 'id'));
        }
      }
      else{
        header('Location: /projetwebsse/games');
      }
    }

    function getInfos()
    {
      include("./bdd/connexion.php");
      $stm = $dbh->prepare("SELECT role FROM PARTICIPEPARTIE WHERE NOMPARTIE=:idGame");
      $stm->bindParam(':idGame', $idGame);
      $idGame = $_POST['idGame'];
      $row = -1;
      if($stm->execute()>0)
      {
        $row = $stm->fetch(PDO::FETCH_NUM);
      }
      return $row;
    }


    function createGameEnvt($games, $players, $participe)
    {
      $jeu = projetWebSSE\SeriousGame::getInstance();
      $jeu->fillListeUtilisateurs($players);
      $jeu->fillListeParties($games, $participe);
    }
  }


?>
