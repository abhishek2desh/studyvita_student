<?php
		include_once '../config.php';
		$user_id = $_GET['user_id'];
		$sub_id = $_GET['sub_id'];
		$per_80_above="";
		$per_60_above="";
		$per_40_above="";
		$result_q1 = "SELECT id,user_id_list FROM `merge_account_student` WHERE user_id_list LIKE '%,$user_id,%'";
		$result1 = mysql_query($result_q1);
		$rw = mysql_num_rows($result1);
		if($rw==0)
		{
			$result=mysql_query("SELECT  DISTINCT st.unit_id,u.enroll_id,ut.unit_name FROM`studenttestwise_unitper` st,USER u,unit ut WHERE u.id='$user_id' AND st.enroll_id=u.enroll_id AND st.subject_id='$sub_id' and ut.id=st.unit_id");
			while($row = mysql_fetch_array($result))
			{ 
				$result5=mysql_query("SELECT ROUND(Cumulative_per_Overall,2),ROUND((100-Cumulative_per_Overall),2),subject_id,unit_id,id FROM studenttestwise_unitper WHERE id IN(SELECT MAX(id) FROM studenttestwise_unitper WHERE enroll_id='$row[1]' AND subject_id='$sub_id' AND unit_id='$row[0]') AND enroll_id='$row[1]' AND subject_id='$sub_id' AND unit_id='$row[0]'");
			 	$row5=mysql_fetch_array($result5);
					if($row5[0] >= 80)
					{
						$per_80_above=$per_80_above.$row[2].",";
					}
					else if($row5[0] >=35 && $row5[0] < 80)
					{
						$per_60_above=$per_60_above.$row[2].",";
					}
					else
					{
						$per_40_above=$per_40_above.$row[2].",";
					}
			}
		}
		else
		{
		//echo "in while";
		//
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
			//
			$rs2 = mysql_query("SELECT distinct s.unit_id,u.unit_name FROM studenttestwise_unitper s,unit u  WHERE s.user_id in($final_colon)  AND s.subject_id='$sub_id' and u.id=s.unit_id order by s.unit_id");
			while($row2 = mysql_fetch_array($rs2))
			{
			$Cumulative_per_total=0;
			$Cumulative_per_count=0;
			$Cumulative_per=0;
			$result=mysql_query("SELECT  DISTINCT u.enroll_id FROM`studenttestwise_unitper` st,USER u WHERE st.user_id in($final_colon) AND st.enroll_id=u.enroll_id AND st.subject_id='$sub_id' and u.id=st.user_id ");
			while($row = mysql_fetch_array($result))
			{ 
				$result5=mysql_query("SELECT ROUND(Cumulative_per_Overall,2),ROUND((100-Cumulative_per_Overall),2),subject_id,unit_id,id FROM studenttestwise_unitper WHERE id IN(SELECT MAX(id) FROM studenttestwise_unitper WHERE enroll_id='$row[0]' AND subject_id='$sub_id' AND unit_id='$row2[0]') AND enroll_id='$row[0]' AND subject_id='$sub_id' AND unit_id='$row2[0]'");
			 	$row5=mysql_fetch_array($result5);
				$Cumulative_per_total=$Cumulative_per_total+$row5[0];
					$Cumulative_per_count=$Cumulative_per_count+1;
					
			}
			$Cumulative_per=$Cumulative_per_total/$Cumulative_per_count;
			if($row5[0] >= 80)
					{
						$per_80_above=$per_80_above.$row2[1].",";
					}
					else if($row5[0] >=35 && $row5[0] < 80)
					{
						$per_60_above=$per_60_above.$row2[1].",";
					}
					else
					{
						$per_40_above=$per_40_above.$row2[1].",";
					}
			}
			//
			
		//
		}
					if($per_80_above == "")
								{}
								else
								{
									echo "<br/>Congrats!!";
									echo "<br/>Your concepts are strong in the unit(s) :".$per_80_above;
									echo "<br/>Tip for time management.";
									echo "Attempt the questions from these units (".$per_80_above.") first, while giving test.";
								}
								if($per_60_above == "")
								{}
								else
								{
									echo "<br/><br/>You need to brush up the concepts of these unit(s) once again: ".$per_60_above;
								}
								if($per_40_above == "")
								{	
								}
								else
								{
									echo "<br/><br/>You need to prepare the following unit(s) thoroughly before giving the exam: 
									" .$per_40_above. ".<br/><b>Tip for time management</b>. <br/>Answer the questions from these units (".$per_40_above. ") only after completing other questions.";
								}
		
?>