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
		var page_source="testimonial.php";
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
											window.close();
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
				
				text_matter=$("#text_matter").val();
				//pwd1=$("#pwd1").val();
			if(text_matter=="" )
			{
					alert("Some Fields are Empty");
			}
			else
			{
			//filename = "insert-ticket.php?text_subject="+text_subject+"&uid="+user_id+"&text_matter="+text_matter;
				filename = "query/insert-testimonial.php?text_matter="+text_matter+"&uid="+user_id;
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					
					success: function(data, textStatus, xhr) {
						
						if(data=='')
						{
						alert("Data inserted successfully");
						}
						else
						{
						
						alert(data);
						}
						
						
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
												
													echo "<label style='float:left;color:#ffffff;padding-left:5px;'><font face='verdana' size='2' color='white' ><b>Welcome &nbsp;&nbsp;&nbsp;".$u5."&nbsp;&nbsp;!&nbsp;&nbsp;&nbsp;&nbsp;".$tutorname.">".$crname.">".$subname.">"."Testimonial<b></font></label>";
												
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
							
							<table>
							
								<tr>
									<td valign="top">
										<label style="font-size:14px;color:;">Ente Text</label>
									</td>
									<td>
									<textarea rows="8" id="text_matter" cols="70" name="text_matter">								</textarea>
										
									</td>
								</tr>
								
								<tr>
									<td>
										
									</td>
									<td>
										<input type="button" id="submit" value='Submit' class="defaultbutton"/>
															

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
		
	</div>
</body>
</html>