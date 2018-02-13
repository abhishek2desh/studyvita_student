<?php
	
	include_once '../config.php';
	session_start();
	$s5=$_SESSION['sid'];
	
	$result=mysql_query("SELECT teacher_name,teacher_email FROM `email_favorite_teacher` WHERE user_id='$s5' order by id desc ");
	
	$rw = mysql_num_rows($result);

		if($rw == 0)
		{
			echo "No Data Available";
			
		}
		else
		{
			echo "<table style='width:100%;border:solid 1px;' cellspacing='0'>";
			echo "<tr><th style='border:solid 1px;' width='70'>Name</th>";
			echo "<th style='border:solid 1px;' width='70'>Email</th>";
			echo "</tr>";
			while($row = mysql_fetch_array($result))
			{
				echo "<tr>";
				echo "<td style='border:solid 1px;'>".$row[0]."</td>";
				echo "<td style='border:solid 1px;'>".$row[1]."</td>";
				echo "<tr>";
			}
			echo "</table>";
		}
?>