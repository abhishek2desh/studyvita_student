<?php
	include_once 'config.php';
	session_start();
	
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Welcome  <?php echo $u5; ?></title>
		<link rel="shortcut icon" href="images/Edutechheader.ico" />
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
		<link href="menu.css" rel="stylesheet" type="text/css" />
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
		
		
		<style type="text/css">
		html, body	{ height:100%;width:100%; }
			body { margin:0; overflow:auto; }
		#flashContent { display:none; }
		
		.ui-jqgrid .ui-state-highlight { background: #F39814; color:white; }
		
		.button_css{
		border-color:#8E6AF5;border-width: 1px 1px 1px 15px;border-style: solid; -webkit-border-radius: 3px; -moz-border-radius: 3px;border-radius: 3px;font-size:12px;font-family:arial, helvetica, sans-serif; padding: 3px 3px 3px 3px; text-decoration:none; display:inline-block;text-shadow: -1px -1px 0 rgba(0,0,0,0.3);font-weight:bold; color: #FFFFFF;
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
		</style>
		<script type="text/javascript">
			
			$(function (){
				
				var datepickerVal34='<?php echo $today ?>',datepickerVal35='<?php echo $today ?>';
			
				$( "#datepicker34" ).datepicker({
					dateFormat: "yy-mm-dd",
					altField: "#alternate",
					altFormat: "DD, d MM, yy",
					onSelect: function() { 
						datepickerVal34 = $("#datepicker34").val();
						//alert(datepickerVal34);
					}
				});
				$( "#datepicker35" ).datepicker({
					dateFormat: "yy-mm-dd",
					altField: "#alternate",
					altFormat: "DD, d MM, yy",
					onSelect: function() { 
					datepickerVal35 = $("#datepicker35").val();
					//alert(datepickerVal35);
					}
				});
				/*$("#submit").click({
					sub1 = $('#sub1').val();
					paper1 = $('#paper1').val();
					alert(sub1+paper1);
				});*/
				$('#submit').click(function(){
					sub1 = $('#sub1').val();
					paper1 = $('#paper1').val();
					//alert(sub1+paper1);
					var url = "score_details.php?datepickerVal34="+datepickerVal34+"&datepickerVal35="+datepickerVal35+"&sub1="+sub1+"&paper1="+paper1;
					//alert(url);	
					window.open(url, 'Score Details of student', 'height=800,width=1000,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=no,menubar=no,location=no,directories=no,status=yes');
					return false;
				});
			});
			
		</script>
	</head>
	<body>
		<?php require 'header4.php'; ?>
		<br/>
		<table style="padding-top:0px;border:solid 0px;width:100%;height:25px;">
			<tr>
				<td style="background-color:#3366FF;border:solid 0px;">
					<label style="color:white"><b>Test Score</b></label>
				</td>
			</tr>
		</table>
		<div style="border:solid 1px;width:100%;height:730px;">
			<table style="padding-top:0px;border:solid 0px;width:50%;height:20px;">
				<tr>
					<td>
						<label><b>From Date : </b></label>
					</td>
					<td>
						<input type="text" id="datepicker34"  value="<?php echo $today ?>" />
					</td>
					<td>
						<label><b>To Date : </b></label>
					</td>
					<td>
						<input type="text" id="datepicker35"  value="<?php echo $today ?>" />
					</td>
				</tr>
			</table>
			<table style="padding-top:0px;border:solid 0px;width:27%;height:20px;">
				<tr>
					<td><b>Subject : </b></td>
					<td>
						<select name="subj" size="1" id="sub1" style="width: 150px; color:#777777" >
							<?php
								include 'config.php';
								$result=mysql_query("SELECT id,name FROM detail WHERE id IN
								(SELECT sub_id FROM group_subject_mapping WHERE group_id=".$s3.")
								GROUP BY id DESC");
								while($row=mysql_fetch_array($result))
								{
									echo "<option value=$row[0]>$row[1]</option>";
								}
							?>
						</select>
					</td>
				</tr>
			</table>
			<table style="padding-top:0px;border:solid 0px;width:27%;height:20px;">
				<tr>
					<td><b>Paper Type : </b></td>
					<td>
						<select name="paper" size="1" id="paper1" style="width: 150px; color:#777777" >
							<option value="0">Subjective</option>
							<option value="1">Objective</option>
							<option value="2">All</option>
						</select>
					</td>
				</tr>
			</table>
			<table style="padding-top:0px;border:solid 0px;width:27%;height:20px;">
				<tr>
					<td>
						<input type="submit" name="submit" id="submit" value="Submit">
					</td>
				</tr>
			</table>
		</div>
	</body>
</html>