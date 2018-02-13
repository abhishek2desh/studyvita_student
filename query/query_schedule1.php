<?php 
	session_start();
	require_once("../config.php");
	
	$sub = $_GET['dt3'];
	$bt = $_GET['bt_id'];
	$tl = $_GET['type_lect'];
	$wk_pl = $_GET['week_plan'];
	$course_id=$_GET['course_sel'];
	$uid = $_GET['uid'];
	/*$SQL = "SELECT id,NAME AS chap_name,ch_no FROM chapter WHERE sub_id IN 
	(SELECT sub_id FROM subject_alias WHERE rel_sub_id=".$sub.")
	AND board_id IN (SELECT board_id FROM student_details WHERE batch_id=".$bt.")
	AND standard_id IN 
	(SELECT standard_id FROM student_details WHERE batch_id=".$bt.")
	AND active=1
	AND id NOT IN(
	SELECT chap_id FROM topic WHERE id NOT IN(SELECT topic_id FROM class_scheduler
	WHERE batch_id=".$bt." AND type_lect_id=".$tl." AND user_id IN
	(SELECT user_id FROM user_roll WHERE (roll_id = 2 or roll_id=8))))";*/
	$SQL="SELECT c.id,c.NAME AS chap_name,c.ch_no FROM chapter c,course_chapter cc WHERE cc.sub_id IN 
	(SELECT sub_id FROM subject_alias WHERE rel_sub_id='$sub') AND cc.course_id='$course_id' AND c.id=cc.chap_id AND
	c.active=1
	AND c.id NOT IN(
	SELECT  DISTINCT course_chap_id FROM `course_chapter_module` WHERE module_name NOT IN(SELECT topic_id FROM class_scheduler
	WHERE batch_id='$bt' AND type_lect_id='$tl' AND user_id='$uid') AND course_id='$course_id' AND sub_id IN 
	(SELECT sub_id FROM subject_alias WHERE rel_sub_id='$sub') )";
	$result = mysql_query( $SQL ) or die("Couldn t execute query.".mysql_error()); 
	
	while($row = mysql_fetch_array($result,MYSQL_ASSOC)) { 
	
		echo "<li class='ui-state-default' value=".$row['id']." id=".$row['id'].">".$row['ch_no']."-".$row['chap_name']."</li>";
	}
	//include '../conn_close.php';
?>