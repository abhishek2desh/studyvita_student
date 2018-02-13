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
	$result=mysql_query("SELECT u.name,sd.sname,sd.father_name,sd.f_mob_no,sd.pe_mailid,u.email,u.contact_no FROM USER u,student_details sd WHERE u.id=sd.user_id AND u.id='$s5'");
	$row=mysql_fetch_array($result);
	$uname=$row[0];$sname=$row[1];$fname=$row[2];$fmobile=$row[3];$pemail=$row[4];$uemail=$row[5];$contact_no=$row[6];
	
	
?>
<?php
if(isset($_POST['submit_photo'])) 
{
	if ($_FILES["file"]["error"] > 0)
	{
		echo "Error: " . $_FILES["file"]["error"] . "<br>";
	}
	else
	{ 
		$file_name=$_FILES["file"]["name"];
		
		$str_arr = explode('.',$file_name);
		$str_bf = $str_arr[0];  // Before the Decimal point
		$str_af = $str_arr[1];
		
		if($str_af == "jpeg" || $str_af == "png" || $str_af == "jpg" || $str_af == "JPEG" || $str_af == "PNG" || $str_af == "JPG")
		{
		$upload_img_path="";
			$sq1_path=mysql_query("SELECT upload_path FROM `image_upload_path`");
			while($row_sqlpath=mysql_fetch_array($sq1_path))
							{
								
								$upload_img_path=$row_sqlpath[0];
							}
		
			move_uploaded_file($_FILES["file"]["tmp_name"],
			$upload_img_path."edutech_viewer\\StudentPhotos\\" . $_FILES["file"]["name"]);
			$new_path_copy=$upload_img_path."edutech_viewer\\StudentPhotos\\" . $_FILES["file"]["name"];
		$new_path_paste=$upload_img_path."coreacademics\\StudentPhotos\\" . $_FILES["file"]["name"];
			if(file_exists($new_path_copy))
					{
						
						copy("$new_path_copy","$new_path_paste");
					}
					{
					}
			$rs6=mysql_query("UPDATE USER SET student_photos='$file_name' WHERE id='$s5'");
			if($rs6)
			{
				
				$message="Your photo successfully upload, Thank You";
				
				echo "<script language=javascript> alert('$message');</script>"; 
				echo '<SCRIPT LANGUAGE="JavaScript">
				document.location.href="update_info.php" </SCRIPT>';
			}
			else
			{
				//echo "Paper Generation Failed";
			}
		}
		else
		{
			$message2="Choose only png and jpg file..";
			echo "<script language=javascript> alert('$message2');</script>"; 
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
			<link rel="stylesheet" href="css/style_images_mob.css" type="text/css" />
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
				var mobile_no_verify="";
				var doc_start_time="",doc_end_time="";
		var page_source="Update_info.php";
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
filename ="query/Check_mobile_verification.php?user_id="+user_id;
							// alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
						//data="1";
						//alert(data);
						if(data=="1")
						{
						$("#verify_m").hide();
						$("#mob_verify").text("Verified");
						
						}
						else
						{
						$("#verify_m").show();
						$("#mob_verify").text("");
						}
						},
						});
						$("#verify_m").click(function(){
						$("#ver_code").text("");
						filename ="query/generate_mobile_verification.php?user_id="+user_id;
							$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
						if(data=="failed")
						{
						alert("Please try after some time");
						}
						else
						{
						var valNew=data.split("|");
						instruction_type="Your Studyvita Verification Code : "+valNew[0];
							mobile_no_verify=valNew[1];
							url = "http://www.mysmschannel.com:8080/gcm/api/sendtomobile.do?userName=TheCoreAcademics&password=thecore&title=Verification&senderName=CoreAcademics&mobileNumbers="+valNew[1]+"&messageText="+instruction_type;
							/*orgurl = "http://cheapsms.highspeedsms.com/sendsms.jsp?user=edutech&password=12345678&mobiles="+mobile_id+"&sms="+instruction_type;*/
							//alert(url);
							$.ajax({
								url: url,
								type: 'GET',
								dataType: 'html',
								success: function(data, textStatus, xhr) {
								
								},
							});
								$("#shadow").fadeIn("normal");
				$("#mob_verification_form").fadeIn("normal");
						}
						
				},
				});
						});
						$("#cancel_hide_mob").click(function(){
				$("#mob_verification_form").fadeOut("normal");
				$("#shadow").fadeOut();
		    });
			
			$("#verify_code").click(function(){
				ver_code=$("#ver_code").val();
				if(ver_code=="")
				{
				alert("Enter verification code");
				}
				else
				{
					filename ="query/update_mobile_verification.php?user_id="+user_id+"&ver_code="+ver_code+"&mobile_no_verify="+mobile_no_verify;
							$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
						if(data=="")
						{
						alert("Verified successfully");
						$("#mob_verification_form").fadeOut("normal");
				$("#shadow").fadeOut();
						filename1 ="query/Check_mobile_verification.php?user_id="+user_id;
							 //alert(filename);
					$.ajax({
						url: filename1,
						type: 'GET',
						dataType: 'html',
						
						success: function(data1, textStatus, xhr) {
						//data="1";
						if(data1=="1")
						{
						$("#verify_m").hide();
						$("#mob_verify").text("Verified");
						
						}
						else
						{
						$("#verify_m").show();
						$("#mob_verify").text("");
						}
						},
						});
						}
						else
						{
						alert(data);
						}
						},
						});
				}
			});
			$("#login_a").click(function(){
				$("#shadow").fadeIn("normal");
				$("#login_form").fadeIn("normal");
			});
			$("#cancel_hide").click(function(){
				$("#login_form").fadeOut("normal");
				$("#shadow").fadeOut();
		    });
			$("#uname").val(uname);
			$("#umobile").val(umobile);
			$("#fname").val(fname);
			$("#fmobile").val(fmobile);
			$("#uemail").val(uemail);
			$("#pemail").val(pemail);
			$('#submit').click(function(){
				uname=$("#uname").val();
				umobile=$("#umobile").val();
				fname=$("#fname").val();
				fmobile=$("#fmobile").val();
				uemail=$("#uemail").val();
				pemail=$("#pemail").val();
				filename = "query/update_profile.php?uname="+uname+"&umobile="+umobile+"&fname="+fname+"&fmobile="+fmobile+"&uemail="+uemail+"&pemail="+pemail+"&uid="+user_id;
				//alert(filename);
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					
					success: function(data, textStatus, xhr) {
						if(data == 'update')
						{
							alert("Update Profile Successfully");
						}
						else
						{
							alert("Try Again..........");
						}
						
					},
				});
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
						$("#lv_chap").show();
						$("#chapter_list").show();
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
		<div class='trable_bg' style='position: fixed;z-index: 2;padding-left:0px;color:yellow;border:solid 0px;width:100%'>
			<table style='width:100%' cellspacing="0">
				<tr>
					<td style='width:100%;'>
						<center><?php require 'adlp.php'; ?></center>
					</td>
				</tr>
				
			</table>
		</div>
		<div style='background-color:#fff;width:100%;height:500%;'>
			<table style="padding-top:85px;border:solid 0px;width:100%;height:25px;">
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
																								echo "<label style='float:left;color:#ffffff;padding-left:5px;'><font face='verdana' size='2' color='white' ><b>Welcome &nbsp;&nbsp;&nbsp;".$u5."&nbsp;&nbsp;!&nbsp;&nbsp;&nbsp;&nbsp;".$tutorname.">".$crname.">".$subname.">"."My Profile<b></font></label>";

												
													
												
						?>
						
					</td>
					<td style="width:2%" valign="right">
							<img src="images/close_image.png" id="close_window" height="25px" width="25" align="right">
							</td>
				</tr>
			</table>
			<center><div id="main_div_1" class='main_div2' style='width:50%;'>
				<table style="width:100%;border:solid 0px;">
					<tr>
						<td valign="top" style="width:80%;border:solid 0px;">
							<label style="font-size:16px;color:black;">Update Info</label><br/><br/>
							<table>
								<tr>
									<td>
										<label style="font-size:14px;color:black;">Name</label>
									</td>
									<td>
										<input type="text" class="inputs" id="uname" />
									</td>
								</tr>
								<tr>
									<td>
										<label style="font-size:14px;color:black;">Mobile</label>
									</td>
									<td>
										<input type="text" class="inputs" id="umobile" />
										<input type="button" class="defaultbutton" id="verify_m" value='Verify' />
										<label id="mob_verify"></label><br/>
									</td>
								</tr>
								<tr>
									<td>
										<label style="font-size:14px;color:black;">Parent Name</label>
									</td>
									<td>
										<input type="text" class="inputs" id="fname" />
									</td>
								</tr>
								<tr>
									<td>
										<label style="font-size:14px;color:black;">Parent Mobile</label>
									</td>
									<td>
										<input type="text" class="inputs" id="fmobile" />
									</td>
								</tr>
								<tr>
									<td>
										<label style="font-size:14px;color:black;">Email</label>
									</td>
									<td>
										<input type="text" class="inputs" id="uemail" />
									</td>
								</tr>
								<tr>
									<td>
										<label style="font-size:14px;color:black;">Parents Email</label>
									</td>
									<td>
										<input type="text" class="inputs" id="pemail" />
									</td>
								</tr>
								<tr>
									<td>
										
									</td>
									<td>
										<input class="defaultbutton" type="submit" id="submit" value='Update' />
									</td>
								</tr>
							</table>
							
						</td>
						<td valign="top" style="width:20%;border:solid 0px;">
							<table style='background-color: #0174DF;width:100%;height:130px;border-radius: 5px; border: 0px solid #BADA55;'>
								<tr>
									<td style='background-color: #0174DF;width:100%;height:100px;border-radius: 5px; border: 0px solid #BADA55;'>
										<?php
											$result_photos=mysql_query("SELECT student_photos FROM USER WHERE id='$s5'");
											$row_photos=mysql_fetch_array($result_photos);
											$photos=$row_photos[0]; 
											if($photos == "")
											{
												//$full_path="../"."StudentPhotos/blank_user_icon2.PNG";
												$full_path="StudentPhotos/blank_user_icon2.PNG";
												echo "<img src='$full_path' height='100px' width='100%' />";
											}
											else
											{
												//$full_path="../"."StudentPhotos/".$photos;
												$full_path="StudentPhotos/".$photos;
												echo "<img src='$full_path' height='100px' width='100%' />";
											}
										?>
									</td>
								</tr>
								<tr>
									<td style='background-color: #0174DF;width:100%;height:30px;border-radius: 5px; border: 0px solid #BADA55;'>
										<a href="#" id="login_a" style="font-size:12px;color:white;">Upload Your Photo</a>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</div></center>
		</div>
	        <div>
                <?php require 'copy_right_file.php'; ?>
            </div>

		<div id="login_form">
			<div class="err" id="add_err"></div>
			<form method="post" enctype="multipart/form-data">
				<table>
					<tr>
						<td>
							Upload Your Photo Here
							<input type="file" name="file" id="file"><br/><br/><br/>
							<input type="submit" class="defaultbutton" name="submit_photo" value="Upload Photo">
							<input type="button" id="cancel_hide" class="defaultbutton" value="Cancel" />
						</td>
					</tr>
				</table>
			</form>
		</div>
		<div id="shadow" class="popup"></div>
		<div id="mob_verification_form">
			<div class="err" id="add_err"></div>
			<form method="post" enctype="multipart/form-data">
				<table>
					<tr>
						<td>
							<center><b>Mobile Verification</b><br/><br/>
							<input type="text" class="inputs" id="ver_code" placeholder="Enter Verification Code" /><br/><br/>
								<input class="defaultbutton" type="button" id="verify_code" value="Submit" />&nbsp;&nbsp;<input type="button" id="cancel_hide_mob" value="Cancel" /></center>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>
		<div><?php require 'footer.php'; ?></div>
</body>
</html>