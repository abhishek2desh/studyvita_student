<?php
	
		include_once '../config.php';
		
		$sb=$_GET['sub_id'];
		$cpt=$_GET['cpt'];
		$doc_type1=$_GET['doc_type'];
		/*$doc_type
		if($doc_type1 === 1)
		{
			$doc_type='S';
		}
		else if($doc_type1 === 2)
		{
			$doc_type='O';
		}*/
		$result=mysql_query("SELECT id,NAME FROM topic WHERE chap_id 
							IN(SELECT id FROM chapter WHERE sub_id 
							IN(SELECT sub_id FROM subject_alias WHERE rel_sub_id='$sb') 
							AND active=1 AND id='$cpt') ORDER BY id");
		$rw = mysql_num_rows($result);
		echo "<table>";
		$last_uniq_id="";
		while($row=mysql_fetch_array($result))
		{
			$i=0;
			$str="";
			
			$result1=mysql_query("SELECT c.id,ob.UniqId,ob.path FROM concept c,onlinequestionbank ob WHERE c.topic_id='$row[0]' AND c.id=ob.ConceptId AND Documenttype='O' AND MEDIUM IN('E','EG') AND ob.Blocked_Question='0' AND ob.conceptid > 0");
			$rw1 = mysql_num_rows($result1);
			while($row2=mysql_fetch_array($result1))
			{
				//echo "first while <br/>".$row2[1]."<br/>";
				
				//echo "\n new uniq Id".$row2[1];
				$rep_uniqid=mysql_query("SELECT uniqId,Repeat_UniqId FROM repeat_checker WHERE chapter_id='$cpt'
										AND uniqId='$row2[1]' ");
				$rp_uniqId = mysql_num_rows($rep_uniqid);		
				if($rp_uniqId > 0)
				{
					//echo "first while  if <br/>".$row2[1]."<br/>";
					$str=$str.$row2[1].",";
					$i++;
					//echo "\nincrement : ".$i."Uniq ID".$row2[1]."<br/>";
				}
				else
				{
					//echo "first while  else <br/>".$row2[1]."<br/>";
					
					$rep_check=mysql_query("SELECT uniqId,Repeat_UniqId FROM repeat_checker WHERE chapter_id='$cpt'
											AND Repeat_UniqId IS NOT NULL");
					$rp1 = mysql_num_rows($rep_check);
					$count=0;
					if($rp1 > 0)
					{
						//echo "second while  if <br/>".$row2[1]."<br/>";
						while($rep_check_row=mysql_fetch_array($rep_check))
						{
							//echo "second while  if <br/>".$row2[1]."<br/>";
							$count++;
							$str_store=",".$rep_check_row[1].",";
							//echo "str sotre ".$str_store."row value :".$row2[1];
							//echo "str pos : ".strpos($str_store,',$row2[1],');
							$uqId=",".$row2[1].",";
							 if (strpos($str_store,$uqId) !== false)
							 {
								if($count == $rp1)
								{
									$str=$str.$row2[1].",";
									$i++;
									//echo "\nincrement : ".$i."Uniq ID".$row2[1]."<br/>";
								}
							 }
							 else
							 {
								//echo "thidr while  for else<br/>".$row2[1]."<br/>";
								goto a;
							 }
							
						}
						a:
					}
					else
					{
						//echo "forth while  for else<br/>".$row2[1]."<br/>";
						$str=$str.$row2[1].",";
						$i++;
						//echo "\nincrement : ".$i."Uniq ID".$row2[1]."<br/>";
					}
				}
				
			}
			//echo "Total String : ".$str;
			echo "<tr>";
			echo "<td id='chk_id' style='width:119px;'><input type='checkbox' name='$i' id='$str' class='chk' value='$row[1]' />".$i."</td>";
			echo "<td><b>|</b></td>";
			echo "<td>".$row[1]."</td>";
			echo "</tr>";
		}
		echo "</table>";
		include_once '../conn_close.php';
?>