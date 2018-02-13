<?php
	include 'config.php';
	//include 'lock.php';
	session_start();
	
	$course_id=$_SESSION['course_id'];
	$batch_id=$_SESSION['batch_id'];
	$sub_id=$_SESSION['subject_id'];
	$s1=$_SESSION['studid1'];
	$s5=$_SESSION['sid'];
	$s3=$_SESSION['grp1'];
	$u5 = $_SESSION['uname'];
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>		
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="shortcut icon" href="images/Edutechheader.ico" />
		<meta name="keywords" content="edutechindiaonline">
		<meta name="description" content="edutechindiaonline">
		<title>Welcome <?php echo $u5 ?></title>
		<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
		<link href="css/bg1.css" rel="stylesheet" type="text/css" />
		<link href="css/style_images.css" rel="stylesheet" type="text/css" />
		<script src="bs_js/highcharts_1.js"></script>
		<script src="bs_js/exporting.js"></script>
		<script type="text/javascript" src="js/flexpaper.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers_debug.js"> </script>
		<link href="menu/menu.css" rel="stylesheet" type="text/css" />
		<style>
			html, body	{ height:100%;width:100%; }
			body { margin:0; overflow:auto; }
			.black {
				background: #444444;
				border: 1px solid #26487f;
				border-radius: 1px;
				color: #fff;
				outline: 1px solid #a5c7fe;
				padding: 6px 10px;
			}
		</style>
		<script>
			$(document).ready(function(){
				sub_id='<?php echo $sub_id;?>';
				//alert(sub_id);
				$("#hide_show_data").hide();
				$("#load_images").show();
				u1 = "";
				u2 = "";
				$("#container1").show();
				u1 = "query/dignostic_chart1_ch.php?s="+sub_id;
				u2 = "query/dignostic_chart2_ch.php?s="+sub_id;
				//alert(u1);
				//alert(u2);
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
								//alert(sub_id);
								ch1();
								dt1 = "";
								dt2 = "";
							},
						});
					},
				});
				function ch1()
				{
					chart1bio = new Highcharts.Chart({
						
						chart: {
							renderTo: 'container1',
							type: 'column'
						},
						title: {
							min: 1,
							text: ' Chapter Wise Diagnostic Analysis'
						},
						xAxis: {
							categories: <?php							
								
									$result = mysql_query("SELECT c.id,ROUND(IFNULL(cs.Avg_Percent,0),2) AS response,c.name FROM chapterwise_student_average cs,chapter c WHERE student_id='$s5' AND Subject_id IN(SELECT sub_id FROM subject_alias WHERE rel_sub_id='$sub_id')
									AND c.id=cs.Chapter_id");
									
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
								text: 'Chapter Name'
							},
							labels : { y : 20, rotation: -45, align: 'right' },
						},
						yAxis: {
							min: 0,
							title: {
								text: 'Strength and Weakness in(%)'
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
									this.series.name +': '+ this.y +'%';
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
		<style>
			.header-right-part{float:right; width:auto;height:46px;  background-color: #3093c7; background-image: -webkit-gradient(linear,  left top, left bottom, from(#3093c7), to(#1c5a85));
			 background-image: -webkit-linear-gradient(top, #3093c7, #1c5a85);
			 background-image: -moz-linear-gradient(top, #3093c7, #1c5a85);
			 background-image: -ms-linear-gradient(top, #3093c7, #1c5a85);
			 background-image: -o-linear-gradient(top, #3093c7, #1c5a85);
			 background-image: linear-gradient(to bottom, #3093c7, #1c5a85);;color:#e9eedd;border-radius:3px; margin-right:5px; padding:5px; box-shadow: 1px 1px 5px #000000;}
			 #footer {
				position: fixed;
				bottom: 0;
				width: 100%;
			}
			#header {
				position: fixed;
				top: 0;
				width: 100%;
			}
		</style>
</head>
    
<body>
	<div style='background-color:#EDF5FA;width:100%'>
		<div class='trable_bg' style='position: fixed;z-index: 2;padding-left:5px;color:yellow;border:solid 0px;width:100%'>
			<table style='width:100%'>
				<tr>
					<td style='width:100%;'>
						<center><?php require 'adlp.php'; ?></center>
					</td>
				</tr>
				<tr>
					<td valign='top' style='width:100%;border:solid px;'>
						<center><?php require 'menu/testmenu.php'; ?></center>
					</td>
				</tr>
			</table>
		</div>
		<div style='background-color:#EDF5FA;width:100%'>
			<table style="width:100%;height:1000px;border:solid 0px;">
				<tr>
					<td>
						<div id="container1" style="padding-left:10px;min-width: 900px;height:700px;margin: 0 auto"></div>
					</td>
				</tr>
			</table>
		</div>
		<div id="footer" style="background-color:#0174DF;">
			<center><div style="padding-left:5px;padding-top:5px;font-size:12px;color:black;text-transform: capitalize;"><label style="border:solid 0px;color:white;">Copyright &copy Edutech Educational Services Pvt. Ltd. Ahmedabad, Gujarat, India</label>
			</div></center>
		</div>
	</div>
	
</body>
</html>