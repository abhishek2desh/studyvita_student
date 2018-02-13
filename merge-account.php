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
				var accountlist="";
				var course_id_stu='<?php echo $course_id; ?>';
				var page_source="purchased-material.php";
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
				
				
			
				
				filename = "query/view_user_account_list1.php?user_id="+user_id+"&course_id="+course_id_stu;
					//alert(filename);
					getContent(filename, "account_list1");
					$("#submit_acc").click(function(){
						st_uname=$("#st_uname").val();
						st_pwd=$("#st_pwd").val();
						if(st_uname=="" || st_pwd=="")
						{
						alert("Some fields are empty");
						}
						else
						{
							filename = "query/check_account_exist.php?st_uname="+st_uname+"&st_pwd="+st_pwd+"&accountlist="+accountlist;
				//alert(filename);
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					
					success: function(data, textStatus, xhr) {
						if(data == 'invalid')
						{
							alert("Invalid user");
						}
						else if(data == 'already')
						{
							alert("Already Added");
						}
						else
						{
						 var uid_add=data;
						 if(accountlist=="")
						 {
						 accountlist="," + uid_add+",";
						 }
						 else
						 {
						 accountlist=accountlist + uid_add+",";
						 }
							
							//alert(accountlist);
								//filename = "query/view_user_account_list.php?user_id="+user_id+"&course_id="+course_id_stu;
								$("#account_list").html("");
					filename = "query/view_user_account_list.php?accountlist="+accountlist;
					getContent(filename, "account_list");
						}
						
					},
				});
						}
					});
				$("#mergeacc").click(function(){
				stu_select= $('input[name="name_sb[]"]:checked').length;
				if(stu_select>1)
					{
					var selected = [];
					$('div#account_list input[type=checkbox]').each(function() {
						if ($(this).is(":checked")) {
						selected.push($(this).attr('value'));
					}
				});
				user_list=selected;
				filename ="query/insert-merge-user.php?user_list="+user_list+"&uid="+user_id;
			//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET', 
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							if(data == 'Success')
							{
								alert("Data inserted successfully");
							}
							else
							{
							alert(data);
							}
						},
						});
				}
				else
				{
					alert("Please select atleast two user");
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
										echo "<label style='float:left;color:#ffffff;padding-left:5px;'><font face='verdana' size='2' color='white' ><b>Welcome &nbsp;&nbsp;&nbsp;".$u5."&nbsp;&nbsp;!&nbsp;&nbsp;&nbsp;&nbsp;".$tutorname.">".$crname.">".$subname.">Merge Account<b></font></label>";

												
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
			<font  color='black' ><center><h3>Account List</h3></center></font>
			</td>
			
			</tr>
			
			<tr style='padding-top:0px;'>
				
			
				<td  valign="top" style='width:100%;border-left:solid 0px;border-right:solid 0px;border-bottom:solid 0px;border-top:solid 0px;' id="p3">
				
									<table style='width:100%;'>
										<!--<tr>
											
												<td style='width:100%;color:white;'>
												<center>	Allotted Material</center>
												</td>
											</tr>-->
											<tr>
											<td style='width:100%;'>
											&nbsp;&nbsp;&nbsp;<label >Enter Username</label>&nbsp;&nbsp;<input type="text" class="inputs" id="st_uname" style="width:300px;">
											<label >Enter Password</label>&nbsp;&nbsp;<input type="text" class="inputs" id="st_pwd">&nbsp;&nbsp;
											<input type="button" id="submit_acc" value="Add Account" class="defaultbutton"><br/><br/>
												<center><div id="account_list" style="border:solid 1px;width:98%;height:150px;overflow-y: scroll"></div></center>
											
											</td>
										</tr>
									</table>
				</td>
					
				
			</tr>
			</table><center>
			<input type="BUTTON" id="mergeacc" name="mergeacc" value="Merge Account" class="defaultbutton">
			<br/>
			<font  color='black' ><center><h3>Merge Account List</h3></center></font>
				<div id="account_list1" style="border:solid 1px;width:96%;height:100px;overflow-y: 	scroll"></div>
			<img src="images/footer final.png" style="height:auto;width:100%;padding-bottom:0px;padding-top:20px;">
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
		
</body>
</html>