<?php
	include_once 'config.php';
	session_start();
	//include('lock.php');
	$today = date("Y-m-d", strtotime('today'));
	$today2 = date("l, d F, Y", strtotime('today'));
	$_SESSION['today_dt_session'] = $today;
/*$user=$_SESSION['username'];
	$s1=$_SESSION['studid1'];
	$s2=$_SESSION['stnd1'];
	$s3=$_SESSION['grp1'];	
	$s4=$_SESSION['btch1'];*/
	$s5=$_SESSION['sid'];
	$u5 = $_SESSION['uname'];
	/*$board1 = $_SESSION['board'];
	$branch = $_SESSION['branch'];*/
	
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
		<script type="text/javascript" src="js/flowplayer-3.2.12.min.js">
			</script>
		<script language="javascript" type="text/javascript" src="js/jquery.flot.js"></script>
		<script language="javascript" type="text/javascript" src="js/jquery.flot.threshold.js"></script>
		<link href="menu.css" rel="stylesheet" type="text/css" />
		<!-- five star -->
		<script type="text/javascript" src="lib/jquery.raty.min.js"></script>
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
			$(document).ready(function(){
					var uid='<?php echo $s5; ?>';
					$("#wowza").hide();
					filename = "video_link.php?uid="+uid;
					//alert(filename);
					getContent(filename, "video_link");
					$("#view_video").live('click',function(){
						//alert("hai");
						var bal=($(this).closest('tr').attr('id'));
						//alert("sanjya : "+bal);
						var mySplitResult = bal.split(",");
						sb=mySplitResult[0];
						cp=mySplitResult[1];
						topic=mySplitResult[2];
						tp_nm=mySplitResult[3];
						//alert(sb+cp+topic+tp_nm);
						$("#wowza").show();
							var path = 'http://www.globaleduserver.com/';
							//var url = 'rtmp://64.187.229.174/securestreaming/C12_CBSE_CHE_Ch06_Haloalkanes_PreparationMethod_SURESH.mp4';
							var url = 'rtmp://64.187.229.174/securestreaming/'+topic;
							var baseserverurl = 'rtmp://64.187.229.174:1935/securestreaming/';
							var str = url.split('/');
							var baseurl = 'rtmpe://';
							
							for (var i = 0; i < str.length - 3; i++) {
								baseurl = baseurl + str[i + 2] + '/';
							}
							
							//this will install flowplayer inside previous A- tag.
							flowplayer("wowza", "http://releases.flowplayer.org/swf/flowplayer-3.2.14.swf", {
						 
							clip: {
								// use RTMP streaming
								url: str[str.length - 1],
								provider: 'rtmp',
								
								// with a secured connection
								connectionProvider: 'secure'
							},
						 
							plugins: {
						 
								// set up the RTMP streaming plugin
								rtmp: {
									url: "http://releases.flowplayer.org/swf/flowplayer.rtmp-3.2.11.swf",
						 
									// The net connection URL with HDDN looks like this
									netConnectionUrl: baseserverurl
								},
						 
								// set up the secure streaming plugin
								secure: {
									url: "http://releases.flowplayer.org/swf/flowplayer.securestreaming-3.2.8.swf",
						 
									// the token value (shared secret).
									// needs to be escaped because our token has a percent sign in it
									token: escape('#ed%h0#w@123')
								}
							}
						});
						/*sname=mySplitResult[2];
						sub_ject=mySplitResult[3];
						//alert(tt_id+stid+sname+sub_ject);
						if(sub_ject=="Biology"){ sbjt12='14';}
						else if(sub_ject=="Maths"){ sbjt12='15';}
						else if(sub_ject=="Physics"){ sbjt12='16';}
						else if(sub_ject=="Chemistry"){ sbjt12='17';}
						else if(sub_ject=="Science"){ sbjt12='18';}
						else if(sub_ject=="English"){ sbjt12='19';}
						else if(sub_ject=="Mock"){ sbjt12='20';}
						else if(sub_ject=="SocialScience"){ sbjt12='22';}
						//alert(sbjt12);
						doc_id=stid+sname+tt_id;*/
						//alert(doc_id);
					});
					/*$('#videos').click(function(){
						video=$("#videos").val();
						//alert(video);
						$("#wowza").show();
						var path = 'http://www.globaleduserver.com/';
						//var url = 'rtmp://64.187.229.174/securestreaming/C12_CBSE_CHE_Ch06_Haloalkanes_PreparationMethod_SURESH.mp4';
						var url = 'rtmp://64.187.229.174/securestreaming/'+video;
						var baseserverurl = 'rtmp://64.187.229.174:1935/securestreaming/';
						var str = url.split('/');
						var baseurl = 'rtmpe://';
						
						for (var i = 0; i < str.length - 3; i++) {
							baseurl = baseurl + str[i + 2] + '/';
						}
						
						//this will install flowplayer inside previous A- tag.
						flowplayer("wowza", "http://releases.flowplayer.org/swf/flowplayer-3.2.14.swf", {
					 
						clip: {
							// use RTMP streaming
							url: str[str.length - 1],
							provider: 'rtmp',
							
							// with a secured connection
							connectionProvider: 'secure'
						},
					 
						plugins: {
					 
							// set up the RTMP streaming plugin
							rtmp: {
								url: "http://releases.flowplayer.org/swf/flowplayer.rtmp-3.2.11.swf",
					 
								// The net connection URL with HDDN looks like this
								netConnectionUrl: baseserverurl
							},
					 
							// set up the secure streaming plugin
							secure: {
								url: "http://releases.flowplayer.org/swf/flowplayer.securestreaming-3.2.8.swf",
					 
								// the token value (shared secret).
								// needs to be escaped because our token has a percent sign in it
								token: escape('#ed%h0#w@123')
							}
						}
					});
					});*/
					
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
	<body>
		<?php require 'header4.php'; 	
		?>
		<br/>
		<table style="padding-top:0px;border:solid 0px;width:100%;height:25px;">
			<tr>
				<td style="background-color:#3366FF;border:solid 0px;">
					<label style="color:white"><b>Video On Demand</b></label>
				</td>
			</tr>
		</table>
		<br/>
		<table style='width:100%;height:600px;'>
			<tr>
				<td valign='top' style='width:60%;height:600px;'>
					<div style="background-color:#3366FF;border:solid 0px;width:100%;height:25px;">
						<table style="background-color:#3366FF;border:solid 0px;width:98%;height:25px;">
							<tr>
								<td style="width:10%;background-color:#3366FF;border:solid 1px;height:20px;"><center><label style="color:white"><b>Subject</b></label></center></td>
								<td style="width:25%;background-color:#3366FF;border:solid 1px;height:20px;"><center><label style="color:white"><b>Chapter</b></label></center></td>
								<td style="width:30%;background-color:#3366FF;border:solid 1px;height:20px;"><center><label style="color:white"><b>Topic</b></label></center></td>
								<td style="width:20%;background-color:#3366FF;border:solid 1px;height:20px;"><center><label style="color:white"><b>Active Date</b></label></center></td>
								<td style="width:15%;background-color:#3366FF;border:solid 1px;height:20px;"><center><label style="color:white"><b>Click </b></label></center></td>
							</tr>
						</table>
					</div>
					<div id='video_link' style="border:solid 1px;width:100%;height:370px;overflow-y: scroll;">
					</div>
				</td>
				<td valign='top' style='width:40%;height:600px;'>
					<center>
						<a href="" style="border:solid 3px;display: block; width: 619px; height: 394px;" id="wowza"></a>
					</center>
				</td>
			</tr>
		</table>
		
	</body>
</html>