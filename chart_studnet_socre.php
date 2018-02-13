<?php
	require_once 'includes/global.inc.php';
	include_once 'config.php';

	
	$s1=$_SESSION['studid1'];
	$s2=$_SESSION['stnd1'];
	$s3=$_SESSION['grp1'];	
	$s4=$_SESSION['btch1'];
	$s5=$_SESSION['sid'];

	

	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Flot Examples</title>
	<script src="js/jquery1.min.js"></script>
<!--	<script src="js/excanvas.min.js"></script>	-->
	<script src="js/flot.mis.js"></script>
	<script src="bs_js/highcharts.js"></script>
	<script src="bs_js/exporting.js"></script>
	<script>
	//Global variables for chart
	var chart174;
	
		$(function () 
		{
			var dt1="";
			var filename="";
			var dt2="";
			
			var s="";
			var u1 = "";
			var u2 = "";
			//var dt="";
			//alert("first time"+dt1);
			
			$("#destroyChart").click(function(e){
				e.preventDefault();
				chart174.destroy();
			});
			
			$("#submit").click(function(e){
			//	alert("hiii");
				
				<?php
					 if(isset($_POST['submit']))
					{
						$sub = $_POST['subj'];
						//$_SESSION['sub_ch']=$sub;
						echo $sub;
					}
				?>
				
				
				s = $("#sub1").val();
				u1 = "chart1.php?s="+s;
				u2 = "chart2.php?s="+s;

				start();
				alert("View your test scores graphically.");
				alert("Y-axis denotes percentage test scores. X-axis denotes Date of Examination / Subject / Test Code");
				ch();
				e.preventDefault();
				dt1 = "";
				dt2 = "";
				
			});
			
			
			function start()
			{
				
				$.ajax({
						url: u1,
						type: 'GET',
						dataType: 'json',
						
					success: function(data) {
					//	alert(data);
						dt1 = data;
					//	alert("gae:"+dt1);
					},
					cache : false
				});
				$.ajax({
						url: u2,
						type: 'GET',
						dataType: 'json',
						
					success: function(data) {
					//	alert(data);
						dt2 = data;
					//	alert("gae:"+dt1);
					},
					cache : false
				});
			
				//alert("aae:"+dt1);
			}
			function ch()
			{
				
				//alert("nai : "+dt1);
				chart174 = new Highcharts.Chart({
					
					chart: {
						renderTo: 'container',
						type: 'column'
					},
					title: {
						min: 1,
						text: 'Student Score Evolution'
					},
					xAxis: {
						categories: <?php							
							if($sub == 20)
							{
								$result = mysql_query("SELECT ExamDate,ROUND(((ObtainedMarks/TotalMarks)*100),2) AS Percentage,
							@ans := 100-ROUND(((ObtainedMarks/TotalMarks)*100),2) AS Weakness,SUBJECT 
							FROM objective_evolution 
							WHERE StudentId=".$s1."
							UNION ALL
							SELECT ExamDate,ROUND(((ObtainedMarks/TotalMarks)*100),2) AS Percentage,
							@ans := 100-ROUND(((ObtainedMarks/TotalMarks)*100),2) AS Weakness,SUBJECT 
							FROM subjectiveevalution
							WHERE StudentId=".$s1);
							
							}
							else
							{
								if($sub == 17)
								{
									$sub = 'CHE';
								}
								else if($sub == 15)
								{
									$sub = 'MAT';
								}
								else if($sub == 16)
								{
									$sub = 'PHY';
								}
								else if($sub == 14)
								{
									$sub = 'BIO';
								}
								else if($sub == 18)
								{
									$sub = 'SCE';
								}
								else if($sub == 19)
								{
									$sub = 'ENG';
								}
								
								$result = mysql_query("SELECT ExamDate,ROUND(((ObtainedMarks/TotalMarks)*100),2) AS Percentage,
							@ans := 100-ROUND(((ObtainedMarks/TotalMarks)*100),2) AS Weakness,SUBJECT 
							FROM objective_evolution 
							WHERE StudentId=".$s1." AND SUBJECT ='".$sub."'
							UNION ALL
							SELECT ExamDate,ROUND(((ObtainedMarks/TotalMarks)*100),2) AS Percentage,
							@ans := 100-ROUND(((ObtainedMarks/TotalMarks)*100),2) AS Weakness,SUBJECT 
							FROM subjectiveevalution
							WHERE StudentId=".$s1." AND SUBJECT ='".$sub."'");
							
							
							}
							
							
							$array = array();

							$num_rows = mysql_num_rows($result);
							$i=0;
							echo "['";
							while($row = mysql_fetch_array($result)) { 
								$i++;
								
								if($i<$num_rows){
									echo $link = $row[0]."-".$row[3]."','";
								}
								else {
									echo $link = $row[0]."-".$row[3];
								}
							}
							echo "']";
							$sub = "";
						?>,
					/*
						categories: ['Chapter1', 'Chapter2', 'Chapter3', 'Chapter4', 'Chapter5',
						'Chapter6', 'Chapter7', 'Chapter8', 'Chapter9','Chapter10', 'Chapter11', 'Chapter12','Chapter13', 'Chapter14', 'Chapter15'],*/
						title: {
							text: 'Total'
						},
						labels : { y : 20, rotation: -45, align: 'right' },
					},
					yAxis: {
						min: 0,
						title: {
							text: 'Total Strength and Weakness'
						}
						,
						stackLabels: {
							enabled: true,
							style: {
								fontWeight: 'bold',
								color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
							}
						}
					},
					legend: {
						align: 'right',
						x: -100,
						verticalAlign: 'top',
						y: 20,
						floating: true,
						backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColorSolid) || 'white',
						borderColor: '#CCC',
						borderWidth: 1,
						shadow: false
					},
					tooltip: {
						formatter: function() {
							return '<b>'+ this.x +'</b><br/>'+
								this.series.name +': '+ this.y +'<br/>'+
								'Total: '+ this.point.stackTotal;
						}
					},
					plotOptions: {
						column: {
							stacking: 'normal',
							dataLabels: {
								enabled: true,
								color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
							}
						}
					},
					series: [{
						name: 'Weakness',
						data: dt1
					},
					{
						name: 'Strength',
						data: dt2
					}]
				});
			}
				
		});
	</script>
	</head>
    <body>
	<?php require 'header2.php'; ?>
	<a id="destroyChart" href="#">Destroy Chart</a>
	
	<form id="form1" method="post" > 
		<select name="subj" size="1" id="sub1" style="width: 150px; color:#777777" >
			<?php
				$result=mysql_query("SELECT id,description FROM detail WHERE id IN
				(SELECT subject_id FROM group_sub_mapping WHERE group_id=".$s3.")
				GROUP BY id DESC");
				while($row=mysql_fetch_array($result))
				{
					echo "<option value=$row[0]>$row[1]</option>";
				}
			?>
		</select>
		<input type="submit" id="submit" name="submit" value="Submit" />
	 
		
	</form>
	
	<div id="container" style="min-width: 2500px;height:550px;margin: 0 auto"></div>
	 </body>
<?php
	include 'conn_close.php';
?>
</html>
