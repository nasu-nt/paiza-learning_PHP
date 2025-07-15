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
    
    $kept = array("N"=>false, "S"=>false, "E"=>false, "W"=>false);
    for($i=0;$i<$H;$i++)
    {
        // 石を置くマスの上下左右にすでに石があるか
        if($i<$Y&&$map[$i][$X] == "*")
        {
            //上方向
            $kept["N"] = true;
        }
        if($i>$Y&&$map[$i][$X] == "*")
        {
            //下方向
            $kept["S"] = true;
        }
        
        for($j=0;$j<$W;$j++)
        {
            if($j>$X&&$map[$Y][$j] == "*")
            {
                // 右方向
                $kept["E"] = true;
            }
            if($j<$X&&$map[$Y][$j] == "*")
            {
                // 左方向
                $kept["W"] = true;
            }
        }
    }
    //var_dump($kept);
    
    for($i=0;$i<$H;$i++)
    {
        for($j=0;$j<$W;$j++)
        {
            if($kept["N"]&&$i<$Y)
            {
                $map[$i][$X] = "*";
            }
            
            if($kept["S"]&&$i>$Y)
            {
                $map[$i][$X] = "*";
            }
            
            if($kept["E"]&&$j>$X)
            {
                $map[$Y][$j] = "*";
            }
            
            if($kept["W"]&&$j<$X)
            {
                $map[$Y][$j] = "*";
            }

            echo $map[$i][$j];
        }
        echo "\n";
    }

?>