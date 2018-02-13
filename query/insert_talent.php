<?php

	include_once '../config.php';
	
	$user_id= $_POST['user_id'];
	$cname= $_POST['cname'];
	$placename= $_POST['placename'];
	$category_id= $_POST['category_id'];
	$comp_id= $_POST['comp_id'];
	$descid= $_POST['descid'];
	$datepickerVal34=$_POST['datepickerVal34'];
	$sql_1=mysql_query("INSERT INTO user_talent (user_id,competition_name,comp_date,place,competition_id,competition_category_id,description)values('$user_id','$cname','$datepickerVal34','$placename','$comp_id','$category_id','$descid')");
	if($sql_1)
	{
	}
	else
	{
	echo "failed";
	}
?>