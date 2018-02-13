<?php
	include 'config.php';
session_start();
$domainname=$_SESSION['domain_name'];
$domainname1="";
	$s5=$_SESSION['sid'];
	//echo $s5;
//echo $domainname;
		if($domainname=="")
		{
			$result1=mysql_query("SELECT website_source FROM `user` WHERE id='$s5'");
			while($row1=mysql_fetch_array($result1))
			{
			$domainname1=$row1[0];
			}
			if($domainname1=="")
			{
				header("Location: http://64.187.229.174");
				exit;
			}
			else
			{
				header("Location: http://".$domainname1);
				exit;
			}
		
		}
		else
		{
		header("Location: http://".$domainname);
		//header("Location: http://www.globaleduserver.com/edu/home/index.php");
		exit;
		}
		
		
/*
if(session_destroy())
{
if($domainname=="")
{
header("Location: http://www.globaleduserver.com/edu/home/index.php");
	exit;
}
else
{

header("Location: http://".$domainname);
	//header("Location: http://www.globaleduserver.com/edu/home/index.php");
	exit;
}
}
?>