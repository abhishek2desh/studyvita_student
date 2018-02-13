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
	if(isset($_POST['submit2']))
	{
			if ($_FILES["file"]["error"] > 0)
			{
				//echo "Error: " . $_FILES["file"]["error"] . "<br>";
				$message1="Please select file to upload";
					echo "<script language=javascript> alert('$message1');</script>";
			}
			else
			{ 
				$docdata=$_POST['text_docid'];
				if($docdata=="")
				{
				$message2="Select TestID.";
				echo "<script language=javascript> alert('$message2');</script>";
				}
				else
				{
					$docsplit = explode("|", $docdata);
					if($docsplit[1]=="up")
					{
						$file_name=$_FILES["file"]["name"];
						$str_arr = explode('.',$file_name);
						$str_bf = $str_arr[0];  // Before the Decimal point
						$str_af = $str_arr[1];
						if($str_af == "DOC" || $str_af == "doc" || $str_af == "pdf" || $str_af == "PDF")
						{
						$testid=$docsplit[0];
						$uploadfilename_new=$testid."_".$s5;
						if($str_af == "DOC" || $str_af == "doc")
						{
						$docname=$testid."_".$s5.".doc";
						}
						else
						{
						$docname=$testid."_".$s5.".pdf";
						}
						$path="R:\\\StudentAnswersheet\\\\".$docname;
$sqlt = "insert into student_upload_answersheet(`user_id`,`test_id`,`filename_upload`,`file_path`,`filename_new`)values('$s5','$testid','$file_name','$path','$uploadfilename_new')";
						$resultt = mysql_query($sqlt);
						if($resultt)
						{

						
														
								if($str_af=="PDF" || $str_af=="pdf")
								{
								rename("\\\ALNITEC-73N4CS8\\Tempquestions \\StudentAnswersheet\\" . $_FILES["file"]["name"], "\\\ALNITEC-73N4CS8\\Tempquestions \\StudentAnswersheet\\$docname");
							move_uploaded_file($_FILES["file"]["tmp_name"],
							"\\\ALNITEC-73N4CS8\\Tempquestions \\StudentAnswersheet\\$docname");
								}
								else
								{
									rename("\\\ALNITEC-73N4CS8\\Eduservermaterials\\StudentAnswersheet\\" . $_FILES["file"]["name"], "\\\ALNITEC-73N4CS8\\Eduservermaterials\\StudentAnswersheet\\$docname");
							move_uploaded_file($_FILES["file"]["tmp_name"],
							"\\\ALNITEC-73N4CS8\\Eduservermaterials\\StudentAnswersheet\\$docname");
								
								}
								$message2="File Successfully Uploaded.".$errorname;
								$flg_upload=1;
									echo "<script language=javascript> alert('$message2');</script>";
							echo "<script>window.opener.location.reload();</script>";
							echo "<script>window.close();</script>";
						}
						else
						{
						$message6="Failed.Pls try after sometime";
					echo "<script language=javascript> alert('$message6');</script>";
						}							

						}
						else
						{
						$message2="Choose DOC or PDF file";
						echo "<script language=javascript> alert('$message2');</script>";
						}
					}
					else
					{
						$message3="Answersheet already uploaded";
						echo "<script language=javascript> alert('$message3');</script>";
						
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
		<script type="text/javascript">
			$(document).ready(function(){
			var uid='<?php echo $s5; ?>';
						var course_id='<?php echo $course_id; ?>';
						var batch_id='<?php echo $batch_id; ?>';
						var subject_id='<?php echo $subject_id; ?>';
						var doc_start_time="",doc_end_time="";
		var page_source="descriptive_mistake.php";
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

						filename = "query/get_subjective_testlist.php?batch_id="+batch_id+"&uid="+uid+"&subject_id="+subject_id;
			//alert(filename);
			getContent(filename, "test_id");
			$("#text_docid").hide();
			$("#cancel_hide_allot").click(function(){
					$("#login_form_material").fadeOut("normal");
					$("#shadow").fadeOut();
				});
				
			$('#test_id').click(function(){
					$("#test_id input:radio:checked").each(function() {
							idArray2=this.id;
							idArray3=this.value;
					});
					//alert(idArray2);
					$("#text_docid").val("");
					document.getElementById("text_docid").value =idArray3;
					
				});
					$('#submitq').click(function(){
					$("#test_id input:radio:checked").each(function() {
							idArray2=this.id;
							idArray3=this.value;
					});
					//alert(idArray2);
					
					var mySplitResults = idArray3.split("|");
					if(mySplitResults[3]=="")
					{
					}
					else
					{
						$("#shadow").fadeIn("normal");
					$("#login_form_material").fadeIn("normal");
					filename = "query/9_view_paper.php?code="+mySplitResults[3];
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
						//alert(data);
							if(data==1)
							{
							//alert("in if");
							docid=mySplitResults[3]+".pdf";
							//alert(docid);
							callFlexPaperDocViewer1(docid);
							}
							else
							{
							alert(data);
							}
							
							
						},
					});
					}
					});
				$('#submit').click(function(){
				var document_no="";
				$("#test_id input:radio:checked").each(function() {
							idArray2=this.id;
							idArray3=this.value;
				});
					document_no = idArray2;
					document_name = idArray3;
					//alert(document_no);
					
						if(document_no=="")
						{
						alert("Please select Test");
						}
						else
						{
							var mySplitResult = document_name.split("|");
							if(mySplitResult[1]=="up")
							{
							alert("Please upload answersheet");
							}
							else if(mySplitResult[1]=="cp")
							{
							alert("Correction pending");
							}
							else
							{
							filename_doc=mySplitResult[2]+".pdf";
							url="http://www.globaleduserver.com/edu/edutech_viewer_flex/view-checked-answersheet.php?subfolder=&doc="+filename_doc;
									//alert(url);
											var win = window.open(url, '_blank');
											if(win){
    //Browser has allowed it to be opened
    win.focus();
}else{
    //Broswer has blocked it
    alert('Please allow popups for this site');
}
							
							
								/*var url = "download-upload-document.php?document_name="+document_name;
								//alert(url);
								var win=window.open(url, '_blank');
								win.focus();*/
							}
						}
					
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
												$result_c=mysql_query("SELECT name FROM course WHERE id='$course_id'");
												$row_c=mysql_fetch_array($result_c);
												$crname=$row_c[0]; 
												$result_c1=mysql_query("SELECT name FROM subject WHERE id='$subject_id'");
												$row_c1=mysql_fetch_array($result_c1);
												$subname=$row_c1[0];
echo "<label style='float:left;color:#ffffff;padding-left:5px;'><font face='verdana' size='2' color='white' ><b>Welcome &nbsp;&nbsp;&nbsp;".$u5."&nbsp;&nbsp;!&nbsp;&nbsp;&nbsp;&nbsp;".$tutorname.">".$crname.">".$subname.">"."View My Mistakes<b></font></label>";

											
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
				<div class='main_div2' style='width:80%;'>
					<div style="padding-left:5px;padding-top:0px;">
						<table style='width:100%;'>
							
							<tr>
								<td style='width:100%;'>
									<center><div  id="test_id" name="test_id" style="border:solid 1px;overflow-y: 	scroll;background-color:white;width:80%;height:300px;">
									</div>
</center>
								</td>
							</tr>
						</table><br/>
												
								
										
										<!--<input type="file" name="file" id="file">
									
										<input type='submit' id='submit2' name='submit2' class="defaultbutton" value = 'Upload Answersheet'/>&nbsp;-->
												<input type='BUTTON' id='submit' name='submit' class="defaultbutton" value = 'View My Paper'/>&nbsp;&nbsp;&nbsp;<input type='BUTTON' id='submitq' name='submitq' class="defaultbutton" value = 'View Questionpaper Paper'/>&nbsp;&nbsp;&nbsp;
										<input type="text" class='inputs1' id='text_docid' name="text_docid"  />
					</div>
				</div>
				</form>
			</center>
		</div>
		<br/>
        
	</div>
					<div id="login_form_material">
			<div class="err" id="add_err"></div>
			<form action="" style="width:100%;">
				<table style="background-color:#2196F3;border:px solid;width:100%;height:30px;">
					<tr>
						<td style='width:95%;'>
							<center><strong><label style="color:white">View Paper</label></strong></center>
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
		</div>
	<div>
			<?php require 'copy_right_file.php'; ?>
		</div>
			<div><?php require 'footer.php'; ?></div>
</body>
</html>