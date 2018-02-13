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
	$today = date("Y-m-d", strtotime('today'));
	$today2 = date("l, d F, Y", strtotime('today'));
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
			<script src="js/jquery-1.8.3.js"></script>
		<script src="js/jquery-ui.js"></script>
		<link rel="stylesheet" type="text/css" media="screen" href="css/jquery-ui-1.8.2.custom.css" />
			<link rel="stylesheet" type="text/css" media="screen" href="css/ui.jqgrid.css" />
				<link rel="stylesheet" href="css/jquery-ui.css" />
			<script src="js/jquery-ui.js"></script>
		<link href="css/bg1.css" rel="stylesheet" type="text/css" />
		<link href="css/style_images.css" rel="stylesheet" type="text/css" />
		<script src="bs_js/highcharts_1.js"></script>
		<script src="bs_js/exporting.js"></script>
		<script src="js/moment.js" type="text/javascript"></script>
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
					var datepickerVal34='<?php echo $today ?>';
					var doc_start_time="",doc_end_time="";
		var page_source="webinar-class.php";
		var sub_menu_name="Webinar";
		currentdate = new Date();
		currentdocid="";
	
		var  submenu_with_menu=1;
								currentdate = moment(currentdate).format("YYYY-MM-DD HH:mm:ss");
								doc_start_time=	currentdate;
								
