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
	function killCopy(e){
		return false
	}
	function reEnable(){
		return true
	}
	document.onselectstart=new Function ("return false")
	if (window.sidebar){
		document.onmousedown=killCopy
		document.onclick=reEnable
	}
</script>
<script> 
$(document).ready(function(){
	var vlc="";
	$("a.pf_info").hover(function(){
		$("#shadow").slideToggle("normal");
		$("#div_user_dis").slideToggle("normal");
	});
	$("a.menu_id").click(function(){
		//alert("menu_id11");
		var mat_id2=$(this).attr('id').split('=');
		mat_id=mat_id2[0];
		path=mat_id2[1];
		video=mat_id2[2];
		type=mat_id2[3];
		//alert(type);
		//alert("sanjay"+mat_id+path);
		if(video == "file")
		{
			url="student_course_page.php?mat_id="+mat_id+"&path="+path+"&vl=2&type="+type;
			location.href=url;
		}
		else if(video == "video")
		{
			url="student_course_page.php?mat_id="+mat_id+"&path="+path+"&vl="+video+"&type="+type;
			location.href=url;
		}
		else if(video == "ppt")
		{
			url="student_course_page.php?mat_id="+mat_id+"&path="+path+"&vl="+video+"&type="+type;
			location.href=url;
		}
		//alert(url);
		//url=url.substr(0, url.lastIndexOf('?')) +"?vl=2";
		//alert(url);
		//location.href=url;
	});
});
</script>
<style>
nav ul ul {
	display: none;
	font-family:Century Gothic;
	 z-index:9999;
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
	list-style: none;
	position: relative;
}
nav ul li:hover a {
	color: black;
}

