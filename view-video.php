<?php

	include("config.php");
	session_start();
	$u5 = $_SESSION['uname'];
	$s5=$_SESSION['sid'];
	$video_id = $_GET['id'];
	$today = date("Y-m-d", strtotime('today'));
	$today2 = date("l, d F, Y", strtotime('today'));
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Welcome  <?php echo $u5; ?></title>
			<link rel="shortcut icon" href="images/Edutechheader.ico" />
			<link rel="stylesheet" type="text/css" href="css/flexpaper.css" />
		<script type="text/javascript" src="js/flexpaper.js"> </script> 
<!--	<script type="text/javascript" src="js/jquery.min.js"> </script>	-->
		<script type="text/javascript" src="js/flexpaper_handlers.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers_debug.js"> </script>
			<script type="text/javascript" src="js/jquery-1.7.min.js"></script>
				<!--<script type="text/javascript" src="js/flowplayer-3.2.12.min.js"></script>-->
				<script type="text/javascript" src="js/flowplayer-3.2.13.min.js"></script>
		
		<link rel="stylesheet" href="css/jquery-ui.css" />
		<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
		<script src="js/jquery-ui.js"></script>
		
		<!-- SWF Tools -->	
		
		<!-- JQ Grid JS and CSS  session -->	
		<link rel="stylesheet" type="text/css" media="screen" href="css/jquery-ui-1.8.2.custom.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="css/ui.jqgrid.css" />
		<script src="js/grid.locale-en.js" type="text/javascript"></script>
		<script src="js/jquery.jqGrid.min.js" type="text/javascript"></script>
		<link rel="stylesheet" href="css/jquery-ui.css" />
		<!-- chart links and js  -->		
		
		<script type="text/javascript" src="easyui/jquery.easyui.min.js"></script>
	<script src="js/moment.js"></script>
		<link href="menu.css" rel="stylesheet" type="text/css" />
		
	<style type="text/css">
		
        </style>
		
		
		<style type="text/css">
		
		
		</style>
	
		<script>
		
		$(document).ready(function(){
		
			var video_id='<?php echo $video_id;?>';
		var u_id='<?php echo $s5;?>';
		var doc_start_time="",doc_end_time="";
		var page_source="view-video.php";
		var page_source_doc="virtual-class-n.php";
		var  submenu_with_menu=0;
			//alert(video_id);
		filename = "query/get_video_name.php?video_id="+video_id;
						//alert(filename);
							$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							
							success: function(data, textStatus, xhr) {
								
									var video=data;
									
								$("#wowza").show();
								$('.myLink_33').attr('href','http://www.coreacademics.in/MediaContent/'+video);
						flowplayer("wowza", "flowplayer-3.2.18.swf");
				/*var path = 'http://www.globaleduserver.com/';
				//var url = 'rtmp://64.187.229.174/securestreaming/C12_CBSE_CHE_Ch06_Haloalkanes_PreparationMethod_SURESH.mp4';
				var url = 'rtmp://64.187.229.174/securestreaming/'+video;
				//var url = 'rtmp://64.187.229.174/securestreaming/LVV_ Equipotential surface_01_305_1_4_2013_10_29_10.mp4';
				//alert(url);
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
				});*/
								
							},
						});
					//alert(video+video_id);
				//for log detail
					 currentdate = new Date();
								currentdate = moment(currentdate).format("YYYY-MM-DD HH:mm:ss");
								doc_start_time=	currentdate;	
filename1 = "query/insert_video_log.php?uid="+u_id+"&docid="+video_id+"&start_time="+doc_start_time+"&page_source="+page_source;
										//alert(filename);
										$.ajax({
										url: filename1,
										type: 'GET',
										dataType: 'html',
										success: function(data, textStatus, xhr) {
												//alert(data);
											},
										});	
filename1 = "query/insert_menu_log_video.php?uid="+u_id+"&docid="+video_id+"&start_time="+doc_start_time+"&page_source="+page_source_doc+"&submenu_with_menu="+submenu_with_menu;
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
			$('#close_video').click(function(){
			currentdate = new Date();
								currentdate = moment(currentdate).format("YYYY-MM-DD HH:mm:ss");
								doc_end_time=	currentdate;	
filename = "query/update_video_log.php?uid="+u_id+"&docid="+video_id+"&start_time="+doc_start_time+"&end_time="+doc_end_time+"&page_source="+page_source;
										//alert(filename);
										$.ajax({
										url: filename,
										type: 'GET',
										dataType: 'html',
										success: function(data, textStatus, xhr) {
											//alert(data);
											
											},
										});		
									filename = "query/update_menu_log_video.php?uid="+u_id+"&docid="+video_id+"&start_time="+doc_start_time+"&end_time="+doc_end_time+"&page_source="+page_source_doc+"&submenu_with_menu="+submenu_with_menu;
										
										$.ajax({
										url: filename,
										type: 'GET',
										dataType: 'html',
										success: function(data, textStatus, xhr) {
											//alert(data);
											window.close();
											},
										});	
								//end log detail
			
			});
			
			
			
		});
	</script>
</head>
<body>
	
	
				
			
	<center><table style="width:620px;">
		<tr><td  style="width:100%;" valign="top">
			<center>
			<div name="divB" style="overflow:hidden;">
				<!--<a href="" style="border:solid 3px;display: block; width: 619px; height: 394px;" id="wowza" ></a>-->
				<a href="" style="border:solid 3px;display: block; width: 619px; height: 394px;" id="wowza" class="myLink_33" onMouseOver="window.status=''" onMouseOut="window.status=''"></a>
				</div>			
			</center>
				
			</td>
			<td valign="top" style="width:25px;">
			<img  id="close_video" src="images/close_image2.png" style="height:25px;width:25px;" />
			</td>
		</tr>
	</table></center>
</body>
</html>