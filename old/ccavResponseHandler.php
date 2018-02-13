<?php include('Crypto.php')?>
<?php include('config.php')?>


<?php

	error_reporting(0);
	
	$workingKey='9037BEC6917A1827C01B28FEE183164F';		//Working Key should be provided here.
	$encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server
	$rcvdString=decrypt($encResponse,$workingKey);		//Crypto Decryption used as per the specified working key.
	$order_status="";
	$order_id="";
	$decryptValues=explode('&', $rcvdString);
	$dataSize=sizeof($decryptValues);
	echo "<center>";

	for($i = 0; $i < $dataSize; $i++) 
	{
		$information=explode('=',$decryptValues[$i]);
		if($i==3)	$order_status=$information[1];
		
	}
	//$order_status="Success";
	for($i = 0; $i < $dataSize; $i++) 
	{
		$information=explode('=',$decryptValues[$i]);
		if($i==0)	$order_id=$information[1];
	}
//$order_id="28";
	if($order_status==="Success")
	{
		//echo "<br>Thank you for shopping with us. Your credit card has been charged and your transaction is successful. We //will be shipping your order to you soon.";
		echo "<br>Your transaction is successful.";
		//echo $order_id;
		if($order_id=="")
		{
		}
		else
		{
			$course_id="";
			$user_id="";
			$referral_code="";
			$sql="SELECT course_id,user_id,referral_code FROM user_online_order_info  WHERE order_id='$order_id' ";
			$result=mysql_query($sql);
			
			while($row=mysql_fetch_array($result))
			{
				$course_id=$row[0];
				$user_id=$row[1];
				$referral_code=$row[2];
			}

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
							//for insert in refercode table
							if($referral_code=="")
							{
							}
							else
							{
								$sql_ref1="SELECT `Refree_incentive`,`end_user_discount` FROM `course` WHERE id='$item'";
								$result_ref1=mysql_query($sql_ref1);
								
								while($row_ref1=mysql_fetch_array($result_ref1))
								{
								$sql_ref2 = "insert into referral_code_detail(`course_id`,`Referral_code`,`End_user_id`,`Referee_incentive`,`End_user_discount`)values('$item','$referral_code','$user_id','$row_ref1[0]','$row_ref1[1]')";
													$result_ref2 = mysql_query($sql_ref2);
													if ($result_ref2)
													{
														//echo "";
													}
													else
													{
														//echo "failed3";
													}
								}
							}
							//end insert
					
						$batch_id="";
						$branch_id="";
						$board_id="";
						$std_id="";
						$email_id="";
						$course_name="";
						$website_src="";
						$website_src1="";
						$sql1="SELECT b.id,b.name,b.branch_id,b.board_id,b.standard_id,c.name FROM batch b,`course_type_mapping` ct,course c WHERE ct.course_id=c.id AND b.`course_type_mapping_id`=ct.id  and c.id='$item' order by b.id ";
						$result111=mysql_query($sql1);
						
						while($row1=mysql_fetch_array($result111))
						{
							$batch_id=$row1[0];
							$branch_id=$row1[2];
							$board_id=$row1[3];
							$std_id=$row1[4];
							$course_name=$row1[5];
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
										$result_user4=mysql_query("SELECT id,name,contact_no,email,website_source FROM `user` WHERE id='$user_id'  ");
										$rowcount4=mysql_num_rows($result_user4);
										while($row4 = mysql_fetch_array($result_user4))
											{
											$st_name=$row4[1];
											$st_mobile=$row4[2];
											$email_id=$row4[3];
											$website_src=$row4[4];
												$website_src1=$row4[4];
											}
											//echo $email_id;
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
												//for email
													if ($email_id=="")
													{	
													
																		
													}
													else
													{
													$subject = "Course activation ";
															//$body = "
														//Congratulations!Youe account is active now.Happy learning.<br/><br/><br/>Team //Studyvita.";
														if($website_src == "www.myownstudyportal.com" || $website_src =="myownstudyportal.com")
														{
														$website_src="Myownstudyportal";
														}
														elseif($website_src == "www.thecoreacademics.com" || $website_src == "thecoreacademics.com" || $website_src == "www.coreacademics.in" || $website_src == "coreacademics.in")
														{
															$website_src="Coreacademics";
														}
														elseif($website_src == "www.globaleduserver.com" || $website_src == "globaleduserver.com")
														{
														$website_src="Globaleduserver";
														}
														elseif($website_src == "www.tutorscope.com" || $website_src == "tutorscope.com" )
														{
														$website_src="Tutorscope";
														}
														elseif($website_src == "www.myownprivatetutor.in" || $website_src == "myownprivatetutor.in")
														{
														$website_src="Myownstudyportal";
														}
														elseif($website_src == "www.studyvita.com" || $website_src == "studyvita.com" || $website_src == "www.studyvita.co.in" || $website_src == "studyvita.co.in")
														{
														$website_src="Studyvita";
														}
														else
														{
														$website_src="Globaleduserver";
														}
$body = "
Hey there!<br/<br/>
We're glad to tell you, that your payment for ".$course_name." course has been received.<br/><br/>
The course has been activated in your account.. You can head over to ".$website_src.", login and start learning!<br/><br/>
Happy Learning<br/>
$website_src<br/><br/>
--<br/><br/>
This is an auto-response mail generated in response to your payment and activation. Please ignore if it wasn't you who paid for the course.";

																	
																		
																	//echo $body;
															$headers = 'From: '.$email_id.'' . "\r\n" .
																'Reply-To: '.$email_id.'' . "\r\n" .
																'Content-type: text/html; charset=utf-8' . "\r\n" .
																'X-Mailer: PHP/' . phpversion();
															
															
															include("class.phpmailer.php");
															$mail = new PHPMailer();

															$mail->IsSMTP(); // set mailer to use SMTP

															$mail->Host = "smtp.gmail.com"; // specify main and backup server

															$mail->SMTPAuth = true; // turn on SMTP authentication
															
															$mail->SMTPSecure  = "tls"; // turn on SMTP authentication
															
															$mail->Port   = 587; // turn on SMTP authentication

															$mail->From = "edutechenquiry@gmail.com"; //do NOT fake header.

															$mail->FromName = "edutechenquiry@gmail.com";

															$mail->AddAddress($email_id); // Email on which you want to send mail

															$mail->IsHTML(true);

															$mail->Subject = "Course activation";

															$mail->Body = $body;

															if(!$mail->Send())
															{
																echo "failed";
															}
															else
															{
															$lb1=1;
														/*echo "<a href='http://www.globaleduserver.com/edu/edutech_viewer/student_course_page2.php?id=$user_id&name=$st_name&domainname=$website_src1&ct=1'>Click to continue</a>";*/
															
															}
																				
													}
												//end email
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
				header("Location: http://www.globaleduserver.com/edu/edutech_viewer/student_course_page2.php?id=".$user_id."&name=".$st_name."&domainname=".$website_src1."&ct=".$lb1);
			}
		}
		
	}
	else if($order_status==="Aborted")
	{
		echo "<br>Thank you for shopping with us.We will keep you posted regarding the status of your order through e-mail";
	
	}
	else if($order_status==="Failure")
	{
		echo "<br>Thank you for shopping with us.However,the transaction has been declined.";
	}
	else
	{
		echo "<br>Security Error. Illegal access detected";
	
	}

	echo "<br><br>";

	echo "<table cellspacing=4 cellpadding=4>";
	for($i = 0; $i < $dataSize; $i++) 
	{
		$information=explode('=',$decryptValues[$i]);
	    	echo '<tr><td>'.$information[0].'</td><td>'.$information[1].'</td></tr>';
	}

	echo "</table><br>";
	echo "</center>";
?>
