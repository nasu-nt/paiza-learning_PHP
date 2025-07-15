<?php
// 元の文字列 S が与えられるので、S に含まれる 't' と 'a' を削除した文字列を出力してください。
// * 出力する文字列は 1 文字以上になることが保証される

    $S = (string)trim(fgets(STDIN));
    
    $S = str_replace("t", "", $S);
    $S = str_replace("a", "", $S);
    
    echo $S;
?>