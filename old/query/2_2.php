<?php 
	session_start();
	require_once("../config.php");
	
	$ch=$_GET['chp_id'];
	$btid=$_GET['bt_id'];
	$uid=$_GET['uid'];
	$tl = $_GET['type_lect'];
	
	$SQL = "SELECT id,name AS top_name FROM topic WHERE chap_id=".$ch."
	AND id IN 
	(SELECT topic_id FROM class_scheduler WHERE chap_id=".$ch."
	AND	user_id=".$uid." AND batch_id=".$btid." AND type_lect_id=".$tl.")"; 
	$result = mysql_query( $SQL ) or die("Couldn t execute query.".mysql_error()); 
	while($row = mysql_fetch_array($result,MYSQL_ASSOC)) { 
		
		echo "<li class='ui-state-default' value=".$row['id']." id=".$row['id'].">".$row['top_name']."</li>";
	} 
	include_once '../conn_close.php';
?>