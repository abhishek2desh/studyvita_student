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
	//$futureDate = $currentDate+(60*570.100002);
	//$futureDate = $currentDate+(37810);
		//$futureDate = $currentDate+(34210);
	$formatDate = date("Y-m-d H:i:s", $futureDate);
	
	//echo "<br/>".$currentDate;
	//echo "<br/>".$futureDate;
	//echo "<br/>".$formatDate;
	
	//$result=mysql_query("SELECT DISTINCT id,CONCAT(DATE_FORMAT(test_date,'%d-%m-%Y'),'-',test_time) AS test_date, from_date,to_date,duration,IF('$formatDate' < from_date , 'coming_soon', IF(to_date < '$formatDate', 'expire','star_test ')) AS diff,given_test,sub_id,marks,test_Date FROM test_announce ta,onlineuniqid oq WHERE  ta.id=oq.TestID AND user_id='$uid' ");
	
	/*org 13-4-16$result=mysql_query("SELECT DISTINCT q.name,CONCAT(DATE_FORMAT(test_date,'%d-%m-%Y'),'-',test_time) AS test_date,
	DATE_FORMAT(from_date,'%d-%m-%Y , %H-%i-%s'),DATE_FORMAT(to_date,'%d-%m-%Y , %H-%i-%s'),duration,IF('$formatDate' < from_date , 'coming_soon', 
	 IF(to_date < '$formatDate', 'expire','star_test ')) AS diff,given_test,sub_id,marks,test_Date,sub.name,CONCAT(ta.chap_id,'',ta.description),blueprint_id
	FROM test_announce ta,que_paper q,SUBJECT sub WHERE  ta.que_paper_id=q.id AND ta.sub_id=sub.id
	AND user_id='$uid' AND ta.OnlineTest = '1' and ta.sub_id<>'20' and ta.exam_type='31' ORDER BY ta.test_date DESC");*/
	$result=mysql_query("SELECT DISTINCT q.name,CONCAT(DATE_FORMAT(test_date,'%d-%m-%Y'),'-',test_time) AS test_date,
	DATE_FORMAT(from_date,'%d-%m-%Y  %H-%i-%s'),DATE_FORMAT(to_date,'%d-%m-%Y  %H-%i-%s'),duration,IF('$formatDate' < ta.from_date , 'coming_soon', 
	 IF(ta.to_date < '$formatDate', 'expire','star_test ')) AS diff,given_test,sub_id,marks,test_Date,sub.name,ta.description,blueprint_id,ta.faculty_id,ta.exam_board_id,ta.test_active FROM test_announce ta,que_paper q,SUBJECT sub WHERE  ta.que_paper_id=q.id AND ta.sub_id=sub.id
	AND user_id='$uid' AND ta.OnlineTest = '1' and ta.sub_id<>'20' and ta.exam_type='31' ORDER BY ta.test_date DESC");
	

	echo "<table style='border:solid 1px;width:100%;'>";
$blueprint_id=0;
	while($row=mysql_fetch_array($result))
	{
	
	//for checking uinqid exist or not 
	$blueprint_id=$row[12];
	if($blueprint_id==0)
	{
	$result_chk=mysql_query("SELECT DISTINCT uniqid FROM onlineuniqid WHERE testid='$row[0]' ");
	$row_chk=mysql_num_rows($result_chk);
	if($row_chk==0)
	{
	goto nextrec;
	}
	
	}
	//end checking

		echo "<tr id='$row[0]'>";
			
			//disabled="disabled"
			$SQL_1 = "SELECT Test_Submit FROM adaptive_learning_test WHERE test_id='$row[0]' AND student_id='$uid'";
			$result_1=mysql_query($SQL_1) or die($SQL_1."<br/><br/>".mysql_error());
			$row_1=mysql_fetch_row($result_1);
			$fact_name="";
			$fact_id=0;
			$image_path="";
			if (is_numeric($row[13])) 
			{
				$resulti=mysql_query("SELECT name,student_photos from user where id='$row[13]'");
	
				while($rowi=mysql_fetch_array($resulti))
				{
				$fact_name=$rowi[0];
				$image_path=$rowi[1];
				}
			}
			else
			{
			$fact_name=$row[13];
			}
			if($row_1[0] == 1)
			{
				echo "<td style='width:8%;color:black;border-bottom:2px solid #005000;'><input type='checkbox' name='$row[4]' id='$row[0]' disabled='disabled' class='$row[5]' value='$row[7]' />".$row[0]."</td></center>
				<td  style='color:black;border-bottom:2px solid #005000;width:10%;'>".$fact_name."</td>";
				if($image_path=="")
				{
				echo "<td style='color:black;border-bottom:2px solid #005000;width:7%;'></td>";
				}
				else
				{
				echo "<td style='color:black;border-bottom:2px solid #005000;width:7%;'><img src='../StudentPhotos/$image_path' style='width:3em;max-height:3em'></td>";
				}
				
				echo "<td id='$row[10]' style='color:black;border-bottom:2px solid #005000;width:10%;'>".$row[10]."</td>
				";
				
				echo"<td style='color:black;border-bottom:2px solid #005000;width:28%;'>".$row[11]."</td>
				<td style='color:black;border-bottom:2px solid #005000;width:20%;'>".$row[2]."  To <br/>".$row[3]."</td>
				<td style='color:black;border-bottom:2px solid #005000;width:7%;'>&nbsp;&nbsp;&nbsp;&nbsp;".$row[4].":Min</td>";
			}
			else
			{
				if($row[5] == 'coming_soon')
				{
					echo "<td style='width:8%;color:black;border-bottom:2px solid #005000;'><input type='checkbox' name='$row[4]' id='$row[0]' disabled='disabled' class='$row[5]' value='$row[7]' />".$row[0]."</td></center>";
					echo "<td  style='color:black;border-bottom:2px solid #005000;width:10%;'>".$fact_name."</td>";
					if($image_path=="")
				{
				echo "<td style='color:black;border-bottom:2px solid #005000;width:7%;'></td>";
				}
				else
				{
				echo "<td style='color:black;border-bottom:2px solid #005000;width:7%;'><img src='../StudentPhotos/$image_path' style='width:3em;max-height:3em'></td>";
				}
					echo "<td id='$row[10]' style='color:black;border-bottom:2px solid #005000;width:10%;'>".$row[10]."</td><td style='color:black;border-bottom:2px solid #005000;width:28%;'>".$row[11]."</td>
					<td style='color:black;border-bottom:2px solid #005000;width:20%;'>".$row[2]." To <br/>".$row[3]."</td>
					<td style='color:black;border-bottom:2px solid #005000;width:7%;'>&nbsp;&nbsp;&nbsp;&nbsp;".$row[4].":Min</td>";
				}
				else if($row[5] == 'expire')
				{
					echo "<td style='width:8%;color:black;border-bottom:2px solid #005000;'><input type='checkbox' name='$row[4]' id='$row[0]' disabled='disabled' class='$row[5]' value='$row[7]' />".$row[0]."</td></center>";
					echo "<td  style='color:black;border-bottom:2px solid #005000;width:10%;'>".$fact_name."</td>";
						if($image_path=="")
				{
				echo "<td style='color:black;border-bottom:2px solid #005000;width:7%;'></td>";
				}
				else
				{
				echo "<td style='color:black;border-bottom:2px solid #005000;width:7%;'><img src='../StudentPhotos/$image_path' style='width:3em;max-height:3em'></td>";
				}
					echo"<td id='$row[10]' style='color:black;border-bottom:2px solid #005000;width:10%;'>".$row[10]."</td><td style='color:black;border-bottom:2px solid #005000;width:28%;'>".$row[11]."</td>
					<td style='color:black;border-bottom:2px solid #005000;width:20%;'>".$row[2]." To <br/>".$row[3]."</td>
					<td style='color:black;border-bottom:2px solid #005000;width:7%;'>&nbsp;&nbsp;&nbsp;&nbsp;".$row[4].":Min</td>";
				}
				else
				{
					echo "<td style='width:10%;color:black;border-bottom:2px solid #005000;'><input type='checkbox' name='$row[4]' id='$row[0]' class='$row[5]' value='$row[7]' />".$row[0]."</td></center>";
					echo "<td  style='color:black;border-bottom:2px solid #005000;width:10%;'>".$fact_name."</td>";
						if($image_path=="")
				{
				echo "<td style='color:black;border-bottom:2px solid #005000;width:7%;'></td>";
				}
				else
				{
				echo "<td style='color:black;border-bottom:2px solid #005000;width:7%;'><img src='../StudentPhotos/$image_path' style='width:3em;max-height:3em'></td>";
				}
					echo "<td id='$row[10]' style='color:black;border-bottom:2px solid #005000;width:10%;'>".$row[10]."</td><td style='color:black;border-bottom:2px solid #005000;width:28%;'>".$row[11]."</td>
					<td style='color:black;border-bottom:2px solid #005000;width:20%;'>".$row[2]." To <br/>".$row[3]."</td>
					<td style='color:black;border-bottom:2px solid #005000;width:7%;'>&nbsp;&nbsp;&nbsp;&nbsp;".$row[4].":Min</td>";
				}
			}
			if($row[5] == 'coming_soon')
			{
				echo "<td id='expire_id' value='coming_soon' style='width:10%;color:black;border-bottom:2px solid #005000;'><div style='color:green;font-size:14px;'><blink>Coming Soon</link></div></td>";
			}
			else if($row[5] == 'expire')
			{
				echo "<td id='expire_id' value='expire' style='width:10%;color:black;border-bottom:2px solid #005000;'><div style='color:red;font-size:14px;'>Expired
				</td>";
				//echo "<td id='expire_id' value='expire' style='width:15%;color:black;border-bottom:2px solid #005000;'><div style='color:red;font-size:14px;'>Expired<input type='button' class='online_test_result_view' id='view_result1' value='Result' /></td>";
			}
			else
			{
				$SQL_1 = "SELECT Test_Submit FROM adaptive_learning_test WHERE test_id='$row[0]' AND student_id='$uid'";
				$result_1=mysql_query($SQL_1) or die($SQL_1."<br/><br/>".mysql_error());
				$row_1=mysql_fetch_row($result_1);
				if($row_1[0] == 1)
				{
					echo "<td id='expire_id' value='active' style='width:10%;color:black;border-bottom:2px solid #005000;'><div style='color:Green;font-size:14px;'>Completed</div></td>";
				}
				else
				{
				if($row[14]=="10")
				{
					if($row[15]=="1")
					{
						echo "<td id='expire_id' value='active' style='width:10%;color:black;border-bottom:2px solid #005000;'><div style='color:Green;font-size:14px;'>Active</div></td>";
					}
					else
					{
					echo "<td id='expire_id' value='coming_soon' style='width:10%;color:black;border-bottom:2px solid #005000;'><div style='color:green;font-size:14px;'><blink>Coming Soon</link></div></td>";
					}
				}
				else
				{
					echo "<td id='expire_id' value='active' style='width:10%;color:black;border-bottom:2px solid #005000;'><div style='color:Green;font-size:14px;'>Active</div></td>";
				}
				}
			}
			echo "<td id='rowid8' value ='$row[8]'  style='visibility: hidden;color:black;border-bottom:2px solid #005000;'></td>";
			echo "<td id='rowid9' value ='$row[9]'  style='visibility: hidden;color:black;border-bottom:2px solid #005000;'></td>";
			//echo "<td id='expire_id1' value ='$row[5]'  style='color:black;border-bottom:2px solid #005000;'></td>";
		echo "</tr>";
		nextrec:
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