<?php
	include 'config.php';
	session_start();
	$today = strtotime(date("Y-m-d H:i:s"));
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
	$result=mysql_query("SELECT u.name,sd.sname,sd.father_name,sd.f_mob_no,sd.pe_mailid,u.email,u.contact_no,u.username FROM USER u,student_details sd WHERE u.id=sd.user_id AND u.id='$s5'");
	$row=mysql_fetch_array($result);
	$uname=$row[0];$sname=$row[1];$fname=$row[2];$fmobile=$row[3];$pemail=$row[4];$uemail=$row[5];$contact_no=$row[6];
	$username=$row[7];
	
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
		<link rel="stylesheet" href="css/style_images.css" type="text/css" />
		<script type="text/javascript" src="js/flexpaper.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers_debug.js"> </script>
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
			inputs:-webkit-input-placeholder { 
				color:    #b5b5b5; 
			} 
			 
			inputs-moz-placeholder { 
				color:    #b5b5b5; 
			} 
			 
			 .inputs  { 
			 width:200px; 
			padding: 15px 25px; 
			font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif; 
			font-weight: 400; 
			font-size: 14px; 
			color: #9D9E9E; 
			text-shadow: 1px 1px 0 rgba(256, 256, 256, 1.0); 
			background: #FFF; 
			border: 1px solid #FFF; 
			border-radius: 5px; 
			box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.50); 
			-moz-box-shadow: inset 0 1px 3px rgba(0,0,0,0.50); 
			-webkit-box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.50); 
			} 
			.inputs:focus { 
			   background: #DFE9EC; 
			color: #414848; 
			box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.25); 
			-moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.25); 
			-webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.25); 
				outline:0; 
			} 
			  .inputs:hover   { 
			background: #DFE9EC; 
			color: #414848; 
			} 
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
			
			var user_id='<?php echo $s5; ?>';
				var user_name='<?php echo $u5; ?>';
				//check graphic display
				$(".overlayModal").hide();
				 var content_name="animation";
				filename ="query/check_user_gif_display1.php?user_id="+user_id+"&content_name="+content_name;
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
						$("#close_window").click(function(){
//document.location.href="home.php";
url = "virtual-class.php";
                              
                                   location.href = url;
});
				$("#incentive_list").hide();
				$('input[type="radio"][name="acctype"]').click(function(){
					var doc_tp = $("input[type='radio'][name='acctype']:checked");
					if (doc_tp.length > 0)
					doc_tp1 = doc_tp.val();
					if(doc_tp1 == 15)
					{
					$(".online").show();
					$("#incentive_list").hide();
						
						
					}
					else if(doc_tp1 == 16)
					{
						$(".online").hide();
					$("#incentive_list").show();
						filename ="query/view_incentive.php?user_id="+user_id;
					getContent(filename, "incentive_list");
					}
					
				});
				filename ="query/view_incentive.php?user_id="+user_id;
					getContent(filename, "incentive_list");
					$("#tranfer_inc").live('click',function(){
					var bal=($(this).closest('tr').attr('id'));
					//alert(bal);
						var mySplitResult = bal.split("|");
						rc_id=mySplitResult[0];
						amount=mySplitResult[1];
						filename1="query/transfer_to_account.php?rc_id="+rc_id+"&amount="+amount+"&user_id="+user_id;
		//alert(filename1);
				$.ajax({
						url: filename1,
						type: 'GET',
						dataType: 'html',
						
						success: function(data1, textStatus, xhr) {
						if(data1=="")
						{
						alert("Data updated successfully");
						filename ="query/view_incentive.php?user_id="+user_id;
					getContent(filename, "incentive_list");
						}
						else
						{
						//alert(data1);
						alert("try after sometime..");
						}
						},
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
					},
				});									
			}
			$("#submit4").click(function(){
			//alert("l");
		amt=$("#text_amt").val();
		//alert(amt);
				amt1=$("#text_amt option:selected").text();
		totalitem=1;
	//alert(amt1);
		if(amt>0)
		{
		//alert(amt);
		filename1="query/insert_course_order_rc.php?course_id="+amt+"&totalitem="+totalitem+"&uid="+user_id+"&totalamt="+amt1;
		
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
							url_reg="http://studyvita.com/datafrom_test.php?course_id="+amt+"&totalitem="+totalitem+"&uname="+user_name+"&uid="+user_id+"&totalamt="+amt1+"&order_id="+order_id+"&referral_code="+referral_code;
							//location.href=url;
//url_reg="http://www.thecoreacademics.com/pricing.php?uid="+reg_uid+"&uname="+reg_uname;
							window.location.replace(url_reg);
						}
					},
			});
		}
		else
		{
		alert("select amount");
		}
		
			});
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

	<div style='background-color:#fff;width:100%'>
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
		<div style='background-color:#fff;width:100%;height:500%;'>
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
												
													echo "<label style='float:left;color:#ffffff;padding-left:5px;'><font face='verdana' size='2' color='white' ><b>Welcome &nbsp;&nbsp;&nbsp;".$u5."&nbsp;&nbsp;!&nbsp;&nbsp;&nbsp;&nbsp;".$tutorname.">".$crname.">".$subname.">"."Recharge Account<b></font></label>";
												
						?>
						
					</td>
					<td style="width:2%" valign="right">
							<img src="images/close_image.png" id="close_window" height="25px" width="25" align="right">
							</td>
				</tr>
			</table>
			
		
		</div>
				
				<form method="post" enctype="multipart/form-data">
						<center><div class='main_div'>
							<div  style='height:30px;font-size:20px;'>
								<center><b><u>Account Recharge</u></b></center>
							</div>
							<div  style='height:30px;font-size:16px;'>
							<table style='width:100%;'>
							<tr>
							<td style='padding-left:18px'>
							<?php
							$amt=0;
							$rcdate="";
							$rcamt="";
							$result=mysql_query("SELECT total_balance,DATE_FORMAT(create_date,'%d-%m-%Y'),amount FROM `user_recharge_usage_detail` WHERE user_id='$s5' ORDER BY id DESC LIMIT 0, 1 ");
						
								while($row=mysql_fetch_array($result))
								{
									$amt=$row[0];
									//$rcdate=$row[1];
							//$rcamt=$row[2];
								}
								?>
							</td>
							<td>
							<p align="right">Your current balance:
								<label id="bal">
								<?php
								
												echo " <b><u>".$amt."</b></u>&nbsp;Rs";
												echo "<br/><a href='http://student.coreacademics.in/myaccountdetail.php'>Account Details</a>&nbsp;&nbsp;<a href='http://student.coreacademics.in/Refree_Incentive.php'>My Incentive </a>";
											?>
								</label><br/>
								</td>
							</tr>
							</table>
							</div>
							<input id="15" type="radio" name="acctype" checked="checked" value="15"><label  for="15"><b>Online Recharge</b></label><input id="16" type="radio" name="acctype"  value="16"><label  for="16"><b>Redeem From Referal Incentive</b></label><br/>
							<table style='width:30%' cellspacing="10" class="online">
							<tr class='first_main'>
									<td style='width:30%;'>
										<label style='font-size:16px;'>Select Amount(In Rupees)</label>
									</td>
									<td style='width:30%;'>
										<select class='inputs' id='text_amt' name="text_amt">
											<?php
												$result=mysql_query("SELECT id,amount FROM rechargeamount_detail ORDER BY amount ");
												$rw = mysql_num_rows($result);
												echo "<option value='0'>Select Amount</option>";
												if($rw == 0)
												{
													echo "<option value='0'>No Data Available.</option>";
												}
												else
												{
													while($row=mysql_fetch_array($result))
													{
														echo "<option value=$row[0]>$row[1]</option>";
													}
												}
											?>
										</select>
									</td>
									
								</tr>
								<tr class='first_main'>
								<td style='width:30%;'>
										
									</td>
									<td style='width:30%;'>
									<input type='BUTTON' id='submit4' name='submit4'  value = 'Recharge' class="defaultbutton" />
									
									</td>
									
								</tr>
								
							</table><br/>
						
							<div id="incentive_list" name="incentive_list" style="border:solid 0px;overflow-y: 	scroll;background-color:white;width:30%;height:200px;">
						
						</div></center>
					</form>
	        <div>
                <?php require 'copy_right_file.php'; ?>
            </div>

		<div style='margin-top:60px;'><?php require 'footer.php'; ?></div>
	</div>
</body>
</html>