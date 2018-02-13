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
		<script src="js/moment.js" type="text/javascript"></script>
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
			var doc_start_time="",doc_end_time="";
		var page_source="test assignment sub.php";
		currentdate = new Date();
		currentdocid="";
		//alert("l");
		var  submenu_with_menu=0;
								currentdate = moment(currentdate).format("YYYY-MM-DD HH:mm:ss");
								doc_start_time=	currentdate;
								//alert(doc_start_time);
filename1 = "query/insert_menu_log.php?uid="+user_id+"&docid="+currentdocid+"&start_time="+doc_start_time+"&page_source="+page_source+"&submenu_with_menu="+submenu_with_menu;
										//alert(filename1);
										$.ajax({
										url: filename1,
										type: 'GET',
										dataType: 'html',
										success: function(data, textStatus, xhr) {
												//alert(data);
											},
										});
										
										
										
										
									$("#close_window").click(function(){
currentdate = new Date();
								currentdate = moment(currentdate).format("YYYY-MM-DD HH:mm:ss");
								doc_end_time=	currentdate;
								
filename = "query/update_menu_log.php?uid="+user_id+"&docid="+currentdocid+"&start_time="+doc_start_time+"&end_time="+doc_end_time+"&page_source="+page_source+"&submenu_with_menu="+submenu_with_menu;
										
										$.ajax({
										url: filename,
										type: 'GET',
										dataType: 'html',
										success: function(data, textStatus, xhr) {
											//alert(data);
											url = "virtual-class.php";
                              
                                   location.href = url;
											},
										});
});
			//check graphic display
				$(".overlayModal").hide();
				 var content_name="animation";
				filename ="query/check_user_gif_display1.php?user_id="+user_id+"&content_name="+content_name;
					//alert(filename);
						$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						success: function(data, textStatus, xhr) {
						//alert(data);
						if(data=="0")
						{
						
							$(".overlayModal").show();
						
						}
						else
						{
						
							$(".overlayModal").hide();
							
						
						}
						},
						});
				//end check graphic display

			//alert(dt1);
			//alert(user_id);
				var cp_value12="",sel_time="";
				
					$("#search_sub").live('click',function(){
				
				var url="http://student.coreacademics.in/upload-assignment-sheet.php";
					
					location.href=url;
				});
				$("#search1").live('click',function(){
				online_id2="";
				online_id2 = ($(this).closest('tr').attr('id'));
				document_name_qus=online_id2+".pdf";
				var url="http://student.coreacademics.in/Assignment-submission.php?id="+document_name_qus+"&qname="+online_id2;
					
					location.href=url;
				});
				$("#search2").live('click',function(){
				
				
				var url="http://student.coreacademics.in/insrtuction_part3.php";
					
					location.href=url;
				});
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
		<!-- Animation Overlay CSS begins -->
		<style media="screen">
		.overlayModal {
						/* some styles to position the modal at the center of the page */
						position: fixed;
						top: 10%;
						left: 90%;
						/*width: 300px;*/
						/*height: 200px;*/
						/*background-color: #f1c40f;*/
						text-align: center;
						border-radius: 5px;
						/* needed styles for the overlay */
						z-index: 10; /* keep on top of other elements on the page */

				}
/*Animation Overlay CSS Ends*/
		</style>

