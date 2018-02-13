<?php
	include 'config.php';
	session_start();
	$course_id=$_SESSION['course_id'];
	$batch_id=$_SESSION['batch_id'];
	$subject_id=$_SESSION['subject_id'];
	$result1_sb=mysql_query("SELECT id,NAME,sort_name FROM SUBJECT WHERE id='$subject_id'");
	$row1_sb=mysql_fetch_array($result1_sb);
	$sub_id_rs=$row1_sb[0];
	$sub_name_rs=$row1_sb[1];
	$sub_sort_rs=$row1_sb[2]; 
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
		<script type="text/javascript" src="js/flexpaper.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers_debug.js"> </script>
		<link rel="stylesheet" href="css/jquery-ui.css" />
		<script src="js/jquery-ui.js"></script>
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
			 #footer {
				position: fixed;
				bottom: 0;
				width: 100%;
			}
		</style>
		<script type="text/javascript">
			
			$(function (){
				var select_type_wise=1;
				var sb11='<?php echo $subject_id; ?>';
				var board_type=1,omr_start_time = "",sb1="",sbj1="";
				var uniq_id_get=0,marks_for_review="",marks_for_atm="",select_ans_wise="";
				var all_atm="",req_que="",que_sel="";
				var sel_que_list=0,val_start="",select_test_wise="test";
				var date_time2,date_time,datetime,t_t;
				var datepickerVal44='<?php echo $today ?>',datepickerVal45='<?php echo $today ?>';
				var uid='<?php echo $s5;?>';
				var board1='<?php echo $board1;?>';
				var new_test_id="",st_array="",j="",k="";
				var qno_id_count=0,uniq_id_get_qus="",cp_value12="";
				var sb12="";
				var sb=0,std=0,total_string_get_val="";
				var qno_id="";
				var sb_result="",cp_result="",std_result="";
				var str_to_split="";
				var correct="",incorrect="",allq="",uans="";
				$("#view_result1").live('click',function(){
					$("#dig_rep_id_hide").show();
					$("#dig_rep_id").hide();
					var bal=($(this).closest('tr').attr('id'));
					//alert("sanjya : "+bal);
					var mySplitResult = bal.split(",");
						tt_id=mySplitResult[0];
						stid=mySplitResult[1];
						sname=mySplitResult[2];
						sub_ject=mySplitResult[3];
						//alert(tt_id+stid+sname+sub_ject);
						if(sub_ject=="Biology"){ sbjt12='14';}
						else if(sub_ject=="Maths"){ sbjt12='15';}
						else if(sub_ject=="Physics"){ sbjt12='16';}
						else if(sub_ject=="Chemistry"){ sbjt12='17';}
						else if(sub_ject=="Science"){ sbjt12='18';}
						else if(sub_ject=="English"){ sbjt12='19';}
						else if(sub_ject=="Mock"){ sbjt12='20';}
						else if(sub_ject=="SocialScience"){ sbjt12='22';}
						//alert(sbjt12);
						doc_id=stid+sname+tt_id;
						//alert(doc_id);
						filename = "test_paper_generator/view_concept_google.php?subject_id="+sbjt12+"&sid="+stid+"&test_id="+tt_id;
						//alert(filename);
						getContent(filename, "concept_id");
						filename = "ppt1.php?sid="+stid+"&test_id="+tt_id;
						//alert(filename);
						getContent_dig(filename, "dig_rep_id1");
						display_viewer(doc_id);
				});
				$("#dig_rep_id_hide").hide();
				//$("#dig_rep_id").hide();
				function display_viewer(mat_name)
				{
					filename = "test_paper_generator/get_material_path2.php?mn="+mat_name;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						success: function(data, textStatus, xhr) {
							//alert(data);
						},
					});
					filename = "test_paper_generator/copy_location2.php?mn="+mat_name;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							//alert(data);
						},
					});
					callFlexPaperDocViewer2(mat_name);
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
							alert(data);
							$("#start_test").show();
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
				function getContent_dig(filename, selectboxid)
				{
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							var strtemp = "$('#" + selectboxid + "').html(data)";
							eval(strtemp);
							$("#dig_rep_id_hide").hide();
							$("#dig_rep_id").show();
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
							//$("#sel_type").show();
						},
					});
				}
				function getContent_hide(filename, selectboxid)
				{
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							$("#hide_result").hide();
							$("#filter_hide_show").show();
							$("#view_result_of_adaptive_test_student").show();
							var strtemp = "$('#" + selectboxid + "').html(data)";
							eval(strtemp);
							//alert(data);
							//$("#sel_type").show();
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
							$('#view_que_sel input[type="radio"]').eq(old_name).attr("checked",true);
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
							$('#view_que_sel input[type="radio"]').eq(old_name).attr("checked",true);
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
				//alert(sb11);
				/*if(sb11==14){ sb12="Biology";}
				else if(sb11==15){ sb12="Maths";}
				else if(sb11==16){ sb12="Physics";}
				else if(sb11==17){ sb12="Chemistry";}
				else if(sb11==18){ sb12="Science";}
				else if(sb11==19){ sb12="English";}
				else if(sb11==20){ sb12="Mock";}
				else if(sb11==22){ sb12="SocialScience";}*/
				sb11=sub_id_rs;
				sb12=sub_name_rs;
				filename = "test_paper_generator/20_get_test_id4.php?sub_id="+sb11+"&uid="+uid;
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
						alert(filename);
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
						alert(filename);
						getContent(filename, "test_id");
					}
				});
				
				$('#test_id').change(function(){
					test_id = $("#test_id").val();
					//alert(test_id);
					filename = "test_paper_generator/20_get_answer_type.php?test_id="+test_id;
					//alert(filename);
					getContent(filename, "answer_type");
					filename = "test_paper_generator/25_display_result.php?test_id="+test_id+"&uid="+uid;
					//alert(filename);
					getContent(filename, "display_cr_at");
					filename = "test_paper_generator/24_get_question_uniq.php?test_id="+test_id+"&uid="+uid;
					//alert(filename);
					getContent34(filename, "view_que_sel_1");
				});
				function response_get()
				{
					m1=j;
					//filename = "test_paper_generator/500_resoponse_get.php?test_id="+test_id+"&uid="+uid+"&qno="+m1;
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
				$('#sb').change(function(){
					sb = $('#sb').val();
					//alert(sb);
				});
				
				$('#std').change(function(){
					std = $('#std').val();
					//alert(std);
				});
				
				$(".loading-gif").hide();
				$('#view_cp').click(function(){
					
					if(sb == 0)
					{
						alert("Please select subject.");
					}
					else if(std == 0)
					{
						alert("Please select standard.");
					}
					else
					{
						$(".loading-gif").show();
						//sb = $('#sb').val();
						//std = $('#std').val();
						if(sb==14){ sb1="Biology";sbj1="BIO";}
						else if(sb==15){ sb1="Maths";sbj1="MAT";}
						else if(sb==16){ sb1="Physics";sbj1="PHY";}
						else if(sb==17){ sb1="Chemistry";sbj1="CHE";}
						else if(sb==18){ sb1="Science";sbj1="SCI";}
						else if(sb==19){ sb1="English";sbj1="ENG";}
						else if(sb==20){ sb1="Mock";}
						else if(sb==22){ sb1="SocialScience";sbj1="S.S";}
						var board_type_name = $("input[type='radio'][name='board']:checked");
						if (board_type_name.length > 0)
						board_type = board_type_name.val();
						//alert(std+sb1+board_type);
						filename = "test_paper_generator/chape2.php?sub_id="+sb+"&std="+std+"&board_id="+board1+"&sb1="+sb1;
						//alert(filename);
						$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							
							success: function(data, textStatus, xhr) {
								$(".loading-gif").hide();
								var strtemp = "$('#cpt').html(data)";
								eval(strtemp);
								//alert(data);
							},
						});
					}
				});
				$('#cpt').click(function(){
				
					$("#cpt input:radio:checked").each(function() {
							idArray3=this.value;
					});
					cp_value12 = idArray3;
					filename = "test_paper_generator/chape3.php?sub_id="+sb+"&std="+std+"&board_id="+board1+"&sb1="+sb1+"&cp_value12="+cp_value12+"&uid="+uid;
					alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							$(".loading-gif").hide();
							var strtemp = "$('#cpt1').html(data)";
							eval(strtemp);
							$("#sel_type1").hide();
							$("#dif_per").hide();
							$("#timer").hide();
							$(".set_time").show();
							$("#df_wise").hide();
						},
					});
					filename = "test_paper_generator/34_student_average_percentage.php?cp_value12="+cp_value12+"&uid="+uid;
					//alert(filename);
					getContent(filename, "chapter_average_performance_is");
				});
				$("#sel_type1").hide();
				$("#tot_qus").hide();
				$('#start').click(function(){	
					qno_id="";
					qno_id = $('#first_td_1_cp').attr("value");
					count = parseInt($('#first_td_2_cp').attr("value"));
					tot_qno_id=count;
					req_que=$("#required_que").val();
					if(req_que == "")
					{
						alert("Please select required questions.");
					}
					else
					{
						//alert("1:"+count+"2="+req_que);
						if(select_type_wise == 1)
						{
							if(parseInt(count) < parseInt(req_que))
							{
								$("#view_que_sel").empty();
								alert("Questions insufficient. Please add required question12");
							}
							else
							{
								filename = "test_paper_generator/11_view_que1.php?total_que_str="+qno_id+"&uniq_id_get="+uniq_id_get+"&marks_for_review="+marks_for_review+"&marks_for_atm="+marks_for_atm+"&req_que="+req_que+"&total_no_que="+tot_qno_id+"&cp_value12="+
								cp_value12+"&sub_id="+sb+"&uid="+uid;
								//alert(filename);
								$("#start").hide();
								$('#required_que').attr("disabled", true);
								$("input[type=radio][class=class_radio_up]").attr("disabled",true);
								$('#sel_time').attr("disabled", true);
								$('#std').attr("disabled", true);
								$('#sb').attr("disabled", true);
								$("input[type=radio][name=test_type]").attr("disabled",true);
								$("input[type=radio][name=board]").attr("disabled",true);
								filename="test_paper_generator/11_view_que1.php";
								data34={total_que_str: qno_id,uniq_id_get:uniq_id_get,marks_for_review:marks_for_review,marks_for_atm:marks_for_atm,req_que:req_que,total_no_que:tot_qno_id,cp_value12:cp_value12,sub_id:sb,uid:uid};
								getContent_que34(filename, "view_que_sel");
								$("#cpt *").attr("disabled", "disabled").off('click');
							}
						}
						else
						{
							
							if(select_concept_wise == 1)
							{
								if(parseInt(count) < parseInt(req_que))
								{
									$("#view_que_sel").empty();
									alert("Questions insufficient. Please add required question23");
								}
								else
								{
									filename = "test_paper_generator/13_view_que.php?total_que_str="+qno_id+"&uniq_id_get="+uniq_id_get+"&marks_for_review="+marks_for_review+"&marks_for_atm="+marks_for_atm+"&req_que="+req_que+"&diff_per="+df_wise+"&select_concept_wise="+select_concept_wise+"&total_no_que="+tot_qno_id;
									//alert(filename);
									getContent33(filename, "view_que_sel");
								}
							}
							else
							{
								if(parseInt(count) < parseInt(req_que))
								{
									$("#view_que_sel").empty();
									alert("Questions insufficient. Please add required question34");
								}
								else
								{
									filename = "test_paper_generator/13_view_que.php?total_que_str="+qno_id+"&uniq_id_get="+uniq_id_get+"&marks_for_review="+marks_for_review+"&marks_for_atm="+marks_for_atm+"&req_que="+req_que+"&diff_per="+df_wise+"&select_concept_wise="+select_concept_wise+"&total_no_que="+tot_qno_id;
									//alert(filename);
									getContent(filename, "view_que_sel");
									//$("#cpt").empty();
								}
							}
						}
						// Insert query for OMR Correct and online uniqID
						
					}
				});
				$("#start_test").hide();
				$('#sel_que').attr("disabled", true);
				function get_uniq_diff_per()
				{
					filename = "test_paper_generator/100_get_diff.php?uniq_id_get="+uniq_id_get;
					//alert(filename);
					getContent(filename, "diff_per34");
					$("#new_uniq_id1").html("Uniq-ID : "+uniq_id_get);
				}
				function get_uploaded_by(UNIQ_ID)
				{
					filename = "test_paper_generator/150_uploaded_by.php?uniq_id_get="+UNIQ_ID;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							//alert(data);
							uploaded_by=data;
							$("#uploaded_nm").html(uploaded_by);
						},
					});
				}
				$('#view_que_sel').click(function(){
					if(val_start == "")
					{
						alert("Please Select Start Test");
					}
					else
					{
						all_atm=all_atm+",";
						$("#view_que_sel input:radio:checked").each(function() {
								idArray34=this.id;
						});
						var mySplitResult = idArray34.split("-");
						uniq_id_get=mySplitResult[0];
						check_name=mySplitResult[1];
						uniq_id_get_qus=uniq_id_get+"_Qus";
						//alert(uniq_id_get);
						get_uniq_diff_per();
						check_name=Number(check_name) - Number(1);
						path="R:\\QuestionData\\"+sb12+"\\"+uniq_id_get_qus;
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
						get_uploaded_by(uniq_id_get);
						$('input[name=ans_sel]').attr('checked', false);
						filename = "test_paper_generator/14_response_checked.php?uniq_id_get="+uniq_id_get+"&qno="+check_name;
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
						//alert(uniq_id_get);
						callFlexPaperDocViewer(uniq_id_get_qus);
					}
				});
				$('#marks_for_review').click(function(){
					marks_for_review=marks_for_review+uniq_id_get+",";
					//alert(marks_for_review);
					//old_check_name=check_name;
					//check_name=Number(check_name) + Number(1);
					get_uniq_diff_per();
					if(select_type_wise == 1)
					{
						//alert("wait");
						filename = "test_paper_generator/14_view_que.php?total_que_str="+que_get+"&uniq_id_get="+uniq_id_get+"&marks_for_review="+marks_for_review+"&marks_for_atm="+marks_for_atm+"&req_que="+req_que+"chek_name="+check_name;
						//alert(filename);
						getContent2(filename, "view_que_sel");
						//show();
						//alert("Just Wait...");
					}
					else
					{
						//alert(select_concept_wise);
						if(select_concept_wise == 1)
						{
							if(count < req_que)
							{
								$("#view_que_sel").empty();
								alert("Questions insufficient. Please add required question");
							}
							else
							{
								
								filename = "test_paper_generator/14_view_que.php?total_que_str="+que_get_diff+"&uniq_id_get="+uniq_id_get+"&marks_for_review="+marks_for_review+"&marks_for_atm="+marks_for_atm+"&req_que="+req_que+"&diff_per="+df_wise+"&select_concept_wise="+select_concept_wise;
								//alert(filename);
								getContent3(filename, "view_que_sel");
								//alert("just down!!!");
								//alert("Just Wait...");
								
							}
						}
						else
						{
							if(count < req_que)
							{
								$("#view_que_sel").empty();
								alert("Questions insufficient. Please add required question");
							}
							else
							{
								filename = "test_paper_generator/14_view_que.php?total_que_str="+que_get_diff+"&uniq_id_get="+uniq_id_get+"&marks_for_review="+marks_for_review+"&marks_for_atm="+marks_for_atm+"&req_que="+req_que+"&diff_per="+df_wise+"&select_concept_wise="+select_concept_wise;
								//alert(filename);
								getContent3(filename, "view_que_sel");
								//alert("just down!!!");
								//alert("Just Wait...");
								//old_name=check_name;
								//$('#view_que_sel input[type="checkbox"]').eq(old_name).attr("checked",true);
								//ok_button_click_view();
							}
						}
					}
				});
				$('#df_wise').change(function(){
					df_wise=$("#df_wise").val();
					//alert(df_wise);
					$("#timer").hide();
					$(".set_time").show();
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
						get_uniq_diff_per();
						//alert(uniq_id_get+uniq_id_get_length);
						path="R:\\QuestionData\\"+sb1+"\\"+uniq_id_get_qus;
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
						get_uploaded_by(uniq_id_get);
						$('input[name=ans_sel]').attr('checked', false);
						filename = "test_paper_generator/14_response_checked.php?uniq_id_get="+uniq_id_get+"&qno="+check_name;
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
					get_uniq_diff_per();
					path="R:\\QuestionData\\"+sb12+"\\"+uniq_id_get_qus;
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
					get_uploaded_by(uniq_id_get);
					$('input[name=ans_sel]').attr('checked', false);
					filename = "test_paper_generator/14_response_checked.php?uniq_id_get="+uniq_id_get+"&qno="+check_name;
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
				}
				$('#ok_bt').click(function(){
					//alert("select answer : "+select_ans_wise);
					//alert(new_test_id);
					if(select_ans_wise == "")
					{
						alert("Please select your option....");
					}
					else
					{
						//alert("");
						//var checkstr =  confirm('are you sure you want Select this?');
						//if(checkstr == true)
						//{
							marks_for_atm=marks_for_atm+uniq_id_get+",";
							if(select_type_wise == 1)
							{
								filename = "test_paper_generator/14_view_que.php?total_que_str="+que_get+"&uniq_id_get="+uniq_id_get+"&marks_for_review="+marks_for_review+"&marks_for_atm="+marks_for_atm+"&req_que="+req_que;
								//alert(filename);
								getContent2(filename, "view_que_sel");
								//alert("just wait!!!");
								/*old_name=check_name;
								$('#view_que_sel input[type="checkbox"]').eq(old_name).attr("checked",true);
								*/
								filename = "test_paper_generator/22_insert_response.php?uniq_id_get="+uniq_id_get+"&qno="+check_name+"&select_ans_wise="+select_ans_wise+"&select_test_wise="+select_test_wise+"&new_test_id="+new_test_id;
								//alert(filename);
								getInsert(filename);
								//ok_button_click_view();
							}
							else
							{
								//alert(select_concept_wise);
								if(select_concept_wise == 1)
								{
									if(count < req_que)
									{
										$("#view_que_sel").empty();
										alert("Questions insufficient. Please add required question");
									}
									else
									{
										filename = "test_paper_generator/14_view_que.php?total_que_str="+que_get_diff+"&uniq_id_get="+uniq_id_get+"&marks_for_review="+marks_for_review+"&marks_for_atm="+marks_for_atm+"&req_que="+req_que+"&diff_per="+df_wise+"&select_concept_wise="+select_concept_wise+"&select_test_wise="+select_test_wise;
										//alert(filename);
										getContent3(filename, "view_que_sel");
										//alert("just down!!!");
										//old_name=check_name;
										//alert(old_name);
										//$('#view_que_sel input[type="checkbox"]').eq(old_name).attr("checked",true);
										filename = "test_paper_generator/22_insert_response.php?uniq_id_get="+uniq_id_get+"&qno="+check_name+"&select_ans_wise="+select_ans_wise+"&select_test_wise="+select_test_wise+"&new_test_id="+new_test_id;
										//alert(filename);
										getInsert(filename);
									}
								}
								else
								{
									if(count < req_que)
									{
										$("#view_que_sel").empty();
										alert("Questions insufficient. Please add required question");
									}
									else
									{
										filename = "test_paper_generator/14_view_que.php?total_que_str="+que_get_diff+"&uniq_id_get="+uniq_id_get+"&marks_for_review="+marks_for_review+"&marks_for_atm="+marks_for_atm+"&req_que="+req_que+"&diff_per="+df_wise+"&select_concept_wise="+select_concept_wise+"&select_test_wise="+select_test_wise;
										//alert(filename);
										getContent3(filename, "view_que_sel");
										filename = "test_paper_generator/22_insert_response.php?uniq_id_get="+uniq_id_get+"&qno="+check_name+"&select_ans_wise="+select_ans_wise+"&select_test_wise="+select_test_wise+"&new_test_id="+new_test_id;
										//alert(filename);
										getInsert(filename);
										//ok_button_click_view();
									}
								}
							}
							//alert(uniq_id_get_length);
							sel_que_list=Number(sel_que_list)+Number(uniq_id_get_length);
							//alert("Selected Question : "+sel_que_list);
							$("#sel_que").val(sel_que_list);
						/*}
						else
						{
							return false;
						}*/
					}
					select_ans_wise="";
				});
				$('#next_bt').click(function(){
				
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
						get_uniq_diff_per();
						path="R:\\QuestionData\\"+sb12+"\\"+uniq_id_get_qus;
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
						get_uploaded_by(uniq_id_get);
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
					}
				});
				$('input[type="radio"][name="ans_sel"]').click(function(){
					var ans_type = $("input[type='radio'][name='ans_sel']:checked");
					if (ans_type.length > 0)
					select_ans_wise = ans_type.val();
					//alert(select_ans_wise);
				});
				if(select_test_wise == "practise")
				{
					$("#main_div_1").hide();
					$("#main_div").show();
					$("#main_div_2").hide();
				}
				else if(select_test_wise == "test")
				{
					$("#main_div").show();
					$("#main_div_1").hide();$("#main_div_2").hide();
				}
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
						$("#hide_result").show();
						$("#view_result_of_adaptive_test_student").hide();
						filename = "30_view_student_test_result.php?uid="+uid+"&sb_result="+sb_result+"&cp_result="+cp_result+"&std_result="+std_result;
						//alert(filename);
						getContent_hide(filename, "view_result_of_adaptive_test_student");
					}
				});
				$("#filter_hide_show").hide();
				$("#hide_result").hide();
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
										window.location.reload();
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
				function show() {
					document.getElementById("myDiv").style.display="block";
					setTimeout("hide()", 5000);  // 5 seconds
				}

				function hide() {
					document.getElementById("myDiv").style.display="none";
				}
				$("#final_test").hide();
				$('#start_test').click(function(){
					val_start=$("#start_test").val();
					que_get = $('#sel_que').attr("value");
					que_get_diff = $('#sel_que_diff').attr("value");
					if(req_que == "")
					{
						alert("Please type required questions.");
					}
					else
					{
						$("#rq_qus").hide();
						$("#tot_qus").show();
						$("#final_test").show();
						$("#start_test").hide();
						$("#timer").show();
						//select_ans_wise="";

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
						get_uniq_diff_per();
						check_name=Number(check_name) - Number(1);
						path="R:\\QuestionData\\"+sb1+"\\"+uniq_id_get_qus;
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
						get_uploaded_by(uniq_id_get);
						$('input[name=ans_sel]').attr('checked', false);
						/*filename = "test_paper_generator/14_response_checked.php?uniq_id_get="+uniq_id_get+"&qno="+check_name;
						//alert(filename);
						$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							success: function(data, textStatus, xhr) {
								//alert(data);
								$("input[name=ans_sel][value=" + data + "]").attr('checked', 'checked');
							},
						});*/
						//alert(uniq_id_get_qus);
						callFlexPaperDocViewer(uniq_id_get_qus);
						
						var nwDT_3 = new Date();
						
						//alert("Start Time : "+nwDT_3);
						
						t_t = $("#sel_time").val();
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
						//alert(s);
						//alert("Uniq id "+qno_id);
						if(select_type_wise == 1)
						{
							total_string_get_val=que_get;
						}
						else
						{
							if(select_concept_wise == 1)
							{
								total_string_get_val=que_get_diff;
							}
							else
							{
								total_string_get_val=que_get_diff;
							}
						}
						filename = "test_paper_generator/21_insert_adaptive.php?sub="+sb+"&user_id="+<?php echo $s5;?>+"&req_que="+req_que+"&date_time="+s+"&date_time2="+date_time2+"&t_t="+t_t+"&select_test_wise="+select_test_wise+"&total_que_str="+total_string_get_val+"&cp_value12="+cp_value12;
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
								$("#new_test_id1").html(new_test_id);
								filename = "test_paper_generator/100_insert_omr_correct_table.php?total_string_get_val="+total_string_get_val+"&new_test_id="+new_test_id+"&req_que="+req_que+"&sbj1="+sbj1;
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
						//filename = "test_paper_generator/100_insert_omr_correct_table.php?total_string_get_val="+total_string_get_val;
						//alert(filename);
						//getContent(filename, "view_que_sel");
					}
				});
				$("#dif_per").hide();
				$("#timer").hide();
				$(".set_time").hide();
				$('input[type="radio"][name="sel_type"]').click(function(){
					var select_type = $("input[type='radio'][name='sel_type']:checked");
					if (select_type.length > 0)
					select_type_wise = select_type.val();
					if(select_type_wise == 1)
					{
						//alert(select_concept_wise);
						$("#dif_per").hide();
						$("#timer").hide();
						$(".set_time").show();
						$("#df_wise").hide();
					}
					else
					{
						//alert(select_concept_wise);
						$("#df_wise").hide();
						$("#dif_per").show();
						$("#timer").hide();
						$(".set_time").hide();	
					}
				});
				$("#df_wise").hide();
				
				//difficulty wise percentage coding
				
				$('input[type="radio"][name="choice_type"]').click(function(){
					var select_cp = $("input[type='radio'][name='choice_type']:checked");
					if (select_cp.length > 0)
					select_concept_wise = select_cp.val();
					if(select_concept_wise == 1)
					{
						//alert(select_concept_wise);
						$("#df_wise").show();
					}
					else
					{
						//alert(select_concept_wise);
						$("#df_wise").show();
					}
				});
				/*$('#view_mistakes').click(function(){
					$("#main_div").hide();
				});*/
				$('#view_my_mistakes_bt').click(function(){
					filename = "test_paper_generator/12_view_que.php?test_id="+test_id;
					//alert(filename);
					//getContent(filename, "view_que_sel_1");
				});
				$('input[type="radio"][name="checked_choice"]').click(function(){
				
					$('#view_que_sel_1 input[type="radio"]').removeAttr('checked');
					var ct_type = $("input[type='radio'][name='checked_choice']:checked");
					if (ct_type.length > 0)
					select_choice_type = ct_type.val();
					/*correct = $('#first_td_1').attr("value");
					incorrect = $('#first_td_2').attr("value");
					unans = $('#first_td_3').attr("value");
					allq=$('#first_td_4').attr("value");*/
					//alert();
					j=0;
					k=0;
					$("#view_que_sel_1").html("");
					//alert(correct);
					if(select_choice_type == "Correct")
					{
						if(correct != "")
						{
						str_to_split=correct;
						filename = "test_paper_generator/GetCorrectqlist.php?test_id="+test_id+"&correct="+correct+"&uid="+uid;
					//alert(filename);
					getContent_que_90(filename, "view_que_sel_1");
							
						}
					}
					else if(select_choice_type == "Wrong")
					{
						if(incorrect != "")
						{
						str_to_split=incorrect;
						filename = "test_paper_generator/GetInCorrectqlist.php?test_id="+test_id+"&incorrect="+incorrect+"&uid="+uid;
					//alert(filename);
					getContent_que_90(filename, "view_que_sel_1");
							
						}
					}
					else if(select_choice_type == "Unattemted")
					{
						if(unans != "")
						{
						str_to_split=unans;
							filename = "test_paper_generator/GetUnsqlist.php?test_id="+test_id+"&unans="+unans+"&uid="+uid;
					//alert(filename);
					getContent_que_90(filename, "view_que_sel_1");
						
						}
					}
					else if(select_choice_type == "All")
					{
					if(allq != "")
						{
							str_to_split=allq;
							filename = "test_paper_generator/GetAllqlist.php?test_id="+test_id+"&allq="+allq+"&uid="+uid;
					//alert(filename);
					getContent_que_90(filename, "view_que_sel_1");
							
						}
					}
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
					$("#view_que_sel_1 input:radio:checked").each(function() {
							idArray34=this.id;
					});
					var mySplitResult = idArray34.split("-");
					response_uniq_id_get=mySplitResult[0];
					response_QID=mySplitResult[1];
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
					
				});
				$('#s_nxt').click(function(){
					
					k=Number(k) + Number(1);
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
					
				});
				$('#s_prv').click(function(){
					//alert(k);
					if(k == 0){
					
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
					$("#hide_result").show();
					$("#view_result_of_adaptive_test_student").hide();
					cp_result=$("#cp_list").val();
					filename = "30_view_student_test_result.php?uid="+uid+"&sb_result="+sb_result+"&cp_result="+cp_result+"&std_result="+std_result;
					//alert(filename);
					getContent_hide(filename, "view_result_of_adaptive_test_student");
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
						<label style="float:left;color:white"><b>View My Mistakes</b></label>
					</td>
				</tr>
			</table>
			<center><table class="main_div2" style="border:solid 0px;width:72%;height:25px;">
				<tr>
					<td style="border:solid 0px;width:100%;height:25px;">
						<table>
							<tr>
								<td>
									<label><b>From Date : </b></label>
								</td>
								<td>
									<input type="text" id="datepicker44" class="text_css" value="<?php echo $today ?>" />
								</td>
								<td>
									<label><b>To Date : <b/></label>
								</td>
								<td>
									<input type="text" id="datepicker45" class="text_css" value="<?php echo $today ?>" />
								</td>
								<td>
									<select id="test_id" name="test_id" style="background-color:lightgrey;width:160px;">
									</select>
								</td>
								<td>
									<!--<input type="BUTTON" id="view_dg_report" class="button_css" name="view_dg_report" value="Diagnostic Report"/>-->
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<table style="width:80%;height:405px;border:solid 0px;">
				<tr>
					<td>
						<table>
							<tr>
								<td>
									<br/>
									<div id="checked_choice" style="border:solid 	0px;overflow-y:scroll;background-color:white;width:auto;height:auto;">
									<input id="c1" type="radio" class="checked_choice" name="checked_choice" value="Correct"><label for="c1">
									<b><font color="green">Correct</font></b></label>
									<input id="w1" type="radio" class="checked_choice" name="checked_choice" value="Wrong"><label for="w1">
									<b><font color="red">Wrong</font></b></label>
									<input id="um1" type="radio" class="checked_choice" name="checked_choice" value="Unattemted"><label for="um1">
									<b><font color="blue">Unattemted</font></b></label>
									<input id="all1" type="radio" class="checked_choice" name="checked_choice" value="All" checked="checked" ><label for="all1">
									<b><font color="Black ">All</font></b></label>
									</div>
								</td>
							</tr>
						</table>
					</td>
					<td>
						<div id="display_cr_at" style="border:solid 0px;width:auto;height:25px;">
						</div>
					</td>
				</tr>
				<tr>
					<td valign="top" style="border:solid 0px;">
						<table>
							<tr>
								<td>
									<div id="view_que_sel_1" style="border:solid 	0px;overflow-y:scroll;background-color:white;width:330px;height:320px;">
									</div>
								</td>
							</tr>
							<tr>
								<td style='float:right;'>
									<table>
										<tr>
											<!--<td>
												<input type="BUTTON" id="view_my_mistakes_bt" class="button_css" name="next" value="View My Mistakes"/>
											</td>-->
											<td>
												<input type="BUTTON" id="s_prv" class="button_css" name="s_prv" value="Previous"/>
											</td>
											<td>
												<input type="BUTTON" id="s_nxt" class="button_css" name="s_nxt" value="Next"/>
											</td>
										</tr>
									</table>
								</td>
								
							</tr>
						</table>
					</td>
					<td style="border:solid 0px;">
						
						<div id="viewer_1" style="border:solid 	0px;overflow-y:scroll;background-color:white;width:675px;height:350px;">
							<script type="text/javascript">
								function getDocumentUrl(document){
									//alert(document);
									//alert("services/view.php?doc={doc}&format={format}&page={page}");
									return "services/view.php?doc={doc}&format={format}&page={page}".replace("{doc}",document);
								}
								function getDocQueryServiceUrl(document){
									return "services/swfsize.php?doc={doc}&page={page}".replace("{doc}",document);
								}
								var startDocument = "<?php if(isset($_GET["doc"])){echo $_GET["doc"];}else{?>adaptive_test1.pdf<?php } ?>";
								$('#viewer_1').FlexPaperViewer(
								 {
									config : {
										 DOC : escape(getDocumentUrl(startDocument)),
										 Scale : 0.6,
										 ZoomTransition : 'easeOut',
										 ZoomTime : 0.5,
										 ZoomInterval : 0.2,
										 FitPageOnLoad : false,
										 FitWidthOnLoad : true,
										 FullScreenAsMaxWindow : false,
										 ProgressiveLoading : false,
										 MinZoomSize : 0.2,
										 MaxZoomSize : 5,
										 SearchMatchAll : false,
										 InitViewMode : 'Portrait',
										 RenderingOrder : 'flash,html',

										 ViewModeToolsVisible : true,
										 ZoomToolsVisible : true,
										 NavToolsVisible : true,
										 CursorToolsVisible : true,
										 SearchToolsVisible : true,

										 DocSizeQueryService : 'services/swfsize.php?doc=' + startDocument,
										 jsDirectory : 'js/',
										 localeDirectory : 'locale/',

										 JSONDataType : 'jsonp',
										 key : '',

										 localeChain: 'en_US'

										 }}
								);
								//callFlexPaperDocViewer("Paper.pdf");
								function callFlexPaperDocViewer1(startDocument1){
									//alert(startDocument1);
								
									$('#viewer_1').FlexPaperViewer({
										config : {

										 DOC : escape(getDocumentUrl(startDocument1)),
										 Scale : 0.6,
										 ZoomTransition : 'easeOut',
										 ZoomTime : 0.5,
										 ZoomInterval : 0.2,
										 FitPageOnLoad : false,
										 FitWidthOnLoad : true,
										 FullScreenAsMaxWindow : false,
										 ProgressiveLoading : false,
										 MinZoomSize : 0.2,
										 MaxZoomSize : 5,
										 SearchMatchAll : false,
										 InitViewMode : 'Portrait',
										 RenderingOrder : 'flash,html',

										 ViewModeToolsVisible : true,
										 ZoomToolsVisible : true,
										 NavToolsVisible : true,
										 CursorToolsVisible : true,
										 SearchToolsVisible : true,

										 DocSizeQueryService : 'services/swfsize.php?doc=' + startDocument1,
										 jsDirectory : 'js/',
										 localeDirectory : 'locale/',

										 JSONDataType : 'jsonp',
										 key : '',

										 localeChain: 'en_US'

										 }}
								);
								}
							</script>
						
						</div>
					</td>
				</tr>
			</table>
			<table style="width:350px;height:35px;border:solid 0px;">
				<tr>
					<td>
						<label id="response_get"></label>
					</td>
				</tr>
			</table>
		</div>
		<div id="footer" style="background-color:#0174DF;">
			<center><div style="padding-left:5px;padding-top:5px;font-size:12px;color:black;text-transform: capitalize;"><label style="border:solid 0px;color:white;">Copyright &copy Edutech Educational Services Pvt. Ltd. Ahmedabad, Gujarat, India</label>
			</div></center>
		</div>
	</div>
	
</body>
</html>