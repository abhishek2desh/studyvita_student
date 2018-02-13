<?php
	require_once 'includes/global.inc.php';
	include_once 'config.php';
	$user=$_SESSION['username'];
	$s1=$_SESSION['studid1'];
	$s2=$_SESSION['stnd1'];
	$s3=$_SESSION['grp1'];	
	$s4=$_SESSION['btch1'];
	$s5=$_SESSION['sid'];
	$u5 = $_SESSION['uname'];
	
	$today = date("Y-m-d", strtotime('today'));
	$_SESSION['today'] = $today;
?>
<!doctype html>
<html>
	<head>
		<title>Welcome <?php echo $u5 ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="keywords" content="jquery,ui,easy,easyui,web">
		<link rel="shortcut icon" href="http://targetstudy.com/files/img/17/6957/L_17974.gif" />
		<meta name="description" content="easyui help you build your web page easily!">
		<link rel="shortcut icon" href="http://targetstudy.com/files/img/17/6957/L_17974.gif" />
		<script language="javascript" type="text/javascript" src="js/jquery.min.js">
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
		<!-- Table Css -->
		<link rel="stylesheet" href="css/table.css" type="text/css"/>
		<style type="text/css">
			#fm{
				margin:0;
				padding:10px 30px;
			}
			.ftitle{
				font-size:14px;
				font-weight:bold;
				color:#666;
				padding:5px 0;
				margin-bottom:10px;
				border-bottom:1px solid #ccc;
			}
			.fitem{
				margin-bottom:5px;
			}
			.fitem label{
				display:inline-block;
				width:80px;
			}
		</style>
		<script type="text/javascript">
			
			$(document).ready(function(){
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
				filename = "assignment_details/1_assigment_details.php";
				getContent(filename, "fcas");
				filename = "assignment_details/2_pending_assignment.php";
				getContent(filename, "pas");
				filename = "assignment_details/3_history_assignment.php";
				getContent(filename, "hasm");
			});
		</script>
	</head>
	<body>
		<?php require 'header.php'; ?>
		<div>
			<h3><b>
			Welcome <?php echo $u5; ?> !
			</b></h3>
		</div>
		<!--class="CSS_Table_Example"-->
		<div  style="border:solid 1px;width:1200px;height:285px;">
			<table style="border:solid 0px;width:1200px;height:20px;">
				<tr>
					<td style="border:solid 0px;width:600px;height:20px;">
						<center><b>ForthComing Assignment Submission</b></center>
					</td>
					<td style="border:solid 0px;width:600px;height:20px;">
						<center><b>Pending Assignment Submission</b></center>
					</td>
				</tr>
			</table>
			<table style="border:solid 0px;width:1200px;height:250px;">
				<tr>
					<td style="border:solid 0px;width:600px;height:250px;">
						<div id="fcas" style="border:solid 1px;width:594px;height:250px;overflow-y: scroll;">
						</div>
					</td>
					<td valign="top" style="border:solid 0px;width:600px;height:250px;">
						<div id="pas" style="border:solid 1px;width:590px;height:250px;overflow-y: scroll;">
						</div>
					</td>
				</tr>
			</table>
		</div>
		<div  style="border:solid 1px;width:700px;height:250px;">
			<table style="border:solid 0px;width:700px;height:15px;">
				<tr>
					<td style="border:solid 0px;width:700px;height:15px;">
						<center><b>History of Assignment Submission</b></center>
					</td>
				</tr>
			</table>
			<table style="border:solid 0px;width:700px;height:230px;">
				<tr>
					<td style="border:solid 0px;width:700px;height:230px;">
						<div id="hasm" style="border:solid 1px;width:694px;height:215px;overflow-y: scroll;">
						</div>
					</td>
				</tr>
			</table>
		</div>
	</body>
	<?php
		include 'conn_close.php';
	?>
</html>