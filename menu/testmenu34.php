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
<td style='width:80%;border:solid 0px;'>
<center>
<nav>
	<ul>
		<li><a href="#">Study Tools</a>
				<ul>
					<li><a href="#">Study Material</a>
					<ul>
		<?php
					echo "<li><a class='chap_id' id='' href='#' >COMBINED CHAPTER</a>";
						echo "<ul>";
									$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path FROM course_batch_material cb,document_manager_subjective dms
									WHERE cb.doc_id=dms.Srno AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id IS NULL  OR dms.chapter_id LIKE '%,%,' OR dms.description LIKE 'Full%' OR dms.chapter LIKE 'Full%')
									AND dms.documenttype='QuestionPaper' AND Examtype='Objective' AND cb.sampledocument='0'");
									$rs_link2=mysql_num_rows($result_link2);
									$flg_subjective1="0";
									$flg_objective1="0";
									if($rs_link2 > 0)
									{
										//echo "<li><a href='#' >Previous TestPaper Objective</a>";
										//echo "<ul>";
											while($row_link2=mysql_fetch_array($result_link2))
											{
											//echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=OQ' //href='#'>$row_link2[0]</a></li>";
											//for checking answer key
									$testtaken="0";
									$result_link336=mysql_query("SELECT SUBSTR(documentcode,1,LENGTH(documentcode)-4) FROM `document_manager_subjective` WHERE srno='$row_link2[0]'");
										$rs_link336=mysql_num_rows($result_link336);
									if($rs_link336 > 0)
									{
									$row_link336=mysql_fetch_array($result_link336);
									$q_name=$row_link336[0];
									$result_link337=mysql_query("SELECT DISTINCT q.name,t.test_taken FROM que_paper q,Test_announce t WHERE t.que_paper_id=q.id AND t.test_taken=1 AND q.name='$q_name'");
									$rs_link37=mysql_num_rows($result_link337);
									$flg="0";
									if($rs_link37 > 0)
										{
										if($flg_objective1=="0")
										{
										echo "<li><a href='#' >Previous TestPaper Objective</a>";
										echo "<ul>";
										$flg_objective1="1";
										}
										while($row_link337=mysql_fetch_array($result_link337))
											{
												$testtaken=$row_link337[1];
												if($testtaken=="1")
												{ 
													if($flg=="0")
													{
													
														echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=OQ' href='#'>$row_link2[0]</a></li>";
														$flg="1";
													}
												}
											}
											
										}
										
								
									}
									//end checking answer key

											}
											if($flg_objective1=="1")
											{
											echo "</ul>";
											echo "</li>";
											}
									}
									$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path FROM course_batch_material cb,document_manager_subjective dms
									WHERE cb.doc_id=dms.Srno AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id IS NULL  OR dms.chapter_id LIKE '%,%,'  OR dms.description LIKE 'Full%' OR dms.chapter LIKE 'Full%')
									AND dms.documenttype='QuestionPaper' AND Examtype='Objective' AND cb.sampledocument='1'");
									$rs_link2=mysql_num_rows($result_link2);
									if($rs_link2 > 0)
									{
										echo "<li><a href='#' >Sample TestPaper Objective</a>";
										echo "<ul>";
											while($row_link2=mysql_fetch_array($result_link2))
											{
											echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=OQ' href='#'>$row_link2[0]</a></li>";
											}
										echo "</ul>";
										echo "</li>";
									}
									$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path FROM course_batch_material cb,document_manager_subjective dms
									WHERE cb.doc_id=dms.Srno AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id IS NULL  OR dms.chapter_id LIKE '%,%,' OR dms.description LIKE 'Full%' OR dms.chapter LIKE 'Full%')
									AND dms.documenttype='Assignment' AND Examtype='Objective'");
									$rs_link2=mysql_num_rows($result_link2);
									if($rs_link2 > 0)
									{
										echo "<li><a href='#' >Objective Assignment</a>";
										echo "<ul>";
											while($row_link2=mysql_fetch_array($result_link2))
											{
												echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=OQ' href='#'>$row_link2[0]</a></li>";
											}
										echo "</ul>";
										echo "</li>";
									}
									$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path FROM course_batch_material cb,document_manager_subjective dms
									WHERE cb.doc_id=dms.Srno AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id IS NULL  OR dms.chapter_id LIKE '%,%,'  OR dms.description LIKE 'Full%' OR dms.chapter LIKE 'Full%')
									AND dms.documenttype='QuestionPaper' AND Examtype='Subjective' AND cb.sampledocument='0'");
									$rs_link2=mysql_num_rows($result_link2);
									if($rs_link2 > 0)
									{
										//echo "<li><a href='#' >Previous TestPaper Subjective</a>";
										//echo "<ul>";
											while($row_link2=mysql_fetch_array($result_link2))
											{
												//echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=OQ' //href='#'>$row_link2[0]</a></li>";
													
												//for checking answer key
								$testtaken="0";
								$result_link338=mysql_query("SELECT SUBSTR(documentcode,1,LENGTH(documentcode)-4) FROM `document_manager_subjective` WHERE srno='$row_link2[0]'");
									$rs_link338=mysql_num_rows($result_link338);
									if($rs_link338 > 0)
									{
									$row_link338=mysql_fetch_array($result_link338);
									$q_name=$row_link338[0];
									$result_link339=mysql_query("SELECT DISTINCT q.name,t.test_taken FROM que_paper q,Test_announce t WHERE t.que_paper_id=q.id AND t.test_taken=1 AND q.name='$q_name'");
									$rs_link39=mysql_num_rows($result_link339);
									$flg="0";
									if($rs_link39 > 0)
										{
										if($flg_subjective1=="0")
										{
											echo "<li><a href='#' >Previous TestPaper Subjective</a>";
											echo "<ul>";
											$flg_subjective1="1";
										}
										while($row_link339=mysql_fetch_array($result_link339))
											{
												$testtaken=$row_link339[1];
												if($testtaken=="1")
												{ 
													if($flg=="0")
													{
													
														echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=OQ' href='#'>$row_link2[0]</a></li>";
														$flg="1";
													}
												}
											}
											
										}
										
								
									}
									//end checking answer key
											}
											if($flg_subjective1=="1")
											{
											echo "</ul>";
											echo "</li>";
										}
									}
									$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path FROM course_batch_material cb,document_manager_subjective dms
									WHERE cb.doc_id=dms.Srno AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id IS NULL  OR dms.chapter_id LIKE '%,%,'  OR dms.description LIKE 'Full%' OR dms.chapter LIKE 'Full%')
									AND dms.documenttype='QuestionPaper' AND Examtype='Subjective' AND cb.sampledocument='1'");
									$rs_link2=mysql_num_rows($result_link2);
									if($rs_link2 > 0)
									{
										echo "<li><a href='#' >Sample TestPaper Subjective</a>";
										echo "<ul>";
											while($row_link2=mysql_fetch_array($result_link2))
											{
											echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=OQ' href='#'>$row_link2[0]</a></li>";

												//end while
											}
										echo "</ul>";
										echo "</li>";
									}
									$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path FROM course_batch_material cb,document_manager_subjective dms
									WHERE cb.doc_id=dms.Srno AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id IS NULL  OR dms.chapter_id LIKE '%,%,'  OR dms.description LIKE 'Full%' OR dms.chapter LIKE 'Full%')
									AND dms.documenttype='Assignment' AND Examtype='Subjective'");
									$rs_link2=mysql_num_rows($result_link2);
									if($rs_link2 > 0)
									{
										echo "<li><a href='#' >Subjective Assignment</a>";
										echo "<ul>";
											while($row_link2=mysql_fetch_array($result_link2))
											{
												echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=OQ' href='#'>$row_link2[0]</a></li>";
											}
										echo "</ul>";
										echo "</li>";
									}
									$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path FROM course_batch_material cb,document_manager_subjective dms
									WHERE cb.doc_id=dms.Srno AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id IS NULL  OR dms.chapter_id LIKE '%,%,'  OR dms.description LIKE 'Full%' OR dms.chapter LIKE 'Full%')
									AND dms.documenttype='Notes'");
									$rs_link2=mysql_num_rows($result_link2);
									if($rs_link2 > 0)
									{
										echo "<li><a href='#' >Notes</a>";
										echo "<ul>";
											while($row_link2=mysql_fetch_array($result_link2))
											{
												echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=OQ' href='#'>$row_link2[0]</a></li>";
											}
										echo "</ul>";
										echo "</li>";
									}
									
					echo "</ul>";
				echo "</li>";
			$result_link3=mysql_query("SELECT DISTINCT c.id,UCASE(c.name) FROM `course_batch_material` cb,`document_manager_subjective` dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' ORDER BY c.standard_id desc,c.ch_no");
			
			$ch_new="";
			$flg_subjective="0";
			$flg_objective="0";
			$flg_subjective1="0";
			$flg_objective1="0";
			$rs_link=mysql_num_rows($result_link3);
					if($rs_link > 0)
					{
						while($row_link3=mysql_fetch_array($result_link3))
						{
						$flg_subjective="0";
						$flg_objective="0";
						echo "<li><a class='chap_id' id='$row_link3[1]' href='#' >$row_link3[1]</a>";
						echo "<ul>";
						$ch_new="";
						$ch_new=$row_link3[0].",";
						$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id='$row_link3[0]' or dms.chapter_id='$ch_new') AND dms.documenttype='QuestionPaper' AND Examtype='Objective' AND dms.MaterialName LIKE '%_Qus' AND cb.sampledocument='0'");
							$rs_link2=mysql_num_rows($result_link2);
							if($rs_link2 > 0)
							{
							//echo "<li><a href='#' >Previous TestPaper Objective</a>";
							//echo "<ul>";
								while($row_link2=mysql_fetch_array($result_link2))
								{
								//for checking answer key
								$testtaken="0";
								$result_link335=mysql_query("SELECT SUBSTR(documentcode,1,LENGTH(documentcode)-4) FROM `document_manager_subjective` WHERE srno='$row_link2[0]'");
									$rs_link335=mysql_num_rows($result_link335);
									if($rs_link335 > 0)
									{
									$row_link335=mysql_fetch_array($result_link335);
									$q_name=$row_link335[0];
									$result_link33=mysql_query("SELECT DISTINCT q.name,t.test_taken FROM que_paper q,Test_announce t WHERE t.que_paper_id=q.id AND t.test_taken=1 AND q.name='$q_name'");
									$rs_link3=mysql_num_rows($result_link33);
									$flg="0";
									if($rs_link3 > 0)
										{
										if($flg_objective=="0")
										{
										echo "<li><a href='#' >Previous TestPaper Objective</a>";
										echo "<ul>";
										$flg_objective="1";
										}
										while($row_link33=mysql_fetch_array($result_link33))
											{
												$testtaken=$row_link33[1];
												if($testtaken=="1")
												{ 
													if($flg=="0")
													{
													
														echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=OQ' href='#'>$row_link2[0]</a></li>";
														$flg="1";
													}
												}
												else
												{
												
												}
											}
											
										}
										
								
									}
									//end checking answer key
								//$result_link33=mysql_query("SELECT DISTINCT q.name,t.test_taken FROM que_paper q,`mat_online_paper_set` //m,Test_announce t WHERE q.id=m.que_paper_id AND m.mat_id IN(SELECT id FROM material WHERE //Documentmanager_refid='$row_link2[0]') AND t.que_paper_id=q.id");
								//$rs_link3=mysql_num_rows($result_link33);
								//$flg="0";
								
								
							
								}
							if($flg_objective=="1")
							{
							echo "</ul>";
							echo "</li>";
							}
							
							
							}
								$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id='$row_link3[0]' or dms.chapter_id='$ch_new') AND dms.documenttype='QuestionPaper' AND Examtype='Objective' AND dms.MaterialName LIKE '%_Qus' AND cb.sampledocument='1'");
								
							$rs_link2=mysql_num_rows($result_link2);
							if($rs_link2 > 0)
							{
							
							echo "<li><a href='#' >Sample TestPaper Objective</a>";
							echo "<ul>";
								while($row_link2=mysql_fetch_array($result_link2))
								{
								echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=OQ' href='#'>$row_link2[0]</a></li>";
								}
							echo "</ul>";
							echo "</li>";
							
							}
							//ch_new=$row_link3[0].",";
							$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id='$row_link3[0]' or dms.chapter_id ='$ch_new')AND dms.documenttype='Assignment' AND dms.Examtype='Objective'  AND dms.MaterialName LIKE '%_Qus'");
							
							$rs_link2=mysql_num_rows($result_link2);
							
							if($rs_link2 > 0)
							{	
								echo "<li><a href='#' >Objective Assignment</a>";
								echo "<ul>";
								while($row_link2=mysql_fetch_array($result_link2))
								{
								echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=OA' href='#'>$row_link2[0]</a></li>";
								}
								echo "</ul>";
								echo "</li>";
							}
							$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id='$row_link3[0]' or dms.chapter_id='$ch_new') AND dms.documenttype='Questionpaper' AND dms.Examtype='Subjective' AND dms.MaterialName LIKE '%_Qus' AND cb.sampledocument='0'");
						
							$rs_link2=mysql_num_rows($result_link2);
							
							if($rs_link2 > 0)
							{
								//echo "<li><a href='#'>Previous Testpaper Subjective </a>";
								//echo "<ul>";
									while($row_link2=mysql_fetch_array($result_link2))
									{
									//for checking answer key
									$testtaken="0";
									$flg="0";
									
									/*$result_link34=mysql_query("SELECT DISTINCT q.name,t.test_taken FROM que_paper q,`mat_online_paper_set` m,Test_announce t WHERE q.id=m.que_paper_id AND m.mat_id IN(SELECT id FROM material WHERE Documentmanager_refid='$row_link2[0]') AND t.que_paper_id=q.id and t.test_taken=1");*/
									$result_link334=mysql_query("SELECT SUBSTR(documentcode,1,LENGTH(documentcode)-4) FROM `document_manager_subjective` WHERE srno='$row_link2[0]'");
									$rs_link334=mysql_num_rows($result_link334);
									if($rs_link334 > 0)
									{
									$row_link334=mysql_fetch_array($result_link334);
									$q_name=$row_link334[0];
									$result_link34=mysql_query("SELECT DISTINCT q.name,t.test_taken FROM que_paper q,Test_announce t WHERE t.que_paper_id=q.id AND t.test_taken=1 AND q.name='$q_name'");
									$rs_link3=mysql_num_rows($result_link34);
									
										if($rs_link3 > 0)
										{
									
														if ($flg_subjective=="0")
														{
															//echo $flg_subjective.$row_link2[0];
														echo "<li><a href='#'>Previous Testpaper Subjective </a>";
														echo "<ul>";
														$flg_subjective="1";
														}
											while($row_link333=mysql_fetch_array($result_link34))
												{
													$testtaken=$row_link333[1];
													if($testtaken=="1")
													{
														
														if($flg=="0")
														{
														
														echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=SQ' href='#'>$row_link2[0]</a></li>";
															$flg="1";
														}
															
													}
													
												}
										}
										//end checking answer key
									}
									}
									if ($flg_subjective=="1")
									{
									echo "</ul>";
									echo "</li>";
									}
							}
							$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id='$row_link3[0]' or dms.chapter_id='$ch_new') AND dms.documenttype='Questionpaper' AND dms.Examtype='Subjective' AND dms.MaterialName LIKE '%_Qus' AND cb.sampledocument='1'");
							$rs_link2=mysql_num_rows($result_link2);
							if($rs_link2 > 0)
							{
								echo "<li><a href='#'>Sample Testpaper Subjective</a>";
								echo "<ul>";
									while($row_link2=mysql_fetch_array($result_link2))
									{
									echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=SQ' href='#'>$row_link2[0]</a></li>";
									}
									echo "</ul>";
									echo "</li>";
							}
							$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id='$row_link3[0]' or  dms.chapter_id='$ch_new') AND dms.documenttype='Assignment' AND dms.Examtype='Subjective' AND dms.MaterialName LIKE '%_Qus' ");
							$rs_link2=mysql_num_rows($result_link2);
							if($rs_link2 > 0)
							{
								echo "<li><a href='#'>Subjective Assignment</a>";
								echo "<ul>";
									while($row_link2=mysql_fetch_array($result_link2))
									{
									echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=SA' href='#'>$row_link2[0]</a></li>";
									}
									echo "</ul>";
									echo "</li>";
							}
							$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id='$row_link3[0]' or dms.chapter_id='$ch_new') AND dms.documenttype='Notes'");
							$rs_link2=mysql_num_rows($result_link2);
							if($rs_link2 > 0)
							{
								echo "<li><a href='#'>Notes</a>";
								echo "<ul>";
									while($row_link2=mysql_fetch_array($result_link2))
									{
										echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=NT' href='#'>$row_link2[0]</a></li>";
									}
									echo "</ul>";
									echo "</li>";
							}
							
							$result_link2=mysql_query("SELECT DISTINCT mm.SubTopic,cv.course_id,cv.video_id,mm.Pathfilename,mm.Subject,mm.board,mm.standard 
							FROM course_video cv,media_manager mm WHERE cv.course_id='$course_id' AND mm.id=cv.video_id AND 
							mm.chap_id='$row_link3[0]' AND mm.pathfilename is not null");
							$rs_link2=mysql_num_rows($result_link2);
							if($rs_link2 > 0)
							{
								echo "<li><a href='#'>Video Lectures</a>";
								echo "<ul>";
									while($row_link2=mysql_fetch_array($result_link2))
									{
									echo "<li><a class='menu_id' id ='$row_link2[2]=$row_link2[3]=video=VD' href='#'>$row_link2[3]</a></li>";
									}
									echo "</ul>";
									echo "</li>";
							}
							$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id='$row_link3[0]' or dms.chapter_id='$ch_new') AND dms.documenttype='PPT'");
							
							$rs_link2=mysql_num_rows($result_link2);
							if($rs_link2 > 0)
							{
								echo "<li><a href='#'>PPT</a>";
								echo "<ul>";
									while($row_link2=mysql_fetch_array($result_link2))
									{
										echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=ppt=PT' href='#'>$row_link2[0]</a></li>";
									}
									echo "</ul>";
									echo "</li>";
							}
						echo "</ul>";
						echo "</li>";
						}
					}
				
			
