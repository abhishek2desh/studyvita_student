<?php
	$uid = $_GET['uid'];
	$fact_id = $_GET['fact_id'];	
		
		
	require_once("../config.php");
	
	$sql = "insert into requirement_posted
	(`student_id`,faculty_id)
	values('$uid','$fact_id')";
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
	
	
	
	//include_once '../conn_close.php';
?>