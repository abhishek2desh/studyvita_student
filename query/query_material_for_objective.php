<?php
	
	include '../config.php';
	
	$mat_id=$_GET['material_id'];
	$s5=$_SESSION['sid'];
	
	$result=mysql_query("SELECT DISTINCT m.id,m.material_name FROM sol_mapping s,material m WHERE mat_id='$mat_id'
							AND m.id=s.sol_id");
							
	while($row=mysql_fetch_array($result))
	{
		echo "<option value='$row[0]'>$row[1]</option>";
	}
	
	include_once '../conn_close.php';
?>