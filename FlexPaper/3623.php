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
        <title>Welcome</title>
		
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width" />

        <style type="text/css" media="screen">
			html, body	{ height:100%; }
			body { margin:0; padding:0; overflow:auto; }
			#flashContent { display:none; }
        </style>
<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="js/jquery-1.8.3.js" type="text/javascript"></script>
		<link rel="stylesheet" type="text/css" href="css/flexpaper.css" />
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.extensions.min.js"></script>
        <!--[if gte IE 10 | !IE ]><!-->
        <script type="text/javascript" src="js/three.min.js"></script>
        <!--<![endif]-->
		<script type="text/javascript" src="js/flexpaper.js"></script>
		<script type="text/javascript" src="js/flexpaper_handlers.js"></script>
		<style>
		.btn {
    border: none;
    color: #fff;
    cursor: pointer;
    padding: 0 10px;
    white-space: nowrap;
   
    font-weight: 700;
    background: #00BCA4;
    font-size:12px;
    height: 30px;
    line-height: 30px;
    -webkit-border-radius: 21px 21px 21px 21px;
    -moz-border-radius: 21px 21px 21px 21px;
    -ms-border-radius: 21px 21px 21px 21px;
    border-radius: 21px 21px 21px 21px;
    margin-right: 5px;
    -moz-transition: all 0.2s ease 0s;
    -o-transition: all 0.2s ease 0s;
    -webkit-transition: all 0.2s ease 0s;
    -ms-transition: all 0.2s ease 0s;
    transition: all 0.2s ease 0s;
    box-shadow: none;
    vertical-align: baseline
}
.btn i {
    margin-right: 5px
}
.btn:last-child {
    margin-right: 0
}
.btn:focus,
.btn:active:focus,
.btn.active:focus {
    outline: none
}
.btn.active {
    box-shadow: none
}

.btn.style1:hover,
.btn.style1:active,
.btn.style1:focus,
.btn.style1.active {
    background: #00BCA4;
    color: #fff
}
</style>
		
    </head>
    <body>
	<br/>
		<!--<div style="width:100%">
	<table style="width:100%">
	<tr>
	<td valign="top" style="width:100%;" class="dv1" align="center">
	<center><div id="documentViewer" class="flexpaper_viewer" style="position:absolute;left:10px;top:30px;width:90%;height:350px; border-right: solid 50px #000000;;border-bottom: solid 50px #000;"></div></center>-->
		<div id="documentViewer" class="flexpaper_viewer" style="position:absolute;left:10px;top:30px;width:100%;height:350px; overflow: hidden;"></div>
		<br/>

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
						 Scale :0.2,
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

						 ViewModeToolsVisible : false,
						 ZoomToolsVisible : true,
						 NavToolsVisible : true,
						 CursorToolsVisible : true,
						 SearchToolsVisible : false,

  						 DocSizeQueryService : 'services/swfsize.php?doc=' + startDocument,

						 JSONDataType : 'jsonp',
						 key : '<?php echo $configManager->getConfig('licensekey') ?>',

                         WMode : 'transparent',
  						 localeChain: 'en_US'
						 }}
			    );
	        </script>



	
			

   </body>
</html>