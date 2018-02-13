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
		$result1=mysql_query("SELECT fees,DATE_FORMAT(class_date,'%d-%m-%Y'),invited_id,user_id,course_id FROM `virtual_class_faculty` WHERE id='$online_id2'");
		while($row1=mysql_fetch_array($result1))
		{
			$total_charge=$row1[0];
			$class_date=$row1[1];
			$invited_id=$row1[2];
			$fac_id=$row1[3];
			$course_id=$row1[4];
		}
		//goto labela;
		$total_left_bal=$total_bal-$total_charge;
		$description="Booking of Virtual class on ".$class_date; 
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
			$sql1 = "insert into  virtual_class_book_detail(`user_id`,`virtual_class_faculty_id`,`virtual_class_invited_id`)
		values('$uid','$online_id2','$invited_id')";
		$result3 = mysql_query($sql1);
			if ($result3)
			{
			//labela:
			//for insert in referal_code table
			//`created_by``institute_id`
			$rs2 = mysql_query("SELECT created_by,institute_id FROM user WHERE id='$uid' ");
			while($row2=mysql_fetch_array($rs2))
			{
			$created_by=$row2[0];
			$int_id=$row2[1];
			if($int_id=="")
			{
			$int_id=$created_by;
			}
			}
			if($int_id==$created_by)
			{
			$result_ref1=mysql_query("SELECT `student_discount_percentage`,
`service_tax_percentage`,`school_development_percentage`,`teacher_welfare_percentage`,principal_welfare_percentage,`coordinator_welfare_percentage`,`school_representative_percentage`,incentive_type FROM `course_fees_incentive_schoolwise` WHERE course_id='$course_id' AND school_id='$int_id' AND incentive_type='virtualclass'");

			}
			else
			{
			$rs2 = mysql_query("SELECT roll_id FROM user_roll WHERE user_id='$created_by' AND roll_id='21'");
			$rowcount=mysql_num_rows($rs2);
			if($rowcount>0)
			{
			$result_ref1=mysql_query("SELECT `student_discount_percentage`,
`service_tax_percentage`,`school_development_percentage`,`teacher_welfare_percentage`,principal_welfare_percentage,`coordinator_welfare_percentage`,`school_representative_percentage`,incentive_type FROM `course_fees_incentive_schoolwise` WHERE course_id='$course_id' AND school_id='$created_by' AND incentive_type='virtualclass'");

			}
			else
			{
			
			
			$result_ref1=mysql_query("SELECT `student_discount_percentage`,
`service_tax_percentage`,`school_development_percentage`,`teacher_welfare_percentage`,principal_welfare_percentage,`coordinator_welfare_percentage`,`school_representative_percentage`,incentive_type FROM `course_fees_incentive_schoolwise` WHERE course_id='$course_id' AND (school_id='$created_by' or school_id in(select created_by from user where id='$created_by'  ) AND incentive_type='virtualclass'");

			}
			
			}
			while($row_rf1=mysql_fetch_array($result_ref1))
			{
								$refreediscount=$total_charge;
							$refreediscount_servicetax=($refreediscount*$row_rf1[1])/100;
							$refreediscount=$refreediscount-$refreediscount_servicetax;
							$netpay_received=$refreediscount;
								$refreediscount_schooldep_per=($refreediscount*$row_rf1[2])/100;
								//$refreediscount=$refreediscount-$refreediscount_schooldep_per;
								$sql_ref2 = "insert into referral_code_detail(`course_id`,`Referral_code`,`End_user_id`,`Referee_incentive`,`End_user_discount`,course_fees,student_per,service_tax_per,school_develop_per,teacher_wf_per,principal_wf_per,coordinator_wf_per,school_representative_per,Net_Payment_received,incentive_type,virtual_class_id)values('$course_id','','$uid','$refreediscount_schooldep_per','0','$total_charge','$row_rf1[0]','$row_rf1[1]','$row_rf1[2]','$row_rf1[3]','$row_rf1[4]','$row_rf1[5]','$row_rf1[6]','$netpay_received','$row_rf1[7]','$online_id2')";
								
								$result_ref2 = mysql_query($sql_ref2);
								if ($result_ref2)
								{
									//echo "";
								}
								else
								{
									//echo "failed3";
								}
			}
			
			//end insert
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