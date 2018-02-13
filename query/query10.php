<?php
	session_start();
//	require_once '../includes/global.inc.php';
	include_once '../config.php';
	
	$s5=$_SESSION['sid'];

//	$_GET['dt']=20;
	
	if(!isset($_SESSION['username']))
	{
		header("Location:login.php");
	}
/*	mysql_connect("localhost","edutechviewer34","edutechviewer34") or die(mysql_error());
//	mysql_connect("localhost","root","") or die(mysql_error());
	mysql_select_db("learning34") or die(mysql_error());
*/
	if(isset($_GET['dt']))
	{
		$result=mysql_query("SELECT * FROM material WHERE
		id IN (SELECT sol_id FROM sub_top_mapping WHERE mat_id=".$_GET['dt'].")
		OR
		id IN (SELECT top_id FROM sub_top_mapping WHERE mat_id=".$_GET['dt'].")
		OR
		id IN (SELECT report_id FROM report_mapping WHERE stud_id=$s5 AND test_id=".$_GET['dt'].")");
		while($row=mysql_fetch_array($result))
		{
			echo "<option value=$row[2]>$row[2]</option>";
		}
	}
	include_once '../conn_close.php';
?>