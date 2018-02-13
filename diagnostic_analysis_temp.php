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
				user_id='<?php echo $s5;?>';
										
						$("#close_window").click(function(){
//document.location.href="home.php";
window.close();
});
				//check graphic display
				$(".overlayModal").hide();
				 var content_name="animation";
				filename ="query/check_user_gif_display1.php?user_id="+user_id+"&content_name="+content_name;
					//alert(filename);
						$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						success: function(data, textStatus, xhr) {
						//alert(data);
						if(data=="0")
						{
						
							$(".overlayModal").show();
						
						}
						else
						{
						
							$(".overlayModal").hide();
							
						
						}
						},
						});
				//end check graphic display

				//alert(sub_id);
				$("#hide_show_data").hide();
				$("#load_images").show();
				u1 = "";
				u2 = "";
				$("#container1").show();
				//u1 = "query/dignostic_chart1.php?s="+sub_id;
				//u2 = "query/dignostic_chart2.php?s="+sub_id;
				u1 = "query/try_avg.php?s="+sub_id;
				u2 = "query/try_avg1.php?s="+sub_id;
				alert(u1);
				alert(u2);
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
							text: 'Unit Wise Diagnostic Analysis'
						},
						xAxis: {
							categories: <?php	
							
							
								$result_q1 = "SELECT id,user_id_list FROM `merge_account_student` WHERE user_id_list LIKE '%,$s5,%'";
								$result1 = mysql_query($result_q1);
								$rw = mysql_num_rows($result1);
								if($rw==0)
								{
								//echo "ig";
									$result = mysql_query("SELECT s.unit_id,s.Cumulative_per,u.unit_name,s.id FROM studenttestwise_unitper s,unit u WHERE s.user_id='$s5' AND s.subject_id='$sub_id' AND s.unit_id=u.id AND 			s.id IN( SELECT MAX(id) FROM studenttestwise_unitper WHERE user_id='$s5' AND subject_id='$sub_id' GROUP BY unit_id)");
								
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
								}
								else
								{
								/*$user_list="";
			while($row1 = mysql_fetch_array($result1))
			{
			$user_list=$user_list.$row1[1];
			}
			$ulist_final_temp="";
			$$final_colon="";
			$user_count=0;
			$lst = explode(",", $user_list);
			foreach($lst as $item) 
			{
				if($item=="")
				{
				}
				else
				{
					if($ulist_final_temp=="")
					{
					$ulist_final_temp=",".$item.",";
					$final_colon="'".$item."'";
					$user_count=$user_count+1;
					}
					else
					{
					$temp_id=",".$item.",";	
					if (strpos($ulist_final_temp,$temp_id) !== false)
							 {
								//goto nextrec;
								
							 }
							 else
							 {
							 $ulist_final_temp=$ulist_final_temp.$item.",";
							 $final_colon=$final_colon.",'".$item."'";
							 $user_count=$user_count+1;
							 }
					}
				}
			}
			$lst1 = explode(",", $ulist_final_temp);
			
			$num_rows=0;
			$rs2 = mysql_query("SELECT distinct s.unit_id,u.unit_name FROM studenttestwise_unitper s,unit u  WHERE s.user_id in($final_colon)  AND s.subject_id='$sub_id' and u.id=s.unit_id order by s.unit_id");
				$array = array();
			$num_rows = mysql_num_rows($rs2);
	
			$i=0;
			echo "[";
			while($row2 = mysql_fetch_array($rs2))
			{
			$i++;
										
										if($i<$num_rows){
											echo $link = $row2[1]."','";
										}
										else {
											echo $link = $row2[1];
										}
			}
			echo "']";
									$sub = "";*/
								}
								?>,
							title: {
								text: 'Unit Name'
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
				filename = "query/get_timemgnt_tips.php?user_id="+user_id+"&sub_id="+sub_id;
					//alert(filename);
					getContent(filename, "container_tips");
					function getContent(filename, selectboxid)
				{
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							var strtemp = "$('#" + selectboxid + "').html(data)";
							eval(strtemp);
							
						},
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
		<!-- Animation Overlay CSS begins -->
		<style media="screen">
		.overlayModal {
						/* some styles to position the modal at the center of the page */
						position: fixed;
						top: 10%;
						left: 90%;
						/*width: 300px;*/
						/*height: 200px;*/
						/*background-color: #f1c40f;*/
						text-align: center;
						border-radius: 5px;
						/* needed styles for the overlay */
						z-index: 10; /* keep on top of other elements on the page */

				}
/*Animation Overlay CSS Ends*/
		</style>

</head>
    
<body>
<!-- Animation Content Div -->
	<!--<div class="overlayModal">
		<?php
		$result=mysql_query("SELECT id,path,`upload_file_name_new` FROM `general_document_manager` WHERE file_type='gif' ORDER BY RAND()");
		while($row=mysql_fetch_array($result))
				{
					$full_path="GeneralDocument/".$row[2];
					echo "<img src='$full_path'  style='width:6em;height:6em;padding-right:7px;'>";
					goto exitrec;
				}
	exitrec:
		?>
	</div>-->


	<div style='background-color:#fff;width:100%'>
	<div class='trable_bg' style='position: fixed;z-index: 2;padding-left:0px;color:yellow;border:solid 0px;width:100%'>
			<table style='width:100%' cellspacing="0">
				<tr>
					<td style='width:100%;'>
						<center><?php require 'adlp.php'; ?></center>
					</td>
				</tr>
			
			</table>
		</div>
		
		<div style='background-color:#fff;width:100%'>
		<table style="padding-top:86px;border:solid 0px;width:100%;height:25px;">
		<!--<tr>
		<td><b>Welcome <?php echo "&nbsp;&nbsp;&nbsp;".$u5."&nbsp;&nbsp;!&nbsp;&nbsp;&nbsp;&nbsp;</b>";
		?>
		</td>
		</tr>-->

				<tr>
					<center><td style="border:solid 0px;background-color:#0f2541;width:98%;">
					<?php
												$result_c=mysql_query("SELECT name FROM course WHERE id='$course_id'");
												$row_c=mysql_fetch_array($result_c);
												$crname=$row_c[0]; 
												$result_c1=mysql_query("SELECT name FROM subject WHERE id='$sub_id'");
												$row_c1=mysql_fetch_array($result_c1);
												$subname=$row_c1[0];
												echo "<label style='float:left;color:#ffffff;padding-left:5px;'><font face='verdana' size='2' color='white' ><b>Welcome &nbsp;&nbsp;&nbsp;".$u5."&nbsp;&nbsp;!&nbsp;&nbsp;&nbsp;&nbsp;".$tutorname.">".$crname.">".$subname.">"."Unitwise Analysis<b></font></label>";

													//echo $crname.">".$subname.">"."Adaptive learning";
												
						?>
						
					</td></center>
					<td style="width:2%" valign="right">
							<img src="images/close_image.png" id="close_window" height="25px" width="25" align="right">
							</td>
				</tr>
			</table>
			<table style="width:100%;border:solid 0px;">
				<tr>
					<td>
						<div id="container1" style="padding-left:10px;min-width: 900px;height:700px;margin: 0 auto"></div>
					</td>
				</tr>
			</table>
		</div>
		<div style='background-color:#fff;width:100%'>
			<table style="width:100%;height:200px;border:solid 0px;">
				<tr>
					<td>
						<div id="container_tips" style="padding-left:10px;min-width: 900px;height:400px;margin: 0 auto"></div>
					</td>
				</tr>
			</table>
		</div>
	        <div>
                <?php require 'copy_right_file.php'; ?>
            </div>
	</div>
	<img src="images/footer final.png" style="height:auto;width:100%;padding-bottom:5px;" id="footer">
</body>
</html>