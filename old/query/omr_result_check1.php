<?php
	session_start();
	include_once '../config.php';
	
	$stud_id = $_SESSION['sid'];
	$mid = $_GET['material_id'];
	
	$result=mysql_query("SELECT u.name,u.email,sd.edutech_student_id FROM USER u,student_Details sd WHERE u.id='$stud_id' AND u.id=sd.user_id");
					
	$row=mysql_fetch_array($result);
	$name=$row[0];
	$email=$row[1];
	$edutech_id=$row[2];
	
	$result1=mysql_query("SELECT m.material_name,m.Test_id,s.name FROM `material` m,SUBJECT s WHERE m.id='$mid' AND 
	s.id=m.subject_id");
					
	$row1=mysql_fetch_array($result1);
	$m_name=$row1[0];
	$m_test_id=$row1[1];
	$sub_name=$row1[2];
	
	$unattempt="";
	$correct="";
	$incorrect="";
	$i=0;
	$j=0;
	$k=0;
	$sql_1 = "SELECT DISTINCT om.material_id,om.student_id,om.que_no,om.response,ms.Answer,ms.Question_No FROM omr_student_response om,`material_correct_answers` ms WHERE om.material_id=ms.material_id AND om.que_no=ms.Question_No AND om.student_id='$stud_id' AND om.material_id='$mid'";
	$result_1 = mysql_query($sql_1);
	while($row_1 = mysql_fetch_row($result_1))
	{
		$res=$row_1[3];
		$u_que=$row_1[2];
		$u_res=$row_1[4];
		$u_que=$row_1[5];
		if($res == "X")
		{
			$unattempt=$unattempt.$u_que.",";
			$k++;
		}
		else if($u_res == $res)
		{
			$correct=$correct.$u_que.",";
			$i++;
		}
		else
		{
			$incorrect=$incorrect.$u_que.",";
			$j++;
		}
	}
	
	$update_SQL = "UPDATE omr_student_score_history SET correct_que='$correct',incorrect_que='$incorrect',
unattempt_que='$unattempt',corr_que_total='$i',incorr_que_total='$j',unattempt_total='$k' WHERE student_id='$stud_id' AND material_id='$mid'";
	
	$update_result = mysql_query($update_SQL);
	
	if($update_result)
	{
	
	}
	else
	{
		
	}
	echo "<table border='1' style='width:610px;background:#E0ECF8;'>";
	echo "<blink><b><span style='padding-left:15px;font-size:14px;color:blue;'>Your Result</span></b></link>";
	echo "<tr style='color:blue'>";		
		echo "<th style='width:15%;'>Details</th>";							
		echo "<th style=''>Question No</th>";
		echo "<th style='width:8%;'>Total No of Questions</th>";
	echo "</tr>";
	
	echo "<tr>";
		echo "<td style='color:green;width:15%;'><b>Correct</b></td>";
		echo "<td style='color:green;'>".$correct."</td>";
		echo "<td style='color:green;width:8%;'>".$i."</td>";
	echo "</tr>";
	
	echo "<tr>";
		echo "<td style='color:red;width:15%;'><b>Incorrect</b></td>";
		echo "<td style='color:red;'>".$incorrect."</td>";
		echo "<td style='color:red;width:8%;'>".$j."</td>";
	echo "</tr>";
	
	echo "<tr>";
		echo "<td style='width:15%;'><b>Unattempted</b></td>";
		echo "<td  style='color:black;'>".$unattempt."</td>";
		echo "<td style='width:8%;'>".$k."</td>";
	echo "</tr>";

	echo "</table>";
	$kk=$i+$j+$k;
	//get todays date
	$todayis = date("l, F j, Y, g:i a") ;
	//set a title for the message
	$subject = "Globaleduserver test result";
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
	$mail->From = "eduserver.results@gmail.com"; //do NOT fake header.
	$mail->FromName = "eduserver.results@gmail.com";

	$mail->AddAddress("eduserver.results@gmail.com"); // Email on which you want to send mail

	$mail->IsHTML(true);

	$mail->Subject = "Result detail";

	$mail->Body = $body;

	if(!$mail->Send())
	{
		//echo $mail->ErrorInfo;
		$error="Your enquiry was not sent. Please try again";
	}
	else
	{
		$mail->AddCC($email);
		$mail->Subject = "Eduserver Result";
		$mail->Body = "
					Student Name : $name<br/>
					Edutech Student ID:$edutech_id<br/>
					Test ID:$m_test_id<br/>
					<table border='1' style='width:610px;background:#E0ECF8;'>
					<tr>
						<td>
						</td>
						<td>
								<center><blink><b><span style='font-size:14px;color:blue;'>Your Result</span></b></link></center>
						</td>
						<td>
						</td>
					</tr>
					
					<tr style='color:blue'>		
						<th style='width:15%;'>Details</th>				
						<th style=''>Question No</th>
						<th style='width:8%;'>Total No of Questions</th>
					</tr>
					<tr>
						<td style='color:green;width:15%;'><b>Correct</b></td>
						<td style='color:green;'>".$correct."</td>
						<td style='color:green;width:8%;'>".$i."</td>
					</tr>
					<tr>
						<td style='color:red;width:15%;'><b>Incorrect</b></td>
						<td style='color:red;'>".$incorrect."</td>
						<td style='color:red;width:8%;'>".$j."</td>
					</tr>
					<tr>
						<td style='width:15%;'><b>Unattempted</b></td>
						<td  style='color:black;'>".$unattempt."</td>
						<td style='width:8%;'>".$k."</td>
					</tr>
					<tr>
						<td>
						</td>
						<td>
								<center><blink><b><span style='font-size:14px;color:blue;'>Total No. Question :</span></b></link></center>
						</td>
						<td>
							$kk
						</td>
					</tr>
					</table>
					<br/>
					<br/>
					<br/>
					Regards ,<br/>
					Globaleduserver Team.
					";
					
					
					
		$mail->Send();
	}
	include_once '../conn_close.php';
?>