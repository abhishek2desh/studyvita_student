<?php
		include_once 'config.php';
		$uid=$_GET['uid'];
		$dt=date('Y-m-d');
		$result=mysql_query("SELECT DISTINCT md.subject,md.chaptername,md.Pathfilename,SUBSTRING(md.FilenameOnline,5),CONCAT(DATE_FORMAT(vd.to_date,'%d-%m-%y'),' TO ',DATE_FORMAT(vd.from_date,'%d-%m-%y')),vd.to_date,vd.from_date FROM `video_link_to_student` vd,media_manager md WHERE md.id=vd.video_id AND user_id ='$uid'");
		$rw = mysql_num_rows($result);
		echo "<table valign='top' style='border:solid 1px;width:100%;height:25px;'>";
		while($row=mysql_fetch_array($result))
		{
				if($j%2 == 0)
				{
					echo "<tr id='$row[0],$row[1],$row[2],$row[3]' style='width:100px;background-color:#5E9DC8;border:solid 1px;height:20px;'>";
					echo "<td style='width:width:10%;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[0]."</b></label></center></td>";
						echo "<td style='width:25%;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[1]."</b></label></center></td>";
						echo "<td style='width:30%;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[3]."</b></label></center></td>";
						echo "<td style='width:20%;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[4]."</b></label></center></td>";
						if (($dt > $row[5]) && ($paymentDate < $row[6]))
						{
							echo "<td style='width:15%; style='font-size:13px;width:55px;height:30px;border-width: 2px; border-style: solid; border-color: GREEN;'><b><input type='button' class='defaultbutton' id='view_video' value='View Video' /></b></td>";
							echo "<td style='width:15%; style='font-size:13px;width:55px;height:30px;border-width: 2px; border-style: solid; border-color: GREEN;'><b><input type='button' class='defaultbutton' id='view_video' value='View Video' /></b></td>";
						}
						else
						{
							echo "<td style='width:15%; style='font-size:13px;width:55px;height:30px;border-width: 2px; border-style: solid; border-color: GREEN;'><b><input type='button' disabled='disabled'  class='defaultbutton' id='view_video' value='View Video' /></b></td>";
						}
						
					echo "</tr>";
					$j++;
				}
				else if($j%2 == 1)
				{
					echo "<tr id='$row[0],$row[1],$row[2],$row[3]' style='width:100px;background-color:white;border:solid 1px;height:20px;'>";
					echo "<td style='width:width:10%;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[0]."</b></label></center></td>";
						echo "<td style='width:25%;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[1]."</b></label></center></td>";
						echo "<td style='width:30%;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[3]."</b></label></center></td>";
						echo "<td style='width:20%;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[4]."</b></label></center></td>";
						if (($dt > $row[5]) && ($paymentDate < $row[6]))
						{
							echo "<td style='width:15%; style='font-size:13px;width:55px;height:30px;border-width: 2px; border-style: solid; border-color: GREEN;'><b><input type='button' class='defaultbutton' id='view_video' value='View Video' /></b></td>";
						}
						else
						{
							echo "<td style='width:15%; style='font-size:13px;width:55px;height:30px;border-width: 2px; border-style: solid; border-color: GREEN;'><b><input type='button' disabled='disabled' class='defaultbutton' id='view_video' value='View Video' /></b></td>";
						}
					echo "</tr>";
					$j++;
				}
		}
		echo "</table>";
?>