<?php
	include '../config.php';
	$subject_id=$_GET['sub_id'];
	$course_id=$_GET['course_id'];
	$material_type=$_GET['material_type'];
	$uid=$_GET['uid'];
	$examtype=$_GET['examtype'];
	$batch_id=$_GET['batch_id'];
	$chapter_id=$_GET['chapter_id'];
	$use_ges_qbank=0;
	$querystring="";
	$qid=$_GET['qid'];
	$j=1;
	//for checking ges question rights
		$sql8=mysql_query("SELECT tutor_id,class,board FROM course WHERE id='$course_id'");
		$sql8_row=mysql_fetch_array($sql8);
		$tutor_id=$sql8_row[0];
		$class=$sql8_row[1];
		$board=$sql8_row[2];
		$br_id=$sql8_row[2];
		//for board_id
		/*$res_board=mysql_query("select board_id from chapter where id='$cp_value12' ");
		while($row_brd=mysql_fetch_array($res_board))
				{
				$br_id=$row_brd[0];
				}*/
		//end board_id
		if ($tutor_id=='8345')
		{
		$use_ges_qbank=1;
		}
		else
		{
			$sql9=mysql_query("SELECT id FROM `userwise_ges_qbank` WHERE user_id='$tutor_id' AND board_id='$board' AND standard_id='$class' AND subject_id='$subject_id'");
			
			$sql9_rw = mysql_num_rows($sql9);
			
			if($sql9_rw>0)
			{
			$use_ges_qbank=1;
			}
			else
			{
			
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
		//end checking
		echo "<table style='border-top:solid 0px;border-left:solid 0px;border-bottom:solid 0px;color:black;width:100%;overflow-y: scroll' cellspacing='0' id='mytable_sub'>";
		echo "<tr>
			<td style='width:3%;border-bottom:solid 1px;color:black;'></td>
			<td style='width:35%;border-bottom:solid 1px;border-right:solid 1px;color:black;'><b><font  color='black' >Question ID</font></b></td>
			<td style='width:27%;border-bottom:solid 1px;border-right:solid 1px;color:black;'><b><font  color='black' >Q.No</font></b></td>
			<td style='width:35%;border-bottom:solid 1px;color:black;'><b><font  color='black' >Mark</font></b></td>";
			echo"</tr>";
		if ($use_ges_qbank==0)
				{
				
				$ud_count=mysql_query("SELECT distinct ob.UniqId,ob.subject,ob.mark FROM concept c,onlinequestionbank ob ,course_chapter_module ccm WHERE
 c.topic_id=ccm.module_name AND ccm.course_id='$course_id' AND ccm.sub_id='$subject_id'   AND c.id=ob.ConceptId AND ob.Documenttype='S' AND ob.MEDIUM IN('E','EG') AND c.id > '0' and Repeat_uniqid=false and pdffile_exist=True AND (ob.Blocked_Question='0' or uniqid not IN (select distinct uniqid from block_question_private where user_id='$tutor_id'))  AND (ob.FacultyId = '$tutor_id' or ob.FacultyId in(select id from user where created_by='$tutor_id')) ");
				}
				else
				{
				///echo in else1";
				$ud_count=mysql_query("SELECT distinct ob.UniqId,ob.subject,ob.mark FROM concept c,onlinequestionbank ob,course_chapter_module ccm WHERE
 c.topic_id=ccm.module_name AND ccm.course_id='$course_id' AND ccm.sub_id='$subject_id'   AND c.id=ob.ConceptId AND ob.Documenttype='S' AND ob.MEDIUM IN('E','EG') AND c.id > '0' and Repeat_uniqid=false and pdffile_exist=True AND ob.Blocked_Question='0'  ");
 
				}
				$rw = mysql_num_rows($ud_count);
				if($rw==0)
				{
				//echo "No Data Avaliable";
				}
				else
				{
				$flg=0;
				
			while($row=mysql_fetch_array($ud_count))
			{
			$flg=1;
				if($j%2 == 0)
				{
					echo "<tr style='background-color:white;'>";
					}
					else
					{
					echo "<tr style='background-color:#5E9DC8;'>";
					}
				if($qid==$row[0])
				{
					echo "<td style='color:black;border-right:solid 0px;border-bottom:solid 1px;width:3%;'><center><input type='radio' name='$row[1]' id='$row[0]' class='ck' value='$j' checked='checked'/></center></td>";
				}
				else
				{
				echo "<td style='color:black;border-right:solid 0px;border-bottom:solid 1px;width:3%;'><center><input type='radio' name='$row[1]' id='$row[0]' class='ck' value='$j' /></center></td>";
				}
							
							
								echo "<td style='border-right:solid 1px;border-bottom:solid 1px;width:35%;'><font  color='black' >".$row[0]."</font></td>";
							echo "<td style='border-right:solid 1px;border-bottom:solid 1px;width:27%;'><font  color='black' >".$j."</font></td>";
							echo "<td style='border:solid 0px;border-bottom:solid 1px;width:35%;'><font  color='black' >".$row[2]."</font></td>";
							
							echo "</tr>";
							$j++;
			}
			
			}
			if($br_id=='1' || $br_id=='2')
		{
		//
		if ($use_ges_qbank==0)
				{
					if($br_id=='1')
					{
					$ud_count1=mysql_query("SELECT  distinct ob.UniqId,ob.subject,ob.mark FROM concept c,onlinequestionbank ob,Concept_mapping m,topic t,course_chapter_module ccm
WHERE m.Cbse_TopicId=ccm.module_name AND ccm.course_id='$course_id' AND ccm.sub_id='$subject_id' AND m.conceptid=ob.ConceptId  AND c.id=m.conceptid 
AND ob.conceptid > 0 AND Repeat_uniqid=FALSE AND pdffile_exist=TRUE AND t.id=m.Gseb_TopicId  AND ob.MEDIUM IN('E','EG') AND 
(ob.Blocked_Question='0' OR  ob.Blocked_Question IS NULL)  AND ob.documenttype='S'  AND (ob.FacultyId = '$tutor_id' or ob.FacultyId in(select id from user where created_by='$tutor_id'))");
 
					}
					elseif($br_id=='2')
					{
						$ud_count1=mysql_query("SELECT distinct ob.UniqId,ob.subject,ob.mark FROM concept c,onlinequestionbank ob,Concept_mapping m,topic t,course_chapter_module ccm 
WHERE m.Gseb_TopicId=ccm.module_name AND ccm.course_id='$course_id' AND ccm.sub_id='$subject_id' AND m.conceptid=ob.ConceptId  AND c.id=m.conceptid 
AND ob.conceptid > 0 AND Repeat_uniqid=FALSE AND pdffile_exist=TRUE AND t.id=m.Cbse_TopicId  AND ob.MEDIUM IN('E','EG') AND 
(ob.Blocked_Question='0' OR  ob.Blocked_Question IS NULL)  AND ob.documenttype='S'   AND (ob.FacultyId = '$tutor_id' or ob.FacultyId in(select id from user where created_by='$tutor_id'))");
					}
					else
					{
					}
			
				}
				else
				{
					if($br_id=='1')
					{
					$ud_count1=mysql_query("SELECT distinct ob.UniqId,ob.subject,ob.mark FROM concept c,onlinequestionbank ob,Concept_mapping m,topic t,course_chapter_module ccm 
			WHERE m.Cbse_TopicId IN=ccm.module_name AND ccm.course_id='$course_id' AND ccm.sub_id='$subject_id' AND m.conceptid=ob.ConceptId  AND c.id=m.conceptid 
AND ob.conceptid > 0 AND Repeat_uniqid=FALSE AND pdffile_exist=TRUE AND t.id=m.Gseb_TopicId  AND ob.MEDIUM IN('E','EG') AND 
(ob.Blocked_Question='0' OR  ob.Blocked_Question IS NULL)  AND ob.documenttype='S'  ");
 
					}
					elseif($br_id=='2')
					{
					$ud_count1=mysql_query("SELECT distinct ob.UniqId,ob.subject,ob.mark FROM concept c,onlinequestionbank ob,Concept_mapping m,topic t,course_chapter_module ccm 
WHERE m.Gseb_TopicId=ccm.module_name AND ccm.course_id='$course_id' AND ccm.sub_id='$subject_id'  AND m.conceptid=ob.ConceptId  AND c.id=m.conceptid 
AND ob.conceptid > 0 AND Repeat_uniqid=FALSE AND pdffile_exist=TRUE AND t.id=m.Cbse_TopicId  AND ob.MEDIUM IN('E','EG') AND 
(ob.Blocked_Question='0' OR  ob.Blocked_Question IS NULL)  AND ob.documenttype='S'   ");
					}
					else
					{
					}
				
				}
				while($row=mysql_fetch_array($ud_count1))
			{
			$flg=1;
				if($j%2 == 0)
				{
					echo "<tr style='background-color:white;'>";
					}
					else
					{
					echo "<tr style='background-color:#5E9DC8;'>";
					}
				if($qid==$row[0])
				{
					echo "<td style='color:black;border-right:solid 0px;border-bottom:solid 1px;width:3%;'><center><input type='radio' name='$row[1]' id='$row[0]' class='ck' value='$j' checked='checked'/></center></td>";
				}
				else
				{
				echo "<td style='color:black;border-right:solid 0px;border-bottom:solid 1px;width:3%;'><center><input type='radio' name='$row[1]' id='$row[0]' class='ck' value='$j' /></center></td>";
				}
			
							
							
								echo "<td style='border-right:solid 1px;border-bottom:solid 1px;width:35%;'><font  color='black' >".$row[0]."</font></td>";
							echo "<td style='border-right:solid 1px;border-bottom:solid 1px;width:27%;'><font  color='black' >".$j."</font></td>";
							echo "<td style='border:solid 0px;border-bottom:solid 1px;width:35%;'><font  color='black' >".$row[2]."</font></td>";
							
							echo "</tr>";
							$j++;
			}
		//
		}
			if($flg==0)
			{
			
			echo "<tr>";
				echo "<td style='color:black;border-right:solid 0px;border-bottom:solid 1px;width:3%;'></td>";
							
								echo "<td style='border-right:solid 1px;border-bottom:solid 1px;width:35%;'><font  color='black' >No Data Available</font></td>";
							echo "<td style='border-right:solid 1px;border-bottom:solid 1px;width:27%;'><font  color='black' ></font></td>";
							echo "<td style='border:solid 0px;border-bottom:solid 1px;width:35%;'><font  color='black' ></font></td>";
							
							
							echo "</tr>";
			}
			echo "</table>";
?>