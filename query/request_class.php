<?php
	$uid = $_GET['uid'];
	$fact_id = $_GET['fact_id'];	
	$test_id = $_GET['test_id'];	
		
	require_once("../config.php");
	if($test_id>0)
	{
	$sql = "insert into requirement_posted
	(`test_id`,`student_id`,faculty_id)
	values('$test_id','$uid','$fact_id')";
	$result = mysql_query($sql);
	if ($result)
	{
		//echo "success...";
	}
	else
	{
	//echo $sql;
		echo "failed...";
	}
	}
	else
	{
	echo "select test id";
	}
	
	//include_once '../conn_close.php';
?>