?>
					</ul>
					</li>
					<li><a href="index_video.php">Video Library</a>
					</li>
					<li><a href="#" >Adaptive Learning</a>
						<ul>
								<li><a href="test_paper_generator.php">Take Test</a></li>
								<li><a href="view_my_mistakes.php">View My Mistakes</a></li>
								<li><a href="view_my_result.php">View Result</a></li>
						</ul>
					</li>
					<!--<li><a href="#" >Adaptive Asssignment</a>
							<ul>
								<li><a href="insrtuction_part3.php">Asssignment Test</a></li>
								<li><a href="view_my_mistakes_adp.php">View My Mistakes</a></li>
								<li><a href="view_my_result_adp.php">View Result</a></li>
							</ul>
					</li>-->
					<li><a href="#" >Personal Assignment</a>
							<ul>
								<li><a href="personlized_paper_test.php?val=1">Take Test</a></li>
								<li><a href="personlized_paper_test.php?val=2">View My Mistakes</a></li>
								<li><a href="personlized_paper_test.php?val=3">View Result</a></li>
							</ul>
					</li>
					<li><a href="web_resources.php" >Web Resources</a></li>
				</ul>
		</li>
		<li><a href="#">Online Test</a>
			<ul>
				<li><a href="#">Scheduled Test</a>
					<ul>
						<li><a href="insrtuction_part.php">Take Test</a></li>
						<li><a href="view_my_mistakes_admin.php">View My Mistakes</a></li>
						<li><a href="view_my_result_admin.php">View Result</a></li>
					</ul>
				</li>
				<li><a href="#">Adaptive Test</a>
					<ul>
						<li><a href="insrtuction_part3.php">Take Test</a></li>
						<li><a href="view_my_mistakes_adp.php">View My Mistakes</a></li>
						<li><a href="view_my_result_adp.php">View Result</a></li>
					</ul>
				</li>
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
							$full_path="../StudentPhotos/".$photos;
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
<td style='width:20%;border:solid 0px;'>
	<button class="button">
	<?php
		$result_photos=mysql_query("SELECT student_photos FROM USER WHERE id='$s5'");
		$row_photos=mysql_fetch_array($result_photos);
		$photos=$row_photos[0]; 
		if($photos == "")
		{
			$full_path="../"."StudentPhotos/blank_user_icon2.PNG";
			//echo "<img src='$full_path' height='100px' width='100%' />";
			echo "<img src='images/student-512.png' height='20px' width='20px;'alt='student photo'/>";
		}
		else
		{
			$full_path="../"."StudentPhotos/".$photos;
			//echo "<img src='$full_path' height='100px' width='100%' />";
			echo "<img src='$full_path' height='20px' width='20px;'alt='student photo'/>";
		}
		echo "&nbsp;&nbsp;&nbsp;&nbsp;";
		echo $u5;
	?>
	
	</button>
</td>
</tr>
</table>
</body>
</html>