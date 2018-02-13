<?php
include_once '../config.php';
$area_id=$_GET['area_id'];
$result=mysql_query("SELECT pincode,office_name,taluk,district_name,state_name FROM `pincode` WHERE (office_name LIKE '%$area_id%' OR  taluk LIKE '%$area_id%' OR district_name LIKE '%$area_id%' OR state_name LIKE '%$area_id%')");
$rw=mysql_num_rows($result);
	if($rw==0)
	{
	echo "No data available";
	}
	else
	{
		echo "<table style='border:solid 1px;width:100%;height:100px;'>";
		echo "<tr>";
			//<td style='width:3%;border:solid 1px;'><b></b></td>
			echo "<td style='width:10%;border:solid 1px;'><b>Pincode</b></td>
				<td style='width:20%;border:solid 1px;'><b>Area</b></td>
			<td style='width:20%;border:solid 1px;'><b>Taluko</b></td>
			<td style='width:20%;border:solid 1px;'><b>District</b></td>
		
			<td style='width:30%;border:solid 1px;'><b>State</b></td>";
			
			echo "</tr>";
			while($row = mysql_fetch_array($result))
			{
			echo "<tr id='$row[0]'>";
			//echo "<td style='color:black;border:solid 1px;' valign='top'><center><input type='radio'   id='$row[0]'  value='$row[0]' name='htype'  /></center></td>";
			echo "<td style='border:solid 1px;' valign='top'><input type='text' class='inputs'  value='$row[0]' /></td>";
			echo "<td style='border:solid 1px;' valign='top'>$row[1]</td>";
			echo "<td style='border:solid 1px;' valign='top'>$row[2]</td>";
			echo "<td style='border:solid 1px;' valign='top'>$row[3]</td>";
			echo "<td style='border:solid 1px;' valign='top'>$row[4]</td>";
			echo "</tr>";
			}
			echo "</table>";
	}
?>