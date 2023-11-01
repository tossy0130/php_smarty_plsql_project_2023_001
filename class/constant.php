<?php

ini_set('display_errors', 1);


//=== エックスサーバー
/*
define('DB_HOST', 'localhost');
define('DB_USER', 'xs810378_tossy');
define('DB_PASS', 'tarantno777');
define('DB_NAME', 'xs810378_banka');
define('PDO_DSN', 'mysql:dbname=xs810378_banka;host=localhost;port=3306');
*/

//=== ローカル接続
// Mysql接続
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'tossy_db_01');
define('PDO_DSN', 'mysql:dbname=tossy_db_01;host=localhost;port=3306');
