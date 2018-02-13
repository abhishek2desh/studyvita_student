<?php
	$dir = $_GET['output'];
	$m_n = $_GET['mn'];
	$doctype1 = $_GET['doctype1'];
	$doc_type = $_GET['doc_type'];
	$sb1=$_GET['sb1'];
	
	if($doc_type == "eduserver")
	{

		$ext = ".pdf";
		$starting = $dir.$ext;
		$new_path="\\\ALNITEC-73N4CS8\\Tempquestions\\GlobalEduServer_docs\\".$sb1."\\$doctype1\\".$starting;
		$ending = "C:\\inetpub\\swf\\test_flexpaper_docs\\$starting";
		if(file_exists($new_path))
		{
			echo $dir;
			copy("$new_path","$ending");
		}
		else
		{
			//echo "Still working... Please try after some time.";
			//goto labelA;
			$ext = ".pdf";
		$starting = "$dir".$ext;
		$ending = "C:\\inetpub\\swf\\test_flexpaper_docs\\$m_n".$ext;
		$chk=substr($dir, 0, 1);
		$dir1 = substr($dir, 2);
		$dir2 = "$dir1".$ext;
		if($chk == "S")	{	$dt = "Edutech Materials";	}
		else if($chk == "U")	{	$dt = "EdutechData";	}
		else if($chk == "V")	{	$dt = "paresh";	}
		else if($chk == "R")	{	$dt = "Tempquestions";	}
		else if($chk == "L")	{	$dt = "Eduservermaterials";	}
		$server = "\\\ALNITEC-73N4CS8\\";
		$path1 = $server."$dt".$dir2;
		if(file_exists($path1))
		{
			echo $m_n;
			copy("$path1","$ending");
		}
		else
		{
			//echo "Still Working. Please Try After Sometime. Thank You.";
			$ext = ".pdf";
			$starting = $dir."_Qus".$ext;
			$new_path="\\\ALNITEC-73N4CS8\\Tempquestions\\GlobalEduServer_docs\\".$sb1."\\$doctype1\\".$starting;
			//echo $new_path;
			$ending = "C:\\inetpub\\swf\\test_flexpaper_docs\\$starting";
			if(file_exists($new_path))
			{
				$dir1=$dir."_Qus";
				echo $dir1;
				copy("$new_path","$ending");
			}
			else
			{
			echo "Still Working. Please Try After Sometime. Thank You1.";
			}
		}
		}
	}

	else
	{
	
		$ext = ".pdf";
		$starting = "$dir".$ext;
		$ending = "C:\\inetpub\\swf\\test_flexpaper_docs\\$m_n".$ext;
		$chk=substr($dir, 0, 1);
		$dir1 = substr($dir, 2);
		$dir2 = "$dir1".$ext;
		if($chk == "S")	{	$dt = "Edutech Materials";	}
		else if($chk == "U")	{	$dt = "EdutechData";	}
		else if($chk == "V")	{	$dt = "paresh";	}
		else if($chk == "R")	{	$dt = "Tempquestions";	}
		else if($chk == "L")	{	$dt = "Eduservermaterials";	}
		$server = "\\\ALNITEC-73N4CS8\\";
		$path1 = $server."$dt".$dir2;
		if(file_exists($path1))
		{
			echo $m_n.$ext;
			copy("$path1","$ending");
		}
		else
		{
			echo "Still Working. Please Try After Sometime. Thank You.";
			//echo $path1;
		}
	}
?>