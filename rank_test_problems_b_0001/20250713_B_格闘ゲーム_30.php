<?php
// paiza さんは格闘ゲームを作っており、コマンドに対応するボタン入力が行われたら技を使うようにしたいと考えています。
// 技として、「rolling」 「upper」 「rush」の 3 つを作る予定です。
// 技を使用するためのコマンドはそれぞれ「rolling」は "LLLRB"、「upper」は"DDRRA"、「rush」は "AAAAA" です。
// 入力として文字列 S が与えられるので、S に含まれる "LLLRB", "DDRRA", "AAAAA" の出現順に、
// "LLLRB" であれば "rolling"、"DDRRA" であれば "upper"、"AAAAA" であれば "rush" を改行区切りで出力してください。
// ただし、1 つのボタン入力は 1 つのコマンドにしか使用されません。
    $S = (string)trim(fgets(STDIN));
    $cmd = [
        "rolling"=>"LLLRB",
        "upper"=>"DDRRA",
        "rush"=>"AAAAA"
        ];
    $max_length = strlen($S) - strlen(min($cmd));

    $s = $S;
    for($i=0; $i<=$max_length; $i++)
    {
        $s_1 = substr($s, $i, 1);
        if($s_1=="L")
        {
            $m = "rolling";
            $c = substr($s, $i, strlen($cmd[$m]));
            if($c==$cmd[$m])
            {
                // 念のためコマンドまでの文字列を"*"にしておく
                $str = substr($s, 0, $i+strlen($c));
                $s = str_replace($str, "", $s);
                $s = str_repeat("*", $i+strlen($c)). $s;

                echo $m . "\n";
            }
        }
        if($s_1=="D")
        {
            $m = "upper";
            $c = substr($s, $i, strlen($cmd[$m]));
            if($c==$cmd[$m])
            {
                $str = substr($s, 0, $i+strlen($c));
                $s = str_replace($str, "", $s);
                $s = str_repeat("*", $i+strlen($c)). $s;
                
                echo $m. "\n";
            }
        }
        if($s_1=="A")
        {
            $m = "rush";
            $c = substr($s, $i, strlen($cmd[$m]));
            if($c==$cmd[$m])
            {
                $str = substr($s, 0, $i+strlen($c));
                $s = str_replace($str, "", $s);
                $s = str_repeat("*", $i+strlen($c)). $s;

                echo $m. "\n";
            }
        }
    }
?>