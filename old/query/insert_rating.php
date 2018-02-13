<?php
	include_once '../config.php';
	$user_id = $_GET['user_id'];
	$wb_id = $_GET['wb_id'];
	$rating = $_GET['score'];
	
	$result_1=mysql_query("SELECT id FROM rating WHERE student_id='$user_id' AND wb_id='$wb_id'");
	$row=mysql_num_rows($result_1);
	
	if($row == 0)
	{
		$sql = "insert into rating(`student_id`,`wb_id`,`rating`)values('$user_id','$wb_id','$rating')";
		$result = mysql_query($sql);
		if ($result)
		{
			echo "success...";
		}
		else
		{
			echo "failed...";
		}
	}
	else
	{
		$row=mysql_fetch_array($result_1);
		$id = $row[0];
		$sql = "UPDATE rating SET rating='$rating' WHERE id='$id'";
		$result = mysql_query($sql);
		if ($result)
		{
			echo "success...";
		}
		else
		{
			echo "failed...";
		}
	}
	include_once '../config.php';
?>