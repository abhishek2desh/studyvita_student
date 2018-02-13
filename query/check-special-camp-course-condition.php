<?php
		include '../config.php';
		$course_id=$_GET['course_id'];
		$uid=$_GET['uid'];
		$batch_id=$_GET['batch_id'];
		$testtype=$_GET['testtype'];
		//$result=mysql_query("SELECT id FROM `special_campaign_course` WHERE course_id='$course_id' ");
		$result=mysql_query("SELECT sc.campaign_id FROM `special_campaign_course`sc,special_campaign_list sl WHERE sc.course_id='$course_id' and sl.id= sc.campaign_id and sl.active=1");
		
		$rw = mysql_num_rows($result);
		if($rw==0)
		{
		 echo "success";
		}
		else
		{
		$result_st=mysql_query("SELECT faculty_as_student FROM `user` WHERE id='$uid'  ");
			while($row_st=mysql_fetch_array($result_st))
			{
			$factasstudent=$row_st[0];
			}
			if($factasstudent=="1")
			{
			 echo "success";
			}
			else
			{
			
			$totaltimes=0;
			$totaltimes1=0;
			if($testtype=="adaptive")
			{
			$result1=mysql_query("SELECT adaptive_test FROM special_campaign_test_criteria ");
			while($row1=mysql_fetch_array($result1))
			{
				$totaltimes1=$row1[0];
			}
			$result2=mysql_query("SELECT COUNT(id) FROM `adaptive_learning_test` WHERE student_id='$uid' AND batch_id='$batch_id' and test_type='test'");
			while($row2=mysql_fetch_array($result2))
			{
				$totaltimes=$row2[0];
			}
			if($totaltimes==$totaltimes1 || $totaltimes>$totaltimes1 )
			{
			echo "You can give only ". $totaltimes1."  test in this course.
For practicing more register for self paced/Test series/Interactive Virtual courses";
			}
			else
			{
			$totaltimes=$totaltimes+1;
			 echo "success";
			 //echo "Demo Account Test  $totaltimes/$totaltimes1. Register for unlimited ChapterWise Adaptive test Practice.";
			 }
			}
			else if($testtype=="chapter")
			{
			$result1=mysql_query("SELECT chapter_test FROM special_campaign_test_criteria ");
			while($row1=mysql_fetch_array($result1))
			{
				$totaltimes1=$row1[0];
				$result1t=mysql_query("SELECT id FROM studentwise_test_charge where test_type='chapter_test' and user_id='$uid' and batch_id='$batch_id' and test_given='0'");
				while($row1t=mysql_fetch_array($result1t))
				{
				$totaltimes1=$totaltimes1+1;
				}
			}
			
			$result2=mysql_query("SELECT COUNT(id) FROM `adaptive_learning_test` WHERE student_id='$uid' AND batch_id='$batch_id' and chapterwise_test='1' and test_id not in(select distinct test_id from studentwise_test_charge where test_type='chapter_test' and user_id='$uid' and batch_id='$batch_id' and test_id is not null )");
			while($row2=mysql_fetch_array($result2))
			{
				$totaltimes=$row2[0];
			}
			if($totaltimes==$totaltimes1 || $totaltimes>$totaltimes1)
			{
			//echo "Your account has expired.Register today for unlimited test.";
				echo "You can give only ". $totaltimes1."  test in this course.
For practicing more register for self paced/Test series/Interactive Virtual courses";
			}
			else
			{
			$totaltimes=$totaltimes+1;
			 echo "success";
			 //echo "Demo Account Test  $totaltimes/$totaltimes1. Register for unlimited ChapterWise  test Practice.";
			 }
			
			
			}
			else if($testtype=="custom")
			{
			$result1=mysql_query("SELECT custom_test FROM special_campaign_test_criteria ");
			while($row1=mysql_fetch_array($result1))
			{
				$totaltimes1=$row1[0];
			}
			$result2=mysql_query("SELECT COUNT(id) FROM `adaptive_learning_test` WHERE student_id='$uid' AND batch_id='$batch_id' and customized_test='1'");
			while($row2=mysql_fetch_array($result2))
			{
				$totaltimes=$row2[0];
			}
						if($totaltimes==$totaltimes1 || $totaltimes>$totaltimes1)
			{
			echo "You can give only ". $totaltimes1."  test in this course.
For practicing more register for self paced/Test series/Interactive Virtual courses";
			}
			else
			{
			$totaltimes=$totaltimes+1;
			 echo "success";
			 //echo "Demo Account Test  $totaltimes/$totaltimes1. Register for unlimited customized test.";
			 }
			
			
			}
			else if($testtype=="demand")
			{
			$result1=mysql_query("SELECT demand_test FROM special_campaign_test_criteria ");
				while($row1=mysql_fetch_array($result1))
				{
					$totaltimes1=$row1[0];
				}
			
			$result2=mysql_query("SELECT COUNT(id) FROM `adaptive_learning_test` WHERE student_id='$uid' AND batch_id='$batch_id' and Demand_test='1' ");
			while($row2=mysql_fetch_array($result2))
			{
				$totaltimes=$row2[0];
			}
			
			if($totaltimes==$totaltimes1 || $totaltimes>$totaltimes1)
			{
			echo "You can give only ". $totaltimes1."  test in this course.
For practicing more register for self paced/Test series/Interactive Virtual courses";
			}
			else
			{
			$totaltimes=$totaltimes+1;
			 echo "success";
			 //echo "Demo Account Test  $totaltimes/$totaltimes1. Register for unlimited demand test.";
			 }
			}
				else if($testtype=="unit")
			{
			$result1=mysql_query("SELECT unit_test FROM special_campaign_test_criteria ");
				while($row1=mysql_fetch_array($result1))
				{
					$totaltimes1=$row1[0];
				}
			
			$result2=mysql_query("SELECT COUNT(id) FROM `adaptive_learning_test` WHERE student_id='$uid' AND batch_id='$batch_id' and Unitwise_test='1' ");
			while($row2=mysql_fetch_array($result2))
			{
				$totaltimes=$row2[0];
			}
			
			if($totaltimes==$totaltimes1 || $totaltimes>$totaltimes1)
			{
			echo "You can give only ". $totaltimes1."  test in this course.
For practicing more register for self paced/Test series/Interactive Virtual courses";
			}
			else
			{
			$totaltimes=$totaltimes+1;
			 echo "success";
			 //echo "Demo Account Test  $totaltimes/$totaltimes1. Register for unlimited demand test.";
			 }
			}
			else
			{
			}
			}
			
		}
		
?>