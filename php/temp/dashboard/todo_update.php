<?php include_once($_SERVER['DOCUMENT_ROOT']."/php/common/db_connect.php"); ?><!-- php connect-->
<?php

/************************************************************/
$id=$_GET['row_id'];
$check=$_GET['check'];
$sql="UPDATE `$db_name`.`todo` SET `check`= '$check' WHERE `id`='$id' ";
/************************************************************/

if(mysqli_query($conn, $sql)){
	echo "Data Succuss";
	header("Location:/");
}else{
	echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
?>
<?php include_once($_SERVER['DOCUMENT_ROOT']."/php/common/db_close.php"); ?><!-- php close-->