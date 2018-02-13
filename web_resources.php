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
			<link type="text/css" rel="stylesheet" href="css/style_image_demo.css" />
		<link href="menu/menu.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" media="screen" href="css/ui.jqgrid.css" />
		<link rel="stylesheet" type="text/css" href="css/flexpaper.css" />
		<script src="js/jquery-1.8.3.js"></script>
		<script src="js/jquery-ui.js"></script>
		<link rel="stylesheet" href="css/jquery-ui.css" />
		<script src="js/jquery-ui.js"></script>
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
		<script type="text/javascript">
			$(document).ready(function(){
			var uid='<?php echo $s5; ?>';
						var course_id='<?php echo $course_id; ?>';
						var batch_id='<?php echo $batch_id; ?>';
						var accounttype="";
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

	//for checking totaltimes
filename = "web_resorces/check-demo-logintimes.php?course_id="+course_id+"&batch_id="+batch_id+"&uid="+uid;
							$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
						
							if(data == 'success')
							{
							
							}
							else
							{
							alert(data);
							url="student_course_page.php";
								document.location.href=url;
							}
						},
					});
	//end checking
	$("#search1").live('click',function(){
		online_id="";
		online_id = ($(this).closest('tr').attr('id'));
		var mySplitResult = online_id.split("|");
		online_id=mySplitResult[0];
		accounttype=mySplitResult[1];
		if(accounttype=="Basic" || accounttype=="basic")
		{
			var searchid="web";
			filename = "web_resorces/check-total-clicktimes.php?course_id="+course_id+"&batch_id="+batch_id+"&uid="+uid+"&searchid="+searchid;
			//alert(filename);
				$.ajax({
				url: filename,
				type: 'GET',
				dataType: 'html',
				
				success: function(data, textStatus, xhr) {
				var mySplitResultd = data.split("|");
					if(mySplitResultd[0] == 'success')
					{
						if(mySplitResultd[1]=="")
						{
							var url1 ='http://www.google.com/search?q=' + online_id;
						var win=window.open(url1, '_blank');
						win.focus();
						
						}
						else
						{
						
						alert("Your's is basic account.You can access this feature "+mySplitResultd[1]+" times more only.Upgrade to premium account to get unlimted access" );
						var url1 ='http://www.google.com/search?q=' + online_id;
						var win=window.open(url1, '_blank');
						win.focus();
						}
					}
					else
					{
					alert(data);
				
					}
				},
			});
		}
		else
		{
			var url1 ='http://www.google.com/search?q=' + online_id;
			var win=window.open(url1, '_blank');
			win.focus();
		}
	});
	$("#search4").live('click',function(){
		online_id="";
		online_id = ($(this).closest('tr').attr('id'));
		var mySplitResult = online_id.split("|");
		online_id=mySplitResult[0];
		accounttype=mySplitResult[1];
		//alert(accounttype);
		if(accounttype=="Basic" || accounttype=="basic")
		{
			var searchid="web";
			filename = "web_resorces/check-total-clicktimes.php?course_id="+course_id+"&batch_id="+batch_id+"&uid="+uid+"&searchid="+searchid;
			//alert(filename);
				$.ajax({
				url: filename,
				type: 'GET',
				dataType: 'html',
				
				success: function(data, textStatus, xhr) {
				var mySplitResultd = data.split("|");
					if(mySplitResultd[0] == 'success')
					{
						if(mySplitResultd[1]=="")
						{
						var url1 ='http://www.google.com/search?q=' + online_id;
						var win=window.open(url1, '_blank');
						win.focus();
						
						}
						else
						{
						alert("Your's is basic account.You can access this feature "+mySplitResultd[1]+" times more only.Upgrade to premium account to get unlimted access" );
						var url1 ='http://www.google.com/search?q=' + online_id;
						var win=window.open(url1, '_blank');
						win.focus();
						}
					}
					else
					{
					alert(data);
				
					}
					
				},
			});
		}
		else
		{
			var url1 ='http://www.google.com/search?q=' + online_id;
			var win=window.open(url1, '_blank');
			win.focus();
		}
	});
	$("#search2").live('click',function(){
		online_id="";
		online_id = ($(this).closest('tr').attr('id'));
		var mySplitResult = online_id.split("|");
		online_id=mySplitResult[0];
		accounttype=mySplitResult[1];
		if(accounttype=="Basic" || accounttype=="basic")
		{
			var searchid="video";
			filename = "web_resorces/check-total-clicktimes.php?course_id="+course_id+"&batch_id="+batch_id+"&uid="+uid+"&searchid="+searchid;
				$.ajax({
				url: filename,
				type: 'GET',
				dataType: 'html',
				
				success: function(data, textStatus, xhr) {
					var mySplitResultd = data.split("|");
					if(mySplitResultd[0] == 'success')
					{
						if(mySplitResultd[1]=="")
						{
						var url1='https://www.youtube.com/results?search_query='+online_id;
						var win=window.open(url1, '_blank');
						win.focus();
						
						}
						else
						{
						alert("Your's is basic account.You can access this feature "+mySplitResultd[1]+" times more only.Upgrade to premium account to get unlimted access" );
						var url1='https://www.youtube.com/results?search_query='+online_id;
						var win=window.open(url1, '_blank');
						win.focus();
						}
					}
					else
					{
					alert(data);
				
					}
					
				},
			});
		}
		else
		{
			var url1='https://www.youtube.com/results?search_query='+online_id;
			var win=window.open(url1, '_blank');
			win.focus();
		}
	});
	$("#search5").live('click',function(){
			online_id="";
		online_id = ($(this).closest('tr').attr('id'));
		var mySplitResult = online_id.split("|");
		online_id=mySplitResult[0];
		accounttype=mySplitResult[1];
		if(accounttype=="Basic" || accounttype=="basic")
		{
			var searchid="video";
			filename = "web_resorces/check-total-clicktimes.php?course_id="+course_id+"&batch_id="+batch_id+"&uid="+uid+"&searchid="+searchid;
				$.ajax({
				url: filename,
				type: 'GET',
				dataType: 'html',
				
				success: function(data, textStatus, xhr) {
				var mySplitResultd = data.split("|");
					if(mySplitResultd[0] == 'success')
					{
						if(mySplitResultd[1]=="")
						{
						var url1='https://www.youtube.com/results?search_query='+online_id;
						var win=window.open(url1, '_blank');
						win.focus();
						
						}
						else
						{
						alert("Your's is basic account.You can access this feature "+mySplitResultd[1]+" times more only.Upgrade to premium account to get unlimted access" );
						var url1='https://www.youtube.com/results?search_query='+online_id;
						var win=window.open(url1, '_blank');
						win.focus();
						}
					}
					else
					{
					alert(data);
				
					}
					

				},
			});
		}
		else
		{
			var url1='https://www.youtube.com/results?search_query='+online_id;
			var win=window.open(url1, '_blank');
			win.focus();
		}
	});
	$("#search3").live('click',function(){
		online_id="";
		online_id = ($(this).closest('tr').attr('id'));
		var mySplitResult = online_id.split("|");
		online_id=mySplitResult[0];
		accounttype=mySplitResult[1];
		if(accounttype=="Basic" || accounttype=="basic")
		{
			var searchid="img";
			filename = "web_resorces/check-total-clicktimes.php?course_id="+course_id+"&batch_id="+batch_id+"&uid="+uid+"&searchid="+searchid;
			//alert(filename);
				$.ajax({
				url: filename,
				type: 'GET',
				dataType: 'html',
				
				success: function(data, textStatus, xhr) {
				var mySplitResultd = data.split("|");
					if(mySplitResultd[0] == 'success')
					{
						if(mySplitResultd[1]=="")
						{
						var url1 ='http://www.google.com/images?q=' +online_id;
						var win=window.open(url1, '_blank');
						win.focus();
						
						}
						else
						{
						alert("Your's is basic account.You can access this feature "+mySplitResultd[1]+" times more only.Upgrade to premium account to get unlimted access" );
						var url1 ='http://www.google.com/images?q=' +online_id;
						var win=window.open(url1, '_blank');
						win.focus();
						}
					}
					else
					{
					alert(data);
				
					}
					
				},
			});
		}
		else
		{
				var url1 ='http://www.google.com/images?q=' +online_id;
			var win=window.open(url1, '_blank');
			win.focus();
		}
	});
	$("#search6").live('click',function(){
		online_id="";
		online_id = ($(this).closest('tr').attr('id'));
		var mySplitResult = online_id.split("|");
		online_id=mySplitResult[0];
		accounttype=mySplitResult[1];
		if(accounttype=="Basic" || accounttype=="basic")
		{
			var searchid="img";
			filename = "web_resorces/check-total-clicktimes.php?course_id="+course_id+"&batch_id="+batch_id+"&uid="+uid+"&searchid="+searchid;
				$.ajax({
				url: filename,
				type: 'GET',
				dataType: 'html',
				
				success: function(data, textStatus, xhr) {
								var mySplitResultd = data.split("|");
					if(mySplitResultd[0] == 'success')
					{
						if(mySplitResultd[1]=="")
						{
						var url1 ='http://www.google.com/images?q=' +online_id;
						var win=window.open(url1, '_blank');
						win.focus();
						
						}
						else
						{
						alert("Your's is basic account.You can access this feature "+mySplitResultd[1]+" times more only.Upgrade to premium account to get unlimted access" );
						var url1 ='http://www.google.com/images?q=' +online_id;
						var win=window.open(url1, '_blank');
						win.focus();
						}
					}
					else
					{
					alert(data);
				
					}
					
				},
			});
		}
		else
		{
			var url1 ='http://www.google.com/images?q=' +online_id;
			var win=window.open(url1, '_blank');
			win.focus();
		}
	});
		//document.getElementById('search2').onclick = function () { alert(this.className); }
					/*$("#topic").live('click',function(){
					alert("l");
						 var isclass = $(this).attr('class');
						 alert(isclass);
					});*/
				$("#hide_result").hide();
					$("#hide_result1").hide();
					filename = "test_paper_generator/chapter_web_re.php";
					//alert(filename);
					getContent(filename, "chapter");
					/*filename1 = "query/check-accounttype.php?uid="+uid;
					alert(filename1);
					$.ajax({
						url: filename1,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
						//alert(data);
							accounttype=data;
							
							},
							});*/
							//alert(accounttype);
					$("#chapter").click(function(){
						chapter=$("#chapter").val();
						$("#hide_result").show();
						$("#topic").hide();
						filename = "web_resorces/5.php?chap_id="+chapter+"&uid="+uid+"&course_id="+course_id;
						getContent_tp(filename, "topic");
					});
					$('#topic').click(function(){
					$("#hide_result1").show();
						$("#concept_id").hide();
					//callFlexPaperDocViewer(check_id22);
						$("#topic input:radio:checked").each(function() {
							idArray34=this.id;
						});
						topic=idArray34;
						//alert(topic);
						filename = "web_resorces/6.php?topic="+topic+"&uid="+uid;
						//alert(filename);
						getContent_cp(filename, "concept_id");
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
				$('#btn_no').click(function(){
					$("#Democourse_instruction").fadeOut("normal");
					$("#shadow").fadeOut();
				});
				$('#btn_yes').click(function(){
							filename="query/get_student_website_fees.php?uid="+uid+"&course_id="+course_id;
										$.ajax({
										url: filename,
										type: 'GET',
										dataType: 'html',
										
										success: function(data, textStatus, xhr) {
											//alert(data);
											var mySplitResult = data.split("|");
											var url_reg="";
											var reg_uid="",reg_uname="",reg_fees="";
											reg_uid=mySplitResult[0];
											reg_uname=mySplitResult[2];
											reg_fees=mySplitResult[3];
											var	totalitem=1;
											if(reg_fees>0)
											{
											filename1="query/insert_course_order_proaccnt.php?course_id="+course_id+"&totalitem="+totalitem+"&uid="+uid+"&totalamt="+reg_fees;
		
										$.ajax({
												url: filename1,
												type: 'GET',
												dataType: 'html',
												
												success: function(data1, textStatus, xhr) {
													//alert(data);
													if(data1 == 'Failed')
													{
														alert("Pls try after sometime");
														
													}
													else
													{
														var order_id=data1;
														 var referral_code="";
														 if(mySplitResult[1]=="www.coreacademics.in" || mySplitResult[1]=="coreacademics.in")
											{
											url_reg="http://coreacademics.in/pricing/datafrom_test.php?course_id="+course_id+"&totalitem="+totalitem+"&uname="+reg_uname+"&uid="+uid+"&totalamt="+reg_fees+"&order_id="+order_id+"&referral_code="+referral_code;
											}
											else
											{
											url_reg="http://"+mySplitResult[1]+"/datafrom_test.php?course_id="+course_id+"&totalitem="+totalitem+"&uname="+reg_uname+"&uid="+uid+"&totalamt="+reg_fees+"&order_id="+order_id+"&referral_code="+referral_code;
											}
														
													
														window.location.replace(url_reg);
													}
												},
										});
											}
											else
											{
											//alert("ok");
											}
											
										},
								});
					});
				function getContent_tp(filename, selectboxid)
				{
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							var strtemp = "$('#" + selectboxid + "').html(data)";
							eval(strtemp);
							//alert(data);
							$("#hide_result").hide();
						$("#topic").show();
							//$("#sel_type").show();
						},
					});
				}
				function getContent_cp(filename, selectboxid)
				{
					$.ajax({
						url: filename,
						type: 'GET',
						dataType: 'html',
						
						success: function(data, textStatus, xhr) {
							var strtemp = "$('#" + selectboxid + "').html(data)";
							eval(strtemp);
							//alert(data);
							$("#hide_result1").hide();
						$("#concept_id").show();
							//$("#sel_type").show();
						},
					});
				}
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
		</style>

