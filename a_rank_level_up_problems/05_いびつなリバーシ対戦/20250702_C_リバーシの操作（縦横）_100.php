<?php
// H W Y X     
// S_0         
// ...     
// S_(H-1)
// 
// ・ １行目では、盤面の行数 H , 列数 W , 石を置くマスの y , x 座標 である Y , X が与えられます。
// ・ 続く H 行のうち i 行目 (0 ≦ i < H) には、
// 盤面の i 行目の文字をまとめた文字列 S_i が与えられ、S_i の j 文字目は、盤面の i 行目の j 列目に書かれている文字を表します。

    list($H, $W, $Y, $X) = array_map('intval', explode(" ", trim(fgets(STDIN))));
    
    $map = [];
    for($i=0;$i<$H;$i++)
    {
        $line = str_split(trim(fgets(STDIN)));
        for($j=0;$j<$W;$j++)
        {
            $map[$i][$j] = $line[$j];
        }
    }
    
    // 石を置く
    $map[$Y][$X] = "*";
    
    // 上方向
    for($i=$Y-1;$i>=0;$i--)
    {
        if($map[$i][$X]=="*")
        {
            for($j=$i+1;$j<$Y;$j++)
            {
                $map[$j][$X] = "*";
            }
            break;
        }
    }
    
    // 下方向
    for($i=$Y+1;$i<$H;$i++)
    {
        if($map[$i][$X]=="*")
        {
            for($j=$Y+1;$j<$i;$j++)
            {
                $map[$j][$X] = "*";
            }
            break;
        }
    }
    
    // 右方向
    for($j=$X+1;$j<$W;$j++)
    {
        if($map[$Y][$j]=="*")
        {
            for($k=$X+1;$k<$j;$k++)
            {
                $map[$Y][$k] = "*";
            }
            break;
        }
    }
    
    // 左方向
    for($j=$X-1;$j>=0;$j--)
    {
        if($map[$Y][$j]=="*")
        {
            for($k=$j+1;$k<$X;$k++)
            {
                $map[$Y][$k] = "*";
            }
            break;
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
  

?>