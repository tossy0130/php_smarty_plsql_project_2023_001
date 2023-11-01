<?php

ini_set('display_error', 1);

require_once('../vendor/autoload.php');
require_once('../class/db.php');

require('../class/constant.php'); // 定数クラス

$smarty = new Smarty;
$smarty->template_dir = '../templates/';

$DB_Obj = new MysqlDB();

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];

    $id = $_POST['id'];

    $update_data = [
        "name" => $name,
        "email" => $email,
    ];

    $update_result = $DB_Obj->UPDATE_DATA('smarty_users', $update_data, $id);


    if ($update_result) {
        header('Location: index.php');
    } else {
        echo "インサート失敗";
    }
}
