<?php
	include 'config.php';
	session_start();
	$today = strtotime(date("Y-m-d H:i:s"));
	$today=$today+(34210);
	$today = date("Y-m-d", $today);
	$today2 = date("l, d F, Y", strtotime('today'));
	$course_id=$_SESSION['course_id'];
	$batch_id=$_SESSION['batch_id'];
	$subject_id=$_SESSION['subject_id'];
	$s1=$_SESSION['studid1'];
	$s5=$_SESSION['sid'];
	$s3=$_SESSION['grp1'];
	$u5 = $_SESSION['uname'];
	$result=mysql_query("SELECT u.name,sd.sname,sd.father_name,sd.f_mob_no,sd.pe_mailid,u.email,u.contact_no,u.username FROM USER u,student_details sd WHERE u.id=sd.user_id AND u.id='$s5'");
	$row=mysql_fetch_array($result);
	$uname=$row[0];$sname=$row[1];$fname=$row[2];$fmobile=$row[3];$pemail=$row[4];$uemail=$row[5];$contact_no=$row[6];
	$username=$row[7];
	
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
		<script src="js/moment.js" type="text/javascript"></script>
		<link href="css/bg1.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="css/style_images.css" type="text/css" />
		<script type="text/javascript" src="js/flexpaper.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers_debug.js"> </script>
		<link href="menu/menu.css" rel="stylesheet" type="text/css" />
		<style>
			html, body	{ height:100%;width:100%; }
			body { margin:0; overflow:auto; }
			.black {
				background: ;
				border: 1px solid #26487f;
				border-radius: 1px;
				color: #fff;
				outline: 1px solid #a5c7fe;
				padding: 6px 10px;
			}
		</style>
		<style>
			inputs:-webkit-input-placeholder { 
				color:    #b5b5b5; 
			} 
			 
			inputs-moz-placeholder { 
				color:    #b5b5b5; 
			} 
			 
			 .inputs  { 
			 width:200px; 
			padding: 10px 25px; 
			font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif; 
			font-weight: 400; 
			font-size: 14px; 
			color: #9D9E9E; 
			text-shadow: 1px 1px 0 rgba(256, 256, 256, 1.0); 
			background: #FFF; 
			border: 1px solid #FFF; 
			border-radius: 5px; 
			box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.50); 
			-moz-box-shadow: inset 0 1px 3px rgba(0,0,0,0.50); 
			-webkit-box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.50); 
			} 
			.inputs:focus { 
			   background: #DFE9EC; 
			color: #414848; 
			box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.25); 
			-moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.25); 
			-webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.25); 
				outline:0; 
			} 
			  .inputs:hover   { 
			background: #DFE9EC; 
			color: #414848; 
			} 
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
		<script>
			$(document).ready(function(){
			
				var user_id='<?php echo $s5; ?>';
				var user_name='<?php echo $u5; ?>';
				var course_id='<?php echo $course_id; ?>';
				var board_id=0;
				var std_id=0;
				var sub_id=0;
				var area="";
				var doc_start_time="",doc_end_time="";
		var page_source="fasss-faculty.php";
		currentdate = new Date();
		currentdocid="";
		//alert("l");
		var  submenu_with_menu=0;
								currentdate = moment(currentdate).format("YYYY-MM-DD HH:mm:ss");
								doc_start_time=	currentdate;
								//alert(doc_start_time);
filename1 = "query/insert_menu_log.php?uid="+user_id+"&docid="+currentdocid+"&start_time="+doc_start_time+"&page_source="+page_source+"&submenu_with_menu="+submenu_with_menu;
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
								
filename = "query/update_menu_log.php?uid="+user_id+"&docid="+currentdocid+"&start_time="+doc_start_time+"&end_time="+doc_end_time+"&page_source="+page_source+"&submenu_with_menu="+submenu_with_menu;
										
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
						},
					});									
				}
					filename = "query/get-facultylist-fasss-all.php?user_id="+user_id;
				//alert(filename);
				getContent(filename, "faculty_list");
				$('#text_class').change(function(){
				std_id=$('#text_class').val();
				$("#faculty_list").html("");
				filename = "query/get-facultylist-fasss.php?board_id="+board_id+"&std_id="+std_id+"&sub_id="+sub_id+"&area="+area+"&course_id="+course_id+"&user_id="+user_id;
				//alert(filename);
				getContent(filename, "faculty_list");
				});
				$("#request_class").live('click',function(){
						var bal=($(this).closest('tr').attr('id'));
							filename = "query/request_class_fass_fact.php?uid="+user_id+"&fact_id="+bal;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
						if(data=='')
						{
						alert("Data updated successfully");
						filename1 = "query/get-facultylist-fasss.php?board_id="+board_id+"&std_id="+std_id+"&sub_id="+sub_id+"&area="+area+"&course_id="+course_id+"&user_id="+user_id;
				
				getContent(filename1, "faculty_list");
						

						}
						else
						{
						alert(data);
						}
						},
						});
						
						});
				$('#text_board').change(function(){
				board_id=$('#text_board').val();
				$("#faculty_list").html("");
				filename = "query/get-facultylist-fasss.php?board_id="+board_id+"&std_id="+std_id+"&sub_id="+sub_id+"&area="+area+"&course_id="+course_id+"&user_id="+user_id;
				getContent(filename, "faculty_list");
				});
				$('#text_subject').change(function(){
				sub_id=$('#text_subject').val();
				$("#faculty_list").html("");
				filename = "query/get-facultylist-fasss.php?board_id="+board_id+"&std_id="+std_id+"&sub_id="+sub_id+"&area="+area+"&course_id="+course_id+"&user_id="+user_id;
				getContent(filename, "faculty_list");
				});
				$("input").keyup(function(){
				area=$("#text_area").val();
				$("#faculty_list").html("");
				filename = "query/get-facultylist-fasss.php?board_id="+board_id+"&std_id="+std_id+"&sub_id="+sub_id+"&area="+area+"&course_id="+course_id+"&user_id="+user_id;
				getContent(filename, "faculty_list");
				});
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
		<div style='background-color:#fff;width:100%;height:500%;'>
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
												echo "<label style='float:left;color:#ffffff;padding-left:5px;'><font face='verdana' size='2' color='white' ><b>Welcome &nbsp;&nbsp;&nbsp;".$u5."&nbsp;&nbsp;!&nbsp;&nbsp;&nbsp;&nbsp;".$tutorname.">".$crname.">".$subname.">"."Find FASSS Faculty<b></font></label>";
												
													
												
						?>
						
					</td>
					<td style="width:2%" valign="right">
							<img src="images/close_image.png" id="close_window" height="25px" width="25" align="right">
							</td>
				</tr>
			</table>
			
		
		</div>
				
				<form method="post" enctype="multipart/form-data">
						<center><div class='main_div'>
							
							<table style='width:100%' cellspacing="10">
							<tr class='first_main'>
									<td style='width:10%;'>
										<label style='font-size:16px;'>Select Class</label>
									</td>
									<td style='width:15%;'>
										<select class='inputs' id='text_class' name="text_class">
										<option value='0'>Select Class</option>
											<?php
												$result=mysql_query("SELECT DISTINCT s.id,CAST(s.name AS SIGNED  INTEGER)  FROM standard s,`faculty_subject_board_std_mapping` fm 
WHERE s.id=fm.standard_id ORDER BY CAST(s.name AS SIGNED  INTEGER) ");
												$rw = mysql_num_rows($result);
												
												if($rw == 0)
												{
													echo "<option value='0'>No Data Available.</option>";
												}
												else
												{
													while($row=mysql_fetch_array($result))
													{
														echo "<option value=$row[0]>$row[1]</option>";
													}
												}
											?>
										</select>
									</td>
									<td style='width:10%;'>
										<label style='font-size:16px;'>Select Board</label>
									</td>
									<td style='width:15%;'>
										<select class='inputs' id='text_board' name="text_board">
																					<option value='0'>Select Board/University</option>
										<?php
$result=mysql_query("SELECT DISTINCT b.id,b.name  FROM board b,`faculty_subject_board_std_mapping` fm WHERE b.id=fm.board_id ORDER BY b.name ");
												$rw = mysql_num_rows($result);
												
												if($rw == 0)
												{
													echo "<option value='0'>No Data Available.</option>";
												}
												else
												{
													while($row=mysql_fetch_array($result))
													{
														echo "<option value=$row[0]>$row[1]</option>";
													}
												}
											?>
										</select>
									</td>
																	<td style='width:10%;'>
										<label style='font-size:16px;'>Select Subject</label>
									</td>
									<td style='width:15%;'>
										<select class='inputs' id='text_subject' name="text_subject">
											<option value='0'>Select Subject</option>
											<?php
												$result=mysql_query("SELECT DISTINCT s.id,s.name  FROM subject s,`faculty_subject_board_std_mapping` fm WHERE s.id=fm.subject_id ORDER BY s.name  ");
												$rw = mysql_num_rows($result);
												
												if($rw == 0)
												{
													echo "<option value='0'>No Data Available.</option>";
												}
												else
												{
													while($row=mysql_fetch_array($result))
													{
														echo "<option value=$row[0]>$row[1]</option>";
													}
												}
											?>
										</select>
									</td>
									<td style='width:10%;'>
										<label style='font-size:16px;'>Area</label>
									</td>
									<td style='width:15%;'>
									<input type="text" class="inputs" id="text_area" name="text_area" required placeholder="Enter Area">
									</td>
								</tr>
								
								
							</table><br/>
						
							
						
						</div></center>
						<div id="faculty_list" name="faculty_list" style="border:solid 0px;overflow-y: 	scroll;background-color:white;width:100%;height:250px;padding-left:5px;">
						</div>
					</form>
	        <div>
                <?php require 'copy_right_file.php'; ?>
            </div>

		
	</div>
	<br/><br/>
		<div><?php include 'footer.php'; ?></div>
</body>
</html>