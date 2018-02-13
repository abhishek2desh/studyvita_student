
<?php
		include '../config.php';
	
		$referral_code=$_GET['referral_code'];
	
	$refcode_valid=0;
		
		$result_ref=mysql_query("SELECT id FROM USER WHERE `referal_code`='$referral_code'");
			$rw_ref=mysql_num_rows($result_ref);
			if($rw_ref>0)
			{
			$refcode_valid=1;
			}
			else
			{
			$refcode_valid=0;
			}
		echo $refcode_valid;
		
?>