</head>
<body>
<!-- Animation Content Div -->
	<!--<div class="overlayModal">
		<?php
		$result=mysql_query("SELECT id,path,`upload_file_name_new` FROM `general_document_manager` WHERE file_type='gif' ORDER BY RAND()");
		while($row=mysql_fetch_array($result))
				{
					$full_path="GeneralDocument/".$row[2];
					echo "<img src='$full_path'  style='width:6em;height:6em;padding-right:7px;'>";
					goto exitrec;
				}
	exitrec:
		?>
	</div>-->


	<div style='background-color:#fff;width:100%'>
		<div class='trable_bg' style='position: fixed;z-index: 2;padding-left:0px;color:yellow;border:solid 0px;width:100%'>
			<table style='width:100%' cellspacing="0">
				<tr>
					<td style='width:100%;'>
						<center><?php require 'adlp.php'; ?></center>
					</td>
				</tr>
				
			</table>
		</div>
		<div style='background-color:#fff;width:100%;height:500%;'>
			<table style="padding-top:85px;border:solid 0px;width:100%;height:25px;">
			<!--<tr>
		<td><b>Welcome <?php echo "&nbsp;&nbsp;&nbsp;".$u5."&nbsp;&nbsp;!&nbsp;&nbsp;&nbsp;&nbsp;</b>";
		?>
		</td>
		</tr>-->

				<tr>
					<td style="background-color:#0f2541;border:solid 0px;width:98%">
					<?php
												$result_c=mysql_query("SELECT c.name,u.name FROM course c,user u WHERE c.id='$course_id' and u.id=c.tutor_id");
												$row_c=mysql_fetch_array($result_c);
												$crname=$row_c[0]; 
												$tutorname=$row_c[1]; 
												
												$result_c1=mysql_query("SELECT name FROM subject WHERE id='$subject_id'");
												$row_c1=mysql_fetch_array($result_c1);
												$subname=$row_c1[0];
												echo "<label style='float:left;color:#ffffff;padding-left:5px;'><font face='verdana' size='2' color='white' ><b>Welcome &nbsp;&nbsp;&nbsp;".$u5."&nbsp;&nbsp;!&nbsp;&nbsp;&nbsp;&nbsp;".$tutorname.">".$crname.">".$subname.">"."Test/Assignment schedule<b></font></label>";
												
													
						?>
						
						
					</td>
					<td style="width:2%" valign="right">
							<img src="images/close_image.png" id="close_window" height="25px" width="25" align="right">
							</td>
				</tr>
			</table>
			<center><div id="main_div_1" class='main_div2' style='width:80%;'>
				<center><table style="padding-left:20px;border:solid 0px;width:40%%;height:25px;">
					<tr>
						<td style="border:solid 0px;width:20%;height:30px;">
							<input type="button" id="forth_schedule"  style='height:40px;' class='defaultbutton' onclick='this.style.backgroundColor = 'red';' value="ForthComing Exams"/>
						</td>
						
						<td style="border:solid 0px;width:20%;height:30px;">
							<input type="button" id="assinment_forthcoming"  style='height:40px;' class='defaultbutton' onclick="this.style.backgroundColor = 'red';" value="Forthcoming Assignment"/>
						</td>
							<td style="border:solid 0px;width:20%;height:30px;">
							<input type="button" id="assinment_pending" style='height:40px;' class='defaultbutton' onclick="this.style.backgroundColor = 'red';" value="Pending Assignment"/>
						</td>
							<td style="border:solid 0px;width:20%;height:30px;">
							<input type="button" id="assinment_history" style='height:40px;' class='defaultbutton' onclick="this.style.backgroundColor = 'red';" value="Assignment History"/>
						</td>
						
					</tr>
				</table></center><br/>
				<table style="width:100%;height:405px;border:solid 0px;">
					<tr>
						<td valign="top" style="border:solid 0px;">
							<center><div id='test_schedule' style="border:solid 1px;width:80%;height:350px;overflow-y: scroll;">
								<?php
										$result=mysql_query("SELECT DISTINCT DATE_FORMAT(ta.test_date,'%d-%m-%Y') AS test_date,ta.exam_type,ta.chap_id,ta.description,s.name,ta.from_date,ta.to_date FROM test_announce ta,SUBJECT s WHERE s.id=ta.sub_id AND ta.batch_id='$batch_id' AND ta.user_id='$s5'  AND ta.test_date >= '$today' ORDER BY ta.test_date  ");
									echo "<table style='width:100%;border:solid 0px;'>";
									$rw = mysql_num_rows($result);
									echo "<tr><td style='border:solid 0px;'><b>ForthComing Exams</b></td><td style='border:solid 0px;'></td><td style='border:solid 0px;'></td><td style='border:solid 0px;'></td><td style='border:solid 0px;'></td></tr>";
									echo "<tr><td style='background-color:#3366FF;border:solid 1px;'><center>From Date Time</center></td>
									<td style='background-color:#3366FF;border:solid 1px;'><center>To Date Time</center></td>
									<td style='background-color:#3366FF;border:solid 1px;'><center>Subject</center></td><td style='background-color:#3366FF;border:solid 1px;'><center>Exam Type</center></td><td style='background-color:#3366FF;border:solid 1px;'><center>Chapter</center></td></tr>";
									if($rw==0)
									{
									echo "<tr><td >No data Found</td></tr>";
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
										echo "<tr>";
										if($row[5]=="")
										{
										echo "<td style='border:solid 1px;'><center>$row[0]</center></td><td style='border:solid 1px;'><center>$row[0]</center></td>";
										}
										else
										{
										echo "<td style='border:solid 1px;'><center>$row[5]</center></td><td style='border:solid 1px;'><center>$row[6]</center></td>";
										}
										echo"<td style='border:solid 1px;'><center>$row[4]</center></td>";
										echo"<td style='border:solid 1px;'><center>$dtg</center></td><td style='border:solid 1px;'>$row[2] $row[3]</td></tr>";
									}
									echo "</table>";
								?>
							</div></center>
							<center><div id='examination_schedule' style="border:solid 1px;width:100%;height:350px;overflow-y: scroll;">
								<?php
									$result=mysql_query("SELECT DISTINCT nw_msd.mat_id AS id,DATE_FORMAT(DATE(nw_msd.upload_date),'%d-%m-%Y'),DATE_FORMAT(DATE(nw_msd.submission_date),'%d %b %Y') AS submission,m.material_name AS assignment, d.name AS TYPE, s.name AS SUBJECT
									FROM material_submission_details nw_msd, material m, detail d, SUBJECT s,student_details st
									WHERE nw_msd.id IN( SELECT DISTINCT msd.id FROM material_submission_details msd, material_correct_answers mca,per_material_mapping p WHERE msd.mat_id = p.material_id AND p.student_id='$s5' AND mca.material_id = msd.mat_id) AND nw_msd.mat_id = m.id AND m.material_type_id = d.id AND m.subject_id = s.id AND nw_msd.batch_id=st.batch_id AND DATE(nw_msd.submission_date) > '$today' AND
									st.user_id='$s5' AND m.material_type_id=1 and nw_msd.mat_id NOT IN(select material_id from omr_student_score_history where material_id=nw_msd.mat_id and student_id='$s5' ) ");
									echo "<table style='width:100%;border:solid 0px;'>";
									$rw = mysql_num_rows($result);
									echo "<tr><td><b>ForthComing OMR Assignment</b></td><td></td><td></td><td></td></tr>";
									echo "<tr><td style='background-color:#3366FF;border:solid 1px;'><center>Upload Date</center></td><td style='background-color:#3366FF;border:solid 1px;'><center>Submission Date</center></td><td style='background-color:#3366FF;border:solid 1px;'><center>Subject</center></td><td style='background-color:#3366FF;border:solid 1px;'><center>Assignment</center></td><td style='background-color:#3366FF;border:solid 1px;'><center>Chapter</center></td>
									<td style='background-color:#3366FF;border:solid 1px;'><center></center></td></tr>";
									if($rw==0)
									{
									echo "<tr><td>No data Found</td></tr>";
									}
									while($row=mysql_fetch_array($result))
									{
										echo "<tr id='$row[3]'><td style='border:solid 1px;'><center>$row[1]</center></td><td style='border:solid 1px;'><center>$row[2]</center></td><td style='border:solid 1px;'><center>$row[5]</center></td>";
										$srno_asnt="";
										$chap_id="";
										$desc="";
										$chapter="";
										//for docid
										$result1n=mysql_query("SELECT srno,chapter_id,description  FROM `document_manager_subjective` WHERE materialname='$row[3]'");
										while($row1n=mysql_fetch_array($result1n))
										{
										$srno_asnt=$row1n[0];
										$chap_id=$row1n[1];
										$desc=$row1n[2];
										}
										//end doc id
										
										if($srno_asnt=="")
										{
										
										echo "<td style='border:solid 1px;'><center>$row[3]</center></td>";
										
										}
										else
										{
										echo "<td style='border:solid 1px;'> <center>$srno_asnt</center></td>";
										}
										//for chapter
										 if (is_numeric($chap_id))
										 {
										 $result12=mysql_query("SELECT name  FROM `chapter` WHERE id='$chap_id'");
										 while($row12=mysql_fetch_array($result12))
											{
											$chapter=$row12[0];

										 }
										 }
										 else
										 {
										 $lst = explode(",", $chap_id);
										foreach($lst as $item) 
										{
										if($item=="")
										{
										}
										else
										{
										$result12=mysql_query("SELECT name  FROM `chapter` WHERE id='$chap_id'");
										 while($row12=mysql_fetch_array($result12))
											{
											$chapter=$chapter.$row12[0].",";

										 }
										 
										}
										}
										 }
										//end chapter
										if($chapter=="")
										{
										echo "<td style='border:solid 1px;'><center>$desc</center></td>";
										}
										else
										{
										echo "<td style='border:solid 1px;'><center>$chapter</center></td>";
										}
										echo "<td style='border:solid 1px;'><center><input type='button' class='defaultbutton' id='search1' value='Submit Now' style='width:100%;'/></center></td>";
										echo "</tr>";
									}
									echo "</table>";
									$result1=mysql_query("SELECT DATE_FORMAT(DATE(a.from_date),'%d-%m-%Y'),s.name,a.test_id,DATE_FORMAT(DATE(a.to_date),'%d-%m-%Y') FROM `adaptive_learning_test` a,`subject` s WHERE s.id=a.subject AND DATE(a.from_date)>='$today' AND a.student_id='$s5' AND a.test_type='adaptive_test'");
									echo "<table style='width:100%;border:solid 0px;'>";
									$rw = mysql_num_rows($result1);
									echo "<tr><td><b>ForthComing Adaptive Assignment</b></td><td></td><td></td><td></td></tr>";
									echo "<tr><td style='background-color:#3366FF;border:solid 1px;'><center>From Date</center></td><td style='background-color:#3366FF;border:solid 1px;'><center>To Date</center></td><td style='background-color:#3366FF;border:solid 1px;'><center>Subject</center></td><td style='background-color:#3366FF;border:solid 1px;'><center>AssignmentID</center></td><td style='background-color:#3366FF;border:solid 1px;'><center></center></td></tr>";
									if($rw==0)
									{
									echo "<tr><td>No data Found</td></tr>";
									}
									while($row=mysql_fetch_array($result1))
									{
										echo "<tr><td style='border:solid 1px;'><center>$row[0]</center></td><td style='border:solid 1px;'><center>$row[3]</center></td><td style='border:solid 1px;'><center>$row[1]</center></td><td style='border:solid 1px;'><center>$row[2]</center></td>";
											echo "<td style='border:solid 1px;'><center><input type='button' class='defaultbutton' id='search2' value='Start Now' style='width:100%;'/></center></td>";
										echo "</tr>";
									}
									echo "</table>";
									//SELECT s.name,a.test_id FROM `adaptive_learning_test` a,`subject` s WHERE s.id=a.subject
									//AND DATE(a.start_time)>'2014-12-25' AND a.student_id='8346' AND a.test_type='adaptive_test'
								?>
							</div></center>
							<center><div id='Assignment_pendinglist' style="border:solid 1px;width:80%;height:350px;overflow-y: scroll;">
								<?php
									$result=mysql_query("SELECT DISTINCT m.id,m.material_name,m.subject_id,DATE_FORMAT(DATE(md.upload_date),'%d-%m-%Y'),DATE_FORMAT(DATE(md.submission_date),'%d-%m-%Y'),sb.name AS SUBJECT FROM material m,per_material_mapping p,material_submission_details md,student_details s,SUBJECT sb WHERE p.student_id='$s5' AND m.id=p.material_id AND sb.id=m.subject_id AND m.material_type_id='1' AND md.mat_id=m.id AND DATE(md.submission_date) < '$today' AND md.batch_id=s.batch_id AND s.user_id=p.student_id AND  m.sub_obj_type!='30' and m.id NOT IN (SELECT `material_id` FROM `omr_student_score_history` WHERE `student_id`='$s5')");
									echo "<table style='width:100%;border:solid 0px;'>";
									$rw = mysql_num_rows($result);
									echo "<tr><td><b>Pending Assignment</b></td><td></td><td></td><td></td></tr>";
									echo "<tr><td style='background-color:#3366FF;border:solid 1px;'><center>Upload Date</center></td><td style='background-color:#3366FF;border:solid 1px;'><center>Submission Date</center></td><td style='background-color:#3366FF;border:solid 1px;'><center>Subject</center></td><td style='background-color:#3366FF;border:solid 1px;'><center>Assignment</center></td><td style='background-color:#3366FF;border:solid 1px;'><center></center></td></tr>";
									$flg_0=0;
									
									if($rw==0)
									{
									
									}
									while($row=mysql_fetch_array($result))
									{
										$flg_0=1;
										echo "<tr id='$row[1]'><td style='border:solid 1px;'><center>$row[3]</center></td><td style='border:solid 1px;'><center>$row[4]</center></td><td style='border:solid 1px;'><center>$row[5]</center></td>";
										//for docid
										$result1n=mysql_query("SELECT srno,chapter_id,description  FROM `document_manager_subjective` WHERE materialname='$row[1]'");
										while($row1n=mysql_fetch_array($result1n))
										{
										$srno_asnt=$row1n[0];
										$chap_id=$row1n[1];
										$desc=$row1n[2];
										}
										//end doc id
										
										if($srno_asnt=="")
										{
										
										echo "<td style='border:solid 1px;'><center>$row[1]</center></td>";
										
										}
										else
										{
										echo "<td style='border:solid 1px;'><center>$srno_asnt</center></td>";
										}
										echo "<td style='border:solid 1px;'><center><input type='button' class='defaultbutton' id='search1' value='Submit Now' style='width:100%;'/></center></td>";
										echo "</tr>";
									}
									//for subjective assignment
									$result_sub=mysql_query("SELECT DISTINCT m.id,m.material_name,m.subject_id,DATE_FORMAT(DATE(md.upload_date),'%d-%m-%Y'),DATE_FORMAT(DATE(md.submission_date),'%d-%m-%Y'),sb.name AS SUBJECT,m.documentmanager_refid FROM material m,per_material_mapping p,material_submission_details md,student_details s,SUBJECT sb WHERE p.student_id='$s5' AND m.id=p.material_id AND sb.id=m.subject_id AND m.material_type_id='1' AND md.mat_id=m.id AND DATE(md.submission_date) < '$today' AND md.batch_id=s.batch_id AND s.user_id=p.student_id AND  m.sub_obj_type='30'   AND m.documentmanager_refid NOT IN 
(SELECT DISTINCT `material_id` FROM `student_upload_assignment` WHERE `user_id`='$s5')");
									while($row=mysql_fetch_array($result_sub))
									{
										$flg_0=1;
										echo "<tr id='$row[1]'><td style='border:solid 1px;'><center>$row[3]</center></td><td style='border:solid 1px;'><center>$row[4]</center></td><td style='border:solid 1px;'><center>$row[5]</center></td>";
										//for docid
										$result1n=mysql_query("SELECT srno,chapter_id,description  FROM `document_manager_subjective` WHERE materialname='$row[1]'");
										while($row1n=mysql_fetch_array($result1n))
										{
										$srno_asnt=$row1n[0];
										$chap_id=$row1n[1];
										$desc=$row1n[2];
										}
										//end doc id
										
										if($srno_asnt=="")
										{
										
										echo "<td style='border:solid 1px;'><center>$row[1]</center></td>";
										
										}
										else
										{
										echo "<td style='border:solid 1px;'><center>$srno_asnt</center></td>";
										}
										echo "<td style='border:solid 1px;'><center><input type='button' class='defaultbutton' id='search_sub' value='Submit Now' style='width:100%;'/></center></td>";
										echo "</tr>";
									}
									//end subjective assignment
									if($flg_0==0)
									{
									echo "<tr><td>No data Found</td></tr>";
									}
									echo "</table>";
								?>
							</div></center>
								<center><div id='Assignment_historylist' style="border:solid 1px;width:80%;height:350px;overflow-y: scroll;">
								<?php
									$result=mysql_query("SELECT DISTINCT m.id,m.material_name,m.subject_id,DATE_FORMAT(DATE(md.upload_date),'%d-%m-%Y'),							DATE_FORMAT(DATE(md.submission_date),'%d-%m-%Y'),sb.name AS SUBJECT,DATE_FORMAT(DATE(md.submission_date),'%Y-%m-%d'),m.documentmanager_refid 
									FROM material m,per_material_mapping p,material_submission_details md,student_details s,SUBJECT sb 
									WHERE p.student_id='$s5' AND m.id=p.material_id AND sb.id=m.subject_id
									AND m.material_type_id='1' AND md.mat_id=m.id AND md.batch_id=s.batch_id 
									AND s.user_id=p.student_id order by md.submission_date" );
									echo "<table style='width:100%;border:solid 0px;'>";
									$rw = mysql_num_rows($result);
									echo "<tr><td><b>Assignment History</b></td><td></td><td></td><td></td><td></td></tr>";
									echo "<tr><td style='background-color:#3366FF;border:solid 1px;'><center>Upload Date</center></td>
									<td style='background-color:#3366FF;border:solid 1px;'><center>Submission Date</center></td>
									<td style='background-color:#3366FF;border:solid 1px;'><center>Subject</center></td>
									<td style='background-color:#3366FF;border:solid 1px;'><center>Assignment</center></td>
									<td style='background-color:#3366FF;border:solid 1px;'><center>Status</center></td></tr>";
									while($row=mysql_fetch_array($result))
									{
										echo "<tr><td style='border:solid 1px;'><center>$row[3]</center></td><td style='border:solid 1px;'><center>$row[4]</center></td><td style='border:solid 1px;'><center>$row[5]</center></td>";
										//<td><center>$row[1]</center></td>";
										//for docid
										$doc_type="";
										$result1n=mysql_query("SELECT srno,chapter_id,description,examtype  FROM `document_manager_subjective` WHERE materialname='$row[1]'");
										while($row1n=mysql_fetch_array($result1n))
										{
										$srno_asnt=$row1n[0];
										$chap_id=$row1n[1];
										$desc=$row1n[2];
										$doc_type=$row1n[3];
										}
										//end doc id
										
										if($srno_asnt=="")
										{
										
										echo "<td style='border:solid 1px;'><center>$row[1]</center></td>";
										
										}
										else
										{
										echo "<td style='border:solid 1px;'><center>$srno_asnt</center></td>";
										}
										$result1=mysql_query("SELECT material_id FROM omr_student_score_history WHERE student_id='$s5' and material_id='$row[0]'");
										$rw1 = mysql_num_rows($result1);
										if($rw1>0)
										{
											echo "<td style='border:solid 1px;'>Complete</td></tr>";
										}
										else
										{
											if(strtotime($row[5]) < strtotime($today))
											{
					
							if($doc_type=="Subjective")
							{
							//for subjective
							$result1_sub=mysql_query("SELECT DISTINCT `material_id` FROM `student_upload_assignment` WHERE `user_id`='$s5' and material_id='$row[7]'");
							$rw1_sub = mysql_num_rows($result1_sub);
										if($rw1_sub>0)
										{
											echo "<td style='border:solid 1px;'>Complete</td></tr>";
										}
										else
										{
										echo "<td style='border:solid 1px;'>Pending</td></tr>";
										}
							//end subjective
							}
							else
							{
							echo "<td style='border:solid 1px;'>Pending</td></tr>";
							}
				
											
											}
											else
											{
											if($doc_type=="Subjective")
							{
							//for subjective
							$result1_sub=mysql_query("SELECT DISTINCT `material_id` FROM `student_upload_assignment` WHERE `user_id`='$s5' and material_id='$row[7]'");
							$rw1_sub = mysql_num_rows($result1_sub);
										if($rw1_sub>0)
										{
											echo "<td style='border:solid 1px;'>Complete</td></tr>";
										}
										else
										{
										echo "<td style='border:solid 1px;'>Pending</td></tr>";
										}
							//end subjective
							}
							else
							{
											echo "<td style='border:solid 1px;'>Active</td></tr>";
											}
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
	        <div>
                <?php require 'copy_right_file.php'; ?>
            </div>
	</div>
	<div><?php require 'footer.php'; ?></div>
</body>
</html>