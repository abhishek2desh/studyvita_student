<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
	require_once 'includes/global.inc.php';
	include_once 'config.php';
	$user=$_SESSION['username'];
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="keywords" content="jquery,ui,easy,easyui,web">
		<link rel="shortcut icon" href="images/Edutechheader.ico" />
		<meta name="description" content="easyui help you build your web page easily!">
		<title>Welcome <?php echo $user ?></title>
		<link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/themes/default/easyui.css">
		<link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/themes/icon.css">
		<!--<link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/demo/demo.css">
		--><link href="menu.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="css/bg.css" />  
		<link rel="stylesheet" href="css/demo.css" />
		<style type="text/css">
		html, body	{ height:100%;width:100%; }
			body { margin:0; overflow:auto; }
		.classname {
			#fm{
				margin:0;
				padding:00px 00px;
			}
			.ftitle{
				font-size:14px;
				font-weight:bold;
				color:#666;
				padding:5px 0;
				margin-bottom:10px;
				border-bottom:1px solid #ccc;
			}
			.fitem{
				margin-bottom:5px;
			}
			.fitem label{
				display:inline-block;
				width:80px;
			}
		</style>
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.min.js"></script>
		<script type="text/javascript" src="http://www.jeasyui.com/easyui/jquery.easyui.min.js"></script>
		<script type="text/javascript">
			function myformatter(date){  
				var y = date.getFullYear();  
				var m = date.getMonth()+1;  
				var d = date.getDate();  
				return y+'-'+(m<10?('0'+m):m)+'-'+(d<10?('0'+d):d);  
			}  
			function myparser(s){  
				if (!s) return new Date();  
				var sss = s.split('-');  
				var y = parseInt(ss[0],10);  
				var m = parseInt(ss[1],10);  
				var d = parseInt(ss[2],10);  
				if (!isNaN(y) && !isNaN(m) && !isNaN(d)){  
					return new Date(y,m-1,d);  
				} else {  
					return new Date();  
				}  
			}  
		</script>
	</head>
	<body>
	<?php require 'header4.php'; ?>
	<div style="border:solid 0px;color:black;width:100%;">
			<table>
				</tr>
				<tr><td>
					<table style="padding-top:0px;border:solid 0px;width:100%;height:25px;">
						<tr>
							<td style="background-color:#3366FF;border:solid 0px;">
								<label style="color:white"><b>Time Table</b></label>
							</td>
						</tr>
					</table></td>
				</tr>
				<tr>
					<td style='float:left;'>
						<div style="border:solid 1px;width:1350px;height:515px;">
						<table>	
							<tr>
								<td>
									<table id="dg1" title="Time Table" class="easyui-datagrid" style="width:600px;height:500px"
										url="viewtt_getusers.php"
										toolbar="#toolbar1" pagination="true"
										rownumbers="true" fitColumns="true" singleSelect="true">
										<thead>
											<tr>
												<th field="Weekday" width="30">Week Day</th>
												<th field="Time1" width="50">Time</th>
												<th field="Subject" width="30">Subject</th>
												<th field="Test" width="30">Test</th>
											</tr>
										</thead>
									</table>
									<div id="dlg1" class="easyui-dialog" style="width:450px;height:400px;padding-left:60px;"
											closed="true" buttons="#dlg-buttons">
										<div class="ftitle">Course Information</div>
										<form id="fm1" method="post" novalidate>
											<table>	
												<tr>
													<div class="fitem">
														<td>	<label>Week Day</label>	</td>
														<td>	<input name="Weekday" class="easyui-validatebox" required="true">	</td>
													</div>
												</tr>
												<tr>
													<div class="fitem">
														<td>	<label>Time</label>	</td>
														<td>	<input name="Time1" class="easyui-validatebox" required="true">	</td>
													</div>
												</tr>
												<tr>
													<div class="fitem">
														<td>	<label>Subject</label>	</td>
														<td>	<select name="subject" id="sb1" style="width:150px">
																</select>  	</td>
													</div>
												</tr>
												<tr>
													<div class="fitem">
														<td>	<label>Test</label>	</td>
														<td>	<select name="Test" id="br1" style="width:150px">
																</select>  	</td>
													</div>
												</tr>
											</table>
										</form>
									</div>
									<div id="dlg-buttons">
										<a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveUser1()">Save</a>
										<a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg1').dialog('close')">Cancel</a>
									</div>
								</td>
							</tr>
							</table>
						</div>
					</td>
				</tr>
				<tr>
					<td style='float:left;'>
						
					</td>
				</tr>
			</table>
		</div>
		<?php
			include 'conn_close.php';
		?>
	</body>
	
</html>