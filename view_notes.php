<?php
	include 'config.php';
	session_start();
	
	$course_id=$_SESSION['course_id'];
	$batch_id=$_SESSION['batch_id'];
	$subject_id=$_SESSION['subject_id'];
	$result1_sb=mysql_query("SELECT id,NAME,sort_name FROM SUBJECT WHERE id='$subject_id'");
	$row1_sb=mysql_fetch_array($result1_sb);
	$sub_id_rs=$row1_sb[0];
	$sub_name_rs=$row1_sb[1];
	$sub_sort_rs=$row1_sb[2]; 
	//echo $subject_id;
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
			
	
	
		<link href="css/bg1.css" rel="stylesheet" type="text/css" />
		<link href="css/style_images.css" rel="stylesheet" type="text/css" />
			
	
		<script type="text/javascript" src="js/flexpaper.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers_debug.js"> </script>
		<link rel="stylesheet" href="css/jquery-ui.css" />
		<script src="js/jquery-ui.js"></script>
	
		
			<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="js/flowplayer-3.2.12.min.js"></script>

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
			/* outer shadows  (note the rgba is red, green, blue, alpha) */
			-webkit-box-shadow: 0px 0px 12px rgba(0, 0, 0, 0.4); 
			-moz-box-shadow: 0px 1px 6px rgba(23, 69, 88, .5);
			/* rounded corners */
			-webkit-border-radius: 12px;
			-moz-border-radius: 7px; 
			border-radius: 7px;
			/* gradients */
			background: -webkit-gradient(linear, left top, left bottom, 
			color-stop(0%, white), color-stop(15%, white), color-stop(100%, #D7E9F5)); 
			background: -moz-linear-gradient(top, white 0%, white 55%, #D5E4F3 130%); 
			}
			 #footer {
				position: fixed;
				bottom: 0;
				width: 100%;
			}
		</style>
		<script type="text/javascript">
			
			$(function (){
				
				});
		</script>
		
</head>
<body>
	<div style='background-color:#fff;width:100%'>
		<br/>
			<table style="border:solid 0px;width:70%;height:450px;">
				<tr>
					
					<td style="border:solid 1px;width:90%;background-color:white;" id="dig_rep_id" >
						
						<div id="viewer_1" style="border:solid 	0px;overflow-y:scroll;background-color:white;width:100%;height:600px;">
							<script type="text/javascript">
								function getDocumentUrl(document){
									//alert(document);
									//alert("services/view.php?doc={doc}&format={format}&page={page}");
									return "services/view.php?doc={doc}&format={format}&page={page}".replace("{doc}",document);
								}
								function getDocQueryServiceUrl(document){
									return "services/swfsize.php?doc={doc}&page={page}".replace("{doc}",document);
								}
								var startDocument = "<?php if(isset($_GET["doc"])){echo $_GET["doc"];}else{?>dgreport.pdf<?php } ?>";
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
								function callFlexPaperDocViewer2(startDocument1){
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
						
						</div>
					</td>
						<td valign="top" style="width:10%;" >
						<img  id="close_video" src="images/close_image2.png" style="height:25px;width:25px;" />
						</td>
				</tr>
			</table>
			
 	</div>
	
</body>
</html>