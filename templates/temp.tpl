<!DOCTYPE html>
<html>
<head>
    <title>smaty テンプレート テクニックメモ</title>
</head>
<body>


<!-- ============================================== start ============================== -->

<!-- 

火葬時刻	11/08（水）	11/09（木）	11/10（金）	11/11（土）	11/12（日）	11/13（月）	11/14（火）
1000	03	03	03	03	03	03	03
1100	03	03	02	03	03	03	03
1300	03	03	03	03	03	03	03
1400	03	03	03	03	03	03	03
1500	02	02	02	02	02	02	02
1600	02	02	02	02	02	02	02
1700	02	02	02	02	02	02	02

-->
<!-- 上記ように出力する  php側は、temp.php に記載-->


<!-- ==========  火葬時刻 日付  =========== -->
<tr>
    <th class="alignC">火葬時刻</th>
    <!--{foreach from=$arr_Date item=next_day}-->
        <th class="alignC">
            <!--{$next_day}-->
        </th>
    <!--{/foreach}-->
</tr>

  
    <!--{assign var=counter_01 value="$counter_01"}-->
    <!--{assign var="cnt_01" value="$cnt_01"}-->

  <!--{foreach from=$arr_Time item=date name=outerLoop}-->
    <tr>
        <td class="alignC"><!--{$date}--></td>
        <!--{assign var=tableDataIndex value=$smarty.foreach.outerLoop.iteration-1}-->
        <!--{foreach from=$arr_Yoyaku_Bi[$tableDataIndex] item=cell}-->
            <td class="alignC">
                <a class="underline" href="javascript:;"><!--{$cell}--></a>
            </td>
        <!--{/foreach}-->
    </tr>
<!--{/foreach}-->

</table>

<!-- ============================================== END ============================== -->


<!-- ============================================== start ============================== -->

<!-- ================ 対象の配列に値が入っていた場合、その行の色を返る　========== -->
<!-- 具体例： PDFファイルが一度アップロードされていた場合、対象のデータの行の色を変える or 
    もしくは送信した事がわかるようにする -->


   <!--{* 検索結果表示テーブル *}-->
            <table class="list">
                <col width="5%" />
                <col width="15%" />
                <col width="15%" />
                <col width="10%" />
                <col width="15%" />
                <col width="12%" />
                <col width="13%" />
                <col width="10%" />
                <col width="5%" />
                <tr>
                    <th class="alignC">No.</th>
                    <th class="alignL">死亡者名</th>
                    <th class="alignL">火葬予約日時</th>
                    <th class="alignC">待合室</th>
                    <th class="alignC">霊柩車</th>
                    <th class="alignC">式場利用</th>
                    <th class="alignC">通夜式</th>
                    <th class="alignC">担当者</th>
                    <th class="alignC">受付</th>
                    <th class="alignC">PDF アップ</th>
                    
                </tr>

                 <!--{assign var=PDF_CHK_FLG_T value="$PDF_CHK_FLG"}-->
                 <!--{assign var=arrPdf_CK_T value="$arrPdf_CK"}-->

                <!--{section name=cnt loop=$arrRsv}-->

                 <tr <!--{if in_array($arrRsv[cnt].KOJIN_NAME, $arrPdf_CK)}-->style=""<!--{/if}-->>

                        <td class="alignL">
                         

                        <!--{$arrRsv[cnt].GYO_NO}-->
                        
                        </td>
                        <!--{assign var=YOYAKUBI_STRING value="`$arrRsv[cnt].YOYAKU_TIME`"}-->
                        <td class="alignL"><a href="javascript:;" onclick="main.set3KeyAndSubmit('form1', 'reserve_edit', 'UKE_NEND', '<!--{$arrRsv[cnt].UKE_NEND}-->', 'UKE_NO', '<!--{$arrRsv[cnt].UKE_NO}-->',  'YOYAKUBI_STRING', '<!--{$YOYAKUBI_STRING}-->'); return false;"><!--{$arrRsv[cnt].KOJIN_NAME}--></a>
                        
                        </td>
                        
                       

                        <td class="alignL"><!--{$arrRsv[cnt].YOYAKU_TIME}--></td>

<!-- 追加 2023_1010 夏目 -->
                        <td class="alignL">
                        <!--{if $arrRsv[cnt].MCS_YOYAKU ==""}-->
                                利用しない
                        <!--{else}-->
                             <!--{$arrRsv[cnt].MCS_YOYAKU}-->
                        <!--{/if}-->
                       
                        </td>

                        <td class="alignL">
                        <!--{if $arrRsv[cnt].RKS_YOYAKU ==""}-->
                                利用しない
                        <!--{else}-->
                                <!--{$arrRsv[cnt].RKS_YOYAKU}-->
                        <!--{/if}-->
                        </td>

                        <td class="alignL">
                        <!--{if $arrRsv[cnt].SKJ_YOYAKU == ""}-->
                            利用しない
                        <!--{else}-->
                            <!--{$arrRsv[cnt].SKJ_YOYAKU}-->
                        <!--{/if}-->
                        </td>

                        <td class="alignL">
                        <!--{if $arrRsv[cnt].TYA_YOYAKU == ""}-->
                            利用しない
                        <!--{else}-->
                             <!--{$arrRsv[cnt].TYA_YOYAKU}-->
                        <!--{/if}-->

                        </td>
                        <td class="alignL"><!--{$arrRsv[cnt].TANTO_NAME}--></td>
                        <td class="alignL">
                            <!--{assign var='UKETUKE' value=`$arrRsv[cnt].SAIJO_UKEKB`}-->
                            <!--{if $UKETUKE == 1}-->
                                済
                            <!--{else}-->
                                未    
                            <!--{/if}-->
                        </td>

                        <!-- ========　追加 23_11_01 夏目 ======== -->
                        <td class="alignL">

                            <!--{if in_array($arrRsv[cnt].KOJIN_NAME, $arrPdf_CK)}-->
                            <span class="pdf-sent-label">PDF<br />送信済み</span>
                            <!--{/if}-->

                            <form action="./generate_pdf.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="uknum" value="<!--{$arrRsv[cnt].UKE_NO}-->">
                                <input type="hidden" name="y_year" value="<!--{$arrRsv[cnt].UKE_NEND}-->">
                                <input type="hidden" name="gnum" value="<!--{$gyosya_number}-->">
                                <input type="hidden" name="yoyakubi_str" value="<!--{$arrRsv[cnt].YOYAKU_TIME}-->">
                                <input type="file" name="pdfFile" accept=".pdf">
                                <input type="submit" value="アップロード">
                            </form>
                        </td>

                    </tr>

                <!--{/section}-->
            </table>



</body>