<?php

	include_once '../config.php';
	session_start();
	
	$s = $_GET['s'];
	$sid = $_SESSION['sid'];
$chap_id = $_GET['chap_id'];
	
	$result = mysql_query("SELECT ap.id,ROUND(100-ap.per,2) FROM `adaptive_performance_score` ap,`adaptive_learning_test` alp WHERE ap.user_id='$sid' AND alp.student_id=ap.user_id AND alp.test_id=ap.test_id AND alp.subject='$s' AND alp.chapter_id='$chap_id'  order by ap.id ");

	$array = array();

	$num_rows = mysql_num_rows($result);
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