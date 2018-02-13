<?php
	include '../config.php';
	$report_name=$_GET['mn'];
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