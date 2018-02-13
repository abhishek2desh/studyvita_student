<?php
		include_once 'config.php';
		$uid=$_GET['uid'];
		$sb_result=$_GET['sb_result'];
		$cp_result=$_GET['cp_result'];
		$std_result=$_GET['std_result'];
		
		$str="";
		if($sb_result == "" AND  $cp_result == "" AND $std_result == "")
		{
		}
		else
		{
			$str="AND sd.standard_id='$std_result' AND SUBJECT='$sb_result' AND chapter_id='$cp_result'";
		}
		$result=mysql_query("SELECT DISTINCT alt.test_id,DATE_FORMAT(DATE(alt.start_time),'%d-%m-%Y'),TIMEDIFF(alt.end_time,alt.start_time),s.name,sd.edutech_student_id,sd.sname FROM adaptive_learning_test alt,adaptive_test_response atr,SUBJECT s,student_details sd WHERE alt.student_id='$uid' AND alt.test_id=atr.test_id AND SUBJECT='$sb_result' AND sd.user_id=alt.student_id AND alt.test_type IN('adaptive_test') AND Test_Submit='1' AND s.id=alt.subject ORDER BY alt.test_id DESC");
		
		$rw = mysql_num_rows($result);
		if($rw == "")
		{
			echo "No Data available......";
		}
		else
		{
			$unattempt=0;
			$correct=0;
			$incorrect=0;
			$i=0;
			$j=1;
			
			echo "<table valign='top' style='border:solid 1px;width:100%;height:25px;'>";
			while($row=mysql_fetch_array($result))
			{
				$unattempt="";
				$correct="";
				$incorrect="";
				
				$result1=mysql_query("SELECT DISTINCT COUNT(Qno) FROM adaptive_test_response WHERE test_id='$row[0]'");
				$row1=mysql_fetch_array($result1);
				$total=$row1[0];
				
				$result2=mysql_query("SELECT response,correct_ans FROM adaptive_test_response WHERE test_id='$row[0]'");
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
					if($j%2 == 0)
					{
						echo "<tr id='$row[0],$row[4],$row[5],$row[3]' style='width:100px;background-color:#5E9DC8;border:solid 1px;height:20px;'>";
						echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[1]."</b></label></center></td>";
							echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[0]."</b></label></center></td>";
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
							//for checking in studentwise unitper table
							$result4=mysql_query("SELECT DISTINCT unit_id FROM studenttestwise_unitper  WHERE user_id='$uid' AND test_id='$row[0]'");
							$rs_link4=mysql_num_rows($result4);
								if($rs_link4 > 0)
								{
								echo "<td style='font-size:13px;width:55px;height:30px;border-width: 0px; border-style: solid; border-color: GREEN;'><b><input type='button' class='online_test_result_view' id='view_result1' value='View Report' /></b></td>";
								}
								else
								{
								echo "<td style='font-size:13px;width:55px;height:30px;border-width: 0px; border-style: solid; border-color: GREEN;'><b>Processing...<input type='button' class='online_test_result_view' id='view_result1' value='   Refresh    ' /></b></td>";
								}
						//end checking
							
							//echo "<td style='font-size:13px;width:55px;height:30px;border-width: 0px; border-style: solid; border-color: GREEN;'><b><input type='button' class='online_test_result_view' id='view_result1' value='View Report' /></b></td>";
						echo "</tr>";
						$j++;
					}
					else if($j%2 == 1)
					{
						echo "<tr id='$row[0],$row[4],$row[5],$row[3]' style='width:100px;background-color:white;border:solid 1px;height:20px;'>";
						echo "<td style='width:100px;border:solid px;height:20px;'><center><label style='color:black'><b>".$row[1]."</b></label></center></td>";
							echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[0]."</b></label></center></td>";
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
							//for checking in studentwise unitper table
							$result4=mysql_query("SELECT DISTINCT unit_id FROM studenttestwise_unitper  WHERE user_id='$uid' AND test_id='$row[0]'");
							$rs_link4=mysql_num_rows($result4);
								if($rs_link4 > 0)
								{
								echo "<td style='font-size:13px;width:55px;height:30px;border-width: 0px; border-style: solid; border-color: GREEN;'><b><input type='button' class='online_test_result_view' id='view_result1' value='View Report' /></b></td>";
								}
								else
								{
								echo "<td style='font-size:13px;width:55px;height:30px;border-width: 0px; border-style: solid; border-color: GREEN;'><b>Processing...<input type='button' class='online_test_result_view' id='view_result1' value='   Refresh    ' /></b></td>";
								}
						//end checking
							//echo "<td style='font-size:13px;width:55px;height:30px;border-width: 0px; border-style: solid; border-color: GREEN;'><b><input type='button' class='online_test_result_view' id='view_result1' value='View Report' /></b></td>";
						echo "</tr>";
						$j++;
					}
			}
		}
		echo "</table>";
?>