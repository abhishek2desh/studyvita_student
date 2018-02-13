<?php
	include '../config.php';
	$subject_id=$_GET['sub_id'];
	$course_id=$_GET['course_id'];
	$material_type=$_GET['material_type'];
	$uid=$_GET['uid'];
	$examtype=$_GET['examtype'];
	$batch_id=$_GET['batch_id'];
	$chapter_id=$_GET['chapter_id'];
	$querystring="";
	$st_id_check="";
	$st_id_check=",".$uid.",";
	$ch_new="";
	$ch_new=$chapter_id.",";
	$chap_mappingid="";
	$chapter_mappingid_new="";
	$flg_subjective="0";
	$flg_objective="0";
	$flg_subjective1="0";
	$flg_objective1="0";
	$noaccess="";
	$j=1;
	$countmaterial=0;
	$result_mapping=mysql_query("SELECT DISTINCT chapter_id,`chapter_id_mapping` FROM `chapter_mapping` WHERE chapter_id='$chapter_id' OR chapter_id_mapping='$chapter_id'");
	while($row_mapping=mysql_fetch_array($result_mapping))
	{
		if($row_mapping[0]==$chapter_id)
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
	if($examtype=="")
	{
		if($material_type=="notes" )
		{
		$querystring=" AND (Documenttype='notes' or Documenttype='LectureNotes')";
		}
		else
		{
		$querystring=" AND Documenttype='$material_type'";
		}
		//$querystring=" AND Documenttype='$material_type'";
	}
	else
	{
		if($material_type=="notes" )
		{
		$querystring=" AND (Documenttype='notes' or Documenttype='LectureNotes') and examtype like '%$examtype%'";
		}
		else
		{
		$querystring=" AND Documenttype='$material_type' and examtype like '%$examtype%'";
		}
	//$querystring=" AND Documenttype='$material_type' and examtype like '%$examtype%'";
	}
	if($material_type=="ppt" || $material_type=="notes" ||  $material_type=="topperanswersheet" || $material_type=="Weblink" )
	{
		$rc=0;
		$total=0;
		
		if($chap_mappingid=="")
		{
		$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description,cb.Allot_studentwise,cb.studentlist,dms.chapter_id FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id='$chapter_id' or dms.chapter_id='$ch_new' or dms.chapter_id='$chap_mappingid' or dms.chapter_id='$chapter_mappingid_new') $querystring order by dms.srno desc");
		
		}
		else
		{
		$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description,cb.Allot_studentwise,cb.studentlist,dms.chapter_id FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id='$chapter_id' or dms.chapter_id='$ch_new' or dms.chapter_id='$chap_mappingid' or dms.chapter_id='$chapter_mappingid_new') $querystring order by dms.srno desc");
		
		}
			while($row=mysql_fetch_array($result_link2))
			{
			
			$path1=$row[2];
				if($path1=="")
				{
				}
				else
				{
				if($material_type=="Weblink" || $material_type=="Magazinelink")
					{
					
						if($row[5]=='1')
												{
													$stulist=$row[6];
												
													if (strpos($stulist,$st_id_check))
													{
														
													}
													else
													{
													if($stulist==$st_id_check)
													{
													
													}
													else
													{
												
													goto labelweblink;
													}
													
													//goto labelweblink;
													
													}

												}
												$countmaterial=$countmaterial+1;
					
							
					goto labelweblink;
					}
					$chk=substr($row[2], 0, 1);	
						$dir1 = substr($row[2],2);
						$dir1 = substr($dir1,0, -4);
						
						if($material_type=="ppt")
						{
						$ext = ".ppt";
						}
						else
						{
						$ext = ".pdf";
						}
							
							//$new_path = "D:\\inetpub\\wwwroot\\EdutechIndia\\edu\\ppt\\$row[1]".$ext;
						
							//$ext = ".pdf";
							$dir2 = $dir1.$ext;
							if($chk == "S")	{	$dt = "Edutech Materials";	}
							else if($chk == "U")	{	$dt = "EdutechData";	}
							else if($chk == "V")	{	$dt = "paresh";	}
							else if($chk == "R")	{	$dt = "Tempquestions";	}
							$server = "\\\ALNITEC-73N4CS8\\";
							$new_path = $server."$dt".$dir2;
							//echo $new_path ;
						
						if(file_exists($new_path))
						{
						
						if($row[5]=='1')
												{
													$stulist=$row[6];
												
													if (strpos($stulist,$st_id_check))
													{
														
													}
													else
													{
													goto labelweblink;
													
													}

												}
								$countmaterial=$countmaterial+1;
						}
						else
						{
							if($material_type=="ppt")
							{
							$new_path = "D:\\inetpub\\wwwroot\\EdutechIndia\\edu\\ppt\\$row[1]".$ext;
							if(file_exists($new_path))
							{
							
						if($row[5]=='1')
												{
													$stulist=$row[6];
												
													if (strpos($stulist,$st_id_check))
													{
														
													}
													else
													{
													goto labelweblink;
													
													}

												}
					$countmaterial=$countmaterial+1;
							}
							}
						}
				}
				labelweblink:
			}
		
	}
	else if($material_type=="Magazinelink")
	{
	
	if($chap_mappingid=="")
		{
		$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description,cb.Allot_studentwise,cb.studentlist,dms.chapter_id,dms.PaperMonthYear,dms.magazine_id FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id='$chapter_id' or dms.chapter_id='$ch_new' or dms.chapter_id='$chap_mappingid' or dms.chapter_id='$chapter_mappingid_new') $querystring order by dms.srno desc");
		
		}
		else
		{
		$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description,cb.Allot_studentwise,cb.studentlist,dms.chapter_id,dms.PaperMonthYear,dms.magazine_id FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id='$chapter_id' or dms.chapter_id='$ch_new' or dms.chapter_id='$chap_mappingid' or dms.chapter_id='$chapter_mappingid_new') $querystring order by dms.srno desc");
		
		}
			$rw = mysql_num_rows($result_link2);
		if($rw == 0) 
		{
		
		}
		else
		{
			
		while($row=mysql_fetch_array($result_link2))
			{
			
			
				$path1=$row[2];
				if($path1=="")
				{
				}
				else
				{
					
					
					
						if($row[5]=='1')
												{
													$stulist=$row[6];
												//echo "stid-".$stulist;
													if (strpos($stulist,$st_id_check)   )
													{
														
													}
													else
													{
													if($stulist==$st_id_check)
													{
													
													}
													else
													{
												
													goto labelmazlink;
													}
													
													
													}

												}
							$countmaterial=$countmaterial+1;
					
					
				labelmazlink:
			}
		}
		}
		
	}
	else if($material_type=="previouscompetitivepaper")
	{
		
		if($chap_mappingid=="")
			{
			$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description,dms.Testtype,dms.PaperMonthYear,cb.Allot_studentwise,cb.studentlist,dms.chapter_id FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id='$chapter_id' or dms.chapter_id='$ch_new') AND dms.documenttype='PreviousCompetitivePaper'");
			}
			else
			{
			$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description,dms.Testtype,dms.PaperMonthYear,cb.Allot_studentwise,cb.studentlist,dms.chapter_id FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id='$chapter_id' or dms.chapter_id='$ch_new' or dms.chapter_id='$chap_mappingid' or dms.chapter_id='$chapter_mappingid_new') AND dms.documenttype='PreviousCompetitivePaper'");
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
				
				$countmaterial=$countmaterial+1;
					
						
						labelnx17:
					}
			
			}
		
	}
	else if($material_type=="video")
	{
	
	$result_link2=mysql_query("SELECT DISTINCT mm.SubTopic,cv.course_id,cv.video_id,mm.Pathfilename,mm.Subject,mm.board,mm.standard,mm.chap_id 
		FROM course_video cv,media_manager mm WHERE cv.course_id='$course_id' AND mm.id=cv.video_id AND mm.chap_id='$chapter_id' AND mm.pathfilename is not null");
											
											
												
					while($row_link2=mysql_fetch_array($result_link2))
					{
						
					if($row_link2[3]=="")
					{
					}
					else
					{
					$countmaterial=$countmaterial+1;
					}
					
					}
					//for chapter mapping
					$result_link256=mysql_query("SELECT DISTINCT mm.SubTopic,cv.course_id,cv.video_id,mm.Pathfilename,mm.Subject,mm.board,mm.standard,mm.chap_id FROM course_video cv,media_manager mm WHERE cv.course_id='$course_id' AND mm.id=cv.video_id AND ( mm.chap_id IN(SELECT  DISTINCT chapter_id FROM chapter_mapping WHERE chapter_id_mapping='$chapter_id') OR mm.chap_id IN(SELECT DISTINCT chapter_id_mapping FROM chapter_mapping WHERE chapter_id='$chapter_id')) AND mm.pathfilename IS NOT NULL");
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
											$countmaterial=$countmaterial+1;
								}
							}
					}
					//end chapter mapping
			
											
	}
	else
	{
		
		if($chap_mappingid=="")
		{
		$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description,cb.Allot_studentwise,cb.studentlist,dms.chapter_id FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id='$chapter_id' or  dms.chapter_id='$ch_new') AND dms.MaterialName LIKE '%_Qus' $querystring order by dms.srno DESC ");
		}
		else
		{
		$result_link2=mysql_query("SELECT DISTINCT dms.Srno,dms.MaterialName,dms.path,dms.Chapter,dms.description,cb.Allot_studentwise,cb.studentlist,dms.chapter_id FROM course_batch_material cb,document_manager_subjective dms,chapter c WHERE cb.doc_id=dms.Srno AND c.id=dms.chapter_id AND cb.batch_id='$batch_id' AND SUBJECT='$subject_id' AND (dms.chapter_id='$chapter_id' or  dms.chapter_id='$ch_new' or dms.chapter_id='$chap_mappingid' or dms.chapter_id='$chapter_mappingid_new') AND dms.MaterialName LIKE '%_Qus' $querystring order by dms.srno DESC ");
		}
		while($row=mysql_fetch_array($result_link2))
		{
			if($row[5]=='1')
			{
				$stulist=$row[6];
			
				if (strpos($stulist,$st_id_check))
				{
					
				}
				else
				{
				goto labelnewrec;
				
				}

			}
			
			
			
				if($material_type=="Questionpaper" && $examtype=="Objective")
			{
			//for checking answer key
										$testtaken="0";
										$result_link336=mysql_query("SELECT SUBSTR(documentcode,1,LENGTH(documentcode)-4) FROM `document_manager_subjective` WHERE srno='$row[0]'");
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
											
											while($row_link337=mysql_fetch_array($result_link337))
												{
													$testtaken=$row_link337[1];
													if($testtaken=="1")
													{ 
														if($flg=="0")
														{
														
														$countmaterial=$countmaterial+1;
														}
													}
												}
												
											}
											
									
										}
										//end checking answer key
			}
			else if($material_type=="Questionpaper" && $examtype=="Subjective")
			{
				//for checking answer key
					$testtaken="0";
					//echo "in else if";
									$result_link338=mysql_query("SELECT SUBSTR(documentcode,1,LENGTH(documentcode)-4) FROM `document_manager_subjective` WHERE srno='$row[0]'");
										$rs_link338=mysql_num_rows($result_link338);
										if($rs_link338 > 0)
										{
										//echo "in if";
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
											
											while($row_link339=mysql_fetch_array($result_link339))
												{
													$testtaken=$row_link339[1];
													if($testtaken=="1")
													{ 
														if($flg=="0")
														{
														
															$countmaterial=$countmaterial+1;
														}
													}
												}
												
											}
											
									
										}
				//end checking answer key
			}
			else
			{
				$countmaterial=$countmaterial+1;
			}
					
							
				labelnewrec:
			//labelnx14:
		}
		
	}
	echo $countmaterial;
?>