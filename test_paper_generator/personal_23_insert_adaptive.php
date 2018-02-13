<?php

		include_once '../config.php';
	
		$end_time=$_GET['date_time2'];
		$user_id=$_GET['user_id'];
		$new_test_id=$_GET['new_test_id'];
		$p_ass_id_uq=$_GET['p_ass_id_uq'];
		
		$result_in=mysql_query("SELECT u.name,u.email,sd.edutech_student_id FROM USER u,student_Details sd WHERE u.id='$user_id' AND u.id=sd.user_id");
					
		$row_in=mysql_fetch_array($result_in);
		$name=$row_in[0];
		$email=$row_in[1];
		$edutech_id=$row_in[2];
		
		$result_per=mysql_query("SELECT s.name,ps.TotalQuestion,DATE(Start_time) FROM `personalassignment_studentwise` ps,SUBJECT s WHERE ps.test_id='$new_test_id' AND	ps.student_id='$user_id' AND ps.id='$p_ass_id_uq' AND s.id=ps.SubID");
		$row_per=mysql_fetch_array($result_per);
		$sub=$row_per[0];
		$tq=$row_per[1];
		$test_date=$row_per[2];
		
		$update_query=mysql_query("UPDATE personalassignment_studentwise SET end_time='$end_time',Test_submit='1' WHERE test_id='$new_test_id' AND Student_id = '$user_id' AND id='$p_ass_id_uq'");
		
		$i=0;
		$k=0;
		$j=0;
		
		if($update_query)
		{
			$result_out=mysql_query("SELECT Qno,Correct_ans,response,uniq_id FROM `personalassignment_response`  WHERE test_id='$new_test_id' AND user_id='$user_id' AND Assignment_id='$p_ass_id_uq'");
			
			while($row_out=mysql_fetch_array($result_out))
			{
				if($row_out[2] == 'x')
				{
					$i++;
				}
				else if($row_out[2] == $row_out[1])
				{
					$k++;
				}
				else if($row_out[2] != $row_out[1])
				{
					$j++;
				}
			}
		//for site usage reward fund
		$result_test=mysql_query("SELECT DISTINCT ta.test_date,ta.user_id,s.name,CONCAT(ta.chap_id,'',ta.description),ta.faculty_id,ta.batch_id FROM test_announce ta,que_paper q,SUBJECT s WHERE q.id=ta.que_paper_id AND q.name='$new_test_id' AND ta.user_id='$user_id' AND s.id=ta.sub_id ");
					
	$row_test=mysql_fetch_array($result_test);
	$facultyname=$row_test[4];
	$batchid=$row_test[5];
	$facultyid=0;
	$result_share=mysql_query("SELECT DISTINCT u.id FROM USER u,staff_batch b WHERE b.user_id=u.id AND u.name='$facultyname' AND b.batch_id='$batchid' ");
	while($row_share=mysql_fetch_array($result_share))
	{
	$facultyid=$row_share[0];
	}
	$faculty_id_adp=0;
	if($facultyid==0)
	{
			$result=mysql_query("SELECT DISTINCT faculty_id FROM adaptive_learning_test 
			WHERE test_id = '$new_test_id' AND student_id='$user_id'   AND test_type='adaptive_test'  ");
			while($row=mysql_fetch_array($result))
			{
			$facultyid=$row[0];
			$faculty_id_adp=$row[0];
			}
	}
	if($facultyid>0)
	{
		$result_share=mysql_query("SELECT Grey_assignment,school_id FROM `site_usage_reward` WHERE faculty_id='$facultyid'");
								while($row_share=mysql_fetch_array($result_share))
								{
									$sql_share = "insert into site_usage_reward_point(`user_id`,`point`,`reward_from`,material_id,end_user_id)values('$facultyid','$row_share[0]','greyassignment','$new_test_id','$user_id')";
							
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
									$result_share2=mysql_query("SELECT Grey_assignment,school_id FROM `site_usage_reward` WHERE faculty_id='$row_share[1]'");
									while($row_share2=mysql_fetch_array($result_share2))
									{
										$sql_share3 = "insert into site_usage_reward_point(`user_id`,`point`,`reward_from`,material_id,end_user_id)values('$row_share[1]','$row_share2[0]','greyassignment','$new_test_id','$user_id')";
								
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
			$todayis = date("l, F j, Y, g:i a") ;
			//set a title for the message
			$subject = "Grey Area Assignment Result";
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
				$mail->Subject = "Grey Area Assignment Result";
				$mail->Body = "
							Student Name : $name<br/>
							Edutech Student ID : $edutech_id<br/>
							Test ID : $new_test_id<br/>
							Test Date : $test_date<br/>
							Subject : $sub<br/>
							Correct : $k<br/>
							Incorrect : $j<br/>
							Unattempted : $i<br/>
							Total Question : $tq<br/><br/><br/>
							
							Academic Team.
						";
				$mail->Send();
				echo "true";
			}
		}
		else
		{
			
		}
		include_once '../conn_close.php';
?>