<?php
	
	$m_n = $_GET['mn'];

	$ext = ".pdf";
	
	$ending = "C:\\inetpub\\swf\\test_flexpaper_docs\\$m_n".$ext;
	
	$server = "\\\ALNITEC-73N4CS8\\swf\\test_flexpaper_docs\\$m_n".$ext;
	
	echo "$server \n";
	echo "$ending \n";
	
	copy("$server","$ending");
	//include_once '../conn_close.php';
?>