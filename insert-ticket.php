<?php 
	include_once 'config.php';
			include("class.phpmailer2.php");

	$text_subject=$_GET['text_subject'];
	$uid=$_GET['uid'];
	$text_matter=$_GET['text_matter'];
	$uemail="";
	$support_email="";
	$support_email_pwd="";
	$ticket_id=0;
	$uname="";
	$int_name="";
	$created_by="";
	$user_type="";
	$result1=mysql_query("select email,name,created_by from user WHERE id='$uid'");
	while($row1=mysql_fetch_array($result1))
	{
	$uemail=$row1[0];
	$uname=$row1[1];
	$created_by=$row1[2];
	}
	$result17=mysql_query("SELECT r.name FROM roll r,user_roll ur WHERE r.id=ur.roll_id AND ur.user_id='$uid'");
	while($row17=mysql_fetch_array($result17))
	{
	$user_type=$row17[0];
	goto labelk;
	}
	labelk:
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
	$result2=mysql_query("select email_id,`password` from support_email");
	while($row2=mysql_fetch_array($result2))
	{
	$support_email=$row2[0];
	$support_email_pwd=$row2[1];
	}
	$sql = "insert into ticket_system(`user_id`,`user_email`,`support_email`,email_subject,email_matter)values('$uid','$uemail','$support_email','$text_subject','$text_matter')";
	//echo $sql;
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
			echo "We have received you submission. A ticket id-".$ticket_id." is generated. Our representative will contact you at the earliest. Team Studyvita.";
				$email_subject="Ticket Id-".$ticket_id." " .$text_subject;
				$email_body="Hi ". $uname. ",<br/><br/> We have received your submission.One of our representative will contact you at the earliest.<br/>For any further query regarding this ticket please reply to this email without changing subject.<br/><br/><br/>Team Studyvita.<br/><br/>You wrote: <br/>".$text_matter;
				$body="
