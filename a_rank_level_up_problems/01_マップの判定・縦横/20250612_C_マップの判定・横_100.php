<?php

    //盤面が与えられるので、「左右のマスが "#" 」であるようなマスの座標を全て出力してください。
    //ただし、左端のマスの場合は「右のマスが "#" 」であれば、右端のマスの場合は「左のマスが "#" 」であれば条件を満たすものとします。

    //なお、マスの座標系は左上端のマスの座標を ( y , x ) = ( 0 , 0 ) とし、
    //下方向が y 座標の正の向き、右方向が x 座標の正の向きとします。
    
    $input_line = explode(" ", trim(fgets(STDIN)));
    $H = $input_line[0];
    $W = $input_line[1];
    $s = "#";
    
    $ban = array();
    for($y=0; $y<$H ;$y++)
    {
        $input_line = str_split(trim(fgets(STDIN)));
        
        for($x=0; $x<$W ;$x++)
        {
            $ban[$y][$x] = $input_line[$x];
        }
    }
    
    $ans = array();
    
    for($y=0;$y<$H;$y++)
    {
        for($x=0;$x<$W;$x++)
        {
            if($x==0)
            {
                if($ban[$y][1] == $s)
                    {
                        $ans[$y][$x] = $y. " ". $x;
                        //echo "a";
                    }
            }
            elseif($x==$W-1)
            {
                if($ban[$y][$x-1] == $s)
                {
                    $ans[$y][$x] = $y. " ". $x;
                    //echo "b";
                }
            }
            elseif(($ban[$y][$x-1]==$s) && ($ban[$y][$x+1]==$s))
            {
                $ans[$y][$x] = $y. " ". $x;
                //echo "c";
            }
        }
    }
    
    $answer = "";
    
    for($y=0; $y<$H; $y++)
    {
        for($x=0; $x<$W; $x++)
        {
            if(isset($ans[$y][$x]))
            {
                $answer .= $ans[$y][$x]. "\n";
            }
        }
    }
    
    
    //echo $ban[$H-1][$W-1];
    echo $answer;
?>