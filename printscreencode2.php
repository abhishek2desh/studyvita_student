<html><head>
<script language="JavaScript"><!--
function clp_clear() {
   var content=window.clipboardData.getData("Text");
   if (content==null) {
      window.clipboardData.clearData();}
   setTimeout("clp_clear();",1000);}
--></script></head>
<body onload='clp_clear()'>
<center><font color=darkgreen><font size=3><p>
...Press the [PrintScreen] or the [Alt+PrintScreen] key and try to paste the content in your favorite Picture Editor (Paint,...)...<br>
...Select text and try to paste the content in your favorite Text Editor (Notepad,...)...<p><font color=black><font size=2>
This small script clears the clipboard at runtime and disables screen capture process...but does not disable text selection..</center>
<hr>Free JavaScript provided by ©2004-VB'Breizh
</body></html>
