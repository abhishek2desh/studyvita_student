<?php
		include_once '../config.php';
		$user_id=$_GET['user_id'];
		$result=mysql_query("SELECT r.id,`Referee_incentive`,DATE_FORMAT(r.create_date,'%d-%m-%Y') FROM `referral_code_detail` r,USER u WHERE u.id='$user_id'
 AND r.`Referral_code`=u.referal_code AND r.Referee_incentive>0 AND r.`Transfer_to_account`='0' ");
 $rw = mysql_num_rows($result);
 if($rw==0)
 {
	echo "No Data Available";
 }
 else
 {
	echo "<table style='width:100%;'>";
											
						
							echo "<tr><th style='border:solid 1px;' width='70'>Date</th>";
							echo "<th style='border:solid 1px;' width='70'>Amount</th>";
								echo "<th style='border:solid 1px;' width='70'></th></tr>";
	while($row=mysql_fetch_array($result))
		{
			echo "<tr  id='$row[0]|$row[1]'>";
			echo "<td style='border:solid 1px;'>".$row[2]."</td>";
			echo "<td style='border:solid 1px;'>".$row[1]."</td>";
			echo "<td style='border:solid 1px;'><input type='button' class='defaultbutton' id='tranfer_inc' value='Redeem Now' /></td>";
			echo "</tr>";
		}
		echo "</table>";
 }
 
		
?>