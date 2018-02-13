<?php
	include 'config.php';
	session_start();
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
		<script type="text/javascript" src="js/flowplayer-3.2.12.min.js"></script>
		<link href="css/style_image_result.css" rel="stylesheet" type="text/css" />
		<link href="menu/menu.css" rel="stylesheet" type="text/css" />
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
			.hde {
			   position: absolute;  
			   left:0px; 
			   right:0px; 
			   width: 90%; 
			   
			}
		</style>
		<script type="text/javascript">
			$(document).ready(function(){
			
					var select_type_wise=1;
					var sb11='<?php echo $subject_id; ?>';
					var board_type=1,omr_start_time = "",sb1="",sbj1="";
					var uniq_id_get=0,marks_for_review="",marks_for_atm="",select_ans_wise="";
					var all_atm="",req_que="",que_sel="";
					var sel_que_list=0,val_start="",select_test_wise="test";
					var date_time2,date_time,datetime,t_t;
					var datepickerVal44='<?php echo $today ?>',datepickerVal45='<?php echo $today ?>';
					var uid='<?php echo $s5;?>';
					var board1='<?php echo $board1;?>';
					var new_test_id="",st_array="",j="",k="";
					var qno_id_count=0,uniq_id_get_qus="",cp_value12="";
					var sb12="";
					var sb=0,std=0,total_string_get_val="";
					var qno_id="";
					var sb_result="",cp_result="",std_result="";
					var valvd=1;
					$("#analysis_ch").click(function(){
					url="diagnostic_analysis_ch.php";
					document.location.href=url;
				});
				$("#analysis_unit").click(function(){
				url="diagnostic_analysis.php";
					document.location.href=url;
				});
					$("#view_result1").live('click',function(){
						if($(this).val()=="View Report")
						{
						
						$("#dig_rep_id_hide").show();
						$("#dig_rep_id").hide();
						var bal=($(this).closest('tr').attr('id'));
						//alert("sanjya : "+bal);
						var mySplitResult = bal.split(",");
							tt_id=mySplitResult[0];
							stid=mySplitResult[1];
							sname=mySplitResult[2];
							sub_ject=mySplitResult[3];
							//alert(tt_id+stid+sname+sub_ject);
							if(sub_ject=="Biology"){ sbjt12='14';}
							else if(sub_ject=="Maths"){ sbjt12='15';}
							else if(sub_ject=="Physics"){ sbjt12='16';}
							else if(sub_ject=="Chemistry"){ sbjt12='17';}
							else if(sub_ject=="Science"){ sbjt12='18';}
							else if(sub_ject=="English"){ sbjt12='19';}
							else if(sub_ject=="Mock"){ sbjt12='20';}
							else if(sub_ject=="SocialScience"){ sbjt12='22';}
							//alert(sbjt12);
							doc_id=stid+sname+tt_id;
							//alert(doc_id);
							filename = "test_paper_generator/view_concept_google.php?subject_id="+sbjt12+"&sid="+stid+"&test_id="+tt_id;
							//alert(filename);
							getContent(filename, "concept_id");
							filename = "ppt1.php?sid="+stid+"&test_id="+tt_id;
							//alert(filename);
							getContent_dig(filename, "dig_rep_id1");
							display_viewer(doc_id);
							}
						else
						{
						location.reload();
						}
					});
					$("#dig_rep_id_hide").hide();
					//$("#dig_rep_id").hide();
					function display_viewer(mat_name)
					{
						filename = "test_paper_generator/get_material_path2.php?mn="+mat_name;
						//alert(filename);
						$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							success: function(data, textStatus, xhr) {
								//alert(data);
							},
						});
						filename = "test_paper_generator/copy_location2.php?mn="+mat_name;
						//alert(filename);
						$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							
							success: function(data, textStatus, xhr) {
								//alert(data);
							},
						});
						callFlexPaperDocViewer2(mat_name);
					}
					
					function getContent34(filename, selectboxid)
					{
						$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							
							success: function(data, textStatus, xhr) {
								var strtemp = "$('#" + selectboxid + "').html(data)";
								eval(strtemp);
								//alert(data);
								$("#view_que_sel_1 *").attr("disabled", "disabled").off('click');
							},
						});
					}
					function getContent_que34(filename, selectboxid)
					{
						$.ajax({
							type: "POST",
							url: filename,
							data: data34,
							success: function(data, textStatus, xhr) {
								var strtemp = "$('#" + selectboxid + "').html(data)";
								eval(strtemp);
								//alert(data);
								$("#start_test").show();
							},
						});
					}
					function getContent_que(filename, selectboxid)
					{
						$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							
							success: function(data, textStatus, xhr) {
								var strtemp = "$('#" + selectboxid + "').html(data)";
								eval(strtemp);
								alert(data);
								$("#start_test").show();
							},
						});
					}
					function getContent33(filename, selectboxid)
					{
						$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							
							success: function(data, textStatus, xhr) {
								var strtemp = "$('#" + selectboxid + "').html(data)";
								eval(strtemp);
								//$("#sel_type").show();
							},
						});
					}
					function getContent_dig(filename, selectboxid)
					{
						$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							
							success: function(data, textStatus, xhr) {
								var strtemp = "$('#" + selectboxid + "').html(data)";
								eval(strtemp);
								$("#dig_rep_id_hide").hide();
								$("#dig_rep_id").show();
							},
						});
					}
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
								//$("#sel_type").show();
							},
						});
					}
					function getContent_hide(filename, selectboxid)
					{
						$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							
							success: function(data, textStatus, xhr) {
								$("#hide_result").hide();
								$("#filter_hide_show").show();
								$("#view_result_of_adaptive_test_student").show();
								var strtemp = "$('#" + selectboxid + "').html(data)";
								eval(strtemp);
								//alert(data);
								//$("#sel_type").show();
							},
						});
					}
					function getContent2(filename, selectboxid)
					{
						$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							
							success: function(data, textStatus, xhr) {
								var strtemp = "$('#" + selectboxid + "').html(data)";
								eval(strtemp);
								//alert(data);
								old_name=check_name;
								$('#view_que_sel input[type="radio"]').eq(old_name).attr("checked",true);
								ok_button_click_view();
							},
						});
					}
					function getContent3(filename, selectboxid)
					{
						$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							
							success: function(data, textStatus, xhr) {
								var strtemp = "$('#" + selectboxid + "').html(data)";
								eval(strtemp);
								//alert(data);
								old_name=check_name;
								$('#view_que_sel input[type="radio"]').eq(old_name).attr("checked",true);
								ok_button_click_view();
							},
						});
					}
					function getInsert(filename)
					{
						$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							
							success: function(data, textStatus, xhr) {
								//alert(data);
							},
						});
					}
					//alert(sb11);
					$("#view_result_of_adaptive_test_student").hide();
					$("#hide_result").show();
					if(sb11==14){ sb12="Biology";}
					else if(sb11==15){ sb12="Maths";}
					else if(sb11==16){ sb12="Physics";}
					else if(sb11==17){ sb12="Chemistry";}
					else if(sb11==18){ sb12="Science";}
					else if(sb11==19){ sb12="English";}
					else if(sb11==20){ sb12="Mock";}
					else if(sb11==22){ sb12="SocialScience";}
					filename = "test_paper_generator/20_get_test_id2.php?sub_id="+sb11+"&uid="+uid;
					//alert(filename);
					getContent(filename, "test_id");
					filename = "30_view_student_test_result5.php?uid="+uid+"&sb_result="+sb11+"&cp_result="+cp_result+"&std_result="+std_result;
					//alert(filename);
					getContent_hide(filename, "view_result_of_adaptive_test_student");
					$('#concept_id').click(function(){
						$("#concept_id input:radio:checked").each(function() {
								idArray3=this.id;
						});
						 conc_id = idArray3;
						 filename = "test_paper_generator/video_play.php?conc_id="+conc_id;
						 //alert(filename);
						 getContent(filename, "videos");
						 //alert(conc_id);
					});
					$('#videos').change(function(){
						video=$("#videos").val();
						//alert(video);
						var path = 'http://www.globaleduserver.com/';
						var url = 'rtmp://64.187.229.174/securestreaming/C12_CBSE_CHE_Ch06_Haloalkanes_PreparationMethod_SURESH.mp4';
						alert(url);
						//var url = 'rtmp://64.187.229.174/securestreaming/'+video;
						var baseserverurl = 'rtmp://64.187.229.174:1935/securestreaming/';
						var str = url.split('/');
						var baseurl = 'rtmpe://';
						
						for (var i = 0; i < str.length - 3; i++) {
							baseurl = baseurl + str[i + 2] + '/';
						}
						//this will install flowplayer inside previous A- tag.
						flowplayer("wowza", "http://releases.flowplayer.org/swf/flowplayer-3.2.18.swf", {
						clip: {
							// use RTMP streaming
							url: str[str.length - 1],
							provider: 'rtmp',
							
							// with a secured connection
							connectionProvider: 'secure'
						},
					 
						plugins: {
					 
							// set up the RTMP streaming plugin
							rtmp: {
								url: "http://releases.flowplayer.org/swf/flowplayer.rtmp-3.2.13.swf",
					 
								// The net connection URL with HDDN looks like this
								netConnectionUrl: baseserverurl
							},
					 
							// set up the secure streaming plugin
							secure: {
								url: "http://releases.flowplayer.org/swf/flowplayer.securestreaming-3.2.8.swf",
					 
								// the token value (shared secret).
								// needs to be escaped because our token has a percent sign in it
								token: escape('#ed%h0#w@123')
							}
						}
						});
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
							//$("#sel_type").show();
						},
					});
				}
			});
			</script>
		
