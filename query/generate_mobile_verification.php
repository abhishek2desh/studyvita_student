<?php
	include("../config.php");
	$user_id=$_GET['user_id'];
	$verification_code="";
	$mobile="";
	$result_int=mysql_query("SELECT uv.verification_code,u.contact_no FROM user_verification_detail uv,user u WHERE uv.user_id='$user_id' and u.id=uv.user_id and uv.verification_field_type='mobile' and uv.verification_field=u.contact_no");
	while($row=mysql_fetch_array($result_int))
		{
		$verification_code=$row[0];
	$mobile=$row[1];
		
		}
		if($verification_code=="")
		{
		
		$verification_code = rand(1000, 9999);
		$result_int1=mysql_query("SELECT contact_no FROM USER  WHERE id='$user_id' ");
			while($row1=mysql_fetch_array($result_int1))
		{
		
	$mobile=$row1[0];
		
		}
		$SQL = "INSERT INTO user_verification_detail 
				(`user_id`,`verification_field_type`,`verification_field`,`verification_code`) VALUES
				('$user_id','mobile','$mobile','$verification_code')";

			$result = mysql_query($SQL);
			if ($result)
			{
				echo $verification_code."|".$mobile;
			}
			else
			{
			echo "failed";
			}
	
		}
		else
		{
		echo $verification_code."|".$mobile;
		}

?>