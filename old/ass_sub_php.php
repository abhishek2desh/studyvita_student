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
	
	$today = date("Y-m-d", strtotime('today'));
	$_SESSION['today'] = $today;
?>
<!doctype html>
<html>
	<head>
		<title>Welcome <?php echo $u5 ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="keywords" content="jquery,ui,easy,easyui,web">
		<link rel="shortcut icon" href="images/Edutechheader.ico" />
		<meta name="description" content="easyui help you build your web page easily!">
		<link href="menu.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="easyui/easyui.css">
		<link rel="stylesheet" type="text/css" href="easyui/icon.css">
		<link rel="stylesheet" href="css/bg.css" />  
		<link rel="stylesheet" href="css/demo.css" />
		<!--<link rel="stylesheet" type="text/css" href="easyui/demo.css">-->
		<script type="text/javascript" src="easyui/jquery-1.6.min.js"></script>
		<script type="text/javascript" src="easyui/jquery.easyui.min.js"></script>
		<style type="text/css">
		html, body	{ height:100%;width:100%; }
			body { margin:0; overflow:auto; }
		</style>
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
			function doSearch(){  
				$('#dg3').datagrid('load',{  
					subid: $('#subid').val()
				});  
			}
		</script>
		
	</head>
	<body>
		<?php require 'header4.php'; ?>
		<br/>
		<table style="padding-top:0px;border:solid 0px;width:100%;height:25px;">
			<tr>
				<td style="background-color:#3366FF;border:solid 0px;">
					<label style="color:white"><b>Assignment</b></label>
				</td>
			</tr>
		</table>
		<br/>
		<table>
			<tr>
				<td>
					<table>	
						<tr>
							<td id="forthcoming">
								<table id="dg1" title="Forthcoming Assignment Submission" class="easyui-datagrid" style="width:680px;height:300px"
									url="query/forthcoming_assignment.php"
									toolbar="#toolbar1" pagination="true"
									rownumbers="true" fitColumns="true" singleSelect="true">
									<thead>
										<tr>
											<th field="subject" width="18">Subject</th>
											<th field="assignment" width="68">Assignment</th>
											<th field="no_of_que" width="20">No of Que.</th>
											<th field="submission" width="36">Date of Submission</th>
											<th field="type" width="55">Type</th>
										</tr>
									</thead>
								</table>
							</td>
							
							<!--<td id="pending" style="padding-left:20px;">
								<table id="dg2" title="Pending Assignment Submission" class="easyui-datagrid" style="width:650px;height:300px"
									url="query/pending_assignemnt.php"
									toolbar="#toolbar2" pagination="true"
									rownumbers="true" fitColumns="true" singleSelect="true">
									<thead>
										<tr>
											<th field="subject" width="18">Subject</th>
											<th field="assignment" width="70">Assignment</th>
											<th field="no_of_que" width="20">No of Que.</th>
											<th field="submission" width="35">Date of Submission</th>
											<th field="difff" width="25">You are late by</th>
										</tr>
									</thead>
								</table>
							</td>-->
						</tr>
					</table>
				</td>
			</tr>
			<!--
			<tr>
				<td>
					<table id="dg3" title="History of Assignment Submission" class="easyui-datagrid" style="width:900px;height:350px"
						url="query/history_assignment.php"
						toolbar="#toolbar3" pagination="true"
						rownumbers="true" fitColumns="true" singleSelect="true">
						<thead>
							<tr>
								<th field="subject" width="25">Subject</th>
								<th field="assignment" width="70">Assignment</th>
								<th field="no_of_que" width="22">No of Que.</th>
								<th field="due_date" width="25">Due Date</th>
								<th field="submission" width="28">Date of Submission</th>
								<th field="status" width="35">Status</th>
							</tr>
						</thead>
					</table>
					<div id="toolbar3">
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<!--	<input id="sub" class="easyui-searchbox" style="width:300px" data-options="prompt:'Please Input Value',menu:'#mm',searcher:doSearch"></input>
						<div id="mm" style="width:50px">  
							<div data-options="name:'subject' ,iconCls:'icon-ok'">Subject</div>
						<div data-options="name:'type' ,iconCls:'icon-ok'">Course Type</div>
							<div data-options="name:'standard' ,iconCls:'icon-ok'">Standard</div>
						</div>
						//here comment
						<span style="color:green;"><b>Enter Subject Name:</b></span>  
						<input id="subid" style="width:200px;line-height:26px;border:1px solid #ccc;" data-options="prompt:'Please Input Value'" />
						<a href="#" class="easyui-linkbutton" plain="true" onclick="doSearch()">
							<img src="search-icon.png"/>
						</a>
						
					</div>
				</td>
			</tr>-->
		</table>
		<?php
			include 'conn_close.php';
		?>
	</body>
</html>