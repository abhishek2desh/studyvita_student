<?php

	include_once '../config.php';
	
	$tname=$_GET['tname'];
	$uid=$_GET['uid'];
	$email_id=$_GET['temail'];
	$stuname=$_GET['stuname'];
	$body="Hi Sir/ Madam<br/><br/>
Today I came across a website that is offering so many unique features like Adaptive Learning, Diagnostic Reports, and even Grey Area Support System. In that there is an option for clearing my doubts online through virtual classes with teachers at a suitable time by paying a fees. There are so many teachers available, but you are my favorite teacher. I would prefer to study from you rather than any one else. It will save me a lot of time in travelling. Please logon to www.coreacademics.in and register yourself as a faculty so that your expertise in the subject will be available to students across the globe.
<br/>Your's obedient student.<br/>
$stuname";
$subject = "Username and password";
$headers = 'From: '.$email_id.'' . "\r\n" .
						'Reply-To: '.$email_id.'' . "\r\n" .
						'Content-type: text/html; charset=utf-8' . "\r\n" .
						'X-Mailer: PHP/' . phpversion();
					
					
					include("../class.phpmailer3.php");
					$mail = new PHPMailer();

					$mail->IsSMTP(); // set mailer to use SMTP

					$mail->Host = "smtp.gmail.com"; // specify main and backup server

					$mail->SMTPAuth = true; // turn on SMTP authentication
					
					$mail->SMTPSecure  = "tls"; // turn on SMTP authentication
					
					$mail->Port   = 587; // turn on SMTP authentication

					$mail->From = "enrollment.noreply@gmail.com"; //do NOT fake header.

					$mail->FromName = "enrollment.noreply@gmail.com";

					$mail->AddAddress($email_id); // Email on which you want to send mail

					$mail->IsHTML(true);

					$mail->Subject = "Username and password";

					$mail->Body = $body;

					if(!$mail->Send())
					{
						echo "failed";
					}
					else
					{
					$SQL341_q = "INSERT INTO email_favorite_teacher (user_id,teacher_name,teacher_email) 
							VALUES('$uid','$tname','$email_id')";
							
							$result35_q = mysql_query($SQL341_q);
							if ($result35_q)
							{
								
							}
							else
							{
								//echo "Failed";
							}
					
					}

?>