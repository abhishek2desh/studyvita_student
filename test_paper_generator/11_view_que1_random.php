<?php
	
		include_once '../config.php';
		$s5=$_POST['uid'];
		$req_que=$_POST['req_que'];
		$uniq_id_get=$_POST['uniq_id_get'];
		$marks_for_review=$_POST['marks_for_review'];
		$marks_for_atm=$_POST['marks_for_atm'];
		$total_no_que=$_POST['total_no_que'];
		$total_avg=$_POST['total_no_que'];
		$cp_value12=$_POST['cp_value12'];
		$sub_id=$_POST['sub_id'];
		$course_id=$_POST['course_id'];
		$select_que_str="";
		$srt1_at="";
		$str2_md="";
		$get_val=0;
		$use_ges_qbank=0;
		$coma=",".$marks_for_review;
		$coma1=",".$marks_for_atm;
		
		$total_que_str=$_POST['total_que_str'];
		
		$sql8=mysql_query("SELECT tutor_id,class,board FROM course WHERE id='$course_id'");
		$sql8_row=mysql_fetch_array($sql8);
		$tutor_id=$sql8_row[0];
		$class=$sql8_row[1];
		$board=$sql8_row[2];
		//for board_id
		$res_board=mysql_query("select board_id from chapter where id='$cp_value12' ");
		while($row_brd=mysql_fetch_array($res_board))
				{
				$br_id=$row_brd[0];
				}
		//end board_id
		//for checking ges question rights
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
			$use_ges_qbank=1;
			}
			else
			{
			//$use_ges_qbank=0;
			//for check demo condition
			//for expiry date
					$result_g=mysql_query("SELECT globalquestion_exp_date FROM USER WHERE id='$tutor_id'");	
					while($row_g=mysql_fetch_array($result_g))
					{
					$exp_date=$row_g[0];
					}
					if($exp_date=="")
					{
					$use_ges_qbank=0;
					}
					else
					{
					$Date_now =date('Y-m-d');
					if(strtotime($exp_date)>strtotime($Date_now))
					{
						$use_ges_qbank=1;
					}
					else
					{
					$use_ges_qbank=0;
					}
					}
			//end check demo condition
			}
		}
		//end checking ges question rights
		if ($use_ges_qbank==0)
		{
		////echo "in if1";
		$ud_count=mysql_query("SELECT c.id,ob.UniqId,ob.path FROM concept c,onlinequestionbank ob WHERE c.topic_id IN(SELECT id FROM topic WHERE chap_id='$cp_value12')AND c.id=ob.ConceptId AND ob.Documenttype='O' AND ob.MEDIUM IN('E','EG') AND c.id > '0' and Repeat_uniqid=false and pdffile_exist=True AND (ob.Blocked_Question='0' or uniqid not IN (select distinct uniqid from block_question_private where user_id='$tutor_id'))  (ob.FacultyId = '$tutor_id' or ob.FacultyId in(select id from user where created_by='$tutor_id')) ");
		}
		else
		{
		///echo in else1";
		$ud_count=mysql_query("SELECT c.id,ob.UniqId,ob.path FROM concept c,onlinequestionbank ob WHERE c.topic_id IN(SELECT id FROM topic WHERE chap_id='$cp_value12')AND c.id=ob.ConceptId AND ob.Documenttype='O' AND ob.MEDIUM IN('E','EG') AND c.id > '0' and Repeat_uniqid=false and pdffile_exist=True AND ob.Blocked_Question='0' ");
		}
		$ud_rw = mysql_num_rows($ud_count);
		$total_no_que=$ud_rw;
		if($ud_rw==0 || $ud_rw < $req_que)
		{
			if($br_id=='1' || $br_id=='2')
			{
				if ($use_ges_qbank==0)
				{
					if($br_id=='1')
					{
					$ud_count=mysql_query("SELECT  distinct c.id,ob.UniqId,ob.path FROM concept c,onlinequestionbank ob,Concept_mapping m,topic t WHERE m.Cbse_TopicId IN(SELECT id FROM topic WHERE chap_id='$cp_value12') AND m.conceptid=ob.ConceptId  AND c.id=m.conceptid AND ob.conceptid > 0 AND Repeat_uniqid=FALSE AND pdffile_exist=TRUE AND t.id=m.Gseb_TopicId  AND ob.MEDIUM IN('E','EG') AND (ob.Blocked_Question='0' OR  ob.Blocked_Question IS NULL)  AND ob.documenttype='O' AND (ob.FacultyId = '$tutor_id' or ob.FacultyId in(select id from user where created_by='$tutor_id'))");
					}
					elseif($br_id=='2')
					{
						$ud_count=mysql_query("SELECT distinct c.id,ob.UniqId,ob.path FROM concept c,onlinequestionbank ob,Concept_mapping m,topic t WHERE m.Gseb_TopicId IN(SELECT id FROM topic WHERE chap_id='$cp_value12') AND m.conceptid=ob.ConceptId  AND c.id=m.conceptid 
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
					$ud_count=mysql_query("SELECT distinct c.id,ob.UniqId,ob.path FROM concept c,onlinequestionbank ob,Concept_mapping m,topic t WHERE m.Cbse_TopicId IN(SELECT id FROM topic WHERE chap_id='$cp_value12') AND m.conceptid=ob.ConceptId  AND c.id=m.conceptid AND ob.conceptid > 0 AND Repeat_uniqid=FALSE AND pdffile_exist=TRUE AND t.id=m.Gseb_TopicId  AND ob.MEDIUM IN('E','EG') AND (ob.Blocked_Question='0' OR  ob.Blocked_Question IS NULL)  AND ob.documenttype='O'  ");
					}
					elseif($br_id=='2')
					{
					$ud_count=mysql_query("SELECT distinct c.id,ob.UniqId,ob.path FROM concept c,onlinequestionbank ob,Concept_mapping m,topic t WHERE m.Gseb_TopicId IN(SELECT id FROM topic WHERE chap_id='$cp_value12') AND m.conceptid=ob.ConceptId  AND c.id=m.conceptid AND ob.conceptid > 0 AND Repeat_uniqid=FALSE AND pdffile_exist=TRUE AND t.id=m.Cbse_TopicId  AND ob.MEDIUM IN('E','EG') AND (ob.Blocked_Question='0' OR  ob.Blocked_Question IS NULL)  AND ob.documenttype='O'  ");
					}
					else
					{
					}
				
				}//end if $use_ges_qbank==0
			
			}//end if $br_id=1
		}//end if $ud_rw==0
		$ud_rw = mysql_num_rows($ud_count);
		$total_no_que=$ud_rw;
		if($ud_rw >= $req_que)
		{
			while($df_row=mysql_fetch_array($ud_count))
			{
				$total_que_str=$total_que_str.$df_row[1].",";
			}
			$total_que_str=substr($total_que_str, 0, -1);
			$lst = explode(",", $total_que_str);
			$i=1;
			$k=0;
			$new_val=0;
			//$avg_val=0;
			echo "<table>";
			for ($j=0;$j<=$total_no_que;$j++)
			{
				if ($j==$req_que)
				{
					goto out;
				}
				in1:
				$ran="";
				$ran=rand(1,$total_no_que);
				$ran=$ran-1;
				$run2="";
				$run1="";
				$uq_get=$lst[$ran];
				$run2=",".$lst[$ran].",";
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
						$select_que_str=$select_que_str.$lst[$ran].",";
						echo "<td><input type='radio' name ='name_que' id='$lst[$ran]-$i' class='chk' value='$lst[$ran]'  /><font size='4em' >$i </font></td>";
						$item1=",".$lst[$ran].",";
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
						$k++;
					}
					else
					{
						$new_val++;
						$select_ran=$select_ran.$ran.",";
						$select_que_str=$select_que_str.$lst[$ran].",";
						echo "<td><input type='radio' name ='name_que' id='$lst[$ran]-$i' class='chk' value='$lst[$ran]'  /><font size='4em' >$i</font></td>";
						
						$item1=",".$lst[$ran].",";
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
						$k++;
					}
				}
			}
			out:
			echo "</table>";
			echo "<table>";
				echo "<tr>";
					echo "<td id='sel_que' value='$select_que_str'></td>";
					echo "<td id='sel_que_ran' value='$select_ran'></td>";
				echo "</tr>";
			echo "</table>";
		}
		else
		{
		$message="No Questions are available with difficulty level greater than your average performance.";
		//$message1="Only $ud_rw question are available in these chapter.";
			$message1="Enough number of questions according to your criteria not available.Sorry";
		echo "<script language=javascript> alert('$message1');</script>"; 
		}
?>