<?php

/**
* ================== 23_1110 追加 pdfアップロードチェック　夏目
*/
public function PDF_UPCHK()
{

// OCI
$conn = oci_connect(DB_USER, DB_PASSWORD, DB_CONNECTION_STRING, DB_CHARSET);

if (!$conn) {
$e = oci_error();
self::fnDispError(DB_ERROR, $e['message'], true, DEBUG_MODE);
}

$status = NULL;
$errcode = NULL;
$errmsg = NULL;

$sid = $this->session->getSid();
$gyosya_number = $this->session->getSession("gyosya_number");

print("PDF_UPCHK:::" . $gyosya_number);

// === PDFがアップされているか確認用プロシージャ呼び出し PDF_CHECK_SELECT （前橋用 新規）
$stid = oci_parse($conn, 'begin PDF_CHECK_SELECT(:p1, :p2, :p3, :p4, :p5); end;');

oci_bind_by_name($stid, ':p1', $sid);
oci_bind_by_name($stid, ':p2', $gyosya_number);
oci_bind_by_name($stid, ':p3', $status, 4);
oci_bind_by_name($stid, ':p4', $errcode, 8);
oci_bind_by_name($stid, ':p5', $errmsg, 256);

// クエリを実行します
$r = oci_execute($stid);
if (!$r) {
$e = oci_error($stid);
self::fnDispError(DB_ERROR, $e['message'], true, DEBUG_MODE);
}

// PDF アップ判別リスト　取得
$sql = "SELECT * FROM TMP_PDF_UPDETA WHERE SID = :sid";

$stid = oci_parse($conn, $sql);
if (!$stid) {
$e = oci_error($conn);
self::fnDispError(DB_ERROR, $e['message'], true, DEBUG_MODE);
}
oci_bind_by_name($stid, ':sid', $sid);

$r = oci_execute($stid);
if (!$r) {
$e = oci_error($stid);
self::fnDispError(DB_ERROR, $e['message'], true, DEBUG_MODE);
}

$nrows = oci_fetch_all($stid, $get_r, null, null, OCI_FETCHSTATEMENT_BY_ROW);

// === 判別用に値を加工
$Get_Pdf_arr = array();

// 
for ($i = 0; $i < count($get_r); $i++) {
        $arr_sec = $get_r[$i];
        foreach ($arr_sec as $key => $value) {
            if ($key == "UKETUKE_NUM") {
                $Get_Pdf_arr[$i] = $value . ":";
            }

            if ($key == "SIBOUSHA_SEI") {
                $Get_Pdf_arr[$i] .= $value;
            }

            if ($key == "SIBOUSHA_MEI") {
                $Get_Pdf_arr[$i] .= $value;
            }
        }
} // ============ end for

oci_free_statement($stid);
}

?>