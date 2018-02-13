<?php	
	include '../config.php';
	
	$get_test_id=$_GET['get_test_id'];
	$result1=mysql_query("SELECT MAX(Qno) FROM onlineuniqid WHERE TestID='$get_test_id'");
	$row1=mysql_fetch_array($result1);
	
	$result2=mysql_query("SELECT MIN(Qno) FROM onlineuniqid WHERE TestID='$get_test_id'");
	$row2=mysql_fetch_array($result2);
	
	echo $row2[0]."-".$row1[0];
	include_once '../conn_close.php';
?>