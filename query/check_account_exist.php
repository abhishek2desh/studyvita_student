<?php
	include '../config.php';
	$st_uname=$_GET['st_uname'];
	$st_pwd=$_GET['st_pwd'];
	$accountlist=$_GET['accountlist'];
	$rs = mysql_query("SELECT u.id FROM USER u,user_roll ur WHERE u.username='$st_uname' and u.password='$st_pwd' and ur.user_id=u.id and ur.roll_id='5'");
	$rw = mysql_num_rows($rs);
	if($rw==0)
	{
		echo "invalid";
	}
	else
	{
		while($row = mysql_fetch_array($rs))
		{
			$uid=$row[0];
			if($accountlist=="")
			{
				echo $uid;
			}
			else
			{
				$uid_temp=",".$uid.",";
				 if (strpos($accountlist,$uid_temp) !== false)
				 {
				 echo "already";
				 }
				 else
				 {
					echo $uid;
				 }
			}
			
		}
	}
?>