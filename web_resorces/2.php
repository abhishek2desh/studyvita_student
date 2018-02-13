<?php 
	
	include_once '../config.php';
	$fb=$_GET['fac_id'];
	$result=mysql_query("SELECT sub_id,s.name FROM staff_subject sd,SUBJECT s WHERE user_id='$fb'
	AND s.id=sd.sub_id");
	$rw=mysql_num_rows($result);
	if($rw == "")
	{
		echo "<option value=''>No Data Available</option>";
	}
	else
	{
		echo "<option value=''>Select Subject</option>";
		while($row=mysql_fetch_array($result))
		{
			echo "<option value=$row[0]>$row[1]</option>";
		}
	}
	
?>