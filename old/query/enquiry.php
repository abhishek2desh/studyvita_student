<?php
		include_once '../config.php';
		session_start();
		
		$uname = $_GET['uname'];
		$email_id = $_GET['email_id'];
		$mobile_no = $_GET['mobile_no'];
		$url_get_link = $_GET['url_get_link'];
		$today_date=date("Y-m-d");
		
		$insert_test=mysql_query("INSERT INTO enquiry(`dateofenq`,`sname`,`email`,`mobile`,`followupdate`,`EnquirySource`,`site_name`)VALUES('$today_date','$uname','$email_id','$mobile_no','$today_date','$url_get_link','$url_get_link')");
		if($insert_test)
		{
			echo "true";
		}
		else
		{
			echo "false";
		}
		include_once '../conn_close.php';
?>