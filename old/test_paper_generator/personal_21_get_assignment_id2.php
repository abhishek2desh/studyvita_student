<?php 
	
	include_once '../config.php';
	
	$test_id = $_GET['test_id'];
	
	$result=mysql_query("SELECT DISTINCT Assignment_id FROM `personalassignment_response` WHERE test_id='$test_id' ");
	
	echo "<option value='0'>Select AssignmentID</option>";
	while($row=mysql_fetch_array($result))
	{
		echo "<option value='$row[0]'>$row[0]</option>";
	}
	include_once '../conn_close.php';
?>