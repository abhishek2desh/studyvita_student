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
			
	
	
		<link href="css/bg1.css" rel="stylesheet" type="text/css" />
		<link href="css/style_images.css" rel="stylesheet" type="text/css" />
			<link href="css/style_image_result.css" rel="stylesheet" type="text/css" />
	<script src="js/moment.js" type="text/javascript"></script>
		
		<link rel="stylesheet" href="css/jquery-ui.css" />
		<script src="js/jquery-ui.js"></script>
	
		
			<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="js/flexpaper.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers_debug.js"> </script>
<link type="text/css" rel="stylesheet" href="css/style_image_profile.css" />
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
			.hde {
			   position: absolute;  
			   left:0px; 
			   right:0px; 
			   width: 90%; 
			   
			}
		</style>
		<script type="text/javascript">
  setInterval(function(){
      $('blink').each(function(){
        $(this).css('visibility' , $(this).css('visibility') === 'hidden' ? '' : 'hidden')
      });
    }, 250);
</script>
		<script type="text/javascript">
				function couponpopup()
{	
$("#coupon_popup").fadeIn("normal");
					$("#shadow").fadeIn();
					
}		
function insertdt(record_id)
{	
	
	filename2 = "query/insert-coupon-data.php?record_id="+record_id+"&uid=<?php echo $s5;?>";
	
	$.ajax({
			url: filename2,
			type: 'GET',
			dataType: 'html',
			success: function(data, textStatus, xhr) {
			
				var link_coupon=data;
				
				 window.open(link_coupon, '_blank');
				/* var a = document.createElement('a');
a.href=link_coupon;
a.target = '_blank';
document.body.appendChild(a);
a.click();*/
			},
		});
}	
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
					var stu_batch_id='<?php echo $batch_id;?>';
					var sub_id='<?php echo $subject_id;?>';
				var course_id='<?php echo $course_id;?>';
				 var batch_id='<?php echo $batch_id;?>';
				 var tt_id='';
			var doc_start_time="",doc_end_time="";
		var page_source="view_my_result_chaptertest.php";
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
				$("#cancel_hide_allot").click(function(){
					$("#login_form_material").fadeOut("normal");
					$("#shadow").fadeOut();
				});
				$("#cancel_hide_allot1").click(function(){
					$("#ppt_hide1").fadeOut("normal");
					$("#shadow").fadeOut();
				});
				var stuname='<?php echo $u5; ?>';
			$("#cancel_hide_email").click(function(){
					$("#invite_email_hide").fadeOut("normal");
					$("#shadow").fadeOut();
				});
				$('#invite_teach').click(function(){
					
					$("#teach_name").html(" ");
					$("#teach_email").html(" ");
					$("#invited_fact_id").html(" ");
					$("#invite_email_hide").fadeIn("normal");
					 filename = "query/get_invited_teacher_list.php";
					getContent(filename, "invited_fact_id");
				});
				$('#invite_email').click(function(){
					tname=$('#teach_name').val();
					temail=$('#teach_email').val();
					if(tname=="" || temail=="")
					{
					alert("Some fields are empty");
					}
					else
					{
					
					filename="query/send_favourite_teacher_email.php?tname="+tname+"&uid="+uid+"&temail="+temail+"&stuname="+stuname;
										
									$.ajax({
										url: filename,
										type: 'GET',
										dataType: 'html',
										
										success: function(data, textStatus, xhr) {
											
											if(data == "")
											{
											alert("email send successfully");
											filename1 = "query/get_invited_teacher_list.php";
					getContent(filename1, "invited_fact_id");
											}
											else
											{
											alert(data);
											}
											},
										});
					}
				});
				
				 //alert(batch_id);
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
var rowCount = document.getElementById('coupontable').rows.length;
				 filename = "query/get-facultylist.php?sub_id="+sub_id+"&course_id="+course_id+"&test_id="+tt_id;
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
					if(rowCount==0)
					{
					$("#grey_div").show();
					}
					else
					{
					$("#grey_div").hide();
					}
					}
					else
					{
					$("#grey_div").hide();
					}
					},
					});
		$("#cancel_coupon").click(function(){
					$("#coupon_popup").fadeOut("normal");
					$("#coupon_popup").fadeOut();
					$("#coupon_data").hide();
				});
					$("#coupon_data1").hide();
						$("#coupon_data").hide();
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
			$("#analysis_ch").click(function(){
					url="diagnostic_analysis_ch.php";
					document.location.href=url;
				});
				$("#analysis_unit").click(function(){
				url="diagnostic_analysis.php";
					document.location.href=url;
				});
				$("#int_1").hide();
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
					$("#cancel_hide_fac").click(function(){
					$("#profile_div").fadeOut("normal");
				});
				$("#cancel_hide_fac_all").click(function(){
					$("#profile_div_all").fadeOut("normal");
				});
				$("#brief_view_all").click(function(){
				$("#profile_detail_all").html("");
					filename = "query/get-fact-profile-all.php?sub_id="+sub_id+"&course_id="+course_id+"&test_id="+tt_id;
					//alert(filename);
					getContent(filename, "profile_detail_all");
				$("#profile_div_all").fadeIn("normal");
					$("#shadow").fadeIn();
				});
					$("#brief_view").live('click',function(){
						var bal=($(this).closest('tr').attr('id'));
						$("#profile_detail").html("");
					filename = "query/get-fact-profile.php?fact_id="+bal;
					
					getContent(filename, "profile_detail");
				$("#profile_div").fadeIn("normal");
					$("#shadow").fadeIn();
					});
						$("#request_class").live('click',function(){
						var bal=($(this).closest('tr').attr('id'));
							filename = "query/request_class.php?uid="+uid+"&fact_id="+bal+"&test_id="+tt_id;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
						if(data=='')
						{
						alert("Data updated successfully");
						filename1 = "query/get-facultylist.php?sub_id="+sub_id+"&course_id="+course_id+"&test_id="+tt_id;
					//alert(filename1);
						getContent(filename1, "faculty_list");

						}
						else
						{
						alert(data);
						}
						},
						});
						
						});
				$("#view_result1").live('click',function(){
				//alert();
				if($(this).val()=="View Report")
				{
				 $("#coupon_data").hide();
					$("#coupon_data1").show();
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
				window.scrollBy(0,300);
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
				
						filename = "query/view_video_topic.php?sid="+stid+"&test_id="+tt_id+"&uid="+uid;
						
						getContent(filename, "videos");
							filename = "query/view_ppt_topic.php?sid="+stid+"&test_id="+tt_id+"&uid="+uid;
						//alert(filename);
						getContent(filename, "ppt");
												filename = "query/view_note_topic.php?sid="+stid+"&test_id="+tt_id+"&uid="+uid;
					
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
			 filename = "query/get-facultylist.php?sub_id="+sub_id+"&course_id="+course_id+"&test_id="+tt_id;
					//alert(filename);
						getContent(filename, "faculty_list");
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
				
						filename = "query/view_video_topic.php?sid="+stid+"&test_id="+tt_id+"&uid="+uid;
						//alert(filename);
						getContent(filename, "videos");
							filename = "query/view_ppt_topic.php?sid="+stid+"&test_id="+tt_id+"&uid="+uid;
					
						getContent(filename, "ppt");
						filename = "query/view_note_topic.php?sid="+stid+"&test_id="+tt_id+"&uid="+uid;
					
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
				//ppt_id=$("#ppt").val();
				$("#ppt input:radio:checked").each(function() {
							idArray2=this.id;
							idArray3=this.value;
					});
					ppt_id = idArray2;
				var mySplitResult = ppt_id.split("|");
				document_name=mySplitResult[1];
					$("#shadow").fadeIn("normal");
					$("#ppt_hide1").fadeIn("normal");
					filename ="query/view-ppt1.php?material="+document_name;
//alert(filename);
					getContent(filename, "ppt_hide2");
					
			});
				$('#notes').click(function(){
				//not_id=$("#notes").val();
				$("#notes input:radio:checked").each(function() {
							idArray2=this.id;
							idArray3=this.value;
					});
					not_id = idArray2;
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
				//video2=$("#videos").val();
				$("#videos input:radio:checked").each(function() {
							idArray2=this.id;
							idArray3=this.value;
					});
					video2 = idArray2;
				//alert(video2);
				var mySplitResult = video2.split("|");
					video1=mySplitResult[0];
					video_id=mySplitResult[1];
					if(video_id>0)
					{
					var url="http://student.studyvita.com/view-video.php?id="+video_id;
					//var url = "http://www8.hp.com/in/en/products/printers/index.html#!view=grid&page=1&facet=HP-ePrint";
					window.open(url, '_blank');
					}
					
			});
				$("#dig_rep_id_hide").hide();
				//$("#dig_rep_id").hide();
				
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
							if(rowCount>0)
							{
								$("#coupon_data").show();
							}
							else
							{
						
							}
							//alert(data);
							//$("#sel_type").show();
						},
					});
				}
				
				//alert(sb11);
				$("#view_result_of_adaptive_test_student").hide();
				$("#hide_result").show();
				//alert(sub_id_rs+sub_name_rs+sub_sort_rs);
				sb11=sub_id_rs;
				sb12=sub_name_rs;
				sb11=""
				filename = "30_view_student_test_result_chapter.php?uid="+uid+"&sb_result="+sb11+"&cp_result="+cp_result+"&std_result="+std_result;
			//alert(filename);
				getContent_hide(filename, "view_result_of_adaptive_test_student");
				
				
				
				$(".loading-gif").hide();
				$('#sub_id_select').change(function(){
				sb11=$("#sub_id_select").val();
				sub_id=$("#sub_id_select").val();
				filename = "30_view_student_test_result_chapter.php?uid="+uid+"&sb_result="+sb11+"&cp_result="+cp_result+"&std_result="+std_result;
				getContent_hide(filename, "view_result_of_adaptive_test_student");
				$("#videos").empty();
	$("#virtual_id").html("");
	$("#dig_rep_id1").html("");
	$("#concept_id").html("");
	$("#notes").html("");
	$("#ppt").html("");
	
	
	
	
				});
				
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
												$result_c=mysql_query("SELECT c.name,u.name FROM course c,user u WHERE c.id='$course_id' and u.id=c.tutor_id");
												$row_c=mysql_fetch_array($result_c);
												$crname=$row_c[0]; 
												$tutorname=$row_c[1]; 
												
												
												$result_c1=mysql_query("SELECT name FROM subject WHERE id='$subject_id'");
												$row_c1=mysql_fetch_array($result_c1);
												$subname=$row_c1[0];
												echo "<label style='float:left;color:#ffffff;padding-left:5px;'><font face='verdana' size='2' color='white' ><b>Welcome &nbsp;&nbsp;&nbsp;".$u5."&nbsp;&nbsp;!&nbsp;&nbsp;&nbsp;&nbsp;".$tutorname.">".$crname.">".$subname.">"."View Result<b></font></label>";
												
						?>
						
					</td>
					<td style="width:2%" valign="right">
							<img src="images/close_image.png" id="close_window" height="25px" width="25" align="right">
							</td>
				</tr>
			</table>
			&nbsp;<label> Select Subject </label><select id="sub_id_select" name="sub_id_select" style="width:160px;">
			<?php
			$result_link1=mysql_query("SELECT SUBJECT FROM course WHERE id='$course_id'");
		$res_row=mysql_fetch_array($result_link1);
		$sb_mn=substr($res_row[0], 0, -1);
		$lst = explode(",", $sb_mn);
		echo "<option value=''>Select Subject</option>";
		foreach($lst as $item) 
		{
			$result_link11=mysql_query("SELECT id,name FROM subject WHERE id='$item'");
			$res_row1=mysql_fetch_array($result_link11);
			if($res_row1[1]=="All")
			{
			echo "<option value='$res_row1[0]'>Mock</option>";
			}
			else
			{
			echo "<option value='$res_row1[0]'>$res_row1[1]</option>";
			}
			
			
		}
			?>
									</select><br/>
			<table style="border:solid 0px;width:100%;height:25px;">
				<tr>
					<td style="border:solid 0px;width:100%;height:150px;">
						<div style="background-color:#3366FF;border:solid 0px;width:100%;height:40px;">
							<table style='width:100%'>
								<tr>
									<td style="width:100px;background-color:#3366FF;border:solid 1px;height:20px;"><center><label style="color:white"><b>Test-Date</b></label></center></td>
									<td style="width:100px;background-color:#3366FF;border:solid 1px;height:20px;"><center><label style="color:white"><b>Test-ID</b></label></center></td>
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
		echo "<td style='width:100px;background-color:#3366FF;border:solid 1px;height:20px;'><center><label style='color:white'><b><blink>Diagnostic<br/> Report</blink></b></label></center></td>";
	}
									?>
								
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
			<br/>
			
				<div id='coupon_data'>
				
				<table style='width:100%'>
				<tr>
					<td style="background-color:#0f2541;border:solid 0px;width:100%;">
					<label style='float:left;color:#ffffff;padding-left:5px;'><font face='verdana' size='2' color='white' ><b>You are eligible for offers from the following brands.</b>
					</font></label>
					</td>
					</tr>
					</table>
					
				<?php
				$rs = mysql_query("SELECT id,`product_logo_file` FROM couponcode_management  where display='1' order by  id ");
				$total_col=0;
				$rw=mysql_num_rows($rs);
					echo "<table  style='width:100%;' id='coupontable'>";
				if($rw==0)
				{
				}
				else
				{
				echo "<tr>";
						while($row=mysql_fetch_array($rs))
			{
			if($total_col==4)
			{
			echo "</tr><tr>";
			}
			echo "<td valign='top' style='width:25%;'><img src='http://www.coreacademics.in/marketing/couponimage/$row[1]'   style='width:200px;height:150px;'  onclick='couponpopup()'></td>";
			$total_col=$total_col+1;
			}
			
			}
			echo "</table>";
			?>
				</div>
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
						<div id="viewer_1" style="border:solid 	0px;overflow-y:scroll;background-color:white;width:675px;height:438px;">
							<script type="text/javascript">
								function getDocumentUrl(document){
									//alert(document);
									//alert("services/view.php?doc={doc}&format={format}&page={page}");
									return "services/view.php?doc={doc}&format={format}&page={page}".replace("{doc}",document);
								}
								function getDocQueryServiceUrl(document){
									return "services/swfsize.php?doc={doc}&page={page}".replace("{doc}",document);
								}
								var startDocument = "<?php if(isset($_GET["doc"])){echo $_GET["doc"];}else{?>dgreport.pdf<?php } ?>";
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
			</table>
			<table>
			<tr>
			<td>
			<input type='button' class='defaultbutton' id='analysis_ch' value='Chapterwise Analysis' />
				<input type='button' class='defaultbutton' id='analysis_unit' value='Unitwise Analysis' />
				<input type='button' class='defaultbutton'  value='View My Mistakes' onclick="window.location.href='view_my_mistakes_custom.php'"/>
			</td>
			</tr>
			</table><br/>
			<table style="width:100%;">
			<tr>
			<td style="width:100%;">
		
				Video Lectures-Select Topic
				<div id="videos" name="videos" style="border:solid 1px;overflow-y: 	scroll;background-color:white;width:100%;height:100px;"></div>
			</td>
			</tr>
			<tr>
			<td style="width:100%;">
		
				PPT List
				<div id="ppt" name="ppt" style="border:solid 1px;overflow-y: 	scroll;background-color:white;width:100%;height:100px;"></div>
			</td></tr>
			<tr>
			<td style="width:100%;">
		
				Notes List
				<div id="notes" name="notes" style="border:solid 1px;overflow-y: 	scroll;background-color:white;width:100%;height:100px;"></div>
			</td></tr>
			<tr>
			<td style="width:100%;">
			Virtual Class List
			<div id="virtual_id" name="virtual_id" style="border:solid 1px;overflow-y: 	scroll;background-color:white;width:100%;height:100px;">
						</div>
			</td>
			</tr>
			<tr>
			<td style="width:100%;" valign="top">
			<br/>
			FASSS Faculty List&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="button" class="defaultbutton" id="brief_view_all" value="View All Faculty Profile">

				<div id="faculty_list" name="faculty_list" style="border:solid 0px;overflow-y: 	scroll;background-color:white;width:100%;height:100px;">
						</div>
						<br/>
						Missing your favorite teacher? Invite him/her to join studyvita
							<input type='button' class='defaultbutton' id='invite_teach' value='Invite Now' />
			</td>
			</tr>
			</table><br/>
			
			<!--<table style="width:100%;">
			<tr>
			<td style="width:40%;">
		
				Select Topic
			</td>
			<td style="width:60%;">
			
			</td>
			</tr>
			<tr>
			<td style="width:40%;" valign="top">
			<select id='videos' size='4' style='width:100%;height: 394px;' name='videos' >
				</select>
				
			</td>
			<td style="width:60%;">
			<center>
				<a href="" style="border:solid 3px;display: block; width: 619px; height: 394px;" id="wowza"></a>
			</center></td>
			</td>
			</tr>
			</table>--><br/>
			</div>
			<div id='coupon_data1'>
				<?php
				$rs = mysql_query("SELECT id,`product_logo_file`,product_website FROM couponcode_management   where display='1' order by  id ");
				$total_col1=0;
				echo "<table style='width:100%;'><tr>";
						while($row=mysql_fetch_array($rs))
			{
			if($total_col1==4)
			{
			echo "</tr><tr>";
			}
			//echo "<td valign='top' style='border:solid 1px;width:25%;'><a href='$row[2]' target='_blank'><img src='http://www.coreacademics.in/marketing/couponimage/$row[1]' style='width:200px;height:150px;' ></a></td>";
			echo "<td valign='top' style='border:solid 1px;width:25%;'><img src='http://www.coreacademics.in/marketing/couponimage/$row[1]' style='width:200px;height:150px;'  onclick='insertdt(".$row[0].")'></td>";
			$total_col1=$total_col1+1;
			}
			echo "</table>";
				?>
				</div>
		
		</div>
		<div>
			<?php require 'copy_right_file.php'; ?>
		</div>
		<div id="coupon_popup">
			<div class="err" id="add_err"></div>
			<form action="" style="width:100%;">
				<table style="background-color:#2196F3;border:px solid;width:100%;height:30px;">
					<tr>
						<td style='width:95%;'>
							<center><strong><label style="color:white"></label></strong></center>
						</td>
						<td style='width:5%;'>
							<center><img src="images/close_image.png" id='cancel_coupon' height="25px" width="25"></center>
						</td>
					</tr>
				</table>
				<p>
				Congratulations!! Click on the button on right top corner to view diagnostic report. Your offers will be available below grey area support system.</p>
				
</form></div>	

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
<div style="height:450px;width:100%;">
</div>
	
	
	<?php
			include 'profile-popup.php';
		?>
		<?php
			include 'profile-popup-all.php';
		?>
		<?php
			include 'invite-teacher-popup.php';
		?>	
</body>
</html>