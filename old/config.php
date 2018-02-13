<?php
	$mysql_hostname = "192.168.119.2";
	$mysql_user = "root";
	//$mysql_password = "root";
	//$mysql_user = "edutechviewer34";
	$mysql_password = "edutech#india@123";
	$mysql_database = "edutech_learning_system";
	$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password)
	or die(mysql_error());
	mysql_select_db($mysql_database,$bd) or die(mysql_error());
?>