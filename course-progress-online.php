<?php
	include 'config.php';
	session_start();
	$today = date("Y-m-d", strtotime('today'));
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
		<script type="text/javascript" src="js/flexpaper.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers_debug.js"> </script>
		<script type="text/javascript" src="js/flowplayer-3.2.12.min.js"></script>
		<link href="menu/menu.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" media="screen" href="css/style_1.css" />
		<script src="js/moment.js" type="text/javascript"></script>
			<link rel="stylesheet" type="text/css" media="screen" href="css/jquery-ui-1.8.2.custom.css" />
			<link rel="stylesheet" type="text/css" media="screen" href="css/ui.jqgrid.css" />
			<script src="js/grid.locale-en.js" type="text/javascript"></script>
			<script src="js/jquery.jqGrid.min.js" type="text/javascript"></script>
			<script language="javascript" type="text/javascript" src="js/jquery.flot.js"></script>
			<script language="javascript" type="text/javascript" src="js/jquery.flot.threshold.js"></script>
		
			<link rel="stylesheet" href="css/jquery-ui.css" />
			<script src="js/jquery-ui.js"></script>
		
			<link type="text/css" rel="stylesheet" href="css/multipleselectbox.css" />
			<script type="text/javascript" src="js/jquery.multipleselectbox-src.js"></script>
		
			<script src="js/jquery.watermarkinput.js" type="text/javascript"></script>
		<style type="text/css">
		
			
			#cb2 { background: none; width: 350px;}
			
			.ui-jqgrid .ui-state-highlight { background: #F39814; color:white; }
			
			#sortable1, #sortable2 { list-style-type: none; margin: 0; padding: 0 0 2.5em; float: left; margin-right: 15px; }
			#sortable1 li, #sortable2 li { margin: 0 5px 5px 5px; padding: 5px; font-size: 1.2em; width: 90px; }
			
			#chap1 .ui-selecting { background: #FECA40; }
			#chap1 .ui-selected { background: #F39814; color: white; }
			
			#feedback { font-size: 1.4em; }
			#chap1, #chap2 { list-style-type: none; margin: 0; padding: 0; float: left; margin-right: 10px; background: white; padding: 5px; width: 230px;}
			#chap1 li, #chap2 li { margin: 2px; padding: 3px; font-size: 1.2em; width: 180px; }
			
			#top1, #top2 { list-style-type: none; margin: 0; padding: 0; float: left; margin-right: 10px; background: white; padding: 5px; width: 210px;}
			#top1 li, #top2 li { margin: 2px; padding: 3px; font-size: 1.2em; width: 180px; }
			
			#top1 li, #top2 li { background:#ddd; cursor:pointer; text-decoration:underline; text-align:center; }
			
			#top3 { list-style-type: none; margin: 0; padding: 0; float: left; margin-right: 10px; background: white; padding: 5px; width: 200px;}
			#top3 li { margin: 2px; padding: 3px; font-size: 1.2em; width: 200px; }
			
			#top3 li { background:#ddd; cursor:pointer; text-decoration:underline; text-align:center; }
			
			td, th
			{
			border:0px solid #dddddd;
			}
			th
			{
			background-color:#dddddd;
			color:black;
			}
			
			#placeholder2 div.xAxis div.tickLabel 
			{    
				transform: rotate(-90deg);
				-ms-transform:rotate(-90deg); /* IE 9 */
				-moz-transform:rotate(-70deg); /* Firefox */
				padding-top:2px;
				-webkit-transform:rotate(-90deg); /* Safari and Chrome */
				-o-transform:rotate(-90deg); /* Opera */
				/*rotation-point:50% 50%;*/ /* CSS3 */
				/*rotation:270deg;*/ /* CSS3 */
			}
			option {color:#000000;font-weight:bold; padding:5px}
			option:hover {color:red;background: lightgrey;}
			option {border:0.5px solid green}
		</style>
		
		<style type="text/css">
		.classname {
			-moz-box-shadow:inset 0px 0px 0px 0px #ffffff;
			-webkit-box-shadow:inset 0px 0px 0px 0px #ffffff;
			box-shadow:inset 0px 0px 0px 0px #ffffff;
			background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #ededed), color-stop(1, #dfdfdf) );
			background:-moz-linear-gradient( center top, #ededed 5%, #dfdfdf 100% );
			filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ededed', endColorstr='#dfdfdf');
			background-color:#ededed;
			-moz-border-radius:24px;
			-webkit-border-radius:24px;
			border-radius:24px;
			border:3px solid #dcdcdc;
			display:inline-block;
			color:#777777;
			font-family:arial;
			font-size:13px;
			font-weight:bold;
			padding:3px 10px;
			text-decoration:none;
			text-shadow:1px 1px 0px #ffffff;
		}.classname:hover {
			background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #dfdfdf), color-stop(1, #ededed) );
			background:-moz-linear-gradient( center top, #dfdfdf 5%, #ededed 100% );
			filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#dfdfdf', endColorstr='#ededed');
			background-color:#dfdfdf;
		}.classname:active {
			position:relative;
			top:1px;
		}
		/* This imageless css button was generated by CSSButtonGenerator.com */
		</style>
		
		<style type="text/css">
			.multiselect {
				width:20em;
				height:15em;
				border:solid 1px #c0c0c0;
				overflow:auto;
			}
			 
			.multiselect label {
				display:block;
			}
			 
			.multiselect-on {
				color:#ffffff;
				background-color:#000099;
			}
		</style>
		
		<script type="text/javascript">
		//var roll_id='<?php echo $get_roll_id; ?>';
			var nm="";
			var filename = "";
			var val1= "";
			var bta = "";
			var sub = "";
			var tl = "";
			var wb = "";
			var selected = "";
			var uid = <?php echo $s5; ?>;
			var batch_id = <?php echo $batch_id; ?>;
			var datepickerVal='<?php echo $today ?>';
			var weekly_planning="";
			var course_id = <?php echo $course_id; ?>;
			var datepickerVal = "";
			var subject_id=	<?php echo $subject_id; ?>;
			var chap_id = "";
			var top_id = "",paper_tp_rw=1;
			var course_sel="";
			$(document).ready(function(){
			weekly_planning=0;
				var filename = "";
				datepickerVal = $("#datepicker").val();
				//alert(datepickerVal);
				//check graphic display
				$(".overlayModal").hide();
				 var content_name="animation";
				filename ="query/check_user_gif_display1.php?user_id="+uid+"&content_name="+content_name;
					//alert(filename);
						$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						success: function(data, textStatus, xhr) {
						//alert(data);
						if(data=="0")
						{
						
							$(".overlayModal").show();
						
						}
						else
						{
						
							$(".overlayModal").hide();
							
						
						}
						},
						});
				//end check graphic display
				var doc_start_time="",doc_end_time="";
		var page_source="course-progress-online.php";
		currentdate = new Date();
		currentdocid="";
		//alert("l");
		var  submenu_with_menu=0;
								currentdate = moment(currentdate).format("YYYY-MM-DD HH:mm:ss");
								doc_start_time=	currentdate;
								//alert(doc_start_time);
filename1 = "query/insert_menu_log.php?uid="+uid+"&docid="+currentdocid+"&start_time="+doc_start_time+"&page_source="+page_source+"&submenu_with_menu="+submenu_with_menu;
										//alert(filename1);
										$.ajax({
										url: filename1,
										type: 'GET',
										dataType: 'html',
										success: function(data, textStatus, xhr) {
												//alert(data);
											},
										});
										
										
										
										
						$("#close_window").click(function(){
currentdate = new Date();
								currentdate = moment(currentdate).format("YYYY-MM-DD HH:mm:ss");
								doc_end_time=	currentdate;
								
filename = "query/update_menu_log.php?uid="+uid+"&docid="+currentdocid+"&start_time="+doc_start_time+"&end_time="+doc_end_time+"&page_source="+page_source+"&submenu_with_menu="+submenu_with_menu;
										
										$.ajax({
										url: filename,
										type: 'GET',
										dataType: 'html',
										success: function(data, textStatus, xhr) {
											//alert(data);
											url = "virtual-class.php";
                              
                                   location.href = url;
											},
										});
});
			  filename ="query/get_topic_covered_datewise.php?dt7="+datepickerVal
						+"&batch_id="+batch_id+"&uid="+uid+"&subject_id="+subject_id;
						//ert(filename);
						
						getContent(filename,"dtwise_topic_cover");
				
				//GQgrid();
				$("#list").jqGrid('navGrid','#pager',{edit:false,add:false,del:false});
					$("#chap1, #chap2, #top1, #top2, #top3").empty();
				filename = "query/view_chapter_grid.php?dt3="+subject_id+"&uid="+uid+"&bt_id="+batch_id+"&datepickerVal="+datepickerVal+"&course_sel="+course_id;
			//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						success: function(data, textStatus, xhr) {
							var strtemp = $('#chap1').html(data);
							eval(strtemp);
						}
					});	
					filename = "query/view_chapter_grid_cover.php?dt3="+subject_id+"&uid="+uid+"&bt_id="+batch_id+"&datepickerVal="+datepickerVal+"&course_sel="+course_id;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						success: function(data, textStatus, xhr) {
							var strtemp = $('#chap2').html(data);
							eval(strtemp);
						}
					});	
				$("#add_topic").click(function(){
				datepickerVal = $("#datepicker").val();
				//	alert("hello");
					add_name = $("#atcvr").val();
					if(add_name=="")
					{
					alert("Please enter topic");
					}
					else if(chap_id=="")
					{
					alert("Please select chapter");
					}
					else
					{
					filename = "query/insert_add_topic1.php?name="+add_name+"&uid="+
					uid+"&bta="+batch_id+"&chap_id="+chap_id+"&dt="+datepickerVal+"&course_id="+course_id+"&subject_id="+subject_id;
					//alert(filename);
					getInsert(filename);
					
					$("#atcvr").val('');

					url = "query/view_additional_topic.php?chp_id="+chap_id+"&uid="+uid+"&bt_id="+batch_id;
					
					getContent(url,"top3");	
					}					
				});
				$( "#chap1, #chap2" ).selectable({
					selected: function(event, ui) {
						chap_id = ( $(ui.selected).attr('id') );
						//alert(chap_id);
				$("#top1, #top2, #top3").empty();
						var url = "";
						url = "query/view_chap_topic_uncover.php?chp_id="+chap_id+"&uid="+uid+"&bt_id="+batch_id+"&course_sel="+course_id;
						//alert(url);
						getContent(url,"top1");
						url = "query/view_chap_topic_cover.php?chp_id="+chap_id+"&uid="+uid+"&bt_id="+batch_id+"&course_sel="+course_id;
						
						getContent(url,"top2");
						
							url = "query/view_additional_topic.php?chp_id="+chap_id+"&uid="+uid+"&bt_id="+batch_id;
					
						getContent(url,"top3");
						
						$("#additional_topic_cover").show();
						
					}
				});
				 $( "#top1" ).sortable({
					connectWith: "ul",
					
					update: function(evenet, ui ) {
						reloadChapterLists();
					//	chap_chart();
					//	sub_chart();
					}
				});
				$( "#top2" ).sortable({
					connectWith: "ul",
					receive: function( event, ui ) {
						top_id  = ($(ui.item).attr("id"));
						datepickerVal = $("#datepicker").val();
						filename = "query/insert_topic_cover.php?dt1="+uid+"&dt2="+subject_id+"&dt4="+batch_id+"&dt5="+chap_id+"&dt6="+top_id+"&datepickerVal="+datepickerVal+"&course_sel="+course_id;
						getInsert(filename);
					},
					remove: function(evenet, ui ) {
						top_id  = ($(ui.item).attr("id"));
							filename = "query/delete_topic_cover.php?dt1="+uid+"&dt2="+subject_id+"&dt4="+batch_id+"&dt5="+chap_id+"&dt6="+top_id+"&datepickerVal="+datepickerVal+"&course_sel="+course_id;
						
						//alert(filename);
						getDelete(filename);
						
					},
					update: function(evenet, ui ) {
						reloadChapterLists();
					}
				});
				
				
				$( "#top1, #top2" ).disableSelection();
				$( "#datepicker" ).datepicker({
					dateFormat: "yy-mm-dd",
					altField: "#alternate",
					altFormat: "DD, d MM, yy",
					onSelect: function() { 
					
						datepickerVal = $("#datepicker").val();
						$('#dtwise_topic_cover').html("");
							filename ="query/get_topic_covered_datewise.php?dt7="+datepickerVal
						+"&batch_id="+batch_id+"&uid="+uid+"&subject_id="+subject_id;
						
						getContent(filename,"dtwise_topic_cover");
					}
				});
				
			
			
			
			function reloadChapterLists() {
				filename = "query/view_chapter_grid.php?dt3="+subject_id+"&uid="+uid+"&bt_id="+batch_id+"&datepickerVal="+datepickerVal+"&course_sel="+course_id;
			
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						success: function(data, textStatus, xhr) {
							var strtemp = $('#chap1').html(data);
							eval(strtemp);
						}
					});	
					filename = "query/view_chapter_grid_cover.php?dt3="+subject_id+"&uid="+uid+"&bt_id="+batch_id+"&datepickerVal="+datepickerVal+"&course_sel="+course_id;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						success: function(data, textStatus, xhr) {
							var strtemp = $('#chap2').html(data);
							eval(strtemp);
						}
					});	
			}
			function getContent(url, selectboxid)
			{
				$.ajax({
					url: url,
					type: 'GET',
					dataType: 'html',
					
					success: function(data, textStatus, xhr) {
						var strtemp = "$('#" + selectboxid + "').html(data)";
						eval(strtemp);
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
			
			function getDelete(filename)
			{
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					
					success: function(data, textStatus, xhr) {
			//			alert(data);
					},
				});									
			}
			$(".multiselect").multiselect();
			jQuery.fn.multiselect = function() {
				$(this).each(function() {
					var checkboxes = $(this).find("input:checkbox");
					checkboxes.each(function() {
						var checkbox = $(this);
						// Highlight pre-selected checkboxes
						if (checkbox.attr("checked"))
							checkbox.parent().addClass("multiselect-on");
			 
						// Highlight checkboxes that the user selects
						checkbox.click(function() {
							if (checkbox.attr("checked"))
								checkbox.parent().addClass("multiselect-on");
							else
								checkbox.parent().removeClass("multiselect-on");
						});
					});
				});
			};
			
			});
			</script>
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
		</style><style>
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

