<?php
// マップの行数 H と列数 W , 障害物を '#' で、移動可能な場所を '.' で表した H 行 W 列のマップ S_1 ... S_H が与えられます。
// 続けて現在の座標 sy , sx ,１マス移動する方角 m が与えられるので、移動が可能かどうかを判定してください。
// 「移動先が障害物でない　かつ　移動先がマップの範囲外でない」
// 
// なお、マスの座標系は左上端のマスの座標を ( y , x ) = ( 0 , 0 ) とし、
// 下方向が y 座標の正の向き、右方向が x 座標の正の向きとします。
// 
// H W sy sx m     
// S_0    
// ...     
// S_(H-1)
    $line = explode(" ",trim(fgets(STDIN)));
    $H = $line[0];
    $W = $line[1];
    $sy = $line[2];
    $sx = $line[3];
    $m = $line[4]; // N S E W
    
    $fuka = "#";
    $ka =".";
    
    $map = array();
    
    for($y=0;$y<$H;$y++)
    {
        $line = str_split(trim(fgets(STDIN)));
        
        for($x=0;$x<$W;$x++)
        {
            $map[$y][$x] = $line[$x];
        }
    }
    
    $next = "";
    switch($m)
    {
        case "N":
            $sy--;
            break;
        case "S":
            $sy++;
            break;
        case "E":
            $sx++;
            break;
        case "S":
            $sx--;
            break;
        default:
                break;
    }
    
    $ans = "Yes";
    if(($map[$sy][$sx]==$fuka)||($sy<0)||($sx<0))
    {
        $ans = "No";
    }
    
    echo $ans;
?>