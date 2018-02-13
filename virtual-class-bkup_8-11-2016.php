<?php
	include 'config.php';
	//include 'lock.php';
	session_start();
	/*$uid_temp=$_GET['uid'];
	$subject_id_temp=$_GET['subject_id'];
	$batch_id_temp=$_GET['batch_id'];
if(isset($_SESSION['course_id']))
{

	if($_SESSION['course_id']==$_GET['course_id'] && $_SESSION['sid']==$uid_temp &&  $_SESSION['batch_id']==$batch_id_temp &&  $_SESSION['subject_id']==$subject_id_temp )
	{
		$course_id=$_SESSION['course_id'];
		$batch_id=$_SESSION['batch_id'];
		$sub_id=$_SESSION['subject_id'];
		$s1=$_SESSION['studid1'];
		$s5=$_SESSION['sid'];
		$s3=$_SESSION['grp1'];
		$u5 = $_SESSION['uname'];
		$subject_id=$_SESSION['subject_id'];
	}
	else
	{
	$vl = $_GET['vl'];
	$type_type = $_GET['type'];
	$course_id = $_GET['course_id'];
		$batch_id = $_GET['batch_id'];
		$subject_id = $_GET['subject_id'];
		$domainname = $_GET['domainname'];
		$s5 = $_GET['uid'];
    $u5 = $_GET['name'];
		$_SESSION['course_id']=$course_id;
		$_SESSION['batch_id']=$batch_id;
		$_SESSION['subject_id']=$subject_id;
		$_SESSION['domain_name']=$domainname;
		$_SESSION['sid']=$s5;
		$_SESSION['uname']=$u5;



	}


}
else
{*/
	$vl = $_GET['vl'];
	//$type_type = $_GET['type'];
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

//}






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
		<script src="js/jquery-1.8.3.js" type="text/javascript"></script>
		<link href="css/bg1.css" rel="stylesheet" type="text/css" />
		<link href="css/style_images.css" rel="stylesheet" type="text/css" />
		<script src="bs_js/highcharts_1.js"></script>
		<script src="bs_js/exporting.js"></script>
		<script type="text/javascript" src="js/flexpaper.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers_debug.js"> </script>
		<link type="text/css" rel="stylesheet" href="css/style_image_demo.css" />
			<link rel="stylesheet" type="text/css" href="css/style_image_virtual1.css" />
		<link href="menu/menu.css" rel="stylesheet" type="text/css" />
		<style>
			html, body	{ height:100%;width:100%; }
			body { margin:0;  }
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
				.toggle-button { 
		background-color: white; margin: -7px 0; border-radius: 20px; border: 2px solid #D0D0D0; height: 20px; cursor: pointer; width: 50px; position: relative; display: inline-block; user-select: none; -webkit-user-select: none; -ms-user-select: none; -moz-user-select: none; 
		}
.toggle-button button { 
cursor: pointer; outline: 0; display:block; position: absolute; left: 0; top: 0; border-radius: 100%; width: 25px; height: 25px; background-color: white; float: left; margin: -3px 0 0 -3px; border: 2px solid #D0D0D0; transition: left 0.3s;
 }
.toggle-button-selected { 
background-color: #83B152; border: 2px solid #7DA652; 
}
.toggle-button-selected button { 
left: 28px; top: -2px; margin: 0; border: none; width: 23px; height: 23px; box-shadow: 0 0 4px rgba(0,0,0,0.1); 
}
.toggle-button1 { 
		background-color: white; margin: -7px 0; border-radius: 20px; border: 2px solid #D0D0D0; height: 20px; cursor: pointer; width: 50px; position: relative; display: inline-block; user-select: none; -webkit-user-select: none; -ms-user-select: none; -moz-user-select: none; 
		}
.toggle-button1 button { 
cursor: pointer; outline: 0; display:block; position: absolute; left: 0; top: 0; border-radius: 100%; width: 25px; height: 25px; background-color: white; float: left; margin: -3px 0 0 -3px; border: 2px solid #D0D0D0; transition: left 0.3s;
 }
