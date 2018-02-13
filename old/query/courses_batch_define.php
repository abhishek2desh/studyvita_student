<?php
	
		include_once '../config.php';
		
		$cid=$_GET['cid'];
		
		$result1=mysql_query("SELECT b.name,ct.name,b.start_on,b.end_on,b.id FROM `batch` b ,`course_type_mapping` ctm,course_type  ct 
								WHERE b.course_type_mapping_id=ctm.id AND ctm.course_id='$cid' AND ctm.course_type_id=ct.id");
		
		$rw1 = mysql_num_rows($result1);
		if($rw1 == 0)
		{
			echo "<option value='0'>No Data Available.</option>";
		}
		else
		{
			while($row1=mysql_fetch_array($result1))
			{
				echo "<option value='$row1[4]'>$row1[0]-$row1[1]-$row1[2]-$row1[3]</option>";
			}
		}
		
?>