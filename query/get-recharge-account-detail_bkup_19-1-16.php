<?php 
	include_once '../config.php';
	$user_id=$_GET['user_id'];
	echo "<table style='width:100%;'>";
	echo "<tr>";
	echo "<td style='width:60%;'><b>Download History</b>";
	echo "</td>";
	echo "<td style='width:12%;'>";
	echo "</td>";
	echo "<td  valign='top' style='width:28%;'><b>Recharge History</b>";
	echo "</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td style='width:60%;'>";
	
	/*$rs = mysql_query("SELECT Recharge_deduction,id,DATE_FORMAT(create_date,'%d-%m-%Y'),Total_Balance,Recharge_id,scheme_id,amount
	FROM `user_recharge_usage_detail`  WHERE user_id='$fac_id' and Recharge_deduction='D' and description is null ORDER BY id");*/
	$rs = mysql_query("SELECT Recharge_deduction,id,DATE_FORMAT(create_date,'%d-%m-%Y'),Total_Balance,Recharge_id,scheme_id,amount
	FROM `user_recharge_usage_detail`  WHERE user_id='$user_id' and Recharge_deduction='D' AND id in (select distinct user_recharge_id  from download_material_history where user_id='$user_id' and  user_recharge_id IS NOT NULL) ORDER BY id");
	 
	 $rw=mysql_num_rows($rs);
	 $totalrec=1;
 //echo $rw;
	 if($rw == 0)
	 { 
	 echo "No Data Available";
	 }
	 else
	 {
			echo "<table style='width:100%;border:solid 1px;' cellspacing='0'>";
			echo "<tr><th style='border-bottom:solid 1px;border-right:solid 1px;' width='10'>Date</th>";
			echo "<th style='border-bottom:solid 1px;border-right:solid 1px;' width='45'>Document ID</th>";
			echo "<th style='border-bottom:solid 1px;' width='15'>No of Pages</th>";
						echo "<th style='border-bottom:solid 1px;' width='15'>Amount</th>";
			echo "</tr>";
			while($row = mysql_fetch_array($rs))
			{
			$rs1 = mysql_query("SELECT d.document_id,d.download_type,dp.totalpages FROM `download_material_history` d,`document_page_information` dp
				WHERE dp.documentid=d.document_id AND d.`user_recharge_id`='$row[1]'");
				 while($row1 = mysql_fetch_array($rs1))
				 {
					echo "<tr>";
					//echo $totalrec."<br/>";
					if($totalrec==$rw)
					{
					echo "<td align='center' style='border-bottom:solid 0px;border-right:solid 1px;'>".$row[2]."</td>";
					echo "<td align='center' style='border-bottom:solid 0px;border-right:solid 1px;'>".$row1[0]."</td>";
						echo "<td align='center' style='border-bottom:solid 0px;border-right:solid 1px;'>".$row1[2]."</td>";
												echo "<td align='center' style='border-bottom:solid 0px;'>".$row[6]."</td>";

					}
					else
					{
					echo "<td align='center' style='border-bottom:solid 1px;border-right:solid 1px;'>".$row[2]."</td>";
					echo "<td align='center' style='border-bottom:solid 1px;border-right:solid 1px;'>".$row1[0]."</td>";
						echo "<td align='center' style='border-bottom:solid 1px;border-right:solid 1px;'>".$row1[2]."</td>";
						echo "<td align='center' style='border-bottom:solid 1px;'>".$row[6]."</td>";
					}
				
					echo "</tr>";
				
					
				 }
				 	$totalrec=$totalrec+1;
			}
			 echo "</table>";
	 }
	
	 echo "</td>";
	 echo "<td  style='width:12%;'>";
	 
	 echo "</td>";
	 echo "<td  valign='top' style='width:28%;'>";
	 $rs = mysql_query("SELECT Recharge_deduction,id,DATE_FORMAT(create_date,'%d-%m-%Y'),Total_Balance,Recharge_id,scheme_id,amount
	FROM `user_recharge_usage_detail`  WHERE user_id='$user_id' and Recharge_deduction='R' ORDER BY id");
	  $rw=mysql_num_rows($rs);
	  $totalrec=1;
	 if($rw == 0)
	 { 
	 echo "No Data Available";
	 }
	 else
	 {
			echo "<table style='width:100%;border:solid 1px;' cellspacing='0'>";
			echo "<tr><th style='border-bottom:solid 1px;border-right:solid 1px;' width='10'>Date</th>";
			echo "<th style='border-bottom:solid 1px;border-right:solid 0px;' width='45'>Amount(Rs.)</th>";
		
			echo "</tr>";
			while($row = mysql_fetch_array($rs))
			{
					echo "<tr>";
					if($totalrec==$rw)
					{
					echo "<td align='center' style='border-bottom:solid 0px;border-right:solid 1px;'>".$row[2]."</td>";
					if($row[4]=="")
					{
					echo "<td align='center' style='border-bottom:solid 0px;'>".$row[6]." (Incentive)</td>";
					}
					else
					{
					echo "<td align='center' style='border-bottom:solid 0px;'>".$row[6]."</td>";
					}
					
					}
					else
					{
					echo "<td align='center' style='border-bottom:solid 1px;border-right:solid 1px;'>".$row[2]."</td>";
					if($row[4]=="")
					{
					echo "<td align='center' style='border-bottom:solid 1px;'>".$row[6]." (Incentive)</td>";
					}
					else
					{
					echo "<td align='center' style='border-bottom:solid 1px;'>".$row[6]."</td>";
					}
					}
					
					echo "</tr>";
				 $totalrec=$totalrec+1;
			}
			 echo "</table>";
	 }
	 echo "</td>";
	 echo "</tr>";
	 //for sms sending
	 echo "<tr>";
	echo "<td><b>Usage History</b>";
	$rs5 = mysql_query("SELECT Recharge_deduction,id,DATE_FORMAT(create_date,'%d-%m-%Y'),description,amount
	FROM `user_recharge_usage_detail`  WHERE user_id='$user_id' and Recharge_deduction='D' and description is not null  AND id  not in (select distinct user_recharge_id from download_material_history where user_id='$user_id' and  user_recharge_id IS NOT NULL)  ORDER BY id");

	  $totalrec=1;
	 $rw5=mysql_num_rows($rs5);
	
	 if($rw5 == 0)
	 { 
	 echo "No Data Available";
	 }
	 else
	 {
		echo "<table style='width:100%;border:solid 1px;' cellspacing='0'>
			<tr><th style='border-bottom:solid 1px;border-right:solid 1px;' width='20%'>Date</th>
			<th style='border-bottom:solid 1px;border-right:solid 1px;' width='80%'>Description</th>
			<th style='border-bottom:solid 1px;border-right:solid 0px;' width='80%'>Amount</th></tr>";
			while($row5 = mysql_fetch_array($rs5))
			{
			echo "<tr>";
					if($totalrec==$rw5)
					{
						echo "<td align='center' style='border-bottom:solid 0px;border-right:solid 1px;'>".$row5[2]."</td>";
					echo "<td align='center' style='border-bottom:solid 0px;border-right:solid 1px;'>".$row5[3]."</td>";
					echo "<td align='center' style='border-bottom:solid 0px;'>".$row5[4]."</td>";
					}
					else
					{
					echo "<td align='center' style='border-bottom:solid 1px;border-right:solid 1px;'>".$row5[2]."</td>";
					echo "<td align='center' style='border-bottom:solid 1px;border-right:solid 1px;'>".$row5[3]."</td>";
					echo "<td align='center' style='border-bottom:solid 1px;'>".$row5[4]."</td>";
					}
				 $totalrec=$totalrec+1;
					
					
					echo "</tr>";
			}
			echo "</table>";
	 }

	  echo "</td>";
	  	echo "<td>";
	
	  echo "</td>";
	  	echo "<td>";
	
	  echo "</td>";
	  echo "</tr>";
	 echo "</table>";
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