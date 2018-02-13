<?php
	include_once 'config.php';
	session_start();
	
	$sub=$_GET['subject'];
	$test_id=$_GET['test_id'];
	$user_id=$_SESSION['sid'];
	$batch_id=$_SESSION['batch_id'];
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
<script> 
	$(document).ready(function(){
		var group_id='<?php echo $group_id;?>';var uid='<?php echo $user_id;?>';
		var uniq_id_get=0,marks_for_review="",marks_for_atm="",select_ans_wise="";
		var old_check_name="",check_name="",sub_id="",sub_test_id="";
		var sb='<?php echo $sub; ?>';
		var test_id='<?php echo $test_id; ?>';
		var sb_select="";
		var sb_select_name='Mock';
		var ck_phy=0,ck_che=0,ck_mat=0,ck_bio=0,ck_sce=0;
		var batch_id='<?php echo $batch_id;?>';
		$("#sub_bio").hide();$("#sub_phy").hide();$("#sub_mat").hide();$("#sub_che").hide();$("#sub_eng").hide();$("#sub_sce").hide();$("#sub_ss").hide();
		filename = "query_jee_moc/get_subject_id.php?get_test_id="+test_id;
		$.ajax({
			url: filename,
			type: 'GET',
			dataType: 'html',
			success: function(data, textStatus, xhr) {
				//alert(data);
				var mixing2 = data.split("-");
				sub_one=mixing2[0];
				sub_two=mixing2[1];
				sub_three=mixing2[2];
				sub_four=mixing2[3];
				if(sub_one == 1 || sub_one == 2 || sub_one == 3 || sub_one == 6 || sub_one == 7)
				{
					if(sub_one == 1){ $("#sub_phy").show();}else if(sub_one == 2){ $("#sub_che").show();}else if(sub_one == 3){ $("#sub_mat").show();}else if(sub_one == 6){ $("#sub_bio").show();}else if(sub_one == 7){ $("#sub_sce").show();}
				}
				if(sub_two == 1 || sub_two == 2 || sub_two == 3 || sub_two == 6 || sub_two == 7)
				{
					if(sub_two == 1){ $("#sub_phy").show();}else if(sub_two == 2){ $("#sub_che").show();}else if(sub_two == 3){ $("#sub_mat").show();}else if(sub_two == 6){ $("#sub_bio").show();}else if(sub_two == 7){ $("#sub_sce").show();}
				}
				if(sub_three == 1 || sub_three == 2 || sub_three == 3 || sub_three == 6 || sub_three == 7)
				{
					if(sub_three == 1){ $("#sub_phy").show();}else if(sub_three == 2){ $("#sub_che").show();}else if(sub_three == 3){ $("#sub_mat").show();}else if(sub_three == 6){ $("#sub_bio").show();}else if(sub_three == 7){ $("#sub_sce").show();}
				}
				if(sub_four == 1 || sub_four == 2 || sub_four == 3 || sub_four == 6 || sub_four == 7)
				{
					if(sub_four == 1){ $("#sub_phy").show();}else if(sub_four == 2){ $("#sub_che").show();}else if(sub_four == 3){ $("#sub_mat").show();}else if(sub_four == 6){ $("#sub_bio").show();}else if(sub_four == 7){ $("#sub_sce").show();}
				}
				//alert(sub_two+sub_three+sub_four+sub_one);
			},
		});
		function timer_set()
		{
			setInterval(function() 
			{
				 var da2 = new Date();
				 var today222 = moment(da2);
				 var s2 = today222.format("YYYY-MM-DD  HH:mm:ss");
				 //ge_second_time=ge_second_time+s2+",";
				 filename = "query_jee_moc/updatet_time.php?s2="+s2+"&user_id="+uid+"&test_id_new="+test_id;
				 //alert(filename);
				 $.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					
					success: function(data, textStatus, xhr) {
						//alert(data);
					},
				});
			}, 1000);
		}
		filename = "query_jee_moc/5_min_val_get.php?get_test_id="+test_id+"&user_id="+uid;
		//alert(filename);
		$.ajax({
			url: filename,
			type: 'GET',
			dataType: 'html',
			success: function(data, textStatus, xhr) {
				mixing=data;
				var mixing2 = mixing.split("-");
				min_val=mixing2[0];
				max_val=mixing2[1];
				t_t=mixing2[2];
				//alert(mixing);
				var date_time2="";
				var select_test_wise="online_test";
				var da = new Date();
				var today2 = moment(da);
				datetime = today2.format("D MMMM YYYY HH:mm:ss");
				var da1 = new Date();
				var today22 = moment(da1);
				var s = today22.format("YYYY-MM-DD  HH:mm:ss");
				//alert(s);
				filename = "query_jee_moc/22_it.php?sub="+sb+"&test_id="+test_id+"&req_que="+max_val+"&date_time="+s+"&date_time2="+date_time2+"&t_t="+t_t+"&select_test_wise="+select_test_wise+"&uid="+uid+"&batch_id="+batch_id;
				//alert(filename);
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					success: function(data, textStatus, xhr) {
						//alert(data);
						t_t1=parseInt(data);
						//alert(t_t1);
						var d1 = new Date (),
						d2 = new Date ( d1 );
						d2.setMinutes(d1.getMinutes() + t_t1);
						filename = "query_jee_moc/1_quesion_no_display.php?get_test_id="+test_id+"&uid="+uid;
						//alert(filename);
						getContent(filename, "view_que_sel");
						timer_set();
						$("#final_test").show();
						$("#timer_hide").show();$("#timer_hide1").show();
						$("#no_que_dis").html(max_val);
						if(sb == 14){$("#selected_subject").html("BIOLOGY");}
						else if(sb == 15){$("#selected_subject").html("MATHS");}
						else if(sb == 16){$("#selected_subject").html("PHYSICS");}
						else if(sb == 17){$("#selected_subject").html("CHEMISTRY");}
						else if(sb == 17){$("#selected_subject").html("CHEMISTRY");}
						else if(sb == 18){$("#selected_subject").html("SCIENCE");}
						else if(sb == 19){$("#selected_subject").html("ENGLISH");}
						else if(sb == 22){$("#selected_subject").html("SOCIAL SCIENCE");}
						else if(sb == 20){$("#selected_subject").html("MOCK");}
						//$("#selected_subject").html(sub_test_id);
						var today = moment(d2);
						var date_time = today.format("D MMMM YYYY HH:mm:ss");
						//alert(date_time);
						var setTime = date_time;
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
							 filename = "query_jee_moc/23_insert_adaptive.php?date_time2="+s2+"&new_test_id="+test_id+"&uid="+uid;
							 //alert(filename);
							 $.ajax({
								url: filename,
								type: 'GET',
								dataType: 'html',
								success: function(data, textStatus, xhr) {
									if(data == 'true')
									{
										setTimeout(function(){
											alert("Result has been Sent to your registered Email-ID. Thank You.");
											document.location.href="view_my_result_admin.php";
										}, 3000);
									}
								},
							});
						});
					},
				});
			},
		});
		$("#final_test").hide();
		$("#timer_hide").hide();
		$("#timer_hide1").hide();
		$("#sub_all").css('color','black');
		$("#sub_phy").click(function(){
			$(this).css('color','black');
			$("#sub_che,#sub_bio,#sub_mat,#sub_sce,#sub_all").css('color','white');
			sb_select=1;
			sb_select_name="Physics";
			check_name=ck_phy;
			$("#selected_subject").html("Physics");
			filename = "query_jee_moc/3_view_ok_button.php?uniq_id_get="+uniq_id_get+"&marks_for_review="+marks_for_review+"&marks_for_atm="+marks_for_atm+"&get_test_id1="+test_id+"&uid="+uid+"&sub="+sb_select+"&sb_select_name="+sb_select_name;
			//alert(filename);
			getContent3(filename, "view_que_sel");
		});
		$("#sub_che").click(function(){
			$(this).css('color','black');
			$("#sub_phy,#sub_bio,#sub_mat,#sub_sce,#sub_all").css('color','white');
			sb_select=2;
			sb_select_name="Chemistry";
			check_name=ck_che;
			$("#selected_subject").html("Chemistry");
			filename = "query_jee_moc/3_view_ok_button.php?uniq_id_get="+uniq_id_get+"&marks_for_review="+marks_for_review+"&marks_for_atm="+marks_for_atm+"&get_test_id1="+test_id+"&uid="+uid+"&sub="+sb_select+"&sb_select_name="+sb_select_name;
			//alert(filename);
			getContent3(filename, "view_que_sel");
		});
		$("#sub_bio").click(function(){
			$(this).css('color','black');
			$("#sub_che,#sub_phy,#sub_mat,#sub_sce,#sub_all").css('color','white');
			sb_select=6;
			sb_select_name="Biology";
			check_name=ck_bio;
			$("#selected_subject").html("Biology");
			filename = "query_jee_moc/3_view_ok_button.php?uniq_id_get="+uniq_id_get+"&marks_for_review="+marks_for_review+"&marks_for_atm="+marks_for_atm+"&get_test_id1="+test_id+"&uid="+uid+"&sub="+sb_select+"&sb_select_name="+sb_select_name;
			//alert(filename);
			getContent3(filename, "view_que_sel");
		});
		$("#sub_mat").click(function(){
			$(this).css('color','black');
			$("#sub_che,#sub_bio,#sub_phy,#sub_sce,#sub_all").css('color','white');
			sb_select=3;
			sb_select_name="Maths";
			check_name=ck_mat;
			$("#selected_subject").html("Mathematics");
			filename = "query_jee_moc/3_view_ok_button.php?uniq_id_get="+uniq_id_get+"&marks_for_review="+marks_for_review+"&marks_for_atm="+marks_for_atm+"&get_test_id1="+test_id+"&uid="+uid+"&sub="+sb_select+"&sb_select_name="+sb_select_name;
			//alert(filename);
			getContent3(filename, "view_que_sel");
		});
		$("#sub_sce").click(function(){
			$(this).css('color','black');
			$("#sub_che,#sub_bio,#sub_mat,#sub_phy,#sub_all").css('color','white');
			sb_select=7;
			sb_select_name="Science";
			check_name=ck_sce;
			$("#selected_subject").html("Science");
			filename = "query_jee_moc/3_view_ok_button.php?uniq_id_get="+uniq_id_get+"&marks_for_review="+marks_for_review+"&marks_for_atm="+marks_for_atm+"&get_test_id1="+test_id+"&uid="+uid+"&sub="+sb_select+"&sb_select_name="+sb_select_name;
			getContent3(filename, "view_que_sel");
		});
		$("#sub_all").click(function(){
			$(this).css('color','black');
			$("#sub_che,#sub_bio,#sub_mat,#sub_phy,#sub_sce").css('color','white');
			sb_select_name="Mock";
			$("#selected_subject").html("Mock");
			filename = "query_jee_moc/1_quesion_no_display.php?get_test_id="+test_id+"&uid="+uid;
			getContent(filename, "view_que_sel");
		});
		$('#final_test').click(function(){
			var checkstr1 =  confirm('Are you sure? Want to do final submission...?');
			if(checkstr1 == true)
			{
				//$("#timer").hide();
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
				filename = "query_jee_moc/23_insert_adaptive.php?date_time2="+s2+"&new_test_id="+test_id+"&uid="+uid;
				 $.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					success: function(data, textStatus, xhr) {
						if(data == 'true')
						{
							setTimeout(function(){
								alert("Result has been Sent to your registered Email-ID. Thank You.");
								document.location.href="view_my_result_admin.php";
							}, 3000);
						}
					},
				});
			}
			else
			{
				return false;
			}
		});
		$("#load_hide").hide();
		$('#view_que_sel').click(function(){
			$("#view_que_sel input:radio:checked").each(function() {
					idArray34=this.id;
					idArray344=this.value;
			});
			var mySplitResult = idArray34.split("-");
			uniq_id_get=mySplitResult[0];
			check_name=mySplitResult[1];
			uniq_id_get_qus=uniq_id_get+"_Qus";
			
//$("#que_no_dis").html(idArray344);
			filename = "query_jee_moc/get_subject.php?uniq_id_get="+uniq_id_get+"&get_test_id1="+test_id+"&qno="+check_name;
			//alert(filename);
			$.ajax({
				url: filename,
				type: 'GET',
				dataType: 'html',
				success: function(data, textStatus, xhr) {
					//alert(data);
					sb344=data;
					var mySplitResult = sb344.split("-");
					sb34=mySplitResult[0];
					sb_select=mySplitResult[1];
					//alert(sb_select);
					path="R:\\QuestionData\\"+sb34+"\\"+uniq_id_get_qus;
					filename = "query_jee_moc/copy_location.php?output="+path+"&mn="+uniq_id_get_qus;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							//alert(data);
							callFlexPaperDocViewer(uniq_id_get_qus);
						},
					});
					filename = "query_jee_moc/14_response_checked.php?uniq_id_get="+uniq_id_get+"&qno="+check_name+"&uid="+uid;
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
				},
			});
		});
		$('#save_next').click(function(){
			if(select_ans_wise == "")
			{
				alert("Please select your option....");
			}
			else
			{
				/*filename = "query_jee/get_subject.php?uniq_id_get="+uniq_id_get;
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					success: function(data, textStatus, xhr) {
						sb344=data;
						var mySplitResult = sb344.split("-");
						sb_select_name=mySplitResult[0];
						sb_select=mySplitResult[1];*/
						marks_for_atm=marks_for_atm+uniq_id_get+",";
						filename = "query_jee_moc/3_view_ok_button.php?uniq_id_get="+uniq_id_get+"&marks_for_review="+marks_for_review+"&marks_for_atm="+marks_for_atm+"&get_test_id1="+test_id+"&uid="+uid+"&sub="+sb_select+"&sb_select_name="+sb_select_name;
						//alert(filename);
						getContent2(filename, "view_que_sel");
						filename = "query_jee_moc/22_insert_response.php?uniq_id_get="+uniq_id_get+"&qno="+check_name+"&select_ans_wise="+select_ans_wise+"&get_test_id1="+test_id+"&uid="+uid;
						//alert(filename);
						$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							success: function(data, textStatus, xhr) {
								//alert(data);
								$('input[name=ans_sel]').attr('checked', false);
								$('input[name=ans_sel]').attr('checked', false);
							},
						});
						select_ans_wise="";
					/*},
				});*/
				//alert(uniq_id_get);
			}
		});
		$('#marks_for_review').click(function(){
		
			marks_for_review=marks_for_review+uniq_id_get+",";
			filename = "query_jee_moc/3_view_ok_button.php?uniq_id_get="+uniq_id_get+"&marks_for_review="+marks_for_review+"&marks_for_atm="+marks_for_atm+"&get_test_id1="+test_id+"&uid="+uid+"&sub="+sb_select+"&sb_select_name="+sb_select_name;
			getContent2(filename, "view_que_sel");
			if(select_ans_wise == '')
			{
				select_ans_wise='x';
			}
			filename = "query_jee_moc/22_insert_response.php?uniq_id_get="+uniq_id_get+"&qno="+check_name+"&select_ans_wise="+select_ans_wise+"&get_test_id1="+test_id+"&uid="+uid;
			//alert(filename);
			$.ajax({
				url: filename,
				type: 'GET',
				dataType: 'html',
				success: function(data, textStatus, xhr) {
					//alert(data);
					$('input[name=ans_sel]').attr('checked', false);
					$('input[name=ans_sel]').attr('checked', false);
				},
			});
			select_ans_wise="";
		});
		$('#clear_response').click(function(){
			filename = "query_jee_moc/15_clear_response.php?uniq_id_get="+uniq_id_get+"&qno="+check_name+"&get_test_id1="+test_id+"&uid="+uid;
			//alert(filename);
			$.ajax({
				url: filename,
				type: 'GET',
				dataType: 'html',
				success: function(data, textStatus, xhr) {
					$('input[name=ans_sel]').attr('checked', false);
					$('input[name=ans_sel]').attr('checked', false);
					uqid=uniq_id_get+",";
					marks_for_atm = marks_for_atm.replace(uqid, '');
					//alert(marks_for_atm);
					filename = "query_jee_moc/3_view_ok_button.php?uniq_id_get="+uniq_id_get+"&marks_for_review="+marks_for_review+"&marks_for_atm="+marks_for_atm+"&get_test_id1="+test_id+"&uid="+uid+"&sub="+sb_select+"&sb_select_name="+sb_select_name;
					getContent2(filename, "view_que_sel");
				},
			});
		});
		$('input[type="radio"][name="ans_sel"]').click(function(){
			var ans_type = $("input[type='radio'][name='ans_sel']:checked");
			if (ans_type.length > 0)
			select_ans_wise = ans_type.val();
			//alert(select_ans_wise);
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
					ok_button_click_view();							
				},
			});
		}
		function getContent3(filename, selectboxid)
		{
			$.ajax({
				url: filename,
				type: 'GET',
				dataType: 'html',
				
				success: function(data, textStatus, xhr) {
					var strtemp = "$('#" + selectboxid + "').html(data)";
					eval(strtemp);
					//alert(data);
					ok_button_click_view2();							
				},
			});
		}
		function ok_button_click_view2()
		{
			old_check_name=check_name;
			check_name=Number(check_name);
			//alert(old_check_name+check_name);
			if(sb_select == 1)
			{
				ck_phy=check_name;
			}
			else if(sb_select == 2)
			{
				ck_che=check_name;
			}
			else if(sb_select == 3)
			{
				ck_mat=check_name;
			}
			else if(sb_select == 6)
			{
				ck_bio=check_name;
			}
			else if(sb_select == 7)
			{
				ck_sce=check_name;
			}
			$('#view_que_sel input[type="radio"]').eq(old_check_name).attr("checked",false);
			$('#view_que_sel input[type="radio"]').eq(check_name).attr("checked",true);
			//alert("check_after : "+uniq_id_get);alert(check_name);sb
			$("#view_que_sel input:radio:checked").each(function() {
					idArray34=this.id;
			});
			var mySplitResult = idArray34.split("-");
			uniq_id_get=mySplitResult[0];
			check_name=mySplitResult[1];
			uniq_id_get_qus=uniq_id_get+"_Qus";
		//$("#que_no_dis").html(check_name+Number(1));
			if(sb_select_name == 'Mock')
			{
				filename = "query_jee_moc/get_subject2.php?get_test_id1="+test_id+"&qno="+check_name;
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					success: function(data, textStatus, xhr) {
						//alert(data);
						var mySplitResult = data.split("-");
						sb_select_name3=mySplitResult[0];
						sb_select=mySplitResult[1];
						path="R:\\QuestionData\\"+sb_select_name3+"\\"+uniq_id_get_qus;
						filename = "query_jee_moc/copy_location.php?output="+path+"&mn="+uniq_id_get_qus;
						//alert(filename);
						$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							
							success: function(data, textStatus, xhr) {
								//alert(data);
							},
						});
						callFlexPaperDocViewer(uniq_id_get_qus);
						filename = "query_jee_moc/14_response_checked.php?uniq_id_get="+uniq_id_get+"&qno="+check_name+"&uid="+uid;
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
					},
				});
			}
			else
			{
				path="R:\\QuestionData\\"+sb_select_name+"\\"+uniq_id_get_qus;
				filename = "query_jee_moc/copy_location.php?output="+path+"&mn="+uniq_id_get_qus;
				//alert(filename);
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					
					success: function(data, textStatus, xhr) {
						//alert(data);
					},
				});
				callFlexPaperDocViewer(uniq_id_get_qus);
				filename = "query_jee_moc/14_response_checked.php?uniq_id_get="+uniq_id_get+"&qno="+check_name+"&uid="+uid;
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
		}
		function ok_button_click_view()
		{
			old_check_name=check_name;
			check_name=Number(check_name) + Number(1);
			//alert("get "+old_check_name);
			$('#view_que_sel input[type="radio"]').eq(old_check_name).attr("checked",false);
			$('#view_que_sel input[type="radio"]').eq(check_name).attr("checked",true);
			//alert("check_after : "+uniq_id_get);alert(check_name);sb
			$("#view_que_sel input:radio:checked").each(function() {
					idArray34=this.id;
			});
			var mySplitResult = idArray34.split("-");
			uniq_id_get=mySplitResult[0];
			check_name=mySplitResult[1];
			uniq_id_get_qus=uniq_id_get+"_Qus";
			//$("#que_no_dis").html(check_name+Number(1));
			//alert("hetehd : "+check_name);
			if(sb_select_name == 'Mock')
			{
				filename = "query_jee_moc/get_subject2.php?get_test_id1="+test_id+"&qno="+check_name;
				//alert(filename);
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					success: function(data, textStatus, xhr) {
						//alert(data);
						var mySplitResult = data.split("-");
						sb_select_name3=mySplitResult[0];
						sb_select=mySplitResult[1];
						path="R:\\QuestionData\\"+sb_select_name3+"\\"+uniq_id_get_qus;
						filename = "query_jee_moc/copy_location.php?output="+path+"&mn="+uniq_id_get_qus;
						//alert(filename);
						$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							
							success: function(data, textStatus, xhr) {
								//alert(data);
							},
						});
						callFlexPaperDocViewer(uniq_id_get_qus);
						filename = "query_jee_moc/14_response_checked.php?uniq_id_get="+uniq_id_get+"&qno="+check_name+"&uid="+uid;
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
					},
				});
			}
			else
			{
				path="R:\\QuestionData\\"+sb_select_name+"\\"+uniq_id_get_qus;
				filename = "query_jee_moc/copy_location.php?output="+path+"&mn="+uniq_id_get_qus;
				//alert(filename);
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					
					success: function(data, textStatus, xhr) {
						//alert(data);
					},
				});
				callFlexPaperDocViewer(uniq_id_get_qus);
				filename = "query_jee_moc/14_response_checked.php?uniq_id_get="+uniq_id_get+"&qno="+check_name+"&uid="+uid;
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
		function getContent(filename, selectboxid)
		{
			$.ajax({
				url: filename,
				type: 'GET',
				dataType: 'html',
				
				success: function(data, textStatus, xhr) {
					var strtemp = "$('#" + selectboxid + "').html(data)";
					eval(strtemp);
					marks_for_atm = $('#first_td_1_1').attr("value");
					$('#view_que_sel input[type="radio"]').eq(0).attr("checked",true);
					$("#view_que_sel input:radio:checked").each(function() {
							idArray34=this.id;
					});
					var mySplitResult = idArray34.split("-");
					uniq_id_get=mySplitResult[0];
					check_name=mySplitResult[1];
					uniq_id_get_qus=uniq_id_get+"_Qus";
					//$("#que_no_dis").html(check_name+Number(1));
					path="R:\\QuestionData\\"+sb_select_name+"\\"+uniq_id_get_qus;
					filename = "query_jee_moc/copy_location.php?output="+path+"&mn="+uniq_id_get_qus;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							//alert(data);
						},
					});
					callFlexPaperDocViewer(uniq_id_get_qus);
					filename = "query_jee_moc/14_response_checked.php?uniq_id_get="+uniq_id_get+"&qno="+check_name+"&uid="+uid;
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
				},
			});									
		}
		/*function getContent2(filename, selectboxid)
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
				},
			});									
		}*/
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
	<?php include 'body_part_moc.php'; ?>
</body>
</html>