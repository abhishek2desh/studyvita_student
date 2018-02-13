<?php
		include '../config.php';
		$course_id=$_GET['course_id'];
		$uid=$_GET['uid'];
		$batch_id=$_GET['batch_id'];
		$str="";
		$result=mysql_query("SELECT sc.campaign_id FROM `special_campaign_course`sc,special_campaign_list sl WHERE sc.course_id='$course_id' and sl.id= sc.campaign_id and sl.active=1");
	$rw= mysql_num_rows($result);
	if($rw>0)
	{
		$camp_id=0;
		while($row= mysql_fetch_array($result))
		{
		$camp_id=$row[0];
		}
		$result1=mysql_query("SELECT `minimum_chapter`,`total_question` FROM `special_campaign_course` WHERE `campaign_id`='$camp_id' AND `course_id`='$course_id'");
		while($row1= mysql_fetch_array($result1))
		{
		$str=$row1[0]."|".$row1[1];
		}
		echo $str;
	}
?>