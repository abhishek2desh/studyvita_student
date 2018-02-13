<?php
	
	include '../config.php';
	
	$mat_id=$_GET['material_id'];
	$u_id=$_GET['u_id'];
	$result=mysql_query("SELECT DISTINCT m.id,m.material_name FROM report_mapping rm,material m WHERE stud_id='$u_id' AND test_id='$mat_id' AND m.id=rm.report_id");
	while($row=mysql_fetch_array($result))
	{
		echo "<option value='$row[0]'>$row[1]</option>";
	}
	
	include_once '../conn_close.php';
?>