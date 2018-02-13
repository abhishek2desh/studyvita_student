<?php
include("config.php");
//include('lock.php');
session_start();
//$result=mysql_query("SELECT room_id FROM `white_board_room_detail` WHERE user_id='$login_session_id'");
	//$row=mysql_fetch_array($result);
	$roomid=$_GET['id'];
	$u5 = $_SESSION['uname'];
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Interactive Whiteboard</title>
<LINK href="//s3.amazonaws.com/media.muchosmedia.com/scribblar/styles/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="//s3.amazonaws.com/media.muchosmedia.com/scribblar/scripts/includes.js"></script>
<script type="text/javascript">

var roomid=	"<?php echo $roomid; ?>";
//alert(roomid);
var targetID = "scribblar";
var flashvars = {};
/* pass necessary variables to the SWF */
flashvars.userid = "0";											/* to allow an anonymous guest pass 0 */
flashvars.roomid = roomid;									/* the roomid for the room you'd like to access - substitute this for a valid roomid */
flashvars.preferredLocales = "en_US";								/* sets the language - if in doubt leave as en_US */
/* optional: if you pass userid=0 you may also pass a username to skip the username prompt and log the 
user in using that username */
flashvars.username = "<?php echo $u5; ?>";	
var params = {};
params.allowscriptaccess = "always";
var attributes = {};
attributes.id = "scribblar";
attributes.name = "scribblar";
  swfobject.embedSWF("//s3.amazonaws.com/media.muchosmedia.com/scribblar/v4/main.swf", "alternate", "100%", "100%", "11.1.0", "//s3.amazonaws.com/media.muchosmedia.com/swfobject/expressInstall.swf", flashvars, params, attributes);
</script>
</head>
<body scroll="no">
<div id="alternate">
<a href="//www.adobe.com/go/getflashplayer">This page requires the latest version of Adobe Flash. Please download it now.<br>
<img src="//s3.amazonaws.com/media.muchosmedia.com/scribblar/assets/get_flash_player.gif" border="0" alt="Get Adobe Flash Player" />
</a>
</div>
</body>
</html>
    