filename1 = "query/insert_submenu_log.php?uid="+uid+"&docid="+currentdocid+"&start_time="+doc_start_time+"&page_source="+page_source+"&submenu_with_menu="+submenu_with_menu+"&sub_menu_name="+sub_menu_name;
					//alert(filename1);					
										$.ajax({
										url: filename1,
										type: 'GET',
										dataType: 'html',
										success: function(data, textStatus, xhr) {
												
											},
										});
				//check graphic display
				$(".overlayModal").hide();
				 var content_name="animation";
				filename ="query/check_user_gif_display1.php?user_id="+uid+"&content_name="+content_name;
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
										
						$("#close_window").click(function(){

currentdate = new Date();
								currentdate = moment(currentdate).format("YYYY-MM-DD HH:mm:ss");
								doc_end_time=	currentdate;
								
filename = "query/update_submenu_log.php?uid="+uid+"&docid="+currentdocid+"&start_time="+doc_start_time+"&end_time="+doc_end_time+"&page_source="+page_source+"&submenu_with_menu="+submenu_with_menu+"&sub_menu_name="+sub_menu_name;
										
										$.ajax({
										url: filename,
										type: 'GET',
										dataType: 'html',
										success: function(data, textStatus, xhr) {
										url = "virtual-class.php";
                              
                                   location.href = url;
											//window.close();
											},
										});
});
			var filename = "";
				
				
				var batch_id="",subject_id="";
				var sub="";
				var subject="";
				var chart1bio;
			
				$(".hidepwd").hide();
				filename = "query/get_webinar_class.php?fac_id="+uid+"&datepickerVal34="+datepickerVal34;
				getContent(filename, "schedule_data");
					$("#submit_dwn").click(function(){
					var url = "download-gotomeeting-exe.php";
					//alert(url);
					var win=window.open(url, '_blank');
					win.focus();
				});
				$("#viewpwd").live('click',function(){
				idpwd="";
		idpwd = ($(this).closest('td').attr('id'));
		//alert(idpwd);
		 var valNew=idpwd.split('|');
		  $("#uname").html("");
		 $("#pwd").html("");
		 $("#uname").val(valNew[0]);
		 $("#pwd").val(valNew[1]);
		 $(".hidepwd").show();
		 filename = "query/insert-gotomeeting-username-pwd1.php?fac_id="+uid+"&uname="+valNew[0]+"&pwd="+valNew[1]+"&virtualid="+valNew[2];
					//alert(filename);	
					$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							
							success: function(data, textStatus, xhr) {
								//alert(data);
								if(data == "")
								{
									
								}
								else
								{
								
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
												filename1="query/Book_webinar_class.php?online_id2="+online_id2+"&uid="+uid;
												//alert(filename1);
												$.ajax({
													url: filename1,
													type: 'GET',
													dataType: 'html',
										
													success: function(data1, textStatus, xhr) {
													if(data1=="")
													{
													alert("Class Booked Successfully");
													filename = "query/get_webinar_class.php?fac_id="+uid+"&datepickerVal34="+datepickerVal34;
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
											filename1="query/insert_course_order_webinar.php?online_id2="+online_id2+"&uid="+uid;
											//alert(filename1);
		
			$.ajax({
					url: filename1,
					type: 'GET',
					dataType: 'html',
					
					success: function(data1, textStatus, xhr) {
					//alert(data1);
				if(data1 == 'Failed')
						{
							alert("Pls try after sometime");
							
						}
						else
						{
						var mySplitResult = data1.split("|");
							var order_id=mySplitResult[0];
							amt1=mySplitResult[1];
							fac_name=mySplitResult[2];
							 var referral_code="";
							 totalitem=1;
							url_reg="http://studyvita.com/datafrom_test.php?course_id="+online_id2+"&totalitem="+totalitem+"&uname="+fac_name+"&uid="+uid+"&totalamt="+amt1+"&order_id="+order_id+"&referral_code="+referral_code;
							//alert(url_reg);
							window.location.replace(url_reg);
						}
						},
						});
												/*var str=data;
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
												}*/
												
											}
										},
								});
					});

			
				$( "#datepicker34" ).datepicker({
					dateFormat: "yy-mm-dd",
					altField: "#alternate",
					altFormat: "DD, d MM, yy",
					onSelect: function() { 
						datepickerVal34 = $("#datepicker34").val();
						$("#schedule_data").html("");
						filename = "query/get_webinar_class.php?fac_id="+uid+"&datepickerVal34="+datepickerVal34;
				getContent(filename, "schedule_data");
					}
				});
				$("#search1").live('click',function(){
		online_id2="";
		online_id2 = ($(this).closest('tr').attr('id'));
		online_desktop="";
		online_desktop = ($(this).closest('td').attr('id'));
		os_type=$("#os_type").val();
		if(os_type=="")
		{
		alert("Please select OS");
		}
		else
		{
		
						
							if(os_type=="2" || os_type=="3" || os_type=="4")
							{
							if(online_id2=="")
								{
								alert("Url Empty.Try after sometime.");
								}
								else
								{
								
								var url=online_id2;
											//var url = "http://www8.hp.com/in/en/products/printers/index.html#!view=grid&page=1&facet=HP-ePrint";
											window.open(url, '_blank');
								}
							}
							else
							{
							if(online_desktop=="")
								{
								
								 if(online_id2=="")
								 {
								 alert("Url Empty.Try after sometime.");
								 }
								else
								{
								
								var url=online_id2;
											
											window.open(url, '_blank');
								}
								}
								else
								{
								var url=online_desktop;
											
											window.open(url, '_blank');
								}
							}
							
		}
		//var url1 ='http://www.google.com/images?q=' +online_id2;
		//var win=window.open(url1, '_blank');
		//win.focus();
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
		<div class='trable_bg' style='position: fixed;z-index: 2;padding-left:0px;color:yellow;border:solid 0px;width:100%;padding-bottom:0px'>
			<table style='width:100%' cellspacing="0">
				<tr>
					<td style='width:100%;'>
						<center><?php require 'adlp.php'; ?></center>
					</td>
				</tr>
				
			</table>
		</div><br/>
		<div style='background-color:#fff;width:100%'>
		<table style="padding-top:67px;border:solid 0px;width:100%;height:25px;">
		<!--<tr>
		<td><b>Welcome <?php echo "&nbsp;&nbsp;&nbsp;".$u5."&nbsp;&nbsp;!&nbsp;&nbsp;&nbsp;&nbsp;</b>";
		?>
		</td>
		</tr>-->
				<tr>
					<center><td style="border:solid 0px;background-color:#0f2541;width:98%;">
					<?php
												$result_c=mysql_query("SELECT c.name,u.name FROM course c,user u WHERE c.id='$course_id' and u.id=c.tutor_id");
												$row_c=mysql_fetch_array($result_c);
												$crname=$row_c[0]; 
												$tutorname=$row_c[1]; 
												$result_c1=mysql_query("SELECT name FROM subject WHERE id='$sub_id'");
												$row_c1=mysql_fetch_array($result_c1);
												$subname=$row_c1[0];
											echo "<label style='float:left;color:#ffffff;padding-left:5px;'><font face='verdana' size='2' color='white' ><b>Welcome &nbsp;&nbsp;&nbsp;".$u5."&nbsp;&nbsp;!&nbsp;&nbsp;&nbsp;&nbsp;".$tutorname.">".$crname.">".$subname.">"."Webinar Class<b></font></label>";
												
												
													//echo $crname.">".$subname.">"."Adaptive learning";
												
						?>
						
					</td><td style="width:2%" valign="right">
							<img src="images/close_image.png" id="close_window" height="25px" width="25" align="right">
							</td>
				</tr>
			</table><br/>
			<div id="main_div" class="main_div" style="width: 80%;height:auto;">
						<br/>
						
							<table style='width:100%;' cellspacing="10" class="batchview">
							
								<tr>
								<td style='width:10%;'>
										<label>Select Date</label>
									</td>
									<td style='width:20%;'>
										<input type="text" id="datepicker34" value="<?php echo $today ?>" />
									</td>
										<td style='width:70%;'>
										<!--<label>Note:If you are using webinar platform for first time, download webinar engine.<input type='BUTTON' id='submit_dwn' name='submit_dwn' class='defaultbutton' value = 'Download Now'/></label>-->
									</td>
								</tr>
								
								</table><br/>
							<p style="padding-left:10px;">&nbsp;Select  OS
								<select  id='os_type' name="os_type" class='inputs'>
							<option value=''>Select OS</option>
						<option value='1'>Windows</option>
						<option value='2'>Android</option>
						<option value='3'>Ios</option>
						<option value='4'>Mac</option>
							</select></p><br/>	
					</div>
					<table style='width:100%;' cellspacing="10" class="hidepwd" >
							
								<tr>
								<td style='width:40%;'>
								</td>
								<td style='width:60%;'>
										<label>User name</label>&nbsp;
										<input type="text" id="uname" name="uname" size="37" />&nbsp;
											<label>Password</label>&nbsp;
										<input type="text" id="pwd" name="pwd" size="37" />
									</td>
									
									
								</tr>
								
								</table>
					<center><div id="schedule_data" style="border:solid 1px;width:98%;height:250px;overflow-y:scroll;"></div></center>
				</div>
		</div>
	        <div>
                <?php require 'copy_right_file.php'; ?>
            </div>
			<?php
			include 'Popup_basic_account.php';?>
	</div>
	<br/>
		<div><?php require 'footer.php'; ?></div>
</body>
</html>