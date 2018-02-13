<?php
	session_start();
	
	require_once("../config.php");
	
	$date = $_GET['dt'];
	$batch_id = $_GET['batch_id'];

	$test="Test";
	
	$result=mysql_query("SELECT DISTINCT c.name,b.name,s.name,wb.time,wb.test,wb.room FROM working_batches_coursewise wb,batch b,course c,SUBJECT s 
	WHERE wb.work_date='$date' 
	AND wb.batch_id=$batch_id
	AND wb.course_id = c.id
	AND wb.batch_id = b.id
	AND wb.sub_id = s.id
	ORDER BY STR_TO_DATE(TIME,'%h:%i %p')");
	/*$result=mysql_query("SELECT DISTINCT br.name,b.name,s.name,wb.time,wb.test,wb.room,bsm.Batch_Desc FROM working_batches wb,batch b,branch br,SUBJECT s ,batch_school_map bsm
	WHERE work_date='$date' 
	AND user_id=$user_id
	AND wb.branch_id = br.id
	AND wb.batch_id = b.id AND bsm.batch_id=b.id
	AND wb.sub_id = s.id
	ORDER BY STR_TO_DATE(TIME,'%h:%i %p')");*/
	echo "<table style='width:100%;'>";
	while($row=mysql_fetch_array($result))
	{	
		echo "<tr>";
		echo "<td style='width:210px;border:solid 1px;'>".$row[0]."</td>";
		echo "<td style='width:120px;border:solid 1px;'>".$row[1]."</td>";
		echo "<td style='width:90px;border:solid 1px;'>".$row[2]."</td>";
		echo "<td style='width:160px;border:solid 1px;'>".$row[3]."</td>";
		if($row[4] == '1')
		{
			echo "<td style='width:80px;border:solid 1px;'>".$test."</td>";
		}
		else if($row[4] == '0')
		{
			echo "<td style='width:80px;border:solid 1px;'></td>";
		}
		echo "<td style='width:30px;border:solid 1px;'>".$row[5]."</td>";
		echo "</tr>";
	}
	echo "</table>";
	//include '../conn_close.php';
?>