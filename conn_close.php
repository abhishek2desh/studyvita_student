<?php
	$mysql_hostname = "localhost";
	$mysql_user = "root";
	$mysql_password = "edutech#india@123";
	//$mysql_user = "edutechviewer34";
	//$mysql_password = "edutechviewer34";
	$mysql_database = "edutech_learning_system";
	$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password)
	or die(mysql_error());
	mysql_close($bd);
?>