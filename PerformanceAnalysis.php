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
	//echo $subject_id;
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
		<script src="js/moment.js" type="text/javascript"></script>
		<link href="css/bg1.css" rel="stylesheet" type="text/css" />
		<link href="css/style_images.css" rel="stylesheet" type="text/css" />
			<link href="css/style_image_result.css" rel="stylesheet" type="text/css" />
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
				var sub_id_rs='<?php echo $subject_id; ?>',sub_name_rs='<?php echo $sub_name_rs; ?>',sub_sort_rs='<?php echo $sub_sort_rs; ?>';
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
				var datepickerVal37='<?php echo $today ?>',datepickerVal38='<?php echo $today ?>';
				 var batch_id='<?php echo $batch_id;?>';
				 var stu_batch_id='<?php echo $batch_id;?>';
					var sub_id='<?php echo $subject_id;?>';
				var course_id='<?php echo $course_id;?>';
				var doc_start_time="",doc_end_time="";
		var page_source="PerformanceAnalysis.php";
		var sub_menu_name="Knowledge meter";
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

				var sorttype=2;
				var strdt1,strdt2;
					strdt1="";
					strdt2="";
					var test_type=0;
					//alert(batch_id);
				$("#int_1").hide();
				 filename = "query/get-facultylist.php?sub_id="+sub_id+"&course_id="+course_id;
					//alert(filename);
						getContent(filename, "faculty_list");
				filename="query/check-grey-asnt-permission.php?batch_id="+batch_id;
					//alert(filename);			
			$.ajax({
				url: filename,
				type: 'GET',
				dataType: 'html',
				
				success: function(data, textStatus, xhr) {
					//alert(data);
					if(data == "1")
					{
					$("#grey_div").show();
					}
					else
					{
					$("#grey_div").hide();
					}
					},
					});
						 $("#search1_s").live('click',function(){
			
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
												$.ajax({
													url: filename1,
													type: 'GET',
													dataType: 'html',
										
													success: function(data1, textStatus, xhr) {
													if(data1=="")
													{
													alert("Class Booked Successfully");
													$("#virtual_id").html("");
						filename = "query/get-virtual-class-schedule-chapter.php?sub_id="+sub_id+"&batch_id="+batch_id+"&uid="+uid+"&test_id="+tt_id;
						getContent(filename, "virtual_id");
													//filename = "query/get-virtual-class-schedule.php?sub_id="+sub_id+"&batch_id="+batch_id+"&uid="+uid;
													//getContent(filename, "schedule_data");
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
					filename = "query/Get_batch_medium.php?stu_batch_id="+stu_batch_id;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							//alert(data);
							medium=data;
							if(medium=="English" || medium=="english") 
							{
							$("#dig_rep_id1").show();
							$("#viewer_1").hide();
							}
							else
							{
							$("#dig_rep_id1").hide();
							$("#viewer_1").show();
							}
						},
					});
		/*var timeout = null;
    var timee = '120000'; // default time for session time out 2miunutes.
    $(document).bind('click keyup mousemove', function(event) {

    if (timeout !== null) {
            clearTimeout(timeout);
        }
        timeout = setTimeout(function() {
              timeout = null;
            //console.log('Document Idle since '+timee+' ms');
            alert("idle window");
        }, timee);
    });*/
      

				$( "#datepicker37" ).datepicker({
					dateFormat: "yy-mm-dd",
					altField: "#alternate",
					altFormat: "DD, d MM, yy",
					onSelect: function() { 
						datepickerVal37 = $("#datepicker37").val();
						strdt1=datepickerVal37;
						strdt2= $("#datepicker38").val();
						sb11=$("#sb").val();
						test_type=$("#test_type").val();
						$("#dig_rep_id1").html("");
					$("#concept_id").html("");
					$("#int_1").hide();
					$("#videos").empty();
	$("#virtual_id").html("");
	
	$("#notes").html("");
	$("#ppt").html("");
						filename = "30_view_student_test_result_all.php?uid="+uid+"&sb_result="+sb11+"&cp_result="+cp_result+"&std_result="+std_result+"&sorttype="+sorttype+"&fromdate="+strdt1+"&todate="+strdt2+"&test_type="+test_type;
					//alert(filename);
					getContent_hide(filename, "view_result_of_adaptive_test_student");
					}
				});
					$( "#datepicker38" ).datepicker({
					dateFormat: "yy-mm-dd",
					altField: "#alternate",
					altFormat: "DD, d MM, yy",
					onSelect: function() { 
						datepickerVal38 = $("#datepicker38").val();
						strdt1=datepickerVal37;
						strdt2=datepickerVal38;
						sb11=$("#sb").val();
						test_type=$("#test_type").val();
						$("#dig_rep_id1").html("");
					$("#concept_id").html("");
					$("#int_1").hide();
					$("#videos").empty();
	$("#virtual_id").html("");
	
	$("#notes").html("");
	$("#ppt").html("");
						filename = "30_view_student_test_result_all.php?uid="+uid+"&sb_result="+sb11+"&cp_result="+cp_result+"&std_result="+std_result+"&sorttype="+sorttype+"&fromdate="+strdt1+"&todate="+strdt2+"&test_type="+test_type;
						//alert(filename);
					getContent_hide(filename, "view_result_of_adaptive_test_student");
					}
				});
				$('input[type="radio"][name="sorttype"]').click(function(){
					var sorttype1 = $("input[type='radio'][name='sorttype']:checked");
					if (sorttype1.length > 0)
					sorttype = sorttype1.val();
						sb11=$("#sb").val();
						test_type=$("#test_type").val();
						$("#dig_rep_id1").html("");
					$("#concept_id").html("");
					$("#int_1").hide();
					$("#videos").empty();
	$("#virtual_id").html("");
	
	$("#notes").html("");
	$("#ppt").html("");
						filename = "30_view_student_test_result_all.php?uid="+uid+"&sb_result="+sb11+"&cp_result="+cp_result+"&std_result="+std_result+"&sorttype="+sorttype+"&fromdate="+strdt1+"&todate="+strdt2+"&test_type="+test_type;
					getContent_hide(filename, "view_result_of_adaptive_test_student");
					//alert(filename);
					
				});
				$("#analysis_ch").click(function(){
					url="diagnostic_analysis_ch.php";
					document.location.href=url;
				});
				$("#analysis_unit").click(function(){
				url="diagnostic_analysis.php";
					document.location.href=url;
				});
					$('#sb').change(function(){
					sb11=$("#sb").val();
					test_type=$("#test_type").val();
					$("#dig_rep_id1").html("");
					$("#concept_id").html("");
					$("#int_1").hide();
					$("#videos").empty();
	$("#virtual_id").html("");
	
	$("#notes").html("");
	$("#ppt").html("");
					filename = "30_view_student_test_result_all.php?uid="+uid+"&sb_result="+sb11+"&cp_result="+cp_result+"&std_result="+std_result+"&sorttype="+sorttype+"&fromdate="+strdt1+"&todate="+strdt2+"&test_type="+test_type;
					getContent_hide(filename, "view_result_of_adaptive_test_student");
					
					});
					$('#test_type').change(function(){
				
					test_type=$("#test_type").val();
					$("#dig_rep_id1").html("");
					$("#concept_id").html("");
					$("#int_1").hide();
					$("#videos").empty();
	$("#virtual_id").html("");
	
	$("#notes").html("");
	$("#ppt").html("");
					filename = "30_view_student_test_result_all.php?uid="+uid+"&sb_result="+sb11+"&cp_result="+cp_result+"&std_result="+std_result+"&sorttype="+sorttype+"&fromdate="+strdt1+"&todate="+strdt2+"&test_type="+test_type;
					getContent_hide(filename, "view_result_of_adaptive_test_student");
					
					});
			
				$("#view_result1").live('click',function(){
				//alert();
				if($(this).val()=="View Report")
				{
				
window.scrollBy(0, 500);

				if(medium=="English" || medium=="english")
				 {
						$("#dig_rep_id_hide").show();
					$("#dig_rep_id").hide();
					$("#int_1").hide();
					var bal=($(this).closest('tr').attr('id'));
					//alert("sanjya : "+bal);
					var mySplitResult = bal.split(",");
						tt_id=mySplitResult[0];
						stid=mySplitResult[1];
						sname=mySplitResult[2];
						sub_ject=mySplitResult[3];
						sub_id=mySplitResult[4];
						sbjt12=sub_id;
						//sbjt12=sub_id_rs;
						sub_ject=sub_name_rs;
						//alert(tt_id+stid+sname+sub_ject);
						/*if(sub_ject=="Biology"){ sbjt12='14';}
						else if(sub_ject=="Maths"){ sbjt12='15';}
						else if(sub_ject=="Physics"){ sbjt12='16';}
						else if(sub_ject=="Chemistry"){ sbjt12='17';}
						else if(sub_ject=="Science"){ sbjt12='18';}
						else if(sub_ject=="English"){ sbjt12='19';}
						else if(sub_ject=="Mock"){ sbjt12='20';}
						else if(sub_ject=="SocialScience"){ sbjt12='22';}*/
						//alert(sbjt12);
						$("#videos").empty();
				
						filename = "query/view_video_topic.php?sid="+stid+"&test_id="+tt_id;
						
						getContent(filename, "videos");
							filename = "query/view_ppt_topic.php?sid="+stid+"&test_id="+tt_id;
						//alert(filename);
						getContent(filename, "ppt");
												filename = "query/view_note_topic.php?sid="+stid+"&test_id="+tt_id;
					
						getContent(filename, "notes");
						doc_id=stid+sname+tt_id;
						//alert(doc_id);
						filename = "test_paper_generator/view_concept_google.php?subject_id="+sbjt12+"&sid="+stid+"&test_id="+tt_id;
						//alert(filename);
						getContent(filename, "concept_id");
						$("#int_1").show();
						filename = "ppt1.php?sid="+stid+"&test_id="+tt_id;
						//alert(filename);
						getContent_dig(filename, "dig_rep_id1");
						$("#virtual_id").html("");
						filename = "query/get-virtual-class-schedule-chapter.php?sub_id="+sub_id+"&batch_id="+batch_id+"&uid="+uid+"&test_id="+tt_id;
						//alert(filename);
				getContent(filename, "virtual_id");
			
						//for video
					//$("#videos").empty();
					//$("#wowza").hide();
					
						
					//end video
					}
					else
					{
						var bal=($(this).closest('tr').attr('id'));
				
					var mySplitResult = bal.split(",");
						tt_id=mySplitResult[0];
						stid=mySplitResult[1];
						sname=mySplitResult[2];
						sub_ject=mySplitResult[3];
						sub_id=mySplitResult[4];
						sbjt12=sub_id;
						//sbjt12=sub_id_rs;
						sub_ject=sub_name_rs;

						doc_id=stid+sname+tt_id;
						$("#videos").empty();
				
						filename = "query/view_video_topic.php?sid="+stid+"&test_id="+tt_id;
						//alert(filename);
						getContent(filename, "videos");
							filename = "query/view_ppt_topic.php?sid="+stid+"&test_id="+tt_id;
					
						getContent(filename, "ppt");
						filename = "query/view_note_topic.php?sid="+stid+"&test_id="+tt_id;
					
						getContent(filename, "notes");
							filename = "test_paper_generator/view_concept_google.php?subject_id="+sbjt12+"&sid="+stid+"&test_id="+tt_id;
						//alert(filename);
						getContent(filename, "concept_id");
						$("#int_1").show();
						$("#virtual_id").html("");
						filename = "query/get-virtual-class-schedule-chapter.php?sub_id="+sub_id+"&batch_id="+batch_id+"&uid="+uid+"&test_id="+tt_id;
						//alert(filename);
				getContent(filename, "virtual_id");
			
					}
					
				}
				else
				{
			
				location.reload();
				
				}
				
				});
				$('#ppt').click(function(){
				ppt_id=$("#ppt").val();
				
				var mySplitResult = ppt_id.split("|");
				document_name=mySplitResult[1];
					$("#shadow").fadeIn("normal");
					$("#ppt_hide1").fadeIn("normal");
					filename ="query/view-ppt1.php?material="+document_name;
//alert(filename);
					getContent(filename, "ppt_hide2");
					
			});
				$('#notes').click(function(){
				not_id=$("#notes").val();
				
				var mySplitResult = not_id.split("|");
				document_name=mySplitResult[1];
				document_path=mySplitResult[2];
				input = document_path;
				output = input.substr(0, input.lastIndexOf('.')) || input;
						value = output.replace(/\\/g, "\\\\");
			$("#shadow").fadeIn("normal");
					$("#login_form_material").fadeIn("normal");
					filename = "query/copy_location_query_2.php?output="+value+"&mn="+document_name;
					//filename = "query/copy_location_query_2.php?code="+document_name;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
						/*alert(data);
							docid=data;
							mat_id=docid;
						
							mat_name=mat_id+".pdf";
							
							callFlexPaperDocViewer1(docid);*/
							alert(data);
									docid=data;
									callFlexPaperDocViewer2(docid);
						},
					});
					});
				$('#videos').click(function(){
				video2=$("#videos").val();
				//alert(video2);
				var mySplitResult = video2.split("|");
					video1=mySplitResult[0];
					video_id=mySplitResult[1];
					if(video_id>0)
					{
					var url="http://student.coreacademics.in/view-video.php?id="+video_id;
					//var url = "http://www8.hp.com/in/en/products/printers/index.html#!view=grid&page=1&facet=HP-ePrint";
					window.open(url, '_blank');
					}
					
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
				
				
				
				
					$("#hide_result").show();
					$("#view_result_of_adaptive_test_student").hide();
					filename = "30_view_student_test_result_all.php?uid="+uid+"&sb_result="+sb11+"&cp_result="+cp_result+"&std_result="+std_result+"&sorttype="+sorttype+"&fromdate="+strdt1+"&todate="+strdt2+"&test_type="+test_type;
					//alert(filename);
					getContent_hide(filename, "view_result_of_adaptive_test_student");
				
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

	<div style='background-color:#fff;width:100%'>
		<div class='trable_bg' style='position: fixed;z-index: 2;padding-left:0px;color:yellow;border:solid 0px;width:100%'>
			<table style='width:100%' cellspacing="0">
				<tr>
					<td style='width:100%;'>
						<center><?php require 'adlp.php'; ?></center>
					</td>
				</tr>
				
			</table>
		</div>
		<div style='background-color:#fff;width:100%;height:1000px;'>
			<table style="padding-top:85px;border:solid 0px;width:100%;height:25px;">
			
<!--<tr>
		<td><b>Welcome <?php echo "&nbsp;&nbsp;&nbsp;".$u5."&nbsp;&nbsp;!&nbsp;&nbsp;&nbsp;&nbsp;</b>";
		?>
		</td>
		</tr>-->

				<tr>
					<td style="background-color:#0f2541;border:solid 0px;width:98%;">
					<?php
												$result_c=mysql_query("SELECT name FROM course WHERE id='$course_id'");
												$row_c=mysql_fetch_array($result_c);
												$crname=$row_c[0]; 
												$result_c1=mysql_query("SELECT name FROM subject WHERE id='$subject_id'");
												$row_c1=mysql_fetch_array($result_c1);
												$subname=$row_c1[0];
												echo "<label style='float:left;color:#ffffff;padding-left:5px;'><font face='verdana' size='2' color='white' ><b>Welcome &nbsp;&nbsp;&nbsp;".$u5."&nbsp;&nbsp;!&nbsp;&nbsp;&nbsp;&nbsp;".$tutorname.">".$crname.">".$subname.">"."Performance Analysis<b></font></label>";
											
												//<label style="float:left;color:white"><b>View My Mistakes</b></label>
						?>
						
						
					</td>
					<td style="width:2%" valign="right">
							<img src="images/close_image.png" id="close_window" height="25px" width="25" align="right">
							</td>
				</tr>
			</table>
			<div>
				<table>
					<tr>
					<td>
					<label><b>From Date</b></label>
					<input type="text" id="datepicker37" value="<?php echo $today ?>" style='width:100px;'/>
					<label><b>To Date<b/></label>
					<input type="text" id="datepicker38" value="<?php echo $today ?>" style='width:100px;'/>
					</td>
					<td>
						<label><b>Subject :</b></label>
							<select id="sb" name="sb" style="background-color:white;width:150px;">
							<?php
							$result=mysql_query("SELECT  DISTINCT s.id,s.name FROM `adaptive_learning_test` alt,SUBJECT s WHERE alt.student_id='$s5'
							AND s.id=alt.subject");
							
							$rw = mysql_num_rows($result);
							echo "<option value='0'>Select Subject</option>";
							if($rw == 0)
							{
								echo "<option value='0'>No Data Available.</option>";
							}
							else
							{
								while($row=mysql_fetch_array($result))
								{
								if($row[1]=="All")
								{
								$row[1]="Mock";
								}
									echo "<option value=$row[0]>$row[1]</option>";
								}
							}
							?>
							</select>
					</td>
					<td>
						<label><b>Test Type :</b></label>
							<select id="test_type" name="test_type" style="background-color:white;width:150px;">
							<option value='0'>Select Test Type</option>
							<option value='1'>Adaptive</option>
							<option value='2'>Adaptive learning</option>
							<option value='3'>Chapter</option>
							<option value='4'>Customized</option>
							<option value='5'>Demand</option>
							<option value='6'>Scheduled</option>
							<option value='7'>Unit</option>
							
							</select>
					</td>
					<td>
							<label><b>Sort by :</b></label>
					<input id="2" type="radio" name="sorttype" checked="checked" value="2"><label style='color:black' for="2"><b>Date</b></label>
					<input id="1" type="radio" name="sorttype" value="1"><label style='color:black' for="1"><b>Subject</b></label>
				</td>
					</tr>
				</table>
			</div>
			<table style="border:solid 0px;width:100%;height:25px;">
				<tr>
					<td style="border:solid 0px;width:100%;height:150px;">
						<div style="background-color:#3366FF;border:solid 0px;width:100%;height:40px;">
							<table style='width:100%'>
								<tr>
									<td style="width:100px;background-color:#3366FF;border:solid 1px;height:20px;"><center><label style="color:white"><b>Test-Date</b></label></center></td>
									<td style="width:100px;background-color:#3366FF;border:solid 1px;height:20px;"><center><label style="color:white"><b>Test-ID</b></label></center></td>
									<td style="width:100px;background-color:#3366FF;border:solid 1px;height:20px;"><center><label style="color:white"><b>Test-Type</b></label></center></td>
									<td style="width:100px;background-color:#3366FF;border:solid 1px;height:20px;"><center><label style="color:white"><b>Subject</b></label></center></td>
									<td style="width:200px;background-color:#3366FF;border:solid 1px;height:20px;"><center><label style="color:white"><b>Chapter</b></label></center></td>
									<td style="width:100px;background-color:#3366FF;border:solid 1px;height:20px;"><center><label style="color:white"><b>Chap. No.</b></label></center></td>
									<td style="width:100px;background-color:#3366FF;border:solid 1px;height:20px;"><center><label style="color:white"><b>Correct</b></label></center></td>
									<td style="width:100px;background-color:#3366FF;border:solid 1px;height:20px;"><center><label style="color:white"><b>Incorrect</b></label></center></td>
									<td style="width:100px;background-color:#3366FF;border:solid 1px;height:20px;"><center><label style="color:white"><b>Unattempt</b></label></center></td>
									<td style="width:100px;background-color:#3366FF;border:solid 1px;height:20px;"><center><label style="color:white"><b>Total</b></label></center></td>
									<td style="width:100px;background-color:#3366FF;border:solid 1px;height:20px;"><center><label style="color:white"><b>Time-Taken</b></label></center></td>
										<?php
									$result_u=mysql_query("SELECT id FROM `batch` WHERE id='$batch_id' AND Grey_assignment_display='1' ");
		$rwc=mysql_num_rows($result_u);
	if($rwc==0)
	{
	
	}
	else
	{
		echo "<td style='width:100px;background-color:#3366FF;border:solid 1px;height:20px;'><center><label style='color:white'><b>Diagnostic<br/> Report</b></label></center></td>";
	}
									?>
									<!--<td style="width:100px;background-color:#3366FF;border:solid 1px;height:20px;"><center><label style="color:white"><b>Diagnostic<br/> Report</b></label></center></td>-->
								</tr>
							</table>
						</div>
						<div id='view_result_of_adaptive_test_student' style="border:solid 0px;width:100%;height:210px;overflow-y: scroll;">
						</div>
						<div id='hide_result' style="padding-top:75px;border:solid 0px;width:100%;height:150px;overflow-y: scroll;">
							<center><img src='loading/di_load.gif' width='66px;' height='66px;'></center>
						</div>
					</td>
				</tr>
			</table>
			<div id='grey_div'>
			<table style="padding-top:0px;border:solid 0px;width:100%;height:25px;">
				<tr>
					<td style="background-color:#3366FF;border:solid 0px;">
				
											<label style='float:left;color:#ffffff;'><font face='verdana' size='2' color='white' ><b>Grey Area Support System[GASS]</b></font></label>
													
						
					</td>
				</tr>
			</table>
<br/>
			<table style="border:solid 0px;width:100%;height:450px;">
				<tr>
					<td style="border:solid 1px;width:50%;overflow-y:scroll;height:438px;background-color:white;" id="dig_rep_id_hide" >
						<center><img src='loading/di_load.gif' width='66px;' height='66px;'></center>
					</td>
					<td style="border:solid 1px;width:50%;height:438px;background-color:white;" id="dig_rep_id" >
						<div class='tdbox' id="dig_rep_id1" name="dig_rep_id1" style="border:solid 0px;overflow-y: 	scroll;background-color:white;width:100%;height:438px;">
						</div>
					</td>
					<td valign='top' style="border:solid 1px;width:50%;">
						<div style="border:solid 0px;overflow-y:scroll;background-color:white;width:100%;height:138px;" id="int_1">
							
							<b>Dear <?php echo $u5; ?></b><br/>
							<div style='padding-left:20px;'>Your grey concepts for the selected test is listed below. You are advised to take help of your teacher to understand these concepts well. You can also take the help of video lectures and web resources to strengthen these concepts. After that you are advised to do the Grey Area Assignment based on this test ID. If you are not getting full score in Grey Area Assignment, you are advised to revise these topics again before attending the second Grey Area assignment. Repeat this cycle until you get full score in Grey Area Assignment which indicate that your grey concepts are cleared.</div><br/>
							<b>Global Eduserver Team</b>
							
						</div>
						<div class='tdbox' id="concept_id" name="concept_id" style="border:solid 0px;overflow-y: 	scroll;background-color:white;width:100%;height:300px;">
						</div>
					</td>
				</tr>
			</table><br/>
			<table>
			<tr>
			<td>
			<input type='button' class='defaultbutton' id='analysis_ch' value='Chapterwise Analysis' />
				<input type='button' class='defaultbutton' id='analysis_unit' value='Unitwise Analysis' />
			</td>
			</tr>
			</table>
			<table style="width:100%;">
			<tr>
			<td style="width:25%;">
		
				Video Lectures-Select Topic
			</td>
			<td style="width:17%;">
		
				PPT List
			</td>
			<td style="width:17%;">
		
				Notes List
			</td>
			<td style="width:41%;">
			Virtual Class List
			</td>
			</tr>
			<tr>
			<td style="width:25%;" valign="top">
			<select id='videos' size='4' style='width:100%;height: 394px;' name='videos' >
				</select>
				
			</td>
			<td style="width:17%;">
			<select id='ppt' size='4' style='width:100%;height: 394px;' name='ppt' >
				</select>
			
			</td>
			<td style="width:17%;">
			<select id='notes' size='4' style='width:100%;height: 394px;' name='notes' >
				</select>
				
			</td>
			<td style="width:41%;" valign="top">
			<table style="width:100%;">
			
			<tr>
			<td style="width:100%;"><div id="virtual_id" name="virtual_id" style="border:solid 1px;overflow-y: 	scroll;background-color:white;width:100%;height:160px;">
						</div>
			</td>
			</tr>
			<tr>
			<td style="width:100%;">FASSS Faculty List
			</td>
			</tr>
			<tr>
			<td style="width:100%;"><div id="faculty_list" name="faculty_list" style="border:solid 0px;overflow-y: 	scroll;background-color:white;width:100%;height:150px;">
						</div><br/>
						Missing your favorite teacher? Invite him/her to join studyvita
							<input type='button' class='defaultbutton' id='invite_teach' value='Invite Now' />
			</td>
			</tr>
			</table>
			<center>
			
			</center></td>
			</td>
			</tr>
			</table><br/>
			</div>
		
	        <div>
                <?php require 'copy_right_file.php'; ?>
            </div>
<center><div id="invite_email_hide" style="width:60%;">
		<div class="err" id="add_err"></div>
			<form action="" style="width:100%;">
			
			<table style="background-color:#2196F3;border:px solid;width:100%;height:30px;">
					<tr>
						<td style='width:95%;'>
							<center><strong><label style="color:white">Invite Teacher</label></strong></center>
						</td>
						<td style='width:5%;'>
							<center><img src="images/close_image.png" id='cancel_hide_email' height="25px" width="25"></center>
						</td>
					</tr>
				</table><br/>
				<table style="border:0px solid;width:100%;background-color:;">
				<tr>
				<td>Hi Sir/ Madam<br/></br>
Today I came across a website that is offering so many unique features like Adaptive Learning, Diagnostic Reports, and even Grey Area Support System. In that there is an option for clearing my doubts online through virtual classes with teachers at a suitable time by paying a fees. There are so many teachers available, but you are my favorite teacher. I would prefer to study from you rather than any one else. It will save me a lot of time in travelling. Please logon to www.coreacademics.in and register yourself as a faculty so that your expertise in the subject will be available to students across the globe.<br/>
Your's obedient student.<br/>
<?php echo $u5 ?>

				</td>
				</tr>
				</table>
				<table style="border:0px solid;width:100%;background-color:;">
				<tr>
				<td>Teacher Name
				</td>
				<td>
				<input type="text" class="inputs" id="teach_name" />
				</td>
				</tr>
				<tr>
				<td>
				Email
				</td>
				<td>
				<input type="text" class="inputs" id="teach_email" />
				</td>
				</tr>
				<tr>
				<td>
				</td>
				<td>
				<input type='button' class='defaultbutton' id='invite_email' value='Send Email' />
				</td>
				</tr>
				
				</table>
				</div>
				</table>
			</form>
		</div></center>
	<center><div id="ppt_hide1" style="width:70%;">
		<div class="err" id="add_err"></div>
			<form action="" style="width:100%;">
			<table style="background-color:#2196F3;border:px solid;width:100%;height:30px;">
					<tr>
						<td style='width:95%;'>
							<center><strong><label style="color:white">View Presentation</label></strong></center>
						</td>
						<td style='width:5%;'>
							<center><img src="images/close_image.png" id='cancel_hide_allot1' height="25px" width="25"></center>
						</td>
					</tr>
				</table>
				<table style="border:0px solid;width:100%;background-color:#393A3D;">
				<div class='hde' style='background-color:#393A3D;width:100%;height:100px;'></div>
				<div id="ppt_hide2" style="background-color:#393A3D;">
				</div>
				</table>
			</form>
		</div></center>
				<div id="login_form_material">
			<div class="err" id="add_err"></div>
			<form action="" style="width:100%;">
				<table style="background-color:#2196F3;border:px solid;width:100%;height:30px;">
					<tr>
						<td style='width:95%;'>
							<center><strong><label style="color:white">View Material</label></strong></center>
						</td>
						<td style='width:5%;'>
							<center><img src="images/close_image.png" id='cancel_hide_allot' height="25px" width="25"></center>
						</td>
					</tr>
				</table>
				<table style="border:0px solid;width:100%;">
					<div id="viewer_2" class="flexpaper_viewer" style="border:solid 1px;width:680px;height:360px"></div>
						<script type="text/javascript">
							function getDocumentUrl(document){
								//alert(document);
								//alert("services/view.php?doc={doc}&format={format}&page={page}");
								return "services/view.php?doc={doc}&format={format}&page={page}".replace("{doc}",document);
							}
							function getDocQueryServiceUrl(document){
								return "services/swfsize.php?doc={doc}&page={page}".replace("{doc}",document);
							}
							var startDocument = "<?php if(isset($_GET["doc"])){echo $_GET["doc"];}else{?>paper_gen.pdf<?php } ?>";
							$('#viewer_2').FlexPaperViewer(
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
							
							function callFlexPaperDocViewer2(startDocument1){
								//alert(startDocument1);
							
								$('#viewer_2').FlexPaperViewer({
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
				</table>
			</form>
		</div>
 	</div>
	
</body>
</html>