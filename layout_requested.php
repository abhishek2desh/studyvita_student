<?php
	include_once 'config.php';
	session_start();
	$course_id=$_SESSION['course_id'];
	$batch_id=$_SESSION['batch_id'];
	$sub_id=$_SESSION['subject_id'];
	$sub=$_GET['subject'];
	$test_id=$_GET['test_id'];
	$noq=$_GET['noq'];
	$t_t=$_GET['t_t'];
	$sub_full=$_GET['sub_full'];
	$user_id=$_SESSION['sid'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1; NO-CACHE;" />
<title>Edutech india online test</title>
<!-- jquery js-->
<script language="javascript" type="text/javascript" src="js/jquery.min.js">
		</script>
		<script type="text/javascript" language="javascript">
			$(function() {
		 
				$(this).bind("contextmenu", function(e) {
	 
					e.preventDefault();
	 
				});
		 
			});
		</script>
		<link rel="stylesheet" type="text/css" media="screen" href="css/jquery-ui-1.8.2.custom.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="css/ui.jqgrid.css" />
		<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
		<script src="js/grid.locale-en.js" type="text/javascript"></script>
		<script src="js/jquery.jqGrid.min.js" type="text/javascript"></script>
		
		<!--  Above Disabled to Right Click...  -->
			
		
		<link rel="stylesheet" type="text/css" media="screen" href="css/ui.jqgrid.css" />
		<link rel="stylesheet" type="text/css" href="css/flexpaper.css" />
		<script src="js/jquery-1.8.3.js"></script>
		<script src="js/jquery-ui.js"></script>
		<script type="text/javascript" src="js/flexpaper.js"> </script>
		<!--<script type="text/javascript" src="js/jquery.min.js"> </script>	-->
		<script type="text/javascript" src="js/flexpaper_handlers.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers_debug.js"> </script>
		
		<script language="javascript" type="text/javascript" src="js/jquery.flot.js"></script>
		<script language="javascript" type="text/javascript" src="js/jquery.flot.threshold.js"></script>
		<link href="menu.css" rel="stylesheet" type="text/css" />
		<!-- five star -->
		<script type="text/javascript" src="lib/jquery.raty.min.js"></script>
		
		<!--	Timer  -->
		<link rel="stylesheet" href="layout/css/styles2_new.css" />
		<script type="text/javascript" src="js/date_time.js"></script>
		<script src="js/countdown.js"></script>
		<script src="js/moment.js"></script>
		<link rel="stylesheet" type="text/css" media="screen" href="jq_grid/ui.jqgrid.css" />
		<script src="js/grid.locale-en.js" type="jq_grid/javascript"></script>
		<script src="js/jquery.jqGrid.min.js" type="jq_grid/javascript"></script>
		<style type="text/css">
			.button_css {
			-moz-box-shadow:inset 0px 1px 0px 0px #97c4fe;
			-webkit-box-shadow:inset 0px 1px 0px 0px #97c4fe;
			box-shadow:inset 0px 1px 0px 0px #97c4fe;
			background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #3d94f6), color-stop(1, #1e62d0) );
			background:-moz-linear-gradient( center top, #3d94f6 5%, #1e62d0 100% );
			filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#3d94f6', endColorstr='#1e62d0');
			background-color:#3d94f6;
			-webkit-border-top-left-radius:0px;
			-moz-border-radius-topleft:0px;
			border-top-left-radius:0px;
			-webkit-border-top-right-radius:0px;
			-moz-border-radius-topright:0px;
			border-top-right-radius:0px;
			-webkit-border-bottom-right-radius:0px;
			-moz-border-radius-bottomright:0px;
			border-bottom-right-radius:0px;
			-webkit-border-bottom-left-radius:0px;
			-moz-border-radius-bottomleft:0px;
			border-bottom-left-radius:0px;
			text-indent:0;
			border:1px solid #337fed;
			display:inline-block;
			color:#ffffff;
			font-family:Arial;
			font-size:12px;
			font-weight:bold;
			font-style:normal;
			height:30px;
			line-height:30px;
			width:100px;
			text-decoration:none;
			text-align:center;
		}
		.button_css:hover {
			background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #1e62d0), color-stop(1, #3d94f6) );
			background:-moz-linear-gradient( center top, #1e62d0 5%, #3d94f6 100% );
			filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#1e62d0', endColorstr='#3d94f6');
			background-color:#1e62d0;
		}
		.defaultbutton {
			-moz-box-shadow:inset 0px 0px 0px 0px #efdcfb;
			-webkit-box-shadow:inset 0px 0px 0px 0px #efdcfb;
			box-shadow:inset 0px 0px 0px 0px #efdcfb;
			background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #dfbdfa), color-stop(1, #bc80ea));
			background:-moz-linear-gradient(top, #dfbdfa 5%, #bc80ea 100%);
			background:-webkit-linear-gradient(top, #dfbdfa 5%, #bc80ea 100%);
			background:-o-linear-gradient(top, #dfbdfa 5%, #bc80ea 100%);
			background:-ms-linear-gradient(top, #dfbdfa 5%, #bc80ea 100%);
			background:linear-gradient(to bottom, #dfbdfa 5%, #bc80ea 100%);
			filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#dfbdfa', endColorstr='#bc80ea',GradientType=0);
			background-color:#dfbdfa;
			-moz-border-radius:4px;
			-webkit-border-radius:4px;
			border-radius:4px;
			border:1px solid #c584f3;
			width:120px;
			display:inline-block;
			cursor:pointer;
			color:#ffffff;
			font-family:arial;
			font-size:11px;
			font-weight:bold;
			padding:5px 22px;
			text-decoration:none;
			text-shadow:0px -1px 2px #9752cc;
		}
		.defaultbutton:hover {
			background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #bc80ea), color-stop(1, #dfbdfa));
			background:-moz-linear-gradient(top, #bc80ea 5%, #dfbdfa 100%);
			background:-webkit-linear-gradient(top, #bc80ea 5%, #dfbdfa 100%);
			background:-o-linear-gradient(top, #bc80ea 5%, #dfbdfa 100%);
			background:-ms-linear-gradient(top, #bc80ea 5%, #dfbdfa 100%);
			background:linear-gradient(to bottom, #bc80ea 5%, #dfbdfa 100%);
			filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#bc80ea', endColorstr='#dfbdfa',GradientType=0);
			background-color:#bc80ea;
		}
		.defaultbutton:active {
			position:relative;
			top:1px;
		}
		</style>
<script> 
	$(document).ready(function(){
		var uri = window.location.toString();
		if (uri.indexOf("?") > 0) {
			var clean_uri = uri.substring(0, uri.indexOf("?"));
			window.history.replaceState({}, document.title, clean_uri);
		}
		var uid='<?php echo $user_id;?>';
		var test_id='<?php echo $test_id; ?>';
		var sub_full='<?php echo $sub_full; ?>';
		var t_t='<?php echo $t_t; ?>';
		t_t=Number(t_t);
		var noq='<?php echo $noq; ?>';
		var batch_id='<?php echo $batch_id;?>';
			var course_id='<?php echo $course_id;?>';
		var select_ans_wise="";
		//alert(sub_full);
		var vl="";
		var s2_dt="";
		//alert(t_t);
		$("#load_hide").show();
		$("#main_div").hide();
		var camp_course=0;
		filename = "test_paper_generator/11_view_que1_adp.php?test_id="+test_id+"&uid="+uid+"&vl="+vl;
		//alert(filename);
		getContent_que(filename, "view_que_sel");
		//filename ="query/check-special-camp-course-test.php?uid="+uid+"&course_id="+course_id;
		filename ="query/check-carnival-user.php?uid="+uid;
		
					//alert(filename);
						$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						success: function(data, textStatus, xhr) {
						camp_course=data;
						},
						});
		function getContent_que(filename, selectboxid)
		{
			$.ajax({
				url: filename,
				type: 'GET',
				dataType: 'html',
				success: function(data, textStatus, xhr) {
					var strtemp = "$('#" + selectboxid + "').html(data)";
					eval(strtemp);
					$("#load_hide").hide();
					$("#main_div").show();
					alert("Your test starts now. Best of luck.");
					t_t1=t_t;
					//alert(t_t1);
					var da2_st = new Date();
					var today222_st = moment(da2_st);
					var s2_dt = today222_st.format("YYYY-MM-DD  HH:mm:ss");
					//alert(s2_dt);
					filename = "test_paper_generator/20_insert_start_time.php?date_time="+s2_dt+"&test_id="+test_id+"&uid="+uid;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						success: function(data, textStatus, xhr) {
							if(data == 'true')
							{
								
							}
						},
					});
					var d1 = new Date (),
					d2 = new Date ( d1 );
					d2.setMinutes(d1.getMinutes() + t_t1);
					var today = moment(d2);
					var date_time = today.format("D MMMM YYYY HH:mm:ss");
					$('#view_que_sel input[type="radio"]').eq(0).attr("checked",true);
					$("#view_que_sel input:radio:checked").each(function() {
						idArray34=this.id;
					});
					//alert(idArray34);
					var mySplitResult = idArray34.split("-");
					check_name=mySplitResult[0];
					uniq_id_get=mySplitResult[1];
					uniq_id_get_qus=uniq_id_get+"_Qus";
					copy_location();
					//alert(date_time);
					var setTime = date_time;
					$("#countdown1").countdown({
					date: setTime,
					format: "on"
					},
					function() {
						alert("Exam Time is over , Thanks.");
						$("#load_hide").show();
				$("#main_div").hide();
						 var da2 = new Date();
						 var today222 = moment(da2);
						 var s2 = today222.format("YYYY-MM-DD  HH:mm:ss");
						 var da212 = new Date();
						 var today212 = moment(da212);
						var s212 = today212.format("YYYY-MM-DD  HH:mm:ss");
						var da3 = new Date();
						//alert(s212);
						var today3 = moment(da3);
						//alert(today3);
						var datetime3 = today3.format("D MMMM YYYY HH:mm:ss");
						//alert(new_test_id);
						//alert(sb);alert(req_que);alert(datetime);alert(datetime3);alert(t_t);
						filename = "test_paper_generator/23_insert_adaptive_final.php?date_time2="+s2+"&test_id="+test_id+"&uid="+uid+"&course_id="+course_id;
						 //alert(filename);
						 $.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							success: function(data, textStatus, xhr) {
								if(data == 'true')
								{
									setTimeout(function(){
										
										if(camp_course=="1")
										{
										alert("Test submitted successfully. Thank You.");
										document.location.href="http://carnival.studyvita.com";
										}
										else
										{
										alert("Result has been Sent to your registered Email-ID. Thank You.");
										document.location.href="view_my_result_request.php";
										}
										
										
									}, 1000);
								}
							},
						});
					});
				},
			});									
		}
		function copy_location()
		{
			path="R:\\QuestionData\\"+sub_full+"\\"+uniq_id_get_qus;
			filename = "test_paper_generator/copy_location.php?output="+path+"&mn="+uniq_id_get_qus;
			//alert(filename);
			$.ajax({
				url: filename,
				type: 'GET',
				dataType: 'html',
				
				success: function(data, textStatus, xhr) {
					callFlexPaperDocViewer(uniq_id_get_qus);
					$('input[name=ans_sel]').attr('checked', false);
					select_ans_wise="";
					answer_tag();
				},
			});
		}
		$('#view_que_sel').click(function(){					
			//all_atm=all_atm+",";
			$("#view_que_sel input:radio:checked").each(function() {
					idArray34=this.id;
			});
			//alert(idArray34);
			var mySplitResult = idArray34.split("-");
			check_name=mySplitResult[0];
			uniq_id_get=mySplitResult[1];
			uniq_id_get_qus=uniq_id_get+"_Qus";
			copy_location();
		});
		$('#save_next').click(function(){
			if(select_ans_wise == "")
			{
				alert("Select Answer");
			}
			else
			{
				save_next_on_on_click();
			}
		});
		function save_next_on_on_click()
		{
			//alert(check_name+"-"+noq);
			check_name=Number(check_name);
			noq=Number(noq);
			if(check_name == noq)
			{
				alert("Last Record");
			}
			else
			{
				filename = "test_paper_generator/save_or_next_click.php?check_id="+uniq_id_get+"&qno="+check_name+"&test_id="+test_id+"&uid="+uid+"&response="+select_ans_wise;
				//alert(filename);
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					
					success: function(data, textStatus, xhr) {
						if(data == "")
						{
							filename = "test_paper_generator/11_view_que1_adp.php?test_id="+test_id+"&uid="+uid+"&vl=1";
							//alert(filename);
							getContent_true(filename, "view_que_sel");
						}
					},
				});
			}
		}
		$('#marks_for_review').click(function(){
			review_next_on_on_click();
		});
		function review_next_on_on_click()
		{
			if(check_name > noq)
			{
				alert("Last Record");
			}
			else
			{
				filename = "test_paper_generator/save_or_next_click.php?check_id="+uniq_id_get+"&qno="+check_name+"&test_id="+test_id+"&uid="+uid+"&response=R";
				//alert(filename);
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					
					success: function(data, textStatus, xhr) {
						if(data == "")
						{
							filename = "test_paper_generator/11_view_que1_adp.php?test_id="+test_id+"&uid="+uid+"&vl=1";
							//alert(filename);
							getContent_true(filename, "view_que_sel");
						}
					},
				});
			}
		}
		$('input[type="radio"][name="ans_sel"]').click(function(){
			var ans_type = $("input[type='radio'][name='ans_sel']:checked");
			if (ans_type.length > 0)
			select_ans_wise = ans_type.val();
			//alert(select_ans_wise);
		});
		function getContent_true(filename, selectboxid)
		{
			$.ajax({
				url: filename,
				type: 'GET',
				dataType: 'html',
				
				success: function(data, textStatus, xhr) {
					var strtemp = "$('#" + selectboxid + "').html(data)";
					eval(strtemp);
					noq=Number(noq);
					if(check_name > noq)
					{
						
					}
					else
					{
						check_name_new=Number(check_name) + Number(1);
						$('#view_que_sel input[type="radio"]').eq(check_name_new).attr("checked",false);
						$('#view_que_sel input[type="radio"]').eq(check_name).attr("checked",true);
						$("#view_que_sel input:radio:checked").each(function() {
								idArray34=this.id;
						});
						var mySplitResult = idArray34.split("-");
						check_name=mySplitResult[0];
						uniq_id_get=mySplitResult[1];
						uniq_id_get_qus=uniq_id_get+"_Qus";
						copy_location();
					}
				},
			});
		}
		function answer_tag()
		{
			filename = "test_paper_generator/14_response_checked_2.php?uniq_id_get="+uniq_id_get+"&qno="+check_name+"&test_id="+test_id+"&uid="+uid;
			//alert(filename);
			$.ajax({
				url: filename,
				type: 'GET',
				dataType: 'html',
				success: function(data, textStatus, xhr) {
					//alert(data);
					if(data == 'x' || data == '')
					{
						$('input[name=ans_sel]').attr('checked', false);
						$('input[name=ans_sel]').attr('checked', false);
					}
					else
					{
						$("input[name=ans_sel][value=" + data + "]").attr('checked', 'checked');
					}
				},
			});
		}
		$('#clear_response').click(function(){
			filename = "test_paper_generator/15_clear_response.php?uniq_id_get="+uniq_id_get+"&qno="+check_name+"&test_id="+test_id+"&uid="+uid;
			//alert(filename);
			$.ajax({
				url: filename,
				type: 'GET',
				dataType: 'html',
				success: function(data, textStatus, xhr) {
					$('input[name=ans_sel]').attr('checked', false);
					$('input[name=ans_sel]').attr('checked', false);
					getContent_true(filename, "view_que_sel");		
				},
			});
		});
		$('#final_test').click(function(){
			var checkstr1 =  confirm('Are you sure? Want to do final submission...?');
			if(checkstr1 == true)
			{
			$("#load_hide").show();
				$("#main_div").hide();
				//$("#timer").hide();
				var da2 = new Date();
				var today222 = moment(da2);
				var s2 = today222.format("YYYY-MM-DD  HH:mm:ss");
				var da212 = new Date();
				var today212 = moment(da212);
				var s212 = today212.format("YYYY-MM-DD  HH:mm:ss");
				var da3 = new Date();
				var today3 = moment(da3);
				var datetime3 = today3.format("D MMMM YYYY HH:mm:ss");
				filename = "test_paper_generator/23_insert_adaptive_final.php?date_time2="+s2+"&test_id="+test_id+"&uid="+uid+"&course_id="+course_id;
				//alert(filename);
				 $.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					success: function(data, textStatus, xhr) {
						if(data == 'true')
						{
							setTimeout(function(){
							
								//document.location.href="view_my_result_request.php";
								if(camp_course=="1")
										{
											alert("Test submitted successfully. Thank You.");
										document.location.href="http://carnival.studyvita.com";
										}
										else
										{
											alert("Result has been Sent to your registered Email-ID. Thank You.");
										document.location.href="view_my_result_request.php";
										}
							}, 1000);
						}
					},
				});
			}
			else
			{
				return false;
			}
			//alert("Test Now finish...");
		});
	});
</script>
<script type="text/javascript" language="javascript">
       function DisableBackButton() {
           window.history.forward()
       }
       DisableBackButton();
       window.onload = DisableBackButton;
       window.onpageshow = function (evt) { if (evt.persisted) DisableBackButton() }
       window.onunload = function () { void (0) }
   </script>
</head>
<body>
	<div id="load_hide" style="height:auto;width:auto;"><center><img valign="top" src="loading/di_load.gif" style='padding-top:100px;' alt="Loading" class="loading-gif" /></center></div>
<center>
<table id="main_div" style="border-radius: 5px;width:80%;height:100%;background: purple;">
	<tr>
		<td style="border-radius: 5px;width:80%;height:80px;background: #EEEEEE;">
			<center><table style="width:100%;">
				<tr>
					<td align="center" style="width:90%;"><h1>Online Test</h1></td>
					
					<td style="border-radius: 5px;width:10%;height:65px;background: green;"> 
											<?php
												$result_photos=mysql_query("SELECT student_photos FROM USER WHERE id='$user_id'");
												$row_photos=mysql_fetch_array($result_photos);
												$photos=$row_photos[0]; 
												if($photos == "")
												{
													$full_path="../"."StudentPhotos/blank_user_icon2.PNG";
													echo "<img src='$full_path' height='90px' width='100%' />";
												}
												else
												{
													$full_path="../"."StudentPhotos/".$photos;
													echo "<img src='$full_path' height='90px' width='100%' />";
												}
											?>
											<!--<img src="image/ad2.jpg" width='100%' height='90px'>-->
											</td>
					
				</tr>
			</table></center>
		</td>
	</tr>
	<tr>
		<td style="border-radius: 5px;width:80%;height:488px;background: purple;">
			<table style="border-radius: 5px;width:100%;height:535px;background: purple;">
				<tr>
					<td style="border-radius: 5px;width:0.1%;height:488px;">
					</td>
					<td valign="top" style="border-radius: 10px;width:69.9%;height:488px;background: #EEEEEE;">
						<div style="border-radius: 5px;border:solid 1px;width:99.5%;height:25px;background-color:#EEEEEE;">
							<b><label style="font-size:18px;">Question No :</label><label id="que_no_dis"></label></b>
						</div>
						<div style="border-radius: 5px;border:solid 1px;width:99.5%;height:375px;background-color:#EEEEEE;">
							<?php include 'viewer/viewer1.php'; ?>
						</div>
						<div style="padding-left:5px;width:99.5%;">	
							<table style="padding-top:5px;width:100%;">
								<tr>
									<td style='width:45%'>
										<label><b>Select Your Answer : </b></label>
										<input id="111" type="radio" class="ans_sel" name="ans_sel" value="A"><label for="111"><b>A</b></label>
										<input id="222" type="radio" class="ans_sel" name="ans_sel" value="B"><label for="222">
										<b>B</b></label>
										<input id="333" type="radio" class="ans_sel" name="ans_sel" value="C"><label for="333">
										<b>C</b></label>
										<input id="444" type="radio" class="ans_sel" name="ans_sel" value="D"><label for="444">
										<b>D</b></label>
									</td>
									<td style='width:55%'>
										<input type="BUTTON" class="defaultbutton" style="width:150px;" id="marks_for_review" name="marks_for_review" value="Mark For Review & Next"/>
										<input type="BUTTON" class="defaultbutton" style="width:120px;" id="clear_response" name="clear_response" value="Clear Response"/>
										<input type="BUTTON" class="defaultbutton" style="width:100px;" id="save_next" name="save_next" value="Save & Next"/>
									</td>
								</tr>
							</table>
						</div>
					</td>
					<td valign="top" style="border-radius: 5px;width:30%;height:488px;background: purple;">
						<table style="border-radius: 5px;width:100%;height:488px;background: purple;">
							<tr>
								<td style="border-radius: 5px;width:100%;height:68px;background: #EEEEEE;">
									<table style="border-radius: 5px;width:100%;height:68px;background: #EEEEEE;">
										<tr>
											<!--<td style="border-radius: 5px;width:30%;height:65px;background: green;"> 
											<?php
												$result_photos=mysql_query("SELECT student_photos FROM USER WHERE id='$user_id'");
												$row_photos=mysql_fetch_array($result_photos);
												$photos=$row_photos[0]; 
												if($photos == "")
												{
													$full_path="../"."StudentPhotos/blank_user_icon2.PNG";
													echo "<img src='$full_path' height='90px' width='100%' />";
												}
												else
												{
													$full_path="../"."StudentPhotos/".$photos;
													echo "<img src='$full_path' height='90px' width='100%' />";
												}
											?>
											
											</td>-->
													<td  style="border-radius: 5px;height:65px;background: green;"> 
												<center><div id="timer_hide1" style="border-radius: 5px;width:100%;height:20px;background: red;"> 
														 Time Left</center>
													</div>
													<div  id="timer_hide" class="timer-area" style="border-radius: 5px;width:100%;height:55px;background: green;"> 
														<ul id="countdown1" style="width:100%;" align="left">
															<li align="left">
																<span class="hours" style="color:white;font-size:1em;">00</span> 
																<p class="timeRefHours" style="color:black;font-size:1em;"> HH</p>
															</li>
															<li align="left">
																<span class="minutes" style="color:white;font-size:1em;">00</span>
																<p class="timeRefMinutes" style="color:black;font-size:1em;">   MM</p>
															</li>
															<li align="left">
																<span class="seconds" style="color:white;font-size:1em;">00</span>
																<p class="timeRefSeconds" style="color:black;font-size:1em;"> SS</p>
															</li>
														</ul>
													</div>
													
												
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td style="border-radius: 5px;width:100%;height:20px;background: #EEEEEE;">
									<b><label style="font-size:14px;">No of questions :</label><label id="no_que_dis"></label></b>
									<b><label style="font-size:14px;">Select Subject :</label><label id="selected_subject"></label></b>
								</td>
							</tr>
							<tr>
								<td style="border-radius: 5px;width:100%;height:300px;background: #EEEEEE;">
									<div id="view_que_sel" style="border-radius: 5px;border:solid 0px;width:99.5%;height:320px;background-color:#EEEEEE;overflow-y: scroll;">
									</div>
								</td>
							</tr>
							<tr>
								<td valign="top" style="border-radius: 5px;width:100%;height:70px;background: #EEEEEE;">
									<table style="border-radius: 5px;width:100%;height:30px;background: #EEEEEE;">
										<tr>
											<td>
												Answered &nbsp;<input type="button" class="defaultbutton" style="border-radius: 5px;background-color:green;" width="30%;" value="">
											</td>
											<td>
												Not Answered &nbsp;<input type="button" class="defaultbutton" style="border-radius: 5px;background-color:red;" width="30%;" value="">
											</td>
											<td>
												For Review &nbsp;<input type="button" class="defaultbutton" style="border-radius: 5px;background-color:yellow;" width="30%;" value="">
											</td>
										</tr>
									</table>
									<table style="border-radius: 5px;width:100%;height:40px;background: #EEEEEE;">
										<tr>
											<!--<td>
												<input type="button" class="defaultbutton" style="border-radius: 5px;background-color:grey;" width="100px;" value="Profile"/>
											</td>
											<td>
												<input type="button"  class="defaultbutton" style="border-radius: 5px;background-color:grey;" width="100px;" value="Instruction">
											</td>
										</tr>
										<tr>
											<td>
												<input type="button" class="defaultbutton" style="border-radius: 5px;background-color:grey;" width="100px;" value="Que. Paper">
											</td>-->
											<td>
												<input type="button" id="final_test" class="defaultbutton" style="border-radius: 5px;background-color:grey;" width="100px;" value="Final Submission">
											</td>
										</tr>
										
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td style="border-radius: 5px;width:80%;background: #EEEEEE;">
			<center><table>
				<tr>
					<td>Copyright &copy Edutech Educational Services Pvt. Ltd. Ahmedabad, Gujarat, India</label></td>
				</tr>
			</table></center>
		</td>
	</tr>
</table>
</center>
</body>
</html>