<?php
	include_once '../config.php';
	$user_id=$_GET['user_id'];
	$SQL34 = "INSERT INTO user_studytool_display 
						(user_id) VALUES('$user_id')";
						$result34 = mysql_query($SQL34);
						if ($result34)
						{
						}
						else
						{
						echo "failed";
						}
?>