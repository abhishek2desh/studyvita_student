<?php

	include("config.php");
	session_start();
	$u5 = $_SESSION['uname'];
	$s5=$_SESSION['sid'];
	$document_name = $_GET['document_name'];
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
		.hde {
			   position: absolute;
			   left:10px;
			   right:0px;
			   width: 100%;

			}
		
		</style>
	
		<script>
		
		$(document).ready(function(){
		
			var document_name='<?php echo $document_name;?>';
		var uid='<?php echo $s5;?>';
		var doc_start_time="",doc_end_time="";
		var page_source="view-ppt.php";
		var page_source_doc="view-ppt.php";
			//alert(video_id);
			var  submenu_with_menu=0;
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
											filename1 = "query/insert_menu_log_document.php?uid="+uid+"&docid="+currentdocid+"&start_time="+doc_start_time+"&page_source="+page_source_doc+"&submenu_with_menu="+submenu_with_menu;
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
			$('#cancel_hide_allot1').click(function(){
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
											
											},
										});
filename = "query/update_menu_log_document.php?uid="+uid+"&docid="+currentdocid+"&start_time="+doc_start_time+"&end_time="+doc_end_time+"&page_source="+page_source_doc+"&submenu_with_menu="+submenu_with_menu;
										
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
</head>
<body>
	
	
				
			
	<div id="ppt_hide1" style="width:100%;">
		<div class="err" id="add_err"></div>
			<form action="" style="width:100%;">
			<table style="border:px solid;width:100%;height:30px;">
					<tr>
						<td style='width:98%;background-color:#0f2541;'>
							<center><strong><label style="color:white">View Presentation</label></strong></center>
						</td>
						<td style='width:2%;'>
							<center><img src="images/close_image.png" id='cancel_hide_allot1' height="25px" width="25"></center>
						</td>
					</tr>
				</table>
				<table style="border:0px solid;width:100%;background-color:#393A3D;">
				<center><div class='hde' style='background-color:#393A3D;width:98.8%;height:100px;'></div></center>
				<div id="ppt_hide2" style="background-color:#393A3D;">
				</div>
				</table>
			</form>
		</div>
</body>
</html>