<?php
		include '../config.php';
		$course_id=$_GET['course_id'];
		$uid=$_GET['uid'];
		$batch_id=$_GET['batch_id'];
		$acttype="";
		$testtype=$_GET['testtype'];
		
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
				$result1=mysql_query("SELECT adaptivetest FROM student_demo_criteria ");
				while($row1=mysql_fetch_array($result1))
				{
					$totaltimes1=$row1[0];
				}
				if($testtype=="adaptive")
				{
					$result1=mysql_query("SELECT Adaptive_test FROM student_demologin_criteria ");
				while($row1=mysql_fetch_array($result1))
				{
					$totaltimes1=$row1[0];
				}
					$result2=mysql_query("SELECT COUNT(id) FROM `adaptive_learning_test` WHERE student_id='$uid' AND batch_id='$batch_id' and test_type='test' ");
					while($row2=mysql_fetch_array($result2))
					{
						$totaltimes=$row2[0];
					}
					$totaltimes_final=$totaltimes1-$totaltimes;
					if($totaltimes_final==0 || $totaltimes_final<0)
					{
						echo "You can't do Adaptive learning more in basic account.Upgrade yourself to premium account to get unlimited access";
					}
					else
					{
					echo "success";
					}
				}
				elseif($testtype=="assignment")
				{
					$result1=mysql_query("SELECT Grey_area_assignment FROM student_demologin_criteria ");
						while($row1=mysql_fetch_array($result1))
						{
							$totaltimes1=$row1[0];
						}
					$result2=mysql_query("SELECT COUNT(DISTINCT `Assignment_id`) FROM `personalassignment_response` WHERE user_id='$uid'");
					while($row2=mysql_fetch_array($result2))
					{
						$totaltimes=$row2[0];
					}
					$totaltimes_final=$totaltimes1-$totaltimes;
					if($totaltimes_final<0)
					{
					$totaltimes_final=0;
					}
					if($totaltimes_final==0 || $totaltimes_final<0)
					{
						echo "You can't do Grey area assignment  more in basic account.Upgrade yourself to premium account to get unlimited access";
					}
					else
					{
					echo "success";
					}
				}
				elseif($testtype=="chapter")
				{
					
					$result2=mysql_query("SELECT COUNT(id) FROM `adaptive_learning_test` WHERE student_id='$uid' AND batch_id='$batch_id' and test_type='test' ");
					while($row2=mysql_fetch_array($result2))
					{
						$totaltimes=$row2[0];
					}
					$totaltimes_final=$totaltimes1-$totaltimes;
					if($totaltimes_final==0 || $totaltimes_final<0)
					{
						echo "You can't do Chapter Test more in basic account.Upgrade yourself to premium account to get unlimited access";
					}
					else
					{
					echo "success";
					}
				}
				elseif($testtype=="custom")
				{
				$result1=mysql_query("SELECT custom_test FROM student_demologin_criteria ");
				while($row1=mysql_fetch_array($result1))
				{
					$totaltimes1=$row1[0];
				}
				
					
					$result2=mysql_query("SELECT COUNT(id) FROM `adaptive_learning_test` WHERE student_id='$uid' AND batch_id='$batch_id' and customized_test='1' ");
					while($row2=mysql_fetch_array($result2))
					{
						$totaltimes=$row2[0];
					}
					$totaltimes_final=$totaltimes1-$totaltimes;
					if($totaltimes_final==0 || $totaltimes_final<0)
					{
						echo "You can't do customized Test more in basic account.Upgrade yourself to premium account to get unlimited access";
					}
					else
					{
					echo "success";
					}
				}
				elseif($testtype=="demand")
				{
				$result1=mysql_query("SELECT Demand_test FROM student_demologin_criteria ");
				while($row1=mysql_fetch_array($result1))
				{
					$totaltimes1=$row1[0];
				}
					$result2=mysql_query("SELECT COUNT(id) FROM `adaptive_learning_test` WHERE student_id='$uid' AND batch_id='$batch_id' and Demand_test='1' ");
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
				echo "You can do Requested test $totaltimes_final times more in basic account.Upgrade  to premium account to get unlimited access";
					}
					else
					{
						echo "success";
					}
					
				}
			}
			else
			{
			echo "success";
			}
			
		
		
?>