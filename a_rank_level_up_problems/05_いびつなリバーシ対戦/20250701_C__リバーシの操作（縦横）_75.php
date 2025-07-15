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
            
            if($i==$Y&&$j==$X)
            {
                $map[$i][$j] = "*";
            }
            
            //echo $map[$i][$j];
        }
        //echo "\n";
    }
    
    $is_kept_N = $is_kept_S = $is_kept_E = $is_kept_W = false;
    $y_N = $y_S = $x_E = $x_W = 0;
    for($i=0;$i<$H;$i++)
    {
        // 石を置くマスの上下左右にすでに石があるか
        if($i<$Y&&$map[$i][$X] == "*")
        {
            //上方向
            $is_kept_N = true;
            $y_N = $i;
        }
        if($i>$Y&&$map[$i][$X] == "*")
        {
            //下方向
            $is_kept_S = true;
            $y_S = $i;
        }
        
        for($j=0;$j<$W;$j++)
        {
            if($j>$X&&$map[$Y][$j] == "*")
            {
                // 右方向
                $is_kept_E = true;
                $x_E = $j;
            }
            if($j<$X&&$map[$Y][$j] == "*")
            {
                // 左方向
                $is_kept_W = true;
                $x_W = $j;
            }
        }
    }
    //var_dump($kept);
    
    for($i=0;$i<$H;$i++)
    {
        for($j=0;$j<$W;$j++)
        {
            if($is_kept_N && $i<$Y && $i>$y_N)
            {
                $map[$i][$X] = "*";
            }
            
            if($is_kept_S && $i>$Y && $i<$y_S)
            {
                $map[$i][$X] = "*";
            }
            
            if($is_kept_E && $j>$X && $j<$x_E)
            {
                $map[$Y][$j] = "*";
            }
            
            if($is_kept_W && $j<$X && $j>$x_W)
            {
                $map[$Y][$j] = "*";
            }

            echo $map[$i][$j];
        }
        echo "\n";
    }

?>