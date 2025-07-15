<?php
// H W sy sx N        
// S_0     
// ...     
// S_(H-1)     
// d_1 l_1     
// ...     
// d_N l_N
//
// マップの行数 H と列数 W , 障害物を '#' で移動可能な場所を '.' で表した H 行 W 列のマップ S_1 ... S_H , 
// 現在の座標 sy , sx , 移動の回数 N が与えられます。
// 続けて N 回の移動の向き d_1 ... d_N と移動するマス数 l_1...l_N が与えられます。
// はじめは北を向いています。
// 
// 各移動が可能である場合、スタート位置を含む移動の際に通ったマップのマスを '*' に変更してください。
// 移動が可能でない場合、障害物やマップの端までできる限り移動をして
// 通ったマップのマスを '*' に変更したのち、以降の移動を打ち切ってください。
// 移動が終了した時のマップを出力してください。

    $input_line = explode(" ", trim(fgets(STDIN)));
    $H = $input_line[0]; // マップの行数(y)
    $W = $input_line[1]; // マップの列数(w)
    $sy = $input_line[2];
    $sx = $input_line[3];
    $N = $input_line[4]; // 移動の回数
    
    $map = [];
    for($i=0; $i<$H; $i++)
    {
        $input_line = str_split(trim(fgets(STDIN)));
        for($j=0; $j<$W; $j++)
        {
            $map[$i][$j] = $input_line[$j];
            // echo $map[$i][$j];
        }
        // echo "\n"; 
    }
    
    // 初期位置のマスを*に変更
    if(!stopped($map, $sy, $sx))
    {
        $map[$sy][$sx] = "*";
    }
    
    $move = [];
    for($i=0; $i<$N; $i++)
    {
        $move[] = explode(" ", trim(fgets(STDIN)));
    }
    //echo $move[$N-1][0],$move[$N-1][1];
    
    $dir = "N"; // 最初は北を向いている
    foreach ($move as [$d, $l])
    {
        for($i=0; $i<$l; $i++)
        {
            list($y, $x) = susumu($dir, $d, $sy, $sx);
            
            if(stopped($map, $y, $x))
            {
                break 2;
            }
            
            list($sy, $sx) = [$y, $x];
            $map[$sy][$sx] = "*";
            
        }
        $dir = kaiten($dir, $d);
    }
    
    for($i=0; $i<$H; $i++)
    {
        for($j=0; $j<$W; $j++)
        {
            echo $map[$i][$j];
        }
        echo "\n"; 
    }
    
    
    
    
function stopped($map, $y, $x)
{
    if( (!isset($map[$y][$x])) || ($map[$y][$x] == "#") )
    {
        return true;
    }
    return false;
}

function susumu($dir, $d, $sy, $sx)
{
    if($d=="L")
    {
        switch($dir)
        {
            case "N":
                $sx--; break;
            case "S":
                $sx++; break;
            case "E":
                $sy--; break;
            case "W":
                $sy++; break;
        }
    }else // "R"
    {
        switch($dir)
        {
            case "N":
                $sx++; break;
            case "S":
                $sx--; break;
            case "E":
                $sy++; break;
            case "W":
                $sy--; break;
        }
    }
    return [$sy, $sx];
}

function kaiten($dir, $d)
{
    if($d=="L")
    {
        switch($dir)
        {
            case "N":
                $dir = "W"; break;
            case "S":
                $dir = "E"; break;
            case "E":
                $dir = "N"; break;
            case "W":
                $dir = "S"; break;
        }
    }else // "R"
    {
        switch($dir)
        {
            case "N":
                $dir = "E"; break;
            case "S":
                $dir = "W"; break;
            case "E":
                $dir = "S"; break;
            case "W":
                $dir = "N"; break;
        }
    }
    return $dir;
}
    
?>