<?php
		include_once 'config.php';
		$uid=$_GET['uid'];
		$sb_result=$_GET['sb_result'];
		$cp_result=$_GET['cp_result'];
		$std_result=$_GET['std_result'];
		$fromdate=$_GET['fromdate'];
		$todate=$_GET['todate'];
		$sorttype=$_GET['sorttype'];
		$test_type=$_GET['test_type'];
			session_start();
		$batch_id=$_SESSION['batch_id'];
		$str="";
		$sql="";
		if($fromdate=="")
		{
		
		}
		else
		{
		$sql="AND DATE_FORMAT(DATE(alt.start_time),'%Y-%m-%d') between '$fromdate' and '$todate'";
		}
		if($test_type=="1")
		{
		$sql= $sql." And alt.test_type='adaptive_test'";
		}
		
		else if($test_type=="2")
		{
		$sql= $sql." And alt.test_type='practise'";
		}
		else if($test_type=="3")
		{
			$sql= $sql." And alt.chapterwise_test='1'";
		}
		else if($test_type=="4")
		{
		$sql= $sql." And alt.customized_test='1'";
		}
		else if($test_type=="5")
		{
		$sql= $sql." And alt.Demand_test='1'";
		}
		else if($test_type=="6")
		{
				$sql= $sql." And (alt.test_type='test' or alt.test_type='online_test' or alt.test_type='admin') and alt.chapterwise_test='0' And alt.customized_test='0' And alt.Demand_test='0' And alt.Unitwise_test='0'";
		}
		else if($test_type=="7")
		{
		$sql= $sql." And alt.Unitwise_test='1'";
		
		}
		else
		{
		}
		if($sorttype==2)
		{
		$sql= $sql." ORDER BY alt.start_time desc";
		}
		else
		{
			$sql=$sql ." ORDER BY s.name,alt.start_time desc";
		}
		
		//echo $sql;
		if($sb_result==0)
		{
		$result=mysql_query("SELECT DISTINCT alt.test_id,DATE_FORMAT(DATE(alt.start_time),'%d-%m-%Y'),TIMEDIFF(alt.end_time,alt.start_time),c.name,c.ch_no,s.name,sd.edutech_student_id,sd.sname,alt.test_type,alt.customized_test,alt.chapterwise_test,alt.Demand_test,alt.Unitwise_test,alt.subject 
		FROM adaptive_learning_test alt,adaptive_test_response atr,chapter c,SUBJECT s,student_details sd WHERE alt.student_id='$uid' AND alt.test_id=atr.test_id  AND alt.chapter_id=c.id  AND sd.user_id=alt.student_id
		 AND s.id=alt.subject  and sd.batch_id=alt.batch_id  and alt.batch_id ='$batch_id'   $sql");
		
		}
		else
		{
		$result=mysql_query("SELECT DISTINCT alt.test_id,DATE_FORMAT(DATE(alt.start_time),'%d-%m-%Y'),TIMEDIFF(alt.end_time,alt.start_time),c.name,c.ch_no,s.name,sd.edutech_student_id,sd.sname,alt.test_type,alt.customized_test,alt.chapterwise_test,alt.Demand_test,alt.Unitwise_test,alt.subject 
		FROM adaptive_learning_test alt,adaptive_test_response atr,chapter c,SUBJECT s,student_details sd WHERE alt.student_id='$uid' AND alt.test_id=atr.test_id AND SUBJECT='$sb_result' AND alt.chapter_id=c.id  AND sd.user_id=alt.student_id
		  AND s.id=alt.subject  and sd.batch_id=alt.batch_id  and alt.batch_id ='$batch_id'  $sql");
	
		}
		
		
		$rw = mysql_num_rows($result);
		
		$unattempt=0;
		$correct=0;
		$incorrect=0;
		$i=0;
		$j=1;
		if($rw==0)
		{
		echo "No data available";
		goto labelend;
		}
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
					if($res == 'x' || $res == '')
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
			if($row[9]=="1")
			{
			$test_type="Customized";
			}
			else if($row[10]=="1")
			{
			$test_type="Chapter";
			}
			else if($row[11]=="1")
			{
			$test_type="Demand";
			}
			else if($row[12]=="1")
			{
			$test_type="Unit";
			}
			else if($row[9]=="adaptive_test")
			{
			$test_type="Adaptive";
			}
			else if($row[9]=="practise")
			{
			$test_type="Adaptive Learning";
			}
			else
			{
			$test_type="Online";
			}
				if($j%2 == 0)
				{
					echo "<tr id='$row[0],$row[6],$row[7],$row[5],$row[13]' style='width:100px;background-color:#5E9DC8;border:solid 1px;height:20px;'>";
					echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[1]."</b></label></center></td>";
					
						echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[0]."</b></label></center></td>";
						echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$test_type."</b></label></center></td>";
						echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[5]."</b></label></center></td>";
						echo "<td style='width:200px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[3]."</b></label></center></td>";
						echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[4]."</b></label></center></td>";
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
								echo "<td style='font-size:13px;width:55px;height:30px;border-width: 0px; border-style: solid; border-color: GREEN;'><b>Processing...<input type='button' class='defaultbutton' id='view_result1' value='   Refresh    ' /></b></td>";
								}
						//end checking
						}
					echo "</tr>";
					$j++;
				}
				else if($j%2 == 1)
				{
					echo "<tr id='$row[0],$row[6],$row[7],$row[5],$row[13]' style='width:100px;background-color:white;border:solid 1px;height:20px;'>";
					echo "<td style='width:100px;border:solid px;height:20px;'><center><label style='color:black'><b>".$row[1]."</b></label></center></td>";
						echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[0]."</b></label></center></td>";
							echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$test_type."</b></label></center></td>";
						echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[5]."</b></label></center></td>";
						echo "<td style='width:200px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[3]."</b></label></center></td>";
						echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[4]."</b></label></center></td>";
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
									echo "<td style='font-size:13px;width:55px;height:30px;border-width: 0px; border-style: solid; border-color: GREEN;'><b>Processing...<input type='button' class='defaultbutton' id='view_result1' value='   Refresh    ' /></b></td>";
								
								}
						//end checking
						}
					echo "</tr>";
					$j++;
				}
		}
		echo "</table>";
		labelend:
?>