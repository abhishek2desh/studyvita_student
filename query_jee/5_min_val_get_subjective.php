<?php	
	include '../config.php';
	
	$get_test_id=$_GET['get_test_id'];
	
	
	
	$result3=mysql_query("SELECT DISTINCT ta.duration FROM test_announce ta,que_paper q WHERE ta.que_paper_id=q.id AND q.name='$get_test_id' ");
	$row3=mysql_fetch_array($result3);
	echo $row3[0];
	//$str=1;
	//echo $str;
	include_once '../conn_close.php';
?>