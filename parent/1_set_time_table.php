<?php
	
	include '../config.php';
	
	$uid=$_GET['uid'];
	
	$myQuery = "SELECT w.time,UCASE(sb.name),IF(test=0,'-','TEST'),w.id FROM working_batches w,student_details sd,batch b,SUBJECT sb WHERE sd.batch_id = b.id AND w.batch_id=b.id AND sd.edutech_student_id=".$uid."
								AND w.work_date = CURDATE() AND w.sub_id=sb.id";
								
	$result=mysql_query($myQuery) or die($myQuery."<br/><br/>".mysql_error());;
	
	echo "<table style='width:500px;'><tr><td><td><b>Today's TimeTable</b></td></td></tr>";
	echo "<tr><th>TIME</th>";echo "<th>SUBJECT</th>";echo "<th>TEST</th></tr>";
	while($row=mysql_fetch_array($result))
	{
		echo "<tr>";
		echo "<td>".$row[0]."</td>";
		echo "<td>".$row[1]."</td>";
		echo "<td>".$row[2]."</td>";
		echo "<td><div id='$row[3]' class='click_demo'></div></td>";
		echo "</tr>";
	}
	echo "</table>";
	
	include_once '../conn_close.php';
?>