<?php
	include '../config.php';
	$uid=$_GET['uid'];
	$result=mysql_query("SELECT faculty_id FROM user WHERE id='$uid'");
	while($row=mysql_fetch_array($result))
		{
		$fac_id=$row[0];
		}
	$result=mysql_query("SELECT id,NAME FROM user WHERE id='$fac_id'");
	$res=mysql_num_rows($result);
	$domain="coreacademics.in";
	$uid="";
	$uname="";
	if($res>0)
	{
		while($row=mysql_fetch_array($result))
		{
		$uid=$row[0];
		$uname=$row[1];
		}
		
	}
	echo $uid."--".$uname."--".$domain;
?>