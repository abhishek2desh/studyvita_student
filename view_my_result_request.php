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
				<script src="js/moment.js" type="text/javascript"></script>
		<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
	<link type="text/css" rel="stylesheet" href="css/style_image_profile.css" />
		<link href="css/bg1.css" rel="stylesheet" type="text/css" />
		<link href="css/style_images.css" rel="stylesheet" type="text/css" />
			<script type="text/javascript" src="js/flowplayer-3.2.12.min.js"></script>
		<script type="text/javascript" src="js/flexpaper.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers_debug.js"> </script>
		<link rel="stylesheet" href="css/jquery-ui.css" />
		<script src="js/jquery-ui.js"></script>
	
		<link href="menu/menu.css" rel="stylesheet" type="text/css" />
		<link href="css/style_image_result.css" rel="stylesheet" type="text/css" />

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
				 var stuname='<?php echo $u5; ?>';
				 var doc_start_time="",doc_end_time="";
		var page_source="view_my_result_request.php";
		var sub_menu_name="Test on Demand";
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
var tt_id='';
$("#cancel_hide_fac").click(function(){
					$("#profile_div").fadeOut("normal");
				});
				$("#cancel_hide_fac_all").click(function(){
					$("#profile_div_all").fadeOut("normal");
				});
				$("#brief_view_all").click(function(){
				$("#profile_detail_all").html("");
					filename = "query/get-fact-profile-all.php?sub_id="+sub_id+"&course_id="+course_id+"&test_id="+tt_id;
					
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
						$("#coupon_data1").hide();
						$("#coupon_data").hide();
	var rowCount = document.getElementById('coupontable').rows.length;
	
	
						
						$("#cancel_coupon").click(function(){
					$("#coupon_popup").fadeOut("normal");
					$("#coupon_popup").fadeOut();
					$("#coupon_data").hide();
				});
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
				 filename = "query/get-facultylist.php?sub_id="+sub_id+"&course_id="+course_id;
					//alert(filename);
						getContent(filename, "faculty_list");
						$("#cancel_hide_allot").click(function(){
					$("#login_form_material").fadeOut("normal");
					$("#shadow").fadeOut();
				});
				$("#cancel_hide_allot1").click(function(){
					$("#ppt_hide1").fadeOut("normal");
					$("#shadow").fadeOut();
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
						
							alert(data);
									docid=data;
									callFlexPaperDocViewer2(docid);
						},
					});
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
window.scrollBy(0, 300);

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
				$("#wowza").hide();
						filename = "query/view_video_topic.php?sid="+stid+"&test_id="+tt_id+"&uid="+uid;
						//alert(filename);
						getContent(filename, "videos");
						filename = "query/view_ppt_topic.php?sid="+stid+"&test_id="+tt_id+"&uid="+uid;
						
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
						//display_viewer(doc_id);
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
				$("#wowza").hide();
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
						/*filename = "test_paper_generator/36_test_report_get.php?test_id="+tt_id+"&uid="+uid;
						//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							//alert("sanjay : "+data);
							dg_report=data;
							//alert(dg_report);
							callFlexPaperDocViewer1(dg_report);
						},
					});*/
					$("#virtual_id").html("");
						filename = "query/get-virtual-class-schedule-chapter.php?sub_id="+sub_id+"&batch_id="+batch_id+"&uid="+uid+"&test_id="+tt_id;
						//alert(filename);
				getContent(filename, "virtual_id");
					}
					
				}
				else
				{
				/*$("#hide_result").show();
							$("#filter_hide_show").hide();
								$("#view_result_of_adaptive_test_student").hide();
								$("#dig_rep_id1").html("");
									$("#concept_id").html("");
								$("#int_1").html("");
								$("#dig_rep_id_hide").hide();
				filename = "30_view_student_test_result.php?uid="+uid+"&sb_result="+sb11+"&cp_result="+cp_result+"&std_result="+std_result;
			//alert(filename);
				getContent_hide(filename, "view_result_of_adaptive_test_student");*/
				location.reload();
				
				}
				
				});
				$('#videos').click(function(){
				//video2=$("#videos").val();
				$("#videos input:radio:checked").each(function() {
							idArray2=this.id;
							idArray3=this.value;
					});
					video2 = idArray2;
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
							if(rowCount>0)
							{
								$("#coupon_data").show();
							}
							else
							{
						
							}
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
				$("#view_result_of_adaptive_test_student").hide();
				$("#hide_result").show();
				//alert(sub_id_rs+sub_name_rs+sub_sort_rs);
				sb11=sub_id_rs;
				sb12=sub_name_rs;
				/*if(sb11==14){ sb12="Biology";}
				else if(sb11==15){ sb12="Maths";}
				else if(sb11==16){ sb12="Physics";}
				else if(sb11==17){ sb12="Chemistry";}
				else if(sb11==18){ sb12="Science";}
				else if(sb11==19){ sb12="English";}
				else if(sb11==20){ sb12="Mock";}
				else if(sb11==22){ sb12="SocialScience";}*/
				filename = "test_paper_generator/20_get_test_id2.php?sub_id="+sb11+"&uid="+uid;
				//alert(filename);
				getContent(filename, "test_id");
				sb11="";
				filename = "30_view_student_test_result_request.php?uid="+uid+"&sb_result="+sb11+"&cp_result="+cp_result+"&std_result="+std_result;
			//alert(filename);
				getContent_hide(filename, "view_result_of_adaptive_test_student");
				$('#sub_id_select').change(function(){
				sb11=$("#sub_id_select").val();
				sub_id=$("#sub_id_select").val();
				filename = "30_view_student_test_result_request.php?uid="+uid+"&sb_result="+sb11+"&cp_result="+cp_result+"&std_result="+std_result;
				getContent_hide(filename, "view_result_of_adaptive_test_student");
				$("#videos").empty();
	$("#virtual_id").html("");
	$("#dig_rep_id1").html("");
	$("#concept_id").html("");
	$("#notes").html("");
	$("#ppt").html("");
	
	
	
	
				});
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
					filename = "test_paper_generator/500_resoponse_get.php?test_id="+test_id+"&uid="+uid+"&qno="+m1;
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
						sb=sub_id_rs;
						sb1=sub_name_rs;
						sbj1=sub_sort_rs
						/*if(sb==14){ sb1="Biology";sbj1="BIO";}
						else if(sb==15){ sb1="Maths";sbj1="MAT";}
						else if(sb==16){ sb1="Physics";sbj1="PHY";}
						else if(sb==17){ sb1="Chemistry";sbj1="CHE";}
						else if(sb==18){ sb1="Science";sbj1="SCI";}
						else if(sb==19){ sb1="English";sbj1="ENG";}
						else if(sb==20){ sb1="Mock";}
						else if(sb==22){ sb1="SocialScience";sbj1="S.S";}*/
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
					correct = $('#first_td_1').attr("value");
					incorrect = $('#first_td_2').attr("value");
					unans = $('#first_td_3').attr("value");
					//alert();
					j=0;
					k=0;
					if(select_choice_type == "Correct")
					{
						if(correct != "")
						{
							st_array=correct.split(",");
							j=Number(st_array[0])-Number(1);
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
						}
					}
					else if(select_choice_type == "Wrong")
					{
						if(incorrect != "")
						{
							st_array=incorrect.split(",");
							j=Number(st_array[0])-Number(1);
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
						}
					}
					else if(select_choice_type == "Unattemted")
					{
						if(unans != "")
						{
							st_array=unans.split(",");
							j=Number(st_array[0])-Number(1);
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
							//alert("UID U: "+response_uniq_id_get);
							callFlexPaperDocViewer1(response_uniq_id_get);
						}
					}
				});
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
						m=Number(st_array[k])-Number(1);
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
						m=Number(st_array[k])-Number(1);
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
													//echo $crname.">".$subname.">"."Adaptive learning";
												//<label style="float:left;color:white"><b>View Result</b></label>
						?>
						
					</td>
					<td style="width:2%" valign="right">
							<img src="images/close_image.png" id="close_window" height="25px" width="25" align="right">
							</td>
				</tr>
			</table>&nbsp;<label> Select Subject </label><select id="sub_id_select" name="sub_id_select" style="width:160px;">
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
			</table><br/>
		
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
				<input type='button'  class='defaultbutton' value='View My Mistakes' onclick="window.location.href='view_my_mistakes_custom.php'"/>
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
 	</div><br/>
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