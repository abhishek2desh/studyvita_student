<?php
	
		include_once '../config.php';
		
		$test_id=$_GET['test_id'];
		$uid=$_GET['uid'];
		
		$result=mysql_query("SELECT sd.edutech_student_id,u.name FROM USER u,student_details sd WHERE sd.user_id=u.id
							AND u.id='$uid'");
		$rw = mysql_num_rows($result);
		$row=mysql_fetch_array($result);
		$edutech_id=$row[0];
		$name=$row[1];
		$report_name=$edutech_id.$name.$test_id;
		$ext = ".pdf";
		$ending = "C:\\inetpub\\swf\\test_flexpaper_docs\\$report_name".$ext;
		$server = "\\\ALNITEC-73N4CS8\\Tempquestions\\OnlineDiagnosticReport\\$report_name".$ext;
		if(file_exists($server))
		{
			echo $report_name;
			copy("$server","$ending");
		}
		else
		{
			echo "Still working... Please try after some time.";
		}
		include_once '../conn_close.php';
?>