<? 
header( "Content-type: application/vnd.ms-excel; charset=euc-kr" ); 
header( "Content-Disposition: attachment; filename=sms".date('Y-m-d').".xls" ); 
header( "Content-Description: PHP4 Generated Data" ); 
print("<meta http-equiv=\"Content-Type\" content=\"application/vnd.ms-excel; charset=euc-kr\">");
	/*
    header( "Content-type: application/vnd.ms-excel; charset=euc-kr" ); 
    header("Content-Disposition: attachment; filename=Excel.xls"); 
    header("Content-Description: PHP4 Generated Data"); 
	 */
	 /*
    $sql    = "�������Է�'"; 
    $stmt    = mysql_query($sql, $connect); 
    $num    = mysql_num_rows($stmt); 
	 */
?> 

<table border="1" cellpadding="1" cellspacing="0"> 
<tr>
 <td><b>NO</b></td>
 <td><b>test</b></td>
 <td><b>test</b></td>
 <td><b>test</b></td>
 <td><b>test</b></td>
</tr>

<? 
	$num=10;
    for($i = 0; $i < $num; $i++) 
    { 
		  echo "<tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td></tr>";
       // $res = mysql_fetch_array($stmt); 
         
       // $j++; 
       // echo "<tr><td>$j</td><td>$res[subject]</td><td>$res[name]</td><td>$res[date]</td><td>$res[hit]</td></tr>";

    } 
    flush(); 
    usleep(1); 
?>

</table>

<!-- 
����Ȯ���ڸ� EXCEL�� �ϴ°Ŷ� �˸������� ���ü�����. 

http://www.phpschool.com/gnuboard4/bbs/board.php?bo_table=qna_function&wr_id=398406

MS���� office���� ����ϴ� ���̺귯�� ����ϸ� �����ڿ� �����ϰ� ����. 

-->