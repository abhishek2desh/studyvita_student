<?php
	include 'config.php';
	session_start();
	$today = strtotime(date("Y-m-d H:i:s"));
	$docid = $_GET['id'];
	$qname= $_GET['qname'];
	$today=$today+(34210);
	$today = date("Y-m-d", $today);
	$today2 = date("l, d F, Y", strtotime('today'));
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
		<link rel="stylesheet" href="layout/css/styles2_new.css" />
		<script type="text/javascript" src="js/flexpaper.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers_debug.js"> </script>
		<link href="menu/menu.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="css/style_image_mat.css" />
		<script src="js/countdown.js"></script>
		<script src="js/moment.js"></script>
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
			}
			 #footer {
				position: fixed;
				bottom: 0;
				width: 100%;
			}
		</style>
		<script>
			$(document).ready(function(){
			
			var u_id='<?php echo $s5; ?>';
			var docid='<?php echo $docid;?>';
			var mat_id='<?php echo $qname;?>';
			var start_omr_id="";
			var result_alt=0;
			var doc_start_time="",doc_end_time="";
			var page_source="purchased-material-test.php";
				var datepickerVal34='<?php echo $today ?>';
				var doc_type='mydoc';
				filename = "query/get_material_info.php?document_name="+mat_id;
			$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',

						success: function(data, textStatus, xhr) {
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

//alert("doc"+document_no);

				

					filename1 = "query/get_material_name.php?srno="+document_no;
					//alert(filename);
					$.ajax({
						url: filename1,
						type: 'GET',
						dataType: 'html',

						success: function(data1, textStatus, xhr) {
						//alert(document_no);

						//mat_id=data1;


						 var doc_type1="Subjective";
						filename2 = "query/copy_location_query_4.php?output="+value+"&mn="+dnd+"&doctype1="+doc_type1+"&sb1="+sb+"&doc_type="+doc_type;
						//alert(filename);
							$.ajax({
							url: filename2,
							type: 'GET',
							dataType: 'html',

							success: function(data2, textStatus, xhr) {

									//alert(data);
									//docid=data2;
									callFlexPaperDocViewer1(docid);
									
							},
						});
						},
					});
					},
				});
					
											$("#close_window").click(function(){
//document.location.href="home.php";
window.close();
});
				$(".sel").hide();
				$("#timer_hide").hide();
					$("#OMR_View_Result").hide();
				$("#start").hide();
				//for log detail
					currentdate = new Date();
								currentdate = moment(currentdate).format("YYYY-MM-DD HH:mm:ss");
								doc_start_time=	currentdate;
								
filename1 = "query/insert_document_log.php?uid="+u_id+"&docid="+mat_id+"&start_time="+doc_start_time+"&page_source="+page_source;
										//alert(filename);
										$.ajax({
										url: filename1,
										type: 'GET',
										dataType: 'html',
										success: function(data, textStatus, xhr) {
												//alert(data);
											},
										});						
								//end log detail
				$('#View_Solution').click(function() {
					//alert(mat_id);
mat_id2=mat_id.slice(0,-4);
//mat_id2=docid.substring(0, 4);
//alert(mat_id2);
	filename = "query/get_material_info.php?document_name="+mat_id2;
	$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',

						success: function(data, textStatus, xhr) {
						
					
							var mySplitResult = data.split("|");
					document_name=mySplitResult[2];
					path=mySplitResult[0];
					sb=mySplitResult[3];
					document_no=mySplitResult[1];
					
						dnd=document_name;
						input = path;
						output = input.substr(0, input.lastIndexOf('.')) || input;
						value = output.replace(/\\/g, "\\\\");
					



				//alert("no"+dnd);

					filename1 = "query/get_material_name.php?srno="+document_no;
					
					$.ajax({
						url: filename1,
						type: 'GET',
						dataType: 'html',

						success: function(data1, textStatus, xhr) {
						


						 var doc_type1="Subjective";
						filename2 = "query/copy_location_query_4.php?output="+value+"&mn="+dnd+"&doctype1="+doc_type1+"&sb1="+sb+"&doc_type="+doc_type;
						
							$.ajax({
							url: filename2,
							type: 'GET',
							dataType: 'html',

							success: function(data2, textStatus, xhr) {

									//alert(docid);
									callFlexPaperDocViewer1(dnd);
									
							},
						});
						},
					});
					},
				});
