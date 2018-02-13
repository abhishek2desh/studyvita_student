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
		<script>
			$(document).ready(function(){
				var cp_value12="",sel_time="";
				$("#examination_schedule").hide();
				$("#test_schedule").hide();
				$('#assinment_schedule').click(function(){
					$("#examination_schedule").show();
					$("#test_schedule").hide();
				});
				$('#forth_schedule').click(function(){
					$("#examination_schedule").hide();
					$("#test_schedule").show();
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
							$("#lv_chap").show();
							$("#chapter_list").show();
						},
					});
				}
			});
		</script>
</head>
<body>
	<div style='background-color:#fff;width:100%'>
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
		<div style='background-color:#fff;width:100%;height:1000px;'>
			<table style="padding-top:0px;border:solid 0px;width:100%;height:25px;">
				<tr>
					<td style="background-color:#3366FF;border:solid 0px;">
						<label style="float:left;color:white"><b>Test/Assignment schedule</b></label>
					</td>
				</tr>
			</table>
			<center><div id="main_div_1" class='main_div2' style='width:80%;'>
				<center><table style="padding-left:20px;border:solid 0px;width:40%%;height:25px;">
					<tr>
						<td style="border:solid 0px;width:20%;height:30px;">
							<input type="button" id="assinment_schedule" style='height:40px;' class='defaultbutton' value="Assignment schedule"/>
						</td>
						<td style="border:solid 0px;width:20%;height:30px;">
							<input type="button" id="forth_schedule" style='height:40px;' class='defaultbutton' value="ForthComing schedule"/>
						</td>
					</tr>
				</table></center><br/>
				<table style="width:100%;height:405px;border:solid 0px;">
					<tr>
						<td valign="top" style="border:solid 0px;">
							<center><div id='test_schedule' style="border:solid 1px;width:80%;height:350px;overflow-y: scroll;">
								<?php
									$result=mysql_query("SELECT DISTINCT DATE_FORMAT(test_date,'%d-%m-%Y') AS test_date,ta.exam_type,from_date,to_Date FROM test_announce ta,SUBJECT s,batch b ,batch_school_map bsp WHERE s.id=ta.sub_id AND b.id=ta.batch_id AND bsp.batch_id=b.id AND ta.batch_id='185'  AND ta.test_date >= '2014-04-10' ORDER BY ta.test_date DESC ");
									echo "<table style='width:100%;'>";
									$rw = mysql_num_rows($result);
									echo "<tr><td style='background-color:grey;'><center>Exam Date</center></td><td style='background-color:grey;'><center>Type Of Exam</center></td><td style='background-color:grey;'><center>Active</center></td></tr>";
									while($row=mysql_fetch_array($result))
									{
										if($row[1] == '30')
										{
											$dtg="Subjective";
										}
										else if($row[1] == '31')
										{
											$dtg="Objective";
										}
										echo "<tr><td><center>$row[0]</center></td></center><td><center>$dtg</center></td></center><td><center>$row[2]-$row[3]</center></td></tr>";
									}
									echo "</table>";
								?>
							</div></center>
							<center><div id='examination_schedule' style="border:solid 1px;width:80%;height:350px;overflow-y: scroll;">
								<?php
									$result=mysql_query("SELECT nw_msd.mat_id AS id,DATE_FORMAT(DATE(nw_msd.upload_date),'%d-%m-%Y'),
									DATE_FORMAT(DATE(nw_msd.submission_date),'%d %b %Y') AS submission,
									m.material_name AS assignment, d.name AS TYPE, s.name AS SUBJECT
									FROM material_submission_details nw_msd, material m, detail d, SUBJECT s
									WHERE nw_msd.id IN( SELECT DISTINCT msd.id FROM material_submission_details msd, material_correct_answers mca,per_material_mapping p
									WHERE msd.mat_id = p.material_id AND p.student_id='4567' AND mca.material_id = msd.mat_id) AND nw_msd.mat_id = m.id
									AND m.material_type_id = d.id AND m.subject_id = s.id AND nw_msd.batch_id='185' AND DATE(nw_msd.submission_date) > '2014-07-10'");
									echo "<table style='width:100%;'>";
									$rw = mysql_num_rows($result);
									echo "<tr><td style='background-color:grey;'><center>Upload Date</center></td><td style='background-color:grey;'><center>Submission Date</center></td><td style='background-color:grey;'><center>Assignment</center></td><td style='background-color:grey;'><center>Type</center></td></tr>";
									while($row=mysql_fetch_array($result))
									{
										echo "<tr><td><center>$row[1]</center></td></center><td><center>$row[2]</center></td></center><td><center>$row[3]</center></td><td><center>$row[4]</center></td></tr>";
									}
									echo "</table>";
								?>
							</div></center>
						</td>
					</tr>
				</table>
			</div></center>
		</div>
		<div id="footer" style="background-color:#0174DF;">
			<center><div style="padding-left:5px;padding-top:5px;font-size:12px;color:black;text-transform: capitalize;"><label style="border:solid 0px;color:white;">Copyright &copy Edutech Educational Services Pvt. Ltd. Ahmedabad, Gujarat, India</label>
			</div></center>
		</div>
	</div>
</body>
</html>