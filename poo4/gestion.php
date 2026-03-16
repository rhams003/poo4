<?php
require_once "Pokemon.php";
require_once "Entrenadora.php";
session_start();

if (!isset($_SESSION["pokemons"])) $_SESSION["pokemons"] = [];
if (!isset($_SESSION["entrenadoras"])) $_SESSION["entrenadoras"] = [];

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST["atacar"], $_POST["pokemon"])) {
        $idPokemon = $_POST["pokemon"];
        if (isset($_SESSION["pokemons"][$idPokemon])) {
            $mensaje = $_SESSION["pokemons"][$idPokemon]->atacar();
        }
    }

    if (isset($_POST["evolucionar"], $_POST["pokemon"])) {
        $idPokemon = $_POST["pokemon"];
        if (isset($_SESSION["pokemons"][$idPokemon])) {
            $mensaje = $_SESSION["pokemons"][$idPokemon]->evolucionar();
        }
    }

    if (isset($_POST["mostrarPokemon"], $_POST["pokemon"])) {
        $idPokemon = $_POST["pokemon"];
        if (isset($_SESSION["pokemons"][$idPokemon])) {
            $mensaje = $_SESSION["pokemons"][$idPokemon]->mostrarInfo();
        }
    }

    if (isset($_POST["mostrarEntrenadora"], $_POST["entrenadora"])) {
        $idEntrenadora = $_POST["entrenadora"];
        if (isset($_SESSION["entrenadoras"][$idEntrenadora])) {
            $mensaje = $_SESSION["entrenadoras"][$idEntrenadora]->mostrarInfo();
        }
    }

    if (isset($_POST["cazar"], $_POST["entrenadora"], $_POST["pokemon"])) {
        $idEntrenadora = $_POST["entrenadora"];
        $idPokemon = $_POST["pokemon"];
        if (isset($_SESSION["entrenadoras"][$idEntrenadora]) && isset($_SESSION["pokemons"][$idPokemon])) {
            $mensaje = $_SESSION["entrenadoras"][$idEntrenadora]->cazarPokemon($_SESSION["pokemons"][$idPokemon]);
        }
    }

    if (isset($_POST["vaciar"])) {
        $_SESSION["pokemons"] = [];
        $_SESSION["entrenadoras"] = [];
        $mensaje = "<p>Se han borrado los datos del PC de Bill.</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión Pokémon</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body class="fondoprincipal">
    <main class="contenedor-principal">
        <h1 class="titulo">Gestión de Equipo</h1>
        <a href="index.php" class="boton-volver">VOLVER</a>

        <form method="POST" action="">
            <fieldset class="grupo-campos">
                <legend class="leyenda-campos">Selección</legend>
                <label class="etiqueta">Pokemon:
                    <select name="pokemon" class="campo-entrada">
                       <?php
                        foreach ($_SESSION["pokemons"] as $idPokemon => $pokemon) {
                            echo "<option value='$idPokemon'>" . $pokemon->getNombre() . "</option>";
                        }
                        ?>
                    </select>
                </label>

                <label class="etiqueta">Entrenador/a:
                    <select name="entrenadora" class="campo-entrada">
                        <?php
                        foreach ($_SESSION["entrenadoras"] as $idEntrenadora => $entrenadora) {
                            echo "<option value='$idEntrenadora'>" . $entrenadora->getNombre() . "</option>";
                        }
                        ?>
                    </select>
                </label>
            </fieldset>

            <fieldset class="grupo-campos">
                <legend class="leyenda-campos">Acciones (Requieren Selección)</legend>
                <button type="submit" name="atacar" class="btn-accion">Atacar</button>
                <button type="submit" name="evolucionar" class="btn-accion">Evolucionar</button>
                <button type="submit" name="mostrarPokemon" class="btn-accion">Info Pokémon</button>
                <button type="submit" name="mostrarEntrenadora" class="btn-accion">Info Entrenador/a</button>
                <button type="submit" name="cazar" class="btn-accion">Cazar Pokémon</button>
            </fieldset>
            
            <fieldset class="grupo-campos">
                <legend class="leyenda-campos">Sistema</legend>
                <button type="submit" name="vaciar" class="btn-accion">Vaciar Cajas del PC</button>
            </fieldset>
        </form>

        <section class="lista">
            <h2 class="titulo">Registro de Actividad</h2>
            <?php 
                if (!empty($mensaje)) {
                    echo $mensaje;
                } else {
                    echo "<p>Esperando acción...</p>";
                }
            ?>
        </section>

        <nav class="menu-navegacion">
            <a href="crearpokemon.php" class="enlace-navegacion">Laboratorio Pokémon</a>  
            <a href="crearentrenadora.php" class="enlace-navegacion">Registro Entrenadores</a>
        </nav>
    </main>
</body>
</html>