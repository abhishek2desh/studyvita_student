<?php 
	include_once '../config.php';

	$stu_id = $_GET['user_id'];
	$tid_test = $_GET['tid_test'];
	$cid_test=0;
	$resultc=mysql_query("SELECT DISTINCT c.id FROM course c,batch b,`course_type_mapping` ctm,test_announce t WHERE t.que_paper_id='$tid_test' AND b.id=t.batch_id AND b.course_type_mapping_id=ctm.id AND c.id=ctm.course_id");
	while($rowc=mysql_fetch_array($resultc))
	{
		$cid_test=$rowc[0];
	}
	$result=mysql_query("SELECT id FROM `student_registered_course` WHERE course_id='$cid_test' AND user_id='$stu_id'");
	$rw = mysql_num_rows($result);
	if($rw==0)
	{
	//for exp date
	$cr_exp_date="";
	$sqltest1="SELECT DISTINCT b.id,b.end_on FROM batch b,`course_type_mapping` ct,course c WHERE ct.course_id=c.id AND b.`course_type_mapping_id`=ct.id  AND c.id='$cid_test' AND b.active=1 ORDER BY b.id desc limit 1 ";
	$resulttest1=mysql_query($sqltest1);
						while($rowtest1=mysql_fetch_array($resulttest1))
						{
						$cr_exp_date=$rowtest1[1];
						}
	//end exp date
	$result7=mysql_query("SELECT id FROM `student_demo_course` WHERE course_id='$cid_test' AND user_id='$stu_id'");
	$rw7 = mysql_num_rows($result7);
	if($rw7==0)
	{
	
	
		$que_demo=mysql_query("INSERT INTO student_demo_course (user_id,course_id,total_times,exp_date)values('$stu_id','$cid_test','0','$cr_exp_date')");
		if($que_demo)
		{
			$batch_id="";
			$branch_id="";
			$board_id="";
			$std_id="";
			$coursetype_id="";
			$sqltest1="SELECT DISTINCT b.id,b.name,b.branch_id,b.board_id,b.standard_id,c.name,c.id,ct.id,b.course_type_mapping_id FROM batch b,`course_type_mapping` ct,course c WHERE ct.course_id=c.id AND b.`course_type_mapping_id`=ct.id  AND c.id='$cid_test' AND b.active=1 ORDER BY b.id desc limit 1 ";
				$resulttest1=mysql_query($sqltest1);
						while($rowtest1=mysql_fetch_array($resulttest1))
						{
							$batch_id=$rowtest1[0];
							$branch_id=$rowtest1[2];
							$board_id=$rowtest1[3];
							$std_id=$rowtest1[4];
							$coursetype_id=$rowtest1[6];
							$edutech_student_id="";
							$resultf=mysql_query("SELECT distinct edutech_student_id FROM `student_details` WHERE user_id='$stu_id'");
							while($rowtestf=mysql_fetch_array($resultf))
							{
							$edutech_student_id=$rowtestf[0];
							}
							if($edutech_student_id=="")
							{
							$result_enroll=mysql_query("SELECT MAX(student_id+1),MAX(enroll_id+1) FROM `edutechstudentid_refid` ");
							$row1_13=mysql_fetch_array($result_enroll);
							$edutech_student_id=$row1_13[0];
							$enroll_id=$row1_13[1];
							$sql12 = "insert into edutechstudentid_refid(`student_id`,`enroll_id`,`used`)
							values('$edutech_student_id','$enroll_id','1')";
							$result3_enroll = mysql_query($sql12);
							if ($result3_enroll)
							{
								//echo "";
							}
							else
							{
								//echo "failed3";
							}
							}
							$resultf1=mysql_query("SELECT name,contact_no FROM `user` WHERE id='$stu_id'");
							while($rowtestf1=mysql_fetch_array($resultf1))
							{
							$std_name=$rowtestf1[0];
							$mobile_id=$rowtestf1[1];
							}
							$sqlt = "insert into student_details(`user_id`,`edutech_student_id`,`group_id`,`standard_id`,`board_id`,`batch_id`,`branch_id`,`sname`,`sfullname`,`father_name`,`mother_name`,`school_name`,`area`,`res_phone_no`,`mobile_no`,`f_mob_no`,`m_mob_no`,`s_mob_no`,`pe_mailid`,`online_batch`,`photo`)values('$stu_id','$edutech_student_id','11','$std_id','$board_id','$batch_id','$branch_id','$std_name','$std_name','','','','','$st_resphone','$mobile_id','$st_pamobile','','$mobile_id','$st_paemail','','')";
							$resultt = mysql_query($sqlt);
							//echo $sqlt;
							if ($resultt)
							{
							//for moc test temp
							//for test announce
												
														$result34=mysql_query("SELECT DISTINCT `sub_id`,`test_date`,`test_time`,`test_type_id`,`exam_type`,`que_paper_id`,`marks`,`chap_id`,`description`,`faculty_id`,`paper_setter`,`evaluator`,`exam_board_id`,`board_id`,`duration`,`from_date`,`to_date`,`given_test`,`OnlineTest`,`ServerAnnounce` FROM test_announce WHERE batch_id='$batch_id' and blueprint_id='0' ");
														while($row3 = mysql_fetch_array($result34))
														{
														$result6=mysql_query("SELECT user_id from test_announce WHERE batch_id='$batch_id' and user_id='$stu_id' and que_paper_id='$row3[5]' and test_date='$row3[1]'");
														$rowcount6=mysql_num_rows($result6);
															if($rowcount6==0)
															{
															$sql__tt = "INSERT INTO test_announce(`user_id`,`batch_id`,`sub_id`,`test_date`,`test_time`,`test_type_id`,	`exam_type`,`que_paper_id`,`marks`,`chap_id`,`description`,`faculty_id`,`paper_setter`,`evaluator`,`exam_board_id`,`board_id`,`duration`,`from_date`,`to_date`,`given_test`,`OnlineTest`,`ServerAnnounce`)values('$stu_id','$batch_id','$row3[0]','$row3[1]','$row3[2]','$row3[3]','$row3[4]','$row3[5]','$row3[6]','$row3[7]','$row3[8]','$row3[9]','$row3[10]','$row3[11]','$row3[12]','$row3[13]','$row3[14]','$row3[15]','$row3[16]','0','$row3[18]','$row3[19]')";
															$result5 = mysql_query($sql__tt);
															
															if ($result5)
															{
																//echo "";
															}
															else
															{
																//echo "failed";
															}
															}
														
														}
							//end temp
							}
							else
							{
							echo "failed";
							}										
						}
		}
		else
		{
		echo "failed";
		}
		}
		
	}
	
?>