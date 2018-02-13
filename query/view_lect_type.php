<?php
	require_once("../config.php");
	$result=mysql_query("SELECT id,name FROM type_lect");
	
	while($row=mysql_fetch_array($result))
	{			
		echo "<option value='$row[0]'>$row[1]</option>";
	}
	//include '../conn_close.php';
?>