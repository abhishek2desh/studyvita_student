<?php
	
		include_once '../config.php';
		
		$sub_id=$_GET['sub_id'];
		$batch_id=$_GET['batch_id'];
		$uid=$_GET['uid'];
		$today = date("Y-m-d", strtotime('today'));
		$currentDate = strtotime(date("Y-m-d H:i:s"));
		$resultf=mysql_query("SELECT date_formula from server_date_formula where active='1'");
	$formula=0;
	while($rowf=mysql_fetch_array($resultf))
	{
	$formula=$rowf[0];
	}
	$futureDate = $currentDate+($formula);
		//$futureDate = $currentDate+(37810);
		//$futureDate = $currentDate+(60*570.100002);
	$formatDate = date("Y-m-d H:i:s", $futureDate);
	$seat_avail=0;
					$seat_book=0;
					$seat_total=0;
		$rs = mysql_query("SELECT v.id,v.class_url,DATE_FORMAT(v.class_date,'%d-%m-%y'),v.from_time,v.to_time,u.name,c.name,b.name,v.chapter_id,v.topic_id,v.additional_topic,IF('$formatDate' < v.from_date , 'coming_soon', 
	 IF(v.to_date < '$formatDate', 'expire','start ')) AS diff,fees,seat_available,invited_id,DAYNAME(v.class_date)
FROM `virtual_class_faculty` v,course c,batch b,USER u WHERE c.id=v.course_id AND b.id=v.batch_id AND
u.id=v.user_id  and v.batch_id='$batch_id' and  v.sub_id='$sub_id' ORDER BY v.class_date desc,v.from_time desc");

	$rw = mysql_num_rows($rs);

