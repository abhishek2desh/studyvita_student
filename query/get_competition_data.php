<?php

	include_once '../config.php';
	
	$user_id= $_GET['fac_id'];
	$result2=mysql_query("SELECT u.id,u.user_id,u.competition_name,DATE_FORMAT(u.comp_date,'%d-%m-%Y'),u.place,ct.name,cc.name,u.description FROM user_talent u,
competition_type ct,competition_category cc WHERE u.user_id='$user_id' AND ct.id=u.competition_id
AND cc.id=competition_category_id order by u.id desc");
$rw2=mysql_num_rows($result2);
	if($rw2==0)
	{
	echo "No data available";
	}
	else
	{
		echo "<table style='border:solid 1px;width:100%;'>";
		echo "<tr>
			<td style='width:2%;border:solid 1px;'><b></b></td>
			<td style='width:2%;border:solid 1px;'><b></b></td>
			<td style='width:10%;border:solid 1px;'><b>Competition Name</b></td>
				<td style='width:9%;border:solid 1px;'><b>Date</b></td>
			<td style='width:10%;border:solid 1px;'><b>Held At</b></td>
			<td style='width:10%;border:solid 1px;'><b>Communication Type</b></td>
			<td style='width:10%;border:solid 1px;'><b>Category</b></td>
			<td style='width:17%;border:solid 1px;'><b>Description</b></td>
			<td style='width:10%;border:solid 1px;'><b>Youtube Link</b></td>
			<td style='width:10%;border:solid 1px;'><b>Event Photo	</b></td>
				<td style='width:10%;border:solid 1px;'><b>Certificate	</b></td>
			</tr>";
			while($row2 = mysql_fetch_array($result2))
		{
		echo "<tr id='$row2[0]'>";
		echo "<td style='color:black;border:solid 1px;' valign='top'><center><input type='radio'   id='$row2[0]'  value='$row2[0]' name='htype'  /></center></td>";
		echo "<td style='color:black;border:solid 1px;' valign='top'><center><img src='images/remove_ico.ico' id='search_del' style='width:20px;height:20px'></center></td>";
		echo "<td style='border:solid 1px;' valign='top'>$row2[2]</td>";
			echo "<td style='border:solid 1px;' valign='top'>$row2[3]</td>";
				echo "<td style='border:solid 1px;' valign='top'>$row2[4]</td>";	
				echo "<td style='border:solid 1px;' valign='top'>$row2[5]</td>";
					echo "<td style='border:solid 1px;' valign='top'>$row2[6]</td>";
						echo "<td style='border:solid 1px;' valign='top'>$row2[7]</td>";
						$result=mysql_query("SELECT distinct link from user_talent_youtube_link where user_talent_id='$row2[0]' ");
			while($row = mysql_fetch_array($result))
			{
			$youtube_link=$youtube_link.$row[0]."<br/>";
			}
			echo "<td style='border:solid 1px;' valign='top'>$youtube_link</td>";
			$result5=mysql_query("SELECT distinct `filename` FROM `user_talent_photo` WHERE `user_talent_id`='$row2[0]'");
		$rw5=mysql_num_rows($result5);
		if($rw5==0)
		{
		echo "<td style='border:solid 1px;' valign='top'></td>";
		}
		else
		{
			echo "<td style='border:solid 1px;' valign='top'>";
			while($row5 = mysql_fetch_array($result5))
			{
			$imgpath="";
			$imgpath="talentphoto/".$row5[0];
			echo "<img src='$imgpath' style='width:10em;max-height:5em'><br/>";
			}
			echo "</td>";
		}
		$result6=mysql_query("SELECT distinct `filename` FROM `user_talent_certificate` WHERE `user_talent_id`='$row2[0]'");
		$rw6=mysql_num_rows($result6);
		if($rw6==0)
		{
		echo "<td style='border:solid 1px;' valign='top'></td>";
		}
		else
		{
			echo "<td style='border:solid 1px;' valign='top'>";
			while($row6 = mysql_fetch_array($result6))
			{
			$imgpath="";
			$imgpath="talentphoto/".$row6[0];
			echo "<img src='$imgpath' style='width:10em;max-height:5em'><br/>";
			}
			echo "</td>";
		}
		echo "</tr>";
		}
		echo "</table>";
	}
	
?>