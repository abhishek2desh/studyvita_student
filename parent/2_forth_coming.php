<?php
	
	include '../config.php';
	
	$uid=$_GET['uid'];
	
	$myQuery = "SELECT wb.work_date,s.name,wb.time FROM working_batches wb,SUBJECT s WHERE user_id='$uid' AND work_date='2013-06-08' AND s.id=wb.sub_id";					
	$result=mysql_query($myQuery) or die($myQuery."<br/><br/>".mysql_error());
	
	echo "<table style='width:500px;'><tr>";
	echo "<th>TIME</th>";echo "<th>SUBJECT</th>";echo "<th>TEST</th></tr>";
	
	while($row=mysql_fetch_array($result))
	{
		echo "<tr>";
		echo "<td>".$row[0]."</td>";
		echo "<td>".$row[1]."</td>";
		echo "<td>".$row[2]."</td>";
		echo "</tr>";
	}
	echo "</table>";
	
	include_once '../conn_close.php';
	
?>