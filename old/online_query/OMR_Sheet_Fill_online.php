<?php

	session_start();
	require_once("../config.php");
	
	$material_id = $_GET['material_id'];
	$today_dt = date("Y-m-d hh:mm:ss", strtotime('today'));

	$SQL = "SELECT COUNT(Question_no) AS total_question FROM material_correct_answers WHERE material_id='$material_id'"; 
	$result = mysql_query( $SQL ) or die("Couldn t execute query.".mysql_error()); 
	while($row = mysql_fetch_array($result,MYSQL_ASSOC)) { 
		
		$s2 = $row['total_question'];
	} 
	
	echo "<div id='student_come_online_test'>
			<table>
				<tr>
					<td></td><td>A</td><td>B</td><td>C</td><td>D</td>
				</tr>";
				
				for($i=1; $i<=$s2; $i++)
				{
				echo "
					<tr>
						<td>";
							echo $i;
						echo '</td>';
						echo '<td>';
							echo "<input type='checkbox' id='$i-A' class='CK1' name='A' value='A'>";
						echo '</td>';
						echo '<td>';
							echo "<input type='checkbox' id='$i-B' class='CK1' name='B' value='B'>";
						echo '</td>';
						echo '<td>';
							echo "<input type='checkbox' id='$i-C' class='CK1' name='C' value='C'>";
						echo '</td>';
						echo '<td>';
							echo "<input type='checkbox' id='$i-D' class='CK1' name='D' value='D'>";
						echo '</td>';
					echo '</tr>';
				}
			echo "</table>
		</div>";
		include_once '../conn_close.php';
?>