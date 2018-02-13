<?php	
	include '../config.php';
	$get_id2="";
	$get_test_id=$_GET['get_test_id'];
	$result1=mysql_query("SELECT DISTINCT SubID FROM `omrcorrect` WHERE TestID='$get_test_id' ORDER BY SubID,Qno");
	while($row1=mysql_fetch_array($result1))
	{
		$get_id = $row1[0];
		$get_id2=$get_id2.$get_id."-";
	}
	$str=substr($get_id2, 0, -1);
	echo $str;
	include_once '../conn_close.php';
?>