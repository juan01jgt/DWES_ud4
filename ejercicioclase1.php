<?php
    if (isset($_COOKIE['nombre'])) {
        echo "La cookie existe con el valor: ".$_COOKIE['nombre'];
    }
    else{
        setcookie('nombre','Juan',5);
        echo "cookie creada";
    }
?>