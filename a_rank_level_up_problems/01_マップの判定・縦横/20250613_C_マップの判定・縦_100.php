<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $input_line = explode(" ", trim(fgets(STDIN)));
    $H = $input_line[0];
    $W = $input_line[1];
    //echo $H.$W;
    
    $s = "#";
    $ban = array();
    
    for($y=0;$y<$H;$y++)
    {
        $line = str_split(trim(fgets(STDIN)));
        for($x=0;$x<$W;$x++)
        {
            $ban[$y][$x] = $line[$x];
        
        }
    }
    //echo $ban[$H-1][$W-1];
    
    $a = "";
    for($y=0;$y<$H;$y++)
    {
        for($x=0;$x<$W;$x++)
        {
            if($y==0)
            {
                if($ban[1][$x] == $s)
                {
                    $a .= "0 ". $x. "\n";
                }
            }elseif($y==$H-1)
            {
                if($ban[$y-1][$x] == $s)
                {
                    $a .= $y." ". $x. "\n";
                }
            }elseif(($ban[$y-1][$x] == $s)&&($ban[$y+1][$x] == $s))
            {
                $a .= $y." ". $x. "\n";
            }
        }
    }
    
    
    echo $a;
?>