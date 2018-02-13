<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edutech Viewer - Register</title>
<meta name="description" content="" />
<script src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#search1").click(function(){
			$("#image_hide").show();
			var sid="";
			sid=$("#search_sid").val();
			//alert(sid);
			filename = "mail_send.php?sid="+sid;
			//alert(filename);
			$.ajax({
				url: filename,
				type: 'GET',
				dataType: 'html',					
				success: function(data, textStatus, xhr) {
					alert(data);
					$("#image_hide").hide();
					$("#msg").html(data);
					$("#search_sid").val('');
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
		$("#image_hide").hide();
	});
</script>
<style> 
.css3button {
font-family: Arial, Helvetica, sans-serif;
font-size: 14px;
color: #000000;
padding: 8px 20px;
background: -moz-linear-gradient(
	top,
	#baa6ba 0%,
	#baa6ba);
background: -webkit-gradient(
	linear, left top, left bottom,
	from(#baa6ba),
	to(#baa6ba));
-moz-border-radius: 10px;
-webkit-border-radius: 10px;
border-radius: 10px;
border: 1px solid #1a141a;
-moz-box-shadow:
	0px 1px 3px rgba(000,000,000,0.5),
	inset 0px 0px 5px rgba(031,030,025,0.6);
-webkit-box-shadow:
	0px 1px 3px rgba(000,000,000,0.5),
	inset 0px 0px 5px rgba(031,030,025,0.6);
box-shadow:
	0px 1px 3px rgba(000,000,000,0.5),
	inset 0px 0px 5px rgba(031,030,025,0.6);
text-shadow:
	0px -1px 3px rgba(255,255,255,0.8),
	0px 1px 0px rgba(255,255,255,0.3);
}
 .inputs  {
background: #D3D3D3; 
background: -moz-linear-gradient(top, #D3D3D3 0%, #D9D9D9 38%, #E5E5E5 82%, #E7E7E7 100%); 
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#D3D3D3), color-stop(38%,#D9D9D9), color-stop(82%,#E5E5E5), color-stop(100%,#E7E7E7)); 
background: -webkit-linear-gradient(top, #D3D3D3 0%,#D9D9D9 38%,#E5E5E5 82%,#E7E7E7 100%); 
background: -o-linear-gradient(top, #D3D3D3 0%,#D9D9D9 38%,#E5E5E5 82%,#E7E7E7 100%); 
background: -ms-linear-gradient(top, #D3D3D3 0%,#D9D9D9 38%,#E5E5E5 82%,#E7E7E7 100%); 
background: linear-gradient(to bottom, #D3D3D3 0%,#D9D9D9 38%,#E5E5E5 82%,#E7E7E7 100%); 
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#d3d3d3', endColorstr='#e7e7e7',GradientType=0 ); 
display: block; 
padding: 12px 10px; 
color: #999; 
font-size: 1.2em; 
font-weight: bold; 
text-shadow: 1px 1px 1px #FFF; 
border: 1px solid rgba(16, 103, 133, 0.6); 
box-shadow: 0px 0px 3px rgba(255, 255, 255, 0.5), inset 0px 1px 4px rgba(0, 0, 0, 0.2); 
border-radius: 3px; 
 outline:0; 
width:250px; 
} 
</style> 
</head>
<body>
	<center>
	<br/><br/><br/>
	<div style='background-color: #c4f0f1;width:400px;height:300px;border-radius: 5px; border: 3px solid #BADA55;'>
		<table style="background-color:#0174DF;border:1px solid;width:400px;">
			<tr>
				<td>
					<label style="color:white;">Click here for <a href="login.php">Login</a></label>
				</td>
			</tr>
		</table>
		<table style="background-color:#0174DF;border:1px solid;width:400px;">
			<tr>
				<td>
					<h3>Forgot your <strong>Password</strong> ?</h3>
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" name="search_id" id="search_sid" class="inputs" placeholder="Enter your student Id"/>
					<br/>
					<input type="submit" id="search1" name="submit-form" class="css3button"/>
				</td>
			</tr>
			<br/>
			<tr>
				<td>
					<b><div id="msg" style='color:white'></div></b></center>
					<center><img id="image_hide" src='loading/loading_bar.gif' height="50" width="350"/></center>
				</td>
			</tr>
		</table>
	</div>
</body>
</html>