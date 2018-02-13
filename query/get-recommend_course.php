<?php
	
		include_once '../config.php';
		
		$course_id=$_GET['course_id'];
		$batch_id=$_GET['batch_id'];
	$uid=$_GET['uid'];
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
/*	$rs = mysql_query("SELECT u.name,c.name,u.referal_code,c.course_fees,c.end_user_discount,c.id,r.user_id FROM user u,course c,recommend_course r WHERE r.user_id=u.id AND  r.course_id='$course_id' and r.batch_id='$batch_id' and c.id=r.course_id  ");*/
$rs = mysql_query("SELECT u.name,c.name,u.referal_code,c.course_fees,c.end_user_discount,c.id,r.user_id FROM user u,course c,recommend_course r WHERE r.user_id=u.id AND   r.batch_id='$batch_id' and c.id=r.course_id  ");
	$rw = mysql_num_rows($rs);
	echo "<table style='width:100%;'>";
											
						
							echo "<tr><th style='border:solid 1px;' width='70'>Course Name</th>";
								echo "<th style='border:solid 1px;' width='70'>MRP</th>";
									echo "<th style='border:solid 1px;' width='70'>Discount</th>";
										echo "<th style='border:solid 1px;' width='70'>Net Payment</th>";
							echo "<th style='border:solid 1px;' width='70'>Recommend By</th>";
								echo "<th style='border:solid 1px;' width='70'>Referal Code</th>";
									echo "<th style='border:solid 1px;' width='70'></th></tr>";
									$flg=0;
							if($rw == 0)
		{
			echo "<tr><td>No Data Available</td></tr>";
			
		}
		else
		{
		while($row = mysql_fetch_array($rs))
			{
			
			echo "<tr  id='$row[5]|$row[2]'>";
					

					echo "<td style='border:solid 1px;'>".$row[1]."</td>";
						echo "<td style='border:solid 1px;'>".$row[3]."</td>";
						if($int_id=="")
						{
						$dicnt=($row[3]*$row[4])/100;
						echo "<td style='border:solid 1px;'>".$dicnt."</td>";
					$netpay=$row[3]-(($row[3]*$row[4])/100);
							echo "<td style='border:solid 1px;'>".$netpay."</td>";
						}
						else
						{
						$rs2=mysql_query("SELECT cf.`student_discount_percentage`,
cf.`service_tax_percentage`,cf.`school_development_percentage`,cf.`teacher_welfare_percentage`,cf.principal_welfare_percentage,cf.`coordinator_welfare_percentage`,cf.`site_usage_reward_fund`,c.course_fees,cf.incentive_type FROM `course_fees_incentive_schoolwise_buyer` cf,course c WHERE cf.course_id=c.id AND  c.id='$row[5]' and cf.incentive_type='course' and cf.school_id='$int_id'");
						/*$rs2=mysql_query("SELECT cf.`student_discount_percentage` FROM `course_fees_incentive_schoolwise` cf,USER u WHERE cf.course_id='$row[5]'
	AND u.id=cf.school_id AND u.referal_code='$row[2]' and cf.incentive_type='course'");
						$rs2 = mysql_query("SELECT `student_discount_percentage` FROM `course_fees_incentive_schoolwise` WHERE course_id='$row[5]' AND school_id='$int_id' and incentive_type='course'");*/
						$rw2= mysql_num_rows($rs2);
						if($rw2==0)
						{
						$dicnt=($row[3]*$row[4])/100;
							echo "<td style='border:solid 1px;'>".$dicnt."</td>";
							//$netpay=$row[3]-$row[4];
							$netpay=$row[3]-(($row[3]*$row[4])/100);
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
							
							echo "<td style='border:solid 1px;'>".$netpay."</td>";
							}
							
							

						}
						
						}
					echo "<td style='border:solid 1px;'>".$row[0]."</td>";
					echo "<td style='border:solid 1px;'>".$row[2]."</td>";
					//for checking student registered or not
			$rsf = mysql_query("SELECT id FROM `student_registered_course` WHERE course_id='$row[5]' AND user_id='$uid' ");
			$rw_rsf=mysql_num_rows($rsf);
			if($rw_rsf==0)
			{
			echo "<td style='border:solid 1px;' valign='center'><input type='button' class='defaultbutton' id='search1' value=' Buy Now ' style='width:100%;'/></td>";
					
			}
			else
			{
			echo "<td style='border:solid 1px;' valign='center'>Purchased</td>";
					
			}
			//end checking
						
					echo "</tr>";
		}
		}
	//echo $int_id;
	
	?>