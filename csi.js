<!-- hide JavaScript from non-JavaScript browsers

	//  Copysafe Web - Version 4.7.2.0
	//  Copyright (c) 1998-2013 ArtistScope. All Rights Reserved.
	//  www.artistscope.com
	//
	// The Copysafe Web plugin is supported across Windows XP, 2003, Vista, 7 and 8

// Debugging outputs the generated html into a textbox instead of rendering

	var m_bpDebugging = false;
//	var m_bpDebugging = true;

// REDIRECTS

var m_szLocation = document.location.href.replace(/&/g,'%26');	

var m_szDownloadNo = "/plugins/download_no.html";
var m_szDownloadNoFx4 = "/plugins/download_no_fx4.html";
var m_szDownloadIE = "/plugins/download_ie.html?ref=" + m_szLocation;
var m_szDownloadFX = "/plugins/download_fx.html?ref=" + m_szLocation;
var m_szJavaNo = "/plugins/help_java.html";

//var m_szDownloadNo = "/plugins/download_no.asp";
//var m_szDownloadNoFx4 = "/plugins/download_no_fx4.asp";
//var m_szDownloadIE = "/plugins/download_ie.asp?ref=" + m_szLocation;
//var m_szDownloadFX = "/plugins/download_fx.asp?ref=" + m_szLocation;
//var m_szJavaNo = "/plugins/help_java.asp";	

//document.write(m_szLocation);
	
// DEFAULT SETTINGS

var m_szImageFolder = "/plugins/";		//  "/plugins/" path from root with / on both ends

var m_bpKeySafe = true;
var m_bpCaptureSafe = true;
var m_bpMenuSafe = true;
var m_bpRemoteSafe = true;
var m_bpWindowsOnly = true;	
var m_bpProtectionLayer = false;		//this page does not use layer control

var m_bpChrome = true;
var m_bpFlock = false;			// browser discontinued
var m_bpFx3 = true;	
var m_bpFx5 = true;			// all firefox browser from version 5 and later
var m_bpKmeleon = true;
var m_bpNav = true;			// browser discontinued
var m_bpOpera = true;
var m_bpSafari = true;

var m_bpAvant = false;			// not recommended
var m_bpGreen = true;			// not recommended
var m_bpMSIE = true;
var m_bpMaxthon = true;			// not recommended
var m_bpSleipnir = false;	
var m_bpSlim = true;			// not recommended

// PREFERENCES FOR THIS PAGE

var m_szDefaultStyle = "ImageLink";
var m_szDefaultTextColor = "FFFFFF";
var m_szDefaultBorderColor = "000000";
var m_szDefaultBorder = "1";
var m_szDefaultLoading = "Image loading...";
var m_szDefaultLabel = "ArtistScope";
var m_szDefaultLink = "";
var m_szDefaultTargetFrame = "_top";
var m_szDefaultMessage = "Add your message here";
var m_szDefaultWatermark = "watermark.gif";
var m_szDefaultWatermarkAlignment = "center";
var m_bpDefaultWatermarkLinux = "true";
var m_bpDefaultWatermarkMacintosh = "true";
var m_bpDefaultWatermarkWindows = "false";
var m_szDefaultFrameDelay = "2000";

//====================================================
//   Current version == 4.7.2.0
//====================================================

var m_nV1=4;
var m_nV2=7;
var m_nV3=2;
var m_nV4=0;

var m_szAgent = navigator.userAgent.toLowerCase();
var m_szBrowserName = navigator.appName.toLowerCase();
var m_szPlatform = navigator.platform.toLowerCase();
var m_bNetscape = false;
var m_bMicrosoft = false;
var m_szPlugin = "";

