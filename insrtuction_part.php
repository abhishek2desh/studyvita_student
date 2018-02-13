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
			/*$(function() {
		 
				$(this).bind("contextmenu", function(e) {
	 
					e.preventDefault();
	 
				});
		 
			});*/
		</script>
		<link rel="stylesheet" type="text/css" media="screen" href="css/jquery-ui-1.8.2.custom.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="css/ui.jqgrid.css" />
		<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
		<script src="js/grid.locale-en.js" type="text/javascript"></script>
		<script src="js/jquery.jqGrid.min.js" type="text/javascript"></script>
		
		<link rel="stylesheet" href="css/styles_images.css" type="text/css" />
		<script src="js/moment.js" type="text/javascript"></script>
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
	
		var uid='<?php echo $user_id;?>';
		var stu_course_id='<?php echo $course_id;?>';
			var stu_batch_id='<?php echo $batch_id;?>';
				var stu_sub_id='<?php echo $sub_id;?>';
		var numberOfChecked =0;
			$('#load_hide').show();
		$('#main_div').hide();
			var doc_start_time="",doc_end_time="";
		var page_source="insrtuction_part.php";
		var sub_menu_name="Scheduled Test(Objective)";
		currentdate = new Date();
		currentdocid="";
	
		var  submenu_with_menu=1;
								currentdate = moment(currentdate).format("YYYY-MM-DD HH:mm:ss");
								doc_start_time=	currentdate;
								
