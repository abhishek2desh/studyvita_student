<?php
	include '../config.php';
	
	$m_n=$_GET['mn'];
	
	$result=mysql_query("SELECT path FROM document_manager_subjective WHERE MaterialName='$m_n'");
	$row=mysql_fetch_array($result);
	$dir= $row[0];
	$ext = ".pdf";
	
	$ending = "C:\\inetpub\\swf\\test_flexpaper_docs\\$m_n".$ext;
	
	$m_n = $_GET['mn'];
	
	$dir2=substr($dir, 0, -4);
	
	$dir3 =  $dir2.".pdf";
	

	$chk=substr($dir2, 0, 1);
	
	//echo $chk;
	$dir4 = substr($dir3, 2);
	
	if($chk == "S")	{	$dt = "Edutech Materials";	}
	
	else if($chk == "U")	{	$dt = "EdutechData";	}
	
	else if($chk == "V")	{	$dt = "paresh";	}
	
	else if($chk == "R")	{	$dt = "Tempquestions";	}
	
	else if($chk == "L")	{	$dt = "Eduservermaterials";	}
	
	$server = "\\\ALNITEC-73N4CS8\\";

	$path1 = $server."$dt".$dir4;
	//echo $path1;
	//echo $ending;
	
	copy("$path1","$ending");
	include_once '../conn_close.php';
?>