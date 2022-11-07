<?php

/**
 * @author Juan Garcia
 */

include("config/config.php");

if (isset($_POST['enviar'])) {

    $tmp = explode('.', $_FILES['file']['name']);
    $ext = end($tmp);

    if (($_FILES['file']['size'] < MAXSIZE) &&
        in_array($_FILES['file']['type'], $formatospermitidos) &&
        in_array($ext, $extensiones)
    ) {
        print_r($_FILES['file']);
        if ($_FILES['file']['error'] > 0) {
            echo "Return Error";
        } else {
            $filename = $_FILES['file']['name'];
            $filename = uniqid() . '.' . pathinfo($filename, PATHINFO_EXTENSION);
            move_uploaded_file($_FILES["file"]["tmp_name"], DIRUPLOAD . $filename);
        }
    };
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuarios</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <label for="file">Subir archivo: </label>
        <br>
        <input type="file" name="file" id="fileUpload">
        <br>
        <input type="submit" name="enviar" value="enviar">
    </form>
</body>

</html>