filename1 = "query/insert_submenu_log.php?uid="+uid+"&docid="+currentdocid+"&start_time="+doc_start_time+"&page_source="+page_source+"&submenu_with_menu="+submenu_with_menu+"&sub_menu_name="+sub_menu_name;
					//alert(filename1);					
										$.ajax({
										url: filename1,
										type: 'GET',
										dataType: 'html',
										success: function(data, textStatus, xhr) {
												
											},
										});
										
		filename = "query_jee/1_test_schedule.php?uid="+uid;
		//alert(filename);
		getContent_test(filename, "test_schedule_display");
		function getContent_test(filename, selectboxid)
		{
			$.ajax({
				url: filename,
				type: 'GET',
				dataType: 'html',
				
				success: function(data, textStatus, xhr) {
					var strtemp = "$('#" + selectboxid + "').html(data)";
					eval(strtemp);
						$('#load_hide').hide();
		$('#main_div').show();
					
				},
			});									
		}
		filename = "query_jee/1_test_schedule_1.php?uid="+uid;
		getContent(filename, "test_schedule_display1");
		function view_instruction_details(q_nm)
		{
			filename = "query_jee/view_intruction_dt.php?q_nm="+q_nm;
			//alert(filename);
			getContent(filename, "view_instruction");
		}
		$('#test_schedule_display1').click(function(){
		numberOfChecked=0;
		numberOfChecked =	$("#test_schedule_display input:checkbox:checked").length;
		numberOfChecked=Number(numberOfChecked)+Number($("#test_schedule_display1 input:checkbox:checked").length);
		if(numberOfChecked>=2)
		{
		alert("Please Select only one test...");
				$("#next_clicl_bt").hide();
				}
				else
				{
			$("#test_schedule_display1 input:checkbox").each(function() {
				if ($(this).is(":checked"))
				{
					idArray1=this.id;
				}
			});
			data_34 = idArray1;
			//alert(data_34);
			var mySplitResult = data_34.split("-");
			get_test_id1=mySplitResult[0];
			//alert(get_test_id1);
			sub_full=mySplitResult[1];
			//alert(sub_full);
			noq=mySplitResult[2];
			///alert(noq);
			t_t=mySplitResult[3];
			//alert(t_t);
			subject_id=mySplitResult[4];
			//alert(subject_id);
			chapter_id=mySplitResult[5];
			sort_name_sub=mySplitResult[6];
			//alert(sort_name_sub);
			get_test_id1_length=get_test_id1.length;
			//alert(get_test_id1_length);
			view_instruction_details(get_test_id1);
			filename = "query_jee/check_test_id2.php?test_id="+get_test_id1+"&uid="+uid;
			//alert(filename);
			$.ajax({
				url: filename,
				type: 'GET',
				dataType: 'html',
				success: function(data, textStatus, xhr) {
					//alert(data);
					data=1;
					if(data  == 1)
					{
							$("#generates_clicl_bt").show();
							$("#next_clicl_bt").hide();
							$('#next_clicl_bt').val('Start Test');
					}
					else if(data == 2)
					{
						$("#next_clicl_bt").hide();
						alert("You have already given this test OR Expired Test..");
						//$('#test_schedule_display').eq(get_test_id1).prop('disabled', false);
					}
				},
			});
			}
		});
		$('#test_schedule_display').click(function(){
		numberOfChecked=0;
		numberOfChecked =	$("#test_schedule_display input:checkbox:checked").length;
		numberOfChecked=Number(numberOfChecked)+Number($("#test_schedule_display1 input:checkbox:checked").length);
		
		//$("#next_clicl_bt").show();
		if(numberOfChecked>=2)
		{
		alert("Please Select only one test...");
				$("#next_clicl_bt").hide();
				}
				else
				{
				
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
			view_instruction_details(get_test_id1);
			if(get_test_id1_length == 0)
			{
				$("#next_clicl_bt").hide();
			}
			else if(get_test_id1_length >= 2)
			{
				alert("Please Select only one test...");
				$("#next_clicl_bt").hide();
			}
			else
			{
				filename = "query_jee/check_test_id.php?test_id="+get_test_id1+"&uid="+uid;
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
								$('#next_clicl_bt').val('Start Test');
								window.scrollBy(0, 200);
						}
						else if(data == 1)
						{
							$('#next_clicl_bt').val('Resume Test');
							$("#next_clicl_bt").show();
							window.scrollBy(0, 200);
						}
						else if(data == 2)
						{
							$("#next_clicl_bt").hide();
							alert("You have already given this test OR Expired Test..");
							//$('#test_schedule_display').eq(get_test_id1).prop('disabled', false);
						}
					},
				});
			}
			}
		});
		$("#next_clicl_bt").hide();
		$("#upload_bt").click(function(){
			var url2 = "upload_photo.php";
			window.open(url2, 'Upload Photo', 'height=200,width=260,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=no,menubar=no,location=no,directories=no,status=no');
		});
		$("#next_clicl_bt").click(function(){
		var numberOfChecked1 =	$("#test_schedule_display1 input:checkbox:checked").length;
		if(numberOfChecked1>0)
		{
		var h = screen.width;
			var w = screen.height;
			document.location.href="layout2.php?subject="+subject_id+"&test_id="+get_test_id1+"&t_t="+t_t+"&sub_full="+sub_full+"&noq="+noq;
		}
		else
		{
		
		
		$('#load_hide').show();
		$('#main_div').hide();
			var h = screen.width;
			var w = screen.height;
			//var win = window.open("layout.php?subject="+subject_id+"&test_id="+get_test_id1,"_self"); /* url = “” or “about:blank”; target=”_self” */
			/*win.close();
			var winFeature ='location=no,toolbar=no,menubar=no,scrollbars=yes,resizable=yes,navigation=no,width="1100px",height="1000px;"';
			var win2 = window.open("layout.php?subject="+subject_id+"&test_id="+get_test_id1,'null',winFeature);
			win2.focus();*/
					filename = "query_jee/insert_blueprintpaper.php?get_test_id="+get_test_id1+"&user_id="+uid+"&course_id="+stu_course_id;
					$.ajax({
			url: filename,
			type: 'GET',
			dataType: 'html',
			success: function(data, textStatus, xhr) {
			if(data=="success")
			{
			//document.location.href="http://www.coreacademics.in/flexpaper_readonly/edutech_viewer/layout.php?subject="+subject_id+"&test_id="+get_test_id1+"&course_id="+stu_course_id+"&batch_id="+stu_batch_id+"&subject_id="+stu_sub_id+"&sid="+uid;
			/*url="http://www.coreacademics.in/flexpaper_readonly/edutech_viewer/layout.php?subject="+subject_id+"&test_id="+get_test_id1+"&course_id="+stu_course_id+"&batch_id="+stu_batch_id+"&subject_id="+stu_sub_id+"&sid="+uid;

											var win = window.replace(url);
											if(win){
    //Browser has allowed it to be opened
    win.focus();
}else{
    //Broswer has blocked it
    alert('Please allow popups for this site');
}*/
			document.location.href="layout.php?subject="+subject_id+"&test_id="+get_test_id1;
			//document.location.href="layout.php?subject="+subject_id+"&test_id="+get_test_id1+"&course_id="+stu_course_id+"&batch_id="+stu_batch_id+"&subject_id="+stu_sub_id+"&sid="+uid;
			}
			else
			{
			alert("try after sometime");
			$('#load_hide').hide();
		$('#main_div').show();
			}
			},
			});
			
			/*var url = "layout.php?subject="+subject_id+"&test_id="+get_test_id1;
			var win=window.open(url, '_blank');
			win.focus();*/
			}
		});
		$("#close_window").click(function(){

											//alert(data);
											url = "virtual-class.php";
                              
                                   location.href = url;
											//window.close();
											
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
<script type="text/javascript">
  setInterval(function(){
      $('blink').each(function(){
        $(this).css('visibility' , $(this).css('visibility') === 'hidden' ? '' : 'hidden')
      });
    }, 250);
</script>
</head>
<body>
	<?php include 'body_part2.php'; ?>
</body>
</html>