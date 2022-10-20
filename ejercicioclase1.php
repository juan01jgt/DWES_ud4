<?php
    if (isset($_POST['enviar'])) {
        if (isset($_POST['cookie'])) {
            if ($_POST['cookie']=="crear") {
                if (isset($_COOKIE['nombre'])) {
                    echo "La cookie ya existe con el valor: ".$_COOKIE['nombre'];
                }
                else{
                    setcookie("nombre","Juan",time()+60);
                    echo "La cookie ha sido creada";
                }
            }
            elseif ($_POST['cookie']=="eliminar"){
                if (isset($_COOKIE['nombre'])) {
                    setcookie("nombre","Juan",time()-3600);
                    echo "cookie eliminada";
                }
                else{
                    echo "La cookie ya esta eliminada";
                }
            }
            elseif ($_POST['cookie']=="valor"){
                if (isset($_COOKIE['nombre'])) {
                    echo "La cookie existe con el valor: ".$_COOKIE['nombre'];
                }
                else{
                    echo "La cookie no esta creada";
                }
            }
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
    <form action="ejercicioclase1.php" method="post">
        <label for="cookie">¿Que desea hacer?</label>
        <br>
        <input type="radio" name="cookie" value="crear">Crear cookie
        <br>
        <input type="radio" name="cookie" value="eliminar">Eliminar cookie
        <br>
        <input type="radio" name="cookie" value="valor">Ver valor de la cookie

        <br>
        <input type="submit" name="enviar" value="enviar">
    </form>
</body>
</html>