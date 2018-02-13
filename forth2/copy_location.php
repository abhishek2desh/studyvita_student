<?php
	
	$m_n = $_GET['mn'];

	$ext = ".pdf";
	
	$ending = "C:\\inetpub\\swf\\test_flexpaper_docs\\$m_n".$ext;
	
	$server = "\\\ALNITEC-73N4CS8\\swf\\test_flexpaper_docs\\$m_n".$ext;
	
	//echo "$server \n";
	//echo "$ending \n";
	if(file_exists($server))
	{
		//echo $code;
		copy("$server","$ending");
	}
	else
	{
		echo "Still working... Please try after some time.";
	}
	
?>