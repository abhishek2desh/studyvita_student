<?php
	include 'config.php';
	session_start();
	$vl = $_GET['vl'];
	$type_type = $_GET['type'];
	if($vl == 1)
	{
		$course_id = $_GET['course_id'];
		$batch_id = $_GET['batch_id'];
		$subject_id = $_GET['subject_id'];
		$domainname = $_GET['domainname'];
		$_SESSION['course_id']=$course_id;
		$_SESSION['batch_id']=$batch_id;
		$_SESSION['subject_id']=$subject_id;
		$_SESSION['domain_name']=$domainname;
	}
	else if($vl == 2)
	{
		$mt = $_GET['mat_id'];
		$pt = $_GET['path'];
		$pt1 = str_replace("\\", "\\\\", $pt);
		
		$course_id=$_SESSION['course_id'];
		$batch_id=$_SESSION['batch_id'];
		$subject_id=$_SESSION['subject_id'];
	}
	else if($vl == 'video')
	{
		$mt = $_GET['mat_id'];
		$pt = $_GET['path'];
		$pt1 = str_replace("\\", "\\\\", $pt);
		
		$course_id=$_SESSION['course_id'];
		$batch_id=$_SESSION['batch_id'];
		$subject_id=$_SESSION['subject_id'];
	}
	else if($vl == 'ppt')
	{
		$mt = $_GET['mat_id'];
		$pt = $_GET['path'];
		$pt1 = str_replace("\\", "\\\\", $pt);
		
		$course_id=$_SESSION['course_id'];
		$batch_id=$_SESSION['batch_id'];
		$subject_id=$_SESSION['subject_id'];
	}
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
		<script language="javascript" type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" language="javascript">
			$(function() {
		 
				$(this).bind("contextmenu", function(e) {
	 
					e.preventDefault();
	 
				});
		 
			});
		</script>
		<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
		<link href="css/bg1.css" rel="stylesheet" type="text/css" />
		<link href="css/style_images.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="js/flexpaper.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers_debug.js"> </script>
		<script type="text/javascript" src="js/flowplayer-3.2.12.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/flexpaper.css" />
		<link href="menu.css" rel="stylesheet" type="text/css" />
		<!-- five star -->
		<link rel="stylesheet" href="layout/css/styles2_new.css" />
		<script type="text/javascript" src="js/date_time.js"></script>
		<script src="js/countdown.js"></script>
		<script src="js/moment.js"></script>
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
		<script>
			$(document).ready(function(){
				$('body').scrollTop(0);
				var uri = window.location.toString();
				if (uri.indexOf("?") > 0) {
					var clean_uri = uri.substring(0, uri.indexOf("?"));
					window.history.replaceState({}, document.title, clean_uri);
				}
				var start_omr_id="";
				var print_val=1;
				var batch_id='<?php echo $batch_id;?>'; 
				var u_id='<?php echo $s5;?>';
				var course_id="",mat_id="",tutor_id="",sub_id="",chap_id="",subid="",btid="";
				var bt1="",sb1="",mt1="",ijk=1,lmn=1;
				vl='<?php echo $vl; ?>';
				type_type='<?php echo $type_type; ?>';
				//alert(vl);
				//alert("sanjay : "+type_type+"hii :"+batch_id);
				$('body').scrollTop(0);
				$("#doc34").hide();
				$("#swf_hide").hide();
				$("#video_hide").hide();
				$("#ppt_hide").hide();
				$("#omr_sheet_display").hide();
				$("#OMR_answer_submit").hide();
				$("#OMR_View_Result").hide();
				$("#view_result_omr").hide();
				$("#Show_OMR_Div").hide();
				var blink = function() {
					$('#View_sol2').animate({
						opacity: '0'
					}, function(){
						$(this).animate({
							opacity: '1'
						}, blink);
					});
				}
				blink();
				var blink1 = function() {
					$('#topper_ans').animate({
						opacity: '0'
					}, function(){
						$(this).animate({
							opacity: '1'
						}, blink1);
					});
				}
				blink1();
				$('#print_paper').click(function(){
				
					filename = "query/printer_email_id.php?user_id="+u_id;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						success: function(data, textStatus, xhr) {
							//alert(data);
							if(data == "")
							{
								$("#shadow").fadeIn("normal");
								$("#login_form_print").fadeIn("normal");
							}
							else
							{
								printer_email_id=data;
								//alert(mat_id);
								if(mat_id == '')
								{
									alert("Select Document First..");
								}
								else
								{
									if(print_val == 1)
									{
										alert("Please Wait..");
										filename = "query/printer_mail.php?user_id="+u_id+"&print_id="+printer_email_id+"&mat_name="+mat_id;
										//alert(filename);
										$.ajax({
										url: filename,
										type: 'GET',
										dataType: 'html',
										success: function(data, textStatus, xhr) {
												//alert(data);
												if(data == 'success' )
												{
													alert("Please Wait..");
												}
												else
												{
													alert("something wrong..");
												}
											}
										});
										print_val++;
									}
									else
									{
										alert("Previous Document Loaded First..");
									}
								}
							}						
						}
					}); 
				});
				$("#print_id_text").keyup(function(){
					print_id_text=$("#print_id_text").val();
					//alert("print ID "+print_id_text);
					if(/^[a-zA-Z0-9-.]*$/.test(print_id_text) == false) 
					{
						$("#print_id_text").val('');
						alert("special character not include");
					}
				});
				$("#submit_print").click(function(){
			
					print_type_id=print_id_text+'@hpeprint.com';
					filename = "query/update_print_mail_id.php?user_id="+u_id+"&print_id_text="+print_type_id;
					//alert(filename);
					$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					success: function(data, textStatus, xhr) {
							//alert(data);
							if(data == 'success' )
							{
								alert("Successfully Updated print ID");
								$("#login_form_print").fadeOut("normal");
								$("#shadow").fadeOut();
							}
							else
							{
								alert("something wrong..");
							}
						}
					});
					
				});
				$("#print_list").click(function(){
					var url = "http://www8.hp.com/in/en/products/printers/index.html#!view=grid&page=1&facet=HP-ePrint";
					window.open(url, '', 'height=auto,width=auto,resizable=yes,scrollbars=yes,toolbar=no,menubar=no,location=no,directories=no,status=no');
				});
				function view_start_test(end_time)
				{
					//alert("Sel time : "+sel_time1);
					$("#Show_OMR_Div").show();
					$("#selft_tester").hide();
					$('#sel').attr("disabled", true);
					$("#start").attr("disabled","disabled");
					var da1 = new Date();
					var today22 = moment(da1);
					var s = today22.format("YYYY-MM-DD  HH:mm:ss");
					var d1 = new Date (),
					d2 = new Date ( d1 );
					d2.setMinutes(d1.getMinutes() + sel_time1);
					var today = moment(d2);
					var date_time = today.format("YYYY-MM-DD  HH:mm:ss");
					//alert(date_time);
					var setTime = date_time;
					filename = "query/insert_start_time.php?mat_id="+mat_id+"&stud_id="+u_id+"&st_time="+s;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						success: function(data, textStatus, xhr) {
							$('#last_id_omr_starting_time').val(data);
							start_omr_id=data;
						}
					});
					$("#countdown1").countdown({
					date: setTime,
					format: "on"
					},
					function() {
						if(end_time == 0)
						{}
						else
						{
							var str="";
							$("#dv input:radio:checked").each(function() {
								idArray34=this.id;
								str=str+idArray34+",";
							});
							//alert(str);
							var mySplitResult = idArray34.split("-");
							val1=mySplitResult[0];
							val2=mySplitResult[1];
							//alert(val1+val2);
							alert("Your time is over!!!");
							var da2 = new Date();
							var today222 = moment(da2);
							var s2 = today222.format("YYYY-MM-DD  HH:mm:ss");
							filename = "query/insert_end_time.php?lt_id="+start_omr_id+"&end_time="+s2+"&str="+str+"&mat_id="+mat_id+"&stud_id="+u_id;
							//alert(filename);
							$.ajax({
								url: filename,
								type: 'GET',
								dataType: 'html',
								success: function(data, textStatus, xhr) {
									if(data =="")
									{
										var d10 = new Date (),
										d20 = new Date ( d10 );
										d20.setMinutes(d10.getMinutes() + 0);
										var today = moment(d20);
										var date_time = today.format("YYYY-MM-DD  HH:mm:ss");
										//alert(date_time);
										var setTime = date_time;
										$("#countdown1").countdown({
										date: setTime,
										format: "on"
										},
										function() {
											alert("View Your Result..");
											$("#OMR_answer_submit").hide();
											$("#OMR_View_Result").show();
											$("#timer_hide").hide();
											$(".sel").hide();
											$("#start").hide();
										});									
									}
								}
							});
						}
					});
				}
				$("#start").click(function(){
					sel_time1=$('#sel').val();
					sel_time1=Number(sel_time1);
					if(tester_get == 1)
					{
						if(sel_time1 == 0)
						{
							alert("Please Select Time OF Exam.");
						}
						else
						{
							view_start_test(sel_time1);
						}
					}
					else if(tester_get == 0)
					{
						sel_time1=0;
						view_start_test(sel_time1);
					}
				});
				$('#OMR_answer_submit').click(function(){
					var checkstr1 =  confirm('Are you sure? Want to do final submission...?');
					if(checkstr1 == true)
					{
						var str="";
						$("#dv input:radio:checked").each(function() {
							idArray34=this.id;
							str=str+idArray34+",";
						});
						//alert(str);
						var mySplitResult = idArray34.split("-");
						val1=mySplitResult[0];
						val2=mySplitResult[1];
						//alert(val1+val2);
						var da2 = new Date();
						var today222 = moment(da2);
						var s2 = today222.format("YYYY-MM-DD  HH:mm:ss");
						//alert(start_omr_id);
						//alert(s2);
						filename = "query/insert_end_time.php?lt_id="+start_omr_id+"&end_time="+s2+"&str="+str+"&mat_id="+mat_id+"&stud_id="+u_id;
						//alert(filename);
						$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							success: function(data, textStatus, xhr) {
								if(data =="")
								{
									var d10 = new Date (),
									d20 = new Date ( d10 );
									d20.setMinutes(d10.getMinutes() + 0);
									var today = moment(d20);
									var date_time = today.format("YYYY-MM-DD  HH:mm:ss");
									//alert(date_time);
									var setTime = date_time;
									$("#countdown1").countdown({
									date: setTime,
									format: "on"
									},
									function() {
										alert("View Your Result..");
										$("#OMR_answer_submit").hide();
										$("#OMR_View_Result").show();
										$("#timer_hide").hide();
										$(".sel").hide();
										$("#start").hide();
										$("#dv *").attr("disabled", "disabled").off('click');
									});									
								}
							}
						});
					}
					else
					{
						return false;
					}
				});
				$('#OMR_View_Result').click(function(){
					$("#view_result_omr").show();
					filename = "query/omr_result_check3.php?mat_id="+mat_id;
					//alert(filename);
					getContent(filename,"OMR_result_declare");
				});
				$('#tke_reset').click(function() {
					filename = "query/re_test.php?stud_id="+u_id+"&mat_id="+mat_id;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						success: function(data, textStatus, xhr) {
							//alert(data);
							if(data == "reset")
							{
								var d10 = new Date (),
								d20 = new Date ( d10 );
								d20.setMinutes(d10.getMinutes() + 0);
								alert("Test successfully reset.");
								$("#Show_OMR_Div").hide();
								view_result_show_hide();
								$("#OMR_View_Result").hide();
								$('input[name=tester]').attr('checked', false);
								$("#selft_tester").show();
								$('#sel').attr("disabled", false);
								$("#start").attr('disabled' , false);
								$('body').scrollTop(0);
								//alert(mat_id);
								callFlexPaperDocViewer1(mat_id);
							}
							else 
							{
								alert(data);
							}
						}
					});
					/*setTimeout(function(){
						location.reload();
					}, 1000);
					*/
				});
				$('#view_prvs_score').click(function() {
					var url = "view_OMR_test_history1.php?stud_id="+u_id+"&mat_id="+mat_id;
					//alert(url);
					window.open(url, 'View Previous Score', 'height=600,width=860,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=no,menubar=no,location=no,directories=no,status=no');
				});
				$('#topper_ans').hide();
				$('#View_sol2').hide();
				$('#topper_ans').click(function() {
					//alert(lmn);
					if(lmn == 1)
					{
						mat_id3=mat_id.slice(0,-4);
						lmn=lmn+1;
					}
					else
					{
						lmn=lmn+1;
					}
					input = path;
					output = input.substr(0, input.lastIndexOf('.')) || input;
					value = output.replace(/\\/g, "\\\\");
					//alert(value);
					filename = "query/get_material_path23.php?mn="+mat_id;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							//alert("data : "+data);
							//$("#doc34").show();
							if(data == 1)
							{
								alert("Topper Answersheet Not Available");
							}
							else if(data == 2)
							{
								alert("Still Working. Please Try After Sometime. Thank You.");
							}
							else
							{
								$("#doc34").show();
								callFlexPaperDocViewer1(data);
							}
						},
					});
				});
				$('#View_sol2').click(function() {
					//alert(ijk);
					input = path;
					output = input.substr(0, input.lastIndexOf('.')) || input;
					value = output.replace(/\\/g, "\\\\");
					if(ijk == 1)
					{
						mat_id2=mat_id.slice(0,-4);
						ijk=ijk+1;
						value2=value.slice(0,-4);
					}
					else
					{
						ijk=ijk+1;
					}
					//alert(mat_id);
					//alert(path);
					//alert(value);
					filename = "query/copy_location_query.php?output="+value2+"&mn="+mat_id2;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							//alert("data : "+data);
							//$("#doc34").show();
							if(data == "")
							{
								$("#doc34").show();
								callFlexPaperDocViewer1(mat_id2);
							}
							else
							{
								callFlexPaperDocViewer1('');
								alert(data);
							}
						},
					});
				});
				$('#View_Solution').click(function() {
					//alert(mat_id);
					input = path;
					output = input.substr(0, input.lastIndexOf('.')) || input;
					value = output.replace(/\\/g, "\\\\");
					if(ijk == 1)
					{
						mat_id2=mat_id.slice(0,-4);
						ijk=ijk+1;
						value2=value.slice(0,-4);
					}
					else
					{
						ijk=ijk+1;
					}
					//alert(value);
					filename = "query/copy_location_query.php?output="+value2+"&mn="+mat_id2;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							//alert("data : "+data);
							//$("#doc34").show();
							if(data == "")
							{
								$("#doc34").show();
								callFlexPaperDocViewer1(mat_id2);
							}
							else
							{
								callFlexPaperDocViewer1('');
								alert(data);
							}
						},
					});
				});
				function view_result_show_hide()
				{
					//alert(mat_id+type_type);
					if(type_type == "OQ" || type_type == "OA")
					{
						filename = "query/Check_view_result_Yes_No.php?mat_id="+mat_id;
						//alert(filename);
						$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							
							success: function(data, textStatus, xhr) {
								//alert(data);
								if(data == "YES")
								{
									$("#view_result_omr").show();
									filename = "query/omr_result_check3.php?mat_id="+mat_id;
									//alert(filename);
									getContent(filename,"OMR_result_declare");
									$("#omr_sheet_display").hide();
									alert("View Result");
									$('body').scrollTop(180);
								}
								else if(data == "NO")
								{
									$("#view_result_omr").hide();
									$("#omr_sheet_display").show();
									filename = "query/view_material_Omr_Sheet.php?mat_id="+mat_id;
									//alert(filename);
									getContent_OMR(filename,"dv");
									$('body').scrollTop(0);
								}
								else if(data == "NONE")
								{
									$("#omr_sheet_display").hide();
									$('body').scrollTop(0);
								}
								else
								{
									alert("Try Again.");
								}
								filename = "query/button_of_topper_sol.php?output="+value+"&mn="+mat_id+"&stpsub=1&type_type="+type_type+"&batch_id="+batch_id;
								//alert(filename);
								$.ajax({
									url: filename,
									type: 'GET',
									dataType: 'html',
									success: function(data, textStatus, xhr) {
									//alert(data+"test3");
										if(data == 4)
										{
											$('#topper_ans').show();
											$('#View_sol2').show();
										}
										else if(data == 3)
										{
											$('#topper_ans').show();
											$('#View_sol2').hide();
										}
										else if(data == 2)
										{
											$('#topper_ans').hide();
											$('#View_sol2').show();
										}
										else if(data == 1)
										{
											$('#topper_ans').hide();
											$('#View_sol2').hide();
										}
										else if(data == 5)
										{
											$('#topper_ans').hide();
											$('#View_sol2').show();
										}
									}
								});
							},
						});
					}
					else
					{
						$("#omr_sheet_display").hide();
						filename = "query/button_of_topper_sol.php?output="+value+"&mn="+mat_id+"&stpsub=2&type_type="+type_type+"&batch_id="+batch_id;
						//alert(filename);
						$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							success: function(data, textStatus, xhr) {
								//alert(data+"test");
								if(data == 4)
								{
									$('#topper_ans').show();
									$('#View_sol2').show();
								}
								else if(data == 3)
								{
									$('#topper_ans').show();
									$('#View_sol2').hide();
								}
								else if(data == 2)
								{
									$('#topper_ans').hide();
									$('#View_sol2').show();
								}
								else if(data == 1)
								{
									$('#topper_ans').hide();
									$('#View_sol2').hide();
								}
								else if(data == 5)
								{
									$('#topper_ans').hide();
									$('#View_sol2').show();
								}
							}
						});
					}
				}
				$(".sel").hide();
				$("#timer_hide").hide();
				$("#start").hide();
				$('input[type="radio"][name="tester"]').click(function(){
					var tester = $("input[type='radio'][name='tester']:checked");
					if (tester.length > 0)
					tester_get = tester.val();
					//alert(tester_get);
					if(tester_get == "1")
					{
						$(".sel").show();
						$("#timer_hide").show();
						$("#start").show();
					}
					else if(tester_get == "0")
					{
						$(".sel").hide();
						$("#timer_hide").hide();
						$("#start").show();
					}
				});
				if(vl == 2)
				{
					$("#swf_hide").show();
					$("#video_hide").hide();
					$("#ppt_hide").hide();
					mat_id='<?php echo $mt; ?>';
					path='<?php echo $pt1; ?>';
					//alert(mat_id);
				//alert(path);
					input = path;
					output = input.substr(0, input.lastIndexOf('.')) || input;
					value = output.replace(/\\/g, "\\\\");
					//alert(value);
					filename = "query/copy_location_query.php?output="+value+"&mn="+mat_id;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							////alert("data : "+data);
							//$("#doc34").show();
							if(data == "")
							{
								$("#doc34").show();
								callFlexPaperDocViewer1(mat_id);
								view_result_show_hide();
							}
							else
							{
								if(vl == 'video')
								{}
								else if(vl == 'ppt')
								{}
								else
								{
									callFlexPaperDocViewer1('');
									alert(data);
								}
							}
						},
					});
					return false;
				}
				else if(vl == 1)
				{
					$("#swf_hide").show();
					$("#video_hide").hide();
					$("#ppt_hide").hide();
					$("a.menu_id").click(function(){
						//alert("menu_id");
						var mat_id2=$(this).attr('id').split('=');
						mat_id=mat_id2[0];
						path=mat_id2[1];
						input = path;
						output = input.substr(0, input.lastIndexOf('.')) || input;
						value = output.replace(/\\/g, "\\\\");
						filename = "query/copy_location_query.php?output="+value+"&mn="+mat_id;
						//alert(filename);
						$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							
							success: function(data, textStatus, xhr) {	
								//alert(data);
								if(data == "")
								{
									$("#doc34").show();
									callFlexPaperDocViewer1(mat_id);
									view_result_show_hide();
								}
								else
								{
								//alert(vl);
									if(vl == 'video')
									{}
									else if(vl == 'ppt')
									{}
									else if(vl=='1')
									{
									}
									else
									{
										callFlexPaperDocViewer1('');
										alert(data);
									}
									
								}
							},
						});
						return false;
					});
				}
				else if(vl == 'video')
				{
					mt='<?php echo $mt; ?>';
					pt='<?php echo $pt; ?>';
					//alert(mt);
					//alert(pt);
					video=pt;
					$("#swf_hide").hide();
					$("#video_hide").show();
					$("#ppt_hide").hide();
					//alert(vl);
						$("#wowza").show();
						var path = 'http://www.globaleduserver.com/';
						//var url = 'rtmp://64.187.229.174/securestreaming/C12_CBSE_CHE_Ch06_Haloalkanes_PreparationMethod_SURESH.mp4';
						//alert(url);
						var url = 'rtmp://64.187.229.174/securestreaming/'+video;
						var baseserverurl = 'rtmp://64.187.229.174:1935/securestreaming/';
						var str = url.split('/');
						var baseurl = 'rtmpe://';
						
						for (var i = 0; i < str.length - 3; i++) {
							baseurl = baseurl + str[i + 2] + '/';
						}
						
						//this will install flowplayer inside previous A- tag.
						flowplayer("wowza", "http://releases.flowplayer.org/swf/flowplayer-3.2.18.swf", {
					 
						clip: {
							// use RTMP streaming
							url: str[str.length - 1],
							provider: 'rtmp',
							
							// with a secured connection
							connectionProvider: 'secure'
						},
					 
						plugins: {
					 
							// set up the RTMP streaming plugin
							rtmp: {
								url: "http://releases.flowplayer.org/swf/flowplayer.rtmp-3.2.13.swf",
					 
								// The net connection URL with HDDN looks like this
								netConnectionUrl: baseserverurl
							},
					 
							// set up the secure streaming plugin
							secure: {
								url: "http://releases.flowplayer.org/swf/flowplayer.securestreaming-3.2.8.swf",
					 
								// the token value (shared secret).
								// needs to be escaped because our token has a percent sign in it
								token: escape('#ed%h0#w@123')
							}
						}
						});
				}
				else if(vl == 'ppt')
				{
					mt='<?php echo $mt; ?>';
					//alert(mt);
					$("#swf_hide").hide();
					$("#video_hide").hide();
					$("#ppt_hide").show();
					filename ="query/view-ppt.php?material="+mt;
					//alert(filename);
					getContent(filename, "ppt_hide1");
				}
				$("a.sel_course").hover(function(){
					course_id="";
					tutor_id="";
					var course_id2=$(this).attr('href').split('=');
					//alert(course_id[1]);
					//alert(course_id[2]);
					course_id=course_id2[1];
					tutor_id=course_id2[2];
					//alert(course_id+tutor_id);
					return false;
				});
				$("a.course_bt").hover(function(){
					btid=$(this).attr('id').split('=');
					btid=btid.slice(1);
					bt1=btid;
					//alert(bt1);
				});
				$("a.sel_subject").hover(function(){
					//alert("menu_id");
					//var sub_id2=$(this).attr('href').split('=');
					//alert(sub_id[1]);
					//sub_id=sub_id2[1];
					subid=$(this).attr('id').split('=');
					subid=subid.slice(1);
					sb1=subid;
					//alert(sb1);
				});
				$("a.mat_dt").click(function(){
					//btid="",bt1="",subid="",sb1="",matid="",mt1="",chap_list="";
					/*btid=$(".course_bt").attr('id').split('=');
					btid=btid.slice(1);
					bt1=btid;
					subid=$(this).attr('id').split('=');
					subid=subid.slice(1);
					sb1=subid;*/
					//btid=$(this).attr('id').split('=');
					//btid=btid.slice(1);
					//bt1=btid;
					matid=$(this).attr('id').split('=');
					//alert(matid);
					matid=matid.slice(1);
					mt1=matid;
					filename = "test_paper_generator/view_chapter_list_student.php?sub_id="+subid+"&btid="+bt1+"&matid="+matid;
					//alert(filename);
					getContent(filename, "chapter_list");
					
				});
				$("#chapter_list").change(function(){
					//alert("sadfds "+bt1+sb1+mt1);
					chap_list=$("#chapter_list").val();
					//alert(chap_list);
					filename = "test_paper_generator/view_material_list_student.php?sub_id="+sb1+"&btid="+bt1+"&matid="+mt1+"&chap_id="+chap_list;
					//alert(filename);
					getContent(filename, "material_list");
					$("#material_list").show();
					$("#lv_mat").show();
				});
				$("#material_list").change(function(){
					var mat_id2=$("#material_list").val();
						//alert(mat_id2);
					var mySplitResult = mat_id2.split("-");
						mat_id=mySplitResult[0];
						path=mySplitResult[1];
					//alert(mat_id+path);
					input = path;
					output = input.substr(0, input.lastIndexOf('.')) || input;
					value = output.replace(/\\/g, "\\\\");
					filename = "query/copy_location_query.php?output="+value+"&mn="+mat_id;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {	
							//alert(data);
							if(data == "")
							{
								$("#doc34").show();
								callFlexPaperDocViewer1(mat_id);
							}
							else
							{
								callFlexPaperDocViewer1('');
								alert(data);
							}
						},
					});
					
					return false;
				});
				$("#lv_mat").hide();
				$("#lv_chap").hide();
				$("#chapter_list").hide();
				$("#material_list").hide();
				function getContent(filename, selectboxid)
				{
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							//alert(data);
							var strtemp = "$('#" + selectboxid + "').html(data)";
							eval(strtemp);
							$("#lv_chap").show();
							$("#chapter_list").show();
						},
					});
				}
				function getContent_OMR(filename, selectboxid)
				{
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							var strtemp = "$('#" + selectboxid + "').html(data)";
							eval(strtemp);
							$("#OMR_answer_submit").show();
						},
					});
				}
				/*$("a.chap_id").hover(function(){
					//alert("menu_id");
					var chap_id2=$(this).attr('href').split('=');
					//alert(chap_id[1]);
					chap_id=chap_id2[1];
					//alert(chap_id);
					return false;
				});*/
			});
		</script>
		<style>
			.header-right-part{float:right; width:auto;height:46px;  background-color: #3093c7; background-image: -webkit-gradient(linear,  left top, left bottom, from(#3093c7), to(#1c5a85));
			 background-image: -webkit-linear-gradient(top, #3093c7, #1c5a85);
			 background-image: -moz-linear-gradient(top, #3093c7, #1c5a85);
			 background-image: -ms-linear-gradient(top, #3093c7, #1c5a85);
			 background-image: -o-linear-gradient(top, #3093c7, #1c5a85);
			 background-image: linear-gradient(to bottom, #3093c7, #1c5a85);;color:#e9eedd;border-radius:3px; margin-right:5px; padding:5px; box-shadow: 1px 1px 5px #000000;}
			 #footer {
				position: fixed;
				bottom: 0;
				width: 100%;
			}
			.hde {
			   position: absolute;  
			   left:6px; 
			   right:6px; 
			   width: 90%; 
			   
			}
		</style>
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
					<td valign='top' style='width:100%;border:solid 0px;'>
						<center><?php require 'menu/testmenu.php'; ?></center>
					</td>
				</tr>
			</table>
		</div>
		<div style='background-color:#EDF5FA;width:100%'>
			<table  style="width:100%;height:1000px;border:solid 0px;">
				<tr>
					<td id='swf_hide' valign='top' style="border:solid 0px;width:80%;">
						<center><div id="doc34" style="top:30px;">
							<center><!--<input type="button" id="View_sol2" name="View_sol2" value="View Solution" />-->
									<input type="button" id="topper_ans" name="topper_ans" value="Topper AnswerSheet" />
									<!--<input type="BUTTON" id="print_paper" value="Print"/></center>-->
							<div id="documentViewer" class="flexpaper_viewer" style="width:100%;height:500px;border:solid 1px;"></div>
							<script type="text/javascript">
								function getDocumentUrl(document){
									//alert(document);
									//alert("services/view.php?doc={doc}&format={format}&page={page}");
									return "services/view.php?doc={doc}&format={format}&page={page}".replace("{doc}",document);
								}
								function getDocQueryServiceUrl(document){
									return "services/swfsize.php?doc={doc}&page={page}".replace("{doc}",document);
								}
								var startDocument = "<?php if(isset($_GET["doc"])){echo $_GET["doc"];}else{?>adaptive_test.pdf<?php } ?>";
								$('#documentViewer').FlexPaperViewer(
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
									$('#documentViewer').FlexPaperViewer({
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
						</div></center>
						<div style="border:solid 0px;width:100%;height:auto;"> 
							<table valign='top' id='view_result_omr' style="float:left;background:#E0ECF8;width:100%;">
								<tr>
									<td style="width:100%;">
										<div id="OMR_result" style="width:100%;background:#E0ECF8;">
											<div id="OMR_result_declare" style="width:100%;">
											</div>
										</div>
									</td>
								</tr>
								<tr>
									<td valign='top' id="re_test_score">
										<input type="button" id="tke_reset" class="classname" style="color:blue;" value="Take Re-Test" />
										<input type="button" id="view_prvs_score" class="classname" style="color:blue;" value="View Previous Score" />
										<input type="button" id="View_Solution" name="OMR_View_Result" style="color:blue;" value="View Solution" />
									</td>
								</tr>
							</table>
						</div>
					</td>
					<td id='video_hide' valign='top' style="border:solid 0px;width:80%;"> 
						<center>
							<div class='main_div2'><a href="" style="border:solid 3px;display: block; width: 619px; height: 394px;" id="wowza"></a></div>
						</center>
					</td>
					<td id='ppt_hide' valign='top' style="border:solid 0px;width:80%;">
						<div class='hde' style='background-color:#393A3D;width:100%;height:100px;'></div>
						<div id='ppt_hide1'>
							
						</div>
					</td>
					<td id='omr_sheet_display' valign='top' style="border:solid 0px;width:20%;"> 
						<div id="selft_tester">
							<fieldset style="height:35px;width:100%;background-color:#FBCE81;">
							<legend style="font-size:14px;"><b>Self Tester</b></legend>
							<div id="select_timer">
								<input id="1" type="radio" class="class_radio_up" name="tester" value="1"><label for="1">With Timer</label>&nbsp;&nbsp;						
								<input id="2" type="radio" class="class_radio_up" name="tester" value="0"><label for="2">Without Timer</label>
							</div>
							</fieldset>
						</div>
						<div id='set_timer'>
							<table>
								<tr>
									<td class="sel">Set Your Time :
										<select id='sel' name='sel'>
											<option value='0'>Select Time</option>
											<option value='1'>1 min</option>
											<option value='5'>5 min</option>
											<option value='10'>10 min</option>
											<option value='15'>15 min</option>
											<option value='20'>20 min</option>
											<option value='25'>25 min</option>
											<option value='30'>30 min</option>
											<option value='35'>35 min</option>
											<option value='40'>40 min</option>
											<option value='45'>45 min</option>
											<option value='50'>50 min</option>
											<option value='55'>55 min</option>
											<option value='60'>1 hr</option>
											<option value='75'>1 hr 15 min</option>
											<option value='90'>1 hr 30 min</option>
											<option value='105'>1 hr 45 min</option>
											<option value='120'>2 hr</option>
											<option value='135'>2 hr 15 min</option>
											<option value='150'>2 hr 30 min</option>
											<option value='165'>2 hr 45 min</option>
											<option value='180'>3 hr</option>
										</select>
									</td>
									<td>&nbsp;&nbsp;</td>
									<td>
										<input type="button" class="classname" id="start" value="Start" />
									</td>
								</tr>
							</table>
						</div>
						<div id="timer_hide" class="timer-area" style="border-radius: 5px;width:100%;height:55px;background: green;"> 
							<ul id="countdown1">
								<li>
									<span class="hours" style="color:white;font-size:30px;">00</span> 
									<p class="timeRefHours" style="color:black;font-size:16px;"> HH</p>
								</li>
								<li>
									<span class="minutes" style="color:white;font-size:30px;">00</span>
									<p class="timeRefMinutes" style="color:black;font-size:16px;">   MM</p>
								</li>
								<li>
									<span class="seconds" style="color:white;font-size:30px;">00</span>
									<p class="timeRefSeconds" style="color:black;font-size:16px;"> SS</p>
								</li>
							</ul>
						</div>
						<div id="Show_OMR_Div" style='width:100%;'>
							<div style="width:100%;">
								<label id="OMR_label" style="font-size:14px;">Show OMR Sheet</label>
							</div>
							<div id="sheet" style='width:100%;'>
								<table style="width: 100%;height: 110px; background-color:#FFFFFF;border:1px solid blue;">
									<tr style="height:100%;">
										<td style="height:100%;">
											<div id="dv" style="width:100%;border:solid 1px;height:300px;overflow:scroll;">
											</div>
											<input type="button" id="OMR_answer_submit" name="OMR_answer_submit" value="Submit" />
											<input type="button" id="OMR_View_Result" name="OMR_View_Result" value="View Result" />
										</td>
									</tr>
								</table>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td valign='top'>						
					</td>
				</tr>
			</table>
		</div>
		<div id="footer" style="background-color:#0174DF;">
			<center><div style="padding-left:5px;padding-top:5px;font-size:12px;color:black;text-transform: capitalize;"><label style="border:solid 0px;color:white;">Copyright &copy Edutech Educational Services Pvt. Ltd. Ahmedabad, Gujarat, India</label>
			</div></center>
		</div>
	</div>
	<div id="login_form_print">
			<div class="err" id="add_err"></div>
			<form method="post" enctype="multipart/form-data">
				<table style='width:420px;'>
					<tr>
						<td>
							<label style="float:left;color:Black"><b>Add Printer ID : </b></label>
						</td>
						<td>
							<input type='text' id='print_id_text' placeholder='*Enter Printer ID'/>@hpeprint.com<br/>
							
						</td>
						<td>
							<input type='BUTTON' id='submit_print' value='SUBMIT'/>
						</td>
					</tr>
					<tr>
						<td>
						</td>
						<td><label style="float:left;padding-left:25px;color:Black"><b>*Where do I find this?</b></label></td>
						<td>
						</td>
					</tr>
				</table>
				<a href="#" id="print_list" style="font-size:12px;color:Black;">Supported Printers</a>
			</form>
		</div>
		<div id="shadow" class="popup"></div>
</body>
</html>