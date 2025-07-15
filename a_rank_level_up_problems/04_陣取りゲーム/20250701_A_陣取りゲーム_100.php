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
    $N = trim(fgets(STDIN)); // 先攻プレイヤー名（AまたはB）
    $E = ($N === "A") ? "B" : "A";
    
    // マップ初期化
    $map = [];
    $pq = new SplPriorityQueue();
    
    for ($i = 0; $i < $H; $i++)
    {
        $line = str_split(trim(fgets(STDIN)));
        for ($j = 0; $j < $W; $j++)
        {
            $map[$i][$j] = $line[$j];
            if ($map[$i][$j] === $N || $map[$i][$j] === $E)
            {
                $player = $map[$i][$j];
                $priority = -(0 * 10 + ($player === $N ? 0 : 1)); // 先攻優先
                $pq->insert([$i, $j, $player, 0], $priority);
            }
        }
    }
    
    // 拡張処理（ヒープで順番制御）
    $dy = [-1, 0, 1, 0];
    $dx = [0, 1, 0, -1];
    
    while (!$pq->isEmpty())
    {
        list($y, $x, $p, $n) = $pq->extract();
    
        for ($k = 0; $k < 4; $k++)
        {
            $ny = $y + $dy[$k];
            $nx = $x + $dx[$k];
    
            if (isset($map[$ny][$nx]) && $map[$ny][$nx] === ".")
            {
                $map[$ny][$nx] = $p;
                $priority = -(($n + 1) * 10 + ($p === $N ? 0 : 1));
                $pq->insert([$ny, $nx, $p, $n + 1], $priority);
            }
        }
    }
    
    // 結果カウント
    $num_A = 0;
    $num_B = 0;
    
    for ($i = 0; $i < $H; $i++)
    {
        for ($j = 0; $j < $W; $j++)
        {
            if ($map[$i][$j] === "A") $num_A++;
            if ($map[$i][$j] === "B") $num_B++;
        }
    }
    
    // 勝者
    echo $num_A . " " . $num_B . "\n";
    echo ($num_A > $num_B) ? "A" : "B";
        
?>