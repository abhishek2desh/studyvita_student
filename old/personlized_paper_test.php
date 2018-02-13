<?php
	include 'config.php';
	
	session_start();
	$val=$_GET['val'];
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
		
		<link rel="stylesheet" type="text/css" media="screen" href="css/jquery-ui-1.8.2.custom.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="css/ui.jqgrid.css" />
		<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
		<link href="css/bg1.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" media="screen" href="css/ui.jqgrid.css" />
		<link rel="stylesheet" href="css/jquery-ui.css" />
		<link href="css/style_images.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="css/flexpaper.css" />
		<script src="js/jquery-1.8.3.js"></script>
		<script src="js/jquery-ui.js"></script>
		<script type="text/javascript" src="js/flexpaper.js"> </script>
		<!--<script type="text/javascript" src="js/jquery.min.js"> </script>	-->
		<script type="text/javascript" src="js/flexpaper_handlers.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers_debug.js"> </script>
		<link rel="stylesheet" href="css/styles2.css" />
		<script src="js/countdown.js"></script>
		<script src="js/moment.js"></script>
		<!-- JQ Grid JS and CSS  session  	
			<link rel="stylesheet" type="text/css" media="screen" href="jq_grid/jquery-ui-1.8.2.custom.css" /> -->
			<link rel="stylesheet" type="text/css" media="screen" href="jq_grid/ui.jqgrid.css" />
		
	<!--	<script src="js/jquery-1.7.2.min.js" type="jq_grid/javascript"></script>	-->
			<script src="js/grid.locale-en.js" type="jq_grid/javascript"></script>
			<script src="js/jquery.jqGrid.min.js" type="jq_grid/javascript"></script>
		
	<!-- Date and Time	-->
		<script type="text/javascript" src="js/date_time.js"></script>
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
			 #footer {
				position: fixed;
				bottom: 0;
				width: 100%;
			}
			.multiselect {
				width:20em;
				height:15em;
				border:solid 1px #c0c0c0;
				overflow:auto;
			}
			.multiselect label {
				display:block;
			}
			 
			.multiselect-on {
				color:#ffffff;
				background-color:#000099;
			}
			.main_div { 
			height: auto;
			width: 80%; 
			background-color: white; 
			/* outer shadows  (note the rgba is red, green, blue, alpha) */
			-webkit-box-shadow: 0px 0px 12px rgba(0, 0, 0, 0.4); 
			-moz-box-shadow: 0px 1px 6px rgba(23, 69, 88, .5);
			/* rounded corners */
			-webkit-border-radius: 12px;
			-moz-border-radius: 7px; 
			border-radius: 7px;
			/* gradients */
			background: -webkit-gradient(linear, left top, left bottom, 
			color-stop(0%, white), color-stop(15%, white), color-stop(100%, #D7E9F5)); 
			background: -moz-linear-gradient(top, white 0%, white 55%, #D5E4F3 130%); 
			}
			.main_div2 { 
			height: auto;
			width: auto; 
			background-color: white; 
			/* outer shadows  (note the rgba is red, green, blue, alpha) */
			-webkit-box-shadow: 0px 0px 12px rgba(0, 0, 0, 0.4); 
			-moz-box-shadow: 0px 1px 6px rgba(23, 69, 88, .5);
			/* rounded corners */
			-webkit-border-radius: 12px;
			-moz-border-radius: 7px; 
			border-radius: 7px;
			/* gradients */
			background: -webkit-gradient(linear, left top, left bottom, 
			color-stop(0%, white), color-stop(15%, white), color-stop(100%, #D7E9F5)); 
			background: -moz-linear-gradient(top, white 0%, white 55%, #D5E4F3 130%); 
			}
		</style>
		
		<style type="text/css">
		#flashContent { display:none; }
		
		.ui-jqgrid .ui-state-highlight { background: #F39814; color:white; }
		
		.button_css{
		border-color:#8E6AF5;border-width: 1px 1px 1px 15px;border-style: solid; -webkit-border-radius: 3px; -moz-border-radius: 3px;border-radius: 3px;font-size:12px;font-family:arial, helvetica, sans-serif; padding: 3px 3px 3px 3px; text-decoration:none; display:inline-block;text-shadow: -1px -1px 0 rgba(0,0,0,0.3);font-weight:bold; color: #FFFFFF;
		 background-color: #3093c7; background-image: -webkit-gradient(linear, left top, left bottom, from(#3093c7), to(#1c5a85));
		 background-image: -webkit-linear-gradient(top, #3093c7, #1c5a85);
		 background-image: -moz-linear-gradient(top, #3093c7, #1c5a85);
		 background-image: -ms-linear-gradient(top, #3093c7, #1c5a85);
		 background-image: -o-linear-gradient(top, #3093c7, #1c5a85);
		 background-image: linear-gradient(to bottom, #3093c7, #1c5a85);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#3093c7, endColorstr=#1c5a85);
		}

		.button_css:hover{
		 border-top-color: #8E6AF5;border-right-color: #8E6AF5;border-bottom-color: #8E6AF5;border-left-color: #8E6AF5;border-width: 1px 15px 1px 1px;border-style: solid;
		 background-color: #26759e; background-image: -webkit-gradient(linear, left top, left bottom, from(#26759e), to(#133d5b));
		 background-image: -webkit-linear-gradient(top, #26759e, #133d5b);
		 background-image: -moz-linear-gradient(top, #26759e, #133d5b);
		 background-image: -ms-linear-gradient(top, #26759e, #133d5b);
		 background-image: -o-linear-gradient(top, #26759e, #133d5b);
		 background-image: linear-gradient(to bottom, #26759e, #133d5b);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#26759e, endColorstr=#133d5b);
		}
		
		.classname {
			-moz-box-shadow:inset 0px 0px 0px 0px #ffffff;
			-webkit-box-shadow:inset 0px 0px 0px 0px #ffffff;
			box-shadow:inset 0px 0px 0px 0px #ffffff;
			background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #ededed), color-stop(1, #dfdfdf) );
			background:-moz-linear-gradient( center top, #ededed 5%, #dfdfdf 100% );
			filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ededed', endColorstr='#dfdfdf');
			background-color:#ededed;
			-moz-border-radius:24px;
			-webkit-border-radius:24px;
			border-radius:24px;
			border:3px solid #dcdcdc;
			display:inline-block;
			color:#777777;
			font-family:arial;
			font-size:13px;
			font-weight:bold;
			padding:3px 10px;
			text-decoration:none;
			text-shadow:1px 1px 0px #ffffff;
		}.classname:hover {
			background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #dfdfdf), color-stop(1, #ededed) );
			background:-moz-linear-gradient( center top, #dfdfdf 5%, #ededed 100% );
			filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#dfdfdf', endColorstr='#ededed');
			background-color:#dfdfdf;
		}.classname:active {
			position:relative;
			top:1px;
		}
		/* This imageless css button was generated by CSSButtonGenerator.com */
		html, body	{ height:100%;width:100%; }
			body { margin:0; overflow:auto; }
		
		</style>
		<script>
			$(document).ready(function(){
				var uri = window.location.toString();
				if (uri.indexOf("?") > 0) {
					var clean_uri = uri.substring(0, uri.indexOf("?"));
					window.history.replaceState({}, document.title, clean_uri);
				}
				var val='<?php echo $val;?>';
				var sb11='<?php echo $subject_id;?>';
				var board_type=1,omr_start_time = "",sb1="",sbj1="";
				var uniq_id_get=0,marks_for_review="",marks_for_atm="",select_ans_wise="";
				var all_atm="",req_que="",que_sel="";
				var sel_que_list=0,val_start="";
				var date_time2,date_time,datetime,t_t;
				var datepickerVal44='<?php echo $today ?>',datepickerVal45='<?php echo $today ?>';
				var uid='<?php echo $s5;?>';
				var new_test_id="",st_array="",j="",k="";
				var qno_id_count=0,uniq_id_get_qus="",cp_value12="";
				var sb12="";
				var sb='<?php echo $subject_id;?>',std=0,total_string_get_val="",ge_second_time="";
				//alert(val);
					var str_to_split="";
				var correct="",incorrect="",allq="",uans="";
				if(val == 1)
				{
					$("#main_div").show();
					$("#main_div_1").hide();$("#main_div_2").hide();
				}
				else if(val == 2)
				{
					$("#main_div").hide();
					$("#main_div_1").show();
					$("#main_div_2").hide();
				}
				else if(val == 3)
				{
					$("#main_div").hide();
					$("#main_div_1").hide();
					$("#main_div").hide();
					$("#main_div_2").show();
					filename = "test_paper_generator/personal_30_view_student_test_result.php?uid="+uid;
					//alert(filename);
					getContent(filename, "view_result_of_adaptive_test_student");
				}
				function getContent34_test(filename, selectboxid)
				{
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							var strtemp = "$('#" + selectboxid + "').html(data)";
							eval(strtemp);
							//alert(data);
							$("#view_que_sel_1 *").attr("disabled", "disabled").off('click');
							correct = $('#first_td_1').attr("value");
					incorrect = $('#first_td_2').attr("value");
					unans = $('#first_td_3').attr("value");
					allq=$('#first_td_4').attr("value");
					//alert(allq);
						$('input[name=checked_choice][value=All]').attr('checked', true); 
						st_array=allq.split(",");
							j=0;
							$('#view_que_sel_1 input[type="radio"]').eq(j).attr("checked",true);
							k=0;
							response_get();
							$("#view_que_sel_1 input:radio:checked").each(function() {
									idArray34=this.id;
							});
							var mySplitResult = idArray34.split("-");
							response_uniq_id_get=mySplitResult[0];
							response_QID=mySplitResult[1];
							//alert(response_uniq_id_get);
							path="R:\\QuestionData\\"+sb12+"\\"+response_uniq_id_get;
							filename = "test_paper_generator/copy_location.php?output="+path+"&mn="+response_uniq_id_get;
							//alert(filename);
							$.ajax({
								url: filename,
								type: 'GET',
								dataType: 'html',
								
								success: function(data, textStatus, xhr) {
									//alert(data);
								},
							});
							callFlexPaperDocViewer1(response_uniq_id_get);
						},
					});
					
				}
				function getContent34(filename, selectboxid)
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
				function getContent_que(filename, selectboxid)
				{
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							var strtemp = "$('#" + selectboxid + "').html(data)";
							eval(strtemp);
							$('#view_que_sel input[type="checkbox"]').eq(0).attr("checked",true);
							all_atm=all_atm+",";
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
							check_name = idArray2;
							uniq_id_get_length=uniq_id_get.length;
							uniq_id_get_qus=uniq_id_get+"_Qus";
							//alert(uniq_id_get);
							check_name=Number(check_name) - Number(1);
							path="R:\\QuestionData\\"+sb122+"\\"+uniq_id_get_qus;
							filename = "test_paper_generator/copy_location.php?output="+path+"&mn="+uniq_id_get_qus;
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
						},
					});
				}
				function getContent33(filename, selectboxid)
				{
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							var strtemp = "$('#" + selectboxid + "').html(data)";
							eval(strtemp);
							//$("#sel_type").show();
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
							//alert(data);
							old_name=check_name;
							$('#view_que_sel input[type="checkbox"]').eq(old_name).attr("checked",true);
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
							old_name=check_name;
							$('#view_que_sel input[type="checkbox"]').eq(old_name).attr("checked",true);
							ok_button_click_view();
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
				if(sb==14){ sb122="Biology";}
				else if(sb==15){ sb122="Maths";}
				else if(sb==16){ sb122="Physics";}
				else if(sb==17){ sb122="Chemistry";}
				else if(sb==18){ sb122="Science";}
				else if(sb==19){ sb122="English";}
				else if(sb==20){ sb122="Mock";}
				else if(sb==22){ sb122="SocialScience";}
				filename = "test_paper_generator/personal_test_id_get.php?sb="+sb+"&uid="+uid;
				//alert(filename);
				getContent(filename, "testd");
				if(sb11==14){ sb12="Biology";}
				else if(sb11==15){ sb12="Maths";}
				else if(sb11==16){ sb12="Physics";}
				else if(sb11==17){ sb12="Chemistry";}
				else if(sb11==18){ sb12="Science";}
				else if(sb11==19){ sb12="English";}
				else if(sb11==20){ sb12="Mock";}
				else if(sb11==22){ sb12="SocialScience";}
				filename = "test_paper_generator/personal_20_get_test_id2.php?sub_id="+sb11+"&uid="+uid;
				//alert(filename);
				getContent(filename, "test_id");
				$( "#datepicker44" ).datepicker({
					dateFormat: "yy-mm-dd",
					altField: "#alternate",
					altFormat: "DD, d MM, yy",
					onSelect: function() { 
						datepickerVal44 = $("#datepicker44").val();
						//alert(datepickerVal44);
						filename = "test_paper_generator/20_get_test_id.php?sub_id="+sb11+"&uid="+uid+"&dt1="+datepickerVal44+"&dt2="+datepickerVal45;
						//alert(filename);
						getContent(filename, "test_id");
						//alert(sb11+uid+datepickerVal45);
						//alert(datepickerVal44);
					}
				});
				$( "#datepicker45" ).datepicker({
					dateFormat: "yy-mm-dd",
					altField: "#alternate",
					altFormat: "DD, d MM, yy",
					onSelect: function() { 
						datepickerVal45 = $("#datepicker45").val();
						filename = "test_paper_generator/20_get_test_id.php?sub_id="+sb11+"&uid="+uid+"&dt1="+datepickerVal44+"&dt2="+datepickerVal45;
						//alert(filename);
						getContent(filename, "test_id");
					}
				});
				function response_get()
				{
					m1=j;
					//filename = "test_paper_generator/501_resoponse_get.php?test_id="+test_id+"&uid="+uid+"&qno="+m1+"&assignment_id="+assignment_id;
					filename = "test_paper_generator/Get_uniqid_uploaddetail.php?test_id="+test_id+"&uid="+uid+"&qno="+m1;
					//alert(filename);
					getContent(filename, "response_get");
				}
				$("#view_dg_report").click(function(){
					filename = "test_paper_generator/36_test_report_get.php?test_id="+test_id+"&uid="+uid;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							//alert("sanjay : "+data);
							dg_report=data;
							alert(dg_report);
							callFlexPaperDocViewer1(dg_report);
						},
					});
					//getContent34(filename, "view_que_sel_21");
				});
				$('#sb11').change(function(){
					sb11 = $('#sb11').val();
					if(sb11==14){ sb12="Biology";}
					else if(sb11==15){ sb12="Maths";}
					else if(sb11==16){ sb12="Physics";}
					else if(sb11==17){ sb12="Chemistry";}
					else if(sb11==18){ sb12="Science";}
					else if(sb11==19){ sb12="English";}
					else if(sb11==20){ sb12="Mock";}
					else if(sb11==22){ sb12="SocialScience";}
					filename = "test_paper_generator/personal_20_get_test_id2.php?sub_id="+sb11+"&uid="+uid;
					//alert(filename);
					getContent(filename, "test_id");
				});
				$('#test_id').change(function(){
					test_id = $("#test_id").val();
					//alert(test_id);
					filename = "test_paper_generator/personal_21_get_assignment_id2.php?test_id="+test_id;
					//alert(filename);
					getContent(filename, "assignment_id");
					//filename = "test_paper_generator/personal_24_get_question_uniq.php?test_id="+test_id+"&uid="+uid;
					//alert(filename);
					//getContent34(filename, "view_que_sel_1");
					/*filename = "test_paper_generator/20_get_answer_type.php?test_id="+test_id;
					//alert(filename);
					getContent(filename, "answer_type");*/
				});
				$('#assignment_id').change(function(){
					assignment_id = $("#assignment_id").val();
					filename = "test_paper_generator/personal_24_get_question_uniq.php?test_id="+test_id+"&uid="+uid+"&assignment_id="+assignment_id;
					//alert(filename);
					getContent34_test(filename, "view_que_sel_1");
					/*filename = "test_paper_generator/20_get_answer_type.php?test_id="+test_id;
					//alert(filename);
					getContent(filename, "answer_type");*/
				});
				$('input[type="radio"][name="test_type"]').click(function(){
					var test_type = $("input[type='radio'][name='test_type']:checked");
					if (test_type.length > 0)
					select_test_wise = test_type.val();
					if(select_test_wise == "practise")
					{
						$("#main_div_1").hide();
						$("#main_div").show();$("#main_div_2").hide();
					}
					else if(select_test_wise == "test")
					{
						$("#main_div").show();
						$("#main_div_1").hide();$("#main_div_2").hide();
					}
					else if(select_test_wise == "mistakes")
					{
						$("#main_div").hide();
						$("#main_div_1").show();
						$("#main_div_2").hide();
					}
					else if(select_test_wise == "result")
					{
						$("#main_div").hide();
						$("#main_div_1").hide();
						$("#main_div").hide();
						$("#main_div_2").show();
						filename = "test_paper_generator/personal_30_view_student_test_result.php?uid="+uid;
						//alert(filename);
						getContent(filename, "view_result_of_adaptive_test_student");
					}
				});
				$('#sb').change(function(){
					sb = $('#sb').val();
					if(sb==14){ sb122="Biology";}
					else if(sb==15){ sb122="Maths";}
					else if(sb==16){ sb122="Physics";}
					else if(sb==17){ sb122="Chemistry";}
					else if(sb==18){ sb122="Science";}
					else if(sb==19){ sb122="English";}
					else if(sb==20){ sb122="Mock";}
					else if(sb==22){ sb122="SocialScience";}
					filename = "test_paper_generator/personal_test_id_get.php?sb="+sb+"&uid="+uid;
					//alert(filename);
					getContent(filename, "testd");
				});
				$('#testd').change(function(){
					p_test_id2 = $('#testd').val();
					//alert(p_test_id2);
					var mySplitResult = p_test_id2.split("-");
					p_test_id=mySplitResult[0];
					p_test_id_uq=mySplitResult[1];
					p_ass_id_uq=mySplitResult[2];
					p_total_que=mySplitResult[3];
					as_pr=p_test_id+"_"+p_ass_id_uq;
					$("#per_as_id").html(as_pr);
					$("#per_tot_que").html(p_total_que);
					$("#test_timer").show();
				});
				$('input[type="radio"][name="test_timer"]').click(function(){
					var test_timer = $("input[type='radio'][name='test_timer']:checked");
					if (test_timer.length > 0)
					test_timer_wise = test_timer.val();
					
					if(test_timer_wise == "with_test")
					{
						$(".set_time").show();
						$("#sel_time").show();
					}
					else if(test_timer_wise == "without_test")
					{
						$(".set_time").hide();
						$("#sel_time").hide();
						$("#start_test").show();
					}
				});
				$('#sel_time').change(function(){
					$("#start_test").show();
				});
				$(".loading-gif").hide();
				$("#start_test").hide();
				$("#timer").hide();
				$(".set_time").hide();
				$("#sel_time").hide();
				$("#test_timer").hide();
				$('input[type="radio"][name="ans_sel"]').click(function(){
					var ans_type = $("input[type='radio'][name='ans_sel']:checked");
					if (ans_type.length > 0)
					select_ans_wise = ans_type.val();
					//alert(select_ans_wise);
				});
				
				$('#start_test').click(function(){
					filename = "test_paper_generator/personal_12_check_submit_que1.php?test_id="+p_test_id+"&uid="+uid;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							//alert(data);
							if(data == "GOT")
							{
								alert("Already Given Test");
							}
							else
							{
								filename = "test_paper_generator/personal_11_view_que1.php?uniq_id="+p_test_id_uq;
								//alert(filename);
								getContent_que(filename, "view_que_sel");
								if(test_timer_wise == "with_test")
								{
									t_t = $("#sel_time").val();
									//alert(t_t);
									$("#timer").show();
									$("#start_test").hide();
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
									alert("Your test starts now. Best of luck.");
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
										// alert(date_time2);
										 alert("Your Time is Over.. Thanks.");
										 filename = "test_paper_generator/personal_23_insert_adaptive.php?date_time2="+s2+"&new_test_id="+p_test_id+"&user_id="+<?php echo $s5;?>+"&p_ass_id_uq="+p_ass_id_uq;
										// alert(filename);
										 $.ajax({
											url: filename,
											type: 'GET',
											dataType: 'html',
											success: function(data, textStatus, xhr) {
												if(data == 'true')
												{
													setTimeout(function(){
														alert("Personlized Test Result has been Sent to your registered email-id. Thank You.");
														window.location.reload();
													}, 3000);
												}
											},
										});
									});
									var da = new Date();
									var today2 = moment(da);
									datetime = today2.format("D MMMM YYYY HH:mm:ss");
									var da1 = new Date();
									var today22 = moment(da1);
									var s = today22.format("YYYY-MM-DD  HH:mm:ss");
									filename = "test_paper_generator/personal_21_insert_adaptive.php?sub="+sb+"&user_id="+<?php echo $s5;?>+"&date_time="+s+"&date_time2="+date_time2+"&uniq_id="+p_test_id_uq+"&test_id_new="+p_test_id+"&p_ass_id_uq="+p_ass_id_uq;
									//alert(filename);
									$.ajax({
										url: filename,
										type: 'GET',
										dataType: 'html',
										success: function(data, textStatus, xhr) {
											//alert(data);
											timer_set();
										},
									});
								}
								else if(test_timer_wise == "without_test")
								{
									$("#start_test").hide();
									alert("Your test starts now. Best of luck.");
									var da = new Date();
									var today2 = moment(da);
									datetime = today2.format("D MMMM YYYY HH:mm:ss");
									var da1 = new Date();
									var today22 = moment(da1);
									var s = today22.format("YYYY-MM-DD  HH:mm:ss");
									filename = "test_paper_generator/personal_21_insert_adaptive.php?sub="+sb+"&user_id="+<?php echo $s5;?>+"&date_time="+s+"&date_time2="+date_time2+"&uniq_id="+p_test_id_uq+"&test_id_new="+p_test_id+"&p_ass_id_uq="+p_ass_id_uq;
									//alert(filename);
									$.ajax({
										url: filename,
										type: 'GET',
										dataType: 'html',
										success: function(data, textStatus, xhr) {
											//alert(data);
											timer_set();
										},
									});
								}
							}
						},
					});
					
				});
				$('#marks_for_review').click(function(){
				
					marks_for_review=marks_for_review+uniq_id_get+",";
					filename = "test_paper_generator/personal_14_view_que.php?uniq_id="+p_test_id_uq+"&marks_for_review="+marks_for_review+"&marks_for_atm="+marks_for_atm+"chek_name="+check_name;
					//alert(filename);
					getContent2(filename, "view_que_sel");
					$('input[name=ans_sel]').attr('checked', false);
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
						check_name = idArray2;
						alert(check_name+uniq_id_get)
						uniq_id_get_length=uniq_id_get.length;
						uniq_id_get_qus=uniq_id_get+"_Qus";
						check_name=Number(check_name) - Number(1);
						path="R:\\QuestionData\\"+sb122+"\\"+uniq_id_get_qus;
						filename = "test_paper_generator/copy_location.php?output="+path+"&mn="+uniq_id_get_qus;
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
				});
				$('#final_test').click(function(){
					var checkstr1 =  confirm('Are you sure? Want to do final submission...?');
					if(checkstr1 == true)
					{
						 var da2 = new Date();
						 var today222 = moment(da2);
						 var s2 = today222.format("YYYY-MM-DD  HH:mm:ss");
						 var da212 = new Date();
						 var today212 = moment(da212);
						var s212 = today212.format("YYYY-MM-DD  HH:mm:ss");
						var da3 = new Date();
						var today3 = moment(da3);
						var datetime3 = today3.format("D MMMM YYYY HH:mm:ss");
						filename = "test_paper_generator/personal_23_insert_adaptive.php?date_time2="+s2+"&new_test_id="+p_test_id+"&user_id="+<?php echo $s5;?>+"&p_ass_id_uq="+p_ass_id_uq;
						//alert(filename);
						$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							success: function(data, textStatus, xhr) {
								if(data == 'true')
								{
									setTimeout(function(){
										alert("Personlized Test Result has been Sent to your registered email-id. Thank You.");
										window.location.reload();
										//document.location.href="personlized_paper_test.php?val=3";
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
				$('#ok_bt').click(function(){
					marks_for_atm=marks_for_atm+uniq_id_get+",";
					filename = "test_paper_generator/personal_14_view_que.php?uniq_id="+p_test_id_uq+"&uniq_id_get="+uniq_id_get+"&marks_for_review="+marks_for_review+"&marks_for_atm="+marks_for_atm;
					//alert(filename);
					getContent2(filename, "view_que_sel");
					filename = "test_paper_generator/personal_22_insert_response.php?uniq_id_get="+uniq_id_get+"&qno="+check_name+"&select_ans_wise="+select_ans_wise+"&new_test_id="+p_test_id;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							$('input[name=ans_sel]').attr('checked', false);
						},
					});
				});
				$('#previous_bt').click(function(){
					old_check_name=check_name;
					check_name=Number(check_name) - Number(1);
					//alert("old"+old_check_name+"check "+check_name)
					if(old_check_name == 0)
					{
						alert("You are in first record......");
					}
					else
					{
						$('#view_que_sel input[type="checkbox"]').eq(old_check_name).attr("checked",false);
						$('#view_que_sel input[type="checkbox"]').eq(check_name).attr("checked",true);
					
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
						check_name=Number(check_name) - Number(1);
						//alert(uniq_id_get+uniq_id_get_length);
						path="R:\\QuestionData\\"+sb122+"\\"+uniq_id_get_qus;
						filename = "test_paper_generator/copy_location.php?output="+path+"&mn="+uniq_id_get_qus;
						//alert(filename);
						$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							
							success: function(data, textStatus, xhr) {
								//alert(data);
							},
						});
						//alert(uniq_id_get);
						$('input[name=ans_sel]').attr('checked', false);
						filename = "test_paper_generator/personal_14_response_checked.php?uniq_id_get="+uniq_id_get+"&qno="+check_name;
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
						//alert(uniq_id_get_qus)
						callFlexPaperDocViewer(uniq_id_get_qus);
					}
				});
				$('#next_bt').click(function(){
				
					old_check_name=check_name;
					check_name=Number(check_name) + Number(1);
					//alert("old"+old_check_name+"check "+check_name)
					
						$('#view_que_sel input[type="checkbox"]').eq(old_check_name).attr("checked",false);
						$('#view_que_sel input[type="checkbox"]').eq(check_name).attr("checked",true);
					
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
						check_name=Number(check_name) - Number(1);
						//alert(uniq_id_get+uniq_id_get_length);
						path="R:\\QuestionData\\"+sb122+"\\"+uniq_id_get_qus;
						filename = "test_paper_generator/copy_location.php?output="+path+"&mn="+uniq_id_get_qus;
						//alert(filename);
						$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							
							success: function(data, textStatus, xhr) {
								//alert(data);
							},
						});
						//alert(uniq_id_get);
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
						callFlexPaperDocViewer(uniq_id_get_qus);
				});
				$('input[type="radio"][name="checked_choice"]').click(function(){
				
					$('#view_que_sel_1 input[type="checkbox"]').removeAttr('checked');
					var ct_type = $("input[type='radio'][name='checked_choice']:checked");
					if (ct_type.length > 0)
					select_choice_type = ct_type.val();
					/*8correct = $('#first_td_1').attr("value");
					incorrect = $('#first_td_2').attr("value");
					unans = $('#first_td_3').attr("value");*/
					//alert();
					j=0;
					k=0;
							assignment_id = $("#assignment_id").val();
						if(select_choice_type == "Correct")
					{
						if(correct != "")
						{
							assignment_id = $("#assignment_id").val();
					//filename = "test_paper_generator/personal_24_get_question_uniq.php?test_id="+test_id+"&uid="+uid+"&assignment_id="+assignment_id;
						filename = "test_paper_generator/GetCorrectqlist_asnt.php?test_id="+test_id+"&correct="+correct+"&uid="+uid+"&assignment_id="+assignment_id;
					//alert(filename);
					getContent_que_90(filename, "view_que_sel_1");
						}
					}
					else if(select_choice_type == "Wrong")
					{
						if(incorrect != "")
						{
							str_to_split=incorrect;
						filename = "test_paper_generator/GetInCorrectqlist_asnt.php?test_id="+test_id+"&incorrect="+incorrect+"&uid="+uid+"&assignment_id="+assignment_id;
					//alert(filename);
					getContent_que_90(filename, "view_que_sel_1");
						}
					}
					else if(select_choice_type == "Unattemted")
					{
						if(unans != "")
						{
								str_to_split=unans;
							filename = "test_paper_generator/GetUnsqlist_asnt.php?test_id="+test_id+"&unans="+unans+"&uid="+uid+"&assignment_id="+assignment_id;
					//alert(filename);
					getContent_que_90(filename, "view_que_sel_1");
						}
					}
					else if(select_choice_type == "All")
					{
						if(allq != "")
						{
							str_to_split=allq;
							//alert(str_to_split);
							filename = "test_paper_generator/GetAllqlist_asnt.php?test_id="+test_id+"&allq="+allq+"&uid="+uid+"&assignment_id="+assignment_id;
							getContent_que_90(filename, "view_que_sel_1");
						}
					}
					/*if(select_choice_type == "Correct")
					{
						if(correct != "")
						{
							st_array=correct.split(",");
							j=Number(st_array[0])-Number(1);
							$('#view_que_sel_1 input[type="checkbox"]').eq(j).attr("checked",true);
							k=0;
							response_get();
							var idArray12 = [];
							var idArray13 = [];
							$("#view_que_sel_1 input:checkbox").each(function() {
								if ($(this).is(":checked"))
								{
									idArray12.push(this.id);
									//alert(idArray12);
									idArray13.push(this.name);
								}
							});
							response_uniq_id_get = idArray12;
							response_QID = idArray13;
							path="R:\\QuestionData\\"+sb12+"\\"+response_uniq_id_get;
							filename = "test_paper_generator/copy_location.php?output="+path+"&mn="+response_uniq_id_get;
							//alert(filename);
							$.ajax({
								url: filename,
								type: 'GET',
								dataType: 'html',
								
								success: function(data, textStatus, xhr) {
									//alert(data);
								},
							});
							callFlexPaperDocViewer1(response_uniq_id_get);
						}
					}
					else if(select_choice_type == "Wrong")
					{
						if(incorrect != "")
						{
							st_array=incorrect.split(",");
							j=Number(st_array[0])-Number(1);
							$('#view_que_sel_1 input[type="checkbox"]').eq(j).attr("checked",true);
							
							k=0;
							response_get();
							//alert(select_choice_type);
							var idArray12 = [];
							var idArray13 = [];
							$("#view_que_sel_1 input:checkbox").each(function() {
								if ($(this).is(":checked"))
								{
									idArray12.push(this.id);
									//alert(idArray12);
									idArray13.push(this.name);
								}
							});
							response_uniq_id_get = idArray12;
							response_QID = idArray13;
							path="R:\\QuestionData\\"+sb12+"\\"+response_uniq_id_get;
							filename = "test_paper_generator/copy_location.php?output="+path+"&mn="+response_uniq_id_get;
							//alert(filename);
							$.ajax({
								url: filename,
								type: 'GET',
								dataType: 'html',
								
								success: function(data, textStatus, xhr) {
									//alert(data);
								},
							});
							callFlexPaperDocViewer1(response_uniq_id_get);
						}
					}
					else if(select_choice_type == "Unattemted")
					{
						if(unans != "")
						{
							st_array=unans.split(",");
							j=Number(st_array[0])-Number(1);
							$('#view_que_sel_1 input[type="checkbox"]').eq(j).attr("checked",true);
							k=0;
							//alert(select_choice_type);
							response_get();
							var idArray12 = [];
							var idArray13 = [];
							$("#view_que_sel_1 input:checkbox").each(function() {
								if ($(this).is(":checked"))
								{
									idArray12.push(this.id);
									//alert(idArray12);
									idArray13.push(this.name);
								}
							});
							response_uniq_id_get = idArray12;
							response_QID = idArray13;
							//alert("UID U: "+response_uniq_id_get);
							path="R:\\QuestionData\\"+sb12+"\\"+response_uniq_id_get;
							filename = "test_paper_generator/copy_location.php?output="+path+"&mn="+response_uniq_id_get;
							//alert(filename);
							$.ajax({
								url: filename,
								type: 'GET',
								dataType: 'html',
								
								success: function(data, textStatus, xhr) {
									//alert(data);
								},
							});
							//alert("UID U: "+response_uniq_id_get);
							callFlexPaperDocViewer1(response_uniq_id_get);
						}
					}*/
				});
						function getContent_que_90(filename, selectboxid)
				{
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							var strtemp = "$('#" + selectboxid + "').html(data)";
							eval(strtemp);
							st_array=str_to_split.split(",");
							//j=Number(st_array[0])-Number(1);
							j=0;
							$('#view_que_sel_1 input[type="radio"]').eq(0).attr("checked",true);
							k=0;
							response_get();
							$("#view_que_sel_1 input:radio:checked").each(function() {
									idArray34=this.id;
							});
							var mySplitResult = idArray34.split("-");
							response_uniq_id_get=mySplitResult[0];
							response_QID=mySplitResult[1];
							path="R:\\QuestionData\\"+sb12+"\\"+response_uniq_id_get;
							filename = "test_paper_generator/copy_location.php?output="+path+"&mn="+response_uniq_id_get;
							//alert(filename);
							$.ajax({
								url: filename,
								type: 'GET',
								dataType: 'html',
								
								success: function(data, textStatus, xhr) {
									//alert(data);
								},
							});
							callFlexPaperDocViewer1(response_uniq_id_get);
							//alert(data);
							//$("#sel_type").show();
						},
					});
				}
				$('#view_que_sel_1').click(function(){
					var idArray12 = [];
					var idArray13 = [];
					$("#view_que_sel_1 input:checkbox").each(function() {
						if ($(this).is(":checked"))
						{
							idArray12.push(this.id);
							idArray13.push(this.name);
						}
					});
					response_uniq_id_get = idArray12;
					response_QID = idArray13;
					response_uniq_id_get_length=response_uniq_id_get.length;
					//alert("Length : "+response_uniq_id_get_length);
					if(response_uniq_id_get_length == 1)
					{
						response_QID=Number(response_QID) - Number(1);
						path="R:\\QuestionData\\"+sb12+"\\"+response_uniq_id_get;
						filename = "test_paper_generator/copy_location.php?output="+path+"&mn="+response_uniq_id_get;
						//alert(filename);
						$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							
							success: function(data, textStatus, xhr) {
								//alert(data);
							},
						});
						callFlexPaperDocViewer1(response_uniq_id_get);
					}
					else
					{
						if(response_uniq_id_get_length >= 2)
						{
							alert("Please select only one checked.");
							//$('#view_que_sel_1 input[type="checkbox"]').eq(j).attr("checked",false);
						}
						else
						{
							
						}
					}
					//alert("uniq"+response_uniq_id_get);
					//alert("se"+response_QID);
				});
				$('#s_nxt').click(function(){
					k=Number(k) + Number(1);
					//alert(k);
					//alert("lenh : "+st_array.length);
					count=Number(st_array.length)-Number(1);
					//alert("last recordeedr : "+count);
					if(k == count){
					
						alert("You are in last record.");
						k=Number(k) - Number(1);
					}
					else
					{
					//alert(st_array[k])
						//org m=Number(st_array[k])-Number(1);
						m=k;
						//alert("check "+k);
						$('#view_que_sel_1 input[type="radio"]').eq(m).attr("checked",true);
						$('#view_que_sel_1 input[type="radio"]').eq(j).attr("checked",false);
						//alert(m);
						//j=Number(j) + Number(1);
						j=m;
						response_get();
						$("#view_que_sel_1 input:radio:checked").each(function() {
								idArray34=this.id;
						});
						var mySplitResult = idArray34.split("-");
						response_uniq_id_get=mySplitResult[0];
						response_QID=mySplitResult[1];
						path="R:\\QuestionData\\"+sb12+"\\"+response_uniq_id_get;
						filename = "test_paper_generator/copy_location.php?output="+path+"&mn="+response_uniq_id_get;
						//alert(filename);
						$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							
							success: function(data, textStatus, xhr) {
								//alert(data);
							},
						});
						//alert("Next : "+response_uniq_id_get);
						callFlexPaperDocViewer1(response_uniq_id_get);
					}
					/*k=Number(k) + Number(1);
					alert(k);
					//alert("lenh : "+st_array.length);
					count=Number(st_array.length)-Number(1);
					//alert("last recordeedr : "+count);
					if(k == count){
					
						alert("You are in last record.");
						k=Number(k) - Number(1);
					}
					else
					{
						//m=Number(st_array[k])-Number(1);
						m=k;
						//alert("check "+k);
						$('#view_que_sel_1 input[type="radio"]').eq(m).attr("checked",true);
						$('#view_que_sel_1 input[type="radio"]').eq(j).attr("checked",false);
						
						//j=Number(j) + Number(1);
						j=m;
						response_get();
						var idArray12 = [];
						var idArray13 = [];
						$("#view_que_sel_1 input:radio").each(function() {
							if ($(this).is(":checked"))
							{
								idArray12.push(this.id);
								//alert(idArray12);
								idArray13.push(this.name);
							}
						});
						response_uniq_id_get = idArray12;
						response_QID = idArray13;
						
						path="R:\\QuestionData\\"+sb12+"\\"+response_uniq_id_get;
						filename = "test_paper_generator/copy_location.php?output="+path+"&mn="+response_uniq_id_get;
						//alert(filename);
						$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							
							success: function(data, textStatus, xhr) {
								//alert(data);
							},
						});
						//alert("Next : "+response_uniq_id_get);
						callFlexPaperDocViewer1(response_uniq_id_get);
					}*/
					
				});
				$('#s_prv').click(function(){
					//alert(k);
					/*if(k == 0){
					
						alert("You are in first record.");
					}
					else
					{
						k=Number(k) - Number(1);
						//m=Number(st_array[k])-Number(1);
						m=k;
						//alert("check "+k);
						$('#view_que_sel_1 input[type="radio"]').eq(m).attr("checked",true);
						$('#view_que_sel_1 input[type="radio"]').eq(j).attr("checked",false);
						
						//j=Number(j) + Number(1);
						j=m;
						response_get();
						var idArray14 = [];
						var idArray15 = [];
						$("#view_que_sel_1 input:radio").each(function() {
							if ($(this).is(":checked"))
							{
								idArray14.push(this.id);
								//alert(idArray12);
								idArray15.push(this.name);
							}
						});
						response_uniq_id_get = idArray14;
						response_QID = idArray15;
						//rt("previous : "+response_uniq_id_get);
						
						path="R:\\QuestionData\\"+sb12+"\\"+response_uniq_id_get;
						filename = "test_paper_generator/copy_location.php?output="+path+"&mn="+response_uniq_id_get;
						//alert(filename);
						$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							
							success: function(data, textStatus, xhr) {
								//alert(data);
							},
						});
						callFlexPaperDocViewer1(response_uniq_id_get);
					}*/
					if(k == 0){
					
						alert("You are in first record.");
					}
					else
					{
						k=Number(k) - Number(1);
						//org m=Number(st_array[k])-Number(1);
						m=k;
						//alert("check "+k);
						$('#view_que_sel_1 input[type="radio"]').eq(m).attr("checked",true);
						$('#view_que_sel_1 input[type="radio"]').eq(j).attr("checked",false);
						
						//j=Number(j) + Number(1);
						j=m;
						response_get();
						
						$("#view_que_sel_1 input:radio:checked").each(function() {
								idArray34=this.id;
						});
						var mySplitResult = idArray34.split("-");
						response_uniq_id_get=mySplitResult[0];
						response_QID=mySplitResult[1];
						path="R:\\QuestionData\\"+sb12+"\\"+response_uniq_id_get;
						filename = "test_paper_generator/copy_location.php?output="+path+"&mn="+response_uniq_id_get;
						//alert(filename);
						$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							
							success: function(data, textStatus, xhr) {
								//alert(data);
							},
						});
						callFlexPaperDocViewer1(response_uniq_id_get);
					}
				});
				function ok_button_click_view()
				{
					old_check_name=check_name;
					$('#view_que_sel input[type="checkbox"]').eq(old_check_name).attr("checked",false);
					check_name=Number(check_name) + Number(1);
					
					$('#view_que_sel input[type="checkbox"]').eq(check_name).attr("checked",true);
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
					check_name=Number(check_name) - Number(1);
					//alert(uniq_id_get+uniq_id_get_length);
					path="R:\\QuestionData\\"+sb122+"\\"+uniq_id_get_qus;
					filename = "test_paper_generator/copy_location.php?output="+path+"&mn="+uniq_id_get_qus;
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
				}
				$('#std_result').change(function(){
					std_result=$("#std_result").val();
					filename = "test_paper_generator/chapter_result.php?sb_result="+sb_result+"&std_result="+std_result;
					//alert(filename);
					getContent(filename, "cp_list");
					//alert(std_result);
				});
				$('#sb_result').change(function(){
					sb_result=$("#sb_result").val();
					filename = "test_paper_generator/chapter_result.php?sb_result="+sb_result+"&std_result="+std_result;
					//alert(filename);
					getContent(filename, "cp_list");
				});
				$('#cp_list').change(function(){
					cp_result=$("#cp_list").val();
					filename = "test_paper_generator/personal_30_view_student_test_result2.php?uid="+uid+"&sb_result="+sb_result+"&cp_result="+cp_result+"&std_result="+std_result;
					//alert(filename);
					getContent(filename, "view_result_of_adaptive_test_student");
				});
			});
		</script>
</head>
<body>
	<div style='background-color:#EDF5FA;width:100%'>
		<div class='trable_bg' style='padding-left:5px;color:yellow;border:solid 0px;width:100%'>
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
		</div>
		<div style='background-color:#EDF5FA;width:100%;height:1000px;'>
			<table style="padding-top:0px;border:solid 0px;width:100%;height:25px;">
				<tr>
					<td style="background-color:#3366FF;border:solid 0px;">
						<label style="float:left;color:white"><b>Grey Area Assignment</b></label>
					</td>
				</tr>
			</table>
			<?php include 'personlized_paper.php'; ?>
		</div>
		<div id="footer" style="background-color:#0174DF;">
			<center><div style="padding-left:5px;padding-top:5px;font-size:12px;color:black;text-transform: capitalize;"><label style="border:solid 0px;color:white;">Copyright &copy Edutech Educational Services Pvt. Ltd. Ahmedabad, Gujarat, India</label>
			</div></center>
		</div>
	</div>
	
</body>
</html>