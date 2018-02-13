<?php
	
		include_once '../config.php';
		//session_start();
		$s5=$_GET['uid'];
		$sub=$_GET['sub_id'];
		$course_id=$_SESSION['course_id'];
		$batch_id=$_SESSION['batch_id'];
		$cp_value12=$_GET['cp_value12'];
		
		$result1=mysql_query("SELECT board_id,standard_id FROM batch WHERE id='$batch_id'");
		$row1=mysql_fetch_array($result1);
		$board=$row1[0];
		$std=$row1[1];
		
		if($sub == '14'){ $sb1="Biology";}
		else if($sub == '15'){ $sb1="Maths";}
		else if($sub == '16'){ $sb1="Physics";}
		else if($sub == '17'){ $sb1="Chemistry";}
		else
		{
		$result17=mysql_query("SELECT name FROM subject WHERE id='$sub'");
		$row17=mysql_fetch_array($result17);
		$sb1=$row17[0];
		}
		$uniq_per=0;
		$uniq__k=0;
		$i=0;
		$k=0;
		$str="";
		$avg_var="";
		$avg_count=mysql_query("SELECT Avg_percent FROM chapterwise_student_average WHERE chapter_id='$cp_value12' AND student_id='$s5'");
		$avg_count_rw = mysql_num_rows($avg_count);
		$avg_count_row=mysql_fetch_array($avg_count);
		$avg=$avg_count_row[0];
		
		$topic_count=mysql_query("SELECT id,NAME FROM topic WHERE chap_id 
					IN(SELECT id FROM chapter WHERE sub_id 
					IN(SELECT sub_id FROM subject_alias WHERE rel_sub_id='$sub') 
					AND active=1 AND id='$cp_value12') ORDER BY id");
					
		$topic_rw = mysql_num_rows($topic_count);
		while($topic_row=mysql_fetch_array($topic_count))
		{
			$result1=mysql_query("SELECT c.id,ob.UniqId,ob.path FROM concept c,onlinequestionbank ob WHERE c.topic_id='$topic_row[0]' AND c.id=ob.ConceptId AND ob.Documenttype='O' AND ob.MEDIUM IN('E','EG') AND c.id > '0' AND ob.Blocked_Question='0'");
			$rw1 = mysql_num_rows($result1);
			
			//echo "SELECT c.id,ob.UniqId,ob.path FROM concept c,onlinequestionbank ob WHERE c.topic_id='$topic_row[0]' AND c.id=ob.ConceptId AND ob.Documenttype='O' AND ob.MEDIUM IN('E','EG') AND c.id > '0' AND ob.Blocked_Question='0'";
			
			while($row2=mysql_fetch_array($result1))
			{
				$new_path="\\\ALNITEC-73N4CS8\\Tempquestions\\QuestionData\\".$sb1."\\".$row2[1].".pdf";
				if(file_exists($new_path))
				{
					$rp_uniqId=0;
					$uniq_per=$row2[3];
					$rep_uniqid=mysql_query("SELECT uniqId,Repeat_UniqId FROM repeat_checker WHERE chapter_id='$cp_value12' AND uniqId='$row2[1]' ");
					$rp_uniqId = mysql_num_rows($rep_uniqid);
					
					//echo "<br/>SELECT uniqId,Repeat_UniqId FROM repeat_checker WHERE chapter_id='$cp_value12' AND uniqId='$row2[1]'";
					if($rp_uniqId > 0)
					{
						
						$str=$str.$row2[1].",";
						$i++;
						$k=$k+1;
						
						if($uniq_per > $avg)
						{
							$uniq__k++;
						}
						//echo "String get : ".$str."chapter ".$row[0]."k value ".$k."<br/>";
					}
					else
					{
						$rp1=0;
						$rep_check=mysql_query("SELECT uniqId,Repeat_UniqId FROM repeat_checker WHERE chapter_id='$cp_value12' AND Repeat_UniqId IS NOT NULL");
						$rp1 = mysql_num_rows($rep_check);
						$count=0;
						if($rp1 > 0)
						{
							while($rep_check_row=mysql_fetch_array($rep_check))
							{
								$count++;
								$str_store=",".$rep_check_row[0].",";
								$uqId=",".$row2[1].",";
								 if (strpos($str_store,$uqId) !== false)
								 {
									goto ab;
								 }
								 else
								 {
									if($count == $rp1)
									{
										$str=$str.$row2[1].",";
										$i++;
										$k=$k+1;
										if($uniq_per > $avg)
										{
											$uniq__k++;
										}
										//echo "String get : ".$str."chapter ".$row[0]."k value ".$k."<br/>";
									}
								 }
							}
							ab:
						}
						else
						{
							$str=$str.$row2[1].",";
							$i++;
							$k=$k+1;
							if($uniq_per > $avg)
							{
								$uniq__k++;
							}
							//echo "String get : ".$str."chapter ".$row[0]."k value ".$k."<br/>";
						}
					}
					a:
				}
			}
			if($board==1)
			{
			}
			else if($board==2)
			{
				$ij=1;
				//echo "hellow $ij : $topic_row[0]<br/> ";
				$result14=mysql_query("SELECT m.conceptid,ob.UniqId,ob.path,t.chap_id FROM concept c,onlinequestionbank ob,Concept_mapping m,topic t 
				WHERE m.Gseb_TopicId='$topic_row[0]' AND m.conceptid=ob.ConceptId AND ob.Documenttype='O' AND c.id=m.conceptid AND ob.conceptid > 0 AND t.id=m.Cbse_TopicId AND ob.MEDIUM IN('E','EG') AND ob.Blocked_Question='0'");
				
				while($row14=mysql_fetch_array($result14))
				{
					$new_path="\\\ALNITEC-73N4CS8\\Tempquestions\\QuestionData\\".$sb1."\\".$row14[1].".pdf";
					if(file_exists($new_path))
					{
						$rep_uniqid=mysql_query("SELECT uniqId,Repeat_UniqId FROM repeat_checker WHERE chapter_id='$row14[3]' AND uniqId='$row14[1]' ");
						$rp_uniqId = mysql_num_rows($rep_uniqid);		
						if($rp_uniqId > 0)
						{
							
							$str=$str.$row14[1].",";
							$i++;
							$k=$k+1;
							
						}
						else
						{
							$rep_check=mysql_query("SELECT uniqId,Repeat_UniqId FROM repeat_checker WHERE chapter_id='$row14[3]' AND Repeat_UniqId IS NOT NULL");
							$rp1 = mysql_num_rows($rep_check);
							$count=0;
							if($rp1 > 0)
							{
								while($rep_check_row=mysql_fetch_array($rep_check))
								{
									$count++;
									$str_store=",".$rep_check_row[0].",";
									$uqId=",".$row14[1].",";
									 if (strpos($str_store,$uqId) !== false)
									 {
										goto ab1;
									 }
									 else
									 {
										if($count == $rp1)
										{
											$str=$str.$row14[1].",";
											$i++;
											$k=$k+1;
										
											//echo "String get : ".$str."chapter ".$row[0]."k value ".$k."<br/>";
										}
									 }
								}
								ab1:
							}
							else
							{
								$str=$str.$row14[1].",";
								$i++;
								$k=$k+1;
								
								//echo "String get : ".$str."chapter ".$row[0]."k value ".$k."<br/>";
							}
						}
					}
				}	
			}
		}
		/*echo "<tr>";
		echo "<td>".$k."</td>";
		echo "<td id='first_td_1_cp' value='$str' style='border:solid 1px;width:119px;visibility: hidden;'></td>";
		echo "<td id='first_td_2_cp' value='$k' style='border:solid 1px;width:119px;visibility: hidden;'></td>";
		echo "<td id='first_td_3_cp' value='$uniq__k' style='border:solid 1px;width:119px;visibility: hidden;'></td>";
		echo "</tr>";*/
		echo $k."-".$str;
		
		include_once '../conn_close.php';
?>