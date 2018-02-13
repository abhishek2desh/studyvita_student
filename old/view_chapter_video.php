<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>		
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="shortcut icon" href="images/Edutechheader.ico" />
		<meta name="keywords" content="edutechindiaonline">
		<meta name="description" content="edutechindiaonline">
		<title>Welcome <?php echo $u5 ?></title>
		<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="js/flowplayer-3.2.12.min.js"></script>
		<style>
			.main_div2 { 
			height: auto;
			width: auto; 
			background-color: white; 
			/* outer shadows  (note the rgba is red, green, blue, alpha) */
			-webkit-box-shadow: 0px 0px 12px rgba(0, 0, 0, 0.4); 
			-moz-box-shadow: 0px 1px 6px rgba(23, 69, 88, .5);
			/* rounded corners */
			-webkit-border-radius: 12px;
			-moz-border-radius: 7px; 
			border-radius: 7px;
			/* gradients */
			background: -webkit-gradient(linear, left top, left bottom, 
			color-stop(0%, white), color-stop(15%, white), color-stop(100%, #D7E9F5)); 
			background: -moz-linear-gradient(top, white 0%, white 55%, #D5E4F3 130%); 
			}
			 #footer {
				position: fixed;
				bottom: 0;
				width: 100%;
			}
		</style>
		<script type="text/javascript">
			$(document).ready(function(){
			
					var batch_id='<?php echo $batch_id; ?>';
					var subject_id='<?php echo $subject_id; ?>';
					$("#wowza").hide();
					filename = "test_paper_generator/chapter_video.php?subject_id="+subject_id+"&batch_id="+batch_id;
					//alert(filename);
					getContent(filename, "chapter");
					$('#chapter').click(function(){
						$("#videos").empty();
						$("#wowza").hide();
						chapter_video=$("#chapter").val();
						filename = "test_paper_generator/video.php?batch_id="+batch_id+"&chapter_video="+chapter_video+"&subject_id="+subject_id;
						//alert(filename);
						getContent(filename, "videos");
					});
					$('#videos').click(function(){
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
						flowplayer("wowza", "http://releases.flowplayer.org/swf/flowplayer-3.2.18.swf", {
					 
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
								url: "http://releases.flowplayer.org/swf/flowplayer.rtmp-3.2.13.swf",
					 
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
<body>
	<div style='background-color:#EDF5FA;width:100%'>
		<div style='background-color:#EDF5FA;width:100%;height:auto;'>
			<table style="padding-top:0px;border:solid 0px;width:100%;height:25px;">
				<tr>
					<td style="background-color:#3366FF;border:solid 0px;">
						<label style="float:left;color:white"><b>Video Lectures</b></label>
					</td>
				</tr>
			</table>
			<br/>
			<center><table class='main_div2'>
				<tr>
					<td>
						Chapter List
					</td>
					<td>
						Topic  List
					</td>
				</tr>
				<tr>
					<td>
						<select id='chapter' size='4' style='width:300px;' name='chapter' ></select>
					</td>
					<td>
						<select id='videos' size='4' style='width:500px;' name='videos' ></select>
					</td>
				</tr>
			</table></center>
			<center>
				<div class='main_div2'><a href="" style="border:solid 3px;display: block; width: 619px; height: 394px;" id="wowza"></a></div>
			</center>
		</div>
		<br/>
		<div id="footer" style="background-color:#0174DF;">
			<center><div style="padding-left:5px;padding-top:5px;font-size:12px;color:black;text-transform: capitalize;"><label style="border:solid 0px;color:white;">Copyright &copy Edutech Educational Services Pvt. Ltd. Ahmedabad, Gujarat, India</label>
			</div></center>
		</div>
	</div>
	
</body>
</html>