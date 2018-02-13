<?php
		include '../config.php';
		$user_id=$_GET['user_id'];
		$uniq_id=$_GET['uniq_id'];
		$result=mysql_query("SELECT id FROM `today_challenge_response` WHERE user_id='$user_id' AND uniq_id='$uniq_id'");
	
		$rw= mysql_num_rows($result);
		if($rw==0)
		{
		
			echo "0";
		}
		else
		{
			echo "1";
		}
?>