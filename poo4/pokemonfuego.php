<?php
require_once 'Pokemon.php';
class PokemonFuego extends Pokemon{
    public function __construct($nombre,$tipo,$ataque){
        parent::__construct($nombre,"fuego",$tipo,$ataque);
    }
    public function restaVida($danio){
    return parent::restaVida($danio+10);
    }

    public function vidaplanta_base(){
        return parent::anadirVida(10);
    }
    public function skills(){
        return "Se puede control fuego";
    }
}

?>