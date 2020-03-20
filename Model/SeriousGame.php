<?php
namespace projetWebSSE;
  class SeriousGame{

    private $_instance = null;
    private $_listeParties;
    private $_listeUtilisateurs;

    private function __construct()
    {
      $this->_listeParties = array();
      $this->_listeUtilisateurs = array();
    }

    public function getInstance()
    {
      if(is_null(self::$_instance))
      {
        $this->_instance = new SeriousGame();
      }

      return $this->_instance;
    }

    public function fillListeUtilisateurs($utilisateurs)
    {
      foreach($utilisateurs as $utilisateur)
      {
        switch ($utilisateur['role']) {
          case 'chefPompier':
            $player = new ChefPompier($utilisateur['login']);
            break;
          case 'maitreJeu':
            $player = new MaiterDuJeu($utilisateur['login']);
            break;
          case 'commandantOperations':
            $player = new CommandantOperations($utilisateur['login']);
            break;
          case 'crra':
            $player = new CRRA($utilisateur['login']);
            break;
          case 'medecinRepartiteur':
            $player = new MedecinRepartiteur($utilisateur['login']);
            break;
          case 'medecinTrieur':
            $player = new MedecinTrieur($utilisateur['login']);
            break;
          default:
            break;
        }
        $this->_listeUtilisateurs[$utilisateur['login']] = $player;
      }
    }

    public function fillListeParties($parties)
    {
      $listeJoueurs = array();
      foreach($parties->partie as $partie)
      {
        foreach ($partie->participants as $participant) {
          array_push($listeJoueurs, $this->_listeUtilisateurs[$participant]);
        }
        $p = new Partie($partie['id'], $partie->date, $listeJoueurs);
      }
    }

  }

 ?>
