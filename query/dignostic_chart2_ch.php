<?php

	include_once '../config.php';
	session_start();
	
	$s = $_GET['s'];
	$sid = $_SESSION['sid'];

	$result_q1 = "SELECT id,user_id_list FROM `merge_account_student` WHERE user_id_list LIKE '%,$sid,%'";
		$result1 = mysql_query($result_q1);
		$rw = mysql_num_rows($result1);
		if($rw==0)
		{	
	$result = mysql_query("SELECT c.id,ROUND(IFNULL((100-cs.Avg_Percent),0),2) AS response FROM chapterwise_student_average cs,chapter c WHERE student_id='$sid' AND Subject_id IN(SELECT sub_id FROM subject_alias WHERE rel_sub_id='$s')
		AND c.id=cs.Chapter_id");

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
	}
	else
	{
		$user_list="";
		while($row1 = mysql_fetch_array($result1))
			{
			$user_list=$user_list.$row1[1];
			}
			$ulist_final_temp="";
			$$final_colon="";
			$user_count=0;
			$lst = explode(",", $user_list);
			foreach($lst as $item) 
	{
		if($item=="")
		{
		}
		else
		{
			if($ulist_final_temp=="")
			{
			$ulist_final_temp=",".$item.",";
			$final_colon="'".$item."'";
			$user_count=$user_count+1;
			}
			else
			{
			$temp_id=",".$item.",";	
			if (strpos($ulist_final_temp,$temp_id) !== false)
					 {
						//goto nextrec;
						
					 }
					 else
					 {
					 $ulist_final_temp=$ulist_final_temp.$item.",";
					 $final_colon=$final_colon.",'".$item."'";
					 $user_count=$user_count+1;
					 }
			}
		}
	}
		
$result_q = "SELECT c.id,ROUND(IFNULL((100-sum(cs.Avg_Percent)/(SELECT COUNT(id) AS totalc FROM `chapterwise_student_average` WHERE 
student_id IN($final_colon) AND chapter_id=cs.chapter_id )),0),2) AS response FROM chapterwise_student_average cs,chapter c WHERE student_id in($final_colon) AND Subject_id IN(SELECT sub_id FROM subject_alias WHERE rel_sub_id='$s')
		AND c.id=cs.Chapter_id GROUP BY cs.chapter_id";
		
								
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
	}
	include_once '../conn_close.php';
?>