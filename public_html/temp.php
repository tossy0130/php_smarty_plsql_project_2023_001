<?php


//=========================================== start
// =========== スマーティー用
// === １週間ループ  日付を取得、　その日から１週間ループ して配列へ入れる
$dateArray = array();
for ($i = 0; $i < 7; $i++) {
    $nextDate = strtotime("$pp1 +$i days");
    $dayOfWeek = date('w', $nextDate); // 0から6の曜日番号を取得
    $daysOfWeekArray = array("日", "月", "火", "水", "木", "金", "土");
    $formattedDate = date('m/d', $nextDate) . "（" . $daysOfWeekArray[$dayOfWeek] . "）";
    $dateArray[] = $formattedDate;
}

$this->arr_Date = $dateArray;

//=========================================== end

//=========================================== start
// ====　配列から２次元配列を作る
$arr_a = array(1, 2, 3);
$arr_b = array('a', 'b', 'c');

$arr_dd = array();

foreach ($arr_a as $value) {
    $arr_dd[0][] = $value;
}

foreach ($arr_b as $value) {
    $arr_dd[1][] = $value;
}


$idx = 0;
while ($idx <= 2) {
    print($arr_dd[0][$idx]);
    $idx = $idx + 1;
}

//=========================================== end


//=========================================== start
/*

火葬時刻	11/08（水）	11/09（木）	11/10（金）	11/11（土）	11/12（日）	11/13（月）	11/14（火）
1000	03	03	03	03	03	03	03
1100	03	03	02	03	03	03	03
1300	03	03	03	03	03	03	03
1400	03	03	03	03	03	03	03
1500	02	02	02	02	02	02	02
1600	02	02	02	02	02	02	02
1700	02	02	02	02	02	02	02

*/
// ====================== A0113010 プロシージャー　呼び出し、テスト

// OCI
$conn = oci_connect(DB_USER, DB_PASSWORD, DB_CONNECTION_STRING, DB_CHARSET);

if (!$conn) {
    $e = oci_error();
    self::fnDispError(DB_ERROR, $e['message'], true, DEBUG_MODE);
}


$stid = oci_parse($conn, 'begin A0113010(:p1, :p2, :p3, :p4, :p5, :p6, :p7); end;');

/*
        // $pp1_tmp = 2023; // 日付を文字列として指定
        $pp1_tmp = '23-11-06';
        //   $pp1 = "TO_DATE('$pp1_tmp', 'YYYY-MM-DD')"; // Oracleの日付リテラルに変換
        $pp1 = "TO_DATE('$pp1_tmp', 'YYYY-mm-dd')"; // Oracleの日付リテラルに変換
        //  $pp1 = "TO_DATE('$pp1_tmp', 'YYYY')"; // Oracleの日付リテラルに変換
        */

//   $pp1 = date('Y-m-d', strtotime('2023-11-06')); // 日付を文字列に変換

// ====================== プロシージャ渡す引数　日付
$today = date('Y-m-d');
// $pp1 = '2023-11-07';
$pp1 = $today;

$pp2 = 7;
oci_bind_by_name($stid, ':p1', $pp1);
oci_bind_by_name($stid, ':p2', $pp2);

oci_bind_by_name(
    $stid,
    ':p3',
    $gg3,
    256
);
oci_bind_by_name($stid, ':p4', $gg4, 256);
oci_bind_by_name($stid, ':p5', $gg5, 256);
oci_bind_by_name($stid, ':p6', $gg6, 256);
oci_bind_by_name($stid, ':p7', $gg7, 256);

// クエリを実行します
$r = oci_execute($stid);
if (!$r) {
    $e = oci_error($stid);
    self::fnDispError(DB_ERROR, $e['message'], true, DEBUG_MODE);
}

$nrows = oci_fetch_all($stid, $res, null, null, OCI_FETCHSTATEMENT_BY_ROW);
if ($nrows > 0) {
    //Ut_Utils::printR($res);
    $this->arrTest = $res;
} else {
    print("戻り値が空です" . "<br />");
}

// === とりあえず日付渡す
// 日付を計算してテンプレートに割り当て

