<?php

		include_once '../config.php';
	
		$end_time=$_GET['date_time2'];
		$uid=$_GET['uid'];
		$new_test_id=$_GET['new_test_id'];
	
		$sb_get="";
		$test_get="";
	
		$result=mysql_query("SELECT DISTINCT alt.test_id,DATE_FORMAT(DATE(alt.start_time),'%d-%m-%Y'),TIMEDIFF(alt.end_time,alt.start_time),
		c.name,c.ch_no,s.name,DATE_FORMAT(alt.start_time,'%d-%m-%Y %H:%i:%s') FROM adaptive_learning_test alt,adaptive_test_response atr,chapter c,SUBJECT s
		WHERE alt.test_id = '$new_test_id' AND alt.student_id='$uid' AND alt.test_id=atr.test_id AND alt.chapter_id=c.id AND alt.test_type IN('test','practise')  AND s.id=alt.subject ORDER BY alt.test_id DESC");
		
		$rw = mysql_num_rows($result);
		
		$unattempt=0;
		$correct=0;
		$incorrect=0;
		$total_score=0;
		$obt_score=0;
		$diff_per=0;
		$stu_per=0;
		$i=0;
		$j=1;
		while($row=mysql_fetch_array($result))
		{
			$sb_get=$row[5];
			$test_get=$row[6];
			
			$unattempt=0;
			$correct=0;
			$incorrect=0;
			
			$result1=mysql_query("SELECT DISTINCT COUNT(Qno) FROM adaptive_test_response WHERE test_id='$row[0]' AND student_id='$uid'");
			$row1=mysql_fetch_array($result1);
			$total=$row1[0];
			
			$result2=mysql_query("SELECT atr.response,atr.correct_ans,ur.per, ROUND(ur.per,0) FROM adaptive_test_response atr,`uniqidwise_diff_per` ur WHERE atr.test_id='$row[0]' AND atr.student_id='$uid' AND ur.uniqid=atr.uniq_id");
			while($row2=mysql_fetch_array($result2))
			{
				$res=$row2[0];
				$corr_ans=$row2[1];
				$diff_per=$row2[3];
				$total_score=$total_score+($diff_per/10);
				if($res == $corr_ans)
				{
					$correct=$correct+1;
						$obt_score=$obt_score+($diff_per/10);
				}
				else if($res != $corr_ans)
				{
					if($res == 'x' || $res == "")
					{
						$unattempt=$unattempt+1;
					}
					else
					{
						$incorrect=$incorrect+1;
					}
				}
			}
			//for insert
			$stu_per=($obt_score/$total_score)*100;
			$stu_per=round($stu_per, 2);  
			$insert_test=mysql_query("INSERT INTO adaptive_performance_score(`test_id`,`user_id`,`total_score`,`obtain_score`,`per`,`test_date`)VALUES('$new_test_id','$uid','$total_score','$obt_score','$stu_per','$row[1]')");
	
			if($insert_test)
			{
			//echo "Successfully Insertted35";
			}
			else
			{
			//echo "Failed";
			}
			//end insert
		}
		$update_query=mysql_query("UPDATE adaptive_learning_test SET end_time='$end_time',Test_submit='1',correct_total_qus='$correct',incorrect_total_qus='$incorrect',Unattempt_total_qus='$unattempt' WHERE test_id='$new_test_id' AND student_id='$uid'");
		
		$result_in=mysql_query("SELECT u.name,u.email,sd.edutech_student_id FROM USER u,student_Details sd WHERE u.id='$uid' AND u.id=sd.user_id");
					
		$row_in=mysql_fetch_array($result_in);
		$name=$row_in[0];
		$email=$row_in[1];
		$edutech_id=$row_in[2];
		
		if($update_query)
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
				$mail->Subject = "Globaleduserver Adaptive test Result";
				$mail->Body = "
							Student Name : $name<br/>
							Student ID : $edutech_id<br/>
							Test ID : $new_test_id<br/>
							Subject : $sb_get<br/>
							Test Date : $test_get<br/>
							Correct : $correct<br/>
							Incorrect : $incorrect<br/>
							Unattempted : $unattempt<br/>
							
							<br/><br/>
							Regards
							Globaleduserver Team.
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