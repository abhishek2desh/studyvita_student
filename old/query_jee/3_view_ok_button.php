<?php
	include '../config.php';
	
	$get_test_id=$_GET['get_test_id1'];
	$uid=$_GET['uid'];
	$sub=$_GET['sub'];
	$qno=$_GET['qno'];
	$sb_select_name=$_GET['sb_select_name'];
	$marks_for_review=$_GET['marks_for_review'];
	$marks_for_atm=$_GET['marks_for_atm'];
	$coma=",".$marks_for_review;
	$coma1=",".$marks_for_atm;
	$new_val=0;
	$i=0;
	
	if($sub == "")
	{
		if($sb_select_name == 'Mock')
		{
			$result=mysql_query("SELECT DISTINCT om.TestID,atr.Uniq_id,atr.Qno,atr.response,om.SubID FROM adaptive_test_response atr,omrcorrect om WHERE atr.test_id=om.TestID AND atr.test_id='$get_test_id' AND atr.student_id='$uid' AND om.Qno=atr.Qno ORDER BY atr.Qno");
		}
		else
		{
			$result=mysql_query("SELECT DISTINCT om.TestID,atr.Uniq_id,atr.Qno,atr.response,om.SubID FROM adaptive_test_response atr,omrcorrect om WHERE atr.test_id=om.TestID AND om.SubID='$sub' AND atr.test_id='$get_test_id' AND atr.student_id='$uid' AND om.Qno=atr.Qno ORDER BY atr.Qno");
		}
	}
	else
	{
		if($sb_select_name == 'Mock')
		{
			$result=mysql_query("SELECT DISTINCT om.TestID,atr.Uniq_id,atr.Qno,atr.response,om.SubID FROM adaptive_test_response atr,omrcorrect om WHERE atr.test_id=om.TestID AND atr.test_id='$get_test_id' AND atr.student_id='$uid' AND om.Qno=atr.Qno ORDER BY atr.Qno");
		}
		else
		{
			$result=mysql_query("SELECT DISTINCT om.TestID,atr.Uniq_id,atr.Qno,atr.response,om.SubID FROM adaptive_test_response atr,omrcorrect om WHERE atr.test_id=om.TestID AND om.SubID='$sub' AND atr.test_id='$get_test_id' AND atr.student_id='$uid' AND om.Qno=atr.Qno ORDER BY atr.Qno");
		}
	}
	$rw=mysql_num_rows($result);
	echo "<table>";
	if($rw == "")
	{
		echo "Failed";
	}
	else
	{
		while($row=mysql_fetch_array($result))
		{
			if($new_val == 3)
			{
				$new_val=0;
				$new_val++;
				echo "</tr>";
				echo "<tr>";
				echo "<td><input type='radio' name ='name_jee2' id='$row[1]-$i' class='' value='$row[2]' /><font size='4em' >".$row[2]."</font></td>";
				$item1=",".$row[1].",";
				
				if(strpos($coma1,$item1) !== false)
				{
					echo "<td><div style='background-color:green;border:solid 0px;width:0.5em;height:0.5em;'></div></td>";
				}
				else if(strpos($coma,$item1) !== false)
				{
					echo "<td><div style='background-color:yellow;border:solid 0px;width:0.5em;height:0.5em;'></div></td>";
				}
				else
				{
					echo "<td><div style='background-color:red;border:solid 0px;width:0.5em;height:0.5em;'></div></td>";
				}
			}
			else
			{
				$new_val++;
				echo "<td><input type='radio' name ='name_jee2' id='$row[1]-$i' class='' value='$row[2]' /><font size='4em' >".$row[2]."</font></td>";
				$item1=",".$row[1].",";
				
				if(strpos($coma1,$item1) !== false)
				{
					echo "<td><div style='background-color:green;border:solid 0px;width:0.5em;height:0.5em;'></div></td>";
				}
				else if(strpos($coma,$item1) !== false)
				{
					echo "<td><div style='background-color:yellow;border:solid 0px;width:0.5em;height:0.5em;'></div></td>";
				}
				else
				{
					echo "<td><div style='background-color:red;border:solid 0px;width:0.5em;height:0.5em;'></div></td>";
				}
			}
			$i++;
		}
	}
	echo "</table>";
	include_once '../conn_close.php';
?>