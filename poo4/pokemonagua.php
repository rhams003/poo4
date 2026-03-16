<?php
require_once 'Pokemon.php';
class PokemonAgua extends Pokemon{
    public function __construct($nombre,$tipo,$ataque){
        parent::__construct($nombre,"fuego",$tipo,$ataque);
    }
    public function restaVida($danio){
    return parent::restaVida($danio+5);
    }

    public function vidaplanta_base(){
        return parent::anadirVida(30);
    }
    public function skills(){
        return "Se puede control agua";
    }
}

?>