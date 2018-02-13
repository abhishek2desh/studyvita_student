<?php
/* This section can be removed if you would like to reuse the PHP example outside of this PHP sample application */
require_once("lib/config.php");
require_once("lib/common.php");

$configManager = new Config();
if($configManager->getConfig('admin.password')==null){
	$url = 'setup.php';
	header("Location: $url");
	exit;
}
?>

<!doctype html>
    <head>
        <title>View Material</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width" />

        <style type="text/css" media="screen">
			html, body	{ height:100%; }
			body { margin:0; padding:0; overflow:auto; }
			#flashContent { display:none; }
        </style>

		<link rel="stylesheet" type="text/css" href="css/flexpaper.css" />
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.extensions.min.js"></script>
        <!--[if gte IE 10 | !IE ]><!-->
        <script type="text/javascript" src="js/three.min.js"></script>
        <!--<![endif]-->
		<script type="text/javascript" src="js/flexpaper.js"></script>
		<script type="text/javascript" src="js/flexpaper_handlers.js"></script>
    </head>
    <body>
	<br/>
		<div id="documentViewer" class="flexpaper_viewer" style="position:absolute;left:10px;top:30px;width:100%;height:100%; overflow: hidden;"></div><br/>

	        <script type="text/javascript">
		        function getDocumentUrl(document){
					return "services/view.php?doc={doc}&format={format}&page={page}&subfolder=<?php echo $_GET["subfolder"] ?>".replace("{doc}",document);
		        }

		        function getDocQueryServiceUrl(document){
		        	return "services/swfsize.php?doc={doc}&page={page}".replace("{doc}",document);
		        }

		        var startDocument = "<?php if(isset($_GET["doc"])){echo $_GET["doc"];}else{?>Paper.pdf<?php } ?>";

	            $('#documentViewer').FlexPaperViewer(
				 { config : {

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

  						 DocSizeQueryService : 'services/swfsize.php?doc=' + startDocument,

						 JSONDataType : 'jsonp',
						 key : '<?php echo $configManager->getConfig('licensekey') ?>',

                         WMode : 'transparent',
  						 localeChain: 'en_US'
						 }}
			    );
	        </script>
<div>
<table style="width:100%;">
<tr>
<td>
<div style="position:absolute;left:30px;top:10px;font-family:Arial;font-size:12px">
Loading please wait...
</div>
</td>
<td>
<div style="position:absolute;left:830px;top:10px;font-family:Arial;font-size:12px">
               
<label>You can close this window/tab after viewing the document.</label>
            </div>
</td>
</tr>
</table>


			 
</div>
   </body>
</html>