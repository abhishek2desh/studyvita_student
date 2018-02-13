<?php
	include_once 'config.php';
	session_start();
	$course_id=$_SESSION['course_id'];
	$batch_id=$_SESSION['batch_id'];
	$sub_id=$_SESSION['subject_id'];
	$sub=$_GET['subject'];
	$test_id=$_GET['test_id'];
	$user_id=$_SESSION['sid'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1; NO-CACHE;" />
<title>Edutech india online test</title>
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
		
		<!--  Above Disabled to Right Click...  -->
			
		
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
		<link rel="stylesheet" href="layout/css/styles2_new.css" />
		<script type="text/javascript" src="js/date_time.js"></script>
		<script src="js/countdown.js"></script>
		<script src="js/moment.js"></script>
		<link rel="stylesheet" type="text/css" media="screen" href="jq_grid/ui.jqgrid.css" />
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
			width:100px;
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
<script> 
	$(document).ready(function(){
		var group_id='<?php echo $group_id;?>';var uid='<?php echo $user_id;?>';
		var uniq_id_get=0,marks_for_review="",marks_for_atm="",select_ans_wise="";
		var old_check_name="",check_name="",sub_id="",sub_test_id="";
		var sb='<?php echo $sub; ?>';
		var test_id='<?php echo $test_id; ?>';
		var batch_id='<?php echo $batch_id;?>';
		var sb_select="",sb_sort="",sb_val="",sb_full="";
		var sb_select_name="";
		var ck_phy=0,ck_che=0,ck_mat=0,ck_bio=0,ck_sce=0;
		//for getting questionpaper
		filename = "query_jee/get_subjetive_paper.php?test_id_new="+test_id;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							//alert(data);
							if(data=="failed")
							{
							alert("Try after sometime");
							}
							else
							{
							callFlexPaperDocViewer(data);
							
							}
							
						},
					});
		// filename = "query_jee/get_subjetive_paper?s2="+s2+"&user_id="+uid+"&test_id_new="+test_id;
		//callFlexPaperDocViewer(uniq_id_get_qus);
		//end getting
		
		
		filename = "query_jee/5_min_val_get_subjective.php?get_test_id="+test_id+"&user_id="+uid;
		//alert(filename);
		$.ajax({
			url: filename,
			type: 'GET',
			dataType: 'html',
			success: function(data, textStatus, xhr) {
				mixing=data;
				
				t_t=mixing;
				//alert(mixing);
				var date_time2="";
				var select_test_wise="online_test";
				var da = new Date();
				var today2 = moment(da);
				datetime = today2.format("D MMMM YYYY HH:mm:ss");
				var da1 = new Date();
				var today22 = moment(da1);
				var s = today22.format("YYYY-MM-DD  HH:mm:ss");
			
						t_t1=parseInt(t_t);
						//alert(t_t1);
						var d1 = new Date (),
						d2 = new Date ( d1 );
						d2.setMinutes(d1.getMinutes() + t_t1);
						
						timer_set();
					
						$("#timer_hide").show();$("#timer_hide1").show();
						
						
						
						var today = moment(d2);
						var date_time = today.format("D MMMM YYYY HH:mm:ss");
						//alert(date_time);
						var setTime = date_time;
						$("#countdown1").countdown({
						date: setTime,
						format: "on"
						},
						function() {
							 var da2 = new Date();
							 var today222 = moment(da2);
							 var s2 = today222.format("YYYY-MM-DD  HH:mm:ss");
							 var today2=moment(d2);
							 date_time2 = today2.format("D MMMM YYYY HH:mm:ss");
							 //alert(date_time2);
							 alert("Your Time is Over.. Thanks.");
							document.location.href="student_course_page.php";
						});
					
			},
		});
		function timer_set()
		{
			setInterval(function() 
			{
				 var da2 = new Date();
				 var today222 = moment(da2);
				 var s2 = today222.format("YYYY-MM-DD  HH:mm:ss");
				
			}, 1000);
		}
		
		
		function getContent2(filename, selectboxid)
		{
			$.ajax({
				url: filename,
				type: 'GET',
				dataType: 'html',
				
				success: function(data, textStatus, xhr) {
					var strtemp = "$('#" + selectboxid + "').html(data)";
					eval(strtemp);
					//alert(data);
					ok_button_click_view();							
				},
			});
		}
		function getContent3(filename, selectboxid)
		{
			$.ajax({
				url: filename,
				type: 'GET',
				dataType: 'html',
				
				success: function(data, textStatus, xhr) {
					var strtemp = "$('#" + selectboxid + "').html(data)";
					eval(strtemp);
					//alert(data);
					ok_button_click_view2();							
				},
			});
		}
		
		
		function getInsert(filename)
		{
			$.ajax({
				url: filename,
				type: 'GET',
				dataType: 'html',
				
				success: function(data, textStatus, xhr) {
					//alert(data);
				},
			});
		}
	
	});
</script>
<script type="text/javascript" language="javascript">
       function DisableBackButton() {
           window.history.forward()
       }
       DisableBackButton();
       window.onload = DisableBackButton;
       window.onpageshow = function (evt) { if (evt.persisted) DisableBackButton() }
       window.onunload = function () { void (0) }
   </script>
</head>
<body>
	<?php include 'viewer/viewer_subjective.php'; ?>
</body>
</html>