<?php
//・ 1 行目には盤面の行数を表す整数 H , 盤面の列数を表す整数 W , 与えられる座標の数を表す整数 N が与えられます。
//・ 続く H 行のうち i 行目 (0 ≦ i < H) には、盤面の i 行目の文字をまとめた文字列 S_i が与えられ、 S_i の j 文字目は、盤面の i 行目の j 列目に書かれている文字を表します。(0 ≦ j < W)
//・ 続く N 行 には、 文字を書き換えるマスの y , x 座標が与えられます。(1 ≦ i ≦ N)

    $input_line = explode(" ", trim(fgets(STDIN)));
    $H = $input_line[0];
    $W = $input_line[1];
    $N = $input_line[2];
    
    $ban = array();
    for($i=0; $i<$H; $i++)
    {
        $input_line = str_split(trim(fgets(STDIN)));
        
        for($j=0;$j<$W; $j++)
        {
            $ban[$i][$j] = $input_line[$j];
        }
    }
    
    for($i=0; $i<$N; $i++)
    {
        $s = explode(" ", trim(fgets(STDIN)));
        $ban[$s[0]][$s[1]] = "#";
    }
    
    $ans = "";
    for($i=0; $i<$H; $i++)
    {
        for($j=0;$j<$W; $j++)
        {
            $ans .= $ban[$i][$j];
        }
        $ans .= "\n";
    }
    
    echo $ans;
    
    
    //echo $ban[$H-1][$W-1];
    
?>