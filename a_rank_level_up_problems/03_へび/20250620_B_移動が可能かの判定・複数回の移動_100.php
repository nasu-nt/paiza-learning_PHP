<?php
// H W sy sx N     
// S_0     
// ...     
// S_(H-1)     
// d_1     
// ...     
// d_N
// 
// ・ 1 行目にはマップの行数を表す整数 H , マップの列数を表す整数 W , 現在の y, x 座標を表す sy sx , 移動する回数 N が与えられます。
// ・ 続く H 行のうち i 行目 (0 ≦ i < H) には、マップの i 行目の文字をまとめた文字列 S_i が与えられ、 S_i の j 文字目は、マップの i 行目の j 列目に書かれている文字を表します。(0 ≦ j < W)
// ・ 続く N 行のうち i 行目 (1 ≦ i ≦ N) には、i 回目の移動の向き d_i が与えられます。
// 各移動が可能である場合、移動後の y , x 座標を出力してください。
// 移動が可能でない場合、移動後の座標を出力する代わりに "Stop" を出力して、以降の移動を打ち切ってください。

    $line = explode(" ", trim(fgets(STDIN)));
    $H = $line[0]; // 縦(>=0)
    $W = $line[1]; // 横(>=0)
    $sy = $line[2];
    $sx = $line[3];
    $N = $line[4]; // 移動する回数
    
    $S = array();
    for($y=0; $y<$H; $y++)
    {
        $line = str_split(trim(fgets(STDIN)));
        for($x=0; $x<$W; $x++)
        {
            $S[$y][$x] = $line[$x];
            //echo $S[$y][$x];
        }//echo "\n";
    }
    
    $d = array();
    for($i=1; $i<=$N; $i++)
    {
        $d[$i] = trim(fgets(STDIN));
    }
    
    $muki = "N"; // default
    $ans = "";
    for($i=1; $i<=$N; $i++)
    {
        if($d[$i] == "L")
        {
            switch($muki)
            {
                case "N":
                    $sx--;
                    $muki = "W";
                    break;
                case "S":
                    $sx++;
                    $muki = "E";
                    break; 
                case "E":
                    $sy--;
                    $muki = "N";
                    break; 
                case "W":
                    $sy++;
                    $muki = "S";
                    break; 
            }
        }
        else //"R"
        {
            switch($muki)
            {
                case "N":
                    $sx++;
                    $muki = "E";
                    break;
                case "S":
                    $sx--;
                    $muki = "W";
                    break; 
                case "E":
                    $sy++;
                    $muki = "S";
                    break; 
                case "W":
                    $sy--;
                    $muki = "N";
                    break; 
            } 
        }
    
        if($S[$sy][$sx] == "#")
        {
            $ans .= "Stop";
            break;
        }
        else // "."
        {
            $ans .= $sy. " ". $sx. "\n";
        }
        
    }
    
    
    echo $ans;
?>