<?php
class Pokemon {
    private $nombre;
    private $elemento;
    private $stats;
    private $movimientos;

    public function __construct($nombre, $elemento, $stats, $movimientos) {
        $this->nombre = $nombre;
        $this->elemento = $elemento;
        $this->stats = $stats;
        $this->movimientos = array_slice(array_filter($movimientos), 0, 4);
    }

    // metodos
    public function getNombre() {
        return $this->nombre;
    }

    public function atacar() {
        $movimiento = isset($this->movimientos[0]) ? $this->movimientos[0] : 'Placaje';
        return "<p>¡{$this->nombre} ha atacado usando {$movimiento}!</p>";
    }

    public function evolucionar() {
        return "<p>¡Qué sorpresa! ¡{$this->nombre} está evolucionando!</p>";
    }

    // Métodos necesarios para fight.php
    public function getVida() {
        return $this->stats['hp'];
    }

    public function getDanio() {
        return $this->stats['at'];
    }

    public function restaVida($cantidad) {
        $this->stats['hp'] -= $cantidad;
        if ($this->stats['hp'] < 0) {
            $this->stats['hp'] = 0;
        }
    }
    // -------------------------------

    public function mostrarInfo() {
        $rutaImagen = "img/" . $this->elemento . ".png";

        return "
        <article class='ficha-pokemon'>
            <header>
                <img src='{$rutaImagen}' alt='{$this->elemento}' class='icono-tipo'>
                <h3>{$this->nombre}</h3>
                <mark>{$this->elemento}</mark>
            </header>
            <section class='stats'>
                <ul>
                    <li>HP: {$this->stats['hp']}</li>
                    <li>AT: {$this->stats['at']}</li>
                    <li>DF: {$this->stats['def']}</li>
                </ul>
            </section>
            <footer>
                <strong>Movs:</strong> " . implode(", ", $this->movimientos) . "
            </footer>
        </article>";
    }
}
?>