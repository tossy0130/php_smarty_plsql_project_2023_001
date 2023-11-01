<?php

ini_set('display_errors', 1);


function MK_DIR($t_dir)
{
    // === ディレクトリが存在しない場合
    if (!is_dir($t_dir)) {

        if (mkdir($t_dir, 0755)) {
            // === ディレクトリ作成
        } else {
        }
    } else {
        // === 対象ディレクトリあり
    }
}
