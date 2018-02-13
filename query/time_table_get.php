<?php
	session_start();
	include_once '../config.php';
	
	$user=$_SESSION['username'];
	$s1=$_SESSION['studid1'];
	$s2=$_SESSION['stnd1'];
	$s3=$_SESSION['grp1'];	
	$s4=$_SESSION['btch1'];
	$s5=$_SESSION['sid'];
	
	$tt = $_GET['tt_id'];
	
	if($tt == 1)
	{
		$result=mysql_query("SELECT MAX(w.work_date)
							FROM working_batches w,student_details sd,batch b,SUBJECT sb 
							WHERE sd.batch_id = b.id 
							AND w.batch_id=b.id 
							AND sd.user_id = ".$s5."
							AND w.work_date < CURDATE() AND w.sub_id=sb.id");
							
		$row=mysql_fetch_array($result);
		$date_tt = $row[0];
		$result_1=mysql_query("SELECT w.time,UCASE(sb.name),IF(test=0,'-','TEST'),w.id,DATE_FORMAT(w.work_date,'%d-%m-%Y')
							FROM working_batches w,student_details sd,batch b,SUBJECT sb 
							WHERE sd.batch_id = b.id 
							AND w.batch_id=b.id 
							AND sd.user_id = ".$s5."
							AND w.work_date = '$date_tt' AND w.sub_id=sb.id");
			echo "<tr>";
			echo "<th>TIME</th>";				
			echo "<th>SUBJECT</th>";
			echo "<th>TEST</th>";
			echo "<th>Rate my Understanding</th>";
			echo "</tr>";
			
			while($row_1=mysql_fetch_array($result_1))
			{
				echo "<tr>";
				echo "<td>".$row_1[0]."</td>";
				echo "<td>".$row_1[1]."</td>";
				echo "<td>".$row_1[2]."</td>";
				echo "<td><div id='$row_1[3]' class='click_demo'></div></td>";
				echo "<td id='first_td_1' value='$row_1[4]' style='border:solid 1px;width:0px;visibility: hidden;'></td>";
				echo "</tr>";
			}
			
	}
	else
	{
		$myQuery = "SELECT w.time,UCASE(sb.name),IF(test=0,'-','TEST'),w.id 
		FROM working_batches w,student_details sd,batch b,SUBJECT sb 
		WHERE sd.batch_id = b.id 
		AND w.batch_id=b.id 
		AND sd.user_id=".$s5."
		AND w.work_date = CURDATE() AND w.sub_id=sb.id";
		
		$result=mysql_query($myQuery) or die($myQuery."<br/><br/>".mysql_error());;
		
		echo "<tr>";
		echo "<th>TIME</th>";				
		echo "<th>SUBJECT</th>";
		echo "<th>TEST</th>";
		echo "<th>Rate my Understanding</th>";
		echo "</tr>";
		
		while($row=mysql_fetch_array($result))
		{
			echo "<tr>";
			echo "<td>".$row[0]."</td>";
			echo "<td>".$row[1]."</td>";
			echo "<td>".$row[2]."</td>";
			echo "<td><div id='$row[3]' class='click_demo'></div></td>";
			echo "</tr>";
		}
	}
?>
<script type="text/javascript" src="lib/jquery.raty.min.js"></script>
<script type="text/javascript" >
	$.fn.raty.defaults.path = 'lib/img';
	var user_nw_id = <?php echo $s5; ?>;
	$('.click_demo').raty({
		click: function(score, evt) {
			var filename = "query/insert_rating.php?wb_id="+$(this).attr('id')+"&score="+score+"&user_id="+user_nw_id;
		//	alert(filename);
			$.ajax({
				url: filename,
				type: 'GET',
				dataType: 'html',
				
				success: function(data, textStatus, xhr) {
					//alert(data);
				},
			});	
			alert("Rating Successful.");
		  //alert('ID: ' + $(this).attr('id') + "\nscore: " + score + "\nevent: " + evt.type);
		}
	});
</script>
<?php
	include_once '../conn_close.php';
?>