<?php include_once($_SERVER['DOCUMENT_ROOT']."/php/common/db_connect.php"); ?><!-- php connect-->
<?php

/************************************************************/
$title=htmlspecialchars($_POST['title']);
$sql="INSERT INTO `$db_name`.`todo` (`id`, `check`, `title`, `date`) VALUES (NULL, '0', '$title', CURRENT_DATE())";
/************************************************************/

if(mysqli_query($conn, $sql)){
	echo "Data Succuss";
	header("Location:/");
}else{
	echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
?>
<?php include_once($_SERVER['DOCUMENT_ROOT']."/php/common/db_close.php"); ?><!-- php close-->