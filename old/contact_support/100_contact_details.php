<?php
	
	
	include_once '../config.php';
		
	$user_id = $_GET['user_id'];
	$email = $_GET['email_id'];
	$contact_no = $_GET['mobile_id'];
	$name = $_GET['name'];
	
	$res_del=mysql_query("DELETE FROM `contact_details_update_tb` WHERE user_id='$user_id'");
	
	$sql = "INSERT INTO `contact_details_update_tb` 
			(`user_id`,`name`,`mobile_no`,`email_id`)
			VALUES('$user_id','$name','$contact_no','$email')";
		
	$result1 = mysql_query($sql);
	
	if ($result1)
	{
		echo "Record will be updated after varification.";
	}
	else
	{
		echo "failed...";
	}
	include_once '../conn_close.php';
?>