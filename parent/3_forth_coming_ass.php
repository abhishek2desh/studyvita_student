<?php
	
	include '../config.php';
	session_start();
	$s5=$_SESSION['sid'];
	$currentDate = strtotime(date("Y-m-d H:i:s"));
	$futureDate = $currentDate+(60*570.100002);
	$formatDate = date("Y-m-d H:i:s", $futureDate);
	
	$SQL = "SELECT t.from_date AS from_date,t.to_date AS to_date,s.name AS sub,q.name AS test_id
	,t.description AS descr,t.marks AS mark,t.duration AS dur,t.id,
	IF('$formatDate' < from_date , 'coming_soon', IF(to_date < '$formatDate', 'expire','star_test ')) AS diff,t.test_date
	FROM test_announce t,SUBJECT s,que_paper q
	WHERE t.user_id='$s5'
	AND t.sub_id = s.id
	AND t.que_paper_id = q.id";
	
	$result=mysql_query($SQL) or die($SQL."<br/><br/>".mysql_error());
	
	echo "<tr>";
	echo "<th width='20%'>Test Date </th>";
	
	echo "<th>Subject </th>";
	echo "<th>Test ID </th>";
	echo "<th>Description </th>";
	
	//echo "<th>Status</th>";
	echo "</tr>";
	
	while($row=mysql_fetch_row($result))
	{	
		echo "<tr id='$row[7]'>";
			echo "<td>".$row[9]."</td>";
			
			echo "<td>".$row[2]."</td>";
			echo "<td>".$row[3]."</td>";
			echo "<td>".$row[4]."</td>";
			//echo "<td style='width:30%'>";
			if($row[8] == 'coming_soon')
			{
				echo "<div style='color:green;font-size:14px;'><blink>Coming Soon</link></div>";
			}else if($row[8] == 'expire')
			{
				echo "<div style='color:red;font-size:14px;'>Expire Test - <input type='button' class='online_test_result_view' value='View Result' /></div>";
			}
			else
			{
				$SQL_1 = "SELECT given_test FROM test_announce WHERE id = '$row[7]'";
				$result_1=mysql_query($SQL_1) or die($SQL_1."<br/><br/>".mysql_error());
				$row_1=mysql_fetch_row($result_1);
				if($row_1[0] == 1)
				{
					echo "<input type='button' class='online_test_result_view' value='View Result' />";
				}
				else
				{
					echo "<input type='button' class='online_test_php' value='Start Test' />";
				}
			}
			echo "</td>";
		echo "</tr>";
	}
	include_once '../conn_close.php';
?>