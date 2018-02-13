<?php

	include_once '../config.php';
	session_start();
	
	$s = $_GET['s'];
	$sid = $_SESSION['sid'];
		//goto labelk;
		/*
			$result_q = "SELECT s.unit_id,s.Cumulative_per_Overall,u.unit_name,s.id FROM studenttestwise_unitper s,unit u 
WHERE s.Enroll_id='1623' AND s.subject_id='14' AND s.unit_id=u.id AND 
s.id IN( SELECT MAX(id) FROM studenttestwise_unitper WHERE Enroll_id='1623' AND subject_id='14' GROUP BY unit_id))";
		*/
			$result_q1 = "SELECT id,user_id_list FROM `merge_account_student` WHERE user_id_list LIKE '%,$sid,%'";
		$result1 = mysql_query($result_q1);
		$rw = mysql_num_rows($result1);
		if($rw==0)
		{
		$result_q = "SELECT s.unit_id,s.Cumulative_per,u.unit_name,s.id FROM studenttestwise_unitper s,unit u WHERE s.user_id='$sid' AND s.subject_id='$s' AND s.unit_id=u.id AND 
	s.id IN( SELECT MAX(id) FROM studenttestwise_unitper WHERE user_id='$sid' AND subject_id='$s' GROUP BY unit_id)";
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
	else
	{
	//labelk:
			
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
			$lst1 = explode(",", $ulist_final_temp);
			
			$num_rows=0;
			$rs2 = mysql_query("SELECT distinct unit_id FROM studenttestwise_unitper  WHERE user_id in($final_colon)  AND subject_id='$s' order by unit_id");
			$array = array();
			$num_rows = mysql_num_rows($rs2);
	
			$i=0;
			echo "[";
			while($row2 = mysql_fetch_array($rs2))
			{
			$Cumulative_per_total=0;
			$Cumulative_per_count=0;
			$Cumulative_per=0;
				foreach($lst1 as $item1) 
			{
				if($item1=="")
				{
				}
				else
				{
		
					$rs1 = mysql_query("SELECT s.Cumulative_per,s.id FROM studenttestwise_unitper s,unit u WHERE s.user_id='$item1' AND s.subject_id='$s' AND s.unit_id=u.id AND s.unit_id='$row2[0]' and s.id IN( SELECT MAX(id) FROM studenttestwise_unitper WHERE user_id='$item1' AND subject_id='$s' and unit_id='$row2[0]' )");
					while($row1 = mysql_fetch_array($rs1))
					{
					$Cumulative_per_total=$Cumulative_per_total+$row1[0];
					$Cumulative_per_count=$Cumulative_per_count+1;
					}
				}
			}
			$Cumulative_per=$Cumulative_per_total/$Cumulative_per_count;
			$i++;
		
		if($i<$num_rows){
			echo $link = round($Cumulative_per,2).",";
		}
		else {
			echo $link = round($Cumulative_per,2);
		}
			}
		echo "]";	
			//
	}
?>