<?php
	include_once '../config.php';
	include("../class.phpmailer2.php");
	$wblink=$_GET['wblink'];
	$fac_id=$_GET['fac_id'];
	$uname="";
	$uemail="";
	$ref_code="";
	$error_code="";
	$result=mysql_query("select name,email,referal_code from user where id='$fac_id'");
	while($row=mysql_fetch_array($result))
	{
	$uname=$row[0];
	$uemail=$row[1];
	$ref_code=$row[2];
	}
	if($wblink=="")
	{
	$wblink="http://coreacademics.in/SIGNUP/register.php?refcode=".$ref_code;
	}
	else
	{
	}
	$email_sub="Unique Studyvita Weblink";
	$emailbody="Hi ".$uname.",<br/><br/>Your unique studyvita referral code is: ".$ref_code."<br/><br/>Your unique studyvita weblink is mentioned below<br/><br/>".$wblink."<br/><br/><br/>Team Studyvita";
	$batch_email_id='academics.notification@gmail.com';
	$batch_password='core@academics';
	$headers = 'From: '.$batch_email_id.'' . "\r\n" .
			'Reply-To: '.$batch_email_id.'' . "\r\n" .
			'Content-type: text/html; charset=utf-8' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();
			$student_id=$uemail;
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
					$mail->AddAddress($student_id);
					$mail->IsHTML(true);
					$mail->Subject = $email_sub;
					$mail->Body = $emailbody;
					if(!$mail->Send())
					{
						$error_code="Your email was not sent. Please try again <br/>";
						//error_code
						//echo $error; 
					}
					else
					{
						$mail->Send();
						
					}
					if($error_code=="")
		{
		$error_code="Email Send Successfully";
	echo $error_code;
		}
		else
		{
			echo $error_code;
		}
?>