<?php
// H W sy sx N        
// S_0         
// ...     
// S_(H-1)     
// d_1 l_1     
// ...     
// d_N l_N
// 
// マップの行数 H と列数 W , 障害物を '#' で移動可能な場所を '.' で表した H 行 W 列のマップ S_1 ... S_H ,
// 現在の座標 sy, sx, 移動の回数 N が与えられます。
// 続けて、 N 回の移動の向き d_1 ... d_N と移動するマス数 l_1 ... l_N が与えられます。
// 
// プレイヤーははじめ北を向いています。
// 
// 各移動が可能である場合、移動後の y , x 座標 を出力してください。
// 移動が可能でない場合(移動しきれない場合)、移動できるところまで移動した後の座標を出力した後に "Stop" を出力して、以降の移動を打ち切ってください。
// 
// 各移動が可能であるということは、以下の図の通り
// 「今いるマスから移動先のマスまでに障害物がない　かつ　移動先がマップの範囲外でない」
// ということを意味します。

    $input_line = explode(" ", trim(fgets(STDIN)));
    $H = $input_line[0];
    $W = $input_line[1];
    $sy = $input_line[2];
    $sx = $input_line[3];
    $N = $input_line[4];
    //echo $sy.$sx."\n";
    
    $map = [];
    for($i=0; $i<$H; $i++)
    {
        $input_line = str_split(trim(fgets(STDIN)));
        for($j=0; $j<$W; $j++)
        {
            $map[$i][$j] = $input_line[$j];
            // echo $map[$i][$j];
        } // echo "\n";
    }
    
    $d = []; // "L" or "R"
    $l = []; // 正の整数
    for($i=0; $i<$N; $i++)
    {
        $input_line = explode(" ", trim(fgets(STDIN)));
        $d[$i] = $input_line[0];
        $l[$i] = $input_line[1];
    }
    
    $muki = "N"; // プレイヤーははじめ北を向いている
    for($i=0; $i<$N; $i++)
    {
        for($j=0; $j<$l[$i]; $j++)
        {
            list($y, $x) = move($muki, $d[$i], $sy, $sx);
         
            if( !isset($map[$y][$x]) )
            {
                echo $sy. " ". $sx. "\n";
                echo "Stop\n";
                break 2;
            }
            
            list($sy, $sx) = [$y, $x];
        }

        echo $sy. " ". $sx. "\n";
        $muki = kaiten($muki, $d[$i]);
    }
    
  
function move($muki, $d, $sy, $sx)
{
    if($d=="L")
    {
        switch($muki)
        {
            case "N":
                $sx--;
                break;
            case "S":
                $sx++;
                break;
            case "E":
                $sy--;
                break;
            case "W":
                $sy++;
                break;
            default:
                break;
        }
    }
    else // "R"
    {
        switch($muki)
        {
            case "N":
                $sx++;
                break;
            case "S":
                $sx--;
                break;
            case "E":
                $sy++;
                break;
            case "W":
                $sy--;
                break;
            default:
                break;
        }
    }
    return [$sy, $sx];
}
 
    
function kaiten($muki, $d)
{
    if($d=="L")
    {
        switch($muki)
        {
            case "N":
                $muki = "W";
                break;
            case "S":
                $muki = "E";
                break;
            case "E":
                $muki = "N";
                break;
            case "W":
                $muki = "S";
                break;
            default:
                break;
        }
    }
    else // "R"
    {
        switch($muki)
        {
            case "N":
                $muki = "E";
                break;
            case "S":
                $muki = "W";
                break;
            case "E":
                $muki = "S";
                break;
            case "W":
                $muki = "N";
                break;
            default:
                break;
        }
    }
    return $muki;
}

?>