var m_bWin64 = ((m_szPlatform == "win64") || (m_szPlatform.indexOf("win64")!=-1) || (m_szAgent.indexOf("win64")!=-1) || (m_szAgent.indexOf("wow64")!=-1));
var m_bWin32 = ((m_szPlatform == "win32") || (m_szPlatform.indexOf("win32")!=-1));
var m_bWindows = (m_szAgent.indexOf("windows")!=-1);	
var m_bMacintosh = ((m_szPlatform.indexOf("mac")!=-1) || (m_szAgent.indexOf("mac")!=-1));
var m_bLinux = ((m_szPlatform.indexOf("x11")!=-1) || (m_szPlatform.indexOf("linux i686")!=-1));
var m_bPhone = ((m_szPlatform.indexOf("android")!=-1) || (m_szPlatform.indexOf("iphone")!=-1) || (m_szPlatform.indexOf("ipad")!=-1) || (m_szPlatform.indexOf("mobile")!=-1) || (m_szPlatform.indexOf("tablet")!=-1));
var m_bWindows = ((m_bWindows) && ((m_bWin32) || (m_bWin64)));

var m_bMSIE = (((m_szAgent.indexOf('msie')!=-1) || (m_szAgent.indexOf('trident')!=-1)) && (m_bpMSIE));
var m_bAvant = ((m_szAgent.indexOf("avant")!=-1) && (m_bpAvant));
var m_bCamino = (m_szAgent.indexOf("camino")!=-1);
var m_bChrome = ((m_szAgent.indexOf("chrome")!=-1) && !!(window.chrome && chrome.webstore && chrome.webstore.install) && (m_bpChrome));
var m_bFx3 = (m_szAgent.indexOf("firefox/3.")!=-1);
var m_bFx4 = (m_szAgent.indexOf("firefox/4.")!=-1);
var m_bFx5 = ((m_szAgent.indexOf("firefox/")!=-1) && (testCSS("MozBoxSizing")) && (m_bpFx5) && (!(m_bFx3)) && (!(m_bFx4)));
var m_bGreen = ((m_szAgent.indexOf("green")!=-1) && (m_bpGreen));
var m_bKmeleon = ((m_szAgent.indexOf("k-meleon")!=-1) && (m_bpKmeleon));
var m_bKonq = (m_szAgent.indexOf("konqueror")!=-1);
var m_bMaxthon = ((m_szAgent.indexOf("maxthon")!=-1) && (m_bpMaxthon));
var m_bOpera = (((m_szAgent.indexOf("opera")!=-1) || (m_szAgent.indexOf("opr")!=-1)) && (m_bpOpera));
var m_bSafari = ((m_szAgent.indexOf("safari")!=-1) && (m_szAgent.indexOf("applewebkit")!=-1) && (m_bpSafari));
var m_bSleipnir = ((m_bMSIE) && (m_szAgent.indexOf("sleipnir")!=-1) && (m_bpSleipnir));
var m_bSlim = ((m_bMSIE) && (m_szAgent.indexOf("slim")!=-1) && (m_bpSlim));
var m_bExplorer = ((m_bMSIE) && (!(m_bAvant)) && (!(m_bGreen)) && (!(m_bMaxthon)) && (!(m_bSleipnir)) && (!(m_bSlim)));

var m_bNetscape = ((m_bChrome) || (m_bKmeleon) || (m_bOpera) || (m_bSafari));
var m_bFirefox5 = (m_bFx5);
var m_bMicrosoft = ((m_bExplorer) || (m_bAvant) || (m_bGreen) || (m_bMaxthon) || (m_bSleipnir) || (m_bSlim));   


function testCSS(prop) {
    return prop in document.documentElement.style;
}

if ((m_bMacintosh) || (m_bLinux) || (m_bPhone) || (window.screen.width < 750)) {
	m_bWindows = false;
}

if (m_bChrome) {
   m_bpProtectionLayer = false;
}

if (m_bpDebugging == true)
	{
	document.write("UserAgent= " + m_szAgent + "<br>");
	document.write("Browser= " + m_szBrowserName + "<br>");
	document.write("Platform= " + m_szPlatform + "<br>");
	document.write("Referer= " + m_szLocation + "<br>");
    }

