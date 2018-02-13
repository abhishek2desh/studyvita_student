<?php
	include 'config.php';
	
	$sid=$_GET['sid']='806869';
	$test_id=$_GET['test_id']='5857';
	
	$result=mysql_query("SELECT  ob.`ExamDate`,ob.`StudentId`,ob.`QuePaperId`,ob.`range2`,ob.`TotalMarks`,ob.`ObtainedMarks`,ob.`unans`,ob.`incorrect`,	ob.`unans_str`,ob.`incorr_str`,ob.`ignore_str`,ob.`attempted_ans`,ob.`uniqid_str`,ob.`correct_str`,ob.`subject`,sd.sname,u.enroll_id,b.name,ob.batch,u.username,u.password,u.id,sd.group_id,b.id,uniqid_str,sd.user_id FROM `objective_evolution` ob,student_details sd,USER u,branch b WHERE ob.StudentId=sd.edutech_student_id AND sd.branch_id=b.id AND sd.user_id=u.id AND ob.StudentId='$sid' AND ob.QuePaperId='$test_id'");
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
	$student_user_id=$row[26];
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
		//echo $sb1_dis;
	}
	
	if($subject == 'BIO'){ $sub="BIOLOGY"; $sb="14";}
	else if($subject == 'MAT'){ $sub="MATHS"; $sb="15";}
	else if($subject == 'PHY'){ $sub="PHYSICS"; $sb="16";}
	else if($subject == 'CHE'){ $sub="CHEMISTRY"; $sb="17";}
	else if($subject == 'SCI'){ $sub="SCIENCE"; $sb="18";}
	else if($subject == 'MOC'){ $sub="MOC"; $sb="20";}
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
	//echo $correct_ans;
?>
<html>
	<body>
		<div id="main_div" style="border:solid 1px;width:100%;">	
		<div style="border:solid 1px;width:100%;height:auto;">
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
						
						<th style="border:solid 1px;width:67%;">Marking Scheme</th>
						<th style="border:solid 1px;width:33%;">Obtained Score</th>
					</tr>
					<?php
						
						$result_23=mysql_query("SELECT DISTINCT correctmarks,incorrectmarks FROM `course_markingscheme`");
						$lst = explode(",", $correct_str);
						$crt_str=sizeof($lst);
						$crt_str=$crt_str-1;
						while($rw_nw23=mysql_fetch_array($result_23))
						{
						$tt=$total_no_que*$rw_nw23[0];
						
						$incorrect_str=$rw_nw23[1] * $incorrect;
						
						$correct_str=$rw_nw23[0] * $crt_str;
						//echo $correct_str."<br/>";
						$final_cr=$correct_str - $incorrect_str;
						echo "<tr><td style='border:solid 1px;'><center>Correct : $rw_nw23[0], Incorrect : $rw_nw23[1], Unanswer:0</center></td><td style='border:solid 1px;'><center>$final_cr/$tt</center></td></tr>";
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
										
										$str1_temp=$str1_temp.$con_name.",";
											$str1=$str1.$con_name.",";
										
										}
										//echo $str1;
									}
								}
								$lst1 = explode(",", $incorr_str);
								$str1_temp=",";
								if($uniq_id_str == "")
								{
									foreach($lst1 as $item1) 
									{
										$result_concept=mysql_query("SELECT c.id,c.name,om.SubID FROM `omrcorrect` om,concept c WHERE om.TestID='$QuePaperId' AND om.Qno='$item1' AND om.ConceptId=c.id");
										$res_concept=mysql_num_rows($result_concept);
										$row_concept=mysql_fetch_array($result_concept);
										$con_sub=$row_concept[2];
										$con_name=$row_concept[1];
										
										if($con_sub == $row2[0])
										{
											//$str2=$str2.$con_name.",";
										$concept_temp=",".$con_name.",";
										
										$str1_temp=$str1_temp.$con_name.",";
											$str2=$str2.$con_name.",";
										
										}
											//echo $str2;
									}
								}
								else
								{
									foreach($lst1 as $item1) 
									{
										$stud_uk_id=$lst3_uk[$item1-1];
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
										
										$str1_temp=$str1_temp.$con_name.",";
											$str2=$str2.$con_name.",";
										
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
		</div>
		</div>
	</body>
</html>