</head>
<body>
<!-- Animation Content Div -->
	<div class="overlayModal">
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
	</div>


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
		<td><b>Welcome <?php echo "&nbsp;&nbsp;&nbsp;".$u5."&nbsp;&nbsp;!&nbsp;&nbsp;&nbsp;&nbsp;</b>";
		?>
		</td>
		</tr>

				<tr>
					<td style="background-color:#3366FF;border:solid 0px;">
					<?php
												$result_c=mysql_query("SELECT c.name,u.name FROM course c,user u WHERE c.id='$course_id' and u.id=c.tutor_id");
												$row_c=mysql_fetch_array($result_c);
												$crname=$row_c[0]; 
												$tutorname=$row_c[1]; 
												$result_c1=mysql_query("SELECT name FROM subject WHERE id='$subject_id'");
												$row_c1=mysql_fetch_array($result_c1);
												$subname=$row_c1[0];
												echo "<label style='float:left;color:#ffffff;'><font face='verdana' size='2' color='white' ><b>".$tutorname.">".$crname.">".$subname.">"."Web Resources</b></font></label>";
												//<label style="float:left;color:white"><b>Web Resources</b></label>
						?>
						
					</td>
				</tr>
			</table>
			<br/>
			<center><table class='main_div2' style='width:80%'>
				<tr>
					<td>
						Chapter List
					</td>
					<td>
						Topic  List
					</td>
				</tr>
				<tr>
					<td style='width:40%'>
						<select id="chapter" size="3" style="width:100%;height:90px;"name="br">
					</td>
					<td style='width:60%'>
						<div  id="topic"  name="topic" style="border:solid 1px;overflow-y: 	scroll;background-color:white;width:100%;height:90px;">
						</div>
								<div id='hide_result' style="padding-top:5px;border:solid 0px;width:100%;height:90px;">
							<center><img src='loading/di_load3.gif' width='200px;' height='20px;'></center>
						</div>
					</td>
				</tr>
			</table></center>
			<center>
				<div class='main_div2' style='width:80%;'>
					<div style="padding-left:5px;padding-top:0px;">
						<table style='width:100%;'>
							<tr>	
								<th style='width:100%;'>
									Concept
								</th>
							</tr>
							<tr>
								<td style='width:100%;'>
									<center><div  id="concept_id" name="concept_id" style="border:solid 1px;overflow-y: 	scroll;background-color:white;width:80%;height:400px;">
									</div>
										<div id='hide_result1' style="padding-top:75px;border:solid 1px;width:80%;height:400px;overflow-y: scroll;">
							<center><img src='loading/di_load.gif' width='66px;' height='66px;'></center>
						</div></center>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</center>
		</div>
		<br/>
        <?php include 'Popup_basic_account.php';?>
	</div>
	
	<div>
			<?php require 'copy_right_file.php'; ?>
		</div>
</body>
</html>