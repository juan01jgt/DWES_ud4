<?php
/**
 * 
 * @author Juan Garcia Toril
 */

//logica negocio
session_start();
unset($_SESSION);
session_destroy();
header('Location:index.php');

?>