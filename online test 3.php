<?php
	include_once 'config.php';
	session_start();
	$course_id=$_SESSION['course_id'];
	$batch_id=$_SESSION['batch_id'];
	$subject_id=$_SESSION['subject_id'];
	$user_id=$_SESSION['sid'];
	$chap_id=$_GET['chap_id'];
	$sel_time=$_GET['sel_time'];
	$req_que=$_GET['req_que'];
	$random_generate=$_GET['random_generate'];
	$_SESSION['chap_id']=$chap_id;
	$_SESSION['sel_time']=$sel_time;
	$_SESSION['req_que']=$req_que;
	$_SESSION['random_generate']=$random_generate;
	
	$result1=mysql_query("SELECT board_id,standard_id FROM batch WHERE id='$batch_id'");
	$row1=mysql_fetch_array($result1);
	$board=$row1[0];
	$std=$row1[1];
	$r_query=mysql_query("SELECT sd.group_id,sd.standard_id,sd.board_id,sd.batch_id,sd.branch_id,u.name,u.enroll_id,u.user_photo FROM student_details sd,USER u WHERE u.id=sd.user_id AND sd.user_id='$user_id'");
	$r_query_row=mysql_fetch_array($r_query);
	$group_id=$r_query_row[0];
	$enroll_id=$r_query_row[6];
	$student_name=$r_query_row[5];
	$student_photo=$r_query_row[7];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Adaptive Test</title>
<!-- jquery js-->
<script language="javascript" type="text/javascript" src="js/jquery.min.js">
		</script>
		<script type="text/javascript" language="javascript">
			$(function() {
		 
				$(this).bind("contextmenu", function(e) {
	 
					e.preventDefault();
	 
				});
		 
			});
		</script>
		<link rel="stylesheet" type="text/css" media="screen" href="css/jquery-ui-1.8.2.custom.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="css/ui.jqgrid.css" />
		<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
		<script src="js/grid.locale-en.js" type="text/javascript"></script>
		<script src="js/jquery.jqGrid.min.js" type="text/javascript"></script>
		
		<link rel="stylesheet" href="css/styles_images.css" type="text/css" />
		
		<link rel="stylesheet" type="text/css" media="screen" href="css/ui.jqgrid.css" />
		<link rel="stylesheet" type="text/css" href="css/flexpaper.css" />
		<script src="js/jquery-1.8.3.js"></script>
		<script src="js/jquery-ui.js"></script>
		<script type="text/javascript" src="js/flexpaper.js"> </script>
		<!--<script type="text/javascript" src="js/jquery.min.js"> </script>	-->
		<script type="text/javascript" src="js/flexpaper_handlers.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers_debug.js"> </script>
		
		<script language="javascript" type="text/javascript" src="js/jquery.flot.js"></script>
		<script language="javascript" type="text/javascript" src="js/jquery.flot.threshold.js"></script>
		<link href="menu.css" rel="stylesheet" type="text/css" />
		<!-- five star -->
		<script type="text/javascript" src="lib/jquery.raty.min.js"></script>
		
		<!--	Timer  -->
		<link rel="stylesheet" href="css/styles2.css" />
		<script type="text/javascript" src="js/date_time.js"></script>
		<script src="js/countdown.js"></script>
		<script src="js/moment.js"></script>
		
		<!--	Timer Finish...  -->
		<!-- jqgrid-->
		<!-- JQ Grid JS and CSS  session  	
			<link rel="stylesheet" type="text/css" media="screen" href="jq_grid/jquery-ui-1.8.2.custom.css" /> -->
			<link rel="stylesheet" type="text/css" media="screen" href="jq_grid/ui.jqgrid.css" />
		
	<!--	<script src="js/jquery-1.7.2.min.js" type="jq_grid/javascript"></script>	-->
			<script src="js/grid.locale-en.js" type="jq_grid/javascript"></script>
			<script src="js/jquery.jqGrid.min.js" type="jq_grid/javascript"></script>
