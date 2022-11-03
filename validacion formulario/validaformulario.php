<?php
/**
 * @author Juan Garcia Toril
 */
$procesaformulario=false;
if (isset($_POST["enviar"])) {
    $procesaformulario=true;
}
if ($procesaformulario) {
    foreach ($_POST as $key => $value) {
        switch ($key) {
            case 'nombre':
                break;
            case 'email':
                break;
            case 'url':
                break;
            case 'comentario':
                break;
            case 'genero':
                break;
            case 'opcion':
                break;
            case 'coche':
                break;
            case 'moto':
                break;
            case 'bicicleta':
                break;
            default:
                break;
        }
    }
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>
    <form action="validaformulario.php" method="post">

        <p>Nombre</p><input name="nombre"></input>

        <p>Email</p><input name="email"></input>
        <p>Url</p><input name="url"></input>
        <p>Comentario</p><textarea name="comentario"></textarea>
        <p>Genero</p>
        <input type="radio" id="hombre" name="genero" value="hombre">
        <label for="hombre">Hombre</label><br>
        <input type="radio" id="mujer" name="genero" value="mujer">
        <label for="mujer">Mujer</label><br>
        <input type="radio" id="otro" name="genero" value="otro">
        <label for="otro">Otro</label>
        <p>Seleciona una opcion</p>
        <select name="opcion">
            <option value="opcion1">Opcion 1</option>
            <option value="opcion2">Opcion 2</option>
            <option value="opcion3">Opcion 3</option>
        </select>
        <p>Selecciona un vehiculo</p>
        <input type="checkbox" id="coche" name="coche" value="coche">
        <label for="coche">Coche</label><br>
        <input type="checkbox" id="moto" name="moto" value="moto">
        <label for="moto">Moto</label><br>
        <input type="checkbox" id="bicicleta" name="bicicleta" value="bicicleta">
        <label for="bicicleta">Bicicleta</label>
        <br>
        <input type="submit" name="enviar" value="enviar">
    </form>

</body>

</html>