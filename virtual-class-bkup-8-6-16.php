<?php
	include 'config.php';
	//include 'lock.php';
	session_start();
	
	$course_id=$_SESSION['course_id'];
	$batch_id=$_SESSION['batch_id'];
	$sub_id=$_SESSION['subject_id'];
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
		<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
		<link href="css/bg1.css" rel="stylesheet" type="text/css" />
		<link href="css/style_images.css" rel="stylesheet" type="text/css" />
		<script src="bs_js/highcharts_1.js"></script>
		<script src="bs_js/exporting.js"></script>
		<script type="text/javascript" src="js/flexpaper.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers_debug.js"> </script>
		<link type="text/css" rel="stylesheet" href="css/style_image_demo.css" />
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
		<script>
			$(document).ready(function(){
				sub_id='<?php echo $sub_id;?>';
				course_id='<?php echo $course_id;?>';
				batch_id='<?php echo $batch_id;?>';
				uid='<?php echo $s5;?>';
				filename = "query/get-virtual-class-schedule.php?sub_id="+sub_id+"&batch_id="+batch_id+"&uid="+uid;
				//alert(filename);
				getContent(filename, "schedule_data");
				$('#btn_no').click(function(){
				$("#Democourse_instruction").fadeOut("normal");
							$("#shadow").fadeOut();
				});
				$("#submit_dwn").click(function(){
					var url = "download-gotomeeting-exe.php";
					//alert(url);
					var win=window.open(url, '_blank');
					win.focus();
				});
								$('#btn_yes').click(function(){
							filename="query/get_student_website_fees.php?uid="+uid+"&course_id="+course_id;
							//alert(filename);
									$.ajax({
										url: filename,
										type: 'GET',
										dataType: 'html',
										
										success: function(data, textStatus, xhr) {
											//alert(data);
											var mySplitResult = data.split("|");
											var url_reg="";
											var reg_uid="",reg_uname="",reg_fees="";
											reg_uid=mySplitResult[0];
											reg_uname=mySplitResult[2];
											reg_fees=mySplitResult[3];
											var	totalitem=1;
											//alert(reg_fees);
											if(reg_fees>0)
											{
											filename1="query/insert_course_order_proaccnt.php?course_id="+course_id+"&totalitem="+totalitem+"&uid="+uid+"&totalamt="+reg_fees;
		
										$.ajax({
												url: filename1,
												type: 'GET',
												dataType: 'html',
												
												success: function(data1, textStatus, xhr) {
													//alert(data);
													if(data1 == 'Failed')
													{
														alert("Pls try after sometime");
														
													}
													else
													{
														var order_id=data1;
														 var referral_code="";
														
											url_reg="http://www.coreacademics.in/pricing/datafrom_test.php?course_id="+course_id+"&totalitem="+totalitem+"&uname="+reg_uname+"&uid="+uid+"&totalamt="+reg_fees+"&order_id="+order_id+"&referral_code="+referral_code;
											
														
													
														window.location.replace(url_reg);
													}
												},
										});
											}
											else
											{
											filename1="query/insert_student_course.php?course_id="+course_id+"&totalitem="+totalitem+"&uid="+uid+"&totalamt="+reg_fees+"&referral_code="+referral_code;
							$.ajax({
										url: filename1,
										type: 'GET',
										dataType: 'html',
										
										success: function(data1, textStatus, xhr) {
											//alert(data);
											if(data1 == '')
											{
												alert("Registered Successfully");
												
											}
											else
											{
											alert("Pls try after sometime");
												
											}
										},
								});
											}
											
										},
								});
					});
					$("#search3").live('click',function(){
					online_id2="";
										online_id2 = ($(this).closest('td').attr('id'));
										//alert(online_id2);
											filename="query/Check_user_balance.php?online_id2="+online_id2+"&uid="+uid;
										//filename1="query/Book_student_class.php?online_id2="+online_id2+"&uid="+uid;
									$.ajax({
										url: filename,
										type: 'GET',
										dataType: 'html',
										
										success: function(data, textStatus, xhr) {
											
											if(data == "")
											{
												filename1="query/Book_student_class.php?online_id2="+online_id2+"&uid="+uid;
												//alert(filename1);
												$.ajax({
													url: filename1,
													type: 'GET',
													dataType: 'html',
										
													success: function(data1, textStatus, xhr) {
													if(data1=="")
													{
													alert("Class Booked Successfully");
													filename = "query/get-virtual-class-schedule.php?sub_id="+sub_id+"&batch_id="+batch_id+"&uid="+uid;
													getContent(filename, "schedule_data");
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
				$("#search1").live('click',function(){
				/*filename1 = "query/check-account-type.php?uid="+uid;
				
						$.ajax({
								url: filename1,
								type: 'GET',
								dataType: 'html',
					
								success: function(data, textStatus, xhr) {
									
									if(data == 'success')
									{*/
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
									/*}
									else
									{
									
									var labeldata="You can't do virtual class in basic account. Upgrade  to premium account to get unlimited access";
							
													$("#demolabel").html(labeldata);
							$("#Democourse_instruction").fadeIn("normal");
							$("#shadow").fadeIn();
									}
								},
								});*/
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
							//alert(data);
						},
					});									
				}
			});
		</script>
		<style>
			.header-right-part{float:right; width:auto;height:46px;  background-color: #3093c7; background-image: -webkit-gradient(linear,  left top, left bottom, from(#3093c7), to(#1c5a85));
			 background-image: -webkit-linear-gradient(top, #3093c7, #1c5a85);
			 background-image: -moz-linear-gradient(top, #3093c7, #1c5a85);
			 background-image: -ms-linear-gradient(top, #3093c7, #1c5a85);
			 background-image: -o-linear-gradient(top, #3093c7, #1c5a85);
			 background-image: linear-gradient(to bottom, #3093c7, #1c5a85);;color:#e9eedd;border-radius:3px; margin-right:5px; padding:5px; box-shadow: 1px 1px 5px #000000;}
			 #footer {
				position: fixed;
				bottom: 0;
				width: 100%;
			}
			#header {
				position: fixed;
				top: 0;
				width: 100%;
			}
		</style>
</head>
    
<body>
	<div style='background-color:#fff;width:100%'>
		<div class='trable_bg' style='position: fixed;z-index: 2;padding-left:5px;color:yellow;border:solid 0px;width:100%'>
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
		</div><br/>
		<div style='background-color:#fff;width:100%'>
		<table style="padding-top:170px;border:solid 0px;width:100%;height:25px;">
				<tr>
					<center><td style="border:solid 0px;background-color:#3366FF;">
					<?php
												$result_c=mysql_query("SELECT c.name,u.name FROM course c,user u WHERE c.id='$course_id' and u.id=c.tutor_id");
												$row_c=mysql_fetch_array($result_c);
												$crname=$row_c[0]; 
												$tutorname=$row_c[1]; 
												$result_c1=mysql_query("SELECT name FROM subject WHERE id='$sub_id'");
												$row_c1=mysql_fetch_array($result_c1);
												$subname=$row_c1[0];
												echo "<label style='float:left;color:#ffffff;'><font face='verdana' size='2' color='white' ><b>".$tutorname.">".$crname.">".$subname.">"."Virtual Class<b></font></label>";
													//echo $crname.">".$subname.">"."Adaptive learning";
												
						?>
						
					</td></center>
				</tr>
			</table><br/>
			<!--<label>&nbsp;&nbsp;Note:If you are using virtual class platform for first time, download virtual class engine.<input type='BUTTON' id='submit_dwn' name='submit_dwn' class='defaultbutton' value = 'Download Now'/></label><br/><br/>-->
			<table style="width:100%;border:solid 0px;">
				<tr>
					<td>
						<div id="schedule_data" style="border:solid 1px;width:1200px;height:250px;overflow-y:scroll;"></div>
					</td>
				</tr>
			</table>
		</div>
	        <div>
                <?php require 'copy_right_file.php'; ?>
            </div>
			<?php
			include 'Popup_basic_account.php';?>
	</div>
	
</body>
</html>