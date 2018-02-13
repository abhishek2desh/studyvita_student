<?php
	$pwd = $_GET['pwd'];
	$username= $_GET['username'];
	$uid = $_GET['uid'];
	//$wb = $_GET['wb_id'];

	include_once '../config.php';
	$result_ref=mysql_query("SELECT id FROM USER WHERE `username`='$username' and password='$pwd' and id !='$uid'");
			$rw_ref=mysql_num_rows($result_ref);
			if($rw_ref==0)
			{
				$sql = "UPDATE USER SET `password`='$pwd' WHERE id='$uid'";
	
				$result = mysql_query($sql);
				if ($result)
				{
					echo "update";
				}
				else
				{
					echo "failed...";
				}
			}
			else
			{
			echo "User already exit.Please Choose another password";
			}
	
	include_once '../conn_close.php';
?>