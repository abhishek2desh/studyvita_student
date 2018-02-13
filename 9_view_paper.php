<?php
		include_once '../config.php';
		
		$code=$_GET['code'];
		//$dc=$_GET['dc'];
		//$type=$_GET['type'];
		
		$result11=mysql_query("SELECT documenttype,Examtype FROM `document_manager_subjective` WHERE documentcode='$code'");
		$row11=mysql_fetch_array($result11);
		$dc1=$row11[0]."s";
		$type=$row11[1];
		if($type == "SubObjective")
		{
			$type="Subjective";
		}
		$get_mat=$code.".pdf";
		
		//$new_path="\\\ALNITEC-73N4CS8\\Eduservermaterials\\Assignments\\Objective\\".$get_mat;
		$new_path="\\\ALNITEC-73N4CS8\\Tempquestions\\".$dc1."\\".$type."\\".$get_mat;
		$ending = "C:\\inetpub\\swf\\test_flexpaper_docs\\$get_mat";
		if(file_exists($new_path))
		{
			echo $code;
			copy("$new_path","$ending");
		}
		else
		{
		$new_path="\\\ALNITEC-73N4CS8\\Tempquestions\\Private_Documents\\".$get_mat;
		$ending = "C:\\inetpub\\swf\\test_flexpaper_docs\\$get_mat";
			if(file_exists($new_path))
			{
				echo $code;
				copy("$new_path","$ending");
			}
			else
			{
			echo "Still working... Please try after some time.";
			}
			
		}
		//include '../conn_close.php';
?>