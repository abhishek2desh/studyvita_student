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
	$special_camp_course=0;
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
	$val_for_saas=0;
	$result_as=mysql_query("SELECT * FROM saas_module_userwise WHERE user_id='$s5'");
	$count=mysql_num_rows($result_as);
	if($count > 0)
	{
		
		$val_for_saas=1;
		
		
	}
	else
	{
	
		$val_for_saas=0;
	
	
	}
	//check special camp course
		$result_sp=mysql_query("SELECT id FROM `special_campaign_course` WHERE course_id='$course_id' ");
		$rw_sp = mysql_num_rows($result_sp);
		if($rw_sp>0)
		{
		
		$batch_exp_date="";
			 $result_sp1=mysql_query("SELECT end_on FROM `batch` WHERE id='$batch_id' ");
			 while ($row_sp1 = mysql_fetch_array($result_sp1)) 
			 {
				$batch_exp_date=$row_sp1[0];
																
			 }
			 if($batch_exp_date=="")
			 {
			
			 }
			 else
			 {
			  $today_batch = date("Y-m-d", strtotime('today'));
			  if(strtotime($today_batch)>strtotime($batch_exp_date))
			  {
			  	$special_camp_course=1;
			  }
			  else
			  {
			 
			  }
			 }
		}
		//end check special_camp_course
		//check course expiry date
	if($special_camp_course==0)
	{
	 $result_c = mysql_query("SELECT DISTINCT c.id,c.name,c.tutor_id,u.name,str.expire_date,DATE_FORMAT(str.expire_date,'%d-%m-%Y') 
											FROM student_registered_course str,course c,USER u WHERE str.course_id=c.id AND c.tutor_id=u.id AND str.user_id='$s5'and c.id='$course_id' and str.batch_id='$batch_id' and str.status=1 and c.id not in(select distinct course_id from user_purchased_ebook where user_id='$s5')");
											 while ($row_c = mysql_fetch_array($result_c)) 
			 {
				$batch_exp_date=$row_c[4];
																
			 }
			 if($batch_exp_date=="")
			 {
			
			 }
			 else
			 {
			  $today_batch = date("Y-m-d", strtotime('today'));
			  if(strtotime($today_batch)>strtotime($batch_exp_date))
			  {
			  	$special_camp_course=1;
			  }
			  else
			  {
			 
			  }
			 }
	}
	//end check course expiry date
	
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
	padding: 0 0px;
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
	color:#000000
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
   .link-container {
		background: white;
	}
</style>
</head>
<body>

<table style='width:100%;' >
<tr>
<td style='width:95%;border:solid 0px;'>
<center>
<nav>
	<ul>
	<?php
	$st_id_check="";
		$st_id_check=",".$s5.",";
		$br_id=0;
		$std_id=0;
		$result_b=mysql_query("SELECT board_id,standard_id  FROM batch WHERE id='$batch_id'");
		while($row_b=mysql_fetch_array($result_b))
		{
		$br_id=$row_b[0];
		$std_id=$row_b[1];
		}
		if($val_for_saas==1)
						{
						$sql_in="SELECT DISTINCT ml.`useful_link`,ml.`hyper_link`,ml.id FROM menubar_list ml,saas_module_userwise um,saas_module_menu sm WHERE ml.id=sm.menu_id AND define_user='student' AND ml.active='1' AND um.user_id='$s5' AND sm.saas_id=um.saas_module_id ORDER BY ml.priority ";
						}
						else
						{
		if($val_for_ct == 1)
		{	
		if($special_camp_course==1)
		{
		$sql_in="SELECT distinct useful_link,hyper_link,id FROM menubar_list WHERE define_user='student' AND active='1'  and course_expiry_account='1' order by Priority";
		}
		else
		{
		$sql_in="SELECT DISTINCT ml.useful_link,ml.hyper_link,ml.id FROM `batch_menubar_list` bt,menubar_list ml WHERE bt.menu_id=ml.id  AND bt.batch_id='$batch_id' and ml.active='1' order by ml.Priority";
		}
		
		
			
		}
		else
		{
			if($special_camp_course==1)
			{
			$sql_in="SELECT distinct useful_link,hyper_link,id FROM menubar_list WHERE define_user='student' AND active='1'  and course_expiry_account='1' order by Priority";
			}
			else
			{
			$sql_in="SELECT distinct useful_link,hyper_link,id FROM menubar_list WHERE define_user='student' AND active='1'  and demo_menu='1' order by Priority";
			}
				
		}
		}
			$result_in=mysql_query($sql_in);
			while($row_in=mysql_fetch_array($result_in))
			{
				echo "<li><a href='$row_in[1]'>$row_in[0]</a>";
				if($val_for_saas==1)
						{
						$sql_sub="SELECT DISTINCT ml.`useful_link`,ml.`hyper_link`,ml.id,sm.menu_id,um.expire_date FROM submenubar_list ml,saas_module_userwise um,saas_module_menu sm
 WHERE ml.id=sm.submenu_id AND ml.active='1' AND um.user_id='$s5' 
 AND sm.saas_id=um.saas_module_id AND sm.menu_id='$row_in[2]' ORDER BY ml.priority ";
						}
						else
						{	
					if($val_for_ct == 1)
					{
						if($special_camp_course==1)
						{
						$sql_sub="SELECT distinct useful_link,hyper_link,id FROM `submenubar_list` WHERE menu_id='$row_in[2]' AND active='1'  and course_expiry_account='1' order by Priority";
						}
						else
						{
						$sql_sub="SELECT DISTINCT sl.useful_link,sl.hyper_link,sl.id,sl.menu_id FROM `batch_menubar_list` bt,menubar_list ml,submenubar_list sl WHERE bt.menu_id=ml.id AND bt.sub_menu_id=sl.id AND bt.batch_id='$batch_id' AND sl.menu_id='$row_in[2]' AND sl.active='1' order by sl.Priority";
						}
					}
					else
					{
						if($special_camp_course==1)
						{
						$sql_sub="SELECT distinct useful_link,hyper_link,id FROM `submenubar_list` WHERE menu_id='$row_in[2]' AND active='1'  and course_expiry_account='1' order by Priority";
						}
						else
						{
						$sql_sub="SELECT distinct useful_link,hyper_link,id FROM `submenubar_list` WHERE menu_id='$row_in[2]' AND active='1'  and demo_submenu='1' order by Priority";
						}
					}
					}
					//echo $sql_sub;
					$result_sub=mysql_query($sql_sub);
					echo "<ul>";
					while($row_sub=mysql_fetch_array($result_sub))
					{
					if($val_for_saas==1)
						{
						$login_expdate_saas=$row_sub[4];
						$datetoday_saas=date('Y-m-d');
						if(strtotime($datetoday_saas)>strtotime($login_expdate_saas))
						{
						echo"<li>Menu Expired</li>";
						goto labelexit3;
						}
						
						}
					if($row_sub[0] == "Schedule Test" || $row_sub[0] == "Adaptive Test" || $row_sub[0] == "Chapterwise Test" || $row_sub[0] == "Customized Test")
					{
						if($subject_id == 20)
						{
						goto nextmenu;
						}
					}
					if($row_sub[0] == "Email To Faculty" )
					{
						$result_e=mysql_query("SELECT email_id,password FROM batch WHERE id='$batch_id'");
						while($rowe=mysql_fetch_array($result_e))
						{
						$batch_email_id=$rowe[0];
						$batch_email_pwd=$rowe[1];
						if($batch_email_id!="" && $batch_email_pwd!="")
						{
						}
						else
						{
						goto nextmenu;
						}
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
					if($row_sub[0]=="Buy Study Material")
										{
										
										
										echo "<li><a href=https://studyvita.com/edushopee/index.php?uid=".$s5."&view=5&uname=".$u5.">$row_sub[0]</a>";
										}
										else if($row_sub[0]=="Subscribe Material")
										{
											echo "<li><a href=https://studyvita.com/edushopee/index.php?uid=".$s5."&view=5&uname=".$u5.">$row_sub[0]</a>";
										}
										
										
										else if($row_sub[0]=="Subscribe New Course")
										{
										echo "<li><a href=http://studyvita.com/pricing/index.php?uid=".$s5."&uname=".$u5.">$row_sub[0]</a>";
										}
										else if($row_sub[0]=="Buy New Courses")
										{
										echo "<li><a href=http://studyvita.com/pricing/index.php?uid=".$s5."&uname=".$u5.">$row_sub[0]</a>";
										}
										elseif($row_sub[0] == "NCERT Text Books")
										{
										$result_t=mysql_query("SELECT menu_name,menu_web_link FROM `text_book_link` WHERE board_id='$br_id' AND std_id='$std_id' AND subject_id IN(SELECT DISTINCT sub_id FROM subject_alias WHERE rel_sub_id='$subject_id')");
											$rw_t=mysql_num_rows($result_t);
											if($rw_t>0)
											{
												echo "<li><a href='$row_sub[1]'>$row_sub[0]</a>";
													echo "<ul>";
												while($row_t=mysql_fetch_array($result_t))
												{
												echo "<li><a href='$row_t[1]' target='_blank'>$row_t[0]</a></li>";
												}
													echo "</ul>";
												echo "</li>";
											}
											else
											{
											goto nextmenu;
											}
												
										}
										else if($row_sub[0] == "My Dashboard")
							{
							$v1=1;
							/*virtual-class.php?course_id=" + course_id + "&batch_id=" + batch_id + "&subject_id=" + subject_id + "&uid=" + uid + "&name=" + username_temp + "&domainname=" + domainname1 + "&vl=1"*/
								echo "<li><a href=http://student.studyvita.com/virtual-class.php?course_id=".$course_id."&batch_id=".$batch_id."&subject_id=".$subject_id."&uid=".$s5."&name=".$u5."&domainname=".$domaimname1."&vl=".$v1.">$row_sub[0]</a>";
							}
										else if($row_sub[0] == "Virtual Classes")
							{
							$v1=1;
							/*virtual-class.php?course_id=" + course_id + "&batch_id=" + batch_id + "&subject_id=" + subject_id + "&uid=" + uid + "&name=" + username_temp + "&domainname=" + domainname1 + "&vl=1"*/
								echo "<li><a href=http://student.studyvita.com/virtual-class.php?course_id=".$course_id."&batch_id=".$batch_id."&subject_id=".$subject_id."&uid=".$s5."&name=".$u5."&domainname=".$domaimname1."&vl=".$v1.">$row_sub[0]</a>";
							}
							else if($row_sub[0] == "Change Course")
							{
							echo "<li><a href='$row_sub[1]'>$row_sub[0]</a>";
							}
							


										else
										{
											echo "<li><a href='$row_sub[1]' target='_blank'>$row_sub[0]</a>";
										}
						
							if($row_sub[0] == "Study Material")
							{
								$currentDate = strtotime(date("Y-m-d H:i:s"));
								$futureDate = $currentDate+(34389);
								$formatDate = date("Y-m-d H:i:s", $futureDate);
							echo "<ul>";
								echo "<li><a class='chap_id' id='' href='#' >COMBINED CHAPTER</a>";
									echo "<ul>";
									$flg_subjective1="0";
										$flg_objective1="0";
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
									//for notes
									$flg_not="0";
										$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description,cb.Allot_studentwise,cb.studentlist,dms.documenttype  FROM course_batch_material cb,document_manager_subjective dms
										WHERE cb.doc_id=dms.Srno AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id IS NULL  OR dms.chapter_id LIKE '%,%,'  OR dms.description LIKE 'Full%' OR dms.chapter LIKE 'Full%')
										AND (dms.documenttype='Notes' or dms.documenttype='LectureNotes')");
										$rs_link2=mysql_num_rows($result_link2);
										if($rs_link2 > 0)
										{
											
												while($row_link2=mysql_fetch_array($result_link2))
												{
													if($row_link2[5]=='1')
												{
													$stulist=$row_link2[6];
												
													if (strpos($stulist,$st_id_check))
													{
														
													}
													else
													{
													goto labelnx6;
													
													}

												}
												if($flg_not=="0")
													{
												echo "<li><a href='#' >Notes</a>";
											echo "<ul>";
														$flg_not="1";
													}
													if($row_link2[7]=='LectureNotes')
													{
													echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=NT' href='#'>ln_".$row_link2[0]."<span class='tooltip'>$row_link2[4]</span></a></li>";
													}
													else
													{
													echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=NT' href='#'>".$row_link2[0]."<span class='tooltip'>$row_link2[4]</span></a></li>";
													}
													
													labelnx6:
												}
												if($flg_not=="1")
												{
											echo "</ul>";
											echo "</li>";
											}
										}
									//end notes
									//for subjective assignment
										$flg_subasnt="0";
										$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description,cb.Allot_studentwise,cb.studentlist FROM course_batch_material cb,document_manager_subjective dms 
										WHERE cb.doc_id=dms.Srno AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id IS NULL  OR dms.chapter_id LIKE '%,%,'  OR dms.description LIKE 'Full%' OR dms.chapter LIKE 'Full%')
										AND dms.documenttype='Assignment' AND Examtype='Subjective'");
										$rs_link2=mysql_num_rows($result_link2);
										if($rs_link2 > 0)
										{
											
												while($row_link2=mysql_fetch_array($result_link2))
												{
												if($row_link2[5]=='1')
												{
													$stulist=$row_link2[6];
												
													if (strpos($stulist,$st_id_check))
													{
														
													}
													else
													{
													goto labelnx5;
													
													}

												}
												if($flg_subasnt=="0")
													{
													echo "<li><a href='#' >Subjective Assignment</a>";
													echo "<ul>";
														$flg_subasnt="1";
													}
													echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=SA' href='#'>".$row_link2[0]."<span class='tooltip'>$row_link2[4]</span></a></li>";
													labelnx5:
												}
												if($flg_subasnt=="1")
												{
											echo "</ul>";
											echo "</li>";
											}
										}
										//end subjective assignment
										//for objective assignment
											$flg_objasnt="0";
										$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description,cb.Allot_studentwise,cb.studentlist FROM course_batch_material cb,document_manager_subjective dms
										WHERE cb.doc_id=dms.Srno AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id IS NULL  OR dms.chapter_id LIKE '%,%,' OR dms.description LIKE 'Full%' OR dms.chapter LIKE 'Full%')
										AND dms.documenttype='Assignment' AND Examtype='Objective'");
										$rs_link2=mysql_num_rows($result_link2);
										if($rs_link2 > 0)
										{
											
												while($row_link2=mysql_fetch_array($result_link2))
												{
												if($row_link2[5]=='1')
													{
													$stulist=$row_link2[6];
													
														if (strpos($stulist,$st_id_check))
														{
															
														}
														else
														{
														goto labelnx2;
														}
														
														

													}
													if($flg_objasnt=="0")
													{
														echo "<li><a href='#' >Objective Assignment</a>";
														echo "<ul>";
														$flg_objasnt="1";
													}
													echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=OA' href='#'>".$row_link2[0]."<span class='tooltip'>$row_link2[4]</span></a></li>";
													labelnx2:
												}
												if($flg_objasnt=="1")
												{
												echo "</ul>";
												echo "</li>";
												}
										}
										//end objective assignment
										//previous test paper subjective
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
													if($row_link2[5]=='1')
													{
													$stulist=$row_link2[6];
													
														if (strpos($stulist,$st_id_check))
														{
															
														}
														else
														{
														goto labelnx3;
														}
													
													}
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
														
															echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=SQ' href='#'>".$row_link2[0]."<span class='tooltip'>$row_link2[4]</span></a></li>";
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
										//end previous testpaper subjective
										//previous testpaper objective
										$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Globalfile_path,dms.globalfile_name,dms.Chapter,dms.description,cb.Allot_studentwise,cb.studentlist FROM course_batch_material cb,document_manager_subjective dms
										WHERE cb.doc_id=dms.Srno AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id IS NULL  OR dms.chapter_id LIKE '%,%,' OR dms.description LIKE 'Full%' OR dms.chapter LIKE 'Full%')
										AND dms.documenttype='QuestionPaper' AND Examtype='Objective' AND cb.sampledocument='0'");
										$rs_link2=mysql_num_rows($result_link2);
										
										if($rs_link2 > 0)
										{
											//echo "<li><a href='#' >Previous TestPaper Objective</a>";
											//echo "<ul>";
												while($row_link2=mysql_fetch_array($result_link2))
												{
												if($row_link2[7]=='1')
												{
												$stulist=$row_link2[8];
												
													if (strpos($stulist,$st_id_check))
													{
														
													}
													else
													{
													goto labelnx;
													
													}

												}

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
														
														
															echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=OQ' href='#'>".$row_link2[0]."<span class='tooltip'>$row_link2[6]</span></a></li>";
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
										//end previous testpaper objective
										//sample subjective paper
										$flg_samsub="0";
										$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description,cb.Allot_studentwise,cb.studentlist FROM course_batch_material cb,document_manager_subjective dms
										WHERE cb.doc_id=dms.Srno AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id IS NULL  OR dms.chapter_id LIKE '%,%,'  OR dms.description LIKE 'Full%' OR dms.chapter LIKE 'Full%')
										AND dms.documenttype='QuestionPaper' AND Examtype='Subjective' AND cb.sampledocument='1'");
										$rs_link2=mysql_num_rows($result_link2);
										if($rs_link2 > 0)
										{
											
												while($row_link2=mysql_fetch_array($result_link2))
												{
												if($row_link2[5]=='1')
												{
												$stulist=$row_link2[6];
												
													if (strpos($stulist,$st_id_check))
													{
														
													}
													else
													{
													goto labelnx4;
													
													}

												}
												if($flg_samsub=="0")
													{
														echo "<li><a href='#' >Sample TestPaper Subjective</a>";
											echo "<ul>";
														$flg_samsub="1";
													}
												echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=SQ' href='#'>".$row_link2[0]."<span class='tooltip'>$row_link2[4]</span></a></li>";

													//end while
													labelnx4:
												}
												if($flg_samsub=="1")
												{
											echo "</ul>";
											echo "</li>";
											}
										}
										//end sample subjective paper
										//sample objectice paper
										$flg_samobj="0";
										$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description,cb.Allot_studentwise,cb.studentlist FROM course_batch_material cb,document_manager_subjective dms
										WHERE cb.doc_id=dms.Srno AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id IS NULL  OR dms.chapter_id LIKE '%,%,'  OR dms.description LIKE 'Full%' OR dms.chapter LIKE 'Full%')
										AND dms.documenttype='QuestionPaper' AND Examtype='Objective' AND cb.sampledocument='1'");
										$rs_link2=mysql_num_rows($result_link2);
										if($rs_link2 > 0)
										{
										
												while($row_link2=mysql_fetch_array($result_link2))
												{
													if($row_link2[5]=='1')
													{
													$stulist=$row_link2[6];
													
														if (strpos($stulist,$st_id_check))
														{
															
														}
														else
														{
														goto labelnx1;
														
														}

													}
													if($flg_samobj=="0")
													{
														echo "<li><a href='#' >Sample TestPaper Objective</a>";
														echo "<ul>";
														$flg_samobj="1";
													}
													echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=OQ' href='#'>".$row_link2[0]."<span class='tooltip'>$row_link2[4]</span></a></li>";
													labelnx1:
												}
												if($flg_samobj=="1")
												{
												echo "</ul>";
												echo "</li>";
												}
										}
										//end sample objective paper
										//for topper answersheet
										$flg_topans="0";
										$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description,cb.Allot_studentwise,cb.studentlist
 FROM course_batch_material cb,document_manager_subjective dms
										WHERE cb.doc_id=dms.Srno AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id IS NULL  OR dms.chapter_id LIKE '%,%,'  OR dms.description LIKE 'Full%' OR dms.chapter LIKE 'Full%')
										AND dms.documenttype='TopperAnswerSheet'");
										$rs_link2=mysql_num_rows($result_link2);
										if($rs_link2 > 0)
										{
											
												while($row_link2=mysql_fetch_array($result_link2))
												{
												
												if($row_link2[5]=='1')
												{
													$stulist=$row_link2[6];
												
													if (strpos($stulist,$st_id_check))
													{
														
													}
													else
													{
													goto labelnx8;
													
													}

												}
												if($flg_topans=="0")
													{
												echo "<li><a href='#' >TopperAnswerSheet</a>";
											echo "<ul>";
														$flg_topans="1";
													}
													echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=NT' href='#'>".$row_link2[0]."<span class='tooltip'>$row_link2[4]</span></a></li>";
													labelnx8:
												}
											if($flg_topans=="1")
												{
											echo "</ul>";
											echo "</li>";
											}
										}
										//end topper answedrsheet
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
													if($row_link2[7]=='1')
												{
													$stulist=$row_link2[8];
												
													if (strpos($stulist,$st_id_check))
													{
														
													}
													else
													{
													goto labelnx7;
													
													}

												}
												if($flg_precomp=="0")
													{
												echo "<li><a href='#' >PreviousCompetitivePaper</a>";
											echo "<ul>";
														$flg_precomp="1";
													}
													echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=NT' href='#'>".$row_link2[5]." year-".$row_link2[6]."<span class='tooltip'>$row_link2[4]</span></a></li>";
													labelnx7:
												}
											if($flg_precomp=="1")
												{
											echo "</ul>";
											echo "</li>";
											}
										}
										//end previouscomppaper
										//for weblink
											$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description,dms.Testtype,dms.PaperMonthYear,cb.Allot_studentwise,cb.studentlist FROM course_batch_material cb,document_manager_subjective dms
										WHERE cb.doc_id=dms.Srno AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id'   AND (dms.chapter_id IS NULL  OR dms.chapter_id LIKE '%,%,'  OR dms.description LIKE 'Full%' OR dms.chapter LIKE 'Full%')
										AND dms.documenttype='weblink'");
										$rs_link2=mysql_num_rows($result_link2);
										if($rs_link2 > 0)
										{
										echo "<li><a href='#' >Weblink</a>";
														echo "<ul>";
										while($row_link2=mysql_fetch_array($result_link2))
												{
													if($row_link2[4]==="")
													{
													echo "<li><a href='$row_link2[2]' target='_blank'>$row_link2[0]</a></li>";
													}
													else
													{
													echo "<li><a href='$row_link2[2]' target='_blank'>$row_link2[4]</a></li>";
													}
													
												
													
												}
												
												echo "</ul>";
												echo "</li>";
												
										}
										//end weblink
									echo "</ul>";
								echo "</li>";
								$result1t=mysql_query("SELECT `tutor_id` FROM course WHERE id='$course_id'");
		$row1t=mysql_fetch_array($result1t);
		$course_tutor_id=$row1t[0];
		$result1t2=mysql_query("SELECT created_by FROM USER WHERE id='$s5'");
		$row1t2=mysql_fetch_array($result1t2);
		$student_tutor_id=$row1t2[0];
		if($course_tutor_id==$student_tutor_id)
		{
		$result_unit=mysql_query("SELECT DISTINCT u.id,u.unit_name FROM unit u,chapter c,course_chapter cc,course_batch_active_chapter cb WHERE u.id=c.unit_id AND c.id=cc.chap_id AND cc.course_id='$course_id' AND cc.sub_id IN(SELECT DISTINCT rel_sub_id FROM subject_alias WHERE rel_sub_id='$subject_id') and c.id=cb.chapter_id and cb.active='1' and cb.course_id=cc.course_id and cb.batch_id='$batch_id' ");
		}
		else
		{
		$result_unit=mysql_query("SELECT DISTINCT u.id,u.unit_name FROM unit u,chapter c,course_chapter cc WHERE u.id=c.unit_id AND c.id=cc.chap_id AND
cc.course_id='$course_id' AND cc.sub_id IN(SELECT DISTINCT rel_sub_id FROM subject_alias WHERE rel_sub_id='$subject_id') ");
		}
								
								while($row_unit=mysql_fetch_array($result_unit))
								{
								echo "<li><a class='unit_id' id='$row_unit[1]' href='#' >$row_unit[1]</a>";
										echo "<ul>";
										
									if($course_tutor_id==$student_tutor_id)
									{
									$result_link3=mysql_query("SELECT DISTINCT cc.chap_id,UCASE(c.name) FROM course_chapter cc,chapter c,course_batch_active_chapter cb WHERE cc.course_id='$course_id' AND cc.sub_id IN(SELECT DISTINCT rel_sub_id FROM subject_alias WHERE rel_sub_id='$subject_id') AND c.id=cc.chap_id  AND c.unit_id='$row_unit[0]' and c.id=cb.chapter_id and cb.active='1' and cb.course_id=cc.course_id and cb.batch_id='$batch_id' ORDER BY c.id ");
									}
									else
									{
									$result_link3=mysql_query("SELECT DISTINCT cc.chap_id,UCASE(c.name) FROM course_chapter cc,chapter c WHERE cc.course_id='$course_id' AND cc.sub_id IN(SELECT DISTINCT rel_sub_id FROM subject_alias WHERE rel_sub_id='$subject_id') AND c.id=cc.chap_id  AND c.unit_id='$row_unit[0]' ORDER BY c.id ");
									}		
								

   
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
										$result_link_tb=mysql_query("SELECT menu_web_link FROM `text_book_link_chapterwise` WHERE chapter_id='$row_link3[0]'");
										$total_rec_tb=mysql_num_rows($result_link_tb);
										if($total_rec_tb==0)
										{
										goto nextchapter;
										//checking weblink
										
										//end checking weblink
										}
										
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
								}
								else
								{
								$chapter_mappingid_new=$chap_mappingid.",";
								}
									
								//for chapterwise video
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
											//end chapterwise video
											labrlnextvedio:
											//for video on demand
										
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
											//end video on demand
											//for ppt
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
														echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=ppt=PT' href='#'>".$row_link2[0]."<span class='tooltip'>$row_link2[4]</span></a></li>";
													}
													echo "</ul>";
													echo "</li>";
											}
											//end ppt
								//for notes
								if($chap_mappingid=="")
											{
											$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description,cb.Allot_studentwise,cb.studentlist,dms.documenttype FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id='$row_link3[0]' or dms.chapter_id='$ch_new') AND (dms.documenttype='Notes' or dms.documenttype='LectureNotes')");
											}
											else
											{
											$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description,cb.Allot_studentwise,cb.studentlist,dms.documenttype FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id='$row_link3[0]' or dms.chapter_id='$ch_new' or dms.chapter_id='$chap_mappingid' or dms.chapter_id='$chapter_mappingid_new') AND (dms.documenttype='Notes' or dms.documenttype='LectureNotes')");
											}
											$flg_not_ch="0";
											$rs_link2=mysql_num_rows($result_link2);
											if($rs_link2 > 0)
											{
												
													while($row_link2=mysql_fetch_array($result_link2))
													{
													if($row_link2[5]=='1')
												{
													$stulist=$row_link2[6];
												
													if (strpos($stulist,$st_id_check))
													{
														
													}
													else
													{
													goto labelnx15;
													
													}

												}
												if($flg_not_ch=="0")
													{
												echo "<li><a href='#'>Notes</a>";
												echo "<ul>";
														$flg_not_ch="1";
													}
													
													if($row_link2[7]=='LectureNotes')
													{
													echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=NT' href='#'>ln_".$row_link2[0]."<span class='tooltip'>$row_link2[4]</span></a></li>";
													}
													else
													{
													echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=NT' href='#'>".$row_link2[0]."<span class='tooltip'>$row_link2[4]</span></a></li>";
													}

														
														labelnx15:
													}
													if($flg_not_ch=="1")
															{
														echo "</ul>";
														echo "</li>";
														}
											}
								//end notes
								// for subjective assignment
								if($chap_mappingid=="")
											{
											$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description,cb.Allot_studentwise,cb.studentlist FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id='$row_link3[0]' or  dms.chapter_id='$ch_new') AND dms.documenttype='Assignment' AND dms.Examtype='Subjective' AND dms.MaterialName LIKE '%_Qus' ");
											}
											else
											{
											$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description,cb.Allot_studentwise,cb.studentlist FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id='$row_link3[0]' or  dms.chapter_id='$ch_new' or dms.chapter_id='$chap_mappingid' or dms.chapter_id='$chapter_mappingid_new') AND dms.documenttype='Assignment' AND dms.Examtype='Subjective' AND dms.MaterialName LIKE '%_Qus' ");
											}
											$flg_asntsub_ch="0";
											$rs_link2=mysql_num_rows($result_link2);
											if($rs_link2 > 0)
											{
												
													while($row_link2=mysql_fetch_array($result_link2))
													{
														if($row_link2[5]=='1')
														{
															$stulist=$row_link2[6];
														
															if (strpos($stulist,$st_id_check))
															{
																
															}
															else
															{
															goto labelnx14;
															
															}

														}
												if($flg_asntsub_ch=="0")
													{
												echo "<li><a href='#'>Subjective Assignment</a>";
												echo "<ul>";
														$flg_asntsub_ch="1";
													}
													
													
													echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=SA' href='#'>".$row_link2[0]."<span class='tooltip'>$row_link2[4]</span></a></li>";
													labelnx14:
													}
													if($flg_asntsub_ch=="1")
													{
													echo "</ul>";
													echo "</li>";
													}
											}
								//end subjective assignment
								//for objective assignment
								$flg_asntobj_ch="0";
												if($chap_mappingid=="")
												{
												$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description,cb.Allot_studentwise,cb.studentlist FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id='$row_link3[0]' or dms.chapter_id ='$ch_new')AND dms.documenttype='Assignment' AND dms.Examtype='Objective'  AND dms.MaterialName LIKE '%_Qus'");
												}
												else
												{
												$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description,cb.Allot_studentwise,cb.studentlist FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id='$row_link3[0]' or dms.chapter_id ='$ch_new' or dms.chapter_id='$chap_mappingid' or dms.chapter_id='$chapter_mappingid_new') AND dms.documenttype='Assignment' AND dms.Examtype='Objective'  AND dms.MaterialName LIKE '%_Qus'");
												
												}
											
											
											$rs_link2=mysql_num_rows($result_link2);
											
											if($rs_link2 > 0)
											{	
											
												while($row_link2=mysql_fetch_array($result_link2))
												{
												if($row_link2[5]=='1')
												{
													$stulist=$row_link2[6];
												
													if (strpos($stulist,$st_id_check))
													{
														
													}
													else
													{
													goto labelnx11;
													
													}

												}
												if($flg_asntobj_ch=="0")
													{
													echo "<li><a href='#' >Objective Assignment</a>";
												echo "<ul>";
														$flg_asntobj_ch="1";
													}
													
													
												echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=OA' href='#'>".$row_link2[0]."<span class='tooltip'>$row_link2[4]</span></a></li>";
												labelnx11:
												}
												if($flg_asntobj_ch=="1")
												{
											echo "</ul>";
											echo "</li>";
											}
												
											}
								//end objetive assignment
								//for subjective questionpaper
								if($chap_mappingid=="")
											{
											$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description,cb.Allot_studentwise,cb.studentlist FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id='$row_link3[0]' or dms.chapter_id='$ch_new' ) AND dms.documenttype='Questionpaper' AND dms.Examtype='Subjective' AND dms.MaterialName LIKE '%_Qus' AND cb.sampledocument='0'");
											}
											else
											{
											$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description,cb.Allot_studentwise,cb.studentlist FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id='$row_link3[0]' or dms.chapter_id='$ch_new' or dms.chapter_id='$chap_mappingid' or dms.chapter_id='$chapter_mappingid_new') AND dms.documenttype='Questionpaper' AND dms.Examtype='Subjective' AND dms.MaterialName LIKE '%_Qus' AND cb.sampledocument='0'");
											}
											
										
											$rs_link2=mysql_num_rows($result_link2);
											
											if($rs_link2 > 0)
											{
												//echo "<li><a href='#'>Previous Testpaper Subjective </a>";
												//echo "<ul>";
													while($row_link2=mysql_fetch_array($result_link2))
													{
													if($row_link2[5]=='1')
												{
													$stulist=$row_link2[6];
												
													if (strpos($stulist,$st_id_check))
													{
														
													}
													else
													{
													goto labelnx12;
													
													}

												}
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
																		
																		echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=SQ' href='#'>".$row_link2[0]."<span class='tooltip'>$row_link2[4]</span></a></li>";
																			$flg="1";
																		}
																			
																	}
																	
																}
														}
														//end checking answer key
													}
													labelnx12:
													}
													if ($flg_subjective=="1")
													{
													echo "</ul>";
													echo "</li>";
													}
											}
								//end subjective questionpaper
								//for objective questionpaper
								if($chap_mappingid=="")
								{
								$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description,cb.Allot_studentwise,cb.studentlist FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id='$row_link3[0]' or dms.chapter_id='$ch_new' ) AND dms.documenttype='QuestionPaper' AND Examtype='Objective' AND dms.MaterialName LIKE '%_Qus' AND cb.sampledocument='0'");
								}
								else
								{
								$chapter_mappingid_new=$chap_mappingid.",";
								$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description,cb.Allot_studentwise,cb.studentlist FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id='$row_link3[0]' or dms.chapter_id='$ch_new' or dms.chapter_id='$chap_mappingid' or dms.chapter_id='$chapter_mappingid_new') AND dms.documenttype='QuestionPaper' AND Examtype='Objective' AND dms.MaterialName LIKE '%_Qus' AND cb.sampledocument='0'");
								}
								
										
											$rs_link2=mysql_num_rows($result_link2);
											if($rs_link2 > 0)
											{
												while($row_link2=mysql_fetch_array($result_link2))
												{
												if($row_link2[5]=='1')
												{
													$stulist=$row_link2[6];
												
													if (strpos($stulist,$st_id_check))
													{
														
													}
													else
													{
													goto labelnx9;
													
													}

												}
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
																	
																		echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=OQ' href='#'>".$row_link2[0]."<span class='tooltip'>$row_link2[4]</span></a></li>";
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
												
												
											labelnx9:
												}
											if($flg_objective=="1")
											{
											echo "</ul>";
											echo "</li>";
											}
											
											
											}
								//end objective questionpaper
								//for subjective sample paper
								if($chap_mappingid=="")
											{
											$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description,cb.Allot_studentwise,cb.studentlist FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id='$row_link3[0]' or dms.chapter_id='$ch_new') AND dms.documenttype='Questionpaper' AND dms.Examtype='Subjective' AND dms.MaterialName LIKE '%_Qus' AND cb.sampledocument='1'");
											}
											else
											{
											$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description,cb.Allot_studentwise,cb.studentlist FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id='$row_link3[0]' or dms.chapter_id='$ch_new' or dms.chapter_id='$chap_mappingid' or dms.chapter_id='$chapter_mappingid_new') AND dms.documenttype='Questionpaper' AND dms.Examtype='Subjective' AND dms.MaterialName LIKE '%_Qus' AND cb.sampledocument='1'");
											}
											$flg_sub_ch="0";
											$rs_link2=mysql_num_rows($result_link2);
											if($rs_link2 > 0)
											{
												
													while($row_link2=mysql_fetch_array($result_link2))
													{
													if($row_link2[5]=='1')
												{
													$stulist=$row_link2[6];
												
													if (strpos($stulist,$st_id_check))
													{
														
													}
													else
													{
													goto labelnx13;
													
													}

												}
												if($flg_sub_ch=="0")
													{
												echo "<li><a href='#'>Sample Testpaper Subjective</a>";
												echo "<ul>";
														$flg_sub_ch="1";
													}
													
													
													echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=SQ' href='#'>".$row_link2[0]."<span class='tooltip'>$row_link2[4]</span></a></li>";
													labelnx13:
													}
													if($flg_sub_ch=="1")
													{
													echo "</ul>";
													echo "</li>";
													}
											}
								//end subjective sample paper
								//for objective sample paper
								if($chap_mappingid=="")
											{
											$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description,cb.Allot_studentwise,cb.studentlist FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id='$row_link3[0]' or dms.chapter_id='$ch_new') AND dms.documenttype='QuestionPaper' AND Examtype='Objective' AND dms.MaterialName LIKE '%_Qus' AND cb.sampledocument='1'");
											}
											else
											{
											$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description,cb.Allot_studentwise,cb.studentlist FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id='$row_link3[0]' or dms.chapter_id='$ch_new' or dms.chapter_id='$chap_mappingid' or dms.chapter_id='$chapter_mappingid_new') AND dms.documenttype='QuestionPaper' AND Examtype='Objective' AND dms.MaterialName LIKE '%_Qus' AND cb.sampledocument='1'");
											}
												
											$flg_obj_ch="0";
											$rs_link2=mysql_num_rows($result_link2);
											if($rs_link2 > 0)
											{
											
											
												while($row_link2=mysql_fetch_array($result_link2))
												{
												if($row_link2[5]=='1')
												{
													$stulist=$row_link2[6];
												
													if (strpos($stulist,$st_id_check))
													{
														
													}
													else
													{
													goto labelnx10;
													
													}

												}
												if($flg_obj_ch=="0")
													{
													echo "<li><a href='#' >Sample TestPaper Objective</a>";
													echo "<ul>";
														$flg_obj_ch="1";
													}
												echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=OQ' href='#'>".$row_link2[0]."<span class='tooltip'>$row_link2[4]</span></a></li>";
												labelnx10:
												}
											if($flg_obj_ch=="1")
												{
											echo "</ul>";
											echo "</li>";
											}
											
											}
								//end objective sample paper
								//for topperansersheet
								if($chap_mappingid=="")
											{
											$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description,cb.Allot_studentwise,cb.studentlist FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id='$row_link3[0]' or dms.chapter_id='$ch_new') AND dms.documenttype='TopperAnswerSheet'");
											}
											else
											{
											$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description,cb.Allot_studentwise,cb.studentlist FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id='$row_link3[0]' or dms.chapter_id='$ch_new' or dms.chapter_id='$chap_mappingid' or dms.chapter_id='$chapter_mappingid_new') AND dms.documenttype='TopperAnswerSheet'");
											}
											$flg_topans_ch="0";
											$rs_link2=mysql_num_rows($result_link2);
											if($rs_link2 > 0)
											{
												
													while($row_link2=mysql_fetch_array($result_link2))
													{
														if($row_link2[5]=='1')
												{
													$stulist=$row_link2[6];
												
													if (strpos($stulist,$st_id_check))
													{
														
													}
													else
													{
													goto labelnx18;
													
													}

												}
												if($flg_topans_ch=="0")
													{
												echo "<li><a href='#'>TopperAnswerSheet</a>";
												echo "<ul>";
														$flg_topans_ch="1";
													}
													
													
														echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=NT' href='#'>".$row_link2[0]."<span class='tooltip'>$row_link2[4]</span></a></li>";
														labelnx18:
													}
													if($flg_topans_ch=="1")
												{
											echo "</ul>";
											echo "</li>";
											}
											}
								//end topperanswersheet
								//for previous  competitive testppaer
								
											if($chap_mappingid=="")
											{
											$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description,dms.Testtype,dms.PaperMonthYear,cb.Allot_studentwise,cb.studentlist FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id='$row_link3[0]' or dms.chapter_id='$ch_new') AND dms.documenttype='PreviousCompetitivePaper'");
											}
											else
											{
											$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description,dms.Testtype,dms.PaperMonthYear,cb.Allot_studentwise,cb.studentlist FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id='$row_link3[0]' or dms.chapter_id='$ch_new' or dms.chapter_id='$chap_mappingid' or dms.chapter_id='$chapter_mappingid_new') AND dms.documenttype='PreviousCompetitivePaper'");
											}
											$flg_comp_ch="0";
											$rs_link2=mysql_num_rows($result_link2);
											if($rs_link2 > 0)
											{
												
													while($row_link2=mysql_fetch_array($result_link2))
													{
													if($row_link2[7]=='1')
												{
													$stulist=$row_link2[8];
												
													if (strpos($stulist,$st_id_check))
													{
														
													}
													else
													{
													goto labelnx17;
													
													}

												}
												if($flg_comp_ch=="0")
													{
											echo "<li><a href='#'>PreviousCompetitivePaper</a>";
												echo "<ul>";
														$flg_comp_ch="1";
													}
													
													
														echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=NT' href='#'>".$row_link2[5]." year-".$row_link2[6]."<span class='tooltip'>$row_link2[4]</span></a></li>";
														labelnx17:
													}
												if($flg_comp_ch=="1")
												{
											echo "</ul>";
											echo "</li>";
											}
											}
								//end previous  competitive testppaer
								//for textbook
								$result_t=mysql_query("SELECT menu_web_link FROM `text_book_link_chapterwise` WHERE chapter_id='$row_link3[0]'");
											$rw_t=mysql_num_rows($result_t);
											if($rw_t>0)
											{
												
												while($row_t=mysql_fetch_array($result_t))
												{
												echo "<li><a href='$row_t[0]' target='_blank'>NCERT TextBook</a></li>";
												}
													
											}
								//end textbook
									//for weblink
									if($chap_mappingid=="")
											{
											$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description,dms.Testtype,dms.PaperMonthYear,cb.Allot_studentwise,cb.studentlist FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id='$row_link3[0]' or dms.chapter_id='$ch_new') AND dms.documenttype='weblink'");
											}
											else
											{
											$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description,dms.Testtype,dms.PaperMonthYear,cb.Allot_studentwise,cb.studentlist FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id='$row_link3[0]' or dms.chapter_id='$ch_new' or dms.chapter_id='$chap_mappingid' or dms.chapter_id='$chapter_mappingid_new') AND dms.documenttype='weblink'");
											}
											$rs_link2=mysql_num_rows($result_link2);
										if($rs_link2 > 0)
										{
										echo "<li><a href='#' >Weblink</a>";
														echo "<ul>";
										while($row_link2=mysql_fetch_array($result_link2))
												{
													if($row_link2[4]=="")
													{
													echo "<li><a href='$row_link2[2]' target='_blank'>$row_link2[0]</a></li>";
													}
													else
													{
													echo "<li><a href='$row_link2[2]' target='_blank'>$row_link2[4]</a></li>";
													}
													
												
													
												}
												
												echo "</ul>";
												echo "</li>";
												
										}

									//end weblink									
											
										echo "</ul>";
										echo "</li>";
										nextchapter:
										}
									}
										echo "</ul>";
										echo "</li>";
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
													echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=NT' href='#'>".$row_link2[5]." year-".$row_link2[6]."<span class='tooltip'>$row_link2[4]</span></a></li>";
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
											echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=TO' href='#'>".$row_link2[0]."<span class='tooltip'>$row_link2[4]</span></a></li>";
											}
									}
									echo "</ul>";
									
								}
							}
							else if($row_sub[0] == "Adaptive learning")
							{
								echo "<ul>
									<li><a href='test_paper_generator.php' target='_blank'>Take Test</a></li>
									<li><a href='view_my_mistakes.php' target='_blank'>View My Mistakes</a></li> 
									<li><a href='view_my_result.php' target='_blank'>View Result</a></li>
									<li><a href='adp-performance-graph.php' target='_blank'>View Performance Graph</a></li>								
								</ul>";
									/*echo "<ul>
									
									<li><a class='adp_id' href='#'>Take Test</a></li>
									<li><a class='adp_id' href='#'>View My Mistakes</a></li>
									<li><a class='adp_id' href='#'>View Result</a></li>
									<li><a class='adp_id' href='#'>View Performance Graph</a></li>
								</ul>";*/
							}
							else if($row_sub[0] == "Adaptive Learning" && $row_in[2]=='50')
							{
								echo "<ul>
									
									<li><a href='view_my_result.php' target='_blank'>View Result</a></li>
									<li><a href='adp-performance-graph.php' target='_blank'>View Performance Graph</a></li>								
								</ul>";
									
							}
							else if($row_sub[0]=="Diagnostic Test")
							{
							echo "<ul>
									<li><a href='test_paper_generator_chapterwise.php'>Chapterwise Test</a></li>
									<li><a href='test_paper_generator_custom.php' >Customized Test</a></li>
									<li><a href='test-paper-generator-unitwise.php' target='_blank'>Unitwise Test</a></li>
								</ul>";
								
							}
							/*else if($row_sub[0] == "Chapterwise Test")
							{
								echo "<ul>
									<li><a href='test_paper_generator_chapterwise.php'>Take Test</a></li>
									<li><a href='view_my_mistakes.php'>View My Mistakes</a></li>
									<li><a href='view_my_result_chaptertest.php'>View Result</a></li>
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
							}*/
								else if($row_sub[0] == "Test on Demand"  && $row_in[2]=='10')
							{
								echo "<ul>
									<li><a href='test_paper_generator_request.php' target='_blank'>Request Test</a></li>
									<li><a href='insrtuction_part_request.php' target='_blank'>Take Test</a></li>
									<li><a href='view_my_mistakes_request.php' target='_blank'>View My Mistakes</a></li>
									<li><a href='view_my_result_request.php' target='_blank'>View Result</a></li>
										</ul>";
							}
								else if($row_sub[0] == "Test on Demand"  && $row_in[2]=='10')
							{
							}
							/*else if($row_sub[0] == "Grey Area Assignment")
							{
								echo "<ul>
									<li><a href='personlized_paper_test.php?val=1'>Take Test</a></li>
									<li><a href='personlized_paper_test.php?val=2'>View My Mistakes</a></li>
									<li><a href='personlized_paper_test.php?val=3'>View Result</a></li>
								</ul>";
							}*/
							else if($row_sub[0] == "Persionalized Assignment")
							{
								echo "<ul>
									<li><a href='personlized_paper_test.php?val=1' target='_blank'>Take Test</a></li>
									<li><a href='personlized_paper_test.php?val=2' target='_blank'>View My Mistakes</a></li>
									<li><a href='personlized_paper_test.php?val=3' target='_blank'>View Result</a></li>
								</ul>";
							}
							else if($row_sub[0] == "Upcoming Competitions")
							{
								echo "<ul>
									<li><a href='comp-state.php' target='_blank'>State wise</a></li>
									<li><a href='comp-national.php' target='_blank'>National</a></li>
									<li><a href='comp-international.php' target='_blank'>International</a></li>
								</ul>";
							}
							else if($row_sub[0] == "Webinar")
							{
								echo "<ul>
									<li><a href='webinar-class.php' target='_blank'>Academic</a></li>
									<li><a href='webinar-class.php' target='_blank'>Motivational</a></li>
									<li><a href='webinar-class.php' target='_blank'>Studyvita Training</a></li>
									<li><a href='https://studyvita.com/webinar.php' >Upcoming Webinar</a></li>
								</ul>";
							}
							else if($row_sub[0] == "Knowledge meter")
							{
								echo "<ul>
									<li><a href='diagnostic_analysis_ch.php' target='_blank'>Chapterwise Analysis</a></li>
									<li><a href='diagnostic_analysis.php' target='_blank'>Unitwise Analysis</a></li>
									<li><a href='PerformanceAnalysis.php' target='_blank'>Performance Analysis</a></li>
								</ul>";
							}
							
							/*else if($row_sub[0] == "Buy Study Material")
							{
							echo "<li><a href=https://studyvita.com/edushopee/index.php?uid=".$s5."&uname=".$u5.">$row_sub[0]</a>";
										
								echo "<ul>
								<li><a href=https://studyvita.com/edushopee/index.php?uid=".$s5."&uname=".$u5.">Buy Study Material</a>
									
									<li><a href='purchased-material.php'>View Purchased Material</a></li>
									
								</ul>";
							}*/
							else if($row_sub[0] == "Scheduled Test(Objective)" && $row_in[2]=='10')
							{
						
									echo "<ul><li><a href='insrtuction_part.php' target='_blank'>Take Test</a></li><li><a href='view_my_mistakes_admin.php' target='_blank'>View My Mistakes</a></li><li><a href='view_my_result_admin.php' target='_blank'>View Result</a></li></ul>";
						
							
							}
							else if($row_sub[0] == "Adaptive Test" && $row_in[2]=='10')
							{
							
								echo "<ul>
								<li><a href='insrtuction_part3.php' target='_blank'>Take Test</a></li>
								<li><a href='view_my_mistakes_adp.php' target='_blank'>View My Mistakes</a></li>
								<li><a href='view_my_result_adp.php' target='_blank'>View Result</a></li>
							</ul>";
							
						
							
							}
							else if($row_sub[0] == "Multiple Subject" )
							{
							
								echo "<ul>
				<li><a href='instruction_part_moc.php' target='_blank'>Take Test</a></li>
				<li><a href='view_my_mistakes_admin.php' target='_blank'>View My Mistakes</a></li>
				<li><a href='view_my_result_admin.php' target='_blank'>View Result</a></li>
			</ul>";
							
						
							
							}
							else if($row_sub[0] == "Single Subject" )
							{
							
								echo "<ul><li><a href='insrtuction_part.php' target='_blank'>Take Test</a></li><li><a href='view_my_mistakes_admin.php' target='_blank'>View My Mistakes</a></li><li><a href='view_my_result_admin.php' target='_blank'>View Result</a></li></ul>";
							
						
							
							}
							else if($row_sub[0] == "Mock Test")
							{
							
								echo "<ul>
				<li><a href='instruction_part_moc.php' target='_blank'>Take Test</a></li>
				<li><a href='view_my_mistakes_admin.php' target='_blank'>View My Mistakes</a></li>
				<li><a href='view_my_result_admin.php' target='_blank'>View Result</a></li>
			</ul>";
							
						
							}
							
						echo "</li>";
						nextmenu:
					}
					labelexit3:
					echo "</ul>";
				echo "</li>";
				
			}
		?>
	</ul>
