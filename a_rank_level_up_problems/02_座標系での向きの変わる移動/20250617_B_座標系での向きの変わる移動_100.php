<?php
// 移動者ははじめ北を向いています。
// X Y N
$line = explode(" ", trim(fgets(STDIN)));
$X = $line[0];
$Y = $line[1];
$N = $line[2];

//N(デフォ)SEW
$muki = "N"; // 移動者ははじめ北を向いています。
$a = "";
for($i=1;$i<=$N;$i++)
{
    $d =trim(fgets(STDIN));
    if($d == "L")
    {
        switch($muki)
        {
            case "N":
                $X--;
                $muki = "W";
                break;
            case "S":
                $X++;
                $muki = "E";
                break;
            case "E":
                $Y--;
                $muki = "N";
                break;
            case "W":
                $Y++;
                $muki = "S";
                break;
        }
    }
    else {
     //d_N = "R"
     switch($muki)
        {
            case "N":
                $X++;
                $muki = "E";
                break;
            case "S":
                $X--;
                $muki = "W";
                break;
            case "E":
                $Y++;
                $muki = "S";
                break;
            case "W":
                $Y--;
                $muki = "N";
                break;
        }
    }
    $a .= $X. " ". $Y. "\n";
}


echo $a;
