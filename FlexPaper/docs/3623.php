<?php

/* This section can be removed if you would like to reuse the PHP example outside of this PHP sample application */
require_once("../lib/config.php");
require_once("../lib/common.php");

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
			<script type="text/javascript">
			$(function (){

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
						alert("Test does not exist");
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
							alert("You have already done this test.");
						
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
							if(data=="failed")
							{
							alert("Failed. Pls try after sometime");
							}
							else if(data=="exist")
							{
							alert("Record already exist");
							}
							else
							{
							
							var corrans=data;
							if(select_ans_wise==corrans)
							{
							
							
							alert("Congratulations!");
							doc_id=uniqid;
								//url="http://student.coreacademics.in/toaday-challenge-test.php?uid="+id+"&uniq_id="+uniq_id;
								url="http://www.studyvita.com/flexpaper_readonly/php/toaday-challenge-test-ans.php?subfolder=&doc="+doc_id+"&uid="+userid+"&ans=yes";
						// alert(url_reg);
						
						 document.location.href = url;
							
							}
							else
							{
							//$("#documentViewer1").show();
							alert("Sorry! better luck next time.");
							
							doc_id=uniqid;
								//url="http://student.coreacademics.in/toaday-challenge-test.php?uid="+id+"&uniq_id="+uniq_id;
								url="http://www.studyvita.com/flexpaper_readonly/php/toaday-challenge-test-ans.php?subfolder=&doc="+doc_id+"&uid="+userid+"&ans=no";
						// alert(url_reg);
						
						 document.location.href = url;
							
							}
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



	<br/>
					<table style="padding-top:5px;width:99.5%;padding-top:420px;">
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
										<b>D</b></label>&nbsp;&nbsp;&nbsp;<input type="BUTTON" class="btn style1" style="width:120px;" id="submit_bt" name="submit_bt" value="Submit"/></center>
										<label id="resultd"></label>
									</td>
								</tr>
							</table><br/>
							<br/>
						
	<!--<div id="documentViewer1" class="flexpaper_viewer" style="position:relative;width:100%;height:350px; overflow: hidden;" ></div>
		<br/>
		

	        <script type="text/javascript">
		        function getDocumentUrl(document){
					return "services/view.php?doc={doc}&format={format}&page={page}&subfolder=<?php echo $_GET["subfolder"] ?>".replace("{doc}",document);
		        }

		        function getDocQueryServiceUrl(document){
		        	return "services/swfsize.php?doc={doc}&page={page}".replace("{doc}",document);
		        }

		        var startDocument1 = "<?php if(isset($_GET["uniq_id"])){echo $_GET["uniq_id"];}else{?>Paper.pdf<?php } ?>";

	            $('#documentViewer1').FlexPaperViewer(
				 { config : {

						 DOC : escape(getDocumentUrl(startDocument1)),
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

  						 DocSizeQueryService : 'services/swfsize.php?doc=' + startDocument1,

						 JSONDataType : 'jsonp',
						 key : '<?php echo $configManager->getConfig('licensekey') ?>',

                         WMode : 'transparent',
  						 localeChain: 'en_US'
						 }}
			    );
	        </script>-->
			

   </body>
</html>