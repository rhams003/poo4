<?php
class Entrenadora {
    private $nombre;
    private $genero;
    private $colorPelo;
    private $colorPiel;
    private $pokemons;

    public function __construct($nombre, $genero, $colorPelo, $colorPiel) {
        $this->nombre = $nombre;
        $this->genero = $genero;
        $this->colorPelo = $colorPelo;
        $this->colorPiel = $colorPiel;
        $this->pokemons = [];
    }

    // --- NUEVOS MÉTODOS AÑADIDOS ---
    public function getNombre() { 
        return $this->nombre; 
    }

    public function cazarPokemon($pokemon) {
        $this->pokemons[] = $pokemon;
        return "<p>¡{$this->nombre} ha capturado a " . $pokemon->getNombre() . " y lo ha añadido a su equipo!</p>";
    }
    // -------------------------------

    public function mostrarInfo() {
        $art = ($this->genero == "Chica") ? "una" : "un";
        
        // Mostrar también los nombres de los pokemon capturados si tiene alguno
        $listaEquipo = "";
        if (count($this->pokemons) > 0) {
            $nombres = array_map(function($p) { return $p->getNombre(); }, $this->pokemons);
            $listaEquipo = "<p><strong>Equipo:</strong> " . implode(", ", $nombres) . "</p>";
        }

        return "
        <article class='ficha-entrenador'>
            <h3>{$this->nombre}</h3>
            <p>Soy $art <strong>{$this->genero}</strong></p>
            <p>Cabello: {$this->colorPelo}  Piel: {$this->colorPiel}</p>
            <p>Pokémon en el equipo: " . count($this->pokemons) . " / 6</p>
            {$listaEquipo}
        </article>";
    }
}
?>