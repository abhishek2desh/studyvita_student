<?php
	include 'config.php';
	session_start();
	$today = date("Y-m-d", strtotime('today'));
	$course_id=$_SESSION['course_id'];
	$batch_id=$_SESSION['batch_id'];
	$subject_id=$_SESSION['subject_id'];
	$result1_sb=mysql_query("SELECT id,NAME,sort_name FROM SUBJECT WHERE id='$subject_id'");
	$row1_sb=mysql_fetch_array($result1_sb);
	$sub_id_rs=$row1_sb[0];
	$sub_name_rs=$row1_sb[1];
	$sub_sort_rs=$row1_sb[2]; 
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
		<script src="js/moment.js" type="text/javascript"></script>
		<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
		<link href="css/bg1.css" rel="stylesheet" type="text/css" />
		<link href="css/style_images.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="js/flexpaper.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers_debug.js"> </script>
		<link rel="stylesheet" href="css/jquery-ui.css" />
		<script src="js/jquery-ui.js"></script>
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
				padding: 0px 0px;
			}
		</style>
		<style>
			.main_div2 { 
			height: auto;
			width: auto; 
			background-color: white; 
			}
			 #footer {
				position: fixed;
				bottom: 0;
				width: 100%;
			}
		</style>
		<script type="text/javascript">
			
			$(function (){
				var select_type_wise=1;
				var sub_id_rs='<?php echo $subject_id; ?>',sub_name_rs='<?php echo $sub_name_rs; ?>',sub_sort_rs='<?php echo $sub_sort_rs; ?>';
				var sb11='<?php echo $subject_id; ?>';
				
				var datepickerVal44='<?php echo $today ?>',datepickerVal45='<?php echo $today ?>';
				var uid='<?php echo $s5;?>';
				var board1='<?php echo $board1;?>';
				var sub_id='<?php echo $subject_id;?>';
				var course_id='<?php echo $course_id;?>';
				 var batch_id='<?php echo $batch_id;?>';
				 var doc_start_time="",doc_end_time="";
		var page_source="exam-report.php";
		currentdate = new Date();
		currentdocid="";
		//alert("l");
		var  submenu_with_menu=0;
								currentdate = moment(currentdate).format("YYYY-MM-DD HH:mm:ss");
								doc_start_time=	currentdate;
								//alert(doc_start_time);
filename1 = "query/insert_menu_log.php?uid="+uid+"&docid="+currentdocid+"&start_time="+doc_start_time+"&page_source="+page_source+"&submenu_with_menu="+submenu_with_menu;
										//alert(filename1);
										$.ajax({
										url: filename1,
										type: 'GET',
										dataType: 'html',
										success: function(data, textStatus, xhr) {
												//alert(data);
											},
										});
										
										
										
										
										$("#close_window").click(function(){
currentdate = new Date();
								currentdate = moment(currentdate).format("YYYY-MM-DD HH:mm:ss");
								doc_end_time=	currentdate;
								
filename = "query/update_menu_log.php?uid="+uid+"&docid="+currentdocid+"&start_time="+doc_start_time+"&end_time="+doc_end_time+"&page_source="+page_source+"&submenu_with_menu="+submenu_with_menu;
										
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
				$( "#datepicker44" ).datepicker({
					dateFormat: "yy-mm-dd",
					altField: "#alternate",
					altFormat: "DD, d MM, yy",
					onSelect: function() { 
						datepickerVal44 = $("#datepicker44").val();
						}
					});
					$( "#datepicker45" ).datepicker({
					dateFormat: "yy-mm-dd",
					altField: "#alternate",
					altFormat: "DD, d MM, yy",
					onSelect: function() { 
						datepickerVal45 = $("#datepicker45").val();
						}
						});
$('#view_report').click(function(){
		$("#dig_rep_id1").html("");
		var exam_type_temp = $("input[type='radio'][name='exam_type']:checked");
		if (exam_type_temp.length > 0)
		exam_type= exam_type_temp.val();
		filename = "query/get_exam_report.php?sub_id="+sub_id+"&course_id="+course_id+"&exam_type="+exam_type+"&uid="+uid+"&batch_id="+batch_id+"&datepickerVal45="+datepickerVal45+"&datepickerVal44="+datepickerVal44;
		
						getContent(filename, "dig_rep_id1");
});
function getContent(filename, selectboxid)
				{
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							var strtemp = "$('#" + selectboxid + "').html(data)";
							eval(strtemp);
							//alert(data);
							//$("#sel_type").show();
						},
					});
				}
			});
		</script>
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
		<div style='background-color:#fff;width:100%;'>
			<table style="padding-top:85px;border:solid 0px;width:100%;height:25px;">
			<!--<tr>
		<td><b>Welcome <?php echo "&nbsp;&nbsp;&nbsp;".$u5."&nbsp;&nbsp;!&nbsp;&nbsp;&nbsp;&nbsp;</b>";
		?>
		</td>
		</tr>-->

				<tr>
					<td style="background-color:#0f2541;border:solid 0px;width:98%;">
					<?php
												$result_c=mysql_query("SELECT c.name,u.name FROM course c,user u WHERE c.id='$course_id' and u.id=c.tutor_id");
												$row_c=mysql_fetch_array($result_c);
												$crname=$row_c[0]; 
												$tutorname=$row_c[1]; 
												
												
												$result_c1=mysql_query("SELECT name FROM subject WHERE id='$subject_id'");
												$row_c1=mysql_fetch_array($result_c1);
												$subname=$row_c1[0];
												echo "<label style='float:left;color:#ffffff;padding-left:5px;'><font face='verdana' size='2' color='white' ><b>Welcome &nbsp;&nbsp;&nbsp;".$u5."&nbsp;&nbsp;!&nbsp;&nbsp;&nbsp;&nbsp;".$tutorname.">".$crname.">".$subname.">"."Exam Report<b></font></label>";
												
													
						?>
						
					</td>
					<td style="width:2%" valign="right">
							<img src="images/close_image.png" id="close_window" height="25px" width="25" align="right">
							</td>
				</tr>
			</table>
			<center><table class="main_div2" style="border:solid 0px;width:98%;height:25px;">
				<tr>
					<td style="border:solid 0px;width:100%;height:25px;">
						<table>
							<tr>
								<td>
									<label><b>From Date : </b></label>
								</td>
								<td>
									<input type="text" id="datepicker44" class="text_css" value="<?php echo $today ?>" />
								</td>
								<td>
									<label><b>To Date : <b/></label>
								</td>
								<td>
									<input type="text" id="datepicker45" class="text_css" value="<?php echo $today ?>" />
								</td>
								<td>
									<label><b>Exam Type : </b></label>
								</td>
								<td>
								<input id="1" type="radio" name="exam_type" value="1"checked="true"><label style="color:black" for="1" >Subjective</label>
								<input id="2" type="radio" name="exam_type" value="2"><label style="color:black" for="2">Objective</label>
								<input id="3" type="radio" name="exam_type" value="3"><label style="color:black" for="3">Both</label>
								</td>
								<td>
							
								<input type="BUTTON" id="view_report" class="defaultbutton" name="view_report" value="View Report">
								</td>
								<!--<td>
								<select id="sub_id_select" name="sub_id_select" style="width:160px;">
			<?php
			$result_link1=mysql_query("SELECT SUBJECT FROM course WHERE id='$course_id'");
		$res_row=mysql_fetch_array($result_link1);
		$sb_mn=substr($res_row[0], 0, -1);
		$lst = explode(",", $sb_mn);
		echo "<option value=''>Select Subject</option>";
		foreach($lst as $item) 
		{
			$result_link11=mysql_query("SELECT id,name FROM subject WHERE id='$item'");
			$res_row1=mysql_fetch_array($result_link11);
			if($res_row1[1]=="All")
			{
			echo "<option value='$res_row1[0]'>Mock</option>";
			}
			else
			{
			echo "<option value='$res_row1[0]'>$res_row1[1]</option>";
			}
			
			
		}
			?>
									</select></td>-->
								
							</tr>
						</table>
					</td>
				</tr>
			</table><br/></br>
			<div class='tdbox' id="dig_rep_id1" name="dig_rep_id1" style="border:solid 0px;overflow-y: 	scroll;background-color:white;width:90%;height:380px;">
						</div>
			</center>
			
		</div>
		<br/>
		<div><?php require 'footer.php'; ?></div>
	<div>
			<?php require 'copy_right_file.php'; ?>
		</div>
	</div>
		
</body>
</html>