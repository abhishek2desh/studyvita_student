<?php 
	session_start();
	require_once("../config.php");
	
	$chap_id = $_GET['chp_id'];
	$bt = $_GET['bt_id'];
	
	$course_id = $_GET['course_sel'];
	$uid = $_GET['uid'];
	
		$SQL = "SELECT t.id,t.name AS top_name FROM topic t,student_onlinecourse_progress cs  WHERE t.id=cs.topic_id AND cs.user_id='$uid ' and cs.chap_id='$chap_id'   AND cs.batch_id='$bt' ORDER BY t.id"; 
	$result = mysql_query( $SQL ) or die("Couldn t execute query.".mysql_error()); 
	while($row = mysql_fetch_array($result,MYSQL_ASSOC)) { 
		
		echo "<li style='color:red' class='ui-state-default' value=".$row['id']." id=".$row['id'].">".$row['top_name']."</li>";
	} 
	//include '../conn_close.php';
?>