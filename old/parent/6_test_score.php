<?php
	
	include '../config.php';
	session_start();
	$user=$_SESSION['username'];
	$s1=$_SESSION['studid1'];
	$s2=$_SESSION['stnd1'];
	$s3=$_SESSION['grp1'];	
	$s4=$_SESSION['btch1'];
	$s5=$_SESSION['sid'];
	$u5 = $_SESSION['uname'];
	$board1 = $_SESSION['board'];
	$branch = $_SESSION['branch'];
?>
<!doctype html>
<html>
	<head>
		<title>Welcome <?php echo $user ?></title>
		<link rel="shortcut icon" href="http://targetstudy.com/files/img/17/6957/L_17974.gif" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<style>
		</style>
		
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
		<link rel="stylesheet" href="/resources/demos/style.css" />
		
		<script>
		$(document).ready(function(){
			$( "#datepicker1,#datepicker2" ).datepicker({
							dateFormat: "yy-mm-dd"
							
			});
			$('#submit').click(function()
			{
				filename="prac.php";
				getInsert(filename);
			});
			function getInsert(filename){
				$.ajax({
					url: filename,
					type: 'GET',
					dataType: 'html',
					
					success: function(data, textStatus, xhr) {
						//alert(data);
					},
				});									
			}
		});
		</script>
		</head>
	<body>
		<form id="form1" method="post" action=""> 
		<table width="100%;">
			<tr>
				<td>
					<table style="height:100px;">
						
						<tr>
							<td style="padding-top:10px;padding-bottom:10px;"><b>From Date </b></td>
							<td style="padding-top:10px;padding-bottom:10px;">
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
			include_once '../conn_close.php';
		?>
	</body>
</html>