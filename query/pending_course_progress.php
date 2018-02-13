<?php
	session_start();
	
	require_once("../config.php");
	
	$user_id = $_GET['userid'];
	$batch_id = $_GET['batch_id'];
	/*$result=mysql_query("SELECT DISTINCT DATE_FORMAT(work_date,'%d-%m-%Y') FROM working_batches_coursewise 
WHERE user_id='$user_id' AND id  NOT IN(SELECT DISTINCT `wb_id` FROM `class_scheduler` WHERE user_id='$user_id' AND wb_id IS NOT NULL ) 
ORDER BY work_date DESC");*/
$result=mysql_query("SELECT DISTINCT DATE_FORMAT(work_date,'%d-%m-%Y'),b.name,s.name,wb.time FROM working_batches_coursewise wb,batch b,SUBJECT s WHERE  wb.id  NOT IN(SELECT DISTINCT `wb_id` FROM `class_scheduler` WHERE user_id='$user_id' AND wb_id IS NOT NULL ) AND s.id=wb.sub_id AND wb.batch_id=b.id 
and wb.batch_id='$batch_id' ORDER BY work_date DESC");

	echo "<table style='width:600px;'>";
	$i=1;
	while($row=mysql_fetch_array($result))
	{	
		echo "<tr>";
		echo "<td style='border:solid 1px;font-size:18px;'>".$i."</td>";
		echo "<td style='border:solid 1px;font-size:18px;'>".$row[0]."</td>";
		echo "<td style='border:solid 1px;font-size:18px;'>".$row[1]."</td>";
		echo "<td style='border:solid 1px;font-size:18px;'>".$row[2]."</td>";
		echo "<td style='border:solid 1px;font-size:18px;'>".$row[3]."</td>";
		echo "</tr>";
		$i++;
	}
	echo "</table>";
	//include '../conn_close.php';
?>