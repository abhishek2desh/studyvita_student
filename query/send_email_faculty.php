<?php

	include_once '../config.php';
	include("../class.phpmailer4.php");
			
	$subject=$_GET['subject'];
	$body=$_GET['body2'];
	$email_fact=$_GET['text_fact'];
	$batch_id=$_GET['batch_id'];
	$user_n=$_GET['user_n'];
	if (strpos($email_fact,'@') !== false)
	{
		
	}
	else
	{
		goto endlabel;
	}
	$result1=mysql_query("SELECT email_id,password,name FROM batch WHERE id='$batch_id'");
	
		while($row1 = mysql_fetch_array($result1))
		{
		
		$batch_email_id=$row1[0];
			$batch_password=$row1[1];
			$batch_name=$row1[2];
		}
		$body=$body."<br/><br/>".$user_n."(".$batch_name.")";
		$headers = 'From: '.$batch_email_id.'' . "\r\n" .
			'Reply-To: '.$batch_email_id.'' . "\r\n" .
			'Content-type: text/html; charset=utf-8' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();
			
					$mail = new PHPMailer();
					$mail->IsSMTP(); // set mailer to use SMTP
					$mail->Host = "smtp.gmail.com"; // specify main and backup server
					$mail->SMTPAuth = true; // turn on SMTP authentication
					$mail->SMTPSecure  = "tls"; // turn on SMTP authentication
					$mail->Port   = 587; // turn on SMTP authentication
					$mail->Username = $batch_email_id; //do NOT fake header.
					$mail->Password = $batch_password;
					$mail->From = $batch_email_id; //do NOT fake header.
					$mail->FromName = $batch_email_id;
					$mail->AddAddress($email_fact);
					$mail->IsHTML(true);
					$mail->Subject = $subject;
					$mail->Body = $body;
					
					if(!$mail->Send())
					{
						$error_code="Your email was not sent. Please try again <br/>";
						
					}
					else
					{
						//$mail->Send();
						//echo "send";
					}
					if($error_code=="")
		{
		$error_code="Email Send Successfully";
		echo $error_code;
		}
	endlabel:
	
?>