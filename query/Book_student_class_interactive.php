<?php
		include '../config.php';
		$online_id2=$_GET['online_id2'];
		$uid=$_GET['uid'];
		$total_bal=0;
		$total_charge=0;
		$class_date="";
		$invited_id=0;
		$result=mysql_query("SELECT total_Balance FROM `user_recharge_usage_detail` WHERE user_id='$uid' ORDER BY id DESC LIMIT 1");
		while($row=mysql_fetch_array($result))
		{
			$total_bal=$row[0];
		}
		$result1=mysql_query("SELECT fees,DATE_FORMAT(class_date,'%d-%m-%Y'),invited_id FROM `ineractive_class_book_detail` WHERE id='$online_id2'");
		while($row1=mysql_fetch_array($result1))
		{
			$total_charge=$row1[0];
			$class_date=$row1[1];
			$invited_id=$row1[2];
		}
		$total_left_bal=$total_bal-$total_charge;
		$description="Booking of interactive class on ".$class_date; 
		$sql = "insert into user_recharge_usage_detail(`user_id`,`Total_Balance`,`Recharge_deduction`,`amount`,`Description`)
		values('$uid','$total_left_bal','D','$total_charge','$description')";
		//echo $sql;
		$result2 = mysql_query($sql);
		if ($result2)
		{
		if($invited_id=="")
		{
		$invited_id=0;
		}
			$sql1 = "insert into  ineractive_class_book_detail(`user_id`,`ineractive_class_id`,`interactive_class_invited_id`)
		values('$uid','$online_id2','$invited_id')";
		$result3 = mysql_query($sql1);
			if ($result3)
			{
			}
			else
			{
			echo "Failed1";
			}
		}
		else
		{
			echo "Failed";
		}
			
	
?>