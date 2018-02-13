<center><div id="timer_hide1" style="border-radius: 5px;width:13%;height:20px;background: red;"> 
														 Time Left
													</div></center>
													<center>
													<table style="width:13%;">
													<tr>
													<td  valign="center" style="width:100%;">
													<div  id="timer_hide" class="timer-area" style="border-radius: 5px;width:100%;height:55px;background: green;">
														<ul id="countdown1" style="width:100%;padding-top:15px;" align="left">
															<li align="center">
																<span class="hours" style="color:white;font-size:1em;">00</span> 
																<p class="timeRefHours" style="color:white;font-size:1em;"> HH</p>
															</li>
															<li align="center">
																<span class="minutes" style="color:white;font-size:1em;">00</span>
																<p class="timeRefMinutes" style="color:white;font-size:1em;">   MM</p>
															</li>
															<li align="center">
																<span class="seconds" style="color:white;font-size:1em;">00</span>
																<p class="timeRefSeconds" style="color:white;font-size:1em;"> SS</p>
															</li>
														</ul>
													</div></center>
													</td>
													</tr>
													</table>
													<br/>
<div id="documentViewer" class="flexpaper_viewer" style="padding-top:1px;padding-left:2px;border-radius: 0px;width:99%;height:580px"></div>
<script type="text/javascript">
	function getDocumentUrl(document){
		//alert(document);
		//alert("services/view.php?doc={doc}&format={format}&page={page}");
		return "services/view.php?doc={doc}&format={format}&page={page}".replace("{doc}",document);
	}
	function getDocQueryServiceUrl(document){
		return "services/swfsize.php?doc={doc}&page={page}".replace("{doc}",document);
	}
	var startDocument = "<?php if(isset($_GET["doc"])){echo $_GET["doc"];}else{?>instruction34.pdf<?php } ?>";
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