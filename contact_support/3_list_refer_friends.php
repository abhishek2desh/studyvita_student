<?php
		include_once '../config.php';
		$uid=$_GET['user_id'];
		
		$result=mysql_query("SELECT user_id,Refer_name,Email,mobile,create_date,join_status,reward_point,join_date FROM friend_reffer WHERE user_id='$uid'");
		$rw = mysql_num_rows($result);
		
		$i=0;
		$j=1;
		echo "<table valign='top' style='border:solid 1px;width:1045px;height:20px;'>";
		while($row=mysql_fetch_array($result))
		{
				if($j%2 == 0)
				{
					echo "<tr style='width:100px;background-color:#5E9DC8;border:solid 1px;height:20px;'>";
					echo "<td style='width:50px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$j."</b></label></center></td>";
					echo "<td style='width:150px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[1]."</b></label></center></td>";
					echo "<td style='width:200px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[2]."</b></label></center></td>";
					echo "<td style='width:150px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[3]."</b></label></center></td>";
					echo "<td style='width:200px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[4]."</b></label></center></td>";
					if($row[5] == 0)
					{
						echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>Not Join</b></label></center></td>";
					}
					else
					{
						echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>Join</b></label></center></td>";
					}
					echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[7]."</b></label></center></td>";
					echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[6]."</b></label></center></td>";
					echo "</tr>";
					$j++;
				}
				else if($j%2 == 1)
				{
					echo "<tr style='width:100px;background-color:white;border:solid 1px;height:20px;'>";
					echo "<td style='width:50px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$j."</b></label></center></td>";
					echo "<td style='width:150px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[1]."</b></label></center></td>";
					echo "<td style='width:200px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[2]."</b></label></center></td>";
					echo "<td style='width:150px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[3]."</b></label></center></td>";
					echo "<td style='width:200px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[4]."</b></label></center></td>";
					if($row[5] == 0)
					{
						echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>Not Join</b></label></center></td>";
					}
					else
					{
						echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>Join</b></label></center></td>";
					}
					echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[7]."</b></label></center></td>";
					echo "<td style='width:100px;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[6]."</b></label></center></td>";
					echo "</tr>";
					$j++;
				}
		}
		echo "</table>";
		include_once '../conn_close.php';
?>