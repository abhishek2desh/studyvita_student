<?php 
	include_once '../config.php';

	$id = $_GET['que_paper_id'];

	$SQL = "SELECT m.material_name,t.duration,m.id FROM material m,test_announce t,mat_online_paper_set ot
			WHERE t.id = '$id'
			AND t.que_paper_id = ot.que_paper_id
			AND ot.mat_id = m.id";
	
	$result=mysql_query($SQL) or die($SQL."<br/><br/>".mysql_error());
	
	$row=mysql_fetch_row($result);
	echo $row[0]."=".$row[1]."=".$row[2];
	include_once '../conn_close.php';
?>