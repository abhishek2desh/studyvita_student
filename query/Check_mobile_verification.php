<?php
	include("../config.php");
	$user_id=$_GET['user_id'];
	$result_int=mysql_query("SELECT contact_no FROM USER  WHERE id='$user_id'");
	while($row=mysql_fetch_array($result_int))
		{
		$result_int1=mysql_query("SELECT id,verify_status FROM user_verification_detail  WHERE user_id='$user_id' and verification_field_type='mobile' and verification_field='$row[0]'");
		$rw=mysql_num_rows($result_int1);
		if($rw==0)
		{
		echo "0";
		}
		else
		{
			while($row1=mysql_fetch_array($result_int1))
			{
			echo $row1[1];
			}
		}
		
		}
?>