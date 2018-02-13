<?php
	include 'config.php';
	session_start();
	$today = strtotime(date("Y-m-d H:i:s"));
	
	$today=$today+(34210);
	$today = date("Y-m-d", $today);
	$today2 = date("l, d F, Y", strtotime('today'));
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
			$("#examination_schedule").hide();
				$("#test_schedule").hide();
					$("#Assignment_pendinglist").hide();
						$("#Assignment_historylist").hide();
			var user_id='<?php echo $s5; ?>';
			var dt1='<?php echo $today; ?>';
			//alert(dt1);
			//alert(user_id);
				var cp_value12="",sel_time="";
				
				$('#assinment_forthcoming').click(function(){
					$("#examination_schedule").show();
					$("#test_schedule").hide();
					$("#Assignment_pendinglist").hide();
					$("#Assignment_historylist").hide();
				});
				$('#forth_schedule').click(function(){
					$("#examination_schedule").hide();
					$("#test_schedule").show();
					$("#Assignment_pendinglist").hide();
					$("#Assignment_historylist").hide();
				});
				$('#assinment_pending').click(function(){
					$("#examination_schedule").hide();
					$("#test_schedule").hide();
					$("#Assignment_pendinglist").show();
					$("#Assignment_historylist").hide();
				});
				$('#assinment_history').click(function(){
					$("#examination_schedule").hide();
					$("#test_schedule").hide();
					$("#Assignment_pendinglist").hide();
					$("#Assignment_historylist").show();
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
		<div style='background-color:#EDF5FA;width:100%;height:500%;'>
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
							<input type="button" id="forth_schedule" style='height:40px;' class='main_div2' onclick='this.style.backgroundColor = 'red';' value="ForthComing Exams"/>
						</td>
						
						<td style="border:solid 0px;width:20%;height:30px;">
							<input type="button" id="assinment_forthcoming" style='height:40px;' class='main_div2' onclick="this.style.backgroundColor = 'red';" value="Forthcoming Assignment"/>
						</td>
							<td style="border:solid 0px;width:20%;height:30px;">
							<input type="button" id="assinment_pending" style='height:40px;' class='main_div2' onclick="this.style.backgroundColor = 'red';" value="Pending Assignment"/>
						</td>
							<td style="border:solid 0px;width:20%;height:30px;">
							<input type="button" id="assinment_history" style='height:40px;' class='main_div2' onclick="this.style.backgroundColor = 'red';" value="Assignment History"/>
						</td>
						
					</tr>
				</table></center><br/>
				<table style="width:100%;height:405px;border:solid 0px;">
					<tr>
						<td valign="top" style="border:solid 0px;">
							<center><div id='test_schedule' style="border:solid 1px;width:80%;height:350px;overflow-y: scroll;">
								<?php
										$result=mysql_query("SELECT DISTINCT DATE_FORMAT(ta.test_date,'%d-%m-%Y') AS test_date,ta.exam_type,ta.chap_id,ta.description FROM test_announce ta,SUBJECT s WHERE s.id=ta.sub_id AND ta.batch_id='$batch_id' AND ta.user_id='$s5'  AND ta.test_date >= '$today' ORDER BY ta.test_date  ");
									echo "<table style='width:100%;'>";
									$rw = mysql_num_rows($result);
									echo "<tr><td><b>ForthComing Exam</b></td><td></td><td></td></tr>";
									echo "<tr><td style='background-color:grey;'><center>Exam Date</center></td><td style='background-color:grey;'><center>Exam Type</center></td><td style='background-color:grey;'><center>Chapter</center></td></tr>";
									if($rw==0)
									{
									echo "<tr><td>No data Found</td></tr>";
									}
									
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
										echo "<tr><td><center>$row[0]</center></td><td><center>$dtg</center></td><td>$row[2] $row[3]</td></tr>";
									}
									echo "</table>";
								?>
							</div></center>
							<center><div id='examination_schedule' style="border:solid 1px;width:80%;height:350px;overflow-y: scroll;">
								<?php
									$result=mysql_query("SELECT DISTINCT nw_msd.mat_id AS id,DATE_FORMAT(DATE(nw_msd.upload_date),'%d-%m-%Y'),DATE_FORMAT(DATE(nw_msd.submission_date),'%d %b %Y') AS submission,m.material_name AS assignment, d.name AS TYPE, s.name AS SUBJECT
									FROM material_submission_details nw_msd, material m, detail d, SUBJECT s,student_details st
									WHERE nw_msd.id IN( SELECT DISTINCT msd.id FROM material_submission_details msd, material_correct_answers mca,per_material_mapping p WHERE msd.mat_id = p.material_id AND p.student_id='$s5' AND mca.material_id = msd.mat_id) AND nw_msd.mat_id = m.id AND m.material_type_id = d.id AND m.subject_id = s.id AND nw_msd.batch_id=st.batch_id AND DATE(nw_msd.submission_date) > '$today' AND
									st.user_id='$s5' AND m.material_type_id=1 and nw_msd.mat_id NOT IN(select material_id from omr_student_score_history where material_id=nw_msd.mat_id and student_id='$s5' ) ");
									echo "<table style='width:100%;'>";
									$rw = mysql_num_rows($result);
									echo "<tr><td><b>ForthComing OMR Assignment</b></td><td></td><td></td><td></td></tr>";
									echo "<tr><td style='background-color:grey;'><center>Upload Date</center></td><td style='background-color:grey;'><center>Submission Date</center></td><td style='background-color:grey;'><center>Subject</center></td><td style='background-color:grey;'><center>Assignment</center></td></tr>";
									if($rw==0)
									{
									echo "<tr><td>No data Found</td></tr>";
									}
									while($row=mysql_fetch_array($result))
									{
										echo "<tr><td><center>$row[1]</center></td><td><center>$row[2]</center></td><td><center>$row[5]</center></td><td><center>$row[3]</center></td></tr>";
									}
									echo "</table>";
									$result1=mysql_query("SELECT DATE_FORMAT(DATE(a.from_date),'%d-%m-%Y'),s.name,a.test_id,DATE_FORMAT(DATE(a.to_date),'%d-%m-%Y') FROM `adaptive_learning_test` a,`subject` s WHERE s.id=a.subject AND DATE(a.from_date)>'$today' AND a.student_id='$s5' AND a.test_type='adaptive_test'");
									echo "<table style='width:100%;'>";
									$rw = mysql_num_rows($result1);
									echo "<tr><td><b>ForthComing Adaptive Assignment</b></td><td></td><td></td><td></td></tr>";
									echo "<tr><td style='background-color:grey;'><center>From Date</center></td><td style='background-color:grey;'><center>To Date</center></td><td style='background-color:grey;'><center>Subject</center></td><td style='background-color:grey;'><center>AssignmentID</center></td></tr>";
									if($rw==0)
									{
									echo "<tr><td>No data Found</td></tr>";
									}
									while($row=mysql_fetch_array($result1))
									{
										echo "<tr><td><center>$row[0]</center></td><td><center>$row[3]</center></td><td><center>$row[1]</center></td><td><center>$row[2]</center></td></tr>";
									}
									echo "</table>";
									//SELECT s.name,a.test_id FROM `adaptive_learning_test` a,`subject` s WHERE s.id=a.subject
									//AND DATE(a.start_time)>'2014-12-25' AND a.student_id='8346' AND a.test_type='adaptive_test'
								?>
							</div></center>
							<center><div id='Assignment_pendinglist' style="border:solid 1px;width:80%;height:350px;overflow-y: scroll;">
								<?php
									$result=mysql_query("SELECT DISTINCT m.id,m.material_name,m.subject_id,DATE_FORMAT(DATE(md.upload_date),'%d-%m-%Y'),DATE_FORMAT(DATE(md.submission_date),'%d-%m-%Y'),sb.name AS SUBJECT FROM material m,per_material_mapping p,material_submission_details md,student_details s,SUBJECT sb WHERE p.student_id='$s5' AND m.id=p.material_id AND sb.id=m.subject_id AND m.material_type_id='1' AND md.mat_id=m.id AND DATE(md.submission_date) < '$today' AND md.batch_id=s.batch_id AND s.user_id=p.student_id AND m.id NOT IN (SELECT `material_id` FROM `omr_student_score_history` WHERE `student_id`='$s5')");
									echo "<table style='width:100%;'>";
									$rw = mysql_num_rows($result);
									echo "<tr><td><b>Pending Assignment</b></td><td></td><td></td><td></td></tr>";
									echo "<tr><td style='background-color:grey;'><center>Upload Date</center></td><td style='background-color:grey;'><center>Submission Date</center></td><td style='background-color:grey;'><center>Subject</center></td><td style='background-color:grey;'><center>Assignment</center></td></tr>";
									if($rw==0)
									{
									echo "<tr><td>No data Found</td></tr>";
									}
									while($row=mysql_fetch_array($result))
									{
										echo "<tr><td><center>$row[3]</center></td><td><center>$row[4]</center></td><td><center>$row[5]</center></td><td><center>$row[1]</center></td></tr>";
									}
									echo "</table>";
								?>
							</div></center>
								<center><div id='Assignment_historylist' style="border:solid 1px;width:80%;height:350px;overflow-y: scroll;">
								<?php
									$result=mysql_query("SELECT DISTINCT m.id,m.material_name,m.subject_id,DATE_FORMAT(DATE(md.upload_date),'%d-%m-%Y'),
									DATE_FORMAT(DATE(md.submission_date),'%d-%m-%Y'),sb.name AS SUBJECT,DATE_FORMAT(DATE(md.submission_date),'%Y-%m-%d')
									FROM material m,per_material_mapping p,material_submission_details md,student_details s,SUBJECT sb 
									WHERE p.student_id='$s5' AND m.id=p.material_id AND sb.id=m.subject_id
									AND m.material_type_id='1' AND md.mat_id=m.id AND md.batch_id=s.batch_id 
									AND s.user_id=p.student_id order by md.submission_date" );
									echo "<table style='width:100%;'>";
									$rw = mysql_num_rows($result);
									echo "<tr><td><b>Assignment History</b></td><td></td><td></td><td></td><td></td></tr>";
									echo "<tr><td style='background-color:grey;'><center>Upload Date</center></td>
									<td style='background-color:grey;'><center>Submission Date</center></td>
									<td style='background-color:grey;'><center>Subject</center></td>
									<td style='background-color:grey;'><center>Assignment</center></td>
									<td style='background-color:grey;'><center>Status</center></td></tr>";
									while($row=mysql_fetch_array($result))
									{
										echo "<tr><td><center>$row[3]</center></td><td><center>$row[4]</center></td><td><center>$row[5]</center></td><td><center>$row[1]</center></td>";
										$result1=mysql_query("SELECT material_id FROM omr_student_score_history WHERE student_id='$s5' and material_id='$row[0]'");
										$rw1 = mysql_num_rows($result1);
										if($rw1>0)
										{
											echo "<td>Complete</td></tr>";
										}
										else
										{
											if(strtotime($row[5]) < strtotime($today))
											{
											echo "<td>Pending</td></tr>";
											}
											else
											{
											echo "<td>Active</td></tr>";
											}
										}									
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