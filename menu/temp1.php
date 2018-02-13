<?php
	include 'config.php';
	session_start();
	$stud_id=$_SESSION['sid']='3214';
	$s5=$_SESSION['sid']='3214';
	$u5 = $_SESSION['uname']='chinmay';
	$course_id=$_SESSION['course_id']='19';
	$batch_id=$_SESSION['batch_id']='185';
	$domaimname1=$_SESSION['domain_name']='http://www.coreacademics.in/';
	//echo $batch_id;
	$subject_id=$_SESSION['subject_id']='16';
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
	/*function killCopy(e){
		return false
	}
	function reEnable(){
		return true
	}
	document.onselectstart=new Function ("return false")
	if (window.sidebar){
		document.onmousedown=killCopy
		document.onclick=reEnable
	}*/
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
						//echo "in while1";
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
									$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Globalfile_path,dms.globalfile_name,dms.Chapter,dms.description FROM course_batch_material cb,document_manager_subjective dms
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
														
														
															echo "<li><a class='menu_id' id ='$row_link2[1]=$row_link2[2]=file=OQ' href='#'>".$row_link2[0]."</a></li>";
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
									echo "</ul>";
								echo "</li>";
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