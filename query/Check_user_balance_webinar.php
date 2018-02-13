<?php
		include '../config.php';
		$online_id2=$_GET['online_id2'];
		$uid=$_GET['uid'];
		$total_bal=0;
		$total_charge=0;
		$result=mysql_query("SELECT total_Balance FROM `user_recharge_usage_detail` WHERE user_id='$uid' ORDER BY id DESC LIMIT 1");
			$rw = mysql_num_rows($result);
			if($rw==0)
			{
			echo "R";
			}
			else
			{
				while($row=mysql_fetch_array($result))
				{
					$total_bal=$row[0];
				}
				if($total_bal<0 || $total_bal==0)
				{
					echo "I";
					
				}
				else
				{
					$result1=mysql_query("SELECT fees FROM `virtual_class_faculty` WHERE id='$online_id2'");
					while($row1=mysql_fetch_array($result1))
					{
						$total_charge=$row1[0];
					}
					if($total_bal<$total_charge)
					{
					echo "I";
					}
					else
					{
					}
				}				
			}
	
?>