function CopysafeVersionCheck()
	{
		var v = typeof document.getElementById != "undefined" && typeof document.getElementsByTagName != "undefined" && typeof document.createElement != "undefined";
		var AC = [0,0,0];
		var x = "";
		
        if (typeof navigator.plugins != "undefined" && navigator.plugins.length > 0)
        {
	        // Navigator, firefox, mozilla

			navigator.plugins.refresh(false);

		var szDescription = "ArtistScope Plugin";
		var szVersionMatch = "Plugin v";

		if (m_bFirefox5)
		{
		szDescription = "ArtistScope Plugin 5";
		szVersionMatch = "Plugin 5 v";
		}

		if (typeof navigator.plugins[szDescription] == "object")
	        {
	            x = navigator.plugins[szDescription].description;
	            ix = x.indexOf(szVersionMatch);
	            if (ix > -1)
	            	x = x.slice(ix + szVersionMatch.length);
	            else
	            	x = "";
	        }
		}
		else if (typeof window.ActiveXObject != "undefined")
		{
			// Internet explorer

			var y = null;

			try
			{
				y = new ActiveXObject("ARTISTSCOPE.ArtistScopeCtrl")
                x = y.GetVersion();
			}
			catch(t)
			{
			}
		}

		if (x.length > 0)
		{
           	ix1 = x.indexOf(".");
           	ix2 = x.indexOf(".", ix1 + 1);
	            	
           	if (ix1 != -1 && ix2 != -1)
           	{
            	AC[0] = parseInt(x.slice(0, ix1));
            	AC[1] = parseInt(x.slice(ix1 + 1, ix2));
            	AC[2] = parseInt(x.slice(ix2 + 1));
           	}
		}

        return AC;
	}

var arVersion = CopysafeVersionCheck();
var szNumeric = "" + arVersion[0] + "." + arVersion[1] + "." + arVersion[2];
	

if ((m_bWindows) && (m_bMicrosoft))
	{
	m_szPlugin = "OCX";
	if ((arVersion[0] < m_nV1) || (arVersion[0] == m_nV1 && arVersion[1] < m_nV2) || (arVersion[0] == m_nV1 && arVersion[1] == m_nV2 && arVersion[2] < m_nV3))
		{
		window.location=unescape(m_szDownloadIE);
		document.MM_returnValue=false;
		}
	}
else if ((m_bWindows) && (m_bNetscape))
	{
	m_szPlugin = "DLL";
	if ((arVersion[0] < m_nV1) || (arVersion[0] == m_nV1 && arVersion[1] < m_nV2) || (arVersion[0] == m_nV1 && arVersion[1] == m_nV2 && arVersion[2] < m_nV3))
		{
//		document.write("FF3 DETECTED - REDIRECT FOR DOWNLOAD");
		window.location=unescape(m_szDownloadFX);
		document.MM_returnValue=false;
		}
	}
else if ((m_bWindows) && (m_bFirefox5))
	{
	m_szPlugin = "DLL";
	if ((arVersion[0] < m_nV1) || (arVersion[0] == m_nV1 && arVersion[1] < m_nV2) || (arVersion[0] == m_nV1 && arVersion[1] == m_nV2 && arVersion[2] < m_nV3))
		{
//		document.write("FF5 DETECTED - REDIRECT FOR DOWNLOAD ");
		window.location=unescape(m_szDownloadFX);
		document.MM_returnValue=false;
	}
}
else if ((m_bMacintosh) || (m_bLinux))
	{
	m_szPlugin = "APPLET";
		if (m_bpWindowsOnly == true)
		{
		window.location=unescape(m_szDownloadNo);
		document.MM_returnValue=false;
		}
	}
