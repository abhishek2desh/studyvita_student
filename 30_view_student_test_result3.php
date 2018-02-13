<?php
		include_once 'config.php';
		$uid=$_GET['uid'];
		$sb_result=$_GET['sb_result'];
		$cp_result=$_GET['cp_result'];
		$std_result=$_GET['std_result'];
		$test_type=$_GET['test_type'];
		session_start();
		$batch_id=$_SESSION['batch_id'];	
		$str="";
		$sql="";
		if($test_type=="1")
		{
		$sql= " And alt.test_type='adaptive_test'";
		}
		else if($test_type=="2")
		{
				$sql= " And (alt.test_type='test' or alt.test_type='online_test' or alt.test_type='admin') and alt.chapterwise_test='0' And alt.customized_test='0' And alt.Demand_test='0' And alt.Unitwise_test='0'";
		}
		else
		{
		}
		if($sb_result == "" AND  $cp_result == "" AND $std_result == "")
		{
		}
		else
		{
			$str="AND sd.standard_id='$std_result' AND SUBJECT='$sb_result' AND chapter_id='$cp_result'";
		}
		if($sb_result == "")
		{
		$result=mysql_query("SELECT DISTINCT CAST(alt.test_id AS UNSIGNED   INTEGER),DATE_FORMAT(DATE(alt.start_time),'%d-%m-%Y'),TIMEDIFF(alt.end_time,alt.start_time),s.name,sd.edutech_student_id,sd.sname,alt.subject,alt.test_type,alt.end_time FROM adaptive_learning_test alt,adaptive_test_response atr,SUBJECT s,student_details sd WHERE alt.student_id='$uid' AND alt.test_id=atr.test_id AND sd.user_id=alt.student_id AND s.id=alt.subject AND sd.batch_id=alt.batch_id  and alt.batch_id ='$batch_id' $sql ORDER BY  CAST(alt.test_id AS UNSIGNED   INTEGER) DESC");
		}
		else
		{
		$result=mysql_query("SELECT DISTINCT  CAST(alt.test_id AS UNSIGNED   INTEGER),DATE_FORMAT(DATE(alt.start_time),'%d-%m-%Y'),TIMEDIFF(alt.end_time,alt.start_time),s.name,sd.edutech_student_id,sd.sname,alt.subject,alt.test_type,alt.end_time FROM adaptive_learning_test alt,adaptive_test_response atr,SUBJECT s,student_details sd WHERE alt.student_id='$uid' AND alt.test_id=atr.test_id AND SUBJECT='$sb_result' AND sd.user_id=alt.student_id AND s.id=alt.subject AND sd.batch_id=alt.batch_id and alt.batch_id ='$batch_id' $sql ORDER BY  CAST(alt.test_id AS UNSIGNED   INTEGER) DESC");
		
		}
		$rw = mysql_num_rows($result);
		if($rw == "")
		{
			echo "<br/>No Data available......";
		}
		else
		{
			$unattempt=0;
			$correct=0;
			$incorrect=0;
			$i=0;
			$j=1;
			
			echo "<br/><table valign='top' style='border:solid 1px;width:100%;height:25px;'>";
			while($row=mysql_fetch_array($result))
			{
				$unattempt="";
				$correct="";
				$incorrect="";
				if($row[3]=="All")
				{
				$row[3]="Mock";
				}
				$result1=mysql_query("SELECT DISTINCT COUNT(Qno) FROM adaptive_test_response WHERE test_id='$row[0]' and student_id='$uid'");
				$row1=mysql_fetch_array($result1);
				$total=$row1[0];
				
				$result2=mysql_query("SELECT response,correct_ans FROM adaptive_test_response WHERE test_id='$row[0]' and student_id='$uid'");
				while($row2=mysql_fetch_array($result2))
				{
					$res=$row2[0];
					$corr_ans=$row2[1];
					if($res == $corr_ans)
					{
						$correct++;
					}
					else if($res != $corr_ans)
					{
						if($res == 'x')
						{
							$unattempt=$unattempt+1;
						}
						else
						{
							$incorrect=$incorrect+1;
						}
					}
				}
				$test_type="";
			if($row[7]=="adaptive_test")
			{
			$test_type="Adaptive";
			}
			else
			{
			$test_type="Scheduled";
			}
				if($j%2 == 0)
				{
					echo "<tr id='$row[0],$row[4],$row[5],$row[3],$row[6]' style='width:100px;background-color:#5E9DC8;border:solid 1px;height:20px;'>";
					echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[1]."</b></label></center></td>";
						echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[0]."</b></label></center></td>";
						echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$test_type."</b></label></center></td>";
						echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[3]."</b></label></center></td>";
						if($correct == "")
						{
							echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>0</b></label></center></td>";
						}
						else
						{
							echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$correct."</b></label></center></td>";
						}
						if($incorrect == "")
						{
							echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>0</b></label></center></td>";
						}
						else
						{
							echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$incorrect."</b></label></center></td>";
						}
						if($unattempt == "")
						{
							echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>0</b></label></center></td>";
						}
						else
						{
							echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$unattempt."</b></label></center></td>";
						}
						echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$total."</b></label></center></td>";
						if($row[2] == "")
						{
							echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>0</b></label></center></td>";
						}
						else
						{
							echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[2]."</b></label></center></td>";
						}
							$result_u=mysql_query("SELECT id FROM `batch` WHERE id='$batch_id' AND Grey_assignment_display='1' ");
		$rwc=mysql_num_rows($result_u);
	if($rwc==0)
	{
	
	}
	else
	{
						//for checking in studentwise unitper table
							$result4=mysql_query("SELECT DISTINCT unit_id FROM studenttestwise_unitper  WHERE user_id='$uid' AND test_id='$row[0]'");
							$rs_link4=mysql_num_rows($result4);
								if($rs_link4 > 0)
								{
								echo "<td style='font-size:13px;width:55px;height:30px;border-width: 0px; border-style: solid; border-color: GREEN;'><b><input type='button' class='defaultbutton' id='view_result1' value='View Report' /></b></td>";
								}
								else
								{
									if($row[8]=="" || $row[8]=="undefined")
								{
								echo "<td style='font-size:13px;width:55px;height:30px;border-width: 0px; border-style: solid; border-color: GREEN;'><b>Not Submitted</b></td>";
								}
								else
								{
								echo "<td style='font-size:13px;width:55px;height:30px;border-width: 0px; border-style: solid; border-color: GREEN;'><b>Processing...<input type='button' class='defaultbutton' id='view_result1' value='   Refresh    ' /></b></td>";
								}
								}
						//end checking
						}
						//echo "<td style='font-size:13px;width:55px;height:30px;border-width: 0px; border-style: solid; border-color: GREEN;'><b><input type='button' class='defaultbutton'  id='view_result1' value='View Report' /></b></td>";
					echo "</tr>";
					$j++;
				}
				else if($j%2 == 1)
				{
					echo "<tr id='$row[0],$row[4],$row[5],$row[3],$row[6]' style='width:100px;background-color:white;border:solid 1px;height:20px;'>";
					echo "<td style='width:100px;border:solid px;height:20px;'><center><label style='color:black'><b>".$row[1]."</b></label></center></td>";
						echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[0]."</b></label></center></td>";
						echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$test_type."</b></label></center></td>";
						echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[3]."</b></label></center></td>";
						if($correct == "")
						{
							echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>0</b></label></center></td>";
						}
						else
						{
							echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$correct."</b></label></center></td>";
						}
						if($incorrect == "")
						{
							echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>0</b></label></center></td>";
						}
						else
						{
							echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$incorrect."</b></label></center></td>";
						}
						if($unattempt == "")
						{
							echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>0</b></label></center></td>";
						}
						else
						{
							echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$unattempt."</b></label></center></td>";
						}
						echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$total."</b></label></center></td>";
						if($row[2] == "")
						{
							echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>0</b></label></center></td>";
						}
						else
						{
							echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[2]."</b></label></center></td>";
						}
							$result_u=mysql_query("SELECT id FROM `batch` WHERE id='$batch_id' AND Grey_assignment_display='1' ");
		$rwc=mysql_num_rows($result_u);
	if($rwc==0)
	{
	
	}
	else
	{
						//for checking in studentwise unitper table
							$result4=mysql_query("SELECT DISTINCT unit_id FROM studenttestwise_unitper  WHERE user_id='$uid' AND test_id='$row[0]'");
							$rs_link4=mysql_num_rows($result4);
								if($rs_link4 > 0)
								{
								echo "<td style='font-size:13px;width:55px;height:30px;border-width: 0px; border-style: solid; border-color: GREEN;'><b><input type='button' class='defaultbutton' id='view_result1' value='View Report' /></b></td>";
								}
								else
								{
									if($row[8]=="" || $row[8]=="undefined")
								{
								echo "<td style='font-size:13px;width:55px;height:30px;border-width: 0px; border-style: solid; border-color: GREEN;'><b>Not Submitted</b></td>";
								}
								else
								{
								echo "<td style='font-size:13px;width:55px;height:30px;border-width: 0px; border-style: solid; border-color: GREEN;'><b>Processing...<input type='button' class='defaultbutton' id='view_result1' value='   Refresh    ' /></b></td>";
								}
								}
						//end checking
						}
						//echo "<td style='font-size:13px;width:55px;height:30px;border-width: 0px; border-style: solid; border-color: GREEN;'><b><input type='button' class='defaultbutton' id='view_result1' value='View Report' /></b></td>";
					echo "</tr>";
					$j++;
				}
			}
		}
		echo "</table>";
?>