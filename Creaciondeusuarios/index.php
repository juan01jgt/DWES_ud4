<?php

/**
 * @author Juan Garcia
 */

include("config/config.php");
$_POST['procesa'] = false;
$filename = "";
//print_r($_POST);

if (isset($_POST['enviar'])) {

    $tmp = explode('.', $_FILES['file']['name']);
    $ext = end($tmp);

    if (($_FILES['file']['size'] < MAXSIZE) &&
        in_array($_FILES['file']['type'], $formatospermitidos) &&
        in_array($ext, $extensiones)
    ) {
        // print_r($_FILES['file']['name']);
        if ($_FILES['file']['error'] > 0) {
            echo "Return Error";
        } else {
            $filename = $_FILES['file']['name'];
            $filename = uniqid() . '.' . pathinfo($filename, PATHINFO_EXTENSION);
            move_uploaded_file($_FILES["file"]["tmp_name"], DIRUPLOAD . $filename);

            $myfile = fopen(DIRUPLOAD . $filename, "r") or die("No se pudo abrir el archivo!");
            for ($i = 0; $i < 8; $i++) {
                fgets($myfile);
            }
            $cont = 0;
            while (!feof($myfile)) {
                $linea = fgets($myfile);
                if ($linea) {
                    $nombres[$cont] = $linea;
                }
                $cont++;
            }
            fclose($myfile);
            // print_r($nombres);
            $_POST['procesa'] = true;
        }
    };
}
if (isset($_POST['enviar2'])) {
    $alumnos = [];
    foreach ($_POST as $key => $value) {
        if ($value == "on") {
            array_push($alumnos, $key);
        }
    }

    $myfile = fopen(DIRUPLOAD . $_POST['archivo'], "r") or die("No se pudo abrir el archivo!");
    for ($i = 0; $i < 8; $i++) {
        fgets($myfile);
    }
    $cont = 0;
    while (!feof($myfile)) {
        $linea = fgets($myfile);
        if ($linea) {
            $nombres[$cont] = $linea;
        }
        $cont++;
    }
    fclose($myfile);
    foreach ($alumnos as $key => $value) {
        print_r($nombres[$value]);
    }
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
        <?php
        if ($_POST['procesa'] == false) {
        ?>
            <label for="file">Subir archivo: </label>
            <br>
            <input type="file" name="file" id="inputarchivo">
            <br>
            <input type="submit" name="enviar" value="enviar">
        <?php
        } else {
            echo '<label>Seleccionar Usuarios </label> <input type="hidden" name="archivo" value="' . $filename . '">
            <br>';
            foreach ($nombres as $key => $value) {
                echo '<input type="checkbox" name="' . $key . '" checked><label for="' . $key . '">' . $value . '</label>';
                echo '<br>';
            }
            echo '<input type="submit" name="enviar2" value="enviar">';
        }
        ?>

    </form>
</body>

</html>