<?php
		include '../config.php';
		$course_id=$_GET['course_id'];
		$uid=$_GET['uid'];
		$batch_id=$_GET['batch_id'];
		
		
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
			//echo "in if";
				$totaltimes_web=0;
				$totaltimes1_web=0;
				$totaltimes_video=0;
				$totaltimes1_video=0;
				$totaltimes_img=0;
				$totaltimes1_img=0;
				$ttf="";
						$result1=mysql_query("SELECT webresource_search_web,webresource_search_video,webresource_search_image FROM student_demologin_criteria ");
						while($row1=mysql_fetch_array($result1))
						{
							$totaltimes1_web=$row1[0];
							$totaltimes1_video=$row1[1];
							$totaltimes1_img=$row1[2];
						}
					//echo 	"tot".$totaltimes1;
				$result2=mysql_query("SELECT `view_times_web`,`view_times_video`,`view_times_image` FROM `webresource_times_basic_account` WHERE user_id='$uid' AND batch_id='$batch_id' and course_id='$course_id'  ");
					while($row2=mysql_fetch_array($result2))
					{
						$totaltimes_web=$row2[0];
							$totaltimes_video=$row2[1];
							$totaltimes_img=$row2[2];
					}
					//echo 	"tot2".$totaltimes;
					if($totaltimes_web==$totaltimes1_web && $totaltimes_video==$totaltimes1_video && $totaltimes_img==$totaltimes1_img)
					{
					
					$msg="Currently you are using the basic version with all features but with limited access to resources.For unlimited access to resources upgrade to premium.";
						echo $msg;
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