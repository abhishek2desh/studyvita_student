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
		<link href="css/bg1.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="css/style_images.css" type="text/css" />
		<script type="text/javascript" src="js/flexpaper.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers_debug.js"> </script>
		<link rel="stylesheet" type="text/css" href="css/style_image_postreq.css" />
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
		var page_source="post-requirement.php";
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

					filename ="query/ViewCityQuery.php";
								getContent(filename, "text_city");
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
				
				$("#add_city").click(function(){
					$('body').scrollTop(0);
					$("#add_cityname").fadeIn("normal");
					$("#shadow").fadeIn();
				});
				$("#cancel_hide_city").click(function(){
						$("#add_cityname").fadeOut("normal");
				});
				$("#btn_city").click(function(){
					text_city2=$("#text_city1").val();
					filename = "query/AddNewCity.php?text_city1="+text_city2;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							//alert(data);
							if(data == 'Success')
							{
								alert("City Inserted Successfully");
													$("#text_city1").val("");
								$("#add_cityname").fadeOut("normal");
								$("#shadow").fadeOut();
								
							filename ="query/ViewCityQuery.php";
								getContent(filename, "text_city");
								
								
							}
							else 
							{
								alert(data);
							}
						},
					});
				});
				$('#submit_post_rec').click(function(){
					
					area=$("#text_area").val();
					city_id=$("#text_city").val();
					email=$("#text_email").val();
					phone=$("#text_phone").val();
					rec_type=$("#text_rectype").val();
					name=$("#text_name").val();
					std_id=$("#text_std").val();
					board_id=$("#text_board").val();
					sub_id=$("#text_sub").val();
					var idArray3 = [];
					$("#text_lec input:checkbox").each(function() {
						if ($(this).is(":checked"))
						{
							idArray3.push(this.value);
						}
					});
					lec_type_id = idArray3;
					//alert(lec_type_id);
					//lec_type_id=$("#text_lec").val();
					if(rec_type == "" || email=="" || phone=="" || city_id=="" )
					{
					alert("Some Fields are empty");
					}
					else
					{
					if(rec_type == "" && std_id==0 )
					{
					alert("Some Fields are empty");
					}
					else
					{
					
						filename = "query/Insertdata_PostRecruit.php?area="+area+"&city_id="+city_id+"&email="+email+"&phone="+phone+"&rec_type="+rec_type+"&name="+name+"&std_id="+std_id+"&board_id="+board_id+"&sub_id="+sub_id+"&lec_type_id="+lec_type_id;
						//alert(filename);
						$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							success: function(data, textStatus, xhr) {
								//alert(data);
								if(data == '')
								{
									
									alert("Data inserted successfully.");
									//for sms
									
									//end sms
									/*$("#text_area").val("");
									$("#text_name").val("");
									$("#text_email").val("");
									$("#text_phone").val("");
									$("#text_rectype").val("");*/
								}
								else
								{
									alert(data);
								}
							},
							});
						}
					}
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
												echo "<label style='float:left;color:#ffffff;padding-left:5px;'><font face='verdana' size='2' color='white' ><b>Welcome &nbsp;&nbsp;&nbsp;".$u5."&nbsp;&nbsp;!&nbsp;&nbsp;&nbsp;&nbsp;".$tutorname.">".$crname.">".$subname.">"."Post Learning Requirement<b></font></label>";
												
													
												
						?>
						
					</td>
					<td style="width:2%" valign="right">
							<img src="images/close_image.png" id="close_window" height="25px" width="25" align="right">
							</td>
				</tr>
			</table>
			
		
		</div>
				
				<form method="post" enctype="multipart/form-data">
						<div class='main_div' style='width:98%'>
							<table style='width:100%'>
							<tr>
							<td style='width:60%;padding-left:10px;' valign="top">
							<table style='width:100%'>
							<tr>
								<td style='width:30%;'>
									<label style='font-size:16px;'>Area</label>
								</td>
								<td style='width:40%;'>
									<input type='text' class='inputs' id='text_area' name="text_area"/>
								</td>
								<td>
								</td>
							</tr>
							<tr>
								<td>
									<label style='font-size:16px;'>City/Town</label>
								</td>
								<td>
									<select class='inputs' id='text_city' name="text_city" style='width:83%;'>
									</select>
									<input type='BUTTON' id='add_city' name='submit'  value = 'Add New City' class='defaultbutton'/>
								</td>
								<td>
								
									<!--<input type='BUTTON' id='add_chap' name='submit'  value = 'Add Chapter' class='defaultbutton'/>-->
								</td>
							</tr>
							<tr>
								<td style='width:30%;'>
									<label style='font-size:16px;'>Name</label>
								</td>
								<td style='width:40%;'>
									<input type='text' class='inputs' id='text_name' name="text_name" required placeholder='Enter Your Name'/>
								</td>
								<td>
								</td>
							</tr>
							<tr>
								<td style='width:30%;'>
									<label style='font-size:16px;'>Email</label>
								</td>
								<td style='width:40%;'>
									<input type='text' class='inputs' id='text_email' name="text_email" required placeholder='Enter Email Adderss'/>
								</td>
								<td>
								</td>
							</tr>
							<tr>
								<td style='width:30%;'>
									<label style='font-size:16px;'>Contact No</label>
								</td>
								<td style='width:40%;'>
									<input type='text' class='inputs' id='text_phone' name="text_phone" required placeholder='Enter Contact Number' />
								</td>
								<td>
								</td>
							</tr>
							<tr>
								<td>
									<label style='font-size:16px;'>Standard</label>
								</td>
								<td>
									<select class='inputs' id='text_std' name="text_std" style='width:83%;'>
									<option value='0'>Select Standard</option>
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
								<td>
								
								</td>
							</tr>
							<tr>
								<td>
									<label style='font-size:16px;'>Board</label>
								</td>
								<td>
									<select class='inputs' id='text_board' name="text_board" style='width:83%;'>
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
								<td>
								
								</td>
							</tr>
							<tr>
								<td>
									<label style='font-size:16px;'>Subject</label>
								</td>
								<td>
									<select class='inputs' id='text_sub' name="text_sub" style='width:83%;'>
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
								<td>
								
								</td>
							</tr>
							<tr>
								<td valign="top">
									<label style='font-size:16px;'>Mode of Lecture</label>
								</td>
								<td>
									<div class='inputs' id='text_lec'  name="text_lec" style='width:67%;height:80px;overflow-y: scroll;'>
									

											<?php
												$result=mysql_query("SELECT DISTINCT id,name  FROM lecture_mode ORDER BY id  ");
												$rw = mysql_num_rows($result);
												
												if($rw == 0)
												{
													echo "No Data Available.";
												}
												else
												{
													echo "<table style='width:100%;'>";
		
													while($row=mysql_fetch_array($result))
													{
														echo "<tr>";
					echo "<td style='color:black;border:solid 0px;width:100%;'><input type='checkbox' name='name_ch[]' id='$row[0]-$row[1]' class='ck' value='$row[0]' />".$row[1]."</td>";
				echo "</tr>";
													}
													echo "</table>";
												}
											?>
									</div>
								</td>
								<td>
								
								</td>
							</tr>
							<tr>
								<td style='width:30%;' valign='top'>
									<label style='font-size:16px;'>Requirement Type</label>
								</td>
								<td style='width:40%;'>
								 <textarea id='text_rectype' rows="4" cols="30" style='width:81%;'>
								 </textarea> 
								</td>
								<td>
								</td>
							</tr>
							<tr >
							<td style='width:30%;' valign='top'>
								</td>
								<td style='padding-top:10px;'>
									<input type='BUTTON' id='submit_post_rec' name='submit_post_rec' class='defaultbutton' value = 'Submit'/>

								</td>
							</tr>
						</table>

							</td>
							<td style='width:40%' valign="center">
							<?php
							$cat_id="";
		$result1=mysql_query("SELECT g.id,g.path,g.upload_file_name_new,gd.name,gd.id FROM `general_document_manager` g,general_document_category gd WHERE (g.file_type='jpg' or g.file_type='png')  and g.image_shape='rectangle' and g.image_orientation='horizontal' and g.image_size='medium'  and gd.id=g.document_category_id and gd.id in('16','17','18') ORDER BY RAND()");
		while($row1=mysql_fetch_array($result1))
				{
					$full_path="GeneralDocument/".$row1[2];
					echo "<img src='$full_path'  style='width:auto;height:auto;'>";
					$cat_id=$row1[4];
					goto exitrec4;
				}
	exitrec4:
	if($cat_id=="16")
	{
	echo "<br/> A rare Animal.";
	}
	else if($cat_id=="17")
	{
		echo "<br/> A rare Bird.";
	}
	else if($cat_id=="18")
	{
		echo "<br/> A rare Flower.";
	}
	else
	{
	}
	
		?>
		
		
		
							</td>
							</tr>
							</table>
													
						
						
						
						</div>

					</form>
						<?php include ("add_popup_postrec.php"); ?>
	        <div>
                <?php require 'copy_right_file.php'; ?>
            </div>

		<div><?php require 'footer.php'; ?></div>
	</div>
		
</body>
</html>