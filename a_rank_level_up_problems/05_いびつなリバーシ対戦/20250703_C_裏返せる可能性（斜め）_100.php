<?php
// H W Y X
// ・ 出力する盤面の行数 H , 列数 W と石を置くマスの y , x 座標である Y , X が 1 行で与えられます。

    list($H, $W, $Y, $X) = array_map('intval', explode(" ", trim(fgets(STDIN))));
    
    $base = [];
    for($i=0;$i<$H;$i++)
    {
        for($j=0;$j<$W;$j++)
        {
            $base[$i][$j] = ".";
        }
    }
    
    $base[$Y][$X] = "!";
    
    // 左上
    $n = 1;
    for($i=$Y-1;$i>=0;$i--)
    {
        for($j=$X-1;$j>=0;$j--)
        {
            $ny = $Y-$n;
            $nx = $X-$n;
            if(isset($base[$ny][$nx])&&$base[$ny][$nx]==".")
            {
                $base[$ny][$nx] = "*";
            }
        }
        $n++;
    }
    
    //右上
    $n = 1;
    for($i=$Y-1;$i>=0;$i--)
    {
        for($j=$X+1;$j<$W;$j++)
        {
            $ny = $Y-$n;
            $nx = $X+$n;
            if(isset($base[$ny][$nx])&&$base[$ny][$nx]==".")
            {
                $base[$ny][$nx] = "*";
            }
        }
        $n++;
    }
    
    //右下
    $n = 1;
    for($i=$Y+1;$i<$H;$i++)
    {
        for($j=$X+1;$j<$W;$j++)
        {
            $ny = $Y+$n;
            $nx = $X+$n;
            if(isset($base[$ny][$nx])&&$base[$ny][$nx]==".")
            {
                $base[$ny][$nx] = "*";
            }
        }
        $n++;
    }
    
    
    //左下
    $n = 1;
    for($i=$Y+1;$i<$H;$i++)
    {
        for($j=$X-1;$j>=0;$j--)
        {
            $ny = $Y+$n;
            $nx = $X-$n;
            if(isset($base[$ny][$nx])&&$base[$ny][$nx]==".")
            {
                $base[$ny][$nx] = "*";
            }
        }
        $n++;
    }
    
    
    
    // しゅつりょく
    for($i=0;$i<$H;$i++)
    {
        for($j=0;$j<$W;$j++)
        {
            echo $base[$i][$j];
        }
        echo "\n";
    }
    
?>