else 
	{ 
	if ((m_bWindows) && (m_bFx4))
		{
//		document.write("FF4 DETECTED - REDIRECT FOR ADVICE");
		window.location=unescape(m_szDownloadNoFx4);
		document.MM_returnValue=false;
		}
	else
		{
//		document.write("NO PLUGINS DETECTED - REDIRECT to NO SUPPORT MESSAGE");
	window.location=unescape(m_szDownloadNo);
	document.MM_returnValue=false;
		}
	}


function bool2String(bValue)
{
    if (bValue == true) {return "1";}
    else {return "0";}
}

function paramValue(szValue, szDefault)
{
    if (szValue.toString().length > 0) {return szValue;}
    else {return szDefault;}
}

function expandNumber(nValue, nLength)
{
    var szValue = nValue.toString();
    while(szValue.length < nLength)
        szValue = "0" + szValue;
    return szValue;
}


// The copysafe-insert functions

function insertCopysafeImageLite(szImageName)
{
    // Extract the image width and height from the image name (example name: zulu580_0580_0386_C.class)

    var nIndex = szImageName.lastIndexOf('_C.');
    if (nIndex == -1)
    {
        // Strange filename that doesn't conform to the copysafe standard. Can't render it.
        return;
    }

    var szWidth = szImageName.substring(nIndex - 9, nIndex - 5);
    var szHeight = szImageName.substring(nIndex - 4, nIndex);

    var nWidth = szWidth * 1;
    var nHeight = szHeight * 1;


    // Expand width and height to allow for border

    var nBorder = m_szDefaultBorder * 1;
    nWidth = nWidth + (nBorder * 2);
    nHeight = nHeight + (nBorder * 2);

    insertCopysafeImage(nWidth, nHeight, "", "", "", nBorder, "", "", "", "", "", m_szDefaultFrameDelay, [szImageName]);
}

function insertCopysafeImage(nWidth, nHeight,
    szImageStyle,
    szTextColor,
    szBorderColor,
    nBorder,
    szLoading,
    szLabel,
    szLink,
    szTargetFrame,
    szMessage,
    nFrameDelay,
    arFrames)
{
    insertCopysafeWatermarkedImage(nWidth, nHeight,
        szImageStyle,
        szTextColor,
        szBorderColor,
        nBorder,
        szLoading,
        szLabel,
        szLink,
        szTargetFrame,
        szMessage,
        m_szDefaultWatermark,
        m_szDefaultWatermarkAlignment,
        m_bpDefaultWatermarkLinux,
        m_bpDefaultWatermarkMacintosh,
        m_bpDefaultWatermarkWindows,
        nFrameDelay,
        arFrames);
}