.toggle-button-selected1 { 
background-color: #83B152; border: 2px solid #7DA652; 
}
.toggle-button-selected1 button { 
left: 28px; top: -2px; margin: 0; border: none; width: 23px; height: 23px; box-shadow: 0 0 4px rgba(0,0,0,0.1); 
}


		</style>
		<script type="text/javascript">
  setInterval(function(){
      $('blink').each(function(){
        $(this).css('visibility' , $(this).css('visibility') === 'hidden' ? '' : 'hidden')
      });
    }, 250);
</script>
		<script>
			$(document).ready(function(){
			var uri = window.location.toString();
				if (uri.indexOf("?") > 0) {
					var clean_uri = uri.substring(0, uri.indexOf("?"));
					window.history.replaceState({}, document.title, clean_uri);
				}
				sub_id='<?php echo $subject_id;?>';
				course_id='<?php echo $course_id;?>';
				//alert(course_id);
				batch_id='<?php echo $batch_id;?>';
				uid='<?php echo $s5;?>';
				$("#loading_div").hide();
				//alert(course_id);
				//alert(sub_id);
				//alert(batch_id);
				//alert(uid);
				var doc_start_time="",doc_end_time="",currentdocid="";
				var doc_type='mydoc';
				var classtype_r=6;
				var mat_view_type=2;
				//check graphic display
				$(".overlayModal").hide();
				$(".matlist").hide();
				$(".imagelist").show();
				
				$(".tiplist").hide();
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
				//check course type
				
				filename="query/get_student_course_type.php?course_id="+course_id;
							//alert(filename);
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',

					success: function(data, textStatus, xhr) {
				var stdata=data;
				//alert(stdata);
				if(stdata=="11")
				{
				$(".crswise").hide();
					$(".dtwise").show();
					//document.getElementById('1234').checked = true;
					//jQuery("#1234").attr('checked', 'checked')
					document.getElementById("2").checked = true;
					//$("#1").prop("checked", true);
				}
				else
				{
				$(".crswise").show();
					$(".dtwise").hide();
					//$("#2").prop("checked", true);
					//document.getElementById('5678').checked = true;
					//jQuery("#5678").attr('checked', 'checked')
					document.getElementById("1").checked = true;
				}
					},
					});
				//end check course type
				//$(".crswise").hide();
				$("#chname").hide();
				$("#text_chapter").hide();
				$(document).on('click', '.toggle-button1', function() {
    $(this).toggleClass('toggle-button-selected1'); 
	if(document.getElementById("myP1").className=="toggle-button1")
	{
		$(".imagelist").show();
				
				$(".tiplist").hide();
	}
	else
	{
	$(".imagelist").hide();
				
				$(".tiplist").show();
	}
	});
					$(document).on('click', '.toggle-button', function() {
					$("#loading_div").show();
					$("#main_div_show").hide();
					$(".overlayModal").hide();
    $(this).toggleClass('toggle-button-selected'); 
	if(document.getElementById("myP").className=="toggle-button")
	{
					
								
		 url = "test_paper_generator_chapterwise.php";
                                    //alert(url);
                                    location.href = url;
		
	}
	else
	{
		 url = "test_paper_generator_chapterwise.php";
                                    //alert(url);
                                    location.href = url;
	}
	});
				$('input[type="radio"][name="mat_view_type"]').click(function(){
				$("#ppt_id").html("");
					$("#not_id").html("");
					$("#vod_id").html("");
					$("#top_id").html("");
					$("#das_id").html("");
					$("#oas_id").html("");
					$("#dtp_id").html("");
					$("#otp_id").html("");

					$("#weblink_id").html("");
				var mat_view_type_temp = $("input[type='radio'][name='mat_view_type']:checked");
					if (mat_view_type_temp.length > 0)
					mat_view_type= mat_view_type_temp.val();
					if(mat_view_type==1)
					{
					$(".crswise").show();
					$(".dtwise").hide();
					}
					else
					{
					$(".crswise").hide();
					$(".dtwise").show();
					$(".matlist").hide();
				$(".imagelist").show();

					}
				});
				$("#text_chapter").change(function(){
				$(".matlist").show();
				$(".imagelist").hide();

					$("#ppt_id").html("");
					$("#not_id").html("");
					$("#vod_id").html("");
					$("#top_id").html("");
					$("#das_id").html("");
					$("#oas_id").html("");
					$("#dtp_id").html("");
					$("#otp_id").html("");
					$("#prt_id").html("");
					$("#weblink_id").html("");
					chapter_id=$("#text_chapter").val();
					if(chapter_id>0)
					{
				window.scrollBy(0, 350);
						material_type="video";
						var examtype="";
						filename = "query/get_single_chapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
						getContent(filename, "vod_id");
						material_type="ppt";
						var examtype="";
						filename = "query/get_single_chapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
						getContent(filename, "ppt_id");
						material_type="notes";
					 examtype="";
					filename = "query/get_single_chapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
					//alert(filename);
					getContent(filename, "not_id");
					material_type="topperanswersheet";
					examtype="";
					filename = "query/get_single_chapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
					getContent(filename, "top_id");
					material_type="Weblink";
					examtype="";
					filename = "query/get_single_chapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
					getContent(filename, "weblink_id");
					material_type="PreviousCompetitivePaper";
					examtype="";
					filename = "query/get_single_chapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
					getContent(filename, "prt_id");
					material_type="Assignment";
					examtype="Subjective";
					filename = "query/get_single_chapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
					getContent(filename, "das_id");
					material_type="Assignment";
					examtype="Objective";
					filename = "query/get_single_chapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
					getContent(filename, "oas_id");
					material_type="Questionpaper";
					examtype="Subjective";
					filename = "query/get_single_chapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
					getContent(filename, "dtp_id");
					material_type="Questionpaper";
					examtype="Objective";
					filename = "query/get_single_chapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id;
					getContent(filename, "otp_id");
					}
				});

				$("#text_unit").change(function()
				{
				$("#ppt_id").html("");
					$("#not_id").html("");
					$("#vod_id").html("");
					$("#top_id").html("");
					$("#das_id").html("");
					$("#oas_id").html("");
					$("#dtp_id").html("");
					$("#otp_id").html("");

					$("#weblink_id").html("");
				text_unit=$("#text_unit").val();
				if(text_unit=="cc")
				{
					$("#chname").hide();
					$("#text_chapter").hide();
					$(".matlist").show();
					window.scrollBy(0, 350);
				$(".imagelist").hide();

					material_type="ppt";
					var examtype="";
					filename = "query/get_multichapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					//alert(filename);
					getContent(filename, "ppt_id");
					material_type="notes";
					 examtype="";
					filename = "query/get_multichapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					getContent(filename, "not_id");
					material_type="video";
					 examtype="";
					filename = "query/get_multichapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					getContent(filename, "vod_id");
					material_type="topperanswersheet";
					examtype="";
					filename = "query/get_multichapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					getContent(filename, "top_id");
					material_type="Weblink";
					examtype="";
					filename = "query/get_multichapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					getContent(filename, "weblink_id");
					material_type="PreviousCompetitivePaper";
					examtype="";
					filename = "query/get_multichapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					getContent(filename, "prt_id");
					material_type="Assignment";
					examtype="Subjective";
					filename = "query/get_multichapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					getContent(filename, "das_id");
					material_type="Assignment";
					examtype="Objective";
					filename = "query/get_multichapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					getContent(filename, "oas_id");
					material_type="Questionpaper";
					examtype="Subjective";
					filename = "query/get_multichapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					getContent(filename, "dtp_id");
					material_type="Questionpaper";
					examtype="Objective";
					filename = "query/get_multichapter_doclist.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id;
					getContent(filename, "otp_id");
				}
				else
				{
					$("#chname").show();
					$("#text_chapter").show();
					$("#text_chapter").html("");
					filename ="query/get-course-chapter.php?sub_id="+sub_id+"&course_id="+course_id+"&text_unit="+text_unit+"&uid="+uid+"&batch_id="+batch_id;
					getContent(filename, "text_chapter");
				}
				});
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
					$(".matlist").show();
				$(".imagelist").hide();

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
					window.scrollBy(0, 400);
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
					//alert(filename);
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
					url="http://www.coreacademics.in/flexpaper_readonly/php/simple_document.php?subfolder=&doc="+document_name;

											var win = window.open(url, '_blank');
											if(win){
    //Browser has allowed it to be opened
    win.focus();
}else{
    //Broswer has blocked it
    alert('Please allow popups for this site');
}
						/*dnd=document_name;
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
					});*/
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
					url="http://student.coreacademics.in/student_course_page_new.php?vl=2&type=OA&mat_id="+document_name+"&path="+path;

											var win = window.open(url, '_blank');
					/*if(doc_type == "eduserver")
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
					});*/
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
					url="http://student.coreacademics.in/student_course_page_new.php?vl=2&type=OQ&mat_id="+document_name+"&path="+path;

											var win = window.open(url, '_blank');
					/*if(doc_type == "eduserver")
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
					});*/
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
	<div class="overlayModal">
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
	</div>
	<div id="loading_div" style="width:100%;height:970px;">
				<center><img  src="loading/32.gif" style='padding-top:200px;' alt="Loading" class="loading-gif" /><br/>Please wait.....</center>
			</div>
	<div style='background-color:#fff;width:100%;'>
		<div class='trable_bg' style='position: fixed;z-index: 2;padding-left:0px;color:yellow;border:solid 0px;width:100%;'>
			<table style='width:100%;' cellspacing="0">
				<tr>
					<td style='width:100%;'>
						<center><?php require 'adlp.php'; ?></center>
					</td>
				</tr>
				<tr>
					<td valign='bottom' style='width:100%;'>
						<center><?php require 'menu/testmenu.php'; ?></center>
					</td>
				</tr>
			</table>
		</div><br/>
		<div style='background-color:#fff;width:100%;'>
					
		<table style="padding-top:200px;border:solid 0px;width:100%;">
		<!--<table style="padding-top:200px;border:solid 0px;width:100%;height:25px;"><tr>
		<td><b>Welcome <?php echo "&nbsp;&nbsp;&nbsp;".$u5."&nbsp;&nbsp;!&nbsp;&nbsp;&nbsp;&nbsp;</b>";
		?>
		</td>
		</tr>-->
				<tr>
					<center>
					
					 <td style="border:solid 0px;background-color:#0f2541;width:100%;padding-left:0px;">
					<!--<td style="border:solid 0px;background-color:#3366FF;">-->
					<?php
												$result_c=mysql_query("SELECT c.name,u.name FROM course c,user u WHERE c.id='$course_id' and u.id=c.tutor_id");
												$row_c=mysql_fetch_array($result_c);
												$crname=$row_c[0];
												$tutorname=$row_c[1];
												$result_c1=mysql_query("SELECT name FROM subject WHERE id='$sub_id'");
												$row_c1=mysql_fetch_array($result_c1);
												$subname=$row_c1[0];
												echo "<label style='float:left;color:#ffffff;'><font face='verdana' size='2' color='white' ><b>Welcome &nbsp;&nbsp;&nbsp;".$u5."&nbsp;&nbsp;!&nbsp;&nbsp;&nbsp;&nbsp;".$crname."[".$tutorname."]>".$subname.">"."My Dashboard </b></font></label>";
													//echo $crname.">".$subname.">"."Adaptive learning";

						?>

					</td></center>
				</tr>
			</table>
			<div  id="main_div_show">
			
			
			<!--<label>&nbsp;&nbsp;Note:If you are using virtual class platform for first time, download virtual class engine.<input type='BUTTON' id='submit_dwn' name='submit_dwn' class='defaultbutton' value = 'Download Now'/></label><br/><br/>-->
			<br/>
			<table style="width:100%;border:solid 0px;">

			<tr>
			<td style="width:100%;" valign="top">
			<input id="1" type="radio" name="mat_view_type"  value="1"><label style='color:black' for="1"><b>Chapterwise</b></label>
								<input id="2" type="radio" name="mat_view_type" value="2"  ><label style='color:black' for="2"><b>Datewise</b></label>

								</td>
			<td style="width:100%;" align="right">

			</td>
			</tr>
			</table>
			<table style="width:100%;border:solid 0px;" >

			<tr class="dtwise">
			<td style="width:100%;">
			<input id="5" type="radio" name="classtype_t"  value="5"><label style='color:black' for="5"><b>Offline</b></label>
								<input id="6" type="radio" name="classtype_t" value="6"  checked="checked"><label style='color:black' for="6"><b>Virtual</b></label></td>

			</tr>
			<tr class="crswise">
			<td style="width:100%;">
			 <blink><label>Select Unit</label></blink>&nbsp;&nbsp;<select class="inputs" id="text_unit" name="text_unit" style="width:30%;">
												<option value="0">Select Unit</option>
												<?php
												$result1t=mysql_query("SELECT `tutor_id` FROM course WHERE id='$course_id'");
		$row1t=mysql_fetch_array($result1t);
		$course_tutor_id=$row1t[0];
		$result1t2=mysql_query("SELECT created_by FROM USER WHERE id='$s5'");
		$row1t2=mysql_fetch_array($result1t2);
		$student_tutor_id=$row1t2[0];
		if($course_tutor_id==$student_tutor_id)
		{
		$result_unit=mysql_query("SELECT DISTINCT u.id,u.unit_name FROM unit u,chapter c,course_chapter cc,course_batch_active_chapter cb WHERE u.id=c.unit_id AND c.id=cc.chap_id AND cc.course_id='$course_id' AND cc.sub_id IN(SELECT DISTINCT rel_sub_id FROM subject_alias WHERE rel_sub_id='$subject_id') and c.id=cb.chapter_id and cb.active='1' and cb.course_id=cc.course_id and cb.batch_id='$batch_id' and u.id <> '39' ");
		}
		else
		{
		$result_unit=mysql_query("SELECT DISTINCT u.id,u.unit_name FROM unit u,chapter c,course_chapter cc WHERE u.id=c.unit_id AND c.id=cc.chap_id   and u.id <> '39' AND
cc.course_id='$course_id' AND cc.sub_id IN(SELECT DISTINCT rel_sub_id FROM subject_alias WHERE rel_sub_id='$subject_id') ");
		}
												/*$result_unit=mysql_query("SELECT DISTINCT u.id,u.unit_name FROM unit u,chapter c,course_chapter cc WHERE u.id=c.unit_id AND c.id=cc.chap_id AND
cc.course_id='$course_id' AND cc.sub_id IN(SELECT DISTINCT rel_sub_id FROM subject_alias WHERE rel_sub_id='$subject_id') ");*/

while($row_unit=mysql_fetch_array($result_unit))
								{
								echo "<option value='$row_unit[0]'>$row_unit[1]</option>";
								}
								echo "<option value='cc'>COMBINED CHAPTER</option>";
												?>

													</select>
													<label id='chname'><blink>Chapter</blink></label>&nbsp;&nbsp;<select class="inputs" id="text_chapter" name="text_chapter" style="width:30%;">
													</select>
			</td>

			</tr>
			<tr>
			
			<td>
			<br/>			Take Test&nbsp;&nbsp;<div class="toggle-button" id="myP">        <button></button></div>
			
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;About Courses&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="toggle-button1" id="myP1">
              <button></button> </div>
			</td>
			</tr>
			
			<!--<tr class="crswise">
					<td>
							<label id='chname'><blink><p id="bl2">Chapter</blink><label><select class="inputs" id="text_chapter" name="text_chapter" style="width:30%;">
					</td>
				</tr>-->
				<tr class="dtwise" >
					<td style="width:100%;">
						<div id="schedule_data" style="border:solid 1px;width:98%;height:250px;overflow-y:scroll;"></div>
					</td>
				</tr>
			</table><br/>
<center><table style="width:80%;"><tr>
<td>
<div class="tiplist" style="border:solid 1px;width:100%;height:300px;overflow-y: scroll;padding-left:3px;">
			<?php
			echo "	<b>Browser Support</b><br/>
								Coreacademics works best in <a href='https://www.google.com/chrome/browser/desktop/index.html'>Chrome;</a><br/> 
								
								Mozilla Firefox and Safari is also supported(<a href='https://get.adobe.com/flashplayer/'>Adobe Flash</a> needs to be installed)<br/><br/>
							Android Devices also supported (FlashFox needs to be installed)<br/><br/>
							You can download the coreacademics app from following link.
							<br/><br/>
							<a href='https://play.google.com/store/apps/details?id=com.gcm.coreacademics'>https://play.google.com/store/apps/details?id=com.gcm.coreacademics</a><br/>
								<b>Supported Devices</b><br/><br/>
								 Apple iOS devices are currently not supported.<br/><br/> 
								<b>Courses</b>
								<ul>
							  <li>Students can join for the online course by direct payment, though associated schools, coaching institutes, tutors or through our representatives, channel partners and brand ambassadors.</li>
							  <li>The content of the course is evolving in nature.</li>
							  <li>The contents will be added or updated in a constant manner as per the inputs from the subject experts. </li>
							  <li>There are three types of courses
								<ol>
								  <li>Test series<br/>
Chapter-wise, Unit-wise and Mock Tests
</li>
								  <li>Self- paced courses<br/>
Pre-loaded video lectures, notes, assignments and study contents.
</li>
								  <li>Live courses<br/>
Through virtual classes- (Interactive two way audio video classes)
</li>
								</ol> 
							  </li>
							</ul> 
							<b>Salient features</b>
							<ul style='list-style-type:circle'>
				<li>Diagnostic test
				<ul style='list-style-type:circle'>
				<li>After learning a chapter through your teacher, Virtual class, tutor, or with the help of online video lectures, you have to give a chapter test which is diagnostic in nature.</li>
				<li>This test will identify your micro-concept gaps (Grey areas).</li>
				</ul>
				</li>
  <li>Grey area support system
  <ul style='list-style-type:circle'>
  <li>Once you give an online test, the system generate a diagnostic report.</li>
   <li>Diagnostic test map out your micro-concept gaps.</li>
   <li>Online video lectures and web resources helps you to overcome the grey areas.</li>
   <li>You can also take the help of online lectures for one to one doubt solving/assistance by paying prescribed fees.</li>
  </ul>
  </li>
  <li>Adaptive learning
  <ul style='list-style-type:circle'>
  <li>The diagnostic test not only identify your micro-concept gaps but also identify the level of understanding in that particular chapter.</li>
   <li>Diagnostic test map out your micro-concept gaps.</li>
   <li>During adaptive learning, you will be getting questions of slightly higher difficulty level compared to your average performance level in that chapter for the practice.</li>
   
  </ul>
  </li>
  <li>Grey area assignment</li>
  <li>Grey area assignments will be generated for each test you give, and will be available in your account soon.
    <ul style='list-style-type:circle'>
	<li>These questions are selected based on your grey areas identified during diagnostic test.</li>
	<li>You are advised to rectify the grey areas before giving grey area assignments. </li>
	<li>Grey area assignment helps you to ensure that you have overcome those micro-concept gaps.</li>
	<li>Grey area assignments will be generated until all your micro concepts are cemented.</li>
	</ul>
  </li>
  <li>Video on demand
    <ul style='list-style-type:circle'>
	<li>You can learn lessons from available pre-recorded video lectures.</li>
	
	</ul>
  </li>
   <li>Tips for time management
    <ul style='list-style-type:circle'>
	<li>The unit-wise analysis and tips for time management helps you to get a better score by helping you to manage the valuable time during examination.</li>
	
	</ul>
  </li>
  <li>Chapter wise Test on demand</li>
    <li>Multiple chapter test on demand</li>
	  <li>Full course test on demand
	   <ul style='list-style-type:circle'>
	<li>You can request for a test as per you revision schedule.</li>
	<li>Test on demand helps you for self-analysis.</li>
	</ul>
	  </li>
	  <li>Knowledge Meter
	   <ul style='list-style-type:circle'>
	<li>Cumulative chapter-wise and unit-wise performance analysis shown graphically, gives an insight into the knowledge level in the subject.</li>
	
	</ul>
	  </li>
</ul>
<p align='center'><b><font face='Calibri' >Do not share your username and password.</font> </b></p>
<p align='center'><b><font face='Calibri' >Some one's data inputs may corrupt your data and Adaptive Algorithm and grey area assignments may not work effectively for you.</font> </b></p>
<p align='center'><font face='Monotype Corsiva' ><i>--It is you who must make a commitment to learn<br/>
The ultimate responsibility for learning is yours.<br/>
No one can do it for you.<br/>
Learning is like breathing-you've got to do it on your own!</i><br/></font>

</p>
<p align='center'><b><font face='Calibri' >Best of Luck</font> </b></p>
								Happy Learning<br/>
								Team Studyvita. <br/><br/>";
			?>
			</div>
			
</td>
</tr></table></center>
<table style="width:100%;">
<tr>
<td valign="top" style="width:55%;">

<?php
	$result=mysql_query("SELECT id FROM `special_campaign_course`c WHERE course_id='$course_id' ");
	$rw= mysql_num_rows($result);
	if($rw>0)
	{
		$result1=mysql_query("SELECT `title`,msg_text FROM `special_campaign`");
		while($row1= mysql_fetch_array($result1))
		{
			echo "<div  style='padding-left:10px;'><font color='#1b4268' size='3'><i><b>".$row1[0]."</b><br/>".$row1[1]."</i></font></div>";
		}
	}
?>
			<div class="imagelist" style="border:solid 0px;width:100%;height:150px;padding-left:0px;">
			<center><font color="#1b4268" size="4"><i><br/><br/><br/>Do not share your User name and Password with your Friends.
Your friend's data inputs may corrupt your data.<br/> If data is corrupted, adaptive algorithm and grey area assignments will not work effectively.</i></font></center>

			<!--<center><img src="images/st4.png" style="height:100%;width:100%;"/></center>-->
			</div>
			</td>
<td valign="top" style="width:45%;">
<?php
$result_log=mysql_query("SELECT id FROM `access_log` WHERE user_id='$s5'");
$rw_log=mysql_num_rows($result_log);
if($rw_log==0)
{
echo "<iframe width='560' height='315' src='https://www.youtube.com/embed/0esq8NfdN3o?&autoplay=1' frameborder='0' allowfullscreen></iframe>";
}
else
{
echo "<iframe width='560' height='315' src='https://www.youtube.com/embed/0esq8NfdN3o' frameborder='0' allowfullscreen></iframe>";
}
		

?>

	
</td>
</tr>
</table>
			<table style='width:100%;' class="matlist">
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
							<center><strong><label style="color:white">View Material </label></strong></center>
						</td>
						<td style='width:5%;'>
							<center><img src="images/close_image.png" id='cancel_hide_allot' height="25px" width="25"></center>
						</td>
					</tr>
				</table>
				<table style="border:0px solid;width:100%;">
					<div id="viewer_1" class="flexpaper_viewer" style="border:solid 1px;width:100%;height:550px"></div>
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

<img src="images/footer final.png" style="height:auto;width:100%;">
	        <div>
                <?php require 'copy_right_file.php'; ?>
            </div>
			<?php
			include 'Popup_basic_account.php';?>
	</div>

</body>
</html>
