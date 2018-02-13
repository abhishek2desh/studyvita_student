<?php
	include_once 'config.php';
	
	$sid=$_GET['sid'];

	$res=mysql_query("SELECT sd.user_id,sd.pe_mailid,u.email,u.name,u.username,u.password FROM student_details sd,USER u WHERE sd.user_id=u.id AND sd.edutech_student_id='$sid'");
	$row=mysql_fetch_array($res);
	$rw=mysql_num_rows($res);
	$uid=$row[0];
	$pemail_id=$row[1];
	$semail_id=$row[2];
	$sname=$row[3];
	$username=$row[4];
	$password=$row[5];
	
	if($semail_id == "")
	{
		$email=$pemail_id;
	}
	else
	{
		$email=$semail_id;
	}
	if($rw == 0)
	{
		echo "This type of student id not registered...";
	}
	else
	{
		$todayis = date("l, F j, Y, g:i a") ;
		//set a title for the message
		$subject = "Username and password";
		$body = "
					Dear <b>$sname</b><br/><br/>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Your Username : $username<br/>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Your Password : $password<br/>
					<br/><br/><br/>
					Globaleduserver Team.";
					
					
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

		$mail->From = "edutechenquiry@gmail.com"; //do NOT fake header.

		$mail->FromName = "edutechenquiry@gmail.com";

		$mail->AddAddress($email); // Email on which you want to send mail

		$mail->IsHTML(true);

		$mail->Subject = "Username and password";

		$mail->Body = $body;

		if(!$mail->Send())
		{
			$error="Your student id was not sent. Please try again";
		}
		else
		{
				$message= "
					Dear $sname 
					Your Username and password is sent to your registered email ID  : ($email)";
				echo $message;			
				$mail->AddCC("edutechenquiry@gmail.com");
				$mail->Subject = "Autorepsonse: We received your submission";
				$mail->Body = "<br><br>
				
								Globaleduserver Team.";
				
				$mail->Send();
				//}		
		}
	}
	include 'conn_close.php';
?>
