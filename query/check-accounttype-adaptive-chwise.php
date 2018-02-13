<?php
		include '../config.php';
		$course_id=$_GET['course_id'];
		$uid=$_GET['uid'];
		$batch_id=$_GET['batch_id'];
		$testtype=$_GET['testtype'];
			$chap_id=$_GET['chap_id'];
		
		$acttype="";
		$result_u=mysql_query("SELECT id FROM `student_registered_course` WHERE user_id='$uid' AND course_id='$course_id' ");
	$rwc=mysql_num_rows($result_u);
	if($rwc==0)
	{
	$acttype="Basic";
	$factasstudent=0;
$result_st=mysql_query("SELECT faculty_as_student FROM `user` WHERE id='$uid'  ");
			while($row_st=mysql_fetch_array($result_st))
			{
			$factasstudent=$row_st[0];
			}
			if($factasstudent=="1")
			{
			$acttype="premium";
			}
	}
	else
	{
	$acttype="premium";
	}
			if($acttype=="basic" || $acttype=="Basic")
			{
				
				$totaltimes=0;
				$totaltimes1=0;
				
						$result1=mysql_query("SELECT Chapter_test FROM student_demologin_criteria ");
						while($row1=mysql_fetch_array($result1))
						{
							$totaltimes1=$row1[0];
							$result1t=mysql_query("SELECT id FROM studentwise_test_charge where test_type='chapter_test' and user_id='$uid' and batch_id='$batch_id' and test_given='0'");
				while($row1t=mysql_fetch_array($result1t))
				{
				$totaltimes1=$totaltimes1+1;
				}
						}
					//$result2=mysql_query("SELECT COUNT(id) FROM `adaptive_learning_test` WHERE student_id='$uid' AND batch_id='$batch_id' and chapterwise_test='1' ");
					$result2=mysql_query("SELECT COUNT(id) FROM `adaptive_learning_test` WHERE student_id='$uid' AND batch_id='$batch_id' and chapterwise_test='1' and test_id not in(select distinct test_id from studentwise_test_charge where test_type='chapter_test' and user_id='$uid' and batch_id='$batch_id' and test_id is not null )");
					while($row2=mysql_fetch_array($result2))
					{
						$totaltimes=$row2[0];
					}
					$totaltimes_final=$totaltimes1-$totaltimes;
					if($totaltimes_final<0)
					{
					$totaltimes_final=0;
					}
					if($totaltimes_final==0)
					{
					echo "You can do chapter test $totaltimes_final times more in basic account.Upgrade yourself to premium account to get unlimited access";
					}
					else
					{
					echo "success";
					}
					
					
			}
			else
			{
			echo "success";
			}
			
		
		
?>