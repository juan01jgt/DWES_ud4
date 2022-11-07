<?php
require_once 'Contador.php';

echo 'Creo contador1';
$contador1= new Contador();
echo '<br>';
echo 'Incremento contador1';
$contador1->incremento();
echo '<br>';
echo 'Incremento contador1';
$contador1->incremento();
echo '<br>';
echo 'Muestro contador1: ';
echo $contador1->mostrar();
echo '<br>';
echo '<br>';

echo 'Creo contador2';
$contador2= new Contador();
echo '<br>';
echo 'Incremento contador2';
$contador2->incremento();
echo '<br>';
echo 'Muestro contador2: ';
echo $contador2->mostrar();
echo '<br>';
echo '<br>';

echo 'Creo contador3';
$contador3= new Contador();
echo '<br>';
echo 'Incremento contador3';
$contador3->incremento();
echo '<br>';
echo 'Incremento contador3';
$contador3->incremento();
echo '<br>';
echo 'Incremento contador3';
$contador3->incremento();
echo '<br>';
echo 'Incremento contador3';
$contador3->incremento();
echo '<br>';
echo 'Muestro contador3: ';
echo $contador3->mostrar();
echo '<br>';
echo '<br>';

echo 'Total de contadores: ';
echo $contador1->contadores();
echo '<br>';
echo '<br>';

echo 'Creo contador4 con valor 5';
$contador4= new Contador();
$contador4->asigna(5);
echo '<br>';
echo 'Incremento contador4';
$contador4->incremento();
echo '<br>';
echo 'Muestro contador4: ';
echo $contador4->mostrar();
echo '<br>';
echo '<br>';

echo 'Total de contadores: ';
echo $contador1->contadores();
echo '<br>';
echo '<br>';

echo "</br><a target='_blank' href='https://github.com/juan01jgt/DWES_ud4/tree/main/Contadorinstanciado'>Código</a>";

?>