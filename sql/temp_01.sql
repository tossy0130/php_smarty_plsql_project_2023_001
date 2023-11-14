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

------------------------------------------------------- start

--------- 空で出力
SELECT
    NVL(HBYWM.予約枠数, YWM.予約枠数) - NVL(YKT.件数, 0) AS 空数
FROM
    予約枠   YWM
    INNER JOIN 予約枠名称 YNM
    ON YWM.KEY2 = YNM.KEY2
    INNER JOIN 日別予約枠 YDM
    ON YWM.KEY2 = YDM.KEY2
    INNER JOIN (
        SELECT
            YR.KEY2       AS 予約枠番号,
            MAX(YR.予約枠数)  AS 予約枠数,
            MAX(NYM.予約枠数) AS 市外予約上限数
        FROM
            日別予約枠 NYM
            LEFT JOIN 予約枠 YR
            ON NYM.KEY2 = YR.KEY2
        WHERE
            NYM.日付 = TO_DATE('2323-11-19', 'YYYY-MM-DD')
        GROUP BY
            YR.KEY2
    ) HBYWM
    ON YWM.KEY2 = HBYWM.予約枠番号
    LEFT JOIN (
        SELECT
            予約枠番号,
            COUNT(*) AS 件数
        FROM
            予約管理テーブル
        WHERE
            予約日 = TO_DATE('2323-11-19', 'YYYY-MM-DD')
            AND ( (受付年度 <> NVL(2023, 0))
            OR (受付番号 <> NVL(193, 0)) )
        GROUP BY
            予約枠番号
    ) YKT
    ON YWM.KEY2 = YKT.予約枠番号
WHERE
    YWM.適用開始日 <= TO_DATE('2323-10-19', 'YYYY-MM-DD')
    AND ( YWM.適用開始日 <= TO_DATE('2323-10-19', 'YYYY-MM-DD')
    OR YWM.適用開始日 IS NULL )
    AND YWM.KEY2 = 5;

------------------------------------------------------- END

------------------------------------------------------- start

--- ほぼ修正前　　出力 2

SELECT
    NVL(HBYWM.予約枠数, YWM.予約枠数) - NVL(YKT.件数, 0) AS 空数
FROM
    予約枠マスタ  YWM,
    予約時間マスタ YJM,
    (
        SELECT
            予約枠番号,
            予約枠数,
            市外予約上限数
        FROM
            日別予約枠マスタ
        WHERE
            予約日 = '2323-11-19'
    )       HBYWM,
    (
        SELECT
            予約枠番号,
            COUNT(*) AS 件数
        FROM
            予約管理テーブル
        WHERE
            予約日 = '2323-11-19'
            AND ((受付年度 <> NVL(2023, 0))
            OR (受付番号 <> NVL(193, 0)))
        GROUP BY
            予約枠番号
    )       YKT
WHERE
    YWM.予約時間番号 = YJM.予約時間番号
    AND YWM.予約枠番号 = HBYWM.予約枠番号(+)
    AND YWM.予約枠番号 = YKT.予約枠番号(+)
    AND YWM.適用開始日 <= '2323-11-19'
    AND ((YWM.適用終了日 >= '2323-11-19')
    OR (YWM.適用終了日 IS NULL))
    AND YWM.予約枠番号 = 5;

------------------------------------------------------- END

------------------------------------------------------- start

---------　出力：エラー
SELECT
    NVL(HBYWM.予約枠数, YWM.予約枠数) - NVL(YKT.件数, 0) AS 空数
FROM
    予約枠 YWM,
    (
        SELECT
            HYW.予約枠番号,
            HYW.予約枠数
        FROM
            日別予約枠 HYW,
            予約枠名称 YWMM
        WHERE
            HYW.日付 >= TO_DATE('2323-11-19', 'YYYY-MM-DD')
            AND YWMM.予約枠番号 = HYW.予約枠番号
    )   HBYWM,
    (
        SELECT
            予約枠番号,
            COUNT(*) AS 件数
        FROM
            予約管理テーブル
        WHERE
            予約日 = TO_DATE('2323-11-19', 'YYYY-MM-DD')
            AND ((受付年度 <> NVL(2023, 0))
            OR (受付番号 <> NVL(193, 0)))
        GROUP BY
            予約枠番号
    )   YKT
WHERE
    YWM.予約枠番号 = HBYWM.予約枠番号(+)
    AND YWM.予約枠番号 = YKT.予約枠番号(+)
    AND YWM.適用開始日 <= TO_DATE('2323-11-19', 'YYYY-MM-DD')
    AND ((YWM.適用開始日 <= TO_DATE('2323-11-19', 'YYYY-MM-DD'))
    OR (YWM.適用開始日 IS NULL))
    AND YWM.予約枠番号 = 5;

------------------------------------------------------- END

------------------------------------------------------- start

----------------------------- 大本
--空き数確認用
CURSOR C_WK1(V_YWAKU NUMBER) IS

SELECT
    NVL(HBYWM.予約枠数, YWM.予約枠数) - NVL(YKT.件数, 0) AS 空数
FROM
    予約枠マスタ  YWM,
    予約時間マスタ YJM,
    (
        SELECT
            予約枠番号,
            予約枠数,
            市外予約上限数
        FROM
            日別予約枠マスタ
        WHERE
            予約日 = P_YDATE
    )       HBYWM,
    (
        SELECT
            予約枠番号,
            COUNT(*) AS 件数
        FROM
            予約管理テーブル
        WHERE
            予約日 = P_YDATE
            AND ((受付年度 <> NVL(P_UKENEND, 0))
            OR (受付番号 <> NVL(P_UKECD, 0)))
        GROUP BY
            予約枠番号
    )       YKT
WHERE
    YWM.予約時間番号 = YJM.予約時間番号
    AND YWM.予約枠番号 = HBYWM.予約枠番号(+)
    AND YWM.予約枠番号 = YKT.予約枠番号(+)
    AND YWM.適用開始日 <= P_YDATE
    AND ((YWM.適用終了日 >= P_YDATE)
    OR (YWM.適用終了日 IS NULL))
    AND YWM.予約枠番号 = V_YWAKU;

------------------------------------------------------- END