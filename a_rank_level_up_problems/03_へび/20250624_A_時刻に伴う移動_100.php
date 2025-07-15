<?php
// H W sy sx N        
// S_0     
// ...     
// S_(H-1)     
// t_1 d_1     
// ...     
// t_N d_N
// 
// ・ 1 行目にはマップの行数を表す整数 H , マップの列数を表す整数 W , 現在の y, x 座標を表す sy sx , 方向転換する回数 N が与えられます。
// ・ 続く H 行のうち i 行目 (0 ≦ i < H) には、マップの i 行目の文字をまとめた文字列 S_i が与えられ、 S_i の j 文字目は、マップの i 行目の j 列目に書かれている文字を表します。(0 ≦ j < W)
// ・ 続く N 行のうち i 行目 (1 ≦ i ≦ N) には、i 回目の方向転換をおこなう時刻 t_i と方向転換の向き d_i が与えられます。
// 
// マップの行数 H と列数 W , 障害物を '#' で移動可能な場所を '.' で表した H 行 W 列のマップ S_1 ... S_H , 現在の座標 sy , sx , 方向転換の回数 N が与えられます。
// 続けて N 回の方向転換する時刻 t_1 ... t_N , 転換する向き d_1 ... d_N が与えられます。
// 
// へびははじめ、北を向いています。
// 
// 時刻 0 から 99 までの間、へびは各時刻に次の行動を最大 100 回とります。
// 
// ・ 方向転換をおこなう時刻の場合、指定の向きに方向転換したのち 1 マス身体を伸ばす。
// ・ そうでない時は移動が可能な場合に限り、今向いている方向に 1 マス身体を伸ばす。

    $input_line = explode(" ", trim(fgets(STDIN)));
    $H = $input_line[0];    // マップの行数(y)
    $W = $input_line[1];    //  マップの列数(x)
    $sy = $input_line[2];   // 現在の y座標
    $sx = $input_line[3];   // 現在の x 座標
    $N = $input_line[4];    // 方向転換する回数
    
    $map = [];
    for($i=0; $i<$H; $i++)
    {
        $input_line = str_split(trim(fgets(STDIN)));
        for($j=0; $j<$W; $j++)
        {
            $map[$i][$j] = $input_line[$j];
            //echo $map[$i][$j];
        }
        //echo "\n";
    }
    
    $t = [];    // 方向転換をおこなう時刻 
    $d = [];    // 方向転換の向き(L. R)
    for($i=0; $i<$N; $i++)
    {
        $input_line = explode(" ", trim(fgets(STDIN)));
        $t[] = $input_line[0];
        $d[] = $input_line[1];
    }
    // echo $t[0]. " ". $t[$N-1]. "\n". $d[0]. " ". $d[$N-1];
    
    $dir = "N";     // 最初の向き
    $index = 0;     // <= $N
    for($i=0; $i<=99; $i++)
    {
        if(in_array((string)$i, $t, true))
        {
            // 方向転換をおこなう時刻の場合、指定の向きに方向転換したのち 1 マス身体を伸ばす
            list($y, $x, $dir) = kaiten($sy, $sx, $dir, $d[$index]);

            if(is_stop($map, $y, $x))
            {
                echo "Stop\n";
                break;
            }
            
            list($sy, $sx) = [$y, $x];
            echo $sy. " ". $sx. "\n";
            
            $index++;
        }
        else
        {
            // そうでない時は移動が可能な場合に限り、今向いている方向に 1 マス身体を伸ばす
            list($y, $x, $dir) = kaiten($sy, $sx, $dir);
            
            if(is_stop($map, $y, $x))
            {
                echo "Stop\n";
                break;
            }
            
            list($sy, $sx) = [$y, $x];
            echo $sy. " ". $sx. "\n";
        }
    }
    
    
function kaiten($sy, $sx, $dir, $d=null)
{
    if(is_null($d))
    {
        switch($dir)
        {
            case "N":
                $sy--;  break;
            case "S":
                $sy++;  break;
            case "E":
                $sx++;  break;
            case "W":
                $sx--;  break;           
        }
    }
    elseif($d == "L")
    {
        switch($dir)
        {
            case "N":
                $sx--;  $dir="W";  break;
            case "S":
                $sx++;  $dir="E";  break;
            case "E":
                $sy--;  $dir="N";  break;
            case "W":
                $sy++;  $dir="S";  break;           
        }
    }
    else    // "R"
    {
        switch($dir)
        {
            case "N":
                $sx++;  $dir="E";   break;
            case "S":
                $sx--;  $dir="W";  break;
            case "E":
                $sy++;  $dir="S";  break;
            case "W":
                $sy--;  $dir="N";  break;      
        }
    }
    return [$sy, $sx, $dir];
}


function is_stop($map, $y, $x)
{
    if(!isset($map[$y][$x])||($map[$y][$x]=="#"))
    {
        return true;
    }
    return false;
}



?>