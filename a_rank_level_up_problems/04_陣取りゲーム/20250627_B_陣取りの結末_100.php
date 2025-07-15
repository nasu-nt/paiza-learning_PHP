<?php
// H W     
// S_0     
// ...     
// S_(H-1)
// 
// 
// ・ 1行目では、盤面の行数 H , 列数 W が与えられます。
// ・ 続く H 行のうち i 行目 (0 ≦ i < H) には、
// 盤面の i 行目の文字をまとめた文字列 S_i が与えられ、S_i の j 文字目は、盤面の i 行目の j 列目に書かれている文字を表します。
// (0 ≦ j < W)

    list($H, $W) = array_map('intval', explode(" ", trim(fgets(STDIN))));
    //echo $H.$W."\n";
    
    $map = [];
    $sy = $sx = 0;
    for($i=0; $i<$H; $i++)
    {
        $line = trim(fgets(STDIN));
        $parts = str_split($line);
        for($j=0; $j<$W; $j++)
        {
            $map[$i][$j] = $parts[$j];
            if($map[$i][$j] == "*")
            {
                list($sy, $sx) = [$i, $j];
            }
           // echo $map[$i][$j];
        }
        //echo "\n";
    }
    
    $jinchi = [];
    $jinchi[0] = [$sy, $sx];
    $index = 1;
    
    $end_flg = false;
    
    while(!$end_flg)
    {
        list($map, $jinchi, $index, $end_flg) = jinchi($map, $jinchi, $index, $end_flg);
    }
    
    for($i=0; $i<$H; $i++)
    {
        for($j=0; $j<$W; $j++)
        {
            echo $map[$i][$j];
        }
        echo "\n";
    }
    
    
    
function jinchi($map, $jinchi, $index, $end_flg)
{
    $dy = [-1, 0, 1, 0];
    $dx = [0, 1, 0, -1];
    $idx = $index;
    for($i=0; $i<$index; $i++)
    {
        for($j=0; $j<4; $j++)
        {
            $y = $jinchi[$i][0] + $dy[$j];
            $x = $jinchi[$i][1] + $dx[$j];
            if(isset($map[$y][$x])&&($map[$y][$x]!="#")&&($map[$y][$x] != "*"))
            {
                $map[$y][$x] = "*";
                $jinchi[$idx]= [$y, $x];
                $idx++;
            }
        }
    }
    if($idx == $index)
    {
        $end_flg = true;
    }
    
    return [$map, $jinchi, $idx, $end_flg];
}
?>