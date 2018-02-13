<?php
		include "../config.php";
		
		$uid = $_GET['uid'];
		$chap_id = $_GET['chapter_id'];
		$test_id = $_GET['test_id'];
		$noq = $_GET['noq'];
		$sb1 = $_GET['sub_full'];
		$sub_id = $_GET['subject_id'];
		$sub_sort = $_GET['sub_sort'];
		$select_que_str="";
		$dec_marks=$noq;
		$uniq_per=0;
		$uniq__k=0;
		$i=0;
		$k=0;
		$str="";
		$avg_var="";
		$avg_count=mysql_query("SELECT Avg_percent FROM chapterwise_student_average WHERE chapter_id='$chap_id' AND student_id='$uid'");
		$avg_count_rw = mysql_num_rows($avg_count);
		$avg_count_row=mysql_fetch_array($avg_count);
		$avg=$avg_count_row[0]; 
		
		//echo $avg."<br/>";
		
		$topic_count=mysql_query("SELECT id,NAME FROM topic WHERE chap_id 
					IN(SELECT id FROM chapter WHERE sub_id 
					IN(SELECT sub_id FROM subject_alias WHERE rel_sub_id='$sub_id') 
					AND active=1 AND id='$chap_id') ORDER BY id");
					
					
		$topic_rw = mysql_num_rows($topic_count);
		while($topic_row=mysql_fetch_array($topic_count))
		{
	
			$result1_top=mysql_query("SELECT c.id,ob.UniqId,ob.path FROM concept c,onlinequestionbank ob WHERE  c.topic_id='$topic_row[0]' AND c.id=ob.ConceptId AND ob.Documenttype='O' AND ob.MEDIUM IN('E','EG') AND c.id > '0' AND ob.Blocked_Question='0' and ob.Repeat_uniqid=false and ob.pdffile_exist=True");
			
			$rw1 = mysql_num_rows($result1_top);
			
			while($row2=mysql_fetch_array($result1_top))
			{
			$result1_per=mysql_query("SELECT per FROM uniqidwise_diff_per  where uniqid='$row2[1]'");
			while($row_per=mysql_fetch_array($result1_per))
			{
				$uniq_per=$row_per[0];
				$str=$str.$row2[1].",";
				$i++;
				$k=$k+1;
				
				if($uniq_per > $avg)
				{
					$uniq__k++;
				}
			}
			
			
				$new_path="\\\ALNITEC-73N4CS8\\Tempquestions\\QuestionData\\".$sb1."\\".$row2[1].".pdf";
				/*if(file_exists($new_path))
				{
					$uniq_per=$row2[3];
					$rep_uniqid=mysql_query("SELECT uniqId,Repeat_UniqId FROM repeat_checker WHERE chapter_id='$chap_id' AND Repeat_UniqId IS NOT NULL AND uniqId='$row2[1]' ");
					$rp_uniqId = mysql_num_rows($rep_uniqid);		
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
						$rep_check=mysql_query("SELECT uniqId,Repeat_UniqId FROM repeat_checker WHERE chapter_id='$chap_id' AND Repeat_UniqId IS NOT NULL");
						$rp1 = mysql_num_rows($rep_check);
						$count=0;
						if($rp1 > 0)
						{
							while($rep_check_row=mysql_fetch_array($rep_check))
							{
								$count++;
								$str_store=",".$rep_check_row[0].",".$rep_check_row[1];
								$uqId=",".$row2[1].",";
								 if (strpos($str_store,$uqId) !== false)
								 {
									$lst = explode(",", $str_store);
									foreach($lst as $item) 
									{
										if($item == $row2[1])
										{
											
										}
										else
										{
											$coma=",".$str;
											$item1=",".$item.",";
											if(strpos($coma,$item1) !== false)
											{
												goto a;
											}
										}
									}
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
				}*/
			}
		}
		$newString = str_replace(",","','",$str);
		$newString =  "'".$newString;
		//echo $newString;
	$newString2=substr($newString, 0, -2);
		//echo $newString2;
		$avg=0;
		$avg_val=0;
		$ud_rw=0;
		
		$avg_count=mysql_query("SELECT Avg_percent FROM chapterwise_student_average WHERE chapter_id='$chap_id' AND student_id='$uid'");
		$avg_count_rw = mysql_num_rows($avg_count);
		$avg_count_row=mysql_fetch_array($avg_count);
		$avg=$avg_count_row[0];
		
		
		
		if($avg == "")
		{
			$avg=0;
		}
	
		$total_que_str="";
		$total_no_que="";
		$avg_val=$avg;
		ab:
		$avg_val=$avg_val+10;
		
		IF ($avg_val>100)
		{
			$avg_val=100;
			$avg=$avg-10;
		}
		$ud_count=mysql_query("SELECT Per,UniqID FROM uniqidwise_diff_per WHERE UniqId IN ($newString2) AND per BETWEEN '$avg' AND '$avg_val'");
		$ud_rw = mysql_num_rows($ud_count);
		$total_no_que=$ud_rw;
		//echo "SELECT Per,UniqID FROM uniqidwise_diff_per WHERE UniqId IN ($newString2) AND per BETWEEN '$avg' AND '$avg_val'";
		if($ud_rw >= $dec_marks)
		{
			while($df_row=mysql_fetch_array($ud_count))
			{
				$total_que_str=$total_que_str.$df_row[1].",";
			}
			$total_que_str=substr($total_que_str, 0, -1);
			//echo $total_no_que."-".$total_que_str;
			$lst = explode(",", $total_que_str);
			$i=1;
			$k=0;
			$new_val=0;
			$avg_val=0;
			for ($j=0;$j<=$total_no_que;$j++)
			{
				if ($j==$dec_marks)
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
				//echo "<br/>".$run1.$run2;
				if(strpos($run1,$run2) !== false)
				{
						goto in1;
				}
				else
				{
					
					$select_ran=$select_ran.$ran.",";
					$select_que_str=$select_que_str.$lst[$ran].",";
					$item1=",".$lst[$ran].",";
					//echo $select_que_str."-".$item1;
					
				}
			}
			out:
		}
		
		else
		{
			if($avg_val == 100)
			{
				if ($ud_rw=="")
				{
					$ud_rw=0;
				}
				if($ud_rw == 0)
				{
					
				}
				else
				{
					
				}
			}
			else
			{
				goto ab;
			}
		}
		//echo "<br/>$row1[0] : ". $select_que_str;
		$jk=1;
		$uid2=substr($select_que_str, 0, -1);
		$lst_sel = explode(",", $uid2);
		foreach($lst_sel as $uk_idh) 
		{
			$rg=mysql_query("SELECT CorrectAns FROM `onlinequestionbank` WHERE UniqId='$uk_idh'");
			$rg1=mysql_fetch_array($rg);
			$crtand=$rg1[0];
			$sql = "INSERT INTO adaptive_test_response(`test_id`,`Qno`,`Uniq_id`,`response`,`correct_ans`,`student_id`)
			values('$test_id','$jk','$uk_idh','x','$crtand','$uid')";
			$result = mysql_query($sql);
			//echo $sql;
			if ($result)
			{
			}
			else
			{
				echo "failed";
			}
			if($sub_sort == "PHY"){ $sb="1"; }
			else if($sub_sort == "CHE"){ $sb="2"; }
			else if($sub_sort == "MAT"){ $sb="3"; }
			else if($sub_sort == "BOT"){ $sb="4"; }
			else if($sub_sort == "ZOO"){ $sb="5"; }
			else if($sub_sort == "BIO"){ $sb="6"; }
			else if($sub_sort == "SCI"){ $sb="7"; }
			$result_curr=mysql_query("SELECT CorrectAns FROM onlinequestionbank WHERE UniqId=$uk_idh");
			$row_curr=mysql_fetch_array($result_curr);
			$get_ans=$row_curr[0];
			
			$result_concept=mysql_query("SELECT ConceptId FROM `onlinequestionbank` WHERE UniqId=$uk_idh");
			$row_concept=mysql_fetch_array($result_concept);
			$get_concept_id=$row_concept[0];
			
			$result_topic=mysql_query("SELECT topic_id FROM concept WHERE id='$get_concept_id'");
			$row_topic=mysql_fetch_array($result_topic);
			$get_topic_id=$row_topic[0];
			
			$insert_test=mysql_query("INSERT INTO onlineuniqid(`TestID`,`Uniqid`,`Qno`)
				   VALUES('$test_id','$uk_idh','$jk')");
			
			$result_unit=mysql_query("SELECT c.unit_id FROM topic t,chapter c WHERE t.chap_id = c.id
			AND t.id='$get_topic_id'");
			$row_unit=mysql_fetch_array($result_unit);
			$get_unit=$row_unit[0];
			
			$insert_test1=mysql_query("INSERT INTO omrcorrect(`TestID`,`SubID`,`Qno`,`CorrectAns`,`TopicId`,`ConceptId`,`UnitId`)
							VALUES('$test_id','$sb','$jk','$get_ans','$get_topic_id','$get_concept_id','$get_unit')");
			$jk++;
		}
		
		//include '../conn_close.php';
?>