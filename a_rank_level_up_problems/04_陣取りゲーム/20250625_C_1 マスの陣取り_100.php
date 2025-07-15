<?php
// H W     
// S_0     
// ...     
// S_(H-1)
// 
// 
// ・ 1 行目では、盤面の行数 H , 列数 W が与えられます。
// ・ 続く H 行のうち i 行目 (0 ≦ i < H) には、盤面の i 行目の文字をまとめた文字列 S_i が与えられ、
//   S_i の j 文字目は、盤面の i 行目の j 列目に書かれている文字を表します。(0 ≦ j < W)
  
    list($H, $W) = array_map('intval', explode(" ", trim(fgets(STDIN))));
    //echo $H." ".$W."\n";
    
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
    
    for($i=0;$i<$H;$i++)
    {
        for($j=0;$j<$W;$j++)
        {
            if($map[$i][$j]=="*")
            {
                $dy = [-1,0,1,0]; //上下左右
                $dx = [0,-1,0,1];
                
                for($k=0;$k<4;$k++)
                {
                    $y = $i + $dy[$k];
                    $x = $j + $dx[$k];
                    if(isset($map[$y][$x]))
                    {
                        $map[$y][$x]="*";
                    }
                }
                break 2;
            }
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