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
	
?>
 <!DOCTYPE html>
  <html>
    <head>
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="/faqs/css/materialize.css"  media="screen,projection"/>
	<link rel="shortcut icon" href="images/Edutechheader.ico" />
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>Welcome  <?php echo $u5; ?></title>
	<meta http-equiv="refresh" content="0; url=/faqs" />
    <script type="text/javascript">
			$(function (){
				var fac_id = "<?php echo $s5; ?>";

				
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
         
  
        <div class="row container">
			<div class="content">
				<div class="contents2">
					<table>
						<tr>
							<td style='float:left;'>
								
								<div id="wl" style="width:1000px;">
									<div style="padding-left:5px;padding-top:5px;font-size:12px;text-transform: capitalize;">
									<b>
									Welcome <?php echo "&nbsp;&nbsp;&nbsp;".$u5."&nbsp;&nbsp;!&nbsp;&nbsp;&nbsp;&nbsp;";
									?>
									</div>
								</div>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
            
     <div class="container">
	
     <div class="progress">
      <div class="indeterminate"></div>
  </div>
        
  </div>
  		
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
  </html>