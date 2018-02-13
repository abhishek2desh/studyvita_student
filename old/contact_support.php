<?php
	include_once 'config.php';
	session_start();
	include('lock.php');
	$today = date("Y-m-d", strtotime('today'));
	$today2 = date("l, d F, Y", strtotime('today'));
	$_SESSION['today_dt_session'] = $today;
	$user=$_SESSION['username'];
	$s1=$_SESSION['studid1'];
	$s2=$_SESSION['stnd1'];
	$s3=$_SESSION['grp1'];	
	$s4=$_SESSION['btch1'];
	$s5=$_SESSION['sid'];
	$u5 = $_SESSION['uname'];
	$board1 = $_SESSION['board'];
	$branch = $_SESSION['branch'];
	
	$result=mysql_query("SELECT email,contact_no FROM USER WHERE id='$s5'");
	$row=mysql_fetch_array($result);
	$email=$row[0];
	$contact_no=$row[1];
	
?>
<!doctype html>
<html>
	<head>
		
		<title>Welcome <?php echo $u5 ?></title>
		<link rel="shortcut icon" href="images/Edutechheader.ico" />
		<link href="menu.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="css/bg.css" />  
		<link rel="stylesheet" href="css/demo.css" />
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
		html, body	{ height:100%;width:100%; }
			body { margin:0; overflow:auto; }
		
		</style>
           
		<style> 
			inputs:-webkit-input-placeholder { 
				color:    #b5b5b5; 
			} 
			 
			inputs-moz-placeholder { 
				color:    #b5b5b5; 
			} 
			 
			 .inputs  { 
			 width:270px; 
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
 
		</style> 
		<script type="text/javascript">
			
			$(function (){
			
				var uid='<?php echo $s5; ?>';
				var email='<?php echo $email; ?>';
				var contact_no='<?php echo $contact_no;?>';
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
				$('#user_name').attr("disabled", true);
				$('#email_id').attr("disabled", true);
				$('#bt_id').click(function(){
					//alert("sfdfdsf");
					cm_id=$("#cm_id").val();
					filename = "contact_support/1_contact_support.php?user_id="+uid+"&email="+email+"&contact_no="+contact_no+"&cm_id="+cm_id;
					//alert(filename);
					getInsert(filename);
					
				});
				
			});
		</script>
	</head>
	<body>
			<?php require 'header4.php'; 	
			?>
			<br/>
		<table style="padding-top:0px;border:solid 0px;width:100%;height:25px;">
			<tr>
				<td style="background-color:#3366FF;border:solid 0px;">
					<label style="color:white"><b>Contact Support</b></label>
				</td>
			</tr>
		</table>
			<br/>
			<div style="padding-left:50px;">
			<input type="text" class="inputs" id="user_name" placeholder=<?php echo $u5;?> /> 
			<br><br>
			<input type="text" class="inputs" id="email_id" placeholder=<?php echo $email;?> /> 
            <br><br>
			<textarea cols="20" rows="5" maxlength='490' class="inputs" name="cm_id" id="cm_id" placeholder="Comments"></textarea>
			<br><br>
			<input type="BUTTON" id="bt_id" name="bt_id" value="Submit" />
			</div>
	</body>
	<?php
		include 'conn_close.php';
	?>
</html>