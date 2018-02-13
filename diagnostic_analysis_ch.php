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
		<script src="js/moment.js" type="text/javascript"></script>
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
					uid='<?php echo $s5;?>';
					var doc_start_time="",doc_end_time="";
		var page_source="diagnostic_analysis_ch.php";
		var sub_menu_name="Knowledge meter";
		currentdate = new Date();
		currentdocid="";
	
		var  submenu_with_menu=1;
								currentdate = moment(currentdate).format("YYYY-MM-DD HH:mm:ss");
								doc_start_time=	currentdate;
								
filename1 = "query/insert_submenu_log.php?uid="+uid+"&docid="+currentdocid+"&start_time="+doc_start_time+"&page_source="+page_source+"&submenu_with_menu="+submenu_with_menu+"&sub_menu_name="+sub_menu_name;
					//alert(filename1);					
										$.ajax({
										url: filename1,
										type: 'GET',
										dataType: 'html',
										success: function(data, textStatus, xhr) {
												
											},
										});
										
	
											$("#close_window").click(function(){
currentdate = new Date();
								currentdate = moment(currentdate).format("YYYY-MM-DD HH:mm:ss");
								doc_end_time=	currentdate;
								
filename = "query/update_submenu_log.php?uid="+uid+"&docid="+currentdocid+"&start_time="+doc_start_time+"&end_time="+doc_end_time+"&page_source="+page_source+"&submenu_with_menu="+submenu_with_menu+"&sub_menu_name="+sub_menu_name;
										
										$.ajax({
										url: filename,
										type: 'GET',
										dataType: 'html',
										success: function(data, textStatus, xhr) {
											//alert(data);
											url = "virtual-class.php";
                              
                                   location.href = url;
											},
										});
});
				//check graphic display
				$(".overlayModal").hide();
				 var content_name="animation";
				filename ="query/check_user_gif_display1.php?user_id="+uid+"&content_name="+content_name;
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
								$result_q1 = "SELECT id,user_id_list FROM `merge_account_student` WHERE user_id_list LIKE '%,$s5,%'";
		$result1 = mysql_query($result_q1);
		$rw = mysql_num_rows($result1);
		if($rw==0)
		{
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
									}
									else
									{
									//
									$user_list="";
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
	
	
	$result = mysql_query("SELECT c.id,ROUND(IFNULL((sum(cs.Avg_Percent)/(SELECT COUNT(id) AS totalc FROM `chapterwise_student_average` WHERE student_id IN($final_colon) AND chapter_id=cs.chapter_id )),0),2) AS response,c.name FROM chapterwise_student_average cs,chapter c WHERE student_id in($final_colon) AND Subject_id IN(SELECT sub_id FROM subject_alias WHERE rel_sub_id='$sub_id') 	AND c.id=cs.Chapter_id GROUP BY cs.chapter_id");
									
									
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
									//
									}
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
		<table style="padding-top:88px;border:solid 0px;width:100%;height:25px;">
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
												echo "<label style='float:left;color:#ffffff;padding-left:5px;'><font face='verdana' size='2' color='white' ><b>Welcome &nbsp;&nbsp;&nbsp;".$u5."&nbsp;&nbsp;!&nbsp;&nbsp;&nbsp;&nbsp;".$tutorname.">".$crname.">".$subname.">"."Chapterwise Analysis <b></font></label>";
												
													//echo $crname.">".$subname.">"."Adaptive learning";
												
						?>
						
					</td></center>
					<td style="width:2%" valign="right">
							<img src="images/close_image.png" id="close_window" height="25px" width="25" align="right">
							</td>
				</tr>
			</table><br/>
			<table style="width:100%;border:solid 0px;">
				<tr>
					<td>
						<div id="container1" style="padding-left:10px;min-width: 900px;height:700px;margin: 0 auto"></div>
					</td>
				</tr>
			</table>
		</div>
	        <div>
                <?php require 'copy_right_file.php'; ?>
            </div>
	</div>
	<div><?php require 'footer.php'; ?></div>
	<!--<img src="images/footer final.png" style="height:auto;width:100%;padding-bottom:5px;" id="footer">-->
</body>
</html>