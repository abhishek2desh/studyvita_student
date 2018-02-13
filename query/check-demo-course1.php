<?php
		include '../config.php';
		$course_id=$_GET['course_id'];
		$uid=$_GET['uid'];
		$course_name=$_GET['course_name']='';
		$acttype="";
		$result=mysql_query("SELECT id,total_times FROM `student_demo_course` WHERE user_id='$uid' AND course_id='$course_id' and course_id not in(select distinct course_id from student_registered_course where user_id='$uid') ");
		$rw = mysql_num_rows($result);
		if($rw==0)
		{
		
		
		 //for checking account type
		 $result_u=mysql_query("SELECT `account_type` FROM USER WHERE id='$uid' ");
			while($rowu=mysql_fetch_array($result_u))
			{
				$acttype=$rowu[0];
			}
			if($acttype=="basic" || $acttype=="Basic")
			{
			$totaltimes=0;
			$totaltimes1=0;
			$result=mysql_query("SELECT login_times FROM `student_registered_course` WHERE user_id='$uid' AND course_id='$course_id' ");
			while($row=mysql_fetch_array($result))
			{
			$totaltimes=$row[1];
			}
			$result1=mysql_query("SELECT course_times FROM `student_demologin_criteria` ");
				while($row1=mysql_fetch_array($result1))
			{
				$totaltimes1=$row1[0];
			}
			$total_time=0;
				$total_time=$totaltimes+1;
				$tt=$totaltimes1-$total_time;
				//$msg="Welcome to  $course_name demo. Register to get unlimited access. You can view these course $tt times more";
					if($tt<0)
					{
						$msg="Currently you are using the basic version with all features but with limited access to resources.For unlimited access to resources upgrade to premium";
				
					echo $msg;
					}
					else
					{
					 echo "success1";
					}
			
			}
			else
			{
			 echo "success";
			}
		 //end checking acoounttype
		}
		else
		{
		$totaltimes=0;
			$totaltimes1=0;
			while($row=mysql_fetch_array($result))
			{
			$totaltimes=$row[1];
			}
			$result1=mysql_query("SELECT course_times FROM `student_demologin_criteria` ");
				while($row1=mysql_fetch_array($result1))
			{
				$totaltimes1=$row1[0];
			}
			//$total_time=0;
				$total_time=$totaltimes+1;
				/*$msg="Welcome to  $course_name demo. You can view this course for $totaltimes1 times. 
					View Times-$total_time/$totaltimes1";*/
					$tt=$totaltimes1-$total_time;
					if($tt<0)
					{
						
						$msg="You can't view these course.Register to get unlimited access";
				
					echo $msg;
					}
					else
					{
					 echo "success";
					}
					
					//$msg="Currently you are using the basic version with all features but with limited access to resources.For unlimited access to resources upgrade to premium<br/> Upgrade Now".
			
		}
?>