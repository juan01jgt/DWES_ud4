<?php
$acceso=false;
$usuario="";
$contra="";

if (isset($_COOKIE['usuario'])) {
        $usuario = $_COOKIE['usuario'];
        $contra = $_COOKIE['contra'];
}

if (isset($_POST['enviar'])) {
    if (isset($_POST['recordar'])) {
        if ($_POST['recordar']) {
            setcookie("usuario",$_POST['usuario'],time()+3600);
            setcookie("contra",$_POST['contra'],time()+3600);
        }
    }
    $usuario = $_POST['usuario'];
    $contra = $_POST['contra'];
    if ($usuario == "usuario" && $contra == "1234") {
        $acceso = true;
    }
}
else{
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creacion y eliminacion de cookies</title>
</head>
<body>
    <?php 
    if ($acceso) {
        echo "<h1>Bienvenido al sistema</h1>";
    }else{?>
    <form action="ejercicioclase3.php" method="post">
        <label for="usuario">Usuario: </label>
        <input type="text" name="usuario" value="<?php echo $usuario;?>">
        <br>
        <label for="usuario">Contraseña: </label>
        <input type="password" name="contra" value="<?php echo $contra;?>">

        <br>
        <input type="checkbox" name="recordar" value="true">Recordar

        <br>
        <input type="submit" name="enviar" value="enviar">
    </form>
    <?php
    }
    ?>
</body>
</html>