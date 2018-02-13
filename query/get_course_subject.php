<?php
	include '../config.php';
	$std_id=$_GET['std_id'];
	$board_id=$_GET['board_id'];
	$querystring="";
	if($std_id>0)
	{
	$querystring=" and class='$std_id'";
	}
	if($board_id>0)
	{
	$querystring=$querystring." and board='$board_id'";
	}
	$result=mysql_query("SELECT DISTINCT id,name,sort_name FROM  subject order by name");
										$rw = mysql_num_rows($result);
										echo "<option  value='0'>Subject</option>";
										if($rw == 0)
										{
											echo "<option  value='0'>No Data Available.</option>";
										}
										else
										{
											while($row=mysql_fetch_array($result))
											{
												$result1=mysql_query("SELECT distinct SUBJECT FROM course WHERE SUBJECT LIKE '%$row[0],%' $querystring");
													$rw1 = mysql_num_rows($result1);
													if($rw1==0)
													{
													}
													else
													{
													
														if($row[1]=="All")
														{
														$row[1]="Mock";
														}
														echo "<option value=$row[0]-$row[1]-$row[2]>$row[1]</option>";
															
													}
											}
										}
?>