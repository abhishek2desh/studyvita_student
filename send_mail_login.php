<?php
	include 'config.php';
	session_start();
	
	$sid=$_SESSION['sid'];

	$result_fetch_admin=mysql_query("SELECT id,email FROM `admin_log_email`");
	$row_result_admin=mysql_fetch_array($result_fetch_admin);
	$admin_email=$row_result_admin[1];
	//$admin_email="sanjay.edutech@gmail.com";
	$result_fetch=mysql_query("SELECT sd.edutech_student_id,sd.group_id,s.name,b.name,bt.name,br.name,sd.sname,ur.roll_id,rl.name,sd.mobile_no,u.email,u.contact_no
	FROM student_details sd,USER u,standard s,branch br,board b,batch bt,user_roll ur,roll rl WHERE 
	u.id=sd.user_id AND s.id=sd.standard_id AND b.id=sd.board_id AND bt.id=sd.batch_id AND br.id=sd.branch_id AND u.id=ur.user_id AND rl.id=ur.roll_id AND sd.user_id='$sid'");
	$row_result=mysql_fetch_array($result_fetch);
	$edutech_id=$row_result[0];
	$group_id=$row_result[1];
	$std_id=$row_result[2];
	$batch=$row_result[4];
	$board=$row_result[3];
	$branch=$row_result[5];
	$sname=$row_result[6];
	$roll_id=$row_result[7];
	$roll_name=$row_result[8];
	$mob=$row_result[9];
	$semail=$row_result[10];
	$contact_no=$row_result[11];
	
	if($mob == "")
	{
		$mob=$contact_no;
	}
	if($contact_no == "")
	{
		$mob=$mob;
	}
	
	$result_fetch1=mysql_query("SELECT Ipaddress,create_date,ADDTIME(create_date,'9:30:00') FROM access_log WHERE user_id = '$sid' AND id = (SELECT MAX(id) FROM access_log)");
	$row_result1=mysql_fetch_array($result_fetch1);
	$get_ip=$row_result1[0];
	$get_date=$row_result1[1];
	$futureDate = $row_result1[2];
	
	$email=$admin_email;
	
	$todayis = date("l, F j, Y, g:i a");
	
	$body2 = "<b><table table valign='top' style='border:solid 1px;width:800px;height:60px;'>
					<tr style='width:100px;background-color:#5E9DC8;border:solid 1px;height:20px;'>
						<td style='width:100px;border:solid 0px;height:20px;'>Student Name</td>
						<td style='width:100px;border:solid 0px;height:20px;'>Email</td>
						<td style='width:100px;border:solid 0px;height:20px;'>Mobile</td>
						<td style='width:100px;border:solid 0px;height:20px;'>Batch</td>
						<td style='width:100px;border:solid 0px;height:20px;'>Branch</td>
						<td style='width:100px;border:solid 0px;height:20px;'>Type of user</td>
						<td style='width:100px;border:solid 0px;height:20px;'>Login Time</td>
						<td style='width:100px;border:solid 0px;height:20px;'>Ip Address</td>
					</tr>
					<tr>
						<td style='width:100px;border:solid 0px;height:20px;'>$sname</td>
						<td style='width:100px;border:solid 0px;height:20px;'>$semail</td>
						<td style='width:100px;border:solid 0px;height:20px;'>$mob</td>
						<td style='width:100px;border:solid 0px;height:20px;'>$batch</td>
						<td style='width:100px;border:solid 0px;height:20px;'>$branch</td>
						<td style='width:100px;border:solid 0px;height:20px;'>$roll_name</td>
						<td style='width:100px;border:solid 0px;height:20px;'>$futureDate</td>
						<td style='width:100px;border:solid 0px;height:20px;'>$get_ip</td>
					</tr>
				</table></b>";
		
	$result_fetch2=mysql_query("SELECT Ipaddress,create_date,ADDTIME(create_date,'9:30:00') FROM access_log WHERE user_id = '$sid'  ORDER BY id DESC LIMIT 5");
	$ij=1;
	$val="";
	$val = "<b><table table valign='top' style='border:solid 1px;width:430;height:60px;'>";
	$val2 = $val."<tr style='width:100px;background-color:#5E9DC8;border:solid 1px;height:20px;'>
			<td style='width:30px;border:solid 0px;height:20px;'>No.</td>
			<td style='width:200px;border:solid 0px;height:20px;'>Login Time</td>
			<td style='width:200px;border:solid 0px;height:20px;'>Ip Address</td>
		 </tr>";
		
	$val3 = "";
		
	while($row_result2=mysql_fetch_array($result_fetch2))
	{ 
		$val3 = $val3. "
		<tr>
			<td style='width:30px;border:solid 0px;height:20px;'>$ij</td>
			<td style='width:200px;border:solid 0px;height:20px;'>$row_result2[2]</td>
			<td style='width:200px;border:solid 0px;height:20px;'>$row_result2[0]</td>
		</tr>";
		$ij++;
	}
	$val4 =  "</table></b>";
	
	$val_ad=$val2.$val3.$val4;
	
	$body = $body2."<br/><br/>".$val_ad;
	
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
	$mail->FromName = "edutechenquiry";
	$mail->AddAddress($email); // Email on which you want to send mail
	$mail->IsHTML(true);
	$mail->Subject = " $sname  $roll_name is now online";
	$mail->Body = $body;
	//$mail->AddAttachment($path);
	$mail->Send();
?>
</body>
</html>