<?php

	$sub = $_GET['dt3'];
	$bta = $_GET['bt_id'];
	$uid = $_GET['uid'];
	$tl = $_GET['tl'];
	
	require_once("../config.php");

	$result = mysql_query("SELECT @curRank := @curRank + 1 AS rank, (COUNT(cs.topic_id)/COUNT(t.id)*100) AS perce
	FROM  (SELECT @curRank := 0) r,chapter ch JOIN topic t ON ch.id = t.chap_id 
	AND ch.standard_id IN (SELECT standard_id FROM student_details 
	WHERE batch_id=".$bta.") AND
	ch.sub_id IN (SELECT sub_id FROM subject_alias WHERE rel_sub_id=".$sub.")  
	LEFT JOIN class_scheduler cs
	ON t.chap_id = cs.chap_id
	AND t.id = cs.topic_id
	AND cs.user_id=".$_GET['uid']." AND cs.batch_id=".$bta." AND cs.type_lect_id=".$tl."
	AND t.chap_id=cs.chap_id
	GROUP BY t.chap_id;") or die('Could not query');
	
	if(mysql_num_rows($result)){
		echo '[{"data":[';

		$first = true;
		//$row=mysql_fetch_assoc($result);
		while($row=mysql_fetch_row($result)){
			//  cast results to specific data types

			if($first) {
				$first = false;
			} else {
				echo ',';
			}
			echo json_encode($row);
		}
		echo ']}]';
	} else {
		echo '[]';
	}
include_once '../conn_close.php';

?>