<style type="text/css">
.button_css {
	-moz-box-shadow:inset 0px 1px 0px 0px #97c4fe;
	-webkit-box-shadow:inset 0px 1px 0px 0px #97c4fe;
	box-shadow:inset 0px 1px 0px 0px #97c4fe;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #3d94f6), color-stop(1, #1e62d0) );
	background:-moz-linear-gradient( center top, #3d94f6 5%, #1e62d0 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#3d94f6', endColorstr='#1e62d0');
	background-color:#3d94f6;
	-webkit-border-top-left-radius:0px;
	-moz-border-radius-topleft:0px;
	border-top-left-radius:0px;
	-webkit-border-top-right-radius:0px;
	-moz-border-radius-topright:0px;
	border-top-right-radius:0px;
	-webkit-border-bottom-right-radius:0px;
	-moz-border-radius-bottomright:0px;
	border-bottom-right-radius:0px;
	-webkit-border-bottom-left-radius:0px;
	-moz-border-radius-bottomleft:0px;
	border-bottom-left-radius:0px;
	text-indent:0;
	border:1px solid #337fed;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:12px;
	font-weight:bold;
	font-style:normal;
	height:30px;
	line-height:30px;
	width:auto;
	text-decoration:none;
	text-align:center;
}
.button_css:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #1e62d0), color-stop(1, #3d94f6) );
	background:-moz-linear-gradient( center top, #1e62d0 5%, #3d94f6 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#1e62d0', endColorstr='#3d94f6');
	background-color:#1e62d0;
}
.myButton {
	-moz-box-shadow:inset 0px 0px 0px 0px #efdcfb;
	-webkit-box-shadow:inset 0px 0px 0px 0px #efdcfb;
	box-shadow:inset 0px 0px 0px 0px #efdcfb;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #dfbdfa), color-stop(1, #bc80ea));
	background:-moz-linear-gradient(top, #dfbdfa 5%, #bc80ea 100%);
	background:-webkit-linear-gradient(top, #dfbdfa 5%, #bc80ea 100%);
	background:-o-linear-gradient(top, #dfbdfa 5%, #bc80ea 100%);
	background:-ms-linear-gradient(top, #dfbdfa 5%, #bc80ea 100%);
	background:linear-gradient(to bottom, #dfbdfa 5%, #bc80ea 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#dfbdfa', endColorstr='#bc80ea',GradientType=0);
	background-color:#dfbdfa;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border-radius:4px;
	border:1px solid #c584f3;
	width:120px;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:arial;
	font-size:11px;
	font-weight:bold;
	padding:5px 22px;
	text-decoration:none;
	text-shadow:0px -1px 2px #9752cc;
}
.myButton:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #bc80ea), color-stop(1, #dfbdfa));
	background:-moz-linear-gradient(top, #bc80ea 5%, #dfbdfa 100%);
	background:-webkit-linear-gradient(top, #bc80ea 5%, #dfbdfa 100%);
	background:-o-linear-gradient(top, #bc80ea 5%, #dfbdfa 100%);
	background:-ms-linear-gradient(top, #bc80ea 5%, #dfbdfa 100%);
	background:linear-gradient(to bottom, #bc80ea 5%, #dfbdfa 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#bc80ea', endColorstr='#dfbdfa',GradientType=0);
	background-color:#bc80ea;
}
.myButton:active {
	position:relative;
	top:1px;
}
</style>
<script type="text/javascript" language="javascript">
       function DisableBackButton() {
           window.history.forward()
       }
       DisableBackButton();
       window.onload = DisableBackButton;
       window.onpageshow = function (evt) { if (evt.persisted) DisableBackButton() }
       window.onunload = function () { void (0) }
   </script>
<script> 
	$(document).ready(function(){
		var uri = window.location.toString();
		if (uri.indexOf("?") > 0) {
			var clean_uri = uri.substring(0, uri.indexOf("?"));
			window.history.replaceState({}, document.title, clean_uri);
		}
		var group_id='<?php echo $group_id;?>';var uid='<?php echo $user_id;?>';
		$("#upload_bt").click(function(){
			var url2 = "upload_photo.php";
			window.open(url2, 'Upload Photo', 'height=200,width=260,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=no,menubar=no,location=no,directories=no,status=no');
		});
		$("#next_clicl_bt").click(function(){
			var h = screen.width;
			var w = screen.height;
			document.location.href="online test 5.php";
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
	<?php include 'online_test4.php'; ?>
</body>
</html>