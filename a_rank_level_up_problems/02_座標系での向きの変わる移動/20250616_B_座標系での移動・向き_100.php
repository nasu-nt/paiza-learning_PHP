<?php
//Y X D       
//d
    $input_line = explode(" ", trim(fgets(STDIN)));
    $Y = $input_line[0];
    $X = $input_line[1];
    $D = $input_line[2];
    
    $d = trim(fgets(STDIN));

//・ D は、N, S, E, W のいずれかでそれぞれ 北・南・東・西 を意味する。
//・ d は、L, R のいずれかでそれぞれ 左・右 に １ マス進むことを表す。
    switch($D)
    {
        case "N":
            if($d == "L")
            {
                $X--;
                break;
            }else {
                $X++;
                break;
            }
        case "S":
            if($d == "L")
            {
                $X++;
                break;
            }else {
                $X--;
                break;
            }
        case "E":
            if($d == "L")
            {
                $Y--;
                break;
            }else {
                $Y++;
                break;
            }
        case "W":
            if($d == "L")
            {
                $Y++;
                break;
            }else {
                $Y--;
                break;
            }
    }
    
    echo $Y." ".$X;
?>