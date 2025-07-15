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
    
    $i=0;
    while($i<strlen($S))
    {
        $hit = false;
        foreach ($cmd as $name => $pettern)
        {
            $len = strlen($pettern);
            if(substr($S, $i, $len) == $pettern)
            {
                echo $name. "\n";
                
                $i += $len;
                $hit = true;
                break;
            }
        }
        
        if(!$hit)
        {
            $i++;
        }
    }
    
?>