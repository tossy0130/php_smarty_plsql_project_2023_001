<?php

ini_set('display_errors', 1);

require_once('../vendor/autoload.php');
require_once('../class/db.php');

require('../class/constant.php'); // 定数クラス


$smarty = new Smarty;
$smarty->template_dir = '../templates/';

// === GET パラメーターが飛んできた場合
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {

    // === ユーザーの ID　取得
    $id = $_GET['id'];

    try {

        $pdo = new PDO(PDO_DSN, DB_USER, DB_PASS);
        $sql = "SELECT * FROM smarty_users WHERE id = :id";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':id', $id);
        $stmt->execute();

        // === GET で取得した IDのデータを格納
        $id_user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$id_user) {
            echo "error fetch";
            exit();
        }

        // === .tpl　で表示
        $smarty->assign('id_user', $id_user);
        $smarty->display('../templates/edit.tpl');
    } catch (PDOException $e) {
        echo "PDO Error:" . $e->getMessage();
    }

    // === $pdo オブジェクトを空にする
    $pdo = null;
}
