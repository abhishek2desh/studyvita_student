<?php
	$uname = $_GET['uname'];
	$umobile = $_GET['umobile'];	
	$fmobile = $_GET['fmobile'];
	$uemail = $_GET['uemail'];
	$pemail = $_GET['pemail'];
	$fname = $_GET['fname'];
	$uid = $_GET['uid'];
	//$wb = $_GET['wb_id'];

	include_once '../config.php';
	
	$sql = "UPDATE student_details SET sname='$uname',sfullname='$uname',father_name='$fname',`f_mob_no`='$fmobile',`pe_mailid`='$pemail',mobile_no='$umobile' WHERE user_id='$uid'";
	//echo $sql;
	$result = mysql_query($sql);
	if ($result)
	{
		echo "update";
	}
	else
	{
		echo "failed...";
	}
	include_once '../conn_close.php';
?>