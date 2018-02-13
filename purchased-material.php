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
		<script type="text/javascript" src="js/flexpaper.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers_debug.js"> </script>
		<link href="menu/menu.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="css/style_image_mat.css" />
			<script src="js/moment.js" type="text/javascript"></script>
		<script src="js/moment.js"></script>
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
				var datepickerVal34='<?php echo $today ?>';
				var course_id="",doc_type='mydoc';
				var course_id15="";
				var sb="";
				var doc_type_name,doc_type,doc_type1,mat_id,document_no="",docid,allottype,document_no_qus="";
				var mattype="";
				var sub_select=0;
				var doc_select=0;
				var exam_select=0;
				var year_select=0;
				var doc_start_time="",doc_end_time="";
				var page_source="purchased-material.php";
				var page_source_doc="purchased-material.php";
				var submenu_with_menu=0;
				var doc_start_time_menu="",doc_end_time_menu="";
			
		currentdocid="";
		//alert("l");
		var  submenu_with_menu=0;
		currentdate = new Date();
								currentdate = moment(currentdate).format("YYYY-MM-DD HH:mm:ss");
								doc_start_time_menu=	currentdate;
								filename1 = "query/insert_menu_log.php?uid="+user_id+"&docid="+currentdocid+"&start_time="+doc_start_time_menu+"&page_source="+page_source_doc+"&submenu_with_menu="+submenu_with_menu;
								
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
								doc_end_time_menu=	currentdate;
								
							filename = "query/update_menu_log.php?uid="+user_id+"&docid="+currentdocid+"&start_time="+doc_start_time_menu+"&end_time="+doc_end_time_menu+"&page_source="+page_source_doc+"&submenu_with_menu="+submenu_with_menu;
				
										$.ajax({
										url: filename,
										type: 'GET',
										dataType: 'html',
										success: function(data, textStatus, xhr) {
										
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

				$("#download_pdf2").hide();
				$("#download_pdf3").hide();
				allottype='batch';
				downloadper='0';
				//filename = "query/get-download-history.php?fac_id="+fac_id;
				//getContent(filename, "Download_history");
				//alert(fac_id);
				$('#text_subject').change(function(){
					$("#mat_data_alloted").html("");
					sub_select=$("#text_subject").val();
					doc_select=$("#text_doc").val();
					exam_select=$("#text_exam").val();
					year_select=$("#text_year").val();
					filename = "test_paper_generator/view_purchased_material1.php?fac_id="+user_id+"&sub_select="+sub_select+"&doc_select="+doc_select+"&exam_select="+exam_select+"&year_select="+year_select;
					getContent(filename, "mat_data_alloted");
				});
				$('#text_year').change(function(){
					$("#mat_data_alloted").html("");
					sub_select=$("#text_subject").val();
					doc_select=$("#text_doc").val();
					exam_select=$("#text_exam").val();
					year_select=$("#text_year").val();
					filename = "test_paper_generator/view_purchased_material1.php?fac_id="+user_id+"&sub_select="+sub_select+"&doc_select="+doc_select+"&exam_select="+exam_select+"&year_select="+year_select;
					getContent(filename, "mat_data_alloted");
				});
				$('#text_doc').change(function(){
					$("#mat_data_alloted").html("");
					sub_select=$("#text_subject").val();
					doc_select=$("#text_doc").val();
					exam_select=$("#text_exam").val();
					year_select=$("#text_year").val();
					filename = "test_paper_generator/view_purchased_material1.php?fac_id="+user_id+"&sub_select="+sub_select+"&doc_select="+doc_select+"&exam_select="+exam_select+"&year_select="+year_select;
					getContent(filename, "mat_data_alloted");
				});
				$('#text_exam').change(function(){
					$("#mat_data_alloted").html("");
					sub_select=$("#text_subject").val();
					doc_select=$("#text_doc").val();
					exam_select=$("#text_exam").val();
					year_select=$("#text_year").val();
					filename = "test_paper_generator/view_purchased_material1.php?fac_id="+user_id+"&sub_select="+sub_select+"&doc_select="+doc_select+"&exam_select="+exam_select+"&year_select="+year_select;
					getContent(filename, "mat_data_alloted");
				});
				$("#cancel_hide_allot").click(function(){
					
					currentdate = new Date();
								currentdate = moment(currentdate).format("YYYY-MM-DD HH:mm:ss");
								doc_end_time=	currentdate;	
								
					
filename = "query/update_menu_log_purchased_doc.php?uid="+user_id+"&docid="+docid+"&start_time="+doc_start_time+"&end_time="+doc_end_time+"&page_source="+page_source+"&submenu_with_menu="+submenu_with_menu;
										//alert(filename);
										$.ajax({
										url: filename,
										type: 'GET',
										dataType: 'html',
										success: function(data, textStatus, xhr) {
											//alert(data);
											//window.close();
											},
										});		
										
								//end log detail
			$("#login_form_material").fadeOut("normal");
					$("#shadow").fadeOut();
				});
				$("#cancel_hide_allot1").click(function(){
					$("#ppt_hide1").fadeOut("normal");
					$("#shadow").fadeOut();
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
						},
					});
				}
				
				
			
					filename = "test_paper_generator/view_purchased_material.php?fac_id="+user_id;
					//alert(filename);
					getContent(filename, "mat_data_alloted");
				
				$("#download_pdf3").click(function(){
					$("#mat_data_alloted input:radio:checked").each(function() {
							idArray2=this.id;
							//idArray3=this.value;
					});
					var mySplitResult = idArray2.split("|");
					path=mySplitResult[9];
					dnd=mySplitResult[8];
						input = path;
						output = input.substr(0, input.lastIndexOf('.')) || input;
						value = output.replace(/\\/g, "\\\\");
						filename = "query/copy_location_query_3.php?output="+value+"&mn="+dnd;
					//alert(filename);
						
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							//alert(data);
							if(data == "2")
							{
								alert("Still Working. Please Try After Sometime. Thank You.");
							}
							else
							{
							
								docid=data;
								//for log detail
					currentdate = new Date();
								currentdate = moment(currentdate).format("YYYY-MM-DD HH:mm:ss");
								doc_start_time=	currentdate;	
filename1 = "query/insert_document_log.php?uid="+user_id+"&docid="+docid+"&start_time="+doc_start_time+"&page_source="+page_source;
										//alert(filename1);
										$.ajax({
										url: filename1,
										type: 'GET',
										dataType: 'html',
										success: function(data, textStatus, xhr) {
												//alert(data);
											},
										});	
filename1 = "query/insert_menu_log_purchased_doc.php?uid="+user_id+"&docid="+docid+"&start_time="+doc_start_time+"&page_source="+page_source_doc+"&submenu_with_menu="+submenu_with_menu;
										//alert(filename1);
										$.ajax({
										url: filename1,
										type: 'GET',
										dataType: 'html',
										success: function(data, textStatus, xhr) {
												//alert(data);
											},
										});										
								//end log detail
								$("#shadow").fadeIn("normal");
					$("#login_form_material").fadeIn("normal");
								callFlexPaperDocViewer1(docid);
								
							}
						},
					});
					});
				
			
				$('#mat_data_alloted').click(function(){
					$("#mat_data_alloted input:radio:checked").each(function() {
							idArray2=this.id;
							//idArray3=this.value;
					});
					//alert(idArray2);
					var mySplitResult = idArray2.split("|");
					path=mySplitResult[0];
					document_no=mySplitResult[1];
					document_name=mySplitResult[2];
					onlineid=mySplitResult[3];
					var qfile=mySplitResult[4];
					document_no_qus=mySplitResult[5];
					if(mySplitResult[7]=="Schoolpaper" || mySplitResult[7]=="SchoolPaper")
					{
					if(qfile=="y")
					{
					$("#download_pdf3").show();
					}
					else
					{
					$("#download_pdf3").hide();
					}
					}
					else
					{
					}
					if(qfile=="y")
					{
					$("#download_pdf2").show();
					}
					else
					{
					$("#download_pdf2").hide();
					}
					
					
					if(doc_type == "eduserver")
					{
						if(onlineid==1)
						{
							dnd=document_name;
							input = path;
							output = input.substr(0, input.lastIndexOf('.')) || input;
							value = output.replace(/\\/g, "\\\\");
						}
						else
						{
							if( document_name.indexOf('_Qus') >= 0)
							{
							  // Found world
								value="GES_"+document_no+"_Qus";
								dnd=document_no;
							}
							else
							{
								value="GES_"+document_no;
								dnd=document_no;
							}					
						}
					}
					else
					{
						dnd=document_name;
						input = path;
						output = input.substr(0, input.lastIndexOf('.')) || input;
						value = output.replace(/\\/g, "\\\\");
					}
					filename = "query/copy_location_query_3.php?output="+value+"&mn="+dnd;
					//alert(filename);
					
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							//alert(data);
							if(data == "2")
							{
								alert("Still Working. Please Try After Sometime. Thank You.");
							}
							else
							{
								docid=data;
								if(mySplitResult[6]=="Objective")
								{
									if(mySplitResult[7]=="Questionpaper" || mySplitResult[7]=="Assignment")
									{
									document_name_qus=mySplitResult[8]+".pdf";
									currentdate = new Date();
								currentdate = moment(currentdate).format("YYYY-MM-DD HH:mm:ss");
								doc_start_time=	currentdate;
									filename1 = "query/insert_menu_log_purchased_doc.php?uid="+user_id+"&docid="+docid+"&start_time="+doc_start_time+"&page_source="+page_source_doc+"&submenu_with_menu="+submenu_with_menu;
										//alert(filename1);
										$.ajax({
										url: filename1,
										type: 'GET',
										dataType: 'html',
										success: function(data, textStatus, xhr) {
												//alert(data);
											},
										});	
									var url="http://student.coreacademics.in/purchased-material-test.php?id="+document_name_qus+"&qname="+mySplitResult[8];
					//var url = "http://www8.hp.com/in/en/products/printers/index.html#!view=grid&page=1&facet=HP-ePrint";
					location.href=url;
					}
					else
					{
						
									//for log detail
					currentdate = new Date();
								currentdate = moment(currentdate).format("YYYY-MM-DD HH:mm:ss");
								doc_start_time=	currentdate;	
filename1 = "query/insert_document_log.php?uid="+user_id+"&docid="+docid+"&start_time="+doc_start_time+"&page_source="+page_source;
										//alert(filename1);
										$.ajax({
										url: filename1,
										type: 'GET',
										dataType: 'html',
										success: function(data, textStatus, xhr) {
												//alert(data);
											},
										});	
filename1 = "query/insert_menu_log_purchased_doc.php?uid="+user_id+"&docid="+docid+"&start_time="+doc_start_time+"&page_source="+page_source_doc+"&submenu_with_menu="+submenu_with_menu;
										//alert(filename1);
										$.ajax({
										url: filename1,
										type: 'GET',
										dataType: 'html',
										success: function(data, textStatus, xhr) {
												//alert(data);
											},
										});											
								//end log detail
								$("#shadow").fadeIn("normal");
									$("#login_form_material").fadeIn("normal");
									callFlexPaperDocViewer1(docid);
					}
									}
									else
									{
								
									//for log detail
					currentdate = new Date();
								currentdate = moment(currentdate).format("YYYY-MM-DD HH:mm:ss");
								doc_start_time=	currentdate;	
filename1 = "query/insert_document_log.php?uid="+user_id+"&docid="+docid+"&start_time="+doc_start_time+"&page_source="+page_source;
										//alert(filename1);
										$.ajax({
										url: filename1,
										type: 'GET',
										dataType: 'html',
										success: function(data, textStatus, xhr) {
												//alert(data);
											},
										});	
filename1 = "query/insert_menu_log_purchased_doc.php?uid="+user_id+"&docid="+docid+"&start_time="+doc_start_time+"&page_source="+page_source_doc+"&submenu_with_menu="+submenu_with_menu;
										//alert(filename1);
										$.ajax({
										url: filename1,
										type: 'GET',
										dataType: 'html',
										success: function(data, textStatus, xhr) {
												//alert(data);
											},
										});											
								//end log detail
									$("#shadow").fadeIn("normal");
									$("#login_form_material").fadeIn("normal");
									//alert(docid);
									callFlexPaperDocViewer1(docid);
									}
								}
								
								
							
						},
					});
				});
				$('#download_pdf').click(function(){
					//var bal=($(this).closest('tr').attr('id'));
					//alert("kjlkj"+bal);
					if(document_no == "")
					{
						alert("Select Alloted Material for download....");
					}
					else
					{
						var url = "download_TMP_FIle_purchased.php?download_id="+document_no+"&fac_id="+user_id;
						//alert(url);
						var win=window.open(url, '_blank');
						win.focus();
					}
				});
				$('#download_pdf2').click(function(){
					//var bal=($(this).closest('tr').attr('id'));
					//alert("kjlkj"+bal);
					if(document_no_qus == "")
					{
						alert("Select Alloted Material for download....");
					}
					else
					{
						var url = "download_TMP_FIle_purchased.php?download_id="+document_no_qus+"&fac_id="+user_id;
						//alert(url);
						var win=window.open(url, '_blank');
						win.focus();
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
										echo "<label style='float:left;color:#ffffff;padding-left:5px;'><font face='verdana' size='2' color='white' ><b>Welcome &nbsp;&nbsp;&nbsp;".$u5."&nbsp;&nbsp;!&nbsp;&nbsp;&nbsp;&nbsp;".$tutorname.">".$crname.">".$subname.">"."Purchased Material<b></font></label>";

												
						?>
						
						
					</td>
					<td style="width:2%" valign="right">
							<img src="images/close_image.png" id="close_window" height="25px" width="25" align="right">
							</td>
				</tr>
			</table>
			
						
			</div>
		</div>
		<form method="post" enctype="multipart/form-data">
			<center><table style='width:100%;padding:20px;' cellspacing="10">
			<tr>
			
			
			<td style='width:100%;'>
			<font  color='black' ><center><h3>Purchased Material List</h3></center></font>
			</td>
			
			</tr>
			<tr>
			
			
			<td style='width:100%;'>
			<font  color='black' ><center>
			<select class='inputs' id='text_subject' name="text_subject" style='width:15%;'>
												<option  value='0'>Select Subject</option>
												<?php
												$result=mysql_query("SELECT distinct s.id,s.name FROM document_manager_subjective d,subject s  where s.id=d.subject ORDER BY s.name");
										$rw = mysql_num_rows($result);
										
										if($rw == 0)
										{
											echo "<option  value='0'>No Data Available.</option>";
										}
										else
										{
											while($row=mysql_fetch_array($result))
											{
												if($row[1]=="All")
												{
												echo "<option  value=$row[0]>Mock</option>";
												}
												else
												{
												echo "<option  value=$row[0]>$row[1]</option>";
												}
											}
										}
												?>
				</select>
				<select class='inputs' id='text_doc' name="text_doc" style='width:15%;'>
												<option  value='0'>Select Document</option>
												<?php
												$result=mysql_query("SELECT distinct documenttype FROM document_manager_subjective  where documenttype is not null and documenttype in('Assignment','Questionpaper','Notes','ppt','PreviousCompetitivePaper','SchoolPaper','BoardPaper') ORDER BY documenttype");
										$rw = mysql_num_rows($result);
										
										if($rw == 0)
										{
											echo "<option  value='0'>No Data Available.</option>";
										}
										else
										{
											while($row=mysql_fetch_array($result))
											{
											
												echo "<option  value=$row[0]>$row[0]</option>";
											}
										}
												?>
				</select>
				<select class='inputs' id='text_exam' name="text_exam" style='width:15%;'>
												<option  value='0'>Select Exam</option>
												<?php
												$result=mysql_query("SELECT DISTINCT testtype FROM `document_manager_subjective` WHERE testtype IS NOT NULL");
										$rw = mysql_num_rows($result);
										
										if($rw == 0)
										{
											echo "<option  value='0'>No Data Available.</option>";
										}
										else
										{
											while($row=mysql_fetch_array($result))
											{
												if($row[0]=="")
												{
												}
												else
												{
												echo "<option  value=$row[0]>$row[0]</option>";
												}
											}
										}
												?>
				</select>
				<select class='inputs' id='text_year' name="text_year" style='width:15%;'>
												<option  value='0'>Select Year</option>
												<?php
												$result=mysql_query("SELECT distinct papermonthyear FROM document_manager_subjective  where papermonthyear is not null and Documenttype='PreviousCompetitivePaper' ORDER BY papermonthyear");
										$rw = mysql_num_rows($result);
										
										if($rw == 0)
										{
											echo "<option  value='0'>No Data Available.</option>";
										}
										else
										{
											while($row=mysql_fetch_array($result))
											{
												if($row[0]=="")
												{
												}
												else
												{
												echo "<option  value=$row[0]>$row[0]</option>";
												}
											}
										}
												?>
				</select>
			</center></font>
			</td>
			
			</tr>
			<tr style='padding-top:10px;'>
				
			
				<td  valign="top" style='width:100%;border-left:solid 1px;border-right:solid 1px;border-bottom:solid 1px;border-top:solid 1px;' id="p3">
				
									<table style='width:100%;'>
										<!--<tr>
											
												<td style='width:100%;color:white;'>
												<center>	Allotted Material</center>
												</td>
											</tr>-->
											<tr>
											<td style='width:100%;'>
											
												<div id="mat_data_alloted" style="border:solid 0px;width:100%;height:250px;"></div>
											
											</td>
										</tr>
									</table>
				</td>
					
				
			</tr>
			</table><center>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='button' id='download_pdf3' value='View Answersheet' class='defaultbutton' ><!--<input type='button' id='download_pdf' value='Download' class='defaultbutton'>&nbsp;&nbsp;&nbsp;&nbsp;<input type='button' id='download_pdf2' value='Download question file' class='defaultbutton'>-->
			<br/>
			
		</form>
	<center><div id="ppt_hide1" style="width:70%;">
		<div class="err" id="add_err"></div>
			<form action="" style="width:100%;">
			<table style="background-color:#2196F3;border:px solid;width:100%;height:30px;">
					<tr>
						<td style='width:95%;'>
							<center><strong><label style="color:white">View Presentation</label></strong></center>
						</td>
						<td style='width:5%;'>
							<center><img src="images/close_image.png" id='cancel_hide_allot1' height="25px" width="25"></center>
						</td>
					</tr>
				</table>
				<table style="border:0px solid;width:100%;background-color:#393A3D;">
				<div class='hde' style='background-color:#393A3D;width:100%;height:100px;'></div>
				<div id="ppt_hide2" style="background-color:#393A3D;">
				</div>
				</table>
			</form>
		</div></center>
				<div id="login_form_material">
			<div class="err" id="add_err"></div>
			<form action="" style="width:100%;">
				<table style="background-color:#2196F3;border:px solid;width:100%;height:30px;">
					<tr>
						<td style='width:95%;'>
							<center><strong><label style="color:white">View Material</label></strong></center>
						</td>
						<td style='width:5%;'>
							<center><img src="images/close_image.png" id='cancel_hide_allot' height="25px" width="25"></center>
						</td>
					</tr>
				</table>
				<table style="border:0px solid;width:100%;">
					<div id="viewer_1" class="flexpaper_viewer" style="border:solid 1px;width:680px;height:360px"></div>
						<script type="text/javascript">
							function getDocumentUrl(document){
								//alert(document);
								//alert("services/view.php?doc={doc}&format={format}&page={page}");
								return "services/view.php?doc={doc}&format={format}&page={page}".replace("{doc}",document);
							}
							function getDocQueryServiceUrl(document){
								return "services/swfsize.php?doc={doc}&page={page}".replace("{doc}",document);
							}
							var startDocument = "<?php if(isset($_GET["doc"])){echo $_GET["doc"];}else{?>paper_gen.pdf<?php } ?>";
							$('#viewer_1').FlexPaperViewer(
							 {
								config : {
									 DOC : escape(getDocumentUrl(startDocument)),
									 Scale : 0.6,
									 ZoomTransition : 'easeOut',
									 ZoomTime : 0.5,
									 ZoomInterval : 0.2,
									 FitPageOnLoad : false,
									 FitWidthOnLoad : true,
									 FullScreenAsMaxWindow : false,
									 ProgressiveLoading : false,
									 MinZoomSize : 0.2,
									 MaxZoomSize : 5,
									 SearchMatchAll : false,
									 InitViewMode : 'Portrait',
									 RenderingOrder : 'flash,html',

									 ViewModeToolsVisible : true,
									 ZoomToolsVisible : true,
									 NavToolsVisible : true,
									 CursorToolsVisible : true,
									 SearchToolsVisible : true,

									 DocSizeQueryService : 'services/swfsize.php?doc=' + startDocument,
									 jsDirectory : 'js/',
									 localeDirectory : 'locale/',

									 JSONDataType : 'jsonp',
									 key : '',

									 localeChain: 'en_US'

									 }}
							);
							
							//callFlexPaperDocViewer("Paper.pdf");
							
							function callFlexPaperDocViewer1(startDocument1){
								//alert(startDocument1);
							
								$('#viewer_1').FlexPaperViewer({
									config : {

									 DOC : escape(getDocumentUrl(startDocument1)),
									 Scale : 0.6,
									 ZoomTransition : 'easeOut',
									 ZoomTime : 0.5,
									 ZoomInterval : 0.2,
									 FitPageOnLoad : false,
									 FitWidthOnLoad : true,
									 FullScreenAsMaxWindow : false,
									 ProgressiveLoading : false,
									 MinZoomSize : 0.2,
									 MaxZoomSize : 5,
									 SearchMatchAll : false,
									 InitViewMode : 'Portrait',
									 RenderingOrder : 'flash,html',

									 ViewModeToolsVisible : true,
									 ZoomToolsVisible : true,
									 NavToolsVisible : true,
									 CursorToolsVisible : true,
									 SearchToolsVisible : true,

									 DocSizeQueryService : 'services/swfsize.php?doc=' + startDocument1,
									 jsDirectory : 'js/',
									 localeDirectory : 'locale/',

									 JSONDataType : 'jsonp',
									 key : '',

									 localeChain: 'en_US'

									 }}
							);
							}
						</script>
				</table>
				
			</form>
	        <div>
                <?php require 'copy_right_file.php'; ?>
            </div>
			
	</div>
	<br/><br/>
		<div><?php require 'footer.php'; ?></div>
</body>
</html>