CREATE OR REPLACE PROCEDURE PDF_UPCHECK (
    P_GYOCD IN NUMBER, --業者コード
    P_UKENEND IN NUMBER, -- 受付年度
    P_UKECD IN NUMBER, -- 受付番号
    P_RSLT OUT NUMBER, --ステータス(0:正常終了　99:エラー)
    P_SQLCODE OUT NUMBER, --エラーコード
    P_SQLERRM OUT VARCHAR2 --エラーメッセージ
)
 /*******************************************************************************
* 関数名 : PDF_UPCHECK
* 作成者 : 夏目
* 作成日 : 2023/11/10
* 概要   : Web予約 PDF_UPロードチェック用プロシージャ
* 機能   : PDF（埋火葬許可書）がアップロードされたかチェック用のデータを作成
* 履歴   : 2023/11/10    夏目      新規
*          

※＝＝＝　予約時間もパラメータで渡せるので、必要に応じて追加できる。

暗証番号
予約日
死亡者姓
死亡者名
取得して、INSERT

*******************************************************************************/
 /*======================================
  変数宣言
======================================*/ IS
    CURSOR C_WK1 IS
    SELECT
        業者コード,
        業者名,
        受付年度,
        受付番号,
        予約日付,
        死亡者姓,
        死亡者名
    FROM
        火葬受付
    WHERE
        業者コード = P_GYOCD --- 業者コード
        AND 受付年度 = P_UKENEND --- 受付年度
        AND 受付番号 = P_UKECD; --- 受付番号
 --ﾚｺｰﾄﾞ宣言
    R_WK1 C_WK1%ROWTYPE;
 /*======================================
  本体
======================================*/
BEGIN
 --初期処理
    P_RSLT := 0;
    P_SQLCODE := 0;
    P_SQLERRM := NULL;
 -- カーソルオープン
    OPEN C_WK1;
 -- カーソルフェッチ
    FETCH C_WK1 INTO R_WK1;
    IF C_WK1%FOUND THEN
 --- 業者コードが NULLじゃなかった場合
        IF P_GYOCD IS NOT NULL THEN
            INSERT INTO PDF_UPDETA (
                業者コード,
                業者名,
                受付年度,
                受付番号,
                予約日付,
                死亡者姓,
                死亡者名
            ) VALUES (
                R_WK1.業者コード,
                R_WK1.業者名,
                R_WK1.受付年度,
                R_WK1.受付番号,
                R_WK1.予約日付,
                R_WK1.死亡者姓,
                R_WK1.死亡者名
            );
        END IF;
    ELSE
        DBMS_OUTPUT.PUT_LINE('Fetchができない');
    END IF;
 -- カーソルクローズ
    CLOSE C_WK1;
 /*======================================
 例外処理
======================================*/
EXCEPTION
    WHEN OTHERS THEN
        P_RSLT := 99;
        P_SQLCODE := SQLCODE;
        P_SQLERRM := SQLERRM;
END;