<?php

/**
 * @author Juan Garcia
 */
include_once("config/config.php");
include_once("lib/functions.php");

session_start();

if (isset($_COOKIE['victorias'])) {
    $victorias = $_COOKIE['victorias'];
}else{
    $victorias = 0;
    setcookie("victorias",0,time()+3600);
}
if (!isset($_SESSION['arraytotal'])) {
    $_SESSION['arraytotal'] = [];
    $_SESSION['arrayj'] = [];
    $_SESSION['arraym'] = [];
    $_SESSION['sumaj'] = 0;
    $_SESSION['sumam'] = 0;
    $_SESSION['plantaj'] = false;
    $_SESSION['plantam'] = false;
    $_SESSION['dificultad'] = numeroaleatorio(7);
}

if (isset($_POST['iniciarvic'])) {
    setcookie("victorias",0,time()+3600);
    header("Location: cerrarsesion.php");
}

if (isset($_POST['reiniciar'])) {
    $_SESSION['arraytotal'] = [];
    $_SESSION['arrayj'] = [];
    $_SESSION['arraym'] = [];
    $_SESSION['sumaj'] = 0;
    $_SESSION['sumam'] = 0;
    $_SESSION['plantaj'] = false;
    $_SESSION['plantam'] = false;
    $_SESSION['dificultad'] = numeroaleatorio(7);
}

if (isset($_POST['nuevacarta'])) {
    $num = generarcarta();
    array_push($_SESSION['arraytotal'],$num);
    array_push($_SESSION['arrayj'],$num);
    $_SESSION['sumaj'] += puntosdecarta($num);

    if (!$_SESSION['plantam']) {
        $num = generarcarta();
        array_push($_SESSION['arraytotal'],$num);
        array_push($_SESSION['arraym'],$num);
        $_SESSION['sumam'] += puntosdecarta($num);
        if ($_SESSION['sumam'] >= $_SESSION['dificultad']) {
            $_SESSION['plantam']=true;
        }
    }
}

if (isset($_POST['plantar'])) {
    $plantado=true;
    $mensaje = "Has perdido, vuelve a intentarlo";
    $_SESSION['plantaj'] = true;
    if (!$_SESSION['plantam']) {
        do {
            $num = generarcarta();
            array_push($_SESSION['arraytotal'],$num);
            array_push($_SESSION['arraym'],$num);
            $_SESSION['sumam'] += puntosdecarta($num);
            if ($_SESSION['sumam'] >= $_SESSION['dificultad']) {
                $_SESSION['plantam']=true;
            }
        } while (!$_SESSION['plantam']);
    }

    if ($_SESSION['sumaj']<=7.5) {
        if ($_SESSION['sumam']<=7.5) {
            if ($_SESSION['sumaj']>$_SESSION['sumam']) {
                $victorias++;
                setcookie("victorias",$victorias,time()+3600);
                $mensaje = "Has Ganado, felicidades!!";
            }
        }
        else{
            $victorias++;
            setcookie("victorias",$victorias,time()+3600);
            $mensaje = "Has Ganado, felicidades!!";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siete y media</title>
</head>
<body>
    <h1>Las 7 y 1/2</h1>
    <h2>Numero de victorias: <?php echo $victorias?></h2>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <input type="submit" name="iniciarvic" value="INICIAR VICTORIAS">
        <input type="submit" name="reiniciar" value="REINICIAR">
        <?php
            if (!isset($plantado)) {
                if ($_SESSION['sumaj']<=7.5) {
                    echo('<input type="submit" name="nuevacarta" value="PEDIR CARTA">');
                }
                if (sizeof($_SESSION['arrayj'])>=1) {
                    echo('<input type="submit" name="plantar" value="PLANTAR">');
                }
            }
        ?>
        
        <h3>Jugador</h3>
        <div>
            <?php
            foreach ($_SESSION['arrayj'] as $key => $value) {
                echo('<img src="./img/'.$value.'.jpg">');
            }
            echo('<h1>'.$_SESSION['sumaj'].'</h1>');
            ?>
        </div>
        <h3>Maquina</h3>
        <div>
        <?php
            if (!isset($plantado)) {
                foreach ($_SESSION['arraym'] as $key => $value) {
                    echo('<img src="./img/reverso.jpg">');
                }
            }
            else{
                foreach ($_SESSION['arraym'] as $key => $value) {
                    echo('<img src="./img/'.$value.'.jpg">');
                }
                echo('<h1>'.$_SESSION['sumam'].'</h1>');
            }
            
            ?>
        </div>
        <div>
            <?php
                if (isset($mensaje)) {
                    echo('<h1>'.$mensaje.'</h1>');
                }
            ?>
        </div>
    </form>
</body>
</html>