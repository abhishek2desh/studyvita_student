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
				$totaltimes=0;
				$totaltimes1=0;
				$ttf="";
						$result1=mysql_query("SELECT video_view_times FROM student_demologin_criteria ");
						while($row1=mysql_fetch_array($result1))
						{
							$totaltimes1=$row1[0];
						}
					//echo 	"tot".$totaltimes1;
				$result2=mysql_query("SELECT view_times FROM `videotimes_basic_account` WHERE user_id='$uid' AND batch_id='$batch_id' and course_id='$course_id'  ");
					while($row2=mysql_fetch_array($result2))
					{
						$totaltimes=$row2[0];
					}
					//echo 	"tot2".$totaltimes;
					if($totaltimes<$totaltimes1)
					{
					//echo "in if";
						$ttf=0;
						$total_remain=$totaltimes1-$totaltimes;
						$totaltimes=$totaltimes+1;
						$result3=mysql_query("SELECT view_times FROM `videotimes_basic_account` WHERE user_id='$uid' AND batch_id='$batch_id' and course_id='$course_id'");
						$rw3 = mysql_num_rows($result3);
						$SQL_sq="";
						if($rw3==0)
						{
						$SQL_sq = "INSERT INTO videotimes_basic_account (`user_id`,`course_id`,`batch_id`,`view_times`) VALUES ('$uid','$course_id','$batch_id','$totaltimes')";
						}
						else
						{
						$SQL_sq = "UPDATE videotimes_basic_account SET view_times='$totaltimes' WHERE user_id='$uid' AND batch_id='$batch_id' and course_id='$course_id'";
						}
						$resul_sq = mysql_query($SQL_sq);
						if($result_sq)
						{
						}
						else
						{
						//echo "failed";
						}
						//echo "success";
						if($total_remain<4)
							{
							$total_remain=$total_remain-1;
							echo "success|".$total_remain;
							}
							else
							{
							echo "success|";
							}
							
					}
					
					else
					{
					echo "success|0";
					/*$ttv=$totaltimes1-$totaltimes;
					if($ttv<=0)
					{
					$ttf="";
					$msg="Currently you are using the basic version with all features but with limited access to resources.For unlimited access to resources upgrade to premium.<br/> Upgrade Now|".$ttf;
				echo $msg;
					}
					else
					{
						echo "success";
					}*/
					
					}
					
						
						//echo $SQL_sq ;
						
					
					
			}
			else
			{
			echo "success";
			}
			
		
		
?>