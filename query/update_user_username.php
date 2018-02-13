<?php
	$email = $_GET['email'];
	
	$uid = $_GET['uid'];
	//$wb = $_GET['wb_id'];

	include_once '../config.php';
	$result=mysql_query("SELECT password FROM USER WHERE  id ='$uid'");
	while($row=mysql_fetch_array($result))
	{
	$pwd=$row[0];
	}									
	$result_ref=mysql_query("SELECT id FROM USER WHERE `username`='$email' and password='$pwd' and id !='$uid'");
			$rw_ref=mysql_num_rows($result_ref);
			if($rw_ref==0)
			{
				$sql = "UPDATE USER SET `username`='$email' WHERE id='$uid'";
	
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
			echo "User already exit";
			}
	
	include_once '../conn_close.php';
?>