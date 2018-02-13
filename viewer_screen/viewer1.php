	<div id="doc34" style="position:absolute;left:290px;top:270px;">
				<div id="documentViewer" class="flexpaper_viewer" style="width:720px;height:550px"></div>
				<script type="text/javascript">
					function getDocumentUrl(document){
						//alert(document);
						//alert("services/view.php?doc={doc}&format={format}&page={page}");
						return "services/view.php?doc={doc}&format={format}&page={page}".replace("{doc}",document);
					}
					function getDocQueryServiceUrl(document){
						return "services/swfsize.php?doc={doc}&page={page}".replace("{doc}",document);
					}
					var startDocument = "<?php if(isset($_GET["doc"])){echo $_GET["doc"];}else{?>Paper2.pdf<?php } ?>";
					$('#documentViewer').FlexPaperViewer(
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
					
					function callFlexPaperDocViewer(startDocument1){
						//alert(startDocument1);
					
						$('#documentViewer').FlexPaperViewer({
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