</nav></center>
</td>
<td style='width:5%;border:solid 0px;' align="right">
	<!--<button class="button">
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
	
	</button>-->
</td>
</tr>
</table>

<?php
/*$result=mysql_query("SELECT u.id,u.do_not_show_content from user_display_setting u,content_detail c where u.user_id='$s5' and c.id=u.content_type_id and c.content_name='border'");
		$rw = mysql_num_rows($result);
		
		if($rw == 0)
		{
			echo "<table style='padding-top:0px;border:solid 0px;width:100%;' cellspacing='0'>
					<tr>
					<td>
					<img src='images/starsline.gif' style='height:100%;width:100%;'/>
					</td>
					<td>
					<img src='images/starsline.gif' style='height:100%;width:100%;'/>
					</td>
					<td>
					<img src='images/starsline.gif' style='height:100%;width:100%;'/>
					</td>
					</tr>
					</table>";
		}
		else
		{
			while($row=mysql_fetch_array($result))
			{
				$donot_show_msg=$row[1];
				if($donot_show_msg=="1")
				{
				//echo "1";
				}
				else
				{
				echo "<table style='padding-top:0px;border:solid 0px;width:100%;' cellspacing='0'>
					<tr>
					<td>
					<img src='images/starsline.gif' style='height:100%;width:100%;'/>
					</td>
					<td>
					<img src='images/starsline.gif' style='height:100%;width:100%;'/>
					</td>
					<td>
					<img src='images/starsline.gif' style='height:100%;width:100%;'/>
					</td>
					</tr>
					</table>";
				}
			}
		}*/
?>

<!--<div style='border:solid 0px;padding-left:0px;' class="link-container">
					<img src="images/cutain-final2.png" style="height:auto;width:100%;"/>
					</div>-->
</body>
</html>