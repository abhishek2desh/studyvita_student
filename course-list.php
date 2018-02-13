<?php
	include 'config.php';
	session_start();
	$course_id=$_SESSION['course_id'];
	$batch_id=$_SESSION['batch_id'];
	$subject_id=$_SESSION['subject_id'];
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
		<script src="js/moment.js" type="text/javascript"></script>
		<script type="text/javascript" src="js/flowplayer-3.2.12.min.js"></script>
			<link type="text/css" rel="stylesheet" href="css/style_image_demo.css" />
			<link rel="stylesheet" type="text/css" href="css/style_image1.css" />
		<link href="menu/menu.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" media="screen" href="css/ui.jqgrid.css" />
		<link rel="stylesheet" type="text/css" href="css/flexpaper.css" />
		<script src="js/jquery-1.8.3.js"></script>
		<script src="js/jquery-ui.js"></script>
		<link rel="stylesheet" href="css/jquery-ui.css" />
		
		<script src="js/jquery-ui.js"></script>
		<script type="text/javascript" src="js/flexpaper.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers_debug.js"> </script>
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
			$(document).ready(function(){
			var uid='<?php echo $s5; ?>';
						var course_id='<?php echo $course_id; ?>';
						var batch_id='<?php echo $batch_id; ?>';
						var subject_id='<?php echo $subject_id; ?>';
						//alert(course_id);
						//alert(batch_id);
						//check graphic display
				$(".overlayModal").hide();
				 var content_name="animation";
				 var doc_start_time="",doc_end_time="";
		var page_source="course-list.php";
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
						position: absolute;
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
		<div style='background-color:#fff;width:100%;height:auto;'>
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
												echo "<label style='float:left;color:#ffffff;padding-left:5px;'><font face='verdana' size='2' color='white' ><b>Welcome &nbsp;&nbsp;&nbsp;".$u5."&nbsp;&nbsp;!&nbsp;&nbsp;&nbsp;&nbsp;".$tutorname.">".$crname.">".$subname.">"."My Courses <b></font></label>";
												
												//<label style="float:left;color:white"><b>Web Resources</b></label>
						?>
						
					</td>
					<td style="width:2%" valign="right">
							<img src="images/close_image.png" id="close_window" height="25px" width="25" align="right">
							</td>
				</tr>
			</table>
			<br/>
			<center>
			<form method="post" enctype="multipart/form-data">
				<div class='main_div2' style='width:100%;'>
					<div style="padding-left:0px;padding-top:0px;width:100%;">
						<table style='width:98%;'>
							
							<tr>
								<td style='width:100%;'>
									<center><div  id="course_list" name="course_list" style="border:solid 1px;overflow-y: 	scroll;background-color:white;width:98%;height:300px;">
									<?php
												$flg=1;
                                                    $total_student_course_registerd = 0;
                                                    echo "<table  id='tableSelect' style='width:100%;'>";
                                                    echo "<tr>";

                                                    echo "<th style='border:solid 1px;' width='25%'>								<font color='black' >Course Name</font></th>";
													    echo "<th style='border:solid 1px;' width='5%'>								<font color='black' >Course ID</font></th>";
													   echo "<th style='border:solid 1px;' width='8%'><font color='black'>Course Type</font></th>";
													    echo "<th style='border:solid 1px;' width='8%'><font color='black'>Account Type</font></th>";
                                                    echo "<th style='border:solid 1px;' width='15%'><font color='black'>Institution/Instructor</font></th>";
                                                    echo "<th style='border:solid 1px;' width='7%'><font color='black'>Start Date</font></th>";
													 echo "<th style='border:solid 1px;' width='7%'><font color='black'>End Date</font></th>";
													  echo "<th style='border:solid 1px;' width='10%'><font color='black'> Class room</font></th>";
													    echo "<th style='border:solid 1px;' width='5%'>								<font color='black' >Classroom ID</font></th>";
													   echo "<th style='border:solid 1px;' width='15%'><font color='black'>Subject</font></th>";
                                                    echo "</tr>";
													$j=1;
													 $result = mysql_query("SELECT DISTINCT c.id,c.name,c.tutor_id,u.name,str.expire_date,DATE_FORMAT(str.expire_date,'%d-%m-%Y'),DATE_FORMAT(str.create_date,'%d-%m-%Y'),c.subject 
											FROM student_registered_course str,course c,USER u WHERE str.course_id=c.id AND c.tutor_id=u.id AND str.user_id='$s5' and str.status=1 and c.id not in(select distinct course_id from user_purchased_ebook where user_id='$s5')");
											 $rw = mysql_num_rows($result);
                                                    if ($rw == 0) 
													{
													  
													}
													else
													{
													 while ($row1 = mysql_fetch_array($result))
													{
													 $course_type="";
											$result_ctype = mysql_query("SELECT ct.name FROM course_type ct,course_type_mapping ctm WHERE ctm.course_id='$row1[0]' AND ct.id=ctm.course_type_id ");
                                                    while ($row_ctype = mysql_fetch_array($result_ctype))
													{
                                                                    $course_type = $row_ctype[0];
                                                                }
														 if($j%2 == 0)
														{
														echo "<tr style='background-color:white;'>";
														}
														else
														{
														echo "<tr style='background-color:#5E9DC8;'>";
														}
												   echo "<td style='border:solid 1px;'><font color='black'>" . $row1[1] . "</font></td>";
												   echo "<td style='border:solid 1px;'><font color='black'>" . $row1[0] . "</font></td>";
                                                      echo "<td style='border:solid 1px;'><font color='black'>" . $course_type . "</font></td>"; 
  echo "<td style='border:solid 1px;'><font color='black'>Premium</font></td>";  													  
													    echo "<td style='border:solid 1px;'><font color='black'>" . $row1[3] . "</font></td>";
														   echo "<td style='border:solid 1px;'><font color='black'>" . $row1[6] . "</font></td>";
														      echo "<td style='border:solid 1px;'><font color='black'>" . $row1[5] . "</font></td>";
															  $batch_name="";
															  $bid="";
															  $result_b = mysql_query("SELECT b.name ,b.id FROM batch b,`course_type_mapping` ctm,`student_details` st WHERE st.user_id='$s5' AND b.id=st.batch_id
AND b.`course_type_mapping_id`=ctm.id AND ctm.course_id='$row1[0]' ORDER BY b.id DESC LIMIT 1");
                                                    while ($row_b = mysql_fetch_array($result_b))
													{
                                                                    $batch_name = $row_b[0];
																	  $bid = $row_b[1];
                                                                }
																   echo "<td style='border:solid 1px;'><font color='black'>" . $batch_name . "</font></td>";
																    echo "<td style='border:solid 1px;'><font color='black'>" . $bid . "</font></td>";
															$subject="";
															$subjectlist="";
															$subjectlist=$row1[7];
															$lst = explode(",", $subjectlist);
														foreach($lst as $item) 
														{
														if($item=="")
														{
														}
														else
														{
														  $result_s = mysql_query("SELECT NAME FROM SUBJECT WHERE id='$item'");
														   while ($row_s = mysql_fetch_array($result_s))
													{
													if($row_s[0]=="All")
													{
													$row_s[0]="Mock";
													}
													$subject=$subject.$row_s[0].",";
													}
														}
														}
														  echo "<td style='border:solid 1px;'><font color='black'>" . $subject . "</font></td>";
                                                        echo "</tr>";
														$j++;
                                                     }
													}
													
														$result1 = mysql_query("SELECT c.id,c.name,c.tutor_id,u.name,s.exp_date,c.subject,DATE_FORMAT(s.create_date,'%d-%m-%Y'),DATE_FORMAT(s.exp_date,'%d-%m-%Y') FROM course c,student_demo_course s,user u WHERE s.course_id=c.id AND c.tutor_id=u.id and s.user_id='$s5' and c.id not IN(select distinct course_id from student_registered_course where user_id='$s5') and c.id not in(select distinct course_id from user_purchased_ebook where user_id='$s5') ");
														while ($row1 = mysql_fetch_array($result1))
													{
													 $course_type="";
											$result_ctype = mysql_query("SELECT ct.name FROM course_type ct,course_type_mapping ctm WHERE ctm.course_id='$row1[0]' AND ct.id=ctm.course_type_id ");
                                                    while ($row_ctype = mysql_fetch_array($result_ctype))
													{
                                                                    $course_type = $row_ctype[0];
                                                                }
														 if($j%2 == 0)
														{
														echo "<tr style='background-color:white;'>";
														}
														else
														{
														echo "<tr style='background-color:#5E9DC8;'>";
														}
												   echo "<td style='border:solid 1px;'><font color='black'>" . $row1[1] . "</font></td>";
												    echo "<td style='border:solid 1px;'><font color='black'>" . $row1[0] . "</font></td>";
                                                      echo "<td style='border:solid 1px;'><font color='black'>" . $course_type . "</font></td>"; 
  echo "<td style='border:solid 1px;'><font color='black'>Basic</font></td>";  													  
													    echo "<td style='border:solid 1px;'><font color='black'>" . $row1[3] . "</font></td>";
														   echo "<td style='border:solid 1px;'><font color='black'>" . $row1[6] . "</font></td>";
														      echo "<td style='border:solid 1px;'><font color='black'>" . $row1[7] . "</font></td>";
															  $batch_name="";
															  $bid="";
															  $result_b = mysql_query("SELECT b.name,b.id FROM batch b,`course_type_mapping` ctm,`student_details` st WHERE st.user_id='$s5' AND b.id=st.batch_id
AND b.`course_type_mapping_id`=ctm.id AND ctm.course_id='$row1[0]' ORDER BY b.id DESC LIMIT 1");
                                                    while ($row_b = mysql_fetch_array($result_b))
													{
                                                                    $batch_name = $row_b[0];
																	$bid = $row_b[1];
                                                                }
																   echo "<td style='border:solid 1px;'><font color='black'>" . $batch_name . "</font></td>";
																     echo "<td style='border:solid 1px;'><font color='black'>" . $bid . "</font></td>";
															$subject="";
															$subjectlist="";
															$subjectlist=$row1[5];
															$lst = explode(",", $subjectlist);
														foreach($lst as $item) 
														{
														if($item=="")
														{
														}
														else
														{
														  $result_s = mysql_query("SELECT NAME FROM SUBJECT WHERE id='$item'");
														   while ($row_s = mysql_fetch_array($result_s))
													{
													if($row_s[0]=="All")
													{
													$row_s[0]="Mock";
													}
													$subject=$subject.$row_s[0].",";
													}
														}
														}
														  echo "<td style='border:solid 1px;'><font color='black'>" . $subject . "</font></td>";
                                                        echo "</tr>";
														$j++;
                                                     }
													echo "</table>";
													?>
									</div>
</center>
								</td>
							</tr>
						</table><br/>
												
								
									
					</div>
				</div>
				</form>
			</center>
		</div>
		<br/>
       	 
	</div>
			
	<div>
			<?php require 'copy_right_file.php'; ?>
		</div>
	<div><?php require 'footer.php'; ?></div>	
</body>
</html>