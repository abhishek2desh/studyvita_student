<?php
	include 'config.php';
	$stud_id=$_SESSION['sid'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <title></title>
    
</head>
<body>

<style type="text/css">
* { margin:0;
    padding:0;
}
html { background:#444; }
body {
    
    width:100%;
    height:auto;
    background:#222;
    overflow:hidden;
}
</style>
	<div id="menu">
		<ul class="menu">
			<li><a href="#" class="parent"><span>Course Details</span></a>
			<?php
				$result_link=mysql_query("SELECT DISTINCT c.id,c.name,c.tutor_id,u.name 
				FROM student_registered_course str,course c,USER u WHERE str.course_id=c.id AND c.tutor_id=u.id AND str.user_id='$stud_id'");
				echo "<div><ul>";
				while($row_link=mysql_fetch_array($result_link))
				{
					echo "<li><a class='sel_course' id ='$row_link[1]' href='?status=$row_link[1]=$row_link[2]' class='parent'><span>$row_link[1]</span></a>";
						$result_link_bt=mysql_query("SELECT DISTINCT b.id,b.name,b.standard_id,b.board_id FROM student_registered_course str,course c,USER u,batch b WHERE str.course_id=c.id AND c.tutor_id=u.id AND str.user_id='$stud_id' AND course_id='$row_link[0]' AND b.id=str.batch_id");
						echo "<div><ul>";
							while($res_row_bt=mysql_fetch_array($result_link_bt))
							{
								echo "<li><a class='course_bt' id ='$res_row_bt[1]' href='?status=$res_row_bt[1]=$res_row_bt[2]' class='parent'><span>$res_row_bt[1]</span></a>";
									$result_link1=mysql_query("SELECT SUBJECT FROM course WHERE id='$row_link[0]'");
									$res_row=mysql_fetch_array($result_link1);
									$sb_mn=substr($res_row[0], 0, -1);
									$lst = explode(",", $sb_mn);
									echo "<div><ul>";
									foreach($lst as $item) 
									{
										$result_link11=mysql_query("SELECT id,name FROM subject WHERE id='$item'");
										$res_row1=mysql_fetch_array($result_link11);
										echo "<li><a class='sel_subject' id ='$res_row1[0]' href='?status=$res_row1[0]' class='parent'><span>$res_row1[1]</span></a>";
											echo "<div><ul>";
												echo "<li><a href='#' class='parent'><span>Study Material</span></a>";
													?>
														<div><ul>
															<?php
																$result_link3=mysql_query("SELECT DISTINCT c.id,c.name FROM `course_batch_material` cb,`document_manager_subjective` dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$res_row_bt[0]' AND SUBJECT='$item' AND dms.documenttype='Questionpaper' AND Examtype='Objective'");
																$rs_link=mysql_num_rows($result_link3);
																if($rs_link > 0)
																{
																	?>
																	<li><a href="#" class="parent"><span>Previous QuestionPaper</span></a>
																	<?php
																	echo "<div><ul>";
																		while($row_link3=mysql_fetch_array($result_link3))
																		{
																			echo "<li><a class='chap_id' id='$row_link3[1]' href='?status=$row_link3[0]' ><span>$row_link3[1]</span></a>";
																			$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$res_row_bt[0]' AND SUBJECT='$item' AND dms.chapter_id='$row_link3[0]' AND dms.documenttype='Questionpaper' AND Examtype='Objective'");
																			echo "<div><ul>";
																			while($row_link2=mysql_fetch_array($result_link2))
																			{
																				echo "<li><a class='menu_id' id ='$row_link2[1]' href='?status=$row_link2[1]=$row_link2[2]'><span>$row_link2[0]</span></a></li>";
																			}
																			echo "</ul></div>";
																			echo "</li>";
																		}
																	echo "</ul></div></li>";
																}
																else
																{
																
																}
																$result_link3=mysql_query("SELECT DISTINCT c.id,c.name FROM `course_batch_material` cb,`document_manager_subjective` dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$res_row_bt[0]' AND SUBJECT='$item' AND dms.documenttype='Assignment' AND Examtype='Objective' limit 8");
																$rs_link=mysql_num_rows($result_link3);
																if($rs_link > 0)
																{
																	?>
																	<li><a href="#" class="parent"><span>Objective Assignment</span></a>
																	<?php
																	echo "<div><ul>";
																		while($row_link3=mysql_fetch_array($result_link3))
																		{
																			echo "<li><a class='chap_id' id='$row_link3[1]' href='?status=$row_link3[0]' ><span>$row_link3[1]</span></a>";
																			$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$res_row_bt[0]' AND SUBJECT='$item' AND dms.chapter_id='$row_link3[0]' AND dms.documenttype='Assignment' AND Examtype='Objective'");
																			echo "<div><ul>";
																			while($row_link2=mysql_fetch_array($result_link2))
																			{
																			 	echo "<li><a class='menu_id' id ='$row_link2[1]' href='?status=$row_link2[1]=$row_link2[2]'><span>$row_link2[0]</span></a></li>";
																			}
																			echo "</ul></div>";
																			echo "</li>";
																		}
																	echo "</ul></div></li>";
																}
																else
																{
																
																}
															?>
														</ul></div>
													<?php 
													echo "</li>
													<li><a href='#' class='parent'><span>Video Lectures</span></a>";
													echo "</li><li><a href='#' class='parent'><span>Adaptive Learning</span></a>";
													?>
														<div><ul>
															<li><a href="test_paper_generator.php"><span>Take Test</span></a></li>
															<li><a href="view_my_mistakes.php"><span>View My Mistakes</span></a></li>
															<li><a href="view_my_result.php"><span>View Result</span></a></li>
														</ul></div>
													<?php
													echo "</li>
													<li><a href='#' class='parent'><span>Personal Assignment</span></a></li>";
											echo "</ul></div>";
										echo "</li>";
									}
									echo "</ul></div>";
								echo "</li>";
							}
						echo "</ul></div>";
					echo "</li>";
				}
				echo "</ul></div>";
			?>
			</li>
			<li><a href="#" class="parent"><span>Online Test</span></a>
				<div><ul>
					<li><a href="forth_coming_exam_list.php"><span>Forth Coming Examination</span></a></li>
					<li><a href="view_my_mistakes.php"><span>View My Mistakes</span></a></li>
					<li><a href="view_my_result.php"><span>View Result</span></a></li>
				</ul></div>
			</li>
			<li><a href="#" class="parent"><span>Result Analysis</span></a>
				<div><ul>
					<li><a href="diagnostic_analysis.php"><span>UnitWise Analysis</span></a>
						<?php
							$result_link=mysql_query("SELECT DISTINCT c.id,c.name,c.tutor_id,u.name 
							FROM student_registered_course str,course c,USER u WHERE str.course_id=c.id AND c.tutor_id=u.id AND str.user_id='$stud_id'");
							echo "<div><ul>";
							while($row_link=mysql_fetch_array($result_link))
							{
								echo "<li><a class='sel_course' id ='$row_link[1]' href='?status=$row_link[1]=$row_link[2]' class='parent'><span>$row_link[1]</span></a>";
									$result_link_bt=mysql_query("SELECT DISTINCT b.id,b.name,b.standard_id,b.board_id FROM student_registered_course str,course c,USER u,batch b WHERE str.course_id=c.id AND c.tutor_id=u.id AND str.user_id='$stud_id' AND course_id='$row_link[0]' AND b.id=str.batch_id");
									echo "<div><ul>";
										while($res_row_bt=mysql_fetch_array($result_link_bt))
										{
											echo "<li><a class='course_bt' id ='$res_row_bt[1]' href='?status=$res_row_bt[1]=$res_row_bt[2]' class='parent'><span>$res_row_bt[1]</span></a>";
											$result_link1=mysql_query("SELECT SUBJECT FROM course WHERE id='$row_link[0]'");
											$res_row=mysql_fetch_array($result_link1);
											$sb_mn=substr($res_row[0], 0, -1);
											$lst = explode(",", $sb_mn);
											echo "<div><ul>";
											foreach($lst as $item) 
											{
												$result_link11=mysql_query("SELECT id,name FROM subject WHERE id='$item'");
												$res_row1=mysql_fetch_array($result_link11);
												echo "<li><a class='sel_subject' id ='=$res_row1[0]' href='#' ><span>$res_row1[1]</span></a>";
												echo "</li>";
											}
											echo "</ul></div></li>";
										}
									echo "</ul></div>";
							}
							echo "</ul></div>";
							?>
					</li>
					<li><a href="diagnostic_analysis_ch.php"><span>ChapterWise Analysis</span></a>
						<?php
							$result_link=mysql_query("SELECT DISTINCT c.id,c.name,c.tutor_id,u.name 
							FROM student_registered_course str,course c,USER u WHERE str.course_id=c.id AND c.tutor_id=u.id AND str.user_id='$stud_id'");
							echo "<div><ul>";
							while($row_link=mysql_fetch_array($result_link))
							{
								echo "<li><a class='sel_course' id ='$row_link[1]' href='?status=$row_link[1]=$row_link[2]' class='parent'><span>$row_link[1]</span></a>";
									$result_link_bt=mysql_query("SELECT DISTINCT b.id,b.name,b.standard_id,b.board_id FROM student_registered_course str,course c,USER u,batch b WHERE str.course_id=c.id AND c.tutor_id=u.id AND str.user_id='$stud_id' AND course_id='$row_link[0]' AND b.id=str.batch_id");
									echo "<div><ul>";
										while($res_row_bt=mysql_fetch_array($result_link_bt))
										{
											echo "<li><a class='course_bt' id ='$res_row_bt[1]' href='?status=$res_row_bt[1]=$res_row_bt[2]' class='parent'><span>$res_row_bt[1]</span></a>";
											$result_link1=mysql_query("SELECT SUBJECT FROM course WHERE id='$row_link[0]'");
											$res_row=mysql_fetch_array($result_link1);
											$sb_mn=substr($res_row[0], 0, -1);
											$lst = explode(",", $sb_mn);
											echo "<div><ul>";
											foreach($lst as $item) 
											{
												$result_link11=mysql_query("SELECT id,name FROM subject WHERE id='$item'");
												$res_row1=mysql_fetch_array($result_link11);
												echo "<li><a class='sel_subject' id ='=$res_row1[0]' href='#' ><span>$res_row1[1]</span></a>";
												echo "</li>";
											}
											echo "</ul></div></li>";
										}
									echo "</ul></div>";
							}
							echo "</ul></div>";
							?>
					</li>
				</ul></div>
			</li>
			<li><a href="test_assignment_Schedule.php" class="parent"><span>Test/Assignment Schedule</span></a></li>
			<li><a href="Update_info.php"><span>Update Info</span></a></li>
			<li><a href="logout.php" class="parent"><span>Log-Out</span></a></li>
		</ul>
	</div>
</body>
</html>