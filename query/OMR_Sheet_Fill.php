<?php

	session_start();
	
	include_once '../config.php';
	$material_id = $_GET['material_id'];

	$SQL = "SELECT COUNT(Question_no) AS total_question FROM material_correct_answers WHERE material_id='$material_id'"; 
	$result = mysql_query( $SQL ) or die("Couldn t execute query.".mysql_error()); 
	while($row = mysql_fetch_array($result,MYSQL_ASSOC)) { 
		
		$s2 = $row['total_question'];
	} 
	
	echo "<table style='height:50px;'>
			<tr>
				<td>
					<div id='student_come'>
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
									echo "<input type='checkbox' id='$i-A' class='CK' name='A' value='A'>";
								echo '</td>';
								echo '<td>';
									echo "<input type='checkbox' id='$i-B' class='CK' name='B' value='B'>";
								echo '</td>';
								echo '<td>';
									echo "<input type='checkbox' id='$i-C' class='CK' name='C' value='C'>";
								echo '</td>';
								echo '<td>';
									echo "<input type='checkbox' id='$i-D' class='CK' name='D' value='D'>";
								echo '</td>';
							echo '</tr>';
						}
					echo "	
					</table>
					</div>
				</td>
			</tr>
		</table>";
		include_once '../conn_close.php';
?>