nav ul li a {
	display: block; padding: 7px 20px;
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
.button {
   border-top: 1px solid #96d1f8;
   background: #65a9d7;
   background: -webkit-gradient(linear, left top, left bottom, from(#3e779d), to(#65a9d7));
   background: -webkit-linear-gradient(top, #3e779d, #65a9d7);
   background: -moz-linear-gradient(top, #3e779d, #65a9d7);
   background: -ms-linear-gradient(top, #3e779d, #65a9d7);
   background: -o-linear-gradient(top, #3e779d, #65a9d7);
   padding: 8.5px 17px;
   -webkit-border-radius: 6px;
   -moz-border-radius: 6px;
   border-radius: 6px;
   -webkit-box-shadow: rgba(0,0,0,1) 0 1px 0;
   -moz-box-shadow: rgba(0,0,0,1) 0 1px 0;
   box-shadow: rgba(0,0,0,1) 0 1px 0;
   text-shadow: rgba(0,0,0,.4) 0 1px 0;
   color: white;
   font-size: 15px;
   font-family: Georgia, Serif;
   text-decoration: none;
   vertical-align: middle;
   }
.button:hover {
   border-top-color: #28597a;
   background: #28597a;
   color: #ccc;
   }
.button:active {
   border-top-color: #1b435e;
   background: #1b435e;
   }
</style>
</head>
<body>
<table style='width:100%;'>
<tr>
<td style='width:10%;'>
<button class="button">
<img src="images/student-512.png" height='15px' width='15px;'alt="Save icon"/>&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo $u5; ?>
</button>
</td>
<td style='width:90%;'>
<center>
<nav>
	<ul>
		<li><a href="#">Study Tools</a>
				<ul>
					<li><a href="#">Study Material</a>
							<ul>
								<?php
									$result_link3=mysql_query("SELECT DISTINCT c.id,UCASE(c.name) FROM `course_batch_material` cb,`document_manager_subjective` dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND dms.documenttype='QuestionPaper' AND Examtype='Objective' ORDER BY c.standard_id desc,c.ch_no");
									$rs_link=mysql_num_rows($result_link3);
									if($rs_link > 0)
									{
										?>
										<li><a href="#" >Objective QuestionPaper</a>
										<?php
										echo "<ul>";
											while($row_link3=mysql_fetch_array($result_link3))
											{
												echo "<li><a class='chap_id' id='$row_link3[1]' href='#' >$row_link3[1]</a>";
												$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND dms.chapter_id='$row_link3[0]' AND dms.documenttype='QuestionPaper' AND Examtype='Objective'");
												echo "<ul>";
												while($row_link2=mysql_fetch_array($result_link2))
												{
													echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=OQ' href='#'>$row_link2[0]</a></li>";
												}
												echo "</ul>";
												echo "</li>";
											}
											echo "<li><a class='chap_id' id='' href='#' >COMBINED CHAPTER</a>";
											echo "<ul>";
												$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path FROM course_batch_material cb,document_manager_subjective dms
												WHERE cb.doc_id=dms.Srno AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id IS NULL  OR dms.chapter_id LIKE ',%,')
												AND dms.documenttype='QuestionPaper' AND Examtype='Objective'");
												while($row_link2=mysql_fetch_array($result_link2))
												{
													echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=OQ' href='#'>$row_link2[0]</a></li>";
												}
											echo "</ul>";
											echo "</li>";
										echo "</ul></li>";
									}
									else
									{
									
									}
									$result_link3=mysql_query("SELECT DISTINCT c.id,UCASE(c.name) FROM `course_batch_material` cb,`document_manager_subjective` dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND dms.documenttype='Assignment' AND Examtype='Objective' ORDER BY c.standard_id desc,c.ch_no");
									$rs_link=mysql_num_rows($result_link3);
									if($rs_link > 0)
									{
										?>
										<li><a href="#" >Objective Assignment</a>
										<?php
										echo "<ul>";
											while($row_link3=mysql_fetch_array($result_link3))
											{
												echo "<li><a class='chap_id' id='$row_link3[1]' href='#' >$row_link3[1]</a>";
												$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND dms.chapter_id='$row_link3[0]' AND dms.documenttype='Assignment' AND Examtype='Objective'");
												echo "<ul>";
												while($row_link2=mysql_fetch_array($result_link2))
												{
													echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=OA' href='#'>$row_link2[0]</a></li>";
												}
												echo "</ul>";
												echo "</li>";
											}
											echo "<li><a class='chap_id' id='' href='#' >COMBINED CHAPTER</a>";
											echo "<ul>";
												$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path FROM course_batch_material cb,document_manager_subjective dms
												WHERE cb.doc_id=dms.Srno AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id IS NULL  OR dms.chapter_id LIKE ',%,')
												AND dms.documenttype='Assignment' AND Examtype='Objective'");
												while($row_link2=mysql_fetch_array($result_link2))
												{
													echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=OQ' href='#'>$row_link2[0]</a></li>";
												}
											echo "</ul>";
											echo "</li>";
										echo "</ul></li>";
									}
									else
									{
									
									}
									$result_link3=mysql_query("SELECT DISTINCT c.id,UCASE(c.name) FROM `course_batch_material` cb,`document_manager_subjective` dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND dms.documenttype='Questionpaper' AND Examtype='Subjective' ORDER BY c.standard_id desc,c.ch_no");
									$rs_link=mysql_num_rows($result_link3);
									if($rs_link > 0)
									{
										?>
										<li><a href="#" >Subjective Questionpaper</a>
										<?php
										echo "<ul>";
											while($row_link3=mysql_fetch_array($result_link3))
											{
												echo "<li><a class='chap_id' id='$row_link3[1]' href='#' >$row_link3[1]</a>";
												$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND dms.chapter_id='$row_link3[0]' AND dms.documenttype='Questionpaper' AND Examtype='Subjective'");
												echo "<ul>";
												while($row_link2=mysql_fetch_array($result_link2))
												{
													echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=SQ' href='#'>$row_link2[0]</a></li>";
												}
												echo "</ul>";
												echo "</li>";
											}
											echo "<li><a class='chap_id' id='' href='#' >COMBINED CHAPTER</a>";
											echo "<ul>";
												$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path FROM course_batch_material cb,document_manager_subjective dms
												WHERE cb.doc_id=dms.Srno AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id IS NULL  OR dms.chapter_id LIKE ',%,')
												AND dms.documenttype='QuestionPaper' AND Examtype='Subjective'");
												while($row_link2=mysql_fetch_array($result_link2))
												{
													echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=OQ' href='#'>$row_link2[0]</a></li>";
												}
											echo "</ul>";
											echo "</li>";
										echo "</ul></li>";
									}
									else
									{
									
									}
									$result_link3=mysql_query("SELECT DISTINCT c.id,UCASE(c.name) FROM `course_batch_material` cb,`document_manager_subjective` dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND dms.documenttype='Assignment' AND Examtype='Subjective' ORDER BY c.standard_id desc,c.ch_no");
									$rs_link=mysql_num_rows($result_link3);
									if($rs_link > 0)
									{
										?>
										<li><a href="#" >Subjective Assignment</a>
										<?php
										echo "<ul>";
											while($row_link3=mysql_fetch_array($result_link3))
											{
												echo "<li><a class='chap_id' id='$row_link3[1]' href='#' >$row_link3[1]</a>";
												$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND dms.chapter_id='$row_link3[0]' AND dms.documenttype='Assignment' AND Examtype='Subjective'");
												echo "<ul>";
												while($row_link2=mysql_fetch_array($result_link2))
												{
													echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=SA' href='#'>$row_link2[0]</a></li>";
												}
												echo "</ul>";
												echo "</li>";
											}
											echo "<li><a class='chap_id' id='' href='#' >COMBINED CHAPTER</a>";
											echo "<ul>";
												$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path FROM course_batch_material cb,document_manager_subjective dms
												WHERE cb.doc_id=dms.Srno AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id IS NULL  OR dms.chapter_id LIKE ',%,')
												AND dms.documenttype='Assignment' AND Examtype='Subjective'");
												while($row_link2=mysql_fetch_array($result_link2))
												{
													echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=OQ' href='#'>$row_link2[0]</a></li>";
												}
											echo "</ul>";
											echo "</li>";
										echo "</ul></li>";
									}
									else
									{
									
									}
									$result_link3=mysql_query("SELECT DISTINCT c.id,UCASE(c.name)FROM `course_batch_material` cb,`document_manager_subjective` dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND dms.documenttype='Notes' ORDER BY c.standard_id desc,c.ch_no");
									$rs_link=mysql_num_rows($result_link3);
									if($rs_link > 0)
									{
										?>
										<li><a href="#" >Notes</a>
										<?php
										echo "<ul>";
											while($row_link3=mysql_fetch_array($result_link3))
											{
												echo "<li><a class='chap_id' id='$row_link3[1]' href='#' >$row_link3[1]</a>";
												$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND dms.chapter_id='$row_link3[0]' AND dms.documenttype='Notes'");
												echo "<ul>";
												while($row_link2=mysql_fetch_array($result_link2))
												{
													echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=NT' href='#'>$row_link2[0]</a></li>";
												}
												echo "</ul>";
												echo "</li>";
											}
											echo "<li><a class='chap_id' id='' href='#' >COMBINED CHAPTER</a>";
											echo "<ul>";
												$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path FROM course_batch_material cb,document_manager_subjective dms
												WHERE cb.doc_id=dms.Srno AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id IS NULL  OR dms.chapter_id LIKE ',%,')
												AND dms.documenttype='Notes'");
												while($row_link2=mysql_fetch_array($result_link2))
												{
													echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=OQ' href='#'>$row_link2[0]</a></li>";
												}
											echo "</ul>";
											echo "</li>";
										echo "</ul></li>";
									}
									else
									{
									}
									$result_link3=mysql_query("SELECT  DISTINCT UCASE(mm.Chaptername),mm.SubTopic,cv.course_id,cv.video_id,mm.Pathfilename,mm.Subject,mm.board,mm.standard FROM course_video cv,`media_manager` mm,course c,board b,standard s WHERE cv.`course_id`='$course_id' AND cv.video_id=mm.id AND c.id=cv.course_id AND mm.board=b.name AND mm.standard=s.name");
									$rs_link=mysql_num_rows($result_link3);
									if($rs_link > 0)
									{
										?>
										<li><a href="#" >Video Lectures</a>
										<?php
										echo "<ul>";
											while($row_link3=mysql_fetch_array($result_link3))
											{
												echo "<li><a class='video_lk' href='#' >$row_link3[0]</a>";
												$result_link2=mysql_query("SELECT DISTINCT mm.SubTopic,cv.course_id,cv.video_id,mm.Pathfilename,mm.Subject,mm.board,mm.standard FROM course_video cv,`media_manager` mm,course c,board b,standard s WHERE cv.`course_id`='$course_id' AND cv.video_id=mm.id AND c.id=cv.course_id AND mm.board=b.name AND mm.standard=s.name  AND mm.Chaptername='$row_link3[0]'");
												echo "<ul>";
												while($row_link2=mysql_fetch_array($result_link2))
												{
													echo "<li><a class='menu_id' id ='$row_link2[2]=$row_link2[3]=video=VD' href='#'>$row_link2[3]</a></li>";
												}
												echo "</ul>";
												echo "</li>";
											}
										echo "</ul></li>";
									}
									else
									{
									}
									$result_link3=mysql_query("SELECT DISTINCT c.id,UCASE(c.name) FROM `course_batch_material` cb,`document_manager_subjective` dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND dms.documenttype='PPT' ORDER BY c.standard_id desc,c.ch_no");
									$rs_link=mysql_num_rows($result_link3);
									if($rs_link > 0)
									{
										?>
										<li><a href="#" >PPT</a>
										<?php
										echo "<ul>";
											while($row_link3=mysql_fetch_array($result_link3))
											{
												echo "<li><a class='chap_id' id='$row_link3[1]' href='#' >$row_link3[1]</a>";
												$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND dms.chapter_id='$row_link3[0]' AND dms.documenttype='PPT'");
												echo "<ul>";
												while($row_link2=mysql_fetch_array($result_link2))
												{
													echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=ppt=PT' href='#'>$row_link2[0]</a></li>";
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
						<li><a href='index_video.php'>Video Library</a>";
						echo "</li>
						<li><a href='#' >Adaptive Learning</a>";
						?>
							<ul>
								<li><a href="test_paper_generator.php">Take Test</a></li>
								<li><a href="view_my_mistakes.php">View My Mistakes</a></li>
								<li><a href="view_my_result.php">View Result</a></li>
							</ul>
						<?php
						echo "</li>
						<li><a href='#' >Adaptive Asssignment</a>";
						?>
							<ul>
								<li><a href="insrtuction_part3.php">Asssignment Test</a></li>
								<li><a href="view_my_mistakes_adp.php">View My Mistakes</a></li>
								<li><a href="view_my_result_adp.php">View Result</a></li>
							</ul>
						<?php
						echo "</li>
						<li><a href='#' >Personal Assignment</a>";
						?>
							<ul>
								<li><a href="personlized_paper_test.php?val=1">Take Test</a></li>
								<li><a href="personlized_paper_test.php?val=2">View My Mistakes</a></li>
								<li><a href="personlized_paper_test.php?val=3">View Result</a></li>
							</ul>
						<?php
						echo "</li>";
						echo "<li><a href='web_resources.php' >Web Resources</a></li>";
				echo "</ul>";
										
			?>
		</li>
		<li><a href="#">Online Test</a>
			<ul>
				<li><a href="insrtuction_part.php">Take Test</a></li>
				<li><a href="view_my_mistakes_admin.php">View My Mistakes</a></li>
				<li><a href="view_my_result_admin.php">View Result</a></li>
			</ul>
		</li>
		<li><a href="#">Result Analysis</a>
			<ul>
				<li><a href="diagnostic_analysis.php">UnitWise Analysis</a></li>
				<li><a href="diagnostic_analysis_ch.php">ChapterWise Analysis</a></li>
			</ul>
		</li>
		<li><a href="test assignment sub.php">Test/Assignment Schedule</a></li>
		<li><a href="Update_info.php">My Profile</a></li>
		<li><a href="student_course_page2.php">Home</a></li>
		<!--<li><a href="#" class='pf_info'><?php echo $u5; ?></a>
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
							//$full_path="../"."StudentPhotos/blank_user_icon2.PNG";
							$full_path="images/student-512.png";
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
		</li>-->
		<li><a href="logout.php">Log-Out</a>
		</li>
	</ul>
</nav></center>
</td>
</tr>
</table>
</body>
</html>