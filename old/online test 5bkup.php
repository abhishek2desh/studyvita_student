<?php
	include_once 'config.php';
	session_start();
	$course_id=$_SESSION['course_id'];
	$batch_id=$_SESSION['batch_id'];
	$subject_id=$_SESSION['subject_id'];
	$user_id=$_SESSION['sid'];
	$chap_id=$_SESSION['chap_id'];
	$sel_time=$_SESSION['sel_time'];
	$req_que=$_SESSION['req_que'];
	
	$result1=mysql_query("SELECT board_id,standard_id FROM batch WHERE id='$batch_id'");
	$row1=mysql_fetch_array($result1);
	$board=$row1[0];
	$std=$row1[1];
	$r_query=mysql_query("SELECT sd.group_id,sd.standard_id,sd.board_id,sd.batch_id,sd.branch_id,u.name,u.enroll_id,u.user_photo FROM student_details sd,USER u WHERE u.id=sd.user_id AND sd.user_id='$user_id'");
	$r_query_row=mysql_fetch_array($r_query);
	$group_id=$r_query_row[0];
	$enroll_id=$r_query_row[6];
	$student_name=$r_query_row[5];
	$student_photo=$r_query_row[7];
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
.myButton {
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
.myButton:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #bc80ea), color-stop(1, #dfbdfa));
	background:-moz-linear-gradient(top, #bc80ea 5%, #dfbdfa 100%);
	background:-webkit-linear-gradient(top, #bc80ea 5%, #dfbdfa 100%);
	background:-o-linear-gradient(top, #bc80ea 5%, #dfbdfa 100%);
	background:-ms-linear-gradient(top, #bc80ea 5%, #dfbdfa 100%);
	background:linear-gradient(to bottom, #bc80ea 5%, #dfbdfa 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#bc80ea', endColorstr='#dfbdfa',GradientType=0);
	background-color:#bc80ea;
}
.myButton:active {
	position:relative;
	top:1px;
}
</style>

<script type="text/javascript" language="javascript">
       function DisableBackButton() {
           window.history.forward()
       }
       DisableBackButton();
       window.onload = DisableBackButton;
       window.onpageshow = function (evt) { if (evt.persisted) DisableBackButton() }
       window.onunload = function () { void (0) }
</script>
<script> 
	$(document).ready(function(){
		var uri = window.location.toString();
		if (uri.indexOf("?") > 0) {
			var clean_uri = uri.substring(0, uri.indexOf("?"));
			window.history.replaceState({}, document.title, clean_uri);
		}
		var chap_id='<?php echo $chap_id;?>';var subject_id='<?php echo $subject_id;?>';
		var uid='<?php echo $user_id; ?>';
		var req_que='<?php echo $req_que; ?>';
		var sel_time='<?php echo $sel_time; ?>';
		var date_time2,date_time,datetime,t_t,select_test_wise="test",select_type_wise=1;
		var all_atm="";
		var uniq_id_get=0,marks_for_review="",marks_for_atm="",select_ans_wise="";
		$("#load_hide").hide();
		//alert(req_que);
		//alert(sel_time);
		sbj1="";
		if(subject_id==14){ sb1="Biology";sbj1="BIO";}
		else if(subject_id==15){ sb1="Maths";sbj1="MAT";}
		else if(subject_id==16){ sb1="Physics";sbj1="PHY";}
		else if(subject_id==17){ sb1="Chemistry";sbj1="CHE";}
		else if(subject_id==18){ sb1="Science";sbj1="SCI";}
		else if(subject_id==19){ sb1="English";sbj1="ENG";}
		else if(subject_id==20){ sb1="Mock";}
		else if(subject_id==22){ sb1="SocialScience";sbj1="S.S";}
		
		filename = "test_paper_generator/getsubjectname.php?sub_id="+subject_id;
		$.ajax({
			url: filename,
			type: 'GET',
			dataType: 'html',
			
			success: function(data, textStatus, xhr) {
				//alert(data);
				sb1=data;
			
			if(sbj1=="")
			{
			sbj1=sb1;
			}
			//alert(sb1+sbj1);
			$("#no_que_dis").html(req_que);
			$("#selected_subject").html(sb1);	
			filename = "test_paper_generator/chape3.php?sub_id="+subject_id+"&cp_value12="+chap_id+"&uid="+uid;
			//alert(filename);
			$.ajax({
			url: filename,
			type: 'GET',
			dataType: 'html',
			
			success: function(data, textStatus, xhr) {
				//alert(data);
				var mySplitResult = data.split("-");
				qno_id=mySplitResult[0];
				tot_qno_id=mySplitResult[1];//alert(req_que);alert(tot_qno_id);alert(qno_id);alert(chap_id);alert(subject_id);alert(uid);alert(marks_for_review);alert(	 marks_for_review);alert(marks_for_atm);
				//filename = "test_paper_generator/11_view_que1.php?total_que_str="+tot_qno_id+"&uniq_id_get="+uniq_id_get+"&marks_for_review="+marks_for_review+"&marks_for_atm="+marks_for_atm+"&req_que="+req_que+"&total_no_que="+qno_id+"&cp_value12="+chap_id+"&sub_id="+subject_id+"&uid="+uid;
				//alert(filename);
				//*filename="test_paper_generator/11_view_que1.php";
				//alert("sanjay"+data34);
				//alert(qno_id+tot_qno_id);
				alert(tot_qno_id);
				filename="test_paper_generator/11_view_que1.php";
				data34={total_que_str: tot_qno_id,uniq_id_get:uniq_id_get,marks_for_review:marks_for_review,marks_for_atm:marks_for_atm,req_que:req_que,total_no_que:qno_id,cp_value12:chap_id,sub_id:subject_id,uid:uid};
				alert(data34);
				getContent_que34(filename, "view_que_sel");
			},
		});
		},
		});
		
		//sb1=subject_id;
			//	alert(sb1);
		//sbj1=subject_id;
		
		
		//alert(chap_id);alert(subject_id);
		
		$('#view_que_sel').click(function(){
			$('input[name=ans_sel]').attr('checked', false);
			$("#view_que_sel input:radio:checked").each(function() {
					idArray34=this.id;
			});
			var mySplitResult = idArray34.split("-");
			uniq_id_get=mySplitResult[0];
			check_name=mySplitResult[1];
			uniq_id_get_qus=uniq_id_get+"_Qus";
			//alert(uniq_id_get+"-"+check_name);
			check_name=Number(check_name) - Number(1);
			//alert(check_name+sb1+uniq_id_get_qus);
			path="R:\\QuestionData\\"+sb1+"\\"+uniq_id_get_qus;
			filename = "test_paper_generator/copy_location.php?output="+path+"&mn="+uniq_id_get_qus;
			//alert(filename);
			$.ajax({
				url: filename,
				type: 'GET',
				dataType: 'html',
				
				success: function(data, textStatus, xhr) {
					//alert(data);
					callFlexPaperDocViewer(uniq_id_get_qus);
					quesiton_dis();
					data_sis_for_ans();
				},
			});
		});
		$('#previous_bt').click(function(){
			$('input[name=ans_sel]').attr('checked', false);
			old_check_name=check_name;
			check_name=Number(check_name) - Number(1);
			//alert("old"+old_check_name+"check "+check_name)
			if(old_check_name == 0)
			{
				alert("You are in first record......");
			}
			else
			{
				$('#view_que_sel input[type="radio"]').eq(old_check_name).attr("checked",false);
				$('#view_que_sel input[type="radio"]').eq(check_name).attr("checked",true);
				$("#view_que_sel input:radio:checked").each(function() {
						idArray34=this.id;
				});
				var mySplitResult = idArray34.split("-");
				uniq_id_get=mySplitResult[0];
				check_name=mySplitResult[1];
				uniq_id_get_qus=uniq_id_get+"_Qus";
				check_name=Number(check_name) - Number(1);
				//alert(uniq_id_get+uniq_id_get_length);
				path="R:\\QuestionData\\"+sb1+"\\"+uniq_id_get_qus;
				filename = "test_paper_generator/copy_location.php?output="+path+"&mn="+uniq_id_get_qus;
				//alert(filename);
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					
					success: function(data, textStatus, xhr) {
						callFlexPaperDocViewer(uniq_id_get_qus);
						quesiton_dis();
						data_sis_for_ans();
					},
				});
			}
		});
		$('#next_bt').click(function(){
			$('input[name=ans_sel]').attr('checked', false);
			old_check_name=check_name;
			check_name=Number(check_name) + Number(1);
			//alert("old"+old_check_name+"check "+check_name)
			if(check_name == req_que)
			{
				alert("Your are in last record......");
			}
			else
			{
				$('#view_que_sel input[type="radio"]').eq(old_check_name).attr("checked",false);
				$('#view_que_sel input[type="radio"]').eq(check_name).attr("checked",true);
				
				$("#view_que_sel input:radio:checked").each(function() {
						idArray34=this.id;
				});
				var mySplitResult = idArray34.split("-");
				uniq_id_get=mySplitResult[0];
				check_name=mySplitResult[1];
				uniq_id_get_qus=uniq_id_get+"_Qus";
				check_name=Number(check_name) - Number(1);
				//alert(check_name+sb1+uniq_id_get_qus);
				path="R:\\QuestionData\\"+sb1+"\\"+uniq_id_get_qus;
				filename = "test_paper_generator/copy_location.php?output="+path+"&mn="+uniq_id_get_qus;
				//alert(filename);
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					
					success: function(data, textStatus, xhr) {
						callFlexPaperDocViewer(uniq_id_get_qus);
						quesiton_dis();
						data_sis_for_ans();
					},
				});
			}
		});
		function data_sis_for_ans()
		{
			$('input[name=ans_sel]').attr('checked', false);
			filename = "test_paper_generator/14_response_checked.php?uniq_id_get="+uniq_id_get+"&qno="+check_name+"&test_id="+new_test_id;
			//alert(filename);
			$.ajax({
				url: filename,
				type: 'GET',
				dataType: 'html',
				success: function(data, textStatus, xhr) {
					//alert(data);
					$("input[name=ans_sel][value=" + data + "]").attr('checked', 'checked');
				},
			});
		}
		$('#marks_for_review').click(function(){
			$('input[name=ans_sel]').attr('checked', false);
			marks_for_review=marks_for_review+uniq_id_get+",";
			if(select_type_wise == 1)
			{
				//alert("hii2");
				filename = "test_paper_generator/14_view_que.php?total_que_str="+que_get+"&uniq_id_get="+uniq_id_get+"&marks_for_review="+marks_for_review+"&marks_for_atm="+marks_for_atm+"&req_que="+req_que+"chek_name="+check_name;
				//alert(filename);
				getContent2(filename, "view_que_sel");
				filename = "test_paper_generator/22_insert_response.php?uniq_id_get="+uniq_id_get+"&qno="+check_name+"&select_ans_wise="+select_ans_wise+"&select_test_wise="+select_test_wise+"&new_test_id="+new_test_id;
				//alert(filename);
				getInsert(filename);
			}
		});
		$('#save_next').click(function(){
			$('input[name=ans_sel]').attr('checked', false);
			if(select_ans_wise == "")
			{
				alert("Please select your option....");
			}
			else
			{
				//alert("snjay1");
				marks_for_atm=marks_for_atm+uniq_id_get+",";
				if(select_type_wise == 1)
				{
					filename = "test_paper_generator/14_view_que.php?total_que_str="+que_get+"&uniq_id_get="+uniq_id_get+"&marks_for_review="+marks_for_review+"&marks_for_atm="+marks_for_atm+"&req_que="+req_que;
					//alert(filename);
					getContent2(filename, "view_que_sel");
					filename = "test_paper_generator/22_insert_response.php?uniq_id_get="+uniq_id_get+"&qno="+check_name+"&select_ans_wise="+select_ans_wise+"&select_test_wise="+select_test_wise+"&new_test_id="+new_test_id;
					//alert(filename);
					getInsert(filename);
				}
			}
			select_ans_wise="";
		});
		$("#load_hide").show();
		$("#main_div").hide();
		$('input[type="radio"][name="ans_sel"]').click(function(){
			var ans_type = $("input[type='radio'][name='ans_sel']:checked");
			if (ans_type.length > 0)
			select_ans_wise = ans_type.val();
			//alert(select_ans_wise);
		});
		function getContent_que34(filename, selectboxid)
		{
			$.ajax({
				type: "POST",
				url: filename,
				data: data34,
				success: function(data, textStatus, xhr) {
					var strtemp = "$('#" + selectboxid + "').html(data)";
					eval(strtemp);
					//alert(data);
					$("#start_test").show();
					time_start_with_edit();
				},
			});
		}
		function time_start_with_edit()
		{
			que_get = $('#sel_que').attr("value");
			//alert(que_get);
			$('#view_que_sel input[type="radio"]').eq(0).attr("checked",true);
						
			all_atm=all_atm+",";
			
			$("#view_que_sel input:radio:checked").each(function() {
					idArray34=this.id;
			});
			var mySplitResult = idArray34.split("-");
			uniq_id_get=mySplitResult[0];
			check_name=mySplitResult[1];
			uniq_id_get_qus=uniq_id_get+"_Qus";
			//alert(uniq_id_get_qus);
			//get_uniq_diff_per();
			check_name=Number(check_name) - Number(1);
			path="R:\\QuestionData\\"+sb1+"\\"+uniq_id_get_qus;
			filename = "test_paper_generator/copy_location.php?output="+path+"&mn="+uniq_id_get_qus;
			//alert(filename);
			$.ajax({
				url: filename,
				type: 'GET',
				dataType: 'html',
				
				success: function(data, textStatus, xhr) {
					callFlexPaperDocViewer(uniq_id_get_qus);
					quesiton_dis();
				},
			});
			$("#load_hide").hide();
			$("#main_div").show();
			alert("Your test starts now. Best of luck.");
			var nwDT_3 = new Date();
			//alert("Start Time : "+nwDT_3);
			//t_t = $("#sel_time").val();
			
			t_t=sel_time;
			var d1 = new Date (),
				d2 = new Date ( d1 );
			if(t_t == 1)
			{					d2.setMinutes(d1.getMinutes() + 1);				}
			else if(t_t == 5)
			{					d2.setMinutes(d1.getMinutes() + 5);				}
			else if(t_t == 10)
			{					d2.setMinutes(d1.getMinutes() + 10);				}
			else if(t_t == 15)
			{					d2.setMinutes(d1.getMinutes() + 15);				}
			else if(t_t == 20)
			{					d2.setMinutes(d1.getMinutes() + 20);				}
			else if(t_t == 25)
			{					d2.setMinutes(d1.getMinutes() + 25);				}
			else if(t_t == 30)
			{					d2.setMinutes(d1.getMinutes() + 30);				}
			else if(t_t == 35)
			{					d2.setMinutes(d1.getMinutes() + 35);				}
			else if(t_t == 40)
			{					d2.setMinutes(d1.getMinutes() + 40);				}
			else if(t_t == 45)
			{					d2.setMinutes(d1.getMinutes() + 45);				}
			else if(t_t == 50)
			{					d2.setMinutes(d1.getMinutes() + 50);				}
			else if(t_t == 55)
			{					d2.setMinutes(d1.getMinutes() + 55);				}
			else if(t_t == 60)
			{					d2.setMinutes(d1.getMinutes() + 60);				}
			else if(t_t == 75)
			{					d2.setMinutes(d1.getMinutes() + 75);				}
			else if(t_t == 90)
			{					d2.setMinutes(d1.getMinutes() + 90);				}
			else if(t_t == 105)
			{					d2.setMinutes(d1.getMinutes() + 105);				}
			else if(t_t == 120)
			{					d2.setMinutes(d1.getMinutes() + 120);				}
			else if(t_t == 135)
			{					d2.setMinutes(d1.getMinutes() + 135);				}
			else if(t_t == 150)
			{					d2.setMinutes(d1.getMinutes() + 150);				}
			else if(t_t == 165)
			{					d2.setMinutes(d1.getMinutes() + 165);				}
			else				{					//page refresh....
			}
			
			//var date1 = moment().format("DD-MM-YYYY,h:MM:ss A");
			// Saturday, June 9th, 2007, 5:46:21 PM
			//alert(date1);
			
			var today = moment(d2);
			var date_time = today.format("D MMMM YYYY HH:mm:ss");
			//alert("Date time"+date_time);
			var date_time2;
			var setTime = date_time;
			//alert("Set Date time"+setTime);
			$("#countdown1").countdown({
			date: setTime,
			format: "on"
			},
			function() {
				 
				 var da2 = new Date();
				 var today222 = moment(da2);
				 var s2 = today222.format("YYYY-MM-DD  HH:mm:ss");
				 var today2=moment(d2);
				 date_time2 = today2.format("D MMMM YYYY HH:mm:ss");
				 //alert(date_time2);
				 alert("Your Time is Over.. Thanks.");
				 filename = "test_paper_generator/23_insert_adaptive.php?date_time2="+s2+"&new_test_id="+new_test_id+"&uid="+uid;
				 //alert(filename);
				 $.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					success: function(data, textStatus, xhr) {
						if(data == 'true')
						{
							alert("Adaptive Test Result has been  Sent to your registered email-id. Thank You.");
							setTimeout(function(){
								url="student_course_page.php";
								document.location.href=url;
							}, 3000);
						}
					},
				});
				
			});
			total_string_get_val=que_get;
			var da = new Date();
			var today2 = moment(da);
			datetime = today2.format("D MMMM YYYY HH:mm:ss");
			var da1 = new Date();
			var today22 = moment(da1);
			var s = today22.format("YYYY-MM-DD  HH:mm:ss");
			//alert(s);
			filename = "test_paper_generator/21_insert_adaptive.php?sub="+subject_id+"&user_id="+uid+"&req_que="+req_que+"&date_time="+s+"&date_time2="+date_time2+"&t_t="+t_t+"&select_test_wise="+select_test_wise+"&total_que_str="+total_string_get_val+"&cp_value12="+chap_id;
			//alert(filename);
			$.ajax({
				url: filename,
				type: 'GET',
				dataType: 'html',
				success: function(data, textStatus, xhr) {
					//alert(data);
					new_test_id=data;
					//$("input[name=ans_sel][value=" + data + "]").attr('checked', 'checked');
					//$("#new_test_id1").val(new_test_id);
					$("#new_test_id_gen").html(new_test_id);
					filename = "test_paper_generator/100_insert_omr_correct_table.php?total_string_get_val="+total_string_get_val+"&new_test_id="+new_test_id+"&req_que="+req_que+"&sbj1="+sbj1+"&subject_id="+subject_id;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						success: function(data, textStatus, xhr) {
							//alert(data);
						},
					});
				},
			});
		}
		function quesiton_dis()
		{
			qustion_dis=Number(check_name) + Number(1);
			$("#que_no_dis").html(qustion_dis);
		}
		$('#final_test').click(function(){
			var checkstr1 =  confirm('Are you sure? Want to do final submission...?');
			if(checkstr1 == true)
			{
				$("#timer").hide();
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
				filename = "test_paper_generator/23_insert_adaptive.php?date_time2="+s2+"&new_test_id="+new_test_id+"&uid="+uid;
				 //alert(filename);
				 $.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					success: function(data, textStatus, xhr) {
						if(data == 'true')
						{
							alert("Adaptive Test Result has been  Sent to your registered email-id. Thank You.");
							setTimeout(function(){
								url="student_course_page.php";
								document.location.href=url;
							}, 3000);
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
		function getContent2(filename, selectboxid)
		{
			$.ajax({
				url: filename,
				type: 'GET',
				dataType: 'html',
				
				success: function(data, textStatus, xhr) {
					var strtemp = "$('#" + selectboxid + "').html(data)";
					eval(strtemp);
					//alert(data);
					old_name=check_name;
					$('#view_que_sel input[type="radio"]').eq(old_name).attr("checked",true);
					ok_button_click_view();
				},
			});
		}
		function ok_button_click_view()
		{
			old_check_name=check_name;
			$('#view_que_sel input[type="radio"]').eq(old_check_name).attr("checked",false);
			check_name=Number(check_name) + Number(1);
			$('#view_que_sel input[type="radio"]').eq(check_name).attr("checked",true);
			$("#view_que_sel input:radio:checked").each(function() {
			
					idArray34=this.id;
					
			});
			var mySplitResult = idArray34.split("-");
			uniq_id_get=mySplitResult[0];
			check_name=mySplitResult[1];
			uniq_id_get_qus=uniq_id_get+"_Qus";
			check_name=Number(check_name) - Number(1);
			path="R:\\QuestionData\\"+sb1+"\\"+uniq_id_get_qus;
			filename = "test_paper_generator/copy_location.php?output="+path+"&mn="+uniq_id_get_qus;
			//alert(filename);
			$.ajax({
				url: filename,
				type: 'GET',
				dataType: 'html',
				
				success: function(data, textStatus, xhr) {
					callFlexPaperDocViewer(uniq_id_get_qus);
					quesiton_dis();
					data_sis_for_ans();
				},
			});
			$('input[name=ans_sel]').attr('checked', false);
			filename = "test_paper_generator/14_response_checked.php?uniq_id_get="+uniq_id_get+"&qno="+check_name+"&test_id="+new_test_id;
			//alert(filename);
			$.ajax({
				url: filename,
				type: 'GET',
				dataType: 'html',
				success: function(data, textStatus, xhr) {
					//alert(data);
					$("input[name=ans_sel][value=" + data + "]").attr('checked', 'checked');
				},
			});
		}
		function getInsert(filename)
		{
			$.ajax({
				url: filename,
				type: 'GET',
				dataType: 'html',
				
				success: function(data, textStatus, xhr) {
					//alert(data);
				},
			});
		}
	});
</script>
</head>
<body>
	<?php include 'online_test6.php'; ?>
</body>
</html>