<?php
	include 'config.php';
	
	
	session_start();
	$u5 = $_SESSION['uname'];
	$s5=$_SESSION['sid'];
	$course_id=$_SESSION['course_id'];
		$batch_id=$_SESSION['batch_id'];
		$sub_id=$_SESSION['subject_id'];
	$qid = $_GET['qid'];
	$chapter_id = $_GET['chapter_id'];
	







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
		
		<style> 

.defaultbutton {
border-color: #00a792;
color: #fff;
    background: #00bca4;
    line-height: 32px;
    height: 34px;
    min-width: 34px;
    
    font-size: 14px;
    font-weight: normal;
    position: relative;
    display: inline-block;
    padding: 0 12px;
    cursor: pointer;
        border-radius: 3px;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    text-align: center;
    white-space: nowrap;
    border-width: 1px;
    border-style: solid;
  
   text-transform: none;
   font-family: inherit;
   margin: 0;
   box-sizing: border-box;
       
    text-shadow: none;
        letter-spacing: normal;
    word-spacing: normal;

}

</style>
		
		<script>
			$(document).ready(function(){
			
				sub_id='<?php echo $sub_id;?>';
				course_id='<?php echo $course_id;?>';
				
				batch_id='<?php echo $batch_id;?>';
				uid='<?php echo $s5;?>';
			var chapter_id='<?php echo $chapter_id;?>';
			var qid='<?php echo $qid;?>';
				 var material_type="desq";
						var examtype="";
						if(chapter_id==0)
						{
						filename = "query/get_descriptive_question1_all.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id+"&qid="+qid;
						}
						else
						{
						filename = "query/get_descriptive_question1.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id+"&qid="+qid;
						}
						//alert(filename);
						getContent2(filename, "descq_id2");
				var doc_start_time="",doc_end_time="",currentdocid="";
					var check_name,check_name_new,que_get,check_unique_name="",remarks_tick_name="";
				var doc_type='mydoc';
				$("#viewer_sub1").hide();
				$('#submit_qus').hide();
		$('#submit_p').click(function(){
		check_name_new=Number(check_name) - Number(1);
		check_name_new1=Number(check_name) - Number(2);
		
		if(check_name_new == 0)
		{
			alert("You are in first record");
		}
		else
		{
		$("#viewer_sub1").hide();
		$("#viewer_sub").show();
		$('#submit_qus').hide();
		$('#submit_ans').show();
		$('#descq_id2 input[type="radio"]').eq(check_name).attr("checked",false);
		$('#descq_id2 input[type="radio"]').eq(check_name_new1).attr("checked",true);
		$("#descq_id2 input:radio:checked").each(function() {
						idArray34=this.id;
						idArray35=this.value;
						idArray36=this.name
					});
					check_id=idArray34;
					//alert(check_id);
					check_name=idArray35;
							//alert(data);
							if(idArray36=="PHY")
							{
							idArray36="Physics";
							}
							else if(idArray36=="CHE")
							{
							idArray36="Chemistry";
							}
							else if(idArray36=="MAT")
							{
							idArray36="Maths";
							}
							else if(idArray36=="BIO")
							{
							idArray36="Biology";
							}
							else if(idArray36=="SCI")
							{
							idArray36="Science";
							}
							else if(idArray36=="MOC")
							{
							idArray36="Mock";
							}
							else if(idArray36=="ENG")
							{
							idArray36="English";
							}
							else
							{
							}
							path="R:\\QuestionData\\"+idArray36+"\\"+check_id+"_Qus";
							doc_n=check_id+"_Qus";
					filename = "test_paper_generator/copy_location_subjective.php?output="+path+"&mn="+doc_n;
				//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							callFlexPaperDocViewer_sub(check_id+"_Qus");
							callFlexPaperDocViewer_sub1('');
						},
					});
		}
	});
		$('#submit_n').click(function(){
		
		check_name_new=Number(check_name) + Number(1);

	
			if(check_unique_name == check_name)
			{
				alert("Last Record");
			}
			else
			{
			$("#viewer_sub1").hide();
		$("#viewer_sub").show();
		$('#submit_qus').hide();
		$('#submit_ans').show();
			//alert("hi");
				$('#descq_id2 input[type="radio"]').eq(check_name).attr("checked",false);
				$('#descq_id2 input[type="radio"]').eq(check_name).attr("checked",true);
				$("#descq_id2 input:radio:checked").each(function() {
						idArray34=this.id;
						idArray35=this.value;
						idArray36=this.name
					});
					check_id=idArray34;
					//alert(check_id);
					check_name=idArray35;
							//alert(data);
							if(idArray36=="PHY")
							{
							idArray36="Physics";
							}
							else if(idArray36=="CHE")
							{
							idArray36="Chemistry";
							}
							else if(idArray36=="MAT")
							{
							idArray36="Maths";
							}
							else if(idArray36=="BIO")
							{
							idArray36="Biology";
							}
							else if(idArray36=="SCI")
							{
							idArray36="Science";
							}
							else if(idArray36=="MOC")
							{
							idArray36="Mock";
							}
							else if(idArray36=="ENG")
							{
							idArray36="English";
							}
							else
							{
							}
							path="R:\\QuestionData\\"+idArray36+"\\"+check_id+"_Qus";
							doc_n=check_id+"_Qus";
					filename = "test_paper_generator/copy_location_subjective.php?output="+path+"&mn="+doc_n;
				//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							callFlexPaperDocViewer_sub(check_id+"_Qus");
							callFlexPaperDocViewer_sub1('');
						},
					});
			}
	});
	$("#cancel_hide_allot_q").click(function(){
					window.close();
					});
	
					$('#submit_qus').click(function(){
						
		check_name_new=Number(check_name) + Number(1);

	
			if(check_unique_name == check_name)
			{
				alert("Last Record");
			}
			else
			{
			$("#viewer_sub1").hide();
		$("#viewer_sub").show();
		$('#submit_qus').hide();
		$('#submit_ans').show();
			//alert("hi");
				$('#descq_id2 input[type="radio"]').eq(check_name).attr("checked",false);
				$('#descq_id2 input[type="radio"]').eq(check_name).attr("checked",true);
				$("#descq_id2 input:radio:checked").each(function() {
						idArray34=this.id;
						idArray35=this.value;
						idArray36=this.name
					});
					check_id=idArray34;
					//alert(check_id);
					check_name=idArray35;
							//alert(data);
							if(idArray36=="PHY")
							{
							idArray36="Physics";
							}
							else if(idArray36=="CHE")
							{
							idArray36="Chemistry";
							}
							else if(idArray36=="MAT")
							{
							idArray36="Maths";
							}
							else if(idArray36=="BIO")
							{
							idArray36="Biology";
							}
							else if(idArray36=="SCI")
							{
							idArray36="Science";
							}
							else if(idArray36=="MOC")
							{
							idArray36="Mock";
							}
							else if(idArray36=="ENG")
							{
							idArray36="English";
							}
							else
							{
							}
							path="R:\\QuestionData\\"+idArray36+"\\"+check_id+"_Qus";
							doc_n=check_id+"_Qus";
					filename = "test_paper_generator/copy_location_subjective.php?output="+path+"&mn="+doc_n;
				//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							callFlexPaperDocViewer_sub(check_id+"_Qus");
							callFlexPaperDocViewer_sub1('');
						},
					});
			}

					});
		
		$('#submit_ans').click(function(){
		$("#viewer_sub").hide();
				$("#viewer_sub1").show();

				callFlexPaperDocViewer_sub1('');
					$("#descq_id2 input:radio:checked").each(function() {
						idArray34=this.id;
						idArray35=this.value;
						idArray36=this.name
					});
					check_id=idArray34;
					//alert(check_id);
					check_name=idArray35;
							//alert(data);
							if(idArray36=="PHY")
							{
							idArray36="Physics";
							}
							else if(idArray36=="CHE")
							{
							idArray36="Chemistry";
							}
							else if(idArray36=="MAT")
							{
							idArray36="Maths";
							}
							else if(idArray36=="BIO")
							{
							idArray36="Biology";
							}
							else if(idArray36=="SCI")
							{
							idArray36="Science";
							}
							else if(idArray36=="MOC")
							{
							idArray36="Mock";
							}
							else if(idArray36=="ENG")
							{
							idArray36="English";
							}
							else
							{
							}
							path="R:\\QuestionData\\"+idArray36+"\\"+check_id;
							doc_n=check_id;
					filename = "test_paper_generator/copy_location_subjective.php?output="+path+"&mn="+doc_n;
				//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							callFlexPaperDocViewer_sub1(check_id);
							
						},
					});
					$('#submit_ans').hide();
					$('#submit_qus').show();
				});
		$('#descq_id2').click(function(){
		$("#viewer_sub1").hide();
		$("#viewer_sub").show();
		$('#submit_qus').hide();
		$('#submit_ans').show();
		$("#descq_id2 input:radio:checked").each(function() {
						idArray34=this.id;
						idArray35=this.value;
						idArray36=this.name
					});
					check_id=idArray34;
					//alert(check_id);
					check_name=idArray35;
							//alert(data);
							if(idArray36=="PHY")
							{
							idArray36="Physics";
							}
							else if(idArray36=="CHE")
							{
							idArray36="Chemistry";
							}
							else if(idArray36=="MAT")
							{
							idArray36="Maths";
							}
							else if(idArray36=="BIO")
							{
							idArray36="Biology";
							}
							else if(idArray36=="SCI")
							{
							idArray36="Science";
							}
							else if(idArray36=="MOC")
							{
							idArray36="Mock";
							}
							else if(idArray36=="ENG")
							{
							idArray36="English";
							}
							else
							{
							}
							path="R:\\QuestionData\\"+idArray36+"\\"+check_id+"_Qus";
							doc_n=check_id+"_Qus";
					filename = "test_paper_generator/copy_location_subjective.php?output="+path+"&mn="+doc_n;
				//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							callFlexPaperDocViewer_sub(check_id+"_Qus");
							callFlexPaperDocViewer_sub1('');
						},
					});
		});
		function getContent2(filename, selectboxid)
				{
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',

						success: function(data, textStatus, xhr) {
							var strtemp = "$('#" + selectboxid + "').html(data)";
							eval(strtemp);
							var totalcount= $("#mytable_sub tr").length-1;
							if(totalcount=="-1")
							{
							totalcount=0;
							}
							check_unique_name=totalcount;
							$("#descq_id2 input:radio:checked").each(function() {
						idArray34=this.id;
						idArray35=this.value;
						idArray36=this.name
					});
					check_id=idArray34;
					//alert(check_id);
					check_name=idArray35;
							//alert(data);
							if(idArray36=="PHY")
							{
							idArray36="Physics";
							}
							else if(idArray36=="CHE")
							{
							idArray36="Chemistry";
							}
							else if(idArray36=="MAT")
							{
							idArray36="Maths";
							}
							else if(idArray36=="BIO")
							{
							idArray36="Biology";
							}
							else if(idArray36=="SCI")
							{
							idArray36="Science";
							}
							else if(idArray36=="MOC")
							{
							idArray36="Mock";
							}
							else if(idArray36=="ENG")
							{
							idArray36="English";
							}
							else
							{
							}
							path="R:\\QuestionData\\"+idArray36+"\\"+check_id+"_Qus";
							doc_n=check_id+"_Qus";
					filename = "test_paper_generator/copy_location_subjective.php?output="+path+"&mn="+doc_n;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							callFlexPaperDocViewer_sub(check_id+"_Qus");
							

						},
					});
					material_type="desq";
						var examtype="";
						if(chapter_id==0)
						{
							filename = "query/get_subjective_mark_all.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id+"&qid="+qid;
						}
						else
						{
						filename = "query/get_subjective_mark.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id+"&qid="+qid;
						}
						//filename = "query/?qcat_id="+qcat_id;
					getContent(filename, "text_mark");
						},
					});
				}
					$("#text_mark").change(function(){
			text_mark=$("#text_mark").val();
				callFlexPaperDocViewer_sub('');
					callFlexPaperDocViewer_sub1('');
					$("#viewer_sub1").hide();
		$("#viewer_sub").show();
		$('#submit_qus').hide();
		$('#submit_ans').show();

			if(text_mark=="")
			{
			material_type="desq";
						var examtype="";
						qid=0;
						//filename = "query/get_descriptive_question1.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id+"&qid="+qid;
						if(chapter_id==0)
						{
						filename = "query/get_descriptive_question1_all.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id+"&qid="+qid;
						}
						else
						{
						filename = "query/get_descriptive_question1.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id+"&qid="+qid;
						}
						getContent(filename, "descq_id2");
			}
			else
			{
			material_type="desq";
						var examtype="";
						if(chapter_id==0)
						{
						filename = "query/get_descriptive_question_mark_all.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id+"&text_mark="+text_mark;
						}
						else
						{
						filename = "query/get_descriptive_question_mark.php?sub_id="+sub_id+"&course_id="+course_id+"&material_type="+material_type+"&uid="+uid+"&examtype="+examtype+"&batch_id="+batch_id+"&chapter_id="+chapter_id+"&text_mark="+text_mark;
						}
						getContent(filename, "descq_id2");
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

	
		
		
			
<br/>
		<div id="form_material_subjective">
			<div class="err" id="add_err"></div>
			<form action="" style="width:100%;">
			<table style="border:px solid;width:100%;height:30px;">
					<tr>
						<td style='width:98%;background-color:#0f2541;'>
							<center><strong><label style="color:white">View Descriptive Question </label></strong></center>
						</td>
						<td style='width:2%;'>
							<center><img src="images/close_image.png" id='cancel_hide_allot_q' height="25px" width="25"></center>
						</td>
					</tr>
				</table><br/>
				<table style="border:0px solid;width:100%;">
				<tr>
				<td style='width:30%;padding-left:10px;' valign="top">
				<label style="font-size:16px;">Select mark</label>
					<select class="inputs" id="text_mark" name="text_mark">
					</select><br/><br/>
					<div id="descq_id2" name="descq_id2" style="border:solid 1px;overflow-y: 	scroll;background-color:white;width:100%;height:520px;"></div>
				</td>
				<td style='width:70%;padding-left:10px;padding-top:37px;' valign="top">
				Content is constantly evolving. Bear with us for non availability of certain answers. Will be updated soon.<br/><br/>
				<input type="BUTTON" class="defaultbutton" id="submit_p" name="submit_p" value="Previous">&nbsp;&nbsp;&nbsp;
				<input type="BUTTON" class="defaultbutton" id="submit_n" name="submit_n" value="Next">
				&nbsp;&nbsp;&nbsp;
			
				<input type="BUTTON" class="defaultbutton"id="submit_qus" name="submit_qus" value="Close">
				&nbsp;&nbsp;&nbsp;
			
				<input type="BUTTON" class="defaultbutton" id="submit_ans" name="submit_ans" value="View Answer"><br/><br/>
						<div id="viewer_sub" class="flexpaper_viewer" style="border:solid 1px;width:95%;height:445px"></div>
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
							$('#viewer_sub').FlexPaperViewer(
							 {
								config : {
									 DOC : escape(getDocumentUrl(startDocument)),
									Scale : 1.3,
											 ZoomTransition : 'easeOut',
											 ZoomTime : 0.5,
											 ZoomInterval : 0.2,
											 FitPageOnLoad : false,
											 FitWidthOnLoad : false,
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

							function callFlexPaperDocViewer_sub(startDocument1){
								//alert(startDocument1);

								$('#viewer_sub').FlexPaperViewer({
									config : {

									 DOC : escape(getDocumentUrl(startDocument1)),
									Scale : 1.3,
											 ZoomTransition : 'easeOut',
											 ZoomTime : 0.5,
											 ZoomInterval : 0.2,
											 FitPageOnLoad : false,
											 FitWidthOnLoad : false,
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

							}
						</script>
						
						<br/>
						
				
			
				
				
			
				<div id="viewer_sub1" class="flexpaper_viewer" style="border:solid 1px;width:95%;height:425px"></div>
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
							$('#viewer_sub1').FlexPaperViewer(
							 {
								config : {
									 DOC : escape(getDocumentUrl(startDocument)),
									Scale : 1.3,
											 ZoomTransition : 'easeOut',
											 ZoomTime : 0.5,
											 ZoomInterval : 0.2,
											 FitPageOnLoad : false,
											 FitWidthOnLoad : false,
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

							function callFlexPaperDocViewer_sub1(startDocument1){
								//alert(startDocument1);

								$('#viewer_sub1').FlexPaperViewer({
									config : {

									 DOC : escape(getDocumentUrl(startDocument1)),
									Scale : 1.3,
											 ZoomTransition : 'easeOut',
											 ZoomTime : 0.5,
											 ZoomInterval : 0.2,
											 FitPageOnLoad : false,
											 FitWidthOnLoad : false,
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

							}
						</script>
						
						</td>
				</tr>
				</table>
			</form>
			</div>
		

</body>
</html>
