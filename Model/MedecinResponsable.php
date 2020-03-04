<?php
namespace ProjetWeb;

class MedecinResponsable extends Utilisateur{
  private VehiculeTransport $_vt;
  private Personnel $_perso;

  public function __construct($login, $mdp, $mail, VehiculeTransport $vt, Personnel $_perso){
    $this->_login=$login;
    $this->_mdp=$mdp;
    $this->_mail=$mail;
    $this->_vt=$vt;
    $this->_perso=$perso;
  }

  public function getVt(){
    return $this->_vt;
  }

  public function getPerso(){
    return $this->_perso;
  }

  public function setVt(VehiculeTransport $vt){
    $this->_vt=$vt;
  }

  public function setVt(Personnel $_perso){
    $this->_perso=$perso;
  }
}


?>
