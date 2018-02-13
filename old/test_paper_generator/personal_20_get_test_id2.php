<?php 
	
	include_once '../config.php';
	
	$fac_id = $_GET['uid'];
	$sub_id = $_GET['sub_id'];
	
	
	$result=mysql_query("SELECT DISTINCT ps.Test_id FROM personalassignment_studentwise ps,personalassignment_response pr WHERE ps.Test_id=pr.test_id AND ps.student_id='$fac_id' AND ps.SubID='$sub_id' ORDER BY Test_id DESC");
	
	echo "<option value='0'>Select TestID</option>";
	while($row=mysql_fetch_array($result))
	{
		echo "<option value='$row[0]'>$row[0]</option>";
	}
	include_once '../conn_close.php';
?>