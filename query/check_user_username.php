<?php
		include_once '../config.php';
		$uid = $_GET['uid'];		
		
		$result=mysql_query("SELECT id FROM user WHERE username LIKE '%@%' and id='$uid'");
		 $rw=mysql_num_rows($result);
		 if($rw==0)
		 {
		 echo "";
		 }
		 else
		 {
		 echo "success";
		 }
		
?>