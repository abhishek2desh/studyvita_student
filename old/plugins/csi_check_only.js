<!-- hide JavaScript from non-JavaScript browsers

	//  Copysafe Web - Version 4.7.2.0
	//  Copyright (c) 1998-2013 ArtistScope. All Rights Reserved.
	//  www.artistscope.com
	//
	// The Copysafe Plugin is supported across Windows XP, 2003, Vista, 7 and 8

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

	
var m_bpKeySafe = false;
var m_bpCaptureSafe = false;
var m_bpMenuSafe = false;

var m_bpRemoteSafe = false;
var m_bpWindowsOnly = true;	
var m_bpProtectionLayer = false;	// Set to true only if using OnProtectionActivated layer control

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



//====================================================
//   Current version == 4.7.2.0
//====================================================

var m_nV1=4;
var m_nV2=7;
var m_nV3=2;
var m_nV4=0;

//===========================
//   DO NOT EDIT BELOW 
//===========================

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
// document.write("Version= " + szNumeric + "<br>");	

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
	if ((m_bWindows) && (m_bFx4) && (m_bNetCheck))
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


// -->