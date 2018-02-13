<?php

	include("config.php");
	session_start();
	$u5 = $_SESSION['uname'];
	$s5=$_SESSION['sid'];
	
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
		
		
		</style>
	
		<script>
		
		$(document).ready(function(){
		
			
			
			
		});
	</script>
</head>
<body>
	
	
				
			
	<center>
	<font color="#1b4268" size="6"><b>Welcome to FASSS-Faculty Aided Student Support System</b></font><br/><br/>
	<?php
$result_log=mysql_query("SELECT id FROM `access_log` WHERE user_id='$s5'");
$rw_log=mysql_num_rows($result_log);
if($rw_log==0)
{
echo "<iframe width='560' height='315' src='https://www.youtube.com/embed/0esq8NfdN3o?&autoplay=1' frameborder='0' allowfullscreen></iframe>";
}
else
{
echo "<iframe width='560' height='315' src='https://www.youtube.com/embed/0esq8NfdN3o?&autoplay=1' frameborder='0' allowfullscreen></iframe>";
}
?>
	</center>
</body>
</html>