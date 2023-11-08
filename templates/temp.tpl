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


</body>