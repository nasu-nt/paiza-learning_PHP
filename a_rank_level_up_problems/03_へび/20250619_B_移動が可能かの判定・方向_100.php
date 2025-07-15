<?php
// マップの行数 H と列数 W , 障害物を '#' , 移動可能な場所を '.' で表した H 行 W 列のマップ S_1 ... S_H が与えられます。
// 続けて現在の座標 sy , sx , 現在向いている方角 d , １マス移動する方向 m が与えられるので、移動が可能かどうかを判定してください。
// 
// 移動が可能であるということは、以下の図の通り
// 「移動先が障害物でない　かつ　移動先がマップの範囲外でない」
// ということを意味します。
// 
// なお、マスの座標系は左上端のマスの座標を ( y , x ) = ( 0 , 0 ) とし、
// 下方向が y 座標の正の向き、右方向が x 座標の正の向きとします。
// 
// H W sy sx d m      
// S_0     
// ...     
// S_(H-1)

    $line = explode(" ", trim(fgets(STDIN)));
    $H = $line[0]; // 行数y_max
    $W = $line[1]; // 列数x_max
    $sy = $line[2]; // 現在の座標
    $sx = $line[3]; // 現在の座標
    $d = $line[4]; //現在向いている方角 N S E W
    $m = $line[5]; //移動する方向 L R 
    
    $S = array(); // 全体マップ
    for($i=0; $i<$H; $i++)
    {
        $line = str_split(trim(fgets(STDIN)));
        for($j=0; $j<$W; $j++)
        {
            $S[$i][$j] = $line[$j];
            //echo $S[$i][$j];
        } //echo "\n";
    }
    
    if($m == "L")
    {
        switch ($d)
        {
            case "N":
                $sx--;
                break;
            case "S":
                $sx++;
                break;
            case "E":
                $sy--;
                break;
            case "W":
                $sy++;
                break;
            default:
                break;
        }
    }else {
        // ($m == "R")
        switch ($d)
        {
            case "N":
                $sx++;
                break;
            case "S":
                $sx--;
                break;
            case "E":
                $sy++;
                break;
            case "W":
                $sy--;
                break;
            default:
                break;
        }
    }
    
    $ans = "Yes";
    if(!isset($S[$sy][$sx])||($S[$sy][$sx] == "#"))
    {
        $ans = "No";
    }
    
    echo $ans;

?>