<?php
	include 'config.php';
	include("class.phpmailer2.php");
	session_start();
	$today = strtotime(date("Y-m-d H:i:s"));
	$today=$today+(34210);
	$today = date("Y-m-d", $today);
	$today2 = date("l, d F, Y", strtotime('today'));
	$course_id=$_SESSION['course_id'];
	$batch_id=$_SESSION['batch_id'];
	$subject_id=$_SESSION['subject_id'];
	$s1=$_SESSION['studid1'];
	$s5=$_SESSION['sid'];
	$s3=$_SESSION['grp1'];
	$u5 = $_SESSION['uname'];
	if(isset($_POST['submit2']))
	{
		if ($_FILES["file"]["error"] > 0)
		{
			echo "Error: " . $_FILES["file"]["error"] . "<br>";
		}
		else
		{
			$file_name=$_FILES["file"]["name"];
			$text_subject=$_POST['text_subject'];
			$text_matter=$_POST['text_matter'];
			if($text_subject=="" || $text_matter=="")
			{
				$message2="Select Proper Data.";
				echo "<script language=javascript> alert('$message2');</script>";
			}
			else
			{
				$str_arr = explode('.',$file_name);
				$str_bf = $str_arr[0];  // Before the Decimal point
				$str_af = $str_arr[1];
				if($str_af == "DOC" || $str_af == "doc" || $str_af == "PDF" || $str_af == "pdf" || $str_af == "png" || $str_af == "jpg" || $str_af == "docx" )
				{
				$uid=$s5;
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
		$file_name=$_FILES["file"]["name"];
					$mail->addAttachment($_FILES['file']['tmp_name'], $file_name); 
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
					$file_name=$_FILES["file"]["name"];
					$mail->addAttachment($_FILES['file']['tmp_name'], $file_name); 
					if(!$mail->Send())
					{
						//echo "fialemail2";
					}
					else
					{
					}
//end help email
$message2="We have received you submission. A ticket id-".$ticket_id." is generated. Our representative will contact you at the earliest. Team Studyvita.";		
				echo "<script language=javascript> alert('$message2');</script>"; 
			echo "<script>window.opener.location.reload();</script>";
							echo "<script>window.close();</script>";
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
				}
				else
				{
				$message2="Choose DOC or PDF or PNG OR JPG OR DOCX file";
				echo "<script language=javascript> alert('$message2');</script>"; 
				}
			}
		}
	}
	
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>		
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="shortcut icon" href="images/Edutechheader.ico" />
		<meta name="keywords" content="edutechindiaonline">
		<meta name="description" content="edutechindiaonline">
		<title>Welcome <?php echo $u5 ?></title>
		<script src="js/moment.js" type="text/javascript"></script>
		<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
		<link href="css/bg1.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="css/style_images.css" type="text/css" />
		<script type="text/javascript" src="js/flexpaper.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers_debug.js"> </script>
		<link href="menu/menu.css" rel="stylesheet" type="text/css" />
		<style>
			html, body	{ height:100%;width:100%; }
			body { margin:0; overflow:auto; }
			.black {
				background: #444444;
				border: 1px solid #26487f;
				border-radius: 1px;
				color: #fff;
				outline: 1px solid #a5c7fe;
				padding: 6px 10px;
			}
		</style>
		<style>
			inputs:-webkit-input-placeholder { 
				color:    #b5b5b5; 
			} 
			 
			inputs-moz-placeholder { 
				color:    #b5b5b5; 
			} 
			 
			 .inputs  { 
			 width:200px; 
			padding: 15px 25px; 
			font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif; 
			font-weight: 400; 
			font-size: 14px; 
			color: #9D9E9E; 
			text-shadow: 1px 1px 0 rgba(256, 256, 256, 1.0); 
			background: #FFF; 
			border: 1px solid #FFF; 
			border-radius: 5px; 
			box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.50); 
			-moz-box-shadow: inset 0 1px 3px rgba(0,0,0,0.50); 
			-webkit-box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.50); 
			} 
			.inputs:focus { 
			   background: #DFE9EC; 
			color: #414848; 
			box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.25); 
			-moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.25); 
			-webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.25); 
				outline:0; 
			} 
			  .inputs:hover   { 
			background: #DFE9EC; 
			color: #414848; 
			} 
			.main_div2 { 
			height: auto;
			width: auto; 
			background-color: white; 
			}
			 #footer {
				position: fixed;
				bottom: 0;
				width: 100%;
			}
		</style>
		<script>
			$(document).ready(function(){
			
			var user_id='<?php echo $s5; ?>';
			var dt1='<?php echo $today; ?>';
			var uname='<?php echo $uname; ?>';
			var sname='<?php echo $sname; ?>';
			var umobile='<?php echo $contact_no; ?>';
			var fname='<?php echo $fname; ?>';
			var fmobile='<?php echo $fmobile; ?>';
			var pemail='<?php echo $pemail; ?>';
			var uemail='<?php echo $uemail; ?>';
			var username='<?php echo $username; ?>';
			var doc_start_time="",doc_end_time="";
		var page_source="open-ticket.php";
		currentdate = new Date();
		currentdocid="";
		//alert("l");
		var  submenu_with_menu=0;
								currentdate = moment(currentdate).format("YYYY-MM-DD HH:mm:ss");
								doc_start_time=	currentdate;
								//alert(doc_start_time);
filename1 = "query/insert_menu_log.php?uid="+user_id+"&docid="+currentdocid+"&start_time="+doc_start_time+"&page_source="+page_source+"&submenu_with_menu="+submenu_with_menu;
										//alert(filename1);
										$.ajax({
										url: filename1,
										type: 'GET',
										dataType: 'html',
										success: function(data, textStatus, xhr) {
												//alert(data);
											},
										});
										
										
										
										
									$("#close_window").click(function(){
									
currentdate = new Date();
								currentdate = moment(currentdate).format("YYYY-MM-DD HH:mm:ss");
								doc_end_time=	currentdate;
								
filename = "query/update_menu_log.php?uid="+user_id+"&docid="+currentdocid+"&start_time="+doc_start_time+"&end_time="+doc_end_time+"&page_source="+page_source+"&submenu_with_menu="+submenu_with_menu;
										
										$.ajax({
										url: filename,
										type: 'GET',
										dataType: 'html',
										success: function(data, textStatus, xhr) {
											//alert(data);
											url = "virtual-class.php";
                              
                                   location.href = url;
											},
										});
});

			//check graphic display
				$(".overlayModal").hide();
				$(".td4").hide();
	$("#submit2").hide();
				 var content_name="animation";
				filename ="query/check_user_gif_display1.php?user_id="+user_id+"&content_name="+content_name;
					//alert(filename);
						$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						success: function(data, textStatus, xhr) {
						//alert(data);
						if(data=="0")
						{
						
							$(".overlayModal").show();
						
						}
						else
						{
						
							$(".overlayModal").hide();
							
						
						}
						},
						});
				//end check graphic display

			$('input[type="radio"][name="emailattach"]').click(function(){
	var email_atach = $("input[type='radio'][name='emailattach']:checked");
					if (email_atach.length > 0)
					email_attach_type= email_atach.val();
					if(email_attach_type==7)
					{
					$(".td4").show();
	$("#submit2").show();
		$("#submit").hide();
					}
					else
					{
					$(".td4").hide();
	$("#submit2").hide();
		$("#submit").show();
					}

});
			$('#submit').click(function(){
				text_subject=$("#text_subject").val();
				text_matter=$("#text_matter").val();
				//pwd1=$("#pwd1").val();
			if(text_subject == ""  || text_matter=="" )
			{
					alert("Some Fields are Empty");
			}
			else
			{
			filename = "insert-ticket.php?text_subject="+text_subject+"&uid="+user_id+"&text_matter="+text_matter;
				//alert(filename);
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					
					success: function(data, textStatus, xhr) {
						
							alert(data);
						window.reload();
						
					},
				});
			
			}
				
			});
			function getContent(filename, selectboxid)
			{
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					
					success: function(data, textStatus, xhr) {
						var strtemp = "$('#" + selectboxid + "').html(data)";
						eval(strtemp);
						
					},
				});
			}
			});
		</script>
		<!-- Animation Overlay CSS begins -->
		<style media="screen">
		.overlayModal {
						/* some styles to position the modal at the center of the page */
						position: fixed;
						top: 10%;
						left: 90%;
						/*width: 300px;*/
						/*height: 200px;*/
						/*background-color: #f1c40f;*/
						text-align: center;
						border-radius: 5px;
						/* needed styles for the overlay */
						z-index: 10; /* keep on top of other elements on the page */

				}
