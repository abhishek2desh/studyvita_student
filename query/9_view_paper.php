<?php
		include_once '../config.php';
		
		$code=$_GET['code'];
		
		$get_mat=$code.".pdf";
		
		//$new_path="\\\ALNITEC-73N4CS8\\Eduservermaterials\\Assignments\\Objective\\".$get_mat;
		//$new_path="\\\ALNITEC-73N4CS8\\Tempquestions\\".$dc1."\\".$type."\\".$get_mat;
		$ending = "C:\\inetpub\\swf\\test_flexpaper_docs\\$get_mat";
		if(file_exists($ending))
		{
			echo 1;
		}
		else
		{
		
			echo "Still working... Please try after some time.";
			
			
		}
		//include '../conn_close.php';
?>