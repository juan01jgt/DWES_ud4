<?php
session_start();
if (!isset($_SESSION['inicioTime'])) {
    $_SESSION['inicioTime'] = time();
    $_SESSION['cont'] = 0;
}
$tiempo_maximo = $_SESSION["inicioTime"] + 5;
echo "Contador: " . $_SESSION['cont']++;
if (time() > $tiempo_maximo) {
    $_SESSION['cont'] = 0;
    $_SESSION['inicioTime'] = time();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

</body>

</html>