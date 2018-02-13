<?php
	include 'config.php';

	/*$user_id=$_GET['user_id']='3214';
	$print_id=$_GET['print_id']='arjun921@hpeprint.com';
	$mat_name=$_GET['mat_name']='C12BIO_6822___26_1_2014_Qus.pdf';*/
	
	$user_id=$_GET['user_id'];
	$print_id=$_GET['print_id'];
	$mat_name=$_GET['mat_name'];
	
	$file_get="C:\\inetpub\\swf\\test_flexpaper_docs\\$mat_name".".pdf";
	$batch_email_id='edutechenquiry@gmail.com';
	if(file_exists($file_get))
	{
		//echo "<br/>"."GET";
		$body = " ";
		$subject=" ";
		$headers = 'From: '.$batch_email_id.'' . "\r\n" .
			'Reply-To: '.$batch_email_id.'' . "\r\n" .
			'Content-type: text/html; charset=utf-8' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();
				//echo "<br/>"."GET2";
		include("../class.phpmailer2.php");
		$mail = new PHPMailer();
		$mail->IsSMTP(); // set mailer to use SMTP
		$mail->Host = "smtp.gmail.com"; // specify main and backup server
		$mail->SMTPAuth = true; // turn on SMTP authentication
		$mail->SMTPSecure  = "tls"; // turn on SMTP authentication
		$mail->Port   = 587; // turn on SMTP authentication
		$mail->From = $batch_email_id;
		$mail->FromName = $batch_email_id;
		$mail->AddAddress($print_id); // Email on which you want to send mail
		$mail->IsHTML(true);
		$mail->Subject = "";
		$mail->Body = $body;
		$mail->AddAttachment($file_get);
		//echo "<br/>"."GET3";
		if(!$mail->Send())
		{
			//echo $mail->ErrorInfo;
			$error="Your email was not sent. Please try again";
			echo $error; 
		}
		else
		{
			$mail->Send();
			echo 'success';
		}
	}
	else
	{
		echo "Not";
	}
	
?>