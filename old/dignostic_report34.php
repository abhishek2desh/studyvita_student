<?php

	include_once 'config.php';
	session_start();
	
	$today = date("Y-m-d", strtotime('today'));
	$today2 = date("l, d F, Y", strtotime('today'));
	$_SESSION['today_dt_session'] = $today;
	$user=$_SESSION['username'];
	$user5=$_SESSION['check_user'];
	$s1=$_SESSION['studid1'];
	$s2=$_SESSION['stnd1'];
	$s3=$_SESSION['grp1'];
	$s4=$_SESSION['btch1'];
	$s5=$_SESSION['sid'];
	$u5 = $_SESSION['uname'];
	$board1 = $_SESSION['board'];
	$branch = $_SESSION['branch'];
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8; NO-CACHE;" />
		<title>Welcome  <?php echo $u5; ?></title>
		<link rel="shortcut icon" href="images/Edutechheader.ico" />
		<script language="javascript" type="text/javascript" src="js/jquery.min.js">
		</script>
		<script type="text/javascript" language="javascript">
			$(function() {
		 
				$(this).bind("contextmenu", function(e) {
	 
					e.preventDefault();
	 
				});
		 
			});
		</script>
		<link rel="stylesheet" type="text/css" media="screen" href="css/jquery-ui-1.8.2.custom.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="css/ui.jqgrid.css" />
		<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
		<script src="js/grid.locale-en.js" type="text/javascript"></script>
		<script src="js/jquery.jqGrid.min.js" type="text/javascript"></script>
		
		<!--  Above Disabled to Right Click...  -->
			
		<link rel="stylesheet" href="css/bg.css" />  
		<link rel="stylesheet" href="css/jquery-ui.css" />
		<link rel="stylesheet" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="css/ui.jqgrid.css" />
		<link rel="stylesheet" type="text/css" href="css/flexpaper.css" />
		<script src="js/jquery-1.8.3.js"></script>
		<script src="js/jquery-ui.js"></script>
		<script type="text/javascript" src="js/flexpaper.js"> </script>
		<!--<script type="text/javascript" src="js/jquery.min.js"> </script>	-->
		<script type="text/javascript" src="js/flexpaper_handlers.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers_debug.js"> </script>
		
		<script language="javascript" type="text/javascript" src="js/jquery.flot.js"></script>
		<script language="javascript" type="text/javascript" src="js/jquery.flot.threshold.js"></script>
		<link href="menu.css" rel="stylesheet" type="text/css" />
		<!-- five star -->
		<script type="text/javascript" src="lib/jquery.raty.min.js"></script>
		
		<!--	Timer  -->
		<link rel="stylesheet" href="css/styles2.css" />
		<script src="js/countdown.js"></script>
		<script src="js/moment.js"></script>
		
		<!--	Timer Finish...  -->
		
		<!-- jqgrid-->
		<!-- JQ Grid JS and CSS  session  	
			<link rel="stylesheet" type="text/css" media="screen" href="jq_grid/jquery-ui-1.8.2.custom.css" /> -->
			<link rel="stylesheet" type="text/css" media="screen" href="jq_grid/ui.jqgrid.css" />
		
	<!--	<script src="js/jquery-1.7.2.min.js" type="jq_grid/javascript"></script>	-->
			<script src="js/grid.locale-en.js" type="jq_grid/javascript"></script>
			<script src="js/jquery.jqGrid.min.js" type="jq_grid/javascript"></script>
		
	<!-- Date and Time	-->
		<script type="text/javascript" src="js/date_time.js"></script>
			
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
		
		<style type="text/css">
		#flashContent { display:none; }
		
		.ui-jqgrid .ui-state-highlight { background: #F39814; color:white; }
		
		.button_css{
		border-color:#8E6AF5;border-width: 1px 1px 1px 15px;border-style: solid; -webkit-border-radius: 3px; -moz-border-radius: 3px;border-radius: 3px;font-size:12px;font-family:arial, helvetica, sans-serif; padding: 3px 3px 3px 3px; text-decoration:none; display:inline-block;text-shadow: -1px -1px 0 rgba(0,0,0,0.3);font-weight:bold; color: #FFFFFF;
		 background-color: #3093c7; background-image: -webkit-gradient(linear, left top, left bottom, from(#3093c7), to(#1c5a85));
		 background-image: -webkit-linear-gradient(top, #3093c7, #1c5a85);
		 background-image: -moz-linear-gradient(top, #3093c7, #1c5a85);
		 background-image: -ms-linear-gradient(top, #3093c7, #1c5a85);
		 background-image: -o-linear-gradient(top, #3093c7, #1c5a85);
		 background-image: linear-gradient(to bottom, #3093c7, #1c5a85);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#3093c7, endColorstr=#1c5a85);
		}

		.button_css:hover{
		 border-top-color: #8E6AF5;border-right-color: #8E6AF5;border-bottom-color: #8E6AF5;border-left-color: #8E6AF5;border-width: 1px 15px 1px 1px;border-style: solid;
		 background-color: #26759e; background-image: -webkit-gradient(linear, left top, left bottom, from(#26759e), to(#133d5b));
		 background-image: -webkit-linear-gradient(top, #26759e, #133d5b);
		 background-image: -moz-linear-gradient(top, #26759e, #133d5b);
		 background-image: -ms-linear-gradient(top, #26759e, #133d5b);
		 background-image: -o-linear-gradient(top, #26759e, #133d5b);
		 background-image: linear-gradient(to bottom, #26759e, #133d5b);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#26759e, endColorstr=#133d5b);
		}
		
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
		html, body	{ height:100%;width:100%; }
			body { margin:0; overflow:auto; }
		</style>
		<script type="text/javascript">
			
			$(function (){
				
				var user_id='<?php echo $s5; ?>';
				var datepickerVal34='<?php echo $today ?>',datepickerVal35='<?php echo $today ?>';
				var select_type_id='34',test_id_batch="";
				
				$( "#datepicker" ).datepicker({
					dateFormat: "yy-mm-dd",
					altField: "#alternate",
					altFormat: "DD, d MM, yy",
					onSelect: function() { 
						datepickerVal34 = $("#datepicker").val();
						filename="forth2/11_get_test_id_with_Date1.php?sb="+sbb1+"&user_id="+user_id+"&datepickerVal34="+datepickerVal34+"&datepickerVal35="+datepickerVal35;
						//alert(filename);
						getContent(filename,"test_id_with_date");
					}
				});
				$( "#datepicker1" ).datepicker({
					dateFormat: "yy-mm-dd",
					altField: "#alternate",
					altFormat: "DD, d MM, yy",
					onSelect: function() { 
					datepickerVal35 = $("#datepicker1").val();
					filename="forth2/11_get_test_id_with_Date1.php?sb="+sbb1+"&user_id="+user_id+"&datepickerVal34="+datepickerVal34+"&datepickerVal35="+datepickerVal35;
					//alert(filename);
					getContent(filename,"test_id_with_date");
					}
				});
				$('#sb').click(function(){
					$("#rp,#sn,#qp,#test_id_with_date").empty();
					sb=$("#sb").val();
					if(sb==14){ sb1="Biology"; sbb1="BIO";}
					else if(sb==15){ sb1="Maths"; sbb1="MAT";}
					else if(sb==16){ sb1="Physics"; sbb1="PHY";}
					else if(sb==17){ sb1="Chemistry"; sbb1="CHE";}
					else if(sb==18){ sb1="Science"; sbb1="SCI";}
					else if(sb==19){ sb1="English"; sbb1="ENG";}
					else if(sb==20){ sb1="Mock"; sbb1="MOC";}
					else if(sb==22){ sb1="SocialScience"; sbb1="S.S";}
					
					filename="forth2/11_get_test_id_with_Date.php?sb="+sbb1+"&user_id="+user_id;
					//alert(filename);
					getContent(filename,"test_id_with_date");
					
				});
				$('#test_id_with_date').click(function(){
					$("#dig_rep_id_hide").show();
					$("#dig_rep_id").hide();
					$("#rp,#sn,#qp").empty();
					test_id_with_date=$("#test_id_with_date").val();
					//alert(test_id_with_date);
					var mySplitResult = test_id_with_date.split("-");
					st_id=mySplitResult[0];
					name_id=mySplitResult[1];
					test_date_id=mySplitResult[2];
					bt_name=mySplitResult[3];
					bt_id=mySplitResult[4];
					dg_get=st_id+name_id+test_date_id;
					filename="forth2/10_get_que_paper.php?dg_get="+dg_get+"&user_id1="+user_id+"&test_date_id="+test_date_id;
					//alert(filename);
					getContent(filename,"qp");
					filename="forth2/10_get_sol_paper.php?dg_get="+dg_get+"&user_id1="+user_id+"&test_date_id="+test_date_id;
					//alert(filename);
					getContent(filename,"sn");
					filename="forth2/10_get_report_paper.php?dg_get="+dg_get+"&user_id1="+user_id+"&test_date_id="+test_date_id+"&st_id="+st_id+"&sb="+sbb1;
					//alert(filename);
					getContent(filename,"rp");
					filename = "test_paper_generator/view_concept_google.php?subject_id="+sb+"&sid="+st_id+"&test_id="+test_date_id;
					//alert(filename);
					getContent(filename, "concept_id");
					filename = "ppt1.php?sid="+st_id+"&test_id="+test_date_id;
					//alert(filename);
					getContent_dig(filename, "dig_rep_id1");
				});
				$("#dig_rep_id_hide").hide();
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
				$('#qp').click(function(){
					qp=$("#qp").val();
					filename = "forth2/copy_location.php?mn="+qp;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						success: function(data, textStatus, xhr) {
							if(data == "")
							{
								callFlexPaperDocViewer(qp);
							}
							else
							{
								callFlexPaperDocViewer('');
								alert(data);
							}
						},
					});
					//callFlexPaperDocViewer(qp);
				});
				$('#sn').click(function(){
					sn=$("#sn").val();
					filename = "forth2/copy_location.php?mn="+sn;
//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						success: function(data, textStatus, xhr) {
							if(data == "")
							{
								callFlexPaperDocViewer(sn);
							}
							else
							{
								callFlexPaperDocViewer('');
								alert(data);
							}
						},
					});
					//callFlexPaperDocViewer(sn);
				});
				$('#rp').click(function(){
					rp=$("#rp").val();
					filename = "forth2/copy_location.php?mn="+rp;
					//alert(filename);
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						success: function(data, textStatus, xhr) {
							//alert(data);
							if(data == "")
							{
								callFlexPaperDocViewer(rp);
							}
							else
							{
								callFlexPaperDocViewer('');
								alert(data);
							}
						},
					});
					
				});
				$('input[type="radio"][name="v_a_r"]').click(function(){
					
					var type_id = $("input[type='radio'][name='v_a_r']:checked");
					if (type_id.length > 0)
					select_type_id = type_id.val();
					//alert(select_type_id);
					if(select_type_id == '34')
					{
						/*filename = "view_analysis_report/4_get_student_list.php?batch_id="+batch_id+"&sub="+sub+"&test_date="+test_date+"&type="+select_type_id;
						getContent(filename, "test_id");*/
					}
					else if(select_type_id == '35')
					{
						/*filename = "view_analysis_report/4_get_student_list.php?batch_id="+batch_id+"&sub="+sub+"&test_date="+test_date+"&type="+select_type_id;
						getContent(filename, "test_id");*/
						
					}
				});
				function getInsert(filename)
				{
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							alert(data);
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
			
			});
		</script>
	</head>
	<body bgcolor="#E0ECF8">
		<?php require 'header4.php'; ?>
		<br/>
		<table style="padding-top:0px;border:solid 0px;width:100%;height:25px;">
			<tr>
				<td style="background-color:#3366FF;border:solid 0px;">
					<label style="float:left;color:white"><b>Offline result and report</b></label>
				</td>
			</tr>
		</table>
		<table width="600px" style="border: 0px solid black;">
			<tr>
				<td>
					<label style='color:black'><b>From Date : </b></label>
				</td>
				<td>
					<input type="text" id="datepicker" class="dt" value="<?php echo $today ?>" />
				</td>
				<td>
					<label style='color:black'><b>To Date : <b/></label>
				</td>
				<td>
					<input type="text"  id="datepicker1" class="dt" value="<?php echo $today ?>" />
				</td>
			</tr>
		</table>
		<div class="lg-container"  style="border: 0px solid black;width: 100%;height:600px;">
			<table style="border: 0px solid black;width: 100%;height:600px;">
				<tr>
					<td valign='top' style="border: 0px solid black;width: 60%;height:600px;">
						<table valign='top' width="100%" style="float:left;border: 1px solid black;">
							<tr style='background-color:#3366FF;'>
								<td style='color:white;'><center><b>Subject</center></b></td>
								<td style='color:white;'><b><center>Test-ID</center></b></td>
								<td style='color:white;'><b><center>Question Paper</center></b></td>
								<td style='color:white;'><b><center>Solution</center></b></td>
								<td style='color:white;'><b><center>Dignostic Report</center></b></td>
							</tr>
							<tr>
								<td><select id="sb" name="sb" size="6" style="width:95px;">
								<?php
									include 'config.php';
									if($s3 == '9')
									{
										$result=mysql_query("SELECT id,NAME FROM detail WHERE id IN(15,16,17)");
									}
									else if($s3 == '10')
									{
										$result=mysql_query("SELECT id,NAME FROM detail WHERE id IN(14,16,17)");
									}
									else if($s3 == '11')
									{
										$result=mysql_query("SELECT id,NAME FROM detail WHERE id IN(14,15,16,17)");
									}
									else if($s3 == '12')
									{
										$result=mysql_query("SELECT id,NAME FROM detail WHERE id IN(15,18)");
									}
									else if($s3 == '13')
									{
										$result=mysql_query("SELECT id,NAME FROM detail WHERE id IN(19,22)");
									}
									else if($s3 == '21')
									{
										$result=mysql_query("SELECT id,NAME FROM detail WHERE id IN(15,18,19,22)");
									}
									$rw = mysql_num_rows($result);
									if($rw == 0)
									{
										echo "<option value='0'>No Data Available.</option>";
									}
									else
									{
										while($row=mysql_fetch_array($result))
										{
											echo "<option value='$row[0]'>$row[1]</option>";
										}
									}
								?>
								</select>
								</td>
								<td><select id="test_id_with_date" name="test_id_with_date" size="6" style="width:135px;"/></td>
								<td><select id="qp" name="qp" size="6" style="width:150px;"/></td>
								<td><select id="sn" name="sn" size="6" style="width:150px;"/></td>
								<td><select id="rp" name="rp" size="6" style="width:165px;"/></td>
							</tr>
						</table>
						<br/>
						<table width="100%" style="float:left;border: 1px solid black;">
							<tr>
								<td style="border:solid 1px;width:50%;overflow-y:scroll;height:438px;background-color:white;" id="dig_rep_id_hide" >
									<center><img src='loading/di_load.gif' width='60%;' height='200px;'></center>
								</td>
								<td style="border:solid 1px;width:50%;height:438px;background-color:white;" id="dig_rep_id" >
									<div class='tdbox' id="dig_rep_id1" name="dig_rep_id1" style="border:solid 1px;overflow-y: 	scroll;background-color:white;width:100%;height:438px;">
									</div>
								</td>
							</tr>
						</table>
					</td>
					<td valign='top' style="border: 0px solid black;width: 40%;height:600px;">
						<div style="border:solid 1px;overflow-y:scroll;background-color:white;width:100%;height:160px;">
							<b>Dear <?php echo $u5; ?></b><br/>
							<div style='padding-left:20px;'>Your grey concepts for the selected test is listed below. You are advised to take help of your teacher to understand these concepts well. You can also take the help of video lectures and web resources to strengthen these concepts. After that you are advised to do the Personal Assignment based on this test ID. If you are not getting full score in Personal Assignment, you are advised to revise these topics again before attending the second personal assignment. Repeat this cycle until you get full score in Personal Assignment which indicate that your grey concepts are cleared.</div><br/>
							<b>Global Eduserver Team</b>
						</div>
						<div class='tdbox' id="concept_id" name="concept_id" style="border:solid 1px;overflow-y: 	scroll;background-color:white;width:100%;height:440px;">
						</div>
					</td>
				</tr>
			</table>
		</div>
	</body>
</html>