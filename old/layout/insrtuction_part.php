<?php
	include_once '../config.php';
	session_start();
	$user_id='3214';
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
	
		var group_id='<?php echo $group_id;?>';var uid='<?php echo $user_id;?>';
		filename = "query/1_test_schedule.php?uid="+uid;
		getContent(filename, "test_schedule_display");
		$('#test_schedule_display').click(function(){
			var idArray2 = [];
			var idArray1 = [];var idArray3 = [];var idArray4 = [];
			$("#test_schedule_display input:checkbox").each(function() {
				if ($(this).is(":checked"))
				{
					idArray1.push(this.id);
					idArray2.push(this.name);
					idArray3.push(this.value);
					
				}
			});
			get_test_id1 = idArray1;
			t_t = idArray2;
			subject_id = idArray3;
			//alert(subject_id);
			get_test_id1_length=get_test_id1.length;
			filename = "query/check_test_id.php?test_id="+get_test_id1+"&uid="+uid;
			//alert(filename);
			$.ajax({
				url: filename,
				type: 'GET',
				dataType: 'html',
				success: function(data, textStatus, xhr) {
					//alert(data);
					if(data  == 0)
					{
							$("#next_clicl_bt").show();
							$('#next_clicl_bt').val('Click To Next & Start Test');
					}
					else if(data == 1)
					{
						$('#next_clicl_bt').val('Click To Next & Resume Test');
						$("#next_clicl_bt").show();
					}
					else if(data == 2)
					{
						$("#next_clicl_bt").hide();
						alert("You have already given this test OR Expired Test..");
					}
				},
			});
		});
		$("#next_clicl_bt").hide();
		$("#upload_bt").click(function(){
			var url2 = "upload_photo.php";
			window.open(url2, 'Upload Photo', 'height=200,width=260,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=no,menubar=no,location=no,directories=no,status=no');
		});
		$("#next_clicl_bt").click(function(){
			var h = screen.width;
			var w = screen.height;
			
			//var win = window.open("layout.php?subject="+subject_id+"&test_id="+get_test_id1,"_self"); /* url = “” or “about:blank”; target=”_self” */
			/*win.close();
			var winFeature ='location=no,toolbar=no,menubar=no,scrollbars=yes,resizable=yes,navigation=no,width="1100px",height="1000px;"';
			var win2 = window.open("layout.php?subject="+subject_id+"&test_id="+get_test_id1,'null',winFeature);
			win2.focus();*/
			document.location.href="layout.php?subject="+subject_id+"&test_id="+get_test_id1;
			/*var url = "layout.php?subject="+subject_id+"&test_id="+get_test_id1;
			var win=window.open(url, '_blank');
			win.focus();*/
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
<script type="text/javascript">
$(document).ready(function(){
	$("#login_a").click(function(){
		$("#shadow").fadeIn("normal");
		 $("#login_form").fadeIn("normal");
		 $("#user_name").focus();
	});
	$("#cancel_hide").click(function(){
		$("#login_form").fadeOut("normal");
		$("#shadow").fadeOut();
   });
});
</script>
</head>
<body>
	<?php include 'body_part2.php'; ?>
</body>
</html>