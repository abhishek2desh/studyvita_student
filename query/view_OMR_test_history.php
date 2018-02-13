<?php 
include_once 'config.php';
session_start();

	$sid = $_GET['stud_id'];
	$mid = $_GET['mat_id'];
	$mnm = $_GET['mat_nm'];
	$u5 = $_SESSION['uname'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Welcome  <?php echo $u5; ?></title>
		<link rel="shortcut icon" href="http://targetstudy.com/files/img/17/6957/L_17974.gif" />
		<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
		
		<script type="text/javascript">
				
			$(function (){ 
								
				var filename = "";
				var mat_id = <?php echo $mid; ?>;
				var stud_id = <?php echo $sid; ?>;
				
				filename = "omr_details/mat_history_display.php?mat_id="+mat_id+"&stud_id="+stud_id;
			//	alert(filename);
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					success: function(data, textStatus, xhr) {
						var strtemp = $('#mat_prv_scr_disply').html(data);
					//	eval(strtemp);
					}
				});
				
			});
			
		</script>
	</head>
	<body bgcolor="#FFFDE2">
		<?php // require 'header.php'; ?>
		<div id="wl" style="font-size:18px;color:orange;text-transform: capitalize;"><b>
			Welcome <?php echo "&nbsp;".$u5."&nbsp;"; 
			?>
			</b>
			
		</div>
		
		<div id="view_prv_score">
			<br />
			<table style="width:820px;" bgcolor="#FCF8BF">
				<tr>
					<td>
						<table>
							<tr>
								<td style="color:blue;font-size:18px;">Your previous score for this assignment - 
								<?php echo $mnm; ?></td>
							</tr>
						</table>
					</td>
					
				</tr>
				
				<tr>
					<td style="padding-top:20px;" id="mat_prv_scr_disply">
						
					</td>
				</tr>
				
			</table>
		</div>
	</body>
	<?php
		include_once 'conn_close.php';
	?>
</html>