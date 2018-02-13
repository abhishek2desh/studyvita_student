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
	
	//$result=mysql_query("SELECT DISTINCT id,CONCAT(DATE_FORMAT(test_date,'%d-%m-%Y'),'-',test_time) AS test_date, from_date,to_date,duration,IF('$formatDate' < from_date , 'coming_soon', IF(to_date < '$formatDate', 'expire','star_test ')) AS diff,given_test,sub_id,marks,test_Date FROM test_announce ta,onlineuniqid oq WHERE  ta.id=oq.TestID AND user_id='$uid' ");
	
	$result=mysql_query("SELECT DISTINCT q.name,CONCAT(DATE_FORMAT(test_date,'%d-%m-%Y'),'-',test_time) AS test_date,
	DATE_FORMAT(from_date,'%d-%m-%Y , %H-%i-%s'),DATE_FORMAT(to_date,'%d-%m-%Y , %H-%i-%s'),duration,IF('$formatDate' < from_date , 'coming_soon', 
	 IF(to_date < '$formatDate', 'expire','star_test ')) AS diff,given_test,sub_id,marks,test_Date,sub.name,CONCAT(ta.chap_id,'',ta.description)
	FROM test_announce ta,onlineuniqid oq,que_paper q,SUBJECT sub WHERE  ta.que_paper_id=q.id AND ta.sub_id=sub.id
	AND q.name=oq.TestID AND user_id='$uid' AND ta.OnlineTest = '1' and ta.sub_id='20' ORDER BY ta.test_date DESC");
	
	echo "<table style='border:solid 1px;width:100%;'>";
	
	while($row=mysql_fetch_array($result))
	{
		echo "<tr id='$row[0]'>";
			
			//disabled="disabled"
			$SQL_1 = "SELECT Test_Submit FROM adaptive_learning_test WHERE test_id='$row[0]' AND student_id='$uid'";
			$result_1=mysql_query($SQL_1) or die($SQL_1."<br/><br/>".mysql_error());
			$row_1=mysql_fetch_row($result_1);
			if($row_1[0] == 1)
			{
				echo "<td style='width:10%;color:black;border-bottom:2px solid #005000;'><input type='checkbox' name='$row[4]' id='$row[0]' disabled='disabled' class='$row[5]' value='$row[7]' />".$row[0]."</td></center>
				<td id='$row[10]' style='color:black;border-bottom:2px solid #005000;width:10%;'>Mock</td><td style='color:black;border-bottom:2px solid #005000;width:25%;'>".$row[11]."</td>
				<td style='color:black;border-bottom:2px solid #005000;width:35%;'>".$row[2]." &nbsp;&nbsp;&nbsp;&nbsp;".$row[3]."</td>
				<td style='color:black;border-bottom:2px solid #005000;width:12%;'>&nbsp;&nbsp;&nbsp;&nbsp;".$row[4].":Min</td>";
			
			}
			else
			{
				if($row[5] == 'coming_soon')
				{
					echo "<td style='width:10%;color:black;border-bottom:2px solid #005000;'><input type='checkbox' name='$row[4]' id='$row[0]' disabled='disabled' class='$row[5]' value='$row[7]' />".$row[0]."</td></center>
					<td id='$row[10]' style='color:black;border-bottom:2px solid #005000;width:10%;'>Mock</td><td style='color:black;border-bottom:2px solid #005000;width:25%;'>".$row[11]."</td>
					<td style='color:black;border-bottom:2px solid #005000;width:35%;'>".$row[2]." &nbsp;&nbsp;&nbsp;&nbsp;".$row[3]."</td>
					<td style='color:black;border-bottom:2px solid #005000;width:12%;'>&nbsp;&nbsp;&nbsp;&nbsp;".$row[4].":Min</td>";
				}
				else
				{
					echo "<td style='width:10%;color:black;border-bottom:2px solid #005000;'><input type='checkbox' name='$row[4]' id='$row[0]' class='$row[5]' value='$row[7]' />".$row[0]."</td></center>
					<td id='$row[10]' style='color:black;border-bottom:2px solid #005000;width:10%;'>Mock</td><td style='color:black;border-bottom:2px solid #005000;width:25%;'>".$row[11]."</td>
					<td style='color:black;border-bottom:2px solid #005000;width:35%;'>".$row[2]." &nbsp;&nbsp;&nbsp;&nbsp;".$row[3]."</td>
					<td style='color:black;border-bottom:2px solid #005000;width:12%;'>&nbsp;&nbsp;&nbsp;&nbsp;".$row[4].":Min</td>";
				}
			}
			if($row[5] == 'coming_soon')
			{
				echo "<td id='expire_id' value='coming_soon' style='width:15%;color:black;border-bottom:2px solid #005000;'><div style='color:green;font-size:14px;'><blink>Coming Soon</link></div></td>";
			}
			else if($row[5] == 'expire')
			{
				echo "<td id='expire_id' value='expire' style='width:15%;color:black;border-bottom:2px solid #005000;'><div style='color:red;font-size:14px;'>Expired<input type='button' class='online_test_result_view' id='view_result1' value='Result' /></td>";
			}
			else
			{
				$SQL_1 = "SELECT Test_Submit FROM adaptive_learning_test WHERE test_id='$row[0]' AND student_id='$uid'";
				$result_1=mysql_query($SQL_1) or die($SQL_1."<br/><br/>".mysql_error());
				$row_1=mysql_fetch_row($result_1);
				if($row_1[0] == 1)
				{
					echo "<td id='expire_id' value='expire' style='width:15%;color:black;border-bottom:2px solid #005000;'><input type='button' class='online_test_result_view' id='view_result1' value='View Result' /></td>";
				}
				else
				{
					echo "<td id='expire_id' value='active' style='width:10%;color:black;border-bottom:2px solid #005000;'><div style='color:Green;font-size:14px;'>Active</div></td>";
				}
			}
			echo "<td id='rowid8' value ='$row[8]'  style='visibility: hidden;color:black;border-bottom:2px solid #005000;'></td>";
			echo "<td id='rowid9' value ='$row[9]'  style='visibility: hidden;color:black;border-bottom:2px solid #005000;'></td>";
			//echo "<td id='expire_id1' value ='$row[5]'  style='color:black;border-bottom:2px solid #005000;'></td>";
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
	//org var url = "24_view_test_result.php?test_announce_id="+online_id+"&uid="+uid;
	var url = "view_my_result_admin.php";
	//alert(url);
	
	window.open(url, 'Your Result', 'height=1000,width=2000,left=0,top=0,resizable=yes,scrollbars=yes,toolbar=no,menubar=no,location=no,directories=no,status=no');
});

</script>
<?php
	include_once '../conn_close.php';
?>