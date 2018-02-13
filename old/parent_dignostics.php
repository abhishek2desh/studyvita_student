<?php
	include 'config.php';
	session_start();
	
	$s1=$_SESSION['studid1'];
	$s5=$_SESSION['sid'];
	$s3=$_SESSION['grp1'];
	$u5 = $_SESSION['uname'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="shortcut icon" href="http://targetstudy.com/files/img/17/6957/L_17974.gif" />
		<meta name="keywords" content="jquery,ui,easy,easyui,web">
		<meta name="description" content="easyui help you build your web page easily!">
		<title>Welcome <?php echo $u5 ?></title>
		
		<!-- chart links and js  -->		
		<script src="js/jquery1.min.js"></script>
		<script src="js/flot.mis.js"></script>
		<script src="bs_js/highcharts_1.js"></script>
		<script src="bs_js/exporting.js"></script>
		
		<style type="text/css">
		.classname {
			-moz-box-shadow:inset 0px 0px 0px 0px #ffffff;
			-webkit-box-shadow:inset 0px 0px 0px 0px #ffffff;
			box-shadow:inset 0px 0px 0px 0px #ffffff;
			background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #ededed), color-stop(1, #dfdfdf) );
			background:-moz-linear-gradient( center top, #ededed 5%, #dfdfdf 100% );
			filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ededed', endColorstr='#dfdfdf');
			background-color:#ededed;
			-moz-border-radius:24px;
			-webkit-border-radius:24px;
			border-radius:24px;
			border:3px solid #dcdcdc;
			display:inline-block;
			color:#777777;
			font-family:arial;
			font-size:13px;
			font-weight:bold;
			padding:4px 12px;
			text-decoration:none;
			text-shadow:1px 1px 0px #ffffff;
		}.classname:hover {
			background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #dfdfdf), color-stop(1, #ededed) );
			background:-moz-linear-gradient( center top, #dfdfdf 5%, #ededed 100% );
			filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#dfdfdf', endColorstr='#ededed');
			background-color:#dfdfdf;
		}.classname:active {
			position:relative;
			top:1px;
		}
		/* This imageless css button was generated by CSSButtonGenerator.com */
		</style>
		
		<script>
		$(document).ready(function(){
			//Global variables for chart
			var chart1bio;
			var chart2phy;
			var chart3mat;
			var chart4che;
			var group = <?php echo $s3; ?>;
			
		//	alert(group);
			
			getgroupsubjects(<?php echo $s3; ?>);
			
			function getgroupsubjects(groupid)
			{
				if(groupid === 9)
				{
					$("#bio ,#sci ,#eng ,#ss").hide();
				}
				else if(groupid === 10)
				{
					$("#mat, #sci, #eng, #ss").hide();
				}
				else if(groupid === 11)
				{
					$("#sci ,#eng ,#ss").hide();
				}
				else if(groupid === 12)
				{
					$("#bio ,#phy ,#che ,#eng ,#ss").hide();
				}
				else if(groupid === 13)
				{
					$("#bio ,#phy ,#che ,#mat ,#sci").hide();
				}
				else if(groupid === 21)
				{
					$("#bio ,#phy ,#che").hide();
				}
			}
			
			$("#container1, #container2, #container3, #container4").hide();
			$("#container5, #container6, #container7, #container8").hide();
			
			$("#bio").click(function(){
				u1 = "";
				u2 = "";
				b = $("#bio").val();
				//alert("Biology..."+b);
				$("#container1").show();
				$("#container2, #container3, #container4").hide();
				$("#container5, #container6, #container7, #container8").hide();
				
				u1 = "query/dignostic_chart1.php?s=14";
				u2 = "query/dignostic_chart2.php?s=14";

				start();
				alert("View your diagnostic analysis graphically.");
				alert("Y-axis denotes percentage strength and weakness. X-axis denotes Unit name.");
				ch1();
				
				dt1 = "";
				dt2 = "";
				
				e.preventDefault();
			});
			
			$("#phy").click(function(){
			
		/*		alert("destory before");
				chart1bio.destroy();
				chart3mat.destroy();
				chart4che.destroy();
				alert("destory after");
		*/
				u1 = "";
				u2 = "";
				b = $("#phy").val();
			//	alert("physics..."+b);
				$("#container2").show();
				$("#container1, #container3, #container4").hide();
				$("#container5, #container6, #container7, #container8").hide();
				
				u1 = "query/dignostic_chart1.php?s=16";
				u2 = "query/dignostic_chart2.php?s=16";

				start();
				alert("View your diagnostic analysis graphically.");
				alert("Y-axis denotes percentage strength and weakness. X-axis denotes Unit name.");
				ch2();
				
				dt1 = "";
				dt2 = "";
				
				e.preventDefault();
				
			});
			
			$("#mat").click(function(){
			
		/*		chart1bio.destroy();
				chart2phy.destroy();
				chart4che.destroy();
		*/	
				u1 = "";
				u2 = "";
				b = $("#mat").val();
			//	alert("mathematics..."+b);
				$("#container3").show();
				$("#container1, #container2, #container4").hide();
				$("#container5, #container6, #container7, #container8").hide();
				
				u1 = "query/dignostic_chart1.php?s=15";
				u2 = "query/dignostic_chart2.php?s=15";

				start();
				alert("View your diagnostic analysis graphically.");
				alert("Y-axis denotes percentage strength and weakness. X-axis denotes Unit name.");
				ch3();
				
				dt1 = "";
				dt2 = "";
				
				e.preventDefault();
				
			});
			
			$("#che").click(function(){
			
		/*		chart1bio.destroy();
				chart2phy.destroy();
				chart3mat.destroy();
			*/
				u1 = "";
				u2 = "";
				b = $("#che").val();
			//	alert("chemistry..."+b);
				$("#container4").show();
				$("#container1, #container2, #container3").hide();
				$("#container5, #container6, #container7, #container8").hide();
				
				u1 = "query/dignostic_chart1.php?s=17";
				u2 = "query/dignostic_chart2.php?s=17";

				start();
				alert("View your diagnostic analysis graphically.");
				alert("Y-axis denotes percentage strength and weakness. X-axis denotes Unit name.");
				ch4();
				
				dt1 = "";
				dt2 = "";
				
				e.preventDefault();
				
			});
			
			$("#sci").click(function(){
			
		/*		chart1bio.destroy();
				chart2phy.destroy();
				chart3mat.destroy();
			*/
				u1 = "";
				u2 = "";
				b = $("#sci").val();
			//	alert("chemistry..."+b);
				$("#container5").show();
				$("#container1, #container2, #container3, #container4").hide();
				$("#container6, #container7, #container8").hide();
				
				u1 = "query/dignostic_chart1.php?s=18";
				u2 = "query/dignostic_chart2.php?s=18";

				start();
				alert("View your diagnostic analysis graphically.");
				alert("Y-axis denotes percentage strength and weakness. X-axis denotes Unit name.");
				ch5();
				
				dt1 = "";
				dt2 = "";
				
				e.preventDefault();
				
			});
			
			$("#eng").click(function(){
			
		/*		chart1bio.destroy();
				chart2phy.destroy();
				chart3mat.destroy();
			*/
				u1 = "";
				u2 = "";
				b = $("#eng").val();
			//	alert("chemistry..."+b);
				$("#container6").show();
				$("#container1, #container2, #container3, #container4").hide();
				$("#container5, #container7, #container8").hide();
				
				u1 = "query/dignostic_chart1.php?s=19";
				u2 = "query/dignostic_chart2.php?s=19";

				start();
				alert("View your diagnostic analysis graphically.");
				alert("Y-axis denotes percentage strength and weakness. X-axis denotes Unit name.");
				ch6();
				
				dt1 = "";
				dt2 = "";
				
				e.preventDefault();
				
			});
			
			$("#ss").click(function(){
			
		/*		chart1bio.destroy();
				chart2phy.destroy();
				chart3mat.destroy();
			*/
				u1 = "";
				u2 = "";
				b = $("#ss").val();
			//	alert("chemistry..."+b);
				$("#container7").show();
				$("#container1, #container2, #container3, #container4").hide();
				$("#container5, #container6, #container8").hide();
				
				u1 = "query/dignostic_chart1.php?s=22";
				u2 = "query/dignostic_chart2.php?s=22";

				start();
				alert("View your diagnostic analysis graphically.");
				alert("Y-axis denotes percentage strength and weakness. X-axis denotes Unit name.");
				ch7();
				
				dt1 = "";
				dt2 = "";
				
				e.preventDefault();
				
			});
				
			<!-- Get all data JSON format -->
			function start()
			{
				
				$.ajax({
						url: u1,
						type: 'GET',
						dataType: 'json',
						
					success: function(data) {
						dt1 = data;
					},
					cache : false
				});
				$.ajax({
						url: u2,
						type: 'GET',
						dataType: 'json',
						
					success: function(data) {
						dt2 = data;
					},
					cache : false
				});
			}
			
			function ch1()
			{
				chart1bio = new Highcharts.Chart({
					
					chart: {
						renderTo: 'container1',
						type: 'column'
					},
					title: {
						min: 1,
						text: 'Student Diagnostic Analysis'
					},
					xAxis: {
						categories: <?php							
							
								$result = mysql_query("SELECT u.id, IFNULL(s.strength,0) AS result,u.unit_name
														FROM unit u
														LEFT JOIN student_unit_strength s ON
														u.id = s.unit_id AND
														s.sub_id = u.sub_id AND
														s.student_id = ".$s5."
														WHERE u.sub_id = 14");
							
								$array = array();

								$num_rows = mysql_num_rows($result);
								$i=0;
								echo "['";
								while($row = mysql_fetch_array($result)) { 
									$i++;
									
									if($i<$num_rows){
										echo $link = $row[2]."','";
									}
									else {
										echo $link = $row[2];
									}
								}
								echo "']";
								$sub = "";
							?>,
						title: {
							text: 'Unit Name'
						},
						labels : { y : 20, rotation: -45, align: 'right' },
					},
					yAxis: {
						min: 0,
						title: {
							text: 'Strength and Weakness'
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
						data: dt2
					},{name:'Strength',data: dt1}]
				});
			}
			
			<!-- PHY  -->
			function ch2()
			{
				chart2phy = new Highcharts.Chart({
					
					chart: {
						renderTo: 'container2',
						type: 'column'
					},
					title: {
						min: 1,
						text: 'Student Diagnostic Analysis'
					},
					xAxis: {
						categories: <?php							
							
								$result = mysql_query("SELECT u.id, IFNULL(s.strength,0) AS result,u.unit_name
														FROM unit u
														LEFT JOIN student_unit_strength s ON
														u.id = s.unit_id AND
														s.sub_id = u.sub_id AND
														s.student_id = ".$s5."
														WHERE u.sub_id = 16");
							
								$array = array();

								$num_rows = mysql_num_rows($result);
								$i=0;
								echo "['";
								while($row = mysql_fetch_array($result)) { 
									$i++;
									
									if($i<$num_rows){
										echo $link = $row[2]."','";
									}
									else {
										echo $link = $row[2];
									}
								}
								echo "']";
								$sub = "";
							?>,
						title: {
							text: 'Unit Name'
						},
						labels : { y : 20, rotation: -45, align: 'right' },
					},
					yAxis: {
						min: 0,
						title: {
							text: 'Strength and Weakness'
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
						data: dt2
					},{name:'Strength',data: dt1}]
				});
			}
			
			<!-- MAT  -->
			function ch3()
			{
				chart3mat = new Highcharts.Chart({
					
					chart: {
						renderTo: 'container3',
						type: 'column'
					},
					title: {
						min: 1,
						text: 'Student Diagnostic Analysis'
					},
					xAxis: {
						categories: <?php							
							
								$result = mysql_query("SELECT u.id, IFNULL(s.strength,0) AS result,u.unit_name
														FROM unit u
														LEFT JOIN student_unit_strength s ON
														u.id = s.unit_id AND
														s.sub_id = u.sub_id AND
														s.student_id = ".$s5."
														WHERE u.sub_id = 15");
							
								$array = array();

								$num_rows = mysql_num_rows($result);
								$i=0;
								echo "['";
								while($row = mysql_fetch_array($result)) { 
									$i++;
									
									if($i<$num_rows){
										echo $link = $row[2]."','";
									}
									else {
										echo $link = $row[2];
									}
								}
								echo "']";
								$sub = "";
							?>,
						title: {
							text: 'Unit Name'
						},
						labels : { y : 20, rotation: -45, align: 'right' },
					},
					yAxis: {
						min: 0,
						title: {
							text: 'Strength and Weakness'
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
						data: dt2
					},{name:'Strength',data: dt1}]
				});
			}
			
			<!-- CHE  -->
			function ch4()
			{
				chart4che = new Highcharts.Chart({
					
					chart: {
						renderTo: 'container4',
						type: 'column'
					},
					title: {
						min: 1,
						text: 'Student Diagnostic Analysis'
					},
					xAxis: {
						categories: <?php							
							
								$result = mysql_query("SELECT u.id, IFNULL(s.strength,0) AS result,u.unit_name
														FROM unit u
														LEFT JOIN student_unit_strength s ON
														u.id = s.unit_id AND
														s.sub_id = u.sub_id AND
														s.student_id = ".$s5."
														WHERE u.sub_id = 17");
							
								$array = array();

								$num_rows = mysql_num_rows($result);
								$i=0;
								echo "['";
								while($row = mysql_fetch_array($result)) { 
									$i++;
									
									if($i<$num_rows){
										echo $link = $row[2]."','";
									}
									else {
										echo $link = $row[2];
									}
								}
								echo "']";
								$sub = "";
							?>,
						title: {
							text: 'Unit Name'
						},
						labels : { y : 20, rotation: -45, align: 'right' },
					},
					yAxis: {
						min: 0,
						title: {
							text: 'Strength and Weakness'
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
						data: dt2
					},{name:'Strength',data: dt1}]
				});
			}
			
		<!-- Science -->
			function ch5()
			{
				chart5sci = new Highcharts.Chart({
					
					chart: {
						renderTo: 'container5',
						type: 'column'
					},
					title: {
						min: 1,
						text: 'Student Diagnostic Analysis'
					},
					xAxis: {
						categories: <?php							
							
								$result = mysql_query("SELECT u.id, IFNULL(s.strength,0) AS result,u.unit_name
														FROM unit u
														LEFT JOIN student_unit_strength s ON
														u.id = s.unit_id AND
														s.sub_id = u.sub_id AND
														s.student_id = ".$s5."
														WHERE u.sub_id = 18");
							
								$array = array();

								$num_rows = mysql_num_rows($result);
								$i=0;
								echo "['";
								while($row = mysql_fetch_array($result)) { 
									$i++;
									
									if($i<$num_rows){
										echo $link = $row[2]."','";
									}
									else {
										echo $link = $row[2];
									}
								}
								echo "']";
								$sub = "";
							?>,
						title: {
							text: 'Unit Name'
						},
						labels : { y : 20, rotation: -45, align: 'right' },
					},
					yAxis: {
						min: 0,
						title: {
							text: 'Strength and Weakness'
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
						data: dt2
					},{name:'Strength',data: dt1}]
				});
			}
			
			<!-- ENGLISH  -->
			function ch6()
			{
				chart6eng = new Highcharts.Chart({
					
					chart: {
						renderTo: 'container5',
						type: 'column'
					},
					title: {
						min: 1,
						text: 'Student Diagnostic Analysis'
					},
					xAxis: {
						categories: <?php							
							
								$result = mysql_query("SELECT u.id, IFNULL(s.strength,0) AS result,u.unit_name
														FROM unit u
														LEFT JOIN student_unit_strength s ON
														u.id = s.unit_id AND
														s.sub_id = u.sub_id AND
														s.student_id = ".$s5."
														WHERE u.sub_id = 19");
							
								$array = array();

								$num_rows = mysql_num_rows($result);
								$i=0;
								echo "['";
								while($row = mysql_fetch_array($result)) { 
									$i++;
									
									if($i<$num_rows){
										echo $link = $row[2]."','";
									}
									else {
										echo $link = $row[2];
									}
								}
								echo "']";
								$sub = "";
							?>,
						title: {
							text: 'Unit Name'
						},
						labels : { y : 20, rotation: -45, align: 'right' },
					},
					yAxis: {
						min: 0,
						title: {
							text: 'Strength and Weakness'
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
						data: dt2
					},{name:'Strength',data: dt1}]
				});
			}
			
			<!-- SS  -->
			function ch7()
			{
				chart7ss = new Highcharts.Chart({
					
					chart: {
						renderTo: 'container5',
						type: 'column'
					},
					title: {
						min: 1,
						text: 'Student Diagnostic Analysis'
					},
					xAxis: {
						categories: <?php							
							
								$result = mysql_query("SELECT u.id, IFNULL(s.strength,0) AS result,u.unit_name
														FROM unit u
														LEFT JOIN student_unit_strength s ON
														u.id = s.unit_id AND
														s.sub_id = u.sub_id AND
														s.student_id = ".$s5."
														WHERE u.sub_id = 22");
							
								$array = array();

								$num_rows = mysql_num_rows($result);
								$i=0;
								echo "['";
								while($row = mysql_fetch_array($result)) { 
									$i++;
									
									if($i<$num_rows){
										echo $link = $row[2]."','";
									}
									else {
										echo $link = $row[2];
									}
								}
								echo "']";
								$sub = "";
							?>,
						title: {
							text: 'Unit Name'
						},
						labels : { y : 20, rotation: -45, align: 'right' },
					},
					yAxis: {
						min: 0,
						title: {
							text: 'Strength and Weakness'
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
						data: dt2
					},{name:'Strength',data: dt1}]
				});
			}
						
		});
		</script>
		
	</head>
	<body>
	<div style="font-size:14px;">
		
	</div>
	<br />
	<div id="grid">
	
	</div>	
	<br/>
	&nbsp;&nbsp;&nbsp;&nbsp;
	<span style="color:red">
	Click on any of the following buttons to view your Diagnostic Analysis graphically.</span>
	<br/>
	<div id="chartScore">
		<table>
			<tr>
				<td><Button type="Button" class="classname" id="bio" value="14">Biology</button></td>
				<td><Button type="Button" class="classname" id="phy" value="16">Physics</button></td>
				<td><Button type="Button" class="classname" id="che" value="17">Chemistry</button></td>
				<td><Button type="Button" class="classname" id="mat" value="15">Mathematic</button></td>
				<td><Button type="Button" class="classname" id="sci" value="18">Science</button></td>
				<td><Button type="Button" class="classname" id="eng" value="19">English</button></td>
				<td><Button type="Button" class="classname" id="ss" value="22">Social Science</button></td>
			</tr>
		</table>
	</div>
	
	<div id="container">
		<div id="container1" style="padding-left:10px;min-width: 900px;height:700px;margin: 0 auto"></div>
		<div id="container2" style="padding-left:10px;min-width: 900px;height:700px;margin: 0 auto"></div>
		<div id="container3" style="padding-left:10px;min-width: 900px;height:700px;margin: 0 auto"></div>
		<div id="container4" style="padding-left:10px;min-width: 900px;height:700px;margin: 0 auto"></div>
		<div id="container5" style="padding-left:10px;min-width: 900px;height:700px;margin: 0 auto"></div>
		<div id="container6" style="padding-left:10px;min-width: 900px;height:700px;margin: 0 auto"></div>
		<div id="container7" style="padding-left:10px;min-width: 900px;height:700px;margin: 0 auto"></div>
		<div id="container8" style="padding-left:10px;min-width: 900px;height:700px;margin: 0 auto"></div>
	</div>
	<?php
		include 'conn_close.php';
	?>
	</body>
</html>