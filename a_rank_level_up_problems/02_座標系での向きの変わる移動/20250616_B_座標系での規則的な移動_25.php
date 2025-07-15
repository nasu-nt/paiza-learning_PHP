<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $input_line = explode(" ", trim(fgets(STDIN)));
    $X = $input_line[0];
    $Y = $input_line[1];
    $N = $input_line[2];
    //echo $X.$Y.$N;
    
    $n = 0;
    for($i=1;$i<=$N;$i++)
    {
        if ($i==1)
        {
            $X += $i;
        }
        elseif($i==2)
        {
            $Y++;
        }
        else
        {
            if($i%2==0)
            {
                for($j=1;$j<$i;$j++)
                {
                    $X++;
                    if(($i+$j)>$N){break;}
                    
                    for($j=1;$j<$i;$j++)
                    {
                        $Y++;
                        if(($i+$j)>$N){break;}
                    }
                }
            }
            else
                for($j=1;$j<$i;$j++)
                {
                    $X--;
                    if(($i+$j)>=$N){break;}
                    
                    for($j=1;$j<$i;$j++)
                    {   
                        echo $Y;
                        $Y--;
                        if(($i+$j)>$N){break;}
                    }
                }

            }
        }
                    
        
        
        //if ($n == $N)
        //{
        //    break;
        //}
        //elseif($n >= $N)
        //{
        //    echo $n;
        //    $yojou = $n - $N;
//
        //    if($i%2==0)
        //    {
        //        if($yojou>$i)         
        //        {
        //            $Y -= $i;
        //            $X -= ($yojou-$i);
        //        }
        //        else
        //        {
        //            $Y -= $yojou;
        //        }
        //    }
        //    else
        //    {
        //        if($yojou>$i)         
        //        {
        //            $Y += $i;
        //            $X += ($yojou-$i);
        //            
        //        }
        //        else
        //        {
        //            $Y += $yojou;
        //        }
        //    }
        //    break;
        //}
        
    
    echo $X." ".$Y;
?>