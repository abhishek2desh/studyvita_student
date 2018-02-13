<?php
	include_once 'config.php';
	session_start();
	$today34 = date("d-m-Y", strtotime('today'));
	$today = date("Y-m-d", strtotime('today'));
	$today2 = date("l, d F, Y", strtotime('today'));
	$_SESSION['today_dt_session'] = $today;
	$user5="";
	$user5=$_GET['user_id'];
	$_SESSION['check_user']=$user5;
	$checked_val=0;
	if($user5 == "")
	{
		include('lock.php');
		$user=$_SESSION['username'];
		$s1=$_SESSION['studid1'];
		$s2=$_SESSION['stnd1'];
		$s3=$_SESSION['grp1'];	
		$s4=$_SESSION['btch1'];
		$s5=$_SESSION['sid'];
		$u5 = $_SESSION['uname'];
		$board1 = $_SESSION['board'];
		$branch = $_SESSION['branch'];
		$student_photos = $_SESSION['student_photos'];
		//echo $student_photos;
	}
	else
	{
		$_SESSION['user'] = $user5;
		$result_fetch=mysql_query("SELECT sd.edutech_student_id,sd.group_id,sd.standard_id,sd.board_id,sd.batch_id,sd.branch_id,sd.sname,u.student_photos
									FROM USER u,student_details sd WHERE u.id=sd.user_id AND u.id='$user5'");
		
		$row_result=mysql_fetch_array($result_fetch);
		$s1=$row_result[0];
		$s3=$row_result[1];
		$s2=$row_result[2];
		$s4=$row_result[4];
		$board1=$row_result[3];
		$branch=$row_result[5];
		$u5=$row_result[6];
		$student_photos=$row_result[7];
		$s5=$user5;
		//echo $student_photos;
		$_SESSION['sid'] = $s5;
		$_SESSION['studid1'] = $s1;
		$_SESSION['grp1'] = $s3;
		$_SESSION['stnd1'] = $s2;
		$_SESSION['btch1'] = $s4;
		$_SESSION['board'] = $board1;
		$_SESSION['branch'] = $branch;
		$_SESSION['uname'] = $u5;
		$_SESSION['username']=$u5;
		$_SESSION['student_photos']=$student_photos;
	}
	
	//echo $student_photos;
?>
<?php
if(isset($_POST['submit_photo'])) 
{
	if ($_FILES["file"]["error"] > 0)
	{
		echo "Error: " . $_FILES["file"]["error"] . "<br>";
	}
	else
	{ 
		$file_name=$_FILES["file"]["name"];
		
		$str_arr = explode('.',$file_name);
		$str_bf = $str_arr[0];  // Before the Decimal point
		$str_af = $str_arr[1];
		
		if($str_af == "jpeg" || $str_af == "png" || $str_af == "jpg" || $str_af == "JPEG" || $str_af == "PNG" || $str_af == "JPG")
		{
		
		
			move_uploaded_file($_FILES["file"]["tmp_name"],
			"D:\\inetpub\\wwwroot\\EdutechIndia\\edu\\StudentPhotos\\" . $_FILES["file"]["name"]);
			
			$rs6=mysql_query("UPDATE USER SET student_photos='$file_name' WHERE id='$s5'");
			if($rs6)
			{
				
				$message="Your photo successfully upload, Thank You";
				
				echo "<script language=javascript> alert('$message');</script>"; 
				echo '<SCRIPT LANGUAGE="JavaScript">
				document.location.href="home.php" </SCRIPT>';
			}
			else
			{
				//echo "Paper Generation Failed";
			}
		}
		else
		{
			$message2="Choose only png and jpg file..";
			echo "<script language=javascript> alert('$message2');</script>"; 
		}
	}
}
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Welcome <?php echo $u5 ?></title>
			<link rel="shortcut icon" href="images/Edutechheader.ico" />
			
			<link href="css/style2.css" rel="stylesheet" type="text/css" />
			<link href="css/style.css" rel="stylesheet" type="text/css"  media="screen" />
		<link rel="stylesheet" type="text/css" href="css/flexpaper.css" />
		<script type="text/javascript" src="js/flexpaper.js"> </script> 
<!--	<script type="text/javascript" src="js/jquery.min.js"> </script>	-->
		<script type="text/javascript" src="js/flexpaper_handlers.js"> </script>
		<script type="text/javascript" src="js/flexpaper_handlers_debug.js"> </script>
		<!-- JQ Grid JS and CSS  session   -->	
		<link rel="stylesheet" type="text/css" media="screen" href="css/jquery-ui-1.8.2.custom.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="css/ui.jqgrid.css" />
	
		<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
		<script src="js/grid.locale-en.js" type="text/javascript"></script>
		<script src="js/jquery.jqGrid.min.js" type="text/javascript"></script>
		<link rel="stylesheet" href="css/style_images.css" type="text/css" />
		<!--  Float Chart -->
		<script language="javascript" type="text/javascript" src="js/jquery.flot.js"></script>
		<script language="javascript" type="text/javascript" src="js/jquery.flot.threshold.js"></script>
	
		<link rel="stylesheet" href="css/jquery-ui.css" />
		<script src="js/jquery-ui.js"></script>
	
		<link type="text/css" rel="stylesheet" href="css/multipleselectbox.css" />
		<script type="text/javascript" src="js/jquery.multipleselectbox-src.js"></script>
	
		<script src="js/jquery.watermarkinput.js" type="text/javascript"></script>
		<link href="menu.css" rel="stylesheet" type="text/css" />

		<style>
			
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
		<style>
			*
			{
				margin:0;padding:0;    
			}
			html,body
			{
				height:100%;
				width:100%;
			}
			body
			{
				display:table;
			}
			.row
			{
				width: 100%;
				background: #0174DF;
				display:table-row;
			}
			.container
			{
				background: pink;
				height:100%; 
				
			}
			.content {
				display: block;
				height:95%;
				box-sizing: border-box;
			}
			footer 
			{ 
				position: fixed; 
				bottom: 0; 
				left: 0; 
				background: white;
				height: 40px;
				line-height: 40px;
				width: 100%;
				text-align: center;
			}
			.sidebar{
				float:left;
				background:green;
				height:100%;
				width:10%;
			}
			.contents{
				float:left;
				background:#c4f0f1;
				height:100%;
				width:100%;
				overflow:auto;
			}
			.contents2{
				float:left;
				background:#c4f0f1;
				height:5%;
				width:100%;
				overflow:auto;
			}
			div.myDiv:hover {
				background-color: purple;
			}
			div.main_div:hover {
				background-color: #3399FF;
			}
			.tooltip {
				position:absolute;
				display:none;
				z-index:1000;
				background-color:black;
				color:white;
				border: 1px solid black;
			}
			.main_div { 
				height: auto;
				padding-left:50px;
				width: 800px; 
				background-color: white; 
				/* outer shadows  (note the rgba is red, green, blue, alpha) */
				-webkit-box-shadow: 0px 0px 12px rgba(0, 0, 0, 0.4); 
				-moz-box-shadow: 0px 1px 6px rgba(23, 69, 88, .5);
				/* rounded corners */
				-webkit-border-radius: 5px;
				-moz-border-radius: 5px; 
				border-radius: 5px;
				/* gradients */
				background: -webkit-gradient(linear, left top, left bottom, 
				color-stop(0%, white), color-stop(15%, white), color-stop(100%, #D7E9F5)); 
				background: -moz-linear-gradient(top, white 0%, white 55%, #D5E4F3 130%); 
				}
				inputs:-webkit-input-placeholder { 
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
			.myButton {
				-moz-box-shadow:inset -3px 7px 34px -50px #7a8eb9;
				-webkit-box-shadow:inset -3px 7px 34px -50px #7a8eb9;
				box-shadow:inset -3px 7px 34px -50px #7a8eb9;
				background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #637aad), color-stop(1, #5972a7));
				background:-moz-linear-gradient(top, #637aad 5%, #5972a7 100%);
				background:-webkit-linear-gradient(top, #637aad 5%, #5972a7 100%);
				background:-o-linear-gradient(top, #637aad 5%, #5972a7 100%);
				background:-ms-linear-gradient(top, #637aad 5%, #5972a7 100%);
				background:linear-gradient(to bottom, #637aad 5%, #5972a7 100%);
				filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#637aad', endColorstr='#5972a7',GradientType=0);
				background-color:#637aad;
				-moz-border-radius:9px;
				-webkit-border-radius:9px;
				border-radius:9px;
				border:4px solid #314179;
				display:inline-block;
				cursor:pointer;
				color:#ffffff;
				font-family:arial;
				font-size:12px;
				font-weight:bold;
				padding:6px 20px;
				text-decoration:none;
				text-shadow:0px 1px 0px #7a8eb9;
			}
			.myButton:hover {
				background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #5972a7), color-stop(1, #637aad));
				background:-moz-linear-gradient(top, #5972a7 5%, #637aad 100%);
				background:-webkit-linear-gradient(top, #5972a7 5%, #637aad 100%);
				background:-o-linear-gradient(top, #5972a7 5%, #637aad 100%);
				background:-ms-linear-gradient(top, #5972a7 5%, #637aad 100%);
				background:linear-gradient(to bottom, #5972a7 5%, #637aad 100%);
				filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#5972a7', endColorstr='#637aad',GradientType=0);
				background-color:#5972a7;
			}
			.myButton:active {
				position:relative;
				top:1px;
			}
		</style>
		<script> 
		$(document).ready(function(){
			$("li").bind("mousemove", function(event) {
				$(this).find("div.tooltip").css({
					top: event.pageY + 5 + "px",
					left: event.pageX + 5 + "px"
				}).show();
			}).bind("mouseout", function() {
				$("div.tooltip").hide();
			});
			$("div.tooltip").hide();
		});
		</script>
		<script type="text/javascript">
		$(document).ready(function(){
			var text_name="";
			var student_id='<?php echo $s5; ?>';
			filename = "query/search_course.php?text_name="+text_name;
			//alert(filename);
			getContent(filename, "search_course_by_name");
			$("#course_reg").live('click',function(){
				var bal=($(this).closest('tr').attr('id'));
				//alert(bal);
				var mySplitResult = bal.split("-");
						cname=mySplitResult[0];
						cfees=mySplitResult[1];
						cduration=mySplitResult[2];
						ctutor_id=mySplitResult[3];
						cid=mySplitResult[4];
						$("#cr_nm").html(cname);
						$("#shadow").fadeIn("normal");
						$("#reg_batch_dis").fadeIn("normal");
						filename = "query/courses_batch_define.php?cid="+cid;
						//alert(filename);
						getContent(filename, "course_batch");
			});
			$('#course_batch').change(function(){
				batch_val=$("#course_batch").val();
			});
			$('#submit').click(function(){
				filename = "query/insert_course_registred.php?batch_val="+batch_val+"&student_id="+student_id+"&cid="+cid;
				alert(filename);
				/*$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					
					success: function(data, textStatus, xhr) {
						//alert(data);
						if(data == 'success')
						{
							alert("Course registred. ");
						}
					},
				});*/
				$("#shadow").fadeOut("normal");
				$("#reg_batch_dis").fadeOut("normal");
			});
			$('#search_course').click(function(){
				text_name=$("#text_name").val();
				filename = "query/search_course.php?text_name="+text_name;
				//alert(filename);
				getContent(filename, "search_course_by_name");
			});
			$('#submit').click(function(){
				alert("hai");
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
	<body bgcolor="white">
		<div class="row"></div>
		<div class="row container">
			<div class="content">
				<div class="contents2"></div>
				<div class="contents" style='border:solid 0px;'>
					<center>
						<table style='background-color: #0174DF;width:80%;height:130px;border-radius: 10px; border: 2px solid #BADA55;'>
							<tr>
								<td style='background-color: #0174DF;width:15%;height:130px;border-radius: 5px; border: 0px solid #BADA55;'>
									<table style='background-color: #0174DF;width:100%;height:130px;border-radius: 5px; border: 0px solid #BADA55;'>
										<tr>
											<td style='background-color: #0174DF;width:100%;height:100px;border-radius: 5px; border: 0px solid #BADA55;'>
												<?php
													$result_photos=mysql_query("SELECT student_photos FROM USER WHERE id='$s5'");
													$row_photos=mysql_fetch_array($result_photos);
													$photos=$row_photos[0]; 
													if($photos == "")
													{
														$full_path="../"."StudentPhotos/blank_user_icon2.PNG";
														echo "<img src='$full_path' height='100px' width='67%' />";
													}
													else
													{
														$full_path="../"."StudentPhotos/".$photos;
														echo "<img src='$full_path' height='100px' width='67%' />";
													}
													
												?>
											</td>
										</tr>
										<tr>
											<td style='background-color: #0174DF;width:100%;height:30px;border-radius: 5px; border: 0px solid #BADA55;'>
												<a href="#" id="login_a" style="font-size:12px;color:white;">Upload Your Photo</a>
											</td>
										</tr>
									</table>
									
								</td>
								<td style='background-color: #0174DF;width:70%;height:100px;border-radius: 5px; border: 1px solid #BADA55;'>
									<center><div style='background-color: #0174DF;width:100%;height:100px;border-radius: 5px; border: 0px solid #BADA55;'>
										<br/><div style='width:100%;height:50px;'>
											<table>
												<tr>
													<td style='background-color: #0174DF;width:100%;height:25px;border-radius: 5px; border: 0px solid #BADA55;'>
														<center><label style='color:white;'><b>Welcome to Viewer Account !</b></label></center>
													</td>
												</tr>
											</table>
										</div>
										<div style='background-color: #0174DF;width:100%;height:25px;border-radius: 5px; border: 0px solid #BADA55;'>
											<center><label style='color:white;'><b>Student Name : <?php echo $u5 ?></b></label></center>
										</div></center>
									</div>
								</td>
								<td valign="bottom" style='background-color: #0174DF;width:5%;height:100px;border-radius: 5px; border: 0px solid #BADA55;'>
									<a href="logout.php">
									<center><div><img src='images/logout-button-blue.png'></div></center>
										<!--<ul>
											<li>
												<center><div><img src='images/logout-button-blue.png'></div></center>
												<div class="tooltip">Log-out</div>											
											</li>
										</ul>>-->
									</a>
								</td>
							</tr>
						</table>
					</center>
					<br/>
					<center>
						<div class='main_div'>
							<center><table>
								<tr>
									<td style='width:20%;'>
										<label style='font-size:20px;'>Search Course Name</label>
									</td>
									<td style='width:20%;'>
										<input type="text" class='inputs' id='text_name' name="text_name" required placeholder='jee,neet,gujcet etc.'/>
									</td>
									<td style='width:20%;'>
										<input type="image" id='search_course' src="images/Search.png" alt="Submit Form" width='30%'/>
									</td>
								</tr>
							</table></center>
						</div>
					</center>
					<br/>
					<center>
						<div id='search_course_by_name'>
							
						</div>
					</center>
					</div>
				</div>
			</div>
		<div id="reg_batch_dis">
			<div class="err" id="add_err"></div>
			<form action="" style="width:530px;height:300px">
				<table style="background-color:#0174DF;border:2px solid;width:530px;height:50px">
					<tr>
						<td>
							<center><strong><label style="color:white">Courses Batch registered</label></strong></center>
						</td>
					</tr>
				</table>
				<div id='registered_dt' style="background-color:#0174DF;border:2px solid;width:530px;height:250px">
					<br/><br/><br/>
					<div>Course Name   :  <label id='cr_nm'/></div><br/><br/><br/>
					<div>Selecte Batch :  <select id="course_batch" name="course_batch" style="background-color:white;width:400px;"></select></div>
					<br/><br/><br/>
					<center><input type='BUTTON' id='submit' name='submit' value='SUBMIT'/></center>
				</div>
			</form>
		</div>
		<?php
			include 'conn_close.php';
		?>
	</body>
</html>