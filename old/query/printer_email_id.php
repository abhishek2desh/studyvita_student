<?php
	
	include "../config.php";
	$user_id = $_GET['user_id'];
	$sql = "SELECT printer_id FROM USER WHERE id='$user_id'";
	$result = mysql_query($sql);
	$row_print_id=mysql_fetch_array($result);
	$print_id = $row_print_id[0];
	echo $print_id;
?>