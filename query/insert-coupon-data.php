<?php 
	include_once '../config.php';
	
	$record_id = $_GET['record_id'];
	$uid = $_GET['uid'];
	$coupon_code="";
	$website="";
	$result=mysql_query("SELECT DISTINCT coupon_code,product_website FROM `couponcode_management` where id='$record_id' ");
	while($row = mysql_fetch_array($result))
		{
			$coupon_code=$row[0];
			$website=$row[1];
		}
		$SQL341 = "INSERT INTO couponcode_management_user (couponcode_management_id,coupon_code,`user_id`) 
							VALUES('$record_id','$coupon_code','$uid')";
							$result35 = mysql_query($SQL341);
							if ($result35)
							{
								echo $website;
							}
							else
							{
								echo "Failed";
							}
?>