<?php
	
		include_once '../config.php';
		
		$fac_id=$_GET['fac_id'];
		$datepickerVal34=$_GET['datepickerVal34'];
		$today = date("Y-m-d", strtotime('today'));
		$currentDate = strtotime(date("Y-m-d H:i:s"));
		$resultf=mysql_query("SELECT date_formula from server_date_formula where active='1'");
	$formula=0;
	while($rowf=mysql_fetch_array($resultf))
	{
	$formula=$rowf[0];
	}
	$futureDate = $currentDate+($formula);
		//$futureDate = $currentDate+(60*570.100002);
	$formatDate = date("Y-m-d H:i:s", $futureDate);
	
		$rs = mysql_query("SELECT distinct w.id,w.class_url,w.channelno,DATE_FORMAT(w.class_date,'%d-%m-%y'),w.from_time,w.to_time,w.topic,w.seat_available,w.fees,u.name,IF('$formatDate' < w.from_date , 'coming_soon', 
	 IF(w.to_date < '$formatDate', 'expire','start ')) AS diff,w.conducted_by,w.desktop_url
FROM `webinar_detail` w,USER u,webinar_faculty_id wf WHERE (wf.user_id='$fac_id' or w.conducted_by='$fac_id')  and u.id=w.conducted_by and wf.webinar_id=w.id and w.class_date='$datepickerVal34' ORDER BY w.class_date,w.from_time ");

$rw = mysql_num_rows($rs);

echo "<table style='width:100%;'>";
											
							echo "<tr>";
								echo "<th style='border:solid 1px;'width='70'>Topic</th>";
							echo "<th style='border:solid 1px;' width='70'>Start Time</th>";
							echo "<th style='border:solid 1px;' width='70'>End Time</th>";
								echo "<th style='border:solid 1px;' width='70'>Conducted By</th>";
									echo "<th style='border:solid 1px;' width='70'>Fees</th>";
									echo "<th style='border:solid 1px;' width='70'>Seat Available</th>";
								
								echo "<th style='border:solid 1px;' width='70'></th>";
								echo "<th style='border:solid 1px;' width='70'></th></tr>";
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
					
					
					echo "<td style='border:solid 1px;'>".$row[6]."</td>";
					echo "<td style='border:solid 1px;'>".$row[4]."</td>";
					echo "<td style='border:solid 1px;'>".$row[5]."</td>";
					$nameu="";
							$resultg = mysql_query("SELECT name FROM user where id='$row[11]'");
							while($rowg=mysql_fetch_array($resultg))
		{
			$nameu=$rowg[0];
		}
		$nameu=str_replace(' ', '-', $nameu);
		$myFile = "D:\\inetpub\\wwwroot\\EdutechIndia\\edu\\coreacademics\\personal-profile\\".$row[11]."-".$nameu."-webinar.html";
		if (file_exists($myFile)) 
{
$lnk_proile="http://studyvita.com/personal-profile/".$row[11]."-".$nameu."-webinar.html";
echo "<td style='border:solid 1px;' ><font color='black' size='2'>".$row[9]."&nbsp;&nbsp;<a href=$lnk_proile target='_blank'><input type='button' value='Profile'  style='width:80px;' /></a></font></td>";


}
else
{
	echo "<td style='border:solid 1px;' ><font color='black' size='2'>".$row[9]."</font></td>";
}
					//echo "<td style='border:solid 1px;'>".$row[9]."</td>";
					echo "<td style='border:solid 1px;'>".$row[8]."</td>";
					if($row[10] == 'expire')
					{
					echo "<td style='border:solid 1px;'></td>";
					}
					else
					{
					//for count no of seats available
					
						$seat_total=$row[7];
					
					$rs5 = mysql_query("SELECT COUNT(*) FROM `webinar_class_book_detail` WHERE webinar_id='$row[0]'  ");
								while($row5 = mysql_fetch_array($rs5))
								{
								$seat_book=$row5[0];
								}
							$seat_avail	=$seat_total-$seat_book;
						echo "<td style='border:solid 1px;'>".$seat_avail."</td>";
							//end seat count
					}
					
				
					
					if($row[10] == 'expire')
					{
					echo "<td style='border:solid 1px;'>Completed</td>";
					}
					else
					{
					if($row[8]==0)
						{
							if($row[10] == 'coming_soon')
									{
										echo "<td style='border:solid 1px;'>Coming soon</td>";
									}
									else
									{
									echo "<td style='border:solid 1px;' id='$row[12]'><input type='button' class='defaultbutton' id='search1' value='Start' style='width:100%;'/></td>";
									}
						}
						else
						{
							//checking seat availability
							if($seat_avail==0 || $seat_avail<0)
							{
							if($row[11]==$fac_id)
							{
							if($row[10] == 'coming_soon')
									{
										echo "<td style='border:solid 1px;'>Coming soon</td>";
									}
									else
									{
									echo "<td style='border:solid 1px;' id='$row[12]'><input type='button' class='defaultbutton' id='search1' value='Start' style='width:100%;'/></td>";
									}
							}
							else
							{
							echo "<td style='border:solid 1px;'>No Seat Available</td>";
							}
								
							}
							else
							{
							
							
								//checking class book or not
								$rs6 = mysql_query("SELECT id FROM `webinar_class_book_detail` WHERE user_id='$fac_id' AND `webinar_id`='$row[0]'");
								$rw6=mysql_num_rows($rs6);
								if($rw6==0)
								{
								echo "<td style='border:solid 1px;' id='$row[0]'><input type='button' class='defaultbutton' id='search3' value='Book this class' style='width:100%;'/></td>";
								}
								else
								{
									if($row[10] == 'coming_soon')
									{
										echo "<td style='border:solid 1px;'>Coming soon</td>";
									}
									else
									{
									echo "<td style='border:solid 1px;' id='$row[12]'><input type='button' class='defaultbutton' id='search1' value='Start' style='width:100%;'/></td>";
									}
								}
						
								//end checking book
							}
							//end checking seat availability
						}
					}
					if($row[11]==$fac_id)
					{
					if($row[10] == 'expire')
					{
					echo "<td style='border:solid 1px;'></td>";
					}
					else
					{
					
					$idpwd="";
					$rs3 = mysql_query("SELECT email,PASSWORD FROM `virtual_class_channel` WHERE channelno='$row[12]'");
								while($row3 = mysql_fetch_array($rs3))
								{
								$idpwd=$row3[0]."|".$row3[1]."|".$row[0];
								}
					
					echo "<td style='border:solid 1px;' id='$idpwd' align='center'><input type='button' class='defaultbutton' id='viewpwd' value='View Username Password ' style='width:100%;'/></td>";
					}
					}
					else
					{
					echo "<td style='border:solid 1px;'></td>";
					}
					
					
					echo "</tr>";
			}
			}
					echo "</table>";
		
?>