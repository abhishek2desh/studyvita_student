<?php
	include '../config.php';
	$stu_id=$_GET['uid'];
	$course_id=$_GET['course_id'];
	
	$course_fees=0;
	$total_bal=0;
	$stu_name="";
	$course_name="";
	$rs = mysql_query("select course_fees,name from course where id='$course_id'");
	while($row=mysql_fetch_array($rs))
		{
		$course_fees=$row[0];
		$course_name=$row[1];
		}
		$rs1 = mysql_query("select name from user where id='$stu_id'");
	while($row1=mysql_fetch_array($rs1))
		{
		$stu_name=$row1[0];
		}
		
		$result11=mysql_query("SELECT total_balance,id FROM `user_recharge_usage_detail` WHERE user_id='$stu_id' ORDER BY id DESC LIMIT 1");
		while($row11=mysql_fetch_array($result11))
		{
		$total_bal=$row11[0];
		}
		if($total_bal>$course_fees || $total_bal==$course_fees)
		{
			$finalamt=$total_bal-$course_fees;
			$des="Registration of course " .$course_name;
			$SQL = "INSERT INTO user_recharge_usage_detail (`user_id`,`Total_Balance`,`Recharge_deduction`,`amount`,Description) VALUES ('$stu_id','$finalamt','D','$course_fees','$des')";
			//echo $SQL;
						$result = mysql_query($SQL);
						if ($result)
						{
							$Date_now =date('Y-m-d');
							/*$result_mon=mysql_query("SELECT 12 * (YEAR(end_on) - YEAR(start_on)) +
    ((MONTH(end_on) - MONTH(start_on))) +
    SIGN(DAY(end_on) / DAY(start_on)),id
FROM batch WHERE id='$batch_id' ");
while($row_mon=mysql_fetch_array($result_mon))
		{
		$month=$row_mon[0];
		}*/
		$month=12;
						$login_expiry_date=date('Y-m-d', strtotime($Date_now. ' +'.$month .'months'));
						$result_rc_check=mysql_query("SELECT id,expire_date FROM `student_registered_course` WHERE course_id='$course_id'  and user_id='$stu_id' and batch_id='$batch_id'");
						$rc_check=mysql_num_rows($result_rc_check);
						if($rc_check==0)
						{
						$sql13 = "insert into student_registered_course(`course_id`,`user_id`,`batch_id`,`status`,join_date,expire_date,join_total_month) values('$course_id','$stu_id','$batch_id','1','$Date_now','$login_expiry_date','$month')";
						}
						else
						{
						$login_expiry_date_old="";
							while($row_result_rc = mysql_fetch_array($result_rc_check))
							{
							$login_expiry_date_old=$row_result_rc[0];
							}
							if($login_expiry_date_old=="")
							{
							}
							else
							{
							$login_expiry_date=date('Y-m-d', strtotime($login_expiry_date_old. ' +'.$month .'months'));
							}
						 $today = date("Y-m-d", strtotime('today'));
						$sql13 = "update student_registered_course set expire_date='$login_expiry_date',renew_date='$today',status='1'   where  course_id='$course_id'  and user_id='$stu_id' and batch_id='$batch_id'";
						}
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