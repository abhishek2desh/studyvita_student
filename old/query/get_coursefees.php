<?php
		include '../config.php';
		$course_id=$_GET['course_id'];
	
		
		$result=mysql_query("SELECT course_fees FROM `course` WHERE id='$course_id'  ");
		$rw = mysql_num_rows($result);
		if($rw==0)
		{
		 echo "0";
		}
		else
		{
	
			while($row=mysql_fetch_array($result))
			{
			echo $row[0];
			}
			
		}
?>