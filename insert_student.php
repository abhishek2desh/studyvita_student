<?php
	include 'conn.php';
	include 'lock.php';
	$today = date("Y-m-d", strtotime('today'));
	$today2 = date("l, d F, Y", strtotime('today'));
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Linking and Unlinking Material Batch wise</title>
	<link rel="shortcut icon" href="http://targetstudy.com/files/img/17/6957/L_17974.gif" />
	
	<script type="text/javascript" src="js/jquery-1.7.min.js"></script>
	<link rel="stylesheet" href="css/jquery-ui.css" />
	<script src="js/jquery-ui.js"></script>
	<link rel="stylesheet" type="text/css" href="css/flexpaper.css" />
	<script type="text/javascript" src="js/flexpaper.js"> </script> 
<!--	<script type="text/javascript" src="js/jquery.min.js"> </script>	-->
	<script type="text/javascript" src="js/flexpaper_handlers.js"> </script>
	<script type="text/javascript" src="js/flexpaper_handlers_debug.js"> </script>

	<style type="text/css">
	
		body{
			
			background-size: cover;
			background-repeat: no-repeat;
		}
			.multiselect {
				width:20em;
				height:15em;
				border:solid 1px #c0c0c0;
				overflow:auto;
			}
			 
			.multiselect label {
				display:block;
			}
			 
			.multiselect-on {
				color:#ffffff;
				background-color:#000099;
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
		
		
		/* The CSS */
		select {
			padding:3px;
			margin: 0;
			-webkit-border-radius:4px;
			-moz-border-radius:4px;
			border-radius:4px;
			-webkit-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
			-moz-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
			box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
			background: #f8f8f8;
			color:#888;
			border:none;
			outline:none;
			display: inline-block;
			-webkit-appearance:none;
			-moz-appearance:none;
			appearance:none;
			cursor:pointer;
		}

		/* Targetting Webkit browsers only. FF will show the dropdown arrow with so much padding. */
		@media screen and (-webkit-min-device-pixel-ratio:0) {
			select {padding-right:18px}
		}
		</style>
		
		<script>
		$(document).ready(function(){
			$("#submit").click(function(){
				first=$("#first").val();
				second=$("#second").val();
				filename = "forth2/update_student.php?first="+first+"&second="+second;
				alert(filename);
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					
					success: function(data, textStatus, xhr) {
						alert(data);
					},
				});
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
			
			function insert_assign_material(filename)
			{
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					
					success: function(data, textStatus, xhr) {
						alert(data);
					},
				});									
			}			
		});
	</script>
</head>
<body>
	<?php include 'header.php' ?>
	<div class="lg-container"  style="border:solid 1px;width:100%;height:435px;">
		<table style="width:100%;">
			<tr>
				<td>
					<table>
						<tr>
							<td>
								<input type='text' id='first'/>
							</td>
							<td>
								<input type='text' id='second'/>
							</td>
							<td>
								<input type="button" id="submit" value="Submit" class="defaultbutton"/>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</div>
</body>
</html>