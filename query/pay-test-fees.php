<?php
	include '../config.php';
	
	$stu_id=$_GET['uid'];
	$course_id=$_GET['course_id'];
	$batch_id=$_GET['batch_id'];
	$test_type=$_GET['testtype_pay'];
	$test_fees=0;
	$total_bal=0;
	$result=mysql_query("SELECT $test_type FROM demo_account_test_charge");
	while($row=mysql_fetch_array($result))
	{
	$test_fees=$row[0];
	}
		$course_name="";
	$rs = mysql_query("select course_fees,name from course where id='$course_id'");
	while($row=mysql_fetch_array($rs))
		{
		$course_name=$row[1];
		}
		$result11=mysql_query("SELECT total_balance,id FROM `user_recharge_usage_detail` WHERE user_id='$stu_id' ORDER BY id DESC LIMIT 1");
		while($row11=mysql_fetch_array($result11))
		{
		$total_bal=$row11[0];
		}
		if($total_bal>$test_fees || $total_bal==$test_fees)
		{
			$finalamt=$total_bal-$test_fees;
			$des=$test_type." Charge " ;
			$SQL = "INSERT INTO user_recharge_usage_detail (`user_id`,`Total_Balance`,`Recharge_deduction`,`amount`,Description) VALUES ('$stu_id','$finalamt','D','$test_fees','$des')";
			//echo $SQL;
						$result = mysql_query($SQL);
						if ($result)
						{
							$sql13 = "insert into studentwise_test_charge(`test_type`,`user_id`,`batch_id`,`test_charge`) values('$test_type','$stu_id','$batch_id','$test_fees')";
							$result1 = mysql_query($sql13);
							if ($result1)
							{
							}
							else
							{
							echo "failed";
							}
						}
							
							
							
							
							
						
						else
						{
						echo "failed";
						}			
		}
		else
		{
		echo "Insufficient balance.";
		}

?>