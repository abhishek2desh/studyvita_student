<?php
	include 'config.php';
	//include 'lock.php';
	//$domainname = $_SESSION['domainname'];
	session_start();
	$ct=$_GET['ct'];
	if($ct == 1)
	{
		$s5=$_GET['id'];
		$u5 = $_GET['name'];
		$domainname = $_GET['domainname'];
		$_SESSION['domain_name']=$domainname;
		//$domainname = $_SESSION['domainname'];
		$_SESSION['sid']=$s5;
		$_SESSION['uname']=$u5;
	}
	else
	{
		$s5=$_SESSION['sid'];
		$u5=$_SESSION['uname'];
		//$domainname = $_SESSION['domainname'];
	};
	
?>
<!DOCTYPE html>
<html lang="en">
    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="shortcut icon" href="images/Edutechheader.ico" />
		<meta name="keywords" content="edutechindiaonline">
		<meta name="description" content="edutechindiaonline">
		<title>Welcome <?php echo $u5 ?></title>
		<!--<link rel="stylesheet" href="admin_upload.html" type="text/css" media="screen" />-->
		<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
		<link href="css/bg1.css" rel="stylesheet" type="text/css" />
		<link href="css/style_images.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="js/flexpaper.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers_debug.js"> </script>
		<link href="css/button_style.css" rel="stylesheet" type="text/css"/>
		<link href="menu/menu.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="css/style_login.css" />
		<script src="js/modernizr.custom.63321_login.js"></script>
		<style>	
			@import url(http://fonts.googleapis.com/css?family=Raleway:400,700);
			body {
				background: #7f9b4e url(images/bg2.jpg) no-repeat center top;
				-webkit-background-size: cover;
				-moz-background-size: cover;
				background-size: cover;
			}
			.main_div { 
				height: auto;
				width: auto;
				background-color: white; 
				/* outer shadows  (note the rgba is red, green, blue, alpha) */
				-webkit-box-shadow: 0px 0px 12px rgba(0, 0, 0, 0.4); 
				-moz-box-shadow: 0px 1px 6px rgba(23, 69, 88, .5);
				/* rounded corners */
				-webkit-border-radius: 5px;
				-moz-border-radius: 5px; 
				border-radius: 5px;
				/* gradients */
				background: -webkit-gradient(linear, left top, left bottom, 
				color-stop(0%, white), color-stop(15%, white), color-stop(100%, #D7E9F5)); 
				background: -moz-linear-gradient(top, white 0%, white 55%, #D5E4F3 130%); 
				}
				inputs:-webkit-input-placeholder { 
				color:    #b5b5b5; 
			}
			.inputs  {
			 width:200px; 
			padding: 7px 8px; 
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
			@import url(http://fonts.googleapis.com/css?family=Roboto:400,500);

			.button-demo { /*general styling for all buttons*/
			  font-family: "Roboto";
			  color: #244549;
			  position: relative;
			  background: white;
			  cursor: pointer;
			  overflow: hidden;
			  text-align: center;
			  -webkit-box-shadow: 0px 9px 10px 1px rgba(0,0,0,0.15);
			  box-shadow: 0px 9px 10px 1px rgba(0,0,0,0.15);
			  text-shadow: none;
			  -webkit-transition: all .3s ease-out;
			  transition: all .3s ease-out;
			}

			.button-demo.hovered { /*makes it 'elevate'*/
			  -webkit-transform: scale(1.05) !important;
			  -ms-transform: scale(1.05) !important;
			  transform: scale(1.05) !important;
			}

			.ripple { /*stylings for the circular overlay*/
			  position: absolute;
			  border-radius: 100%;
			  width: 0;
			  height: 0;
			  background: rgba(3,169,244, 0.17);
			  -webkit-transition: all .3s ease-out;
			  transition: all .3s ease-out;
			}

			.notransition { /*used to reset the ripple without an animatiion*/
			  -webkit-transition: none !important;
			  transition: none !important;
			}

			/*just the button stylings*/


			.button-demo.big {
			  position: absolute;
			  padding: 10px;
			  width: 65px;
			  margin-top: 10px;
			  margin-left: 115px;
			}
			.button-demo.small_lg {
			  position: absolute;
			  padding: 10px;
			  width: 65px;
			  margin-top: 00px;
			  right: 10px;
			}
			.button-demo.small {
			  position: absolute;
			  padding: 10px;
			  width: 65px;
			  margin-top: 10px;
			  margin-left: 10px;
			}

			.button-demo.medium {
			  position: absolute;
			  padding: 10px;
			  font-size: 24px;
			  margin-top: 50px;
			  margin-left: 200px;
			}
			
			.mainselection_course select {
				
				opacity: 0.5;
				color:black;
			   border: 0;
			   font-size: 14px;
			   padding: 7px 10px;
			   width: 278px;
			   *width: 350px;
			   *background: #58B14C;
			   -webkit-appearance: none;
			}
			.mainselection_course {
			   overflow:hidden;
			   width:278px;
			   color:black;
			   background-color: #fff;
				opacity: 0.5;	
			   -moz-border-radius: 0px 0px 0px 0px;
			   -webkit-border-radius: 0px 0px 0px 0px;
			   border-radius: 0px 0px 0px 0px;
			   box-shadow: 1px 1px 11px rgba(0, 0, 0, 0);
			   background: white url("http://i62.tinypic.com/15xvbd5.png") no-repeat scroll 247px center;
			}
		</style>
		<script>
			$(document).ready( function (){
				var domainname1='<?php echo $domainname; ?>';
			//alert(domainname1);
			  //appends the overlay to each button
				$(".button-demo").each( function(){
				   var $this = $(this);
				$this.append("<div class='ripple'></div>");
				});
			  
				
				$(".button-demo").click(function(e){
				  var $clicked = $(this);
				  
				  //gets the clicked coordinates
				  var offset = $clicked.offset();
				  var relativeX = (e.pageX - offset.left);
				  var relativeY = (e.pageY - offset.top);
				  var width = $clicked.width();
				  
				  
				  var $ripple = $clicked.find('.ripple');
				  
				  //puts the ripple in the clicked coordinates without animation
				  $ripple.addClass("notransition");
				  $ripple.css({"top" : relativeY, "left": relativeX});
				  $ripple[0].offsetHeight;
				  $ripple.removeClass("notransition");
				  
				  //animates the button and the ripple
				  $clicked.addClass("hovered");
				  $ripple.css({ "width": width * 2, "height": width*2, "margin-left": -width, "margin-top": -width });
				  
				  setTimeout(function(){
					  //resets the overlay and button
					  $ripple.addClass("notransition");
					  $ripple.attr("style", "");
					  $ripple[0].offsetHeight;
					  $clicked.removeClass("hovered");
					$ripple.removeClass("notransition");
				  }, 300 );
				});
			});         
			</script>
		<script>
			$(document).ready(function(){
				//alert("sdfd");
					var domainname1='<?php echo $domainname; ?>';
				var uri = window.location.toString();
				if (uri.indexOf("?") > 0) {
					var clean_uri = uri.substring(0, uri.indexOf("?"));
					window.history.replaceState({}, document.title, clean_uri);
				}
				var uid='<?php echo $s5; ?>';
				//alert(uid);
				var course_id="",mat_id="",tutor_id="",sub_id="",chap_id="",subid="",btid="",batch_id="";
				var bt1="",sb1="",mt1="",search_text_tution="";
				$("#doc34").hide();
				$(".bg_div_class").hide();
				$("#1tablt").hide();
				$("#reg_show").hide();
				$("#2tablt").hide();
				$(".bg_div_class_hide").hide();
				filename = "test_paper_generator/view_first_page.php?uid="+uid;
				//alert(filename);
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					success: function(data, textStatus, xhr) {
						//alert(data);
						var mySplitResult = data.split("-");
						uvl=mySplitResult[0];
						course_id=mySplitResult[1];
						course_count=mySplitResult[2];
						course_name=mySplitResult[3];
						if(uvl == "failed")
						{
							$("#1tablt").show();
							$("#2tablt").hide();
							$("#reg_show").show();
							$(".bg_div_class").hide();
							$(".bg_div_class_hide").show();
						}
						else if(uvl == "1")
						{
							$("#1tablt").hide();
							$("#2tablt").show();
							$("#course_id2").show();
							$("#course_id").hide();
							$("#reg_show").show();
							$("#course_id2").html(course_name);
							$(".bg_div_class").show();
							$(".bg_div_class_hide").show();
							tp=1;
							filename = "test_paper_generator/view_batch_course_subject.php?course_id="+course_id+"&tp="+tp+"&uid="+uid+"&batch_id="+batch_id;
							//alert(filename);
							getContent(filename, "batch_id");
						}
						else if(uvl == "2")
						{
							$("#1tablt").hide();
							$("#2tablt").show();
							$("#course_id2").hide();
							$("#course_id").show();
							$(".bg_div_class").show();
							$(".bg_div_class_hide").show();
							$("#reg_show").show();
						}
					},
				});
				/*$("#join_new_course").click(function(){
					$(".bg_div_class").hide();
					$(".bg_div_class_hide").show();
				});*/
				$("#course_id").change(function(){
					tp=1;
					course_id=$("#course_id").val();
					filename = "test_paper_generator/view_batch_course_subject.php?course_id="+course_id+"&tp="+tp+"&uid="+uid+"&batch_id="+batch_id;
					//alert(filename);
					getContent(filename, "batch_id");
				});
				$("#batch_id").change(function(){
					tp=2;
					batch_id=$("#batch_id").val();
					filename = "test_paper_generator/view_batch_course_subject.php?course_id="+course_id+"&tp="+tp+"&uid="+uid+"&batch_id="+batch_id;
					//alert(domainname1);
					getContent(filename, "subject_id");
				});  
				$("#course_id_dm").change(function(){
					tp=10;
					course_id=$("#course_id_dm").val();
					filename = "test_paper_generator/view_batch_course_subject.php?course_id="+course_id+"&tp="+tp+"&uid="+uid+"&batch_id="+batch_id;
					//alert(filename);
					getContent(filename, "batch_id_dm");
				});
				$("#batch_id_dm").change(function(){
					tp=2;
					batch_id=$("#batch_id_dm").val();
					filename = "test_paper_generator/view_batch_course_subject.php?course_id="+course_id+"&tp="+tp+"&uid="+uid+"&batch_id="+batch_id;
					//alert(filename);
					getContent(filename, "subject_id_dm");
				});
				function DoPost(){
				  $.post("student_course_page.php", 
					{ course_id: course_id, batch_id: batch_id, subject_id: subject_id, vl: '1'}
					).done(function(res)   {window.location="student_course_page.php"});
				}
				$("#subject_id_dm").change(function(){
					tp=3;
					subject_id=$("#subject_id_dm").val();
					"menu/testmenu.php?course_id="+course_id+"&batch_id="+batch_id+"&subject_id="+subject_id;
					url="student_course_page.php?course_id="+course_id+"&batch_id="+batch_id+"&subject_id="+subject_id+"&domainname="+domainname1+"&vl=1";
					//location.href=url.substr(0, input.lastIndexOf('?')) || url;
					//alert(url);
					location.href=url;
				});
				$("#subject_id").change(function(){
					tp=3;
					subject_id=$("#subject_id").val();
					//alert(domainname1);
					"menu/testmenu.php?course_id="+course_id+"&batch_id="+batch_id+"&subject_id="+subject_id;
					url="student_course_page.php?course_id="+course_id+"&batch_id="+batch_id+"&subject_id="+subject_id+"&domainname="+domainname1+"&vl=1";
					//location.href=url.substr(0, input.lastIndexOf('?')) || url;
					//alert(url);
					location.href=url;
				});
				$("#course_reg").live('click',function(){
					$('body').scrollTop(0);
					var bal=($(this).closest('tr').attr('id'));
					//alert(bal);
					var mySplitResult = bal.split("-");
						cname=mySplitResult[0];
						cfees=mySplitResult[1];
						cduration=mySplitResult[2];
						ctutor_id=mySplitResult[3];
						cid=mySplitResult[4];
						//alert(cid)
						$("#shadow").fadeIn("normal");
						$("#reg_batch_dis1").fadeIn("normal");
						filename = "query/courses_batch_define1.php?cid="+cid;
						//alert(filename);
						getContent(filename, "course_batch");
				});
				$("#cancel_hide_bt").click(function(){
					$("#reg_batch_dis1").fadeOut("normal");
					$("#shadow").fadeOut();
				});
				$("#cancel_hide_bt2").click(function(){
					$("#reg_batch_dis1").fadeOut("normal");
					$("#shadow").fadeOut();
				});
				filename = "query/search_course.php?search_text_tution="+search_text_tution;
				//alert(filename);
				getContent(filename, "sesarch_tution");
				$("#search1").click(function(){
					search_text_tution=$("#search_text_tution").val();
					filename = "query/search_course.php?search_text_tution="+search_text_tution;
					//alert(filename);
					getContent(filename, "sesarch_tution");
				 });
				 $('#course_batch').click(function(){
					$("#course_batch input:radio:checked").each(function() {
						idArray34=this.id;
					});
					batch_val=idArray34;
				});
				$('#submit').click(function(){
					filename = "query/insert_course_registred1.php?batch_val="+batch_val+"&cid="+cid+"&uid="+uid;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							//alert(data);
							if(data == 'success')
							{
								alert("Thank you for registering with us. Your course will be activated shortly!");
								$("#shadow").fadeOut("normal");
								$("#reg_batch_dis1").fadeOut("normal");
								location.reload();
							}
							else if(data == "already")
							{
								alert("You are already join this batch, please join other batch.");
							}
							else
							{
								alert("Something Went Wrong.");
								$("#shadow").fadeOut("normal");
								$("#reg_batch_dis1").fadeOut("normal");
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
		<?php
		include 'send_mail_login.php';
	?>
	<div style='width:100%'>
		<div  style='padding-left:5px;color:yellow;border:solid 0px;width:100%'>
			<table style='width:100%'>
				<tr>
					<td style='width:100%;'>
						<center><?php require 'adlp.php'; ?></center>
					</td>
				</tr>
			</table>
		</div>
		<div id="all_new_id" >
			<div style='width:100%;height:40px;border:solid 0px;'>
				<a href="logout.php"><div class="button-demo small_lg">Log-Out</div></a>
			</div>
			<div style='width:100%;height:250px;border:solid 0px;'>
				<center>
					<!--<a href="logout.php"><section><div class="button raised"><div class="center" fit>Log-out</div><paper-ripple fit></paper-ripple></div></section></a>-->
					<div  style='width:70%;height:220px;border:solid 0px;'>
						<table id="1tablt"  style='border:solid 1px;width:100%;height:200px;'>
							<tr>
								<td style='width:40%;'>
									<center><label style='color:black;font-family:Century Gothic;font-family:20px;'><b>Course</b></label></center>
								</td>
								<td style='width:60%;'>
									<select id='course_id_dm' class="black" style='width:70%;'>
										<?php
											$result=mysql_query("SELECT DISTINCT c.id,c.name,c.tutor_id,u.name FROM course c,USER u WHERE c.tutor_id=u.id AND c.demo='1'");
											
											$rw = mysql_num_rows($result);
											echo "<option value='0'>Select Course</option>";
											if($rw == 0)
											{
												echo "<option value='0'>No Data Available.</option>";
											}
											else
											{
												while($row=mysql_fetch_array($result))
												{
													echo "<option value=$row[0]>$row[1]</option>";
												}
											}
										?>
									</select>
								</td>
							</tr>
							<tr>
								<td style='width:40%;'>
									<center><label style='color:black;font-family:Century Gothic;font-family:20px;'><b>Batch</b></label></center>
								</td>
								<td style='width:60%;'>
									<select id='batch_id_dm' class="black" style='width:70%;'></select>
								</td>
							</tr>
							<tr>
								<td style='width:40%;'>
									<center><label  style='color:black;font-family:Century Gothic;font-family:20px;'><b>Subject</b></label></center>
								</td>
								<td style='width:60%;'>
									<select id='subject_id_dm' class="black" style='width:70%;'>
									</select>
								</td>
							</tr>
							<tr>
								<td style='width:40%;'>
								
								</td>
								<td style='width:60%;'>
								<div class="form-4">
								<input type="submit1" name="submit1" value="Continue" id='log-submit1'>
								</div>
								</td>
							</tr>
						</table>
						<table id="2tablt"  style='border:solid 0px;width:100%;height:200px;'>
							<tr>
								<td style='width:40%;'>
									<!--<center><label id='lb_course_id' style='color:black;font-family:Century Gothic;font-family:20px;'><b>Course</b></label></center>-->
								</td>
								<td style='width:60%;'>
									<label id='course_id2'></label>
									<div class="mainselection_course">
									  <select id="course_id">
										<?php
											$result=mysql_query("SELECT DISTINCT c.id,c.name,c.tutor_id,u.name 
											FROM student_registered_course str,course c,USER u WHERE str.course_id=c.id AND c.tutor_id=u.id AND str.user_id='$s5' and str.status=1");
											
											$rw = mysql_num_rows($result);
											echo "<option value='0'>Select Course</option>";
											if($rw == 0)
											{
												echo "<option value='0'>No Data Available.</option>";
											}
											else
											{
												while($row=mysql_fetch_array($result))
												{
													echo "<option value=$row[0]>$row[1]</option>";
												}
											}
										?>
									  </select>
									</div>
								</td>
							</tr>
							<tr>
								<td style='width:40%;'>
									<!--<center><label id='lb_batch_id' style='color:black;font-family:Century Gothic;font-family:20px;'><b>Batch</b></label></center>-->
								</td>
								<td style='width:60%;'>
									<div class="mainselection_course"><select id='batch_id'></select></div>
								</td>
							</tr>
							<tr>
								<td style='width:40%;'>
									<!--<center><label id='lb_subject_id' style='color:black;font-family:Century Gothic;font-family:20px;'><b>Subject</b></label></center>-->
								</td>
								<td style='width:60%;'>
									<div class="mainselection_course"><select id='subject_id'></select></div>
								
								</td>
							</tr>
							
						</table>
						
						<!--<table class='main_div' style='border:solid 1px;width:100%;height:30px;'>
							<tr>
								<td>
									<center><input type='Button' value='Join New Course Click Here' id='join_new_course'></center>
								</td>
							</tr>
						</table>-->
				</div></center>
			</div>
			<table style='border:solid 0px;width:100%'>
						<tr>
								
								<td >
								<div class="form-4">
								<input type="submit" name="submit" value="Continue" id='log-submit'>
								</div>
								</td>
							</tr>
						</table>
						<br/>
			<center><div id='reg_show' style='width:80%;height:560px;border:solid 0px;'>
				<center><div style='padding-top:0px;background: #353535;width:70%;height:200px;border:solid 0px;'>
					<table style='border:solid 0px;width:100%;height:30px;'>
						<tr>
							<td style='width:95%;'>
								<center><label style='color:white;'>Register For New Course</label></center>
							</td>
							<td style='width:5%;'>
								<!--<center><img src="images/close_image.png" id='cancel_hide_bt2' height="20px" width="25"></center>-->
							</td>
						</tr>
					</table>
					<table style='background: #ccc;border:solid 0px;width:100%;height:auto;'>
						<tr>
							<td style='width:30%;'>
								<label style='color:black;font-size:18px;'>Search Courses</label></td><td style='width:30%'>
								<input type='text' id='search_text_tution' placeholder='Search Courses' class='inputs' /></td><td style='width:30%'>
								<img id='search1' src="images/Search.png" width='50px' height='50px'/>
							</td>
						</tr>
					</table>
					<table style='background: #353535;border:solid 0px;width:100%;height:auto;'>
						<tr>
							<td style='width:100%;'>
								<div id="sesarch_tution" style="background: #353535;border:0px solid;width:100%;height:210px;overflow-y: scroll;">
									
								</div>
							</td>
						</tr>
					</table>
				</div></center>
			</div></center>
		</div>
		<!--<div id="otp_get">
			<input type='text' id='otp_text' placeholder='Enter OTP' />
		</div>-->
		<div id="reg_batch_dis1">
			<div class="err" id="add_err"></div>
			<form action="" style="width:100%;">
				<table class='main_div' style="background-color:#0174DF;border:2px solid;width:100%;height:40px">
					<tr>
						<td style='width:95%;'>
							<center><strong><label style="color:Black">Join New Batch</label></strong></center>
						</td>
						<td style='width:5%;'>
							<center><img src="images/close_image.png" id='cancel_hide_bt' height="20px" width="25"></center>
						</td>
					</tr>
				</table>
				<div id='registered_dt' class='main_div' style="background-color:#0174DF;border:2px solid;width:98%;height:auto">
					<div style="border-radius: 5px;background-color:#3366FF;padding-left:15px;width:666px;height:23px;">
						<table style='width:100%;'><tr>
							<td style='width:5%;border:solid 0px;'></td>
							<td style='font-weight:bold;width:20%;border:solid 0px;'>Name</td>
							<td style='font-weight:bold;border:solid 0px;width:15%;'>Type</td>
							<td style='font-weight:bold;border:solid 0px;width:15%;'>Branch</td>
							<td style='font-weight:bold;border:solid 0px;width:15%;'>Start Date</td>
							<td style='font-weight:bold;border:solid 0px;width:15%;'>End Date</td>
							<td style='font-weight:bold;border:solid 0px;width:15%;'>Fees</td>
						</tr></table>
					</div>
					<div class='inputs' id="course_batch" name="course_batch" style="width:98%;height:98px;overflow-y: scroll;">
					</div>
					<br/>
					<table>
						<tr>
							<td><center><input type='BUTTON' id='submit' name='submit' value='SUBMIT'/></center></td>
						</tr>
					</table>
				</div>
			</form>
		</div>
		<div id="footer">
			<center><div style="padding-top:5px;font-size:12px;color:black;text-transform: capitalize;"><label style="border:solid 0px;color:white;">Copyright &copy Edutech Educational Services Pvt. Ltd. Ahmedabad, Gujarat, India</label>
			</div></center>
		</div>
	</div>
    </body>
</html>