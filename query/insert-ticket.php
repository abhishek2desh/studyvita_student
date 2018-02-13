<?php 
	include_once '../config.php';
	$text_subject=$_GET['text_subject'];
	$uid=$_GET['uid'];
	$text_matter=$_GET['text_matter'];
	$uemail="";
	$support_email="";
	$support_email_pwd="";
	$ticket_id=0
	$uname="";
	$int_name="";
	$created_by="";
	$result1=mysql_query("select email,name,created_by from user WHERE id='$uid'");
	while($row1=mysql_fetch_array($result1))
	{
	$uemail=$row1[0];
	$uname=$row1[1];
	$created_by=$row1[2];
	}
	if($created_by=="")
	{}
	else
	{
		$result15=mysql_query("select name from user WHERE id='$created_by'");
	while($row15=mysql_fetch_array($result15))
	{
	$int_name=$row15[0];
	}
	}
	$result2=mysql_query("select email_id,password from support_email'");
	while($row2=mysql_fetch_array($result2))
	{
	$support_email=$row2[0];
	$support_email_pwd=$row2[1];
	}
	$sql = "insert into ticket_system(`user_id`,`user_email`,`support_email`,email_subject,email_matter)values('$uid','$uemail','$support_email','$text_subject','$text_matter')";
		$result = mysql_query($sql);
		if ($result)
		{
			$result4=mysql_query("select max(id) from ticket_system WHERE user_id='$uid' and user_email='$uemail' and support_email='$support_email' and email_subject='$text_subject' and email_matter='$text_matter' ");
			while($row4=mysql_fetch_array($result4))
			{
				$ticket_id=$row4[0];

			}
			if($ticket_id>0)
			{
			echo "We have received you submission.A ticket id-".$ticket_id." generated.Our representative will contact you at the earliest.";
				$email_subject="Ticket Id-".$ticket_id." " .$text_subject;
				$email_body="Hi". $uname. "<br/><br/> We have received your submission.One of our representative will contact you at the earliest.<br/><br/>Fr any further query regarding these ticket please reply to these email without changing subject.<br/><br/><br/>Team Studyvita.<br/><br/>You wrote: <br/>".$text_matter;
				$headers = 'From: '.$support_email.'' . "\r\n" .
			'Reply-To: '.$support_email.'' . "\r\n" .
			'Content-type: text/html; charset=utf-8' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();
		
		include("class.phpmailer_ticket.php");
		$mail = new PHPMailer();
		$mail->SetLanguage("en", 'includes/phpMailer/language/');
		$mail->IsSMTP(); // set mailer to use SMTP
		$mail->Host = "smtp.gmail.com"; // specify main and backup server
		$mail->SMTPAuth = true; // turn on SMTP authentication
		$mail->SMTPSecure  = "tls"; // turn on SMTP authentication
		$mail->Port   = 587; // turn on SMTP authentication
		$mail->Username = $support_email; //do NOT fake header.
		$mail->Password = $support_email_pwd;
		$mail->From = $support_email; //do NOT fake header.
		$mail->FromName = $support_email;
		$mail->AddAddress($uemail);
		$mail->IsHTML(true);
		$mail->Subject = $email_subject;
		$mail->Body = $email_body;
					
					if(!$mail->Send())
					{
						
						
					}
					else
					{
					}	

//for helpemail
$email_body2="";
$email_body2="New ticket received<br/>Ticket Id:".$ticket_id."<br/>UserName:".$uname."<br/>UserEmail:".$uemail."Institution Name/Teacher Name:".$int_name;
			$headers = 'From: '.$support_email.'' . "\r\n" .
			'Reply-To: '.$support_email.'' . "\r\n" .
			'Content-type: text/html; charset=utf-8' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();
			$mail = new PHPMailer();
					$mail->IsSMTP(); // set mailer to use SMTP
					$mail->Host = "smtp.gmail.com"; // specify main and backup server
					$mail->SMTPAuth = true; // turn on SMTP authentication
					$mail->SMTPSecure  = "tls"; // turn on SMTP authentication
					$mail->Port   = 587; // turn on SMTP authentication
					$mail->Username = $support_email; //do NOT fake header.
					$mail->Password = $support_email_pwd;
					$mail->From = $support_email; //do NOT fake header.
					$mail->FromName = $support_email;
					$mail->AddAddress($support_email);
					$mail->IsHTML(true);
					$mail->Subject = $email_subject;
					$mail->Body = $email_body2;
					if(!$mail->Send())
					{
					}
					else
					{
					}
//end help email					
			}
			else
			{
			echo "Failed";
			}

	
			//echo "Success";	
		}
		else
		{
			echo "Failed";
		}
?>