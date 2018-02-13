<?php
	include 'config.php';
	//include 'lock.php';
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
	/*$course_id=$_SESSION['course_id'];
	$batch_id=$_SESSION['batch_id'];
	$sub_id=$_SESSION['subject_id'];
	$s1=$_SESSION['studid1'];
	$s5=$_SESSION['sid'];
	$s3=$_SESSION['grp1'];
	$u5 = $_SESSION['uname'];*/
	
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
		<script src="bs_js/highcharts_1.js"></script>
		<script src="bs_js/exporting.js"></script>
		<script type="text/javascript" src="js/flexpaper.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers_debug.js"> </script>
		<link type="text/css" rel="stylesheet" href="css/style_image_demo.css" />
			<link rel="stylesheet" type="text/css" href="css/style_image_virtual.css" />
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
			.hde {
			   position: absolute;  
			   left:0px; 
			   right:0px; 
			   width: 90%; 
			   
			}
			td, th
			{
			border:0px solid #dddddd;
			}
			th
			{
			background-color:#dddddd;
			color:black;
			}
		</style>
		<script>
			$(document).ready(function(){
				sub_id='<?php echo $subject_id;?>';
				course_id='<?php echo $course_id;?>';
				//alert(course_id);
				batch_id='<?php echo $batch_id;?>';
				uid='<?php echo $s5;?>';
				var doc_start_time="",doc_end_time="",currentdocid="";
				var doc_type='mydoc';
				var classtype_r=6;
				$('input[type="radio"][name="classtype_t"]').click(function(){
				$("#schedule_data").html("");
					var classtype_r1 = $("input[type='radio'][name='classtype_t']:checked");
					if (classtype_r1.length > 0)
					classtype_r= classtype_r1.val();
					if(classtype_r==5)
					{
					filename ="query/get-offline-class-schedule.php?sub_id="+sub_id+"&batch_id="+batch_id+"&uid="+uid;
					
			
				getContent(filename, "schedule_data");
					}
					else
					{
					filename = "query/get-virtual-class-schedule.php?sub_id="+sub_id+"&batch_id="+batch_id+"&uid="+uid;
			
				getContent(filename, "schedule_data");
					} 
					});
					var page_source="virtual-class.php";
				filename = "query/get-virtual-class-schedule.php?sub_id="+sub_id+"&batch_id="+batch_id+"&uid="+uid;
				//alert(filename);
				getContent(filename, "schedule_data");
				$('#btn_no').click(function(){
				$("#Democourse_instruction").fadeOut("normal");
							$("#shadow").fadeOut();
				});
				$("#submit_dwn").click(function(){
					var url = "download-gotomeeting-exe.php";
					//alert(url);
					var win=window.open(url, '_blank');
					win.focus();
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
											//alert(reg_fees);
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
														
											url_reg="http://www.coreacademics.in/pricing/datafrom_test.php?course_id="+course_id+"&totalitem="+totalitem+"&uname="+reg_uname+"&uid="+uid+"&totalamt="+reg_fees+"&order_id="+order_id+"&referral_code="+referral_code;
											
														
													
														window.location.replace(url_reg);
													}
												},
										});
											}
											else
											{
											filename1="query/insert_student_course.php?course_id="+course_id+"&totalitem="+totalitem+"&uid="+uid+"&totalamt="+reg_fees+"&referral_code="+referral_code;
							$.ajax({
										url: filename1,
										type: 'GET',
										dataType: 'html',
										
										success: function(data1, textStatus, xhr) {
											//alert(data);
											if(data1 == '')
											{
												alert("Registered Successfully");
												
											}
											else
											{
											alert("Pls try after sometime");
												
											}
										},
								});
											}
											
										},
								});
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
												//alert(filename1);
												$.ajax({
													url: filename1,
													type: 'GET',
													dataType: 'html',
										
													success: function(data1, textStatus, xhr) {
													if(data1=="")
													{
													alert("Class Booked Successfully");
													filename = "query/get-virtual-class-schedule.php?sub_id="+sub_id+"&batch_id="+batch_id+"&uid="+uid;
													getContent(filename, "schedule_data");
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
					$("#viewmat").live('click',function(){
					wb_id = ($(this).closest('td').attr('id'));
					//alert(wb_id);
					$("#ppt_id").html("");
					$("#not_id").html("");
					$("#vod_id").html("");
					$("#top_id").html("");
					$("#das_id").html("");
					$("#oas_id").html("");
					$("#dtp_id").html("");
					$("#otp_id").html("");
					
					$("#weblink_id").html("");
					chapter="";
					fac_id="";
					fac_name="";
					material_type="ppt";
					var examtype="";
					//examtype="";
					
					crs_id=0;
					var classtype=21;
					if(classtype_r==5)
					{
					classtype=20;
					}
					else
					{
					classtype=21;
					}
					
					filename = "web_resorces/Get_doclist_day_schedule.php?fac_id="+fac_id+"&chap_id="+chapter+"&doc_type="+doc_type+"&material_type="+material_type+"&fac_name="+fac_name+"&examtype="+examtype+"&crs_id="+crs_id+"&wb_id="+wb_id+"&classtype="+classtype;
					//alert(filename);
					getContent(filename, "ppt_id");
					material_type="notes";
					examtype="";
					filename = "web_resorces/Get_doclist_day_schedule.php?fac_id="+fac_id+"&chap_id="+chapter+"&doc_type="+doc_type+"&material_type="+material_type+"&fac_name="+fac_name+"&examtype="+examtype+"&crs_id="+crs_id+"&wb_id="+wb_id+"&classtype="+classtype;
					//alert(filename);
					getContent(filename, "not_id");
					material_type="video";
					examtype="";
					filename = "web_resorces/Get_doclist_day_schedule.php?fac_id="+fac_id+"&chap_id="+chapter+"&doc_type="+doc_type+"&material_type="+material_type+"&fac_name="+fac_name+"&examtype="+examtype+"&crs_id="+crs_id+"&wb_id="+wb_id+"&classtype="+classtype;
					//alert(filename);
					getContent(filename, "vod_id");
					material_type="topperanswersheet";
					examtype="";
					filename = "web_resorces/Get_doclist_day_schedule.php?fac_id="+fac_id+"&chap_id="+chapter+"&doc_type="+doc_type+"&material_type="+material_type+"&fac_name="+fac_name+"&examtype="+examtype+"&crs_id="+crs_id+"&wb_id="+wb_id+"&classtype="+classtype;
					//alert(filename);
					getContent(filename, "top_id");
					material_type="Assignment";
					examtype="Subjective";
					filename = "web_resorces/Get_doclist_day_schedule.php?fac_id="+fac_id+"&chap_id="+chapter+"&doc_type="+doc_type+"&material_type="+material_type+"&fac_name="+fac_name+"&examtype="+examtype+"&crs_id="+crs_id+"&wb_id="+wb_id+"&classtype="+classtype;
					getContent(filename, "das_id");
					material_type="Assignment";
					examtype="Objective";
					filename = "web_resorces/Get_doclist_day_schedule.php?fac_id="+fac_id+"&chap_id="+chapter+"&doc_type="+doc_type+"&material_type="+material_type+"&fac_name="+fac_name+"&examtype="+examtype+"&crs_id="+crs_id+"&wb_id="+wb_id+"&classtype="+classtype;
					getContent(filename, "oas_id");
					material_type="Questionpaper";
					examtype="Subjective";
					filename = "web_resorces/Get_doclist_day_schedule.php?fac_id="+fac_id+"&chap_id="+chapter+"&doc_type="+doc_type+"&material_type="+material_type+"&fac_name="+fac_name+"&examtype="+examtype+"&crs_id="+crs_id+"&wb_id="+wb_id+"&classtype="+classtype;
					getContent(filename, "dtp_id");
					material_type="Questionpaper";
					examtype="Objective";
					filename = "web_resorces/Get_doclist_day_schedule.php?fac_id="+fac_id+"&chap_id="+chapter+"&doc_type="+doc_type+"&material_type="+material_type+"&fac_name="+fac_name+"&examtype="+examtype+"&crs_id="+crs_id+"&wb_id="+wb_id+"&classtype="+classtype;
					getContent(filename, "otp_id");
					material_type="Weblink";
					examtype="";
					filename = "web_resorces/Get_doclist_day_schedule.php?fac_id="+fac_id+"&chap_id="+chapter+"&doc_type="+doc_type+"&material_type="+material_type+"&fac_name="+fac_name+"&examtype="+examtype+"&crs_id="+crs_id+"&wb_id="+wb_id+"&classtype="+classtype;
					getContent(filename, "weblink_id");
					});
						$("#cancel_hide_allot").click(function(){
					$("#login_form_material").fadeOut("normal");
					$("#shadow").fadeOut();
					//for log detail
				currentdate = new Date();
								currentdate = moment(currentdate).format("YYYY-MM-DD HH:mm:ss");
								doc_end_time=	currentdate;	
filename = "query/update_document_log.php?uid="+uid+"&docid="+currentdocid+"&start_time="+doc_start_time+"&end_time="+doc_end_time+"&page_source="+page_source;
										//alert(filename);
										$.ajax({
										url: filename,
										type: 'GET',
										dataType: 'html',
										success: function(data, textStatus, xhr) {
											//alert(data);
											//window.close();
											},
										});		
										
								//end log detail
					});
					$("#cancel_hide_allot1").click(function(){
					$("#ppt_hide1").fadeOut("normal");
					$("#shadow").fadeOut();
					//for log detail
				currentdate = new Date();
								currentdate = moment(currentdate).format("YYYY-MM-DD HH:mm:ss");
								doc_end_time=	currentdate;	
filename = "query/update_document_log.php?uid="+uid+"&docid="+currentdocid+"&start_time="+doc_start_time+"&end_time="+doc_end_time+"&page_source="+page_source;
										//alert(filename);
										$.ajax({
										url: filename,
										type: 'GET',
										dataType: 'html',
										success: function(data, textStatus, xhr) {
											//alert(data);
											//window.close();
											},
										});		
										
								//end log detail
					});
					$('#weblink_id').click(function(){
					
					$("#weblink_id input:radio:checked").each(function() {
							idArray2=this.id;
							idArray3=this.value;
					});
					document_name = idArray2;
					var mySplitResult = document_name.split("|");
					document_name=mySplitResult[2];
					docid=mySplitResult[1];
					mat_id=docid;
					if(mySplitResult[0]=="")
					{
					
					}
					else
					{
					var weblink_url=mySplitResult[0];
				
					window.open(weblink_url, '_blank');
					}
				});
				$('#ppt_id').click(function(){
					callFlexPaperDocViewer1('');
					$("#ppt_id input:radio:checked").each(function() {
							idArray2=this.id;
							idArray3=this.value;
					});
					document_name = idArray2;
					var mySplitResult = document_name.split("|");
					document_name=mySplitResult[2];
					$("#shadow").fadeIn("normal");
					$("#ppt_hide1").fadeIn("normal");
					filename ="query/view-ppt1.php?material="+document_name;
					getContent(filename, "ppt_hide2");
						//for log detail
							currentdocid=document_name;
					currentdate = new Date();
								currentdate = moment(currentdate).format("YYYY-MM-DD HH:mm:ss");
								doc_start_time=	currentdate;	
filename1 = "query/insert_document_log.php?uid="+uid+"&docid="+currentdocid+"&start_time="+doc_start_time+"&page_source="+page_source;
										//alert(filename);
										$.ajax({
										url: filename1,
										type: 'GET',
										dataType: 'html',
										success: function(data, textStatus, xhr) {
												//alert(data);
											},
										});						
								//end log detail
				});
				$('#not_id').click(function(){
					callFlexPaperDocViewer1('');
					$("#not_id input:radio:checked").each(function() {
							idArray2=this.id;
							idArray3=this.value;
					});
					document_name = idArray2;
					document_no=idArray3;
					var mySplitResult = document_name.split("|");
					document_name=mySplitResult[2];
					path=mySplitResult[0];
						dnd=document_name;
						input = path;
						output = input.substr(0, input.lastIndexOf('.')) || input;
						value = output.replace(/\\/g, "\\\\");
					
					
					$("#shadow").fadeIn("normal");
					$("#login_form_material").fadeIn("normal");
				
					filename = "query/get_material_name.php?srno="+document_no;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
						//alert(document_no);
						
						mat_id=data;
						var doc_type_temp="mydoc";
						sb1="";
						doc_type1="";
						filename = "query/copy_location_query_4.php?output="+value+"&mn="+dnd+"&doctype1="+doc_type1+"&sb1="+sb1+"&doc_type="+doc_type_temp;
						//alert(filename);
							$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							
							success: function(data, textStatus, xhr) {
								
									//alert(data);
									docid=data;
									callFlexPaperDocViewer1(docid);
									//for log detail
							currentdocid=docid;
					currentdate = new Date();
								currentdate = moment(currentdate).format("YYYY-MM-DD HH:mm:ss");
								doc_start_time=	currentdate;	
filename1 = "query/insert_document_log.php?uid="+uid+"&docid="+currentdocid+"&start_time="+doc_start_time+"&page_source="+page_source;
										//alert(filename1);
										$.ajax({
										url: filename1,
										type: 'GET',
										dataType: 'html',
										success: function(data, textStatus, xhr) {
												//alert(data);
											},
										});						
								//end log detail
							},
						});
						},
					});
				});
				$('#prt_id').click(function(){
					callFlexPaperDocViewer1('');
					$("#prt_id input:radio:checked").each(function() {
							idArray2=this.id;
							idArray3=this.value;
					});
					document_name = idArray2;
					document_no=idArray3;
					var mySplitResult = document_name.split("|");
					document_name=mySplitResult[2];
					path=mySplitResult[0];
						dnd=document_name;
						input = path;
						output = input.substr(0, input.lastIndexOf('.')) || input;
						value = output.replace(/\\/g, "\\\\");
					
					
					$("#shadow").fadeIn("normal");
					$("#login_form_material").fadeIn("normal");
					filename = "query/get_material_name.php?srno="+document_no;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
						//alert(document_no);
						
						mat_id=data;
						var doc_type_temp="mydoc";
						sb1="";
						doc_type1="";
						filename = "query/copy_location_query_4.php?output="+value+"&mn="+dnd+"&doctype1="+doc_type1+"&sb1="+sb1+"&doc_type="+doc_type_temp;
						//alert(filename);
							$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							
							success: function(data, textStatus, xhr) {
								
									//alert(data);
									docid=data;
									callFlexPaperDocViewer1(docid);
									//for log detail
							currentdocid=docid;
					currentdate = new Date();
								currentdate = moment(currentdate).format("YYYY-MM-DD HH:mm:ss");
								doc_start_time=	currentdate;	
filename1 = "query/insert_document_log.php?uid="+uid+"&docid="+currentdocid+"&start_time="+doc_start_time+"&page_source="+page_source;
										//alert(filename);
										$.ajax({
										url: filename1,
										type: 'GET',
										dataType: 'html',
										success: function(data, textStatus, xhr) {
												//alert(data);
											},
										});						
								//end log detail
							},
						});
						},
					});
				});
				$('#top_id').click(function(){
					callFlexPaperDocViewer1('');
					$("#top_id input:radio:checked").each(function() {
							idArray2=this.id;
							idArray3=this.value;
					});
					document_name = idArray2;
					document_no=idArray3;
					var mySplitResult = document_name.split("|");
					document_name=mySplitResult[2];
					path=mySplitResult[0];
						dnd=document_name;
						input = path;
						output = input.substr(0, input.lastIndexOf('.')) || input;
						value = output.replace(/\\/g, "\\\\");
					
					
					$("#shadow").fadeIn("normal");
					$("#login_form_material").fadeIn("normal");
						
					filename = "query/get_material_name.php?srno="+document_no;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
						//alert(document_no);
						
						mat_id=data;
						var doc_type_temp="mydoc";
						sb1="";
						doc_type1="";
						filename = "query/copy_location_query_4.php?output="+value+"&mn="+dnd+"&doctype1="+doc_type1+"&sb1="+sb1+"&doc_type="+doc_type_temp;
						//alert(filename);
							$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							
							success: function(data, textStatus, xhr) {
								
									//alert(data);
									docid=data;
									callFlexPaperDocViewer1(docid);
									//for log detail
							currentdocid=docid;
					currentdate = new Date();
								currentdate = moment(currentdate).format("YYYY-MM-DD HH:mm:ss");
								doc_start_time=	currentdate;	
filename1 = "query/insert_document_log.php?uid="+uid+"&docid="+currentdocid+"&start_time="+doc_start_time+"&page_source="+page_source;
										//alert(filename);
										$.ajax({
										url: filename1,
										type: 'GET',
										dataType: 'html',
										success: function(data, textStatus, xhr) {
												//alert(data);
											},
										});						
								//end log detail
							},
						});
						},
					});
				});
				$('#das_id').click(function(){
					callFlexPaperDocViewer1('');
					$("#das_id input:radio:checked").each(function() {
							idArray2=this.id;
							idArray3=this.value;
					});
					document_name = idArray2;
					document_no=idArray3;
					var mySplitResult = document_name.split("|");
					document_name=mySplitResult[2];
					path=mySplitResult[0];
					sb=mySplitResult[3];
					if(doc_type == "eduserver")
					{
					if(sb==0 || sb=="0")
					{
					dnd=document_name;
							input = path;
							output = input.substr(0, input.lastIndexOf('.')) || input;
							value = output.replace(/\\/g, "\\\\");
					}
					else
					{
					value="GES_"+document_no;
								dnd=document_no;
					}
						
						
					}
					else
					{
						dnd=document_name;
						input = path;
						output = input.substr(0, input.lastIndexOf('.')) || input;
						value = output.replace(/\\/g, "\\\\");
					}
						
					
					
					$("#shadow").fadeIn("normal");
					$("#login_form_material").fadeIn("normal");
						
					filename = "query/get_material_name.php?srno="+document_no;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
						//alert(document_no);
						
						mat_id=data;
					
						 
						 var doc_type1="Subjective";
						filename = "query/copy_location_query_4.php?output="+value+"&mn="+dnd+"&doctype1="+doc_type1+"&sb1="+sb+"&doc_type="+doc_type;
						//alert(filename);
							$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							
							success: function(data, textStatus, xhr) {
								
									//alert(data);
									docid=data;
									callFlexPaperDocViewer1(docid);
									//for log detail
							currentdocid=docid;
					currentdate = new Date();
								currentdate = moment(currentdate).format("YYYY-MM-DD HH:mm:ss");
								doc_start_time=	currentdate;	
filename1 = "query/insert_document_log.php?uid="+uid+"&docid="+currentdocid+"&start_time="+doc_start_time+"&page_source="+page_source;
										//alert(filename);
										$.ajax({
										url: filename1,
										type: 'GET',
										dataType: 'html',
										success: function(data, textStatus, xhr) {
												//alert(data);
											},
										});						
								//end log detail
							},
						});
						},
					});
				});
					$('#oas_id').click(function(){
					callFlexPaperDocViewer1('');
					$("#oas_id input:radio:checked").each(function() {
							idArray2=this.id;
							idArray3=this.value;
					});
					document_name = idArray2;
					document_no=idArray3;
					var mySplitResult = document_name.split("|");
					document_name=mySplitResult[2];
					path=mySplitResult[0];
					sb=mySplitResult[3];
					if(doc_type == "eduserver")
					{
					if(sb==0 || sb=="0")
					{
					dnd=document_name;
							input = path;
							output = input.substr(0, input.lastIndexOf('.')) || input;
							value = output.replace(/\\/g, "\\\\");
					}
					else
					{
					value="GES_"+document_no;
								dnd=document_no;
					}
						
						
					}
					else
					{
						dnd=document_name;
						input = path;
						output = input.substr(0, input.lastIndexOf('.')) || input;
						value = output.replace(/\\/g, "\\\\");
					}
						
						
					
					$("#shadow").fadeIn("normal");
					$("#login_form_material").fadeIn("normal");
					filename = "query/get_material_name.php?srno="+document_no;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
						//alert(document_no);
						
						mat_id=data;
					
						 
						 var doc_type1="Objective";
						filename = "query/copy_location_query_4.php?output="+value+"&mn="+dnd+"&doctype1="+doc_type1+"&sb1="+sb+"&doc_type="+doc_type;
						//alert(filename);
							$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							
							success: function(data, textStatus, xhr) {
								
									//alert(data);
									docid=data;
									callFlexPaperDocViewer1(docid);
									//for log detail
							currentdocid=docid;
					currentdate = new Date();
								currentdate = moment(currentdate).format("YYYY-MM-DD HH:mm:ss");
								doc_start_time=	currentdate;	
filename1 = "query/insert_document_log.php?uid="+uid+"&docid="+currentdocid+"&start_time="+doc_start_time+"&page_source="+page_source;
										//alert(filename);
										$.ajax({
										url: filename1,
										type: 'GET',
										dataType: 'html',
										success: function(data, textStatus, xhr) {
												//alert(data);
											},
										});						
								//end log detail
							},
						});
						},
					});
				});
				$('#vod_id').click(function(){
				document_no="";
				video_id=0;
				var idArray2="";
					var idArray3="";
				$("#vod_id input:radio:checked").each(function() {
							idArray2=this.id;
							idArray3=this.value;
					});
					var mySplitResult = idArray2.split("|");
					video=mySplitResult[0];
					video_id=mySplitResult[1];
					//alert(video_id);
					if(video_id>0)
					{
					var url="http://student.coreacademics.in/view-video.php?id="+video_id;
					//var url = "http://www8.hp.com/in/en/products/printers/index.html#!view=grid&page=1&facet=HP-ePrint";
					window.open(url, '_blank');
					}
					

				
				});
				$('#dtp_id').click(function(){
					callFlexPaperDocViewer1('');
					$("#dtp_id input:radio:checked").each(function() {
							idArray2=this.id;
							idArray3=this.value;
					});
					document_name = idArray2;
					document_no=idArray3;
					var mySplitResult = document_name.split("|");
					document_name=mySplitResult[2];
					path=mySplitResult[0];
					sb=mySplitResult[3];
					if(doc_type == "eduserver")
					{
					if(sb==0 || sb=="0")
					{
					dnd=document_name;
							input = path;
							output = input.substr(0, input.lastIndexOf('.')) || input;
							value = output.replace(/\\/g, "\\\\");
					}
					else
					{
					value="GES_"+document_no;
								dnd=document_no;
					}
						
						
					}
					else
					{
						dnd=document_name;
						input = path;
						output = input.substr(0, input.lastIndexOf('.')) || input;
						value = output.replace(/\\/g, "\\\\");
					}
						
						
					
					$("#shadow").fadeIn("normal");
					$("#login_form_material").fadeIn("normal");
					filename = "query/get_material_name.php?srno="+document_no;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
						//alert(document_no);
						
						mat_id=data;
					
						 
						 var doc_type1="Subjective";
						filename = "query/copy_location_query_4.php?output="+value+"&mn="+dnd+"&doctype1="+doc_type1+"&sb1="+sb+"&doc_type="+doc_type;
						//alert(filename);
							$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							
							success: function(data, textStatus, xhr) {
								
									//alert(data);
									docid=data;
									callFlexPaperDocViewer1(docid);
									//for log detail
							currentdocid=docid;
					currentdate = new Date();
								currentdate = moment(currentdate).format("YYYY-MM-DD HH:mm:ss");
								doc_start_time=	currentdate;	
filename1 = "query/insert_document_log.php?uid="+uid+"&docid="+currentdocid+"&start_time="+doc_start_time+"&page_source="+page_source;
										//alert(filename);
										$.ajax({
										url: filename1,
										type: 'GET',
										dataType: 'html',
										success: function(data, textStatus, xhr) {
												//alert(data);
											},
										});						
								//end log detail
							},
						});
						},
					});
				});
				$('#otp_id').click(function(){
					callFlexPaperDocViewer1('');
					$("#otp_id input:radio:checked").each(function() {
							idArray2=this.id;
							idArray3=this.value;
					});
					document_name = idArray2;
					document_no=idArray3;
					var mySplitResult = document_name.split("|");
					document_name=mySplitResult[2];
					path=mySplitResult[0];
					sb=mySplitResult[3];
					if(doc_type == "eduserver")
					{
					if(sb==0 || sb=="0")
					{
					dnd=document_name;
							input = path;
							output = input.substr(0, input.lastIndexOf('.')) || input;
							value = output.replace(/\\/g, "\\\\");
					}
					else
					{
					value="GES_"+document_no;
								dnd=document_no;
					}
						
						
					}
					else
					{
						dnd=document_name;
						input = path;
						output = input.substr(0, input.lastIndexOf('.')) || input;
						value = output.replace(/\\/g, "\\\\");
					}
						
						
					
					$("#shadow").fadeIn("normal");
					$("#login_form_material").fadeIn("normal");
					filename = "query/get_material_name.php?srno="+document_no;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
						//alert(document_no);
						
						mat_id=data;
					
						 
						 var doc_type1="Objective";
						filename = "query/copy_location_query_4.php?output="+value+"&mn="+dnd+"&doctype1="+doc_type1+"&sb1="+sb+"&doc_type="+doc_type;
						//alert(filename);
							$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							
							success: function(data, textStatus, xhr) {
								
									//alert(data);
									docid=data;
									callFlexPaperDocViewer1(docid);
									//for log detail
							currentdocid=docid;
					currentdate = new Date();
								currentdate = moment(currentdate).format("YYYY-MM-DD HH:mm:ss");
								doc_start_time=	currentdate;	
filename1 = "query/insert_document_log.php?uid="+uid+"&docid="+currentdocid+"&start_time="+doc_start_time+"&page_source="+page_source;
										//alert(filename);
										$.ajax({
										url: filename1,
										type: 'GET',
										dataType: 'html',
										success: function(data, textStatus, xhr) {
												//alert(data);
											},
										});						
								//end log detail
							},
						});
						},
					});
				});
				$("#text_exam").change(function(){
				$("#prt_id").html("");
					material_type="previouscompetitivepaper";
					var examtype="";
					examtype=$("#text_exam").val();
					$("#day_sche input:radio:checked").each(function() {
							idArray2=this.id;
							
					});
					wb_id = idArray2;

					filename = "web_resorces/Get_doclist_day_schedule.php?fac_id="+fac_id+"&chap_id="+chapter+"&doc_type="+doc_type+"&material_type="+material_type+"&fac_name="+fac_name+"&examtype="+examtype+"&crs_id="+crs_id+"&wb_id="+wb_id+"&classtype="+classtype;
				//alert(filename);
					getContent(filename, "prt_id");
				});
				$("#search1").live('click',function(){
				/*filename1 = "query/check-account-type.php?uid="+uid;
				
						$.ajax({
								url: filename1,
								type: 'GET',
								dataType: 'html',
					
								success: function(data, textStatus, xhr) {
									
									if(data == 'success')
									{*/
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
									/*}
									else
									{
									
									var labeldata="You can't do virtual class in basic account. Upgrade  to premium account to get unlimited access";
							
													$("#demolabel").html(labeldata);
							$("#Democourse_instruction").fadeIn("normal");
							$("#shadow").fadeIn();
									}
								},
								});*/
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
							//alert(data);
						},
					});									
				}
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
			#header {
				position: fixed;
				top: 0;
				width: 100%;
			}
		</style>
