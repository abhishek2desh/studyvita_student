<?php
	include_once 'config.php';
	session_start();
	$today34 = date("d-m-Y", strtotime('today'));
	$today = date("Y-m-d", strtotime('today'));
	$today2 = date("l, d F, Y", strtotime('today'));
	$_SESSION['today_dt_session'] = $today;
	$user5="";
	$user5=$_GET['user_id'];
	$_SESSION['check_user']=$user5;
	$checked_val=0;
	if($user5 == "")
	{
		include('lock.php');
		$user=$_SESSION['username'];
		$s1=$_SESSION['studid1'];
		$s2=$_SESSION['stnd1'];
		$s3=$_SESSION['grp1'];	
		$s4=$_SESSION['btch1'];
		$s5=$_SESSION['sid'];
		$u5 = $_SESSION['uname'];
		$board1 = $_SESSION['board'];
		$branch = $_SESSION['branch'];
	}
	else
	{
		$_SESSION['user'] = $user5;
		$result_fetch=mysql_query("SELECT edutech_student_id,group_id,standard_id,board_id,batch_id,branch_id,sname
							FROM student_details WHERE user_id='$user5'");
		
		$row_result=mysql_fetch_array($result_fetch);
		$s1=$row_result[0];
		$s3=$row_result[1];
		$s2=$row_result[2];
		$s4=$row_result[4];
		$board1=$row_result[3];
		$branch=$row_result[5];
		$u5=$row_result[6];
		$s5=$user5;
		$_SESSION['sid'] = $s5;
		$_SESSION['studid1'] = $s1;
		$_SESSION['grp1'] = $s3;
		$_SESSION['stnd1'] = $s2;
		$_SESSION['btch1'] = $s4;
		$_SESSION['board'] = $board1;
		$_SESSION['branch'] = $branch;
		$_SESSION['uname'] = $u5;
		$_SESSION['username']=$u5;
	}
?>
<!doctype html>
<html>
	<head>
		
		<title>Welcome <?php echo $u5 ?></title>
		
		<SCRIPT type="text/javascript">
		</SCRIPT>
		<link rel="shortcut icon" href="images/Edutechheader.ico" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8; NO-CACHE;" />
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
	
			html, body	{ height:100%;width:100%; }
			body { margin:0; overflow:auto; }
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
		<link rel="stylesheet" href="css/bg.css" />  
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
		<link href="menu.css" rel="stylesheet" type="text/css" />
		<!-- five star -->
		<script type="text/javascript" src="lib/jquery.raty.min.js"></script>
		<!--	Timer  -->
		<link rel="stylesheet" href="css/styles2.css" />
		<script src="js/countdown.js"></script>
		<script src="js/moment.js"></script>
		<link rel="stylesheet" type="text/css" media="screen" href="jq_grid/ui.jqgrid.css" />
	<!--	<script src="js/jquery-1.7.2.min.js" type="jq_grid/javascript"></script>	-->
		<script src="js/grid.locale-en.js" type="jq_grid/javascript"></script>
		<script src="js/jquery.jqGrid.min.js" type="jq_grid/javascript"></script>
		
	<!-- Date and Time	-->
		<script type="text/javascript" src="js/date_time.js"></script>
		<style>
			#menu a.clicked {
				background: yellow;
			}
		</style>
		<script> 
		$(document).ready(function(){
		
		var first_paper = "Paper2";
		
		var groupid = "";
		var nm = "";
		var sl = "";
		var sub_id = "";
		var tl = "";
		today_time_get1='<?php echo $today34; ?>';
		$("#time_get_today").html(today_time_get1);
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
		var group_id='<?php echo $s3; ?>';
		var subject34="";
		var inc=1,submit_val="";
		var op_val="",get_val_demo="";
		var op_val_check="";
		var mat_type_id_block="";
		var search_mat="";
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
		demo_run();
		$("#OMR_online_View_Result").hide();
		$("#OMR_online_answer_submit").hide();
		
		$("#online_main_page_td").hide();
				
			LoadobjectiveByDefault();
			//LoadBatchAssignmentsByDefault();mouse_over
			$('select').mouseover(function(e){
			  var $target = $(e.target); 
				 if($target.is('option')){
					//alert($target.text());
					$("#mouse_over").html($target.text());
					$("option").css("background-color","white");
					$target.css("background-color","yellow");
					//$(this).css("color","green");
					//$("option:selected", this).css("color","green");
					//Will alert the text of the option
				 }
			});
			function LoadBatchAssignmentsByDefault()
			{	
				tab = 1001;
				var bio_block="s1",chem_block="s7",phy_block="s5",mat_block="s3",sci_block="s9",eng_block="s11",ss_block="s12",all_block="s13",sol_block="s14";
				mat_type_id_block = 1;
				//ok_bt_call="cancel";
				if(group_id == '9')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=15";
					getContent(filename, mat_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=16";
					getContent(filename, phy_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=17";
					getContent(filename, chem_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query9.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '10')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=14";
					getContent(filename, bio_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=16";
					getContent(filename, phy_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=17";
					getContent(filename, chem_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query9.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '11')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=15";
					getContent(filename, mat_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=14";
					getContent(filename, bio_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=16";
					getContent(filename, phy_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=17";
					getContent(filename, chem_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query9.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '12')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=15";
					getContent(filename, mat_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=18";;
					getContent(filename, sci_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '13')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=19";
					getContent(filename, eng_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=22";
					alert(filename);
					getContent(filename, ss_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '21')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=15";
					getContent(filename, mat_block);
					//alert(filename);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=18";;
					getContent(filename, sci_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=19";
					getContent(filename, eng_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=22";;
					getContent(filename, ss_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query.php?dt=a";
					getContent(filename,sol_block);
				}
				
			}
			function LoadBatchPersonalByDefault()
			{	
				tab = 1002;
				var bio_block="p1",chem_block="p7",phy_block="p5",mat_block="p3",sci_block="p9",eng_block="p11",ss_block="p12",all_block="p13",sol_block="p14";
				mat_type_id_block = 2;
				if(group_id == '9')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=15";
					getContent(filename, mat_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=16";
					getContent(filename, phy_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=17";
					getContent(filename, chem_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query9.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '10')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=14";
					getContent(filename, bio_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=16";
					getContent(filename, phy_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=17";
					getContent(filename, chem_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query9.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '11')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=15";
					getContent(filename, mat_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=14";
					getContent(filename, bio_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=16";
					getContent(filename, phy_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=17";
					getContent(filename, chem_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query9.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '12')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=15";
					getContent(filename, mat_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=18";;
					getContent(filename, sci_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '13')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=19";
					getContent(filename, eng_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=22";;
					getContent(filename, ss_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '21')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=15";
					getContent(filename, mat_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=18";;
					getContent(filename, sci_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=19";
					getContent(filename, eng_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=22";;
					getContent(filename, ss_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query.php?dt=a";
					getContent(filename,sol_block);
				}
			}
			function assignment_Objective()
			{
				tab = 1010;
				//alert(tab);
				var bio_block="os1",chem_block="os7",phy_block="os5",mat_block="os3",sci_block="os9",eng_block="os11",ss_block="os12",all_block="os13",sol_block="os14";
				mat_type_id_block = 10;
				//ok_bt_call="cancel";
				if(group_id == '9')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=15";
					getContent(filename, mat_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=16";
					getContent(filename, phy_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=17";
					getContent(filename, chem_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query9.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '10')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=14";
					getContent(filename, bio_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=16";
					getContent(filename, phy_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=17";
					getContent(filename, chem_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query9.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '11')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=15";
					getContent(filename, mat_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=14";
					//alert(filename);
					getContent(filename, bio_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=16";
					getContent(filename, phy_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=17";
					getContent(filename, chem_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query9.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '12')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=15";
					getContent(filename, mat_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=18";;
					getContent(filename, sci_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '13')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=19";
					getContent(filename, eng_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=22";;
					getContent(filename, ss_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '21')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=15";
					getContent(filename, mat_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=18";;
					getContent(filename, sci_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&subject34=19";
					getContent(filename, eng_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=22";;
					getContent(filename, ss_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query.php?dt=a";
					getContent(filename,sol_block);
				}
			}
			
			function LoadobjectiveByDefault()
			{	
				tab = 1004;
				mat_type_id_block = 25;
				var bio_block="o1",chem_block="o7",phy_block="o5",mat_block="o3",sci_block="o9",eng_block="o11",ss_block="o12",all_block="o13",sol_block="o14";
				if(group_id == '9')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=15";
					getContent(filename, mat_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=16";
					getContent(filename, phy_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=17";
					getContent(filename, chem_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query9.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '10')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=14";
					getContent(filename, bio_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=16";
					getContent(filename, phy_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=17";
					getContent(filename, chem_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query9.php?dt=a";
					//alert(filename);
					getContent(filename,sol_block);
				}
				else if(group_id == '11')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=15";
					getContent(filename, mat_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=14";
					getContent(filename, bio_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=16";
					getContent(filename, phy_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=17";
					getContent(filename, chem_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query9.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '12')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=15";
					getContent(filename, mat_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=18";;
					getContent(filename, sci_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '13')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=19";
					getContent(filename, eng_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=22";;
					getContent(filename, ss_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '21')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=15";
					getContent(filename, mat_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=18";;
					getContent(filename, sci_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=19";
					getContent(filename, eng_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=22";;
					getContent(filename, ss_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query.php?dt=a";
					getContent(filename,sol_block);
				}
			}
			function LoadsubjectiveByDefault()
			{	
				tab = 1005;
				mat_type_id_block = 26;
				var bio_block="tp1",chem_block="tp7",phy_block="tp5",mat_block="tp3",sci_block="tp9",eng_block="tp11",ss_block="tp12",all_block="tp13",sol_block="tp14";
				if(group_id == '9')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=15";
					getContent(filename, mat_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=16";
					getContent(filename, phy_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=17";
					getContent(filename, chem_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query9.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '10')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=14";
					getContent(filename, bio_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=16";
					getContent(filename, phy_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=17";
					getContent(filename, chem_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query9.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '11')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=15";
					getContent(filename, mat_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=14";
					getContent(filename, bio_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=16";
					getContent(filename, phy_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=17";
					getContent(filename, chem_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query9.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '12')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=15";
					getContent(filename, mat_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=18";;
					getContent(filename, sci_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '13')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=19";
					getContent(filename, eng_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=22";;
					getContent(filename, ss_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '21')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=15";
					getContent(filename, mat_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=18";;
					getContent(filename, sci_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=19";
					getContent(filename, eng_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=22";;
					getContent(filename, ss_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query.php?dt=a";
					getContent(filename,sol_block);
				}
			}
			function LoadnoteByDefault()
			{
				tab = 1006;
				mat_type_id_block = 8;
				var bio_block="nt1",chem_block="nt7",phy_block="nt5",mat_block="nt3",sci_block="nt9",eng_block="nt11",ss_block="nt12",all_block="nt13",sol_block="nt14";
				if(group_id == '9')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=15";
					getContent(filename, mat_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=16";
					getContent(filename, phy_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=17";
					getContent(filename, chem_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query9.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '10')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=14";
					getContent(filename, bio_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=16";
					getContent(filename, phy_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=17";
					getContent(filename, chem_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query9.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '11')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=15";
					getContent(filename, mat_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=14";
					getContent(filename, bio_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=16";
					getContent(filename, phy_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=17";
					getContent(filename, chem_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query9.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '12')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=15";
					getContent(filename, mat_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=18";;
					getContent(filename, sci_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '13')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=19";
					getContent(filename, eng_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=22";;
					getContent(filename, ss_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '21')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=15";
					getContent(filename, mat_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=18";;
					getContent(filename, sci_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=19";
					getContent(filename, eng_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=22";;
					getContent(filename, ss_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query.php?dt=a";
					getContent(filename,sol_block);
				}
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
			function display_viewer(mat_name)
			{
				filename = "query/get_material_path.php?mn="+mat_name;
				//alert(filename);
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					success: function(data, textStatus, xhr) {
						//alert(data);
					},
				});
				filename = "query/copy_location.php?mn="+mat_name;
				//alert(filename);
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					
					success: function(data, textStatus, xhr) {
						//alert(data);
					},
				});
				callFlexPaperDocViewer(mat_name);
			}
			function print_manager(material_name)
			{
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
			function demo_run()
			{
				filename1 = "query/51_role_demo_assign.php?uid="+u_id;
				//alert("query Run : "+filename1);
				$.ajax({
					url: filename1,
					type: 'GET',
					dataType: 'html',
					success: function(data, textStatus, xhr) {
						//alert(data);
						get_val_demo=data;
						if(get_val_demo == 1)
						{
							$("#filter_sub_chap").hide();
						}
					}
				});
			}
			function check_view_material(op_val)
			{
				filename1 = "query/51_role_demo_assign.php?uid="+u_id;
				//alert("query Run : "+filename1);
				$.ajax({
					url: filename1,
					type: 'GET',
					dataType: 'html',
					success: function(data, textStatus, xhr) {
						//alert(data);
						get_val_demo=data;
						if(get_val_demo == 1)
						{
							//$("#filter_sub_chap").hide();
							if(op_val >= '1')
							{
								//alert("op_val if"+op_val);
								display_viewer("demo1.pdf");
								//alert("o14");
								$("#o14").empty();	
							}
							else if(op_val == '0')
							{
								//alert("else if"+op_val);
								display_viewer(sl);
							}
							else
							{
								//alert("else"+op_val);
								display_viewer(sl);
							}
						}
						else
						{
							display_viewer(sl);
						}
					}
				});
				//op_val=$("#s1")[0].selectedIndex;
				/*if(op_val >= '1' && (u_id == '4456') || (u_id == '4457') || (u_id == '4458') || (u_id == '4459'))*/
			}
			function material_paper(nm1)
			{
				var mySplitResult = nm1.split("-");
				nm="";
				nm=mySplitResult[0];
				sl=mySplitResult[1];
				//alert(nm);
				//alert(sl);
			}
			<!--	Biology		-->	
			$("#p1,#o1,#s1,#os1").change(function(){
				//nm="";
				hide_div_sub_tr();
				//$("#p13,#o13,#t13,#tp13,#s13,#nt13").val([ ]);
				$("#p3,#o3,#s3").val([ ]);
				$("#p5,#o5,#s5").val([ ]);
				$("#p7,#o7,#s7").val([ ]);
				$("#p9,#o9,#s9").val([ ]);
				$("#p11,#o11,#s11").val([ ]);
				$("#p12,#o12,#s12").val([ ]);
				nm = $(this).val();	
				//alert(nm);
				material_paper(nm);
				//sl = ($("option:selected", this).text());
				//alert(nm);
				//alert(sl);
				////alert(nm);
				filename = "query/check_mat_type.php?mat_id="+nm;
				//alert(filename);
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					success: function(data, textStatus, xhr) {
						ck_mat_type = data;
						//alert("in ajax..."+ck_mat_type);
						if(tab == 1001)
						{
							//alert(tab);
							tb=$("#s1")[0].selectedIndex;
							check_view_material($("#s1")[0].selectedIndex);
						}
						else if(tab == 1002)
						{
							//alert(tab);
							tb=$("#p1")[0].selectedIndex;
							check_view_material($("#p1")[0].selectedIndex);
						}
						else if(tab == 1004)
						{
							//alert(op_val);
							tb=$("#o1")[0].selectedIndex;
							check_view_material($("#o1")[0].selectedIndex);
						}
						else if(tab == 1010)
						{
							//alert(op_val);
							tb=$("#os1")[0].selectedIndex;
							check_view_material($("#os1")[0].selectedIndex);
						}
						$("#Show_OMR_Div").hide();
						$("#OMR_result").hide();
						
						//alert("Processing please wait...");
						alert("Please click ok to continue....");
						if(cntr == 0)
						{
							alert(sl);
							cntr++;
						}
						else
						{
							cntr = cntr;
						}
						//alert(sl+nm);
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
								}
							});
							$("#os14").empty();
							setTimeout(function(){
								//alert("out"+nm);
								Check_OMR_sheet_And_response(nm,tab,sl);
							}, 6000);
						}
						else
						{
							//alert("Please Select next time");
						}
					}
				});
				//callFlexPaperDocViewer(sl);
				//display_viewer(sl);
				//alert(s1);
				
				//filename = "query/query9.php?dt="+nm;
				//alert(filename);
				//getContent(filename,"o14");
			});
		<!--	Math	-->	
			$("#p3,#o3,#s3,#os3").change(function(){
			
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
				material_paper(nm);
				//sl = ($("option:selected", this).text());
		//		alert(sl);
				//check_view_material($("#p3,#o3,#s3")[0].selectedIndex);
				filename = "query/check_mat_type.php?mat_id="+nm;
				//alert(filename);
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					success: function(data, textStatus, xhr) {
						//alert(data);
						ck_mat_type = data;
						//alert("in ajax..."+ck_mat_type);
						if(tab == 1001)
						{
							tb=$("#s3")[0].selectedIndex;
							//alert(tb);
							check_view_material($("#s3")[0].selectedIndex);
						}
						else if(tab == 1002)
						{
							tb=$("#p3")[0].selectedIndex;
							check_view_material($("#p3")[0].selectedIndex);
						}
						else if(tab == 1004)
						{
							//alert(tab);
							tb=$("#o3")[0].selectedIndex;
							//alert(tb);
							check_view_material($("#o3")[0].selectedIndex);
						}
						else if(tab == 1010)
						{
							//alert(op_val);
							tb=$("#os3")[0].selectedIndex;
							check_view_material($("#os3")[0].selectedIndex);
						}
						$("#Show_OMR_Div").hide();
						$("#OMR_result").hide();
						
						//alert("Processing please wait...");
						alert("Please click ok to continue....");
						if(cntr == 0)
						{
							alert(sl);
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
							$("#p14,#o14,#s14,#os14").empty();				
							setTimeout(function(){
								Check_OMR_sheet_And_response(nm,tab,sl);
							}, 6000);
						}
						else
						{
							//alert("Please Select next time");
						}
					}
				});
				//callFlexPaperDocViewer(sl);
			});			  
		<!--	Physics	-->	
		  $("#p5,#o5,#s5,#os5").change(function(){
		  
				hide_div_sub_tr();
				$("#p1,#o1,#s1").val([ ]);
				$("#p3,#o3,#s3").val([ ]);
		//		$("#p13,#o13,#t13,#tp13,#s13,#nt13").val([ ]);
				$("#p7,#o7,#s7").val([ ]);
				$("#p9,#o9,#s9").val([ ]);
				$("#p11,#o11,#s11").val([ ]);
				$("#p12,#o12,#s12").val([ ]);
								
				nm = $(this).val();	
				//alert(nm);
				material_paper(nm);
				//sl = ($("option:selected", this).text());
				//alert(sl);
				//display_viewer(sl);
				//check_view_material($("#p5,#o5,#s5")[0].selectedIndex);
				filename = "query/check_mat_type.php?mat_id="+nm;
				//alert(filename);
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					success: function(data, textStatus, xhr) {
						ck_mat_type = data;
						//alert("in ajax..."+ck_mat_type);
						if(tab == 1001)
						{
							//alert(tab);
							tb=$("#s5")[0].selectedIndex;
							check_view_material($("#s5")[0].selectedIndex);
						}
						else if(tab == 1002)
						{
							tb=$("#p5")[0].selectedIndex;
							check_view_material($("#p5")[0].selectedIndex);
						}
						else if(tab == 1004)
						{
							tb=$("#o5")[0].selectedIndex;
							check_view_material($("#o5")[0].selectedIndex);
						}
						else if(tab == 1010)
						{
							//alert(op_val);
							tb=$("#os5")[0].selectedIndex;
							check_view_material($("#os5")[0].selectedIndex);
						}
						$("#Show_OMR_Div").hide();
						$("#OMR_result").hide();
						//alert("Processing please wait...");
						alert("Please click ok to continue....");
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
							
							$("#p14,#o14,#s14,#os14").empty();		
							setTimeout(function(){
								
								Check_OMR_sheet_And_response(nm,tab,sl);
							}, 6000);
						}
						else
						{
							//alert("Please Select next time");
						}
					}
				});
				//callFlexPaperDocViewer(sl);
							
				
			});
		<!--	Chemistry	-->	
			$("#p7,#o7,#s7,#os7").change(function(){
			
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
				material_paper(nm);
				//sl = ($("option:selected", this).text());
		//		alert(sl);
				//display_viewer(sl);
				//check_view_material($("#p7,#o7,#s7")[0].selectedIndex);
				filename = "query/check_mat_type.php?mat_id="+nm;
		//		alert(filename);
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					success: function(data, textStatus, xhr) {
						ck_mat_type = data;
						if(tab == 1001)
						{
							tb=$("#s7")[0].selectedIndex;
							check_view_material($("#s7")[0].selectedIndex);
						}
						else if(tab == 1002)
						{
							tb=$("#p7")[0].selectedIndex;
							check_view_material($("#p7")[0].selectedIndex);
						}
						else if(tab == 1004)
						{
							tb=$("#o7")[0].selectedIndex;
							check_view_material($("#o7")[0].selectedIndex);
						}
						else if(tab == 1010)
						{
							//alert(op_val);
							tb=$("#os7")[0].selectedIndex;
							check_view_material($("#os7")[0].selectedIndex);
						}
						$("#Show_OMR_Div").hide();
						$("#OMR_result").hide();
						//alert("Processing please wait...");
						alert("Please click ok to continue....");
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
							
							$("#p14,#o14,#s14,#os14").empty();	
							setTimeout(function(){
								Check_OMR_sheet_And_response(nm,tab,sl);
							}, 6000);
						}
						else
						{
							//alert("Please Select next time");
						}
						//alert("in ajax..."+ck_mat_type);
					}
				});
				//callFlexPaperDocViewer(sl);
				
				//filename = "query/query9.php?dt="+nm;
				//alert(filename);
				//getContent(filename,"o14");
			});
			  
		<!--	Science	-->	
			$("#p9,#o9,#s9,#os9").change(function(){
			
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
				material_paper(nm);
				//sl = ($("option:selected", this).text());
				
		//		alert(sl);
				//display_viewer(sl);
				//check_view_material($("#p9,#o9,#s9")[0].selectedIndex);

				filename = "query/check_mat_type.php?mat_id="+nm;
		//		alert(filename);
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					success: function(data, textStatus, xhr) {
						ck_mat_type = data;
						//alert("in ajax..."+ck_mat_type);
						if(tab == 1001)
						{
							tb=$("#s9")[0].selectedIndex;
							check_view_material($("#s9")[0].selectedIndex);
						}
						else if(tab == 1002)
						{
							tb=$("#p9")[0].selectedIndex;
							check_view_material($("#p9")[0].selectedIndex);
						}
						else if(tab == 1004)
						{
							tb=$("#o9")[0].selectedIndex;
							check_view_material($("#o9")[0].selectedIndex);
						}
						else if(tab == 1010)
						{
							//alert(op_val);
							tb=$("#os9")[0].selectedIndex;
							check_view_material($("#os9")[0].selectedIndex);
						}
						$("#Show_OMR_Div").hide();
						$("#OMR_result").hide();
						
						//alert("Processing please wait...");
						alert("Please click ok to continue....");
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
							
							$("#p14,#o14,#s14,#os14").empty();				
							setTimeout(function(){
								Check_OMR_sheet_And_response(nm,tab,sl);
							}, 6000);
						}
						else
						{
							//alert("Please Select next time");
						}
					}
				});
				//callFlexPaperDocViewer(sl);
				
				//filename = "query/query9.php?dt="+nm;
				//alert(filename);
				//getContent(filename,"o14");
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
				//nm = $(this).val();	
				//		alert(nm);
				material_paper(nm);
				//alert(nm);
				//alert("op val : "+op_val_check);
				//alert("tb"+tb);
				if(get_val_demo == '1')
				{
					//alert(tb);
					if(tb >=1)
					{
					
					}
					else
					{
						filename = "query/query_material_for_objective.php?material_id="+nm;
						getContent(filename,"o14");
					}
				}
				else
				{
					filename = "query/query_material_for_objective.php?material_id="+nm;
					getContent(filename,"o14");
				}
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
				material_paper(nm);
				//alert(nm);
				if(get_val_demo == '1')
				{
					//alert(tb);
					if(tb >=1)
					{
					
					}
					else
					{
						filename = "query/query_material_for_objective.php?material_id="+nm;
						getContent(filename,"o14");
					}
				}
				else
				{
					filename = "query/query_material_for_objective.php?material_id="+nm;
					getContent(filename,"o14");
				}
			});
			function Check_OMR_sheet_And_response(material_id_get,tab,material_name)
			{
					//alert("Op_val : "+get_val_demo);
					if(get_val_demo == '1')
					{
						//alert(tb);
						if(tb >=1)
						{
						
						}
						else
						{
							filename = "query/query9.php?dt="+nm;
							getContent(filename,"o14");
						}
					}
					else
					{
						filename = "query/query9.php?dt="+nm;
						getContent(filename,"o14");
					}
					if(ck_omr == "Insert_Data")
					{
						$('input[name=tester]').attr('checked', false);
						$("#Show_OMR_Div").hide();
						$("#OMR_result").hide();
						alert("Load OMR Sheet.");
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
						alert("View Result..");
						filename = "query/query9.php?dt="+nm;
						getContent(filename,"os14");
						filename = "query/omr_result_check.php?material_id="+material_id_get;
						//alert(filename);
						$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							success: function(data, textStatus, xhr) {
								var strtemp = $('#OMR_result_declare').html(data);
								eval(strtemp);
								$("#re_test_score").show();
							}
						});
						subjective_sol(material_id_get);
					}
			}
			function Check_OMR_sheet_And_response2(material_id_get,tab,material_name)
			{
			//	setTimeout(function(){
			//	}, 2000);
				
					//alert("Load OMR Sheet or Result");
				
					if(ck_omr == "Insert_Data")
					{
						$("#Show_OMR_Div").hide();
						$("#OMR_result").hide();
						$(".sub_tr1").show();
						alert("Load OMR Sheet.");
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
						alert("View Result..");
						filename = "query/omr_result_check.php?material_id="+material_id_get;
						//alert(filename);
						$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							success: function(data, textStatus, xhr) {
								var strtemp = $('#OMR_result_declare').html(data);
								
								eval(strtemp);
								$("#re_test_score").show();
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
				//alert("Processing please wait...");
				alert("Please click ok to continue....");
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
					
					$("#p14,#o14,#s14,#os14").empty();		
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
				material_paper(nm);
				//alert(nm);
				if(get_val_demo == '1')
				{
					//alert(tb);
					if(tb >=1)
					{
					
					}
					else
					{
						filename = "query/query_material_for_objective.php?material_id="+nm;
						getContent(filename,"o14");
					}
				}
				else
				{
					filename = "query/query_material_for_objective.php?material_id="+nm;
					getContent(filename,"o14");
				}
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
				material_paper(nm);
				if(get_val_demo == '1')
				{
					//alert(tb);
					if(tb >=1)
					{
					
					}
					else
					{
						filename = "query/query_material_for_objective.php?material_id="+nm;
						getContent(filename,"o14");
					}
				}
				else
				{
					filename = "query/query_material_for_objective.php?material_id="+nm;
					getContent(filename,"o14");
				}
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
				material_paper(nm);
				//alert(nm);
				if(get_val_demo == '1')
				{
					//alert(tb);
					if(tb >=1)
					{
					
					}
					else
					{
						filename = "query/query_material_for_objective.php?material_id="+nm;
						getContent(filename,"o14");
					}
				}
				else
				{
					filename = "query/query_material_for_objective.php?material_id="+nm;
					getContent(filename,"o14");
				}
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
				material_paper(nm);
				//alert(nm);
				if(get_val_demo == '1')
				{
					//alert(tb);
					if(tb >=1)
					{
					
					}
					else
					{
						filename = "query/query_material_for_objective.php?material_id="+nm;
						getContent(filename,"o14");
					}
				}
				else
				{
					filename = "query/query_material_for_objective.php?material_id="+nm;
					getContent(filename,"o14");
				}
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
				material_paper(nm);
				if(get_val_demo == '1')
				{
					//alert(tb);
					if(tb >=1)
					{
					
					}
					else
					{
						filename = "query/query_material_for_objective.php?material_id="+nm;
						getContent(filename,"o14");
					}
				}
				else
				{
					filename = "query/query_material_for_objective.php?material_id="+nm;
					getContent(filename,"o14");
				}
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
				material_paper(nm);
				//alert(nm);
				if(get_val_demo == '1')
				{
					//alert(tb);
					if(tb >=1)
					{
					
					}
					else
					{
						filename = "query/query_material_for_objective.php?material_id="+nm;
						getContent(filename,"o14");
					}
				}
				else
				{
					filename = "query/query_material_for_objective.php?material_id="+nm;
					getContent(filename,"o14");
				}
			});
			$("#o14").change(function(){
				nm = $(this).val();	
				//alert("nm"+nm);
				sl = ($("option:selected", this).text());
				//alert("dc"+sl);
				display_viewer(sl);
				//callFlexPaperDocViewer(sl);
				//s1=$("#o14").text();
				//alert(s1);	
				//callFlexPaperDocViewer(sl);
				//sl = ($("option:selected", this).text());
				//alert(s1);	
			});
	<!--	English	-->	
			$("#p11,#o11,#s11,#os11").change(function(){
			
				hide_div_sub_tr();
				$("#p1,#o1,#s1").val([ ]);
				$("#p3,#o3,#s3").val([ ]);
				$("#p5,#o5,#s5").val([ ]);
				$("#p7,#o7,#s7").val([ ]);
				$("#p9,#o9,#s9").val([ ]);
		//		$("#p13,#o13,#t13,#tp13,#s13,#nt13").val([ ]);
				$("#p12,#o12,#s12").val([ ]);
				nm = $(this).val();	
				material_paper(nm);
		//		alert(nm);
				//sl = ($("option:selected", this).text());
		//		alert(sl);
				//display_viewer(sl);
				//check_view_material($("#p11,#o11,#s11")[0].selectedIndex);
				filename = "query/check_mat_type.php?mat_id="+nm;
		//		alert(filename);
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					success: function(data, textStatus, xhr) {
						ck_mat_type = data;
						//alert("in ajax..."+ck_mat_type);
						if(tab == 1001)
						{
							tb=$("#s11")[0].selectedIndex;
							check_view_material($("#s11")[0].selectedIndex);
						}
						else if(tab == 1002)
						{
							tb=$("#p11")[0].selectedIndex;
							check_view_material($("#p11")[0].selectedIndex);
						}
						else if(tab == 1004)
						{
							tb=$("#o11")[0].selectedIndex;
							check_view_material($("#o11")[0].selectedIndex);
						}
						else if(tab == 1010)
						{
							//alert(op_val);
							tb=$("#os11")[0].selectedIndex;
							check_view_material($("#os11")[0].selectedIndex);
						}
						$("#Show_OMR_Div").hide();
						$("#OMR_result").hide();
						
						//alert("Processing please wait...");
						alert("Please click ok to continue....");
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
							$("#p14,#o14,#s14,#os14").empty();			
							setTimeout(function(){
								Check_OMR_sheet_And_response(nm,tab,sl);
							}, 6000);
						}
						else
						{
							//alert("Please Select next time");
						}
					}
				});
				//callFlexPaperDocViewer(sl);
				
				//filename = "query/query9.php?dt="+nm;
				//alert(filename);
				//getContent(filename,"o14");
			});
			
	<!--	Social Study	-->	
			$("#p12,#p12,#s12,#os12").change(function(){
			
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
				material_paper(nm);
				//sl = ($("option:selected", this).text());
		//		alert(sl);
				//display_viewer(sl);
				//check_view_material($("#p12,#o12,#s12")[0].selectedIndex);
				filename = "query/check_mat_type.php?mat_id="+nm;
		//		alert(filename);
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					success: function(data, textStatus, xhr) {
						ck_mat_type = data;
						//alert("in ajax..."+ck_mat_type);
						if(tab == 1001)
						{
							tb=$("#s12")[0].selectedIndex;
							check_view_material($("#s12")[0].selectedIndex);
						}
						else if(tab == 1002)
						{
							tb=$("#p12")[0].selectedIndex;
							check_view_material($("#p12")[0].selectedIndex);
						}
						else if(tab == 1004)
						{
							tb=$("#o12")[0].selectedIndex;
							check_view_material($("#o12")[0].selectedIndex);
						}
						else if(tab == 1010)
						{
							//alert(op_val);
							tb=$("#os12")[0].selectedIndex;
							check_view_material($("#os12")[0].selectedIndex);
						}
						$("#Show_OMR_Div").hide();
						$("#OMR_result").hide();
						
						//alert("Processing please wait...");
						alert("Please click ok to continue....");
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
							
							$("#p14,#o14,#s14,#os14").empty();			
							setTimeout(function(){
								Check_OMR_sheet_And_response(nm,tab,sl);
							}, 6000);
						}
						else
						{
							//alert("Please Select next time");
						}
					}
				});
				//callFlexPaperDocViewer(sl);
				
				//filename = "query/query9.php?dt="+nm;
				//alert(filename);
				//getContent(filename,"o14");
			});
			  
	<!--	Combined	-->	
			$("#p13,#o13,#s13,#os13").click(function(){
			
				hide_div_sub_tr();
				$("#p1,#o1,#s1").val([ ]);
				$("#p3,#o3,#s3").val([ ]);
				$("#p5,#o5,#s5").val([ ]);
				$("#p7,#o7,#s7").val([ ]);
				$("#p9,#o9,#s9").val([ ]);
				$("#p11,#o11,#s11").val([ ]);
				$("#p12,#o12,#s12").val([ ]);
	
				nm = $(this).val();	
				material_paper(nm);
		//		alert(nm);
				//sl = ($("option:selected", this).text());
		//		alert(sl);
				//display_viewer(sl);
				check_view_material($("#p13,#o13,#s13")[0].selectedIndex);
				filename = "query/check_mat_type.php?mat_id="+nm;
		//		alert(filename);
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					success: function(data, textStatus, xhr) {
						ck_mat_type = data;
						//alert("in ajax..."+ck_mat_type);
						if(tab == 1001)
						{
							tb=$("#s13")[0].selectedIndex;
							check_view_material($("#s13")[0].selectedIndex);
						}
						else if(tab == 1002)
						{
							tb=$("#p13")[0].selectedIndex;
							check_view_material($("#p13")[0].selectedIndex);
						}
						else if(tab == 1004)
						{
							tb=$("#o13")[0].selectedIndex;
							check_view_material($("#o13")[0].selectedIndex);
						}
						else if(tab == 1010)
						{
							//alert(op_val);
							tb=$("#os13")[0].selectedIndex;
							check_view_material($("#os13")[0].selectedIndex);
						}
						$("#Show_OMR_Div").hide();
						$("#OMR_result").hide();
						
						//alert("Processing please wait...");
						alert("Please click ok to continue....");
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
							
							$("#p14,#o14,#s14,#os14").empty();			
							setTimeout(function(){
								Check_OMR_sheet_And_response(nm,tab,sl);
							}, 6000);
						}
						else
						{
							//alert("Please Select next time");
						}
					}
				});
				//callFlexPaperDocViewer(sl);
				
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
				material_paper(nm);
				//sl = ($("option:selected", this).text());
		//		alert(sl);
				//display_viewer(sl);
				tb=$("#t1")[0].selectedIndex;
				check_view_material($("#t1")[0].selectedIndex);
				//callFlexPaperDocViewer(sl);
				
			});
			$("#t3").change(function(){
			
				hide_div_sub_tr();
				$("#t1,#t5,#t7,#t9,#t11,#t12,#t13").val([ ]);
				
				nm = $(this).val();	
				material_paper(nm);
		//		alert(nm);
				//sl = ($("option:selected", this).text());
		//		alert(sl);
				tb=$("#t3")[0].selectedIndex;
				//display_viewer(sl);
				check_view_material($("#t3")[0].selectedIndex);
				//callFlexPaperDocViewer(sl);
				
			});
			$("#t5").change(function(){
			
				hide_div_sub_tr();
				$("#t1,#t3,#t7,#t9,#t11,#t12,#t13").val([ ]);
				
				nm = $(this).val();	
		//		alert(nm);
				material_paper(nm);
				//sl = ($("option:selected", this).text());
		//		alert(sl);
				//display_viewer(sl);
				tb=$("#t5")[0].selectedIndex;
				check_view_material($("#t5")[0].selectedIndex);
				//callFlexPaperDocViewer(sl);
				
			});
			$("#t7").change(function(){
			
				hide_div_sub_tr();
				$("#t1,#t3,#t5,#t9,#t11,#t12,#t13").val([ ]);
				
				nm = $(this).val();	
		//		alert(nm);
				sl = ($("option:selected", this).text());
		//		alert(sl);
				//display_viewer(sl);
				tb=$("#t7")[0].selectedIndex;
				check_view_material($("#t7")[0].selectedIndex);
				//callFlexPaperDocViewer(sl);
				
			});
			$("#t9").change(function(){
			
				hide_div_sub_tr();
				$("#t1,#t3,#t5,#t7,#t11,#t12,#t13").val([ ]);
				
				nm = $(this).val();	
		//		alert(nm);
				material_paper(nm);
				//sl = ($("option:selected", this).text());
		//		alert(sl);
				//display_viewer(sl);
				tb=$("#t9")[0].selectedIndex;
				check_view_material($("#t9")[0].selectedIndex);
				//callFlexPaperDocViewer(sl);
			});
			$("#t11").change(function(){
			
				hide_div_sub_tr();
				$("#t1,#t3,#t5,#t7,#t9,#t12,#t13").val([ ]);
				
				nm = $(this).val();	
		//		alert(nm);
				material_paper(nm);
				//sl = ($("option:selected", this).text());
		//		alert(sl);
				//display_viewer(sl);
				tb=$("#t11")[0].selectedIndex;
				check_view_material($("#t11")[0].selectedIndex);
				//callFlexPaperDocViewer(sl);
			});
			$("#t12").change(function(){
			
				hide_div_sub_tr();
				$("#t1,#t3,#t5,#t7,#t9,#t11,#t13").val([ ]);
				
				nm = $(this).val();	
				material_paper(nm);
		//		alert(nm);
				//sl = ($("option:selected", this).text());
		//		alert(sl);
				//display_viewer(sl);
				tb=$("#t12")[0].selectedIndex;
				check_view_material($("#t12")[0].selectedIndex);
				//callFlexPaperDocViewer(sl);
			});
			$("#t13").change(function(){
			
				hide_div_sub_tr();
				$("#t1,#t3,#t5,#t7,#t9,#t11,#t12").val([ ]);
				
				nm = $(this).val();
				material_paper(nm);				
		//		alert(nm);
				//sl = ($("option:selected", this).text());
		//		alert(sl);
				//display_viewer(sl);
				tb=$("#t13")[0].selectedIndex;
				check_view_material($("#t13")[0].selectedIndex);
				//callFlexPaperDocViewer(sl);
				
			});
			
		//***********************************************************************
		// subjective test papers....
			$("#tp1").change(function(){
			
				hide_div_sub_tr();
				$("#tp3,#tp5,#tp7,#tp9,#tp11,#tp12,#tp13").val([ ]);
				
				nm = $(this).val();	
				material_paper(nm);
		//		alert(nm);
				//sl = ($("option:selected", this).text());
		//		alert(sl);
				//display_viewer(sl);
				tb=$("#tp1")[0].selectedIndex;
				check_view_material($("#tp1")[0].selectedIndex);
				//callFlexPaperDocViewer(sl);
				
			});
			$("#tp3").change(function(){
			
				hide_div_sub_tr();
				$("#tp1,#tp5,#tp7,#tp9,#tp11,#tp12,#tp13").val([ ]);
				
				nm = $(this).val();	
				material_paper(nm);
		//		alert(nm);
				//sl = ($("option:selected", this).text());
		//		alert(sl);
				//display_viewer(sl);
				tb=$("#tp3")[0].selectedIndex;
				check_view_material($("#tp3")[0].selectedIndex);
				//callFlexPaperDocViewer(sl);
				
			});
			$("#tp5").change(function(){
			
				hide_div_sub_tr();
				$("#tp1,#tp3,#tp7,#tp9,#tp11,#tp12,#tp13").val([ ]);
				
				nm = $(this).val();	
		//		alert(nm);
				material_paper(nm);
				//sl = ($("option:selected", this).text());
		//		alert(sl);
				//display_viewer(sl);
				tb=$("#tp5")[0].selectedIndex;
				check_view_material($("#tp5")[0].selectedIndex);
				//callFlexPaperDocViewer(sl);
				
			});
			$("#tp7").change(function(){
			
				hide_div_sub_tr();
				$("#tp1,#tp3,#tp5,#tp9,#tp11,#tp12,#tp13").val([ ]);
				
				nm = $(this).val();	
				material_paper(nm);
		//		alert(nm);
				//sl = ($("option:selected", this).text());
		//		alert(sl);
				//display_viewer(sl);
				tb=$("#tp7")[0].selectedIndex;
				check_view_material($("#tp7")[0].selectedIndex);
				//callFlexPaperDocViewer(sl);
				
			});
			$("#tp9").change(function(){
			
				hide_div_sub_tr();
				$("#tp1,#tp3,#tp5,#tp7,#tp11,#tp12,#tp13").val([ ]);
				
				nm = $(this).val();	
				material_paper(nm);
		//		alert(nm);
				//sl = ($("option:selected", this).text());
		//		alert(sl);
				//display_viewer(sl);
				tb=$("#tp9")[0].selectedIndex;
				check_view_material($("#tp9")[0].selectedIndex);
				//callFlexPaperDocViewer(sl);
				
			});
			$("#tp11").change(function(){
			
				hide_div_sub_tr();
				$("#tp1,#tp3,#tp5,#tp7,#tp9,#tp12,#tp13").val([ ]);
				
				nm = $(this).val();	
		//		alert(nm);
				material_paper(nm);
				//sl = ($("option:selected", this).text());
		//		alert(sl);
				//display_viewer(sl);
				tb=$("#tp11")[0].selectedIndex;
				check_view_material($("#tp11")[0].selectedIndex);
				//callFlexPaperDocViewer(sl);
				
			});
			$("#tp12").change(function(){
			
				hide_div_sub_tr();
				$("#tp1,#tp3,#tp5,#tp7,#tp9,#tp11,#tp13").val([ ]);
				
				nm = $(this).val();	
				material_paper(nm);
		//		alert(nm);
				//sl = ($("option:selected", this).text());
		//		alert(sl);
				//display_viewer(sl);
				tb=$("#tp12")[0].selectedIndex;
				check_view_material($("#tp12")[0].selectedIndex);
				//callFlexPaperDocViewer(sl);
				
			});
			$("#tp13").change(function(){
			
				hide_div_sub_tr();
				$("#tp1,#tp3,#tp5,#tp7,#tp9,#tp11,#tp12").val([ ]);
				
				nm = $(this).val();	
		//		alert(nm);
				material_paper(nm);
				//sl = ($("option:selected", this).text());
		//		alert(sl);
				//display_viewer(sl);
				tb=$("#tp13")[0].selectedIndex;
				check_view_material($("#tp13")[0].selectedIndex);
				//callFlexPaperDocViewer(sl);
				
			});
			
			
			// Compitive test papers....
			$("#comp_1").change(function(){
			
				hide_div_sub_tr();
				nm = $(this).val();	
			//	alert(nm);
				sl = ($("option:selected", this).text());
				//display_viewer(sl);
				//callFlexPaperDocViewer(sl);
				tb=$("#comp_1")[0].selectedIndex;
				check_view_material($("#comp_1")[0].selectedIndex);
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
				//alert(sl);
				//display_viewer(sl);
				tb=$("#comp_3")[0].selectedIndex;
				check_view_material($("#comp_3")[0].selectedIndex);
				//callFlexPaperDocViewer(sl);
			});
			
		// Notes type........
			$("#nt1").change(function(){
			
				hide_div_sub_tr();
				$("#nt3,#nt5,#nt7,#nt9,#nt11,#nt12,#nt13").val([ ]);
				
				nm = $(this).val();	
		//		alert(nm);
				material_paper(nm);
				//sl = ($("option:selected", this).text());
		//		alert(sl);
				tb=$("#nt1")[0].selectedIndex;
				check_view_material($("#nt1")[0].selectedIndex);
				//display_viewer(sl);
				//callFlexPaperDocViewer(sl);
				
			});
			$("#nt3").change(function(){
			
				hide_div_sub_tr();
				$("#nt1,#nt5,#nt7,#nt9,#nt11,#nt12,#nt13").val([ ]);
				
				nm = $(this).val();	
				material_paper(nm);
		//		alert(nm);
				//sl = ($("option:selected", this).text());
		//		alert(sl);
				//display_viewer(sl);
				tb=$("#nt3")[0].selectedIndex;
				check_view_material($("#nt3")[0].selectedIndex);
				//callFlexPaperDocViewer(sl);
				
			});
			$("#nt5").change(function(){
			
				hide_div_sub_tr();
				$("#nt1,#nt3,#nt7,#nt9,#nt11,#nt12,#nt13").val([ ]);
				
				nm = $(this).val();	
				material_paper(nm);
		//		alert(nm);
				//sl = ($("option:selected", this).text());
		//		alert(sl);
				//display_viewer(sl);
				tb=$("#nt5")[0].selectedIndex;
				check_view_material($("#nt5")[0].selectedIndex);
				//callFlexPaperDocViewer(sl);
				
			});
			$("#nt7").change(function(){
			
				hide_div_sub_tr();
				$("#nt1,#nt3,#nt5,#nt9,#nt11,#nt12,#nt13").val([ ]);
				
				nm = $(this).val();	
		//		alert(nm);
				sl = ($("option:selected", this).text());
		//		alert(sl);
				//display_viewer(sl);
				tb=$("#nt7")[0].selectedIndex;
				check_view_material($("#nt7")[0].selectedIndex);
				
			});
			$("#nt9").change(function(){
			
				hide_div_sub_tr();
				$("#nt1,#nt3,#nt5,#nt7,#nt11,#nt12,#nt13").val([ ]);
				
				nm = $(this).val();	
				material_paper(nm);
		//		alert(nm);
				//sl = ($("option:selected", this).text());
		//		alert(sl);
				//display_viewer(sl);
				tb=$("#nt9")[0].selectedIndex;
				check_view_material($("#nt9")[0].selectedIndex);
				
			});
			$("#nt11").change(function(){
			
				hide_div_sub_tr();
				$("#nt1,#nt3,#nt5,#nt7,#nt9,#nt12,#nt13").val([ ]);
				
				nm = $(this).val();
				material_paper(nm);
		//		alert(nm);
				//sl = ($("option:selected", this).text());
		//		alert(sl);
				//display_viewer(sl);
				tb=$("#nt11")[0].selectedIndex;
				check_view_material($("#nt11")[0].selectedIndex);
				
			});
			$("#nt12").change(function(){
			
				hide_div_sub_tr();
				$("#nt1,#nt3,#nt5,#nt7,#nt9,#nt11,#nt13").val([ ]);
				
				nm = $(this).val();
				material_paper(nm);
		//		alert(nm);
				//sl = ($("option:selected", this).text());
		//		alert(sl);
				//display_viewer(sl);
				tb=$("#nt12")[0].selectedIndex;
				check_view_material($("#nt12")[0].selectedIndex);
				
			});
			$("#nt13").change(function(){
			
				hide_div_sub_tr();
				$("#nt1,#nt3,#nt5,#nt7,#nt9,#nt11,#nt12").val([ ]);
				
				nm = $(this).val();	
				material_paper(nm);
		//		alert(nm);
				//sl = ($("option:selected", this).text());
		//		alert(sl);
				//display_viewer(sl);
				tb=$("#nt13")[0].selectedIndex;
				check_view_material($("#nt13")[0].selectedIndex);
				
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
			$("#s14,#p14,#t14,#tp14,#os14").click(function(){
				nxt = $(this).val();
				display_viewer(nxt);
			});
	<!-- ba -->
			$("#os1,#os3,#os5,#os7,#os9,#os11,#os12,#os13").change(function()
			{
				filename = "";
				/*filename = "query/query9.php?dt="+nm;
				getContent(filename,"os14");*/
			});
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
				//alert(filename);
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
			function load_document_fast()
			{
				if(group_id == '9')
				{
					filename = "query/query.php?dt=1&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=15";
					getContent(filename, mat_block);
					filename = "query/query.php?dt=1&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=16";
					getContent(filename, phy_block);
					filename = "query/query.php?dt=1&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=17";
					getContent(filename, chem_block);
					filename = "query/query.php?dt=1&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query9.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '10')
				{
					filename = "query/query.php?dt=1&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=14";
					getContent(filename, bio_block);
					filename = "query/query.php?dt=1&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=16";
					getContent(filename, phy_block);
					filename = "query/query.php?dt=1&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=17";
					getContent(filename, chem_block);
					filename = "query/query.php?dt=1&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query9.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '11')
				{
					filename = "query/query.php?dt=1&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=15";
					getContent(filename, mat_block);
					filename = "query/query.php?dt=1&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=14";
					getContent(filename, bio_block);
					filename = "query/query.php?dt=1&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=16";
					getContent(filename, phy_block);
					filename = "query/query.php?dt=1&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=17";
					getContent(filename, chem_block);
					filename = "query/query.php?dt=1&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query9.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '12')
				{
					filename = "query/query.php?dt=1&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=15";
					getContent(filename, mat_block);
					filename = "query/query.php?dt=1&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=18";;
					getContent(filename, sci_block);
					filename = "query/query.php?dt=1&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '13')
				{
					filename = "query/query.php?dt=1&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=19";
					getContent(filename, eng_block);
					filename = "query/query.php?dt=1&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=22";;
					getContent(filename, ss_block);
					filename = "query/query.php?dt=1&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '21')
				{
					filename = "query/query.php?dt=1&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=15";
					getContent(filename, mat_block);
					filename = "query/query.php?dt=1&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=18";;
					getContent(filename, sci_block);
					filename = "query/query.php?dt=1&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=19";
					getContent(filename, eng_block);
					filename = "query/query.php?dt=1&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=22";;
					getContent(filename, ss_block);
					filename = "query/query.php?dt=1&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query.php?dt=a";
					getContent(filename,sol_block);
				}
			}
		<!--  Batch Assignment  -->
			$('#Assign').click(function()
			{	
				$("#Show_OMR_Div").hide();
				$("#OMR_result").hide();
				show_sdf_tools_plan();
				$("#re_test_score").hide();
				callFlexPaperDocViewer(first_paper);
				tab = 1001;
				var bio_block="s1",chem_block="s7",phy_block="s5",mat_block="s3",sci_block="s9",eng_block="s11",ss_block="s12",all_block="s13",sol_block="s14";
				mat_type_id_block = 1;
				//ok_bt_call="cancel";
				if(group_id == '9')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=15";
					getContent(filename, mat_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=16";
					getContent(filename, phy_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=17";
					getContent(filename, chem_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query9.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '10')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=14";
					//alert(filename);
					getContent(filename, bio_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=16";
					getContent(filename, phy_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=17";
					getContent(filename, chem_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query9.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '11')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=15";
					//alert(filename);
					getContent(filename, mat_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=14";
					getContent(filename, bio_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=16";
					getContent(filename, phy_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=17";
					getContent(filename, chem_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query9.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '12')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=15";
					getContent(filename, mat_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=18";;
					getContent(filename, sci_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '13')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=19";
					getContent(filename, eng_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=22";;
					getContent(filename, ss_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '21')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=15";
					getContent(filename, mat_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=18";;
					getContent(filename, sci_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=19";
					getContent(filename, eng_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=22";;
					getContent(filename, ss_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query.php?dt=a";
					getContent(filename,sol_block);
				}
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
				var url1 = "personlized_paper_test.php";
				var win=window.open(url1, '_blank');
				win.focus();
				var bio_block="p1",chem_block="p7",phy_block="p5",mat_block="p3",sci_block="p9",eng_block="p11",ss_block="p12",all_block="p13",sol_block="p14";
				mat_type_id_block = 2;
				if(group_id == '9')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=15";
					getContent(filename, mat_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=16";
					getContent(filename, phy_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=17";
					getContent(filename, chem_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query9.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '10')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=14";
					getContent(filename, bio_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=16";
					getContent(filename, phy_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=17";
					getContent(filename, chem_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query9.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '11')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=15";
					getContent(filename, mat_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=14";
					getContent(filename, bio_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=16";
					getContent(filename, phy_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=17";
					getContent(filename, chem_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query9.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '12')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=15";
					getContent(filename, mat_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=18";;
					getContent(filename, sci_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '13')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=19";
					getContent(filename, eng_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=22";;
					getContent(filename, ss_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '21')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=15";
					getContent(filename, mat_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=18";;
					getContent(filename, sci_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=19";
					getContent(filename, eng_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=22";;
					getContent(filename, ss_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query.php?dt=a";
					getContent(filename,sol_block);
				}
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
				mat_type_id_block = 4;
				var bio_block="t1",chem_block="t7",phy_block="t5",mat_block="t3",sci_block="t9",eng_block="t11",ss_block="t12",all_block="t13",sol_block="t14";
				//ok_bt_call="cancel";
				//load_document_fast();
				if(group_id == '9')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=15";
					getContent(filename, mat_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=16";
					getContent(filename, phy_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=17";
					getContent(filename, chem_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query9.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '10')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=14";
					getContent(filename, bio_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=16";
					getContent(filename, phy_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=17";
					getContent(filename, chem_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query9.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '11')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=15";
					getContent(filename, mat_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=14";
					getContent(filename, bio_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=16";
					getContent(filename, phy_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=17";
					getContent(filename, chem_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query9.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '12')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=15";
					getContent(filename, mat_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=18";;
					getContent(filename, sci_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '13')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=19";
					getContent(filename, eng_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=22";;
					getContent(filename, ss_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '21')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=15";
					getContent(filename, mat_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=18";;
					getContent(filename, sci_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=19";
					getContent(filename, eng_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=22";;
					getContent(filename, ss_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query.php?dt=a";
					getContent(filename,sol_block);
				}
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
				mat_type_id_block = 25;
				var bio_block="o1",chem_block="o7",phy_block="o5",mat_block="o3",sci_block="o9",eng_block="o11",ss_block="o12",all_block="o13",sol_block="o14";
				if(group_id == '9')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=15";
					getContent(filename, mat_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=16";
					getContent(filename, phy_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=17";
					getContent(filename, chem_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query9.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '10')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=14";
					getContent(filename, bio_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=16";
					getContent(filename, phy_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=17";
					getContent(filename, chem_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query9.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '11')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=15";
					getContent(filename, mat_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=14";
					getContent(filename, bio_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=16";
					getContent(filename, phy_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=17";
					getContent(filename, chem_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query9.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '12')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=15";
					getContent(filename, mat_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=18";;
					getContent(filename, sci_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '13')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=19";
					getContent(filename, eng_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=22";;
					getContent(filename, ss_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '21')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=15";
					getContent(filename, mat_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=18";;
					getContent(filename, sci_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=19";
					getContent(filename, eng_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&subject34=22";;
					getContent(filename, ss_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query.php?dt=a";
					getContent(filename,sol_block);
				}
				//ok_bt_call="cancel";
				
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
				mat_type_id_block = 26;
				var bio_block="tp1",chem_block="tp7",phy_block="tp5",mat_block="tp3",sci_block="tp9",eng_block="tp11",ss_block="tp12",all_block="tp13",sol_block="tp14";
				if(group_id == '9')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=15";
					getContent(filename, mat_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=16";
					getContent(filename, phy_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=17";
					getContent(filename, chem_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query9.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '10')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=14";
					getContent(filename, bio_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=16";
					getContent(filename, phy_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=17";
					getContent(filename, chem_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query9.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '11')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=15";
					getContent(filename, mat_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=14";
					getContent(filename, bio_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=16";
					getContent(filename, phy_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=17";
					getContent(filename, chem_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query9.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '12')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=15";
					getContent(filename, mat_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=18";;
					getContent(filename, sci_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '13')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=19";
					getContent(filename, eng_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=22";;
					getContent(filename, ss_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '21')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=15";
					getContent(filename, mat_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=18";;
					getContent(filename, sci_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=19";
					getContent(filename, eng_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=22";;
					getContent(filename, ss_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query.php?dt=a";
					getContent(filename,sol_block);
				}
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
				
				var url = "admin_test_paper.php?uid="+u_id;
				//alert(url);
				var win=window.open(url, '_blank');
				win.focus();
				//window.open(url, 'online Test', 'toolbar=no,menubar=no,location=no,directories=no,status=no');
				$("#hide_instruction").hide();
			});
			$('#online_video_lectures').click(function()
			{
				$("#doc34").hide();
				$("#plan").hide();
				$("#Show_OMR_Div").hide();
				$("#OMR_result").hide();
				
				/*<?php 
					$checked_val=1; 
					$_SESSION['checked_val']=$checked_val;
				?>*/
				/*var url1 = "http://www.globaleduserver.com/Default.aspx";
				var win=window.open(url1, '_blank');
				win.focus();*/
				var url1 = "ass_sub_php.php";
				var win=window.open(url1, '_blank');
				win.focus();
				$("#hide_instruction").hide();
			});
			$('#jee_mock_test').click(function()
			{
				$("#doc34").hide();
				$("#plan").hide();
				$("#Show_OMR_Div").hide();
				$("#OMR_result").hide();
				var url1 = "insrtuction_part.php";
				var win=window.open(url1, '_blank');
				win.focus();
			});
			<!--	Virtual class room -->
			$('#virtual_classroom').click(function()
			{
				$("#doc34").hide();
				$("#plan").hide();
				$("#Show_OMR_Div").hide();
				$("#OMR_result").hide();
				
				var url1 = "test_score.php";
				var win=window.open(url1, '_blank');
				win.focus();
			
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
				mat_type_id_block = 8;
				var bio_block="nt1",chem_block="nt7",phy_block="nt5",mat_block="nt3",sci_block="nt9",eng_block="nt11",ss_block="nt12",all_block="nt13",sol_block="nt14";
				if(group_id == '9')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=15";
					getContent(filename, mat_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=16";
					getContent(filename, phy_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=17";
					getContent(filename, chem_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query9.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '10')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=14";
					getContent(filename, bio_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=16";
					getContent(filename, phy_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=17";
					getContent(filename, chem_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query9.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '11')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=15";
					getContent(filename, mat_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=14";
					getContent(filename, bio_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=16";
					getContent(filename, phy_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=17";
					getContent(filename, chem_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query9.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '12')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=15";
					getContent(filename, mat_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=18";;
					getContent(filename, sci_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '13')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=19";
					getContent(filename, eng_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=22";;
					getContent(filename, ss_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '21')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=15";
					getContent(filename, mat_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=18";;
					getContent(filename, sci_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=19";
					getContent(filename, eng_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=22";;
					getContent(filename, ss_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query.php?dt=a";
					getContent(filename,sol_block);
				}
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
			$('#sch_online_test').click(function()
			{	
				$("#Show_OMR_Div").hide();
				$("#OMR_result").hide();
				show_sdf_tools_plan();
				$("#re_test_score").hide();
				callFlexPaperDocViewer(first_paper);
				tab = 1010;
				//alert(tab);
				var bio_block="os1",chem_block="os7",phy_block="os5",mat_block="os3",sci_block="os9",eng_block="os11",ss_block="os12",all_block="os13",sol_block="os14";
				mat_type_id_block = 10;
				//ok_bt_call="cancel";
				if(group_id == '9')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=15";
					getContent(filename, mat_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=16";
					getContent(filename, phy_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=17";
					getContent(filename, chem_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query9.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '10')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=14";
					getContent(filename, bio_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=16";
					getContent(filename, phy_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=17";
					getContent(filename, chem_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query9.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '11')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=15";
					//alert(filename);
					getContent(filename, mat_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=14";
					getContent(filename, bio_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=16";
					getContent(filename, phy_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=17";
					getContent(filename, chem_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query9.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '12')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=15";
					getContent(filename, mat_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=18";;
					getContent(filename, sci_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '13')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=19";
					getContent(filename, eng_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=22";;
					getContent(filename, ss_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query.php?dt=a";
					getContent(filename,sol_block);
				}
				else if(group_id == '21')
				{
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=15";
					getContent(filename, mat_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=18";;
					getContent(filename, sci_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&subject34=19";
					getContent(filename, eng_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=22";;
					getContent(filename, ss_block);
					filename = "query/query.php?dt="+mat_type_id_block+"&bt_call="+ok_bt_call+"&sb="+sb+"&cp1="+cp1+"&dc1="+dc1+"&date1="+datepickerVal3+"&date2="+datepickerVal4+"&search_mat="+search_mat+"&subject34=20";
					getContent(filename, all_block);
					filename = "query/query.php?dt=a";
					getContent(filename,sol_block);
				}
				$("#hide_instruction").show();
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
			$("#OMR_answer_submit").click(function(){
			
				submit_val=$("#OMR_answer_submit").val();
				//alert(submit_val);
				$("#dv *").attr("disabled", "disabled").off('click');
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
				var kj=1;
				var ij=1;
				flag=false;
				$("#student_come input:checkbox").each(function() {
					if ($(this).is(":checked"))
					{
						flag=true;
						idArray2.push(this.id);
					}
					else
					{
						if(ij == 4)
						{
						
							if(flag == false)
							{
								idArray2.push(kj+"-"+"X");
							}
							flag=false;
							kj++;
							ij=0;
						}
						
					}
					ij++;
					/*else if ($(this).not(":checked"))
					{
						idArray3.push(this.id);
					}*/
					/*else 
					{
						idArray3.push(this.id);
					}*/
				});
				check_student_id = idArray2;
				//uncheck_student_id = idArray3;
				//alert(check_student_id);
				//alert(kj);
				//alert(uncheck_student_id);
				if(check_student_id == "")
				{
					alert("Please give proper test");
				}
				else
				{
					$("#OMR_answer_submit").hide();
					var nw = ""+check_student_id+"";
					//alert(nw);
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
					
					alert("Evalution under process...");
					
					setTimeout(function(){
						$("#OMR_View_Result").show();
					}, 3000);
					alert("Please click on view result button for your result.");
					t_t="";
				}
				filename = "query/omr_result_check1.php?material_id="+nm;
				//alert(filename);
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					success: function(data, textStatus, xhr) {
						alert("Assignment Result has been sent to your registered Email-ID. Thank You.");
					}
				});
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
				else if(tab == 1010)
				{
					getContent(filename,"os14");
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
						$("#re_test_score").show();
						$("#OMR_View_Result").hide();
					}
				});
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
						
					if(t_t == 1)
					{					d2.setMinutes(d1.getMinutes() + 1);				}
					else if(t_t == 5)
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
					alert("Your test starts now... Best of luck.");
					$("#OMR_answer_submit").show();
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
						$("#OMR_answer_submit").hide();
						if(submit_val == "Submit")
						{
							//alert("check IT");
						}
						else
						{
							alert("Your time is over!!!");
							$("#dv *").attr("disabled", "disabled").off('click');
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
							var kj=1;
							var ij=1;
							flag=false;
							$("#student_come input:checkbox").each(function() {
								if ($(this).is(":checked"))
								{
									flag=true;
									idArray2.push(this.id);
								}
								else
								{
									if(ij == 4)
									{
									
										if(flag == false)
										{
											idArray2.push(kj+"-"+"X");
										}
										flag=false;
										kj++;
										ij=0;
									}
									
								}
								ij++;
							});
							check_student_id = idArray2;
					
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
										//alert(filename);
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
								setTimeout(function(){
									$("#OMR_View_Result").show();
								}, 3000);
								alert("Please click on view result button for your Result.");
								t_t="";
						}
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
				$(this).css('color','green');
				$("#td_lect_tt").css('color','grey');
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
						privious_time_table = $('#first_td_1').attr("value");
						$("#time_get_today").html(privious_time_table);
						//alert(privious_time_table);
					}
				});
			});
			
			$('#td_lect_tt').click(function() {
				$(this).css('color','green');
				$("#prev_lect_tt").css('color','grey');
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
						today_time_get='<?php echo $today34; ?>';
						$("#time_get_today").html(today_time_get);
						//alert(today_time_get);
					}
				});
			});
			
	<!--	Re-Test and privious score -->

			$('#tke_reset').click(function() {
				
				filename = "omr_details/re_test.php?stud_id="+u_id+"&mat_id="+nm;
				//alert(filename);
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
			$('#search_bt').click(function(){
				search_mat=$("#search_mat").val();
				//alert(search_mat);
				if(tab == 1010)
				{
					assignment_Objective();
				}
				LoadBatchAssignmentsByDefault();
				LoadBatchPersonalByDefault();
				LoadobjectiveByDefault();
				LoadsubjectiveByDefault();
				LoadnoteByDefault();
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
					if(tab == 1001)
					{
						LoadBatchAssignmentsByDefault();
					}
					else if(tab == 1002)
					{
						LoadBatchPersonalByDefault();
					}
					else if(tab == 1004)
					{
						LoadobjectiveByDefault();
					}
					else if(tab == 1005)
					{
						LoadsubjectiveByDefault();
					}
					else if(tab == 1006)
					{
						LoadnoteByDefault();
					}
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
	<body bgcolor="#E0ECF8">
		<?php 
			if($user5 == "")
			{
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
				include 'header4.php';
				?>
				<br/>
				<table style="padding-top:0px;border:solid 0px;width:100%;height:25px;">
					<tr>
						<td style="background-color:#3366FF;border:solid 0px;">
							<label style="float:left;color:white"><b>Home</b></label>
						</td>
					</tr>
				</table>

				<?php
				$result=mysql_query("SELECT id,filter FROM filter_student_viewer where id='1'");
				$row=mysql_fetch_row($result);
				$filter_value=$row[1];
				if($filter_value == "false")
				{
				}
				else
				{
					if($board1 == '1')
					{
				?>
				<table>
				<tr>
				<td>
					<div id="filter_sub_chap" style="padding-left:0px;float:left;background:#E0ECF8;">
						<table style="border:solid 0px;padding-left:5px;padding-top:5px;width: 100%;background:#E0ECF8;">
							<tr>
								<td style="float:left;"><b>Subject</b></td>
								<td style="float:left;">
								<select name="sb1" id="sb1" style="width:135px;">
								<?php
								include 'config.php';
									$result=mysql_query("SELECT s.id,s.name FROM group_subject_mapping gsm,SUBJECT s  WHERE group_id='$s3' AND gsm.sub_id=s.id");
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
									include 'conn_close.php';
								?>
								
								</select></td>
								<td style="padding-left:20px;float:left;"><b>Chapter</b></td>
								<td style="float:left;">
									<select name="cp1" id="cp1" style="width:155px;"></select>
								</td>
								<td style="padding-left:0px;float:left"><input type="BUTTON" name="ok_bt" id="ok_bt" value="OK" class="defaultbutton"></td>
							</tr>
						</table>
					</div><?php }
					else
					{
						
					}
				}
				?>
				</td></tr>
				<tr><td>
				<div style="border:solid 0px;width:1355px;height:1200px;background:#E0ECF8;">
					<table style="border:solid 0px;width:1355px;height:720px;background:#E0ECF8;">
						<tr>
							<td valign="top" style="float:left;">
								<table style="border:solid 0px;width:1355px;">
									<tr>
										<td style="border:solid 0px;width:220px;height:20px;">
												<input type='text'id="search_mat" placeholder="Search Material" style="width:180px;"/>
												<input type="BUTTON" id="search_bt" value="SEARCH" class="defaultbutton"/>
										</td>
										<td style="border:solid 1px;width:900px;height:20px;">
											<div style="padding-left:10px;float:left;" id="mouse_over"></div>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td style="float:left;">
								<table>
									<tr>
										<td>
											<?php
												include 'viewer_tab/tab.php';
											?>
											<?php
											
												if($board1 == '1')
												{
													if($filter_value == "false")
													{
														include 'viewer_screen/viewer1.php';
													}
													else
													{
														include 'viewer_screen/viewer2.php';
													}
												}
												else
												{
													include 'viewer_screen/viewer1.php';
												}
											?>
										</td>
										<td>
											<?php
												if($filter_value == "false")
												{
													include 'viewer_tab/tt_omr.php';
												}
												else
												{
													include 'viewer_tab/tt_omr1.php';
												}
											 ?>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<table style="color:green;border:solid 0px;width:1350px;height:100px;background:#E0ECF8;">
						<tr>
							<td>
								<table style="float:left;background:#E0ECF8;">
									<tr>
										<td style="">
											<div id="OMR_result" style="padding-left:350px;padding-top:50px;background:#E0ECF8;">
												<div id="OMR_result_declare">
												</div>
											</div>
										</td>
										<td id="re_test_score">
											<input type="button" id="tke_reset" class="defaultbutton" style="color:blue;" value="Take Re-Test" />
											<input type="button" id="view_prvs_score" class="defaultbutton" style="color:blue;" value="View Previous Score" />
										</td>
									</tr>
									<tr>
										<td>
										<br/><br/></td>
										<td>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</div>
				</td>
				</tr>
				</table>
			<?php
			}
			else
			{?>
				<?php require 'header4.php'; ?>
				<table style="padding-top:0px;border:solid 0px;width:100%;height:25px;">
					<tr>
						<td style="background-color:#3366FF;border:solid 0px;">
							<label style="float:left;color:white"><b>Home</b></label>
						</td>
					</tr>
				</table>
				<div style="border:solid 1px;width:1350px;height:1000px;">
					<table style="border:solid 1px;width:1350px;height:700px;">
						<tr>
							<td style="float:left;">
								<table>
									<tr>
										<td>
											<?php
												include 'viewer_tab/tab.php';
											?>
											<?php
												include 'viewer_screen/viewer1.php';
											?>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</div><?php
			}
		?>
		<div id="footer" style="background-color:#0174DF;">
			<center><div style="padding-left:5px;padding-top:5px;font-size:12px;color:black;text-transform: capitalize;"><label style="border:solid 0px;color:white;">Copyright &copy Edutech Educational Services Pvt. Ltd. Ahmedabad, Gujarat, India</label>
			</div></center>
		</div>
		<input type="hidden" id="last_id_omr_starting_time" value=""/>
	</body>
	<?php
	$res=mysql_query('SELECT id,permission FROM copy_safe_permission');
	$row=mysql_fetch_array($res);
	$per=$row[1];
	
	if($per == "true")
	{
		include 'copysafe.html';
	}
	else
	{
		
	}
	
?>
	<?php
		include_once 'conn_close.php';
	?>
</html>