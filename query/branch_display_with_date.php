<?php	
	
	include '../config.php';
	
	$dt=$_GET['dt7'];
	$batch_id=$_GET['batch_id'];
	
	/*$result=mysql_query("SELECT DISTINCT br.id,br.name FROM working_batches wb,branch br
	WHERE work_date='$dt' 
	AND wb.branch_id = br.id AND wb.user_id='$uid'");*/
		$result=mysql_query("SELECT DISTINCT c.id,c.name FROM working_batches_coursewise wb,course c
	WHERE work_date='$dt' AND wb.course_id = c.id AND wb.batch_id='$batch_id'");
	
	while($row=mysql_fetch_array($result))
	{			
		echo "<option value='$row[0]' id='$row[0]'>$row[1]</li>";
	}
	
?>