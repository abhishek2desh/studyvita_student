<?php
	include_once '../config.php';
	$sub_id=$_GET['sub_id'];
	$batch_id=$_GET['batch_id'];
	$uid=$_GET['uid'];
	$rs=mysql_query("SELECT DISTINCT c.name,b.name,s.name,wb.time,wb.test,wb.room,wb.id,wb.user_id,Date_format(wb.work_date,'%d-%m-%Y'),DAYNAME(wb.work_date) FROM working_batches_coursewise wb,batch b,course c,SUBJECT s 
	WHERE wb.course_id = c.id AND wb.batch_id = b.id AND wb.sub_id = s.id and s.id='$sub_id' and b.id='$batch_id' 	ORDER BY wb.work_date desc");
	$rw = mysql_num_rows($rs);

		echo "<table style='width:100%;'>";
		echo "<tr>";
		echo "<th style='border:solid 1px;' width='70'>Date</th>";
		echo "<th style='border:solid 1px;' width='70'>Day</th>";
		echo "<th style='border:solid 1px;' width='70'>Time</th>";
		echo "<th style='border:solid 1px;' width='70'>Faculty</th>";
		echo "<th style='border:solid 1px;' width='70'>Chapter</th>";
		echo "<th style='border:solid 1px;' width='70'>Topic</th>";
		echo "<th style='border:solid 1px;' width='70'>Material</th></tr>";
		if($rw == 0)
		{
			echo "<tr><td>No Data Available</td></tr>";
			
		}
		else
		{
			while($row = mysql_fetch_array($rs))
			{
				echo "<tr id='$row[6]'>";
				echo "<td style='border:solid 1px;'>".$row[8]."</td>";
				echo "<td style='border:solid 1px;'>".$row[9]."</td>";
				echo "<td style='border:solid 1px;'>".$row[3]."</td>";
				if($row[7]=="")
				{
				echo "<td style='border:solid 1px;'></td>";
				}
				else
				{
					$fname="";
					$rs1=mysql_query("SELECT name from user where id='$row[7]' ");
					while($row1 = mysql_fetch_array($rs1))
					{
					$fname=$row1[0];
					}
					echo "<td style='border:solid 1px;'>".$fname."</td>";
				}
				//for chapter
			$chapter="";
			$result1=mysql_query("SELECT DISTINCT c.name FROM chapter c,`working_batches_lesson_plan` w WHERE w.chapter_id=c.id AND w.working_batch_id='$row[6]' ");
			while($row1=mysql_fetch_array($result1))
			{
			$chapter=$chapter.$row1[0].",";
			}
			echo "<td style='border:solid 1px;'>".$chapter."</td>";
			//end chapter
			//for topic
			$topic="";
			
			$result3=mysql_query("SELECT DISTINCT topic_id,additional_topic FROM working_batches_lesson_plan WHERE working_batch_id='$row[6]' ");
			while($row3=mysql_fetch_array($result3))
			{
					if($row3[0]=="")
					{
					}
					else
					{
						$lst = explode(",", $row3[0]);
						foreach($lst as $item) 
						{
							if($item=="")
							{
							}
							else
							{
								$rs2 = mysql_query("SELECT  name from topic where id='$item'");
								while($row2 = mysql_fetch_array($rs2))
								{
								$topic=$topic.$row2[0].",";
								}
							}
						}
					}
					if($row3[1]=="")
					{
					}
					else
					{
					$topic=$topic.$row3[1].",";
					}
			
			}
				echo "<td style='border:solid 1px;'>".$topic."</td>";
				$totalrec=0;
					$resultc=mysql_query("SELECT id FROM `working_batches_resources` WHERE `working_batch_id`='$row[6]' AND link_to_class='1'");
					$rwc = mysql_num_rows($resultc);
					if($rwc>0)
					{
					echo "<td style='border:solid 1px;'  id='$row[6]'><input type='button' class='viewmat' id='viewmat' value='View Material' style='width:100%;'/></td>";
					}
					else
					{
					echo "<td style='border:solid 1px;'></td>";
					}
				echo "</tr>";
			}
		}
?>