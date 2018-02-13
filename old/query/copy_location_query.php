<?php
	$dir = $_GET['output'];
	$m_n = $_GET['mn'];

	$ext = ".pdf";
	$starting = "$dir".$ext;
	
	//echo "Copy file : ".$starting."<br/>";
	
	//$ending = "D:\\1234\\Dropbox\\Serverdocs\\Swf\\test_flexpaper_docs\\$m_n".$ext;
		$ending = "C:\\inetpub\\swf\\test_flexpaper_docs\\$m_n".$ext;
	//echo "<br/>ALL data is===".$starting;
	//echo "<br/>------".$ending."<br/><br/>";
	
	$chk=substr($dir, 0, 1);
	
	//echo "First Letter : ".$chk;
	
	$dir1 = substr($dir, 2);
	
	//echo "dir 1 :  Letter : ".$dir1;
	$dir2 = "$dir1".$ext;
	//echo "dir 2 :  Letter : ".$dir2;
	//echo "<br/>director 1 :".$dir1;
	//echo "<br/>director 2 :".$dir2;
	
	if($chk == "S")	{	$dt = "Edutech Materials";	}
	
	else if($chk == "U")	{	$dt = "EdutechData";	}
	
	else if($chk == "V")	{	$dt = "paresh";	}
	
	else if($chk == "R")	{	$dt = "Tempquestions";	}
	
	else if($chk == "L")	{	$dt = "Eduservermaterials";	}
	
	//$server = "\\\EDUTECH\\";
	$server = "\\\ALNITEC-73N4CS8\\";
	$path1 = $server."$dt".$dir2;
	
	if(file_exists($path1))
	{
		
	}
	else
	{
	
	
	$ending = "C:\\inetpub\\swf\\test_flexpaper_docs\\$m_n".$ext;
	$server = "\\\ALNITEC-73N4CS8\\swf\\test_flexpaper_docs\\$m_n".$ext;
	
	//echo "$server \n";
	//echo "$ending \n";
	if (file_exists($server))
	{
	copy("$server","$ending");
	}
	else
	{
	echo "Still Working. Please Try After Sometime. Thank You.";
	}
	
		
	}
	//echo $path1;
	copy("$path1","$ending");
?>