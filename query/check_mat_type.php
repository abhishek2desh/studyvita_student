<?php
		include_once '../config.php';
		$mid = $_GET['mat_id'];		
		
		$result=mysql_query("SELECT sub_obj_type FROM material WHERE id = ".$mid);
		$row=mysql_fetch_array($result);
		echo $row[0];
		include_once '../conn_close.php';
?>