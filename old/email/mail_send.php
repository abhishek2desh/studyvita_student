<?php
	include_once 'config.php';
	//get todays date
	
	$email="sanjay.edutech@gmail.com";
	
	$todayis = date("l, F j, Y, g:i a") ;
	//set a title for the message
	$subject = "Inquiry FROM My Own Study Portal.";
	$body = "sanjay enqueryi";
				
				
	$headers = 'From: '.$email.'' . "\r\n" .
		'Reply-To: '.$email.'' . "\r\n" .
		'Content-type: text/html; charset=utf-8' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();
	
	
	include("class.phpmailer.php");
	$mail = new PHPMailer();

	$mail->IsSMTP(); // set mailer to use SMTP

	$mail->Host = "smtp.gmail.com"; // specify main and backup server

	$mail->SMTPAuth = true; // turn on SMTP authentication
	
	$mail->SMTPSecure  = "tls"; // turn on SMTP authentication
	
	$mail->Port   = 587; // turn on SMTP authentication

	 

	$mail->From = "sanjay.edutech@gmail.com"; //do NOT fake header.

	$mail->FromName = "sanjay.edutech@gmail.com";

	$mail->AddAddress("sanjay.edutech@gmail.com"); // Email on which you want to send mail

	$mail->IsHTML(true);

	$mail->Subject = "Inquiry detail";

	$mail->Body = $body;

	if(!$mail->Send())
	{
		//echo $mail->ErrorInfo;
		$error="Your enquiry was not sent. Please try again";
	}
	else
	{
		//echo email was sent;
			/*$insert_id = insert_data('enquiry',$send_data);
			echo mysql_error();
			if($insert_id)
			{*/
				 
			$message="Your Inquiry has been sent successfully, Thank You";
			echo $message;
			
  			$mail->AddCC($email);
  			$mail->Subject = "Autorepsonse: We received your submission";
  			$mail->Body = "mail send <br><br>
								

								Regards<br>
								My Own Study Portal<br>
								Support team.";
  			
  			$mail->Send();
			//}		
	}

?>
