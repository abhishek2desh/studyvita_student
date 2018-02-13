<?php
	include_once 'config.php';
	session_start();
	
	$sub=$_GET['subject'];
	$test_id=$_GET['test_id'];
	$user_id='3214';
	$r_query=mysql_query("SELECT sd.group_id,sd.standard_id,sd.board_id,sd.batch_id,sd.branch_id,u.name FROM student_details sd,USER u WHERE u.id=sd.user_id AND sd.user_id='$user_id'");
	$r_query_row=mysql_fetch_array($r_query);
	$group_id=$r_query_row[0];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
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
		<link rel="stylesheet" href="css/styles2.css" />
		<script type="text/javascript" src="js/date_time.js"></script>
		<script src="js/countdown.js"></script>
		<script src="js/moment.js"></script>
		
		<!--	Timer Finish...  -->
		<!-- jqgrid-->
		<!-- JQ Grid JS and CSS  session  	
			<link rel="stylesheet" type="text/css" media="screen" href="jq_grid/jquery-ui-1.8.2.custom.css" /> -->
			<link rel="stylesheet" type="text/css" media="screen" href="jq_grid/ui.jqgrid.css" />
		
	<!--	<script src="js/jquery-1.7.2.min.js" type="jq_grid/javascript"></script>	-->
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
		
		$("#sub_bio").hide();$("#sub_phy").hide();$("#sub_mat").hide();$("#sub_che").hide();$("#sub_eng").hide();$("#sub_sce").hide();$("#sub_ss").hide();
		if(group_id == '9')
		{
			$("#sub_bio").hide();$("#sub_phy").show();$("#sub_mat").show();$("#sub_che").show();$("#sub_eng").hide();$("#sub_sce").hide();$("#sub_ss").hide();
		}
		else if(group_id == '10')
		{
			$("#sub_bio").show();$("#sub_phy").hide();$("#sub_mat").show();$("#sub_che").show();$("#sub_eng").hide();$("#sub_sce").hide();$("#sub_ss").hide();
		}
		else if(group_id == '11')
		{
			$("#sub_bio").show();$("#sub_phy").show();$("#sub_mat").show();$("#sub_che").show();$("#sub_eng").hide();$("#sub_sce").hide();$("#sub_ss").hide();
		}
		else if(group_id == '12')
		{
			$("#sub_bio").hide();$("#sub_phy").hide();$("#sub_mat").show();$("#sub_che").hide();$("#sub_eng").hide();$("#sub_sce").show();$("#sub_ss").hide();
		}
		else if(group_id == '13')
		{
			$("#sub_bio").hide();$("#sub_phy").hide();$("#sub_mat").hide();$("#sub_che").hide();$("#sub_eng").show();$("#sub_sce").hide();$("#sub_ss").show();
		}
		else if(group_id == '21')
		{
			$("#sub_bio").hide();$("#sub_phy").hide();$("#sub_mat").show();$("#sub_che").hide();$("#sub_eng").show();$("#sub_sce").show();$("#sub_ss").show();
		}
		$("#sub_phy").click(function(){
			sub_test_id=$("#sub_phy").val();
			if(sub_test_id == 'physics'){sub_id='16';}
			//alert(sub_test_id);
			filename = "query/get_test_id.php?sub_test_id="+sub_test_id;
			//alert(filename);
			getContent(filename, "test_id");
		});
		$("#sub_bio").click(function(){
			sub_test_id=$("#sub_bio").val();
			if(sub_test_id == 'biology'){sub_id='14';}
			//alert(sub_test_id);
			filename = "query/get_test_id.php?sub_test_id="+sub_test_id;
			//alert(filename);
			getContent(filename, "test_id");
		});
		$("#sub_che").click(function(){
			sub_test_id=$("#sub_che").val();
			if(sub_test_id == 'chemistry'){sub_id='17';}
			//alert(sub_test_id);
			filename = "query/get_test_id.php?sub_test_id="+sub_test_id;
			//alert(filename);
			getContent(filename, "test_id");
		});
		$("#sub_mat").click(function(){
			sub_test_id=$("#sub_mat").val();
			if(sub_test_id == 'maths'){sub_id='15';}
			//alert(sub_test_id);
			filename = "query/get_test_id.php?sub_test_id="+sub_test_id;
			//alert(filename);
			getContent(filename, "test_id");
		});
		
		$("#sub_eng").click(function(){
			sub_test_id=$("#sub_eng").val();
			if(sub_test_id == 'english'){sub_id='19';}
			//alert(sub_test_id);
			filename = "query/get_test_id.php?sub_test_id="+sub_test_id;
			//alert(filename);
			getContent(filename, "test_id");
		});
		$("#sub_sce").click(function(){
			sub_test_id=$("#sub_sce").val();
			if(sub_test_id == 'science'){sub_id='18';}
			//alert(sub_test_id);
			filename = "query/get_test_id.php?sub_test_id="+sub_test_id;
			//alert(filename);
			getContent(filename, "test_id");
		});
		$("#sub_ss").click(function(){
			sub_test_id=$("#sub_ss").val();
			if(sub_test_id == 'social study'){sub_id='22';}
			//alert(sub_test_id);
			filename = "query/get_test_id.php?sub_test_id="+sub_test_id;
			//alert(filename);
			getContent(filename, "test_id");
		});
		$("#final_test").hide();
		$("#timer_hide").hide();
		$("#timer_hide1").hide();
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
				//alert(new_test_id);
				//alert(sb);alert(req_que);alert(datetime);alert(datetime3);alert(t_t);
				 filename = "query/23_insert_adaptive.php?date_time2="+s2+"&new_test_id="+get_test_id1;
				// alert(filename);
				 $.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					success: function(data, textStatus, xhr) {
						//alert(data);
						//$("input[name=ans_sel][value=" + data + "]").attr('checked', 'checked');
					},
				});
				setTimeout(function(){
					window.location.reload();
				}, 3000);
			}
			else
			{
				return false;
			}
			//alert("Test Now finish...");
		});
		$("#load_hide").hide();
		$("#test_id").change(function(){
			$("#main_div").hide();
			$("#load_hide").show();
			get_test_id1=$("#test_id").val();
			//t_t='5';
			filename = "query/5_min_val_get.php?get_test_id="+get_test_id1;
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
					filename = "query/22_it.php?sub="+sub_id+"&test_id="+get_test_id1+"&req_que="+max_val+"&date_time="+s+"&date_time2="+date_time2+"&t_t="+t_t+"&select_test_wise="+select_test_wise+"&uid="+uid;
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
							d2.setMinutes(d1.getMinutes() + 5);
							filename = "query/1_quesion_no_display.php?get_test_id="+get_test_id1+"&uid="+uid;
							//alert(filename);
							getContent2(filename, "view_que_sel");
							$("#final_test").show();
							$("#timer_hide").show();$("#timer_hide1").show();
							$("#no_que_dis").html(max_val);
							$("#selected_subject").html(sub_test_id);
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
								 filename = "query/23_insert_adaptive.php?date_time2="+s2+"&new_test_id="+get_test_id1;
								 //alert(filename);
								 $.ajax({
									url: filename,
									type: 'GET',
									dataType: 'html',
									success: function(data, textStatus, xhr) {
										//alert(data);
										//$("input[name=ans_sel][value=" + data + "]").attr('checked', 'checked');
									},
								});
								setTimeout(function(){
									window.location.reload();
								}, 3000);
							});
						},
					});
				},
			});
		/*
			filename = "query/22_it.php?test_id="+test_id+"&user_id="+uid+"&sub_id";
			$.ajax({
				url: filename,
				type: 'GET',
				dataType: 'html',
				success: function(data, textStatus, xhr) {
					filename="query/1_quesion_no_display.php";
					getContent(filename,"view_que_sel");
				
				},
			});
		*/
		});
		$('#view_que_sel').click(function(){
			var idArray1 = [];
			var idArray2 = [];
			$("#view_que_sel input:checkbox").each(function() {
				if ($(this).is(":checked"))
				{
					idArray1.push(this.id);
					idArray2.push(this.name);
				}
			});
			uniq_id_get = idArray1;
			uniq_id_get_qus=uniq_id_get+"_Qus";
			uniq_id_get_length=uniq_id_get.length;
			check_name = idArray2;
			if(uniq_id_get_length == 1)
			{
				path="R:\\QuestionData\\Physics"+uniq_id_get_qus;
				filename = "copy_location.php?output="+path+"&mn="+uniq_id_get_qus;
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					
					success: function(data, textStatus, xhr) {
						//alert(data);
					},
				});
				callFlexPaperDocViewer(uniq_id_get_qus);
				filename = "query/14_response_checked.php?uniq_id_get="+uniq_id_get+"&qno="+check_name;
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
			else
			{
				if(uniq_id_get_length == 0)
				{
					$('input[name=ans_sel]').attr('checked', false);
				}
				else if(uniq_id_get_length == 2)
				{
					alert("Please select only one Question..");
					$('input[name=ans_sel]').attr('checked', false);
					$('input[name=ans_sel]').attr('checked', false);
				}
			}
		});
		$('#save_next').click(function(){
			if(select_ans_wise == "")
			{
				alert("Please select your option....");
			}
			else
			{
				marks_for_atm=marks_for_atm+uniq_id_get+",";	
				filename = "query/3_view_ok_button.php?uniq_id_get="+uniq_id_get+"&marks_for_review="+marks_for_review+"&marks_for_atm="+marks_for_atm+"&get_test_id1="+get_test_id1+"&uid="+uid;
				//alert(filename);
				getContent2(filename, "view_que_sel");
				filename = "query/22_insert_response.php?uniq_id_get="+uniq_id_get+"&qno="+check_name+"&select_ans_wise="+select_ans_wise+"&get_test_id1="+get_test_id1+"&uid="+uid;
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
			}
		});
		$('#marks_for_review').click(function(){
			marks_for_review=marks_for_review+uniq_id_get+",";
			filename = "query/3_view_ok_button.php?uniq_id_get="+uniq_id_get+"&marks_for_review="+marks_for_review+"&marks_for_atm="+marks_for_atm+"&get_test_id1="+get_test_id1+"&uid="+uid;
			getContent2(filename, "view_que_sel");
		});
		$('#clear_response').click(function(){
			filename = "query/15_clear_response.php?uniq_id_get="+uniq_id_get+"&qno="+check_name+"&get_test_id1="+get_test_id1+"&uid="+uid;
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
					filename = "query/3_view_ok_button.php?uniq_id_get="+uniq_id_get+"&marks_for_review="+marks_for_review+"&marks_for_atm="+marks_for_atm;
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
		function ok_button_click_view()
		{
			
			old_check_name=check_name;
			check_name=Number(check_name) + Number(1);
			//alert(old_check_name+check_name);
			$('#view_que_sel input[type="checkbox"]').eq(old_check_name).attr("checked",false);
			$('#view_que_sel input[type="checkbox"]').eq(check_name).attr("checked",true);
			//alert("check_after : "+uniq_id_get);alert(check_name);
			var idArray1 = [];
			var idArray2 = [];
			
			$("#view_que_sel input:checkbox").each(function() {
				if ($(this).is(":checked"))
				{
					idArray1.push(this.id);
					idArray2.push(this.name);
				}
			});
			uniq_id_get = idArray1;
			uniq_id_get_length=uniq_id_get.length;
			check_name = idArray2;
			uniq_id_get_qus=uniq_id_get+"_Qus";
			path="R:\\QuestionData\\Physics\\"+uniq_id_get_qus;
			filename = "copy_location.php?output="+path+"&mn="+uniq_id_get_qus;
			////alert(filename);
			$.ajax({
				url: filename,
				type: 'GET',
				dataType: 'html',
				
				success: function(data, textStatus, xhr) {
					//alert(data);
				},
			});
			callFlexPaperDocViewer(uniq_id_get_qus);
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
					//alert(data);
					
				},
			});									
		}
		function getContent2(filename, selectboxid)
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
		}
	});
</script> 
</head>
<body>
	<?php include 'body_part.php'; ?>
</body>
</html>