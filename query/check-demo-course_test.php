<?php
		include '../config.php';
		$course_id=$_GET['course_id'];
		$uid=$_GET['uid'];
		$course_name=$_GET['course_name'];
		
		$result=mysql_query("SELECT id,total_times FROM `student_demo_course` WHERE user_id='$uid' AND course_id='$course_id' and course_id not in(select distinct course_id from student_registered_course where user_id='$uid') ");
		$rw = mysql_num_rows($result);
		if($rw==0)
		{
		 echo "success";
		}
		else
		{
		$totaltimes=0;
			$totaltimes1=0;
			while($row=mysql_fetch_array($result))
			{
			$totaltimes=$row[1];
			}
			$result1=mysql_query("SELECT course_times FROM `student_demo_criteria` ");
				while($row1=mysql_fetch_array($result1))
			{
				$totaltimes1=$row1[0];
			}
			$total_time=0;
				$total_time=$totaltimes;
				/*$msg="Welcome to  $course_name demo. You can view this course for $totaltimes1 times. 
					View Times-$total_time/$totaltimes1";*/
					$tt=$totaltimes1-$total_time;
					echo "Welcome to  $course_name demo.<br/>You can view these course $tt times more only.<br/>Register to get unlimited access";
					/*$msg="Welcome to  $course_name demo. Register to get unlimited access. You can view these course $tt times more";
			echo $msg;*/
			//echo "View-$total_time/$totaltimes1";
			
		}
?>