<?php
		include '../config.php';
		$course_id=$_GET['course_id'];
		$uid=$_GET['uid'];
		
		 $result = mysql_query("SELECT DISTINCT expire_date,DATE_FORMAT(expire_date,'%d-%m-%Y') 
			FROM student_registered_course  WHERE course_id='$course_id' AND user_id='$uid'");
		$rw = mysql_num_rows($result);
		if($rw==0)
		{
		echo "success";
		}
		else
		{
			while($row=mysql_fetch_array($result))
			{
				if($row[0]=="")
				{
				echo "success";
				}
				else
				{
					 $today = date("Y-m-d", strtotime('today'));
					if(strtotime($today)>strtotime($row[0]))
					{
					//echo "Course expired. Please renew course.";
					echo "success";
					}
					else
					{
					echo "success";
					}
				}
			}
		}
		
?>