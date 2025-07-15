<?php
// H W     
// N       
// S_0     
// ...     
// S_(H-1)
// 
// 
// ・ 1 行目では、マップの行数 H , 列数 W が与えられます。
// ・ 2 行目では、先攻のプレイヤーの名前 N が与えられます。
// ・ 続く H 行のうち i 行目 (0 ≦ i < H) には、盤面の i 行目の文字をまとめた
// 文字列 S_i が与えられ、S_i の j 文字目は、盤面の i 行目の j 列目に書かれている文字を表します。(0 ≦ j < W)

    list($H, $W) = array_map('intval', explode(" ", trim(fgets(STDIN))));
    $N = trim(fgets(STDIN)); // "A"or"B"
    $E = "A"; // enemyよりopponentなのでは
    if($N=="A")
    {
        $E = "B";
    }
    
    $map = [];
    $q = []; // y, x, プレイヤー名, 各自ターン数
    for($i=0;$i<$H;$i++)
    {
        $line = str_split(trim(fgets(STDIN)));
        for($j=0;$j<$W;$j++)
        {
            $map[$i][$j] = $line[$j];
            if($map[$i][$j] == $N)
            {
                // $Nが先行のためキューの先頭になるようにする
                $q[0] = [$i, $j, $N, 0];
            }
            elseif($map[$i][$j] == $E)
            {
                $q[1] = [$i, $j, $E, 0];
            }
            
            //echo $map[$i][$j];
        }
        //echo "\n";
    }
    
    
    
    $dy = [-1,0,1,0];
    $dx = [0,1,0,-1];
    while(!empty($q))
    {
        list($y, $x, $p, $n) = array_shift($q);
        for($k=0; $k<4; $k++)
        {
            $ny = $y + $dy[$k];
            $nx = $x + $dx[$k];
            if(isset($map[$ny][$nx])&&$map[$ny][$nx]==".")
            {
                $map[$ny][$nx] = $p;
                $q[] = [$ny, $nx, $p, $n+1];
            }
        }
    }
    
    // 出力
    // for($i=0;$i<$H;$i++)
    // {
    //     for($j=0;$j<$W;$j++)
    //     {
    //         echo $map[$i][$j];
    //     }
    //     echo "\n";
    // }


    // カウント
    $num_A = $num_B = 0;
    $winner = "";
    for($i=0;$i<$H;$i++)
    {
        for($j=0;$j<$W;$j++)
        {
            if($map[$i][$j]=="A")
            {
                $num_A++;
            }
            elseif($map[$i][$j]=="B")
            {
                $num_B++;
            }

        }
    }
    
    if($num_A>$num_B)
    {
        $winner = "A";
    }
    else
    {
        $winner = "B";
    }
    
    echo $num_A. " ". $num_B. "\n". $winner;
    
?>