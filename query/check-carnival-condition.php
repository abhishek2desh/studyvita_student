<?php
		include '../config.php';
		$uid=$_GET['uid'];
		$course_id=$_GET['course_id'];
		$carnival_user=0;
		$result=mysql_query("SELECT iscarnival FROM user where id='$uid'");
		while($row= mysql_fetch_array($result))
		{
		$carnival_user=$row[0];
		}
		$carnival_campcourse=0;
		$result=mysql_query("SELECT sc.campaign_id FROM `special_campaign_course`sc,special_campaign_list sl WHERE sc.course_id='$course_id' and sl.id= sc.campaign_id and sl.active=1");
	$rw= mysql_num_rows($result);
	if($rw>0)
	{
	$carnival_campcourse=1;
	}
	if($carnival_user=="1" && $carnival_campcourse=="1")
	{
	echo "1";
	}
	else
	{
	echo "0";
	}
		
?>