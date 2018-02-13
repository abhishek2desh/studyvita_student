<?php
	
		include_once '../config.php';
		
		$select_choice_type=$_GET['select_choice_type'];

		$que_array="";
		$Array_Name = array();
		$result=mysql_query("SELECT test_id,Qno,Uniq_id,response FROM `adaptive_test_response` WHERE test_id='6738'");
		$rw = mysql_num_rows($result);
		$new_val=0;
		
		echo "<table>";
		
		while($row=mysql_fetch_array($result))
		{
			
		}
		echo "</table>";
		include_once '../conn_close.php';
?>