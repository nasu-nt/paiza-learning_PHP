<?php
// X Y N
// ・ 1 行で、開始時点の x , y 座標を表す X , Y, 移動の歩数 N が与えられます。
    $input_line = explode(" ", trim(fgets(STDIN)));
    $X = $input_line[0];
    $Y = $input_line[1];
    $N = $input_line[2];
    //echo $X.$Y,$N;
    
    $count = 1;
    $n = 0; //実際の歩数
    for($i=1;$i<=$N;$i++)
    {
        for($j=0;$j<$count;$j++)
        {   
            switch($i%4)
            {
                case 0:
                    //echo "ddd";
                    $Y--;
                    break;
                case 1:
                    //echo "aaa";
                    $X++;
                    break;
                case 2:
                    //echo "bbb";
                    $Y++;
                    break;
                case 3:
                    //echo "ccc";
                    $X--;
                    break;
                default:
                    //echo "eee";
                    break;
            }
            
            $n++;
            //echo $n."\n";
            if($n==$N)
            {
                break 2;
            }
        }
        
        if($i%2==0)
        {
            $count++;
        }
    }
    
    echo $X." ".$Y;
?>