<?php
include_once '../config.php';
$course_id=$_GET['course_id'];
	$totalitem=$_GET['totalitem'];
	$uid=$_GET['uid'];
	$totalamt=$_GET['totalamt'];
	
$order_id=0;
$SQL = "INSERT INTO user_online_order_info (`user_id`,`recharge_id`,`total_amt`,`total_item`) VALUES ('$uid','$course_id','$totalamt','$totalitem')";
$result = mysql_query($SQL);
	if ($result)
	{
		$result_1=mysql_query("SELECT order_id FROM user_online_order_info WHERE  user_id='$uid' AND recharge_id='$course_id' AND total_amt='$totalamt' AND total_item='$totalitem' ");
		while($row=mysql_fetch_array($result_1))
		{
		$order_id=$row[0];
		}
		echo $order_id;
	}
	else
	{
	echo "Failed";
	}
?>