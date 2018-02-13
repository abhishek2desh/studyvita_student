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
	if ($_FILES["file"]["error"] > 0)
	{
		echo "Error: " . $_FILES["file"]["error"] . "<br>";
	}
	else
	{ 
		$text_id=$_POST['text_id'];
		if($text_id=="")
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
			if($str_af == "jpeg" || $str_af == "png" || $str_af == "jpg" || $str_af == "JPEG" || $str_af == "PNG" || $str_af == "JPG")
			{
				$upload_img_path="";
				$sq1_path=mysql_query("SELECT upload_path FROM `image_upload_path`");
				while($row_sqlpath=mysql_fetch_array($sq1_path))
				{
					
					$upload_img_path=$row_sqlpath[0];
				}
				move_uploaded_file($_FILES["file"]["tmp_name"],
				$upload_img_path."faculty\\talentphoto\\" . $_FILES["file"]["name"]);
				$new_path_copy=$upload_img_path."faculty\\talentphoto\\" . $_FILES["file"]["name"];
			$new_path_paste=$upload_img_path."coreacademics\\talentphoto\\" . $_FILES["file"]["name"];
					if(file_exists($new_path_copy))
					{
						
						copy("$new_path_copy","$new_path_paste");
					}
					{
					}
					$new_path_paste=$upload_img_path."admin\\talentphoto\\" . $_FILES["file"]["name"];
					if(file_exists($new_path_copy))
					{
						
						copy("$new_path_copy","$new_path_paste");
					}
					{
					}
					$sql_cv = "INSERT INTO user_talent_photo(`user_talent_id`,`filename`)VALUES('$text_id','$file_name')";
					$result_cv = mysql_query($sql_cv);
					if($result_cv)
					{
						$message="Your photo uploaded successfully";
						echo "<script language=javascript> alert('$message');</script>"; 
						echo '<SCRIPT LANGUAGE="JavaScript">
						document.location.href="talent-showcase.php" </SCRIPT>';
					}
					else
					{
						$message="Try after sometime";
						echo "<script language=javascript> alert('$message');</script>"; 
						echo '<SCRIPT LANGUAGE="JavaScript">
						document.location.href="talent-showcase.php" </SCRIPT>';
					}
			}
			else
			{
				$message2="Choose only png and jpg file..";
				echo "<script language=javascript> alert('$message2');</script>"; 
			}
		}
	}
}
if(isset($_POST['submit3']))
{
	if ($_FILES["file1"]["error"] > 0)
	{
		echo "Error: " . $_FILES["file1"]["error"] . "<br>";
	}
	else
	{ 
		$text_id=$_POST['text_id'];
		if($text_id=="")
		{
			$message2="Select Proper Data.";
			echo "<script language=javascript> alert('$message2');</script>";
		}
		else
		{
			$file_name=$_FILES["file1"]["name"];
			$str_arr = explode('.',$file_name);
			$str_bf = $str_arr[0];  // Before the Decimal point
			$str_af = $str_arr[1];
			if($str_af == "jpeg" || $str_af == "png" || $str_af == "jpg" || $str_af == "JPEG" || $str_af == "PNG" || $str_af == "JPG")
			{
				$upload_img_path="";
				$sq1_path=mysql_query("SELECT upload_path FROM `image_upload_path`");
				while($row_sqlpath=mysql_fetch_array($sq1_path))
				{
					
					$upload_img_path=$row_sqlpath[0];
				}
				move_uploaded_file($_FILES["file1"]["tmp_name"],
				$upload_img_path."faculty\\talentphoto\\" . $_FILES["file1"]["name"]);
				$new_path_copy=$upload_img_path."faculty\\talentphoto\\" . $_FILES["file1"]["name"];
			$new_path_paste=$upload_img_path."coreacademics\\talentphoto\\" . $_FILES["file1"]["name"];
					if(file_exists($new_path_copy))
					{
						
						copy("$new_path_copy","$new_path_paste");
					}
					{
					}
					$sql_cv = "INSERT INTO user_talent_certificate(`user_talent_id`,`filename`)VALUES('$text_id','$file_name')";
					$result_cv = mysql_query($sql_cv);
					if($result_cv)
					{
						$message="Your photo uploaded successfully";
						echo "<script language=javascript> alert('$message');</script>"; 
						echo '<SCRIPT LANGUAGE="JavaScript">
						document.location.href="talent-showcase.php" </SCRIPT>';
					}
					else
					{
					$message="Try after sometime";
						echo "<script language=javascript> alert('$message');</script>"; 
						echo '<SCRIPT LANGUAGE="JavaScript">
						document.location.href="talent-showcase.php" </SCRIPT>';
					}
			}
			else
			{
				$message2="Choose only png and jpg file..";
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
		<script src="js/moment.js" type="text/javascript"></script>
		<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
		<link href="css/bg1.css" rel="stylesheet" type="text/css" />
			<script src="js/jquery-ui.js"></script>
		<link rel="stylesheet" href="css/jquery-ui.css" />
		<link rel="stylesheet" href="css/style_images.css" type="text/css" />
		<script type="text/javascript" src="js/flexpaper.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers_debug.js"> </script>
		<link href="menu/menu.css" rel="stylesheet" type="text/css" />
		<style>
			html, body	{ height:100%;width:100%; }
			body { margin:0; overflow:auto;font-family:arial; }
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
			padding: 15px 25px; 
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
			var doc_start_time="",doc_end_time="";
		var page_source="talent-showcase.php";
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
										
										
										
										
			datepickerVal34 = $("#datepicker34").val();
			$("#text_id").hide();
			filename ="query/get_competition_data.php?fac_id="+user_id;
					
					getContent(filename, "comap_data");
						filename="query/get-comp-type.php";
							
								getContent(filename, "comp_id");
									filename="query/get-cat-type.php";
							
								getContent(filename, "category_id");
			$( "#datepicker34" ).datepicker({
					dateFormat: "yy-mm-dd",
					altField: "#alternate",
					altFormat: "DD, d MM, yy",
					onSelect: function() { 
						datepickerVal34 = $("#datepicker34").val();
						//alert(datepickerVal34);
					}
				});
				$("#search_del").live('click',function(){
					record_id="";
					record_id = ($(this).closest('tr').attr('id'));
					//alert(user_id);
					filename ="query/delete-talent-showcase.php?record_id="+record_id;
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							//alert(data);
							if(data == 'success')
							{
								alert("Data Deleted Successfully");
									
						filename1 ="query/get_competition_data.php?fac_id="+user_id;
					//alert(filename);
					getContent(filename1, "comap_data");
							}
							else
							{
								alert(data);
							}
							
						},
					});
				});
			$("#submit_u").click(function(){
			cname=$("#cname").val();
			placename=$("#placename").val();
			comp_id=$("#comp_id").val();
			category_id=$("#category_id").val();
			descid=$("#descid").val();
			if(comp_id=="" || category_id=="" || cname=="")
			{
			alert("Some fields are empty");
			}
			else if(descid=="")
			{
			alert("Please enter description");
			}
			else
			{
			filename = "query/insert_talent.php";
				data34={user_id:user_id,cname:cname,placename:placename,comp_id:comp_id,category_id:category_id,descid:descid,datepickerVal34:datepickerVal34};
			$.ajax({
							type: "POST",
				url: filename,
				
				data: data34,
						
						success: function(data, textStatus, xhr) {
							if(data == '')
							{
							alert("Data Inserted Successfully");
							$("#comap_data").html("");	
							filename ="query/get_competition_data.php?fac_id="+user_id;
					
					getContent(filename, "comap_data");
							}
							else
							{
							}

						},
					});
				//alert(filename);
				}
			});
				$("#btn_comptype").click(function(){
					text_comptype=$("#text_comptype").val();
					if(text_comptype=="")
					{
					alert("Enter Competition Type");
					}
					else
					{
					filename = "query/insert_comp_type.php?text_comptype="+text_comptype+"&fac_id="+user_id;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							//alert(data);
							if(data == 'Success')
							{
							alert("Data Inserted Successfully");
							filename="query/get-comp-type.php";
							
								getContent(filename, "comp_id");
								$("#add_new_comp_type").fadeOut("normal");
								$("#shadow").fadeOut();
							}
							else if(data == "")
							{
								alert("This Competition type already in list please try another name.");
							}
							else
							{
							alert(data);
							}
						},
					});
					}
				});
				$("#submit_u1").click(function(){
					youid=$("#youid").val();
					text_id=$("#text_id").val();
					if(text_id=="" || youid=="")
					{
					alert("Select proper data");
					}
					else
					{
					
						filename = "query/insert_youtube_link.php";
				data34={text_id:text_id,youid:youid};
			$.ajax({
							type: "POST",
				url: filename,
				
				data: data34,
						
						success: function(data, textStatus, xhr) {
							if(data == '')
							{
							alert("Data Inserted Successfully");
							
							}
							else
							{
							alert(data);
							}

						},
					});
					}
				});
				$("#btn_cat").click(function(){
					text_cat=$("#text_cat").val();
					if(text_cat=="")
					{
					alert("Enter Category ");
					}
					else
					{
					filename = "query/insert_category_type.php?text_cat="+text_cat+"&fac_id="+user_id;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							//alert(data);
							if(data == 'Success')
							{
							alert("Data Inserted Successfully");
							filename="query/get-cat-type.php";
							
								getContent(filename, "category_id");
								$("#add_new_cat_type").fadeOut("normal");
								$("#shadow").fadeOut();
							}
							else if(data == "")
							{
								alert("This category already in list please try another name.");
							}
							else
							{
							alert(data);
							}
						},
					});
					}
				});
			$("#add_new_comp").click(function(){
				//alert("l");
					$("#add_new_comp_type").fadeIn("normal");
					$("#shadow").fadeIn();
					
				});
				$("#cancel_hide_comptype").click(function(){
					$("#add_new_comp_type").fadeOut("normal");
					$("#shadow").fadeOut();
				});
				$("#add_new_cate").click(function(){
				
					$("#add_new_cat_type").fadeIn("normal");
					$("#shadow").fadeIn();
					
				});
				$("#cancel_hide_cat").click(function(){
					$("#add_new_cat_type").fadeOut("normal");
					$("#shadow").fadeOut();
				});
				$('#comap_data').click(function(){
					$("#comap_data input:radio:checked").each(function() {
							idArray2=this.id;
							
					});
					//alert(idArray2);
					$("#text_id").val("");
					document.getElementById("text_id").value =idArray2;
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
																								echo "<label style='float:left;color:#ffffff;padding-left:5px;'><font face='verdana' size='2' color='white' ><b>Welcome &nbsp;&nbsp;&nbsp;".$u5."&nbsp;&nbsp;!&nbsp;&nbsp;&nbsp;&nbsp;".$tutorname.">".$crname.">".$subname.">"."Talent Showcase<b></font></label>";

												
													
												
						?>
						
					</td>
					<td style="width:2%" valign="right">
							<img src="images/close_image.png" id="close_window" height="25px" width="25" align="right">
							</td>
				</tr>
			</table>
			<form method="post" enctype="multipart/form-data">
			<center><div id="main_div_1" class='main_div2' style='width:98%;'>
				<table style="width:100%;border:solid 0px;">
					<tr>
						<td valign="top" style="width:99%;border:solid 0px;">
							
							<table style="width:100%;">
								<tr>
									<td style="width:20%;">
									
										<label style="font-size:14px;color:black;">Event/Competition Name</label>
									</td>
									<td style="width:80%;">
										<input type="text" class="inputs" id="cname" />
									</td>
								</tr>
								<tr>
									<td>
										<label style="font-size:14px;color:black;">Date</label>
									</td>
									<td>
										<input type="text" id="datepicker34" value="<?php echo $today ?>" />
									</td>
								</tr>
								
								<tr>
									<td>
										<label style="font-size:14px;color:black;">Held at</label>
									</td>
									<td>
										<input type="text" class="inputs" id="placename" />	
									</td>
								</tr>
								<tr>
									<td valign="top">
										<label style="font-size:14px;color:black;">Type of Competition</label>
									</td>
									<td>
									<select id="comp_id" name="comp_id" style="background-color:white;width:200px;" class="inputs">
										<?php
												
										?>
									<input type="button" class="defaultbutton" id="add_new_comp" value='Add New' /><br/>
									</td>
								</tr>
								
							<tr>
									<td valign="top">
										<label style="font-size:14px;color:black;">Category</label>
									</td>
									<td>
									<select id="category_id" name="category_id" style="background-color:white;width:200px;" class="inputs">
										
									<input type="button" class="defaultbutton" id="add_new_cate" value='Add New' /><br/>
									</td>
								</tr>
							<tr>
									<td>
										<label style="font-size:14px;color:black;">A small description:<br/>(This will be displayed on the website)</label>
									</td>
									<td>
										<textarea rows="3" id="descid" cols="70" name="descid" maxlength="110">								</textarea>
									</td>
								</tr>
<tr>
									<td>
									
									</td>
									<td>
									<input type="button" id="submit_u" class="defaultbutton" value="Submit">						
									</td>
								</tr>									
				</table>
				
				<br/><table style="padding-top:0px;border:solid 0px;width:100%;height:25px;">
				<tr>
					<td style="background-color:#0f2541;border:solid 0px;">
						<label style="float:left;color:white"><b>Upload Photo,You tube link &  Certificate</b></label>
					</td>
				</tr>
			</table>
				<br/>
<div id="comap_data" style="width:100%;height:100px;border:solid 0px;overflow-y: scroll;"></div>
<input type="text" class='inputs1' id='text_id' name="text_id"  /><br/>
<table style="width:100%;">
								<tr>
									<td style="width:20%;">
										<label style='font-size:14px;'>Upload Photo of event</label>
									</td>
									<td style="width:80%;">
									<input type="file" name="file" id="file">
<input type="submit" id="submit2" name="submit2"  value="Upload" class="defaultbutton" style="display: inline-block;">									
									</td>
								</tr>
		<tr>
									<td style="width:20%;">
										<label style='font-size:14px;'>Upload a you tube link</label> 
									</td>
									<td style="width:80%;">
									<input type="text" class="inputs" id="youid" placeholder="Paste Youtube link" style="width:185px;"/>
										<input type="button" id="submit_u1" class="defaultbutton" value="Upload">	
									</td>
								</tr>
								<tr>
									<td style="width:20%;">
										<label style='font-size:14px;'>Upload your certificate (if any)</label> 
									</td>
									<td style="width:80%;">
									<input type="file" name="file1" id="file1">
<input type="submit" id="submit3" name="submit3"  value="Upload" class="defaultbutton"  style="display: inline-block;">							
									</td>
								</tr>
								</table>
					
				
			</div></center></form>
		<div><?php require 'footer.php'; ?></div>
		</div>
		<?php
			include 'form_for_add.php';
		?>
	        <div>
                <?php require 'copy_right_file.php'; ?>
            </div>

		
	</div><br/><br/>
		<div id="shadow" class="popup"></div>
		
		
</body>
</html>