//callFlexPaperDocViewer1(mat_id2+".pdf");
//for log detail
					currentdate = new Date();
								currentdate = moment(currentdate).format("YYYY-MM-DD HH:mm:ss");
								doc_start_time=	currentdate;	
filename1 = "query/insert_document_log.php?uid="+u_id+"&docid="+mat_id2+"&start_time="+doc_start_time+"&page_source="+page_source;
										//alert(filename);
										$.ajax({
										url: filename1,
										type: 'GET',
										dataType: 'html',
										success: function(data, textStatus, xhr) {
												//alert(data);
											},
										});						
								//end log detail
					/*input = path;
					output = input.substr(0, input.lastIndexOf('.')) || input;
					value = output.replace(/\\/g, "\\\\");
					if(ijk == 1)
					{
						mat_id2=mat_id.slice(0,-4);
						ijk=ijk+1;
						value2=value.slice(0,-4);
					}
					else
					{
						ijk=ijk+1;
					}
					//alert(value);
					filename1 = "query/check-download-permission_sol.php?mat_id="+mat_id2+"&batch_id="+batch_id;
					//alert(filename1);
						$.ajax({
							url: filename1,
							type: 'GET',
							dataType: 'html',
							
							success: function(data, textStatus, xhr) {
							//alert(data);
								var dper=data;
								if(dper == "1")
								{
								$("#downloadsol").show();
										
								}
								else
								{
									$("#downloadsol").hide();
								}
							},
						});
					filename = "query/copy_location_query.php?output="+value2+"&mn="+mat_id2;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							//alert("data : "+data);
							//$("#doc34").show();
							if(data == "")
							{
								$("#doc34").show();
								$("#homeimg_test").hide();
								$("#documentViewer_QT").hide();
								callFlexPaperDocViewer1(mat_id2);
							}
							else
							{
							$("#documentViewer_QT").hide();
								callFlexPaperDocViewer1('');
								alert(data);
							}
						},
					});*/
				});
				$('input[type="radio"][name="tester"]').click(function(){
					var tester = $("input[type='radio'][name='tester']:checked");
					if (tester.length > 0)
					tester_get = tester.val();
					//alert(tester_get);
					if(tester_get == "1")
					{
						$(".sel").show();
						$("#timer_hide").show();
						$("#start").show();
					}
					else if(tester_get == "0")
					{
						$(".sel").hide();
						$("#timer_hide").hide();
						$("#start").show();
					}
				});
				$("#start").click(function(){
				result_alt=0;
					sel_time1=$('#sel').val();
					sel_time1=Number(sel_time1);
					if(tester_get == 1)
					{
						if(sel_time1 == 0)
						{
							alert("Please Select Time OF Exam.");
						}
						else
						{
						
							view_start_test(sel_time1);
						}
					}
					else if(tester_get == 0)
					{
						sel_time1=0;
						view_start_test(sel_time1);
					}
				});
				$('#OMR_View_Result').click(function(){
				
					$("#view_result_omr").show();
					filename = "query/omr_result_check3.php?mat_id="+mat_id;
					//alert(filename);
					getContent_r(filename,"OMR_result_declare");
					
				});
				function getContent_r(filename, selectboxid)
				{
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							var strtemp = "$('#" + selectboxid + "').html(data)";
							eval(strtemp);
							window.scrollTo(0, document.body.scrollHeight);
						//alert(data);
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
						},
					});
				}
				
				$('#OMR_answer_submit').click(function(){
					var checkstr1 =  confirm('Are you sure? Want to do final submission...?');
					if(checkstr1 == true)
					{
					$("#dv *").attr("disabled", "disabled").off('click');
						$("#OMR_answer_submit").hide();
						var str="";
						$("#dv input:radio:checked").each(function() {
							idArray34=this.id;
							str=str+idArray34+",";
						});
						//alert(str);
						var mySplitResult = idArray34.split("-");
						val1=mySplitResult[0];
						val2=mySplitResult[1];
						//alert(val1+val2);
						var da2 = new Date();
						var today222 = moment(da2);
						var s2 = today222.format("YYYY-MM-DD  HH:mm:ss");
						//alert(start_omr_id);
						//alert(s2);
						filename = "query/insert_end_time.php?lt_id="+start_omr_id+"&end_time="+s2+"&str="+str+"&mat_id="+mat_id+"&stud_id="+u_id;
						//alert(filename);
						$.ajax({
							url: filename,
							type: 'GET',
							dataType: 'html',
							success: function(data, textStatus, xhr) {
								if(data =="")
								{
									var d10 = new Date (),
									d20 = new Date ( d10 );
									d20.setMinutes(d10.getMinutes() + 0);
									var today = moment(d20);
									var date_time = today.format("YYYY-MM-DD  HH:mm:ss");
									//alert(date_time);
									var setTime = date_time;
									$("#countdown1").countdown({
									date: setTime,
									format: "on"
									},
									function() {
									if(result_alt==0)
									{
									alert("View Your Result..");
									result_alt=1;
									}
										
										$("#OMR_answer_submit").hide();
										$("#OMR_View_Result").show();
										$("#timer_hide").hide();
										$(".sel").hide();
										$("#start").hide();
										$("#dv *").attr("disabled", "disabled").off('click');
									});									
								}
							}
						});
					}
					else
					{
						return false;
					}
				});
				function getContent_OMR(filename, selectboxid)
				{
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							var strtemp = "$('#" + selectboxid + "').html(data)";
							eval(strtemp);
							$("#OMR_answer_submit").show();
						},
					});
				}
				function view_start_test(end_time)
				{
					//alert("Sel time : "+sel_time1);
					filename = "query/view_material_Omr_Sheet.php?mat_id="+mat_id;
									//alert(filename);
									getContent_OMR(filename,"dv");
					$("#Show_OMR_Div").show();
					$("#selft_tester").hide();
					$('#sel').attr("disabled", true);
					$("#start").attr("disabled","disabled");
					var da1 = new Date();
					var today22 = moment(da1);
					var s = today22.format("YYYY-MM-DD  HH:mm:ss");
					var d1 = new Date (),
					d2 = new Date ( d1 );
					d2.setMinutes(d1.getMinutes() + sel_time1);
					var today = moment(d2);
					var date_time = today.format("YYYY-MM-DD  HH:mm:ss");
					//alert(date_time);
					var setTime = date_time;
					filename = "query/insert_start_time.php?mat_id="+mat_id+"&stud_id="+u_id+"&st_time="+s;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						success: function(data, textStatus, xhr) {
							$('#last_id_omr_starting_time').val(data);
							start_omr_id=data;
						}
					});
					$("#countdown1").countdown({
					date: setTime,
					format: "on"
					},
					function() {
						if(end_time == 0)
						{}
						else
						{
							var str="";
							$("#dv input:radio:checked").each(function() {
								idArray34=this.id;
								str=str+idArray34+",";
							});
							//alert(str);
							var mySplitResult = idArray34.split("-");
							val1=mySplitResult[0];
							val2=mySplitResult[1];
							//alert(val1+val2);
							alert("Your time is over!!!");
							var da2 = new Date();
							var today222 = moment(da2);
							var s2 = today222.format("YYYY-MM-DD  HH:mm:ss");
							filename = "query/insert_end_time.php?lt_id="+start_omr_id+"&end_time="+s2+"&str="+str+"&mat_id="+mat_id+"&stud_id="+u_id;
							//alert(filename);
							$.ajax({
								url: filename,
								type: 'GET',
								dataType: 'html',
								success: function(data, textStatus, xhr) {
									if(data =="")
									{
										var d10 = new Date (),
										d20 = new Date ( d10 );
										d20.setMinutes(d10.getMinutes() + 0);
										var today = moment(d20);
										var date_time = today.format("YYYY-MM-DD  HH:mm:ss");
										//alert(date_time);
										var setTime = date_time;
										$("#countdown1").countdown({
										date: setTime,
										format: "on"
										},
										function() {
											if(result_alt==0)
									{
									alert("View Your Result..");
									result_alt=1;
									}
											$("#OMR_answer_submit").hide();
											$("#OMR_View_Result").show();
											$("#timer_hide").hide();
											$(".sel").hide();
											$("#start").hide();
										});									
									}
								}
							});
						}
					});
				}
				
				$('#tke_reset').click(function() {
					filename = "query/re_test.php?stud_id="+u_id+"&mat_id="+mat_id;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						success: function(data, textStatus, xhr) {
							//alert(data);
							if(data == "reset")
							{
								var d10 = new Date (),
								d20 = new Date ( d10 );
								d20.setMinutes(d10.getMinutes() + 0);
								alert("Test successfully reset.");
								$("#Show_OMR_Div").hide();
								view_result_show_hide();
								$("#OMR_View_Result").hide();
								$('input[name=tester]').attr('checked', false);
								$("#selft_tester").show();
								$('#sel').attr("disabled", false);
								$("#start").attr('disabled' , false);
								$('body').scrollTop(0);
								//alert(mat_id);
								$("#documentViewer_QT").hide();
								callFlexPaperDocViewer1(mat_id);
							}
							else 
							{
								alert(data);
							}
						}
					});
					/*setTimeout(function(){
						location.reload();
					}, 1000);
					*/
				});
				$('#view_prvs_score').click(function() {
					var url = "view_OMR_test_history1.php?stud_id="+u_id+"&mat_id="+mat_id;
					//alert(url);
					window.open(url, 'View Previous Score', 'height=600,width=860,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=no,menubar=no,location=no,directories=no,status=no');
				});
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
				
			</table>
		</div>
		<div style='background-color:#fff;width:100%;height:500%;'>
			<table style="padding-top:0px;border:solid 0px;width:100%;height:25px;">
				<tr>
					<td style="background-color:#0f2541;border:solid 0px;width:98%;">
					<?php
											$result_c=mysql_query("SELECT c.name,u.name FROM course c,user u WHERE c.id='$course_id' and u.id=c.tutor_id");
												$row_c=mysql_fetch_array($result_c);
												$crname=$row_c[0]; 
												$tutorname=$row_c[1]; 
												
												$result_c1=mysql_query("SELECT name FROM subject WHERE id='$subject_id'");
												$row_c1=mysql_fetch_array($result_c1);
												$subname=$row_c1[0];
												echo "<label style='float:left;color:#ffffff;padding-left:5px;'><font face='verdana' size='2' color='white' ><b>".$tutorname.">".$crname.">".$subname.">Purchased Material Test</b></font></label>";
													
												//<label style="float:left;color:white"><b>View My Mistakes</b></label>
						?>
						
						
					</td>
					<td style="width:2%" valign="right">
							<img src="images/close_image.png" id="close_window" height="25px" width="25" align="right">
							</td>
				</tr>
			</table>
			
						
			</div>
		</div>
		<form method="post" enctype="multipart/form-data">
		<table style='width:100%;padding:20px;'>
		<tr>
							<td style='width:80%;' valign="top">
							<div id="documentViewer" class="flexpaper_viewer" style="width:100%;height:650px;border:solid 1px;"></div>
							<script type="text/javascript">
								function getDocumentUrl(document){
									//alert(document);
									//alert("services/view.php?doc={doc}&format={format}&page={page}");
									return "services/view.php?doc={doc}&format={format}&page={page}".replace("{doc}",document);
								}
								function getDocQueryServiceUrl(document){
									return "services/swfsize.php?doc={doc}&page={page}".replace("{doc}",document);
								}
								var startDocument = "<?php if(isset($_GET["doc"])){echo $_GET["doc"];}else{?>adaptive_test.pdf<?php } ?>";
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
								function callFlexPaperDocViewer1(startDocument1){
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
							<br/>
							</td>
							<td style='width:20%;' valign="top">
							<div id="selft_tester">
							<fieldset style="height:35px;width:100%;background-color:#FBCE81;">
							<legend style="font-size:14px;"><b>Self Tester</b></legend>
							<div id="select_timer">
								<input id="1" type="radio" class="class_radio_up" name="tester" value="1"><label for="1">With Timer</label>&nbsp;&nbsp;						
								<input id="2" type="radio" class="class_radio_up" name="tester" value="0"><label for="2">Without Timer</label>
							</div>
							</fieldset>
						</div><br/>
						<div id='set_timer'>
							<table>
								<tr>
									<td class="sel">Set Your Time :
										<select id='sel' name='sel'>
											<option value='0'>Select Time</option>
											<option value='1'>1 min</option>
											<option value='5'>5 min</option>
											<option value='10'>10 min</option>
											<option value='15'>15 min</option>
											<option value='20'>20 min</option>
											<option value='25'>25 min</option>
											<option value='30'>30 min</option>
											<option value='35'>35 min</option>
											<option value='40'>40 min</option>
											<option value='45'>45 min</option>
											<option value='50'>50 min</option>
											<option value='55'>55 min</option>
											<option value='60'>1 hr</option>
											<option value='75'>1 hr 15 min</option>
											<option value='90'>1 hr 30 min</option>
											<option value='105'>1 hr 45 min</option>
											<option value='120'>2 hr</option>
											<option value='135'>2 hr 15 min</option>
											<option value='150'>2 hr 30 min</option>
											<option value='165'>2 hr 45 min</option>
											<option value='180'>3 hr</option>
										</select>
									</td>
									<td>&nbsp;&nbsp;</td>
									<td>
										<input type="button" class="classname" id="start" value="Start" />
									</td>
								</tr>
							</table>
						</div><br/>
						<div id="timer_hide" class="timer-area" style="border-radius: 5px;width:100%;height:55px;background: green;"> 
							<ul id="countdown1" style="width:100%;padding-top:20px;" align="left">
								<li align="left">
																<span class="hours" style="color:white;font-size:1em;">00</span> 
																<p class="timeRefHours" style="color:black;font-size:1em;"> HH</p>
															</li>
															<li align="left">
																<span class="minutes" style="color:white;font-size:1em;">00</span>
																<p class="timeRefMinutes" style="color:black;font-size:1em;">   MM</p>
															</li>
															<li align="left">
																<span class="seconds" style="color:white;font-size:1em;">00</span>
																<p class="timeRefSeconds" style="color:black;font-size:1em;"> SS</p>
															</li>
							</ul>
						</div><br/>
						<div id="Show_OMR_Div" style='width:100%;'>
							<div style="width:100%;">
								<label id="OMR_label" style="font-size:14px;">Show OMR Sheet</label>
							</div><br/>
							<div id="sheet" style='width:100%;'>
								<table style="width: 100%;height: 110px; background-color:#FFFFFF;border:1px solid blue;">
									<tr style="height:100%;">
										<td style="height:100%;">
											<div id="dv" style="width:100%;border:solid 1px;height:370px;overflow:scroll;">
											</div><br/>
											<input type="button" id="OMR_answer_submit" name="OMR_answer_submit" value="Submit" class="defaultbutton" />
											<input type="button" id="OMR_View_Result" name="OMR_View_Result" value="View Result" class="defaultbutton" />
										</td>
									</tr>
								</table>
							</div>
						</div>
							</td>
							</tr>
		</table>
		<br/>
				<div style="border:solid 0px;width:50%;"> 
							<table valign='top' id='view_result_omr' style="background:#E0ECF8;width:100%;">
								<tr>
									<td style="width:100%;">
										<div id="OMR_result" style="width:100%;background:#E0ECF8;">
											<div id="OMR_result_declare" style="width:100%;">
											</div>
										</div>
									</td>
								</tr>
								<tr>
									<td valign='top' id="re_test_score" style="width:100%;">
										<input type="button" id="tke_reset" class="classname" style="color:blue;" value="Take Re-Test" />
										<input type="button" id="view_prvs_score" class="classname" style="color:blue;" value="View Previous Score" />
										<input type="button" id="View_Solution" name="OMR_View_Result" style="color:blue;" value="View Solution" />
									</td>
								</tr>
							</table>
				</div>
			</form>
			</body>
			</html>