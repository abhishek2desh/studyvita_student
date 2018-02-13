<?php 
	include_once '../config.php';

	$area=$_GET['area'];
	$city_id=$_GET['city_id'];
	$email=$_GET['email'];
	$phone=$_GET['phone'];
	$rec_type=$_GET['rec_type'];
	$name=$_GET['name'];
	$std_id=$_GET['std_id'];
	$board_id=$_GET['board_id'];
	$sub_id=$_GET['sub_id'];
	$lec_type_id=$_GET['lec_type_id'];
		
	
	$SQL34 = "INSERT INTO requirement_posted 
	(`area`,`City_id`,`name`,`email`,`mobile`,`Requirement_type`,lecture_mode_id,standard_id,board_id,subject_id) VALUES('$area','$city_id','$name','$email','$phone','$rec_type','$lec_type_id','$std_id','$board_id','$sub_id')";
	$result34 = mysql_query($SQL34);
	if ($result34)
	{
		//echo "Data inserted";
	}
	else
	{
		echo "Error While insert Data";
	}
					
?>