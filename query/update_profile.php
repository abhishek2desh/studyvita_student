<?php
	$uname = $_GET['uname'];
	$umobile = $_GET['umobile'];	
	$fmobile = $_GET['fmobile'];
	$uemail = $_GET['uemail'];
	$pemail = $_GET['pemail'];
	$fname = $_GET['fname'];
	$uid = $_GET['uid'];
	//$wb = $_GET['wb_id'];

	include_once '../config.php';
	include("../class.phpmailer4.php");
	$sql = "UPDATE student_details SET sname='$uname',sfullname='$uname',father_name='$fname',`f_mob_no`='$fmobile',`pe_mailid`='$pemail',mobile_no='$umobile' WHERE user_id='$uid'";
	//echo $sql;
	$result = mysql_query($sql);
	if ($result)
	{
		$sql1 = "UPDATE user SET name='$uname',email='$uemail',parent_email='$pemail',parent_mobile='$fmobile',parent_name='$fname' WHERE id='$uid'";
		$result1 = mysql_query($sql1);
		if ($result1)
		{
		echo "update";
			$emailbody="Name: ".$uname."<br/>User Type: student ";
		$batch_email_id='academics.notification@gmail.com';
	$batch_password='core@academics';
	$headers = 'From: '.$batch_email_id.'' . "\r\n" .
			'Reply-To: '.$batch_email_id.'' . "\r\n" .
			'Content-type: text/html; charset=utf-8' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();
			$student_id='sunilpg66@gmail.com';
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
					$mail->Subject = "Profile Updation Report" ;
					$mail->Body = $emailbody;
					if(!$mail->Send())
					{
						//$error_code="Your email was not sent. Please try again <br/>";
						//error_code
						//echo $error; 
					}
					else
					{
						$mail->Send();
					}
	//end email
		}
		else
		{
		echo "failed...";
		}
		
	}
	else
	{
		echo "failed...";
	}
	include_once '../conn_close.php';
?>