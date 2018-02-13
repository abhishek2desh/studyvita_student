<?php 
	
	include_once '../config.php';
	
	$group_id = $_GET['group_id'];
	$result=mysql_query("SELECT gp.sub_id,s.name FROM `group_subject_mapping` gp,SUBJECT s WHERE gp.sub_id=s.id 
						 AND gp.group_id='$group_id' AND gp.sub_id NOT IN(20) ");
	
	echo "<option value='0'>Select Subject</option>";
	while($row=mysql_fetch_array($result))
	{
		echo "<option value='$row[0]'>$row[1]</option>";
	}
?>