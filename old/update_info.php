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
			/* outer shadows  (note the rgba is red, green, blue, alpha) */
			-webkit-box-shadow: 0px 0px 12px rgba(0, 0, 0, 0.4); 
			-moz-box-shadow: 0px 1px 6px rgba(23, 69, 88, .5);
			/* rounded corners */
			-webkit-border-radius: 12px;
			-moz-border-radius: 7px; 
			border-radius: 7px;
			/* gradients */
			background: -webkit-gradient(linear, left top, left bottom, 
			color-stop(0%, white), color-stop(15%, white), color-stop(100%, #D7E9F5)); 
			background: -moz-linear-gradient(top, white 0%, white 55%, #D5E4F3 130%); 
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
				alert(filename);
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
</head>
<body>
	<div style='background-color:#EDF5FA;width:100%'>
		<div class='trable_bg' style='padding-left:5px;color:yellow;border:solid 0px;width:100%'>
			<table style='width:100%'>
				<tr>
					<td style='width:100%;'>
						<center><?php require 'adlp.php'; ?></center>
					</td>
				</tr>
				<tr>
					<td valign='top' style='width:100%;border:solid px;'>
						<center><?php require 'menu/testmenu.php'; ?></center>
					</td>
				</tr>
			</table>
		</div>
		<div style='background-color:#EDF5FA;width:100%;height:500%;'>
			<table style="padding-top:0px;border:solid 0px;width:100%;height:25px;">
				<tr>
					<td style="background-color:#3366FF;border:solid 0px;">
						<label style="float:left;color:white"><b>My Profile</b></label>
					</td>
				</tr>
			</table>
			<center><div id="main_div_1" class='main_div2' style='width:50%;'>
				<table style="width:100%;height:595px;border:solid 0px;">
					<tr>
						<td valign="top" style="width:80%;border:solid 0px;">
							<label style="font-size:16px;color:blue;">Update Info</label><br/><br/>
							<table>
								<tr>
									<td>
										<label style="font-size:14px;color:blue;">Name</label>
									</td>
									<td>
										<input type="text" class="inputs" id="uname" />
									</td>
								</tr>
								<tr>
									<td>
										<label style="font-size:14px;color:blue;">Mobile</label>
									</td>
									<td>
										<input type="text" class="inputs" id="umobile" />
									</td>
								</tr>
								<tr>
									<td>
										<label style="font-size:14px;color:blue;">Father Name</label>
									</td>
									<td>
										<input type="text" class="inputs" id="fname" />
									</td>
								</tr>
								<tr>
									<td>
										<label style="font-size:14px;color:blue;">Father Mobile</label>
									</td>
									<td>
										<input type="text" class="inputs" id="fmobile" />
									</td>
								</tr>
								<tr>
									<td>
										<label style="font-size:14px;color:blue;">Email</label>
									</td>
									<td>
										<input type="text" class="inputs" id="uemail" />
									</td>
								</tr>
								<tr>
									<td>
										<label style="font-size:14px;color:blue;">Parents Email</label>
									</td>
									<td>
										<input type="text" class="inputs" id="pemail" />
									</td>
								</tr>
								<tr>
									<td>
										
									</td>
									<td>
										<input type="submit" id="submit" value='Update' />
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
		<div id="footer" style="background-color:#0174DF;">
			<center><div style="padding-left:5px;padding-top:5px;font-size:12px;color:black;text-transform: capitalize;"><label style="border:solid 0px;color:white;">Copyright &copy Edutech Educational Services Pvt. Ltd. Ahmedabad, Gujarat, India</label>
			</div></center>
		</div>
		<div id="login_form">
			<div class="err" id="add_err"></div>
			<form method="post" enctype="multipart/form-data">
				<table>
					<tr>
						<td>
							Upload Your Photo Here
							<input type="file" name="file" id="file"><br/><br/><br/>
							<input type="submit" name="submit_photo" value="Upload Photo">
							<input type="button" id="cancel_hide" value="Cancel" />
						</td>
					</tr>
				</table>
			</form>
		</div>
		<div id="shadow" class="popup"></div>
	</div>
</body>
</html>