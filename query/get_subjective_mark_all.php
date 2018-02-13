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
		if ($use_ges_qbank==0)
				{
				
				$result=mysql_query("SELECT distinct ob.mark FROM concept c,onlinequestionbank ob ,course_chapter_module ccm WHERE
 c.topic_id=ccm.module_name AND ccm.course_id='$course_id' AND ccm.sub_id='$subject_id'   and c.id=ob.ConceptId AND ob.Documenttype='S' AND ob.MEDIUM IN('E','EG') AND c.id > '0' and Repeat_uniqid=false and pdffile_exist=True AND (ob.Blocked_Question='0' or uniqid not IN (select distinct uniqid from block_question_private where user_id='$tutor_id'))  AND (ob.FacultyId = '$tutor_id' or ob.FacultyId in(select id from user where created_by='$tutor_id')) ");
				}
				else
				{
				///echo in else1";
				$result=mysql_query("SELECT distinct ob.mark FROM concept c,onlinequestionbank ob ,course_chapter_module ccm WHERE
 c.topic_id=ccm.module_name AND ccm.course_id='$course_id' AND ccm.sub_id='$subject_id'   AND c.id=ob.ConceptId AND ob.Documenttype='S' AND ob.MEDIUM IN('E','EG') AND c.id > '0' and Repeat_uniqid=false and pdffile_exist=True AND ob.Blocked_Question='0'  ");
				}
	//	$result=mysql_query("SELECT DISTINCT mark FROM onlinequestionbank WHERE documenttype='S' AND mark IS NOT NULL AND mark!='' ORDER BY mark");
										
										$rw = mysql_num_rows($result);
										echo "<option value=''>Select Mark</option>";
										if($rw == 0)
										{
											echo "<option value=''>No Data Available.</option>";
										}
										else
										{
											while($row=mysql_fetch_array($result))
											{
											if($row[0]=="")
											{
											}
											else
											{
												echo "<option value=$row[0]>$row[0]</option>";
												}
											}
										}
?>