<?php
	
		include_once '../config.php';
		
		
		$sub=$_GET['sub_id'];
		$result17=mysql_query("SELECT name FROM subject WHERE id='$sub'");
		$row17=mysql_fetch_array($result17);
		$sb1=$row17[0];
		echo $sb1;
?>
