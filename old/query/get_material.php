<?php
	include '../config.php';
	$mat_id=$_GET['mat_id'];
	$result=mysql_query("SELECT material_name FROM material WHERE id='$mat_id'");
	$row=mysql_fetch_array($result);
	echo $row[0];
	include_once '../conn_close.php';
?>