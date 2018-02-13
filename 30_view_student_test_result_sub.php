<?php
		include_once 'config.php';
		
		$today = date('Y-m-d');
		$uid=$_GET['uid'];
		$sb_result=$_GET['sb_result'];
		$cp_result=$_GET['cp_result'];
		$std_result=$_GET['std_result'];
		$str="";
		session_start();
		$batch_id=$_SESSION['batch_id'];
		if($sb_result == "" AND  $cp_result == "" AND $std_result == "")
		{
		}
		else
		{
			$str="AND sd.standard_id='$std_result' AND SUBJECT='$sb_result' AND chapter_id='$cp_result'";
		}
		if($sb_result=="")
		{
		$result=mysql_query("SELECT DISTINCT q.name,DATE_FORMAT(test_date,'%d-%m-%Y') AS test_date,sub.name,ta.chap_id,ta.chapter_id,ta.sub_id FROM test_announce ta,que_paper q,SUBJECT sub WHERE  ta.que_paper_id=q.id AND ta.sub_id=sub.id AND user_id='$uid' AND  ta.sub_id<>'20' and ta.exam_type='30'  and ta.batch_id='$batch_id' and ta.test_date<='$today' ORDER BY ta.test_date DESC");
		//echo "SELECT DISTINCT q.name,DATE_FORMAT(test_date,'%d-%m-%Y') AS test_date,sub.name FROM test_announce ta,que_paper q,SUBJECT sub WHERE  ta.que_paper_id=q.id AND ta.sub_id=sub.id AND user_id='$uid' AND  ta.sub_id<>'20' and ta.exam_type='30'  and ta.batch_id='$batch_id' and ta.test_date<='$today' ORDER BY ta.test_date DESC";
		}
		else
		{
		$result=mysql_query("SELECT DISTINCT q.name,DATE_FORMAT(test_date,'%d-%m-%Y') AS test_date,sub.name,ta.chap_id,ta.chapter_id,ta.sub_id FROM test_announce ta,que_paper q,SUBJECT sub WHERE  ta.que_paper_id=q.id AND ta.sub_id=sub.id AND user_id='$uid' AND  ta.sub_id<>'20' and ta.exam_type='30'   and ta.sub_id='$sb_result' and ta.batch_id='$batch_id' and ta.test_date<='$today' ORDER BY ta.test_date DESC");
		}
		
		/*if($sb_result == "")
		{
		$result=mysql_query("SELECT DISTINCT  CAST(alt.test_id AS UNSIGNED   INTEGER),DATE_FORMAT(DATE(alt.start_time),'%d-%m-%Y'),TIMEDIFF(alt.end_time,alt.start_time),
		c.name,c.ch_no,s.name,sd.edutech_student_id,sd.sname,alt.subject 
		FROM adaptive_learning_test alt,adaptive_test_response atr,chapter c,SUBJECT s,student_details sd
		WHERE alt.student_id='$uid' AND alt.test_id=atr.test_id AND alt.chapter_id=c.id  AND sd.user_id=alt.student_id and alt.chapterwise_test='1'
		AND alt.test_type IN('test','practise')  AND s.id=alt.subject  and sd.batch_id=alt.batch_id  and alt.batch_id ='$batch_id' ORDER BY  CAST(alt.test_id AS UNSIGNED   INTEGER) DESC");
		}
		else
		{
		$result=mysql_query("SELECT DISTINCT  CAST(alt.test_id AS UNSIGNED   INTEGER),DATE_FORMAT(DATE(alt.start_time),'%d-%m-%Y'),TIMEDIFF(alt.end_time,alt.start_time),
		c.name,c.ch_no,s.name,sd.edutech_student_id,sd.sname,alt.subject
		FROM adaptive_learning_test alt,adaptive_test_response atr,chapter c,SUBJECT s,student_details sd
		WHERE alt.student_id='$uid' AND alt.test_id=atr.test_id AND SUBJECT='$sb_result' AND alt.chapter_id=c.id  AND sd.user_id=alt.student_id and alt.chapterwise_test='1'
		AND alt.test_type IN('test','practise')  AND s.id=alt.subject  and sd.batch_id=alt.batch_id  and alt.batch_id ='$batch_id' ORDER BY  CAST(alt.test_id AS UNSIGNED   INTEGER) DESC");
		}*/
		$rw = mysql_num_rows($result);
		
		
		$i=0;
		$j=1;
		$rw = mysql_num_rows($result);
		if($rw == "")
		{
			echo "No Data available";
		}
		else
		{
		$flg=0;
	
		while($row=mysql_fetch_array($result))
		{
			$subject="";
				$chapter="";
				$obt_marks=0;
				$total_marks=0;
				$edutech_id="";
				$sname="";
				$result1f=mysql_query("SELECT DISTINCT edutech_student_id,sname FROM student_details WHERE user_id='$uid'");
			$row1f=mysql_fetch_array($result1f);
			$edutech_id=$row1f[0];
			$sname=$row1f[1];
			$result1f1=mysql_query("SELECT totalmarks,obtainedmarks FROM `subjectiveevalution` WHERE quepaperid='$row[0]' AND studentid='$edutech_id'");
				$rwf = mysql_num_rows($result1f1);
				if($rwf==0)
				{
					goto nextrec;
				}
			
				while($rowf1=mysql_fetch_array($result1f1))
				{
					$obt_marks=$rowf1[1];
						$total_marks=$rowf1[0];
				}		
			if($flg==0)
			{
				echo "<table valign='top' style='border:solid 1px;width:100%;height:25px;'>";
				$flg=1;
			}
			if($row[3]=="")
			{
				if($row[4]=="")
				{

				}
				else
				{
					$chap_temp=$row[4];
					$lst = explode(",", $chap_temp);
					foreach($lst as $item) 
					{
						if($item=="")
						{
						}
						else
						{
							$resultc=mysql_query("SELECT name FROM `chapter` WHERE id='$item' ");
							while($rowc=mysql_fetch_array($resultc))
							{
								$chapter=$chapter.$rowc[0].",";
							}
						}
					}
				}
			
			}
			else
			{
			$chapter=$row[3];
			}
				if($j%2 == 0)
				{
					echo "<tr id='$row[0],$edutech_id,$sname,$row[2],$row[5]' style='background-color:#5E9DC8;border:solid 1px;height:20px;'>";
					}
					else
					{
						echo "<tr id='$row[0],$edutech_id,$sname,$row[2],$row[5]' style='background-color:white;border:solid 1px;height:20px;'>";
					}
					
					echo "<td style='width:11%;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[1]."</b></label></center></td>";
						echo "<td style='width:13%;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[0]."</b></label></center></td>";
						
				echo "<td style='width:12%;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$row[2]."</b></label></center></td>";
						echo "<td style='width:23%;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$chapter."</b></label></center></td>";
						echo "<td style='width:12%;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$obt_marks."</b></label></center></td>";
						echo "<td style='width:12%;border:solid 0px;height:20px;'><center><label style='color:black'><b>".$total_marks."</b></label></center></td>";
						$result_u=mysql_query("SELECT id FROM `batch` WHERE id='$batch_id' AND Grey_assignment_display='1' ");
		$rwc=mysql_num_rows($result_u);
	if($rwc==0)
	{
	
	}
	else
	{
		//for checking in studentwise unitper table
		$result4=mysql_query("SELECT uniqid FROM `onlineuniqid` WHERE testid='$row[0]'");
		
							//$result4=mysql_query("SELECT DISTINCT unit_id FROM studenttestwise_unitper  WHERE user_id='$uid' AND test_id='$row[0]'");
							$rs_link4=mysql_num_rows($result4);
								if($rs_link4 > 0)
								{
								$result5=mysql_query("SELECT qb.uniqid,qb.conceptid FROM onlineuniqid o,`onlinequestionbank` qb WHERE o.testid='$row[0]'
 AND qb.uniqid=o.uniqid AND conceptid=0");
								$rs_link5=mysql_num_rows($result5);
								if($rs_link5 > 0)
								{
								echo "<td style='font-size:13px;width:10%;height:30px;border-width: 0px; border-style: solid; border-color: GREEN;'><b>Processing...<br/><input type='button' class='defaultbutton' id='view_result1' value='   Refresh    ' /></b></td>";
								}
								else
								{
								echo "<td style='font-size:13px;width:10%;height:30px;border-width: 0px; border-style: solid; border-color: GREEN;'><b><input type='button' class='defaultbutton' id='view_result1' value='View Report' /></b></td>";
								}
								
								}
								else
								{
								echo "<td style='font-size:13px;width:10%;height:30px;border-width: 0px; border-style: solid; border-color: GREEN;'><b>Processing...<br/><input type='button' class='defaultbutton' id='view_result1' value='   Refresh    ' /></b></td>";
								}
						//end checking
	}
						
						
					echo "</tr>";
					$j++;
				nextrec:
		}
		if($flg==0)
			{
			echo "No Data available......";
			}
			else
			{
		echo "</table>";
		}
		}
?>