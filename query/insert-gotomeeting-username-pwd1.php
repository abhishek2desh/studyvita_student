<?php
		require_once("../config.php");
		$fac_id = $_GET['fac_id'];
		$uname = $_GET['uname'];
		$pwd= $_GET['pwd'];
		$virtualid= $_GET['virtualid'];
			
		
		$sql = "INSERT INTO virtual_class_emailpwd_faculty_used(`email`,`pwd`,`webinar_class_id`,`user_id`)
			values('$uname','$pwd','$virtualid','$fac_id')";
			$result = mysql_query($sql);
			//echo $rw;
			if ($result)
			{
				
			}
			else
			{
			
			}

?>