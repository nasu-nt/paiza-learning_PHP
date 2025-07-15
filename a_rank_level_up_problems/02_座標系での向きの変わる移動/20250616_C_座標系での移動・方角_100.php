<?php
// 開始時点の y , x 座標 と移動の回数 N が与えられます。
//・ 0 ≦ Y, X, N ≦100
//・ d_i は、N, S, E, W のいずれかでそれぞれ 北・南・東・西 を意味する。
    $input_line = explode(" ", trim(fgets(STDIN)));
    $Y = $input_line[0]; //初期位置
    $X = $input_line[1]; //同上
    $N = $input_line[2]; //移動の回数

    $d = array();
    $ans = "";
    for($i=1; $i<=$N; $i++)
    {
        $d[$i] = trim(fgets(STDIN));
        
        if($d[$i]=="N")
        {
            $Y = $Y-1;
        }
        elseif ($d[$i]=="S") {
            $Y = $Y+1;
        }
        elseif ($d[$i]=="E") {
            $X = $X+1;
        }
        elseif ($d[$i]=="W") {
            $X = $X-1;
        }
        $ans .= $Y. " ". $X ."\n";
        
    }
    
    echo $ans;
?>