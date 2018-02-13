<?php
include 'config.php';

session_start();
$u5 = $_SESSION['uname'];
$s5=$_SESSION['sid'];
$course_id=$_SESSION['course_id'];
$batch_id=$_SESSION['batch_id'];
$sub_id=$_SESSION['subject_id'];
$document_name = $_GET['document_name'];

/* This section can be removed if you would like to reuse the PHP example outside of this PHP sample application */
require_once("FlaxPaper/lib/config.php");
require_once("FlaxPaper/lib/common.php");

$configManager = new Config();
if($configManager->getConfig('admin.password')==null){
	$url = 'FlaxPaper/setup.php';
	header("Location: $url");
	exit;
}
?>

<!doctype html>
    <head>
		<title>Welcome <?php echo $u5 ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="shortcut icon" href="images/Edutechheader.ico" />
		<meta name="keywords" content="edutechindiaonline">
		<meta name="description" content="edutechindiaonline">
		
		<script src="js/moment.js" type="text/javascript"></script>
		<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
		<script src="js/jquery-1.8.3.js" type="text/javascript"></script>
		<link href="css/bg1.css" rel="stylesheet" type="text/css" />
		<link href="css/style_images.css" rel="stylesheet" type="text/css" />
		<script src="bs_js/highcharts_1.js"></script>
		<script src="bs_js/exporting.js"></script>
		<link type="text/css" rel="stylesheet" href="css/style_image_demo.css" />			
		<link href="menu/menu.css" rel="stylesheet" type="text/css" />
		
		<!-------- FlaxPaper ---------->
		<link rel="stylesheet" type="text/css" href="FlaxPaper/css/flexpaper.css" />
		<script type="text/javascript" src="FlaxPaper/js/jquery.min.js"></script>
		<script type="text/javascript" src="FlaxPaper/js/jquery.extensions.min.js"></script>
        <!--[if gte IE 10 | !IE ]><!-->
        <script type="text/javascript" src="FlaxPaper/js/three.min.js"></script>
        <!--<![endif]-->
		<script type="text/javascript" src="FlaxPaper/js/flexpaper.js"></script>
		<script type="text/javascript" src="FlaxPaper/js/flexpaper_handlers.js"></script>
		
		<style type="text/css" media="screen">
			<!--#flashContent { display:none; } -->
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
			.toggle-button
			{ 
				background-color: white; margin: -7px 0; border-radius: 20px; border: 2px solid #D0D0D0; height: 20px; cursor: pointer; width: 50px; position: relative; display: inline-block; user-select: none; -webkit-user-select: none; -ms-user-select: none; -moz-user-select: none; 
			}
			.toggle-button button
			{ 
				cursor: pointer; outline: 0; display:block; position: absolute; left: 0; top: 0; border-radius: 100%; width: 25px; height: 25px; background-color: white; float: left; margin: -3px 0 0 -3px; border: 2px solid #D0D0D0; transition: left 0.3s;
			}
			.toggle-button-selected
			{ 
				background-color: #83B152; border: 2px solid #7DA652; 
			}
			.toggle-button-selected button 
			{ 
				left: 28px; top: -2px; margin: 0; border: none; width: 23px; height: 23px; box-shadow: 0 0 4px rgba(0,0,0,0.1); 
			}
			.toggle-button1
			{ 
				background-color: white; margin: -7px 0; border-radius: 20px; border: 2px solid #D0D0D0; height: 20px; cursor: pointer; width: 50px; position: relative; display: inline-block; user-select: none; -webkit-user-select: none; -ms-user-select: none; -moz-user-select: none; 
			}
			.toggle-button1 button
			{ 
				cursor: pointer; outline: 0; display:block; position: absolute; left: 0; top: 0; border-radius: 100%; width: 25px; height: 25px; background-color: white; float: left; margin: -3px 0 0 -3px; border: 2px solid #D0D0D0; transition: left 0.3s;
			 }
			.toggle-button-selected1 
			{ 
				background-color: #83B152; border: 2px solid #7DA652; 
			}
			.toggle-button-selected1 button
			{ 
				left: 28px; top: -2px; margin: 0; border: none; width: 23px; height: 23px; box-shadow: 0 0 4px rgba(0,0,0,0.1); 
			}
			.header-right-part
			{float:right; width:auto;height:46px;  background-color: #3093c7; background-image: -webkit-gradient(linear,  left top, left bottom, from(#3093c7), to(#1c5a85));
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
			.overlayModal
			{
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
		</style>
		<!--  Animation Overlay CSS Ends -->
		
		<script>
			$(document).ready(function()
			{
				sub_id='<?php echo $subject_id;?>';
				course_id='<?php echo $course_id;?>';
				
				batch_id='<?php echo $batch_id;?>';
				uid='<?php echo $s5;?>';
				var document_name='<?php echo $document_name;?>';
				var doc_start_time="",doc_end_time="";
				var page_source="view-material.php";
				var page_source_doc="virtual-class-n.php";
				var doc_type='mydoc';
				var currentdocid="";
				var  submenu_with_menu=0;
				//alert("l");
				filename = "query/get_material_info.php?document_name="+document_name;
				$.ajax(
				{
					url: filename,
					type: 'GET',
					dataType: 'html',

					success: function(data, textStatus, xhr) 
					{
						//alert(data);
				
						var mySplitResult = data.split("|");
						document_name=mySplitResult[2];
						path=mySplitResult[0];
						sb=mySplitResult[3];
						document_no=mySplitResult[1];
						if(doc_type == "eduserver")
						{
							if(sb==0 || sb=="0")
							{
							dnd=document_name;
									input = path;
									output = input.substr(0, input.lastIndexOf('.')) || input;
									value = output.replace(/\\/g, "\\\\");
							}
							else
							{
								value="GES_"+document_no;
								dnd=document_no;
							}
						}
						else
						{
							dnd=document_name;
							input = path;
							output = input.substr(0, input.lastIndexOf('.')) || input;
							value = output.replace(/\\/g, "\\\\");
						}

						filename1 = "query/get_material_name.php?srno="+document_no;
						//alert(filename);
						$.ajax(
						{
							url: filename1,
							type: 'GET',
							dataType: 'html',

							success: function(data1, textStatus, xhr)
							{
								//alert(document_no);

								mat_id=data1;
								 var doc_type1="Subjective";
								filename2 = "query/copy_location_query_4.php?output="+value+"&mn="+dnd+"&doctype1="+doc_type1+"&sb1="+sb+"&doc_type="+doc_type;
								//alert(filename);
								$.ajax(
								{
									url: filename2,
									type: 'GET',
									dataType: 'html',

									success: function(data2, textStatus, xhr) 
									{
										//alert(data);
										docid=data2;
										callFlexPaperDocViewer1(docid);
										//for log detail
										currentdocid=docid;
										currentdate = new Date();
										currentdate = moment(currentdate).format("YYYY-MM-DD HH:mm:ss");
										doc_start_time=	currentdate;
										filename1 = "query/insert_document_log.php?uid="+uid+"&docid="+currentdocid+"&start_time="+doc_start_time+"&page_source="+page_source;
										//alert(filename);
										$.ajax({
											url: filename1,
											type: 'GET',
											dataType: 'html',
											success: function(data, textStatus, xhr) {
													//alert(data);
												},
											});
												
										filename1 = "query/insert_menu_log_document.php?uid="+uid+"&docid="+currentdocid+"&start_time="+doc_start_time+"&page_source="+page_source_doc+"&submenu_with_menu="+submenu_with_menu;
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
									},
								});
							},
						});
					},
				});
				$('#submit_sol').click(function()
				{
					//callFlexPaperDocViewer1('');
					
					document_name_temp = document_name.slice(0, -4);
					//alert(document_name_temp);
					filename = "query/get_material_info.php?document_name="+document_name_temp;
					//alert(filename);
					$.ajax(
						{
						url: filename,
						type: 'GET',
						dataType: 'html',

						success: function(data, textStatus, xhr) 
						{
							//alert(data);
							var mySplitResults = data.split("|");
							document_name_s = mySplitResults[2];
							path_s = mySplitResults[0];
							sb_s = mySplitResults[3];
							document_no_s = mySplitResults[1];
							if(doc_type == "eduserver")
							{
								if(sb==0 || sb=="0")
								{
									dnd_s=document_name_s;
									input_s = path_s;
									output_s = input_s.substr(0, input_s.lastIndexOf('.')) || input_s;
									value_s = output_s.replace(/\\/g, "\\\\");
								}
								else
								{
									value_s="GES_"+document_no_s;
									dnd_s=document_no_s;
								}
							}
							else
							{
								dnd_s=document_name_s;
								input_s = path_s;
								output_s = input_s.substr(0, input_s.lastIndexOf('.')) || input_s;
								value_s = output_s.replace(/\\/g, "\\\\");
							}
							//alert(document_no);

							mat_id=document_name_s;


							 var doc_type1="Subjective";
							filename = "query/copy_location_query_4.php?output="+value_s+"&mn="+dnd_s+"&doctype1="+doc_type1+"&sb1="+sb+"&doc_type="+doc_type;
							//alert(filename);
								$.ajax({
								url: filename,
								type: 'GET',
								dataType: 'html',

								success: function(data, textStatus, xhr) {

										//alert(data);
										docid=data;
										callFlexPaperDocViewer1(docid);
										
								},
							});
						},
					});						
				});
				$("#cancel_hide_allot").click(function()
				{
					currentdate = new Date();
					currentdate = moment(currentdate).format("YYYY-MM-DD HH:mm:ss");
					doc_end_time=	currentdate;
										
					filename = "query/update_menu_log_document.php?uid="+uid+"&docid="+currentdocid+"&start_time="+doc_start_time+"&end_time="+doc_end_time+"&page_source="+page_source_doc+"&submenu_with_menu="+submenu_with_menu;
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						success: function(data, textStatus, xhr) 
						{
							//alert(data);
							window.close();
						},
					});
					//window.close();
					//for log detail
					/*currentdate = new Date();
					currentdate = moment(currentdate).format("YYYY-MM-DD HH:mm:ss");
					doc_end_time=	currentdate;
					alert(currentdocid);
					filename = "query/update_document_log.php?uid="+uid+"&docid="+currentdocid+"&start_time="+doc_start_time+"&end_time="+doc_end_time+"&page_source="+page_source;
					//alert(filename);burrot
					
					$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							success: function(data, textStatus, xhr) {
								//alert(data);
								window.close();
								},
						});*/
									
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
    </head>
    <body>
	<br/>
		<!-- Animation Content Div -->	
		<center>
		<div id="login_form_material">
			<div class="err" id="add_err"></div>
			<form action="" style="width:99%;">
				<table style="border:px solid;width:100%;height:30px;">
					<tr>
						<td style='width:98%;background-color:#0f2541;'>
							<center><strong><label style="color:white">View Material </label></strong></center>
						</td>
						<td style='width:2%;'>
							<center><img src="images/close_image.png" id='cancel_hide_allot' height="25px" width="25"></center>
						</td>
					</tr>
				</table>
				<br />
				
				<table style="border:0px solid;width:100%;padding-left:10px;">
					<div id="documentViewer" class="flexpaper_viewer" style="border:solid 1px;width:100%;height:500px;overflow: hidden;"></div><br/>

						<script type="text/javascript">
							function getDocumentUrl(document){
								return "FlaxPaper/services/view.php?doc={doc}&format={format}&page={page}".replace("{doc}",document)
							}

							function getDocQueryServiceUrl(document){
								return "FlaxPaper/services/swfsize.php?doc={doc}&page={page}".replace("{doc}",document);
							}

							var startDocument = "<?php if(isset($_GET["doc"])){echo $_GET["doc"];}else{?>paper_gen.pdf<?php } ?>";
							
							$('#documentViewer').FlexPaperViewer(
							{ 
								config : {
									
									 DOC : escape(getDocumentUrl(startDocument)),
									 Scale : 0.6,
									 ZoomTransition : 'easeOut',
									 ZoomTime : 0.5,
									 ZoomInterval : 0.1,
									 FitPageOnLoad : false,
									 FitWidthOnLoad : true,
									 FullScreenAsMaxWindow : false,
									 ProgressiveLoading : false,
									 MinZoomSize : 0.2,
									 MaxZoomSize : 5,
									 SearchMatchAll : false,
									 InitViewMode : 'Portrait',
									 MixedMode : true,
									 EnableWebGL : true,
									 RenderingOrder : '<?php echo ($configManager->getConfig('renderingorder.primary') . ',' . $configManager->getConfig('renderingorder.secondary')) ?>',

									 ViewModeToolsVisible : true,
									 ZoomToolsVisible : true,
									 NavToolsVisible : true,
									 CursorToolsVisible : true,
									 SearchToolsVisible : true,

									 DocSizeQueryService : 'FlaxPaper/services/swfsize.php?doc=' + startDocument,									
									 jsDirectory : 'FlaxPaper/js/',
									 localeDirectory : 'FlaxPaper/locale/',
									 
									 JSONDataType : 'jsonp',
									 key : '<?php echo $configManager->getConfig('licensekey') ?>',

									 WMode : 'transparent',
									 localeChain: 'en_US'
									}
							});
							
							function callFlexPaperDocViewer1(startDocument1)
							{
								//alert(startDocument1);

								$('#documentViewer').FlexPaperViewer(
								 { config : {

										 DOC : escape(getDocumentUrl(startDocument1)),
										 Scale : 0.6,
										 ZoomTransition : 'easeOut',
										 ZoomTime : 0.5,
										 ZoomInterval : 0.1,
										 FitPageOnLoad : false,
										 FitWidthOnLoad : true,
										 FullScreenAsMaxWindow : false,
										 ProgressiveLoading : false,
										 MinZoomSize : 0.2,
										 MaxZoomSize : 5,
										 SearchMatchAll : false,
										 InitViewMode : 'Portrait',
										 MixedMode : true,
										 EnableWebGL : true,
										 RenderingOrder : '<?php echo ($configManager->getConfig('renderingorder.primary') . ',' . $configManager->getConfig('renderingorder.secondary')) ?>',

										 ViewModeToolsVisible : true,
										 ZoomToolsVisible : true,
										 NavToolsVisible : true,
										 CursorToolsVisible : true,
										 SearchToolsVisible : true,

										 DocSizeQueryService : 'FlaxPaper/services/swfsize.php?doc=' + startDocument,
										jsDirectory : 'FlaxPaper/js/',
										localeDirectory : 'FlaxPaper/locale/',			
										 JSONDataType : 'jsonp',
										 key : '<?php echo $configManager->getConfig('licensekey') ?>',

										 WMode : 'transparent',
										 localeChain: 'en_US'
										 }}
								);
							}
					</script>
				</table>
				<br/>
				<input type="BUTTON" id="submit_sol" name="submit_sol" value="View Solution" class="defaultbuttonton"></input>					
			</form>
		</div>
		</center><br /><br />
   </body>
</html>