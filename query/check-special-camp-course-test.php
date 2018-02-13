<?php
		include '../config.php';
		$course_id=$_GET['course_id'];
		$uid=$_GET['uid'];
		$result=mysql_query("SELECT sc.campaign_id FROM `special_campaign_course`sc,special_campaign_list sl WHERE sc.course_id='$course_id' and sl.id= sc.campaign_id and sl.active=1");
	$rw= mysql_num_rows($result);
	if($rw>0)
	{
	echo "1";
	/*$result1=mysql_query("SELECT iscarnival FROM USER WHERE id='$uid'");
	while($row1=mysql_fetch_array($result1))
			{
				echo $row1[0];
			}*/
	
	}
	else
	{
	echo "0";
	}
?>		