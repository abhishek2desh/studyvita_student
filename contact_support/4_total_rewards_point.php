<?php
		include_once '../config.php';
		$uid=$_GET['user_id'];
		
		$result=mysql_query("SELECT user_id,Refer_name,Email,mobile,create_date,join_status,reward_point,join_date FROM friend_reffer WHERE user_id='$uid'");
		$rw = mysql_num_rows($result);
		
		$total_points="";
		while($row=mysql_fetch_array($result))
		{
			if($row[5] == '1')
			{
				$total_points=$total_points+$row[6];
			}			
		}
		
		echo $total_points;
		include_once '../conn_close.php';
?>