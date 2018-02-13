<?php
		include '../config.php';
		$course_id=$_GET['course_id'];
		$uid=$_GET['uid'];
		$batch_id=$_GET['batch_id'];
		$searchid=$_GET['searchid'];
		
		
			//echo "in if";
				$totaltimes_web=0;
				$totaltimes1_web=0;
				$totaltimes_video=0;
				$totaltimes1_video=0;
				$totaltimes_img=0;
				$totaltimes1_img=0;
				
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
					if($searchid=="web")
					{
						if($totaltimes_web<$totaltimes1_web)
						{
						$total_remain=$totaltimes1_web-$totaltimes_web;
							$totaltimes_web=$totaltimes_web+1;
							$result3=mysql_query("SELECT view_times_web FROM `webresource_times_basic_account` WHERE user_id='$uid' AND batch_id='$batch_id' and course_id='$course_id'");
							$rw3 = mysql_num_rows($result3);
							$SQL_sq="";
							if($rw3==0)
							{
							$SQL_sq = "INSERT INTO webresource_times_basic_account (`user_id`,`course_id`,`batch_id`,`view_times_web`) VALUES ('$uid','$course_id','$batch_id','$totaltimes_web')";
							}
							else
							{
							$SQL_sq = "UPDATE webresource_times_basic_account SET view_times_web='$totaltimes_web' WHERE user_id='$uid' AND batch_id='$batch_id' and course_id='$course_id'";
							}
							$resul_sq = mysql_query($SQL_sq);
							if($result_sq)
							{
							}
							else
							{
							
							}
							
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
							$msg="you cannot access this feature any more.Upgrade to premium account to get unlimted access";
							echo $msg;
						}
					
					}
					else if($searchid=="video")
					{
												if($totaltimes_video<$totaltimes1_video)
						{
						$total_remain=$totaltimes1_video-$totaltimes_video;
							$totaltimes_video=$totaltimes_video+1;
							$result3=mysql_query("SELECT view_times_video FROM `webresource_times_basic_account` WHERE user_id='$uid' AND batch_id='$batch_id' and course_id='$course_id'");
							$rw3 = mysql_num_rows($result3);
							$SQL_sq="";
							if($rw3==0)
							{
							$SQL_sq = "INSERT INTO webresource_times_basic_account (`user_id`,`course_id`,`batch_id`,`view_times_video`) VALUES ('$uid','$course_id','$batch_id','$totaltimes__video')";
							}
							else
							{
							$SQL_sq = "UPDATE webresource_times_basic_account SET view_times_video='$totaltimes_video' WHERE user_id='$uid' AND batch_id='$batch_id' and course_id='$course_id'";
							}
							$resul_sq = mysql_query($SQL_sq);
							if($result_sq)
							{
							}
							else
							{
							
							}
							
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
							$msg="you cannot access this feature any more.Upgrade to premium account to get unlimted access";
							echo $msg;
						}
					}
					else if($searchid=="img")
					{
												if($totaltimes_img<$totaltimes1_img)
						{
						$total_remain=$totaltimes1_img-$totaltimes_img;
							$totaltimes_img=$totaltimes_img+1;
							$result3=mysql_query("SELECT view_times_image FROM `webresource_times_basic_account` WHERE user_id='$uid' AND batch_id='$batch_id' and course_id='$course_id'");
							$rw3 = mysql_num_rows($result3);
							$SQL_sq="";
							if($rw3==0)
							{
							$SQL_sq = "INSERT INTO webresource_times_basic_account (`user_id`,`course_id`,`batch_id`,`view_times_image`) VALUES ('$uid','$course_id','$batch_id','$totaltimes_img')";
							}
							else
							{
							$SQL_sq = "UPDATE webresource_times_basic_account SET view_times_image='$totaltimes_img' WHERE user_id='$uid' AND batch_id='$batch_id' and course_id='$course_id'";
							}
							$resul_sq = mysql_query($SQL_sq);
							if($result_sq)
							{
							}
							else
							{
							
							}
							
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
							$msg="you cannot access this feature any more.Upgrade to premium account to get unlimted access";
							echo $msg;
						}
					}
					else
					{
					}
					
				
						
					
					
			
			
		
		
?>