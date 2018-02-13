<?php 
	session_start();
	
	include_once '../config.php';

	/*$sub=$_GET['dt3'];
	$btid=$_GET['bt_id'];
	$uid=$_GET['uid'];
	$s2=$_SESSION['stnd1'];
	$board1 = $_SESSION['board'];
	*/
	
	$sub = $_GET['dt3'];
	$bt = $_GET['bt_id'];
	$tl = $_GET['type_lect'];
	
	$SQL = "SELECT id,NAME AS chap_name,ch_no FROM chapter WHERE sub_id IN 
			(SELECT sub_id FROM subject_alias WHERE rel_sub_id=".$sub.")
			AND board_id IN (SELECT board_id FROM student_details WHERE batch_id=".$bt.") 
			AND standard_id IN 
			(SELECT standard_id FROM student_details WHERE batch_id=".$bt.")
			AND active=1
			AND id NOT IN(
			SELECT chap_id FROM topic WHERE id NOT IN(SELECT topic_id FROM class_scheduler
			WHERE batch_id=".$bt." AND type_lect_id=".$tl."))";
	
	$result = mysql_query( $SQL ) or die("Couldn t execute query.".mysql_error()); 

	while($row = mysql_fetch_array($result,MYSQL_ASSOC)) { 
		
		echo "<li class='ui-state-default' value=".$row['id']." id=".$row['id'].">".$row['ch_no']."-".$row['chap_name']."</li>";
	} 
	include_once '../conn_close.php';
?>