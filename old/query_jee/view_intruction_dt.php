<?php	
	include '../config.php';
	
	$q_nm=$_GET['q_nm'];
	$result3=mysql_query("SELECT NAME,instruction_create FROM `que_paper` WHERE NAME='$q_nm'");
	$row3=mysql_fetch_array($result3);
	echo "<div style='color:white;background-color:#0174DF;padding-left:5px;padding-top:5px;font-size:20px;'><b>".$row3[1]."</b></div>";
	include_once '../conn_close.php';
?>