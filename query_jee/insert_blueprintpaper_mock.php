<?php	
	include '../config.php';
	
	$get_test_id=$_GET['get_test_id'];
	$user_id=$_GET['user_id'];
	$course_id=$_GET['course_id'];
	$minq=0;
	$maxq=0;
	$sub_id="";
	
	
	
	
	$result2=mysql_query("SELECT MIN(Qno) FROM onlineuniqid WHERE TestID='$get_test_id'");
	//$row2=mysql_fetch_array($result2);
	while($row2=mysql_fetch_array($result2))
	{
	$minq=$row2[0];
	}
	
	
	if($minq==0)
	{
	$result3=mysql_query("SELECT DISTINCT ta.duration,ta.blueprint_id,ta.sub_id FROM test_announce ta,que_paper q WHERE ta.que_paper_id=q.id AND q.name='$get_test_id' AND ta.user_id='$user_id'");
	//$row3=mysql_fetch_array($result3);
	$duration="";
	$bluprint_id=0;
	while($row3=mysql_fetch_array($result3))
	{
	$duration=$row3[0];
	$bluprint_id=$row3[1];
	$sub_id=$row3[2];
	}
		if($bluprint_id==0)
		{
		 echo "Failed";
		
		}
		else
		{
		$qno_st=1;
		$sql8=mysql_query("SELECT tutor_id,class,board FROM course WHERE id='$course_id'");
		$sql8_row=mysql_fetch_array($sql8);
		$tutor_id=$sql8_row[0];
		$class=$sql8_row[1];
		$board=$sql8_row[2];
		$br_id=$sql8_row[2];
		$use_ges_qbank=0;
		$use_ges_qbank=1;
				/*$sql81=mysql_query("SELECT user_id FROM mock_blueprint_detail WHERE id='$bluprint_id'");
		$sql81_row=mysql_fetch_array($sql81);
		$fb=$sql81_row[0];
		if($tutor_id=='8345' || $fb=='8345')
		{
		$use_ges_qbank=1;
		}
		else
		{
			$sql9=mysql_query("SELECT id FROM `userwise_ges_qbank` WHERE user_id='$tutor_id' AND board_id='$board' AND standard_id='$class' AND subject_id='$sub_id'");
			
			$sql9_rw = mysql_num_rows($sql9);
			
			if($sql9_rw>0)
			{
			$use_ges_qbank=1;
			}
			else
			{
					$sql89=mysql_query("SELECT created_by FROM user WHERE id='$fb'");
					$sql89_row=mysql_fetch_array($sql89);
					$tutor_id1=$sql9_row[0];
					if($tutor_id1=='8345')
					{
					$use_ges_qbank=1;
					}
					else
					{
					$use_ges_qbank=0;
					}
			}
		}*/
		//for insert in onlineuniqid
		if($sub_id == "16"){ $sb="1"; }
	else if($sub_id == "17"){ $sb="2"; }
	else if($sub_id == "15"){ $sb="3"; }
	else if($sub_id == "72"){ $sb="4"; }
	else if($sub_id == "71"){ $sb="5"; }
	else if($sub_id == "14"){ $sb="6"; }
	else if($sub_id == "18"){ $sb="7"; }
	else
	{
	$sb=$sub_id;
	}
			$new_val=0;
			$i=1;
			$select_que_str="";
			$select_ran="";
			
			$result5=mysql_query("SELECT DISTINCT b.id,c.standard_id,c.board_id,b.chapter_id,b.total_que,bd.subject_id FROM `blueprint_chapter` b,chapter c,mock_blueprint_subjectwise mb,blueprint_detail bd WHERE c.id=b.chapter_id AND b.blueprint_id=mb.subject_blueprint_id and mb. mock_blueprint_id='$bluprint_id' and bd.id=mb.subject_blueprint_id ORDER BY mb.id");
			
			while($row5=mysql_fetch_array($result5))
			{
				$k=0;
				$chap_id=0;
				$total_req_que=0;
				$remain_que=0;
				$lst1 = explode("-", $item);
				$chap_id=$row5[3];
				$total_req_que=$row5[4];
				if($row5[5] == "16"){ $sb="1"; }
	else if($row5[5] == "17"){ $sb="2"; }
	else if($row5[5] == "15"){ $sb="3"; }
	else if($row5[5] == "72"){ $sb="4"; }
	else if($row5[5] == "71"){ $sb="5"; }
	else if($row5[5] == "14"){ $sb="6"; }
	else if($row5[5] == "18"){ $sb="7"; }
	else
	{
	$sb=$row5[5];
	}
				if($chap_id>0)
				{
					$total_que_str="";
					$total_no_que=0;
					
					
					
					
					if ($use_ges_qbank==0)
					{
					
					$ud_count=mysql_query("SELECT c.id,ob.UniqId,ob.path FROM concept c,onlinequestionbank ob WHERE c.topic_id IN(SELECT id FROM topic WHERE chap_id='$chap_id')AND c.id=ob.ConceptId AND ob.Documenttype='O' AND ob.MEDIUM IN('E','EG') AND c.id > '0' and Repeat_uniqid=false and pdffile_exist=True AND (ob.Blocked_Question='0' or uniqid not IN (select distinct uniqid from block_question_private where user_id='$fb')) and  ob.FacultyId = '$fb'  ");
					}
					else
					{
					
					$ud_count=mysql_query("SELECT  c.id,ob.UniqId,ob.path  FROM concept c,onlinequestionbank ob WHERE c.topic_id IN(SELECT id FROM topic WHERE chap_id='$chap_id')AND c.id=ob.ConceptId AND ob.Documenttype='O' AND ob.MEDIUM IN('E','EG') AND c.id > '0' and Repeat_uniqid=false and pdffile_exist=True AND ob.Blocked_Question='0' AND (ob.share_document='1' or ob.FacultyId = '$fb')");
					
					}
					$ud_rw = mysql_num_rows($ud_count);
					$total_no_que=$ud_rw;
					while($df_row=mysql_fetch_array($ud_count))
					{
						$total_que_str=$total_que_str.$df_row[1].",";
					}
						//for mapping
					/*if($row5[2]=='1' || $row5[2]=='2')
					{
							
						
							if($row5[2]=='1')
							{
							$ud_count=mysql_query("SELECT distinct c.id,ob.UniqId,ob.path FROM concept c,onlinequestionbank ob,Concept_mapping m,topic t WHERE m.Cbse_TopicId IN(SELECT id FROM topic WHERE chap_id='$chap_id') AND m.conceptid=ob.ConceptId  AND c.id=m.conceptid AND ob.conceptid > 0 AND Repeat_uniqid=FALSE AND pdffile_exist=TRUE AND t.id=m.Gseb_TopicId  AND ob.MEDIUM IN('E','EG') AND (ob.Blocked_Question='0' OR  ob.Blocked_Question IS NULL)  AND ob.documenttype='O'  ");
							}
							elseif($row5[2]=='2')
							{
							$ud_count=mysql_query("SELECT distinct c.id,ob.UniqId,ob.path FROM concept c,onlinequestionbank ob,Concept_mapping m,topic t WHERE m.Gseb_TopicId IN(SELECT id FROM topic WHERE chap_id='$chap_id') AND m.conceptid=ob.ConceptId  AND c.id=m.conceptid AND ob.conceptid > 0 AND Repeat_uniqid=FALSE AND pdffile_exist=TRUE AND t.id=m.Cbse_TopicId  AND ob.MEDIUM IN('E','EG') AND (ob.Blocked_Question='0' OR  ob.Blocked_Question IS NULL)  AND ob.documenttype='O'  ");
							}
							else
							{
							}
						
					
			
					}*/
					if ($use_ges_qbank==0)
						{
							if($row5[2]=='1')
							{
							$ud_count=mysql_query("SELECT c.id,ob.UniqId,ob.path FROM concept c,onlinequestionbank ob,Concept_mapping m,topic t WHERE m.Cbse_TopicId IN(SELECT id FROM topic WHERE chap_id='$chap_id') AND m.conceptid=ob.ConceptId  AND c.id=m.conceptid AND ob.conceptid > 0 AND Repeat_uniqid=FALSE AND pdffile_exist=TRUE AND t.id=m.Gseb_TopicId  AND ob.MEDIUM IN('E','EG') AND (ob.Blocked_Question='0' OR  ob.Blocked_Question IS NULL)  AND ob.documenttype='O' AND ob.FacultyId = '$fb'  AND c.topic_id=t.id");
							}
							elseif($row5[2]=='2')
							{
								$ud_count=mysql_query("SELECT c.id,ob.UniqId,ob.path FROM concept c,onlinequestionbank ob,Concept_mapping m,topic t WHERE m.Gseb_TopicId IN(SELECT id FROM topic WHERE chap_id='$chap_id') AND m.conceptid=ob.ConceptId  AND c.id=m.conceptid 
								AND ob.conceptid > 0 AND Repeat_uniqid=FALSE AND pdffile_exist=TRUE AND t.id=m.Cbse_TopicId  AND ob.MEDIUM IN('E','EG') AND (ob.Blocked_Question='0' OR  ob.Blocked_Question IS NULL)  AND ob.documenttype='O' AND ob.FacultyId = '$fb'  AND c.topic_id=t.id");
							}
							else
							{
							}
				
						}	
						else
						{
							if($row5[2]=='1')
							{
							
							$ud_count=mysql_query("SELECT c.id,ob.UniqId,ob.path FROM concept c,onlinequestionbank ob,Concept_mapping m,topic t WHERE m.Cbse_TopicId IN(SELECT id FROM topic WHERE chap_id='$chap_id') AND m.conceptid=ob.ConceptId AND c.id=m.conceptid AND ob.conceptid > 0 AND Repeat_uniqid=FALSE AND pdffile_exist=TRUE AND t.id=m.Gseb_TopicId  AND ob.MEDIUM IN('E','EG') AND (ob.Blocked_Question='0' OR  ob.Blocked_Question IS NULL)  
							AND ob.documenttype='O' AND (ob.share_document='1' or ob.FacultyId = '$fb') AND c.topic_id=t.id ");
							}
							elseif($row5[2]=='2')
							{
							$ud_count=mysql_query("SELECT c.id,ob.UniqId,ob.path FROM concept c,onlinequestionbank ob,Concept_mapping m,topic t WHERE m.Gseb_TopicId IN(SELECT id FROM topic WHERE chap_id='$chap_id') AND m.conceptid=ob.ConceptId  AND c.id=m.conceptid AND ob.conceptid > 0 AND Repeat_uniqid=FALSE AND pdffile_exist=TRUE AND t.id=m.Cbse_TopicId  AND ob.MEDIUM IN('E','EG') AND (ob.Blocked_Question='0' OR  ob.Blocked_Question IS NULL)  AND ob.documenttype='O' AND (ob.share_document='1' or ob.FacultyId = '$fb') AND c.topic_id=t.id");
							}
							else
							{
							}
						
						}//end if $use_ges_qbank==0
					$ud_rw = mysql_num_rows($ud_count);
					$total_no_que=$total_no_que+$ud_rw;
					while($df_row=mysql_fetch_array($ud_count))
					{
						$total_que_str=$total_que_str.$df_row[1].",";
					}
					//for select question
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
								/*$select_que_str=$select_que_str.$lst2[$ran].",";*/
								$rs_10=mysql_query("INSERT INTO onlineuniqid(`TestID`,`Uniqid`,`Qno`)VALUES('$get_test_id','$lst2[$ran]','$qno_st')");
								if($rs_10)
								{
									$result_curr=mysql_query("SELECT CorrectAns FROM onlinequestionbank WHERE UniqId=$lst2[$ran]");
									$row_curr=mysql_fetch_array($result_curr);
									$get_ans=$row_curr[0];
									
									$result_concept=mysql_query("SELECT ConceptId FROM `onlinequestionbank` WHERE UniqId=$lst2[$ran]");
									$row_concept=mysql_fetch_array($result_concept);
									$get_concept_id=$row_concept[0];
									
									$result_topic=mysql_query("SELECT topic_id FROM concept WHERE id='$get_concept_id'");
									$row_topic=mysql_fetch_array($result_topic);
									$get_topic_id=$row_topic[0];
									$result_unit=mysql_query("SELECT c.unit_id FROM topic t,chapter c WHERE t.chap_id = c.id AND t.id='$get_topic_id'");
									$row_unit=mysql_fetch_array($result_unit);
									$get_unit=$row_unit[0];
									
									$insert_test1=mysql_query("INSERT INTO omrcorrect(`TestID`,`SubID`,`Qno`,`CorrectAns`,`TopicId`,`ConceptId`,`UnitId`)
														VALUES('$get_test_id','$sb','$qno_st','$get_ans','$get_topic_id','$get_concept_id','$get_unit')");
										if($insert_test1)
										{
										}
										else
										{
										echo "failed";
										}
								}
								else
								{
								}
								$qno_st=$qno_st+1;
								
								
									$new_val++;
									$select_ran=$select_ran.$ran.",";
									$select_que_str=$select_que_str.$lst2[$ran].",";
									
								
							}//end else if strpos
						}//end for
						out:
					}
					else
					{
						
								
					}
					//end select question
				}
			}
		
		//end insert
echo "success";
		}
	
	}
	else
	{
	echo "success";
	}
	

	include_once '../conn_close.php';
?>