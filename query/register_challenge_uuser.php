<?php
		include '../config.php';
		$chalg_id=$_GET['chalg_id'];
		$uid=$_GET['uid'];
		$sql="SELECT tr.id FROM `today_challenge_register_user` tr ,`today_challenge` t WHERE tr.user_id='$uid' AND t.id=tr.`today_challenge_id`
AND t.id='$chalg_id'";
		$result=mysql_query($sql);
		$rw= mysql_num_rows($result);
		if($rw==0)
		{
		
			$sqli = "insert into today_challenge_register_user(`user_id`,`today_challenge_id`)values('$uid','$chalg_id')";
	//echo $sql;
		$resulti = mysql_query($sqli);
		if ($resulti)
		{
			


	
			
		}
		else
		{
			echo "Failed";
		}
		}
		else
		{
			//echo "1";
		}
?>