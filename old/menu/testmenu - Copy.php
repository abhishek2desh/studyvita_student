<?php
	include 'config.php';
	session_start();
	$stud_id=$_SESSION['sid'];
	$s5=$_SESSION['sid'];
	$u5 = $_SESSION['uname'];
	$course_id=$_SESSION['course_id'];
	$batch_id=$_SESSION['batch_id'];
	$subject_id=$_SESSION['subject_id'];
	
?>
<html>
<head>
<script> 
$(document).ready(function(){
	$("a.pf_info").hover(function(){
		$("#shadow").slideToggle("normal");
		$("#div_user_dis").slideToggle("normal");
	});
	$("a.menu_id").click(function(){
		alert("menu_id");
		var mat_id2=$(this).attr('id').split('=');
		mat_id=mat_id2[0];
		path=mat_id2[1];
		alert("sanjay"+mat_id+path);
		url="student_course_page.php?mat_id="+mat_id+"&path="+path+"&vl=2";
		//location.href=url.substr(0, input.lastIndexOf('?')) || url;
		location.href=url;
		alert(url);
		//url=url.substr(0, url.lastIndexOf('?')) +"?vl=2";
		alert(url);
		//location.href=url;
	});
});
</script>
<style>
nav ul ul {
	display: none;
	font-family:Century Gothic;
}
nav ul li:hover > ul {
	display: block;
}
nav ul {
	background: #efefef; 
	background: linear-gradient(top, #566D7E 40%, #2B3856 60%);  
	background: -moz-linear-gradient(top, #566D7E 40%, #2B3856 60%); 
	background: -webkit-linear-gradient(top, #566D7E 40%,#2B3856 60%); 
	box-shadow: 0px 0px 9px rgba(0,0,0,0.15);
	padding: 0 20px;
	border-radius: 10px;  
	list-style: none;
	position: relative;
	font-family:Century Gothic;
	display: inline-table;
}
nav ul:after {
	content: ""; clear: both; display: block;
}
nav ul li {
	float: left;
}
nav ul li:hover {
	border-radius: 5px;
	background: #4b545f;
	background: linear-gradient(top, #EDF5FA 40%, #CFCFCF 60%);
	background: -moz-linear-gradient(top, #EDF5FA 40%, #CFCFCF 60%);
	background: -webkit-linear-gradient(top, #EDF5FA 40%,#CFCFCF 60%);
}
nav ul li:hover a {
	color: black;
}

nav ul li a {
	display: block; padding: 5px 20px;
	color: white; text-decoration: none;
}
nav ul ul {
	background:rgb(224,236,248) ; border-radius: 0px; padding: 0;
	position: absolute; top: 100%;	
}
nav ul ul li {
	float: none; 
	border-top: 1px solid #6b727c;
	border-bottom: 1px solid #575f6a;
	position: relative;
}
nav ul ul li a {
	padding: 10px 20px;
	color: #fff;
	width:250px;
}	
nav ul ul li a:hover {
	background: orange;
}
nav ul ul ul {
position: absolute; left: 100%; top:0;
}	
</style>
</head>
<body>
<nav>
	<ul>
		<li><a href="#">Study Tools</a>
			<?php
				
				echo "<ul>";
					echo "<li><a href='#' class='parent'><span>Study Material</span></a>";
						?>
							<ul>
								<?php
									$result_link3=mysql_query("SELECT DISTINCT c.id,c.name FROM `course_batch_material` cb,`document_manager_subjective` dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND dms.documenttype='Questionpaper' AND Examtype='Objective'");
									$rs_link=mysql_num_rows($result_link3);
									if($rs_link > 0)
									{
										?>
										<li><a href="#" class="parent"><span>Previous QuestionPaper</span></a>
										<?php
										echo "<ul>";
											while($row_link3=mysql_fetch_array($result_link3))
											{
												echo "<li><a class='chap_id' id='$row_link3[1]' href='?status=$row_link3[0]' ><span>$row_link3[1]</span></a>";
												$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND dms.chapter_id='$row_link3[0]' AND dms.documenttype='Questionpaper' AND Examtype='Objective'");
												echo "<div><ul>";
												while($row_link2=mysql_fetch_array($result_link2))
												{
													echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]' href='#'><span>$row_link2[0]</span></a></li>";
												}
												echo "</ul></div>";
												echo "</li>";
											}
										echo "</ul></li>";
									}
									else
									{
									
									}
									$result_link3=mysql_query("SELECT DISTINCT c.id,c.name FROM `course_batch_material` cb,`document_manager_subjective` dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND dms.documenttype='Assignment' AND Examtype='Objective' limit 8");
									$rs_link=mysql_num_rows($result_link3);
									if($rs_link > 0)
									{
										?>
										<li><a href="#" class="parent"><span>Objective Assignment</span></a>
										<?php
										echo "<ul>";
											while($row_link3=mysql_fetch_array($result_link3))
											{
												echo "<li><a class='chap_id' id='$row_link3[1]' href='?status=$row_link3[0]' ><span>$row_link3[1]</span></a>";
												$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND dms.chapter_id='$row_link3[0]' AND dms.documenttype='Assignment' AND Examtype='Objective'");
												echo "<ul>";
												while($row_link2=mysql_fetch_array($result_link2))
												{
													echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]' href='#'><span>$row_link2[0]</span></a></li>";
												}
												echo "</ul>";
												echo "</li>";
											}
										echo "</ul></li>";
									}
									else
									{
									
									}
								?>
							</ul>
						<?php 
						echo "</li>
						<li><a href='#' class='parent'><span>Video Lectures</span></a>";
						echo "</li><li><a href='#' class='parent'><span>Adaptive Learning</span></a>";
						?>
							<ul>
								<li><a href="test_paper_generator.php"><span>Take Test</span></a></li>
								<li><a href="view_my_mistakes.php"><span>View My Mistakes</span></a></li>
								<li><a href="view_my_result.php"><span>View Result</span></a></li>
							</ul>
						<?php
						echo "</li>
						<li><a href='#' class='parent'><span>Personal Assignment</span></a></li>";
				echo "</ul>";
										
			?>
		</li>
		<li><a href="#">Online Test</a>
		</li>
		<li><a href="#">Result Analysis</a>
			<ul>
			<li><a href="diagnostic_analysis.php"><span>UnitWise Analysis</span></a></li>
			<li><a href="diagnostic_analysis_ch.php"><span>ChapterWise Analysis</span></a></li>
			</ul>
		</li>
		<li><a href="test_assignment_Schedule.php">Test/Assignment Schedule</a>
		</li>
		<li><a href="Update_info.php">Update Info</a>
		</li>
		<li><a href="#" class='pf_info'><?php echo $u5; ?></a>
			<div id="div_user_dis">
				<div class="err" id="add_err"></div>
					<table style="border:solid 0px;width:250px;height:auto;"><tr><td>
					<div style="border:solid 0px;width:62px;height:auto;">
					<?php
						$result_photos=mysql_query("SELECT student_photos FROM USER WHERE id='$s5'");
						$row_photos=mysql_fetch_array($result_photos);
						$photos=$row_photos[0]; 
						if($photos == "")
						{
							$full_path="../"."StudentPhotos/blank_user_icon2.PNG";
							echo "<img src='$full_path' height='70px' width='60px' />";
						}
						else
						{
							$full_path="../"."StudentPhotos/".$photos;
							echo "<img src='$full_path' height='70px' width='60px' />";
						}
					?>
					</div></td><td><?php echo "$u5"; ?><br/> <?php echo "Student ID : $stud_id"; ?></td></tr>
					</table>
			</div>
		</li>
		<li><a href="logout.php">Log-Out</a>
		</li>
	</ul>
</nav>
</body>
</html>