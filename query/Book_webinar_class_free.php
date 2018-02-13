<?php
		include '../config.php';
		$online_id2=$_GET['online_id2'];
		$uid=$_GET['uid'];
		
			$sql1 = "insert into  webinar_class_book_detail(`user_id`,`webinar_id`)
		values('$uid','$online_id2')";
		$result3 = mysql_query($sql1);
			if ($result3)
			{
			$sql2 = "insert into  webinar_faculty_id(`user_id`,`webinar_id`)
		values('$uid','$online_id2')";
		$result2 = mysql_query($sql2);
		if ($result2)
			{
			}
			else
			{
			}
			}
			else
			{
			echo "Failed1";
			}
		
			
	
?>