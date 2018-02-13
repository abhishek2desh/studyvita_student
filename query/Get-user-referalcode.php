<?php
	
		include_once '../config.php';
			$user_id = $_GET['user_id'];
		
		$result=mysql_query("SELECT `referal_code`,contact_no FROM `user` WHERE id='$user_id '");
		
		$rw = mysql_num_rows($result);
	
		if($rw == 0)
		{
		
		}
		else
		{
			while($row=mysql_fetch_array($result))
			{
				$result1=mysql_query("SELECT id FROM `application_registered_user` WHERE mobileno='$row[1]'");
				$rw1 = mysql_num_rows($result1);
				if($rw1>0)
				{
				echo "$row[0]|$row[1]|1";
				}
				else
				{
				echo "$row[0]|$row[1]|0";
				}
				
			}
		}
		
		//include '../conn_close.php';
?>