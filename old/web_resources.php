<?php
	include 'config.php';
	session_start();
	$course_id=$_SESSION['course_id'];
	$batch_id=$_SESSION['batch_id'];
	$subject_id=$_SESSION['subject_id'];
	$s1=$_SESSION['studid1'];
	$s5=$_SESSION['sid'];
	$s3=$_SESSION['grp1'];
	$u5 = $_SESSION['uname'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>		
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="shortcut icon" href="images/Edutechheader.ico" />
		<meta name="keywords" content="edutechindiaonline">
		<meta name="description" content="edutechindiaonline">
		<title>Welcome <?php echo $u5 ?></title>
		<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
		<link href="css/bg1.css" rel="stylesheet" type="text/css" />
		<link href="css/style_images.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="js/flexpaper.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers_debug.js"> </script>
		<script type="text/javascript" src="js/flowplayer-3.2.12.min.js"></script>
		<link href="menu/menu.css" rel="stylesheet" type="text/css" />
		<style>
			html, body	{ height:100%;width:100%; }
			body { margin:0; overflow:auto; }
			.black {
				background: #444444;
				border: 1px solid #26487f;
				border-radius: 1px;
				color: #fff;
				outline: 1px solid #a5c7fe;
				padding: 6px 10px;
			}
		</style>
		<style>
			.main_div2 { 
			height: auto;
			width: auto; 
			background-color: white; 
			/* outer shadows  (note the rgba is red, green, blue, alpha) */
			-webkit-box-shadow: 0px 0px 12px rgba(0, 0, 0, 0.4); 
			-moz-box-shadow: 0px 1px 6px rgba(23, 69, 88, .5);
			/* rounded corners */
			-webkit-border-radius: 12px;
			-moz-border-radius: 7px; 
			border-radius: 7px;
			/* gradients */
			background: -webkit-gradient(linear, left top, left bottom, 
			color-stop(0%, white), color-stop(15%, white), color-stop(100%, #D7E9F5)); 
			background: -moz-linear-gradient(top, white 0%, white 55%, #D5E4F3 130%); 
			}
			 #footer {
				position: fixed;
				bottom: 0;
				width: 100%;
			}
		</style>
		<script type="text/javascript">
			$(document).ready(function(){
				//$("#topic").hide();
				$("#hide_result").hide();
					$("#hide_result1").hide();
					filename = "test_paper_generator/chapter_web_re.php";
					//alert(filename);
					getContent(filename, "chapter");
					
					$("#chapter").click(function(){
						chapter=$("#chapter").val();
						$("#hide_result").show();
						$("#topic").hide();
						filename = "web_resorces/5.php?chap_id="+chapter;
						getContent_tp(filename, "topic");
					});
					$('#topic').click(function(){
					$("#hide_result1").show();
						$("#concept_id").hide();
					//callFlexPaperDocViewer(check_id22);
						$("#topic input:radio:checked").each(function() {
							idArray34=this.id;
						});
						topic=idArray34;
						//alert(topic);
						filename = "web_resorces/6.php?topic="+topic;
						//alert(filename);
						getContent_cp(filename, "concept_id");
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
							//$("#sel_type").show();
						},
					});
				}
				function getContent_tp(filename, selectboxid)
				{
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							var strtemp = "$('#" + selectboxid + "').html(data)";
							eval(strtemp);
							//alert(data);
							$("#hide_result").hide();
						$("#topic").show();
							//$("#sel_type").show();
						},
					});
				}
				function getContent_cp(filename, selectboxid)
				{
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							var strtemp = "$('#" + selectboxid + "').html(data)";
							eval(strtemp);
							//alert(data);
							$("#hide_result1").hide();
						$("#concept_id").show();
							//$("#sel_type").show();
						},
					});
				}
			});
			</script>
		
</head>
<body>
	<div style='background-color:#EDF5FA;width:100%'>
		<div class='trable_bg' style='padding-left:5px;color:yellow;border:solid 0px;width:100%'>
			<table style='width:100%'>
				<tr>
					<td style='width:100%;'>
						<center><?php require 'adlp.php'; ?></center>
					</td>
				</tr>
				<tr>
					<td valign='top' style='width:100%;border:solid px;'>
						<center><?php require 'menu/testmenu.php'; ?></center>
					</td>
				</tr>
			</table>
		</div>
		<div style='background-color:#EDF5FA;width:100%;height:auto;'>
			<table style="padding-top:0px;border:solid 0px;width:100%;height:25px;">
				<tr>
					<td style="background-color:#3366FF;border:solid 0px;">
						<label style="float:left;color:white"><b>Web Resources</b></label>
					</td>
				</tr>
			</table>
			<br/>
			<center><table class='main_div2' style='width:80%'>
				<tr>
					<td>
						Chapter List
					</td>
					<td>
						Topic  List
					</td>
				</tr>
				<tr>
					<td style='width:40%'>
						<select id="chapter" size="3" style="width:100%;height:90px;"name="br">
					</td>
					<td style='width:60%'>
						<div  id="topic" name="topic" style="border:solid 1px;overflow-y: 	scroll;background-color:white;width:100%;height:90px;">
						</div>
								<div id='hide_result' style="padding-top:5px;border:solid 0px;width:100%;height:90px;">
							<center><img src='loading/di_load3.gif' width='200px;' height='20px;'></center>
						</div>
					</td>
				</tr>
			</table></center>
			<center>
				<div class='main_div2' style='width:80%;'>
					<div style="padding-left:5px;padding-top:0px;">
						<table style='width:100%;'>
							<tr>	
								<th style='width:100%;'>
									Concept
								</th>
							</tr>
							<tr>
								<td style='width:100%;'>
									<center><div  id="concept_id" name="concept_id" style="border:solid 1px;overflow-y: 	scroll;background-color:white;width:80%;height:400px;">
									</div>
										<div id='hide_result1' style="padding-top:75px;border:solid 1px;width:80%;height:400px;overflow-y: scroll;">
							<center><img src='loading/di_load.gif' width='66px;' height='66px;'></center>
						</div></center>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</center>
		</div>
		<br/>
		<div id="footer" style="background-color:#0174DF;">
			<center><div style="padding-left:5px;padding-top:5px;font-size:12px;color:black;text-transform: capitalize;"><label style="border:solid 0px;color:white;">Copyright &copy Edutech Educational Services Pvt. Ltd. Ahmedabad, Gujarat, India</label>
			</div></center>
		</div>
	</div>
	
</body>
</html>