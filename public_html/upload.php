<?php

ini_set('display_errors', 1);

require_once('../vendor/autoload.php');
require_once('../class/db.php');

require('../class/constant.php'); // 定数クラス

// Smartyオブジェクトを作成
$smarty = new Smarty;
$smarty->template_dir = '../templates/';

$smarty->display('../templates/upload.tpl');


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // アップロードされたファイル情報を取得
    $file = $_FILES['pdfFile'];

    // アップロードされたファイルのチェック
    if ($file["error"] == UPLOAD_ERR_OK) {
        // ファイル名とパスを設定
        $file_name = 'Mabashi_' . $file["name"];
        $file_path = "./uploads/" . $file_name;

        // ファイルを指定のディレクトリに移動
        move_uploaded_file($file["tmp_name"], $file_path);


        // 画像をテンプレートに割り当て
        $smarty->assign('image_path', $file_path);

        // テンプレートを表示
        // $smarty->display('upload.tpl');
        $smarty->display('../templates/upload_ok.tpl');
    } else {
        echo "アップロードに失敗しました。";
    }
}
