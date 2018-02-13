<?php

	include_once '../config.php';
	
	$end_time=$_GET['date_time2'];
	$user_id=$_GET['user_id'];
	$new_test_id=$_GET['new_test_id'];
	
	$update_query=mysql_query("UPDATE adaptive_learning_test SET end_time='$end_time',Test_submit='1' WHERE test_id='$new_test_id' AND student_id='$user_id'");
	
	$result_in=mysql_query("SELECT u.name,u.email,sd.edutech_student_id FROM USER u,student_Details sd WHERE u.id='$user_id' AND u.id=sd.user_id");
					
	$row_in=mysql_fetch_array($result_in);
	$name=$row_in[0];
	$email=$row_in[1];
	$edutech_id=$row_in[2];
	
	$result_test=mysql_query("SELECT DISTINCT ta.test_date,ta.user_id,s.name,CONCAT(ta.chap_id,'',ta.description) FROM test_announce ta,que_paper q,SUBJECT s WHERE q.id=ta.que_paper_id AND q.name='$new_test_id' AND ta.user_id='$user_id' AND s.id=ta.sub_id ");
					
	$row_test=mysql_fetch_array($result_test);
	$test_Date=$row_test[0];
	$uid=$row_test[1];
	$subject1=$row_test[2];
	
	$chapter=$row_test[3];
	if($subject1 == 'All')
	{
		$subject1='Mock';
	}
	
	if($update_query)
	{
		$result_out=mysql_query("SELECT Qno,correct_ans,response,Uniq_id FROM `adaptive_test_response`  
									WHERE test_id='$new_test_id' AND student_id='$user_id'");
									
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
		$todayis = date("l, F j, Y, g:i a") ;
			//set a title for the message
			$subject =  "Result of test dated " .$test_Date;
			$body = "<b>Report from coreacademics</b> <br><br>";
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
			$mail->From = "eduserver.results@gmail.com"; //do NOT fake header.
			$mail->FromName = "eduserver.results@gmail.com";

			$mail->AddAddress("eduserver.results@gmail.com"); // Email on which you want to send mail

			$mail->IsHTML(true);

			$mail->Subject  ="Result of test dated " .$test_Date;

			$mail->Body = $body;

			if(!$mail->Send())
			{
				$error="Please try again";
			}
			else
			{
				$mail->AddCC($email);
				$mail->Subject =  "Result of test dated " .$test_Date;;
				$mail->Body = "
							Student Name : $name<br/>
							Student ID : $edutech_id<br/>
							Test ID : $new_test_id<br/>
							Test Date : $test_Date<br/>
							Subject : $subject1<br/>
							Chapter : $chapter<br/>
							Correct : $k<br/>
							Incorrect : $j<br/>
							Unattempted : $i<br/>
							<br/><br/>
							Regards<br/>
							Academic Team.
						";
				$mail->Send();
				echo 'true';
			}
	}
	else
	{
		echo "Failed";
	}
	
	include_once '../conn_close.php';
	
?>