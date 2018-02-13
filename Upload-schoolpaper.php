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
	if(isset($_POST['submit2']))
	{
	$text_school=$_POST['name_sch'];
		//$text_school=$_POST['text_school'];
		$text_board=$_POST['text_board'];
		$text_std=$_POST['text_std'];
		$text_sub=$_POST['text_sub'];
		$chap_desc=$_POST['chap_desc'];
		$text_test=$_POST['text_test'];
		$text_month=$_POST['text_month'];
		$text_year=$_POST['text_year'];
		$pmarks=$_POST['pmarks'];
		$chap_multi=$_POST['name_ch_multi'];
		$text_med=$_POST['text_med'];
		$totalq=$_POST['totalq'];
		$doubt_q=$_POST['doubt_q'];
		$chap_id_multi="";
		$chap_no_multi="";
		$medium_id=0;
		$result1m=mysql_query("SELECT id,sort_name FROM language_detail WHERE id='$text_med'");
		//$row_1m=mysql_fetch_array($result1m);
		while($row_1m=mysql_fetch_array($result1m))
		{
		$medium_id=$row_1m[0];
		
		}
		foreach($chap_multi as $selected) 
		{
			$chid_temp=$selected;
			if($chid_temp=="")
			{
			}
			else
			{
				$chid_temp34 = explode("-", $chid_temp);
				$chap_id_multi=$chap_id_multi.$chid_temp34[0].",";
				if($chid_temp34[1]=="")
				{
				}
				else
				{
				$chap_no_multi=$chap_no_multi.$chid_temp34[1].",";
				}
			}
		}
		if ($_FILES["file"]["error"] > 0)
		{
			echo "Error: " . $_FILES["file"]["error"] . "<br>";
			$message2="Please select file";
				echo "<script language=javascript> alert('$message2');</script>"; 
		}
		else
		{ 
			if($text_school == "" || $text_board == '0' || $text_std == '0' || $text_sub == '0' || $text_year == '0' || $text_test == '0' || $text_month == '0' || $pmarks == "" || $pmarks=='0' || $chap_id_multi=="" || $text_med=='0' || $text_med=="")
			{
			 $message2="Select Proper Data.";
					echo "<script language=javascript> alert('$message2');</script>";
			}
			else
			{
			$file_name=$_FILES["file"]["name"];
			$str_arr = explode('.',$file_name);
			$str_bf = $str_arr[0];  // Before the Decimal point
			$str_af = $str_arr[1];
			if($str_af == "DOC" || $str_af == "doc" || $str_af == "pdf" || $str_af == "PDF" )
			{
			$sub1=$_POST['text_sub'];
		$sb34 = explode("-", $sub1);
		$sub= $sb34[0];
		$sb= strtoupper($sb34[1]);
		$sub_id= strtoupper($sb34[2]);
		$qr=mysql_query("SELECT MAX(id) AS max_id FROM document_manager_subjective_temp");
				$rw_qr=mysql_fetch_array($qr);
				$dt1=$rw_qr[0];
				$dt=$dt1+1;
	
		if($sub_id=="")
				{
				$file_mat="Schp_".$sb."_".$dt;
				}
				else
				{
				$file_mat="Schp_".$sub_id."_".$dt;
				}
				$file_mat1=$file_mat.".".$str_af;
				
					if($str_af == "pdf" || $str_af == "PDF")
					{
					$dir = "\\\ALNITEC-73N4CS8\\EdutechData\\SchoolPapers";
					rename("\\\ALNITEC-73N4CS8\\EdutechData\\SchoolPapers\\" . $_FILES["file"]["name"], "\\\ALNITEC-73N4CS8\\EdutechData\\SchoolPapers\\$file_mat1");
							move_uploaded_file($_FILES["file"]["tmp_name"],
							"\\\ALNITEC-73N4CS8\\EdutechData\\SchoolPapers\\$file_mat1");
					}
					else
					{
					$dir = "\\\ALNITEC-73N4CS8\\Eduservermaterials\\SchoolPapers";
					rename("\\\ALNITEC-73N4CS8\\Eduservermaterials\\SchoolPapers\\" . $_FILES["file"]["name"], "\\\ALNITEC-73N4CS8\\Eduservermaterials\\SchoolPapers\\$file_mat1");
							move_uploaded_file($_FILES["file"]["tmp_name"],
							"\\\ALNITEC-73N4CS8\\Eduservermaterials\\SchoolPapers\\$file_mat1");
					}
					$t_date = date('Y-m-d');
						$path="U:\\\SchoolPapers\\\\".$file_mat1;
						$papermonthyear=$text_month."-".$text_year;
						$sub_final=0;
						$result_sub=mysql_query("SELECT DISTINCT rel_sub_id FROM `subject_alias` WHERE sub_id='$sub' ");
						while($row_sub=mysql_fetch_array($result_sub))
						{
						$sub_final=$row_sub[0];
						}
						if($sub_final==0)
						{
						$sub_final=$sub;
						}
						$sql = "insert into document_manager_subjective_temp(`MaterialName`,`Subject`,`Board`,`Chapter`,`Standard`,`Documenttype`,`Examtype`,`Documentcode`,`faculty`,`path`,`Description`,`Orderdate`,`filename_doc`,`chapter_id`,language_id,PaperMonthYear,TestType,schoolid,marks,Doubt_Questions,total_questions)values('$file_mat','$sub','$text_board','$chap_no_multi','$text_std','Schoolpaper','Subjective','$file_mat','$s5','$path','$chap_desc','$t_date','$file_name','$chap_id_multi','$medium_id','$papermonthyear','$text_test','$text_school','$pmarks','$doubt_q','$totalq')";
						echo $sql;
						$result = mysql_query($sql);
						if($result)
						{
						$message2="File Successfully Uploaded.".$sql;
								echo "<script language=javascript> alert('$message2');</script>";
							echo "<script>window.opener.location.reload();</script>";
							echo "<script>window.close();</script>";
						}
						else
						{
						$message2="Try Again.";
							echo "<script language=javascript> alert('$message2');</script>";
						}
					
					/*}
					else
					{
						$message2="Try Again..";
						echo "<script language=javascript> alert('$message2');</script>";
					}*/
			}
			else
			{
			$message2="Choose doc or pdf file";
				echo "<script language=javascript> alert('$message2');</script>"; 
			}
			}
		}
	}
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
		<link type="text/css" rel="stylesheet" href="css/style_image_school.css" />
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
			.tooltip {
	display:none;
	position:absolute;
	border:1px solid #333;
	background-color:#161616;
	border-radius:5px;
	padding:10px;
	color:#fff;
	font-size:12px Arial;
}
a span.tooltip {display:none;}
		a:hover span.tooltip 
		{
		position:absolute;
		top:300px;
		left:70%;
		display:inline;
		border:0.5px solid green;
					 	background: white; 
						font-size:12px;
			width: 250px;			
		color: black; 
		}
		</style>
		<script>
			$(document).ready(function(){
			
			var user_id='<?php echo $s5; ?>';
				var datepickerVal34='<?php echo $today ?>';
				var text_subject=0;
				var text_std=0;
				var text_board=0;
					$("#hide_result").hide();
					$("#pincode_data").hide();
					
					
						$(".pincode_dt").show();
					//$("#state_id").show();
						$("#text_state").show();
							$("#hide_result").hide();
					$("#pincode_data").hide();
										$("#close_window").click(function(){
//document.location.href="home.php";
url = "virtual-class.php";
                              
                                   location.href = url;
});
					 $("#country_id option[value='107']").attr("selected", "selected");
						filename ="query/get_state_list.php";
					//alert(filename);
					getContent(filename, "state_id");
					filename = "test_paper_generator/get_schoolist.php";
								getContent(filename, "text_school");
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
				filename = "query/get_schoolpaper_data1.php?uid="+user_id;
			//alert(filename);
			getContent(filename, "schoolpaper_data");
				$('#areaid').on('keypress', function (event) {
		// alert(event.which);
		 if(event.which == 13)
		 {
		 $("#pincode_data").html("");
			area_id=$("#areaid").val();
			if(area_id=="")
			{
			
			}
			else
			{
			$("#hide_result").show();
				$("#pincode_data").hide();
			filename ="query/get_pincode_list.php?area_id="+area_id;
				
					getContent_pin(filename, "pincode_data");
			
			}
		 }
		 });
 $("#search_pin").click(function(){
				 $("#pincode_data").html("");
			area_id=$("#areaid").val();
			if(area_id=="")
			{
			
			}
			else
			{
				$("#hide_result").show();
				$("#pincode_data").hide();
			filename ="query/get_pincode_list.php?area_id="+area_id;
				//alert(filename);
					getContent_pin(filename, "pincode_data");
			}
			});
			function getContent_pin(filename, selectboxid)
				{
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							var strtemp = "$('#" + selectboxid + "').html(data)";
							eval(strtemp);
							$("#hide_result").hide();
							$("#pincode_data").show();
							//alert(data);
						},
					});
				}
				$("#text_sub").change(function(){
					text_subject=$("#text_sub").val();
						
				$("#text_chapter_multi").html("");
				filename ="test_paper_generator/chapter_select_for_grid_course2_multi.php?text_board="+text_board+"&text_subject="+text_subject+"&text_std="+text_std;
					//alert(filename);
					getContent(filename, "text_chapter_multi");
				});
				
				$("#add_new_school").click(function(){
				//alert("l");	
						$(".pincode_dt").show();
					//$("#state_id").show();
					$("#hide_result").hide();
					$("#pincode_data").hide();
			
					$("#text_state").show();
					 $("#pincode_data").html("");
					  $("#text_scname").html("");
					    $("#text_state").html("");
						$("#text_website").html("");
				 $("#country_id option[value='107']").attr("selected", "selected");
						filename ="query/get_state_list.php";
					//alert(filename);
					getContent(filename, "state_id");
					
						
							
					  $("#add_school").fadeIn("normal");
					$("#shadow").fadeIn();
				});
				$("#cancel_hide_school").click(function(){
				//alert("l");
					$("#add_school").fadeOut("normal");
					$("#shadow").fadeOut();
					
				});
				$("#country_id").change(function(){
				country_id=$("#country_id").val();
				country_name=$("#country_id option:selected").text();
			
				if(country_name=="India")
				{
				
					$(".pincode_dt").show();
					//$("#state_id").show();
						$("#text_state").show();
							$("#hide_result").hide();
					$("#pincode_data").hide();
						filename ="query/get_state_list.php";
					//alert(filename);
					getContent(filename, "state_id");
						//$("#search_pin").show();
						//$("#hide_result").hide();
				}
				else
				{
				$(".pincode_dt").hide();
					$("#text_state").show();
					//$("#state_id").hide();
						$("#hide_result").hide();
					$("#pincode_data").hide();
						//$("#areaid").hide();
						//$("#search_pin").hide();
						//$("#hide_result").hide();
				}
				});
				$("#btn_school").click(function(){
					school_name=$("#text_scname").val();
					int_website=$("#text_website").val();
					pincode=$("#pincode").val();
						country_id=$("#country_id").val();
						state_id=$("#state_id").val();
						text_state=$("#text_state").val();
				country_name=$("#country_id option:selected").text();
				
					if(school_name=="")
					{
					alert("Please enter school");
					}
					else
					{
					if(country_name=="India" || country_name=="india")
					{
					if(pincode=="")
					{
					alert("Enter pincode");
					}
					else
					{
					filename = "query/insert_school.php?school_name="+school_name+"&user_id="+user_id+"&int_website="+int_website+"&pincode="+pincode+"&country_id="+country_id+"&state_id="+state_id+"&country_name="+country_name+"&text_state="+text_state;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							//alert(data);
							if(data == 'Success')
							{	
								
								alert("Data Inserted Successfully ");
								filename = "test_paper_generator/get_schoolist.php";
								getContent(filename, "text_school");
								$("#add_school").fadeOut("normal");
							}
							else
							{
								alert(data);
							}
						},
					});
					}
					}
					else
					{
					filename = "query/insert_school.php?school_name="+school_name+"&user_id="+user_id+"&int_website="+int_website+"&pincode="+pincode+"&country_id="+country_id+"&state_id="+state_id+"&country_name="+country_name+"&text_state="+text_state;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							//alert(data);
							if(data == 'Success')
							{	
								
								alert("Data Inserted Successfully ");
								filename = "test_paper_generator/get_schoolist.php";
								getContent(filename, "text_school");
								$("#add_school").fadeOut("normal");
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
				$("#text_std").change(function(){
					text_std=$("#text_std").val();
					std=$("#text_std").val();
						 board_id=$("#text_board").val();
 $("#text_sub").html("");
 $("#text_chapter_multi").html("");
		  if(std>0 || board_id>0)
		  {
		   filename = "query/get_course_subject.php?std_id="+std+"&board_id="+board_id;
			
			 getContent(filename, "text_sub");
			 }	
  text_subject=$("#text_subject").val();			 
				
				/*filename ="test_paper_generator/chapter_select_for_grid_course2_multi.php?text_board="+text_board+"&text_subject="+text_subject+"&text_std="+text_std;
					//alert(filename);
					getContent(filename, "text_chapter_multi");*/
				});
				$("#text_board").change(function(){
					text_board=$("#text_board").val();
						std=$("#text_std").val();
						 board_id=$("#text_board").val();
 $("#text_sub").html("");
 $("#text_std").html("");
		  $("#text_chapter_multi").html("");
		   filename = "query/get_course_standard.php?board_id="+board_id;
			
			 getContent(filename, "text_std");
			 
  /*text_subject=$("#text_subject").val();	
				
				filename ="test_paper_generator/chapter_select_for_grid_course2_multi.php?text_board="+text_board+"&text_subject="+text_subject+"&text_std="+text_std;
					//alert(filename);
					getContent(filename, "text_chapter_multi");*/
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
												echo "<label style='float:left;color:#ffffff;'><font face='verdana' size='2' color='white' ><b>Welcome &nbsp;&nbsp;&nbsp;".$u5."&nbsp;&nbsp;!&nbsp;&nbsp;&nbsp;&nbsp;".$tutorname.">".$crname.">".$subname.">"."Upload School Paper<b></font></label>";
													
												//<label style="float:left;color:white"><b>View My Mistakes</b></label>
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
			<center><table style='width:100%;padding:0px;' cellspacing="10">
			<tr>
			
			
			<td style='width:100%;'>
			<font  color='black' ><center><h3>Upload School Paper</h3></center></font>
			</td>
			
			</tr>
			
			</table><br/></center>
			<label><font color="red">Instruction</font><br/>
For uploading question paper, you need to first scan the question paper and insert the images into a word file page wise. You can also insert the images from a smart phone. The saved file can be uploaded after filling up the following details. If the uploaded question passes the quality testing it will be accepted and placed in the Edu-shoppe for subscription. You will be getting an incentive for every subsciption.</label>
			<br/><br/>
			<center><table  style='width:60%;' cellspacing="7">
			<tr>
			<td style='width:30%;' valign="top">
				<label style='font-size:16px;'>Institute Name</label>
			</td>
			<td style='width:50%;'>
			<div id='text_school'  name="text_school" style='width:100%;height:100px;overflow-y: scroll;border: 1px solid;'></div><br>
			<input type="BUTTON" id="add_new_school" name="submits" class="defaultbutton" value="Add New Institution">
				<!--<select class='inputs' id='text_school' name="text_school" style='width:100%;'>
					<option  value='0'>Select Institution</option>
												<?php
												$result=mysql_query("SELECT distinct AutoID,schoolname FROM school_master  ORDER BY schoolname");
										$rw = mysql_num_rows($result);
										
										if($rw == 0)
										{
											echo "<option  value='0'>No Data Available.</option>";
										}
										else
										{
											while($row=mysql_fetch_array($result))
											{
												echo "<option  value=$row[0] title='tooltip'>".$row[1]."</option>";
											}
										}
												?>
												
				</select>-->
			</td>
			
			</tr>
			<tr>
			<td style='width:30%;'>
				<label style='font-size:16px;'>Board</label>
			</td>
			<td style='width:40%;'>
				<select class='inputs' id='text_board' name="text_board" style='width:100%;'>
					<option  value='0'>Select Board</option>
												<?php
												$result=mysql_query("SELECT DISTINCT b.id,b.name FROM  board b,course c WHERE c.board=b.id order by b.name");
										$rw = mysql_num_rows($result);
										
										if($rw == 0)
										{
											echo "<option  value='0'>No Data Available.</option>";
										}
										else
										{
											while($row=mysql_fetch_array($result))
											{
												echo "<option  value=$row[0]>$row[1]</option>";
											}
										}
												?>
												
				</select>
			</td>
			
			</tr>
			<tr>
			<td style='width:30%;'>
				<label style='font-size:16px;'>Standard</label>
			</td>
			<td style='width:40%;'>
				<select class='inputs' id='text_std' name="text_std" style='width:100%;'>
					<option  value='0'>Select Standard</option>
												<?php
												$result=mysql_query("SELECT DISTINCT s.id,s.name FROM  standard s,course c WHERE c.class=s.id");
										$rw = mysql_num_rows($result);
										
										if($rw == 0)
										{
											echo "<option  value='0'>No Data Available.</option>";
										}
										else
										{
											while($row=mysql_fetch_array($result))
											{
												echo "<option  value=$row[0]>$row[1]</option>";
											}
										}
												?>
												
				</select>
			</td>
			
			</tr>
			<tr>
			<td style='width:30%;'>
				<label style='font-size:16px;'>Subject</label>
			</td>
			<td style='width:40%;'>
				<select class='inputs' id='text_sub' name="text_sub" style='width:100%;'>
					<option  value='0'>Select Subject</option>
												<?php
												
												/*$result=mysql_query("SELECT id,NAME,sort_name FROM SUBJECT ORDER BY name");
				$row=mysql_fetch_array($result);
				$rw=mysql_num_rows($result);
				if($rw>0)
				{
				while($row=mysql_fetch_array($result))
				{
				if($row[1]=="All")
				{
				$row[1]="Mock";
				}
				
				echo "<option value=$row[0]-$row[1]-$row[2]>$row[1]</option>";
				}
				}*/	
												/*$result=mysql_query("SELECT distinct id,name FROM subject  ORDER BY name");
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
											$row[1]="Mock";
											}
												echo "<option  value=$row[0]>$row[1]</option>";
											}
										}*/
												?>
												
				</select>
			</td>
			
			</tr>
			<tr>
			<td style='width:30%;' valign="top">
				<label style='font-size:16px;'>Chapter</label>
			</td>
			<td style='width:40%;'>
				<div id='text_chapter_multi'  name="text_chapter_multi" style='width:100%;height:58px;overflow-y: scroll;border: 1px solid;'></div>
			</td>
			
			</tr>
			<tr>
			<td style='width:30%;' valign="top">
				<label style='font-size:16px;'>Description</label>
			</td>
			<td style='width:40%;'>
				<textarea rows="5" cols="33" id="chap_desc" name="chap_desc" style='width:100%;'>
										</textarea>
			</td>
			
			</tr>
			<tr>
			<td style='width:30%;' valign="top">
				<label style='font-size:16px;'>Medium</label>
			</td>
			<td style='width:40%;'>
				<select class='inputs' id='text_med' name="text_med" style='width:100%;'>
					<option  value='0'>Select Medium</option>
												<?php
												$result=mysql_query("select id,name from language_detail order by name");
											while($row=mysql_fetch_array($result))
											{
												echo "<option value=$row[0]>$row[1]</option>";
											}
												?>
												
				</select>
			</td>
			
			</tr>
			<tr>
			<td style='width:30%;'>
				<label style='font-size:16px;'> TestType</label>
			</td>
			<td style='width:40%;'>
			<select class='inputs' id='text_test' name="text_test" style='width:100%;'>
					<option  value='0'>Select TestType</option>
												<?php
												$result=mysql_query("SELECT distinct testtype FROM document_manager_subjective  where documenttype='SchoolPaper' ");
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
			</td>
			
			</tr>
			<tr>
			<td style='width:30%;'>
				<label style='font-size:16px;'> Month</label>
			</td>
			<td style='width:40%;'>
				<select class='inputs' id='text_month' name="text_month" style='width:100%;'>
					<option  value='0'>Select Month</option>
					<option  value='January'>January</option>
					<option  value='February'>February</option>
					<option  value='March'>March</option>
					<option  value='April'>April</option>
					<option  value='May'>May</option>
					<option  value='June'>June</option>
					<option  value='July'>July</option>
					<option  value='August'>August</option>
					<option  value='September'>September</option>
					<option  value='October'>October</option>
					<option  value='November'>November</option>
					<option  value='December'>December</option>
					</select>
			</td>
			
			</tr>
			<tr>
			<td style='width:30%;'>
				<label style='font-size:16px;'>Year</label>
			</td>
			<td style='width:40%;'>
				<select class='inputs' id='text_year' name="text_year" style='width:100%;'>
					<option  value='0'>Select Year</option>
					<?php
					for ($x = 2010; $x <= 2025; $x++) {
   echo "<option  value='$x'>$x</option>";
} 
?>
					</select>
			</td>
			
			</tr>
			<tr>
			<td style='width:30%;'>
				<label style='font-size:16px;'>Marks</label>
			</td>
			<td style='width:40%;'>
				<input type='text' id='pmarks' name='pmarks'  placeholder = 'Enter marks' style='width:100%;'/>
			</td>
			
			</tr>
			<tr>
			<td style='width:30%;'>
				<label style='font-size:16px;'>Total Questions</label>
			</td>
			<td style='width:40%;'>
				<input type='text' id='totalq' name='totalq'  placeholder = 'Enter total questions' style='width:100%;'/>
			</td>
			
			</tr>
			<tr>
			<td style='width:30%;' valign="top">
				<label style='font-size:16px;'>Doubt Questions</label>
			</td>
			<td style='width:40%;'>
				<textarea rows="5" cols="33" id="doubt_q" name="doubt_q" style='width:100%;'>
										</textarea>
			</td>
			
			</tr>
		<tr>
			<td style='width:30%;'>
				<label style='font-size:16px;'>Upload Your File</label>
			</td>
			<td style='width:40%;'>
				<input type="file" name="file" id="file">
			</td>
			<td style='width:30%;'>
			</td>
			</tr>
			<tr>
			<td style='width:30%;'>
				
			</td>
			<td style='width:40%;'>
				<input type='submit' id='submit2' name='submit2' class='defaultbutton' value = 'Upload'/>	
			</td>
			
			</tr>
			</table>
			<br/>
			<center><b>Uploaded Papers</b><div  id="schoolpaper_data" name="schoolpaper_data" style="border:solid 1px;overflow-y: 	scroll;background-color:white;width:80%;height:100px;">
									</div><br/><br/>
		</form>
	<div>
	
		<?php
			include 'popup-school.php';
		?>
		</div>
		<div><?php require 'footer.php'; ?></div>
	</body>
</html>