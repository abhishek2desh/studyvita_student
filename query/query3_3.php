<?php 
	session_start();
	require_once("../config.php");
	
	$chap_id = $_GET['chp_id'];
	$bt = $_GET['bt_id'];
	$tl = $_GET['type_lect'];
	$course_id = $_GET['course_sel'];
	$uid = $_GET['uid'];
	
		$SQL = "SELECT t.id,CONCAT(t.name,'(',DATE(wb.work_date),')') AS top_name FROM topic t,class_scheduler cs,user_roll ur,working_batches_coursewise wb  WHERE t.id=cs.topic_id  AND cs.wb_id=wb.id AND cs.user_id='$uid ' and cs.user_id=ur.user_id AND cs.chap_id='$chap_id' AND ur.roll_id = 5  AND cs.type_lect_id='$tl' AND cs.batch_id='$bt' ORDER BY t.id"; 
	
	/*$SQL = "SELECT id,name AS top_name FROM topic WHERE chap_id=".$chap_id."  
	AND id IN 
	(SELECT topic_id FROM class_scheduler WHERE chap_id=".$chap_id."
	AND	user_id IN (SELECT user_id FROM user_roll WHERE (roll_id = 2 or roll_id = 8))
	AND batch_id=".$bt."
	AND type_lect_id=".$tl." AND user_id IN
	(SELECT user_id FROM user_roll WHERE roll_id = 2 or roll_id = 8))"; */
	
	$result = mysql_query( $SQL ) or die("Couldn t execute query.".mysql_error()); 
	while($row = mysql_fetch_array($result,MYSQL_ASSOC)) { 
		
		echo "<li style='color:green' class='ui-state-default' value=".$row['id']." id=".$row['id'].">".$row['top_name']."</li>";
	} 
	//include '../conn_close.php';
?>