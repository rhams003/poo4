<?php
require_once 'Entrenadora.php';
session_start();

if (!isset($_SESSION["entrenadoras"])) $_SESSION["entrenadoras"] = [];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nombre"])) {
    $nuevo = new Entrenadora($_POST["nombre"], $_POST["genero"], $_POST["pelo"], $_POST["piel"]);
    $_SESSION["entrenadoras"][] = $nuevo;
    $msg = "Entrenador creado.";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Entrenadora</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body class="fondoprincipal">
    <main class="contenedor-principal">
        <section class="formulario">
            <h1 class="titulo">Nuevo Entrenador</h1>
            <a href="index.php" class="boton-volver">VOLVER</a>
            <form method="POST">
                <label class="etiqueta">Nombre: <input type="text" name="nombre" class="campo-entrada" required></label>
                
                <fieldset class="contenedor-genero">
                    <legend class="leyenda-campos">Género</legend>
                    <label class="opcion-genero">
                        <input type="radio" name="genero" value="Chico" checked> Chico
                        <img src="img/chicopkmn.png" alt="Chico">
                    </label>
                    <label class="opcion-genero">
                        <input type="radio" name="genero" value="Chica"> Chica
                        <img src="img/chica.png" alt="Chica">
                    </label>
                </fieldset>

                <label class="etiqueta">Pelo: 
                    <select name="pelo" class="campo-entrada">
                        <option>Castaño</option><option>Rubio</option><option>Negro</option><option>Azul</option>
                    </select>
                </label>

                <label class="etiqueta">Piel: 
                    <select name="piel" class="campo-entrada">
                        <option>Clara</option><option>Bronceada</option><option>Oscura</option>
                    </select>
                </label>

                <button type="submit" class="btn-accion" name="boton-registro">Registrar</button>
            </form>
        </section>

        <section class="lista">
            <h2 class="titulo">Registrados</h2>
            <?php 
            if(isset($_POST['boton-registro'])){
                foreach ($_SESSION["entrenadoras"] as $value) echo $value->mostrarInfo(); 
                echo "<p>¡Hola! ,aquí empieza tu aventura</p>";
                echo "<img src='img/profesorra.gif' width='150' alt='Profesora'>";
                }else{
                    echo "";
                }
            ?>
        </section>

        <nav class="menu-navegacion">
            <a href="crearpokemon.php" class="enlace-navegacion">Ir a Pokémon</a>
        </nav>
    </main>
</body>
</html>