<html>
<body bgcolor='white'>
<table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='white'>
  <tr>
    <td><table width='600' border='0' cellspacing='0' cellpadding='0' bgcolor='#FFFFFF' align='center'>
        <tr>
          <td><table width='100%' border='0' cellspacing='0' cellpadding='0'>
              <tr>
                
                <td width='205'><a href= 'http://yourlink' target='_blank'><img src='http://www.globaleduserver.com/edu/faculty/images/stuyvita-logo.png' width='180' height='70' border='0' alt=''/></a></td>
                <td width='393'><table width='100%' border='0' cellspacing='0' cellpadding='0'>
                    <tr>
                      <td height='46' align='right' valign='middle'><table width='100%' border='0' cellspacing='0' cellpadding='0'>
                         <!-- <tr>
                            <td width='67%' align='right'><font style='font-family:'Myriad Pro', Helvetica, Arial, sans-serif; color:#68696a; font-size:8px; text-transform:uppercase'><a href= 'http://yourlink' style='color:#68696a; text-decoration:none'><strong>SEND TO A FRIEND</strong></a></font></td>
                            <td width='29%' align='right'><font style='font-family:'Myriad Pro', Helvetica, Arial, sans-serif; color:#68696a; font-size:8px'><a href= 'http://yourlink' style='color:#68696a; text-decoration:none; text-transform:uppercase'><strong>VIEW AS A WEB PAGE</strong></a></font></td>
                            <td width='4%'>&nbsp;</td>
                          </tr>-->
                        </table></td>
                    </tr>
                    <tr>
                      <td height='30'><img src='http://www.globaleduserver.com/edu/faculty/images/PROMO-GREEN2_01_04.jpg' width='393' height='30' border='0' alt=''/></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td align='center'>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><table width='100%' border='0' cellspacing='0' cellpadding='0'>
           
              <tr>".$email_body."</tr><tr>
                <td>&nbsp;</td>
                <td align='right' valign='top'><table width='108' border='0' cellspacing='0' cellpadding='0'>
                  <tr>
                    <td><br/><img src='http://www.globaleduserver.com/edu/faculty/images/PROMO-GREEN2_04_01.jpg' width='108' height='9' style='display:block' border='0' alt=''/></td>
                  </tr>
                  <tr>
                    <td align='center' valign='middle' bgcolor='#03bcda'><font style='font-family: Georgia, 'Times New Roman', Times, serif; color:#ffffff; font-size:14px'><em><a href='http://coreacademics.in/' target='_blank' style='color:#ffffff; text-decoration: underline'>click here</a></em></font></td>
                  </tr>
                  <tr>
                    <td align='center' valign='middle' bgcolor='#03bcda'><font style='font-family: Georgia, 'Times New Roman', Times, serif; color:#ffffff; font-size:15px'><strong><a href='http://coreacademics.in/' target='_blank' style='color:#ffffff; text-decoration:none'><em>Login</em></a></strong></font></td>
                  </tr>
                  <tr>
                    <td height='10' align='center' valign='middle' bgcolor='#03bcda'> </td>
                  </tr>
                </table></td>
                <td>&nbsp;</td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><img src='http://www.globaleduserver.com/edu/faculty/images/PROMO-GREEN2_07.jpg' width='598' height='7' style='display:block' border='0' alt=''/></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
              <!-- <tr>
           <td><table width='100%' border='0' cellspacing='0' cellpadding='0'>
            <tr>
				<td width='11%' align='center'><font style='font-family:'Myriad Pro', Helvetica, Arial, sans-serif; color:#010203; font-size:7px; text-transform:uppercase'><a href= 'http://studyvita.com/contact.php' style='color:#010203; text-decoration:none'><strong>CONTACT </strong></a></font></td>
				<td width='2%' align='center'><font style='font-family:'Myriad Pro', Helvetica, Arial, sans-serif; color:#010203; font-size:7px; text-transform:uppercase'><strong>|</strong></font></td>
				<td width='11%' align='center'><font style='font-family:'Myriad Pro', Helvetica, Arial, sans-serif; color:#010203; font-size:7px; text-transform:uppercase'><a href= 'http://yourlink' style='color:#010203; text-decoration:none'><strong>UNSUBSCRIBE </strong></a></font></td>
				<td width='2%' align='center'><font style='font-family:'Myriad Pro', Helvetica, Arial, sans-serif; color:#010203; font-size:7px; text-transform:uppercase'><strong>|</strong></font></td>
				<td width='10%' align='center'><font style='font-family:'Myriad Pro', Helvetica, Arial, sans-serif; color:#010203; font-size:7px; text-transform:uppercase'><strong>STAY CONNECTED</strong></font></td>
				<td width='4%' align='right'><a href='https://www.facebook.com/studyvita' target='_blank'><img src='http://www.globaleduserver.com/edu/faculty/images/PROMO-GREEN2_09_01.jpg' alt='facebook' width='22' height='19' border='0' /></a></td>
				<td width='7%' align='center'><a href='https://twitter.com/StudyVITA' target='_blank'><img src='http://www.globaleduserver.com/edu/faculty/images/PROMO-GREEN2_09_02.jpg' alt='twitter' width='23' height='19' border='0' /></a></td>
            </tr>
          </table></td>
        </tr>-->
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align='center'><font style='font-family:'Myriad Pro', Helvetica, Arial, sans-serif; color:#231f20; font-size:6px'><strong>Head Office &amp; Registered Office | Edutech Educational Services Pvt. Ltd., S-1, Kundlini Complex, Near Hotel Shahi Palace, Vastrapur Lake jn, Ahmedabad - 380 015. GUJ. (INDIA) | Tel: +(91) 78 78 079 079 | <a href= 'mailto:coreacademics.in' style='color:#010203; text-decoration:none'>coreacademics.in</a></strong></font></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html> 	";
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
		$mail->AddAddress($uemail);
		$mail->IsHTML(true);
		$mail->Subject = $email_subject;
		$mail->Body = $body;
					if(!$mail->Send())
					{
						//echo "fialemail";
									//echo $email_body;		

					}
					else
					{
					//echo "sens";
								//echo $email_body;		

					}	