</head>
    
<body>
	<div style='background-color:#fff;width:100%'>
		<div class='trable_bg' style='position: fixed;z-index: 2;padding-left:5px;color:yellow;border:solid 0px;width:100%'>
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
		</div><br/>
		<div style='background-color:#fff;width:100%'>
		<table style="padding-top:170px;border:solid 0px;width:100%;height:25px;">
				<tr>
					<center><td style="border:solid 0px;background-color:#3366FF;">
					<?php
												$result_c=mysql_query("SELECT c.name,u.name FROM course c,user u WHERE c.id='$course_id' and u.id=c.tutor_id");
												$row_c=mysql_fetch_array($result_c);
												$crname=$row_c[0]; 
												$tutorname=$row_c[1]; 
												$result_c1=mysql_query("SELECT name FROM subject WHERE id='$sub_id'");
												$row_c1=mysql_fetch_array($result_c1);
												$subname=$row_c1[0];
												echo "<label style='float:left;color:#ffffff;'><font face='verdana' size='2' color='white' ><b>".$tutorname.">".$crname.">".$subname.">"."Virtual Class<b></font></label>";
													//echo $crname.">".$subname.">"."Adaptive learning";
												
						?>
						
					</td></center>
				</tr>
			</table><br/>
			<!--<label>&nbsp;&nbsp;Note:If you are using virtual class platform for first time, download virtual class engine.<input type='BUTTON' id='submit_dwn' name='submit_dwn' class='defaultbutton' value = 'Download Now'/></label><br/><br/>-->
			<table style="width:100%;border:solid 0px;">
			<tr>
			<td>
			<input id="5" type="radio" name="classtype_t"  value="5"><label style='color:black' for="5"><b>Offline</b></label>
								<input id="6" type="radio" name="classtype_t" value="6"  checked="checked"><label style='color:black' for="6"><b>Virtual</b></label></td>
			
			</tr>
				<tr>
					<td>
						<div id="schedule_data" style="border:solid 1px;width:98%;height:250px;overflow-y:scroll;"></div>
					</td>
				</tr>
			</table><br/>
			<table style='width:100%;'>
								<tr>	
								
									<th style='width:100%;'>
									<label style='font-size:16px;'>Material List</label>
										
									</th>
										
								</tr>
								<tr>
								<td valign="top" style='width:100%;'>
								<table style='width:100%;'>
										<tr>
										<td style='width:100%;'>
										<table style='width:100%;'>
										<tr>
										<th style='width:20%;'>
										PPT
										</th>
										<th style='width:20%;'>
											Notes
										</th>
										<th style='width:20%;'>
											Video
										</th>
										<th style='width:20%;'>
											TopperAnswersheet
										</th>
										<th style='width:20%;'>
											Weblink
										</th>
										</tr>
										<tr>
										<td style='width:20%;'>
										<div  id="ppt_id" name="ppt_id" style="border:solid 1px;overflow-y: 	scroll;background-color:white;width:100%;height:150px;"></div>
										</td>
										<td style='width:20%;'>
										<div  id="not_id" name="not_id" style="border:solid 1px;overflow-y: 	scroll;background-color:white;width:100%;height:150px;"></div>
										</td>
										<td style='width:20%;'>
										<div  id="vod_id" name="vod_id" style="border:solid 1px;overflow-y: 	scroll;background-color:white;width:100%;height:150px;"></div>
										</td>
										<td style='width:20%;'>
										<div  id="top_id" name="top_id" style="border:solid 1px;overflow-y: 	scroll;background-color:white;width:100%;height:150px;"></div>
										
										</td>
										<td valign="top" style='width:20%;'>
								<div  id="weblink_id" name="weblink_id" style="border:solid 1px;overflow-y: 	scroll;background-color:white;width:100%;height:150px;"></div>
								</td>
										</tr>
										</table>
										</td>
										</tr>
										<tr>
										<td style='width:100%;'>
												<table style='width:100%;'>
										<tr>
										<th style='width:20%;'>
										Descriptive Assignment
										</th>
										<th style='width:20%;'>
											Objective Assignment
										</th>
										<th style='width:20%;'>
											Descriptive Test paper
										</th>
										<th style='width:20%;'>
											Objective Test Paper
										</th>
										<th style='width:20%;'>
											Previous Year Papers
										</th>
										</tr>
										<tr>
										<td style='width:20%;'>
										<div  id="das_id" name="das_id" style="border:solid 1px;overflow-y: 	scroll;background-color:white;width:100%;height:150px;"></div>
										</td>
										<td style='width:20%;'>
										<div  id="oas_id" name="oas_id" style="border:solid 1px;overflow-y: 	scroll;background-color:white;width:100%;height:150px;"></div>
										</td>
										<td style='width:20%;'>
										<div  id="dtp_id" name="dtp_id" style="border:solid 1px;overflow-y: 	scroll;background-color:white;width:100%;height:150px;"></div>
										</td>
										<td style='width:20%;'>
										<div  id="otp_id" name="otp_id" style="border:solid 1px;overflow-y: 	scroll;background-color:white;width:100%;height:150px;"></div>
										</td>
											
								<td  style='width:20%;'>
								<!--<label style='font-size:14px;'>Select Exam</label>
								<select class='inputs' id='text_exam' name="text_exam">
								<?php
										$result=mysql_query("SELECT distinct  Testtype FROM document_manager_subjective WHERE Testtype IS NOT NULL AND Testtype<>'' and testtype not IN('Board','Final','Practice','Prelim','Terminal','Unit','weekly')   ORDER BY Testtype");
										$rw = mysql_num_rows($result);
										echo "<option  value='0'>Select Exam</option>";
										if($rw == 0)
										{
											echo "<option  value='0'>No Data Available.</option>";
										}
										else
										{
											while($row=mysql_fetch_array($result))
											{
												echo "<option  value=$row[0]>$row[0]</option>";
											}
										}
									?>
								</select><br/>-->
								<div  id="prt_id" name="prt_id" style="border:solid 1px;overflow-y: 	scroll;background-color:white;width:100%;height:150px;"></div>
											</td>
										</tr>
										</table>
										</td>
										</tr>
										</table>
								</td>
								
								</tr>
								</table><br/>
		</div>
			
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
							<center><strong><label style="color:white">View Material [Full screen preview forbidden]</label></strong></center>
						</td>
						<td style='width:5%;'>
							<center><img src="images/close_image.png" id='cancel_hide_allot' height="25px" width="25"></center>
						</td>
					</tr>
				</table>
				<table style="border:0px solid;width:100%;">
					<div id="viewer_1" class="flexpaper_viewer" style="border:solid 1px;width:680px;height:360px"></div>
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
									 FullScreenAsMaxWindow : true,
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
									 FullScreenAsMaxWindow : true,
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
					<!--<table style="border:0px solid;width:100%;">
					<tr>
					<td>
					<label id="totalp"></label>
					</td>
					<td>
					</td>
					</tr>
					<tr>
					<td><input type="button" class="defaultbutton" id="downpdf" value=" Download Pdf  "></td>
					<td>
					<?php
						$result=mysql_query("SELECT s.pdf_rate_per_page,s.id FROM teaching_resource_scheme_userwise us,teaching_resource_scheme s
 WHERE us.user_id='$login_session_id' AND s.id=us.scheme_id");
		
		$row=mysql_fetch_array($result);
		$drate=$row[0];
		if($drate==0 || $drate>0)
		{
		echo "Download Rate Per Page: Rs. ".$drate;
		}
					?>
					</td>
					</tr>
					<tr>
					<td><input type="button" class="defaultbutton" id="downword" value="Download Word"></td>
					<td>
					<?php
					$result=mysql_query("SELECT s.word_rate_per_page,s.id FROM teaching_resource_scheme_userwise us,teaching_resource_scheme s
 WHERE us.user_id='$login_session_id' AND s.id=us.scheme_id");
					
		
		$row=mysql_fetch_array($result);
		$drate=$row[0];
		if($drate==0 || $drate>0)
		{
		echo "Download Rate Per Page: Rs. ".$drate;
		}
					?>
					</td>
					</tr>
					
					</table>-->
			</form>
		</div>
						
					
	        <div>
                <?php require 'copy_right_file.php'; ?>
            </div>
			<?php
			include 'Popup_basic_account.php';?>
	</div>
	
</body>
</html>