$dateArray = array();
for ($i = 0; $i < 7; $i++) {
    $nextDate = strtotime("$pp1 +$i days");
    $dayOfWeek = date('w', $nextDate); // 0から6の曜日番号を取得
    $daysOfWeekArray = array("日", "月", "火", "水", "木", "金", "土");
    $formattedDate = date('m/d', $nextDate) . "（" . $daysOfWeekArray[$dayOfWeek] . "）";
    $dateArray[] = $formattedDate;
}

$this->arr_Date = $dateArray;

// === 変数渡し
// $this->ggg3 = $gg3;

// $arr_Yoyaku = [[]];

// 予約時間
//  print("出力01:::" . $gg3 . "<br />");
$arr_Temp = str_split($gg3, 4);


$this->arr_Time = $arr_Temp;

// 空き数
//  print("<br />" . "出力02:::" . $gg4 . "<br />");


$arr_Waku_tmp = str_split($gg4, 2);
$this->arr_Waku = $arr_Waku_tmp;
$this->idx = 0;

$this->counter_01 = 0;
$this->cnt_01 = 0;

$arr_Waku = array();
$chunkSize = ceil(count($arr_Waku_tmp) / 7);
for (
    $i = 0;
    $i < 7;
    $i++
) {
    $arr_Waku[] = array_slice($arr_Waku_tmp, $i * $chunkSize, $chunkSize);
}


// ======================= 予約時間、 空き数を２次元配列へ入れる
$arr_Yoyaku_tmp = array();

$arr_Yoyaku_waku_tmp = array();

foreach ($arr_Temp as $tmp_val) {
    $arr_Yoyaku_tmp[0][] = $tmp_val;
}

foreach ($arr_Waku_tmp as $wak_tmp) {
    $arr_Yoyaku_tmp[1][] = $wak_tmp;
}

for ($i = 0; $i < 7; $i++) {
    $arr_Yoyaku_waku_tmp[0][] = $arr_Waku[0][$i];
}

for ($i = 0; $i < 7; $i++) {
    $arr_Yoyaku_waku_tmp[1][] = $arr_Waku[1][$i];
}

for ($i = 0; $i < 7; $i++) {
    $arr_Yoyaku_waku_tmp[2][] = $arr_Waku[2][$i];
}

for (
    $i = 0;
    $i < 7;
    $i++
) {
    $arr_Yoyaku_waku_tmp[3][] = $arr_Waku[3][$i];
}

for (
    $i = 0;
    $i < 7;
    $i++
) {
    $arr_Yoyaku_waku_tmp[4][] = $arr_Waku[4][$i];
}

for (
    $i = 0;
    $i < 7;
    $i++
) {
    $arr_Yoyaku_waku_tmp[5][] = $arr_Waku[5][$i];
}

for (
    $i = 0;
    $i < 7;
    $i++
) {
    $arr_Yoyaku_waku_tmp[6][] = $arr_Waku[6][$i];
}

// ======================= 予約時間、 空き数を２次元配列へ入れる END
$this->arr_Yoyaku = $arr_Yoyaku_tmp;

$this->arr_Yoyaku_Bi = $arr_Yoyaku_waku_tmp;


//   print("<br />" . "出力03:::" . $gg5 . "<br />");
//   print("<br />" . "出力04:::" . $gg6 . "<br />");
//   print("<br />" . "出力05:::" . $gg7 . "<br />");

oci_free_statement($stid);

//=========================================== end


// ====================================================== start

// 入力文字列
$inputString = "11月10日(金) 11:00"; // または "11月10日(金) 9:00"

// 正規表現を使用して時間部分を抽出
$pattern = '/(\d{1,2}:\d{2})/';
preg_match($pattern, $inputString, $matches);

// === $matches print_r 
/*
    Array
    (
    [0] => 11:00
    [1] => 11:00
    )
*/

if (!empty($matches)) {
    // 時間部分を取得
    $time = str_replace(':', '', $matches[1]);

    // 結果を出力
    echo $time;
} else {
    echo "時間が見つかりませんでした。";
}

// ====================================================== END