</head>
<body>
	<div style='background-color:#fff;width:100%'>
		<div class='trable_bg' style='padding-left:5px;color:yellow;border:solid 0px;width:100%'>
			<table style='width:100%'>
				<tr>
					<td style='width:100%;'>
						<center><?php require 'adlp.php'; ?></center>
					</td>
				</tr>
				<tr>
					<td valign='top' style='width:100%;border:solid px;'>
						<center><?php require 'menu/testmenu.php'; ?></center>
					</td>
				</tr>
			</table>
		</div>
		<div style='background-color:#fff;width:100%;height:auto;'>
			<table style="padding-top:0px;border:solid 0px;width:100%;height:25px;">
				<tr>
					<td style="background-color:#3366FF;border:solid 0px;">
						<label style="float:left;color:white"><b>View Result</b></label>
					</td>
				</tr>
			</table>
			<table style="border:solid 0px;width:100%;height:25px;">
				<tr>
					<td style="border:solid 0px;width:100%;height:150px;">
						<div style="background-color:#3366FF;border:solid 0px;width:100%;height:25px;">
							<table style='width:100%'>
								<tr>
									<td style="width:100px;background-color:#3366FF;border:solid 1px;height:20px;"><center><label style="color:white"><b>Test-Date</b></label></center></td>
									<td style="width:100px;background-color:#3366FF;border:solid 1px;height:20px;"><center><label style="color:white"><b>Test-ID</b></label></center></td>
									<td style="width:100px;background-color:#3366FF;border:solid 1px;height:20px;"><center><label style="color:white"><b>Subject</b></label></center></td>
									<td style="width:100px;background-color:#3366FF;border:solid 1px;height:20px;"><center><label style="color:white"><b>Correct</b></label></center></td>
									<td style="width:100px;background-color:#3366FF;border:solid 1px;height:20px;"><center><label style="color:white"><b>Incorrect</b></label></center></td>
									<td style="width:100px;background-color:#3366FF;border:solid 1px;height:20px;"><center><label style="color:white"><b>Unattempt</b></label></center></td>
									<td style="width:100px;background-color:#3366FF;border:solid 1px;height:20px;"><center><label style="color:white"><b>Total</b></label></center></td>
									<td style="width:100px;background-color:#3366FF;border:solid 1px;height:20px;"><center><label style="color:white"><b>Time-Taken</b></label></center></td>
									<td style="width:100px;background-color:#3366FF;border:solid 1px;height:20px;"><center><label style="color:white"><b>Report</b></label></center></td>
								</tr>
							</table>
						</div>
						<div id='view_result_of_adaptive_test_student' style="border:solid 0px;width:100%;height:210px;overflow-y: scroll;">
						</div>
						<div id='hide_result' style="border:solid 0px;width:100%;height:210px;overflow-y: scroll;">
							<center><img src='loading/di_load.gif' width='35%;' height='200px;'></center>
						</div>
					</td>
				</tr>
			</table>
			<table style="border:solid 0px;width:100%;height:450px;">
				<tr>
					<td style="border:solid 1px;width:50%;overflow-y:scroll;height:438px;background-color:white;" id="dig_rep_id_hide" >
						<center><img src='loading/di_load.gif' width='60%;' height='200px;'></center>
					</td>
					<td style="border:solid 1px;width:50%;height:438px;background-color:white;" id="dig_rep_id" >
						<div class='tdbox' id="dig_rep_id1" name="dig_rep_id1" style="border:solid 0px;overflow-y: 	scroll;background-color:white;width:100%;height:438px;">
						</div>
							<div id="viewer_1" style="border:solid 	0px;overflow-y:scroll;background-color:white;width:675px;height:438px;">
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
							</script>
						
						</div>
					</td>
					<td valign='top' style="border:solid 1px;width:50%;">
						<div style="border:solid 0px;overflow-y:scroll;background-color:white;width:100%;height:138px;">
							<b>Dear <?php echo $u5; ?></b><br/>
							<div style='padding-left:20px;'>Your grey concepts for the selected test is listed below. You are advised to take help of your teacher to understand these concepts well. You can also take the help of video lectures and web resources to strengthen these concepts. After that you are advised to do the Personal Assignment based on this test ID. If you are not getting full score in Personal Assignment, you are advised to revise these topics again before attending the second personal assignment. Repeat this cycle until you get full score in Personal Assignment which indicate that your grey concepts are cleared.</div><br/>
							<b>Global Eduserver Team</b>
						</div>
						<div class='tdbox' id="concept_id" name="concept_id" style="border:solid 0px;overflow-y: 	scroll;background-color:white;width:100%;height:300px;">
						</div>
					</td>
				</tr>
			</table>
			<label style="float:left;color:black"><b>Concept Video List</b></label>
			<table style='width:100%;'>
				<tr>
					<td style='width:30%;'>
						<select class='tdbox' id='videos' size='20' style="height: 394px;border:solid 2px;background-color:white;width:100%;height:394px;"></select>
					</td>
					<td style='width:80%;'>
						<center>
						<div class='main_div2'><a href="" style="border:solid 3px;display: block; width: 619px; height: 394px;" id="wowza"></a></div>
							
						</center>
					</td>
				</tr>
			</table>
			<table>
			<tr>
			<td>
			<input type='button' class='defaultbutton' id='analysis_ch' value='Chapterwise Analysis' />
				<input type='button' class='defaultbutton' id='analysis_unit' value='Unitwise Analysis' />
			</td>
			</tr>
			</table>
		</div>
		<br/>
		<div id="footer" style="background-color:#0174DF;">
			<center><div style="padding-left:5px;padding-top:5px;font-size:12px;color:black;text-transform: capitalize;"><label style="border:solid 0px;color:white;">Copyright &copy Edutech Educational Services Pvt. Ltd. Ahmedabad, Gujarat, India</label>
			</div></center>
		</div>
	</div>
	
</body>
</html>