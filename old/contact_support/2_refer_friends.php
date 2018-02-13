<?php
	
	include_once '../config.php';
		
	
	$user_id = $_GET['user_id'];
	$email = $_GET['email'];
	$mobile_no = $_GET['mobile_no'];
	$friend_name = $_GET['friend_name'];
	$referal_code = $_GET['referal_code'];
	
	$sql = "INSERT INTO friend_reffer 
			(`user_id`,`Refer_name`,`Email`,`mobile`,`ReferCode`)
			values('$user_id','$friend_name','$email','$mobile_no','$referal_code')";

	$result1 = mysql_query($sql);
	
	
	
	if ($result1)
	{
		$dql="INSERT INTO enquiry 
		(`ref_code`)
		VALUES('$referal_code')";
		$result2 = mysql_query($dql);
		if ($result2)
		{
			echo "Record Inserted Successfully.";
		}
		else
		{
			echo "failed...";
		}
	}
	else
	{
		echo "failed...";
	}
	include_once '../conn_close.php';
?>