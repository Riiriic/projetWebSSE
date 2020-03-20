<?php
namespace projetWebSSE;

class Partie
{
    private $_id;
    private $_date;
    private Accident $_accident;
    private $_listeJoueurs;
    //Joueur a debattre plus tard

    public function __construct($id, $date, $participants){
        $this->_id=$id;
        $this->_date=date($date);
        $this->_listeJoueurs = array();

        $this->_accident=new Accident();
    }

    public function getDate(){
        return $this->_date;
    }

    public function getId(){
        return $this->_id;
    }

    public function setId($id){
        $this->_id=$id;
    }

}
?>
