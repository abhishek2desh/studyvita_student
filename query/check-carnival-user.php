<?php
		include '../config.php';
		$uid=$_GET['uid'];
		$carnival_user=0;
		$result=mysql_query("SELECT iscarnival FROM user where id='$uid'");
		while($row= mysql_fetch_array($result))
		{
		$carnival_user=$row[0];
		}
		echo $carnival_user;
?>