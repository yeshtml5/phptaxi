<?
if($mode == "excel"){
		## 엑셀파일 저장헤드
		$file_name = "exceltest.xls";
    header("Pragma:");
    header("Cache-Control:");
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=$file_name");
    header("Content-Description: PHP5 Generated Data");

}

echo "<a href='{$PHP_SELF}?mode=excel'><font color='##3300CC'>[엑셀파일 다운로드]</font></a>";

$borderwid = 1; // 엑셀 파일에서는 border가 있어야 줄이 생김
if($mode != "excel")
{
$borderwid = 0; // 화면 출력에서는 boder 0으로 
}

if($mode != "excel"){			
?>
  파일에서는 이부분 안보임
<?
}
?>
<table width='1200' border='<?=$borderwid?>' cellspacing=1 cellpadding=3 bgcolor="#5B8398">
	<tr bgcolor="65CBFF" align=center>
		<td align="center">번호</td>
		<td align="center">이름</td>
		<td align="center">전화번호</td>
	</tr>	
	<tr bgcolor="#FFFFFF" align=center>
		<td align="center">1</td>
		<td align="center">홍길동</td>
		<td align="center">010-1234-5678</td>
	</tr>	
</table>			
