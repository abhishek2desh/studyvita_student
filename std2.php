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
		
		$_SESSION['course_id']=$course_id;
		$_SESSION['batch_id']=$batch_id;
		$_SESSION['subject_id']=$subject_id;
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
		<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
		<link href="css/bg1.css" rel="stylesheet" type="text/css" />
		<link href="css/style_images.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="js/flexpaper.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers_debug.js"> </script>
		<script type="text/javascript" src="js/flowplayer-3.2.12.min.js"></script>
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
		<script>
			$(document).ready(function(){
				$('body').scrollTop(0);
				var uri = window.location.toString();
				if (uri.indexOf("?") > 0) {
					var clean_uri = uri.substring(0, uri.indexOf("?"));
					window.history.replaceState({}, document.title, clean_uri);
				}
				$('body').scrollTop(0);
				//alert(vl);
				var path = 'http://www.globaleduserver.com/';
				var url = 'rtmp://64.187.229.174/securestreaming/C12_CBSE_CHE_Ch06_Haloalkanes_PreparationMethod_SURESH.mp4';
				alert(url);
				//var url = 'rtmp://64.187.229.174/securestreaming/'+video;
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
	<div style='background-color:#fff;width:100%'>
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
		<div style='background-color:#fff;width:100%'>
			<table  style="width:100%;height:1000px;border:solid 0px;">
				<tr>
					<td id='video_hide' valign='top' style="border:solid 0px;width:80%;"> 
						<center>
							<div class='main_div2'><a href="" style="border:solid 3px;display: block; width: 619px; height: 394px;" id="wowza"></a></div>
						</center>
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