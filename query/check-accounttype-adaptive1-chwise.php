<?php
		include '../config.php';
		$course_id=$_GET['course_id'];
		$uid=$_GET['uid'];
		$batch_id=$_GET['batch_id'];
		$acttype="";
		$testtype=$_GET['testtype'];
		$chap_id=$_GET['chap_id'];
		//cp_value12
		
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
					if($totaltimes_final==0 || $totaltimes_final<0)
					{
						echo "You can't do Chapter Test more in basic account.Upgrade yourself to premium account to get unlimited access";
					}
					else
					{
					//for checking chaterwise totaltest
					$totaltimes_ch=0;
				$totaltimes1_ch=0;
				//$result3=mysql_query("SELECT Chapter_test FROM student_demologin_criteria ");
					$result3=mysql_query("SELECT Chapter_test_times FROM student_demologin_criteria ");
						while($row3=mysql_fetch_array($result3))
						{
							$totaltimes1_ch=$row3[0];
							$result1t=mysql_query("SELECT id FROM studentwise_test_charge where test_type='chapter_test' and user_id='$uid' and batch_id='$batch_id' and test_given='0'");
				while($row1t=mysql_fetch_array($result1t))
				{
				$totaltimes1=$totaltimes1+1;
				}
						}
						$result4=mysql_query("SELECT COUNT(id) FROM `adaptive_learning_test` WHERE student_id='$uid' AND batch_id='$batch_id' and chapterwise_test='1' and chapter_id='$chap_id' and test_id not in(select distinct test_id from studentwise_test_charge where test_type='chapter_test' and user_id='$uid' and batch_id='$batch_id' and test_id is not null ) ");
//$result2=mysql_query("SELECT COUNT(id) FROM `adaptive_learning_test` WHERE student_id='$uid' AND batch_id='$batch_id' and chapterwise_test='1' and test_id not in(select distinct test_id from studentwise_test_charge where test_type='chapter_test' and user_id='$uid' and batch_id='$batch_id' and test_id is not null )");
					while($row4=mysql_fetch_array($result4))
					{
						$totaltimes_ch=$row4[0];
					}
						$totaltimes_final_ch=$totaltimes1_ch-$totaltimes_ch;
						
					//end checking chaterwise totaltest
					if($totaltimes_final_ch==0 || $totaltimes_final_ch<0)
					{
						echo "You can't do Chapter Test more in this chapter.Please choose another chapter.";
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