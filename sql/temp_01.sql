--------------------------------------------------------------------
----------------- PDF_UPDETA 、業者で絞って、予約日のMIN and MAX で抽出
--------------------------------------------------------------------
SELECT
    *
FROM
    PDF_UPDETA
WHERE
    業者コード = 9999
    AND 予約日付 BETWEEN (
        SELECT
            MIN(予約日付)
        FROM
            PDF_UPDETA
        WHERE
            業者コード = 9999
    ) AND (
        SELECT
            MAX(予約日付)
        FROM
            PDF_UPDETA
        WHERE
            業者コード = 9999
    );