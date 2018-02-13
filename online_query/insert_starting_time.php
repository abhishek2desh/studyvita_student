<?php 
include_once '../config.php';

	$sid = $_GET['student_id'];
	$mid = $_GET['mat_id'];
	$s_time = $_GET['start_time'];

	$SQL_1 = "SELECT id FROM online_test_student_time_duration
				WHERE student_id = '$sid'
				AND material_id = '$mid'"; 
	$result_1 = mysql_query( $SQL_1 ) or die("Couldn t execute query.".mysql_error()); 
	
	$num = mysql_num_rows($result_1);
	
	if($num == 0)
	{
		$SQL = "INSERT INTO online_test_student_time_duration 
			(`student_id`,`material_id`,`start_time`) VALUES
			('$sid','$mid','$s_time')";
	
		$result = mysql_query($SQL);
		if ($result)
		{
			echo "Success";
		}
		else
		{
			echo "Failed";
		}
	}
	else
	{
		while($row_1 = mysql_fetch_array($result_1,MYSQL_ASSOC)) 
		{ 
			$s2 = $row_1[0];
			
			$SQL_2 = "UPDATE online_test_student_time_duration SET start_time = '$s_time'
					WHERE id = $s2";
	
			$result_2 = mysql_query($SQL_2);
			if ($result_2)
			{
				echo "Success";
			}
			else
			{
				echo "Failed";
			}
		}
	}
	include_once '../conn_close.php';
?>