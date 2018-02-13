<?php
	include 'config.php';
	//include 'lock.php';
	//$domainname = $_SESSION['domainname'];
	session_start();
	$ct=$_GET['ct'];
	if($ct == 1)
	{
		$s5=$_GET['id'];
		$u5 = $_GET['name'];
		$domainname = $_GET['domainname'];
		$_SESSION['domain_name']=$domainname;
		
		//$domainname = $_SESSION['domainname'];
		$_SESSION['sid']=$s5;
		$_SESSION['uname']=$u5;
	}
	else
	{
		$s5=$_SESSION['sid'];
		$u5=$_SESSION['uname'];
		//$domainname = $_SESSION['domainname'];
	};
	
?>
<!DOCTYPE html>
<html lang="en">
    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="shortcut icon" href="images/Edutechheader.ico" />
		<meta name="keywords" content="edutechindiaonline">
		<meta name="description" content="edutechindiaonline">
		<title>Welcome <?php echo $u5 ?></title>
		<!--<link rel="stylesheet" href="admin_upload.html" type="text/css" media="screen" />-->
		<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
		<link href="css/bg1.css" rel="stylesheet" type="text/css" />
		<link href="css/style_images.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="js/flexpaper.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers_debug.js"> </script>
		<link href="css/button_style.css" rel="stylesheet" type="text/css"/>
		<link href="menu/menu.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="css/style_login.css" />
		<link href="css/checkbox.css" rel="stylesheet" type="text/css" />
		<script src="js/modernizr.custom.63321_login.js"></script>
			<link rel="shortcut icon" href="../favicon.ico"> 
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<script src="js/modernizr.custom.js"></script>	
		<style>	
			@import url(http://fonts.googleapis.com/css?family=Raleway:400,700);
			body {
				background: #7f9b4e url(images/bg2.jpg) no-repeat center top;
				-webkit-background-size: cover;
				-moz-background-size: cover;
				background-size: cover;
			}
			.main_div { 
				height: auto;
				width: auto;
				background-color: white; 
				/* outer shadows  (note the rgba is red, green, blue, alpha) */
				-webkit-box-shadow: 0px 0px 12px rgba(0, 0, 0, 0.4); 
				-moz-box-shadow: 0px 1px 6px rgba(23, 69, 88, .5);
				/* rounded corners */
				-webkit-border-radius: 5px;
				-moz-border-radius: 5px; 
				border-radius: 5px;
				/* gradients */
				background: -webkit-gradient(linear, left top, left bottom, 
				color-stop(0%, white), color-stop(15%, white), color-stop(100%, #D7E9F5)); 
				background: -moz-linear-gradient(top, white 0%, white 55%, #D5E4F3 130%); 
				}
				inputs:-webkit-input-placeholder { 
				color:    #b5b5b5; 
			}
			.inputs  {
			 width:200px; 
			padding: 7px 8px; 
			font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif; 
			font-weight: 400; 
			font-size: 14px; 
			color: #9D9E9E; 
			text-shadow: 1px 1px 0 rgba(256, 256, 256, 1.0); 
			background: #FFF; 
			border: 1px solid #FFF; 
			border-radius: 5px; 
			box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.50); 
			-moz-box-shadow: inset 0 1px 3px rgba(0,0,0,0.50); 
			-webkit-box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.50); 
			} 
			.inputs:focus { 
			   background: #DFE9EC; 
			color: #414848; 
			box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.25); 
			-moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.25); 
			-webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.25); 
				outline:0; 
			} 
			.inputs:hover   { 
			background: #DFE9EC; 
			color: #414848; 
			}
			@import url(http://fonts.googleapis.com/css?family=Roboto:400,500);

			.button-demo { /*general styling for all buttons*/
			  font-family: "Roboto";
			  color: #244549;
			  position: relative;
			  background: white;
			  cursor: pointer;
			  overflow: hidden;
			  text-align: center;
			  -webkit-box-shadow: 0px 9px 10px 1px rgba(0,0,0,0.15);
			  box-shadow: 0px 9px 10px 1px rgba(0,0,0,0.15);
			  text-shadow: none;
			  -webkit-transition: all .3s ease-out;
			  transition: all .3s ease-out;
			}

			.button-demo.hovered { /*makes it 'elevate'*/
			  -webkit-transform: scale(1.05) !important;
			  -ms-transform: scale(1.05) !important;
			  transform: scale(1.05) !important;
			}

			.ripple { /*stylings for the circular overlay*/
			  position: absolute;
			  border-radius: 100%;
			  width: 0;
			  height: 0;
			  background: rgba(3,169,244, 0.17);
			  -webkit-transition: all .3s ease-out;
			  transition: all .3s ease-out;
			}

			.notransition { /*used to reset the ripple without an animatiion*/
			  -webkit-transition: none !important;
			  transition: none !important;
			}

			/*just the button stylings*/


			.button-demo.big {
			  position: absolute;
			  padding: 10px;
			  width: 65px;
			  margin-top: 10px;
			  margin-left: 115px;
			}
			.button-demo.small_lg {
			  position: absolute;
			  padding: 10px;
			  width: 80px;
			  margin-top: 00px;
			  right: 10px;
			}
			.button-demo.small {
			  position: absolute;
			  padding: 10px;
			  width: 65px;
			  margin-top: 10px;
			  margin-left: 10px;
			}

			.button-demo.medium {
			  position: absolute;
			  padding: 10px;
			  font-size: 24px;
			  margin-top: 50px;
			  margin-left: 200px;
			}
			
			.mainselection_course select {
				
				opacity: 0.5;
				color:black;
			   border: 0;
			   font-size: 14px;
			   padding: 7px 10px;
			   width: 278px;
			   *width: 350px;
			   *background: #58B14C;
			   -webkit-appearance: none;
			}
			.mainselection_course {
			   overflow:hidden;
			   width:278px;
			   color:black;
			   background-color: #fff;
				
			   -moz-border-radius: 0px 0px 0px 0px;
			   -webkit-border-radius: 0px 0px 0px 0px;
			   border-radius: 0px 0px 0px 0px;
			   box-shadow: 1px 1px 11px rgba(0, 0, 0, 0);
			   background: white url("http://i62.tinypic.com/15xvbd5.png") no-repeat scroll 247px center;
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
			height: auto;
			width: 100%;
			background: #353535;
			overflow-y: scroll;

		}
		.force-overflow
		{
			min-height: auto;
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
			width: 7px;
			background-color: #34495E;
		}

		#style-7::-webkit-scrollbar-thumb
		{
			border-radius: 1px;
			background-image: -webkit-gradient(linear,
			   left bottom,
			   left top,
			   color-stop(0.44, #FFF),
			   color-stop(0.72, #FFF),
			   color-stop(0.86, #FFF));
		}
		</style>
		<script>
			$(document).ready( function (){
				var domainname1='<?php echo $domainname; ?>';
			//alert(domainname1);
			  //appends the overlay to each button
				$(".button-demo").each( function(){
				   var $this = $(this);
				$this.append("<div class='ripple'></div>");
				});
			  
				
				$(".button-demo").click(function(e){
				  var $clicked = $(this);
				  
				  //gets the clicked coordinates
				  var offset = $clicked.offset();
				  var relativeX = (e.pageX - offset.left);
				  var relativeY = (e.pageY - offset.top);
				  var width = $clicked.width();
				  
				  
				  var $ripple = $clicked.find('.ripple');
				  
				  //puts the ripple in the clicked coordinates without animation
				  $ripple.addClass("notransition");
				  $ripple.css({"top" : relativeY, "left": relativeX});
				  $ripple[0].offsetHeight;
				  $ripple.removeClass("notransition");
				  
				  //animates the button and the ripple
				  $clicked.addClass("hovered");
				  $ripple.css({ "width": width * 2, "height": width*2, "margin-left": -width, "margin-top": -width });
				  
				  setTimeout(function(){
					  //resets the overlay and button
					  $ripple.addClass("notransition");
					  $ripple.attr("style", "");
					  $ripple[0].offsetHeight;
					  $clicked.removeClass("hovered");
					$ripple.removeClass("notransition");
				  }, 300 );
				});
			});         
			</script>
		<script>
			$(document).ready(function(){
				//alert("sdfd");
					var domainname1='<?php echo $domainname; ?>';
					var userid_temp='<?php echo $s5; ?>';
						var username_temp='<?php echo $u5; ?>';
				var uri = window.location.toString();
				 var cart_no=0;
		 
		var add_my_cart_val="";
	var totalitem=0;

	 var course_sel="";
		  var course_total_fees=0;
				if (uri.indexOf("?") > 0) {
					var clean_uri = uri.substring(0, uri.indexOf("?"));
					window.history.replaceState({}, document.title, clean_uri);
				}
				var uid='<?php echo $s5; ?>';
				//alert(uid);
				var course_id="",mat_id="",tutor_id="",sub_id="",chap_id="",subid="",btid="",batch_id="";
				var bt1="",sb1="",mt1="",search_text_tution="";
				$("#doc34").hide();
				$(".bg_div_class").hide();
				$("#1tablt").hide();
				$("#reg_show").hide();
				$("#2tablt").hide();
				$(".bg_div_class_hide").hide();
				filename = "test_paper_generator/view_first_page.php?uid="+uid;
				//alert(filename);
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					success: function(data, textStatus, xhr) {
						//alert(data);
						var mySplitResult = data.split("-");
						uvl=mySplitResult[0];
						course_id=mySplitResult[1];
						course_count=mySplitResult[2];
						course_name=mySplitResult[3];
						if(uvl == "failed")
						{
							/*$("#1tablt").show();
							$("#2tablt").hide();
							$("#reg_show").show();
							$(".bg_div_class").hide();
							$(".bg_div_class_hide").show();*/
							$("#2tablt").show();
							$("#course_id2").hide();
							$("#course_id").show();
							$(".bg_div_class").show();
							$(".bg_div_class_hide").show();
							$("#reg_show").show();
						}
						else if(uvl == "1")
						{
						$("#1tablt").hide();
							$("#2tablt").show();
							$("#course_id2").hide();
							$("#course_id").show();
							$(".bg_div_class").show();
							$(".bg_div_class_hide").show();
							$("#reg_show").show();
							/*$("#1tablt").hide();
							$("#2tablt").show();
							$("#course_id2").show();
							$("#course_id").hide();
							$("#reg_show").show();
							$("#course_id2").html(course_name);
							$(".bg_div_class").show();
							$(".bg_div_class_hide").show();
							tp=1;
							filename = "test_paper_generator/view_batch_course_subject.php?course_id="+course_id+"&tp="+tp+"&uid="+uid+"&batch_id="+batch_id;
						
							getContent(filename, "batch_id");*/
						}
						else if(uvl == "2")
						{
							$("#1tablt").hide();
							$("#2tablt").show();
							$("#course_id2").hide();
							$("#course_id").show();
							$(".bg_div_class").show();
							$(".bg_div_class_hide").show();
							$("#reg_show").show();
						}
					},
				});
				/*$("#join_new_course").click(function(){
					$(".bg_div_class").hide();
					$(".bg_div_class_hide").show();
				});*/
				$("#course_id").change(function(){
					tp=1;
					course_id=$("#course_id").val();
					//alert(course_id);
					filename = "test_paper_generator/view_batch_course_subject.php?course_id="+course_id+"&tp="+tp+"&uid="+uid+"&batch_id="+batch_id;
					//alert(filename);
					getContent(filename, "batch_id");
				});
				$("#batch_id").change(function(){
					tp=2;
					batch_id=$("#batch_id").val();
					filename = "test_paper_generator/view_batch_course_subject.php?course_id="+course_id+"&tp="+tp+"&uid="+uid+"&batch_id="+batch_id;
					//alert(domainname1);
					getContent(filename, "subject_id");
				});  
				$("#course_id_dm").change(function(){
					//orgtp=10;
					tp=1;
					course_id=$("#course_id_dm").val();
					filename = "test_paper_generator/view_batch_course_subject.php?course_id="+course_id+"&tp="+tp+"&uid="+uid+"&batch_id="+batch_id;
					//alert(filename);
					getContent(filename, "batch_id_dm");
				});
				$("#batch_id_dm").change(function(){
					tp=2;
					batch_id=$("#batch_id_dm").val();
					filename = "test_paper_generator/view_batch_course_subject.php?course_id="+course_id+"&tp="+tp+"&uid="+uid+"&batch_id="+batch_id;
					//alert(filename);
					getContent(filename, "subject_id_dm");
				});
				function DoPost(){
				  $.post("student_course_page.php", 
					{ course_id: course_id, batch_id: batch_id, subject_id: subject_id, vl: '1'}
					).done(function(res)   {window.location="student_course_page.php"});
				}
				$("#subject_id_dm").change(function(){
					tp=3;
					subject_id=$("#subject_id_dm").val();
					"menu/testmenu.php?course_id="+course_id+"&batch_id="+batch_id+"&subject_id="+subject_id;
					url="student_course_page.php?course_id="+course_id+"&batch_id="+batch_id+"&subject_id="+subject_id+"&domainname="+domainname1+"&vl=1";
					//location.href=url.substr(0, input.lastIndexOf('?')) || url;
					//alert(url);
					location.href=url;
				});
				$("#subject_id").change(function(){
					tp=3;
				subject_id=$("#subject_id").val();
					//alert(domainname1);
					//"menu/testmenu.php?course_id="+course_id+"&batch_id="+batch_id+"&subject_id="+subject_id;
					//url="student_course_page.php?course_id="+course_id+"&batch_id="+batch_id+"&subject_id="+subject_id+"&domainname="+domainname1+"&vl=1";
					//location.href=url.substr(0, input.lastIndexOf('?')) || url;
					//alert(url);
					//location.href=url;
				});
				$('#log-submit').click(function(){
				tp=3;
					subject_id=$("#subject_id").val();
				
					course_name=	$("#course_id option:selected" ).text();
					//alert(course_name);
					//alert(domainname1);
					 if(subject_id=="" || course_id=="" || batch_id=="")
					 {
					 alert("Fields are empty");
					 }
					 else
					 {
				filename = "query/check-demo-course.php?course_id="+course_id+"&course_name="+course_name+"&uid="+uid;
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							//alert(data);
							if(data == 'success')
							{
								"menu/testmenu.php?course_id="+course_id+"&batch_id="+batch_id+"&subject_id="+subject_id;
					url="student_course_page.php?course_id="+course_id+"&batch_id="+batch_id+"&subject_id="+subject_id+"&domainname="+domainname1+"&vl=1";
				
					location.href=url;
								
							}
							else
							{
							alert(data);
							"menu/testmenu.php?course_id="+course_id+"&batch_id="+batch_id+"&subject_id="+subject_id;
					url="student_course_page.php?course_id="+course_id+"&batch_id="+batch_id+"&subject_id="+subject_id+"&domainname="+domainname1+"&vl=1";
				
					location.href=url;
							}
							
						},
					});
					
					}
				});
				$("#course_reg").live('click',function(){
					/*$('body').scrollTop(0);
					var bal=($(this).closest('tr').attr('id'));
					alert(bal);
					var mySplitResult = bal.split("-");
						cname=mySplitResult[0];
						cfees=mySplitResult[1];
						cduration=mySplitResult[2];
						ctutor_id=mySplitResult[3];
						cid=mySplitResult[4];
						alert(cid)
						$("#shadow").fadeIn("normal");
						$("#reg_batch_dis1").fadeIn("normal");
						filename = "query/courses_batch_define1.php?cid="+cid;
						alert(filename);
						getContent(filename, "course_batch");*/
				});
				$("#cancel_hide_bt").click(function(){
					$("#reg_batch_dis1").fadeOut("normal");
					$("#shadow").fadeOut();
				});
				$("#cancel_hide_bt2").click(function(){
					$("#reg_batch_dis1").fadeOut("normal");
					$("#shadow").fadeOut();
				});
				filename = "query/search_course.php?search_text_tution="+search_text_tution;
				//alert(filename);
				getContent(filename, "sesarch_tution");
				$("#search1").click(function(){
					search_text_tution=$("#search_text_tution").val();
					filename = "query/search_course.php?search_text_tution="+search_text_tution;
					//alert(filename);
					getContent(filename, "sesarch_tution");
				 });
				 $('#course_batch').click(function(){
					$("#course_batch input:radio:checked").each(function() {
						idArray34=this.id;
					});
					batch_val=idArray34;
				});
				$('#submit').click(function(){
					filename = "query/insert_course_registred1.php?batch_val="+batch_val+"&cid="+cid+"&uid="+uid;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							//alert(data);
							if(data == 'success')
							{
								alert("Thank you for registering with us. Your course will be activated shortly!");
								$("#shadow").fadeOut("normal");
								$("#reg_batch_dis1").fadeOut("normal");
								location.reload();
							}
							else if(data == "already")
							{
								alert("You are already join this batch, please join other batch.");
							}
							else
							{
								alert("Something Went Wrong.");
								$("#shadow").fadeOut("normal");
								$("#reg_batch_dis1").fadeOut("normal");
							}
						},
					});
					
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
				$('#democourse').live('click',function(){
					 var bal=($(this).closest('tr').attr('id'));
					//alert(bal);
					var mySplitResult = bal.split("|");
						//cname=mySplitResult[0];
						//cfees=mySplitResult[1];
						//cduration=mySplitResult[2];
						//ctutor_id=mySplitResult[3];
						crs_id=mySplitResult[4];
						//alert(crs_id);
						//filename = "query/insert_course_registred1.php?batch_val="+batch_val+"&cid="+cid+"&uid="+uid;
						filename = "query/register_demo.php?uid="+uid+"&course_id="+crs_id;
						//alert(filename)
							$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							//alert(data);
								if(data == 'success')
								{
									filename = "query/get_course_withdemo.php?uid="+uid+"&course_id="+crs_id;
									getContent(filename, "course_id")
								
									filename = "query/get-demo-condition.php?uid="+uid+"&course_id="+crs_id;
									$.ajax({
										url: filename,
										type: 'GET',
										dataType: 'html',
										
										success: function(data, textStatus, xhr) {
										alert(data);
										},
										});
								}
								
								else
								{
									alert(data);
									
									filename = "query/get-demo-condition.php?uid="+uid+"&course_id="+crs_id;
									$.ajax({
										url: filename,
										type: 'GET',
										dataType: 'html',
										
										success: function(data, textStatus, xhr) {
										alert(data);
										},
										});
								}
							},
						});
						
				});					 
			 $('#add_cart_check').live('click',function(){
			//alert("k");
			if ($(this).is(':checked')) {
				idArray21=this.value;
				//alert(idArray21);
				bal=idArray21;
				//alert(bal);
					 
		 
				var mySplitResult = bal.split("|");
				cname=mySplitResult[0];
				cfees=mySplitResult[1];
				cduration=mySplitResult[2];
				ctutor_id=mySplitResult[3];
				cid=mySplitResult[4];
				var str_rmv = cid+",";
				//alert(cid);
				course_sel=course_sel+cid+",";
				//alert(couser_sel);
				if (add_my_cart_val.indexOf(str_rmv) >= 0) { 
					//alert('Yes');
				} else { 
				  //alert('No');
				  add_my_cart_val=add_my_cart_val+cid+",";
				}
				
				//grand_total_cart
				//alert(add_my_cart_val);
				cart_no=add_my_cart_val.split(/,/).length;
				cart_no=cart_no - Number(1);
				//alert(cart_no);
				$("#add_to_cart_val_zero").hide();
				$("#add_to_cart_val").show();
				$("#add_to_cart_val").html(cart_no);
				//$("#add_to_cart_val1").html(cart_no);
				
				//alert(cfees);
				course_total_fees = Number(course_total_fees) + Number(cfees);
				$("#grand_total_cart").html(course_total_fees);
				//<?php $_SESSION['mycart'] = cart_no; ?>;
				totalitem=cart_no;
				
 

		

       
			}
			else
			{
				idArray21=this.value;
				//alert(idArray21);
				bal=idArray21;
				//alert(bal);
				var mySplitResult = bal.split("|");
				cname=mySplitResult[0];
				cfees=mySplitResult[1];
				cduration=mySplitResult[2];
				ctutor_id=mySplitResult[3];
				cid=mySplitResult[4];
				
				var str_rmv = cid+",";
				
				add_my_cart_val = add_my_cart_val.replace(str_rmv, "");
				
				cart_no=add_my_cart_val.split(/,/).length;
				cart_no=cart_no - Number(1);
				
		//$("#add_to_cart_val_zero").hide();
				$("#add_to_cart_val").show();
				$("#add_to_cart_val").html(cart_no);
				$("#add_to_cart_val_zero").html(cart_no);
				//$("#cr_nm").html(cname);
				//$("#cr_nm1").html(cname);
				
				var mysplitcouser = bal.split(",");
				
				course_total_fees = Number(course_total_fees) - Number(cfees);
				$("#grand_total_cart").html(course_total_fees);
				//alert(course_total_fees);
				totalitem=cart_no;
				
					

				
			}
			
			
      });
				  $("#btn-click").click(function(){
				  var idArray3="";
			course_sel="";
		   $("#sesarch_tution input:checkbox").each(function() {
		  
		   
						if ($(this).is(':checked')) {
							idArray3=this.value;
								var mySplitResult = idArray3.split("|");
								cid=mySplitResult[4];
				
				course_sel=course_sel+cid+",";
						//alert(couser_sel);
						}
					});
					//alert(course_sel);
					//alert(course_total_fees);
					if(course_sel=="")
					{
					alert("Pls Select Course");
					}
					else
					{
					
					filename1="query/insert_course_order.php?course_id="+course_sel+"&totalitem="+totalitem+"&uid="+userid_temp+"&totalamt="+course_total_fees;
					//alert(filename1);
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
												url="datafrom_test.php?course_id="+course_sel+"&totalitem="+totalitem+"&uname="+username_temp+"&uid="+userid_temp+"&totalamt="+course_total_fees+"&order_id="+order_id;
												location.href=url;
											}
										},
								});
					//var totalamt=0;
					//totalamt=
					//url="LoginIndex1.php?course_id="+ +"&totalitem="+totalitem+"&totalamt="+course_total_fees;
					
					//location.href=url;
					//alert("ok");
					}
				  });
			});
		</script>
    </head>
    <body>
		<?php
		include 'send_mail_login.php';
	?>
	<div style='width:100%'>
		<div  style='padding-left:5px;color:yellow;border:solid 0px;width:100%'>
			<table style='width:100%'>
				<tr>
					<td style='width:100%;'>
						<center><?php require 'adlp.php'; ?></center>
					</td>
				</tr>
			</table>
		</div>
		<div id="all_new_id" >
			<div style='width:100%;height:40px;border:solid 0px;'>
				<a href="logout.php"><div class="button-demo small_lg">Log-Out</div></a>
			</div>
			<div style='width:100%;height:150px;border:solid 0px;'>
				<center>
					<!--<a href="logout.php"><section><div class="button raised"><div class="center" fit>Log-out</div><paper-ripple fit></paper-ripple></div></section></a>-->
					<div  style='width:100%;height:220px;border:solid 0px;'>
						<table id="1tablt"  style='border:solid 0px;width:100%;height:200px;'>
							<tr>
									<td>
									<center>
									<div class="mainselection_course">
									  <select id="course_id_dm">
										<?php
											$result=mysql_query("SELECT DISTINCT c.id,c.name,c.tutor_id,u.name FROM course c,USER u WHERE c.tutor_id=u.id AND c.demo='1'");
											
											$rw = mysql_num_rows($result);
											echo "<option value='0'>Select Course</option>";
											if($rw == 0)
											{
												echo "<option value='0'>No Data Available.</option>";
											}
											else
											{
												while($row=mysql_fetch_array($result))
												{
													echo "<option value=$row[0]>$row[1]</option>";
												}
											}
										?>
									  </select>
									</div></center>
								</td>
								
							</tr>
							<tr>
								<!--<td style='width:40%;'>
									<center><label style='color:black;font-family:Century Gothic;font-family:20px;'><b>Batch</b></label></center>
								</td>
								<td style='width:60%;'>
									<select id='batch_id_dm' class="black" style='width:70%;'></select>
								</td>-->
								<center>
								<td>
								<center>
									<div class="mainselection_course"><select id='batch_id_dm'></select></div></center>
								</td></center>
							</tr>
							<tr>
								<!--<td style='width:40%;'>
									<center><label  style='color:black;font-family:Century Gothic;font-family:20px;'><b>Subject</b></label></center>
								</td>
								<td style='width:60%;'>
									<select id='subject_id_dm' class="black" style='width:70%;'>
									</select>
								</td>-->
								<center>
								<td >
									<center><div class="mainselection_course"><select id='subject_id_dm'></select></div></center>
								
								</td></center>
							</tr>
							
						</table>
						<table id="2tablt"  style='border:solid 0px;width:100%;height:200px;'>
							<tr>
							
								<td >
									<center><label id='course_id2'></label>
									<div class="mainselection_course">
									  <select id="course_id">
										<?php
											$result=mysql_query("SELECT DISTINCT c.id,c.name,c.tutor_id,u.name 
											FROM student_registered_course str,course c,USER u WHERE str.course_id=c.id AND c.tutor_id=u.id AND str.user_id='$s5' and str.status=1");
											
											$rw = mysql_num_rows($result);
											echo "<option value='0'>Select Course</option>";
											if($rw == 0)
											{
												//echo "<option value='0'>No Data Available.</option>";
														$totaltimes=0;
													$totaltimes1=0;
											
													$result1=mysql_query("SELECT c.id,c.name,s.total_times FROM course c,student_demo_course s WHERE s.course_id=c.id and s.user_id='$s5' and c.id not IN(select distinct course_id from student_registered_course where user_id='$s5')");
													$rw1 = mysql_num_rows($result1);
													if($rw1 == 0)
													{
														echo "<option value='0'>No Data Available.</option>";
													}
													else
													{
														$cnt=0;
														while($row1=mysql_fetch_array($result1))
														{
															$totaltimes=$row1[2];
															$result2=mysql_query("SELECT course_times FROM `student_demo_criteria` ");
															while($row2=mysql_fetch_array($result2))
															{
																$totaltimes1=$row2[0];
															}
															if($totaltimes<$totaltimes1)
															{
																echo "<option value=$row1[0]>$row1[1]</option>";
																$cnt=$cnt+1;
															}
															else
															{
															
															}
															
														}
														if($cnt == 0)
														{
															echo "<option value='0'>No Data Available.</option>";
														}
													}
												
											}
											else
											{
												while($row=mysql_fetch_array($result))
												{
													echo "<option value=$row[0]>$row[1]</option>";
												}
													$totaltimes=0;
													$totaltimes1=0;
													$result1=mysql_query("SELECT c.id,c.name,s.total_times FROM course c,student_demo_course s WHERE s.course_id=c.id and
													s.user_id='$s5' and c.id not IN(select distinct course_id from student_registered_course where user_id='$s5')");
													
													while($row1=mysql_fetch_array($result1))
													{
														$totaltimes=$row1[2];
														$result2=mysql_query("SELECT course_times FROM `student_demo_criteria` ");
														while($row2=mysql_fetch_array($result2))
														{
															$totaltimes1=$row2[0];
														}
														if($totaltimes<$totaltimes1)
														{
															echo "<option value=$row1[0]>$row1[1]</option>";
														}
														else
														{
														//echo "Please register for access";
														}
														
												}
											}
										?>
									  </select>
									</div></center>
								</td>
							</tr>
							<tr>
								<center>
								<td>
								<center>
									<div class="mainselection_course"><select id='batch_id'></select></div></center>
								</td></center>
							</tr>
							<tr>
								
								<center>
								<td >
									<center><div class="mainselection_course"><select id='subject_id'></select></div></center>
								
								</td></center>
							</tr>
							
						</table>
							</div></center>
						
				</div>
			</div>
			<div  style="width:100%;height:auto">
			<table style='border:solid 0px;width:100%;'>
						<tr>
								
								<td>
								<div class="form-4">
								<input type="submit" name="submit" value="Continue" id='log-submit'>
								</div>
								</td>
							</tr>
				</table>
			</div>
			<center><div style="background-color:#000000;width:47%;" >
			<font color="white">Site best viewed in google chrome with minimum screen resolution of 1366x768 or higher.</font>
			</div></center>
						
			<center><div id='reg_show' style='width:80%;height:560px;border:solid 0px;padding-top:5px;'>
				<center>
			<div style='padding-top:0px;background: #353535;width:70%;height:200px;border:solid 0px;'>
					<table style='border:solid 0px;width:100%;height:30px;'>
						<tr>
							<td style='width:95%;'>
								<center><label style='color:white;'>Register For New Course</label></center>
							</td>
							<td style='width:5%;'>
								
							</td>
						</tr>
					</table>
					<table style='background: #fafafa;border:solid 0px;width:100%;height:auto;font-size:16px;'>
						<tr>
							
							<td style='width:20%;'>
							<a href="#" id='view_cart_link'>My cart(<label style='color:red;' id='add_to_cart_val_zero'></label><label style='color:red;' id='add_to_cart_val'></label>)</a>
							</td>
							<td style='width:30%;'>
							Grand Total(<label style='color:red;' id='grand_total_cart'></label>)
							</td>
							<td style='width:40%;'>
							<input type='text' id='search_text_tution' placeholder='Search Courses'   class='inputs' style='width:100%' />
							</td>
							<td style='width:30%;'>
							<img style="display:block; position: relative; margin:auto" id='search1' src="images/Search.png" width='40px' height='40px'/>
							</td>
						</tr>
					</table>
					<table style='background: #353535;border:solid 0px;width:100%;height:auto;'>
						<tr>
							<td style='width:100%;'>
							<div class="scrollbar_div" id="style-7">
								<div id="sesarch_tution" style="background: #353535;border:0px solid;width:100%;height:210px;">
									</div>
								</div>
							</td>
						</tr>
					</table>
				</div>
				
				</center>
			<center><div style="padding-top:90px" ><section><button id="btn-click" class="btn btn-7 btn-7a icon-truck ">Proceed to Checkout</button>
	</section>
</div></center>
<script src="js/classie1.js"></script>
		<script>
			var buttons7Click = Array.prototype.slice.call( document.querySelectorAll( '#btn-click button' ) ),
				buttons9Click = Array.prototype.slice.call( document.querySelectorAll( 'button.btn-8g' ) ),
				totalButtons7Click = buttons7Click.length,
				totalButtons9Click = buttons9Click.length;

			buttons7Click.forEach( function( el, i ) { el.addEventListener( 'click', activate, false ); } );
			buttons9Click.forEach( function( el, i ) { el.addEventListener( 'click', activate, false ); } );

			function activate() {
				var self = this, activatedClass = 'btn-activated';

				if( classie1.has( this, 'btn-7h' ) ) {
					// if it is the first of the two btn-7h then activatedClass = 'btn-error';
					// if it is the second then activatedClass = 'btn-success'
					activatedClass = buttons7Click.indexOf( this ) === totalButtons7Click-2 ? 'btn-error' : 'btn-success';
				}
				else if( classie1.has( this, 'btn-8g' ) ) {
					// if it is the first of the two btn-8g then activatedClass = 'btn-success3d';
					// if it is the second then activatedClass = 'btn-error3d'
					activatedClass = buttons9Click.indexOf( this ) === totalButtons9Click-2 ? 'btn-success3d' : 'btn-error3d';
				}

				if( !classie1.has( this, activatedClass ) ) {
					classie1.add( this, activatedClass );
					setTimeout( function() { classie1.remove( self, activatedClass ) }, 1000 );
				}
			}

			document.querySelector( '.btn-7i' ).addEventListener( 'click', function() {
				classie1.add( document.querySelector( '#trash-effect' ), 'trash-effect-active' );
			}, false );
		</script>
</div>
		</div></center>
		
		<!--<div id="otp_get">
			<input type='text' id='otp_text' placeholder='Enter OTP' />
		</div>-->
		<div id="reg_batch_dis1">
			<div class="err" id="add_err"></div>
			<form action="" style="width:100%;">
				<table class='main_div' style="background-color:#0174DF;border:2px solid;width:100%;height:40px">
					<tr>
						<td style='width:95%;'>
							<center><strong><label style="color:Black">Join New Batch</label></strong></center>
						</td>
						<td style='width:5%;'>
							<center><img src="images/close_image.png" id='cancel_hide_bt' height="20px" width="25"></center>
						</td>
					</tr>
				</table>
				<div id='registered_dt' class='main_div' style="background-color:#0174DF;border:2px solid;width:98%;height:auto">
					<div style="border-radius: 5px;background-color:#3366FF;padding-left:15px;width:666px;height:23px;">
						<table style='width:100%;'><tr>
							<td style='width:5%;border:solid 0px;'></td>
							<td style='font-weight:bold;width:20%;border:solid 0px;'>Name</td>
							<td style='font-weight:bold;border:solid 0px;width:15%;'>Type</td>
							<td style='font-weight:bold;border:solid 0px;width:15%;'>Branch</td>
							<td style='font-weight:bold;border:solid 0px;width:15%;'>Start Date</td>
							<td style='font-weight:bold;border:solid 0px;width:15%;'>End Date</td>
							<td style='font-weight:bold;border:solid 0px;width:15%;'>Fees</td>
						</tr></table>
					</div>
					<div class='inputs' id="course_batch" name="course_batch" style="width:98%;height:98px;overflow-y: scroll;">
					</div>
					<br/>
					<table>
						<tr>
							<td><center><input type='BUTTON' id='submit' name='submit' value='SUBMIT' class="defaultbutton"/></center></td>
						</tr>
					</table>
				</div>
			</form>
		</div>
		
		<div id="footer">
			<center><div style="padding-top:5px;font-size:12px;color:black;text-transform: capitalize;"><label style="border:solid 0px;color:white;">Powered by Globaleduserver Copyright &copy Edutech Educational Services Pvt. Ltd. Ahmedabad, Gujarat, India</label>
			</div></center>
		</div>
		
    </body>
</html>