</head>
<body>
<!-- Animation Content Div -->
	<!--<div class="overlayModal">
		<?php
		$result=mysql_query("SELECT id,path,`upload_file_name_new` FROM `general_document_manager` WHERE file_type='gif' ORDER BY RAND()");
		while($row=mysql_fetch_array($result))
				{
					$full_path="GeneralDocument/".$row[2];
					echo "<img src='$full_path'  style='width:6em;height:6em;padding-right:7px;'>";
					goto exitrec;
				}
	exitrec:
		?>
	</div>-->

	<div style='background-color:#fff;width:100%;'>
			<div class='trable_bg' style='position: fixed;z-index: 2;padding-left:0px;color:yellow;border:solid 0px;width:100%;'>
		
			<table style='width:100%' cellspacing="0">
				<tr>
					<td style='width:100%;'>
						<center><?php require 'adlp.php'; ?></center>
						<br/>
					</td>
				</tr>
			
			</table>
		</div>
		<div style='background-color:#fff;width:100%;height:auto;'>
		<table style="padding-top:103px;border:solid 0px;width:100%;height:25px;">
		
<!--<tr>
		<td><b>Welcome <?php echo "&nbsp;&nbsp;&nbsp;".$u5."&nbsp;&nbsp;!&nbsp;&nbsp;&nbsp;&nbsp;</b>";
		?>
		</td>
		</tr>-->

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
												
												echo "<label style='float:left;color:#ffffff;padding-left:5px;'><font face='verdana' size='2' color='white' ><b>Welcome &nbsp;&nbsp;&nbsp;".$u5."&nbsp;&nbsp;!&nbsp;&nbsp;&nbsp;&nbsp;".$tutorname.">".$crname.">".$subname.">"."Course Progress<b></font></label>";
												//<label style="float:left;color:white"><b>Web Resources</b></label>
						?>
						
					</td>
					<td style="width:2%" valign="right">
							<img src="images/close_image.png" id="close_window" height="25px" width="25" align="right">
							</td>
				</tr>
			</table>
			<br/>
			<div class="contents2">
					<table>
						<tr>
							<td style='float:left;'>
							
								<div id="wl" style="width:1000px;">
									<div style="padding-left:0px;padding-top:0px;font-size:12px;color:black;text-transform: capitalize;">
									<b>
								
									Select Date: <input type="text" id="datepicker" value="<?php echo $today ?>" />&nbsp;
										<input type="text" id="alternate" size="30" value="<?php echo $today2 ?>" /></b>
									</div>
									
								</div>
							</td>
						</tr>
						
					</table>
			</div>
					<div class="contents" style='border:solid 0px;"'>
					
					<table>
						<tr>
							<td style='float:left;'>
								<div style="border:solid 0px;height:2px;">
								</div>
							</td>
						</tr>
						<tr>
							<td style='float:left;'>
								<div style="background-color:#fff;border:solid 1px;">
								<table style="border:solid 0px;width:100%;">
								<tr>
			<td  style="border:solid 0px;width:100%;">
				<table style="border:solid 0px;width:1250px;">
					<tr>
						<td>
						</td>
						<td style="float:left;">
							<marquee direction="left"><b>Please Drag and drop topics from Uncovered to covered.</b></marquee>
						</td>
					</tr>
					<tr>
						<th style="border:solid 0px;padding-left:142px;padding-right:142px;padding-top:4px;
								padding-bottom:4px;">
							Chapters
						</th>
						
						<th style="padding-left:150px;padding-right:150px;padding-top:4px;
								padding-bottom:4px;">
							Topics
						</th>
						<td>&nbsp;</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					</tr>
					<tr>
						<td>
							<table>
								<tr>
									<th>
										Uncovered
									</th>
									<td>&nbsp;&nbsp;</td>
									<th>
										Covered
									</th>
								</tr>
								<tr>
									<td>
										<ul id="chap1" style="height: 202px; overflow: auto;"></ul>
									</td>
									<td>&nbsp;&nbsp;</td>
									<td>
										<ul id="chap2" style="height: 202px; overflow: auto;"></ul>
									</td>
								</tr>
							</table>
						</td>
						
						<td>
							<table>
								<tr>
									<th>
										Uncovered
									</th>
									<td>&nbsp;&nbsp;</td>
									<th>
										Covered
									</th>
									<td>&nbsp;&nbsp;</td>
									<th>
										Additonal Topics Covered
									</th>
								</tr>
								<tr>
									<td>
										<ul id="top1" class="droptrue" style="height: 202px; overflow: auto;">
										</ul>
									</td>
									<td>&nbsp;&nbsp;</td>
									<td>
										<ul id="top2" class="droptrue" style="height: 202px; overflow: auto;">
										</ul>
									</td>
									<td>&nbsp;&nbsp;</td>
									<td>
										<ul id="top3" class="" style="height: 202px; overflow: auto;">
										</ul>
									</td>
								</tr>
							</table>
						</td>
						<td></td>
						<td>
							
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td style="border:solid 0px;width:100%;">
				<table style="width:1300px;">
					<tr>
						<td>
						<!--	<div>
								<div id="today_plan_div" >
								</div>
							</div>-->
						</td>
						<td style="float:left;" >
							<div id="additional_topic_cover">
								<!--  border:1px solid blue; border:1px solid red;    -->
								<div id="main_1" style="padding-left:510px;font-size:14px;
									color:#787876;">
										<label><b>Additional Topics Covered: </b></label>
										<input type="text" id="atcvr" value="" style="width:250px;" />
										<input type="button"  id="add_topic" class="defaultbutton" value="Add" />
								</div>
							</div>
						</td>
					</tr>
				</table>
			</td>
		</tr>
								</table>
								</div>
							</td>
						</tr>
							<tr>
							<td style='float:left;width:100%;'><br/>
							<div id="dt_label" style="background-color:#fff;border:solid 0px;width:100%;height:auto;"> <center><b>Datewise Topic Covered</b></center></div>
							<div id="dtwise_topic_cover" style="background-color:#fff;border:solid 1px;width:100%;height:150px;overflow-y:scroll"></div>
							</td>
							</tr>
					</table>
				</div>
		</div>
		<br/>
        
	</div>
	 <div><?php require 'footer.php'; ?></div>
	<div>
			<?php require 'copy_right_file.php'; ?>
		</div>
</body>
</html>