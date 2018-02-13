<?php
		include '../config.php';
		$course_id=$_GET['course_id'];
		$uid=$_GET['uid'];
		$batch_id=$_GET['batch_id'];
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
			$result1=mysql_query("SELECT Adaptive_test FROM student_demologin_criteria ");
			while($row1=mysql_fetch_array($result1))
			{
				$totaltimes1=$row1[0];
			}
			$result2=mysql_query("SELECT COUNT(id) FROM `adaptive_learning_test` WHERE student_id='$uid' AND batch_id='$batch_id' and test_type='test'");
			while($row2=mysql_fetch_array($result2))
			{
				$totaltimes=$row2[0];
			}
			$totaltimes=$totaltimes+1;
			 echo "Demo Account Test  $totaltimes/$totaltimes1. Register for unlimited ChapterWise Adaptive test Practice.";
			
		}
		
?>