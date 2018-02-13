<?php

	include_once 'config.php';
	session_start();
	include('lock.php');
	$today = date("Y-m-d", strtotime('today'));
	$today2 = date("l, d F, Y", strtotime('today'));
	$_SESSION['today_dt_session'] = $today;
	$user=$_SESSION['username'];
	$s1=$_SESSION['studid1'];
	$s2=$_SESSION['stnd1'];
	$s3=$_SESSION['grp1'];	
	$s4=$_SESSION['btch1'];
	$s5=$_SESSION['sid'];
	$u5 = $_SESSION['uname'];
	$board1 = $_SESSION['board'];
	$branch = $_SESSION['branch'];
	
?>
<!doctype html>
<html>
	<head>
		
		<title>Welcome <?php echo $u5 ?></title>
		
		<SCRIPT type="text/javascript">
		</SCRIPT>
		<link rel="shortcut icon" href="http://targetstudy.com/files/img/17/6957/L_17974.gif" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<style>
			label.custom-select {
				position: relative;
				display: inline-block;

			}
			.custom-select select {
				display: inline-block;
				padding: 4px 3px 3px 5px;
				margin: 0;
				font: inherit;
				outline:none; /* remove focus ring from Webkit */
				line-height: 1.2;
				background: #CCC;
				color:RED;
				border:0;
			}
			/* Select arrow styling */
			.custom-select:after {
				position: absolute;
				top: 0;
				right: 0;
				bottom: 0;
				font-size: 70%;
				line-height: 30px;
				padding: 0 7px;
				background: #000;
				color: red;
			}
			.no-pointer-events .custom-select:after {
				content: none;
			}
		</style>
		<style type="text/css" media="screen">
	
			html, body	{ height:100%; }
			body { margin:0; padding-left: .5em; overflow:auto; }
			#flashContent { display:none; }
			#sortable1, #sortable2 { list-style-type: none; margin: 0; padding: 0 0 2.5em; float: left; margin-right: 15px; }
			#sortable1 li, #sortable2 li { margin: 0 5px 5px 5px; padding: 5px; font-size: 1.2em; width: 200px; }
			#feedback { font-size: 1.4em; }
			#chap1, #chap2 { list-style-type: none; margin: 0; padding: 0; float: left; margin-right: 10px; background: #CEC8C8; padding: 5px; width: 235px;}
			#chap1 li, #chap2 li { margin: 5px; padding: 5px; font-size: 0.8em; text-align:left;  }
			#top1, #top2, #top3 { list-style-type: none; margin: 0; padding: 0; float: left; margin-right: 10px; background: #CEC8C8; padding: 5px; width: 235px;}
			#top1 li, #top2 li, #top3 li { margin: 5px; padding: 5px; font-size: 0.8em;  }
			#top1 li, #top2 li, #top3 li { background:#ddd; cursor:pointer; text-decoration:underline; text-align:left; }
			
		</style>
		
		<style name="xyz">
			
			.button_css{
		border-color:#8E6AF5;border-width: 1px 1px 1px 15px;border-style: solid; -webkit-border-radius: 3px; -moz-border-radius: 3px;border-radius: 3px;font-size:13px;font-family:arial, helvetica, sans-serif; padding: 3px 3px 3px 3px; text-decoration:none; display:inline-block;text-shadow: -1px -1px 0 rgba(0,0,0,0.3);font-weight:bold; color: #FFFFFF;
		 background-color: #3093c7; background-image: -webkit-gradient(linear, left top, left bottom, from(#3093c7), to(#1c5a85));
		 background-image: -webkit-linear-gradient(top, #3093c7, #1c5a85);
		 background-image: -moz-linear-gradient(top, #3093c7, #1c5a85);
		 background-image: -ms-linear-gradient(top, #3093c7, #1c5a85);
		 background-image: -o-linear-gradient(top, #3093c7, #1c5a85);
		 background-image: linear-gradient(to bottom, #3093c7, #1c5a85);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#3093c7, endColorstr=#1c5a85);
		}

		.button_css:hover{
		 border-top-color: #8E6AF5;border-right-color: #8E6AF5;border-bottom-color: #8E6AF5;border-left-color: #8E6AF5;border-width: 1px 15px 1px 1px;border-style: solid;
		 background-color: #26759e; background-image: -webkit-gradient(linear, left top, left bottom, from(#26759e), to(#133d5b));
		 background-image: -webkit-linear-gradient(top, #26759e, #133d5b);
		 background-image: -moz-linear-gradient(top, #26759e, #133d5b);
		 background-image: -ms-linear-gradient(top, #26759e, #133d5b);
		 background-image: -o-linear-gradient(top, #26759e, #133d5b);
		 background-image: linear-gradient(to bottom, #26759e, #133d5b);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#26759e, endColorstr=#133d5b);
		}
			
			table{
				width:200px;
				margin:0 auto;
				background-color:#eee;
				text-align:center;
				cursor:pointer;
			}
			th{
				background-color:#333;
				color:#FFF;
			}
			div#lyrics{
				width:300px;
				height:20px;
				background-color:#7C8698;
				position:absolute;
				left:30px;
				padding:8px;
				
			}
			#colorstrip{
			width: 100%; height: 22px;
			border-style: solid;
			border-color: white;
			background-color: #FFAA44;
			line-height: 20px;
			vertical-align: center;
			text-align:center;
			padding-top:5px;
		}
		</style>
		<style type="text/css">
		.classname {
			-moz-box-shadow:inset 0px 0px 0px 0px #ffffff;
			-webkit-box-shadow:inset 0px 0px 0px 0px #ffffff;
			box-shadow:inset 0px 0px 0px 0px #ffffff;
			background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #ededed), color-stop(1, #dfdfdf) );
			background:-moz-linear-gradient( center top, #ededed 5%, #dfdfdf 100% );
			filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ededed', endColorstr='#dfdfdf');
			background-color:#ededed;
			-moz-border-radius:24px;
			-webkit-border-radius:24px;
			border-radius:24px;
			border:3px solid #dcdcdc;
			display:inline-block;
			color:#777777;
			font-family:arial;
			font-size:13px;
			font-weight:bold;
			padding:3px 10px;
			text-decoration:none;
			text-shadow:1px 1px 0px #ffffff;
		}.classname:hover {
			background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #dfdfdf), color-stop(1, #ededed) );
			background:-moz-linear-gradient( center top, #dfdfdf 5%, #ededed 100% );
			filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#dfdfdf', endColorstr='#ededed');
			background-color:#dfdfdf;
		}.classname:active {
			position:relative;
			top:1px;
		}
		/* This imageless css button was generated by CSSButtonGenerator.com */
		
		.text_css {
			background: url('images/icon_datepicker.png') no-repeat scroll right center #FFFFFF;
			background-color:silver;
			border: 1px solid #DDD;
			border-radius: 5px;
			box-shadow: 0 0 5px #888;
			color: purple;
			float: left;
			padding: 5px 27px 5px 10px;
			width: 75px;
			outline: none;
		}
		</style>
		<!--  It is Disabled to Right Click...  -->
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
			
		<link rel="stylesheet" href="css/bg.css" />  
		<link rel="stylesheet" href="css/jquery-ui.css" />
		<link rel="stylesheet" href="css/demo.css" />
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
		
		<!-- five star -->
		<script type="text/javascript" src="lib/jquery.raty.min.js"></script>
		
		<!--	Timer  -->
		<link rel="stylesheet" href="css/styles2.css" />
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
		
		
	<!-- Date and Time	-->
		<script type="text/javascript" src="js/date_time.js"></script>
		
		
		<script> 
		$(document).ready(function(){
		
		var first_paper = "Paper2";
		
		var groupid = "";
		var nm = "";
		var sl = "";
		var sub_id = "";
		var tl = "";
		
		var batch_assign = "";
		var personal_assign = "";
		var other_school = "";
		var previous_objective = "";
		var previous_subjective = "";
		var notes_id = "";
		var ck_omr = "";
		var ck_mat_type = "";
		var cntr = 0;
		var t_t = "";
		var tab = "";
		var filename = "";
		var online_id = "";
		var online_id1 = "";
		var mat1 = "";
		var dur1 = "";
		var mat_id1 = "";
		var online_start_time  = "";
		var online_end_time = "";
		var mat_id2 = "";
		var final_submission = 0;
		var datepickerVal3='<?php echo $today ?>',datepickerVal4='<?php echo $today ?>';
		var ok_bt_call="cancel";
		var bt_id=<?php echo $s4; ?>;
		var u_id=<?php echo $s5; ?>;
		var br_id=<?php echo $branch; ?>;
		var sb=0,cp1=0,dc1=0;
		var tab=1001;
		var std='<?php echo $s2; ?>';
		var board='<?php echo $board1; ?>';
		var batch_id='<?php echo $s4; ?>';
		var ok_bt_call="cancel";
		
		$( "#datepicker3" ).datepicker({
			dateFormat: "yy-mm-dd",
			altField: "#alternate",
			altFormat: "DD, d MM, yy",
			onSelect: function() {
				datepickerVal3 = $("#datepicker3").val();
			}
		});
		$( "#datepicker4" ).datepicker({
			dateFormat: "yy-mm-dd",
			altField: "#alternate",
			altFormat: "DD, d MM, yy",
			onSelect: function() {
				datepickerVal4 = $("#datepicker4").val();
			}
		});
		$("#Show_OMR_Div").hide();
		$("#OMR_View_Result").hide();
		$(".sub_tr1").hide();
		$(".sub_tr2").hide();
		$(".sub_tr3").hide();
		
		$("#loadingDiv").hide();
		
		$("#OMR_online_View_Result").hide();
		$("#OMR_online_answer_submit").hide();
		
		$("#online_main_page_td").hide();
				
			LoadBatchAssignmentsByDefault();
			function LoadBatchAssignmentsByDefault()
			{	
				tab = 1001;
				filename = "query/query.php?dt=1&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1;
				getContent(filename,"s1");
				//alert(filename);
				filename = "query/query2.php?dt=1&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1;
				getContent(filename, "s3");
				//alert("ksjdfd"+filename);
				filename = "query/query3.php?dt=1&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1;
				getContent(filename, "s5");
				filename = "query/query4.php?dt=1&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1;
				getContent(filename, "s7");
				filename = "query/query5.php?dt=1&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1;
				getContent(filename, "s9");
				filename = "query/query6.php?dt=1&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1;
				getContent(filename, "s11");
				filename = "query/query8.php?dt=1&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1;
				getContent(filename, "s12");
				filename = "query/query7.php?dt=1&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1;
				getContent(filename, "s13");
				filename = "query/query9.php?dt=a";
				getContent(filename,"s14");
			}
			function LoadBatchPersonalByDefault()
			{	
				tab = 1002;
				filename = "query/query.php?dt2=2&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1;
				getContent(filename,"p1");
				//alert(filename);
				filename = "query/query2.php?dt2=2&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1;
				getContent(filename, "p3");
				filename = "query/query3.php?dt2=2&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1;
				getContent(filename, "p5");
				filename = "query/query4.php?dt2=2&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1;
				getContent(filename, "p7");
				filename = "query/query5.php?dt2=2&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1;
				getContent(filename, "p9");
				filename = "query/query6.php?dt2=2&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1;
				getContent(filename, "p11");
				filename = "query/query8.php?dt=2&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1;
				getContent(filename, "s12");
				filename = "query/query7.php?dt2=2&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1;
				getContent(filename, "p13");
				filename = "query/query9.php?dt=a";
				getContent(filename,"p14");
			}
			function LoadobjectiveByDefault()
			{	
				tab = 1004;
				filename = "query/query.php?dt3=25&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1;
				getContent(filename,"o1");
				//alert(filename);
				filename = "query/query2.php?dt3=25&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1;
				//alert(filename);
				getContent(filename, "o3");
				filename = "query/query3.php?dt3=25&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "o5");
				filename = "query/query4.php?dt3=25&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "o7");
				filename = "query/query5.php?dt3=25&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "o9");
				filename = "query/query6.php?dt3=25&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "o11");
				filename = "query/query8.php?dt3=25&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "s12");
				filename = "query/query7.php?dt3=25&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "o13");
				filename = "query/query9.php?dt=a";
				getContent(filename,"o14");
			}
			function LoadsubjectiveByDefault()
			{	
				tab = 1005;
				filename = "query/query.php?dt5=26&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				//alert(filename);
				getContent(filename,"tp1");
				filename = "query/query2.php?dt5=26&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "tp3");
				filename = "query/query3.php?dt5=26&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "tp5");
				filename = "query/query4.php?dt5=26&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "tp7");
				filename = "query/query5.php?dt5=26&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "tp9");
				filename = "query/query6.php?dt5=26&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "tp11");
				filename = "query/query8.php?dt5=26&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "s12");
				filename = "query/query7.php?dt5=26&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "tp13");
				filename = "query/query10.php?dt=a";
				getContent(filename,"tp14");
			}
			function LoadnoteByDefault()
			{
				tab = 1006;
				filename = "query/query.php?dt6=8&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename,"nt1");
				filename = "query/query2.php?dt6=8&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "nt3");
				filename = "query/query3.php?dt6=8&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "nt5");
				filename = "query/query4.php?dt6=8&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "nt7");
				filename = "query/query5.php?dt6=8&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "nt9");
				filename = "query/query6.php?dt6=8&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "nt11");
				filename = "query/query8.php?dt6=8&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "nt12");
				filename = "query/query7.php?dt6=8&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "nt13");
				filename = "query/query9.php?dt=a";
				getContent(filename,"nt14");
			}
			function show_sdf_tools_plan()
			{
				$("#doc34").show();
				$("#plan").show();
			}
			
			getgroupsubjects(<?php echo $s3; ?>);
			
			function hide_div_sub_tr()
			{
				$("#Show_OMR_Div").hide();
				$("#OMR_View_Result").hide();
				$(".sub_tr1").hide();
				$(".sub_tr2").hide();
				$(".sub_tr3").hide();
				$("#re_test_score").hide();
				
				$("#loadingDiv").hide();
				
				$("#OMR_online_View_Result").hide();
				$("#OMR_online_answer_submit").hide();
				
				$("#online_main_page_td").hide();
			}
		
			function getgroupsubjects(groupid)
			{
				if(groupid === 9)
				{					
					$("#dp1,#do1,#dt1,#dtp1,#ntt1,#ds1").hide();
					$("#dp9,#do9,#dt9,#dtp9,#ntt9,#ds9").hide();
					$("#dp11,#do11,#dt11,#dtp11,#ntt11,#ds11").hide();
					$("#dp12,#do12,#dt12,#dtp12,#ntt12,#ds12").hide();
					
				}
				else if(groupid === 10)
				{
					$("#dp3,#do3,#dt3,#dtp3,#ntt3,#ds3").hide();
					$("#dp9,#do9,#dt9,#dtp9,#ntt9,#ds9").hide();
					$("#dp11,#do11,#dt11,#dtp11,#ntt11,#ds11").hide();
					$("#dp12,#do12,#dt12,#dtp12,#ntt12,#ds12").hide();
				}
				else if(groupid === 11)
				{								
					$("#dp9,#do9,#dt9,#dtp9,#ntt9,#ds9,#dds9").hide();
					$("#dp11,#do11,#dt11,#dtp11,#ntt11,#ds11,#dds11").hide();
					$("#dp12,#do12,#dt12,#dtp12,#ntt12,#ds12").hide();
				}
				else if(groupid === 12)
				{								
					$("#dp1,#do1,#dt1,#dtp1,#ntt1,#ds1").hide();
					$("#dp5,#do5,#dt5,#dtp5,#ntt5,#ds5").hide();
					$("#dp7,#do7,#dt7,#dtp7,#ntt7,#ds7").hide();
					$("#dp12,#do12,#dt12,#dtp12,#ntt12,#ds12").hide();
					$("#dp11,#do11,#dt11,#dtp11,#ntt11,#ds11").hide();
					
				}
				else if(groupid === 13)
				{								
					$("#dp1,#do1,#dt1,#dtp1,#ntt1,#ds1").hide();
					$("#dp3,#do3,#dt3,#dtp3,#ntt3,#ds3").hide();
					$("#dp5,#do5,#dt5,#dtp5,#ntt5,#ds5").hide();
					$("#dp7,#do7,#dt7,#dtp7,#ntt7,#ds7").hide();
					$("#dp9,#do9,#dt9,#dtp9,#ntt9,#ds9,#dds9").hide();
				}
				else if(groupid === 21)
				{								
					$("#dp1,#do1,#dt1,#dtp1,#ntt1,#ds1").hide();
					$("#dp5,#do5,#dt5,#dtp5,#ntt5,#ds5").hide();
					$("#dp7,#do7,#dt7,#dtp7,#ntt7,#ds7").hide();
				}
			}
			
			function print_manager(material_name)
			{
				//mat_path="";
				//D:\1234\Dropbox\paresh\Sunilprinttrial
				filename1 = "print_manager/1_insert_print.php?uid="+u_id+"&mat_name="+material_name+"&datepickerVal3="+datepickerVal3;
				//alert("query Run : "+filename1);
				$.ajax({
					url: filename1,
					type: 'GET',
					dataType: 'html',
					success: function(data, textStatus, xhr) {
						alert(data);
					}
				});
			}
			$("#print_bt").click(function(){
					print_manager(nm);
			});
			
			<!--	Biology		-->	
			$("#p1,#o1,#s1").change(function(){
				
				hide_div_sub_tr();
		//		$("#p13,#o13,#t13,#tp13,#s13,#nt13").val([ ]);
				$("#p3,#o3,#s3").val([ ]);
				$("#p5,#o5,#s5").val([ ]);
				$("#p7,#o7,#s7").val([ ]);
				$("#p9,#o9,#s9").val([ ]);
				$("#p11,#o11,#s11").val([ ]);
				$("#p12,#o12,#s12").val([ ]);
				nm = $(this).val();	
		//		alert(nm);
				sl = ($("option:selected", this).text());
		//		alert(sl);	
		
				filename = "query/check_mat_type.php?mat_id="+nm;
		//		alert(filename);
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					success: function(data, textStatus, xhr) {
						ck_mat_type = data;
						//alert("in ajax..."+ck_mat_type);
					}
				});
				callFlexPaperDocViewer(sl);
				$("#Show_OMR_Div").hide();
				$("#OMR_result").hide();
				
				alert("Processing please wait...");
				
				if(cntr == 0)
				{
					alert(sl);
					cntr++;
				}
				else
				{
					cntr = cntr;
				}
		//		alert(ck_mat_type);
				if(ck_mat_type == 30)
				{
		//			alert("in 30 subjective..");
					subjective_sol(nm);
				}
				else if(ck_mat_type == 31)
				{
					filename = "query/check_omr_response_table.php?material_id="+nm;
				//	alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						success: function(data, textStatus, xhr) {
							ck_omr = data;							
						}
					});
					
					$("#p14,#o14,#s14").empty();				
					setTimeout(function(){
						Check_OMR_sheet_And_response(nm,tab,sl);
					}, 6000);
				}
				else
				{
					//alert("Please Select next time");
				}
				//filename = "query/query9.php?dt="+nm;
				//alert(filename);
				//getContent(filename,"o14");
			});
			  
		<!--	Math	-->	
			$("#p3,#o3,#s3").change(function(){
			
				hide_div_sub_tr();
				$("#p1,#o1,#s1").val([ ]);
		//		$("#p13,#o13,#t13,#tp13,#s13,#nt13").val([ ]);
				$("#p5,#o5,#s5").val([ ]);
				$("#p7,#o7,#s7").val([ ]);
				$("#p9,#o9,#s9").val([ ]);
				$("#p11,#o11,#s11").val([ ]);
				$("#p12,#o12,#s12").val([ ]);
				nm = $(this).val();	
		//		alert(nm);
				sl = ($("option:selected", this).text());
		//		alert(sl);
				
		
				filename = "query/check_mat_type.php?mat_id="+nm;
		//		alert(filename);
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					success: function(data, textStatus, xhr) {
						ck_mat_type = data;
						//alert("in ajax..."+ck_mat_type);
					}
				});
				callFlexPaperDocViewer(sl);
				$("#Show_OMR_Div").hide();
				$("#OMR_result").hide();
				
				alert("Processing please wait...");
				if(cntr == 0)
				{
					alert(sl);
					cntr++;
				}
				else
				{
					cntr = cntr;
				}
		//		alert(ck_mat_type);
				if(ck_mat_type == 30)
				{
		//			alert("in 30 subjective..");
					subjective_sol(nm);
				}
				else if(ck_mat_type == 31)
				{
					filename = "query/check_omr_response_table.php?material_id="+nm;
				//	alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						success: function(data, textStatus, xhr) {
							ck_omr = data;							
						}
					});
					
					$("#p14,#o14,#s14").empty();				
					setTimeout(function(){
						Check_OMR_sheet_And_response(nm,tab,sl);
					}, 6000);
				}
				else
				{
					//alert("Please Select next time");
				}
				//filename = "query/query9.php?dt="+nm;
				//alert(filename);
				//getContent(filename,"o14");
			});			  
		<!--	Physics	-->	
		  $("#p5,#o5,#s5").change(function(){
			
				hide_div_sub_tr();
				$("#p1,#o1,#s1").val([ ]);
				$("#p3,#o3,#s3").val([ ]);
		//		$("#p13,#o13,#t13,#tp13,#s13,#nt13").val([ ]);
				$("#p7,#o7,#s7").val([ ]);
				$("#p9,#o9,#s9").val([ ]);
				$("#p11,#o11,#s11").val([ ]);
				$("#p12,#o12,#s12").val([ ]);
								
				nm = $(this).val();	
		//		alert(nm);
				sl = ($("option:selected", this).text());
		//		alert(sl);
				
				filename = "query/check_mat_type.php?mat_id="+nm;
				
		//		alert(filename);
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					success: function(data, textStatus, xhr) {
						ck_mat_type = data;
						//alert("in ajax..."+ck_mat_type);
					}
				});
				callFlexPaperDocViewer(sl);
				$("#Show_OMR_Div").hide();
				$("#OMR_result").hide();
				
				alert("Processing please wait...");
				if(cntr == 0)
				{
					alert(sl);
					cntr++;
				}
				else
				{
					cntr = cntr;
				}
			//	alert("--"+ck_mat_type);
				if(ck_mat_type == 30)
				{
		//			alert("in 30 subjective..");
					subjective_sol(nm);
				}
				else if(ck_mat_type == 31)
				{
					filename = "query/check_omr_response_table.php?material_id="+nm;
				//	alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						success: function(data, textStatus, xhr) {
							ck_omr = data;							
						}
					});
					
					$("#p14,#o14,#s14").empty();				
					setTimeout(function(){
						
						Check_OMR_sheet_And_response(nm,tab,sl);
					}, 6000);
				}
				else
				{
					//alert("Please Select next time");
				}			
				
			});
			  
		<!--	Chemistry	-->	
			$("#p7,#o7,#s7").change(function(){
			
				hide_div_sub_tr();
				$("#p1,#o1,#s1").val([ ]);
				$("#p3,#o3,#s3").val([ ]);
				$("#p5,#o5,#s5").val([ ]);
		//		$("#p13,#o13,#t13,#tp13,#s13,#nt13").val([ ]);
				$("#p9,#o9,#s9").val([ ]);
				$("#p11,#o11,#s11").val([ ]);
				$("#p12,#o12,#s12").val([ ]);
				nm = $(this).val();	
		//		alert(nm);
				sl = ($("option:selected", this).text());
		//		alert(sl);
				
		
				filename = "query/check_mat_type.php?mat_id="+nm;
		//		alert(filename);
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					success: function(data, textStatus, xhr) {
						ck_mat_type = data;
						//alert("in ajax..."+ck_mat_type);
					}
				});
				callFlexPaperDocViewer(sl);
				$("#Show_OMR_Div").hide();
				$("#OMR_result").hide();
				alert("Processing please wait...");
				if(cntr == 0)
				{
					alert(sl);
					cntr++;
				}
				else
				{
					cntr = cntr;
				}
		//		alert(ck_mat_type);
				if(ck_mat_type == 30)
				{
		//			alert("in 30 subjective..");
					subjective_sol(nm);
				}
				else if(ck_mat_type == 31)
				{
					filename = "query/check_omr_response_table.php?material_id="+nm;
				//	alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						success: function(data, textStatus, xhr) {
							ck_omr = data;							
						}
					});
					
					$("#p14,#o14,#s14").empty();				
					setTimeout(function(){
						Check_OMR_sheet_And_response(nm,tab,sl);
					}, 6000);
				}
				else
				{
					//alert("Please Select next time");
				}
				//filename = "query/query9.php?dt="+nm;
				//alert(filename);
				//getContent(filename,"o14");
			});
			  
		<!--	Science	-->	
			$("#p9,#o9,#s9").change(function(){
			
				hide_div_sub_tr();
				$("#p1,#o1,#s1").val([ ]);
				$("#p3,#o3,#s3").val([ ]);
				$("#p5,#o5,#s5").val([ ]);
				$("#p7,#o7,#s7").val([ ]);
		//		$("#p13,#o13,#t13,#tp13,#s13,#nt13").val([ ]);
				$("#p11,#o11,#s11").val([ ]);
				$("#p12,#o12,#s12").val([ ]);
				nm = $(this).val();	
		//		alert(nm);
				sl = ($("option:selected", this).text());
		//		alert(sl);
				
		
				filename = "query/check_mat_type.php?mat_id="+nm;
		//		alert(filename);
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					success: function(data, textStatus, xhr) {
						ck_mat_type = data;
						//alert("in ajax..."+ck_mat_type);
					}
				});
				callFlexPaperDocViewer(sl);
				$("#Show_OMR_Div").hide();
				$("#OMR_result").hide();
				
				alert("Processing please wait...");
				if(cntr == 0)
				{
					alert(sl);
					cntr++;
				}
				else
				{
					cntr = cntr;
				}
		//		alert(ck_mat_type);
				if(ck_mat_type == 30)
				{
		//			alert("in 30 subjective..");
					subjective_sol(nm);
				}
				else if(ck_mat_type == 31)
				{
					filename = "query/check_omr_response_table.php?material_id="+nm;
				//	alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						success: function(data, textStatus, xhr) {
							ck_omr = data;							
						}
					});
					
					$("#p14,#o14,#s14").empty();				
					setTimeout(function(){
						Check_OMR_sheet_And_response(nm,tab,sl);
					}, 6000);
				}
				else
				{
					//alert("Please Select next time");
				}
				filename = "query/query9.php?dt="+nm;
				//alert(filename);
				getContent(filename,"o14");
			});
			 $("#o1").change(function(){
				$("#o3,#o5,#o7,#o9,#o11,#o12,#o13").val([ ]);
				$(".sub_tr1").hide();
				$(".sub_tr2").hide();
				$(".sub_tr3").hide();
				$("#given_test_id").show();
				$("#OMR_result").hide();
				$("#re_test_score").hide();
				nm=$("#o1").val();
				//alert(nm);
				filename = "query/query_material_for_objective.php?material_id="+nm;
				getContent(filename,"o14");
			});
			$("#o3").change(function(){
				$("#o1,#o5,#o7,#o9,#o11,#o12,#o13").val([ ]);
				$("#given_test_id").show();
				$("#OMR_result").hide();
				$("#re_test_score").hide();
				$(".sub_tr1").hide();
				$(".sub_tr2").hide();
				$(".sub_tr3").hide();
				nm=$("#o3").val();
				//alert(nm);
				filename = "query/query_material_for_objective.php?material_id="+nm;
				getContent(filename,"o14");
			});
			function Check_OMR_sheet_And_response(material_id_get,tab,material_name)
			{
			//	setTimeout(function(){
			//	}, 2000);
					filename = "query/query9.php?dt="+nm;
					//alert(filename);
					getContent(filename,"o14");
					alert("Load OMR Sheet or Result");
				
					if(ck_omr == "Insert_Data")
					{
						$("#Show_OMR_Div").hide();
						$("#OMR_result").hide();
						$(".sub_tr1").show();
						$(".sub_tr2").hide();
						$(".sub_tr3").hide();
						filename = "query/OMR_Sheet_Fill.php?material_id="+material_id_get;
						//alert(filename);
						getContent(filename,"dv");
					}
					else
					{	
						//  data_available
						$("#Show_OMR_Div").hide();
						$("#OMR_result").show();
						
						$("#re_test_score").show();
						
						filename = "query/omr_result_check.php?material_id="+material_id_get;
						//alert(filename);
						$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							success: function(data, textStatus, xhr) {
								var strtemp = $('#OMR_result_declare').html(data);
								
								eval(strtemp);
							}
							
						});
						subjective_sol(material_id_get);
					}
			}
			function Check_OMR_sheet_And_response2(material_id_get,tab,material_name)
			{
			//	setTimeout(function(){
			//	}, 2000);
				
					alert("Load OMR Sheet or Result");
				
					if(ck_omr == "Insert_Data")
					{
						$("#Show_OMR_Div").hide();
						$("#OMR_result").hide();
						$(".sub_tr1").show();
						$(".sub_tr2").hide();
						$(".sub_tr3").hide();
						filename = "query/OMR_Sheet_Fill.php?material_id="+material_id_get;
						//alert(filename);
						getContent(filename,"dv");
					}
					else
					{	
						//  data_available
						$("#Show_OMR_Div").hide();
						$("#OMR_result").show();
						$("#given_test_id").hide();
						$("#re_test_score").show();
						
						filename = "query/omr_result_check.php?material_id="+material_id_get;
						//alert(filename);
						$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							success: function(data, textStatus, xhr) {
								var strtemp = $('#OMR_result_declare').html(data);
								
								eval(strtemp);
							}
							
						});
						subjective_sol(material_id_get);
					}
			}
			$("#given_test_id").click(function(){
				
				//alert("test id get"+nm);
				//alert(s1);
				filename = "query/get_material.php?mat_id="+nm;
				//alert(filename);
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					success: function(data, textStatus, xhr) {
						s1 = data;
						//alert(s1);
					}
				});
				filename = "query/check_mat_type.php?mat_id="+nm;
				alert("please wait 2 second");
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					success: function(data, textStatus, xhr) {
						ck_mat_type = data;
						//alert("in ajax..."+ck_mat_type);
					}
				});
				//alert(callFlexPaperDocViewer(s1));
				callFlexPaperDocViewer(s1);
				$("#Show_OMR_Div").hide();
				$("#OMR_result").hide();
				alert("Processing please wait...");
				if(cntr == 0)
				{
					//alert(s1);
					cntr++;
				}
				else
				{
					cntr = cntr;
				}
				//alert(ck_mat_type);
				if(ck_mat_type == 30)
				{
					//alert("in 30 subjective..");
					subjective_sol(nm);
				}
				else if(ck_mat_type == 31)
				{
					filename = "query/check_omr_response_table.php?material_id="+nm;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						success: function(data, textStatus, xhr) {
							ck_omr = data;
							//alert(ck_omr);
						}
					});
					
					$("#p14,#o14,#s14").empty();				
					setTimeout(function(){
						Check_OMR_sheet_And_response2(nm,tab,sl);
					}, 6000);
				}
				else
				{
					alert("Please Select next time");
				}
				
			});
			$("#o5").change(function(){
				$("#o1,#o3,#o7,#o9,#o11,#o12,#o13").val([ ]);
				$("#given_test_id").show();
				$("#OMR_result").hide();
				$("#re_test_score").hide();
				$(".sub_tr1").hide();
				$(".sub_tr2").hide();
				$(".sub_tr3").hide();
				nm=$("#o5").val();
				//alert(nm);
				filename = "query/query_material_for_objective.php?material_id="+nm;
				getContent(filename,"o14");
			});
			$("#o7").change(function(){
				$("#o1,#o3,#o5,#o9,#o11,#o12,#o13").val([ ]);
				$("#given_test_id").show();
				$("#OMR_result").hide();
				$("#re_test_score").hide();
				$(".sub_tr1").hide();
				$(".sub_tr2").hide();
				$(".sub_tr3").hide();
				nm=$("#o7").val();
				//alert(nm);
				filename = "query/query_material_for_objective.php?material_id="+nm;
				getContent(filename,"o14");
			});
			$("#o9").change(function(){
				$("#o1,#o3,#o7,#o5,#o11,#o12,#o13").val([ ]);
				$("#given_test_id").show();
				$("#OMR_result").hide();
				$("#re_test_score").hide();
				$(".sub_tr1").hide();
				$(".sub_tr2").hide();
				$(".sub_tr3").hide();
				nm=$("#o9").val();
				//alert(nm);
				filename = "query/query_material_for_objective.php?material_id="+nm;
				getContent(filename,"o14");
			});
			$("#o11").change(function(){
				$("#o1,#o3,#o7,#o9,#o5,#o12,#o13").val([ ]);
				$("#given_test_id").show();
				$("#OMR_result").hide();
				$("#re_test_score").hide();
				$(".sub_tr1").hide();
				$(".sub_tr2").hide();
				$(".sub_tr3").hide();
				nm=$("#o11").val();
				//alert(nm);
				filename = "query/query_material_for_objective.php?material_id="+nm;
				getContent(filename,"o14");
			});
			$("#o12").change(function(){
				$("#o1,#o3,#o7,#o9,#o11,#o5,#o13").val([ ]);
				$("#given_test_id").show();
				$("#OMR_result").hide();
				$("#re_test_score").hide();
				$(".sub_tr1").hide();
				$(".sub_tr2").hide();
				$(".sub_tr3").hide();
				nm=$("#o12").val();
				//alert(nm);
				filename = "query/query_material_for_objective.php?material_id="+nm;
				getContent(filename,"o14");
			});
			$("#o13").change(function(){
				$("#o1,#o3,#o7,#o9,#o11,#o12,#o5").val([ ]);
				$("#given_test_id").show();
				$("#OMR_result").hide();
				$("#re_test_score").hide();
				$(".sub_tr1").hide();
				$(".sub_tr2").hide();
				$(".sub_tr3").hide();
				nm=$("#o13").val();
				//alert(nm);
				filename = "query/query_material_for_objective.php?material_id="+nm;
				getContent(filename,"o14");
			});
			$("#o14").change(function(){
				nm = $(this).val();	
				//alert("nm"+nm);
				sl = ($("option:selected", this).text());
				//alert("dc"+sl);
				callFlexPaperDocViewer(sl);
				//s1=$("#o14").text();
				//alert(s1);	
				//callFlexPaperDocViewer(sl);
				//sl = ($("option:selected", this).text());
				//alert(s1);	
			});
	<!--	English	-->	
			$("#p11,#o11,#s11").change(function(){
			
				hide_div_sub_tr();
				$("#p1,#o1,#s1").val([ ]);
				$("#p3,#o3,#s3").val([ ]);
				$("#p5,#o5,#s5").val([ ]);
				$("#p7,#o7,#s7").val([ ]);
				$("#p9,#o9,#s9").val([ ]);
		//		$("#p13,#o13,#t13,#tp13,#s13,#nt13").val([ ]);
				$("#p12,#o12,#s12").val([ ]);
				nm = $(this).val();	
		//		alert(nm);
				sl = ($("option:selected", this).text());
		//		alert(sl);
				
		
				filename = "query/check_mat_type.php?mat_id="+nm;
		//		alert(filename);
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					success: function(data, textStatus, xhr) {
						ck_mat_type = data;
						//alert("in ajax..."+ck_mat_type);
					}
				});
				callFlexPaperDocViewer(sl);
				$("#Show_OMR_Div").hide();
				$("#OMR_result").hide();
				
				alert("Processing please wait...");
				if(cntr == 0)
				{
					alert(sl);
					cntr++;
				}
				else
				{
					cntr = cntr;
				}
		//		alert(ck_mat_type);
				if(ck_mat_type == 30)
				{
		//			alert("in 30 subjective..");
					subjective_sol(nm);
				}
				else if(ck_mat_type == 31)
				{
					filename = "query/check_omr_response_table.php?material_id="+nm;
				//	alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						success: function(data, textStatus, xhr) {
							ck_omr = data;
							
						}
					});
					
					$("#p14,#o14,#s14").empty();				
					setTimeout(function(){
						Check_OMR_sheet_And_response(nm,tab,sl);
					}, 6000);
				}
				else
				{
					//alert("Please Select next time");
				}
				//filename = "query/query9.php?dt="+nm;
				//alert(filename);
				//getContent(filename,"o14");
			});
			
	<!--	Social Study	-->	
			$("#p12,#p12,#s12").change(function(){
			
				hide_div_sub_tr();
				$("#p1,#o1,#s1").val([ ]);
				$("#p3,#o3,#s3").val([ ]);
				$("#p5,#o5,#s5").val([ ]);
				$("#p7,#o7,#s7").val([ ]);
				$("#p9,#o9,#s9").val([ ]);
		//		$("#p13,#o13,#t13,#tp13,#s13,#nt13").val([ ]);
				$("#p11,#o11,#s11").val([ ]);
				nm = $(this).val();	
		//		alert(nm);
				sl = ($("option:selected", this).text());
		//		alert(sl);
				
		
				filename = "query/check_mat_type.php?mat_id="+nm;
		//		alert(filename);
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					success: function(data, textStatus, xhr) {
						ck_mat_type = data;
						//alert("in ajax..."+ck_mat_type);
					}
				});
				callFlexPaperDocViewer(sl);
				$("#Show_OMR_Div").hide();
				$("#OMR_result").hide();
				
				alert("Processing please wait...");
				if(cntr == 0)
				{
					alert(sl);
					cntr++;
				}
				else
				{
					cntr = cntr;
				}
		//		alert(ck_mat_type);
				if(ck_mat_type == 30)
				{
		//			alert("in 30 subjective..");
					subjective_sol(nm);
				}
				else if(ck_mat_type == 31)
				{
					filename = "query/check_omr_response_table.php?material_id="+nm;
				//	alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						success: function(data, textStatus, xhr) {
							ck_omr = data;
							
						}
					});
					
					$("#p14,#o14,#s14").empty();				
					setTimeout(function(){
						Check_OMR_sheet_And_response(nm,tab,sl);
					}, 6000);
				}
				else
				{
					//alert("Please Select next time");
				}
				//filename = "query/query9.php?dt="+nm;
				//alert(filename);
				//getContent(filename,"o14");
			});
			  
	<!--	Combined	-->	
			$("#p13,#o13,#s13").click(function(){
			
				hide_div_sub_tr();
				$("#p1,#o1,#s1").val([ ]);
				$("#p3,#o3,#s3").val([ ]);
				$("#p5,#o5,#s5").val([ ]);
				$("#p7,#o7,#s7").val([ ]);
				$("#p9,#o9,#s9").val([ ]);
				$("#p11,#o11,#s11").val([ ]);
				$("#p12,#o12,#s12").val([ ]);
	
				nm = $(this).val();	
		//		alert(nm);
				sl = ($("option:selected", this).text());
		//		alert(sl);
				
		
				filename = "query/check_mat_type.php?mat_id="+nm;
		//		alert(filename);
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					success: function(data, textStatus, xhr) {
						ck_mat_type = data;
						//alert("in ajax..."+ck_mat_type);
					}
				});
				callFlexPaperDocViewer(sl);
				$("#Show_OMR_Div").hide();
				$("#OMR_result").hide();
				
				alert("Processing please wait...");
				if(cntr == 0)
				{
					alert(sl);
					cntr++;
				}
				else
				{
					cntr = cntr;
				}
		//		alert(ck_mat_type);
				if(ck_mat_type == 30)
				{
		//			alert("in 30 subjective..");
					subjective_sol(nm);
				}
				else if(ck_mat_type == 31)
				{
					filename = "query/check_omr_response_table.php?material_id="+nm;
				//	alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						success: function(data, textStatus, xhr) {
							ck_omr = data;
							
						}
					});
					
					$("#p14,#o14,#s14").empty();				
					setTimeout(function(){
						Check_OMR_sheet_And_response(nm,tab,sl);
					}, 6000);
				}
				else
				{
					//alert("Please Select next time");
				}
				//filename = "query/query9.php?dt="+nm;
				//alert(filename);
				//getContent(filename,"o14");
			});
			
		//***********************************************************************
		// Other School Papers....
			$("#t1").change(function(){
			
				hide_div_sub_tr();
				$("#t3,#t5,#t7,#t9,#t11,#t12,#t13").val([ ]);
				
				nm = $(this).val();	
		//		alert(nm);
				sl = ($("option:selected", this).text());
		//		alert(sl);
				callFlexPaperDocViewer(sl);
				
			});
			$("#t3").change(function(){
			
				hide_div_sub_tr();
				$("#t1,#t5,#t7,#t9,#t11,#t12,#t13").val([ ]);
				
				nm = $(this).val();	
		//		alert(nm);
				sl = ($("option:selected", this).text());
		//		alert(sl);
				callFlexPaperDocViewer(sl);
				
			});
			$("#t5").change(function(){
			
				hide_div_sub_tr();
				$("#t1,#t3,#t7,#t9,#t11,#t12,#t13").val([ ]);
				
				nm = $(this).val();	
		//		alert(nm);
				sl = ($("option:selected", this).text());
		//		alert(sl);
				callFlexPaperDocViewer(sl);
				
			});
			$("#t7").change(function(){
			
				hide_div_sub_tr();
				$("#t1,#t3,#t5,#t9,#t11,#t12,#t13").val([ ]);
				
				nm = $(this).val();	
		//		alert(nm);
				sl = ($("option:selected", this).text());
		//		alert(sl);
				callFlexPaperDocViewer(sl);
				
			});
			$("#t9").change(function(){
			
				hide_div_sub_tr();
				$("#t1,#t3,#t5,#t7,#t11,#t12,#t13").val([ ]);
				
				nm = $(this).val();	
		//		alert(nm);
				sl = ($("option:selected", this).text());
		//		alert(sl);
				callFlexPaperDocViewer(sl);
				
			});
			$("#t11").change(function(){
			
				hide_div_sub_tr();
				$("#t1,#t3,#t5,#t7,#t9,#t12,#t13").val([ ]);
				
				nm = $(this).val();	
		//		alert(nm);
				sl = ($("option:selected", this).text());
		//		alert(sl);
				callFlexPaperDocViewer(sl);
				
			});
			$("#t12").change(function(){
			
				hide_div_sub_tr();
				$("#t1,#t3,#t5,#t7,#t9,#t11,#t13").val([ ]);
				
				nm = $(this).val();	
		//		alert(nm);
				sl = ($("option:selected", this).text());
		//		alert(sl);
				callFlexPaperDocViewer(sl);
				
			});
			$("#t13").change(function(){
			
				hide_div_sub_tr();
				$("#t1,#t3,#t5,#t7,#t9,#t11,#t12").val([ ]);
				
				nm = $(this).val();	
		//		alert(nm);
				sl = ($("option:selected", this).text());
		//		alert(sl);
				callFlexPaperDocViewer(sl);
				
			});
			
		//***********************************************************************
		// subjective test papers....
			$("#tp1").change(function(){
			
				hide_div_sub_tr();
				$("#tp3,#tp5,#tp7,#tp9,#tp11,#tp12,#tp13").val([ ]);
				
				nm = $(this).val();	
		//		alert(nm);
				sl = ($("option:selected", this).text());
		//		alert(sl);
				callFlexPaperDocViewer(sl);
				
			});
			$("#tp3").change(function(){
			
				hide_div_sub_tr();
				$("#tp1,#tp5,#tp7,#tp9,#tp11,#tp12,#tp13").val([ ]);
				
				nm = $(this).val();	
		//		alert(nm);
				sl = ($("option:selected", this).text());
		//		alert(sl);
				callFlexPaperDocViewer(sl);
				
			});
			$("#tp5").change(function(){
			
				hide_div_sub_tr();
				$("#tp1,#tp3,#tp7,#tp9,#tp11,#tp12,#tp13").val([ ]);
				
				nm = $(this).val();	
		//		alert(nm);
				sl = ($("option:selected", this).text());
		//		alert(sl);
				callFlexPaperDocViewer(sl);
				
			});
			$("#tp7").change(function(){
			
				hide_div_sub_tr();
				$("#tp1,#tp3,#tp5,#tp9,#tp11,#tp12,#tp13").val([ ]);
				
				nm = $(this).val();	
		//		alert(nm);
				sl = ($("option:selected", this).text());
		//		alert(sl);
				callFlexPaperDocViewer(sl);
				
			});
			$("#tp9").change(function(){
			
				hide_div_sub_tr();
				$("#tp1,#tp3,#tp5,#tp7,#tp11,#tp12,#tp13").val([ ]);
				
				nm = $(this).val();	
		//		alert(nm);
				sl = ($("option:selected", this).text());
		//		alert(sl);
				callFlexPaperDocViewer(sl);
				
			});
			$("#tp11").change(function(){
			
				hide_div_sub_tr();
				$("#tp1,#tp3,#tp5,#tp7,#tp9,#tp12,#tp13").val([ ]);
				
				nm = $(this).val();	
		//		alert(nm);
				sl = ($("option:selected", this).text());
		//		alert(sl);
				callFlexPaperDocViewer(sl);
				
			});
			$("#tp12").change(function(){
			
				hide_div_sub_tr();
				$("#tp1,#tp3,#tp5,#tp7,#tp9,#tp11,#tp13").val([ ]);
				
				nm = $(this).val();	
		//		alert(nm);
				sl = ($("option:selected", this).text());
		//		alert(sl);
				callFlexPaperDocViewer(sl);
				
			});
			$("#tp13").change(function(){
			
				hide_div_sub_tr();
				$("#tp1,#tp3,#tp5,#tp7,#tp9,#tp11,#tp12").val([ ]);
				
				nm = $(this).val();	
		//		alert(nm);
				sl = ($("option:selected", this).text());
		//		alert(sl);
				callFlexPaperDocViewer(sl);
				
			});
			
			
			// Compitive test papers....
			$("#comp_1").change(function(){
			
				hide_div_sub_tr();
				nm = $(this).val();	
			//	alert(nm);
				sl = ($("option:selected", this).text());
			//	alert(sl);
				callFlexPaperDocViewer(sl);
				
				filename = "query/query9.php?dt="+nm;
			//	alert(filename);
				getContent(filename,"comp_3");
				
				if(cntr == 0)
				{
					alert(sl);
					cntr++;
				}
				else
				{
					cntr = cntr;
				}
				
			});
			$("#comp_3").change(function(){
				sl = ($("option:selected", this).text());
				alert(sl);
				callFlexPaperDocViewer(sl);
			});
			
		// Notes type........
			$("#nt1").change(function(){
			
				hide_div_sub_tr();
				$("#nt3,#nt5,#nt7,#nt9,#nt11,#nt12,#nt13").val([ ]);
				
				nm = $(this).val();	
		//		alert(nm);
				sl = ($("option:selected", this).text());
		//		alert(sl);
				callFlexPaperDocViewer(sl);
				
			});
			$("#nt3").change(function(){
			
				hide_div_sub_tr();
				$("#nt1,#nt5,#nt7,#nt9,#nt11,#nt12,#nt13").val([ ]);
				
				nm = $(this).val();	
		//		alert(nm);
				sl = ($("option:selected", this).text());
		//		alert(sl);
				callFlexPaperDocViewer(sl);
				
			});
			$("#nt5").change(function(){
			
				hide_div_sub_tr();
				$("#nt1,#nt3,#nt7,#nt9,#nt11,#nt12,#nt13").val([ ]);
				
				nm = $(this).val();	
		//		alert(nm);
				sl = ($("option:selected", this).text());
		//		alert(sl);
				callFlexPaperDocViewer(sl);
				
			});
			$("#nt7").change(function(){
			
				hide_div_sub_tr();
				$("#nt1,#nt3,#nt5,#nt9,#nt11,#nt12,#nt13").val([ ]);
				
				nm = $(this).val();	
		//		alert(nm);
				sl = ($("option:selected", this).text());
		//		alert(sl);
				callFlexPaperDocViewer(sl);
				
			});
			$("#tp9").change(function(){
			
				hide_div_sub_tr();
				$("#nt1,#nt3,#nt5,#nt7,#nt11,#nt12,#nt13").val([ ]);
				
				nm = $(this).val();	
		//		alert(nm);
				sl = ($("option:selected", this).text());
		//		alert(sl);
				callFlexPaperDocViewer(sl);
				
			});
			$("#nt11").change(function(){
			
				hide_div_sub_tr();
				$("#nt1,#nt3,#nt5,#nt7,#nt9,#nt12,#nt13").val([ ]);
				
				nm = $(this).val();	
		//		alert(nm);
				sl = ($("option:selected", this).text());
		//		alert(sl);
				callFlexPaperDocViewer(sl);
				
			});
			$("#nt12").change(function(){
			
				hide_div_sub_tr();
				$("#nt1,#nt3,#nt5,#nt7,#nt9,#nt11,#nt13").val([ ]);
				
				nm = $(this).val();	
		//		alert(nm);
				sl = ($("option:selected", this).text());
		//		alert(sl);
				callFlexPaperDocViewer(sl);
				
			});
			$("#nt13").change(function(){
			
				hide_div_sub_tr();
				$("#nt1,#nt3,#nt5,#nt7,#nt9,#nt11,#nt12").val([ ]);
				
				nm = $(this).val();	
		//		alert(nm);
				sl = ($("option:selected", this).text());
		//		alert(sl);
				callFlexPaperDocViewer(sl);
				
			});
			
			
		<!--  	Subjective All solution -->
			function subjective_sol(mat_id)
			{
				filename = "query/query9.php?dt="+mat_id;
		//		alert("filename.."+filename);
				var filename2 = "query/query10.php?dt="+mat_id;
		//		alert("filename2.."+filename2);
		//		alert("new tab value..........."+tab);
				if(tab == 1001)
				{
					getContent(filename,"s14");
				}
				else if(tab == 1002)
				{
					getContent(filename,"p14");
				}
				else if(tab == 1003)
				{
					getContent(filename,"t14");
				}
				else if(tab == 1004)
				{
					getContent(filename,"o14");
				}
				else if(tab == 1005)
				{
					getContent(filename2,"tp14");
				}
				else if(tab == 1006)
				{
					getContent(filename,"nt14");
				}
			}
			
		<!-- GET Contenet -->
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
	<!--Solution	-->
			$("#s14,#p14,#o14,#t14,#tp14").click(function(){
				nxt = $(this).val();
		//		alert(nxt);
				callFlexPaperDocViewer(nxt);
			});
	<!-- ba -->
			$("#s1,#s3,#s5,#s7,#s9,#s11,#s12,#s13").change(function()
				{	
					$("#s14").val() = "";
				});
	<!-- pa -->
			$("#p1,#p3,#p5,#p7,#p9,#p11,#p12,#p13").change(function()
				{	
					$("#p14").val() = "";
				});
	<!-- other -->
			$("#t1,#t3,#t5,#t7,#t9,#t11,#t12,#t13").change(function()
			{	
				filename = "";
				filename = "query/query9.php?dt="+nm;
				getContent(filename,"t14");
			});
	<!-- objective -->
			$("#o1,#o3,#o5,#o7,#o9,#o11,#o12,#o13").click(function()
				{	
					$("#o14").val() = "";
				});
	<!-- subjective -->
			$("#tp1,#tp3,#tp5,#tp7,#tp9,#tp11,#tp12,#tp13").change(function()
			{	
				filename = "";
				filename = "query/query10.php?dt="+nm;
				// alert(filename);
				getContent(filename,"tp14");
			});

			
	<!-- notes 
			$("#nt1,#nt3,#nt5,#nt7,#nt9,#nt11,#nt12,#nt13").change(function()
			{	
				var filename = "";
				filename = "query/query9.php?dt="+nm;
				//alert(filename);
				getContent(filename,"nt14");
			});
	-->
	
		<!--  Batch Assignment  -->
			$('#Assign').click(function()
			{	
				$("#Show_OMR_Div").hide();
				$("#OMR_result").hide();
				show_sdf_tools_plan();
				$("#re_test_score").hide();
				callFlexPaperDocViewer(first_paper);
				tab = 1001;
				//ok_bt_call="cancel";
				filename = "query/query.php?dt=1&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				//alert(filename);
				getContent(filename,"s1");
				filename = "query/query2.php?dt=1&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "s3");
				filename = "query/query3.php?dt=1&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "s5");
				filename = "query/query4.php?dt=1&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "s7");
				filename = "query/query5.php?dt=1&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "s9");
				filename = "query/query6.php?dt=1&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "s11");
				filename = "query/query8.php?dt=1&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "s12");
				filename = "query/query7.php?dt=1&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "s13");
				filename = "query/query9.php?dt=a";
				getContent(filename,"s14");
				$("#hide_instruction").show();
			});
			$('#persnl').click(function()
			{	
				$("#Show_OMR_Div").hide();
				$("#OMR_result").hide();
				show_sdf_tools_plan();
				$("#re_test_score").hide();
				callFlexPaperDocViewer(first_paper);
				tab = 1002;
				//ok_bt_call="cancel";
				//alert(ok_bt_call);
				filename = "query/query.php?dt2=2&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename,"p1");
				filename = "query/query2.php?dt2=2&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "p3");
				filename = "query/query3.php?dt2=2&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "p5");
				filename = "query/query4.php?dt2=2&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "p7");
				filename = "query/query5.php?dt2=2&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "p9");
				filename = "query/query6.php?dt2=2&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "p11");
				filename = "query/query8.php?dt=2&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "s12");
				filename = "query/query7.php?dt2=2&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "p13");
				filename = "query/query9.php?dt=a";
				getContent(filename,"p14");
				$("#hide_instruction").show();
			});
			<!-- this is other anchor tag -->
			$('#other').click(function()
			{	
				$("#Show_OMR_Div").hide();
				$("#OMR_result").hide();
				show_sdf_tools_plan();
				$("#re_test_score").hide();
				callFlexPaperDocViewer(first_paper);
				tab = 1003;
				//ok_bt_call="cancel";
				filename = "query/query.php?dt4=4&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename,"t1");
				filename = "query/query2.php?dt4=4&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "t3");
				filename = "query/query3.php?dt4=4&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "t5");
				filename = "query/query4.php?dt4=4&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "t7");
				filename = "query/query5.php?dt4=4&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "t9");
				filename = "query/query6.php?dt4=4&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "t11");
				filename = "query/query8.php?dt4=4&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "s12");
				filename = "query/query7.php?dt4=4&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "t13");
				filename = "query/query9.php?dt=a";
				getContent(filename,"t14");
				$("#hide_instruction").show();
			});
	<!-- this is objective paper test anchor tag -->

			$('#obj').click(function()
			{	
				$("#Show_OMR_Div").hide();
				$("#OMR_result").hide();
				show_sdf_tools_plan();
				$("#re_test_score").hide();
				callFlexPaperDocViewer(first_paper);
				tab = 1004;
				//ok_bt_call="cancel";
				filename = "query/query.php?dt3=25&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename,"o1");
				//alert(filename);
				filename = "query/query2.php?dt3=25&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "o3");
				//alert("query2"+filename);
				filename = "query/query3.php?dt3=25&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "o5");
				filename = "query/query4.php?dt3=25&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "o7");
				filename = "query/query5.php?dt3=25&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "o9");
				filename = "query/query6.php?dt3=25&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "o11");
				filename = "query/query8.php?dt3=25&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "s12");
				filename = "query/query7.php?dt3=25&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "o13");
				filename = "query/query9.php?dt=a";
				getContent(filename,"o14");
				$("#hide_instruction").show();
			});
			

