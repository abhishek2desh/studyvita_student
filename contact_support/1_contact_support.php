<?php
	
	include_once '../config.php';
		
	
	$user_id = $_GET['user_id'];
	$email = $_GET['email'];
	$contact_no = $_GET['contact_no'];
	$cm_id = $_GET['cm_id'];
	
	
	$date_time = date('Y-m-d H:i:s');
	
	$result=mysql_query("select max(support_id) from contact_support");
	$row=mysql_fetch_array($result);
	$max_id=$row[0];
	$max_id2=$max_id+1;
	
	$sql = "INSERT INTO contact_support 
			(`support_id`,`user_id`,`date_time`,`email_id`,`mobile_no`,`comment`)
			values('$max_id2','$user_id','$date_time','$email','$contact_no','$cm_id')";

	$result1 = mysql_query($sql);
	
	if ($result1)
	{
		echo "Record Inserted Successfully.";
	}
	else
	{
		echo "failed...";
	}
	include_once '../conn_close.php';
?>