function insertCopysafeWatermarkedImage(nWidth, nHeight,
    szImageStyle,
    szTextColor,
    szBorderColor,
    nBorder,
    szLoading,
    szLabel,
    szLink,
    szTargetFrame,
    szMessage,
    szWatermark,
    szWatermarkAlignment,
    szWatermarkLinux,
    szWatermarkMacintosh,
    szWatermarkWindows,
    nFrameDelay,
    arFrames)
{
    if (m_bpDebugging == true)
        { 
        document.writeln("<textarea rows='27' cols='80'>"); 
        }       
    if ((m_szPlugin == "DLL") || (m_szPlugin == "OCX") || (m_szPlugin == "APPLET"))
    {
    var szObjectInsert = "";
    
    if (m_szPlugin == "DLL")
    {
	var szFxSpecial = "";
	if (m_bFirefox5)
	{
	szFxSpecial = "-firefox5";
	}
        
	szObjectInsert = "type='application/x-artistscope" + szFxSpecial + "' codebase='http://www.artistscope.com/plugins/download_fx.asp' ";
        document.writeln("<ob" + "ject " + szObjectInsert + " width='" + nWidth + "' height='" + nHeight + "'>");
        if (m_bpProtectionLayer) {
        document.writeln("<param name='ProtectionActivated' value='OnProtectionActivated()' />");
    	}
    }
    else if (m_szPlugin == "OCX")
    {
        szObjectInsert = "classid='CLSID:46C73251-78A3-43C8-BA64-A18B29314D69'";
        document.writeln("<ob" + "ject id='CopysafeObject' " + szObjectInsert + " width='" + nWidth + "' height='" + nHeight + "'>");
	}
	else if (m_szPlugin == "APPLET")
	{		
		szObjectInsert = "codebase='" + m_szImageFolder + "' code='ArtistScopeViewer.class' archive='ArtistScopeViewer.jar' id='Artistscope'";
		document.writeln("<app" + "let " + szObjectInsert + " width='" + nWidth + "' height='" + nHeight + "'>");
		m_szImageFolder = "";
	}
    	if (m_szPlugin != "APPLET")
    	{ 
    document.writeln("<param name='KeySafe' value='" + bool2String(m_bpKeySafe) + "' />");
    document.writeln("<param name='CaptureSafe' value='" + bool2String(m_bpCaptureSafe) + "' />");
    document.writeln("<param name='MenuSafe' value='" + bool2String(m_bpMenuSafe) + "' />");
    document.writeln("<param name='RemoteSafe' value='" + bool2String(m_bpRemoteSafe) + "' />");
    	}
    
    document.writeln("<param name='Style' value='" + paramValue(szImageStyle, m_szDefaultStyle) + "' />");
    document.writeln("<param name='TextColor' value='" + paramValue(szTextColor, m_szDefaultTextColor) + "' />");
    document.writeln("<param name='BorderColor' value='" + paramValue(szBorderColor, m_szDefaultBorderColor) + "' />");
    document.writeln("<param name='Border' value='" + paramValue(nBorder, m_szDefaultBorder) + "' />");
    document.writeln("<param name='Loading' value='" + paramValue(szLoading, m_szDefaultLoading) + "' />");
    document.writeln("<param name='Label' value='" + paramValue(szLabel, m_szDefaultLabel) + "' />");
    document.writeln("<param name='Link' value='" + paramValue(szLink, m_szDefaultLink) + "' />");
    document.writeln("<param name='TargetFrame' value='" + paramValue(szTargetFrame, m_szDefaultTargetFrame) + "' />");
    document.writeln("<param name='Message' value='" + paramValue(szMessage, m_szDefaultMessage) + "' />");   
    document.writeln("<param name='Watermark' value='" + m_szImageFolder + paramValue(szWatermark, m_szDefaultWatermark) + "' />");
    document.writeln("<param name='WatermarkAlignment' value='" + paramValue(szWatermarkAlignment, m_szDefaultWatermarkAlignment) + "' />");
    document.writeln("<param name='WatermarkLinux' value='" + paramValue(szWatermarkLinux, m_bpDefaultWatermarkLinux) + "' />");
    document.writeln("<param name='WatermarkMacintosh' value='" + paramValue(szWatermarkMacintosh, m_bpDefaultWatermarkMacintosh) + "' />");
    document.writeln("<param name='WatermarkWindows' value='" + paramValue(szWatermarkWindows, m_bpDefaultWatermarkWindows) + "' />");
    document.writeln("<param name='FrameDelay' value='" + paramValue(nFrameDelay, m_szDefaultFrameDelay) + "' />");
    document.writeln("<param name='FrameCount' value='" + arFrames.length + "' />");
    for(var x = 0; x < arFrames.length; x++)
    {
        var szFrameNumber = expandNumber(x, 3);
        document.writeln("<param name='Frame" + szFrameNumber + "' value='" + m_szImageFolder + arFrames[x] + "' />");
    }
    if (m_szPlugin == "APPLET")
    	{
    	document.writeln("</app" + "let />");
    	}
    	else 
    	{ 
    	document.writeln("</ob" + "ject />"); 
    	}  
	}
    if (m_bpDebugging == true)
        { document.writeln("</textarea />"); }
}
// -->
