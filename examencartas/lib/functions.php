<?php
    function numeroaleatorio($val)
    {
        $ale = mt_rand(1, $val);
        return $ale;
    }

    function generarcarta(){
        do {
            $num = numeroaleatorio(CARTAS);
        } while (in_array($num,$_SESSION['arraytotal']));
        return $num;
    }

    function puntosdecarta($carta){
        if ($carta % 10 >=1 && $carta % 10 <=7) {
            return $carta % 10;
        }
        return 0.5;
    }
?>