<?php
	include 'config.php';
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
	$result=mysql_query("SELECT u.name,sd.sname,sd.father_name,sd.f_mob_no,sd.pe_mailid,u.email,u.contact_no,u.username FROM USER u,student_details sd WHERE u.id=sd.user_id AND u.id='$s5'");
	$row=mysql_fetch_array($result);
	$uname=$row[0];$sname=$row[1];$fname=$row[2];$fmobile=$row[3];$pemail=$row[4];$uemail=$row[5];$contact_no=$row[6];
	$username=$row[7];
	
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
			var doc_start_time="",doc_end_time="";
		var page_source="Referal_code.php";
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
$('#submitprev').click(function(){
	generateurl=$("#msg3").val().trim();
	if(generateurl=="")
	{
	}
	else
	{
	 var valNews=generateurl.split('http');
	var url="http"+valNews[1];
	 window.open(url , '_blank');
	}
	
	});
	$("#Submitg").click(function(){
			msg1=$("#msg1").val().trim();
			msg2=$("#msg2").val().trim();
			if(msg1=="" || msg2=="")
			{
			alert("some fields are empty");
			}
			else
			{
			filename="query/generate-html-page.php";
			//alert(filename);
			data34={msg1:msg1,msg2:msg2,fac_id:user_id};
			$.ajax({
							type: "POST",
				url: filename,
				
				data: data34,
						
						success: function(data, textStatus, xhr) {
						//alert(data);
							if(data=="Failed")
							{
							alert(data);
							}
							else
							{
							$("#msg3").val(data);
							
							}
						},
						});
			}
			});
				$('#Submits').click(function(){
				$('#Submits').click(function(){
				msgtext=$("#msg3").val().trim();
				 filenames = "query/send-sms.php?fac_id="+user_id+"&msgtext="+msgtext;
	
	$.ajax({
		url: filenames,
		type: 'GET',
		dataType: 'html',
		success: function(data, textStatus, xhr) {
	alert("Sms send sucessfully");
		},
		});
				
				
				});
$('#Submitw').click(function(){
						var refcode="";
							filename= "query/Get-user-referalcode.php?user_id="+user_id;
							
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
						
						var mySplitResult = data.split("|");
						refcode=mySplitResult[0];

						wblink="http://studyvita.com/SIGNUP/register.php?refcode="+refcode;
						$("#wblink").val(wblink);
						},
						});
					});
					$('#Submite').click(function(){
					wblink=$("#wblink").val();
					if(wblink=="")
					{
					alert("Please generate unique weblink");
					}
					else
					{
					filename = "query/send_referalcode_email.php?fac_id="+user_id+"&wblink="+wblink;
						//alert(filename);
							$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						//
						success: function(data, textStatus, xhr) {
							alert(data);
							
						
						},
					});
					}
				});
			//check graphic display
				$(".overlayModal").hide();
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

			function getContent(filename, selectboxid)
				{
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							var strtemp = "$('#" + selectboxid + "').html(data)";
							eval(strtemp);
						//alert(data);
						},
					});
				}
					$('#Submit').click(function(){
					
				var  dc= $("input[type='radio'][name='smstype']:checked");
						if (dc.length > 0)
						sms_type = dc.val();
					//alert("alert"+dc_type);
					var refcode="";
					var contact_no="";
					filename= "query/Get-user-referalcode.php?user_id="+user_id;
							
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
						//alert(data);
						var mySplitResult = data.split("|");
						refcode=mySplitResult[0];
						contact_no=mySplitResult[1];
						app_reg=mySplitResult[2];
						
						if(sms_type==1)
						{
						
						 if(app_reg=="1")
						 {
						 msgtext="Hey there!I am inviting you to check out studyvita.com Register for an online course Enter this referral code for a heavy discount!"+refcode ;
					
url = "http://www.mysmschannel.com:8080/gcm/api/sendtomobile.do?userName=TheCoreAcademics&password=thecore&title=Registration&senderName=CoreAcademics&mobileNumbers="+contact_no+"&messageText="+msgtext;
							//alert(url);
								$.ajax({
									url: url,
									type: 'GET',
									dataType: 'html',
									success: function(data, textStatus, xhr) {
										
									},
								});
								location.reload();
						 }
						 else if(app_reg=="0")
						 {
						 
							msgtext="Install Coreacademics app and earn money. http://115.118.114.190/AndroidApk/GCM/TheCoreAcademics.apk Install the app to know more.Available on android only.";
url = "http://www.mysmschannel.com:8080/gcm/api/sendtomobile.do?userName=TheCoreAcademics&password=thecore&title=Registration&senderName=CoreAcademics&mobileNumbers="+contact_no+"&messageText="+msgtext;
							
								$.ajax({
									url: url,
									type: 'GET',
									dataType: 'html',
									success: function(data, textStatus, xhr) {
										
									},
								});
								location.reload();
						 }
						 else
						 {
						 }
							
						}
						else if(sms_type==2)
						{
						
						instruction_type="Hey there!I am inviting you to check out studyvita.com Register for an online course Enter this referral code for a heavy discount!"+refcode ;
						url="http://cheapsms.highspeedsms.com/sendsms.jsp?user=edutech&password=12345678&mobiles="+contact_no+"&sms="+instruction_type;
							
							$.ajax({
								url: url,
								type: 'GET',
								dataType: 'html',
								success: function(data, textStatus, xhr) {
									
								},
							});
							location.reload();
						}
						else
						{
						
						}
						},
					});
						
				
					
				});
			});
		</script>
		<!-- Animation Overlay CSS begins -->
		<style media="screen">
		.overlayModal {
						/* some styles to position the modal at the center of the page */
						position: absolute;
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
	<!--<div class="overlayModal">
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
		<div class='trable_bg' style='position: fixed;z-index: 2;padding-left:0px;color:yellow;border:solid 0px;width:100%;'>
		
			<table style='width:100%' cellspacing="0">
				<tr>
					<td style='width:100%;'>
						<center><?php require 'adlp.php'; ?></center>
						<br/>
					</td>
				</tr>
				
			</table>
		</div>
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
												
													echo "<label style='float:left;color:#ffffff;padding-left:5px;'><font face='verdana' size='2' color='white' ><b>Welcome &nbsp;&nbsp;&nbsp;".$u5."&nbsp;&nbsp;!&nbsp;&nbsp;&nbsp;&nbsp;".$tutorname.">".$crname.">".$subname.">"."Referral Scheme<b></font></label>";
												
						?>
						
					</td>
					<td style="width:2%" valign="right">
							<img src="images/close_image.png" id="close_window" height="25px" width="25" align="right">
							</td>
				</tr>
			</table>
			
		
		</div>
				
				<form method="post" enctype="multipart/form-data">
				<div >
				
						<center>
							<table style='width:40%' cellspacing="10">
							<tr>
							
							<td>
							Refer your friends & relatives to join<br/><br/>
							studtvita.com<br>
							and for every successful enrollment earn a reward.<br/><br/>
What's more is that you are helping them by passing on a huge discount.<br/><br/>
<table style='width:60%' cellspacing="10">
<tr>
<td><h2><p align="left">How Does it work?</p></h2>
</td>
</tr>
</table>
It's easier than what it looks.<br/><br/>
1. Send the referral message to your device from below, and forward it to friends, collegues, everyone you can think of.<br/><br/>
2. Get them to register, and take a course (at a discounted rate thanks to your code) And you could earn a reward for every successful payment.


							</td>
							</tr>
							</table>
							<!--<table style='width:40%' cellspacing="10">
						<tr>
						<td align="">
							<h2>Your Referral Code</h2></label>
						</td>
						</tr>
						
						<tr>
						<td align="center">
						<h1>
						<?php
															$result=mysql_query("SELECT `referal_code` FROM `user` WHERE id='$s5'");
																		$rw = mysql_num_rows($result);
																		
																		if($rw == 0)
																		{
																			
																		}
																		else
																		{
																			while($row=mysql_fetch_array($result))
																			{
																				echo $row[0];
																			}
																		}
						?></h1>
						</td>
						</tr>
						</table>-->
					<!--<table style='width:40%' cellspacing="10">
					<tr>
					<td>
					<h2>Send Referral code to My Device</h2>
				
					</td>
					</tr>
					<tr>
					<td align="center">
								<input id="2" type="radio" name="smstype" checked="checked" value="2"><label style='color:black' for="2"><b>Via SMS</b></label>
			<input id="1" type="radio" name="smstype" value="1"><label style='color:black' for="1"><b>Via Core Academics App</b></label>
				
					</td>
					</tr>
					<tr>
					<td align="center">
					
					 <input type='BUTTON' id='Submit' name='submit' value = 'Send' class="defaultbutton" />
					</td>
					</tr>
					</table>-->
					<br/>
					 <input type='BUTTON' id='Submitw' name='submitw' value = 'Generate Unique Weblink' class="defaultbutton" />&nbsp;&nbsp; <input type='BUTTON' id='Submite' name='submite' value = 'Send To My Email' class="defaultbutton" /><br/>	<br/>
						<textarea rows="3" id="wblink" cols="70" name="wblink">								</textarea><br/>	
					</center>
			<?php
			$result=mysql_query("SELECT roll_id from user_roll where user_id='$login_session_id' order by id");
			$roll_id=0;
			
			while($row = mysql_fetch_array($result))
			{
			$roll_id=$row[0];
			goto nextlabel;
			}
			nextlabel:
			$view_pp_page=0;
			
			
		$result=mysql_query("SELECT view_student FROM private_html_page_setting ");
		while($row = mysql_fetch_array($result))
			{
			$view_pp_page=$row[0];
			}
			
			if($view_pp_page=="1")
			{
			?>
		<div id='ppdiv'>
		<center><h3>Generate Private Html Page</h3>
		<table style="width:80%">
		<tr>
		<td style="width:30%"  valign="top">
		<label>Your Message to public audience</label>
		</td>
		<td style="width:70%">
		<textarea rows="3" id="msg1" cols="70" name="msg1"></textarea>
		</td>
		</tr>
		<tr>
		<td style="width:30%" valign="top">
		<label>Detail text</label>
		</td>
		<td style="width:70%">
	<textarea rows="5" id="msg2" cols="70" name="msg2"></textarea>
		</td>
		</tr>
		<tr>
		<td style="width:30%"  valign="top">
		<input type='BUTTON' id='Submitg' name='submitg' value = 'Generate Private Page' class="defaultbutton" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type='BUTTON' id='Submits' name='submits' value = 'Send Sms' class="defaultbutton" />
		<br/><br/>
		<input type="button" id="submitprev" name="submitprev" value="Preview Page" class="defaultbutton">
		</td>
		<td style="width:70%" valign="top">
	<textarea rows="4" id="msg3" cols="70" name="msg3"></textarea>
		</td>
		</tr>
		</table>
		
		
		
		
		</center>
			</div>	
<?php
}
?>
					
						
					
					
				
					</div>
					</form>
	        <div>
                <?php require 'copy_right_file.php'; ?>
            </div><br/>
  		<div><?php require 'footer.php'; ?></div>
		
	</div>
</body>
</html>