<?php	
	include '../config.php';
	
	$q_nm=$_GET['q_nm'];
	$result3=mysql_query("SELECT NAME,instruction_create FROM `que_paper` WHERE NAME='$q_nm'");
	$row3=mysql_fetch_array($result3);
	echo "<div style='color:black;background-color:;padding-left:0px;padding-top:5px;font-size:20px;'>".$row3[1]."</div>";
	include_once '../conn_close.php';
?>