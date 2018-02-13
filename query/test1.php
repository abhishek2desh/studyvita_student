<?php
	
		include_once '../config.php';
		
		$course_id=$_GET['course_id']='195';
		$batch_id=$_GET['batch_id']='368';
	$uid=$_GET['uid']='9352';
	$int_id="";
	$rs1 = mysql_query("SELECT created_by,institute_id FROM USER WHERE id='$uid' ");
	while($row1 = mysql_fetch_array($rs1))
	{
	$int_id=$row1[0];
	if($int_id=="")
	{
	$int_id=$row1[1];
	}
	
	}
	$rs = mysql_query("SELECT u.name,c.name,u.referal_code,c.course_fees,c.end_user_discount,c.id FROM user u,course c,recommend_course r WHERE r.user_id=u.id AND  r.course_id='$course_id' and r.batch_id='$batch_id' and c.id=r.course_id  ");

	$rw = mysql_num_rows($rs);
	echo "<table style='width:100%;'>";
											
						
							echo "<tr><th style='border:solid 1px;' width='70'>Course Name</th>";
								echo "<th style='border:solid 1px;' width='70'>MRP</th>";
									echo "<th style='border:solid 1px;' width='70'>Discount</th>";
										echo "<th style='border:solid 1px;' width='70'>Net Payment</th>";
							echo "<th style='border:solid 1px;' width='70'>Recommend By</th>";
								echo "<th style='border:solid 1px;' width='70'>Referal Code</th></tr>";
									
							if($rw == 0)
		{
			echo "<tr><td>No Data Available</td></tr>";
			
		}
		else
		{
		while($row = mysql_fetch_array($rs))
			{
			echo "<tr >";
					

					echo "<td style='border:solid 1px;'>".$row[1]."</td>";
						echo "<td style='border:solid 1px;'>".$row[3]."</td>";
						if($int_id=="")
						{
						echo "<td style='border:solid 1px;'>".$row[4]."</td>";
						$netpay=$row[3]-$row[4];
							echo "<td style='border:solid 1px;'>".$netpay."</td>";
						}
						else
						{
						$rs2 = mysql_query("SELECT `student_discount_percentage` FROM `course_fees_incentive_schoolwise` WHERE course_id='$row[5]' AND school_id='$int_id'");
						$rw2= mysql_num_rows($rs2);
						if($rw2==0)
						{
							echo "<td style='border:solid 1px;'>".$row[4]."</td>";
							$netpay=$row[3]-$row[4];
							echo "<td style='border:solid 1px;'>".$netpay."</td>";
						}
						else
						{
						$per="";
							while($row2 = mysql_fetch_array($rs2))
							{
							$per=$row2[0];
							//echo "per".$per;
							}
							
							if($per==0)
							{
							echo "<td style='border:solid 1px;'>".$per."</td>";
							
							echo "<td style='border:solid 1px;'>".$row[3]."</td>";
							}
							else
							{
							$netpay=$row[3]-(($row[3]*$per)/100);
							$dis=($row[3]*$per)/100;
							echo "<td style='border:solid 1px;'>".$dis."</td>";
							
							echo "<td style='border:solid 1px;'>".$row[3]."</td>";
							}
							
							

						}
						
						}
					echo "<td style='border:solid 1px;'>".$row[0]."</td>";
					echo "<td style='border:solid 1px;'>".$row[2]."</td>";
					
					
					
					echo "</tr>";
		}
		}
	//echo $int_id;
	
	?>