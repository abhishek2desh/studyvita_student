<?php
	
		include_once '../config.php';
		
		$uid=$_GET['uid'];
		$result=mysql_query("SELECT DISTINCT src.course_id,c.name FROM `student_registered_course` src,course c WHERE src.user_id='$uid' AND src.course_id=c.id AND STATUS='1'");
		$row = mysql_fetch_array($result);
		$rw = mysql_num_rows($result);
		if($rw == "")
		{
			echo "failed"."-".""."-".""."-"."";
		}
		else if($rw == 1)
		{
			echo "1"."-".$row[0]."-".$rw."-".$row[1];
		}
		else
		{
			echo "2"."-".""."-".$rw."-"."";
		}
		/*$result_ac=mysql_query("SELECT login_active FROM `user` WHERE id='$uid'");
		$row_ac = mysql_fetch_array($result_ac);
		$rd_loc=$row_ac[0];
		echo "-".$rd_loc;*/
?>