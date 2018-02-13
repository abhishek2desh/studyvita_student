<?php
		
		include 'config.php';
		$test_id=$_GET['download_id'];
		$fac_id=$_GET['fac_id'];
		
	$rc_id=0;
		$mat_name="";
	
		$today34 = date("Y-m-d H:i:s",strtotime(date("Y-m-d H:i:s")." +630 minutes"));
		//$today34 = date("Y-m-d H:i:s");
		$al_test=mysql_query("SELECT Srno,Examtype,Documenttype,MaterialName,subject,path FROM document_manager_subjective WHERE Srno='$test_id'");
		$rw_test=mysql_num_rows($al_test);
		while($row_test=mysql_fetch_array($al_test))
		{
			if($row_test[2]=="ppt")
			{
			$fmn=$row_test[3].".ppt";
			}
			else
			{
			$fmn=$row_test[3].".pdf";
			}
			$sub_id =$row_test[4];
		
		$mat_name=$row_test[3];
			$sub_id =$row_test[4];
			$dir = $row_test[5];
			$chk=substr($dir, 0, 1);
			$dir1 = substr($dir, 2);
			if($chk == "S")	{	$dt = "Edutech Materials";	}
	
	else if($chk == "U")	{	$dt = "EdutechData";	}
	
	else if($chk == "V")	{	$dt = "paresh";	}
	
	else if($chk == "R")	{	$dt = "Tempquestions";	}
	
	//$server = "\\\EDUTECH\\";
	$server = "\\\ALNITEC-73N4CS8\\";
	//substr($dir1, 0,strlen($dir1)-3)
	if($row_test[2]=="ppt")
	{
	$filename = $server.$dt.substr($dir1, 0,strlen($dir1)-3)."ppt";
	}
	else
	{
	$filename = $server.$dt.substr($dir1, 0,strlen($dir1)-3)."pdf";
	}
			
			$totalpage=0;
			$pdftext = file_get_contents($filename);
			$totalpage = preg_match_all("/\/Page\W/", $pdftext, $dummy);
			
			
		
		if($row_test[2]=="ppt")
		{
		$fmn=$row_test[3].".ppt";
		}
		else
		{
		$fmn=$row_test[3].".pdf";
		}
			
		
			$buffer = file_get_contents($filename);
			header("Content-Type: application/force-download");
			header("Content-Type: application/octet-stream");
			header("Content-Type: application/download");
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
			header("Content-Type: application/octet-stream");
			header("Content-Transfer-Encoding: binary");
			header("Content-Length: " . strlen($buffer));
			header("Content-Disposition: attachment; filename=$fmn");
			echo $buffer;
			error_reporting(E_ERROR | E_WARNING | E_PARSE);
			
			$course_id=0;
				$batch_id=0;
				$rc_id=0;
			$sql23 = "INSERT INTO download_material_history(`user_id`,`document_id`,`course_id`,`batch_id`,`date_time`,download_type,user_recharge_id)
												VALUES('$fac_id','$test_id',0,0,'$today34','pdf','$rc_id')";	
			$result23 = mysql_query($sql23);
			if ($result23)
			{
			}	
			else
			{
			echo "fail";
			}
		//end download pdf
		
		
		
		
		
		
			
		}
		
?>