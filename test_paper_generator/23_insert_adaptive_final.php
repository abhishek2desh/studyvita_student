<?php

		include_once '../config.php';
	
		$end_time=$_GET['date_time2'];
		$uid=$_GET['uid'];
		$course_id=$_GET['course_id'];
		$new_test_id=$_GET['test_id'];
	$facultyid=0;
		$sb_get="";
		$test_get="";
		
		$update_query_res=mysql_query("UPDATE adaptive_test_response SET response='x' WHERE response = 'R' AND test_id='$new_test_id' AND student_id='$uid'");
		
		if($update_query_res)
		{
			//echo "UPDATE adaptive_test_response SET response='x' WHERE response = 'R' AND test_id='$new_test_id' AND student_id='$uid'";
			$result=mysql_query("SELECT DISTINCT alt.test_id,DATE_FORMAT(DATE(alt.start_time),'%d-%m-%Y'),TIMEDIFF(alt.end_time,alt.start_time),c.name,c.ch_no,s.name,DATE_FORMAT(alt.start_time,'%d-%m-%Y %H:%i:%s'),alt.faculty_id FROM adaptive_learning_test alt,adaptive_test_response atr,chapter c,SUBJECT s	WHERE alt.test_id = '$new_test_id' AND alt.student_id='$uid' AND alt.test_id=atr.test_id AND alt.chapter_id=c.id   AND s.id=alt.subject ORDER BY alt.test_id DESC");
			
			$rw = mysql_num_rows($result);
			
			$unattempt=0;
			$correct=0;
			$incorrect=0;
			$i=0;
			$j=1;
			while($row=mysql_fetch_array($result))
			{
				$sb_get=$row[5];
				$test_get=$row[6];
				$facultyid=$row[7];
				$unattempt=0;
				$correct=0;
				$incorrect=0;
				
				$result1=mysql_query("SELECT DISTINCT COUNT(Qno) FROM adaptive_test_response WHERE test_id='$row[0]' AND student_id='$uid'");
				$row1=mysql_fetch_array($result1);
				$total=$row1[0];
				
				$result2=mysql_query("SELECT response,correct_ans FROM adaptive_test_response WHERE test_id='$row[0]' AND student_id='$uid'");
				while($row2=mysql_fetch_array($result2))
				{
					$res=$row2[0];
					$corr_ans=$row2[1];
					if($res == $corr_ans)
					{
						$correct=$correct+1;
					}
					else if($res != $corr_ans)
					{
						if($res == 'x')
						{
							$unattempt=$unattempt+1;
						}
						else
						{
							$incorrect=$incorrect+1;
						}
					}
				}
			}
			$update_query=mysql_query("UPDATE adaptive_learning_test SET end_time='$end_time',Test_submit='1',correct_total_qus='$correct',incorrect_total_qus='$incorrect',Unattempt_total_qus='$unattempt' WHERE test_id='$new_test_id' AND student_id='$uid'");
			//for insert in carnival
				$resultf=mysql_query("SELECT iscarnival FROM user where id='$uid'");
				while($rowf= mysql_fetch_array($resultf))
				{
					if($rowf[0]=="1")
					{
							$participationid=0;
							$resultf1=mysql_query("SELECT `participationid` FROM `participation` WHERE `userid`='$uid' AND `courseid`='$course_id'");
							while($rowf1= mysql_fetch_array($resultf1))
							{
							$participationid=$rowf1[0];
							}
							if($participationid>0)
							{
							//
							$sql_carnival = "insert into submission(`participationid`,`userid`,status,submissiontype,isdeleted) values('$participationid','$uid','submiited','4','0')";
							$result_carnival = mysql_query($sql_carnival);
							if ($result_carnival)
							{
							}
							else
							{
							}
							//
							}
					}
				}
			//end insert in carnival
			//for site usage reward fund
					if($facultyid>0)
					{					
								$result_share=mysql_query("SELECT adaptive_test,school_id FROM `site_usage_reward` WHERE faculty_id='$facultyid'");
								while($row_share=mysql_fetch_array($result_share))
								{
									$sql_share = "insert into site_usage_reward_point(`user_id`,`point`,`reward_from`,material_id,end_user_id)values('$facultyid','$row_share[0]','adaptivetest','$new_test_id','$uid')";
							
									$result_share1 = mysql_query($sql_share);
									if($result_share1)
									{
									}
									else
									{
									//echo "failed";
									}
									//for institute
									if($facultyid==$row_share[1])
									{
									}
									else
									{
									$result_share2=mysql_query("SELECT adaptive_test,school_id FROM `site_usage_reward` WHERE faculty_id='$row_share[1]'");
									while($row_share2=mysql_fetch_array($result_share2))
									{
										$sql_share3 = "insert into site_usage_reward_point(`user_id`,`point`,`reward_from`,material_id,end_user_id)values('$row_share[1]','$row_share2[0]','adaptivetest','$new_test_id','$uid')";
								
										$result_share3 = mysql_query($sql_share3);
										if($result_share3)
										{
										}
										else
										{
										//echo "failed";
										}
									}
									}
									//end institute
								}
					}
			//end site usage reward fund
			$result_in=mysql_query("SELECT u.name,u.email,sd.edutech_student_id FROM USER u,student_Details sd WHERE u.id='$uid' AND u.id=sd.user_id");
						
			$row_in=mysql_fetch_array($result_in);
			$name=$row_in[0];
			$email=$row_in[1];
			$edutech_id=$row_in[2];
			
			if($update_query)
			{
			//echo "true";
				/*if($email=="")
				{
				echo "true";
				}
				else
				{
				$todayis = date("l, F j, Y, g:i a") ;
				//set a title for the message
				$subject = "Globaleduserver Adaptive test result";
				$body = "<b>Report from eduserver</b> <br><br>";
				$headers = 'From: '.$email.'' . "\r\n" .
					'Reply-To: '.$email.'' . "\r\n" .
					'Content-type: text/html; charset=utf-8' . "\r\n" .
					'X-Mailer: PHP/' . phpversion();
				
				include("../class.phpmailer.php");
				$mail = new PHPMailer();
				$mail->IsSMTP(); // set mailer to use SMTP
				$mail->Host = "smtp.gmail.com"; // specify main and backup server
				$mail->SMTPAuth = true; // turn on SMTP authentication
				$mail->SMTPSecure  = "tls"; // turn on SMTP authentication
				$mail->Port   = 587; // turn on SMTP authentication
				$mail->From = "result.noreply@gmail.com"; //do NOT fake header.
				$mail->FromName = "result.noreply@gmail.com";

				$mail->AddAddress("result.noreply@gmail.com"); // Email on which you want to send mail

				$mail->IsHTML(true);

				$mail->Subject = "Result detail";

				$mail->Body = $body;

				if(!$mail->Send())
				{
					//echo $mail->ErrorInfo;
					$error="Please try again";
				}
				else
				{
					$mail->AddCC($email);
					$mail->Subject = "Test Result";
					$mail->Body = "
								Student Name : $name<br/>
								Student ID : $edutech_id<br/>
								Test ID : $new_test_id<br/>
								Subject : $sb_get<br/>
								Test Date : $test_get<br/>
								Correct : $correct<br/>
								Incorrect : $incorrect<br/>
								Unattempted : $unattempt<br/>
								
								Diagnostic report can  be viewed by clicking on View Report. (from  View Result or result menu)<br/><br/>
Go through the diagnostic test report thoroughly, to know the concepts that you need to improve. You can also make use of Grey Area Support System and personalized assignments in Retest menu to make sure that your grey areas are cleared.

							<br/><br/>
							Regards<br/>
							Academic Team.
							";
					$mail->Send();
					echo "true";
				}
				}*/
				echo "true";
			}
			else
			{
				
			}
		}
		else
		{
			echo "failed";
		}
		include_once '../conn_close.php';
?>