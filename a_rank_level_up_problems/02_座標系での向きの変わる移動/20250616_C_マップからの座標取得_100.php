<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $input_line = explode(" ", trim(fgets(STDIN)));
    $H = $input_line[0];
    $W = $input_line[1];
    //echo $H.$W;
    
    $ans = "";
    for($i=0;$i<$H;$i++)
    {
        $line = str_split(trim(fgets(STDIN)));
        for($j=0;$j<$W;$j++)
        {
            if($line[$j] == "#")
            {
                $ans = $i. " " .$j;
                break;
            }
        }
    }
    
    echo $ans;
?>