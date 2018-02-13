<?php
	include "../config.php";
	
	$batch_val = $_GET['batch_val'];
	$uid = $_GET['uid'];
	$cid = $_GET['cid'];
	
	$result=mysql_query("SELECT id,branch_id,board_id,standard_id FROM batch WHERE id='$batch_val'");
	$row=mysql_fetch_array($result);
	$branch_id=$row[1];
	$board_id=$row[2];
	$std_id=$row[3];
	
	$result1=mysql_query("SELECT id,NAME,email,contact_no FROM USER WHERE  id='$uid'");
	$row1=mysql_fetch_array($result1);
	$rw_nm=mysql_num_rows($result1);
	
	$user_id=$row1[0];
	$uname=$row1[1];
	$email_id=$row1[2];
	$contact=$row1[3];
	
	$result_al=mysql_query("SELECT * FROM `student_registered_course` WHERE course_id='$cid' AND user_id='$uid' AND batch_id='$batch_val'");
	//echo "SELECT * FROM `student_registered_course` WHERE course_id='$cid' AND user_id='$uid' AND batch_id='$batch_val'";
	$num_al=mysql_num_rows($result_al);
	if($num_al > 0)
	{
		echo "already";
	}
	else
	{
		if($rw_nm > 0)
		{
			$result1_std=mysql_query("SELECT DISTINCT edutech_student_id,enroll_id FROM `student_details` sd,`edutechstudentid_refid` erd WHERE sd.user_id='$user_id' AND sd.edutech_student_id = erd.student_id");
			$row1_std=mysql_fetch_array($result1_std);
			$rw1_std=mysql_num_rows($result1_std);
			if($rw1_std == 0)
			{
				$result1_3=mysql_query("SELECT MAX(student_id+1),MAX(enroll_id+1) FROM `edutechstudentid_refid` ");
				$row1_13=mysql_fetch_array($result1_3);
				$edutech_student_id=$row1_13[0];
				$enroll_id=$row1_13[1];
				
				$sql1 = "insert into edutechstudentid_refid(`student_id`,`enroll_id`,`used`)
				values('$edutech_student_id','$enroll_id','1')";
				$result3 = mysql_query($sql1);
				if ($result3)
				{
					//echo "pass";
				}
				else
				{
					//echo "Failed1";
				}
				$update_query=mysql_query("UPDATE user SET enroll_id='$enroll_id' WHERE id='$user_id'");
				$result3_u = mysql_query($update_query);
				if ($result3_u)
				{
					//echo "pass";
				}
				else
				{
					//echo "Failed1";
				}
			}
			else 
			{
				$edutech_student_id=$row1_std[0];
				$enroll_id_2=$row1_std[1];
				$update_query=mysql_query("UPDATE user SET enroll_id='$enroll_id_2' WHERE id='$user_id'");
				$result3_u = mysql_query($update_query);
				if ($result3_u)
				{
					//echo "pass";
				}
				else
				{
					//echo "Failed1";
				}
			}
			$sql = "insert into student_details(`user_id`,`edutech_student_id`,`group_id`,`standard_id`,`board_id`,`batch_id`,`branch_id`,`sname`,`sfullname`,`father_name`,`mother_name`,`school_name`,`area`,`res_phone_no`,`mobile_no`,`f_mob_no`,`m_mob_no`,`s_mob_no`,`pe_mailid`,`online_batch`,`photo`)values('$user_id','$edutech_student_id','11','$std_id','$board_id','$batch_val','$branch_id','$uname','$uname','','','','','','$contact','$contact','','$contact','$email_id','','')";
			$result = mysql_query($sql);
			if ($result)
			{
				$sql1 = "insert into student_registered_course(`course_id`,`user_id`,`batch_id`,`status`)
				values('$cid','$user_id','$batch_val','0')";
				$result1 = mysql_query($sql1);
				if ($result1)
				{
					echo "success";
				}
				else
				{
					echo "failed2";
				}
			}
			else
			{
				echo "failed1";
			}
		}
		else
		{
			echo "Wrong";
		}
	}
	
?>