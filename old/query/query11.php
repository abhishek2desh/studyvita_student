<?php
	session_start();
//	require_once '../includes/global.inc.php';
	include_once '../config.php';
	
	$user=$_SESSION['username'];
	$s5=$_SESSION['sid'];
	
	if(!isset($_SESSION['username']))
	{
		header("Location:login.php");
	}
	
	if(isset($s5))
	{
		$result=mysql_query("SELECT m.id,m.material_name FROM material m, per_material_mapping p
							WHERE m.material_type_id = 32
							AND p.student_id = '$s5'
							AND m.id = p.material_id");
		while($row=mysql_fetch_array($result))
		{
			echo "<option value=$row[0]>$row[1]</option>";
		}
	}
	include_once '../conn_close.php';
?>