<?php
	
		include_once '../config.php';
		
		$cid=$_GET['cid'];
		
		$result1=mysql_query("SELECT b.name,ct.name,DATE_FORMAT(b.start_on,'%d-%m-%Y'),DATE_FORMAT(b.end_on,'%d-%m-%Y'),b.id,br.name FROM `batch` b ,`course_type_mapping` ctm,course_type  ct,`branch` br WHERE b.course_type_mapping_id=ctm.id AND ctm.course_id='$cid' AND ctm.course_type_id=ct.id and b.branch_id=br.id");
		
		$rw1 = mysql_num_rows($result1);
		echo "<table style='width:100%'>";
		echo "";
		if($rw1 == 0)
		{
			echo "<tr><td>No Data Available</td></tr>";
		}
		else
		{
			while($row1=mysql_fetch_array($result1))
			{
				echo "<tr><td style='border:solid 1px;width:5%;'><input type='radio' name='name_uk_cn' id='$row1[4]' class='ck1' value='$row1[0]' /></td><td style='border:solid 1px;width:20%;'>$row1[0]</td><td style='width:15%;border:solid 1px;'>$row1[1]</td><td style='width:15%;border:solid 1px;'>$row1[5]</td><td style='width:15%;border:solid 1px;'>$row1[2]</td><td style='width:15%;border:solid 1px;'>$row1[3]</td><td style='width:15%;border:solid 1px;'>Fees</td></tr>";
			}
		}
		echo "</table>";
?>