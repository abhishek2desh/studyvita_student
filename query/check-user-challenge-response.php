<?php
		include '../config.php';
		$user_id=$_GET['user_id'];
		$uniq_id=$_GET['uniq_id'];
		$sql="SELECT tr.id FROM `today_challenge_register_user` tr ,`today_challenge` t WHERE tr.user_id='$user_id' AND t.id=tr.`today_challenge_id`
AND t.uniq_id='$uniq_id'";
		$result=mysql_query($sql);
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