//for helpemail
$email_body2="";
$email_body2="New ticket received<br/>Ticket Id:".$ticket_id."<br/>UserName:".$uname."<br/>UserEmail:".$uemail."<br/>UserType:".$user_type."<br/>Institution Name/Teacher Name:".$int_name;
$body2="
<html>
<body bgcolor='white'>
<table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='white'>
  <tr>
    <td><table width='600' border='0' cellspacing='0' cellpadding='0' bgcolor='#FFFFFF' align='center'>
        <tr>
          <td><table width='100%' border='0' cellspacing='0' cellpadding='0'>
              <tr>
                
                <td width='205'><a href= 'http://yourlink' target='_blank'><img src='http://www.globaleduserver.com/edu/faculty/images/stuyvita-logo.png' width='180' height='70' border='0' alt=''/></a></td>
                <td width='393'><table width='100%' border='0' cellspacing='0' cellpadding='0'>
                    <tr>
                      <td height='46' align='right' valign='middle'><table width='100%' border='0' cellspacing='0' cellpadding='0'>
                         <!-- <tr>
                            <td width='67%' align='right'><font style='font-family:'Myriad Pro', Helvetica, Arial, sans-serif; color:#68696a; font-size:8px; text-transform:uppercase'><a href= 'http://yourlink' style='color:#68696a; text-decoration:none'><strong>SEND TO A FRIEND</strong></a></font></td>
                            <td width='29%' align='right'><font style='font-family:'Myriad Pro', Helvetica, Arial, sans-serif; color:#68696a; font-size:8px'><a href= 'http://yourlink' style='color:#68696a; text-decoration:none; text-transform:uppercase'><strong>VIEW AS A WEB PAGE</strong></a></font></td>
                            <td width='4%'>&nbsp;</td>
                          </tr>-->
                        </table></td>
                    </tr>
                    <tr>
                      <td height='30'><img src='http://www.globaleduserver.com/edu/faculty/images/PROMO-GREEN2_01_04.jpg' width='393' height='30' border='0' alt=''/></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td align='center'>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><table width='100%' border='0' cellspacing='0' cellpadding='0'>
           
              <tr>".$email_body2."</tr><tr>
                <td>&nbsp;</td>
                <td align='right' valign='top'><table width='108' border='0' cellspacing='0' cellpadding='0'>
                  <tr>
                    <td><br/><img src='http://www.globaleduserver.com/edu/faculty/images/PROMO-GREEN2_04_01.jpg' width='108' height='9' style='display:block' border='0' alt=''/></td>
                  </tr>
                  <tr>
                    <td align='center' valign='middle' bgcolor='#03bcda'><font style='font-family: Georgia, 'Times New Roman', Times, serif; color:#ffffff; font-size:14px'><em><a href='http://coreacademics.in/' target='_blank' style='color:#ffffff; text-decoration: underline'>click here</a></em></font></td>
                  </tr>
                  <tr>
                    <td align='center' valign='middle' bgcolor='#03bcda'><font style='font-family: Georgia, 'Times New Roman', Times, serif; color:#ffffff; font-size:15px'><strong><a href='http://coreacademics.in/' target='_blank' style='color:#ffffff; text-decoration:none'><em>Login</em></a></strong></font></td>
                  </tr>
                  <tr>
                    <td height='10' align='center' valign='middle' bgcolor='#03bcda'> </td>
                  </tr>
                </table></td>
                <td>&nbsp;</td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><img src='http://www.globaleduserver.com/edu/faculty/images/PROMO-GREEN2_07.jpg' width='598' height='7' style='display:block' border='0' alt=''/></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
              <!-- <tr>
           <td><table width='100%' border='0' cellspacing='0' cellpadding='0'>
            <tr>
				<td width='11%' align='center'><font style='font-family:'Myriad Pro', Helvetica, Arial, sans-serif; color:#010203; font-size:7px; text-transform:uppercase'><a href= 'http://studyvita.com/contact.php' style='color:#010203; text-decoration:none'><strong>CONTACT </strong></a></font></td>
				<td width='2%' align='center'><font style='font-family:'Myriad Pro', Helvetica, Arial, sans-serif; color:#010203; font-size:7px; text-transform:uppercase'><strong>|</strong></font></td>
				<td width='11%' align='center'><font style='font-family:'Myriad Pro', Helvetica, Arial, sans-serif; color:#010203; font-size:7px; text-transform:uppercase'><a href= 'http://yourlink' style='color:#010203; text-decoration:none'><strong>UNSUBSCRIBE </strong></a></font></td>
				<td width='2%' align='center'><font style='font-family:'Myriad Pro', Helvetica, Arial, sans-serif; color:#010203; font-size:7px; text-transform:uppercase'><strong>|</strong></font></td>
				<td width='10%' align='center'><font style='font-family:'Myriad Pro', Helvetica, Arial, sans-serif; color:#010203; font-size:7px; text-transform:uppercase'><strong>STAY CONNECTED</strong></font></td>
				<td width='4%' align='right'><a href='https://www.facebook.com/studyvita' target='_blank'><img src='http://www.globaleduserver.com/edu/faculty/images/PROMO-GREEN2_09_01.jpg' alt='facebook' width='22' height='19' border='0' /></a></td>
				<td width='7%' align='center'><a href='https://twitter.com/StudyVITA' target='_blank'><img src='http://www.globaleduserver.com/edu/faculty/images/PROMO-GREEN2_09_02.jpg' alt='twitter' width='23' height='19' border='0' /></a></td>
            </tr>
          </table></td>
        </tr>-->
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align='center'><font style='font-family:'Myriad Pro', Helvetica, Arial, sans-serif; color:#231f20; font-size:6px'><strong>Head Office &amp; Registered Office | Edutech Educational Services Pvt. Ltd., S-1, Kundlini Complex, Near Hotel Shahi Palace, Vastrapur Lake jn, Ahmedabad - 380 015. GUJ. (INDIA) | Tel: +(91) 78 78 079 079 | <a href= 'mailto:coreacademics.in' style='color:#010203; text-decoration:none'>coreacademics.in</a></strong></font></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html> 	";
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
					$mail->Body = $body2;
					if(!$mail->Send())
					{
						//echo "fialemail2";
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