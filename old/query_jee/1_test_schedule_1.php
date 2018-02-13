<?php
	include '../config.php';
	
	$uid=$_GET['uid'];
	
	$currentDate = strtotime(date("Y-m-d H:i:s"));
	//$futureDate = $currentDate+(60*570.100002);
	$futureDate = $currentDate+(37810);
	$formatDate = date("Y-m-d H:i:s", $futureDate);
	
	//echo "<br/>".$currentDate;
	//echo "<br/>".$futureDate;
	//echo "<br/>".$formatDate;
	
	//$result=mysql_query("SELECT DISTINCT id,CONCAT(DATE_FORMAT(test_date,'%d-%m-%Y'),'-',test_time) AS test_date, from_date,to_date,duration,IF('$formatDate' < from_date , 'coming_soon', IF(to_date < '$formatDate', 'expire','star_test ')) AS diff,given_test,sub_id,marks,test_Date FROM test_announce ta,onlineuniqid oq WHERE  ta.id=oq.TestID AND user_id='$uid'");
	
	$result=mysql_query("SELECT DISTINCT alt.test_id,s.name,alt.noq,alt.total_time,alt.start_time,cp.name,IF('$formatDate' < from_date , 'coming_soon', IF(to_date < '$formatDate', 'expired','Active ')),s.id,cp.id,from_date,to_date,Test_Submit,s.sort_name FROM  `adaptive_learning_test`  alt,chapter cp,SUBJECT  s WHERE  student_id='$uid' AND test_type='adaptive_test' AND alt.subject=s.id AND alt.chapter_id=cp.id ORDER BY test_id DESC");
	
	echo "<table style='border:solid 1px;width:100%;'>";
	
	while($row=mysql_fetch_array($result))
	{
		echo "<tr>";
			if($row[11] == 1)
			{
				echo "<td style='width:10%;color:black;border-bottom:2px solid #005000;'><input type='checkbox' name='$row[4]' id='$row[0]-$row[1]-$row[2]-$row[3]-$row[7]-$row[8]-$row[12]' class='$row[5]' value='$row[7]' disabled='disabled' value='$row[0]' />".$row[0]."</td></center>
				<td id='$row[10]' style='color:black;border-bottom:2px solid #005000;width:10%;'>".$row[1]."</td>
				<td style='color:black;border-bottom:2px solid #005000;width:25%;'>".$row[5]."</td>
				<td style='color:black;border-bottom:2px solid #005000;width:35%;'>".$row[9]." To ".$row[10]."</td>
				<td style='color:black;border-bottom:2px solid #005000;width:25%;'>".$row[3]."</td>
				<td style='color:black;border-bottom:2px solid #005000;width:25%;'>Completed</td>";
			}
			else
			{
				if($row[6] == 'expired')
				{
					echo "<td style='width:10%;color:black;border-bottom:2px solid #005000;'><input type='checkbox' name='$row[4]' id='$row[0]-$row[1]-$row[2]-$row[3]-$row[7]-$row[8]-$row[12]' disabled='disabled' class='$row[5]' value='$row[7]' value='$row[0]' />".$row[0]."</td></center>";
				}
				else
				{
					echo "<td style='width:10%;color:black;border-bottom:2px solid #005000;'><input type='checkbox' name='$row[4]' id='$row[0]-$row[1]-$row[2]-$row[3]-$row[7]-$row[8]-$row[12]' class='$row[5]' value='$row[7]' value='$row[0]' />".$row[0]."</td></center>";
				}
				echo "<td id='$row[10]' style='color:black;border-bottom:2px solid #005000;width:10%;'>".$row[1]."</td>
				<td style='color:black;border-bottom:2px solid #005000;width:25%;'>".$row[5]."</td>
				<td style='color:black;border-bottom:2px solid #005000;width:35%;'>".$row[9]." To ".$row[10]."</td>
				<td style='color:black;border-bottom:2px solid #005000;width:25%;'>".$row[3]."</td>
				<td style='color:black;border-bottom:2px solid #005000;width:25%;'>".$row[6]."</td>";
			}
		echo "</tr>";
	}
	echo "</table>";
	
?>
<script type="text/javascript" language="javascript">

$(".online_test_result_view").click(function(){
	var uid='<?php echo $uid; ?>';
	online_id = ($(this).closest('tr').attr('id'));
	sub = ($(this).closest('td').attr('id'));
	//alert(sub);
	var url = "24_view_test_result.php?test_announce_id="+online_id+"&uid="+uid;
	//alert(url);
	window.open(url, 'Your Result', 'height=700,width=1000,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=no,menubar=no,location=no,directories=no,status=no');
});

</script>
<?php
	include_once '../conn_close.php';
?>