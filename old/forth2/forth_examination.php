<?php
	
		include_once '../config.php';
		session_start();
		$date=$_GET['dt'];
		$s5=$_SESSION['sid'];
		if($date == '')
		{
			$sql='';
		}
		else
		{
			$sql="AND ".$date;
		}
		$result=mysql_query("SELECT b.name,s.name,DATE_FORMAT(test_date,'%d-%m-%Y' ),test_time,ta.user_id
			FROM test_announce ta,batch b,SUBJECT s WHERE b.id=ta.batch_id AND ta.user_id='$s5' $sql AND s.id=ta.sub_id ORDER BY test_date DESC");
		
		$rw = mysql_num_rows($result);
		
		echo "<table style='width:100%;border: 1px solid black;'>";
		echo "<tr>";
			echo "<th style='width:20%;border: 1px solid black;'>Batch</td>";
			echo "<th style='width:20%;border: 1px solid black;'>Subject</td>";
			echo "<th style='width:20%;border: 1px solid black;'>Date Of Exam</td>";
			//echo "<th style='width:30%;border: 1px solid black;'>Test Time</td>";
		echo "</tr>";
		if($rw == "")
		{
			echo "<tr>";
					echo "<td style='width:33%;border: 1px solid black;'>No Data Available</td>";
			echo "</tr>";
		}
		else
		{
			while($row=mysql_fetch_array($result))
			{
				echo "<tr>";
					echo "<td style='width:20%;border: 1px solid black;'>".$row[0]."</td>";
					echo "<td style='width:20%;border: 1px solid black;'>".$row[1]."</td>";
					echo "<td style='width:20%;border: 1px solid black;'>".$row[2]."</td>";
					//echo "<td style='width:30%;border: 1px solid black;'>".$row[3]."</td>";
				echo "</tr>";
			}
		}
		echo "</table>";
		include_once '../conn_close.php';
?>
