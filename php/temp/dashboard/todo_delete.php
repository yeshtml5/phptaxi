<?php include_once($_SERVER['DOCUMENT_ROOT']."/php/common/db_connect.php"); ?><!-- php connect-->
<?php

/************************************************************/
$id=$_POST['row_id'];
$sql="DELETE FROM `$db_name`.`todo` WHERE `todo`.`id` = '$id' ";
/************************************************************/

if(mysqli_query($conn, $sql)){
	echo "Data Succuss";	
	header("Location:/");
}else{
	echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
?>
<?php include_once($_SERVER['DOCUMENT_ROOT']."/php/common/db_close.php"); ?><!-- php close-->