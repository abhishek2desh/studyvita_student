<?php 
	
	include_once '../config.php';
	
	$uniq_id_get = $_GET['uniq_id_get'];
	
	$result=mysql_query("SELECT ob.private_document,ob.edu_private_document,ob.facultyId,u.name FROM `onlinequestionbank` ob,USER u  WHERE ob.facultyId=u.id AND ob.uniqid='$uniq_id_get'");
	$row=mysql_fetch_array($result);
	$private_doc=$row[0];
	$edu_private_doc=$row[1];
	$faculty_id=$row[2];
	$faculty_name=$row[3];
	if($private_doc == 1)
	{
		echo "Uploaded By : ".$faculty_name;
	}
	else if($edu_private_doc == 1)
	{
		echo "Uploaded By : ".$faculty_name;
	}
	else
	{
		echo "Uploaded By : Globaleduserver";
	}
	
	//include_once '../conn_close.php';
?>