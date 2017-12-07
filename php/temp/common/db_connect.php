<?php
/* Config Start */
$db_host='localhost';
$db_user='phpnekr';
$db_pwd='phpcml0cml0';
$db_name='phpnekr';
/************************************************************/
$conn=mysqli_connect($db_host,$db_user,$db_pwd,$db_name);

if (!$conn) {
	echo "Error: Unable to connect to MySQL." . PHP_EOL;
	echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
	echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	die('could not connect:'.mysqli_error($conn));
	exit;
};
$query='SHOW TABLES';
$result=mysqli_query($conn,$query);
if(!$result){
	echo("Query Error :<br>".mysqli_error($conn));
}
$row = mysqli_fetch_assoc($result);
while($row=mysqli_fetch_assoc($queryData)){
echo '<tr><form action="./management.php?mode=modify" method="POST">
	<td><input name="id" value="'.$row['id'].'" readonly size=1/></td>
	<td><input name="url" value="'.$row['url'].'"/></td>
	<td><input name="desc" value="'.$row['description'].'"/></td>
	<td>
	<input type="submit" value="MODIFY"/>
	</form>
	<form action="./management.php?mode=delete" method="POST">
	<input type="hidden" name="id" value="'.$row['id'].'"/>
	<input type="submit" value="DELETE"/>
	</form>
	</td>';
}
echo "<script>console.log('DB_CONNECT');</script>";

?>
