<?php
function creartablero()
{
    $tablero = [[], []];
    for ($i = 0; $i < FILAS; $i++) {
        for ($j = 0; $j < COLUMNAS; $j++) {
            $tablero[$i][$j] = 0;
        }
    }

    for ($i = 0; $i < MINAS; $i++) {
        $tablero = creaaleatorios($tablero);
    }

    for ($i = 0; $i < FILAS; $i++) {
        for ($j = 0; $j < COLUMNAS; $j++) {
            if ($tablero[$i][$j] == 9) {
                for ($f = max(0, $i - 1); $f < min(FILAS, $i + 2); $f++) {
                    for ($c = max(0, $j - 1); $c < min(COLUMNAS, $j + 2); $c++) {
                        if ($tablero[$f][$c] != 9) {
                            $tablero[$f][$c] += 1;
                        }
                    }
                }
            }
        }
    }
    return $tablero;
}

function crearvisible()
{
    $visible = array();
    for ($i = 0; $i < FILAS; $i++) {
        for ($j = 0; $j < COLUMNAS; $j++) {
            $visible[$i][$j] = '*';
        }
    }
    return $visible;
}

function creaaleatorios($arra)
{
    $f = mt_rand(0, FILAS - 1);
    $c = mt_rand(0, COLUMNAS - 1);
    if ($arra[$f][$c] != 9) {
        $arra[$f][$c] = 9;
    } else {
        $arra = creaaleatorios($arra);
    }
    return $arra;
}

function mostrartabla()
{
    for ($i = 0; $i < FILAS; $i++) {
        for ($j = 0; $j < COLUMNAS; $j++) {
            echo $_SESSION['tabla'][$i][$j];
        }
        echo '</br>';
    }
}
function mostrarvisible()
{
    for ($i = 0; $i < FILAS; $i++) {
        for ($j = 0; $j < COLUMNAS; $j++) {
            if ($_SESSION['visible'][$i][$j] == '*') {
                echo "<a href='index.php?f=$i&c=$j'>" . $_SESSION['visible'][$i][$j] . "</a>";
            } else {
                echo $_SESSION['tabla'][$i][$j];
            }
        }
        echo '</br>';
    }
}


function clickCasilla($f, $c)
{
    if (isset($_SESSION['visible'][$f][$c]) && $_SESSION['visible'][$f][$c]!='') {
        if ($_SESSION['tabla'][$f][$c] == 9) {
        } 
        elseif ($_SESSION['tabla'][$f][$c] != 0) {
            $_SESSION['visible'][$f][$c]=$_SESSION['tabla'][$f][$c];
        } 
        else {
            $_SESSION['visible'][$f][$c] = '';
            for ($f2 = max(0, $f - 1); $f2 < min(FILAS, $f + 2); $f2++) {
                for ($c2 = max(0, $c - 1); $c2 < min(COLUMNAS, $c + 2); $c2++) {
                    clickCasilla($f2, $c2);
                }
            }
        }
    }
}

// function comprobar($f,$c,$array){
//     if (isset($array[$f][$c])) {
//         if ($array[$f][$c]==9) {
//             return $array;
//         }
//         elseif($array[$f][$c]!=0){
//             return $array;
//         }
//         else {
//             $array[$f][$c]='';
//             $array=comprobar($f-1,$c-1,$array);
//             $array=comprobar($f-1,$c,$array);
//             $array=comprobar($f-1,$c+1,$array);
//             $array=comprobar($f,$c-1,$array);
//             $array=comprobar($f,$c+1,$array);
//             $array=comprobar($f+1,$c-1,$array);
//             $array=comprobar($f+1,$c,$array);
//             $array=comprobar($f+1,$c+1,$array);
//         }
//     }
//     return $array;
// }