<!-- this is subjective paper test anchor tag -->
			$('#sub').click(function()
			{	$("#re_test_score").hide();
				$("#Show_OMR_Div").hide();
				$("#OMR_result").hide();
				show_sdf_tools_plan();
				
				callFlexPaperDocViewer(first_paper);
				
				tab = 1005;
				//ok_bt_call="cancel";
				filename = "query/query.php?dt5=26&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename,"tp1");
				filename = "query/query2.php?dt5=26&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "tp3");
				filename = "query/query3.php?dt5=26&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "tp5");
				filename = "query/query4.php?dt5=26&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "tp7");
				filename = "query/query5.php?dt5=26&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "tp9");
				filename = "query/query6.php?dt5=26&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "tp11");
				filename = "query/query8.php?dt5=26&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "s12");
				filename = "query/query7.php?dt5=26&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "tp13");
				filename = "query/query10.php?dt=a";
				getContent(filename,"tp14");
				$("#hide_instruction").hide();
			});
			
			<!-- Previous Test Paper Competitive -->	
			$("#prv_test_comp").click(function(){
				$("#Show_OMR_Div").hide();
				$("#OMR_result").hide();
				show_sdf_tools_plan();
				$("#re_test_score").hide();
				callFlexPaperDocViewer(first_paper);
				filename = "query/query11.php";
				getContent(filename,"comp_1");
				$("#hide_instruction").hide();
			});	
			<!--	online regular	-->
			$('#sch_online_test_regular').click(function()
			{
				$("#doc34").hide();
				$("#plan").hide();
				$("#Show_OMR_Div").hide();
				$("#OMR_result").hide();
				
				var url = "http://182.18.160.181/ADMENECAS/UserLogin.aspx?ClientID=29200";
				window.open(url, 'online Test', 'toolbar=no,menubar=no,location=no,directories=no,status=no');
				$("#hide_instruction").hide();
			});
			
			<!--	online video lectures link	-->
			$('#online_video_lectures').click(function()
			{
				$("#doc34").hide();
				$("#plan").hide();
				$("#Show_OMR_Div").hide();
				$("#OMR_result").hide();
				
				var url1 = "http://www.globaleduserver.com/Default.aspx";
				window.open(url1, 'online Video Lectures', 'toolbar=no,menubar=no,location=no,directories=no,status=no');
				$("#hide_instruction").hide();
			});
			
			<!--	Virtual class room -->
			$('#virtual_classroom').click(function()
			{
				$("#doc34").hide();
				$("#plan").hide();
				$("#Show_OMR_Div").hide();
				$("#OMR_result").hide();
				
				var url1 = "http://www.globaleduserver.com/Default.aspx";
				window.open(url1, 'Virtual Classroom', 'toolbar=no,menubar=no,location=no,directories=no,status=no');
				$("#hide_instruction").hide();
			});
			
			
			<!-- this is Notes anchor tag -->
			$('#not').click(function()
			{	
				$("#Show_OMR_Div").hide();
				$("#OMR_result").hide();
				//alert("note");
				show_sdf_tools_plan();
				
				callFlexPaperDocViewer(first_paper);
				
				tab = 1006;
				//ok_bt_call="cancel";
				filename = "query/query.php?dt6=8&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename,"nt1");
				filename = "query/query2.php?dt6=8&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "nt3");
				filename = "query/query3.php?dt6=8&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "nt5");
				filename = "query/query4.php?dt6=8&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "nt7");
				filename = "query/query5.php?dt6=8&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "nt9");
				filename = "query/query6.php?dt6=8&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "nt11");
				filename = "query/query8.php?dt6=8&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "nt12");
				filename = "query/query7.php?dt6=8&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4;
				getContent(filename, "nt13");
				filename = "query/query9.php?dt=a";
				getContent(filename,"nt14");
				$("#hide_instruction").hide();
			});
			
		<!-- course progress -->
			$("#cp").click(function(){
				//alert("alert");
				$("#doc34").hide();
				$("#plan").hide();
				$("#Show_OMR_Div").hide();
				$("#OMR_result").hide();
				
				
			});
			
		<!-- Schedule Objective Test -->	
			$("#sch_online_test").click(function(){
			//	alert("alert");
				$("#doc34").hide();
				$("#plan").hide();
				$("#Show_OMR_Div").hide();
				$("#OMR_result").hide();

			//	filename = "online_query/test_announce.php?dt1="+u_id;
			//	alert(filename);
			//	getContent(filename,"sch_test_online_tr");
				
			});
			
	<!--  ************************     Online 	*****************************	-->
			Date.prototype.today = function(){ 
						return this.getFullYear() +"-"+(((this.getMonth()+1) < 10)?"0":"") + (this.getMonth()+1) +"-"+ ((this.getDate() < 10)?"0":"") + this.getDate()
					};

					Date.prototype.timeNow = function(){
						return ((this.getHours() < 10)?"0":"") + this.getHours() +":"+ ((this.getMinutes() < 10)?"0":"") + this.getMinutes() +":"+ ((this.getSeconds() < 10)?"0":"") + this.getSeconds();
					};
					
			$(".online_test_php").click(function(){

			//	var sid = <?php echo $user; ?>;

				$("#menubar_ul").hide();
				$("#tabs").css({
					position:'absolute', //or fixed depending on needs
					top: $(window).scrollTop(), // top pos based on scoll pos
					left: 0,
					height: '100%',
					width: '100%'
				});
				
				var fake = '';
			//	window.open('index.php', '', 'fullscreen=yes, scrollbars=yes');
			
				var x;
				var r=confirm("Are you sure start test?");
				if (r==true)
				{
					online_id = ($(this).closest('tr').attr('id'));
					alert(online_id);
					var newDate = new Date();
					var datetime = newDate.today() + " " + newDate.timeNow();
					online_start_time = datetime;
					alert(online_start_time);
				
					filename = "online_query/update_student_test_id.php?test_announce_id="+online_id;
					alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						success: function(data, textStatus, xhr) {
							//var strtemp = $("#dv1").html(data);
							//eval(strtemp);
						}
					});
					
					filename = "online_query/find_material.php?que_paper_id="+online_id;
					alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						success: function(data, textStatus, xhr) {
							
							var array2 = data.split('=');
						//	alert(array2);
								mat1 = array2[0];
								fake=mat1;
							//	callFlexPaperDocViewer(mat1);
								dur1 = array2[1];
								mat_id1 = array2[2];
								
								$("#mat_online_purpose").val(mat_id1);

								callFlexPaperDocViewer(fake);
							//	alert(mat1+" ---  "+dur1+" ---  "+mat_id1);
							
								filename = "online_query/insert_starting_time.php?student_id="+u_id+"&mat_id="+mat_id1+"&start_time="+online_start_time;
								alert(filename);
								$.ajax({
									url: filename,
									type: 'GET',
									dataType: 'html',
									success: function(data, textStatus, xhr) {
										//var strtemp = $("#dv1").html(data);
										//eval(strtemp);
									}
								});
								
								filename = "online_query/OMR_Sheet_Fill_online.php?material_id="+mat_id1;
								alert(filename);
								$.ajax({
								url: filename,
								type: 'GET',
								dataType: 'html',
								success: function(data, textStatus, xhr) {
									var strtemp = $("#dv1").html(data);
									eval(strtemp);
									}
								});

								$("#schedule_online_test_div").hide();
								alert("Your test start. Best of luck.");
								$("#loadingDiv").css({
									position:'absolute', //or fixed depending on needs
								//	top: $(window).scrollTop(), // top pos based on scoll pos
									left: 0,
									height: '100%',
									width: '100%'
								});
							$("#loadingDiv").show();
						}
					});
				//	alert("mat - nm = "+mat1);
				//	callFlexPaperDocViewer(mat1);
					setTimeout(function(){
						$("#loadingDiv").hide();
						
						$("#OMR_online_answer_submit").show();
						$("#doc34, #online_time, #Show_online_OMR_Div").show();
						$("#online_main_page_td").show();
						t_t = dur1;
					//	alert("time out - "+t_t);
						var d3 = new Date (),
							d4 = new Date ( d3 );
						
						
						if(t_t == 5)
						{					d4.setMinutes(d3.getMinutes() + 5);				}
						else if(t_t == 10)
						{					d4.setMinutes(d3.getMinutes() + 10);				}
						else if(t_t == 1)
						{					d4.setMinutes(d3.getMinutes() + 1);				}
						else if(t_t == 15)
						{					d4.setMinutes(d3.getMinutes() + 15);				}
						else if(t_t == 20)
						{					d4.setMinutes(d3.getMinutes() + 20);				}
						else if(t_t == 25)
						{					d4.setMinutes(d3.getMinutes() + 25);				}
						else if(t_t == 30)
						{					d4.setMinutes(d3.getMinutes() + 30);				}
						else if(t_t == 35)
						{					d4.setMinutes(d3.getMinutes() + 35);				}
						else if(t_t == 40)
						{					d4.setMinutes(d3.getMinutes() + 40);				}
						else if(t_t == 45)
						{					d4.setMinutes(d3.getMinutes() + 45);				}
						else if(t_t == 50)
						{					d4.setMinutes(d3.getMinutes() + 50);				}
						else if(t_t == 55)
						{					d4.setMinutes(d3.getMinutes() + 55);				}
						else if(t_t == 60)
						{					d4.setMinutes(d3.getMinutes() + 60);				}
						else if(t_t == 75)
						{					d4.setMinutes(d3.getMinutes() + 75);				}
						else if(t_t == 90)
						{					d4.setMinutes(d3.getMinutes() + 90);				}
						else if(t_t == 105)
						{					d4.setMinutes(d3.getMinutes() + 105);				}
						else if(t_t == 120)
						{					d4.setMinutes(d3.getMinutes() + 120);				}
						else if(t_t == 135)
						{					d4.setMinutes(d3.getMinutes() + 135);				}
						else if(t_t == 150)
						{					d4.setMinutes(d3.getMinutes() + 150);				}
						else if(t_t == 165)
						{					d4.setMinutes(d3.getMinutes() + 165);				}
						else{		alert("Page error, please contact admin.");
						}
						
						var today_1 = moment(d4);
						var date_time_1 = today_1.format("D MMMM YYYY HH:mm:ss");
						var setTime1 = date_time_1;
						$("#countdown").countdown({
							date: setTime1,
							format: "on"
						},
						function() {
						
							var newDate1 = new Date();
							var datetime1 = newDate1.today() + " " + newDate1.timeNow();
							online_end_time = datetime1;
						//	alert(online_end_time);
							
							filename = "online_query/insert_end_time.php?student_id="+u_id+"&mat_id="+mat_id1+"&end_time="+online_end_time;
							alert(filename);
							$.ajax({
								url: filename,
								type: 'GET',
								dataType: 'html',
								success: function(data, textStatus, xhr) {
									//var strtemp = $("#dv1").html(data);
									//eval(strtemp);
								}
							});
							
							$("#loadingDiv").css({
								position:'absolute', //or fixed depending on needs
							//	top: $(window).scrollTop(), // top pos based on scoll pos
								left: 0,
								height: '100%',
								width: '100%'
							});
							
							$("#online_main_page_td").hide();
							$("#menubar_ul").show();
							$("#doc34").hide();
							$("#plan").hide();
							$("#OMR_online_answer_submit").hide();
							alert("Your test time is over.");
							
							$("#loadingDiv").show();
							check_student_id_1 = "";
							var idArray4 = [];
							$("#student_come_online_test input:checkbox").each(function() {
								if ($(this).is(":checked"))
								{
									idArray4.push(this.id);
								}
							});
							check_student_id_1 = idArray4;
							
							var nw_1 = ""+check_student_id_1+"";
							var array1 = nw_1.split(',');
							for (var i in array1)
							{
								if(i >= 0)
								{
									var array4 = array1[i].split('-');
									for (var j in array4)
									{
										var gh_1=array4[0];
										var gh2_1 = array4[1];	
									}
									filename = "online_query/insert_online_test_response.php?online_id="+mat_id1+"&qno="+gh_1+"&response="+gh2_1+"&sid="+u_id;
									alert(filename);
									$.ajax({
										url: filename,
										type: 'GET',
										dataType: 'html',
										success: function(data, textStatus, xhr) {
										//	alert(data);
										}
									});
									
								}
								else
								{
									alert("Insert data");
								}
							}
						/*
							$("#tabs").css({
								position:'',
								height: '',
								width: '100%'
							});
							
							$("#menubar_ul").show();
							alert("View your result.");
							$("#doc34").hide();
							$("#plan").hide();
							$("#Show_OMR_Div").hide();
							$("#OMR_result").hide();
						*/	
							alert("Please wait for few minute.");
							setTimeout(function(){
								location.reload();
							}, 12000);
							
						});
					}, 12000);
					
				}
				else
				{
					x="You pressed Cancel!";
					$("#menubar_ul").show();
					$("#tabs").css({
						position:'',
						height: '',
						width: '100%'
					});
				}
			});
			$(".online_test_result_view").click(function(){
				online_id = ($(this).closest('tr').attr('id'));
				var url = "view_online_test_result.php?test_announce_id="+online_id;
				window.open(url, 'Your Result', 'height=200,width=260,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=no,menubar=no,location=no,directories=no,status=no');
			});
		<!--  Finish Online test -->
			var chap_id = "";
			var top_id = "";
			var add_name="";
			$( "#chap1, #chap2" ).selectable({
				selected: function(event, ui) {
					chap_id = ( $(ui.selected).attr('id') );
					var url = "";
					url = "query/2.php?chp_id="+chap_id+"&uid="+u_id+"&bt_id="+bt_id+"&type_lect="+tl;
					//alert(url);
					getContent(url,"top1");
					url = "query/2_2.php?chp_id="+chap_id+"&uid="+u_id+"&bt_id="+bt_id+"&type_lect="+tl;
					getContent(url,"top2");
					
					url = "query/query3_3_4.php?chp_id="+chap_id+"&uid="+u_id+"&bta="+bt_id+"&type_lect="+tl;
				
					getContent(url,"top3");
					
					$("#additional_topic_cover").show();
				}
			});
			$( "#top1" ).sortable({
				connectWith: "ul",
				update: function(evenet, ui ) {
					reloadChapterLists();
					//chap_chart();
					//sub_chart();
				}
			});
			$( "#top2" ).sortable({
				connectWith: "ul",
				receive: function( event, ui ) {
					top_id  = ($(ui.item).attr("id"));
					filename = "query/4.php?dt1="+u_id+"&dt2="+sub_id+"&dt3="+br_id+"&dt4="+bt_id+"&dt5="+chap_id+"&dt6="+top_id+"&type_lect="+tl;
					//alert(filename);
					getInsert(filename);
				},
				remove: function(evenet, ui ) {
					top_id  = ($(ui.item).attr("id"));
					filename = "query/5.php?dt9="+top_id;
					getDelete(filename);
					
				},
				update: function(evenet, ui ) {
					reloadChapterLists();
					//chap_chart();
					//sub_chart();
				}
			});
			function reloadChapterLists() {
				filename = "query/1.php?dt3="+sub_id+"&uid="+u_id+"&bt_id="+bt_id+"&type_lect="+tl;
				//alert(filename);
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					success: function(data, textStatus, xhr) {
						var strtemp = $('#chap1').html(data);
						eval(strtemp);
					}
				});	
				filename = "query/1_1.php?dt3="+sub_id+"&uid="+u_id+"&bt_id="+bt_id+"&type_lect="+tl;
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					success: function(data, textStatus, xhr) {
						var strtemp = $('#chap2').html(data);
						eval(strtemp);
					}
				});
			}
			function getInsert(filename){
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					
					success: function(data, textStatus, xhr) {
						//alert(data);
					},
				});									
			}
			function getDelete(filename){
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					
					success: function(data, textStatus, xhr) {
						//alert("success"+data);
					},
				});									
			}
			$( "#top1, #top2, #top3" ).disableSelection();
			$("#subg").click(function(){
				$("#chap1, #chap2, #top1, #top2, #top3").empty();
				sub_id = $("#subg").val();
				//	alert(sub_id); lect_type
				filename = "query/viewLectType.php";
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					
					success: function(data, textStatus, xhr) {
						 $('#lect_type').html(data);
					},
				});	
				$("#chart").hide();
				$("#additional_topic_cover").hide();
				$("#lect_type").show();
				$("#llt").show();
			});
			
			$("#lect_type").hide();
			$("#llt").hide();
			
			$("#lect_type").click(function(){
				$("#chap1, #chap2, #top1, #top2, #top3").empty();
				tl = $("#lect_type").val();
			//	alert(tl);
				filename = "query/1.php?dt3="+sub_id+"&uid="+u_id+"&bt_id="+bt_id+"&type_lect="+tl;
			//	alert(filename);
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					success: function(data, textStatus, xhr) {
						var strtemp = $('#chap1').html(data);
						eval(strtemp);
					}
				});
				reloadChapterLists();
				$("#additional_topic_cover").hide();
			});
			
			$("#add_topic").click(function(){
				//	alert("hello");
					// post  uid,add_top_name,chap_id,wb_id
					add_name = $("#atcvr").val();
					//alert("topic"+add_name);
					filename = "query/insert_add_topic.php?name="+add_name+"&uid="+u_id+"&bta="+bt_id+"&chap_id="+chap_id+"&type_lect="+tl;
					//alert("query Run : "+filename);
					getInsert(filename);
					$("#atcvr").val('');
					
					url = "query/query3_3_4.php?chp_id="+chap_id+"&uid="+u_id+"&bta="+bt_id+"&type_lect="+tl;
					//alert("Data inserted");
					
					getContent(url,"top3");
					
				});
				
			$("#additional_topic_cover").hide();
						
			$( "#datepicker" ).datepicker({
					dateFormat: "yy-mm-dd",
					altField: "#alternate",
					altFormat: "DD, d MM, yy",
					onSelect: function() { 
						//alert("Date Selected");	
						datepickerVal = $("#datepicker").val();
						//alert(datepickerVal);		
					}
			});
			
			$("#chart").hide();
			
			$("#chart").click(function()
			{						
					var url = "viewChart.php?sub="+sub_id+"&bta="+bt_id+"&tl="+tl+"&uid="+u_id;    
					//alert(url);	
					window.open(url, 'Evolution of Course Progress', 'height=800,width=1000,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=no,menubar=no,location=no,directories=no,status=yes');
					return false;
					
			});
			$("#re_test_score").hide();
			// Checking for OMR sheet and give test or not
			$("#OMR_answer_submit").click(function(){
			
				$(".sub_tr3").hide();	$(".sub_tr2").hide();	$(".sub_tr1").hide();
			
				var last_id_omr = $('#last_id_omr_starting_time').val();
				var nwDT_4 = new Date();
				var nw_DT_4 = nwDT_4.today() + " " + nwDT_4.timeNow();
				omr_end_time = nw_DT_4;
				
				filename = "omr_details/insert_end_time.php?lt_id="+last_id_omr+"&end_time="+omr_end_time;
				//alert(filename);
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					success: function(data, textStatus, xhr) {
						//$('#last_id_omr_starting_time').val(data);
					}
				});
				
				check_student_id = "";
				var idArray2 = [];
				$("#student_come input:checkbox").each(function() {
					if ($(this).is(":checked"))
					{
						idArray2.push(this.id);
					}
				});
				check_student_id = idArray2;
				if(check_student_id == "")
				{
					alert("Please give proper test");
				}
				else
				{
					$("#OMR_answer_submit").hide();
					var nw = ""+check_student_id+"";
					var array = nw.split(',');
					for (var i in array){
						if(i >= 0)
						{
							var array2 = array[i].split('-');
							for (var j in array2){
								var gh=array2[0];
								var gh2 = array2[1];	
							}
							//alert("new mat id  :"+nm);
							filename = "query/insert_OMR_response.php?material_id="+nm+"&qno="+gh+"&response="+gh2;
							//alert(filename);
							$.ajax({
								url: filename,
								type: 'GET',
								dataType: 'html',
								success: function(data, textStatus, xhr) {
									//alert(data);
								}
							});
							
						}
						else
						{
							alert("Insert data");
						}
					}
					
					alert("Your answers checking. Please wait....");
					
					setTimeout(function(){
						$("#OMR_View_Result").show();
					}, 3000);
					alert("Plese click on view for your test result");
				}
			//	alert("data::"+check_student_id);
				$("#given_test_id").hide();
			});
			$("#OMR_View_Result").click(function(){
				filename = "query/query9.php?dt="+nm;
				if(tab == 1001)
				{
					getContent(filename,"s14");
				}
				else if(tab == 1002)
				{
					getContent(filename,"p14");
				}
				else if(tab == 1003)
				{
					getContent(filename,"t14");
				}
				else if(tab == 1004)
				{
					getContent(filename,"o14");
				}
				else if(tab == 1006)
				{
					getContent(filename,"nt14");
				}
				alert("Please wait for your result.");
				filename = "query/omr_result_check.php?material_id="+nm;
			//	alert(filename);
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					success: function(data, textStatus, xhr) {
						var strtemp = $('#OMR_result_declare').html(data);
						$("#OMR_result").show();
						eval(strtemp);
					}
				});
				$("#re_test_score").show();
				$("#OMR_View_Result").hide();
				
			});
			
			<!--   rating -->
			$.fn.raty.defaults.path = 'lib/img';

			$('.click_demo').raty({
				click: function(score, evt) {
					var filename = "query/insert_rating.php?wb_id="+$(this).attr('id')+"&score="+score+"&user_id="+u_id;
				//	alert(filename);
					getInsert(filename);
					alert("Rating Successful.");
				  //alert('ID: ' + $(this).attr('id') + "\nscore: " + score + "\nevent: " + evt.type);
				}
			});
			
		<!--  Timer coding -->
			var omr_start_time = "";
			
			$("#start").click(function(){
			
				var nwDT_3 = new Date();
				var nw_DT_3 = nwDT_3.today() + " " + nwDT_3.timeNow();
				omr_start_time = nw_DT_3;
			//	alert(omr_start_time);
				
				filename = "omr_details/insert_start_time.php?mat_id="+nm+"&stud_id="+u_id+"&st_time="+omr_start_time;
				//alert(filename);
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					success: function(data, textStatus, xhr) {
						$('#last_id_omr_starting_time').val(data);
					}
				});
					
				if(tester_get == 0)
				{
					$("#Show_OMR_Div").show();
					$(".sub_tr1").hide();
					$(".sub_tr2").hide();
					$(".sub_tr3").hide();
					
				}
				else
				{
					
					$(".sub_tr1").hide();
					$(".sub_tr2").hide();
					
				
					t_t = $("#sel").val();
				//	alert(t_t);
					var d1 = new Date (),
						d2 = new Date ( d1 );
						
					if(t_t == 5)
					{					d2.setMinutes(d1.getMinutes() + 5);				}
					else if(t_t == 10)
					{					d2.setMinutes(d1.getMinutes() + 10);				}
					else if(t_t == 15)
					{					d2.setMinutes(d1.getMinutes() + 15);				}
					else if(t_t == 20)
					{					d2.setMinutes(d1.getMinutes() + 20);				}
					else if(t_t == 25)
					{					d2.setMinutes(d1.getMinutes() + 25);				}
					else if(t_t == 30)
					{					d2.setMinutes(d1.getMinutes() + 30);				}
					else if(t_t == 35)
					{					d2.setMinutes(d1.getMinutes() + 35);				}
					else if(t_t == 40)
					{					d2.setMinutes(d1.getMinutes() + 40);				}
					else if(t_t == 45)
					{					d2.setMinutes(d1.getMinutes() + 45);				}
					else if(t_t == 50)
					{					d2.setMinutes(d1.getMinutes() + 50);				}
					else if(t_t == 55)
					{					d2.setMinutes(d1.getMinutes() + 55);				}
					else if(t_t == 60)
					{					d2.setMinutes(d1.getMinutes() + 60);				}
					else if(t_t == 75)
					{					d2.setMinutes(d1.getMinutes() + 75);				}
					else if(t_t == 90)
					{					d2.setMinutes(d1.getMinutes() + 90);				}
					else if(t_t == 105)
					{					d2.setMinutes(d1.getMinutes() + 105);				}
					else if(t_t == 120)
					{					d2.setMinutes(d1.getMinutes() + 120);				}
					else if(t_t == 135)
					{					d2.setMinutes(d1.getMinutes() + 135);				}
					else if(t_t == 150)
					{					d2.setMinutes(d1.getMinutes() + 150);				}
					else if(t_t == 165)
					{					d2.setMinutes(d1.getMinutes() + 165);				}
					else				{					//page refresh....
					}
					
					$("#Show_OMR_Div").show();
					alert("Your test start. Best of luck.");

					var today = moment(d2);
					var date_time = today.format("D MMMM YYYY HH:mm:ss");
				//	alert(date_time);
					
				//	var setTime = '17 june 2013 18:15:00';
					var setTime = date_time;
					$(".sub_tr3").show();
					$("#countdown1").countdown({
					date: setTime,
					format: "on"
					},
					function() {
						// callback function   new Date();
					//	alert("finish thayuuu");
						var last_id_omr = $('#last_id_omr_starting_time').val();
						var nwDT_4 = new Date();
						var nw_DT_4 = nwDT_4.today() + " " + nwDT_4.timeNow();
						omr_end_time = nw_DT_4;
						
						filename = "omr_details/insert_end_time.php?lt_id="+last_id_omr+"&end_time="+omr_end_time;
				//		alert(filename);
						$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							success: function(data, textStatus, xhr) {
								//$('#last_id_omr_starting_time').val(data);
							}
						});
						
						
						check_student_id = "";
						var idArray2 = [];
						$("#student_come input:checkbox").each(function() {
							if ($(this).is(":checked"))
							{
								idArray2.push(this.id);
							}
						});
						check_student_id = idArray2;
				/*		if(check_student_id == "")
						{
							alert("Please give proper test");
						}
						else
						{
					*/
							$("#OMR_answer_submit").hide();
							var nw = ""+check_student_id+"";
							var array = nw.split(',');
							for (var i in array){
								if(i >= 0)
								{
									var array2 = array[i].split('-');
									for (var j in array2){
										var gh=array2[0];
										var gh2 = array2[1];	
									}
									filename = "query/insert_OMR_response.php?material_id="+nm+"&qno="+gh+"&response="+gh2;
								//	alert(filename);
									$.ajax({
										url: filename,
										type: 'GET',
										dataType: 'html',
										success: function(data, textStatus, xhr) {
										//	alert(data);
										}
									});
								}
								else
								{
									alert("Insert data");
								}
							}
							
							alert("Your time is over!!!");
							
							setTimeout(function(){
								$("#OMR_View_Result").show();
							}, 3000);
							alert("Plese click on view result button for your test result");
				//		}
						
					});
				}
				
			});

			$('input[type="radio"][name="tester"]').click(function(){
			
				var tester = $("input[type='radio'][name='tester']:checked");
				if (tester.length > 0)
				tester_get = tester.val();
			//	alert(tester_get);
				
				if(tester_get == "1")
				{
					// with timer alert("1");
					$("#Show_OMR_Div").hide();
					$(".sub_tr2").show();
					$(".sel").show();
					$("#start").show();
				}
				else if(tester_get == "0")
				{
					//without timer alert("0");
					$("#Show_OMR_Div").hide();
					$(".sub_tr2").show();
					$(".sel").hide();
					$("#start").show();
					
				}
			});
			
	<!--	Time table with rating	-->
			var tt_id = "";
			$('#prev_lect_tt').click(function() {
				tt_id = 1;
				filename = "query/time_table_get.php?tt_id="+tt_id;
			//	alert(filename);
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					success: function(data, textStatus, xhr) {
						var strtemp = $("#time_table_table_tt").html(data);
						//eval(strtemp);
					}
				});
			});
			$('#td_lect_tt').click(function() {
				tt_id = 0;
				filename = "query/time_table_get.php?tt_id="+tt_id;
			//	alert(filename);
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					success: function(data, textStatus, xhr) {
						var strtemp = $("#time_table_table_tt").html(data);
						//eval(strtemp);
					}
				});
			});
			
	<!--	Re-Test and privious score -->

			$('#tke_reset').click(function() {
				
				filename = "omr_details/re_test.php?stud_id="+u_id+"&mat_id="+nm;
			//	alert(filename);
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					success: function(data, textStatus, xhr) {
							alert(data);
					}
				});
				setTimeout(function(){
					location.reload();
				}, 1000);
				
			});
			
			$('#view_prvs_score').click(function() {
				var url = "view_OMR_test_history.php?stud_id="+u_id+"&mat_id="+nm+"&mat_nm="+sl;
				window.open(url, 'View Previous Score', 'height=600,width=860,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=no,menubar=no,location=no,directories=no,status=no');
			});
			$("#given_test_id").hide();
	<!--	Finishhh	Re-Test and privious score -->
			
			
			<!--  Online Omr	-->
			$('#OMR_online_answer_submit').click(function() {
			
				var x1;
				var r1=confirm("Are you sure end test?");
				if (r1==true)
				{
					alert("Final Submission.");
					var newDate1 = new Date();
					var datetime1 = newDate1.today() + " " + newDate1.timeNow();
					online_end_time = datetime1;
				//	alert("ending..."+online_end_time);
					
					mat_id2 = $('#mat_online_purpose').val();
					
					filename = "online_query/insert_end_time.php?student_id="+u_id+"&mat_id="+mat_id2+"&end_time="+online_end_time;
				//		alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						success: function(data, textStatus, xhr) {
							//var strtemp = $("#dv1").html(data);
							//eval(strtemp);
						}
					});
					final_submission = 1;
					$("#loadingDiv").css({
						position:'absolute', //or fixed depending on needs
					//	top: $(window).scrollTop(), // top pos based on scoll pos
						left: 0,
						height: '100%',
						width: '100%'
					});
					
					$("#online_main_page_td").hide();
					$("#menubar_ul").show();
					$("#doc34").hide();
					$("#plan").hide();
					$("#OMR_online_answer_submit").hide();
					
					$("#loadingDiv").show();
					check_student_id_1 = "";
					var idArray4 = [];
					$("#student_come_online_test input:checkbox").each(function() {
						if ($(this).is(":checked"))
						{
							idArray4.push(this.id);
						}
					});
					check_student_id_1 = idArray4;
						$("#OMR_online_answer_submit").hide();
						var nw_1 = ""+check_student_id_1+"";
						var array1 = nw_1.split(',');
						for (var i in array1)
						{
							if(i >= 0)
							{
								var array4 = array1[i].split('-');
								for (var j in array4)
								{
									var gh_1=array4[0];
									var gh2_1 = array4[1];	
								}
								filename = "online_query/insert_online_test_response.php?online_id="+mat_id2+"&qno="+gh_1+"&response="+gh2_1+"&sid="+u_id;
							//	alert(filename);
								$.ajax({
									url: filename,
									type: 'GET',
									dataType: 'html',
									success: function(data, textStatus, xhr) {
									//	alert(data);
									}
								});
							}
							else
							{
								alert("Insert data");
							}
						}
					alert("Please wait for few minute.");
					setTimeout(function(){
						location.reload();
					}, 5000);
				}
				else
				{
					x1="You pressed Cancel!";
				}
			});
			$('#sb1').change(function() {
			
				sb=$("#sb1").val();
				filename = "filter/chapter_display.php?sub_id="+sb;
				//alert(filename);
				getContent(filename, "cp1");
			});
			$('#cp1').change(function() {
				cp1=$("#cp1").val();
				//alert(cp1);
			});
			$('#dc1').change(function() {
				dc1=$("#dc1").val();
			});
			$('#ok_bt').click(function() 
			{
				ok_bt_call=$("#ok_bt").val();
				//alert("click button"+ok_bt_call);
				if(sb == "")
				{
					alert("Please select subject")
				}
				else
				{
					LoadBatchAssignmentsByDefault();
					LoadBatchPersonalByDefault();
					LoadobjectiveByDefault();
					LoadsubjectiveByDefault();
					LoadnoteByDefault();
				}
			});
		});
		</script> 
		 <script>
			$(function() {
			$( "#tabs" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
			$( "#tabs li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
			
			});
		</script>		
	</head>
	<body oncontextmenu="return false">
		<?php 
			
			$result=mysql_query("SELECT NAME AS group_name FROM `group` WHERE id=".$s3);
			$result1=mysql_query("Select name as batch_name from batch where id=".$s4);
			$result2=mysql_query("SELECT NAME as standard_name FROM standard WHERE id=".$s2);
			
			$row=mysql_fetch_array($result);
			if($row)
			{
				$grp1 = $row['group_name'];
			}
		
			$row1=mysql_fetch_array($result1);
			if($row1)
			{
				$btch1 = $row1['batch_name'];
			}	
			$row2=mysql_fetch_array($result2);
			if($row2)
			{
				$std2 = $row2['standard_name'];
			}	
		?>
			<?php require 'header4.php'; ?>
			<?php 
				$result=mysql_query("SELECT id,filter FROM filter_student_viewer where id='1'");
				$row=mysql_fetch_row($result);
				$filter_value=$row[1];
				
				if($filter_value == "false")
				{
					
				}
				else
				{?>
					<div id="filter_sub_chap" style="padding-left:10px;float:left;">
						<table class="lg-container" style="border:solid 0px;padding-top:10px;width: 1015px;">
							<tr>
								<td style="float:left;"><b>Subject</b></td>
								<td style="float:left;">
								<select name="sb1" id="sb1" style="width:135px;">
								<?php
									$result=mysql_query("SELECT id,NAME FROM detail WHERE content='Subject'");
									$rw = mysql_num_rows($result);
									if($rw == 0)
									{
										echo "<option value='0'>No Data Available.</option>";
									}
									else
									{
										echo "<option value=''>---Select Subject---</option>";
										while($row=mysql_fetch_array($result))
										{
											echo "<option value=$row[0]>$row[1]</option>";
										}
									}
								?>
								</select></td>
								<td style="padding-left:20px;float:left;"><b>Chapter</b></td>
								<td style="float:left;">
								<select name="cp1" id="cp1" style="width:155px;">
								</select></td>
								<!--<td style="padding-left:20px;float:left;"><b>Type of Documents</b></td>
								<td style="float:left;">
								<select name="dc1" id="dc1" style="width:135px;">
								
								</select>-->
								</td>
								<!--<td style="padding-left:20px;float:left;"><b>To</b></td>
								<td style="float:left;"><input type="text" style="width:80px;"id="datepicker3" value="<?php echo $today ?>" /></td>
								<td style="padding-left:20px;float:left;"><b>From</b></td>
								<td style="float:left;"><input type="text" style="width:80px;" id="datepicker4" value="<?php echo $today ?>" /></td>-->
								<td style="padding-left:0px;float:left"><input type="BUTTON" name="ok_bt" id="ok_bt" value="OK" class="defaultbutton"></td>
							</tr>
						</table>
					</div><?php
				}
			?>
	<table style="border:solid 1px;width:1290px;" align="left">
		<tr>
			<td style="padding-left:20px;float:left"><input type="BUTTON" name="print_bt" id="print_bt" value="Add this document to print-list" class="defaultbutton"></td>
		</tr>
		<tr>
			<td style="width:100%;">	<!--	style="border:1px solid blue;"	-->
				<table style="width:100%;">
				<tr>
			<td style="width:80%;">
				<?php
					include 'viewer_tab/tab.php';
				?>
				<?php
					if($filter_value == "false")
					{
						include 'viewer_screen/viewer1.php';
					}
					else
					{
						include 'viewer_screen/viewer2.php';
					}
				?>
			</td>
			<td style="">
				<?php include 'viewer_tab/tt_omr.php';?>
			</td>
				</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td><!--style="border:1px solid blue;"-->
				<table align="left">
					<tr>
						<td id="re_test_score">
							<input type="button" id="tke_reset" class="defaultbutton" style="color:blue;" value="Take Re-Test" />
							<br/><br/>
							<input type="button" id="view_prvs_score" class="defaultbutton" style="color:blue;" value="View Previous Score" />
						</td>
						<td style="">
						<div id="OMR_result" style="">
							<div id="OMR_result_declare">
							</div>
						</div>
						</td>
					</tr>
					<tr>
						<td>
						<input type="button" id="given_test_id" class="defaultbutton" style="color:blue;" value="Take Retest" />
						<br/><br/></td>
						<td>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td>
				<label>Copyright &copy Edutech Educational Services Pvt. Ltd. </label>
			</td>
		</tr>
	</table>
	<input type="hidden" id="last_id_omr_starting_time" value="" />
	</body>
</html>