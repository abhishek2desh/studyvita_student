<?php
	include '../config.php';
	
	$uid=$_GET['uid'];
	$test_id=$_GET['test_id'];
	$result=mysql_query("SELECT Test_submit FROM personalassignment_studentwise WHERE Student_id='$uid'  AND test_id='$test_id' AND Test_Submit !='1'");
	$rw=mysql_num_rows($result);
	if($rw == "")
	{
	
	}
	else
	{
		$row=mysql_fetch_array($result);
		$get=$row[0];
		if($get == '1')
		{
			echo "GOT";
		}
		else
		{
			
		}
	}
	include_once '../conn_close.php';
?>