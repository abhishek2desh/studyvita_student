<?php
	include '../config.php';
	
	$uid=$_GET['uid'];
	
	$currentDate = strtotime(date("Y-m-d H:i:s"));
	$resultf=mysql_query("SELECT date_formula from server_date_formula where active='1'");
	$formula=0;
	while($rowf=mysql_fetch_array($resultf))
	{
	$formula=$rowf[0];
	}
	$futureDate = $currentDate+($formula);
		$formatDate = date("Y-m-d H:i:s", $futureDate);
	//$futureDate = $currentDate+(60*570.100002);
	//$futureDate = $currentDate+(37810);
	
	//37810
	//$futureDate = $currentDate+(34210);
	//$formatDate = date("Y-m-d H:i:s", $futureDate);
	
	//echo "<br/>".$currentDate;
	//echo "<br/>".$formatDate;
	//echo "<br/>".$formatDate;
	
	//$result=mysql_query("SELECT DISTINCT id,CONCAT(DATE_FORMAT(test_date,'%d-%m-%Y'),'-',test_time) AS test_date, from_date,to_date,duration,IF('$formatDate' < from_date , 'coming_soon', IF(to_date < '$formatDate', 'expire','star_test ')) AS diff,given_test,sub_id,marks,test_Date FROM test_announce ta,onlineuniqid oq WHERE  ta.id=oq.TestID AND user_id='$uid'");
	
	$result=mysql_query("SELECT DISTINCT alt.test_id,s.name,alt.noq,alt.total_time,alt.start_time,alt.chapter_id,IF('$formatDate' < from_date , 'coming_soon', IF(to_date < '$formatDate', 'expired','Active')),s.id,alt.combined_chapter,from_date,to_date,Test_Submit,s.sort_name FROM  `adaptive_learning_test`  alt,SUBJECT  s WHERE  student_id='$uid' AND Demand_test='1' AND alt.subject=s.id  ORDER BY test_id DESC");
	//echo "SELECT DISTINCT alt.test_id,s.name,alt.noq,alt.total_time,alt.start_time,alt.chapter_id,IF('$formatDate' < from_date , 'coming_soon', IF(to_date < '$formatDate', 'expired','Active')),s.id,alt.combined_chapter,from_date,to_date,Test_Submit,s.sort_name FROM  `adaptive_learning_test`  alt,SUBJECT  s WHERE  student_id='$uid' AND Demand_test='1' AND alt.subject=s.id  ORDER BY test_id DESC";
	//exit;
	echo "<table style='border:solid 1px;'>";
	
	while($row=mysql_fetch_array($result))
	{
		echo "<tr>";
		$chapter="";
		if($row[5]=="")
				{
				if($row[8]=="")
				{
				}
				else
				{
					$lst = explode(",", $row[8]);
					
					foreach($lst as $item) 
					{
						if($item=="")
						{
							
						}
						else
						{
							$resultc=mysql_query("select name from chapter where id='$item'");
							while($rowc=mysql_fetch_array($resultc))
							{
							$chapter=$chapter.$rowc[0].",";
							}
						}
					}
				}
				
				}
				else
				{
					$resultc=mysql_query("select name from chapter where id='$row[5]'");
					
					while($rowc=mysql_fetch_array($resultc))
					{
					$chapter=$rowc[0];
					}
				}
			if($row[11] == 1)
			{
			
				echo "<td style='width:10%;color:black;border-bottom:1px solid #005000;'>".$row[0]."</td></center>
				<td id='$row[10]' style='color:black;border-bottom:1px solid #005000;width:10%;'>".$row[1]."</td>";
				
				echo "<td style='color:black;border-bottom:1px solid #005000;width:25%;'>".$chapter."</td>";
				echo"<td style='color:black;border-bottom:1px solid #005000;width:35%;'>".$row[9]." To ".$row[10]."</td>
				<td style='color:black;border-bottom:1px solid #005000;width:25%;'>".$row[3]."</td>
				<td style='color:black;border-bottom:1px solid #005000;width:25%;'>Completed</td>";
			}
			else
			{
				if($row[6] == 'expired')
				{
					echo "<td style='width:10%;color:black;border-bottom:1px solid #005000;'>".$row[0]."</td></center>";
				}
				else
				{
					if($row[6] == 'Active')
					{
					$act="a";
					echo "<td style='width:10%;color:black;border-bottom:1px solid #005000;'>".$row[0]."</td></center>";
					}
					else
					{
					$act="s";
					echo "<td style='width:10%;color:black;border-bottom:1px solid #005000;'>".$row[0]."</td></center>";
					}
					
				}
				echo "<td id='$row[10]' style='color:black;border-bottom:1px solid #005000;width:10%;'>".$row[1]."</td>";
				echo"<td style='color:black;border-bottom:1px solid #005000;width:25%;'>".$chapter."</td>";
				echo"<td style='color:black;border-bottom:1px solid #005000;width:35%;'>".$row[9]." To ".$row[10]."</td>
				<td style='color:black;border-bottom:1px solid #005000;width:25%;'>".$row[3]."</td>
				<td style='color:black;border-bottom:1px solid #005000;width:25%;'>".$row[6]."</td>";
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