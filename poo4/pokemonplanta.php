<?php
require_once 'Pokemon.php';
class PokemonPlanta extends Pokemon{
    public function __construct($nombre,$tipo,$ataque){
        parent::__construct($nombre,"planta",$tipo,$ataque);
    }
    public function restaVida($danio){
    return parent::restaVida($danio+5);
    }

    public function vidaplanta_base(){
        return parent::anadirVida(50);
    }
    public function skills(){
        return "Se puede control natural";
    }
}

?>