<?php
	$school_name = $_GET['school_name'];
	$user_id = $_GET['user_id'];	
		
	$int_website = $_GET['int_website'];	
	$pincode = $_GET['pincode'];	
	$country_id = $_GET['country_id'];	
	$state_id = $_GET['state_id'];	
	$country_name = $_GET['country_name'];	
	$text_state = $_GET['text_state'];	
	$state="";			
$state=$text_state;	
	require_once("../config.php");
	/*if($country_name=="India" || $country_name=="india")
	{
	$state=$state_id;	
	
	}
	else
	{
	$state=$text_state;
	$pincode="";
	}*/
	$sql = "insert into school_master
	(`SchoolName`,`user_id`,state,pincode,country_id,institute_website)values('$school_name','$user_id','$state','$pincode','$country_id','$int_website')";
	$result = mysql_query($sql);
	if ($result)
	{
		echo "Success";
	}
	else
	{
		echo "failed...";
	}
		/*$result=mysql_query("SELECT DISTINCT SchoolName FROM `school_master` where  SchoolName='$school_name' ORDER BY SchoolName");
			$rw = mysql_num_rows($result);
			if($rw>0)
			{
			echo "School Already exist";
			}
			else
			{
	$sql = "insert into school_master
	(`SchoolName`,`user_id`)values('$school_name','$user_id')";
	$result = mysql_query($sql);
	if ($result)
	{
		echo "Success";
	}
	else
	{
		echo "failed...";
	}
	}*/
	//include '../conn_close.php';
?>