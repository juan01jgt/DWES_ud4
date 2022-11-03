<?php
/**
 * @author Juan Garcia
 */

$file = fopen("data/poema.txt","r");
$file1 = fopen("data/poemaMayuscula.txt","w");

// while (!feof($file)) {
//     $linea = fgets($file). "<br>";
//     echo $linea;
// };
// fclose($file);

while (!feof($file)) {
    $linea = fgets($file);
    fwrite($file1,strtoupper($linea));
};
fclose($file);
fclose($file1);
?>