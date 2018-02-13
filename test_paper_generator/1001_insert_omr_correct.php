<?php

	include_once '../config.php';
	$total_string_get_val=$_GET['total_string_get_val'];
	$uid2=substr($total_string_get_val, 0, -1);
	$new_test_id=$_GET['new_test_id'];
	$sub_id=$_GET['sbj1'];
	$lst = explode(",", $uid2);
	$i=1;
	
	if($sub_id == "PHY"){ $sb="1"; }
	else if($sub_id == "CHE"){ $sb="2"; }
	else if($sub_id == "MAT"){ $sb="3"; }
	else if($sub_id == "BOT"){ $sb="4"; }
	else if($sub_id == "ZOO"){ $sb="5"; }
	else if($sub_id == "BIO"){ $sb="6"; }
	else if($sub_id == "SCI"){ $sb="7"; }
	
	foreach($lst as $item) 
	{
	
		$result_curr=mysql_query("SELECT CorrectAns FROM onlinequestionbank WHERE UniqId=$item");
		$row_curr=mysql_fetch_array($result_curr);
		$get_ans=$row_curr[0];
		
		$result_concept=mysql_query("SELECT ConceptId FROM `onlinequestionbank` WHERE UniqId=$item");
		$row_concept=mysql_fetch_array($result_concept);
		$get_concept_id=$row_concept[0];
		
		$result_topic=mysql_query("SELECT topic_id FROM concept WHERE id='$get_concept_id'");
		$row_topic=mysql_fetch_array($result_topic);
		$get_topic_id=$row_topic[0];
		
		$insert_test=mysql_query("INSERT INTO onlineuniqid(`TestID`,`Uniqid`,`Qno`)
			   VALUES('$new_test_id','$item','$i')");
		
		$result_unit=mysql_query("SELECT c.unit_id FROM topic t,chapter c WHERE t.chap_id = c.id
		AND t.id='$get_topic_id'");
		$row_unit=mysql_fetch_array($result_unit);
		$get_unit=$row_unit[0];
		
		$insert_test1=mysql_query("INSERT INTO omrcorrect(`TestID`,`SubID`,`Qno`,`CorrectAns`,`TopicId`,`ConceptId`,`UnitId`)
							VALUES('$new_test_id','$sb','$i','$get_ans','$get_topic_id','$get_concept_id','$get_unit')");
		
		//echo "INSERT INTO omrcorrect(`TestID`,`SubID`,`Qno`,`CorrectAns`,`TopicId`,`ConceptId`)
							//VALUES('$new_test_id','$sb','$i','$get_ans','$get_concept_id','$get_topic_id')";
		
		$i++;
	}
	include_once '../conn_close.php';
?>