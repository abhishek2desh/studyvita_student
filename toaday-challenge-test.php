<?php
	include 'config.php';
	session_start();
	$uniqid = $_GET['uniq_id'];
	$userid = $_GET['uid'];
	
	$_SESSION['uniqid']=$uniqid;
	$_SESSION['userid']=$userid;
	$uname="";
		$result=mysql_query("SELECT name FROM `user` where `id`='$userid'");
	while($row=mysql_fetch_array($result))
				{
				$uname=$row[0];
				}
	







?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="shortcut icon" href="images/Edutechheader.ico" />
		<meta name="keywords" content="edutechindiaonline">
		<meta name="description" content="edutechindiaonline">
		<title>Welcome <?php echo $uname ?></title>
		<script src="js/moment.js" type="text/javascript"></script>
		<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
		<script src="js/jquery-1.8.3.js" type="text/javascript"></script>
		<link href="css/bg1.css" rel="stylesheet" type="text/css" />
		<link href="css/style_images.css" rel="stylesheet" type="text/css" />
		<script src="bs_js/highcharts_1.js"></script>
		<script src="bs_js/exporting.js"></script>
		<script type="text/javascript" src="js/flexpaper.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers_debug.js"> </script>
		<link type="text/css" rel="stylesheet" href="css/style_image_demo.css" />
			
		<link href="menu/menu.css" rel="stylesheet" type="text/css" />
		<style>
			html, body	{ height:100%;width:100%; }
			body { margin:0;  }
			.black {
				background: #444444;
				border: 1px solid #26487f;
				border-radius: 1px;
				color: #fff;
				outline: 1px solid #a5c7fe;
				padding: 6px 10px;
			}
			.hde {
			   position: absolute;
			   left:0px;
			   right:0px;
			   width: 90%;

			}
			td, th
			{
			border:0px solid #dddddd;
			}
			th
			{
			background-color:#dddddd;
			color:black;
			}
				.toggle-button { 
		background-color: white; margin: -7px 0; border-radius: 20px; border: 2px solid #D0D0D0; height: 20px; cursor: pointer; width: 50px; position: relative; display: inline-block; user-select: none; -webkit-user-select: none; -ms-user-select: none; -moz-user-select: none; 
		}
.toggle-button button { 
cursor: pointer; outline: 0; display:block; position: absolute; left: 0; top: 0; border-radius: 100%; width: 25px; height: 25px; background-color: white; float: left; margin: -3px 0 0 -3px; border: 2px solid #D0D0D0; transition: left 0.3s;
 }
.toggle-button-selected { 
background-color: #83B152; border: 2px solid #7DA652; 
}
.toggle-button-selected button { 
left: 28px; top: -2px; margin: 0; border: none; width: 23px; height: 23px; box-shadow: 0 0 4px rgba(0,0,0,0.1); 
}
.toggle-button1 { 
		background-color: white; margin: -7px 0; border-radius: 20px; border: 2px solid #D0D0D0; height: 20px; cursor: pointer; width: 50px; position: relative; display: inline-block; user-select: none; -webkit-user-select: none; -ms-user-select: none; -moz-user-select: none; 
		}
.toggle-button1 button { 
cursor: pointer; outline: 0; display:block; position: absolute; left: 0; top: 0; border-radius: 100%; width: 25px; height: 25px; background-color: white; float: left; margin: -3px 0 0 -3px; border: 2px solid #D0D0D0; transition: left 0.3s;
 }
.toggle-button-selected1 { 
background-color: #83B152; border: 2px solid #7DA652; 
}
.toggle-button-selected1 button { 
left: 28px; top: -2px; margin: 0; border: none; width: 23px; height: 23px; box-shadow: 0 0 4px rgba(0,0,0,0.1); 
}


		</style>
		
		<script>
			$(document).ready(function(){
			
			uniqid='<?php echo $uniqid;?>';
				userid='<?php echo $userid;?>';
				//check challeng is exist
filename ="query/check-user-challenge-response.php?user_id="+userid+"&uniq_id="+uniqid;
					
						$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						success: function(data, textStatus, xhr) {
						//alert(data);
						if(data=="0")
						{
						//$("#content").hide();
						//$("#testdiv").show();
						alert("Test not exist");
						$("#submit_bt").attr("disabled", true);
						}
						else
						{
							filename1 ="query/check-user-challenge-response1.php?user_id="+userid+"&uniq_id="+uniqid;
							$.ajax({
						url: filename1,
						type: 'GET',
						dataType: 'html',
						success: function(data1, textStatus, xhr) {
							if(data1=="0")
							{
							$("#submit_bt").attr("disabled", false);
							}
							else
							{
							alert("Test already done");
							$("#submit_bt").attr("disabled", true);
							}
						},
						});
						
						}
						},
						});
 //end check
				var select_ans_wise="";
			var document_name=uniqid+"_Qus";
		callFlexPaperDocViewer1(document_name);
		$('input[type="radio"][name="ans_sel"]').click(function(){
			var ans_type = $("input[type='radio'][name='ans_sel']:checked");
			if (ans_type.length > 0)
			select_ans_wise = ans_type.val();
			//alert(select_ans_wise);
		});
			$('#submit_bt').click(function(){
			if(select_ans_wise == "")
			{
				alert("Please select your option....");
			}
			else
			{
				filename = "query/insert_challenge_response.php?uniqid="+uniqid+"&userid="+userid+"&select_ans_wise="+select_ans_wise;
						
						$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							success: function(data, textStatus, xhr) {
								if(data=="")
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

	
		<center><div id="login_form_material">
			<div class="err" id="add_err"></div>
			<form action="" style="width:99%;">
				<!--<table style="border:px solid;width:100%;height:30px;">
					<tr>
						<td style='width:98%;background-color:#0f2541;'>
							<center><strong><label style="color:white">View Material </label></strong></center>
						</td>
						<td style='width:2%;'>
							<center><img src="images/close_image.png" id='cancel_hide_allot' height="25px" width="25"></center>
						</td>
					</tr>
				</table>-->
				<br/>
				<table style="border:0px solid;width:100%;padding-left:10px;">
					<div id="viewer_1" class="flexpaper_viewer" style="border:solid 1px;width:90%;height:500px;"></div>
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
									 Scale : 1.3,
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
									 Scale : 1.3,
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
				<br/>
					<table style="padding-top:5px;width:99.5%;">
								<tr>
									<td>
										<center>
										<label><b>Select Your Answer : </b></label>
										<input id="111" type="radio" class="ans_sel" name="ans_sel" value="A"><label for="111"><b>A</b></label>
										<input id="222" type="radio" class="ans_sel" name="ans_sel" value="B"><label for="222">
										<b>B</b></label>
										<input id="333" type="radio" class="ans_sel" name="ans_sel" value="C"><label for="333">
										<b>C</b></label>
										<input id="444" type="radio" class="ans_sel" name="ans_sel" value="D"><label for="444">
										<b>D</b></label>&nbsp;&nbsp;&nbsp;<input type="BUTTON" class="defaultbutton" style="width:120px;" id="submit_bt" name="submit_bt" value="Submit"/></center>
										
									</td>
								</tr>
							</table><br/>
					
			</form>
		</div></center>
		
			
<br/>
		

</body>
</html>
