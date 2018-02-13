<?php 
	include_once '../config.php';
	$course_id=$_GET['course_id'];
	$totalitem=$_GET['totalitem'];
	$user_id=$_GET['uid'];
	$totalamt=$_GET['totalamt'];
	$referral_code=$_GET['referral_code'];
	$order_id=0;
	if($course_id=="")
	{
	}
	else
	{
		$lst = explode(",", $course_id);
		foreach($lst as $item) 
		{
			if($item=="")
			{
			}
			else
			{
				$batch_id="";
				$branch_id="";
				$board_id="";
				$std_id="";
				$email_id="";
				$course_name="";
				$sql1="SELECT b.id,b.name,b.branch_id,b.board_id,b.standard_id,c.name FROM batch b,`course_type_mapping` ct,course c WHERE ct.course_id=c.id AND b.`course_type_mapping_id`=ct.id  and c.id='$item' order by b.id ";
				$result111=mysql_query($sql1);
				
				while($row1=mysql_fetch_array($result111))
				{
					$batch_id=$row1[0];
					$branch_id=$row1[2];
					$board_id=$row1[3];
					$std_id=$row1[4];
					$course_name=$row1[5];
					//$course_name=$course_name;
				}
				if($batch_id=="")
				{
					
				}
				else
				{
					$result_user=mysql_query("SELECT id FROM student_details WHERE user_id='$user_id' and batch_id='$batch_id' ");
					$rowcount=mysql_num_rows($result_user);
					if($rowcount>0)
					{
				
					}
					else
					{
						$result_user1=mysql_query("SELECT id,edutech_student_id FROM student_details WHERE user_id='$user_id'  ");
						$rowcount1=mysql_num_rows($result_user1);
						if($rowcount1==0)
						{
							$result1_3=mysql_query("SELECT MAX(student_id+1),MAX(enroll_id+1) FROM `edutechstudentid_refid` ");
							$row1_13=mysql_fetch_array($result1_3);
							$edutech_student_id=$row1_13[0];
							$enroll_id=$row1_13[1];
							$sql12 = "insert into edutechstudentid_refid(`student_id`,`enroll_id`,`used`)
							values('$edutech_student_id','$enroll_id','1')";
							$result3 = mysql_query($sql12);
							if ($result3)
							{
								echo "";
							}
							else
							{
								echo "failed3";
							}
						}
						else
						{
							while($row5 = mysql_fetch_array($result_user1))
							{
							$edutech_student_id=$row5[1];
							}
						}
						$result_user4=mysql_query("SELECT id,name,contact_no,email FROM `user` WHERE id='$user_id'  ");
						$rowcount4=mysql_num_rows($result_user4);
						while($row4 = mysql_fetch_array($result_user4))
						{
						$st_name=$row4[1];
						$st_mobile=$row4[2];
						$email_id=$row4[3];
						}
						$sqlt = "insert into student_details(`user_id`,`edutech_student_id`,`group_id`,`standard_id`,`board_id`,`batch_id`,`branch_id`,`sname`,`sfullname`,`father_name`,`mother_name`,`school_name`,`area`,`res_phone_no`,`mobile_no`,`f_mob_no`,`m_mob_no`,`s_mob_no`,`pe_mailid`,`online_batch`,`photo`)values('$user_id','$edutech_student_id','11','$std_id','$board_id','$batch_id','$branch_id','$st_name','$st_name','','','','','$st_resphone','$st_mobile','$st_pamobile','','$st_mobile','$st_paemail','','')";
									
						$resultt = mysql_query($sqlt);
						if ($resultt)
						{
							$sql13 = "insert into student_registered_course(`course_id`,`user_id`,`batch_id`,`status`)
							values('$item','$user_id','$batch_id','1')";
							$result1 = mysql_query($sql13);
							if ($result1)
							{
							echo "";
							//for test announce
												
														$result34=mysql_query("SELECT DISTINCT `sub_id`,`test_date`,`test_time`,`test_type_id`,`exam_type`,`que_paper_id`,`marks`,`chap_id`,`description`,`faculty_id`,`paper_setter`,`evaluator`,`exam_board_id`,`board_id`,`duration`,`from_date`,`to_date`,`given_test`,`OnlineTest`,`ServerAnnounce` FROM test_announce WHERE batch_id='$batch_id'");
														while($row3 = mysql_fetch_array($result34))
														{
														$result6=mysql_query("SELECT user_id from test_announce WHERE batch_id='$batch_id' and user_id='$user_id' and que_paper_id='$row3[5]' and test_date='$row3[1]'");
														$rowcount6=mysql_num_rows($result6);
															if($rowcount6==0)
															{
															$sql__tt = "INSERT INTO test_announce(`user_id`,`batch_id`,`sub_id`,`test_date`,`test_time`,`test_type_id`,	`exam_type`,`que_paper_id`,`marks`,`chap_id`,`description`,`faculty_id`,`paper_setter`,`evaluator`,`exam_board_id`,`board_id`,`duration`,`from_date`,`to_date`,`given_test`,`OnlineTest`,`ServerAnnounce`)values('$user_id','$batch_id','$row3[0]','$row3[1]','$row3[2]','$row3[3]','$row3[4]','$row3[5]','$row3[6]','$row3[7]','$row3[8]','$row3[9]','$row3[10]','$row3[11]','$row3[12]','$row3[13]','$row3[14]','$row3[15]','$row3[16]','0','$row3[18]','$row3[19]')";
															$result5 = mysql_query($sql__tt);
															
															if ($result5)
															{
																echo "";
															}
															else
															{
																//echo "Test announce insert failed";
															}
															}
														
														}
												//end test announce
							}
							else
							{
							echo "failed5";
							}
						}
						else
						{
						echo "failed6";
						}
						
					}
				}
				
			}
		}
	}
	

?>