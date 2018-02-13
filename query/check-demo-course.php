<?php
		include '../config.php';
		$course_id=$_GET['course_id'];
		$uid=$_GET['uid'];
		$course_name=$_GET['course_name'];
		$acttype="";
		$result=mysql_query("SELECT id,total_times FROM `student_demo_course` WHERE user_id='$uid' AND course_id='$course_id' and course_id not in(select distinct course_id from student_registered_course where user_id='$uid') ");
	
		$rw = mysql_num_rows($result);
		if($rw==0)
		{
		
		//echo "in if";
		 //for checking account type
		 $result_u=mysql_query("SELECT id FROM `student_registered_course` WHERE user_id='$uid' AND course_id='$course_id' ");
	$rwc=mysql_num_rows($result_u);
	if($rwc==0)
	{
	$acttype="Basic";
	}
	else
	{
	$acttype="premium";
	}
		 
			if($acttype=="basic" || $acttype=="Basic")
			{
			//echo "in if";
			$totaltimes=0;
			$totaltimes1=0;
			$ttf="";
			$result5=mysql_query("SELECT login_times FROM `student_registered_course` WHERE user_id='$uid' AND course_id='$course_id' ");
			while($row5=mysql_fetch_array($result5))
			{
			$totaltimes=$row5[0];
			}
			//echo "tottime".$totaltimes;
			$result1=mysql_query("SELECT course_times FROM `student_demologin_criteria` ");
				while($row1=mysql_fetch_array($result1))
			{
				$totaltimes1=$row1[0];
			}
			//echo "tottime1".$totaltimes1;
			if($totaltimes==$totaltimes1)
			{
			$ttf=0;
			}
			else if($totaltimes>$totaltimes1)
			{
			$ttf=0;
			}
			else
			{
			$ttf="";
			}
			$total_time=0;
				$total_time=$totaltimes+1;
				$tt=$totaltimes1-$total_time;
			
				$msg="Currently you are using the basic version with all features but with limited access to resources.For unlimited access to resources upgrade to premium account.<br/> Upgrade Now|".$ttf."|b";
			echo $msg;
						$SQL_sq = "UPDATE student_registered_course SET login_times='$total_time' WHERE user_id='$uid' AND course_id='$course_id' ";
						//echo $SQL_sq;
				$result_sq = mysql_query($SQL_sq);
				if ($result_sq)
				{
				}
				else
				{
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
		//echo "in else";
		$totaltimes=0;
			$totaltimes1=0;
			$ttf="";
			while($row=mysql_fetch_array($result))
			{
			$totaltimes=$row[1];
			}
			$result1=mysql_query("SELECT course_times FROM `student_demologin_criteria` ");
				while($row1=mysql_fetch_array($result1))
			{
				$totaltimes1=$row1[0];
			}
			if($totaltimes==$totaltimes1)
			{
			$ttf=0;
			}
			else if($totaltimes>$totaltimes1)
			{
			$ttf=0;
			}
			else
			{
			$ttf="";
			}
			$total_time=0;
				$total_time=$totaltimes+1;
				/*$msg="Welcome to  $course_name demo. You can view this course for $totaltimes1 times. 
					View Times-$total_time/$totaltimes1";*/
					$tt=$totaltimes1-$total_time;
					
					$msg="Welcome to  $course_name demo. Register to get unlimited access. You can view these course $tt times more|".$ttf."|d";
					//$msg="Currently you are using the basic version with all features but with limited access to resources.For unlimited access to resources upgrade to premium<br/> Upgrade Now".
			echo $msg;
			//echo "View-$total_time/$totaltimes1";
			$SQL_sq = "UPDATE student_demo_course SET total_times='$total_time' WHERE user_id='$uid' AND course_id='$course_id' ";
				$result_sq = mysql_query($SQL_sq);
				if ($result_sq)
				{
				}
				else
				{
				}
		}
?>