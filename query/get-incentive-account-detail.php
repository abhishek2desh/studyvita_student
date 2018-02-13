<?php 
	include_once '../config.php';
	$user_id=$_GET['user_id'];
	
	
	$rs = mysql_query("SELECT c.name,r.end_user_id,r.`Referee_incentive`,DATE_FORMAT(r.create_date,'%d-%m-%Y'),r.Transfer_to_account,DATE_FORMAT(r.Transfer_date,'%d-%m-%Y') FROM course c,USER u,`referral_code_detail` r WHERE u.id='$user_id' AND c.id=r.course_id AND r.`Referral_code`=u.`referal_code` ORDER BY r.create_date");
	
	 
	 $rw=mysql_num_rows($rs);
	 $totalrec=1;
	 $total_amount=0;
 //echo $rw;
	 if($rw == 0)
	 { 
	 echo "No Data Available";
	 }
	 else
	 {
			echo "<table style='width:100%;border:solid 1px;' cellspacing='0'>";
			echo "<tr><th style='border-bottom:solid 1px;border-right:solid 1px;' width='10%'>Date</th>";
			echo "<th style='border-bottom:solid 1px;border-right:solid 1px;' width='20%'>Student Name</th>";
			echo "<th style='border-bottom:solid 1px;border-right:solid 1px;' width='30%'>Course Name</th>";
			echo "<th style='border-bottom:solid 1px;' width='20%'>Amount</th>";
			echo "</tr>";
			while($row = mysql_fetch_array($rs))
			{
			$rs1 = mysql_query("Select name from user where id='$row[1]'");
				 while($row1 = mysql_fetch_array($rs1))
				 {
					echo "<tr>";
					//echo $totalrec."<br/>";
					if($totalrec==$rw)
					{
					echo "<td align='center' style='border-bottom:solid 0px;border-right:solid 1px;'>".$row[3]."</td>";
					echo "<td align='center' style='border-bottom:solid 0px;border-right:solid 1px;'>".$row1[0]."</td>";
					echo "<td align='center' style='border-bottom:solid 0px;border-right:solid 1px;'>".$row[0]."</td>";
					if($row[4]=="1")
					{
					echo "<td align='center' style='border-bottom:solid 0px;'>".$row[2]."(redeemed on ".$row[5].")</td>";
					}
					else
					{
						echo "<td align='center' style='border-bottom:solid 0px;'>".$row[2]."</td>";
						}
						$total_amount=$total_amount+$row[2];
					}
					else
					{
					echo "<td align='center' style='border-bottom:solid 1px;border-right:solid 1px;'>".$row[3]."</td>";
					echo "<td align='center' style='border-bottom:solid 1px;border-right:solid 1px;'>".$row1[0]."</td>";
						echo "<td align='center' style='border-bottom:solid 1px;border-right:solid 1px;'>".$row[0]."</td>";
						if($row[4]=="1")
					{
					echo "<td align='center' style='border-bottom:solid 1px;'>".$row[2]."(redeemed on ".$row[5].")</td>";
					}
					else
					{
						echo "<td align='center' style='border-bottom:solid 1px;'>".$row[2]."</td>";
						}
							$total_amount=$total_amount+$row[2];
					}
				
					echo "</tr>";
				
					
				 }
				 	$totalrec=$totalrec+1;
			}
			
				echo "</table>";
				if($total_amount>0)
				{
					echo "<br/><table style='width:100%;border:solid 0px;' cellspacing='0'>";
					echo "<tr>";
					echo "<td align='right' style='border-bottom:solid 0px;border-right:solid 0px;'>Total Amount: ".$total_amount."</td>";
					echo "</tr>";
					echo "</table>";
				}
	 }
	

	/*$rs = mysql_query("SELECT Recharge_deduction,id,DATE_FORMAT(create_date,'%d-%m-%y'),Total_Balance,Recharge_id,scheme_id,amount
 FROM `user_recharge_usage_detail` WHERE user_id='$fac_id' ORDER BY id");
 $rw = mysql_num_rows($rs);
		if($rw == 0)
		{
			echo "No Data Available";
			
		}
		else
		{
		echo "<table style='width:100%;'>";
						
							echo "<tr><th style='border:solid 1px;' width='10'>Date</th>";
							echo "<th style='border:solid 1px;' width='45'>Transaction details</th>";
							echo "<th style='border:solid 1px;' width='15'>Debit</th>";
							echo "<th style='border:solid 1px;' width='15'>Credit</th>";
							echo "<th style='border:solid 1px;' width='15'>Balance</th>";
							echo "</tr>";
			while($row = mysql_fetch_array($rs))
			{
				if($row[0]=="D")
				{
					$rs1 = mysql_query("SELECT d.document_id,d.download_type,dp.totalpages FROM `download_material_history` d,`document_page_information` dp
 WHERE dp.documentid=d.document_id AND d.`user_recharge_id`='$row[1]'");
				 while($row1 = mysql_fetch_array($rs1))
				 {
					echo "<tr>";
					echo "<td style='border:solid 1px;'>".$row[2]."</td>";
					if($row1[1]=="pdf" || $row1[1]=="word")
					{
					echo "<td style='border:solid 1px;'>DocumentID:".$row1[0]."<br/>".$row1[1]." download ".$row1[2]." pages</td>";
					}
					else
					{
					echo "<td style='border:solid 1px;'>DocumentID:".$row1[0]."<br/>".$row1[1]."&nbsp;"
					.$row1[2]." pages</td>";
					}
					
					echo "<td align='right' style='border:solid 1px;padding-right:5px;'>".$row[6]."</td>";
					echo "<td style='border:solid 1px;'></td>";
					echo "<td align='right' style='border:solid 1px;padding-right:5px;'>".$row[3]."</td>";
					echo "</tr>";
				 }
				}
				elseif($row[0]=="R")
				{
					echo "<tr>";
					echo "<td style='border:solid 1px;'>".$row[2]."</td>";
					echo "<td style='border:solid 1px;'>Recharge ".$row[6]."</td>";
					echo "<td style='border:solid 1px;'></td>";
					echo "<td align='right' style='border:solid 1px;padding-right:5px;'>".$row[6]."</td>";
					echo "<td align='right' style='border:solid 1px;padding-right:5px;'>".$row[3]."</td>";
					echo "</tr>";
				
				}
			}
		}
	*/
	
?>