<?php
	
		include_once '../config.php';
		$user_id=$_GET['user_id'];
		
		$result=mysql_query("SELECT id from user_studytool_display where user_id='$user_id'");
		$rw = mysql_num_rows($result);
		
		if($rw == 0)
		{
			echo "0";
		}
		else
		{
			while($row=mysql_fetch_array($result))
			{
				
				echo "1";
				
			}
		}
?>