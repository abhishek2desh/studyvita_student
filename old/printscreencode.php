<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
    <link href="Styles/style-main.css" rel="stylesheet" type="text/css" />
    <link href="Styles/style-page.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="Scripts/acp_validation.js"></script>
     <asp:ContentPlaceHolder ID="HeadContent" runat="server">
    </asp:ContentPlaceHolder>
   
   <script language="javascript" type="text/javascript">
   ///for print-screen restrict/////
       function AccessClipboardData() {
           try {
               window.clipboardData.setData('text', "No print data");
           } catch (err) {
               txt = "There was an error on this page.\n\n";
               txt += "Error description: " + err.description + "\n\n";
               txt += "Click OK to continue.\n\n";
               alert(txt);
           }
       }
       ///for setinterval/////
       setInterval("AccessClipboardData()", 300);
			var ClipBoardText = "";
			 if (window.clipboardData) {
				 ClipBoardText = window.clipboardData.getData('text');
             if (ClipBoardText != "No print data") {
               alert('Sorry you have to allow the page to access clipboard');
				// hide the div which contains your data
				document.all("MainContent").style.display = "none"
             }

             ///for keyboard key restrict/////
             document.onkeydown = function(ev) {
  var a;
   ev = window.event;
   if (typeof ev == "undefined") {
     alert("PLEASE DON'T USE KEYBORD");
          }
       a = ev.keyCode;
        alert("PLEASE DON'T USE KEYBORD");
              return false;
         }
       document.onkeyup = function(ev) {
           var charCode;
        if (typeof ev == "undefined") {
         ev = window.event;
         alert("PLEASE DON'T USE KEYBORD");
           } else {
          alert("PLEASE DON'T USE KEYBORD");
           }
         return false;
       }
</script>
<style type="text/css" media="print">
.noprint {
display: none;
}
</style>

</head>
<body style="width:100%; background-color:#EEEEEE;" oncontextmenu="return false;" class="noprint">
<form id="Form1" runat="server">
<asp:ScriptManager ID="ScriptManager1" runat="server">
</asp:ScriptManager>
  
<div id="main">
           <asp:ContentPlaceHolder ID="MainContent" runat="server" />
<div id="footer">
<br />
<img src="images/footer.png" width="165" height="62" alt="Footer" />
<br />
</div>
</form>
</body>
</html>