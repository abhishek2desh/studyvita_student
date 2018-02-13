<?php 
	session_start();
	require_once("../config.php");
	
	$chap_id = $_GET['chp_id'];
	$bt = $_GET['bt_id'];
	
	$course_id = $_GET['course_sel'];
	$uid = $_GET['uid'];
	
	/*$SQL = "SELECT id,name AS top_name FROM topic WHERE chap_id=".$chap_id."  
	AND id NOT IN 
	(SELECT topic_id FROM class_scheduler WHERE chap_id=".$chap_id."
	AND	user_id IN (SELECT user_id FROM user_roll WHERE (roll_id = 2 or roll_id = 8))
	AND batch_id=".$bt."
	AND type_lect_id=".$tl." AND user_id IN
	(SELECT user_id FROM user_roll WHERE (roll_id = 2 or roll_id = 8)))"; */
	$SQL="SELECT DISTINCT t.id,t.name AS top_name FROM topic t,`course_chapter_module` cc WHERE cc.course_chap_id='$chap_id'
	AND t.chap_id=cc.course_chap_id AND cc.course_id='$course_id'  AND t.id=cc.`module_name`
	AND cc.module_name NOT IN 
	(SELECT distinct topic_id FROM student_onlinecourse_progress WHERE chap_id='$chap_id'
	AND	user_id='$uid'
	AND batch_id='$bt' AND topic_id IS NOT NULL 
	) ORDER BY t.id";
	//echo $SQL;
	$result = mysql_query( $SQL ) or die("Couldn t execute query.".mysql_error()); 
	while($row = mysql_fetch_array($result,MYSQL_ASSOC)) { 
		
		echo "<li style='color:red' class='ui-state-default' value=".$row['id']." id=".$row['id'].">".$row['top_name']."</li>";
	} 
	//include '../conn_close.php';
?>