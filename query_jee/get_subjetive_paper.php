<?php
	include '../config.php';
	
	$test_id_new=$_GET['test_id_new'];
	$material_name="";
	$material_name_qus="";
	$dir="";
	$result=mysql_query("SELECT d.materialname
	FROM document_manager_subjective d,documentid_testid_refer dtr WHERE d.srno=dtr.documentid and dtr.testid='$test_id_new'");
	while($row=mysql_fetch_array($result))
	{
		$material_name=$row[0];
	}
	$material_name_qus=$material_name."_Qus";
	$result1=mysql_query("SELECT materialname,path
	FROM document_manager_subjective WHERE materialname='$material_name_qus'");
	while($row1=mysql_fetch_array($result1))
	{
		$dir=$row1[1];
	}
	//echo $dir."<br/>";
	$dir=substr($dir,0, strlen($dir)-4);
	//echo $dir."<br/>";
		$ext = ".pdf";
		$starting = "$dir".$ext;
		$ending = "C:\\inetpub\\swf\\test_flexpaper_docs\\$material_name_qus".$ext;
		$chk=substr($dir, 0, 1);
		$dir1 = substr($dir, 2);
		//$dir1=$dir;
		$dir2 = "$dir1".$ext;
		if($chk == "S")	{	$dt = "Edutech Materials";	}
		else if($chk == "U")	{	$dt = "EdutechData";	}
		else if($chk == "V")	{	$dt = "paresh";	}
		else if($chk == "R")	{	$dt = "Tempquestions";	}
		else if($chk == "L")	{	$dt = "Eduservermaterials";	}
		$server = "\\\ALNITEC-73N4CS8\\";
		$path1 = $server."$dt".$dir2;
		//echo $path1;
		if(file_exists($path1))
		{//
			echo $material_name_qus.$ext;
			copy("$path1","$ending");
			
		}
		else
		{
			echo "Failed";
		}
?>