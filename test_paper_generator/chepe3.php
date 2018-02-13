<?php
	
		include_once '../config.php';
		
		$sub=$_GET['sub_id'];
		$std=$_GET['std'];
		$board=$_GET['board_id'];
		$sb1=$_GET['sb1'];
		
		$result=mysql_query("select ch_no,name,id from chapter where sub_id IN 
							(SELECT sub_id FROM subject_alias WHERE rel_sub_id='$sub')
							AND board_id IN (SELECT board_id FROM student_details WHERE board_id='$board') 
							AND standard_id IN 
							(SELECT standard_id FROM student_details WHERE standard_id='$std')
							AND active=1 order by ch_no ");
		$rw = mysql_num_rows($result);
		echo "<table>";
		if($rw == 0)
		{
			echo "<tr>";
			echo "<td>No Data Available.<td>";
			echo "<tr>";
		}
		else
		{
			while($row=mysql_fetch_array($result))
			{
				$i=0;
				$k=0;
				$str="";
				//echo "String get : ".$str."k value ".$k."<br/>";
				$topic_count=mysql_query("SELECT id,NAME FROM topic WHERE chap_id 
							IN(SELECT id FROM chapter WHERE sub_id 
							IN(SELECT sub_id FROM subject_alias WHERE rel_sub_id='$sub') 
							AND active=1 AND id='$row[2]') ORDER BY id");
				$topic_rw = mysql_num_rows($topic_count);
				while($topic_row=mysql_fetch_array($topic_count))
				{
					$result1=mysql_query("SELECT c.id,ob.UniqId,ob.path FROM concept c,onlinequestionbank ob WHERE c.topic_id='$topic_row[0]' AND c.id=ob.ConceptId AND Documenttype='O' AND MEDIUM IN('E','EG')");
					$rw1 = mysql_num_rows($result1);
					while($row2=mysql_fetch_array($result1))
					{
						$new_path="\\\ALNITEC-73N4CS8\\Tempquestions\\QuestionData\\".$sb1."\\".$row2[1].".pdf";
						if(file_exists($new_path))
						{
							$rep_uniqid=mysql_query("SELECT uniqId,Repeat_UniqId FROM repeat_checker WHERE chapter_id='$row[2]' AND Repeat_UniqId IS NOT NULL AND uniqId='$row2[1]' ");
							$rp_uniqId = mysql_num_rows($rep_uniqid);		
							if($rp_uniqId > 0)
							{
								$str=$str.$row2[1].",";
								$i++;
								$k=$k+1;
								//echo "String get : ".$str."chapter ".$row[0]."k value ".$k."<br/>";
							}
							else
							{
								$rep_check=mysql_query("SELECT uniqId,Repeat_UniqId FROM repeat_checker WHERE chapter_id='$row[2]' AND Repeat_UniqId IS NOT NULL");
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
									//echo "String get : ".$str."chapter ".$row[0]."k value ".$k."<br/>";
								}
							}
							a:
						}
						echo "if";
					}
				}
				echo "<tr>";
				echo "<td><input type='checkbox' name='$k' id='$str' class='chk' value='$k' /></td>";
				echo "<td id='chap_value_dis' value=$row[0]-$row[2]>$row[0] - $row[1]</td>";
				echo "<td>".$k."</td>";
				echo "</tr>";
			}
		}
		echo "</table>";
		include_once '../conn_close.php';
?>