/*Animation Overlay CSS Ends*/
		</style>

</head>
<body>
<!-- Animation Content Div -->
	<!-- <div class="overlayModal">
		<?php
		$result=mysql_query("SELECT id,path,`upload_file_name_new` FROM `general_document_manager` WHERE file_type='gif' ORDER BY RAND()");
		while($row=mysql_fetch_array($result))
				{
					$full_path="GeneralDocument/".$row[2];
					echo "<img src='$full_path'  style='width:6em;height:6em;padding-right:7px;'>";
					goto exitrec;
				}
	exitrec:
		?>
	</div>-->

	<div style='background-color:#fff;width:100%'>
		<div class='trable_bg' style='position: fixed;z-index: 2;padding-left:0px;color:yellow;border:solid 0px;width:100%'>
			<table style='width:100%' cellspacing="0">
				<tr>
					<td style='width:100%;'>
						<center><?php require 'adlp.php'; ?></center>
					</td>
				</tr>
				
			</table>
		</div>
		<form method="post" enctype="multipart/form-data">
		<div style='background-color:#fff;width:100%;'>
			<div style='background-color:#fff;width:100%;height:500%;'>
			<table style="padding-top:103px;border:solid 0px;width:100%;height:25px;">
			<!--<tr>
		<td><b>Welcome <?php echo "&nbsp;&nbsp;&nbsp;".$u5."&nbsp;&nbsp;!&nbsp;&nbsp;&nbsp;&nbsp;</b>";
		?>
		</td>
		</tr>-->

				<tr>
					<td style="background-color:#0f2541;border:solid 0px;width:98%;">
					<?php
												$result_c=mysql_query("SELECT c.name,u.name FROM course c,user u WHERE c.id='$course_id' and u.id=c.tutor_id");
												$row_c=mysql_fetch_array($result_c);
												$crname=$row_c[0]; 
												$tutorname=$row_c[1]; 
												$result_c1=mysql_query("SELECT name FROM subject WHERE id='$subject_id'");
												$row_c1=mysql_fetch_array($result_c1);
												$subname=$row_c1[0];
												
													echo "<label style='float:left;color:#ffffff;padding-left:5px;'><font face='verdana' size='2' color='white' ><b>Welcome &nbsp;&nbsp;&nbsp;".$u5."&nbsp;&nbsp;!&nbsp;&nbsp;&nbsp;&nbsp;".$tutorname.">".$crname.">".$subname.">"."Open A New Ticket<b></font></label>";
												
						?>
						
					</td>
					<td style="width:2%" valign="right">
							<img src="images/close_image.png" id="close_window" height="25px" width="25" align="right">
							</td>
				</tr>
			</table>
			
		
		</div>
			<div id="main_div_1" class='main_div2' style='width:60%;'>
				<table style="width:100%;border:solid 0px;padding-left:5px;">
					<tr>
						<td valign="top" style="width:80%;border:solid 0px;">
							<div  style='height:30px;font-size:20px;'>
								<center><b><u>Open A New Ticket</u></b></center>
							</div>
							<table>
								<tr>
									<td valign="top">
										<label style="font-size:14px;color:;">Subject</label>
									</td>
									<td>
									<textarea rows="3" id="text_subject" cols="70" name="text_subject" maxlength="200" >								</textarea>
										
									</td>
								</tr>
								<tr>
									<td valign="top">
										<label style="font-size:14px;color:;">Matter</label>
									</td>
									<td>
									<textarea rows="8" id="text_matter" cols="70" name="text_matter">								</textarea>
										
									</td>
								</tr>
								<tr>
									<td valign="top">
										<label style="font-size:14px;color:;">Send Email With Attachment</label>
									</td>
									<td>
									<input id="7" type="radio" name="emailattach" checked="checked" value="7"><label style='color:black' for="7">Yes</label>
								<input id="8" type="radio" name="emailattach" checked="checked" value="8"><label style='color:black' for="8">No</label>
								
										
									</td>
								</tr>
																<tr class="td4">
									<td valign="top">
										<label style="font-size:14px;color:;">Upload Your <label id='file_tt'></label> Attachment File</label>
									</td>
									<td>
<input type="file" name="file" id="file">
							
										
									</td>
								</tr>
								
								<tr>
									<td>
										
									</td>
									<td>
										<input type="button" id="submit" value='Submit' class="defaultbutton"/>
															 <input type='submit' id='submit2' name='submit2'  value = 'Submit' class="defaultbutton"/>

									</td>
								</tr>
							</table>
							
						</td>
						
					</tr>
				</table><br/>
					
			</div>
		
		</div>
	        <div>
                <?php require 'copy_right_file.php'; ?>
            </div>
</form>
		<div><?php require 'footer.php'; ?></div>
	</div>
</body>
</html>