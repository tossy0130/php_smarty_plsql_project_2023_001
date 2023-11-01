<?php

ini_set('display_errors', 1);

require('../vendor/autoload.php');
require('../class/db.php');

require('../class/constant.php'); // 定数クラス

// === PDF ライブラリ
require('../tcpdf/tcpdf.php');

$smarty = new Smarty;
$smarty->setTemplateDir('../templates/');
$smarty->setCompileDir('../templates_c/');


// ======== Mysql 接続
#$db_host = 'mysql:dbname=xs810378_banka;host=localhost;port=3306';

/*
$db_host = 'localhost';
$db_user = 'xs810378_tossy';
$db_pass = '';
$db_name = 'xs810378_banka';
*/


// ======== Mysql 値取得
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($conn->connect_error) {
	die('DB connect エラー:' . $conn->connect_error);
}

$get_user = array();
$sql = "SELECT * FROM smarty_users";
$result = $conn->query($sql);

// === SELECTした 値取得
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		$get_user[] = $row;
	}
}

/*
$templateData = [
    'title' => 'Hello Smarty',
    'content' => 'This is a sample Smarty template.'
];
*/

$smarty->assign('get_user', $get_user);
$smarty->display('../templates/index.tpl');
