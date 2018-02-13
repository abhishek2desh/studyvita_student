<?php
		include_once '../config.php';

		$filter_value=$_GET['filter_value']='true';
		
		$result=mysql_query("UPDATE filter_student_viewer SET filter='$filter_value' WHERE id='1'");
		
		if($result)
		{
			echo "Update Successfully";
		}
		else
		{
			echo "Failed Update";
		}
		include_once '../conn_close.php';
?>