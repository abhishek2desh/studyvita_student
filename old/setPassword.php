<?php
	session_start();
	include_once 'config.php';
	$user=$_SESSION['ssid'];
	
	if(isset($_GET['sid']))
	{
	//	mysql_pconnect("localhost","edutechviewer34","edutechviewer34");
	//	mysql_pconnect("localhost","root","");
	//	mysql_select_db("learning34");
		$result=mysql_query("UPDATE student SET password='".$_GET['sid']."' WHERE edutech_student_id=".$user);
		
		if(! $result )
		{
		  die('Could not Set Your Password: ' . mysql_error());
		}
		echo "Successfully Set Your Password...";
		
	}
	include 'conn_close.php';
?>
		