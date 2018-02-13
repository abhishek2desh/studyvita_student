<?php
	require_once 'includes/global.inc.php';
	include_once 'config.php';
	$user=$_SESSION['username'];
	$s1=$_SESSION['studid1'];
	$s2=$_SESSION['stnd1'];
	$s3=$_SESSION['grp1'];	
	$s4=$_SESSION['btch1'];
	$s5=$_SESSION['sid'];
	$u5 = $_SESSION['uname'];
?>
<!doctype html>
<html>
	<head>
		<title>Welcome <?php echo $u5 ?></title>
		<link rel="shortcut icon" href="http://targetstudy.com/files/img/17/6957/L_17974.gif" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<style>
		</style>
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
		<link rel="stylesheet" href="/resources/demos/style.css" />
		
		<script>
		$(function() {
		$( "#datepicker1,#datepicker2" ).datepicker({
					dateFormat: "yy-mm-dd"});
		});
		</script>
		</head>
	<body>
		<?php require 'header3.php'; ?>
		<div>
			<h3><b>
			Welcome <?php echo "Parent"; ?> !
			</b></h3>
		</div>
		<form id="form1" method="post" action=""> 
		<table>
			<tr>
				<td>
					<table style="height:100px">
						
						<tr >
							<td style="padding-top:10px;padding-bottom:10px"><b>From Date </b></td>
							<td style="padding-top:10px;padding-bottom:10px">
								<input type="text" name="datepicker1" id="datepicker1" />
							</td>
							
						</tr>
						
						<tr>
							<td style="padding-top:10px;padding-bottom:20px" ><b>To date</b></td>
							<td style="padding-top:10px;padding-bottom:20px" >
								<input type="text" name="datepicker2" id="datepicker2" />
							</td>
						</tr>
						
						<tr>
							<td style="padding-bottom:20px;"><b>Select Subject</b></td>
							<td style="padding-bottom:20px;">
								<select name="subj" size="1" id="sub1" style="width: 150px; color:#777777" >
									<?php
										$result=mysql_query("SELECT id,name FROM detail WHERE id IN
										(SELECT sub_id FROM group_subject_mapping WHERE group_id=".$s3.")
										GROUP BY id DESC");
										while($row=mysql_fetch_array($result))
										{
											echo "<option value=$row[0]>$row[1]</option>";
										}
									?>
								</select>
							</td>
						</tr>
						
						<tr>
							<td style="padding-bottom:20px;"><b>Select Paper Type</b></td>
							<td style="padding-bottom:20px;">
								<select name="paper" size="1" id="sub1" style="width: 150px; color:#777777" >
									<option value="0">Subjective</option>
									<option value="1">Objective</option>
									<option value="2" selected >All</option>
								</select>
							</td>
						</tr>
						
					</table>
				</td>
			</tr>
			<tr>
				<td style="padding-top:30px;padding-bottom:15px;">
					<input type="submit" style="background-color:blue;color:white;font-size:22px" name="submit" id="submit" value="Submit">
				</td>
			</tr>
		</table>
		</form>
		<?php
			if(isset($_POST['submit']))
			{	
				$date1 = $_POST['datepicker1'];
				$date2 = $_POST['datepicker2'];
				$subject = $_POST['subj'];
				$type = $_POST['paper'];
				
				if($date1 > $date2 || $date1 == "" || $date2 == "" )
				{
					echo "Please Select From date To date properly.";
				}
				else
				{
				
					$_SESSION['dt1']=$date1;
					$_SESSION['dt2']=$date2;
					$_SESSION['sub']=$subject;
					$_SESSION['type']=$type;
					
					header("Location: score_details2.php");
				
				}
			}
			include 'conn_close.php';
		?>
	</body>
</html>