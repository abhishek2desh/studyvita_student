<?php
		include '../config.php';
		
		
		
		$acttype="";
		$result_u=mysql_query("SELECT `Chapter_test_question` FROM student_demologin_criteria ");
			while($rowu=mysql_fetch_array($result_u))
			{
				 echo $rowu[0];
			}
			