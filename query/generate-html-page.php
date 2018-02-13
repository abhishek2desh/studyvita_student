<?php
	
		include_once '../config.php';
		$msg1=$_POST['msg1'];
		$msg2=$_POST['msg2'];
		$fac_id=$_POST['fac_id'];
		$hd1="";
		$hd2="";
		$hd3='http://studyvita.com';
		$designation_id="";
		$referal_code="";
		$record_id=0;
		$htmlbody="";
		$result=mysql_query("select name,designation_id,referal_code,student_photos from user where id='$fac_id'");
		while($row=mysql_fetch_array($result))
		{
			$hd1=$row[0];
			$designation_id=$row[1];
			$referal_code=$row[2];
			$student_photos=$row[3];
		}
		$imgpath="http://www.coreacademics.in/StudentPhotos/".$student_photos;
		if($designation_id>0)
		{
		$result=mysql_query("select name from roll where id='$designation_id'");
		while($row=mysql_fetch_array($result))
		{
			$hd2=$row[0];
			
		}
		}
		else
		{
		$result=mysql_query("SELECT r.name from user_roll ur,roll r where ur.user_id='$fac_id' and r.id=ur.roll_id order by ur.id limit 1");
			while($row=mysql_fetch_array($result))
		{
			$hd2=$row[0];
			
		}
		}
		$bloglink="http://studyvita.com//SIGNUP/register.php?refcode=".$referal_code;
		$sql_1=mysql_query("INSERT INTO blog_post (heading1,heading2,heading3,blogheading,bloglink,user_id,private_page_text,text_before_link)values('$hd1', '$hd2','$hd3','$msg1','$bloglink','$fac_id','$msg2','$msg1')");
		if($sql_1)
			{
				$result=mysql_query("select id from blog_post where heading1='$hd1' and  heading2='$hd2' and  heading3='$hd3' and  blogheading='$msg1' and  bloglink='$bloglink' and  user_id='$fac_id' and  private_page_text='$msg2' and  text_before_link='$msg1'");
				while($row=mysql_fetch_array($result))
				{
					$record_id=$row[0];
					
				}
				//for generate private page 
				if($record_id>0)
				{
					$htmlbody="<!DOCTYPE html>
<html lang='en'>
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src='https://www.googletagmanager.com/gtag/js?id=UA-108058922-1'></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-108058922-1');
</script>


    <meta property='og:title' content='$hd1' />
    <meta property='og:description' content='$hd2' />
    <meta property='og:url' content='$hd3' />
    <meta property='og:image' content='$imgpath' />
    
   
    <style>
        /* Loading Spinner */
        .spinner{margin:0;width:70px;height:18px;margin:-35px 0 0 -9px;position:absolute;top:50%;left:50%;text-align:center}.spinner > div{width:18px;height:18px;background-color:#333;border-radius:100%;display:inline-block;-webkit-animation:bouncedelay 1.4s infinite ease-in-out;animation:bouncedelay 1.4s infinite ease-in-out;-webkit-animation-fill-mode:both;animation-fill-mode:both}.spinner .bounce1{-webkit-animation-delay:-.32s;animation-delay:-.32s}.spinner .bounce2{-webkit-animation-delay:-.16s;animation-delay:-.16s}@-webkit-keyframes bouncedelay{0%,80%,100%{-webkit-transform:scale(0.0)}40%{-webkit-transform:scale(1.0)}}@keyframes bouncedelay{0%,80%,100%{transform:scale(0.0);-webkit-transform:scale(0.0)}40%{transform:scale(1.0);-webkit-transform:scale(1.0)}}
		p{text-align:justify !important;}
    </style>
    <meta charset='UTF-8'>
	<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
	<title> StudyVita </title>
	<meta name='description' content=''>
	<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no'>
 
  <meta name='description' content='$hd2'>
  <meta name='keywords' content='Teachers,Empowerment,StudyVita,Learning'>
  <meta name='author' content='studyVita'>
   
<link rel='stylesheet' type='text/css' href='assets/css/buttontheme.css'>
	<!-- Favicons -->

	<link rel='apple-touch-icon-precomposed' sizes='144x144' href='assets/images/icons/apple-touch-icon-144-precomposed.png'>
	<link rel='apple-touch-icon-precomposed' sizes='114x114' href='assets/images/icons/apple-touch-icon-114-precomposed.png'>
	<link rel='apple-touch-icon-precomposed' sizes='72x72' href='assets/images/icons/apple-touch-icon-72-precomposed.png'>
	<link rel='apple-touch-icon-precomposed' href='assets/images/icons/apple-touch-icon-57-precomposed.png'>
	<link rel='shortcut icon' href='assets/images/icons/favicon.png'>
    <!-- HELPERS -->
	<link rel='stylesheet' type='text/css' href='assets/helpers/backgrounds.css'>
	<link rel='stylesheet' type='text/css' href='assets/helpers/boilerplate.css'>
	<link rel='stylesheet' type='text/css' href='assets/helpers/grid.css'>
	<link rel='stylesheet' type='text/css' href='assets/helpers/utils.css'>
	<link rel='stylesheet' type='text/css' href='assets/helpers/colors.css'>

	<!-- ELEMENTS -->

		
	<link rel='stylesheet' type='text/css' href='assets/elements/badges.css'>
	<link rel='stylesheet' type='text/css' href='assets/elements/buttons.css'>
	<link rel='stylesheet' type='text/css' href='assets/elements/content-box.css'>
	<link rel='stylesheet' type='text/css' href='assets/elements/images.css'>
	<link rel='stylesheet' type='text/css' href='assets/elements/social-box.css'>

	<!-- FRONTEND ELEMENTS -->

	<link rel='stylesheet' type='text/css' href='assets/frontend-elements/blog.css'>
	<link rel='stylesheet' type='text/css' href='assets/frontend-elements/footer.css'>
	<link rel='stylesheet' type='text/css' href='assets/frontend-elements/hero-box.css'>
	<link rel='stylesheet' type='text/css' href='assets/frontend-elements/icon-box.css'>
	<!-- ICONS -->

	

<link rel='stylesheet' type='text/css' href='assets/icons/fontawesome/fontawesome.css'>
	<link rel='stylesheet' type='text/css' href='assets/icons/linecons/linecons.css'>
	<link rel='stylesheet' type='text/css' href='assets/icons/spinnericon/spinnericon.css'>

	<!-- FRONTEND WIDGETS -->

 
	<link rel='stylesheet' type='text/css' href='assets/widgets/fullpage/fullpage.css'>

	<!-- Frontend theme -->

	

	<link rel='stylesheet' type='text/css' href='assets/themes/frontend/layout.css'>
	<link rel='stylesheet' type='text/css' href='assets/themes/frontend/color-schemes/default.css'>
	<!-- Components theme -->

	<link rel='stylesheet' type='text/css' href='assets/themes/components/default.css'>
	<link rel='stylesheet' type='text/css' href='assets/themes/components/border-radius.css'>

	<!-- Frontend responsive -->

	
<link rel='stylesheet' type='text/css' href='assets/helpers/responsive-elements.css'>
	<link rel='stylesheet' type='text/css' href='assets/helpers/frontend-responsive.css'>
    <!-- JS Core -->

    <script type='text/javascript' src='assets/js-core/jquery-core.js'></script>
    <script type='text/javascript' src='assets/js-core/jquery-ui-core.js'></script>
    <script type='text/javascript' src='assets/js-core/jquery-ui-widget.js'></script>
    <script type='text/javascript' src='assets/js-core/jquery-ui-mouse.js'></script>
    <script type='text/javascript' src='assets/js-core/jquery-ui-position.js'></script>
    <script type='text/javascript' src='assets/js-core/transition.js'></script>
    <script type='text/javascript' src='assets/js-core/modernizr.js'></script>
    <script type='text/javascript' src='assets/js-core/jquery-cookie.js'></script>

	<script type='text/javascript'>
		$(window).load(function(){
			setTimeout(function() {
				$('#loading').fadeOut( 400, 'linear' );
			}, 300);
		});
	</script>
	<!-- Lazyload -->

	<script type='text/javascript' src='assets/widgets/lazyload/lazyload.js'></script>
	<script type='text/javascript'>
		/* Lazyload */

		$(function() {
			$('img.lazy').lazyload({
				effect: 'fadeIn',
				threshold: 100
			});
		});
	</script>

</head>

<body>
	<div id='loading'>
		<div class='spinner'>
			<div class='bounce1'></div>
			<div class='bounce2'></div>
			<div class='bounce3'></div>
		</div>
	</div>
	<div id='page-wrapper'>
		<div class='main-header bg-header wow fadeInDown'>
			<div class='container'>
				<a href='http://studyvita.com/' class='header-logo' title='StudyVita'></a><!-- .header-logo -->
				</div><!-- .header-logo -->   
			</div><!-- .container -->
		</div><!-- .main-header -->
		<div class='hero-box poly-bg-1 hero-box-smaller font-inverse' data-top-bottom='background-position: 50% 0px;' data-bottom-top='background-position: 50% -600px;'>
			<div class='container'>
				<h1 class='hero-heading wow fadeInDown' data-wow-duration='0.6s'>$msg1</h1> 	
			</div>
			
		</div>
		<div id='page-content' class='container mrg25T'>
			 
				 
				<div class='post-content-wrapper'>
					
						
					
					 
					<div class='clients-desc col-md-8 center-margin'>
						<p>$msg2</p>
						<br/>
						<a href='$bloglink'><input type='button' value='Register' id='register' class='defaultbutton'/></a>
					</div>
					 
				</div>
			 
		</div>
		<br><br>

		<div class='main-footer clearfix bg-gradient-8'>
			<div class='container clearfix'>
				<div class='col-md-3 pad25R'>
					<div class='header'>About us</div>
					<p class='about-us'>
						A Social Edupreneurial Initiative started with an objective of creating a holistic and affordable online Educational Platform, that can provide 
practical solutions for the problems faced in Education sector through Judicious use of Technology.

					</p>
				</div>
				<div class='col-md-2'>
					<h3 class='header'>Links</h3>
					<ul class='footer-nav'>
						<li><a href='http://studyvita.com/' title='Static hero sections'><span>StudyVita</span></a></li>
						<li><a href='http://carnival.studyvita.com/#/' title='Hero alignments'><span>Carnival</span></a></li>
						</ul>
				</div>
				<div class='col-md-2'>
					<h3 class='header'>Register Here</h3>
					<ul class='footer-nav'>
						<ul class='footer-nav'>
						<li><a href='http://studyvita.com/SIGNUP/' title='Static hero sections'><span>StudyVita Registration</span></a></li>
						<li><a href='http://carnival.studyvita.com/#/Register' title='Hero alignments'><span>Carnival Registration</span></a></li>
					</ul>
				</div>
				<div class='col-md-3'>				
					<h3 class='header'>Contact us</h3>
					<ul class='footer-contact'>
						<li>
							<i class='glyph-icon icon-home'></i>
							S-1 Kundlini Complex. Lake Jn, Vastrapur, Ahmedabad, India
						</li>
						<li>
							<i class='glyph-icon icon-phone'></i>
							(+91) 922 720 8921
						</li>
						<li>
							<i class='glyph-icon icon-envelope-o'></i>
							<a href='#' title=''>edutechindia@gmail.com</a>
						</li>
					</ul>
				</div>
				<h3 class='header'>Follow Us</h3>
				<div class='container'>
						<div class='float-left'>
							<a href='https://www.facebook.com/studyvitacarnival' class='btn btn-sm bg-facebook tooltip-button' data-placement='bottom' title='Follow us on Facebook'>
								<i class='glyph-icon icon-facebook'></i>
							</a>
							<a href='https://twitter.com/Studyvita' class='btn btn-sm bg-twitter tooltip-button' data-placement='bottom' title='Follow us on Twitter'>
								<i class='glyph-icon icon-twitter'></i>
							</a>
							<a href='https://www.instagram.com/studyvita_carnival/' class='btn btn-sm bg-red tooltip-button' data-placement='bottom' title='Follow us on Instagram'>
								<i class='glyph-icon icon-instagram'></i>
							</a>
						</div>
				</div><!-- .container -->
			</div>
			<div class='footer-pane'>
				<div class='container clearfix'> 
					<div class='logo'>&copy; 2017 Edutech Educational Services Pvt Ltd. All Rights Reserved.</div>
				</div>
			</div>
		</div>
	</div>


 
	<script type='text/javascript' src='assets/js-init/widgets-init.js'></script>
	<script type='text/javascript' src='assets/js-init/frontend-init.js'></script>
</body>
</html>";
$myFile = "D:\\inetpub\\wwwroot\\EdutechIndia\\edu\\coreacademics\\test\\index".$record_id.".html"; // or .php   
$fh = fopen($myFile, 'w'); // or die("error");  
  
fwrite($fh, $htmlbody);
fclose($fh);
if (file_exists($myFile)) 
{
echo $msg1
."  http://studyvita.com/test/index".$record_id.".html";
}
				}
				//end generate private page
			}
			else
			{
				echo "Failed";
			}
?>