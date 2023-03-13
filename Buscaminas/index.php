<?php

/**
 * @author Juan Garcia
 */
include_once("config/config.php");
include_once("lib/functions.php");

session_start();
if (!isset($_SESSION['tabla'])) {
    $_SESSION['tabla']= creartablero();
    $_SESSION['visible'] = crearvisible();
    $_SESSION['cont'] = 0;
}

if (isset($_POST['reiniciar'])) {
    header("Location: cerrarsesion.php");
    $_SESSION['tabla'] = creartablero();
}

if (isset($_GET['f']) && isset($_GET['c'])) {
    clickCasilla($_GET['f'],$_GET['c']);
}
mostrartabla();
echo '</br>';
mostrarvisible();
?>

<!-- <!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscaminas</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <table>
            <?php
            // mostrartabla($tabla);
            // mostrartabla2($tabla);
            ?>
        </table>
        <input type="submit" name="reiniciar" value="REINICIAR">
    </form>
</body>
</html> -->