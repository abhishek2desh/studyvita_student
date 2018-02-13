<?php
	include "../config.php";
	
	$user_id = $_GET['user_id'];
	$print_id_text = $_GET['print_id_text'];
	
	$sql = "UPDATE `user` SET printer_id = '$print_id_text' WHERE id='$user_id'";
	
	$result = mysql_query($sql);
	if ($result)
	{
		echo "success";
	}
	else
	{
		echo "failed...";
	}

?>