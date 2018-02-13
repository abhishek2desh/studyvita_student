<?php
include('config.php');
//session_start();
if(isset($_SESSION['s5']))
{
	$user_check=$_SESSION['s5'];
	$ses_sql=mysql_query("select name,id from user where id='$user_check' ");
	$row=mysql_fetch_array($ses_sql);

	$login_session=$row['name'];
	$login_session_id=$row['id'];

	if(!isset($login_session))
	{
		//header("Location: login.php");
		header("Location: http://www.globaleduserver.com/edu/home/index.php");
	}
}
else
{
	//header("Location: login.php");
	header("Location: http://www.globaleduserver.com/edu/home/index.php");
}

?>
