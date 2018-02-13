<?php
		include '../config.php';
		$course_id=$_GET['course_id'];
		$uid=$_GET['uid'];
		$result1=mysql_query("SELECT course_times FROM `student_demo_criteria` ");
				while($row1=mysql_fetch_array($result1))
			{
				$totaltimes1=$row1[0];
			}
			$msg="This course will be available in your CourseList. You can see this demo $totaltimes1 times."; 
					
			echo $msg;
?>