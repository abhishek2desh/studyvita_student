<?php 
	session_start();
	require_once("../config.php");
	
	$sub = $_GET['dt3'];
	$bt = $_GET['bt_id'];
	$date1 = $_GET['datepickerVal'];
	$course_id=$_GET['course_sel'];
	$uid = $_GET['uid'];
	
	
	$SQL="SELECT c.id,c.NAME AS chap_name,c.ch_no FROM chapter c,course_chapter cc WHERE cc.sub_id IN 
	(SELECT sub_id FROM subject_alias WHERE rel_sub_id='$sub') AND cc.course_id='$course_id' AND c.id=cc.chap_id AND
	c.active=1
	AND c.id NOT IN(
	SELECT  DISTINCT course_chap_id FROM `course_chapter_module` WHERE module_name NOT IN(SELECT distinct topic_id FROM student_onlinecourse_progress
	WHERE batch_id='$bt' and user_id='$uid' and topic_id is NOT NULL) AND course_id='$course_id' AND sub_id IN 
	(SELECT sub_id FROM subject_alias WHERE rel_sub_id='$sub') )";
			
		
		$result = mysql_query( $SQL ) or die("Couldn t execute query.".mysql_error()); 

		
		
		while($row = mysql_fetch_array($result,MYSQL_ASSOC)) { 
			
			echo "<li class='ui-state-default' value=".$row['id']." id=".$row['id'].">".$row['ch_no']."-".$row['chap_name']."</li>";
		} 

?>