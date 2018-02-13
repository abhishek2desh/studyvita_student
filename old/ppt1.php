<?php
	include 'config.php';
	
	$sid=$_GET['sid'];
	$test_id=$_GET['test_id'];
	
	$result=mysql_query("SELECT  ob.`ExamDate`,ob.`StudentId`,ob.`QuePaperId`,ob.`range2`,ob.`TotalMarks`,ob.`ObtainedMarks`,ob.`unans`,ob.`incorrect`,	ob.`unans_str`,ob.`incorr_str`,ob.`ignore_str`,ob.`attempted_ans`,ob.`uniqid_str`,ob.`correct_str`,ob.`subject`,sd.sname,u.enroll_id,b.name,ob.batch,u.username,u.password,u.id,sd.group_id,b.id,uniqid_str FROM `objective_evolution` ob,student_details sd,USER u,branch b WHERE ob.StudentId=sd.edutech_student_id AND sd.branch_id=b.id AND sd.user_id=u.id AND ob.StudentId='$sid' AND ob.QuePaperId='$test_id'");
	//AND ob.`UseFor_UnitAvg`=TRUE
	$row=mysql_fetch_array($result);
	$total_no_que=0;
	$exam_date=$row[0];
	$StudentId=$row[1];
	$QuePaperId=$row[2];
	$range=$row[3];
	$total_marks=$row[4];
	$ObtainedMarks=$row[5];
	$unans=$row[6];
	$incorrect=$row[7];
	$unans_str=$row[8];
	$incorr_str=$row[9];
	$ignore_str=$row[10];
	$attempted_ans=$row[11];
	$uniqid_str=$row[12];
	$correct_str=$row[13];
	$subject=$row[14];
	$sname=$row[15];
	$enroll_id=$row[16];
	$branch_name=$row[17];
	$batch=$row[18];
	$username=$row[19];
	$password=$row[20];
	$user_id=$row[21];
	$group_id=$row[22];
	$branch_id=$row[23];
	$uniq_id_str=$row[24];
	$lst3_uk = explode(",", $uniq_id_str);
	$subj_dis="";
	$sb1_dis="";
	$result_2=mysql_query("SELECT DISTINCT SubID FROM `omrcorrect` WHERE TestID='$QuePaperId'");
	$rw_nw=mysql_num_rows($result_2);
	if($rw_nw == 1)
	{
		$row2=mysql_fetch_array($result_2);
			if($row2[0]=='1'){ $sub_id_d="Physics";}
			else if($row2[0]=='2'){ $sub_id_d="Chemistry";}
			else if($row2[0]=='3'){ $sub_id_d="Maths";}
			else if($row2[0]=='4'){ $sub_id_d="Botany";}
			else if($row2[0]=='5'){ $sub_id_d="Zoology";}
			else if($row2[0]=='6'){ $sub_id_d="Biology";}
			else if($row2[0]=='7'){ $sub_id_d="Science";}
			else
			{
				$result_4=mysql_query("SELECT name  FROM `subject` WHERE id='$row2[0]'");
				while($row4=mysql_fetch_array($result_4))
				{
				$sub_id_d=$row4[0];
				}
			}
			$sb1_dis=$sub_id_d;
	}
	else if($rw_nw == 0)
	{
		if($subject=='PHY'){ $sub_id_d="Physics";}
			else if($subject=='CHE'){ $sub_id_d="Chemistry";}
			else if($subject=='MAT'){ $sub_id_d="Maths";}
			else if($subject=='BIO'){ $sub_id_d="Biology";}
			else if($subject=='SCI'){ $sub_id_d="Science";}
			else
			{
			$sub_id_d=$subject;
			}
			$sb1_dis=$sub_id_d;
	}
	else
	{
		while($row2=mysql_fetch_array($result_2))
		{
			if($row2[0]=='1'){ $sub_id_d="Physics";}
			else if($row2[0]=='2'){ $sub_id_d="Chemistry";}
			else if($row2[0]=='3'){ $sub_id_d="Maths";}
			else if($row2[0]=='4'){ $sub_id_d="Botany";}
			else if($row2[0]=='5'){ $sub_id_d="Zoology";}
			else if($row2[0]=='6'){ $sub_id_d="Biology";}
			else if($row2[0]=='7'){ $sub_id_d="Science";}
			else
			{
				$result_5=mysql_query("SELECT name  FROM `subject` WHERE id='$row2[0]'");
				while($row5=mysql_fetch_array($result_5))
				{
				$sub_id_d=$row5[0];
				}
			}
			$subj_dis=$subj_dis.$sub_id_d.",";
		}
		$sb1_dis="MOCK[".$subj_dis."]Test";
		$sb1_dis2="MOCK";
	}
	if($subject == 'BIO'){ $sub="BIOLOGY"; $sb="14";}
	else if($subject == 'MAT'){ $sub="MATHS"; $sb="15";}
	else if($subject == 'PHY'){ $sub="PHYSICS"; $sb="16";}
	else if($subject == 'CHE'){ $sub="CHEMISTRY"; $sb="17";}
	else if($subject == 'SCI'){ $sub="SCIENCE"; $sb="18";}
	else
	{
		$result_6=mysql_query("SELECT name,id  FROM `subject` WHERE (name='$subject' or sort_name='$subject')");
				while($row6=mysql_fetch_array($result_6))
				{
				$sub=$row6[0];
				$sb=$row6[1];
				}
	}
	$correct_ans="";
	if($uniq_id_str == "")
	{
		$result2=mysql_query("SELECT Qno,CorrectAns FROM `omrcorrect` WHERE TestID='$QuePaperId'");
		$rw2_nw=mysql_num_rows($result2);
		while($row2=mysql_fetch_array($result2))
		{
			
			$correct_ans=$correct_ans.$row2[0]."-".$row2[1].",";
		}
	}
	else
	{
		$kl=1;
		foreach($lst3_uk  as $item) 
		{
			if($item == "")
			{
			}
			else
			{
				$result2=mysql_query("SELECT CorrectAns FROM `onlinequestionbank` WHERE UniqId='$item'");
				$rw2_nw=mysql_num_rows($result2);
				$row2=mysql_fetch_array($result2);
				$correct_ans=$correct_ans.$kl."-".$row2[0]." ";
				$kl++;
			}
		}
	}
	$per_80_above="";$per_60_above="";$per_40_above="";
