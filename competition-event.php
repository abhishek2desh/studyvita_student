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
		<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
		<link href="css/bg1.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="css/style_images.css" type="text/css" />
		<link rel="stylesheet" href="css/style_image_camp.css" type="text/css" />
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
			table#t01 {
   border: 1px solid black;
    border-collapse: collapse;
}
table#t02 {
   border: 1px solid black;
    border-collapse: collapse;
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
									$("#close_window").click(function(){
//document.location.href="home.php";
window.close();
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
	filename = "query/get-comptest-data.php?user_id="+user_id;
					getContent(filename, "comp_data");
				filename = "query/get_webinar_data.php?user_id="+user_id;
					getContent(filename, "webinar_data");
			var pwd="";
			$('#tb1').hide();
			filename = "query/check_user_username.php?uid="+user_id;
				
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					
					success: function(data, textStatus, xhr) {
					//alert(data);
						if(data == 'success')
						{
							$('#tb1').hide();
							
						}
						else
						{
							$('#tb1').show();
							
						}
						
					},
				});
				$("#search1").live('click',function(){
		online_id2="";
		online_id2 = ($(this).closest('tr').attr('id'));
		//alert(online_id2);
		if(online_id2=="")
		{
		alert("Url Empty.Try after sometime.");
		}
		else
		{
		
		var url=online_id2;
					
					window.open(url, '_blank');
		}
		
	});
	$("#search3").live('click',function(){
					online_id2="";
										online_id2 = ($(this).closest('td').attr('id'));
										//alert(online_id2);
											filename="query/Check_user_balance.php?online_id2="+online_id2+"&uid="+user_id;
										//filename1="query/Book_student_class.php?online_id2="+online_id2+"&uid="+uid;
									$.ajax({
										url: filename,
										type: 'GET',
										dataType: 'html',
										
										success: function(data, textStatus, xhr) {
											
											if(data == "")
											{
												filename1="query/Book_webinar_class.php?online_id2="+online_id2+"&uid="+user_id;
												//alert(filename1);
												$.ajax({
													url: filename1,
													type: 'GET',
													dataType: 'html',
										
													success: function(data1, textStatus, xhr) {
													if(data1=="")
													{
													alert("Class Booked Successfully");
													filename = "query/get_webinar_data.php?user_id="+user_id;
					getContent(filename, "webinar_data");
													}
													else
													{
													alert(data1);
													}
												
													},
												});
											}
											else
											{
												var str=data;
												if(str=="R")
												{
													var r=confirm("Please recharge your account.Would you like to recharge now click ok?");
													if (r==true)
													  {
														url="Rechargeaccount.php";
														document.location.href=url;
								
														
													  }
													else
													  {
													
													  }
												}
												else if(str=="I")
												{
													var r=confirm("You don't have enough balance.Would you like to recharge now click ok?");
													if (r==true)
													  {
														url="Rechargeaccount.php";
														document.location.href=url;
														
													  }
													else
													  {
													
													  }
												}
												else
												{
												}
												
											}
										},
								});
					});
					$("#registerid").live('click',function(){
					course_test_id="";
					course_test_id = ($(this).closest('tr').attr('id'));
					//alert(course_test_id);
					 filename = "query/insert_user_course_test.php?user_id="+user_id+"&tid_test="+course_test_id;
					
					$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							success: function(data, textStatus, xhr) {
								//alert(data);
								if(data == '')
								{
								alert("Course Registered Successfully");
								filename1 = "query/get-comptest-data.php?user_id="+user_id;
					getContent(filename1, "comp_data");	
									
								}
								else 
								{
									alert(data);
								}
							},
						});
					});
				$("#detailid").live('click',function(){
					camp_id="";
					camp_id = ($(this).closest('tr').attr('id'));
					//alert(camp_id);
					$("#camp_detail").html("");
					filename = "query/get-campaign.php?camp_id="+camp_id;
					//alert(filename);
					getContent_camp(filename, "camp_detail");	
				});
				$("#eventregister").live('click',function(){
					camp_id="";
					camp_id = ($(this).closest('tr').attr('id'));
					 url = "http://coreacademics.in/SIGNUP/index-temp.php?camp_id="+camp_id;
                    //location.href=url.substr(0, input.lastIndexOf('?')) || url;
                    //alert(url);
                    location.href = url;
					});
				function getContent_camp(filename, selectboxid)
			{
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					
					success: function(data, textStatus, xhr) {
						var strtemp = "$('#" + selectboxid + "').html(data)";
						eval(strtemp);
						//alert(data);
						$("#form_camp").fadeIn("normal");
					$("#shadow").fadeIn();
					},
				});
			}
			 $("#camp_detail_view").click(function(){
//$("#form_camp").fadeIn("normal");
					//$("#shadow").fadeIn();
 });
  $("#cancel_hide_camp").click(function(){
					$("#form_camp").fadeOut("normal");
					$("#shadow").fadeOut();
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
																								echo "<label style='float:left;color:#ffffff;padding-left:5px;'><font face='verdana' size='2' color='white' ><b>Welcome &nbsp;&nbsp;&nbsp;".$u5."&nbsp;&nbsp;!&nbsp;&nbsp;&nbsp;&nbsp;".$tutorname.">".$crname.">".$subname.">"."Upcoming Events & Competition<b></font></label>";

												
													
												
						?>
						
					</td>
					<td style="width:2%" valign="right">
							<img src="images/close_image.png" id="close_window" height="25px" width="25" align="right">
							</td>
				</tr>
			</table>
			<div id="main_div_1" class='main_div2' style='width:100%;'><br/>
				&nbsp;&nbsp;&nbsp;&nbsp;<b>Upcoming Events</b><br/>
				<center><div id="event_data" style="width:97%;height:120px;border:solid 0px;overflow-y: scroll;">
				
				<?php
				$result=mysql_query("SELECT id,title,`view_detail_text` FROM special_campaign_list WHERE active='1' ORDER BY id DESC ");
	//echo "SELECT id,title,`view_detail_text` FROM special_campaign_list WHERE active='1' ORDER BY id DESC ";
	echo "<table style='width:100%;border:solid 1px;' id='t01' >";
	echo "<tr><th style='width:80%;border:solid 1px;'>Title</th>
	<th style='width:10%;border:solid 1px;'>Detail</th>
				<th style='width:10%;border:solid 1px;'>Register</th></tr>";
										
								
$blueprint_id=0;
	while($row=mysql_fetch_array($result))
	{
	echo "<tr id='$row[0]'><td style='border:solid 1px;'  valign='top'>".$row[1]."</td>";
	
	echo "<td style='border:solid 1px;'  valign='top'><center><input type='button' class='defaultbutton'' id='detailid' value='View Detail' /></center></td>";
	echo "<td style='border:solid 1px;'  valign='top'><center><input type='button' class='defaultbutton' id='eventregister' value='Register Now' /></center></td>";
	echo "</tr>";
	}
	echo "</table>";
				?>
		
				</div></center><br/>
				&nbsp;&nbsp;&nbsp;&nbsp;<b>Learn n win competitions</b><br/>
				<center><div id="comp_data" style="width:97%;height:120px;border:solid 0px;overflow-y: scroll;">
				
								
								
			
				</div></center><br/>
				&nbsp;&nbsp;&nbsp;&nbsp;<b>Webinar</b><br/>
				<center><div id="webinar_data" style="width:97%;height:110px;border:solid 0px;overflow-y: scroll;">
				
								
								
			
				</div></center><br/>
			</div>
		
		</div>
		<?php include 'special_camp_popup.php'; ?>
	        <div>
                <?php require 'copy_right_file.php'; ?>
            </div>

		
	</div>
		<img src="images/footer final.png" style="height:auto;width:100%;padding-bottom:0px;" id="footer">
</body>
</html>