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
			
			var datepickerVal = "";
					
			var chap_id = "";
			var top_id = "",paper_tp_rw=1;
			var course_sel="";
			$(document).ready(function(){
			weekly_planning=0;
				var filename = "";
				datepickerVal = $("#datepicker").val();
				filename ="query/branch_display_with_date.php?dt7="+datepickerVal
						+"&batch_id="+batch_id;
						
						getContent(filename,"cb1");
						$("#view_course_progress_dt").click(function(){
					$("#shadow").fadeIn("normal");
					 $("#login_form_1").fadeIn("normal");
					 $("#user_name").focus();
					 filename ="query/pending_course_progress.php?userid="+uid+"&batch_id="+batch_id;
					// alert(filename);
					 getContent(filename,"cpt_det");
				});
				$("#cancel_hide").click(function(){
					$("#login_form_1").fadeOut("normal");
					$("#shadow").fadeOut();
			   });
			   $("#tdy_wise_time_table").show();
				$("#ss1").show();
				filename ="query/today_time_table.php?dt=<?php echo $today; ?>&batch_id=<?php echo $batch_id; ?>";
			//alert(filename);
				getContent(filename,"tdy_wise_time_table");
				$("#chart_hide_show").hide();
				$("#type_lectuer").hide();
				$("#additional_topic_cover").hide();
				$("#attendce11").hide();
				$("#hajari").hide();
				$("#update").hide();
				$("#tke_atte").hide();
				GQgrid();
				$("#list").jqGrid('navGrid','#pager',{edit:false,add:false,del:false});
				$("#cb1").click(function(){
				//var valu1=$("#cb1").value;
					// var value = $(this).attr('value');
					//lert(valu1);
					
					$("#chap1, #chap2, #top1, #top2, #top3").empty();
					nm = $(this).val();
					course_sel=nm;
					//alert(roll_id);
					//roll_id=1;
					$("#today_plan_div").hide();
					$("#chart_hide_show").hide();
					$("#name_batch").hide();
					$("#type_lectuer").hide();
					$("#additional_topic_cover").hide();
					$("#hajari").hide();
					$("#update").hide();
					$("#attendce11").hide();
					$("#tke_atte").hide();
					
					datepickerVal = $("#datepicker").val();
					//alert("Selected Date : "+datepickerVal);
					//alert("query/query2.php?dt7="+datepickerVal+"&dt1="+<?php echo $login_session_id; ?>+"&dt="+nm);
					//$("#list").GridUnload(); 
					$('#list').setGridParam({url:"query/query_dayschedule.php?dt7="+datepickerVal+"&dt1="+<?php echo $s5; ?>+"&dt="+nm+"&batch_id="+batch_id}); 
					$('#list').trigger("reloadGrid");  
				});
				$("#cb2").click(function(){
				
					$("#tp").show();
					selected = $("input[type='radio'][name='planning']:checked");
					
						weekly_planning=0;
					
					$("#chart_hide_show").show();
					$("#chap1, #chap2, #top1, #top2, #top3").empty();
					tl = $(this).val();
					//alert(tl);					
					filename = "query/query_schedule.php?dt3="+sub+"&uid="+<?php echo $s5; ?>+"&bt_id="+bta+"&type_lect="+tl+"&week_plan="+weekly_planning+"&datepickerVal="+datepickerVal+"&course_sel="+course_sel;
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
					filename = "query/query_schedule1.php?dt3="+sub+"&uid="+<?php echo $s5; ?>+"&bt_id="+bta+"&type_lect="+tl+"&week_plan="+weekly_planning+"&course_sel="+course_sel;
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
					/*filename="query/today_plan.php?wb="+wb;
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						success: function(data, textStatus, xhr) {
							var strtemp = $('#today_plan_div').html(data);
							eval(strtemp);
						}
					});	
					$("#today_plan_div").show();*/
				});
				$("#add_topic").click(function(){
				//	alert("hello");
					add_name = $("#atcvr").val();
					filename = "query/insert_add_topic.php?name="+add_name+"&uid="+
					<?php echo $s5; ?>
					+"&bta="+bta+"&chap_id="+chap_id+"&type_lect="+tl+"&wb_id="+wb;
					alert(filename);
					getInsert(filename);
					
					$("#atcvr").val('');

					url = "query/query3_3_4.php?chp_id="+chap_id+"&uid="+<?php echo $s5; ?>+"&bt_id="+bta+"&type_lect="+tl+"&wb_id="+wb;
					//alert("Data inserted");
					getContent(url,"top3");				
				});
				$( "#chap1, #chap2" ).selectable({
					selected: function(event, ui) {
						chap_id = ( $(ui.selected).attr('id') );
					
				//alert("selected chapter : "+chap_id);
						var url = "";
						url = "query/query3_schedule.php?chp_id="+chap_id+"&uid="+<?php echo $s5; ?>+"&bt_id="+bta+"&type_lect="+tl+"&week_plan="+weekly_planning+"&course_sel="+course_sel;
						//alert(url);
						getContent(url,"top1");
						url = "query/query3_3.php?chp_id="+chap_id+"&uid="+<?php echo $s5; ?>+"&bt_id="+bta+"&type_lect="+tl+"&week_plan="+weekly_planning+"&course_sel="+course_sel;
						//alert(url);
						getContent(url,"top2");
						
						url = "query/query3_3_4_schedule.php?chp_id="+chap_id+"&uid="+<?php echo $s5; ?>+"&bt_id="+bta+"&type_lect="+tl+"&wb_id="+wb+"&week_plan="+weekly_planning+"&course_sel="+course_sel;
						//alert(url);
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
						filename = "query/insert.php?dt1="+<?php echo $s5; ?>+"&dt2="+sub+"&dt3="+nm+"&dt4="+bta+"&dt5="+chap_id+"&dt6="+top_id+"&type_lect="+tl+"&week_plan="+weekly_planning+"&wb_id="+wb+"&course_sel="+course_sel;
						//alert(filename);
						getInsert(filename);
					},
					remove: function(evenet, ui ) {
						top_id  = ($(ui.item).attr("id"));
						filename = "query/delete.php?dt1="+<?php echo $s5; ?>+"&dt2="+sub+"&dt3="+nm+"&dt4="+bta+"&dt5="+chap_id+"&dt6="+top_id+"&type_lect="+tl+"&week_plan="+weekly_planning+"&wb_id="+wb+"&course_sel="+course_sel;
						//alert(filename);
						getDelete(filename);
						
					},
					update: function(evenet, ui ) {
						reloadChapterLists();
					}
				});
				$("#tp1").hide();
				$("#tp1").click(function()
				{
					$("#tp1").hide();
					$("#tp").show();						
					$("#cb1").show();
						
				});
				$("#check").hide();
				$( "#top1, #top2" ).disableSelection();
				$( "#datepicker" ).datepicker({
					dateFormat: "yy-mm-dd",
					altField: "#alternate",
					altFormat: "DD, d MM, yy",
					onSelect: function() { 
						$("#chap1, #chap2, #top1, #top2").empty();
					//****************************************
						datepickerVal = $("#datepicker").val();
						//alert(datepickerVal);
						$('#list').trigger("reloadGrid");
						$("#hajari").hide();
						$("#update").hide();
						$("#attendce11").hide();
						$("#tke_atte").hide();
						filename ="query/today_time_table.php?dt=<?php echo $today; ?>&batch_id=<?php echo $batch_id; ?>";
						//filename ="query/today_time_table.php?dt="+datepickerVal+"&userid=<?php echo $s5?>";
						//alert(filename);
						getContent(filename,"tdy_wise_time_table");
						//filename ="query/branch_display_with_date.php?dt7="+datepickerVal
							
							filename ="query/branch_display_with_date.php?dt7="+datepickerVal
						+"&batch_id="+batch_id;
						//alert(filename);
						//alert(filename);
						getContent(filename,"cb1");
					}
				});
				function GQgrid(){
				$("#list").jqGrid({
				
				url:"query/query_dayschedule.php?dt7="+'<?php echo $today; ?>'+"&dt1="+<?php echo $s5; ?>+"&dt="+nm+"&batch_id="+batch_id,
				datatype: 'json',
				mtype: 'GET',
				colNames:['ID', 'Batch','Subject','Time','Room','subid','btid'],
				colModel :[ 
				  {name:'id', index:'id', width:30},
				  {name:'new_bt', index:'new_bt', width:80,}, 
				  {name:'sub_name', index:'sub_name', width:75},
				  {name:'time', index:'time', width:100},
				  {name:'room', index:'room', width:50},
				  {name:'subjid', index:'subjid', hidden:true},
				  {name:'btid', index:'btid', hidden:true}
				],
				pager: '#pager',
				rowNum:10,
				rowList:[10,20,30],
				sortname: 'bt_name',
				sortorder: 'asc',
				viewrecords: true,
				gridview: true,
				height: 106,
				caption: 'Class Schedule',
				onSelectRow: 
					function(id){ 
						$("#chap1, #chap2, #top1, #top2").empty();
						$("#type_lectuer").show();
						
						var id = jQuery("#list").jqGrid('getGridParam','selrow'); 
						
						if (id) 
						{
							var ret = jQuery("#list").jqGrid('getRowData',id); 
							wb=ret.id;
							bta=ret.btid;
							sub=ret.subjid;
							$("#type_lectuer").show();
							
							filename = "query/view_lect_type.php";
							$.ajax({
								url: filename,
								type: 'GET',
								dataType: 'html',
								success: function(data, textStatus, xhr) {
									var strtemp = $('#cb2').html(data);
									eval(strtemp);
								}
							});
							
							/*$("#attendce11").show();
							filename = "query/check1.php?wb="+wb;
								//alert(filename);
							$.ajax({
								url: filename,
								type: 'GET',
								dataType: 'html',
								success: function(data, textStatus, xhr) {
									var strtemp = $('#attendance').html(data);
									eval(strtemp);
						
								}
							});
							$("#hajari").show();
							$("#tke_atte").show();
							$("#update").hide();
							$("#allot_to_batch").show();*/
						} 
						else { 
							alert("Please select row");
						}
					}
			  });
			
			}
			function getUpdate(filename)
			{
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					
					success: function(data, textStatus, xhr) {
							update_data = data;
							alert(update_data);
						},
				});
				$("#hajari").hide();
				$("#update").hide();
			}
			
			
			function reloadChapterLists() {
				filename = "query/query_schedule.php?dt3="+sub+"&uid="+<?php echo $s5; ?>+"&bt_id="+bta+"&type_lect="+tl+"&week_plan="+weekly_planning+"&datepickerVal="+datepickerVal+"&course_sel="+course_sel;
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
					filename = "query/query_schedule1.php?dt3="+sub+"&uid="+<?php echo $s5; ?>+"&bt_id="+bta+"&type_lect="+tl+"&week_plan="+weekly_planning+"&course_sel="+course_sel;
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
					<?php
												$result_c=mysql_query("SELECT name FROM course WHERE id='$course_id'");
												$row_c=mysql_fetch_array($result_c);
												$crname=$row_c[0]; 
												$result_c1=mysql_query("SELECT name FROM subject WHERE id='$subject_id'");
												$row_c1=mysql_fetch_array($result_c1);
												$subname=$row_c1[0];
												echo "<label style='float:left;color:#ffffff;'><font face='verdana' size='2' color='white' ><b>".$crname.">".$subname.">"."Course Progress </b></font></label>";
												//<label style="float:left;color:white"><b>Web Resources</b></label>
						?>
						
					</td>
				</tr>
			</table>
			<br/>
			<div class="contents2">
					<table>
						<tr>
							<td style='float:left;'>
							
								<div id="wl" style="width:1000px;">
									<div style="padding-left:5px;padding-top:5px;font-size:12px;color:black;text-transform: capitalize;">
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
									<?php require 'wel2.php'; ?>
								</div>
							</td>
						</tr>
					</table>
				</div>
		</div>
		<br/>
        
	</div>
	<div>
			<?php require 'copy_right_file.php'; ?>
		</div>
</body>
</html>