<?php

ini_set('display_errors', 1);

require_once('../vendor/autoload.php');
require_once('../class/db.php');

require('../class/constant.php'); // 定数クラス

$smarty = new Smarty;
$smarty->template_dir = '../templates/';


// Mysql データ接続

$db_obj = new MysqlDB();

// ====== POST送信がきた場合
// === インサート処理
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $email = $_POST['email'];

    $Insert_DATA = [
        'name' => $name,
        'email' => $email
    ];

    // === db.php , Insert_DATA
    $inset_result = $db_obj->Insert_DATA('smarty_users', $Insert_DATA);

    if ($inset_result) {
        header('Location: index.php');
    } else {
        echo "インサート失敗";
    }
}

$smarty->display('../templates/create.tpl');
