<?php
		include_once '../config.php';
		$uid=$_GET['uid'];
		
		$result=mysql_query("SELECT DISTINCT pr.Test_id,DATE_FORMAT(DATE(ps.start_time),'%d-%m-%Y'),TIMEDIFF(ps.end_time,ps.start_time) ,s.name,pr.assignment_id
							FROM personalassignment_response pr,personalassignment_studentwise ps,SUBJECT s WHERE ps.Test_id = pr.test_id 
							AND s.id=ps.SubID AND ps.student_id='$uid' ORDER BY ps.start_time DESC");
		$rw = mysql_num_rows($result);
		
		$unattempt=0;
		$correct=0;
		$incorrect=0;
		$i=0;
		$j=1;
		
		echo "<table valign='top' style='border:solid 1px;width:1000px;height:25px;'>";
		while($row=mysql_fetch_array($result))
		{
			$unattempt="";
			$correct="";
			$incorrect="";
			
			$result1=mysql_query("SELECT DISTINCT COUNT(Qno) FROM personalassignment_response WHERE test_id='$row[0]' AND Assignment_id='$row[4]' AND user_id = '$uid'");
			$row1=mysql_fetch_array($result1);
			$total=$row1[0];
			
			$result2=mysql_query("SELECT response,correct_ans FROM personalassignment_response WHERE test_id='$row[0]' AND Assignment_id='$row[4]' AND user_id = '$uid'");
			
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
				echo "<tr style='width:100px;background-color:#5E9DC8;border:solid 1px;height:20px;'>";
				echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[1]."</b></label></center></td>";
					echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[0]."</b></label></center></td>";
					echo "<td style='width:150px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[4]."</b></label></center></td>";
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
					
				echo "</tr>";
				$j++;
			}
			else if($j%2 == 1)
			{
				echo "<tr style='width:100px;background-color:white;border:solid 1px;height:20px;'>";
				echo "<td style='width:100px;border:solid px;height:20px;'><center><label style='color:black'><b>".$row[1]."</b></label></center></td>";
					echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[0]."</b></label></center></td>";
					echo "<td style='width:150px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[4]."</b></label></center></td>";
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
				echo "</tr>";
				$j++;
			}
		}
		echo "</table>";
		include_once '../conn_close.php';
?>