<?php
require_once 'Pokemon.php';
session_start();

if (!isset($_SESSION["pokemons"])) $_SESSION["pokemons"] = [];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nombre"])) {
    $stats = [
        'hp' => $_POST["hp"], 'at' => $_POST["at"], 'def' => $_POST["def"],
        'at_esp' => $_POST["at_esp"], 'def_esp' => $_POST["def_esp"], 'vel' => $_POST["vel"]
    ];
    $movs = [$_POST["m1"], $_POST["m2"], $_POST["m3"], $_POST["m4"]];
    
    $_SESSION["pokemons"][] = new Pokemon($_POST["nombre"], $_POST["elemento"], $stats, $movs);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Pokémon</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body class="fondo1">
    <main class="contenedor-principal">
        <section class="formulario">
            <h1 class="titulo">Laboratorio Pokémon</h1>
            <a href="index.php" class="boton-volver">VOLVER</a>
            <form method="POST">
                <label class="etiqueta">Nombre: <input type="text" name="nombre" class="campo-entrada" required></label>
                
                <label class="etiqueta">Elemento:
                    <select name="elemento" class="campo-entrada">
                        <option>Acero</option><option>Agua</option><option>Bicho</option><option>Dragón</option>
                        <option>Eléctrico</option><option>Hada</option><option>Fuego</option><option>Hielo</option>
                        <option>Lucha</option><option>Normal</option><option>Planta</option><option>Psíquico</option>
                        <option>Roca</option><option>Siniestro</option><option>Tierra</option><option>Veneno</option>
                        <option>Volador</option><option>Fantasma</option>
                    </select>
                </label>

                <fieldset class="grupo-campos">
                    <legend class="leyenda-campos">Estadísticas (HP Máx: 255)</legend>
                    <label class="etiqueta">HP: <input type="number" name="hp" min="1" max="255" value="100" class="campo-entrada"></label>
                    <label class="etiqueta">ATK: <input type="number" name="at" value="50" class="campo-entrada"></label>
                    <label class="etiqueta">DEF: <input type="number" name="def" value="50" class="campo-entrada"></label>
                    <label class="etiqueta">SP.ATK: <input type="number" name="at_esp" value="50" class="campo-entrada"></label>
                    <label class="etiqueta">SP.DEF: <input type="number" name="def_esp" value="50" class="campo-entrada"></label>
                    <label class="etiqueta">VEL: <input type="number" name="vel" value="50" class="campo-entrada"></label>
                </fieldset>

                <fieldset class="grupo-campos">
                    <legend class="leyenda-campos">Movimientos (Máx 4)</legend>
                    <input type="text" name="m1" placeholder="Movimiento 1" class="campo-entrada">
                    <input type="text" name="m2" placeholder="Movimiento 2" class="campo-entrada">
                    <input type="text" name="m3" placeholder="Movimiento 3" class="campo-entrada">
                    <input type="text" name="m4" placeholder="Movimiento 4" class="campo-entrada">
                </fieldset>

                <button type="submit" class="btn-accion">Crear Pokémon</button>
            </form>
        </section>

        <section class="lista">
            <h2 class="titulo">Pokédex Actual</h2>
            <?php foreach ($_SESSION["pokemons"] as $p) echo $p->mostrarInfo(); ?>
        </section>

        <nav class="menu-navegacion">
            <a href="crearentrenadora.php" class="enlace-navegacion">Ir a Entrenadores</a>
        </nav>
    </main>
</body>
</html>