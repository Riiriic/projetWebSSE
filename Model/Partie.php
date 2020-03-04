<?php
namespace projetWebSSE;

class Partie
{
    private $_id;
    private $_date;
    private Accident $_accident;
    //Joueur a debattre plus tard

    public function __construct(){
        $this->_id=NULL;
        $this->_date=date(DATE_RFC2822);
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