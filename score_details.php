<?php
	include 'config.php';
	session_start();
	$s1=$_SESSION['studid1'];
	$s3=$_SESSION['grp1'];
	$dt1 = $_GET['datepickerVal34'];
	$dt2 = $_GET['datepickerVal35'];
	$sub1 = $_GET['sub1'];
	$type1 = $_GET['paper1'];
	
	$_SESSION['dt1']=$dt1;
	$_SESSION['dt2']=$dt2;
	$_SESSION['sub']=$sub1;
	$_SESSION['type']=$type1;
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="shortcut icon" href="images/Edutechheader.ico" />
		<meta name="keywords" content="jquery,ui,easy,easyui,web">
		<meta name="description" content="easyui help you build your web page easily!">
		<title>Student Score Details</title>
		<link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/themes/default/easyui.css">
		<link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/themes/icon.css">
		
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.min.js"></script>
		<script type="text/javascript" src="http://www.jeasyui.com/easyui/jquery.easyui.min.js"></script>
		<link rel="stylesheet" href="css/bg.css" />  
		<link rel="stylesheet" href="css/demo.css" />
		<link href="menu.css" rel="stylesheet" type="text/css" />
		<!-- chart links and js  -->
		<style>
			html, body	{ height:100%;width:100%; }
			body { margin:0; overflow:auto; }
		</style>
		<script src="js/jquery1.min.js"></script>
		<script src="js/flot.mis.js"></script>
		<script src="bs_js/highcharts.js"></script>
		<script src="bs_js/exporting.js"></script>
		<script type="text/javascript">
			function myformatter(date){  
				var y = date.getFullYear();  
				var m = date.getMonth()+1;  
				var d = date.getDate();  
				return y+'-'+(m<10?('0'+m):m)+'-'+(d<10?('0'+d):d);  
			}  
			function myparser(s){  
				if (!s) return new Date();  
				var sss = s.split('-');  
				var y = parseInt(ss[0],10);  
				var m = parseInt(ss[1],10);  
				var d = parseInt(ss[2],10);  
				if (!isNaN(y) && !isNaN(m) && !isNaN(d)){  
					return new Date(y,m-1,d);  
				} else {  
					return new Date();  
				}  
			}  
		
			var url;
			function newUser1(){
				$('#dlg1').dialog('open').dialog('setTitle','New Course');
				$('#fm1').form('clear');
				url = 'index2_save_user1.php';
			}
			function editUser1(){
				var row = $('#dg1').datagrid('getSelected');
				if (row){
					$('#dlg1').dialog('open').dialog('setTitle','Edit Course');
					url = 'update_user1.php?id='+row.id;
					$('#fm1').form('load',row);				
				}
			}
			
			function removeUser1(){
				var row = $('#dg1').datagrid('getSelected');
				if (row){
					$.messager.confirm('Confirm','Are you sure you want to remove this Course?',function(r){
						if (r){
							$.post('remove_user1.php',{id:row.id},function(result){
								if (result.success){
									$('#dg1').datagrid('reload');	// reload the user data
								} else {
									$.messager.show({	// show error message
										title: 'Error',
										msg: result.msg
									});
								}
							},'json');
						}
					});
				}
			}
			function saveUser1(){
					$('#fm1').form('submit',{
					url: url,
					onSubmit: function(){
						return $(this).form('validate');
					},
					success: function(result){
						var result = eval('('+result+')');
						if (result.success){
							$('#dlg1').dialog('close');		// close the dialog
							$('#dg1').datagrid('reload');	// reload the user data
						} else {
							$.messager.show({
								title: 'Error',
								msg: result.msg
							});
						}
					}
				});
			}
			function doSearch(value,name)
			{
				if(name == 'c_name')
				{
					if(value)
					$('#dg').datagrid('load',{
						c_name: value
					});
				}
				else if(name == 'type')
				{
					$('#dg').datagrid('load',{
						type: value
					});
				}
				else if(name == 'standard')
				{
					$('#dg').datagrid('load',{
						standard: value
					});
				}
			}		
		</script>
		
		<script>
		$(document).ready(function(){
			//Global variables for chart
		
			var group = <?php echo $s3; ?>;
			var sel_sub = <?php echo $sub1; ?>;
			
			var chart1bio;
			var chart2phy;
			var chart3mat;
			var chart4che;
			
			var b;
			
			if(sel_sub == 15)
			{
				$("#bio").hide();
				$("#phy").hide();
				$("#che").hide();
			}
			else if(sel_sub == 16)
			{
				$("#mat").hide();
				$("#bio").hide();
				$("#che").hide();
			}
			else if(sel_sub == 17)
			{
				$("#bio").hide();
				$("#phy").hide();
				$("#mat").hide();
			}
			else if(sel_sub == 14)
			{
				$("#mat").hide();
				$("#phy").hide();
				$("#che").hide();
			}
			
			$("#container1").hide();
			$("#container2").hide();
			$("#container3").hide();
			$("#container4").hide();
			
			
			if(group == 9)
			{
				$("#bio").hide();
			}
			else if(group == 10)
			{
				$("#mat").hide();
			}
			$("#load_images").hide();
			$("#bio").click(function(){
				$("#hide_show_data").hide();
				$("#load_images").show();
		/*		chart2phy.destroy();
				chart3mat.destroy();
				chart4che.destroy();
		*/	
				b = $("#bio").val();
				//alert("Biology..."+b);
				$("#container1").show();
				$("#container2").hide();
				$("#container3").hide();
				$("#container4").hide();
				
				u1 = "chart1.php?s=14";
				u2 = "chart2.php?s=14";

				$.ajax({
					url: u1,
					type: 'GET',
					dataType: 'json',
					success: function(data) {
						dt1 = data;
								$.ajax({
								url: u2,
								type: 'GET',
								dataType: 'json',
								
							success: function(data) {
								$("#load_images").hide();
								$("#hide_show_data").show();
								dt2 = data;
								alert("View your diagnostic analysis graphically.");
								alert("Y-axis denotes percentage strength and weakness. X-axis denotes Unit name.");
								ch1();
								dt1 = "";
								dt2 = "";
								e.preventDefault();
							},
						});
					},
				});
			});
			
			$("#phy").click(function(){
			$("#load_images").show();$("#hide_show_data").hide();
		/*		alert("destory before");
				chart1bio.destroy();
				chart3mat.destroy();
				chart4che.destroy();
				alert("destory after");
		*/
				b = $("#phy").val();
			//	alert("physics..."+b);
				$("#container2").show();
				$("#container1").hide();
				$("#container3").hide();
				$("#container4").hide();
				
				u1 = "chart1.php?s=16";
				u2 = "chart2.php?s=16";
				$.ajax({
						url: u1,
						type: 'GET',
						dataType: 'json',
						
					success: function(data) {
						dt1 = data;
						$.ajax({
								url: u2,
								type: 'GET',
								dataType: 'json',
								
								success: function(data) {
								$("#load_images").hide();
								$("#hide_show_data").show();
								dt2 = data;
								alert("View your diagnostic analysis graphically.");
								alert("Y-axis denotes percentage strength and weakness. X-axis denotes Unit name.");
								ch2();
								dt1 = "";
								dt2 = "";
								e.preventDefault();
							},
						});
					},
				});
				
			});
			
			$("#mat").click(function(){
			$("#load_images").show();$("#hide_show_data").hide();
		/*		chart1bio.destroy();
				chart2phy.destroy();
				chart4che.destroy();
		*/	
				b = $("#mat").val();
			//	alert("mathematics..."+b);
				$("#container3").show();
				$("#container1").hide();
				$("#container2").hide();
				$("#container4").hide();
				
				u1 = "chart1.php?s=15";
				u2 = "chart2.php?s=15";

				$.ajax({
					url: u1,
					type: 'GET',
					dataType: 'json',
					success: function(data) {
						dt1 = data;
								$.ajax({
								url: u2,
								type: 'GET',
								dataType: 'json',
								
							success: function(data) {
								$("#load_images").hide();
								$("#hide_show_data").show();
								dt2 = data;
								alert("View your diagnostic analysis graphically.");
								alert("Y-axis denotes percentage strength and weakness. X-axis denotes Unit name.");
								ch3();
								dt1 = "";
								dt2 = "";
								e.preventDefault();
							},
						});
					},
				});
				
			});
			
			$("#che").click(function(){
			$("#load_images").show();$("#hide_show_data").hide();
		/*		chart1bio.destroy();
				chart2phy.destroy();
				chart3mat.destroy();
			*/
				b = $("#che").val();
			//	alert("chemistry..."+b);
				$("#container4").show();
				$("#container1").hide();
				$("#container2").hide();
				$("#container3").hide();
				
				u1 = "chart1.php?s=17";
				u2 = "chart2.php?s=17";

				$.ajax({
					url: u1,
					type: 'GET',
					dataType: 'json',
					success: function(data) {
						dt1 = data;
								$.ajax({
								url: u2,
								type: 'GET',
								dataType: 'json',
								
							success: function(data) {
								$("#load_images").hide();
								$("#hide_show_data").show();
								dt2 = data;
								alert("View your diagnostic analysis graphically.");
								alert("Y-axis denotes percentage strength and weakness. X-axis denotes Unit name.");
								ch4();
								dt1 = "";
								dt2 = "";
								e.preventDefault();
							},
						});
					},
				});
				
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
			
			
			<!-- Display chart -->
			function ch1()
			{
				chart1bio = new Highcharts.Chart({
					
					chart: {
						renderTo: 'container1',
						type: 'column'
					},
					title: {
						min: 1,
						text: 'Student Score Evaluation'
					},
					xAxis: {
						categories: <?php							
							
								$result = mysql_query("SELECT ExamDate,ROUND(((ObtainedMarks/TotalMarks)*100),2) AS Percentage,
								@ans := 100-ROUND(((ObtainedMarks/TotalMarks)*100),2) AS Weakness,SUBJECT,
								QuePaperId
								FROM objective_evolution 
								WHERE StudentId=".$s1." AND SUBJECT ='BIO' AND absent=0
								UNION ALL
								SELECT ExamDate,ROUND(((ObtainedMarks/TotalMarks)*100),2) AS Percentage,
								@ans := 100-ROUND(((ObtainedMarks/TotalMarks)*100),2) AS Weakness,SUBJECT,
								QuePaperId
								FROM subjectiveevalution
								WHERE StudentId=".$s1." AND SUBJECT ='BIO' AND absent=0");
							
								$array = array();

								$num_rows = mysql_num_rows($result);
								$i=0;
								echo "['";
								while($row = mysql_fetch_array($result)) { 
									$i++;
									
									if($i<$num_rows){
										echo $link = "(".$row[0].") - ".$row[3]." - ".$row[4]."','";
									}
									else {
										echo $link = "(".$row[0].") - ".$row[3]." - ".$row[4];
									}
								}
								echo "']";
								$sub = "";
							?>,
						title: {
							text: 'Tests'
						},
						labels : { y : 20, rotation: -45, align: 'right' },
					},
					yAxis: {
						min: 0,
						title: {
							text: 'Percentage Scores'
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
						name: 'Score',
						data: dt1
					}]
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
						text: 'Student Score Evaluation'
					},
					xAxis: {
						categories: <?php							
							
								$result = mysql_query("SELECT ExamDate,ROUND(((ObtainedMarks/TotalMarks)*100),2) AS Percentage,
							@ans := 100-ROUND(((ObtainedMarks/TotalMarks)*100),2) AS Weakness,SUBJECT,
							QuePaperId
							FROM objective_evolution 
							WHERE StudentId=".$s1." AND SUBJECT ='PHY' AND absent=0
							UNION ALL
							SELECT ExamDate,ROUND(((ObtainedMarks/TotalMarks)*100),2) AS Percentage,
							@ans := 100-ROUND(((ObtainedMarks/TotalMarks)*100),2) AS Weakness,SUBJECT,
							QuePaperId
							FROM subjectiveevalution
							WHERE StudentId=".$s1." AND SUBJECT ='PHY' AND absent=0");
							
							$array = array();

							$num_rows = mysql_num_rows($result);
							$i=0;
							echo "['";
							while($row = mysql_fetch_array($result)) { 
								$i++;
								
								if($i<$num_rows){
									echo $link = "(".$row[0].") - ".$row[3]." - ".$row[4]."','";
								}
								else {
									echo $link = "(".$row[0].") - ".$row[3]." - ".$row[4];
								}
							}
							echo "']";
							$sub = "";
						?>,
						title: {
							text: 'Tests'
						},
						labels : { y : 20, rotation: -45, align: 'right' },
					},
					yAxis: {
						min: 0,
						title: {
							text: 'Percentage Scores'
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
						name: 'Score',
						data: dt1
					}]
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
						text: 'Student Score Evaluation'
					},
					xAxis: {
						categories: <?php							
							
								$result = mysql_query("SELECT ExamDate,ROUND(((ObtainedMarks/TotalMarks)*100),2) AS Percentage,
							@ans := 100-ROUND(((ObtainedMarks/TotalMarks)*100),2) AS Weakness,SUBJECT,
							QuePaperId
							FROM objective_evolution 
							WHERE StudentId=".$s1." AND SUBJECT ='MAT' AND absent=0
							UNION ALL
							SELECT ExamDate,ROUND(((ObtainedMarks/TotalMarks)*100),2) AS Percentage,
							@ans := 100-ROUND(((ObtainedMarks/TotalMarks)*100),2) AS Weakness,SUBJECT,
							QuePaperId
							FROM subjectiveevalution
							WHERE StudentId=".$s1." AND SUBJECT ='MAT' AND absent=0");
							
							$array = array();

							$num_rows = mysql_num_rows($result);
							$i=0;
							echo "['";
							while($row = mysql_fetch_array($result)) { 
								$i++;
								
								if($i<$num_rows){
									echo $link = "(".$row[0].") - ".$row[3]." - ".$row[4]."','";
								}
								else {
									echo $link = "(".$row[0].") - ".$row[3]." - ".$row[4];
								}
							}
							echo "']";
							$sub = "";
						?>,
						title: {
							text: 'Tests'
						},
						labels : { y : 20, rotation: -45, align: 'right' },
					},
					yAxis: {
						min: 0,
						title: {
							text: 'Percentage Scores'
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
						name: 'Score',
						data: dt1
					}]
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
						text: 'Student Score Evaluation'
					},
					xAxis: {
						categories: <?php							
							
								$result = mysql_query("SELECT ExamDate,ROUND(((ObtainedMarks/TotalMarks)*100),2) AS Percentage,
							@ans := 100-ROUND(((ObtainedMarks/TotalMarks)*100),2) AS Weakness,SUBJECT,
							QuePaperId
							FROM objective_evolution 
							WHERE StudentId=".$s1." AND SUBJECT ='CHE' AND absent=0
							UNION ALL
							SELECT ExamDate,ROUND(((ObtainedMarks/TotalMarks)*100),2) AS Percentage,
							@ans := 100-ROUND(((ObtainedMarks/TotalMarks)*100),2) AS Weakness,SUBJECT,
							QuePaperId
							FROM subjectiveevalution
							WHERE StudentId=".$s1." AND SUBJECT ='CHE' AND absent=0");
							
							$array = array();

							$num_rows = mysql_num_rows($result);
							$i=0;
							echo "['";
							while($row = mysql_fetch_array($result)) { 
								$i++;
								
								if($i<$num_rows){
									echo $link = "(".$row[0].") - ".$row[3]." - ".$row[4]."','";
								}
								else {
									echo $link = "(".$row[0].") - ".$row[3]." - ".$row[4];
								}
							}
							echo "']";
							$sub = "";
						?>,
						title: {
							text: 'Tests'
						},
						labels : { y : 20, rotation: -45, align: 'right' },
					},
					yAxis: {
						min: 0,
						title: {
							text: 'Percentage Scores'
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
						name: 'Score',
						data: dt1
					}]
				});
			}
			/* IF change color code of bar than highchars.js line 28....	*/
		});
		</script>
	</head>
	<body>
	<?php require 'header4.php'; ?>
	<br/>
		<table style="padding-top:0px;border:solid 0px;width:100%;height:25px;">
			<tr>
				<td style="background-color:#3366FF;border:solid 0px;">
					<label style="color:white"><b>Score Details</b></label>
				</td>
			</tr>
		</table>
	<div style="border:solid 1px;width:100%;;height:560px;">
		<table>	
			<tr>
				<td>
					<table>
						<tr>
							<td>
								<?php echo "<b>Date </b> : (".$dt1.") <b>to</b> (".$dt2.")";	?>
							</td>
							<td>
								<?php
								if($sub1 == 17)
								{
									echo "&nbsp;&nbsp;&nbsp;&nbsp;<b>Subject</b> : Chemistry";
								}
								else if($sub1 == 15)
								{
									echo "&nbsp;&nbsp;&nbsp;&nbsp;  <b>Subject</b> : Mathematics";
								}
								else if($sub1 == 16)
								{
									echo "&nbsp;&nbsp;&nbsp;&nbsp;  <b>Subject</b> :  Physics";
								}
								else if($sub1 == 14)
								{
									echo "&nbsp;&nbsp;&nbsp;&nbsp;  <b>Subject</b> :  Biology";
								}
								else if($sub1 == 18)
								{
									echo "&nbsp;&nbsp;&nbsp;&nbsp;  <b>Subject</b> :  Science";
								}
								else if($sub1 == 19)
								{
									echo "&nbsp;&nbsp;&nbsp;&nbsp; <b>Subject</b> :  English";
								}
								else
								{
									echo "&nbsp;&nbsp;&nbsp;&nbsp;  <b>Subject</b> :  All Subject.";
								}
								
								 ?>
							</td>
							<td>
								<?php
								if($type1 == 0)
								{
									echo " &nbsp;&nbsp;&nbsp;&nbsp; <b>Paper type</b> : Subjective";
								}
								else if($type1 == 1)
								{
									echo " &nbsp;&nbsp;&nbsp;&nbsp; <b>Paper type</b> : Objective";
								}
								else
								{
									echo " &nbsp;&nbsp;&nbsp;&nbsp; <b>Paper type</b> : Subjective and Objective.";
								} ?>
							</td>
							
						</tr>
					</table>
				</td>
			<tr>
			<tr>
				<td>
					<table id="dg1" title="Score OF student Test" class="easyui-datagrid" style="width:950px;height:400px"
						url="index2_get_users1.php"
						toolbar="#toolbar1" pagination="true"
						rownumbers="true" fitColumns="true" singleSelect="true">
						<thead>
							<tr>
								<th field="ExamDate" width="80">Exam Date</th>
								<th field="QuePaperId" width="100">QuePaperID</th>
								<th field="SUBJECT" width="50">Subject</th>
								<th field="TotalMarks" width="60">TotalMarks</th>
								<th field="absent" width="70">Absent/Present</th>
								<th field="ObtainedMarks" width="60">ObtainedMarks </th>
								<th field="Toppers_Mark" width="60">Toppers_mark</th>
								<th field="Batch_Avg" width="50">Batch_Avg</th>
							</tr>
						</thead>
					</table>
					
				</td>
			</tr>
		
		</table>
	</div>
	<div id="load_images" style="height:auto;width:auto;"><center><img valign="top" src="loading/di_load.gif" style='padding-top:100px;' alt="Loading" class="loading-gif" /></center></div>
	<div id="hide_show_data">
	<div style="border:solid 0px;width:100%;;height:20px;">
		Click on any of the following buttons to view your Test Scores graphically. You will need to scroll down to view the chart.
	</div>
	<div id="chartScore" style="border:solid 0px;width:100%;;height:30px;">
		<table>
			<tr>
				<td>
					<Button type="Button" id="bio" value="BIO" class="defaultbutton" >Biology</button>
				</td>
				<td>
					<Button type="Button" id="phy" value="PHY" class="defaultbutton" >Physics</button>
				</td>
				<td>
					<Button type="Button" id="che" value="CHE" class="defaultbutton" >Chemistry</button>
				</td>
				<td>
					<Button type="Button" id="mat" value="MAT" class="defaultbutton" >Mathematics</button>
				</td>
			</tr>
		</table>
	</div>
	<div id="container" style="border:solid 0px;width:100%;;height:60px;">
		<div id="container1" style="min-width: 2000px;height:650px;margin: 0 auto"></div>
		<div id="container2" style="min-width: 2000px;height:650px;margin: 0 auto"></div>
		<div id="container3" style="min-width: 2000px;height:650px;margin: 0 auto"></div>
		<div id="container4" style="min-width: 2000px;height:650px;margin: 0 auto"></div>
	</div>
	</div>
	<?php
		include 'conn_close.php';
	?>
	</body>
</html>