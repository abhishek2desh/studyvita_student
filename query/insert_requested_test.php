<?php
		include '../config.php';
		//session_start();
	
	$course_id=$_GET['course_id'];
		$sub_id=$_GET['sub_id'];
		$uid=$_GET['uid'];
		$batch_id=$_GET['batch_id'];
		$dec_marks=$_GET['dec_marks'];
		$chapter_list_que=$_GET['chap_id'];
		
		$duration_time=$_GET['duration_time'];
		$datepickerVal34=$_GET['datepickerVal34'];
		$take_time=$_GET['take_time'];
		$take_time1=$_GET['take_time1'];
		$ch_count=$_GET['ch_count'];
		$chap_id_single="";
		$chap_id_multi="";
		
		$dt11=$datepickerVal34." ".$take_time.":00";
		$dt12=$datepickerVal34." ".$take_time1.":00";
		//for checking ges question rights
		$sql8=mysql_query("SELECT tutor_id,class,board FROM course WHERE id='$course_id'");
		$sql8_row=mysql_fetch_array($sql8);
		$tutor_id=$sql8_row[0];
		$class=$sql8_row[1];
		$board=$sql8_row[2];
		//echo $tutor_id;
		//for board_id
		
		if ($tutor_id=='8345')
		{
		$use_ges_qbank=1;
		}
		else
		{
			$sql9=mysql_query("SELECT id FROM `userwise_ges_qbank` WHERE user_id='$tutor_id' AND board_id='$board' AND standard_id='$class' AND subject_id='$sub_id'");
			
			$sql9_rw = mysql_num_rows($sql9);
			
			if($sql9_rw>0)
			{
			//$use_ges_qbank=1;
			
			}
			else
			{
			//$use_ges_qbank=0;
			echo "Enough Questions not available.Contact your Institute/Faculty ";
			//echo "In this time test already declared.Please Choose another test time";
			goto labelend;
			}
		}
		//end chekcing
		$result_test=mysql_query("SELECT id FROM `adaptive_learning_test` WHERE `start_time`='$dt1' AND `total_time`='$duration_time' AND batch_id='$batch_id' and from_date='$dt11'");
	$row_test=mysql_num_rows($result_test);
	if($row_test>0)
	{
	echo "In this time test already declared.Please Choose another test time";
	goto labelend;
	}
	else
	{
		$result_max=mysql_query("SELECT MAX(test_id) FROM testannounce_refid");
			$row_max=mysql_fetch_array($result_max);
			$max_id_que=$row_max[0];
			$max_id_que=$max_id_que+1;
			$sql_test = "INSERT INTO testannounce_refid(`test_id`)
			values('$max_id_que')";
			$result_test = mysql_query($sql_test);
			
			if ($result_test)
			{
				echo "";
			}
			else
			{
				echo "failed";
			}
			$select_que_str="";
			$sql = "INSERT INTO adaptive_learning_test(`test_id`,`student_id`,`subject`,`noq`,`start_time`,`total_time`,`test_type`,`Offlinetest`,`from_date`,`to_date`,batch_id,Demand_test)
			values('$max_id_que','$uid','$sub_id','$dec_marks','$dt1','$duration_time','test','0','$dt11','$dt12','$batch_id','1')";
			
			//echo $sql;
			
			$result = mysql_query($sql);
			//echo $rw;
			if ($result)
			{
			$qno_st=1;
				$lst = explode("|", $chapter_list_que);
				$new_val=0;
				$i=1;
				foreach($lst as $item) 
		{
			if($item=="")
			{
				
			}
			else
			{
				$k=0;
				$chap_id=0;
				$total_req_que=0;
				$remain_que=0;
				$lst1 = explode("-", $item);
				$chap_id=$lst1[0];
				$total_req_que=$lst1[1];
				if($chap_id>0)
				{
					$total_que_str="";
					$total_no_que=0;
					if($ch_count=="1")
					{
					$chap_id_single=$chap_id;
		
					}
					else
					{
					$chap_id_multi=$chap_id_multi.$chap_id.",";
					}
		
					$ud_count=mysql_query("SELECT c.id,ob.UniqId,ob.path FROM concept c,onlinequestionbank ob WHERE c.topic_id IN(SELECT id FROM topic WHERE chap_id='$chap_id') AND c.id=ob.ConceptId AND ob.Documenttype='O' AND ob.MEDIUM IN('E','EG') AND c.id > '0' and Repeat_uniqid=false and pdffile_exist=True AND ob.Blocked_Question='0' AND ob.share_document='1' ");
					
					$ud_rw = mysql_num_rows($ud_count);
					$total_no_que=$ud_rw;
					if ($use_ges_qbank==0)
					{
					
					$ud_count=mysql_query("SELECT distinct c.id,ob.UniqId,ob.path FROM concept c,onlinequestionbank ob WHERE c.topic_id IN(SELECT id FROM topic WHERE chap_id='$chap_id')AND c.id=ob.ConceptId AND ob.Documenttype='O' AND ob.MEDIUM IN('E','EG') AND c.id > '0' and Repeat_uniqid=false and pdffile_exist=True AND (ob.Blocked_Question='0' or uniqid not IN (select distinct uniqid from block_question_private where user_id='$tutor_id')) and (ob.FacultyId = '$tutor_id' or ob.FacultyId in(select distinct u.id from user u,user_roll ur where u.created_by='$tutor_id' and ur.user_id=u.id and ur.roll_id in('2','20'))) ");
					}
					else
					{
					
					$ud_count=mysql_query("SELECT distinct c.id,ob.UniqId,ob.path FROM concept c,onlinequestionbank ob WHERE c.topic_id IN(SELECT id FROM topic WHERE chap_id='$chap_id')AND c.id=ob.ConceptId AND ob.Documenttype='O' AND ob.MEDIUM IN('E','EG') AND c.id > '0' and Repeat_uniqid=false and pdffile_exist=True AND ob.Blocked_Question='0' AND (ob.share_document='1' or ob.FacultyId = '$tutor_id' or ob.FacultyId in(select distinct u.id from user u,user_roll ur where u.created_by='$tutor_id' and ur.user_id=u.id and ur.roll_id in('2','20')))");
					}
					$ud_rw = mysql_num_rows($ud_count);
					$total_no_que=$ud_rw;
					while($df_row=mysql_fetch_array($ud_count))
					{
						$total_que_str=$total_que_str.$df_row[1].",";
					}
					//for mapping
					if($board=='1' || $board=='2')
					{
						if ($use_ges_qbank==0)
						{
							if($br_id=='1')
							{
							$ud_count=mysql_query("SELECT  distinct c.id,ob.UniqId,ob.path FROM concept c,onlinequestionbank ob,Concept_mapping m,topic t WHERE m.Cbse_TopicId IN(SELECT id FROM topic WHERE chap_id='$chap_id') AND m.conceptid=ob.ConceptId  AND c.id=m.conceptid AND ob.conceptid > 0 AND Repeat_uniqid=FALSE AND pdffile_exist=TRUE AND t.id=m.Gseb_TopicId  AND ob.MEDIUM IN('E','EG') AND (ob.Blocked_Question='0' OR  ob.Blocked_Question IS NULL)  AND ob.documenttype='O' AND (ob.FacultyId = '$tutor_id' or ob.FacultyId in(select distinct u.id from user u,user_roll ur where u.created_by='$tutor_id' and ur.user_id=u.id and ur.roll_id in('2','20'))) AND c.topic_id=t.id");
							}
							elseif($br_id=='2')
							{
								$ud_count=mysql_query("SELECT distinct c.id,ob.UniqId,ob.path FROM concept c,onlinequestionbank ob,Concept_mapping m,topic t WHERE m.Gseb_TopicId IN(SELECT id FROM topic WHERE chap_id='$chap_id') AND m.conceptid=ob.ConceptId  AND c.id=m.conceptid 
								AND ob.conceptid > 0 AND Repeat_uniqid=FALSE AND pdffile_exist=TRUE AND t.id=m.Cbse_TopicId  AND ob.MEDIUM IN('E','EG') AND (ob.Blocked_Question='0' OR  ob.Blocked_Question IS NULL)  AND ob.documenttype='O' AND (ob.FacultyId = '$tutor_id' or ob.FacultyId in(select distinct u.id from user u,user_roll ur where u.created_by='$tutor_id' and ur.user_id=u.id and ur.roll_id in('2','20'))) AND c.topic_id=t.id");
							}
							else
							{
							}
				
						}	
						else
						{
							if($br_id=='1')
							{
							
							$ud_count=mysql_query("SELECT distinct c.id,ob.UniqId,ob.path FROM concept c,onlinequestionbank ob,Concept_mapping m,topic t WHERE m.Cbse_TopicId IN(SELECT id FROM topic WHERE chap_id='$chap_id') AND m.conceptid=ob.ConceptId  AND c.id=m.conceptid AND ob.conceptid > 0 AND Repeat_uniqid=FALSE AND pdffile_exist=TRUE AND t.id=m.Gseb_TopicId  AND ob.MEDIUM IN('E','EG') AND (ob.Blocked_Question='0' OR  ob.Blocked_Question IS NULL)  AND ob.documenttype='O' AND c.topic_id=t.id  AND (ob.share_document='1' or ob.FacultyId = '$tutor_id' or ob.FacultyId in(select distinct u.id from user u,user_roll ur where u.created_by='$tutor_id' and ur.user_id=u.id and ur.roll_id in('2','20')))");
							}
							elseif($br_id=='2')
							{
							$ud_count=mysql_query("SELECT distinct c.id,ob.UniqId,ob.path FROM concept c,onlinequestionbank ob,Concept_mapping m,topic t WHERE m.Gseb_TopicId IN(SELECT id FROM topic WHERE chap_id='$chap_id') AND m.conceptid=ob.ConceptId  AND c.id=m.conceptid AND ob.conceptid > 0 AND Repeat_uniqid=FALSE AND pdffile_exist=TRUE AND t.id=m.Cbse_TopicId  AND ob.MEDIUM IN('E','EG') AND (ob.Blocked_Question='0' OR  ob.Blocked_Question IS NULL)  AND ob.documenttype='O' AND c.topic_id=t.id AND (ob.share_document='1' or ob.FacultyId = '$tutor_id' or ob.FacultyId in(select distinct u.id from user u,user_roll ur where u.created_by='$tutor_id' and ur.user_id=u.id and ur.roll_id in('2','20')))");
							}
							else
							{
							}
						
						}//end if $use_ges_qbank==0
			
					}//end if $board=1
					$ud_rw = mysql_num_rows($ud_count);
					$total_no_que=$total_no_que+$ud_rw;
					while($df_row=mysql_fetch_array($ud_count))
					{
						$total_que_str=$total_que_str.$df_row[1].",";
					}
					$total_que_str=substr($total_que_str, 0, -1);
					//$select_que_str="";
					
					//end mapping
					//for selecting question
					if($total_no_que >= $total_req_que)
					{
						$lst2 = explode(",", $total_que_str);
						for ($j=0;$j<=$total_no_que;$j++)
						{
							if ($j==$total_req_que)
							{
								goto out;
							}
							in1:
							$ran="";
							$ran=rand(1,$total_no_que);
							$ran=$ran-1;
							$run2="";
							$run1="";
							$uq_get=$lst2[$ran];
							if($lst2[$ran]=="")
							{
							goto in1;
							}
							$run2=",".$lst2[$ran].",";
							$run1=",".$select_que_str;
							if(strpos($run1,$run2) !== false)
							{
									goto in1;
							}
							else
							{
							$select_ran=$select_ran.$ran.",";
									$select_que_str=$select_que_str.$lst2[$ran].",";
									$correctans="";
									$rs_ans=mysql_query("SELECT distinct correctans FROM onlinequestionbank  where uniqid='$lst2[$ran]'");
									
									while($ans_row=mysql_fetch_array($rs_ans))
									{
										$correctans=$ans_row[0];
									}
								$rs_10=mysql_query("INSERT INTO adaptive_test_response(`test_id`,`Qno`,`Uniq_id`,`correct_ans`,`student_id`,response)VALUES('$max_id_que','$qno_st','$lst2[$ran]','$correctans','$uid','x')");
								if($rs_10)
								{
								if($sub_id == "16"){ $sb="1"; }
			else if($sub_id == "17"){ $sb="2"; }
			else if($sub_id == "15"){ $sb="3"; }
			else if($sub_sort == "72"){ $sb="4"; }
			else if($sub_sort == "71"){ $sb="5"; }
			else if($sub_id == "14"){ $sb="6"; }
			else if($sub_id == "18"){ $sb="7"; }
			ELSE
			{
			$sb=$sub_id; 
			}
			
			
			$result_concept=mysql_query("SELECT ConceptId FROM `onlinequestionbank` WHERE UniqId='$lst2[$ran]'");
			$row_concept=mysql_fetch_array($result_concept);
			$get_concept_id=$row_concept[0];
			
			$result_topic=mysql_query("SELECT topic_id FROM concept WHERE id='$get_concept_id'");
			$row_topic=mysql_fetch_array($result_topic);
			$get_topic_id=$row_topic[0];
			
			$insert_test=mysql_query("INSERT INTO onlineuniqid(`TestID`,`Uniqid`,`Qno`)
				   VALUES('$max_id_que','$lst2[$ran]','$qno_st')");
			
			$result_unit=mysql_query("SELECT c.unit_id FROM topic t,chapter c WHERE t.chap_id = c.id
			AND t.id='$get_topic_id'");
			$row_unit=mysql_fetch_array($result_unit);
			$get_unit=$row_unit[0];
			
			$insert_test1=mysql_query("INSERT INTO omrcorrect(`TestID`,`SubID`,`Qno`,`CorrectAns`,`TopicId`,`ConceptId`,`UnitId`)
							VALUES('$max_id_que','$sb','$qno_st','$correctans','$get_topic_id','$get_concept_id','$get_unit')");
								}
								else
								{
								echo "failed";
								}
								$qno_st=$qno_st+1;
								
							}//end else if strpos
						}//end for
						out:
					}
					else
					{
						
						$message1="Questions insufficinet.";
						echo "<script language=javascript> alert('$message1');</script>";
						goto labelend;						
					}
					//end selecting question
				}//end $chap_id>0
			}//end if$item=="
		}//end for
				if($ch_count=="1")
					{
					$rs_101=mysql_query("Update adaptive_learning_test set chapter_id='$chap_id_single' where test_id='$max_id_que' and student_id='$uid'");
					if($rs_101)
								{
								
								}
								else
								{
								
								}
		
					}
					else
					{
					
					$rs_101=mysql_query("Update adaptive_learning_test set combined_chapter='$chap_id_multi' where test_id='$max_id_que' and student_id='$uid'");

						if($rs_101)
								{
								//echo "failed";
								}
								else
								{
								
								}					
					}
			}
			else
			{
				echo "failed34";
			}
			
	}
	labelend:
?>