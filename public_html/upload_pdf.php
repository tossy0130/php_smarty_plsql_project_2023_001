<?php

ini_set('display_errors', 1);

require('../vendor/autoload.php');
require('../class/db.php');

require('../class/constant.php'); // 定数クラス

require('./functions.php');

// === PDF ライブラリ
require('../tcpdf/tcpdf.php');

$fontPath = __DIR__ . '/../tcpdf/fonts/'; // フォントディレクトリのパスを指定
$font = $fontPath . 'ipag.ttf'; // フォントファイルへのパスを指定

$smarty = new Smarty;
$smarty->setTemplateDir('../templates/');
$smarty->setCompileDir('../templates_c/');

$pdf_flg = 0;


// データベース接続情報を設定
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($conn->connect_error) {
    die('DB connect エラー:' . $conn->connect_error);
}

$get_user = array();
if (isset($_GET['id'])) {
    // クエリのプリペアドステートメントを準備
    $sql = "SELECT * FROM smarty_users WHERE id = ?";
    $user_id = $_GET['id'];

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);

    // クエリを実行
    if ($stmt->execute()) {
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // ユーザー情報を配列に格納
            $row = $result->fetch_assoc();

            $userData = array(
                'id' => $row['id'],
                'name' => $row['name'],
                'email' => $row['email'],
            );

            $today = date("Y-m-d");

            $file_dir = __DIR__ . '/' . "PDF";

            MK_DIR($file_dir);

            //  $pdfFileName = dirname(__FILE__) . "\\" . $userData['id'] . "_" . $today . "_" . "user_info.pdf";
            // $pdfFileName = "./" . $userData['id'] . "_" . $today . "_" . "user_info.pdf";
            $pdfFileName = __DIR__ . '/' . $userData['id'] . "_" . $today . "_" . "user_info.pdf";

            $pdfFileName_view = $userData['id'] . "_" . $today . "_" . "user_info.pdf";



            // PDFを生成 using TCPDF
            /*
            $pdf = new TCPDF();
            $pdf->AddPage();
            */

            // ============================= PDF 作成

            /*
            $pdf = new TCPDF(
                "L",
                "mm",
                "A4",
                true,
                "UTF-8"
            );
            $pdf->setPrintHeader(false);
            $pdf->setPrintFooter(false);
            $pdf->AddPage();

            $pdf->SetFont('kozminproregular', '', 24);


            // $pdf->SetFont('dejavusans', '', 12); // Set the font and size
            /*
            $pdf->AddFont('ipag', '', $font);
            $pdf->SetFont('ipag', '', 12); // 'ipag'はipag.ttfのフォント名
            */

            /*
            $pdf->Cell(40, 10, '文書作成テスト test:');
            $pdf->Ln(10);
            $pdf->Cell(40, 10, 'ID: ' . $userData['id']);
            $pdf->Ln(10);
            $pdf->Cell(40, 10, 'Name: ' . $userData['name']);
            $pdf->Ln(10);
            $pdf->Cell(40, 10, 'Email: ' . $userData['email']);


            $pdf->Output(
                $pdfFileName,
                'F'
            );
            */

            // ============================= PDF 作成
            $pdf = new TCPDF(
                "L",
                "mm",
                "A4",
                true,
                "UTF-8"
            );
            $pdf->setPrintHeader(false);
            $pdf->setPrintFooter(false);
            $pdf->AddPage();

            // 日本語フォントの設定
            $font = $fontPath . 'kozminproregular.ttf'; // 日本語フォントファイルへのパスを指定
            $pdf->SetFont('kozminproregular', '', 24);

            // HTML風のマークアップでPDFのコンテンツを構築
            $html = '
    <h1 style="color: #000; font-size: 55px;">文書作成テスト test:</h1>
    <p>ID: ' . $userData['id'] . '</p>
    <p>Name: ' . $userData['name'] . '</p>
    <p>Email: ' . $userData['email'] . '</p>
';

            // HTMLをPDFに追加
            $pdf->writeHTML(
                $html,
                true,
                false,
                true,
                false,
                ''
            );

            $pdf->Output(
                $pdfFileName,
                'F'
            );

            // ============================= PDF 作成　END

            // print($file_dir . "<br />");
            // C:\xampp\htdocs\smarty_p_01\public_html/PDF

            // print($pdfFileName . "<br />");
            // C:\xampp\htdocs\smarty_p_01\public_html/1_2023-11-01_user_info.pdf

            // PDFの生成が成功したらアップロード
            if (file_exists($pdfFileName)) {
                // アップロードディレクトリのパス
                $uploadDir = __DIR__ . '/uploads/';



                // アップロード処理
                if (copy($pdfFileName, $uploadDir . $pdfFileName_view)) {
                    echo "PDFファイルがアップロードされました。";
                    print("アップロード先ディレクトリ::::" . $uploadDir);
                } else {
                    echo "PDFファイルのアップロードに失敗しました。";
                }
            } else {
                echo "PDFファイルの生成に失敗しました。";
            }
        } else {
            // ユーザーが見つからない場合のエラーメッセージなどを処理
            echo "指定のIDからは作成できません。";
        }
    } else {
        die('クエリ実行エラー: ' . $stmt->error);
    }

    // ステートメントをクローズ
    $stmt->close();

    if ($pdf_flg === 1) {
        // 成功時の処理
    } else {
        return;
    }
}
