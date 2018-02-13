<?php
	$dir = $_GET['output'];
	$m_n = $_GET['mn'];

	$ext = ".pdf";
	$starting = "$dir".$ext;
	
	//echo "Copy file : ".$starting."<br/>";
	
	//$ending = "D:\\1234\\Dropbox\\Serverdocs\\Swf\\test_flexpaper_docs\\$m_n".$ext;
	$ending = "C:\\inetpub\\swf\\test_flexpaper_docs\\$m_n".$ext;
	//$ending = "C:\inetpub\\swf\\test_flexpaper_docs\\$m_n".$ext;
		
	echo "<br/>ALL data is===".$starting;
	echo "<br/>------".$ending."<br/><br/>";
	
	$chk=substr($dir, 0, 1);
	
	//echo "First Letter : ".$chk;
	
	$dir1 = substr($dir, 2);
	
	$dir2 = "$dir1".$ext;
	
	if($chk == "S")	{	$dt = "Edutech Materials";	}
	
	else if($chk == "U")	{	$dt = "EdutechData";	}
	
	else if($chk == "V")	{	$dt = "paresh";	}
	
	else if($chk == "R")	{	$dt = "Tempquestions";	}
	
	else if($chk == "L")	{	$dt = "Eduservermaterials";	}
	
	//$server = "\\\EDUTECH\\";
	$server = "\\\ALNITEC-73N4CS8\\";
	
	//Tempquestions (\\ALNITEC-73N4CS8)
	
	$path1 = $server."$dt".$dir2;
	
	echo $path1;
	
	copy("$path1","$ending");
?>