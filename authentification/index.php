<?php

/**
 * 
 * @author Juan Garcia Toril
 */

//logica negocio
session_start();
if (!isset($_SESSION['perfil'])) {
    $_SESSION['perfil'] = 'invitado';
    $_SESSION['user'] = [];
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio autentificacion</title>
</head>

<body>
    <div class="cabecera">
        <h1>Ejercicio de autentificación</h1>
    </div>
    <div>
        <?php
        if ($_SESSION['perfil'] == 'invitado') {
            include('includes/login_form.html');
            echo ('No tienes cuenta!!! <a href="registro.php">Registrate</a>');
        } else {
            echo ('Estas como ' . $_SESSION['perfil']);
            echo ('<a href="salir.php">Salir</a>');
        }
        ?>
    </div>
    <div>
        <?php
        if ($_SESSION['perfil'] == 'invitado') {
            include('includes/login_form.html');
            echo ('No tienes cuenta!!! <a href="registro.php">Registrate</a>');
        } else {
            echo ('Estas como ' . $_SESSION['perfil']);
            echo ('<a href="salir.php">Salir</a>');
        }
        ?>
    </div>
    <div></div>
</body>

</html>l