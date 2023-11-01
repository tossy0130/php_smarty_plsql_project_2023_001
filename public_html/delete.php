<?php

ini_set('display_error', 1);

require_once('../vendor/autoload.php');
require_once('../class/db.php');

require('../class/constant.php'); // 定数クラス

$smarty = new Smarty;
$smarty->template_dir = '../templates/';

// === MysqlDB class オブジェクト作成
$DB_obj = new MysqlDB();

// ====== MySql 削除処理 ======
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {

    $id = $_GET['id'];

    $result = $DB_obj->DELETE_DATA("smarty_users", $id);

    if ($result) {
        echo "削除完了";
        header('Location: index.php');
    } else {
        echo "削除失敗 error";
    }
}
