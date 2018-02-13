<html>
	<title>
		Welcome to global eduserver
	</title>
	<head>
	<script language="javascript" type="text/javascript" src="js/jquery.min.js"></script>
	
	<style>
		.button_css{
		border-color:#8E6AF5;border-width: 1px 1px 1px 15px;border-style: solid; -webkit-border-radius: 3px; -moz-border-radius: 3px;border-radius: 3px;font-size:17px;font-family:arial, helvetica, sans-serif; padding: 3px 3px 3px 3px; text-decoration:none; display:inline-block;text-shadow: -1px -1px 0 rgba(0,0,0,0.3);font-weight:bold; color: #FFFFFF;
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
	</style>
	<script> 
	
		$(document).ready(function(){
		
			function Redirect()
			{
				window.location="login.php";
			}
			$('#clicktocontinue').click(function() {
			
				//alert("alert");
				Redirect();
				
			});	
		});
		
	</script> 
	</head>
	<body>
		<table>
			<tr>
				<td style="padding-top:20px;padding-left:180px;"><font size="5" color="BLUE" face="Arial Black">Welcome to</font> </td>
			</tr>
			<tr>
				<td style="padding-top:15px;padding-left:240px;"><font size="15" color="BLUE" face="Arial Black">Global Eduserver</font> </td>
			</tr>
			<tr>
				<td style="padding-top:20px;padding-left:140px;"><img src="images/hp.jpg" width="80%"></img></td>
			</tr>
			<tr>
				<td style="padding-top:40px;padding-left:440px;"><input type="BUTTON" id="clicktocontinue" name="clicktocontinue" class="defaultbutton" value="Click to continue" /></td>
			</tr>
			<tr>
				<td style="padding-top:40px;padding-left:380px;">An initiative of Edutech Educational Services Pvt Ltd</td>
			</tr>
		</table>
	</body>
</html>