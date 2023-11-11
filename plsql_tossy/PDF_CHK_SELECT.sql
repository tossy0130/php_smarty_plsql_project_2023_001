CREATE OR REPLACE PROCEDURE PDF_CHECK_SELECT (
    P_SID IN VARCHAR2, --セッションID
    P_GYOCD IN NUMBER, --業者コード
 --- P_UKENEND IN NUMBER, -- 受付年度
 --- P_UKEDATE IN NUMBER, -- 受付番号
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
        (
            SELECT
                業者コード,
                業者名,
                受付年度,
                受付番号,
                予約日付,
                死亡者姓,
                死亡者名,
                ROWNUM AS RNUM
            FROM
                PDF_UPDETA
            WHERE
                業者コード = P_GYOCD
                AND 予約日付 BETWEEN (
                    SELECT
                        MIN(予約日付)
                    FROM
                        PDF_UPDETA
                    WHERE
                        業者コード = P_GYOCD
                ) AND (
                    SELECT
                        MAX(予約日付)
                    FROM
                        PDF_UPDETA
                    WHERE
                        業者コード = P_GYOCD
                )
        )
    WHERE
        RNUM <= 100;
 --- WHERE rnum <= 100; LIMIT 100; の役割
 --- レコードの宣言
    R_WK1 C_WK1%ROWTYPE;
 /*======================================
  本体
======================================*/
BEGIN
 --- 初期処理
    P_RSLT := 0;
    P_SQLCODE := 0;
    P_SQLERRM := NULL;
 --- テンプテーブル　クリア
    DELETE FROM TMP_PDF_UPDETA
    WHERE
        SID = P_SID;
 --- 業者コードが NULLじゃなかった場合
    IF P_GYOCD IS NOT NULL THEN
        FOR R_WK1 IN C_WK1 LOOP
            INSERT INTO TMP_PDF_UPDETA(
                SID, --- セッションID
                GYOUSYA_CD, --- 業者コード
                GYOUSA_MEI, --- 業者名
                UKETUKE_NENDO, --- 受付年度
                UKETUKE_NUM, --- 受付番号
                YOYAKU_DATE, --- 予約日付
                SIBOUSHA_SEI, --- 死亡者姓
                SIBOUSHA_MEI --- 死亡者名
            ) VALUES (
                P_SID,
                R_WK1.業者コード,
                R_WK1.業者名,
                R_WK1.受付年度,
                R_WK1.受付番号,
                R_WK1.予約日付,
                R_WK1.死亡者姓,
                R_WK1.死亡者名
            );
        END LOOP;
    END IF;
 /*======================================
 例外処理
======================================*/
EXCEPTION
    WHEN OTHERS THEN
        P_RSLT := 99;
        P_SQLCODE := SQLCODE;
        P_SQLERRM := SQLERRM;
END;