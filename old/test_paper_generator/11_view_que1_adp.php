<?php

	include_once '../config.php';
	
	$test_id=$_GET['test_id'];
	$sub=$_GET['sub'];
	$vl=$_GET['vl'];
	$uid=$_GET['uid'];
	$t_t=$_GET['t_t'];
	$result=mysql_query("SELECT qno,uniq_id,response FROM `adaptive_test_response` WHERE test_id='$test_id' AND student_id='$uid'");
	echo "<table>";
	while($row=mysql_fetch_array($result))
	{
		if($new_val == 3)
		{	
			$new_val=0;
			$new_val++;
			echo "</tr>";
			echo "<tr>";
				echo "<td><input type='radio' name ='name_que' id='$row[0]-$row[1]' class='chk' /><font size='4em' >".$row[0]."</font></td>";
			if($row[2] == 'x')
			{
				echo "<td><div style='background-color:red;border:solid 0px;width:0.5em;height:0.5em;'></div></td>";
			}
			else if($row[2] == 'R')
			{
				echo "<td><div style='background-color:Yellow;border:solid 0px;width:0.5em;height:0.5em;'></div></td>";
			}
			else
			{
				echo "<td><div style='background-color:Green;border:solid 0px;width:0.5em;height:0.5em;'></div></td>";
			}
		}
		else
		{
			$new_val++;
			echo "<td><input type='radio' name ='name_que' id='$row[0]-$row[1]' class='chk' /><font size='4em' >".$row[0]."</font></td>";
			if($row[2] == 'x')
			{
				echo "<td><div style='background-color:red;border:solid 0px;width:0.5em;height:0.5em;'></div></td>";
			}
			else if($row[2] == 'R')
			{
				echo "<td><div style='background-color:Yellow;border:solid 0px;width:0.5em;height:0.5em;'></div></td>";
			}
			else
			{
				echo "<td><div style='background-color:Green;border:solid 0px;width:0.5em;height:0.5em;'></div></td>";
			}
		}
	}
	echo "</table>";
	include_once '../conn_close.php';
?>