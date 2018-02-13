<?php
	
		include_once '../config.php';
		$s5=$_POST['uid']='3214';
		$req_que=$_POST['req_que']='5';
		$uniq_id_get=$_POST['uniq_id_get']='';
		$marks_for_review=$_POST['marks_for_review']='';
		$marks_for_atm=$_POST['marks_for_atm']='';
		$total_no_que=$_POST['total_no_que']='5';
		$total_avg=$_POST['total_no_que']='';
		$chapter_list_que=$_POST['cp_value12']='352-1|353-2|354-1|355-1|';
		$cpt_count=$_POST['cpt_count']='352,353,354,355,';
		$cno_count=$_POST['cno_count']='1,2,3,4,';
		$sub_id=$_POST['sub_id']='17';
		$course_id=$_POST['course_id']='19';
		$select_que_str="";
		$srt1_at="";
		$str2_md="";
		$get_val=0;
		$use_ges_qbank=0;
		$coma=",".$marks_for_review;
		$coma1=",".$marks_for_atm;
		
		$total_que_str=$_POST['total_que_str']='';
		
		$sql8=mysql_query("SELECT tutor_id,class,board FROM course WHERE id='$course_id'");
		$sql8_row=mysql_fetch_array($sql8);
		$tutor_id=$sql8_row[0];
		$class=$sql8_row[1];
		$board=$sql8_row[2];
		$br_id=$sql8_row[2];
		//echo $tutor_id;
		//for checking ges question rights
		if($tutor_id=='8345')
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
			$use_ges_qbank=0;
			}
		}
		$totalque_selected=0;
		//echo $chapter_list_que;
		//end checking ges question rights
		$lst = explode("|", $chapter_list_que);
		$new_val=0;
		$i=1;
		$select_que_str="";
			$select_ran="";
		echo "<table>";
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
					$ud_count=mysql_query("SELECT c.id,ob.UniqId,ob.path FROM concept c,onlinequestionbank ob WHERE c.topic_id IN(SELECT id FROM topic WHERE chap_id='$chap_id') AND c.id=ob.ConceptId AND ob.Documenttype='O' AND ob.MEDIUM IN('E','EG') AND c.id > '0' and Repeat_uniqid=false and pdffile_exist=True AND ob.Blocked_Question='0' AND ob.share_document='1' ");
					
					$ud_rw = mysql_num_rows($ud_count);
					$total_no_que=$ud_rw;
					if ($use_ges_qbank==0)
					{
					
					$ud_count=mysql_query("SELECT distinct c.id,ob.UniqId,ob.path FROM concept c,onlinequestionbank ob WHERE c.topic_id IN(SELECT id FROM topic WHERE chap_id='$chap_id')AND c.id=ob.ConceptId AND ob.Documenttype='O' AND ob.MEDIUM IN('E','EG') AND c.id > '0' and Repeat_uniqid=false and pdffile_exist=True AND (ob.Blocked_Question='0' or uniqid not IN (select distinct uniqid from block_question_private where user_id='$tutor_id'))  (ob.FacultyId = '$tutor_id' or ob.FacultyId in(select id from user where created_by='$tutor_id')) ");
					}
					else
					{
					
					$ud_count=mysql_query("SELECT distinct c.id,ob.UniqId,ob.path FROM concept c,onlinequestionbank ob WHERE c.topic_id IN(SELECT id FROM topic WHERE chap_id='$chap_id')AND c.id=ob.ConceptId AND ob.Documenttype='O' AND ob.MEDIUM IN('E','EG') AND c.id > '0' and Repeat_uniqid=false and pdffile_exist=True AND ob.Blocked_Question='0' AND ob.share_document='1'");
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
							$ud_count=mysql_query("SELECT  distinct c.id,ob.UniqId,ob.path FROM concept c,onlinequestionbank ob,Concept_mapping m,topic t WHERE m.Cbse_TopicId IN(SELECT id FROM topic WHERE chap_id='$chap_id') AND m.conceptid=ob.ConceptId  AND c.id=m.conceptid AND ob.conceptid > 0 AND Repeat_uniqid=FALSE AND pdffile_exist=TRUE AND t.id=m.Gseb_TopicId  AND ob.MEDIUM IN('E','EG') AND (ob.Blocked_Question='0' OR  ob.Blocked_Question IS NULL)  AND ob.documenttype='O' AND (ob.FacultyId = '$tutor_id' or ob.FacultyId in(select id from user where created_by='$tutor_id'))");
							}
							elseif($br_id=='2')
							{
								$ud_count=mysql_query("SELECT distinct c.id,ob.UniqId,ob.path FROM concept c,onlinequestionbank ob,Concept_mapping m,topic t WHERE m.Gseb_TopicId IN(SELECT id FROM topic WHERE chap_id='$chap_id') AND m.conceptid=ob.ConceptId  AND c.id=m.conceptid 
								AND ob.conceptid > 0 AND Repeat_uniqid=FALSE AND pdffile_exist=TRUE AND t.id=m.Cbse_TopicId  AND ob.MEDIUM IN('E','EG') AND (ob.Blocked_Question='0' OR  ob.Blocked_Question IS NULL)  AND ob.documenttype='O' AND (ob.FacultyId = '$tutor_id' or ob.FacultyId in(select id from user where created_by='$tutor_id'))");
							}
							else
							{
							}
				
						}	
						else
						{
							if($br_id=='1')
							{
							$ud_count=mysql_query("SELECT distinct c.id,ob.UniqId,ob.path FROM concept c,onlinequestionbank ob,Concept_mapping m,topic t WHERE m.Cbse_TopicId IN(SELECT id FROM topic WHERE chap_id='$chap_id') AND m.conceptid=ob.ConceptId  AND c.id=m.conceptid AND ob.conceptid > 0 AND Repeat_uniqid=FALSE AND pdffile_exist=TRUE AND t.id=m.Gseb_TopicId  AND ob.MEDIUM IN('E','EG') AND (ob.Blocked_Question='0' OR  ob.Blocked_Question IS NULL)  AND ob.documenttype='O'  ");
							}
							elseif($br_id=='2')
							{
							$ud_count=mysql_query("SELECT distinct c.id,ob.UniqId,ob.path FROM concept c,onlinequestionbank ob,Concept_mapping m,topic t WHERE m.Gseb_TopicId IN(SELECT id FROM topic WHERE chap_id='$chap_id') AND m.conceptid=ob.ConceptId  AND c.id=m.conceptid AND ob.conceptid > 0 AND Repeat_uniqid=FALSE AND pdffile_exist=TRUE AND t.id=m.Cbse_TopicId  AND ob.MEDIUM IN('E','EG') AND (ob.Blocked_Question='0' OR  ob.Blocked_Question IS NULL)  AND ob.documenttype='O'  ");
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
								/*$select_que_str=$select_que_str.$lst2[$ran].",";
								$rs_10=mysql_query("INSERT INTO qpapergenqid(`DocumentID`,`Qno`,`QUID`,`Mark`,`Duration`,`faculty_id`)VALUES('$max_id_doc_ref','$qno_st','$lst2[$ran]','1','$duration','$fac_id')");
								if($rs_10)
								{
								//echo "failed";
								}
								else
								{
								}
								$qno_st=$qno_st+1;*/
								if($new_val == 3)
								{	
									$new_val=0;
									$new_val++;
									echo "</tr>";
									echo "<tr>";
									$select_ran=$select_ran.$ran.",";
									$select_que_str=$select_que_str.$lst2[$ran].",";
									echo "<td><input type='radio' name ='name_que' id='$lst2[$ran]-$i' class='chk' value='$lst2[$ran]'  /><font size='4em' >$i </font></td>";
									$item15=",".$lst2[$ran].",";
									if(strpos($coma1,$item15) !== false)
									{
										echo "<td><div style='background-color:green;border:solid 0px;width:0.5em;height:0.5em;'></div></td>";
									}
									else if(strpos($coma,$item15) !== false)
									{
										echo "<td><div style='background-color:yellow;border:solid 0px;width:0.5em;height:0.5em;'></div></td>";
									}
									else
									{
										echo "<td><div style='background-color:red;border:solid 0px;width:0.5em;height:0.5em;'></div></td>";
									}
									$i++;
									$k++;
								}
								else
								{
									$new_val++;
									$select_ran=$select_ran.$ran.",";
									$select_que_str=$select_que_str.$lst2[$ran].",";
									echo "<td><input type='radio' name ='name_que' id='$lst2[$ran]-$i' class='chk' value='$lst2[$ran]'  /><font size='4em' >$i</font></td>";
									
									$item15=",".$lst2[$ran].",";
									if(strpos($coma1,$item15) !== false)
									{
										echo "<td><div style='background-color:green;border:solid 0px;width:0.5em;height:0.5em;'></div></td>";
									}
									else if(strpos($coma,$item15) !== false)
									{
										echo "<td><div style='background-color:yellow;border:solid 0px;width:0.5em;height:0.5em;'></div></td>";
									}
									else
									{
										echo "<td><div style='background-color:red;border:solid 0px;width:0.5em;height:0.5em;'></div></td>";
									}
									$i++;
									$k++;
								}
							}//end else if strpos
						}//end for
						out:
					}
					else
					{
						
						$message1="Questions insufficinet.";
						echo "<script language=javascript> alert('$message1');</script>";
						goto labelout;						
					}
					//end selecting question
				}//end $chap_id>0
			}//end if$item=="
		}//end for
		echo "</table>";
		echo "<table>";
				echo "<tr>";
					echo "<td id='sel_que' value='$select_que_str'></td>";
					echo "<td id='sel_que_ran' value='$select_ran'></td>";
				echo "</tr>";
			echo "</table>";
		labelout:
		/*$qno_st=1;
		echo $chapter_list_que;
	$lst = explode("|", $chapter_list_que);
	$new_val=0;
	$i=1
	echo "<table>";
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
				foreach($lst1 as $item1) 
				{
					if($k==0)
					{
					$chap_id= $item1;
					}
					else
					{
						$total_req_que=$item1;
					}
					$k=k+1;
				}
				if($chap_id>0)
				{
					$total_que_str="";
					$total_no_que=0;
					$ud_count=mysql_query("SELECT c.id,ob.UniqId,ob.path FROM concept c,onlinequestionbank ob WHERE c.topic_id IN(SELECT id FROM topic WHERE chap_id='$chap_id') AND c.id=ob.ConceptId AND ob.Documenttype='O' AND ob.MEDIUM IN('E','EG') AND c.id > '0' and Repeat_uniqid=false and pdffile_exist=True AND ob.Blocked_Question='0' AND ob.share_document='1' ");
					
					$ud_rw = mysql_num_rows($ud_count);
					$total_no_que=$ud_rw;
					while($df_row=mysql_fetch_array($ud_count))
					{
						$total_que_str=$total_que_str.$df_row[1].",";
					}
						//for mapping question
					if($board=='1')
					{
						
						$ud_count=mysql_query("SELECT distinct c.id,ob.UniqId,ob.path FROM concept c,onlinequestionbank ob,Concept_mapping m,topic t
			WHERE m.Cbse_TopicId IN(SELECT id FROM topic WHERE chap_id='$chap_id') AND m.conceptid=ob.ConceptId  AND c.id=m.conceptid 
				AND ob.conceptid > 0 AND Repeat_uniqid=FALSE AND pdffile_exist=TRUE AND t.id=m.Gseb_TopicId  AND ob.MEDIUM IN('E','EG') AND 
				(ob.Blocked_Question='0' OR  ob.Blocked_Question IS NULL)  AND ob.documenttype='O' AND ob.share_document='1' ");
						
					
					}
					elseif($board=='2')
					{
						
						$ud_count=mysql_query("SELECT  distinct c.id,ob.UniqId,ob.path FROM concept c,onlinequestionbank ob,Concept_mapping m,topic t
			WHERE m.Gseb_TopicId IN(SELECT id FROM topic WHERE chap_id='$chap_id') AND m.conceptid=ob.ConceptId  AND c.id=m.conceptid 
				AND ob.conceptid > 0 AND Repeat_uniqid=FALSE AND pdffile_exist=TRUE AND t.id=m.Cbse_TopicId  AND ob.MEDIUM IN('E','EG') AND 
				(ob.Blocked_Question='0' OR  ob.Blocked_Question IS NULL)  AND ob.documenttype='O' AND ob.share_document='1'");
						
					
					}
					$ud_rw = mysql_num_rows($ud_count);
					$total_no_que=$total_no_que+$ud_rw;
					while($df_row=mysql_fetch_array($ud_count))
					{
						$total_que_str=$total_que_str.$df_row[1].",";
					}
					$total_que_str=substr($total_que_str, 0, -1);
					$select_que_str="";
					//for selecting question
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
							
							if($new_val == 3)
					{	
						$new_val=0;
						$new_val++;
						echo "</tr>";
						echo "<tr>";
						$select_ran=$select_ran.$ran.",";
						$select_que_str=$select_que_str.$lst2[$ran].",";
						echo "<td><input type='radio' name ='name_que' id='$lst2[$ran]-$i' class='chk' value='$lst2[$ran]'  /><font size='4em' >$i </font></td>";
						$item1=",".$lst2[$ran].",";
						if(strpos($coma1,$item1) !== false)
						{
							echo "<td><div style='background-color:green;border:solid 0px;width:0.5em;height:0.5em;'></div></td>";
						}
						else if(strpos($coma,$item1) !== false)
						{
							echo "<td><div style='background-color:yellow;border:solid 0px;width:0.5em;height:0.5em;'></div></td>";
						}
						else
						{
							echo "<td><div style='background-color:red;border:solid 0px;width:0.5em;height:0.5em;'></div></td>";
						}
						$i++;
						
					}
					else
					{
						$new_val++;
						$select_ran=$select_ran.$ran.",";
						$select_que_str=$select_que_str.$lst2[$ran].",";
						echo "<td><input type='radio' name ='name_que' id='$lst2[$ran]-$i' class='chk' value='$lst2[$ran]'  /><font size='4em' >$i</font></td>";
						
						$item1=",".$lst2[$ran].",";
						if(strpos($coma1,$item1) !== false)
						{
							echo "<td><div style='background-color:green;border:solid 0px;width:0.5em;height:0.5em;'></div></td>";
						}
						else if(strpos($coma,$item1) !== false)
						{
							echo "<td><div style='background-color:yellow;border:solid 0px;width:0.5em;height:0.5em;'></div></td>";
						}
						else
						{
							echo "<td><div style='background-color:red;border:solid 0px;width:0.5em;height:0.5em;'></div></td>";
						}
						$i++;
						
					}
						}
					}
					out:
					//end selecting question
					//end mapping question
				}//end chap_id
			} //end if item
		}//end for
		
		//old
		
			echo "</table>";*/
			/*echo "<table>";
				echo "<tr>";
					echo "<td id='sel_que' value='$select_que_str'></td>";
					echo "<td id='sel_que_ran' value='$select_ran'></td>";
				echo "</tr>";
			echo "</table>";*/
		
?>