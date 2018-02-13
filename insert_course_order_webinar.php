<?php
		include '../config.php';
		$online_id2=$_GET['online_id2'];
		$uid=$_GET['uid'];
		$result1=mysql_query("SELECT fees,DATE_FORMAT(class_date,'%d-%m-%Y') FROM `webinar_detail` WHERE id='$online_id2'");
		while($row1=mysql_fetch_array($result1))
		{
			$total_charge=$row1[0];
			$class_date=$row1[1];
			
		}
$order_id=0;
$SQL = "INSERT INTO user_online_order_info (`user_id`,`webinar_id`,`total_amt`,`total_item`) VALUES ('$uid','$online_id2','$total_charge','1')";
$result = mysql_query($SQL);
	if ($result)
	{
		$result_1=mysql_query("SELECT max(order_id) FROM user_online_order_info WHERE  user_id='$uid' AND webinar_id='$online_id2' AND total_amt='$total_charge' AND total_item='1' ");
		while($row=mysql_fetch_array($result_1))
		{
		$order_id=$row[0];
		}
		$uname="";
		$result1=mysql_query("SELECT name FROM `user` WHERE id='$uid'");
		while($row1=mysql_fetch_array($result1))
		{
			$uname=$row1[0];
			
			
		}
		echo $order_id."|".$total_charge."|".$uname;
	}
	else
	{
	echo "Failed";
	}
?>