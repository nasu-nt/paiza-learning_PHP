<?php
// H W Y X     
// S_0     
// ...     
// S_(H-1)
// 
// ・ １行目では、盤面の行数 H , 列数 W , 石を置くマスの y , x 座標である Y , X が与えられます。
// ・ 続く H 行のうち i 行目 (0 ≦ i < H) には、
// 盤面の i 行目の文字をまとめた文字列 S_i が与えられ、S_i の j 文字目は、盤面の i 行目の j 列目に書かれている文字を表します。
    list($H,$W,$Y,$X) = array_map('intval', explode(" ", trim(fgets(STDIN))));
    $s = [];
    for($i=0;$i<$H;$i++)
    {
        $s[] = str_split(trim(fgets(STDIN)));
    }
    
    // 斜め4方向
    $dirs = [
        [-1, -1],
        [-1, 1],
        [1, -1],
        [1, 1]
    ];

    // 置く
    $s[$Y][$X] = '*';

    foreach ($dirs as [$dy, $dx]) {
        $ny = $Y + $dy;
        $nx = $X + $dx;
        $path = [];
        while ($ny >= 0 && $ny < $H && $nx >= 0 && $nx < $W) {
            if ($s[$ny][$nx] === '*') {
                // サンドイッチできた
                foreach ($path as [$py, $px]) {
                    $s[$py][$px] = '*';
                }
                break;
            } elseif ($s[$ny][$nx] === '.') {
                $path[] = [$ny, $nx];
                $ny += $dy;
                $nx += $dx;
            } else {
                break;
            }
        }
    }
    
    foreach ($s as $row) {
        echo implode('', $row) . "\n";
    }
?>