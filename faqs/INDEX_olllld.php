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
      <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
	<link rel="shortcut icon" href="../images/Edutechheader.ico" />
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>Welcome  <?php echo $u5; ?></title>
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
<nav>
<a href="#" class="brand-logo center"><img src="../../images/logo.png" height="56px"></a>
  <ul class="left hide-on-med-and-down">
    <li><a href="../../home.php">Home</a></li>
  </ul>
  <ul id="slide-out" class="side-nav">
    <li><a href="../../home.php">Home</a></li>
  </ul>
  <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
</nav>
       
  
        <div class="row container">
			<div class="content">
				<div class="contents2">
					<table>
						<tr>
							<td style='float:left;'>
								
								<div id="wl" style="width:auto;">
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
            
     <div class="container" style="width:100%">
	
    <ul class="collapsible popout" data-collapsible="accordion">
    <?php
				$result_c=mysql_query("SELECT DISTINCT `Query_category` FROM `frequetly_asked_question_list` WHERE user_type LIKE '%,5,%'");
				//echo "<ul>";
				while($row = mysql_fetch_array($result_c))
				{
				echo "<li>";
      echo "<div class='collapsible-header'><i class='mdi-action-announcement'></i><font color='red'>".$row[0]."</font></div>";
	  $result1=mysql_query("SELECT DISTINCT Query_name,query_answer FROM `frequetly_asked_question_list` WHERE user_type LIKE '%,5,%' AND Query_category='$row[0]'");
	  $i=1;
	 while($row1 = mysql_fetch_array($result1))
	 {
	 
	 echo "<div class='collapsible-body left-align'><br><b>Q: ".$row1[0]."</b></div>";
	 
		 echo "<div class='collapsible-body left-align'><br>A: ".$row1[1]."</div>";
		$i=$i+1;
	 }
       
    echo "</li>";
				}
				//echo "</ul>";
				?>
  </ul>
  </div>
  		
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
	  <script type="text/javascript" src="js/navbar.js"></script>
    </body>
  </html>