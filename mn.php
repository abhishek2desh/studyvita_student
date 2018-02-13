<?php
	include 'config.php';
	$stud_id='3214';
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
				$result_link=mysql_query("SELECT  c.id,c.name,c.tutor_id,str.batch_id,b.standard_id,b.board_id,u.name FROM student_registered_course str,course c,batch b,user u WHERE str.course_id=c.id AND c.tutor_id=u.id AND str.user_id='$stud_id'
				AND b.id=str.batch_id");
				echo "<div><ul>";
				while($row_link=mysql_fetch_array($result_link))
				{
					echo "<li><a class='sel_course' id ='$row_link[1]' href='?status=$row_link[1]=$row_link[2]' class='parent'><span>$row_link[1]</span></a>";
						$result_link1=mysql_query("SELECT SUBJECT FROM course WHERE id='$row_link[0]'");
						$res_row=mysql_fetch_array($result_link1);
						$lst = explode(",", $res_row[0]);
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
													$result_link3=mysql_query("SELECT DISTINCT c.id,c.name,c.standard_id,c.board_id FROM `document_manager_subjective` dc,chapter c,batch b
													WHERE c.id=dc.chapter_id AND b.id='$row_link[3]' AND  c.standard_id='$row_link[4]' AND c.board_id='$row_link[5]' AND (faculty LIKE '%$row_link[6]%' OR faculty LIKE '%$row_link[2]%') AND SUBJECT='$item' AND Documenttype='Questionpaper' ORDER BY c.id");
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
																$result_link2=mysql_query("SELECT DISTINCT Srno,MaterialName,path FROM `document_manager_subjective` WHERE chapter_id='$row_link3[0]' AND (faculty LIKE '%$row_link[6]%' OR faculty LIKE '%$row_link[2]%') AND SUBJECT='$item' AND Documenttype='Questionpaper'");
																echo "<div><ul>";
																while($row_link2=mysql_fetch_array($result_link2))
																{
																	echo "<li><a class='menu_id' id ='$row_link2[1]' href='?status=$row_link2[1]=$row_link2[2]'><span>$row_link2[1]</span></a></li>";
																}
																echo "</ul></div>";
																echo "</li>";
															}
														echo "</ul></div>";
													}
													else
													{
													
													}
												?>
												</li>
													<?php
													$result_link3=mysql_query("SELECT DISTINCT c.id,c.name,c.standard_id,c.board_id FROM `document_manager_subjective` dc,chapter c,batch b
													WHERE c.id=dc.chapter_id AND b.id='$row_link[3]' AND  c.standard_id='$row_link[4]' AND c.board_id='$row_link[5]' AND(faculty LIKE '%Beena sunil%' OR faculty LIKE '%2390%') AND SUBJECT='$item' AND Documenttype='Assignment' ORDER BY c.id");
													$rs_link=mysql_num_rows($result_link3);
													if($rs_link > 0)
													{
														?>
														<li><a href="#" class="parent"><span>Subjective Assignment</span></a>
														<?php
														echo "<div><ul>";
															while($row_link3=mysql_fetch_array($result_link3))
															{
																echo "<li><a class='chap_id' id='$row_link3[1]' href='?status=$row_link3[0]' ><span>$row_link3[1]</span></a>";
																$result_link2=mysql_query("SELECT DISTINCT Srno,MaterialName,path FROM `document_manager_subjective` WHERE chapter_id='$row_link3[0]' AND(faculty LIKE '%Beena sunil%' OR faculty LIKE '%2390%') AND SUBJECT='$item' AND 
																Documenttype='Assignment'");
																echo "<div><ul>";
																while($row_link2=mysql_fetch_array($result_link2))
																{
																	echo "<li><a class='menu_id' id ='$row_link2[1]' href='?status=$row_link2[1]'><span>$row_link2[1]</span></a></li>";
																}
																echo "</ul></div>";
																echo "</li>";
															}
														echo "</ul></div>";
													}
													else
													{
													}
												?>
												</li>
													<?php
													$result_link3=mysql_query("SELECT DISTINCT c.id,c.name,c.standard_id,c.board_id FROM `document_manager_subjective` dc,chapter c,batch b
													WHERE c.id=dc.chapter_id AND b.id='$row_link[3]' AND  c.standard_id='$row_link[4]' AND c.board_id='$row_link[5]' AND(faculty LIKE '%Beena sunil%' OR faculty LIKE 	'%2390%') AND SUBJECT='$item' AND Documenttype='Notes' ORDER BY c.id");
													$rs_link=mysql_num_rows($result_link3);
													if($rs_link > 0)
													{
														?>
														<li><a href="#" class="parent"><span>Notes</span></a>
														<?php
														echo "<div><ul>";
															while($row_link3=mysql_fetch_array($result_link3))
															{
																echo "<li><a class='chap_id' id='$row_link3[1]' href='?status=$row_link3[0]' class='parent'><span>$row_link3[1]</span></a>";
																$result_link2=mysql_query("SELECT Srno,MaterialName FROM `document_manager_subjective` WHERE SUBJECT='$item' AND board='1' AND chapter_id='$row_link3[0]' AND faculty='$row_link[2]' AND Documenttype='Questionpaper' AND Examtype='Objective'");
																echo "<div><ul>";
																while($row_link2=mysql_fetch_array($result_link2))
																{
																	echo "<li><a class='menu_id' id ='$row_link2[1]' href='?status=$row_link2[1]' class='parent'><span>$row_link2[1]</span></a></li>";
																}
																echo "</ul></div>";
																echo "</li>";
															}
														echo "</ul></div>";
													}
													else
													{
													}
												?>
												</li>
												
													<?php
													$result_link3=mysql_query("SELECT DISTINCT c.id,c.name,c.standard_id,c.board_id FROM `document_manager_subjective` dc,chapter c,batch b
													WHERE c.id=dc.chapter_id AND b.id='$row_link[3]' AND  c.standard_id='$row_link[4]' AND c.board_id='$row_link[5]' AND(faculty LIKE '%Beena sunil%' OR faculty LIKE 	'%2390%') AND SUBJECT='$item' AND Documenttype='PreviousCompetitivePaper' ORDER BY c.id");
													$rs_link=mysql_num_rows($result_link3);
													if($rs_link > 0)
													{
														?>
														<li><a href="#" class="parent"><span>Previous Competitive Paper</span></a>
														<?php
														echo "<div><ul>";
															while($row_link3=mysql_fetch_array($result_link3))
															{
																echo "<li><a class='chap_id' id='$row_link3[1]' href='?status=$row_link3[0]' class='parent'><span>$row_link3[1]</span></a>";
																$result_link2=mysql_query("SELECT Srno,MaterialName FROM `document_manager_subjective` WHERE SUBJECT='$item' AND board='1' AND chapter_id='$row_link3[0]' AND faculty='$row_link[2]' AND Documenttype='Questionpaper' AND Examtype='Objective'");
																echo "<div><ul>";
																while($row_link2=mysql_fetch_array($result_link2))
																{
																	echo "<li><a class='menu_id' id ='$row_link2[1]' href='?status=$row_link2[1]' class='parent'><span>$row_link2[1]</span></a></li>";
																}
																echo "</ul></div>";
																echo "</li>";
															}
														echo "</ul></div>";
													}
													else
													{
													
													}
												?>
												</li>
												
													<?php
													$result_link3=mysql_query("SELECT DISTINCT c.id,c.name FROM `document_manager_subjective` dc,chapter c WHERE c.id=dc.chapter_id AND  faculty='$row_link[2]' AND SUBJECT='$item' AND Documenttype='Assignment'");
													$rs_link=mysql_num_rows($result_link3);
													if($rs_link > 0)
													{
														?>
														<li><a href="#" class="parent"><span>Objective Assignment</span></a>
														<?php
														echo "<div><ul>";
															while($row_link3=mysql_fetch_array($result_link3))
															{
																echo "<li><a class='chap_id' id='$row_link3[1]' href='?status=$row_link3[0]' class='parent'><span>$row_link3[1]</span></a>";
																$result_link2=mysql_query("SELECT Srno,MaterialName FROM `document_manager_subjective` WHERE SUBJECT='$item' AND board='1' AND chapter_id='$row_link3[0]' AND faculty='$row_link[2]' AND Documenttype='Questionpaper' AND Examtype='Objective'");
																echo "<div><ul>";
																while($row_link2=mysql_fetch_array($result_link2))
																{
																	echo "<li><a class='menu_id' id ='$row_link2[1]' href='?status=$row_link2[1]' class='parent'><span>$row_link2[1]</span></a></li>";
																}
																echo "</ul></div>";
																echo "</li>";
															}
														echo "</ul></div>";
													}
													else
													{
													
													}
												?>
												</li>
													<?php
														$result_link3=mysql_query("SELECT DISTINCT c.id,c.name FROM `document_manager_subjective` dc,chapter c WHERE c.id=dc.chapter_id AND  faculty='$row_link[2]' AND SUBJECT='$item' AND Documenttype='SchoolPaper'");
														$rs_link=mysql_num_rows($result_link3);
														if($rs_link > 0)
														{
															?>
															<li><a href="#" class="parent"><span>Objective Assignment</span></a>
															<?php
															echo "<div><ul>";
																while($row_link3=mysql_fetch_array($result_link3))
																{
																	echo "<li><a class='chap_id' id='$row_link3[1]' href='?status=$row_link3[0]' class='parent'><span>$row_link3[1]</span></a>";
																	$result_link2=mysql_query("SELECT Srno,MaterialName FROM `document_manager_subjective` WHERE SUBJECT='$item' AND board='1' AND chapter_id='$row_link3[0]' AND faculty='$row_link[2]' AND Documenttype='Questionpaper' AND Examtype='Objective'");
																	echo "<div><ul>";
																	while($row_link2=mysql_fetch_array($result_link2))
																	{
																		echo "<li><a class='menu_id' id ='$row_link2[1]' href='?status=$row_link2[1]' class='parent'><span>$row_link2[1]</span></a></li>";
																	}
																	echo "</ul></div>";
																	echo "</li>";
																}
															echo "</ul></div>";
														}
														else
														{
														
														}
													?>
												</li>
											</ul></div>
										<?php 
										echo "</li>
										<li><a href='#' class='parent'><span>Video Lectures</span></a>";
										echo "</li><li><a href='#' class='parent'><span>Adaptive Learning</span></a>";
										?>
											<div><ul>
												<li><a href="#" class="parent"><span>Take Test</span></a></li>
												<li><a href="#" class="parent"><span>View My Mistakes</span></a></li>
												<li><a href="#" class="parent"><span>View Result</span></a></li>
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
			?>
			</li>
			<li><a href="#" class="parent"><span>Online Test</span></a>
				<div><ul>
					<li><a href="#" class="parent"><span>Forth Coming Examination</span></a></li>
					<li><a href="#" class="parent"><span>View My Mistakes</span></a></li>
					<li><a href="#" class="parent"><span>View Result</span></a></li>
				</ul></div>
			</li>
			<li><a href="#" class="parent"><span>Result Analysis</span></a>
				<div><ul>
					<li><a href="#" class="parent"><span>UnitWise Analysis</span></a></li>
					<li><a href="#" class="parent"><span>ChapterWise Analysis</span></a></li>
				</ul></div>
			</li>
			<li><a href="#" class="parent"><span>Test/Assignment Schedule</span></a></li>
		</ul>
	</div>
</body>
</html>