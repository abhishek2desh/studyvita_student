<?php 
	include_once '../config.php';
	$contact_no=$_GET['contact_no'];
	$text_fact=$_GET['text_fact'];
	$msg=$_GET['sms_text'];
	$user_id=$_GET['user_id'];
	$smsfromaccount=$_GET['smsfromaccount'];
	$smscharge=$_GET['smscharge'];
	$user_scheme_id=$_GET['user_scheme_id'];
	$SQL = "INSERT INTO sms_backup
					(`msgtext`,`user_id`,`contact_no`,created_by,smstype) VALUES
					('$msg','$text_fact','$contact_no','$user_id','text')";
					//echo $SQL;
				$result = mysql_query($SQL);
				if ($result)
				{
					//echo "Success";	
				}
				else
				{
					echo "Failed";
				}
				
				$u_name="";
	$f_name="";
	$result_1=mysql_query("SELECT name FROM `user` WHERE id='$user_id' ");
	while($row_1=mysql_fetch_array($result_1))
	{
	$u_name=$row_1[0];
	
	}
	$result_2=mysql_query("SELECT name FROM `user` WHERE id='$text_fact' ");
	while($row_2=mysql_fetch_array($result_2))
	{
	$f_name=$row_2[0];
	
	}
	$description="";
	$description="Notification  sms send to : ".$f_name." by ".$u_name. " student";
	$total_left_bal="";
	$total_bal=0;
$result_3=mysql_query("SELECT total_balance FROM `user_recharge_usage_detail` WHERE user_id='$smsfromaccount' ORDER BY id DESC LIMIT 1");
	while($row_3=mysql_fetch_array($result_3))
						{
						$total_bal=$row_3[0];
						
						}
	$total_left_bal=$total_bal-$smscharge;
	$sql = "insert into user_recharge_usage_detail(`user_id`,`Total_Balance`,`scheme_id`,`Recharge_deduction`,`amount`,`Description`)
		values('$smsfromaccount','$total_left_bal','$user_scheme_id','D','$smscharge','$description')";
		//echo $sql;
		$result = mysql_query($sql);
		if ($result)
		{
			//echo "Success";
		}
		else
		{
			echo "Failed";
		}
?>