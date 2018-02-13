<?php
		include_once '../config.php';
		$result=mysql_query("SELECT MAX(Srno) FROM document_manager_subjective");
		$rw = mysql_num_rows($result);
		$row=mysql_fetch_array($result);
		$max_srno=$row[0];
		$new_srno=$max_srno-2;
		$result1=mysql_query("SELECT path,MaterialName FROM document_manager_subjective WHERE Srno='$new_srno'");
		$row1=mysql_fetch_array($result1);
		$path_get=$row1[0];
		$material_get=$row1[1];
		//echo "<div id='get_mat_name' value='$material_get'></div>";
		//echo $material_get;
		$ext = ".pdf";
		$new_mat=$material_get.$ext;
		$new_path="\\\EDUTECH\\Tempquestions\\Questionpapers\\Objective\\".$new_mat;
		if(file_exists($new_path))
		{
			//echo "New path : ".$new_path."material name : ".$material_get;
			echo $material_get;
			//echo "New path file : \n".$new_path;
			$path1_get=substr($path_get, 0, -4);
			//echo $path1_get;
			$starting = "$path1_get".$ext;
			//echo "Copy file : ".$starting."\n";
			$ending = "C:\inetpub\\swf\\test_flexpaper_docs\\$material_get".$ext;
			//echo "\n Starting : ".$starting."\n";
			//echo "Ending".$ending."\n";
			$chk=substr($path1_get, 0, 1);
			//echo "First Letter : ".$chk;
			$dir1 = substr($path1_get, 2);
			$dir2 = "$dir1".$ext;
			//echo "\n First Direcrory : ".$dir1;
			//echo "\n Second Direcrory : ".$dir2;
			if($chk == "S")	{	$dt = "Edutech Materials";	}
			else if($chk == "U")	{	$dt = "EdutechData";	}
			else if($chk == "V")	{	$dt = "paresh";	}
			else if($chk == "R")	{	$dt = "Tempquestions";	}
			$server = "\\\EDUTECH\\";
			$path1 = $server."$dt".$dir2;
			//echo "\n path 1 : ".$path1;
			copy("$path1","$ending");
			
		}
		else
		{
			//echo "Not found on server to be generates";
			echo "Not found";
			
		}
		include_once '../conn_close.php';
?>