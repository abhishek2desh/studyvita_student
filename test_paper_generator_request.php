<?php
	include 'config.php';
	session_start();
	
	$course_id=$_SESSION['course_id'];
	$batch_id=$_SESSION['batch_id'];
	$subject_id=$_SESSION['subject_id'];
	$s1=$_SESSION['studid1'];
	$s5=$_SESSION['sid'];
	$s3=$_SESSION['grp1'];
	$u5 = $_SESSION['uname'];
	$Date_now =date('Y-m-d');
			$currentDate = strtotime(date("Y-m-d H:i:s"));
 
 $resultfr=mysql_query("SELECT date_formula from server_date_formula where active='1'");
	$formula=0;
	while($rowfr=mysql_fetch_array($resultfr))
	{
	$formula=$rowfr[0];
	}
	$requestdate = $currentDate+($formula);
	$requestdate=date("Y-m-d", $requestdate);
?>
<!DOCTYPE html>
<html lang="en">
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
		<script type="text/javascript" src="js/flexpaper.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers_debug.js"> </script>
		<link href="menu/menu.css" rel="stylesheet" type="text/css" />
		<link type="text/css" rel="stylesheet" href="css/style_image_demo.css" />
	<link rel="stylesheet" href="css/jquery-ui.css" />
		<script src="js/jquery-ui.js"></script>
		<link href="menu/menu.css" rel="stylesheet" type="text/css" />
		<style>
			
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
			@import url(http://fonts.googleapis.com/css?family=Raleway:400,700);
			body {
			
				-webkit-background-size: cover;
				-moz-background-size: cover;
				background-size: cover;
			}
			.container > header h1,
			.container > header h2 {
				color: #fff;
				text-shadow: 0 1px 1px rgba(0,0,0,0.7);
			}
			#mainselection34 select {
			   border: 0;
			   color: #757575;
			   background: transparent;
			   font-size: 14px;
			   padding: 7px 10px;
			   width: 278px;
			   *width: 350px;
			   *background: #58B14C;
			   -webkit-appearance: none;
			}

			#mainselection34 {
			   overflow:hidden;
			   width:250px;
			   -moz-border-radius: 9px 9px 9px 9px;
			   -webkit-border-radius: 9px 9px 9px 9px;
			   border-radius: 9px 9px 9px 9px;
			   box-shadow: 1px 1px 11px rgba(0, 0, 0, 0);
			   background: white url("http://i62.tinypic.com/15xvbd5.png") no-repeat scroll 219px center;
			}
			.style-7::-webkit-scrollbar-track
		{
			-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0);
			border-radius: 10px;
		}
		.style-7::-webkit-scrollbar
		{
			width: 4px;
		}
		.style-7::-webkit-scrollbar-thumb
		{
			border-radius: 1px;
			background-image: -webkit-gradient(linear,
			   left bottom,
			   left top,
			   color-stop(0.44, #607D8B),
			   color-stop(0.72, #607D8B),
			   color-stop(0.86, #607D8B));
		}
		 .scrollbar_div
		{
			margin-left: 0px;
			float: left;
			height: 200px;
			width: 100%;
			
			overflow-y: scroll;
			margin-bottom: 25px;
		}
			/*
		 *  STYLE 7
		 */

		#style-7::-webkit-scrollbar-track
		{
			-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0);
			background-color: #34495E;
			border-radius: 10px;
		}
		#style-7::-webkit-scrollbar
		{
			width: 10px;
			background-color: #34495E;
		}

		#style-7::-webkit-scrollbar-thumb
		{
			border-radius: 1px;
			background-image: -webkit-gradient(linear,
			   left bottom,
			   left top,
			   color-stop(0.44, #FFFFFF),
			   color-stop(0.72, #FFFFFf),
			   color-stop(0.86, #FFFFFF));
		}
		
			 #footer {
				position: fixed;
				bottom: 0;
				width: 100%;
			}
		</style>
		<script type="text/javascript">
		$(function () {
		$('#total_que').keydown(function (e) {
		if (e.shiftKey || e.ctrlKey || e.altKey) {
		e.preventDefault();
		} else {
		var key = e.keyCode;
		if (!((key == 8) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105))) {
		e.preventDefault();
		}
		}
		});
		
		$('#total_que2').keydown(function (e) {
		if (e.shiftKey || e.ctrlKey || e.altKey) {
		e.preventDefault();
		} else {
		var key = e.keyCode;
		if (!((key == 8) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105))) {
		e.preventDefault();
		}
		}
		});
	
		
		});
</script>
		
		<script>
			$(document).ready(function(){
				$('#total_que2').attr("disabled", true);
				$("#footer_div").hide();
				$("#request_test").hide();
				$(".reqclass").hide();
				$(".tablehideimg").hide();
						var uid='<?php echo $s5; ?>';
						var course_id='<?php echo $course_id; ?>';
						var batch_id='<?php echo $batch_id; ?>';
						var subject_id='<?php echo $subject_id; ?>';
						var total_selected_que=0;
						var total_req_que=0;
						var sel_time="";
						var datepickerVal34='<?php echo $requestdate ?>';
						var testtype="demand";
							$(".stdiv").hide();
						$(".main_div2").hide();
						$(".loading-gif").hide();
						var doc_start_time="",doc_end_time="";
		var page_source="test_paper_generator_request.php";
		var sub_menu_name="Test on Demand";
		currentdate = new Date();
		currentdocid="";
	//alert(course_id);
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
										filename = "query/get_custom_test_schedule.php?uid="+uid;
		getContent(filename, "test_schedule_display");
										$("#request_test1").click(function(){
										$("#request_test").show();
				$(".reqclass").show();
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
											url = "virtual-class.php";
                              
                                   location.href = url;
											//window.close();
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
				//for check carnival user
				filename = "query/check-carnival-condition.php?course_id="+course_id+"&uid="+uid;
				$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							//alert(data);
							if(data == '1')
							{
							$("#sel_time").prop( "disabled", true );
							}
							else
							{
							$("#sel_time").prop( "disabled", false );
							}
							},
							});
				//end check carnival user

						filename = "query/check-demo-condition-start.php?course_id="+course_id+"&batch_id="+batch_id+"&uid="+uid+"&testtype="+testtype;
						
						//filename = "query/check-demo-requested-test.php?course_id="+course_id+"&batch_id="+batch_id+"&uid="+uid;
						//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							//alert(data);
							if(data == 'success')
							{
							
							}
							else
							{
							alert(data);
							}
					},
				});
				
				$("#start_test").attr('disabled',true);
				//$("#start_test").hide();
				filename1 = "query/check-course-class.php?course_id="+course_id;
						//alert(filename);
					$.ajax({
						url: filename1,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							//alert(data);
							if(data == '1')
							{
							//alert("in if");
						$(".stdiv").hide();
						$(".main_div2").show();
						$(".loading-gif").show();
				filename = "test_paper_generator/chape2_custom.php";
				//alert(filename);
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					
					success: function(data, textStatus, xhr) {
						$(".loading-gif").hide();
						var strtemp = "$('#cpt').html(data)";
						eval(strtemp);
						$("#footer_div").show();
						//alert(data);
					},
				});
							}
							else
							{
							//alert("in else");
							$(".stdiv").show();
						$(".main_div2").hide();
						filename2 = "query/get_course_std.php?crs_id="+course_id;
						 getContent(filename2, "sel_std");
							}
					},
				});
				$("#sel_std").change(function() {
				std_id= $("#sel_std").val();
				$(".main_div2").show();
				$(".loading-gif").show();
				
				//$("#cpt").hide();
				//$("#cpt").html("");
						filename = "test_paper_generator/chape2_custom_std.php?std_id="+std_id;
				//alert(filename);
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					
					success: function(data, textStatus, xhr) {
						$(".loading-gif").hide();
						var strtemp = "$('#cpt').html(data)";
						eval(strtemp);
						$("#footer_div").show();
						//alert(data);
					},
				});
				});

				$( "#datepicker34" ).datepicker({
					dateFormat: "yy-mm-dd",
					altField: "#alternate",
					altFormat: "DD, d MM, yy",
					onSelect: function() { 
						datepickerVal34 = $("#datepicker34").val();
						//alert(datepickerVal34);
					}
				});
				$(document).on("keyup", ".commonclass", function (e) {
				total_req_que=$("#total_que").val();
				if(total_req_que=="" || total_req_que==0)
				{
				$(this).val('');
				alert("Please enter Total required question first");
				}
				else
				{
				
					var pos_x = $(this).val();
					var chid_withque="";
					var avail_que=0;
					chid_withque = ($(this).closest('tr').attr('id'));
					//alert(chid_withque);
					var mySplitResult_chque = chid_withque.split("-");
					
				
					avail_que=mySplitResult_chque[2];
					
					//alert(pos_x);
					//alert(avail_que);
					if(Number(pos_x)>avail_que)
					{
					
						alert("Question insufficient in chapter.Please select less questions.");
						
						$(this).val('');
						total_selected_que=0;

							$('input[name="total_que_chapter"]').each(function(){
							   var pos_x = $(this).val();
							   if (pos_x =="")
							   {
							   }
							   else
							   {
								total_selected_que=Number(total_selected_que)+Number(pos_x);
							   }
							  
							  
								
							});
							$('#total_que2').val(total_selected_que);
					}
					else
					{
					
					
							total_selected_que=0;

					//alert(total_selected_que);
						$('input[name="total_que_chapter"]').each(function(){
							   var pos_x = $(this).val();
							   if (pos_x =="")
							   {
							   }
							   else
							   {
								total_selected_que=Number(total_selected_que)+Number(pos_x);
							   }
							  
							  
								
							});
						total_req_que=$('#total_que').val();
						//alert(total_selected_que);


						if(total_selected_que>total_req_que)
						{
						alert("more question");
						$(this).val('');
						total_selected_que=0;
						$('input[name="total_que_chapter"]').each(function(){
							   var pos_x = $(this).val();
							   if (pos_x =="")
							   {
							   }
							   else
							   {
								total_selected_que=Number(total_selected_que)+Number(pos_x);
							   }
							  
							  
								
							});
							$('#total_que2').val(total_selected_que);
						}
						else
						{
						$('#total_que2').val(total_selected_que);
						}
					}
					}
				});
					$('#take_test').click(function(){
					
						total_req_que=$("#total_que").val();
					total_selected_que=$("#total_que2").val();
					sel_time=$('#sel_time').val();
					test_time='00:30';
					end_time='23:30';
					if(total_req_que==0 || total_selected_que==0 || total_req_que=="" || total_selected_que=="")
					{
					 
					alert("Select Required number of Questions");
					//$(".tablehideshow").show();
					//$(".tablehideimg").hide();
					}
					else if(sel_time=="1")
					{
					alert("Please select duration");
					//$(".tablehideshow").show();
					//$(".tablehideimg").hide();
					}
					else if(test_time=="00:00")
					{
					alert("Please select test start time");
					//$(".tablehideshow").show();
					//$(".tablehideimg").hide();
					}
					else if(end_time=="00:00")
					{
					alert("Please select test end time");
					}
					else
					{
						if(total_selected_que==total_req_que)
						 {
						 $(".tablehideshow").hide();
					$(".tablehideimg").show();
						 //check carnival user
						 	filename = "query/check-carnival-user.php?uid="+uid;
							$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
						if(data=="1")
						{
						//for carnival user
						//alert("in carnival user");
						filename = "query/check-special-camp-course.php?course_id="+course_id+"&batch_id="+batch_id+"&uid="+uid;
						$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							//alert(data);
							if(data == '')
							{
								//not camp course
							filename = "query/check-demo-requested-test.php?course_id="+course_id+"&batch_id="+batch_id+"&uid="+uid;
						//alert(filename);
						$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							//alert(data);
							if(data == 'success')
							{
							
								//for checking account type
							var testtype="";
							testtype="demand";
							filename1 = "query/check-accounttype-adaptive.php?course_id="+course_id+"&batch_id="+batch_id+"&uid="+uid+"&testtype="+testtype;
								$.ajax({
								url: filename1,
								type: 'GET',
								dataType: 'html',
					
								success: function(data, textStatus, xhr) {
									//alert(data);
								if(data == 'success')
								{
									//check special campaign course
											var testtype="demand";
					filename = "query/check-special-camp-course-condition.php?course_id="+course_id+"&batch_id="+batch_id+"&uid="+uid+"&testtype="+testtype;
						
						//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {

							if(data == 'success')
							{
								 var chapter_list_que="";
									 var topic_id="";
									 cpt_count="";
									 cno_count="";
									var chapno="";
									var ch_count=0;
									//var cpt_count_temp=",";
									//var cno_count_temp=",";
									//var str_cpt="";
									//var str_cno="";
									 $('input[name="total_que_chapter"]').each(function(){
									   var pos_x = $(this).val();
											if (pos_x =="")
										   {
										   }
										   else
										   {
											chap_id = ($(this).closest('tr').attr('id'))
											chapno="";
											
												 var mySplitResult_ch = chap_id.split("-");
												chap_id=mySplitResult_ch[0];
												chapno=mySplitResult_ch[1];
												
												chapter_list_que=chapter_list_que+chap_id+"-"+pos_x+"|";
												cpt_count=cpt_count+chap_id+",";
												ch_count=ch_count+Number(1);
												if(chapno=="")
												{
												}
												else
												{
												cno_count=cno_count+chapno+",";
												
												}
											
										   }
									  
									 });
							
							
							datepickerVal34 = $("#datepicker34").val();
							filename = "query/insert_requested_test_now.php?sub_id="+subject_id+"&dec_marks="+total_req_que+"&chap_id="+chapter_list_que+"&duration_time="+sel_time+"&batch_id="+batch_id+"&datepickerVal34="+datepickerVal34+"&take_time="+test_time+"&take_time1="+end_time+"&uid="+uid+"&ch_count="+ch_count+"&course_id="+course_id;
							//alert(filename);
							$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
						//alert(data);
							if(data == "")
							{
								
								alert("Inserted Successfully");
								$(".tablehideshow").show();
					$(".tablehideimg").hide();
								 window.location.replace("insrtuction_part_request.php");
								 //document.location.href="insrtuction_part_request.php";
								
								
							}
							else
							{
									//$("#hide_result3").hide();
								alert(data);
						$(".tablehideshow").show();
					$(".tablehideimg").hide();
							}
						},
					});
							}
							else
							{
							//alert("in else");
								alert(data);
								$(".tablehideshow").show();
					$(".tablehideimg").hide();
							}
							},
							});
											// end check special campaign course
								
								
								}
								else
								{
								$(".tablehideshow").show();
					$(".tablehideimg").hide();
										var labeldata=data;
							
							
							$("#demolabel").html(labeldata);
							$("#Democourse_instruction").fadeIn("normal");
							$("#shadow").fadeIn();
							
								
								}
								},
								});
							//end checking account type
							///////
							
							
							}
							else
							{
							alert(data);
							$(".tablehideshow").show();
					$(".tablehideimg").hide();
							}
							},
						});
							//not camp course
							}
							else
							{
							//for camp course
							var mySplitResult_camp = data.split("|");
												min_chap_id=mySplitResult_camp[0];
												max_que=mySplitResult_camp[1];
												//check total question
												if(max_que==total_req_que)
												{
												//check total chapter
												var ch_selected=0;
												$('input[name="total_que_chapter"]').each(function(){
									   var pos_x = $(this).val();
											if (pos_x =="")
										   {
										   }
										   else
										   {
										   ch_selected=ch_selected+Number(1);
										   }
										   });
										   if(Number(ch_selected)<Number(min_chap_id))
										   {
										   alert("Pls select "+min_chap_id+" chapters.");
										   $(".tablehideshow").show();
					$(".tablehideimg").hide();
										   }
										   else if(Number(ch_selected)>Number(min_chap_id))
										   {
										   alert("Pls select "+min_chap_id+" chapters.");
										   $(".tablehideshow").show();
					$(".tablehideimg").hide();
										   }
										   else
										   {
										   //for camp request test
										   filename = "query/check-demo-requested-test.php?course_id="+course_id+"&batch_id="+batch_id+"&uid="+uid;
						//alert(filename);
						$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							//alert(data);
							if(data == 'success')
							{
							
								//for checking account type
							var testtype="";
							testtype="demand";
							filename1 = "query/check-accounttype-adaptive.php?course_id="+course_id+"&batch_id="+batch_id+"&uid="+uid+"&testtype="+testtype;
								$.ajax({
								url: filename1,
								type: 'GET',
								dataType: 'html',
					
								success: function(data, textStatus, xhr) {
								//alert(data);
								if(data == 'success')
								{
									//check special campaign course
											var testtype="demand";
					filename = "query/check-special-camp-course-condition.php?course_id="+course_id+"&batch_id="+batch_id+"&uid="+uid+"&testtype="+testtype;
						
						//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {

							if(data == 'success')
							{
								 var chapter_list_que="";
									 var topic_id="";
									 cpt_count="";
									 cno_count="";
									var chapno="";
									var ch_count=0;
									//var cpt_count_temp=",";
									//var cno_count_temp=",";
									//var str_cpt="";
									//var str_cno="";
									 $('input[name="total_que_chapter"]').each(function(){
									   var pos_x = $(this).val();
											if (pos_x =="")
										   {
										   }
										   else
										   {
											chap_id = ($(this).closest('tr').attr('id'))
											chapno="";
											
												 var mySplitResult_ch = chap_id.split("-");
												chap_id=mySplitResult_ch[0];
												chapno=mySplitResult_ch[1];
												
												chapter_list_que=chapter_list_que+chap_id+"-"+pos_x+"|";
												cpt_count=cpt_count+chap_id+",";
												ch_count=ch_count+Number(1);
												if(chapno=="")
												{
												}
												else
												{
												cno_count=cno_count+chapno+",";
												
												}
											
										   }
									  
									 });
							
							
							datepickerVal34 = $("#datepicker34").val();
							filename = "query/insert_requested_test_now.php?sub_id="+subject_id+"&dec_marks="+total_req_que+"&chap_id="+chapter_list_que+"&duration_time="+sel_time+"&batch_id="+batch_id+"&datepickerVal34="+datepickerVal34+"&take_time="+test_time+"&take_time1="+end_time+"&uid="+uid+"&ch_count="+ch_count+"&course_id="+course_id;
							//alert(filename);
							$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
						//alert(data);
							if(data == "")
							{
								
								alert("Inserted Successfully");
								$(".tablehideshow").show();
					$(".tablehideimg").hide();
								 window.location.replace("insrtuction_part_request.php");
								
							}
							else
							{
									//$("#hide_result3").hide();
								alert(data);
						$(".tablehideshow").show();
					$(".tablehideimg").hide();
							}
						},
					});
							}
							else
							{
							//alert("in else");
								alert(data);
								$(".tablehideshow").show();
					$(".tablehideimg").hide();
							}
							},
							});
											// end check special campaign course
								
								
								}
								else
								{
										var labeldata=data;
							
							
							$("#demolabel").html(labeldata);
							$("#Democourse_instruction").fadeIn("normal");
							$("#shadow").fadeIn();
							
								
								}
								},
								});
							//end checking account type
							///////
							
							
							}
							else
							{
							alert("Sorry! You have already given this test.");
							$(".tablehideshow").show();
					$(".tablehideimg").hide();
							}
							},
						});
										   //end camp request test
										   }
												//end total chapter
												}
												else
												{
												if(total_req_que>max_que)
												{
												alert("Your number of questions exit limit. Pls select only "+max_que+" questions.");
												$(".tablehideshow").show();
					$(".tablehideimg").hide();
												}
												else
											{
											alert("Your have not select enough number of questions. Pls select only "+max_que+" questions.");
											$(".tablehideshow").show();
					$(".tablehideimg").hide();
											}
												
												}
												//end check total question
							//end camp course
							}
							},
							});
						//end carnival user
						}
						else
						{
						//for not carnival user
							filename = "query/check-special-camp-course.php?course_id="+course_id+"&batch_id="+batch_id+"&uid="+uid;
						$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							//alert(data);
							if(data == '')
							{
							//not camp course
							filename = "query/check-demo-requested-test.php?course_id="+course_id+"&batch_id="+batch_id+"&uid="+uid;
						//alert(filename);
						$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							//alert(data);
							if(data == 'success')
							{
							
								//for checking account type
							var testtype="";
							testtype="demand";
							filename1 = "query/check-accounttype-adaptive.php?course_id="+course_id+"&batch_id="+batch_id+"&uid="+uid+"&testtype="+testtype;
								$.ajax({
								url: filename1,
								type: 'GET',
								dataType: 'html',
					
								success: function(data, textStatus, xhr) {
									//alert(data);
								if(data == 'success')
								{
									//check special campaign course
											var testtype="demand";
					filename = "query/check-special-camp-course-condition.php?course_id="+course_id+"&batch_id="+batch_id+"&uid="+uid+"&testtype="+testtype;
						
						//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {

							if(data == 'success')
							{
								 var chapter_list_que="";
									 var topic_id="";
									 cpt_count="";
									 cno_count="";
									var chapno="";
									var ch_count=0;
									//var cpt_count_temp=",";
									//var cno_count_temp=",";
									//var str_cpt="";
									//var str_cno="";
									 $('input[name="total_que_chapter"]').each(function(){
									   var pos_x = $(this).val();
											if (pos_x =="")
										   {
										   }
										   else
										   {
											chap_id = ($(this).closest('tr').attr('id'))
											chapno="";
											
												 var mySplitResult_ch = chap_id.split("-");
												chap_id=mySplitResult_ch[0];
												chapno=mySplitResult_ch[1];
												
												chapter_list_que=chapter_list_que+chap_id+"-"+pos_x+"|";
												cpt_count=cpt_count+chap_id+",";
												ch_count=ch_count+Number(1);
												if(chapno=="")
												{
												}
												else
												{
												cno_count=cno_count+chapno+",";
												
												}
											
										   }
									  
									 });
							
							
							datepickerVal34 = $("#datepicker34").val();
							filename = "query/insert_requested_test_now.php?sub_id="+subject_id+"&dec_marks="+total_req_que+"&chap_id="+chapter_list_que+"&duration_time="+sel_time+"&batch_id="+batch_id+"&datepickerVal34="+datepickerVal34+"&take_time="+test_time+"&take_time1="+end_time+"&uid="+uid+"&ch_count="+ch_count+"&course_id="+course_id;
							//alert(filename);
							$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
						//alert(data);
							if(data == "")
							{
								
								alert("Inserted Successfully");
								$(".tablehideshow").show();
					$(".tablehideimg").hide();
								 window.location.replace("insrtuction_part_request.php");
								
							}
							else
							{
									//$("#hide_result3").hide();
								alert(data);
						$(".tablehideshow").show();
					$(".tablehideimg").hide();
							}
						},
					});
							}
							else
							{
							//alert("in else");
								alert(data);
								$(".tablehideshow").show();
					$(".tablehideimg").hide();
							}
							},
							});
											// end check special campaign course
								
								
								}
								else
								{
										var labeldata=data;
							$(".tablehideshow").show();
					$(".tablehideimg").hide();
							
							$("#demolabel").html(labeldata);
							$("#Democourse_instruction").fadeIn("normal");
							$("#shadow").fadeIn();
							
								
								}
								},
								});
							//end checking account type
							///////
							
							
							}
							else
							{
							alert(data);
							$(".tablehideshow").show();
					$(".tablehideimg").hide();
							}
							},
						});
							//not camp course
							}
							else
							{
							 var mySplitResult_camp = data.split("|");
												min_chap_id=mySplitResult_camp[0];
												max_que=mySplitResult_camp[1];
												//check total question
												if(max_que==total_req_que)
												{
												//check total chapter
												var ch_selected=0;
												$('input[name="total_que_chapter"]').each(function(){
									   var pos_x = $(this).val();
											if (pos_x =="")
										   {
										   }
										   else
										   {
										   ch_selected=ch_selected+Number(1);
										   }
										   });
										   if(Number(ch_selected)<Number(min_chap_id))
										   {
										   alert("Pls select "+min_chap_id+" chapters.");
										   $(".tablehideshow").show();
					$(".tablehideimg").hide();
										   }
										   else if(Number(ch_selected)>Number(min_chap_id))
										   {
										   alert("Pls select "+min_chap_id+" chapters.");
										   $(".tablehideshow").show();
					$(".tablehideimg").hide();
										   }
										   else
										   {
										   //for camp request test
										   filename = "query/check-demo-requested-test.php?course_id="+course_id+"&batch_id="+batch_id+"&uid="+uid;
						//alert(filename);
						$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							//alert(data);
							if(data == 'success')
							{
							
								//for checking account type
							var testtype="";
							testtype="demand";
							filename1 = "query/check-accounttype-adaptive.php?course_id="+course_id+"&batch_id="+batch_id+"&uid="+uid+"&testtype="+testtype;
								$.ajax({
								url: filename1,
								type: 'GET',
								dataType: 'html',
					
								success: function(data, textStatus, xhr) {
									//alert(data);
								if(data == 'success')
								{
									//check special campaign course
											var testtype="demand";
					filename = "query/check-special-camp-course-condition.php?course_id="+course_id+"&batch_id="+batch_id+"&uid="+uid+"&testtype="+testtype;
						
						//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {

							if(data == 'success')
							{
								 var chapter_list_que="";
									 var topic_id="";
									 cpt_count="";
									 cno_count="";
									var chapno="";
									var ch_count=0;
									//var cpt_count_temp=",";
									//var cno_count_temp=",";
									//var str_cpt="";
									//var str_cno="";
									 $('input[name="total_que_chapter"]').each(function(){
									   var pos_x = $(this).val();
											if (pos_x =="")
										   {
										   }
										   else
										   {
											chap_id = ($(this).closest('tr').attr('id'))
											chapno="";
											
												 var mySplitResult_ch = chap_id.split("-");
												chap_id=mySplitResult_ch[0];
												chapno=mySplitResult_ch[1];
												
												chapter_list_que=chapter_list_que+chap_id+"-"+pos_x+"|";
												cpt_count=cpt_count+chap_id+",";
												ch_count=ch_count+Number(1);
												if(chapno=="")
												{
												}
												else
												{
												cno_count=cno_count+chapno+",";
												
												}
											
										   }
									  
									 });
							
							
							datepickerVal34 = $("#datepicker34").val();
							filename = "query/insert_requested_test_now.php?sub_id="+subject_id+"&dec_marks="+total_req_que+"&chap_id="+chapter_list_que+"&duration_time="+sel_time+"&batch_id="+batch_id+"&datepickerVal34="+datepickerVal34+"&take_time="+test_time+"&take_time1="+end_time+"&uid="+uid+"&ch_count="+ch_count+"&course_id="+course_id;
							//alert(filename);
							$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
						//alert(data);
							if(data == "")
							{
								
								alert("Inserted Successfully");
								$(".tablehideshow").show();
					$(".tablehideimg").hide();
								 window.location.replace("insrtuction_part_request.php");
								
							}
							else
							{
									//$("#hide_result3").hide();
								alert(data);
								$(".tablehideshow").show();
					$(".tablehideimg").hide();
						
							}
						},
					});
							}
							else
							{
							//alert("in else");
								alert(data);
								$(".tablehideshow").show();
					$(".tablehideimg").hide();
							}
							},
							});
											// end check special campaign course
								
								
								}
								else
								{
										var labeldata=data;
							
							$(".tablehideshow").show();
					$(".tablehideimg").hide();
							$("#demolabel").html(labeldata);
							$("#Democourse_instruction").fadeIn("normal");
							$("#shadow").fadeIn();
							
								
								}
								},
								});
							//end checking account type
							///////
							
							
							}
							else
							{
							alert(data);
							$(".tablehideshow").show();
					$(".tablehideimg").hide();
							}
							},
						});
										   //end camp request test
										   }
												//end total chapter
												}
												else
												{
												if(total_req_que>max_que)
												{
												alert("Your number of questions exit limit. Pls select only "+max_que+" questions.");
												$(".tablehideshow").show();
					$(".tablehideimg").hide();
												}
												else
											{
											alert("Your have not select enough number of questions. Pls select only "+max_que+" questions.");
											$(".tablehideshow").show();
					$(".tablehideimg").hide();
											}
												
												}
												//end check total question
							}
							},
							});
						//end not carnival user
						}
						
						},
						});
						 //end check carnival user
					
						
						}
						 else
						 {
						 alert("Questions insufficient. Please add more question");
						 $(".tablehideshow").show();
					$(".tablehideimg").hide();
						 }
				
					}
					});
				$('#request_test').click(function(){
				
					total_req_que=$("#total_que").val();
					total_selected_que=$("#total_que2").val();
					sel_time=$('#sel_time').val();
					test_time=$('#take_time').val();
					end_time=$('#take_time1').val();
					if(total_req_que==0 || total_selected_que==0 || total_req_que=="" || total_selected_que=="")
					{
					 
					alert("Select Required number of Questions");
					}
					else if(sel_time=="1")
					{
					alert("Please select duration");
					}
					else if(test_time=="00:00")
					{
					alert("Please select test start time");
					}
					else if(end_time=="00:00")
					{
					alert("Please select test end time");
					}
					else
					{
						if(total_selected_que==total_req_que)
						 {
						 $(".tablehideshow").hide();
					$(".tablehideimg").show();
						 //check carnival user
						 	filename = "query/check-carnival-user.php?uid="+uid;
							$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
						if(data=="1")
						{
						//for carnival user
						filename = "query/check-special-camp-course.php?course_id="+course_id+"&batch_id="+batch_id+"&uid="+uid;
						$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							//alert(data);
							if(data == '')
							{
								//not camp course
							filename = "query/check-demo-requested-test.php?course_id="+course_id+"&batch_id="+batch_id+"&uid="+uid;
						//alert(filename);
						$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							//alert(data);
							if(data == 'success')
							{
							
								//for checking account type
							var testtype="";
							testtype="demand";
							filename1 = "query/check-accounttype-adaptive.php?course_id="+course_id+"&batch_id="+batch_id+"&uid="+uid+"&testtype="+testtype;
								$.ajax({
								url: filename1,
								type: 'GET',
								dataType: 'html',
					
								success: function(data, textStatus, xhr) {
									//alert(data);
								if(data == 'success')
								{
									//check special campaign course
											var testtype="demand";
					filename = "query/check-special-camp-course-condition.php?course_id="+course_id+"&batch_id="+batch_id+"&uid="+uid+"&testtype="+testtype;
						
						//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {

							if(data == 'success')
							{
								 var chapter_list_que="";
									 var topic_id="";
									 cpt_count="";
									 cno_count="";
									var chapno="";
									var ch_count=0;
									//var cpt_count_temp=",";
									//var cno_count_temp=",";
									//var str_cpt="";
									//var str_cno="";
									 $('input[name="total_que_chapter"]').each(function(){
									   var pos_x = $(this).val();
											if (pos_x =="")
										   {
										   }
										   else
										   {
											chap_id = ($(this).closest('tr').attr('id'))
											chapno="";
											
												 var mySplitResult_ch = chap_id.split("-");
												chap_id=mySplitResult_ch[0];
												chapno=mySplitResult_ch[1];
												
												chapter_list_que=chapter_list_que+chap_id+"-"+pos_x+"|";
												cpt_count=cpt_count+chap_id+",";
												ch_count=ch_count+Number(1);
												if(chapno=="")
												{
												}
												else
												{
												cno_count=cno_count+chapno+",";
												
												}
											
										   }
									  
									 });
							
							
							datepickerVal34 = $("#datepicker34").val();
							filename = "query/insert_requested_test.php?sub_id="+subject_id+"&dec_marks="+total_req_que+"&chap_id="+chapter_list_que+"&duration_time="+sel_time+"&batch_id="+batch_id+"&datepickerVal34="+datepickerVal34+"&take_time="+test_time+"&take_time1="+end_time+"&uid="+uid+"&ch_count="+ch_count+"&course_id="+course_id;
							//alert(filename);
							$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
						//alert(data);
							if(data == "")
							{
								
								alert("Inserted Successfully");
								
								$(".tablehideshow").show();
					$(".tablehideimg").hide();
								
							}
							else
							{
									//$("#hide_result3").hide();
								alert(data);
								$(".tablehideshow").show();
					$(".tablehideimg").hide();
						
							}
						},
					});
							}
							else
							{
							//alert("in else");
								alert(data);
								$(".tablehideshow").show();
					$(".tablehideimg").hide();
							}
							},
							});
											// end check special campaign course
								
								
								}
								else
								{
										var labeldata=data;
							
							$(".tablehideshow").show();
					$(".tablehideimg").hide();
							$("#demolabel").html(labeldata);
							$("#Democourse_instruction").fadeIn("normal");
							$("#shadow").fadeIn();
							
								
								}
								},
								});
							//end checking account type
							///////
							
							
							}
							else
							{
							alert(data);
							$(".tablehideshow").show();
					$(".tablehideimg").hide();
							}
							},
						});
							//not camp course
							}
							else
							{
							//for camp course
							var mySplitResult_camp = data.split("|");
												min_chap_id=mySplitResult_camp[0];
												max_que=mySplitResult_camp[1];
												//check total question
												if(max_que==total_req_que)
												{
												//check total chapter
												var ch_selected=0;
												$('input[name="total_que_chapter"]').each(function(){
									   var pos_x = $(this).val();
											if (pos_x =="")
										   {
										   }
										   else
										   {
										   ch_selected=ch_selected+Number(1);
										   }
										   });
										   if(Number(ch_selected)<Number(min_chap_id))
										   {
										   alert("Pls select "+min_chap_id+" chapters.");
										   $(".tablehideshow").show();
					$(".tablehideimg").hide();
										   }
										   else if(Number(ch_selected)>Number(min_chap_id))
										   {
										   alert("Pls select "+min_chap_id+" chapters.");
										   $(".tablehideshow").show();
					$(".tablehideimg").hide();
										   }
										   else
										   {
										   //for camp request test
										   filename = "query/check-demo-requested-test.php?course_id="+course_id+"&batch_id="+batch_id+"&uid="+uid;
						//alert(filename);
						$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							//alert(data);
							if(data == 'success')
							{
							
								//for checking account type
							var testtype="";
							testtype="demand";
							filename1 = "query/check-accounttype-adaptive.php?course_id="+course_id+"&batch_id="+batch_id+"&uid="+uid+"&testtype="+testtype;
								$.ajax({
								url: filename1,
								type: 'GET',
								dataType: 'html',
					
								success: function(data, textStatus, xhr) {
									//alert(data);
								if(data == 'success')
								{
									//check special campaign course
											var testtype="demand";
					filename = "query/check-special-camp-course-condition.php?course_id="+course_id+"&batch_id="+batch_id+"&uid="+uid+"&testtype="+testtype;
						
						//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {

							if(data == 'success')
							{
								 var chapter_list_que="";
									 var topic_id="";
									 cpt_count="";
									 cno_count="";
									var chapno="";
									var ch_count=0;
									//var cpt_count_temp=",";
									//var cno_count_temp=",";
									//var str_cpt="";
									//var str_cno="";
									 $('input[name="total_que_chapter"]').each(function(){
									   var pos_x = $(this).val();
											if (pos_x =="")
										   {
										   }
										   else
										   {
											chap_id = ($(this).closest('tr').attr('id'))
											chapno="";
											
												 var mySplitResult_ch = chap_id.split("-");
												chap_id=mySplitResult_ch[0];
												chapno=mySplitResult_ch[1];
												
												chapter_list_que=chapter_list_que+chap_id+"-"+pos_x+"|";
												cpt_count=cpt_count+chap_id+",";
												ch_count=ch_count+Number(1);
												if(chapno=="")
												{
												}
												else
												{
												cno_count=cno_count+chapno+",";
												
												}
											
										   }
									  
									 });
							
							
							datepickerVal34 = $("#datepicker34").val();
							filename = "query/insert_requested_test.php?sub_id="+subject_id+"&dec_marks="+total_req_que+"&chap_id="+chapter_list_que+"&duration_time="+sel_time+"&batch_id="+batch_id+"&datepickerVal34="+datepickerVal34+"&take_time="+test_time+"&take_time1="+end_time+"&uid="+uid+"&ch_count="+ch_count+"&course_id="+course_id;
							//alert(filename);
							$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
						//alert(data);
							if(data == "")
							{
								
								alert("Inserted Successfully");
								$(".tablehideshow").show();
					$(".tablehideimg").hide();
								
								
							}
							else
							{
									//$("#hide_result3").hide();
								alert(data);
						$(".tablehideshow").show();
					$(".tablehideimg").hide();
							}
						},
					});
							}
							else
							{
							//alert("in else");
								alert(data);
								$(".tablehideshow").show();
					$(".tablehideimg").hide();
							}
							},
							});
											// end check special campaign course
								
								
								}
								else
								{
										var labeldata=data;
							
							$(".tablehideshow").show();
					$(".tablehideimg").hide();
							$("#demolabel").html(labeldata);
							$("#Democourse_instruction").fadeIn("normal");
							$("#shadow").fadeIn();
							
								
								}
								},
								});
							//end checking account type
							///////
							
							
							}
							else
							{
							alert("Sorry! You have already given this test.");
							$(".tablehideshow").show();
					$(".tablehideimg").hide();
							}
							},
						});
										   //end camp request test
										   }
												//end total chapter
												}
												else
												{
												if(total_req_que>max_que)
												{
												alert("Your number of questions exit limit. Pls select only "+max_que+" questions.");
												$(".tablehideshow").show();
					$(".tablehideimg").hide();
												}
												else
											{
											alert("Your have not select enough number of questions. Pls select only "+max_que+" questions.");
											$(".tablehideshow").show();
					$(".tablehideimg").hide();
											}
												
												}
												//end check total question
							//end camp course
							}
							},
							});
						//end carnival user
						}
						else
						{
						//for not carnival user
							filename = "query/check-special-camp-course.php?course_id="+course_id+"&batch_id="+batch_id+"&uid="+uid;
						$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							//alert(data);
							if(data == '')
							{
							//not camp course
							filename = "query/check-demo-requested-test.php?course_id="+course_id+"&batch_id="+batch_id+"&uid="+uid;
						//alert(filename);
						$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							//alert(data);
							if(data == 'success')
							{
							
								//for checking account type
							var testtype="";
							testtype="demand";
							filename1 = "query/check-accounttype-adaptive.php?course_id="+course_id+"&batch_id="+batch_id+"&uid="+uid+"&testtype="+testtype;
								$.ajax({
								url: filename1,
								type: 'GET',
								dataType: 'html',
					
								success: function(data, textStatus, xhr) {
									//alert(data);
								if(data == 'success')
								{
									//check special campaign course
											var testtype="demand";
					filename = "query/check-special-camp-course-condition.php?course_id="+course_id+"&batch_id="+batch_id+"&uid="+uid+"&testtype="+testtype;
						
						//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {

							if(data == 'success')
							{
								 var chapter_list_que="";
									 var topic_id="";
									 cpt_count="";
									 cno_count="";
									var chapno="";
									var ch_count=0;
									//var cpt_count_temp=",";
									//var cno_count_temp=",";
									//var str_cpt="";
									//var str_cno="";
									 $('input[name="total_que_chapter"]').each(function(){
									   var pos_x = $(this).val();
											if (pos_x =="")
										   {
										   }
										   else
										   {
											chap_id = ($(this).closest('tr').attr('id'))
											chapno="";
											
												 var mySplitResult_ch = chap_id.split("-");
												chap_id=mySplitResult_ch[0];
												chapno=mySplitResult_ch[1];
												
												chapter_list_que=chapter_list_que+chap_id+"-"+pos_x+"|";
												cpt_count=cpt_count+chap_id+",";
												ch_count=ch_count+Number(1);
												if(chapno=="")
												{
												}
												else
												{
												cno_count=cno_count+chapno+",";
												
												}
											
										   }
									  
									 });
							
							
							datepickerVal34 = $("#datepicker34").val();
							filename = "query/insert_requested_test.php?sub_id="+subject_id+"&dec_marks="+total_req_que+"&chap_id="+chapter_list_que+"&duration_time="+sel_time+"&batch_id="+batch_id+"&datepickerVal34="+datepickerVal34+"&take_time="+test_time+"&take_time1="+end_time+"&uid="+uid+"&ch_count="+ch_count+"&course_id="+course_id;
							//alert(filename);
							$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
						//alert(data);
							if(data == "")
							{
								
								alert("Inserted Successfully");
								
								$(".tablehideshow").show();
					$(".tablehideimg").hide();
								
							}
							else
							{
									//$("#hide_result3").hide();
								alert(data);
								$(".tablehideshow").show();
					$(".tablehideimg").hide();
						
							}
						},
					});
							}
							else
							{
							//alert("in else");
								alert(data);
								$(".tablehideshow").show();
					$(".tablehideimg").hide();
							}
							},
							});
											// end check special campaign course
								
								
								}
								else
								{
										var labeldata=data;
							$(".tablehideshow").show();
					$(".tablehideimg").hide();
							
							$("#demolabel").html(labeldata);
							$("#Democourse_instruction").fadeIn("normal");
							$("#shadow").fadeIn();
							
								
								}
								},
								});
							//end checking account type
							///////
							
							
							}
							else
							{
							alert(data);
							$(".tablehideshow").show();
					$(".tablehideimg").hide();
							}
							},
						});
							//not camp course
							}
							else
							{
							 var mySplitResult_camp = data.split("|");
												min_chap_id=mySplitResult_camp[0];
												max_que=mySplitResult_camp[1];
												//check total question
												if(max_que==total_req_que)
												{
												//check total chapter
												var ch_selected=0;
												$('input[name="total_que_chapter"]').each(function(){
									   var pos_x = $(this).val();
											if (pos_x =="")
										   {
										   }
										   else
										   {
										   ch_selected=ch_selected+Number(1);
										   }
										   });
										   if(Number(ch_selected)<Number(min_chap_id))
										   {
										   alert("Pls select "+min_chap_id+" chapters.");
										   $(".tablehideshow").show();
					$(".tablehideimg").hide();
										   }
										   else if(Number(ch_selected)>Number(min_chap_id))
										   {
										   alert("Pls select "+min_chap_id+" chapters.");
										   $(".tablehideshow").show();
					$(".tablehideimg").hide();
										   }
										   else
										   {
										   //for camp request test
										   filename = "query/check-demo-requested-test.php?course_id="+course_id+"&batch_id="+batch_id+"&uid="+uid;
						//alert(filename);
						$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							//alert(data);
							if(data == 'success')
							{
							
								//for checking account type
							var testtype="";
							testtype="demand";
							filename1 = "query/check-accounttype-adaptive.php?course_id="+course_id+"&batch_id="+batch_id+"&uid="+uid+"&testtype="+testtype;
								$.ajax({
								url: filename1,
								type: 'GET',
								dataType: 'html',
					
								success: function(data, textStatus, xhr) {
									//alert(data);
								if(data == 'success')
								{
									//check special campaign course
											var testtype="demand";
					filename = "query/check-special-camp-course-condition.php?course_id="+course_id+"&batch_id="+batch_id+"&uid="+uid+"&testtype="+testtype;
						
						//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {

							if(data == 'success')
							{
								 var chapter_list_que="";
									 var topic_id="";
									 cpt_count="";
									 cno_count="";
									var chapno="";
									var ch_count=0;
									//var cpt_count_temp=",";
									//var cno_count_temp=",";
									//var str_cpt="";
									//var str_cno="";
									 $('input[name="total_que_chapter"]').each(function(){
									   var pos_x = $(this).val();
											if (pos_x =="")
										   {
										   }
										   else
										   {
											chap_id = ($(this).closest('tr').attr('id'))
											chapno="";
											
												 var mySplitResult_ch = chap_id.split("-");
												chap_id=mySplitResult_ch[0];
												chapno=mySplitResult_ch[1];
												
												chapter_list_que=chapter_list_que+chap_id+"-"+pos_x+"|";
												cpt_count=cpt_count+chap_id+",";
												ch_count=ch_count+Number(1);
												if(chapno=="")
												{
												}
												else
												{
												cno_count=cno_count+chapno+",";
												
												}
											
										   }
									  
									 });
							
							
							datepickerVal34 = $("#datepicker34").val();
							filename = "query/insert_requested_test.php?sub_id="+subject_id+"&dec_marks="+total_req_que+"&chap_id="+chapter_list_que+"&duration_time="+sel_time+"&batch_id="+batch_id+"&datepickerVal34="+datepickerVal34+"&take_time="+test_time+"&take_time1="+end_time+"&uid="+uid+"&ch_count="+ch_count+"&course_id="+course_id;
							//alert(filename);
							$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
						//alert(data);
							if(data == "")
							{
								
								alert("Inserted Successfully");
								
								$(".tablehideshow").show();
					$(".tablehideimg").hide();
								
							}
							else
							{
									//$("#hide_result3").hide();
								alert(data);
								$(".tablehideshow").show();
					$(".tablehideimg").hide();
						
							}
						},
					});
							}
							else
							{
							//alert("in else");
								alert(data);
								$(".tablehideshow").show();
					$(".tablehideimg").hide();
							}
							},
							});
											// end check special campaign course
								
								
								}
								else
								{
										var labeldata=data;
							$(".tablehideshow").show();
					$(".tablehideimg").hide();
							
							$("#demolabel").html(labeldata);
							$("#Democourse_instruction").fadeIn("normal");
							$("#shadow").fadeIn();
							
								
								}
								},
								});
							//end checking account type
							///////
							
							
							}
							else
							{
							alert(data);
							$(".tablehideshow").show();
					$(".tablehideimg").hide();
							}
							},
						});
										   //end camp request test
										   }
												//end total chapter
												}
												else
												{
												if(total_req_que>max_que)
												{
												alert("Your number of questions exit limit. Pls select only "+max_que+" questions.");
												$(".tablehideshow").show();
					$(".tablehideimg").hide();
												}
												else
											{
											alert("Your have not select enough number of questions. Pls select only "+max_que+" questions.");
											$(".tablehideshow").show();
					$(".tablehideimg").hide();
											}
												
												}
												//end check total question
							}
							},
							});
						//end not carnival user
						}
						
						},
						});
						 //end check carnival user
					
						
						}
						 else
						 {
						 alert("Questions insufficient. Please add more question");
						 $(".tablehideshow").show();
					$(".tablehideimg").hide();
						 }
				
					}
						
				});
				$('#btn_no').click(function(){
					//for checking account type
						testtype="demand";
						
							filename1 = "query/check-accounttype-adaptive1.php?course_id="+course_id+"&batch_id="+batch_id+"&uid="+uid+"&testtype="+testtype;
								$.ajax({
								url: filename1,
								type: 'GET',
								dataType: 'html',
						
								success: function(data, textStatus, xhr) {
								if(data == 'success')
								{
								$("#Democourse_instruction").fadeOut("normal");
							$("#shadow").fadeOut();
									 var chapter_list_que="";
									 var topic_id="";
									 cpt_count="";
									 cno_count="";
									var chapno="";
									
									 $('input[name="total_que_chapter"]').each(function(){
									   var pos_x = $(this).val();
											if (pos_x =="")
										   {
										   }
										   else
										   {
											chap_id = ($(this).closest('tr').attr('id'))
											chapno="";
											
												 var mySplitResult_ch = chap_id.split("-");
												chap_id=mySplitResult_ch[0];
												chapno=mySplitResult_ch[1];
												
												chapter_list_que=chapter_list_que+chap_id+"-"+pos_x+"|";
												cpt_count=cpt_count+chap_id+",";
												if(chapno=="")
												{
												}
												else
												{
												cno_count=cno_count+chapno+",";
												}
											
										   }
									  
									 });
							url="online test 5_customise.php?cpt_count="+cpt_count+"&sel_time="+sel_time+"&req_que="+total_req_que+"&cno_count="+cno_count+"&chapter_list_que="+chapter_list_que;
							//alert(url)
							document.location.href=url;	
								}
								else
								{
										alert(data);
								$("#Democourse_instruction").fadeOut("normal");
							$("#shadow").fadeOut();
								}
								},
								});
				
					
					});
					$('#btn_yes').click(function(){
							filename="query/get_student_website_fees.php?uid="+uid+"&course_id="+course_id;
							//alert(filename);
									$.ajax({
										url: filename,
										type: 'GET',
										dataType: 'html',
										
										success: function(data, textStatus, xhr) {
											//alert(data);
											var mySplitResult = data.split("|");
											var url_reg="";
											var reg_uid="",reg_uname="",reg_fees="";
											reg_uid=mySplitResult[0];
											reg_uname=mySplitResult[2];
											reg_fees=mySplitResult[3];
											var	totalitem=1;
											if(reg_fees>0)
											{
											filename1="query/insert_course_order_proaccnt.php?course_id="+course_id+"&totalitem="+totalitem+"&uid="+uid+"&totalamt="+reg_fees;
		
										$.ajax({
												url: filename1,
												type: 'GET',
												dataType: 'html',
												
												success: function(data1, textStatus, xhr) {
													//alert(data);
													if(data1 == 'Failed')
													{
														alert("Pls try after sometime");
														
													}
													else
													{
														var order_id=data1;
														 var referral_code="";
														 if(mySplitResult[1]=="www.coreacademics.in" || mySplitResult[1]=="coreacademics.in")
											{
											
											url_reg="http://www.coreacademics.in/pricing/datafrom_test.php?course_id="+course_id+"&totalitem="+totalitem+"&uname="+reg_uname+"&uid="+uid+"&totalamt="+reg_fees+"&order_id="+order_id+"&referral_code="+referral_code;
											}
											else
											{
											url_reg="http://"+mySplitResult[1]+"/datafrom_test.php?course_id="+course_id+"&totalitem="+totalitem+"&uname="+reg_uname+"&uid="+uid+"&totalamt="+reg_fees+"&order_id="+order_id+"&referral_code="+referral_code;
											}
														
													
														window.location.replace(url_reg);
													}
												},
										});
											}
											else
											{
											//alert("ok");
											}
											
										},
								});
					});
						$('#sel_time').change(function(){
				
						sel_time=$('#sel_time').val();
						if(sel_time=="1")
						{
							$("#start_test").attr('disabled',true);
						}
						else
						{
							$("#start_test").attr('disabled',false);
						}
						//alert(sel_time);
					
						//$("#start_test").show();
					
				});
				$('#start_test').click(function(){
					total_req_que=$("#total_que").val();
					total_selected_que=$("#total_que2").val();
					
					if(total_req_que==0 || total_selected_que==0 || total_req_que=="" || total_selected_que=="")
					{
					 
					alert("Select Required number of Questions");
					}
					else
					{
						if(total_selected_que==total_req_que)
						 {
						
						/*filename = "query/check-demo-requested-test.php?course_id="+course_id+"&batch_id="+batch_id+"&uid="+uid;
						//alert(filename);
						$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							//alert(data);
							if(data == 'success')
							{*/
							
								//for checking account type
							var testtype="";
							testtype="demand";
							filename1 = "query/check-accounttype-adaptive.php?course_id="+course_id+"&batch_id="+batch_id+"&uid="+uid+"&testtype="+testtype;
								$.ajax({
								url: filename1,
								type: 'GET',
								dataType: 'html',
					
								success: function(data, textStatus, xhr) {
									//alert(data);
								if(data == 'success')
								{
								 var chapter_list_que="";
									 var topic_id="";
									 cpt_count="";
									 cno_count="";
									var chapno="";
									
									 $('input[name="total_que_chapter"]').each(function(){
									   var pos_x = $(this).val();
											if (pos_x =="")
										   {
										   }
										   else
										   {
											chap_id = ($(this).closest('tr').attr('id'))
											chapno="";
											
												 var mySplitResult_ch = chap_id.split("-");
												chap_id=mySplitResult_ch[0];
												chapno=mySplitResult_ch[1];
												
												chapter_list_que=chapter_list_que+chap_id+"-"+pos_x+"|";
												cpt_count=cpt_count+chap_id+",";
												if(chapno=="")
												{
												}
												else
												{
												cno_count=cno_count+chapno+",";
												}
											
										   }
									  
									 });
							url="online test 5_customise.php?cpt_count="+cpt_count+"&sel_time="+sel_time+"&req_que="+total_req_que+"&cno_count="+cno_count+"&chapter_list_que="+chapter_list_que;
							//alert(url)
							document.location.href=url;
								
								}
								else
								{
var mySplitResultd = data.split("|");
									
										if(mySplitResultd[0] == 'success')
										{
											if(mySplitResultd[1]=="")
											{
																		 var chapter_list_que="";
									 var topic_id="";
									 cpt_count="";
									 cno_count="";
									var chapno="";
									
									 $('input[name="total_que_chapter"]').each(function(){
									   var pos_x = $(this).val();
											if (pos_x =="")
										   {
										   }
										   else
										   {
											chap_id = ($(this).closest('tr').attr('id'))
											chapno="";
											
												 var mySplitResult_ch = chap_id.split("-");
												chap_id=mySplitResult_ch[0];
												chapno=mySplitResult_ch[1];
												
												chapter_list_que=chapter_list_que+chap_id+"-"+pos_x+"|";
												cpt_count=cpt_count+chap_id+",";
												if(chapno=="")
												{
												}
												else
												{
												cno_count=cno_count+chapno+",";
												}
											
										   }
									  
									 });
							url="online test 5_customise.php?cpt_count="+cpt_count+"&sel_time="+sel_time+"&req_que="+total_req_que+"&cno_count="+cno_count+"&chapter_list_que="+chapter_list_que;
							//alert(url)
							document.location.href=url;
											
											}
											else
											{
												totaltest_remain=mySplitResultd[1];
												if(mySplitResultd[1]<=1)
												{
												
												var labeldata="Your's is basic account.You can access this feature "+mySplitResultd[1]+" times more only.Upgrade to premium account to get unlimted access";
												$("#demolabel").html(labeldata);
												$("#Democourse_instruction").fadeIn("normal");
												$("#shadow").fadeIn();
												}
												else
												{
																				 var chapter_list_que="";
									 var topic_id="";
									 cpt_count="";
									 cno_count="";
									var chapno="";
									
									 $('input[name="total_que_chapter"]').each(function(){
									   var pos_x = $(this).val();
											if (pos_x =="")
										   {
										   }
										   else
										   {
											chap_id = ($(this).closest('tr').attr('id'))
											chapno="";
											
												 var mySplitResult_ch = chap_id.split("-");
												chap_id=mySplitResult_ch[0];
												chapno=mySplitResult_ch[1];
												
												chapter_list_que=chapter_list_que+chap_id+"-"+pos_x+"|";
												cpt_count=cpt_count+chap_id+",";
												if(chapno=="")
												{
												}
												else
												{
												cno_count=cno_count+chapno+",";
												}
											
										   }
									  
									 });
							url="online test 5_customise.php?cpt_count="+cpt_count+"&sel_time="+sel_time+"&req_que="+total_req_que+"&cno_count="+cno_count+"&chapter_list_que="+chapter_list_que;
							//alert(url)
							document.location.href=url;
												}

											}
										}
										else
										{
											
												var labeldata="Your's is basic account.You can access this feature "+mySplitResultd[1]+" times more only.Upgrade to premium account to get unlimted access";
											$("#demolabel").html(labeldata);
											$("#Democourse_instruction").fadeIn("normal");
											$("#shadow").fadeIn();
										}
							
								
								}
								},
								});
							//end checking account type
							///////
							
							
							/*}
							else
							{
							alert(data);
							}
							},
						});*/
				}
						 else
						 {
						 alert("Questions insufficient. Please add more question");
						 }
				
					}
						
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

		<div class="container_main">
	<div class='trable_bg' style='position: fixed;z-index: 2;padding-left:0px;color:yellow;border:solid 0px;width:100%'>
			<table style='width:100%' cellspacing="0">
				<tr>
					<td style='width:100%;'>
						<center><?php require 'adlp.php'; ?></center>
						
					</td>
				</tr>
				
			</table>
		</div>
		<div style='width:100%;height:auto;background:white;'>
			<table style="padding-top:90px;border:solid 0px;width:100%;height:25px;">
			

				<tr>
					<center><td style="border:solid 0px;background-color:#0f2541;width:98%;">
					<?php
												$result_c=mysql_query("SELECT c.name,u.name FROM course c,user u WHERE c.id='$course_id' and u.id=c.tutor_id");
												$row_c=mysql_fetch_array($result_c);
												$crname=$row_c[0]; 
												$tutorname=$row_c[1]; 
												
												
												$result_c1=mysql_query("SELECT name FROM subject WHERE id='$subject_id'");
												$row_c1=mysql_fetch_array($result_c1);
												$subname=$row_c1[0];
												echo "<label style='float:left;color:#ffffff;padding-left:5px;'><font face='verdana' size='2' color='white' ><b>Welcome &nbsp;&nbsp;&nbsp;".$u5."&nbsp;&nbsp;!&nbsp;&nbsp;&nbsp;&nbsp;".$tutorname.">".$crname.">".$subname.">"."Request a Test </b></font></label>";
													//echo $crname.">".$subname.">"."Adaptive learning";
												
						?>
						
					</td></center>
					<td style="width:2%" valign="right">
							<img src="images/close_image.png" id="close_window" height="25px" width="25" align="right">
							</td>
				</tr>
			</table>
			</div>
			<?php include 'test_paper_generator2_request.php'; ?>  
<?php
			include 'Popup_basic_account.php';?>			
<!--<div id="footer" >
			<center><div style="padding-top:70px;"><label style="border:solid 0px;color:white;">Copyright &copy Edutech Educational Services Pvt. Ltd. Ahmedabad, Gujarat, India</label>
			</div></center>
		</div>-->			
		</div>​
		<!--<img src="images/footer final.png" style="height:auto;width:100%;padding-bottom:5px;" id="footer">-->
	<div><?php require 'footer.php'; ?></div>
		
    </body>
</html>