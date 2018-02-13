<?php

	include_once '../config.php';
	session_start();
	
	$s = $_GET['s'];
	$chap_id = $_GET['chap_id'];
	$sid = $_SESSION['sid'];
		
	
		$result_q = "SELECT ap.id,ap.per FROM `adaptive_performance_score` ap,`adaptive_learning_test` alp WHERE ap.user_id='$sid' AND alp.student_id=ap.user_id
AND alp.test_id=ap.test_id AND alp.subject='$s' AND alp.chapter_id='$chap_id' order by ap.id ";
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
	
?>