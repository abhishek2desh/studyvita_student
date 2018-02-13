<?php 
	session_start();
	require_once("../config.php");
	
	$chap_id = $_GET['chp_id'];
	$uid = $_GET['uid'];
	$bt = $_GET['bt_id'];
	//$tl = $_GET['type_lect'];
	//$wb = $_GET['wb_id'];
	
	$SQL = "SELECT id,additional_topic_name AS add_top_name FROM `student_onlinecourse_progress` WHERE chap_id = ".$chap_id." AND user_id = ".$uid." 
			AND batch_id = ".$bt."
			AND `additional_topic_name` IS NOT NULL" ; 
	$result = mysql_query( $SQL ) or die("Couldn t execute query.".mysql_error()); 
	while($row = mysql_fetch_array($result,MYSQL_ASSOC)) { 
		
		echo "<li class='ui-state-default' value=".$row['id']." id=".$row['id'].">".$row['add_top_name']."</li>";
	} 
	//include '../conn_close.php';
?>