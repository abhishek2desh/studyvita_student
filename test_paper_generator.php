<?php
	include 'config.php';
	session_start();
	
	$course_id=$_SESSION['course_id'];
	$batch_id=$_SESSION['batch_id'];
	$subject_id=$_SESSION['subject_id'];
	$s1=$_SESSION['studid1'];
	$s5=$_SESSION['sid'];
	$s3=$_SESSION['grp1'];
	$u5 = $_SESSION['uname'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="shortcut icon" href="images/Edutechheader.ico" />
		<meta name="keywords" content="edutechindiaonline">
		<meta name="description" content="edutechindiaonline">
		<title>Welcome <?php echo $u5 ?></title>
		<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
		<link href="css/bg1.css" rel="stylesheet" type="text/css" />
		<link href="css/style_images.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="js/flexpaper.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers_debug.js"> </script>
		<link type="text/css" rel="stylesheet" href="css/style_image_demo.css" />
		<link href="menu/menu.css" rel="stylesheet" type="text/css" />
	<script src="js/moment.js" type="text/javascript"></script>
		<style>
			
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
			@import url(http://fonts.googleapis.com/css?family=Raleway:400,700);
			body {
				background: white url(images/1212.jpg) no-repeat center top;
				-webkit-background-size: cover;
				-moz-background-size: cover;
				background-size: cover;
			}
			.container > header h1,
			.container > header h2 {
				color: #fff;
				text-shadow: 0 1px 1px rgba(0,0,0,0.7);
			}
			#mainselection34 select {
			   border: 0;
			   color: #757575;
			   background: transparent;
			   font-size: 14px;
			   padding: 7px 10px;
			   width: 278px;
			   *width: 350px;
			   *background: #58B14C;
			   -webkit-appearance: none;
			}

			#mainselection34 {
			   overflow:hidden;
			   width:250px;
			   -moz-border-radius: 9px 9px 9px 9px;
			   -webkit-border-radius: 9px 9px 9px 9px;
			   border-radius: 9px 9px 9px 9px;
			   box-shadow: 1px 1px 11px rgba(0, 0, 0, 0);
			   background: white url("http://i62.tinypic.com/15xvbd5.png") no-repeat scroll 219px center;
			}
			.style-7::-webkit-scrollbar-track
		{
			-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0);
			border-radius: 10px;
		}
		.style-7::-webkit-scrollbar
		{
			width: 4px;
		}
		.style-7::-webkit-scrollbar-thumb
		{
			border-radius: 1px;
			background-image: -webkit-gradient(linear,
			   left bottom,
			   left top,
			   color-stop(0.44, #607D8B),
			   color-stop(0.72, #607D8B),
			   color-stop(0.86, #607D8B));
		}
		 .scrollbar_div
		{
			margin-left: 0px;
			float: left;
			height: 200px;
			width: 100%;
			
			overflow-y: scroll;
			margin-bottom: 0px;
		}
			/*
		 *  STYLE 7
		 */

		#style-7::-webkit-scrollbar-track
		{
			-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0);
			background-color: #34495E;
			border-radius: 10px;
		}
		#style-7::-webkit-scrollbar
		{
			width: 10px;
			background-color: #34495E;
		}

		#style-7::-webkit-scrollbar-thumb
		{
			border-radius: 1px;
			background-image: -webkit-gradient(linear,
			   left bottom,
			   left top,
			   color-stop(0.44, #FFFFFF),
			   color-stop(0.72, #FFFFFf),
			   color-stop(0.86, #FFFFFF));
		}
		#footer
			{
			clear: both;
			position: relative;
			z-index: 10;
			
			}
		</style>
		<script>
			$(document).ready(function(){
			//alert("l");
				var cp_value12="",sel_time="";
				var totaltest_remain=0;
						var uid='<?php echo $s5; ?>';
						var course_id='<?php echo $course_id; ?>';
						var batch_id='<?php echo $batch_id; ?>';
						$("#topper").hide();
						$("#hid_div").hide();
						 $("#mcqcnt").hide();
							$(".stdiv").hide();
						$(".main_div2").hide();
						$(".loading-gif").hide();
						$("#footer_div").hide();
						var doc_start_time="",doc_end_time="";
		var page_source="test_paper_generator.php";
		currentdate = new Date();
		currentdocid="";
		//alert("l");
		var  submenu_with_menu=0;
								currentdate = moment(currentdate).format("YYYY-MM-DD HH:mm:ss");
								doc_start_time=	currentdate;
								//alert(doc_start_time);
filename1 = "query/insert_menu_log.php?uid="+uid+"&docid="+currentdocid+"&start_time="+doc_start_time+"&page_source="+page_source+"&submenu_with_menu="+submenu_with_menu;
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
								
filename = "query/update_menu_log.php?uid="+uid+"&docid="+currentdocid+"&start_time="+doc_start_time+"&end_time="+doc_end_time+"&page_source="+page_source+"&submenu_with_menu="+submenu_with_menu;
										
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

						var testtype="adaptive";
						filename = "query/check-demo-condition-start.php?course_id="+course_id+"&batch_id="+batch_id+"&uid="+uid+"&testtype="+testtype;
						//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							//alert(data);
							if(data == 'success')
							{
							
							}
							else
							{
							alert(data);
							}
					},
				});
				filename1 = "query/check-course-class.php?course_id="+course_id;
						//alert(filename);
					$.ajax({
						url: filename1,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							//alert(data);
							if(data == '1')
							{
							//alert("in if");
						$(".stdiv").hide();
						$(".main_div2").show();
						$(".loading-gif").show();
						filename = "test_paper_generator/chape2.php";
				//alert(filename);
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					
					success: function(data, textStatus, xhr) {
						$(".loading-gif").hide();
						var strtemp = "$('#cpt').html(data)";
						eval(strtemp);
						$("#footer_div").show();
						//alert(data);
					},
				});
							}
							else
							{
							//alert("in else");
							$(".stdiv").show();
						$(".main_div2").hide();
						filename2 = "query/get_course_std.php?crs_id="+course_id;
						 getContent(filename2, "sel_std");
							}
					},
				});
				$("#sel_std").change(function() {
				std_id= $("#sel_std").val();
				$(".loading-gif").show();
				$(".main_div2").show();
				//$("#cpt").hide();
				//$("#cpt").html("");
						filename = "test_paper_generator/chape2_std.php?std_id="+std_id;
				//alert(filename);
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					
					success: function(data, textStatus, xhr) {
						$(".loading-gif").hide();
						var strtemp = "$('#cpt').html(data)";
						eval(strtemp);
						$("#footer_div").show();
						//alert(data);
					},
				});
				});
				$("#start_test").attr('disabled',true);
				filename2 = "query/get_total_question.php?crs_id="+course_id;
				//alert(filename2);
			 $.ajax({
						url: filename2,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
						//alert(data)
						 $('#mcqcnt').text(data);
						  $("#mcqcnt").show();
						 $("#hide_result").hide();
											},
					});

				//$("#start_test").hide();
				
				$('#cpt').click(function(){
					$("#cpt input:radio:checked").each(function() {
							idArray3=this.value;
					});
					cp_value12 = idArray3;
						if(cp_value12=="")
					{
					}
					else
					{
					$("#hid_div").show();
					}
					//alert(cp_value12);
					/*$("#topper").html("");
					filename = "test_paper_generator/gettopper_average.php?batch_id="+batch_id+"&chap_id="+cp_value12;
					//alert(filename);
					$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					
					success: function(data, textStatus, xhr) {
						
						var strtemp = "$('#topper').html(data)";
						eval(strtemp);
						//alert(data);
					},
				});*/
					
				});
				$('#sel_time').change(function(){
					if(cp_value12 == "")
					{
						alert("select chapter first");
					}
					else
					{
						sel_time=$('#sel_time').val();
						$("#start_test").attr('disabled',false);
						//$("#start_test").show();
					}
				});
					$('#btn_no').click(function(){
					//for checking account type
						testtype="adaptive";
							filename1 = "query/check-accounttype-adaptive1.php?course_id="+course_id+"&batch_id="+batch_id+"&uid="+uid+"&testtype="+testtype;
								$.ajax({
								url: filename1,
								type: 'GET',
								dataType: 'html',
						
								success: function(data, textStatus, xhr) {
								if(data == 'success')
								{
								$("#Democourse_instruction").fadeOut("normal");
							$("#shadow").fadeOut();
									var random_generate="";
									random_generate=0;
									url="online test 3.php?chap_id="+cp_value12+"&sel_time="+sel_time+"&req_que="+req_que+"&random_generate="+random_generate;
									document.location.href=url;
								}
								else
								{
										alert(data);
								$("#Democourse_instruction").fadeOut("normal");
							$("#shadow").fadeOut();
								}
								},
								});
				
					
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
														 if(mySplitResult[1]=="www.coreacademics.in" || mySplitResult[1]=="coreacademics.in")
											{
											url_reg="http://www.coreacademics.in/pricing/datafrom_test.php?course_id="+course_id+"&totalitem="+totalitem+"&uname="+reg_uname+"&uid="+uid+"&totalamt="+reg_fees+"&order_id="+order_id+"&referral_code="+referral_code;
											}
											else
											{
											url_reg="http://"+mySplitResult[1]+"/datafrom_test.php?course_id="+course_id+"&totalitem="+totalitem+"&uname="+reg_uname+"&uid="+uid+"&totalamt="+reg_fees+"&order_id="+order_id+"&referral_code="+referral_code;
											}
														
													
														window.location.replace(url_reg);
													}
												},
										});
											}
											else
											{
											//alert("ok");
											}
											
										},
								});
					});
				$('#start_test').click(function(){
					req_que=$('#required_que').val();
					//alert(req_que);
					if(req_que==0 || req_que=="")
					{
					alert("Select Required number of Questions");
					}
					else
					{
						/*filename = "query/check-demo-adaptive.php?course_id="+course_id+"&batch_id="+batch_id+"&uid="+uid;
						//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							//alert(data);
							if(data == 'success')
							{*/
							//for checking account type
							var testtype="";
							testtype="adaptive";
							filename1 = "query/check-accounttype-adaptive.php?course_id="+course_id+"&batch_id="+batch_id+"&uid="+uid+"&testtype="+testtype;
								$.ajax({
								url: filename1,
								type: 'GET',
								dataType: 'html',
					
								success: function(data, textStatus, xhr) {
										
								if(data == 'success')
								{
								//check special campaign course
											var testtype="adaptive";
					filename = "query/check-special-camp-course-condition.php?course_id="+course_id+"&batch_id="+batch_id+"&uid="+uid+"&testtype="+testtype;
						
						//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {

							if(data == 'success')
							{
								var random_generate="";
									random_generate=0;
									url="online test 3.php?chap_id="+cp_value12+"&sel_time="+sel_time+"&req_que="+req_que+"&random_generate="+random_generate;
									document.location.href=url;
							}
							else
							{
								alert(data);
							}
							},
							});
											// end check special campaign course
									
								}
								else
								{
										var mySplitResultd = data.split("|");
									
										if(mySplitResultd[0] == 'success')
										{
											if(mySplitResultd[1]=="")
											{
											//check special campaign course
											var testtype="adaptive";
					filename = "query/check-special-camp-course-condition.php?course_id="+course_id+"&batch_id="+batch_id+"&uid="+uid+"&testtype="+testtype;
						
						//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {

							if(data == 'success')
							{
								var random_generate="";
									random_generate=0;
									url="online test 3.php?chap_id="+cp_value12+"&sel_time="+sel_time+"&req_que="+req_que+"&random_generate="+random_generate;
									document.location.href=url;
							}
							else
							{
								alert(data);
							}
							},
							});
											// end check special campaign course
											
											}
											else
											{
												totaltest_remain=mySplitResultd[1];
												if(mySplitResultd[1]<=1)
												{
												
												var labeldata="Your's is basic account.You can access this feature "+mySplitResultd[1]+" times more only.Upgrade to premium account to get unlimted access";
												$("#demolabel").html(labeldata);
												$("#Democourse_instruction").fadeIn("normal");
												$("#shadow").fadeIn();
												}
												else
												{
											//check special campaign course
											var testtype="adaptive";
					filename = "query/check-special-camp-course-condition.php?course_id="+course_id+"&batch_id="+batch_id+"&uid="+uid+"&testtype="+testtype;
						
						//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {

							if(data == 'success')
							{
								var random_generate="";
									random_generate=0;
									url="online test 3.php?chap_id="+cp_value12+"&sel_time="+sel_time+"&req_que="+req_que+"&random_generate="+random_generate;
									document.location.href=url;
							}
							else
							{
								alert(data);
							}
							},
							});
											// end check special campaign course
												}

											}
										}
										else
										{
											
												var labeldata="Your's is basic account.You can access this feature "+mySplitResultd[1]+" times more only.Upgrade to premium account to get unlimted access";
											$("#demolabel").html(labeldata);
											$("#Democourse_instruction").fadeIn("normal");
											$("#shadow").fadeIn();
										}
										
							
								
								}
								},
								});
							//end checking account type
						
							/*}
							else
							{
							alert(data);
							}
					},
				});*/
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

		<div class="container_main">
		<div class='trable_bg' style='position: fixed;z-index: 2;padding-left:0px;color:yellow;border:solid 0px;width:100%'>
			<table style='width:100%' cellspacing="0">
				<tr>
					<td style='width:100%;'>
						<center><?php require 'adlp.php'; ?></center>
					</td>
				</tr>
				
			</table>
		</div>
		<div style='width:100%;height:auto;background:white;'>
			<table style="padding-top:90px;border:solid 0px;width:100%;height:25px;">
			
					<center><td style="border:solid 0px;width:98%;background-color:#0f2541;">
					<?php
												$result_c=mysql_query("SELECT c.name,u.name FROM course c,user u WHERE c.id='$course_id' and u.id=c.tutor_id");
												$row_c=mysql_fetch_array($result_c);
												$crname=$row_c[0]; 
												$tutorname=$row_c[1]; 
												
												
												$result_c1=mysql_query("SELECT name FROM subject WHERE id='$subject_id'");
												$row_c1=mysql_fetch_array($result_c1);
												$subname=$row_c1[0];
												echo "<label style='float:left;color:#ffffff;'><font face='verdana' size='3' color='white' ><b>Welcome &nbsp;&nbsp;&nbsp;".$u5."&nbsp;&nbsp;!&nbsp;&nbsp;&nbsp;&nbsp;".$tutorname.">".$crname.">".$subname.">"."Adaptive learning</b></font></label>";
													//echo $crname.">".$subname.">"."Adaptive learning";
												
						?>
						
					</td></center>
					<td style="width:2%" valign="right">
							<img src="images/close_image.png" id="close_window" height="25px" width="25" align="right">
							</td>
				</tr>
			</table>
			</div>
			<?php include 'test_paper_generator2.php'; ?>  
<div><?php require 'footer.php'; ?></div>			
			<?php
			include 'Popup_basic_account.php';?>
		
		</div>​
			
		
    </body>
</html>