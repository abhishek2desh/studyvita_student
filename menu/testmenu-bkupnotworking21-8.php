<?php
	include 'config.php';
	session_start();
	$stud_id=$_SESSION['sid'];
	$s5=$_SESSION['sid'];
	$u5 = $_SESSION['uname'];
	$course_id=$_SESSION['course_id'];
	$batch_id=$_SESSION['batch_id'];
	$domaimname1=$_SESSION['domain_name'];
	//echo $batch_id;
	$subject_id=$_SESSION['subject_id'];
	$result_as=mysql_query("SELECT * FROM batch_menubar_list WHERE batch_id='$batch_id'");
	$count=mysql_num_rows($result_as);
	if($count > 0)
	{
		$val_for_ct=1;
	}
	else
	{
		$val_for_ct=0;
	}
	
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
	list-style: none;
	position: relative;
}
nav ul li:hover a {
	color: white;
}

nav ul li a {
	display: block; padding: 7px 15px;
	color: white; text-decoration: none;
}
nav ul ul {
	background: #783874; border-radius: 0px; padding: 0;
	position: absolute; top: 100%;	
	min-width: 200px;
}
nav ul ul li {
	float: none; 
	border-top: 1px solid #fff;
	border-radius: 5px;
	position: relative;
	min-width: 200px;
}
nav ul ul li a {
	padding: 10px 20px;
	color: #fff;
}	
nav ul ul li a:hover {
	background: #ffcc29;
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
	<?php
	st_id_check="";
		$st_id_check=",".$s5.",";
		if($val_for_ct == 1)
		{	
			$sql_in="SELECT DISTINCT ml.useful_link,ml.hyper_link,ml.id FROM `batch_menubar_list` bt,menubar_list ml WHERE bt.menu_id=ml.id  AND bt.batch_id='$batch_id' order by ml.Priority";	
		}
		else
		{
			$sql_in="SELECT useful_link,hyper_link,id FROM menubar_list WHERE define_user='student' AND active='1'  and demo_menu='1' order by Priority";	
		}
			$result_in=mysql_query($sql_in);
			while($row_in=mysql_fetch_array($result_in))
			{
				echo "<li><a href='$row_in[1]'>$row_in[0]</a>";
					if($val_for_ct == 1)
					{
						$sql_sub="SELECT DISTINCT sl.useful_link,sl.hyper_link,sl.id,sl.menu_id FROM `batch_menubar_list` bt,menubar_list ml,submenubar_list sl WHERE bt.menu_id=ml.id AND bt.sub_menu_id=sl.id AND bt.batch_id='$batch_id' AND sl.menu_id='$row_in[2]' order by sl.Priority";
					}
					else
					{
						$sql_sub="SELECT useful_link,hyper_link,id FROM `submenubar_list` WHERE menu_id='$row_in[2]' AND active='1'  and demo_submenu='1' order by Priority";
					}
					//echo $sql_sub;
					$result_sub=mysql_query($sql_sub);
					echo "<ul>";
					while($row_sub=mysql_fetch_array($result_sub))
					{
					if($row_sub[0] == "Schedule Test" || $row_sub[0] == "Adaptive Test" || $row_sub[0] == "Chapterwise Test" || $row_sub[0] == "Customized Test")
					{
						if($subject_id == 20)
						{
						goto nextmenu;
						}
					}
					if($row_sub[0] == "Mock Test" )
					{
						if($subject_id == 20)
						{
						
						}
						else
						{
						goto nextmenu;
						}
					}
						echo "<li><a href='$row_sub[1]'>$row_sub[0]</a>";
							if($row_sub[0] == "Study Material")
							{
								$currentDate = strtotime(date("Y-m-d H:i:s"));
								$futureDate = $currentDate+(34389);
								$formatDate = date("Y-m-d H:i:s", $futureDate);
							echo "<ul>";
								echo "<li><a class='chap_id' id='' href='#' >COMBINED CHAPTER</a>";
									echo "<ul>";
										$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Globalfile_path,dms.globalfile_name,dms.Chapter,dms.description,cb.Allot_studentwise,cb.studentlist FROM course_batch_material cb,document_manager_subjective dms
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
														/*(if($row_link2[3]=="")
														{
														echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=OQ' href='#'>$row_link2[0]</a></li>";
														}
														else
														{
														echo "<li><a class='menu_id' id ='$row_link2[4]=$row_link2[3]=file=OQ' href='#'>$row_link2[0]</a></li>";
														}*/
														
															echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=OQ' href='#'>".$row_link2[0]."</a></li>";
															$flg="1";
														}
													}
												}
												
											}
											
									
										}
										//end checking answer key
										labelnx:
												}
												if($flg_objective1=="1")
												{
												echo "</ul>";
												echo "</li>";
												}
										}
										$flg_samobj="0";
										$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description,cb.Allot_studentwise,cb.studentlist FROM course_batch_material cb,document_manager_subjective dms
										WHERE cb.doc_id=dms.Srno AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id IS NULL  OR dms.chapter_id LIKE '%,%,'  OR dms.description LIKE 'Full%' OR dms.chapter LIKE 'Full%')
										AND dms.documenttype='QuestionPaper' AND Examtype='Objective' AND cb.sampledocument='1'");
										$rs_link2=mysql_num_rows($result_link2);
										if($rs_link2 > 0)
										{
										
												while($row_link2=mysql_fetch_array($result_link2))
												{
													
													if($flg_samobj=="0")
													{
														echo "<li><a href='#' >Sample TestPaper Objective</a>";
														echo "<ul>";
														$flg_samobj="1";
													}
													echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=OQ' href='#'>".$row_link2[0]."</a></li>";
													labelnx1:
												}
												if($flg_samobj=="1")
												{
												echo "</ul>";
												echo "</li>";
												}
										}
										$flg_objasnt="0";
										$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description,cb.Allot_studentwise,cb.studentlist FROM course_batch_material cb,document_manager_subjective dms
										WHERE cb.doc_id=dms.Srno AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id IS NULL  OR dms.chapter_id LIKE '%,%,' OR dms.description LIKE 'Full%' OR dms.chapter LIKE 'Full%')
										AND dms.documenttype='Assignment' AND Examtype='Objective'");
										$rs_link2=mysql_num_rows($result_link2);
										if($rs_link2 > 0)
										{
											
												while($row_link2=mysql_fetch_array($result_link2))
												{
												
													if($flg_objasnt=="0")
													{
														echo "<li><a href='#' >Objective Assignment</a>";
														echo "<ul>";
														$flg_objasnt="1";
													}
													echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=OA' href='#'>".$row_link2[0]."</a></li>";
													labelnx2:
												}
												if($flg_objasnt=="1")
												{
												echo "</ul>";
												echo "</li>";
												}
										}
										$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description,cb.Allot_studentwise,cb.studentlist FROM course_batch_material cb,document_manager_subjective dms
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
										if($rs_link39==0)
													{
														$result_subt=mysql_query("SELECT dt.testid FROM documentid_testid_refer dt,document_manager_subjective d WHERE d.materialname='$q_name' AND dt.documentid=d.srno");
														$rs_linksubt=mysql_num_rows($result_subt);
														if($rs_linksubt>0)
														{
															while($row_linksubt=mysql_fetch_array($result_subt))
															{
															$result_link339=mysql_query("SELECT DISTINCT q.name,t.test_taken FROM que_paper q,Test_announce t WHERE t.que_paper_id=q.id AND t.test_taken=1 AND q.name='$row_linksubt[0]'");
																$rs_link39=mysql_num_rows($result_link339);
															}
														}
													}
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
														
															echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=SQ' href='#'>".$row_link2[0]."</a></li>";
															$flg="1";
														}
													}
												}
												
											}
											
									
										}
										//end checking answer key
										labelnx3:
												}
												if($flg_subjective1=="1")
												{
												echo "</ul>";
												echo "</li>";
											}
										}
										$flg_samsub="0";
										$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description,cb.Allot_studentwise,cb.studentlist FROM course_batch_material cb,document_manager_subjective dms
										WHERE cb.doc_id=dms.Srno AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id IS NULL  OR dms.chapter_id LIKE '%,%,'  OR dms.description LIKE 'Full%' OR dms.chapter LIKE 'Full%')
										AND dms.documenttype='QuestionPaper' AND Examtype='Subjective' AND cb.sampledocument='1'");
										$rs_link2=mysql_num_rows($result_link2);
										if($rs_link2 > 0)
										{
											
												while($row_link2=mysql_fetch_array($result_link2))
												{
												
												if($flg_samsub=="0")
													{
														echo "<li><a href='#' >Sample TestPaper Subjective</a>";
											echo "<ul>";
														$flg_samsub="1";
													}
												echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=SQ' href='#'>".$row_link2[0]."</a></li>";

													//end while
													labelnx4:
												}
												if($flg_samsub=="1")
												{
											echo "</ul>";
											echo "</li>";
											}
										}
										$flg_subasnt="0";
										$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description,cb.Allot_studentwise,cb.studentlist  FROM course_batch_material cb,document_manager_subjective dms 
										WHERE cb.doc_id=dms.Srno AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id IS NULL  OR dms.chapter_id LIKE '%,%,'  OR dms.description LIKE 'Full%' OR dms.chapter LIKE 'Full%')
										AND dms.documenttype='Assignment' AND Examtype='Subjective'");
										$rs_link2=mysql_num_rows($result_link2);
										if($rs_link2 > 0)
										{
											
												while($row_link2=mysql_fetch_array($result_link2))
												{
												
												if($flg_subasnt=="0")
													{
													echo "<li><a href='#' >Subjective Assignment</a>";
													echo "<ul>";
														$flg_subasnt="1";
													}
													echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=SA' href='#'>".$row_link2[0]."</a></li>";
													labelnx5:
												}
												if($flg_subasnt=="1")
												{
											echo "</ul>";
											echo "</li>";
											}
										}
										$flg_not="0";
										$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description,cb.Allot_studentwise,cb.studentlist  FROM course_batch_material cb,document_manager_subjective dms
										WHERE cb.doc_id=dms.Srno AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id IS NULL  OR dms.chapter_id LIKE '%,%,'  OR dms.description LIKE 'Full%' OR dms.chapter LIKE 'Full%')
										AND dms.documenttype='Notes'");
										$rs_link2=mysql_num_rows($result_link2);
										if($rs_link2 > 0)
										{
											
												while($row_link2=mysql_fetch_array($result_link2))
												{
													
												if($flg_not=="0")
													{
												echo "<li><a href='#' >Notes</a>";
											echo "<ul>";
														$flg_not="1";
													}
													echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=NT' href='#'>".$row_link2[0]."</a></li>";
													labelnx6:
												}
												if($flg_not=="1")
												{
											echo "</ul>";
											echo "</li>";
											}
										}
										//for previouscomppaper
										$flg_precomp="0";
										$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description,dms.Testtype,dms.PaperMonthYear,cb.Allot_studentwise,cb.studentlist
 FROM course_batch_material cb,document_manager_subjective dms
										WHERE cb.doc_id=dms.Srno AND cb.batch_id='$batch_id' AND (SUBJECT='$subject_id'  OR SUBJECT='20') AND (dms.chapter_id IS NULL  OR dms.chapter_id LIKE '%,%,'  OR dms.description LIKE 'Full%' OR dms.chapter LIKE 'Full%')
										AND dms.documenttype='PreviousCompetitivePaper'");
										$rs_link2=mysql_num_rows($result_link2);
										if($rs_link2 > 0)
										{
											
												while($row_link2=mysql_fetch_array($result_link2))
												{
													
												if($flg_precomp=="0")
													{
												echo "<li><a href='#' >PreviousCompetitivePaper</a>";
											echo "<ul>";
														$flg_precomp="1";
													}
													echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=NT' href='#'>".$row_link2[5]." year-".$row_link2[6]."</a></li>";
													labelnx7:
												}
											if($flg_precomp=="1")
												{
											echo "</ul>";
											echo "</li>";
											}
										}
										//end previouscomppaper
										//for topperansertsheet
										$flg_topans="1";
										$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description,cb.Allot_studentwise,cb.studentlist
 FROM course_batch_material cb,document_manager_subjective dms
										WHERE cb.doc_id=dms.Srno AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id IS NULL  OR dms.chapter_id LIKE '%,%,'  OR dms.description LIKE 'Full%' OR dms.chapter LIKE 'Full%')
										AND dms.documenttype='TopperAnswerSheet'");
										$rs_link2=mysql_num_rows($result_link2);
										if($rs_link2 > 0)
										{
											
												while($row_link2=mysql_fetch_array($result_link2))
												{
												
												
												if($flg_topans=="0")
													{
												echo "<li><a href='#' >TopperAnswerSheet</a>";
											echo "<ul>";
														$flg_topans="1";
													}
													echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=NT' href='#'>".$row_link2[0]."</a></li>";
													labelnx8:
												}
											if($flg_topans=="1")
												{
											echo "</ul>";
											echo "</li>";
											}
										}
										//end topperansersheet
										//for video on demand
										$result_link2=mysql_query("SELECT mm.SubTopic,mm.id,mm.Pathfilename,mm.Subject,mm.board,mm.standard,NOW() FROM media_manager mm,`video_link_to_student` vs WHERE mm.id=vs.video_id AND vs.user_id='$s5' AND '$formatDate' BETWEEN vs.from_date AND vs.to_date and mm.chap_id NOT IN(SELECT DISTINCT cc.chap_id FROM course_chapter cc,chapter c WHERE cc.course_id='$course_id' AND c.id=cc.chap_id ORDER BY c.id) AND mm.pathfilename is not null");
										$rs_link2=mysql_num_rows($result_link2);
										if($rs_link2 > 0)
										{
												echo "<li><a href='#'>Video on Demand</a>";
												echo "<ul>";
												while($row_link2=mysql_fetch_array($result_link2))
												{
													if($row_link2[3]=="")
													{
													}
													else
													{
													echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=video=VD' href='#'>$row_link2[2]</a></li>";
													}
												
												}
												echo "</ul>";
												echo "</li>";
										}
										//end video on demand
									echo "</ul>";
								echo "</li>";
								$result_link3=mysql_query("SELECT DISTINCT cc.chap_id,UCASE(c.name) FROM course_chapter cc,chapter c WHERE cc.course_id='$course_id' AND cc.sub_id IN(SELECT DISTINCT rel_sub_id FROM subject_alias WHERE rel_sub_id='$subject_id') AND c.id=cc.chap_id ORDER BY c.id ");

   
								$ch_new="";
								$chap_mappingid="";
								$chapter_mappingid_new="";
								$flg_subjective="0";
								$flg_objective="0";
								$flg_subjective1="0";
								$flg_objective1="0";
								$rs_link=mysql_num_rows($result_link3);
								if($rs_link > 0)
									{
										while($row_link3=mysql_fetch_array($result_link3))
										{
										$total_rec_id=0;
										$flg_subjective="0";
										$flg_objective="0";
										//for checking exist document or not
										$result_link30=mysql_query("SELECT DISTINCT c.id,UCASE(c.name) FROM `course_batch_material` cb,`document_manager_subjective` dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND c.id IN(SELECT DISTINCT chap_id FROM course_chapter WHERE course_id='$course_id') and c.id='$row_link3[0]' ");
										$total_rec_id=mysql_num_rows($result_link30);
										if($total_rec_id==0 ||$total_rec_id=="")
										{
										$result_link30=mysql_query("SELECT DISTINCT c.id,UCASE(c.name) FROM `course_batch_material` cb,`document_manager_subjective` dms,chapter c 
WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' 
AND (c.id IN(SELECT  DISTINCT chapter_id FROM 
chapter_mapping WHERE chapter_id_mapping='$row_link3[0]') OR c.id IN(SELECT DISTINCT chapter_id_mapping FROM 
chapter_mapping WHERE chapter_id='$row_link3[0]'))");
										$total_rec_id=mysql_num_rows($result_link30);
											if($total_rec_id==0 ||$total_rec_id=="")
											{
											$result_link30=mysql_query("SELECT DISTINCT mm.id FROM `media_manager` mm,`course_video` cv  WHERE cv.course_id='$course_id' AND  cv.video_id=mm.id AND mm.chap_id='$row_link3[0]' AND mm.pathfilename IS NOT NULL");
											$total_rec_id=mysql_num_rows($result_link30);
												if($total_rec_id==0 ||$total_rec_id=="")
												{
												 	$result_link30=mysql_query("SELECT DISTINCT mm.id FROM `media_manager` mm,`course_video` cv 
 WHERE cv.course_id='$course_id' AND  cv.video_id=mm.id AND ( mm.chap_id IN(SELECT  DISTINCT chapter_id FROM 
chapter_mapping WHERE chapter_id_mapping='$row_link3[0]') OR mm.chap_id IN(SELECT DISTINCT chapter_id_mapping FROM 
chapter_mapping WHERE chapter_id='$row_link3[0]'))
  AND mm.pathfilename IS NOT NULL");
												$total_rec_id=mysql_num_rows($result_link30);
												}
											}
										}
										//end checking
										if($total_rec_id==0)
										{
										goto nextchapter;
										}
										echo "<li><a class='chap_id' id='$row_link3[1]' href='#' >$row_link3[1]</a>";
										echo "<ul>";
										$ch_new="";
										$ch_new=$row_link3[0].",";
										$chap_mappingid="";
								$chapter_mappingid_new="";
								$result_mapping=mysql_query("SELECT DISTINCT chapter_id,`chapter_id_mapping` FROM `chapter_mapping` WHERE chapter_id='$row_link3[0]' OR chapter_id_mapping='$row_link3[0]'");
								while($row_mapping=mysql_fetch_array($result_mapping))
								{
									if($row_mapping[0]==$row_link3[0])
									{
									$chap_mappingid=$row_mapping[1];
									}
									else
									{
									$chap_mappingid=$row_mapping[0];
									}
								}
								if($chap_mappingid=="")
								{
								$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description
 FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id='$row_link3[0]' or dms.chapter_id='$ch_new' ) AND dms.documenttype='QuestionPaper' AND Examtype='Objective' AND dms.MaterialName LIKE '%_Qus' AND cb.sampledocument='0'");
								}
								else
								{
								$chapter_mappingid_new=$chap_mappingid.",";
								$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description
 FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id='$row_link3[0]' or dms.chapter_id='$ch_new' or dms.chapter_id='$chap_mappingid' or dms.chapter_id='$chapter_mappingid_new') AND dms.documenttype='QuestionPaper' AND Examtype='Objective' AND dms.MaterialName LIKE '%_Qus' AND cb.sampledocument='0'");
								}
								
										
											$rs_link2=mysql_num_rows($result_link2);
											if($rs_link2 > 0)
											{
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
																	
																		echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=OQ' href='#'>".$row_link2[0]."</a></li>";
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
											if($chap_mappingid=="")
											{
											$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description
 FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id='$row_link3[0]' or dms.chapter_id='$ch_new') AND dms.documenttype='QuestionPaper' AND Examtype='Objective' AND dms.MaterialName LIKE '%_Qus' AND cb.sampledocument='1'");
											}
											else
											{
											$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description
 FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id='$row_link3[0]' or dms.chapter_id='$ch_new' or dms.chapter_id='$chap_mappingid' or dms.chapter_id='$chapter_mappingid_new') AND dms.documenttype='QuestionPaper' AND Examtype='Objective' AND dms.MaterialName LIKE '%_Qus' AND cb.sampledocument='1'");
											}
												
												
											$rs_link2=mysql_num_rows($result_link2);
											if($rs_link2 > 0)
											{
											
											echo "<li><a href='#' >Sample TestPaper Objective</a>";
											echo "<ul>";
												while($row_link2=mysql_fetch_array($result_link2))
												{
												echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=OQ' href='#'>".$row_link2[0]."</a></li>";
												}
											echo "</ul>";
											echo "</li>";
											
											}
											//ch_new=$row_link3[0].",";
												
												if($chap_mappingid=="")
												{
												$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id='$row_link3[0]' or dms.chapter_id ='$ch_new')AND dms.documenttype='Assignment' AND dms.Examtype='Objective'  AND dms.MaterialName LIKE '%_Qus'");
												}
												else
												{
												$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id='$row_link3[0]' or dms.chapter_id ='$ch_new' or dms.chapter_id='$chap_mappingid' or dms.chapter_id='$chapter_mappingid_new') AND dms.documenttype='Assignment' AND dms.Examtype='Objective'  AND dms.MaterialName LIKE '%_Qus'");
												}
											
											
											$rs_link2=mysql_num_rows($result_link2);
											
											if($rs_link2 > 0)
											{	
												echo "<li><a href='#' >Objective Assignment</a>";
												echo "<ul>";
												while($row_link2=mysql_fetch_array($result_link2))
												{
												echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=OA' href='#'>".$row_link2[0]."</a></li>";
												}
												echo "</ul>";
												echo "</li>";
											}
											if($chap_mappingid=="")
											{
											$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id='$row_link3[0]' or dms.chapter_id='$ch_new' ) AND dms.documenttype='Questionpaper' AND dms.Examtype='Subjective' AND dms.MaterialName LIKE '%_Qus' AND cb.sampledocument='0'");
											}
											else
											{
											$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id='$row_link3[0]' or dms.chapter_id='$ch_new' or dms.chapter_id='$chap_mappingid' or dms.chapter_id='$chapter_mappingid_new') AND dms.documenttype='Questionpaper' AND dms.Examtype='Subjective' AND dms.MaterialName LIKE '%_Qus' AND cb.sampledocument='0'");
											}
											
										
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
													if($rs_link3==0)
													{
														$result_subt=mysql_query("SELECT dt.testid FROM documentid_testid_refer dt,document_manager_subjective d WHERE d.materialname='$q_name' AND dt.documentid=d.srno");
														$rs_linksubt=mysql_num_rows($result_subt);
														if($rs_linksubt>0)
														{
															while($row_linksubt=mysql_fetch_array($result_subt))
															{
															$result_link34=mysql_query("SELECT DISTINCT q.name,t.test_taken FROM que_paper q,Test_announce t WHERE t.que_paper_id=q.id AND t.test_taken=1 AND q.name='$row_linksubt[0]'");
																$rs_link3=mysql_num_rows($result_link34);
															}
														}
													}
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
																		
																		echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=SQ' href='#'>".$row_link2[0]."</a></li>";
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
											if($chap_mappingid=="")
											{
											$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id='$row_link3[0]' or dms.chapter_id='$ch_new') AND dms.documenttype='Questionpaper' AND dms.Examtype='Subjective' AND dms.MaterialName LIKE '%_Qus' AND cb.sampledocument='1'");
											}
											else
											{
											$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id='$row_link3[0]' or dms.chapter_id='$ch_new' or dms.chapter_id='$chap_mappingid' or dms.chapter_id='$chapter_mappingid_new') AND dms.documenttype='Questionpaper' AND dms.Examtype='Subjective' AND dms.MaterialName LIKE '%_Qus' AND cb.sampledocument='1'");
											}
											
											$rs_link2=mysql_num_rows($result_link2);
											if($rs_link2 > 0)
											{
												echo "<li><a href='#'>Sample Testpaper Subjective</a>";
												echo "<ul>";
													while($row_link2=mysql_fetch_array($result_link2))
													{
													echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=SQ' href='#'>".$row_link2[0]."</a></li>";
													}
													echo "</ul>";
													echo "</li>";
											}
											if($chap_mappingid=="")
											{
											$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id='$row_link3[0]' or  dms.chapter_id='$ch_new') AND dms.documenttype='Assignment' AND dms.Examtype='Subjective' AND dms.MaterialName LIKE '%_Qus' ");
											}
											else
											{
											$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id='$row_link3[0]' or  dms.chapter_id='$ch_new' or dms.chapter_id='$chap_mappingid' or dms.chapter_id='$chapter_mappingid_new') AND dms.documenttype='Assignment' AND dms.Examtype='Subjective' AND dms.MaterialName LIKE '%_Qus' ");
											}
											
											$rs_link2=mysql_num_rows($result_link2);
											if($rs_link2 > 0)
											{
												echo "<li><a href='#'>Subjective Assignment</a>";
												echo "<ul>";
													while($row_link2=mysql_fetch_array($result_link2))
													{
													echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=SA' href='#'>".$row_link2[0]."</a></li>";
													}
													echo "</ul>";
													echo "</li>";
											}
											if($chap_mappingid=="")
											{
											$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id='$row_link3[0]' or dms.chapter_id='$ch_new') AND dms.documenttype='Notes'");
											}
											else
											{
											$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id='$row_link3[0]' or dms.chapter_id='$ch_new' or dms.chapter_id='$chap_mappingid' or dms.chapter_id='$chapter_mappingid_new') AND dms.documenttype='Notes'");
											}
											
											$rs_link2=mysql_num_rows($result_link2);
											if($rs_link2 > 0)
											{
												echo "<li><a href='#'>Notes</a>";
												echo "<ul>";
													while($row_link2=mysql_fetch_array($result_link2))
													{
														echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=NT' href='#'>".$row_link2[0]."</a></li>";
													}
													echo "</ul>";
													echo "</li>";
											}
											//for previous competitive paper
											
											
											if($chap_mappingid=="")
											{
											$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description,dms.Testtype,dms.PaperMonthYear FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id='$row_link3[0]' or dms.chapter_id='$ch_new') AND dms.documenttype='PreviousCompetitivePaper'");
											}
											else
											{
											$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description,dms.Testtype,dms.PaperMonthYear FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id='$row_link3[0]' or dms.chapter_id='$ch_new' or dms.chapter_id='$chap_mappingid' or dms.chapter_id='$chapter_mappingid_new') AND dms.documenttype='PreviousCompetitivePaper'");
											}
											
											$rs_link2=mysql_num_rows($result_link2);
											if($rs_link2 > 0)
											{
												echo "<li><a href='#'>PreviousCompetitivePaper</a>";
												echo "<ul>";
													while($row_link2=mysql_fetch_array($result_link2))
													{
														echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=NT' href='#'>".$row_link2[5]." year-".$row_link2[6]."</a></li>";
														
													}
													echo "</ul>";
													echo "</li>";
											}
											//end previous comppaepr
											//for Topperanswersheet
											if($chap_mappingid=="")
											{
											$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id='$row_link3[0]' or dms.chapter_id='$ch_new') AND dms.documenttype='TopperAnswerSheet'");
											}
											else
											{
											$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id='$row_link3[0]' or dms.chapter_id='$ch_new' or dms.chapter_id='$chap_mappingid' or dms.chapter_id='$chapter_mappingid_new') AND dms.documenttype='TopperAnswerSheet'");
											}
											
											$rs_link2=mysql_num_rows($result_link2);
											if($rs_link2 > 0)
											{
												echo "<li><a href='#'>TopperAnswerSheet</a>";
												echo "<ul>";
													while($row_link2=mysql_fetch_array($result_link2))
													{
														echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=NT' href='#'>".$row_link2[0]."</a></li>";
													}
													echo "</ul>";
													echo "</li>";
											}
											//end topperanswersheet
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
													if($row_link2[3]=="")
													{
													}
													else
													{
													echo "<li><a class='menu_id' id ='$row_link2[2]=$row_link2[3]=video=VD' href='#'>$row_link2[3]</a></li>";
													}
													
													}
													//for chapter mapping
													$result_link256=mysql_query("SELECT DISTINCT mm.SubTopic,cv.course_id,cv.video_id,mm.Pathfilename,mm.Subject,mm.board,mm.standard FROM course_video cv,media_manager mm WHERE cv.course_id='$course_id' AND mm.id=cv.video_id AND ( mm.chap_id IN(SELECT  DISTINCT chapter_id FROM chapter_mapping WHERE chapter_id_mapping='$row_link3[0]') OR mm.chap_id IN(SELECT DISTINCT chapter_id_mapping FROM chapter_mapping WHERE chapter_id='$row_link3[0]')) AND mm.pathfilename IS NOT NULL");
											$rs_link256=mysql_num_rows($result_link256);
											if($rs_link256 > 0)
											{
												
													while($row_link256=mysql_fetch_array($result_link256))
													{
													if($row_link256[3]=="")
													{
													}
													else
													{
													echo "<li><a class='menu_id' id ='$row_link256[2]=$row_link256[3]=video=VD' href='#'>$row_link256[3]</a></li>";
													}
													
													}
													
											}
													//end chapter mapping
													echo "</ul>";
													echo "</li>";
													goto labrlnextvedio;
											}
											$result_link2=mysql_query("SELECT DISTINCT mm.SubTopic,cv.course_id,cv.video_id,mm.Pathfilename,mm.Subject,mm.board,mm.standard FROM course_video cv,media_manager mm WHERE cv.course_id='$course_id' AND mm.id=cv.video_id AND ( mm.chap_id IN(SELECT  DISTINCT chapter_id FROM chapter_mapping WHERE chapter_id_mapping='$row_link3[0]') OR mm.chap_id IN(SELECT DISTINCT chapter_id_mapping FROM chapter_mapping WHERE chapter_id='$row_link3[0]')) AND mm.pathfilename IS NOT NULL");
											$rs_link2=mysql_num_rows($result_link2);
											if($rs_link2 > 0)
											{
												echo "<li><a href='#'>Video Lectures</a>";
												echo "<ul>";
													while($row_link2=mysql_fetch_array($result_link2))
													{
													if($row_link2[3]=="")
													{
													}
													else
													{
													echo "<li><a class='menu_id' id ='$row_link2[2]=$row_link2[3]=video=VD' href='#'>$row_link2[3]</a></li>";
													}
													
													}
													echo "</ul>";
													echo "</li>";
											}
											labrlnextvedio:
											//for vod
										
											/*$nowt = date('Y-m-d H:i:s', time())
											$result_link2=mysql_query("SELECT DISTINCT mm.SubTopic,cv.course_id,cv.video_id,mm.Pathfilename,mm.Subject,mm.board,mm.standard 
											FROM course_video cv,media_manager mm WHERE cv.course_id='$course_id' AND mm.id=cv.video_id AND 
											mm.chap_id='$row_link3[0]' AND mm.pathfilename is not null");*/
											
												$result_link2=mysql_query("SELECT mm.SubTopic,mm.id,mm.Pathfilename,mm.Subject,mm.board,mm.standard,NOW() FROM media_manager mm,`video_link_to_student` vs WHERE mm.id=vs.video_id AND vs.user_id='$s5' AND '$formatDate' BETWEEN vs.from_date AND vs.to_date and mm.chap_id='$row_link3[0]' AND mm.pathfilename is not null");
											/*echo "SELECT mm.SubTopic,mm.id,mm.Pathfilename,mm.Subject,mm.board,mm.standard,NOW() FROM media_manager mm,`video_link_to_student` vs WHERE mm.id=vs.video_id AND vs.user_id='$s5' AND '$formatDate' BETWEEN vs.from_date AND vs.to_date and mm.chap_id='$row_link3[0]' AND mm.pathfilename is not null";*/
											$rs_link2=mysql_num_rows($result_link2);
											if($rs_link2 > 0)
											{
												echo "<li><a href='#'>Video on Demand</a>";
												echo "<ul>";
													while($row_link2=mysql_fetch_array($result_link2))
													{
													if($row_link2[3]=="")
													{
													}
													else
													{
													echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=video=VD' href='#'>$row_link2[2]</a></li>";
													}
													
													}
													//for chapter mapping
													$result_link256=mysql_query("SELECT DISTINCT mm.SubTopic,cv.user_id,mm.id,mm.Pathfilename,mm.Subject,mm.board,mm.standard FROM video_link_to_student cv,media_manager mm WHERE vs.user_id='$s5' AND mm.id=vs.video_id AND 
( mm.chap_id IN(SELECT  DISTINCT chapter_id FROM chapter_mapping WHERE chapter_id_mapping='$row_link3[0]') 
OR mm.chap_id IN(SELECT DISTINCT chapter_id_mapping FROM chapter_mapping WHERE chapter_id='$row_link3[0]')) 
AND  '$formatDate' BETWEEN cv.from_date AND cv.to_date and mm.pathfilename IS NOT NULL");
											$rs_link256=mysql_num_rows($result_link256);
											if($rs_link256 > 0)
											{
												
													while($row_link256=mysql_fetch_array($result_link256))
													{
													if($row_link256[3]=="")
													{
													}
													else
													{
													echo "<li><a class='menu_id' id ='$row_link256[2]=$row_link256[3]=video=VD' href='#'>$row_link256[3]</a></li>";
													}
													
													}
													
											}
													//end chapter mapping
													echo "</ul>";
													echo "</li>";
													goto labrlnextvedio1;
											}
											$result_link2=mysql_query("SELECT DISTINCT mm.SubTopic,cv.user_id,cv.video_id,mm.Pathfilename,mm.Subject,mm.board,mm.standard FROM video_link_to_student cv,media_manager mm WHERE vs.user_id='$s5' AND mm.id=vs.video_id AND ( mm.chap_id IN(SELECT  DISTINCT chapter_id FROM chapter_mapping WHERE chapter_id_mapping='$row_link3[0]') OR mm.chap_id IN(SELECT DISTINCT chapter_id_mapping FROM chapter_mapping WHERE chapter_id='$row_link3[0]')) AND  
											'$formatDate' BETWEEN cv.from_date AND cv.to_date AND mm.pathfilename IS NOT NULL");
											$rs_link2=mysql_num_rows($result_link2);
											if($rs_link2 > 0)
											{
												echo "<li><a href='#'>Video on Demand</a>";
												echo "<ul>";
													while($row_link2=mysql_fetch_array($result_link2))
													{
													if($row_link2[3]=="")
													{
													}
													else
													{
													echo "<li><a class='menu_id' id ='$row_link2[2]=$row_link2[3]=video=VD' href='#'>$row_link2[3]</a></li>";
													}
													
													}
													echo "</ul>";
													echo "</li>";
											}
											
											labrlnextvedio1:
											//end vod
											if($chap_mappingid=="")
											{
											$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id='$row_link3[0]' or dms.chapter_id='$ch_new' or dms.chapter_id='$chap_mappingid' or dms.chapter_id='$chapter_mappingid_new') AND dms.documenttype='PPT'");
											}
											else
											{
											$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id='$row_link3[0]' or dms.chapter_id='$ch_new' or dms.chapter_id='$chap_mappingid' or dms.chapter_id='$chapter_mappingid_new') AND dms.documenttype='PPT'");
											}
											
											
											$rs_link2=mysql_num_rows($result_link2);
											if($rs_link2 > 0)
											{
												echo "<li><a href='#'>PPT</a>";
												echo "<ul>";
													while($row_link2=mysql_fetch_array($result_link2))
													{
														echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=ppt=PT' href='#'>".$row_link2[0]."</a></li>";
													}
													echo "</ul>";
													echo "</li>";
											}
										echo "</ul>";
										echo "</li>";
										nextchapter:
										}
									}
							echo "</ul>";
							}
							else if($row_sub[0] == "Previous Competitive Paper")
							{
								$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description,dms.Testtype,dms.PaperMonthYear FROM course_batch_material cb,document_manager_subjective dms
										WHERE cb.doc_id=dms.Srno AND cb.batch_id='$batch_id' AND (SUBJECT='$subject_id'  OR SUBJECT='20') AND (dms.chapter_id IS NULL  OR dms.chapter_id LIKE '%,%,'  OR dms.description LIKE 'Full%' OR dms.chapter LIKE 'Full%') AND dms.documenttype='PreviousCompetitivePaper'");
									
										$rs_link2=mysql_num_rows($result_link2);
										if($rs_link2 > 0)
										{
											echo "<ul>";
										
												while($row_link2=mysql_fetch_array($result_link2))
												{
													echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=NT' href='#'>".$row_link2[5]." year-".$row_link2[6]."</a></li>";
												}
											echo "</ul>";
											
										}
							}
							else if($row_sub[0] == "Topper AnswerSheet")
							{
								$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description FROM course_batch_material cb,document_manager_subjective dms WHERE cb.doc_id=dms.Srno AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND dms.documenttype='QuestionPaper' AND Examtype='Subjective' ");
											
								$rs_link2=mysql_num_rows($result_link2);
								if($rs_link2 > 0)
								{
									echo "<ul>";
								
										while($row_link2=mysql_fetch_array($result_link2))
										{
									//for cheking toperanswersheet
									$top="";
									$result_top=mysql_query("SELECT DISTINCT stm.top_id FROM document_manager_subjective dms,material m,sub_top_mapping stm WHERE dms.MaterialName='$row_link2[1]' AND dms.Srno=m.DocumentManager_RefID AND m.id=stm.mat_id");
								$row_top=mysql_fetch_array($result_top);
								$top= $row_top[0];
											if($top==0 || $top=="")
											{
											}
											else
											{
											echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=TO' href='#'>".$row_link2[0]."</a></li>";
											}
									}
									echo "</ul>";
									
								}
							}
							else if($row_sub[0] == "Adaptive learning")
							{
								echo "<ul>
									<li><a href='test_paper_generator.php'>Take Test</a></li>
									<li><a href='view_my_mistakes.php'>View My Mistakes</a></li>
									<li><a href='view_my_result.php'>View Result</a></li>
									<li><a href='adp-performance-graph.php'>View Performance Graph</a></li>								
								</ul>";
									/*echo "<ul>
									
									<li><a class='adp_id' href='#'>Take Test</a></li>
									<li><a class='adp_id' href='#'>View My Mistakes</a></li>
									<li><a class='adp_id' href='#'>View Result</a></li>
									<li><a class='adp_id' href='#'>View Performance Graph</a></li>
								</ul>";*/
							}
							else if($row_sub[0] == "Chapterwise Test")
							{
								echo "<ul>
									<li><a href='test_paper_generator_chapterwise.php'>Take Test</a></li>
									<li><a href='view_my_mistakes.php'>View My Mistakes</a></li>
									<li><a href='view_my_result.php'>View Result</a></li>
										<li><a href='adp-performance-graph.php'>View Performance Graph</a></li>
								</ul>";
							}
								else if($row_sub[0] == "Customized Test")
							{
								echo "<ul>
									<li><a href='test_paper_generator_custom.php'>Take Test</a></li>
									<li><a href='view_my_mistakes_custom.php'>View My Mistakes</a></li>
									<li><a href='view_my_result_custom.php'>View Result</a></li>
										</ul>";
							}
							else if($row_sub[0] == "Grey Area Assignment")
							{
								echo "<ul>
									<li><a href='personlized_paper_test.php?val=1'>Take Test</a></li>
									<li><a href='personlized_paper_test.php?val=2'>View My Mistakes</a></li>
									<li><a href='personlized_paper_test.php?val=3'>View Result</a></li>
								</ul>";
							}
							else if($row_sub[0] == "Scheduled Test")
							{
						
									echo "<ul><li><a href='insrtuction_part.php'>Take Test</a></li><li><a href='view_my_mistakes_admin.php'>View My Mistakes</a></li><li><a href='view_my_result_admin.php'>View Result</a></li></ul>";
						
							
							}
							else if($row_sub[0] == "Adaptive Test")
							{
							
								echo "<ul>
								<li><a href='insrtuction_part3.php'>Take Test</a></li>
								<li><a href='view_my_mistakes_adp.php'>View My Mistakes</a></li>
								<li><a href='view_my_result_adp.php'>View Result</a></li>
							</ul>";
							
						
							
							}
							else if($row_sub[0] == "Mock Test")
							{
							
								echo "<ul>
				<li><a href='instruction_part_moc.php'>Take Test</a></li>
				<li><a href='view_my_mistakes_admin.php'>View My Mistakes</a></li>
				<li><a href='view_my_result_admin.php'>View Result</a></li>
			</ul>";
							
						
							}
						echo "</li>";
						nextmenu:
					}
					echo "</ul>";
				echo "</li>";
				
			}
		?>
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