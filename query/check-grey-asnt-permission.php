<?php
		include '../config.php';
		
	
		$batch_id=$_GET['batch_id'];
		$result_u=mysql_query("SELECT id FROM `batch` WHERE id='$batch_id' AND Grey_assignment_display='1' ");
		$rwc=mysql_num_rows($result_u);
	if($rwc==0)
	{
	echo 0;
	}
	else
	{
	echo 1;
	}
	?>