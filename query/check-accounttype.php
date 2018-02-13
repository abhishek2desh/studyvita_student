<?php
		include '../config.php';
		
		$uid=$_GET['uid'];
		
		$result_u=mysql_query("SELECT `account_type` FROM USER WHERE id='$uid' ");
			while($rowu=mysql_fetch_array($result_u))
			{
				 echo $rowu[0];
			}
		
			
		
		
?>