echo "<table style='width:100%;'>";
											
						echo "<tr>";
						echo "<th style='border:solid 1px;' width='70'>Date</th>";
					echo "<th style='border:solid 1px;' width='70'>Day</th>";
							echo "<th style='border:solid 1px;' width='70'>Start Time</th>";
							echo "<th style='border:solid 1px;' width='70'>End Time</th>";
								echo "<th style='border:solid 1px;' width='70'>Faculty</th>";
								echo "<th style='border:solid 1px;' width='70'>Chapter</th>";
									echo "<th style='border:solid 1px;' width='70'>Topic</th>";
									echo "<th style='border:solid 1px;' width='70'>Fees</th>";
									echo "<th style='border:solid 1px;' width='70'>Seat Available</th>";
									echo "<th style='border:solid 1px;' width='70'>Status</th>";
								echo "<th style='border:solid 1px;' width='70'>Material</th></tr>";
							if($rw == 0)
		{
			echo "<tr><td>No Data Available</td></tr>";
			
		}
		else
		{
		while($row = mysql_fetch_array($rs))
			{
					$seat_avail=0;
					$seat_book=0;
					$seat_total=0;
					echo "<tr  id='$row[1]'>";
					
echo "<td style='border:solid 1px;'>".$row[2]."</td>";

echo "<td style='border:solid 1px;'>".$row[15]."</td>";
					echo "<td style='border:solid 1px;'>".$row[3]."</td>";
					echo "<td style='border:solid 1px;'>".$row[4]."</td>";
					echo "<td style='border:solid 1px;'>".$row[5]."</td>";
					if($row[8]=="")
					{
						echo "<td style='border:solid 1px;'></td>";
					}
					else
					{
					$chname="";
					$rs1 = mysql_query("SELECT  name from chapter where id='$row[8]'");
					while($row1 = mysql_fetch_array($rs1))
					{
					$chname=$row1[0];
					}
						echo "<td style='border:solid 1px;'>".$chname."</td>";
					}
					$topic="";
					if($row[9]=="")
					{
					}
					else
					{
						$lst = explode(",", $row[9]);
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
					if($row[10]=="")
					{
					}
					else
					{
					$topic=$topic.$row[10].",";
					}
					echo "<td style='border:solid 1px;'>".$topic."</td>";
					echo "<td style='border:solid 1px;'>".$row[12]."</td>";
					
					if($row[11] == 'expire')
					{
					echo "<td style='border:solid 1px;'></td>";
					}
					else
					{
					//for count no of seats available
					
						$seat_total=$row[13];
					if($row[14]=="")
					{
					$rs5 = mysql_query("SELECT COUNT(*) FROM `virtual_class_book_detail` WHERE (`virtual_class_faculty_id`='$row[0]' or virtual_class_invited_id='$row[0]') ");
								while($row5 = mysql_fetch_array($rs5))
								{
								$seat_book=$row5[0];
								}
							$seat_avail	=$seat_total-$seat_book;
						echo "<td style='border:solid 1px;'>".$seat_avail."</td>";
					}
					else
					{
						$rs5 = mysql_query("SELECT COUNT(*) FROM `virtual_class_book_detail` WHERE (`virtual_class_faculty_id`='$row[0]' or  `virtual_class_faculty_id`='$row[14]' or virtual_class_invited_id='$row[14]')");
								while($row5 = mysql_fetch_array($rs5))
								{
								$seat_book=$row5[0];
								}
							$seat_avail	=$seat_total-$seat_book;
						echo "<td style='border:solid 1px;'>".$seat_avail."</td>";
					}
					//end seat count
					}
					
					//echo "<td style='border:solid 1px;'>".$row[13]."</td>";
					if($row[11] == 'expire')
					{
					echo "<td style='border:solid 1px;'>Completed</td>";
					}
					
					else
					{
						if($row[12]==0)
						{
							if($row[11] == 'coming_soon')
									{
										echo "<td style='border:solid 1px;'>Coming soon</td>";
									}
									else
									{
									echo "<td style='border:solid 1px;'><input type='button' class='defaultbutton' id='search1' value='Start' style='width:100%;'/></td>";
									}
						}
						else
						{
							//checking seat availability
							if($seat_avail==0 || $seat_avail<0)
							{
								echo "<td style='border:solid 1px;'>No Seat Available</td>";
							}
							else
							{
							
							
								//checking class book or not
								$rs6 = mysql_query("SELECT id FROM `virtual_class_book_detail` WHERE user_id='$uid' AND `virtual_class_faculty_id`='$row[0]'");
								$rw6=mysql_num_rows($rs6);
								if($rw6==0)
								{
								echo "<td style='border:solid 1px;' id='$row[0]'><input type='button' class='defaultbutton' id='search3' value='Book this class' style='width:100%;'/></td>";
								}
								else
								{
									if($row[11] == 'coming_soon')
									{
										echo "<td style='border:solid 1px;'>Coming soon</td>";
									}
									else
									{
									echo "<td style='border:solid 1px;'><input type='button' class='defaultbutton' id='search1' value='Start' style='width:100%;'/></td>";
									}
								}
						
								//end checking book
							}
							//end checking seat availability
						}
					
					
					}
					$totalrec=0;
					$resultc=mysql_query("SELECT DISTINCT m.SubTopic,m.id,m.Pathfilename FROM media_manager m,virtual_class_resources w WHERE m.pathfilename IS NOT NULL AND  m.id=w.video_id and w.virtual_class_id='$row[0]' and link_to_class='1'");
					$rwc = mysql_num_rows($resultc);
					if($rwc>0)
					{
					echo "<td style='border:solid 1px;'  id='$row[0]'><input type='button' class='defaultbutton' id='viewmat' value='View Material' style='width:100%;'/></td>";
					}
					else
					{
					$resultc1=mysql_query("SELECT distinct d.srno,d.materialname,d.path,d.chapter,d.subject FROM document_manager_subjective d,virtual_class_resources w  WHERE d.srno=w.document_id and w.virtual_class_id='$row[0]' and link_to_class='1' ");
					$rwc1 = mysql_num_rows($resultc1);
					if($rwc1>0)
					{
					echo "<td style='border:solid 1px;' id='$row[0]'><input type='button' class='defaultbutton' id='viewmat' value='View Material' style='width:100%;'/></td>";
					}
					else
					{
					echo "<td style='border:solid 1px;'></td>";
					//echo "<td style='border:solid 1px;' id='$row[0]'><input type='button' class='defaultbutton' id='viewmat' value='View Material' style='width:100%;'/></td>";
					}
					}
					
					
					echo "</tr>";
			}
					echo "</table>";
		}
?>