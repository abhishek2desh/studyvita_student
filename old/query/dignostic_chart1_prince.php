<?php

	include_once '../config.php';
	session_start();
	
	$s = $_GET['s'];
	$sid = $_GET['user_id'];
		
		$result_q = "SELECT u.id, ROUND(IFNULL(s.strength,0),2) AS r
								FROM unit u
								LEFT JOIN student_unit_strength s ON
								u.id = s.unit_id AND
								s.sub_id = u.sub_id AND
								s.student_id = '$sid'
								WHERE u.sub_id = '$s'";
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