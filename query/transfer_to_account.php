<?php
	
		include_once '../config.php';
		
		$rc_id=$_GET['rc_id'];
		$amount=$_GET['amount'];
		$user_id=$_GET['user_id'];
		$today = date('Y-m-d H:i:s');
		$oldrcid="";
		$result1=mysql_query("SELECT MAX(id) FROM `user_recharge_usage_detail` WHERE user_id='$user_id' ");
		$row1=mysql_fetch_array($result1);
		$oldrcid=$row1[0];
		if($oldrcid=="" || $oldrcid<0)
		{
			$sql12 = "insert into user_recharge_usage_detail(`user_id`,`Total_Balance`,Recharge_deduction,amount,referal_code_id)
			values('$user_id','$amount','R','$amount','$rc_id')";
			$result3 = mysql_query($sql12);
			if ($result3)
			{
				echo "";
				$sql13 =  "UPDATE `referral_code_detail` SET `Transfer_to_account`='1',`Transfer_date`='$today' WHERE id='$rc_id'";
				$result4 = mysql_query($sql13);
				if ($result4)
				{
				}
				else
				{
				}
			}
			else
			{
				echo "failed3";
			}

		}
		else
		{
			$oldamount=0;
				$recharge_amt1=0;
					$result2=mysql_query("SELECT Total_Balance FROM `user_recharge_usage_detail` WHERE id='$oldrcid' ");
					$row2=mysql_fetch_array($result2);
						$oldamount=$row2[0];
						$recharge_amt1=$amount+$oldamount;
				$sql13 = "insert into user_recharge_usage_detail(`user_id`,`Total_Balance`,Recharge_deduction,amount,referal_code_id)
											values('$user_id','$recharge_amt1','R','$amount','$rc_id')";
											$result4 = mysql_query($sql13);
											if ($result4)
											{
												$sql15 =  "UPDATE `referral_code_detail` SET `Transfer_to_account`='1',`Transfer_date`='$today' WHERE id='$rc_id'";
												$result5 = mysql_query($sql15);
				if ($result5)
				{
				}
				else
				{
				}
											}
											else
											{
												echo "failed34";
											}
				
		}
?>