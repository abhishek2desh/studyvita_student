<?php

	include_once '../config.php';
	session_start();
	
	$s = $_GET['s'];
	$sid = $_SESSION['sid'];
		
		$result_q = "SELECT c.id,ROUND(IFNULL(cs.Avg_Percent,0),2) AS response FROM chapterwise_student_average cs,chapter c WHERE student_id='$sid' AND Subject_id IN(SELECT sub_id FROM subject_alias WHERE rel_sub_id='$s')
		AND c.id=cs.Chapter_id";
								
	//echo $result_q;
	$result = mysql_query($result_q);
	$array = array();

	$num_rows = mysql_num_rows($result);
	//echo "<br/>".$num_rows;
	$i=0;
	echo "[";
	while($row = mysql_fetch_array($result)) { 
		$i++;
		
		if($i<$num_rows){
			echo $link = $row[1].",";
		}
		else {
			echo $link = $row[1];
		}
	}
	echo "]";
	include_once '../conn_close.php';
?>