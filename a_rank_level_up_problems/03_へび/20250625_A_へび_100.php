<?php

// マップの行数 H と列数 W ,障害物を '#' で移動可能な場所を '.' で表した H 行 W 列のマップ S_1 ... S_H , 現在の座標 sy , sx , 方向転換の回数 N が与えられます。
// 続けて N 回の方向転換をおこなう時刻 t_1 ... t_N, 転換する向き d_1 ... d_N が与えられます。
// へびははじめは北を向いています。
// 
// へびは進む先のマスに自分の身体や障害物がない時に移動ができます。
// 時刻 0 から 99 までの間、へびは各時刻に次の行動を最大 100 回繰り返します。
// 
// ・ 方向転換をおこなう時刻の場合、指定の向きに方向転換したのち １ マス身体を伸ばす。
//    そうでない時は、今向いている方向に １ マス身体を伸ばす。
// 
// 時刻が 99 の時の行動を終えるか、移動できなくなった時、移動を終了します。
// 移動終了時にへびの体のあるマスを '*' にしたマップを出力してください。
// 
// 移動が可能であるということは、
// 「移動先のマスに自分の身体や障害物がない かつ 移動先がマップの範囲外でない」
// ということを意味します。
// 
// H W sy sx N        
// S_0     
// ...     
// S_(H-1)     
// t_1 d_1     
// ...     
// t_N d_N
// 
// 
// ・ 1 行目にはマップの行数を表す整数 H , マップの列数を表す整数 W , 現在の y, x 座標を表す sy sx , 移動する回数 N が与えられます。
// ・ 続く H 行のうち i 行目 (0 ≦ i < H) には、マップの i 行目の文字をまとめた文字列 S_i が与えられ、
// 　S_i の j 文字目は、マップの i 行目の j 列目に書かれている文字を表します。(0 ≦ j < W)
    
    list($H, $W, $sy, $sx, $N) = array_map('intval', explode(" ", trim(fgets(STDIN))));
    //echo $H. " ". $W. " ". $sy. " ". $sx. " ". $N. "\n";
    
    $map = [];
    for($i=0;$i<$H;$i++)
    {
        $s = str_split(trim(fgets(STDIN)));
        for($j=0;$j<$W;$j++)
        {
            $map[$i][$j] = $s[$j];
            //echo $map[$i][$j];
        }
        //echo "\n";
    }
    
    $t = [];
    $d = [];
    for($i=0;$i<$N;$i++)
    {
        $line = trim(fgets(STDIN));
        if($line=="")
        {
            continue;
        }
        
        $parts = explode(" ", $line);
        if(count($parts) !== 2)
        {
            continue;
        }
        
        $t[$i] = (int)$parts[0];
        $d[$i] = $parts[1];
    }
    //echo $t[0]. " ".$t[$N-1]. " ".$d[0]. " ".$d[$N-1]. "\n";
    
    $dir = "N"; // default
    $index = 0;
    $map[$sy][$sx] = "*";
    for($i=0;$i<100;$i++)
    {
        if(in_array($i, $t, true))
        {
            // 方向転換をおこなう時刻の場合、指定の向きに方向転換したのち １ マス身体を伸ばす。

            list($sy, $sx, $dir) = kaiten($sy, $sx, $dir, $d[$index]);
            
            if(is_stop($map, $sy, $sx))
            {
                break;
            }
            
            $map[$sy][$sx] = "*";
            $index++;
        }
        else 
        {
            // そうでない時は、今向いている方向に １ マス身体を伸ばす。
            
            list($sy, $sx, $dir) = kaiten($sy, $sx, $dir);
            
            if(is_stop($map, $sy, $sx))
            {
                break;
            }
            
            $map[$sy][$sx] = "*";
        }
    }
    
    for($i=0;$i<$H;$i++)
    {
        for($j=0;$j<$W;$j++)
        {
            echo $map[$i][$j];
        }
        echo "\n";
    }
    

function is_stop($map, $y, $x)
{
    // 移動が可能であるということは、
    // 「移動先のマスに自分の身体や障害物がない かつ 移動先がマップの範囲外でない」
    // ということを意味します。
    if(isset($map[$y][$x])&&($map[$y][$x]=="."))
    {
        return false;
    }
    return true;
}

function kaiten($sy, $sx, $dir, $d=null)
{
    if(is_null($d))
    {
        switch($dir)
        {
            case "N":
                $sy--; break;
            case "S":
                $sy++; break;
            case "E":
                $sx++; break;
            case "W":
                $sx--; break;
        }
    }
    elseif($d=="L")
    {
        switch($dir)
        {
            case "N":
                $sx--; $dir="W"; break;
            case "S":
                $sx++; $dir="E"; break;
            case "E":
                $sy--; $dir="N"; break;
            case "W":
                $sy++; $dir="S"; break;
        }
    }
    else // "R"
    {
        switch($dir)
        {
            case "N":
                $sx++; $dir="E"; break;
            case "S":
                $sx--; $dir="W"; break;
            case "E":
                $sy++; $dir="S"; break;
            case "W":
                $sy--; $dir="N"; break;
        }
    }
    return [$sy, $sx, $dir];
}

?>