<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    //H W N   
    //S_0     
    //...     
    //S_(H-1)    
    //y_1 x_1     ほしいやつ
    //...     
    //y_N x_N

    $input_line= explode(" ", trim(fgets(STDIN)));
    $H = $input_line[0]; //Y
    $W = $input_line[1]; //X
    $N = $input_line[2]; //欲しいやつの数
    
    $ban = array();
    for($i=0; $i<$H; $i++)
    {
        $input_line = str_split(trim(fgets(STDIN)));
        for($j=0; $j<$W; $j++)
        {
            $ban[$i][$j] = $input_line[$j];
        }
    }
    
    $ans = "";
    for($k=1; $k<=$N; $k++)
    {
        $input_line = explode(" ", trim(fgets(STDIN)));
        $y = $input_line[0];
        $x = $input_line[1];
        
        $ans = $ans. $ban[$y][$x]. "\n";
    }
    //echo $H.$W.$N;
    //echo $ban[2][2];
    echo $ans;
    