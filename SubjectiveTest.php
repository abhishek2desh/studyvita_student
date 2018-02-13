<?php
	include_once 'config.php';
	session_start();
	$course_id=$_SESSION['course_id'];
	$batch_id=$_SESSION['batch_id'];
	$sub_id=$_SESSION['subject_id'];
	$user_id=$_SESSION['sid'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Online test</title>
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
		<script src="js/moment.js" type="text/javascript"></script>
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

<style> 

.defaultbutton {
border-color: #00a792;
color: #fff;
    background: #00bca4;
    line-height: 32px;
    height: 34px;
    min-width: 34px;
    
    font-size: 14px;
    font-weight: normal;
    position: relative;
    display: inline-block;
    padding: 0 12px;
    cursor: pointer;
        border-radius: 3px;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    text-align: center;
    white-space: nowrap;
    border-width: 1px;
    border-style: solid;
  
   text-transform: none;
   font-family: inherit;
   margin: 0;
   box-sizing: border-box;
       
    text-shadow: none;
        letter-spacing: normal;
    word-spacing: normal;

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
 <script type="text/javascript">
  setInterval(function(){
      $('blink').each(function(){
        $(this).css('visibility' , $(this).css('visibility') === 'hidden' ? '' : 'hidden')
      });
    }, 250);
</script>
<script> 
	$(document).ready(function(){
	
		var uid='<?php echo $user_id;?>';
		filename = "query_jee/1_test_schedule_subjective.php?uid="+uid;
		//alert(filename);
		getContent(filename, "test_schedule_display");
		var doc_start_time="",doc_end_time="";
		var page_source="SubjectiveTest.php";
		currentdate = new Date();
		currentdocid="";
		//alert("l");
		var  submenu_with_menu=0;
								currentdate = moment(currentdate).format("YYYY-MM-DD HH:mm:ss");
								doc_start_time=	currentdate;
								//alert(doc_start_time);
filename1 = "query/insert_menu_log.php?uid="+uid+"&docid="+currentdocid+"&start_time="+doc_start_time+"&page_source="+page_source+"&submenu_with_menu="+submenu_with_menu;
										//alert(filename1);
										$.ajax({
										url: filename1,
										type: 'GET',
										dataType: 'html',
										success: function(data, textStatus, xhr) {
												//alert(data);
											},
										});
		$('#load_hide').hide();
		function view_instruction_details(q_nm)
		{
			filename = "query_jee/view_intruction_dt.php?q_nm="+q_nm;
			//alert(filename);
			getContent(filename, "view_instruction");
		}
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
			//alert(get_test_id1);
			t_t = idArray2;
			subject_id = idArray3;
			if(get_test_id1=="")
			{
			}
			else
			{
			$("#next_clicl_bt").show();
			$('#next_clicl_bt').val('Start Test');
			}
			
						
			
		});
		
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
			document.location.href="layout-subjective.php?subject="+subject_id+"&test_id="+get_test_id1;
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