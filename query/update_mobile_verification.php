<?php
	include("../config.php");
	$user_id=$_GET['user_id'];
		$ver_code=$_GET['ver_code'];
		$mobile_no_verify=$_GET['mobile_no_verify'];
		
		$result_int=mysql_query("SELECT verification_code,verification_field FROM user_verification_detail  WHERE user_id='$user_id' and verification_code='$ver_code' and verification_field_type='mobile' and verification_field='$mobile_no_verify'");
		$rw=mysql_num_rows($result_int);
		if($rw==0)
		{
		echo "Invalid code";
		}
		else
		{
		$update_query=mysql_query("UPDATE `user_verification_detail` SET verify_status='1' WHERE user_id='$user_id' and verification_code='$ver_code' and verification_field_type='mobile' and verification_field='$mobile_no_verify'");
				
				if ($update_query)
				{
					//echo "";
				}
				else
				{
				echo "failed4";
				}
		}
	
?>