?>
<html>
	<body>
		<div id="main_div" style="border:solid 1px;width:100%;">	
			<div style="border:solid 1px;width:100%;height:auto;">
				<!--<table style="border:solid 1px;width:100%;height:auto;">
					<tr>
						<?php
							if($branch_id == 1)
							{
								?>
							<td style="padding-left:30px;border:solid 0px;width:30%;height:auto;">
								<img src='images/edutech_logo.JPG' width='30%;'/>
							</td>
							<td style="border:solid 0px;width:10%;height:auto;">
							</td>
							<td style="border:solid 0px;width:60%;height:auto;">
								<div style='font-family:  Arial;font-size:40px;' >EDUTECH INDIA</div>
								<div style='font-family:  Arial;font-size:20px;' >Where Education Reflects Technology</div>
								<div style='font-family:  Arial;font-size:13px;' >An ISO 9001-2008 Certified Institute</div>
								<div style='font-family:  Arial;font-size:13px;' >www.edutechindiaonline.com</div>
								<div style='font-family:  Arial;font-size:13px;' >PH:0790038921 Email:edutechindia@gmail.com</div>
							</td>
							<?php
							}
							else if($branch_id == 11)
							{
								?>
								<td style="border:solid 1px;width:100%;height:auto;">
									<center><img src='images/best_em.png' width='70%;'></center>
								</td>
							<?php	
							}
							else if($branch_id == 12)
							{
								?>
								<td style="border:solid 0px;width:20%;height:auto;">
									<img src='images/baps.png' width='40%;'/>
								</td>
								<td style="border:solid 0px;width:80%;height:auto;">
									<?php
										echo "<div style='font-family:  Arial;font-size:20px;' >BAPS SWAMINARAYAN VIDHYAMANDIR - RAISAN</div>";
									?>
								</td>
							<?php	
							}
							else
							{
								?>
								<td style="padding-left:30px;border:solid 0px;width:30%;height:auto;">
									<img src='images/edutech_logo.JPG' width='30%;'/>
								</td>
								<td style="border:solid 1px;width:10%;height:auto;">
								</td>
								<td style="border:solid 0px;width:60%;height:auto;">
									<div style='font-family:  Arial;font-size:40px;' >EDUTECH INDIA</div>
									<div style='font-family:  Arial;font-size:20px;' >Where Education Reflects Technology</div>
									<div style='font-family:  Arial;font-size:13px;' >An ISO 9001-2008 Certified Institute</div>
									<div style='font-family:  Arial;font-size:13px;' >www.edutechindiaonline.com</div>
									<div style='font-family:  Arial;font-size:13px;' >PH:0790038921 Email:edutechindia@gmail.com</div>
								</td>
								<?php
							}
						?>
					</tr>
				</table>-->
				<table style="border:solid 0px;width:100%;height:auto;">
					<tr>
						<td style="border:solid 0px;width:30%;height:auto;">
							<center><div style='font-family:  Arial;font-size:20px;' >Diagnostic Test Report</div></center>
							<center><div style='font-family:  Arial;font-size:20px;' ><?php echo $sb1_dis; ?></div></center>
						</td>
					</tr>
				</table>
				<table style="border:solid 0px;width:100%;height:auto;">
					<tr>
						<td style='padding-left:30px;'>
							Branch : <?php echo $branch_name; ?>
						</td>
						<td style='padding-left:30px;'>
						</td>
					</tr>
					<tr>
						<td style='padding-left:30px;'>
							Batch : <?php echo $batch; ?>
						</td>
						<td style='padding-left:30px;'>
						</td>
					</tr>
					<tr>
						<td style='padding-left:30px;'>
							Student's Name : <?php echo $sname; ?>
						</td>
						<td style='padding-left:30px;'>
							Student's ID : <?php echo $StudentId; ?>
						</td>
					</tr>
					<tr>
						<td style='padding-left:30px;'>
							Date of Exam : <?php echo $exam_date; ?>
						</td>
						<td style='padding-left:30px;'>
							Question Code : <?php echo $QuePaperId; ?>
						</td>
					</tr>
				</table>
				<br/>
				<table style="border:solid 1px;width:100%;height:auto;">
					<tr>
						<th style="border:solid 1px;"><?php echo $sb1_dis2; ?> Correct</th>
						<th style="border:solid 1px;"><?php echo $sb1_dis2; ?> InCorrect</th>
						<th style="border:solid 1px;"><?php echo $sb1_dis2; ?> Unanswered</th>
						<th style="border:solid 1px;">Total No of Question</th>
					</tr>
					<tr>
						<?php
							if($ignore_str == "")
							{
								$total_no_que=$range;
							}
							else
							{
								$lst3 = explode(",", $ignore_str);
								$ing_str=sizeof($lst3);
								$ing_str=$ing_str-1;
								$total_no_que=$range-$ing_str;
							}
							$lst = explode(",", $correct_str);
							$crt_str=sizeof($lst);
							$crt_str=$crt_str-1;
						?>
						<td style="border:solid 1px;"><center><?php echo $crt_str; ?></center></td>
						<td style="border:solid 1px;"><center><?php echo $incorrect; ?></center></td>
						<td style="border:solid 1px;"><center><?php echo $unans; ?></center></td>
						<td style="border:solid 1px;"><center><?php echo $total_no_que; ?></center></td>
					</tr>
				</table>
				<br/>
				<?php
					if($ignore_str == "")
					{
						$total_no_que=$range;
					}
					else
					{ ?>
						<table style="border:solid 0px;width:100%;height:auto;">
							<tr>
								<td style="border:solid 0px;width:30%;height:auto;">
									<div style='font-family:  Arial;font-size:20px;' >NOTE : Following Questions are ingnored in evalution - <?php echo $ignore_str; ?></div>
								</td>
							</tr>
						</table><br/>
					<?php
					}
				?>
				
				<table style="border:solid 0px;width:100%;height:auto;">
					<tr>
						<td style="border:solid 0px;width:30%;height:auto;">
							<center><div style='font-family:  Arial;font-size:20px;' >Score According to Various Evaluation Schemes</div></center>
						</td>
					</tr>
				</table>
				<table style="border:solid 1px;width:100%;height:auto;">
					<tr>
						<th style="border:solid 1px;width:33%;">EXAM</th>
						<th style="border:solid 1px;width:33%;">Obtained Score</th>
						<th style="border:solid 1px;width:33%;">Marking Scheme</th>
					</tr>
					<?php
						$result_23=mysql_query("SELECT course,correctmarks,incorrectmarks FROM course_markingscheme WHERE course='JEE'");
						$rw_nw23=mysql_fetch_array($result_23);
						$jee_correct=$rw_nw23[1];
						$jee_incorrect=$rw_nw23[2];
						
						$result_24=mysql_query("SELECT course,correctmarks,incorrectmarks FROM course_markingscheme WHERE course='GUJCET'");
						$rw_nw24=mysql_fetch_array($result_24);
						$gujcet_correct=$rw_nw24[1];
						$gujcet_incorrect=$rw_nw24[2];
						$tt=$total_no_que*$jee_correct;
						$tt1=$total_no_que*$gujcet_correct;
						$lst = explode(",", $correct_str);
						$incorrect_str=$jee_incorrect * $incorrect;
						$crt_str=sizeof($lst);
						$crt_str=$crt_str-1;
						$correct_str=$jee_correct * $crt_str;
						$final_cr=$correct_str - $incorrect_str;
						$correct_str_guj=$gujcet_correct * $crt_str;
						$incorrect_str_guj=$gujcet_incorrect * $incorrect;
						$final_cr_guj=$correct_str_guj - $incorrect_str_guj;
						if($group_id == 9)
						{
							echo "<tr><td style='border:solid 1px;'><center>JEE</center></td>
								<td style='border:solid 1px;'><center>$final_cr/$tt</center></td>
								<td style='border:solid 1px;'><center>Correct : $jee_correct, Incorrect : $jee_incorrect, Unanswer:0</center></td></tr>";
						}
						else if($group_id == 10)
						{
							echo "<tr><td style='border:solid 1px;'><center>GUJCET</center></td>
								<td style='border:solid 1px;'><center>$final_cr_guj/$tt1</center></td>
								<td style='border:solid 1px;'><center>Correct : $gujcet_correct, Incorrect : $gujcet_incorrect, Unanswer:0</center></td></tr>";
						}
						else
						{
							echo "<tr><td style='border:solid 1px;'><center>JEE</center></td>
							<td style='border:solid 1px;'><center>$final_cr/$tt</center></td>
							<td style='border:solid 1px;'><center>Correct : $jee_correct, Incorrect : $jee_incorrect, Unanswer:0</center></td></tr>";
							//echo "<tr><td style='border:solid 1px;'><center>GUJCET</center></td>
							//<td style='border:solid 1px;'><center>$final_cr_guj/$tt1</center></td>
							//<td style='border:solid 1px;'><center>Correct : $gujcet_correct, Incorrect : $gujcet_incorrect, Unanswer:0</center></td></tr>";
						}
					?>
				</table>
				<br/>
				<br/>
				<?php
					if($ignore_str == "")
					{
						
					}
					else
					{
						$lst_ing = explode(",", $ignore_str);
					}
					$lst5 = explode(",", $attempted_ans);
					$result_2=mysql_query("SELECT DISTINCT SubID FROM `omrcorrect` WHERE TestID='$QuePaperId'");
					$rw_nw=mysql_num_rows($result_2);
					if($rw_nw == 1)
					{
					}
					else
					{
						while($row2=mysql_fetch_array($result_2))
						{
							$total_cr=0;
							$total_inc=0;
							$total_uns=0;
							$total_que=0;
							if($row2[0]=='1'){ $sub_id_d="Physics";}
							else if($row2[0]=='2'){ $sub_id_d="Chemistry";}
							else if($row2[0]=='3'){ $sub_id_d="Maths";}
							else if($row2[0]=='4'){ $sub_id_d="Botany";}
							else if($row2[0]=='5'){ $sub_id_d="Zoology";}
							else if($row2[0]=='6'){ $sub_id_d="Biology";}
							else if($row2[0]=='7'){ $sub_id_d="Science";}
							else
							{
								$result_7=mysql_query("SELECT name  FROM `subject` WHERE id='$row2[0]'");
								while($row7=mysql_fetch_array($result_7))
								{
								$sub_id_d=$row7[0];
								}
							}
							
							$result_2_at=mysql_query("SELECT SubID,Qno,LOWER(CorrectAns) FROM `omrcorrect` WHERE TestID='$QuePaperId' AND SubID='$row2[0]' ORDER BY Qno");
							while($rw_nw_at=mysql_fetch_array($result_2_at))
							{
								if($ignore_str == "")
								{
								
								}
								else
								{
									foreach($lst_ing  as $item) 
									{	
										$qno_st=$rw_nw_at[1];
										if($qno_st == $item)
										{
											goto ab;
										}
									}
								}
								$corr_ans_string=$rw_nw_at[2];
								//echo "<br/>".$lst5[$rw_nw_at[1]]."-".$corr_ans_string;
								$total_que++;
								$lst5[$rw_nw_at[1]] = strtolower($lst5[$rw_nw_at[1]]);
								if($corr_ans_string == $lst5[$rw_nw_at[1]])
								{
									$total_cr++;
								}
								else if($lst5[$rw_nw_at[1]] == 'x')
								{
									$total_uns++;
								}
								else
								{
									$total_inc++;
								}
								ab:
							}
							echo "<table style='border:solid 1px;width:100%;height:auto;'>";
								echo "<tr><td style='border:solid 1px;width:25%;'>$sub_id_d(Correct)</td><td style='border:solid 1px;width:25%;'>$sub_id_d(InCorrect)</td><td style='border:solid 1px;width:25%;'>$sub_id_d(Unanswered)</td><td style='border:solid 1px;width:25%;'>Total No. of Question</td></tr>";
								echo "<br/><tr>";
									echo "<td>$total_cr</td><td>$total_inc</td><td>$total_uns</td><td>$total_que</td>";
								echo "</tr>";
							echo "</table>";
						}
					}
				?>
				<br/>
				<table style="border:solid 0px;width:100%;height:auto;">
					<tr>
						<td>Remarks<td>
					</tr>
					<tr>
						<td>Dear <?php echo $sname; ?><td>
					</tr>
					<tr>
						<td>You need to improve in the following concepts to get a better score in the EXAM.
							You are advised to revise the below mentioned topics. Further you are advised to workout the Grey area assignment and submit it online. Grey Area assignments will be generated in your Viewer Account. .</td>
					</tr>
				</table>
				<br/>
				<?php
					$result_2=mysql_query("SELECT DISTINCT SubID FROM `omrcorrect` WHERE TestID='$QuePaperId'");
					$rw_nw=mysql_num_rows($result_2);
					if($rw_nw == 1)
					{
					?>
						<table style="border:solid 1px;width:100%;height:auto;">
							<tr>
								<td style="border:solid 0px;width:50%"><b><?php echo $sub; ?></b><td>
								<td style="border:solid 0px;width:50%"><td>
							</tr>
							<tr>
								<td style="border:solid 1px;width:50%">Unattempted Concepts<td>
								<td style="border:solid 1px;width:50%">Incorrect Concepts<td>
							</tr>
							<tr>
								<td valign='top' style="border:solid 1px;width:50%">
									<?php 
											//echo $unans_str;
											$str1_temp1=",";
											$concept_temp1="";
											$lst = explode(",", $unans_str);
											//if($lst3_uk)
											if($uniq_id_str == "")
											{
												
												foreach($lst as $item) 
												{
													$result_concept=mysql_query("SELECT c.id,c.name FROM `omrcorrect` om,concept c WHERE om.TestID='$QuePaperId' AND om.Qno='$item' AND om.ConceptId=c.id");
													$res_concept=mysql_num_rows($result_concept);
													$row_concept=mysql_fetch_array($result_concept);
													$concept_temp1=",".$row_concept[1].",";
													if (strpos($str1_temp1,$concept_temp1) !== false)
													{
												
													}
													else
													{
													$str1_temp1=$str1_temp1.$row_concept[1].",";
														//$str2=$str2.$con_name.",";
														$concept2=$concept2.$row_concept[1].",";
													}
													
												}
											}
											else
											{
												foreach($lst as $item) 
												{
													$stud_uk_id=$lst3_uk[$item-1];
													$result_concept=mysql_query("SELECT c.id,c.name FROM `onlinequestionbank` om,concept c WHERE om.UniqId='$stud_uk_id' AND om.ConceptId=c.id");
													$res_concept=mysql_num_rows($result_concept);
													$row_concept=mysql_fetch_array($result_concept);
													$concept_temp1=",".$row_concept[1].",";
													if (strpos($str1_temp1,$concept_temp1) !== false)
													{
												
													}
													else
													{
													$str1_temp1=$str1_temp1.$row_concept[1].",";
														//$str2=$str2.$con_name.",";
														$concept2=$concept2.$row_concept[1].",";
													}
													//$concept2=$concept2.$row_concept[1].",";
												}
												//echo $concept2;
											}
											echo $concept2;
										
									?>
								<td>
								<td valign='top' style="border:solid 1px;width:50%">
									<?php
										$lst = explode(",", $incorr_str);
										$str1_temp2=",";
											$concept_temp2="";
										if($uniq_id_str == "")
										{
											foreach($lst as $item) 
											{
												$result_concept=mysql_query("SELECT c.id,c.name FROM `omrcorrect` om,concept c WHERE om.TestID='$QuePaperId' AND om.Qno='$item' AND om.ConceptId=c.id");
												$res_concept=mysql_num_rows($result_concept);
												$row_concept=mysql_fetch_array($result_concept);
												$concept_temp2=",".$row_concept[1].",";
													if (strpos($str1_temp2,$concept_temp2) !== false)
													{
												
													}
													else
													{
													$str1_temp2=$str1_temp2.$row_concept[1].",";
															$concept=$concept.$row_concept[1].",";
													}
												//$concept=$concept.$row_concept[1].",";
											}
										}
										else
										{
											foreach($lst as $item) 
											{
												$stud_uk_id=$lst3_uk[$item-1];
												
												$result_concept=mysql_query("SELECT c.id,c.name FROM `onlinequestionbank` om,concept c WHERE om.UniqId='$stud_uk_id' AND om.ConceptId=c.id");
												$res_concept=mysql_num_rows($result_concept);
												$row_concept=mysql_fetch_array($result_concept);
													$concept_temp2=",".$row_concept[1].",";
													if (strpos($str1_temp2,$concept_temp2) !== false)
													{
												
													}
													else
													{
													$str1_temp2=$str1_temp2.$row_concept[1].",";
															$concept=$concept.$row_concept[1].",";
													}
											
												//$concept=$concept.$row_concept[1].",";
											}
										}
										echo $concept;
									?>
								<td>
							</tr>
						</table>
					<?php
					}
					else
					{
						$str1="";
						$str2="";
						$str3="";
						$str4="";
						$result_2=mysql_query("SELECT DISTINCT SubID FROM `omrcorrect` WHERE TestID='$QuePaperId'");
						$rw_nw=mysql_num_rows($result_2);
						if($rw_nw == 1)
						{
						}
						else
						{
							while($row2=mysql_fetch_array($result_2))
							{
								$str1="";
								$str2="";
								if($row2[0]=='1'){ $sub_id_d="Physics";$sub_id_d1="PHY";}
								else if($row2[0]=='2'){ $sub_id_d="Chemistry";$sub_id_d1="CHE";}
								else if($row2[0]=='3'){ $sub_id_d="Maths";$sub_id_d1="MAT";}
								else if($row2[0]=='4'){ $sub_id_d="Botany";$sub_id_d1="BOT";}
								else if($row2[0]=='5'){ $sub_id_d="Zoology";$sub_id_d1="ZOO";}
								else if($row2[0]=='6'){ $sub_id_d="Biology";$sub_id_d1="BIO";}
								else if($row2[0]=='7'){ $sub_id_d="Science";$sub_id_d1="SCI";}
								else
								{
									$result_8=mysql_query("SELECT name  FROM `subject` WHERE id='$row2[0]'");
									while($row8=mysql_fetch_array($result_8))
									{
									$sub_id_d=$row8[0];
									$sub_id_d1=$row8[0];
									}
								}
								$lst = explode(",", $unans_str);
								// if (strpos($str_store,$uqId) !== false)
								$str1_temp=",";
								$concept_temp="";
								if($uniq_id_str == "")
								{
									foreach($lst as $item) 
									{
										$result_concept=mysql_query("SELECT c.id,c.name,om.SubID FROM `omrcorrect` om,concept c WHERE om.TestID='$QuePaperId' AND om.Qno='$item' AND om.ConceptId=c.id");
										$res_concept=mysql_num_rows($result_concept);
										$row_concept=mysql_fetch_array($result_concept);
										$con_sub=$row_concept[2];
										$con_name=$row_concept[1];
										//echo $con_sub;
										if($con_sub == $row2[0])
										{
										$concept_temp=",".$con_name.",";
										if (strpos($str1_temp,$concept_temp) !== false)
										{
										$str1_temp=$str1_temp.$con_name.",";
											$str1=$str1.$con_name.",";
										}
										else
										{
										
										}
										
										}
									}
								}
								else
								{
									foreach($lst as $item) 
									{
										$stud_uk_id=$lst3_uk[$item-1];
										//echo $stud_uk_id."<br/>";
										$result_concept=mysql_query("SELECT c.id,c.name,om.Subject FROM `onlinequestionbank` om,concept c WHERE  om.UniqId='$stud_uk_id' AND om.ConceptId=c.id");
										//echo "SELECT c.id,c.name,om.SubID FROM `onlinequestionbank` om,concept c WHERE  om.UniqId='$stud_uk_id' AND //om.ConceptId=c.id";
										$res_concept=mysql_num_rows($result_concept);
										$row_concept=mysql_fetch_array($result_concept);
										$con_sub=$row_concept[2];
										$con_name=$row_concept[1];
										//echo $con_sub."<br/>";
										if($con_sub == $row2[0] || $con_sub == $sub_id_d || $con_sub == $sub_id_d1)
										{
											//$str1=$str1.$con_name.",";
											$concept_temp=",".$con_name.",";
										if (strpos($str1_temp,$concept_temp) !== false)
										{
									
										}
										else
										{
										$str1_temp=$str1_temp.$con_name.",";
											$str1=$str1.$con_name.",";
										}
										}
										//echo $str1;
									}
								}
								$lst1 = explode(",", $incorr_str);
								$str1_temp=",";
								if($uniq_id_str == "")
								{
									foreach($lst1 as $item) 
									{
										$result_concept=mysql_query("SELECT c.id,c.name,om.SubID FROM `omrcorrect` om,concept c WHERE om.TestID='$QuePaperId' AND om.Qno='$item' AND om.ConceptId=c.id");
										$res_concept=mysql_num_rows($result_concept);
										$row_concept=mysql_fetch_array($result_concept);
										$con_sub=$row_concept[2];
										$con_name=$row_concept[1];
										
										if($con_sub == $row2[0])
										{
											//$str2=$str2.$con_name.",";
										$concept_temp=",".$con_name.",";
										if (strpos($str1_temp,$concept_temp) !== false)
										{
									
										}
										else
										{
										$str1_temp=$str1_temp.$con_name.",";
											$str2=$str2.$con_name.",";
										}
										}
											//echo $str2;
									}
								}
								else
								{
									foreach($lst1 as $item) 
									{
										$stud_uk_id=$lst3_uk[$item-1];
										$result_concept=mysql_query("SELECT c.id,c.name,om.Subject FROM `onlinequestionbank` om,concept c WHERE  om.UniqId='$stud_uk_id' AND om.ConceptId=c.id");
										//$result_concept=mysql_query("SELECT c.id,c.name,om.Subject FROM `onlinequestionbank` om,concept c WHERE //om.Qno='$item' AND om.ConceptId=c.id");
										$res_concept=mysql_num_rows($result_concept);
										$row_concept=mysql_fetch_array($result_concept);
										$con_sub=$row_concept[2];
										$con_name=$row_concept[1];
										if($con_sub == $row2[0] || $con_sub == $sub_id_d || $con_sub == $sub_id_d1)
									
										{
											//$str2=$str2.$con_name.",";
											$concept_temp=",".$con_name.",";
										if (strpos($str1_temp,$concept_temp) !== false)
										{
										
										}
										else
										{
										$str1_temp=$str1_temp.$con_name.",";
											$str2=$str2.$con_name.",";
										}
											//$str2=$str2.$con_name.",";
										}
											//echo $str2;
									}
								}
								?>
								<table style="border:solid 1px;width:100%;height:auto;">
									<tr>
										<td style="border:solid 0px;width:50%"><b><?php echo $sub_id_d; ?></b><td>
										<td style="border:solid 0px;width:50%"><td>
									</tr>
									<tr>
										<td style="border:solid 1px;width:50%">Unattempted Concepts<td>
										<td style="border:solid 1px;width:50%">Incorrect Concepts<td>
									</tr>
									<tr>
										<td valign='top' style="border:solid 1px;width:50%">
											<?php
												echo $str1;
											?>
										<td>
										<td valign='top' style="border:solid 1px;width:50%">
											<?php
												echo $str2;
											?>
										<td>
									</tr>
								</table>
								<?php
							}
						}
					}
				?>
				<br/>
			<table style="border:solid 0px;width:100%;height:auto;">
					<tr>
						<td style="border:solid 0px;width:30%;height:auto;">
							<div style='font-family:  Arial;font-size:17px;'>UNIT WISE ANALYSIS</div>
						</td>
					</tr>
				</table>
				<?php
				$result_2=mysql_query("SELECT DISTINCT SubID FROM `omrcorrect` WHERE TestID='$QuePaperId'");
					$rw_nw=mysql_num_rows($result_2);
					
						while($row2=mysql_fetch_array($result_2))
						{
						$per_80_above="";
						$per_60_above="";
						$per_40_above="";
							if($row2[0]=='1'){ $sub_id_d="Physics";$sub_id_d_1="16";}
							else if($row2[0]=='2'){ $sub_id_d="Chemistry";$sub_id_d_1="17";}
							else if($row2[0]=='3'){ $sub_id_d="Maths";$sub_id_d_1="15";}
							else if($row2[0]=='4'){ $sub_id_d="Botany";$sub_id_d_1="";}
							else if($row2[0]=='5'){ $sub_id_d="Zoology";$sub_id_d_1="";}
							else if($row2[0]=='6'){ $sub_id_d="Biology";$sub_id_d_1="14";}
							else if($row2[0]=='7'){ $sub_id_d="Science";$sub_id_d_1="18";}
							else
							{
								$result_9=mysql_query("SELECT name,id  FROM `subject` WHERE id='$row2[0]'");
								while($row9=mysql_fetch_array($result_9))
								{
								$sub_id_d=$row9[0];
								$sub_id_d_1=$row9[1];
								}
							}
							$result_mm=mysql_query("SELECT  MIN(Qno),MAX(Qno) FROM `omrcorrect` WHERE TestID='$QuePaperId' AND SubID='$row2[0]'");
							$row_mm=mysql_fetch_array($result_mm);
							$min=$row_mm[0];
							$max=$row_mm[1];
					?>
				<table style="border:solid 0px;width:100%;height:auto;">
					<tr>
						<td style="border:solid 1px;width:100%;height:auto;">
							<center><div style='font-family:  Arial;font-size:17px;'><?php echo $sub_id_d."(Question $min-$max)"; ?></div></center>
						</td>
					</tr>
					<tr>
						<td style="border:solid 0px;width:100%;height:auto;">
							<table style="border:solid 1px;width:100%;height:auto;">
								<tr>
									<td style="border:solid 1px;width:5%;height:auto;">
										
									</td>
									<td style="border:solid 1px;width:35%;height:auto;">
									</td>
									<td style="border:solid 1px;width:30%;height:auto;">
										Based on this Test
									</td>
									<td style="border:solid 1px;width:30%;height:auto;">
										Based on overall appeared Test
									</td>
								</tr>
								<tr>
									<td style="border:solid 1px;width:5%;height:auto;">
										No.
									</td>
									<td style="border:solid 1px;width:35%;height:auto;">
										Unit Name
									</td>
									<td style="border:solid 0px;width:30%;height:auto;">
										<table style="border:solid 0px;width:100%;height:auto;">
											<tr>
												<td style="border:solid 1px;width:50%;height:auto;">
													Strength In %
												</td>
												<td style="border:solid 1px;width:50%;height:auto;">
													Weakness In %
												</td>
											</tr>
										</table>
									</td>
									<td style="border:solid 0px;width:30%;height:auto;">
										<table style="border:solid 0px;width:100%;height:auto;">
											<tr>
												<td style="border:solid 1px;width:50%;height:auto;">
													Strength In %
												</td>
												<td style="border:solid 1px;width:50%;height:auto;">
													Weakness In %
												</td>
											</tr>
										</table>
									</td>
								</tr>
									<?php
										$i=1;
										$unit_con="";
										$result3=mysql_query("SELECT DISTINCT sb.unit_id,ut.unit_name FROM studenttestwise_unitper sb,unit ut WHERE sb.unit_id=ut.id AND sb.enroll_id='$enroll_id' AND sb.subject_id='$sub_id_d_1'");
									
										while($row3=mysql_fetch_array($result3))
										{
											$unit_con=$unit_con.$row3[1].",";
											$result4=mysql_query("SELECT DISTINCT sut.unit_id,ROUND(sut.strength_per,2),ROUND((100-sut.strength_per),2) AS weakness_per,u.unit_name FROM studenttestwise_unitper sut,unit u
											WHERE  u.id=sut.unit_id AND sut.user_id='$user_id' AND  sut.test_id='$QuePaperId'  
											AND sut.subject_id='$sub_id_d_1' AND sut.unit_id=$row3[0]");
											
											$row4=mysql_fetch_array($result4);
											
											$result5=mysql_query("SELECT ROUND(Cumulative_per_Overall,2),ROUND((100-Cumulative_per_Overall),2),subject_id,unit_id,id FROM studenttestwise_unitper WHERE id IN(SELECT MAX(id) FROM studenttestwise_unitper 
											WHERE enroll_id='$enroll_id' AND subject_id='$sub_id_d_1' AND unit_id=$row3[0]) AND enroll_id='$enroll_id'");
											$row5=mysql_fetch_array($result5);
											if($row5[0] >= 80)
											{
												$per_80_above=$per_80_above.$row3[1].",";
											}
											else if($row5[0] >=35 && $row5[0] < 80)
											{
												$per_60_above=$per_60_above.$row3[1].",";
											}
											else
											{
												$per_40_above=$per_40_above.$row3[1].",";
											}
											echo "<tr><td style='border:solid 1px;width:5%;height:auto;'>$i</td>";
											echo "<td style='border:solid 1px;width:35%;height:auto;'>$row3[1]</td>";
											echo "<td style='border:solid 1px;width:30 %;height:auto;'>
													<table style='border:solid 0px;width:100%;height:auto;'>
														<tr>
															<td style='border:solid 0px;width:50%;height:auto;' >$row4[1]</td>
															<td style='border:solid 0px;width:50%;height:auto;' >$row4[2]</td>
														</tr>
													</table>
												</td>";
											echo "<td style='border:solid 1px;width:30%;height:auto;' >
													<table style='border:solid 0px;width:100%;height:auto;'>
														<tr>
															<td style='border:solid 0px;width:50%;height:auto;' >$row5[0]</td>
															<td style='border:solid 0px;width:50%;height:auto;' >$row5[1]</td>
														</tr>
													</table>
												</td></tr>";
											$i++;
										}
									?>
							</table>
						
						</td>
					</tr>
					<TR>
						<td>
							<?php 
								if($per_80_above == "")
								{}
								else
								{
									echo "<br/>Congrats!!";
									echo "<br/>Your concepts are strong in the unit(s) :".$per_80_above;
									echo "<br/>Tip for time management.";
									echo "Attempt the questions from these units (".$per_80_above.") first, while giving test.";
								}
								if($per_60_above == "")
								{}
								else
								{
									echo "<br/><br/>You need to brush up the concepts of these unit(s) once again: ".$per_60_above;
								}
								if($per_40_above == "")
								{	
								}
								else
								{
									echo "<br/><br/>You need to prepare the following unit(s) thoroughly before giving the exam: 
									" .$per_40_above. ".<br/><b>Tip for time management</b>. <br/>Answer the questions from these units (".$per_40_above. ") only after completing other questions.";
								}
							?>
						</td>
					</TR>
				</table>
				<?php
					}
				
				?>
				<br/>
				<table>
					<tr>
						<td>
							Correct Answer of this Test
						</td>
					</tr>
					<tr>
						<td>
							<?php echo "<br/>".$correct_ans; ?>
						</td>
					</tr>
				</table>
				<br/>
				<table style="border:solid 0px;width:100%;height:auto;">
					<tr>
						<td style="border:solid 0px;width:30%;height:auto;">
							<?php
								if($group_id == 9)
								{?>
									<div style='font-family:  Arial;font-size:15px;'>Wishing you all the best to see you in the best Engineering college.</div>
								<?php
								}
								else if($group_id == 10)
								{?>
									<div style='font-family:  Arial;font-size:15px;'>Wishing you all the best to see you in the best Medical college.</div>
								<?php
								}
								else if($group_id == 11)
								{?>
									<div style='font-family:  Arial;font-size:15px;'>Wishing you all the best to see you in the best Engineering/Medical college.</div>
								<?php
								}
								else
								{?>
									<div style='font-family:  Arial;font-size:15px;'>Wishing you all the best to see you in the best Engineering/Medical college.</div>
								<?php
								}
							?>
						</td>
					</tr>
				</table>
				<br/>
				<table style="border:solid 0px;width:100%;height:auto;">
					<tr>
						<td style="border:solid 0px;width:30%;height:auto;">
							<div style='float:right;font-family:  Arial;font-size:20px;'>Globaleduserver Team</div>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</body>
</html>