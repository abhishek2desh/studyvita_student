<?php
	
		include_once '../config.php';
		
		$test_id=$_GET['test_id'];
		$uid=$_GET['uid'];
		
		$factid="";
		$result=mysql_query("SELECT facultyid FROM `onlinequestionbank` WHERE uniqid='$uid'");
		$rw = mysql_num_rows($result);
		$row=mysql_fetch_array($result);
		$factid=$row[0];
	if($factid=="")
	{
	echo "Uploaded by Globaleduserver";
	}
	
	else
	{
	$result1=mysql_query("SELECT created_by,name from `user` where id='$factid'");
	$rw1 = mysql_num_rows($result1);
		$row1=mysql_fetch_array($result1);
		$created_by=$row1[0];
		$uname=$row1[1];
		if($created_by=="")
		{
		echo "Uploaded by ".$uname;
		}
		else
		{
		$result2=mysql_query("SELECT name from `user` where id='$created_by'");
		$rw2 = mysql_num_rows($result2);
		$row2=mysql_fetch_array($result2);
		$uname=$row2[0];
		echo "Uploaded by ".$uname;
		}
	}
		
		include_once '../conn_close.php';
?>