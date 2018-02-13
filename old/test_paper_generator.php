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
		<link href="css/bg1.css" rel="stylesheet" type="text/css" />
		<link href="css/style_images.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="js/flexpaper.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers_debug.js"> </script>
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
				background-image: url(http://www.globaleduserver.in/images/uploads/slideshow_home/2.jpg);
				background-position: left top;
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
			height: 250px;
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
		</style>
		<script>
			$(document).ready(function(){
				var cp_value12="",sel_time="";
						var uid='<?php echo $s5; ?>';
						var course_id='<?php echo $course_id; ?>';
						var batch_id='<?php echo $batch_id; ?>';
						filename = "query/check-demo-adaptive1.php?course_id="+course_id+"&batch_id="+batch_id+"&uid="+uid;
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
				filename = "test_paper_generator/chape2.php";
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
				$('#cpt').click(function(){
					$("#cpt input:radio:checked").each(function() {
							idArray3=this.value;
					});
					cp_value12 = idArray3;
					//alert(cp_value12);
				});
				$('#sel_time').change(function(){
					if(cp_value12 == "")
					{
						alert("select chapter first");
					}
					else
					{
						sel_time=$('#sel_time').val();
						$("#start_test").attr('disabled',false);
						//$("#start_test").show();
					}
				});
				$('#start_test').click(function(){
					req_que=$('#required_que').val();
						filename = "query/check-demo-adaptive.php?course_id="+course_id+"&batch_id="+batch_id+"&uid="+uid;
						//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							//alert(data);
							if(data == 'success')
							{
							url="online test 3.php?chap_id="+cp_value12+"&sel_time="+sel_time+"&req_que="+req_que;
					//alert(url);
					document.location.href=url;
							}
							else
							{
							alert(data);
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
			});
		</script>
    </head>
    <body>
		<div class="container_main">
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
		<div style='width:100%;height:auto;background:#000;'>
			<table style="padding-top:0px;border:solid 0px;width:100%;height:25px;">
				<tr>
					<center><td style="border:solid 0px;">
						<label style="float:left;color:#ffffff;padding: 10px;background:#000;"><font face="verdana" size="3" color="white" >Adaptive learning</font></label>
					</td></center>
				</tr>
			</table>
			</div>
			<?php include 'test_paper_generator2.php'; ?>   
<div id="footer" >
			<center><div style="padding-top:70px;"><label style="border:solid 0px;color:white;">Copyright &copy Edutech Educational Services Pvt. Ltd. Ahmedabad, Gujarat, India</label>
			</div></center>
		</div>			
		</div>​
    </body>
</html>