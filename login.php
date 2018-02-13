<?php

	$url_link_val=$_GET["val"];
	$username=$_GET["username"];
	$password=$_GET["password"];
    function getBrowser()
    {
        $u_agent = $_SERVER['HTTP_USER_AGENT'];
        $bname = 'Unknown';
        $platform = 'Unknown';
        $version= "";

        //First get the platform?
        if (preg_match('/linux/i', $u_agent)) {
            $platform = 'linux';
        }
        elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
            $platform = 'mac';
        }
        elseif (preg_match('/windows|win32/i', $u_agent)) {
            $platform = 'windows';
        }

        // Next get the name of the useragent yes separately and for good reason.
        if (preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
        {
            $bname = 'Internet Explorer';
            $ub = "MSIE";
        }
        elseif (preg_match('/Firefox/i',$u_agent))
        {
            $bname = 'Mozilla Firefox';
            $ub = "Firefox";
        }
        elseif (preg_match('/Chrome/i',$u_agent))
        {
            $bname = 'Google Chrome';
            $ub = "Chrome";
        }
        elseif (preg_match('/Safari/i',$u_agent))
        {
            $bname = 'Apple Safari';
            $ub = "Safari";
        }
        elseif (preg_match('/Opera/i',$u_agent))
        {
            $bname = 'Opera';
            $ub = "Opera";
        }
        elseif (preg_match('/Netscape/i',$u_agent))
        {
            $bname = 'Netscape';
            $ub = "Netscape";
        }
		elseif (preg_match('/FlashFox/i',$u_agent))
        {
            $bname = 'FlashFox';
            $ub = "FlashFox";
        }
        // Finally get the correct version number.
        $known = array('Version', $ub, 'other');
        $pattern = '#(?<browser>' . join('|', $known) .
        ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
        if (!preg_match_all($pattern, $u_agent, $matches)) {
            // we have no matching number just continue
        }

        // See how many we have.
        $i = count($matches['browser']);
        if ($i != 1) {
            //we will have two since we are not using 'other' argument yet
            //see if version is before or after the name
            if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
                $version= $matches['version'][0];
            }
            else {
                $version= $matches['version'][1];
            }
        }
        else {
            $version= $matches['version'][0];
        }

        // Check if we have a number.
        if ($version==null || $version=="") {$version="?";}

        return array(
            'userAgent' => $u_agent,
            'name'      => $bname,
            'version'   => $version,
            'platform'  => $platform,
            'pattern'    => $pattern
        );
    }

    // Now try it.
    $ua=getBrowser();
    $yourbrowser= "Your browser: " . $ua['name'] . " " . $ua['version'] . " on " .
                  $ua['platform'] . " reports: <br >" . $ua['userAgent'];				  
				  
			if($ua['name'] == 'Internet Explorer')
			{
				?>
				
				<link rel="stylesheet" href="css/bg.css" /> 
				<link rel="stylesheet" type="text/css" href="css/flexpaper.css" />
				<link rel="stylesheet" href="css/demo.css" />
				<h3>
				<div style="position:absolute;left:150px;top:165px; color: blue;">
				<?php
					echo "You are using an unsupported browser. So,some features may not work properly. Please upgrade to Google Chrome.";
				?>
				<blink>
				<a href="https://www.google.com/intl/en/chrome/browser/?hl=en&brand=CHNG&utm_source=en-hpp&utm_medium=hpp&utm_campaign=en">
				Click here to download Google Chrome
				</a>
				</link>

				</div>
				</h3>
				<?php
			}
			/*else if($ua['name'] == 'Mozilla Firefox')
			{
				?>
				
				<link rel="stylesheet" href="css/bg.css" /> 
				<link rel="stylesheet" type="text/css" href="css/flexpaper.css" />
				<link rel="stylesheet" href="css/demo.css" />
				<h3>
				<div style="position:absolute;left:150px;top:165px; color: blue;">
				<?php
					echo "You are using an unsupported browser. So,some features may not work properly. Please upgrade to Google Chrome.";
				?>
				<blink>
				<a href="https://www.google.com/intl/en/chrome/browser/?hl=en&brand=CHNG&utm_source=en-hpp&utm_medium=hpp&utm_campaign=en">
				Click here to download Google Chrome
				</a>
				</link>
				</div>
				</h3>
				<?php
			}*/
			/*else if($ua['name'] == 'Apple Safari')
			{
				?>
				
				<link rel="stylesheet" href="css/bg.css" /> 
				<link rel="stylesheet" type="text/css" href="css/flexpaper.css" />
				<link rel="stylesheet" href="css/demo.css" />
				<h3>
				<div style="position:absolute;left:150px;top:165px; color: blue;">
				<?php
					echo "You are using an unsupported browser. So,some features may not work properly. Please upgrade to Google Chrome.";
				?>
				<blink>
				<a href="https://www.google.com/intl/en/chrome/browser/?hl=en&brand=CHNG&utm_source=en-hpp&utm_medium=hpp&utm_campaign=en">
				Click here to download Google Chrome
				</a>
				</link>
				</div>
				</h3>
				<?php
			}
			else if($ua['name'] == 'Opera')
			{
				?>
				
				<link rel="stylesheet" href="css/bg.css" /> 
				<link rel="stylesheet" type="text/css" href="css/flexpaper.css" />
				<link rel="stylesheet" href="css/demo.css" />
				<h3>
				<div style="position:absolute;left:150px;top:165px; color: blue;">
				<?php
					echo "You are using an unsupported browser. So,some features may not work properly. Please upgrade to Google Chrome.";
				?>
				<blink>
				<a href="https://www.google.com/intl/en/chrome/browser/?hl=en&brand=CHNG&utm_source=en-hpp&utm_medium=hpp&utm_campaign=en">
				Click here to download Google Chrome
				</a>
				</link>
				</div>
				</h3>
				<?php
			}*/
			else if($ua['name'] == 'Netscape')
			{
				?>
				
				<link rel="stylesheet" href="css/bg.css" /> 
				<link rel="stylesheet" type="text/css" href="css/flexpaper.css" />
				<link rel="stylesheet" href="css/demo.css" />
				<h3>
				<div style="position:absolute;left:150px;top:165px; color: blue;">
				<?php
					echo "You are using an unsupported browser. So,some features may not work properly. Please upgrade to Google Chrome.";
				?>
				<blink>
				<a href="https://www.google.com/intl/en/chrome/browser/?hl=en&brand=CHNG&utm_source=en-hpp&utm_medium=hpp&utm_campaign=en">
				Click here to download Google Chrome
				</a>
				</link>
				</div>
				</h3>
				<?php
			}
			else
			{
				include 'config.php';
				//include_once 'copysafe.php';
				//include('lock.php');
				session_start();
				$error = "";
				$name = "";
				$password = "";
				if(isset($_POST['submit-login'])) 
				{
					$myusername=addslashes($_POST['username']);
					$mypassword=addslashes($_POST['password']);
					
					$sql="SELECT u.id,u.name,u.username,sd.batch_id,b.start_on,b.end_on FROM USER u,student_details sd,batch b WHERE u.id=sd.user_id AND b.id=sd.batch_id AND u.username='$myusername' AND u.PASSWORD='$mypassword'";
					
					$result=mysql_query($sql);
					$row=mysql_fetch_array($result);
					$count=mysql_num_rows($result);
					if($count >= 2)
					{
						$sql1="SELECT u.id,u.name,u.username,sd.batch_id,b.start_on,b.end_on,b.name,u.password FROM USER u,student_registered_course sd,batch b WHERE u.id=sd.user_id AND b.id=sd.batch_id AND u.username='$myusername' AND u.PASSWORD='$mypassword'";
						$result1=mysql_query($sql1);
						$count1=mysql_num_rows($result1);
						$ij=1;
						while($row1=mysql_fetch_array($result1))
						{
							$idd=$row1[0];
							$uname=$row1[1];
							$start_on=$row1[4];
							$end_date=$row1[5];
							$today = date("Y-m-d", strtotime('today'));
							$newDate = date("d-m-Y", strtotime($start_on));
							$newDate1 = date("d-m-Y", strtotime($end_date));
							if($today <= $start_on)
							{
								if($ij == $count1)
								{
									$message="Dear $uname Validity of your account starts From $newDate";
									echo "<script language=javascript> alert('$message');</script>"; 
								}
							}
							else if($today >= $end_date)
							{
								if($ij == $count1)
								{
									$message="Dear $uname Your account validity was over on $newDate1 please contact : +91 7878079079 email edutechenquiry@gmail.com";
									echo "<script language=javascript> alert('$message');</script>"; 
								}
							}
							else
							{
								goto ab;
							}
							$ij++;
						}
					}
					else if($count == 1)
					{
						$idd=$row[0];
						$uname=$row[1];
						$start_on=$row[4];
						$end_date=$row[5];
						$today = date("Y-m-d", strtotime('today'));
						$newDate = date("d-m-Y", strtotime($start_on));
						$newDate1 = date("d-m-Y", strtotime($end_date));
						if($today <= $start_on)
						{
							$message="Dear $uname Validity of your account starts From $newDate";
							echo "<script language=javascript> alert('$message');</script>"; 
						}
						else if($today >= $end_date)
						{
							$message="Dear $uname Your account validity was over on $newDate1 please contact : +91 7878079079 email edutechenquiry@gmail.com";
							echo "<script language=javascript> alert('$message');</script>"; 
						}
						else
						{
							if($count==1)
							{
								ab:
								$_SESSION['login_user']=$myusername;
								$_SESSION['login_user1']=$uname;
								$_SESSION['acl']=$idd;
								header("location: student_course_page2.php");
								include 'send_mail_login.php';
							}
							else
							{
								if($myusername == "")
								{
									$error="Please Enter Properly.";
								}
								else if($mypassword == "")
								{
									$error="Please Enter Properly.";
								}
								else
								{
										$error="Your Login Name or Password is invalid";
										$message="Dear $uname  Your account validity was over on $newDate1 please contact : +91 7878079079 email edutechenquiry@gmail.com";
										echo "<script language=javascript> alert('$message');</script>"; 
								//	}
								}
							}
						}
					}
				}
			?>
			<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>Edutech Viewer - Login to Our Website</title>
			<link rel="shortcut icon" href="images/Edutechheader.ico" />
			<meta name="description" content="" />
			<!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>-->
			<script src="js/jquery-1.7.2.min.js"></script>
			<script>
			jQuery(function($){
				// simple jQuery validation script
				$('#login').submit(function(){
					
					var valid = true;
					var errormsg = 'This field is required!';
					var errorcn = 'error';
					
					$('.' + errorcn, this).remove();			
					
					$('.required', this).each(function(){
						var parent = $(this).parent();
						if( $(this).val() == '' ){
							var msg = $(this).attr('title');
							msg = (msg != '') ? msg : errormsg;
							$('<span class="'+ errorcn +'">'+ msg +'</span>')
								.appendTo(parent)
								.fadeIn('fast')
								.click(function(){ $(this).remove(); })
							valid = false;
						};
					});
					
					return valid;
				});	
			})	
			</script>
			<style>

			/* HTML elements */		

				h1, h2, h3, h4, h5, h6
				{
					font-weight:normal;
					margin:0;
					line-height:1.1em;
					color:#000;
				}	
				h1{font-size:2em;margin-bottom:.5em;}	
				h2{font-size:1.75em;margin-bottom:.5142em;padding-top:.2em;}	
				h3{font-size:1.5em;margin-bottom:.7em;padding-top:.3em;}
				h4{font-size:1.25em;margin-bottom:.6em;}
				h5,h6{font-size:1em;margin-bottom:.5em;font-weight:bold;}
				
				p, blockquote, ul, ol, dl, form, table, pre{line-height:inherit;margin:0 0 1.5em 0;}
				ul, ol, dl{padding:0;}
				ul ul, ul ol, ol ol, ol ul, dd{margin:0;}
				li{margin:0 0 0 2em;padding:0;display:list-item;list-style-position:outside;}	
				blockquote, dd{padding:0 0 0 2em;}
				pre, code, samp, kbd, var{font:100% mono-space,monospace;}
				pre{overflow:auto;}
				abbr, acronym{
					text-transform:uppercase;
					border-bottom:1px dotted #000;
					letter-spacing:1px;
					}
				abbr[title], acronym[title]{cursor:help;}
				small{font-size:.9em;}
				sup, sub{font-size:.8em;}
				em, cite, q{font-style:italic;}
				img{border:none;}			
				hr{display:none;}	
				table{width:100%;border-collapse:collapse;}
				th,caption{text-align:left;}
				form div{margin:.5em 0;clear:both;}
				label{display:block;}
				fieldset{margin:0;padding:0;border:none;}
				legend{font-weight:bold;}
				input[type="radio"],input[type="checkbox"], .radio, .checkbox{margin:0 .25em 0 0;}

			/* //  HTML elements */	

			/* base */

			body, table, input, textarea, select, li, button{
				font:1em "Lucida Sans Unicode", "Lucida Grande", sans-serif;
				line-height:1.5em;
				color:#444;
				}	
			body{
				font-size:12px;
				background:#c4f0f1;		
				text-align:center;
				}		

			/* // base */

			/* login form */	

			#login{
				margin:5em auto;
				background:#fff;
				border:8px solid #eee;
				width:600px;
				-moz-border-radius:5px;
				-webkit-border-radius:5px;
				border-radius:5px;
				-moz-box-shadow:0 0 10px #4e707c;
				-webkit-box-shadow:0 0 10px #4e707c;
				box-shadow:0 0 10px #4e707c;
				text-align:left;
				position:relative;
				}
			#login a, #login a:visited{color:#ffffff;}
			#login a:hover{color:#111;}
			#login h1{
				background:#0174DF;
				color:#fff;
				text-shadow:#007dab 0 1px 0;
				font-size:14px;
				padding:18px 23px;
				margin:0 0 1.5em 0;
				border-bottom:1px solid #007dab;
				}
			#login .register{
				position:absolute;
				float:left;
				margin:0;
				line-height:30px;
				top:-40px;
				right:0;
				font-size:11px;
				}
			#login p{margin:.5em 25px;}
			#login div{
				margin:.5em 25px;
				background:#eee;
				padding:4px;
				-moz-border-radius:3px;
				-webkit-border-radius:3px;
				border-radius:3px;
				text-align:right;
				position:relative;
				}	
			#login label{
				float:left;
				line-height:30px;
				padding-left:10px;
				}
			#login .field{
				border:1px solid #ccc;
				width:280px;
				font-size:12px;
				line-height:1em;
				padding:4px;
				-moz-box-shadow:inset 0 0 5px #ccc;
				-webkit-box-shadow:inset 0 0 5px #ccc;
				box-shadow:inset 0 0 5px #ccc;
				}	
			#login div.submit{background:none;margin:1em 25px;text-align:left;}	
			#login div.submit label{float:none;display:inline;font-size:11px;}	
			#login button{
				border:0;
				padding:0 30px;
				height:30px;
				line-height:30px;
				text-align:center;
				font-size:12px;
				color:#fff;
				text-shadow:#007dab 0 1px 0;
				background:#0092c8;
				-moz-border-radius:50px;
				-webkit-border-radius:50px;
				border-radius:50px;
				cursor:pointer;
				}
				
			#submitButton{
				border:0;
				padding:0 30px;
				height:30px;
				line-height:30px;
				text-align:center;
				font-size:12px;
				color:#fff;
				text-shadow:#007dab 0 1px 0;
				background:#0092c8;
				-moz-border-radius:50px;
				-webkit-border-radius:50px;
				border-radius:50px;
				cursor:pointer;
				}
				
			#login .forgot{text-align:right;font-size:11px;}
			#login .back{padding:1em 0;border-top:1px solid #eee;text-align:right;font-size:11px;}
			#login .error{
				float:left;
				position:absolute;
				left:95%;
				top:-5px;
				background:#890000;
				padding:5px 10px;	
				font-size:11px;
				color:#fff;
				text-shadow:#500 0 1px 0;
				text-align:left;
				white-space:nowrap;
				border:1px solid #500;
				-moz-border-radius:3px;
				-webkit-border-radius:3px;
				border-radius:3px;
				-moz-box-shadow:0 0 5px #700;
				-webkit-box-shadow:0 0 5px #700;
				box-shadow:0 0 5px #700;
				}


			/* //  login form */	
				.defaultbutton{
				border-color:#8E6AF5;border-width: 1px 1px 1px 15px;border-style: solid; -webkit-border-radius: 3px; -moz-border-radius: 3px;border-radius: 3px;font-size:12px;font-family:arial, helvetica, sans-serif; padding: 3px 3px 3px 3px; text-decoration:none; display:inline-block;text-shadow: -1px -1px 0 rgba(0,0,0,0.3);font-weight:bold; color: #FFFFFF;
				 background-color: #3093c7; background-image: -webkit-gradient(linear, left top, left bottom, from(#3093c7), to(#1c5a85));
				 background-image: -webkit-linear-gradient(top, #3093c7, #1c5a85);
				 background-image: -moz-linear-gradient(top, #3093c7, #1c5a85);
				 background-image: -ms-linear-gradient(top, #3093c7, #1c5a85);
				 background-image: -o-linear-gradient(top, #3093c7, #1c5a85);
				 background-image: linear-gradient(to bottom, #3093c7, #1c5a85);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#3093c7, endColorstr=#1c5a85);
				}

				.defaultbutton:hover{
				 border-top-color: #8E6AF5;border-right-color: #8E6AF5;border-bottom-color: #8E6AF5;border-left-color: #8E6AF5;border-width: 1px 15px 1px 1px;border-style: solid;
				 background-color: #26759e; background-image: -webkit-gradient(linear, left top, left bottom, from(#26759e), to(#133d5b));
				 background-image: -webkit-linear-gradient(top, #26759e, #133d5b);
				 background-image: -moz-linear-gradient(top, #26759e, #133d5b);
				 background-image: -ms-linear-gradient(top, #26759e, #133d5b);
				 background-image: -o-linear-gradient(top, #26759e, #133d5b);
				 background-image: linear-gradient(to bottom, #26759e, #133d5b);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#26759e, endColorstr=#133d5b);
				}	
			</style>
			
			<script type="text/javascript" src="jquery.js"></script>
			<link rel="stylesheet" href="styles.css" type="text/css" />
			<script type="text/javascript">
			$(document).ready(function(){
			
				var email_id="",uname="",mobile_no="";
				var url_get_link='<?php echo $url_link_val; ?>';
				$("#demo_show").click(function(){
					$("#shadow").fadeIn("normal");
					 $("#login_form").fadeIn("normal");
					 $("#user_name").focus();
				});
				$("#cancel_hide").click(function(){
					$("#login_form").fadeOut("normal");
					$("#shadow").fadeOut();
			   });
			   function validateEmail(sEmail) {
					var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
					if (filter.test(sEmail)) {
						return true;
					}
					else {
						return false;
					}
				}
				function validatePhone(txtPhone) {
					//var a = document.getElementById(txtPhone).value;
					var filter = /^[0-9-+]+$/;
					if (filter.test(txtPhone)) {
						return true;
					}
					else {
						return false;
					}
				}
				$('#email_id').blur(function(e) {
					uname=$("#user_name").val();
					email_id=$("#email_id").val();
				   if (validateEmail(email_id)) {
					   //$('#email_id_sign').html('Valid');
					   //$('#email_id_sign').css('color', 'green');
				   }
				   else {
					  $('#email_id_sign').html('Invalid');
					  $('#email_id_sign').css('color', 'red');
				   }
				});
				$('#mobile_no').blur(function(e) {
					mobile_no=$("#mobile_no").val();
				   if (validatePhone(mobile_no)) {
					  // $('#mobile_no_sign').html('Valid');
					  // $('#mobile_no_sign').css('color', 'green');
				   }
				   else {
					  $('#mobile_no_sign').html('Invalid');
					  $('#mobile_no_sign').css('color', 'red');
				   }
				});
			   $("#login123").click(function(){
					if ($.trim(email_id).length == 0) 
					{
						alert('Please enter valid email address');
						e.preventDefault();
					}
					if (validateEmail(email_id)) 
					{
							
							if(url_get_link == "1")
							{
								url_get_link1="myownstudyportal.com [student]";
							}
							else if(url_get_link == "3")
							{
								url_get_link1="myownstudyportal.com [Demo]";
							}
							else if(url_get_link == "7")
							{
								url_get_link1="edutechindiaonline.com";
							}
							else if(url_get_link == "6")
							{
								url_get_link1="globaleduserver.com [student]";
							}
							else if(url_get_link == "9")
							{
								url_get_link1="globaleduserver.com [demo]";
							}
							else
							{
								url_get_link1="globaleduserver.com [student]";
							}
						    filename = "query/enquiry.php?uname="+uname+"&email_id="+email_id+"&mobile_no="+mobile_no+"&url_get_link="+url_get_link1;
							//alert(filename);
							$.ajax({
								url: filename,
								type: 'GET',
								dataType: 'html',
								success: function(data, textStatus, xhr) {
									  //alert(data);
									  if(data=='true')
									  {
										$("#login_form").fadeOut("normal");
										$("#shadow").fadeOut();
										$("#link1").show();$("#link2").show();
									  }
									  else
									  {
											$("#add_err").data("Wrong username or password");
									  }
									 // alert(data);
									},
									beforeSend:function()
									{
										 $("#add_err").data("Loading...")
									},
							});
							return false;
					}
					else 
					{
						alert('Invalid Email Address');
						e.preventDefault();
					}
				});
				$("#link1").hide();
				$("#link2").hide();
				 $("#demo_show").click(function(){
					//alert("hai");
					//$("#link1").show();$("#link2").show();
				 });
			});
			</script>
			</head>
			<body>
			<?php
			if($error != "")
			{
				echo $error."<br/>";
			}
			?>
			
			<form id="login" method="post" action=""> 
				
				<h1>
				<center><b>
				Integrated Diagnostic Adaptive Learning Programme [IDALP]
				</b></center>
				<br/>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span style="font-size:16px;">
				<!--<img src="images/edutech_logo1.JPG" style="width:;height:"/>-->
				<center><b>
				Log in to<strong> Your account!</strong></b></center>
				</span>
				<br/>
				</h1>
			 <!--   <p class="register">Not a member? <a href="register.php">Register here!</a></p>		-->
				
				<div>
					<label for="login_username">Username</label> 
					<input type="text" name="username" id="login_username" class="field required" title="Please provide your username" value="<?php echo $name; ?>"/>
				</div>			

				<div>
					<label for="login_password">Password</label>
					<input type="password" name="password" id="login_password" class="field required" title="Password is required" value="<?php echo $password; ?>" />
				</div>
				<div class="submit">
					<input type="submit" value="Login" name="submit-login" id="submitButton" class="defaultbutton"/>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<!--<a href="#" id="login_a" style="font-size:20px;color:red;">Parent Login</a>
					<a href="user_manual.php" style="color:blue;font-size:150%;" class="link">Download User Manual</a>-->
					<a href="forgotPassword.php" style="color:blue;font-size:150%;" class="link">Forgot Password</a>
				</div>  
			</form>
			<input type="submit" name="demo_show" class="defaultbutton" id="demo_show" value="Click Here For A Demo" />
			<?php
				if($url_link_val == 1)
				{	
					include 'login_check1.php';
				}
				else if($url_link_val == 3)
				{
					include 'login_check1.php';
				}
				else 
				{
					include 'login_check2.php';
				}
			?>
			<div id="login_form">
				<div class="err" id="add_err"></div>
				<form action="" style="width:400px;">
					<table style="background-color:#0174DF;border:2px solid;width:400px;">
						<tr>
							<td>
								<center><strong><label style="color:white">INQUIRY</label></strong></center>
							</td>
						</tr>
					</table>
					<table style="background-color:#0174DF;border:2px solid;width:400px;">
						<tr>
							<td style="float:left">
								<strong><label style="padding-top:12px;padding-left:5px;color:white">Name</label></strong>
							</td>
							<td>
								<input type="text" id="user_name" class="text_enquiry" name="user_name" />
							</td>
							
						</tr>
						<tr>
							<td style="float:left">
								<strong><label style="padding-top:12px;padding-left:5px;color:white">Email-id</label></strong>
							</td>
							<td>
								<input type="text" id="email_id" class="text_enquiry" name="email_id" /></label>
							</td>
							
						</tr>
						<tr>
							<td style="float:left">
								<strong><label style="padding-top:12px;padding-left:5px;color:white">Mobile-No</label></strong>
							</td>
							<td>
								<input type="text" id="mobile_no" class="text_enquiry" name="mobile_no" />
							</td>
						</tr>
						<tr>
							<td>
							</td>
							<td style="padding-top:20px;">
								<table>
									<tr>
										<td>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class="defaultbutton" name="parent_login" id="login123" value="Submit" />
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<input type="button" class="defaultbutton" id="cancel_hide" value="Cancel" />
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</form>
			</div>
			<div id="shadow" class="popup"></div>
			<?php
				if(isset($_POST['submit-login']))
				{
					$user=$_POST['username'];
					$password=$_POST['password'];
					$_SESSION['username']=$user;
					$result=mysql_query("SELECT u.id,sd.edutech_student_id,sd.standard_id,sd.batch_id,sd.group_id,u.name, 
					sd.board_id,sd.branch_id,u.student_photos FROM USER u,student_details sd WHERE u.id=sd.user_id AND u.username='$user' AND u.password='$password'");
					function getUserIP()
					{
					   $client  = @$_SERVER['HTTP_CLIENT_IP'];
					   $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
					   $remote  = $_SERVER['REMOTE_ADDR'];

					   if(filter_var($client, FILTER_VALIDATE_IP))
					   {
						   $ip = $client;
					   }
					   elseif(filter_var($forward, FILTER_VALIDATE_IP))
					   {
						   $ip = $forward;
					   }
					   else
					   {
						   $ip = $remote;
					   }

					   return $ip;
					}
					$user_ip = getUserIP();
					//echo $user_ip;
					//$query=mysql_query("INSERT INTO access_log (username) VALUES ('$user')");
					//$query=mysql_query("INSERT INTO access_log (`username`,`Ipaddress`,`user_id`) VALUES ('$user','$user_ip','$row[0]')");
					
					$row=mysql_fetch_array($result);
					
					if($row)
					{
						$query=mysql_query("INSERT INTO access_log (`username`,`Ipaddress`,`user_id`) VALUES ('$user','$user_ip','$row[0]')");
						$studid = $row[1];
						$stnd= $row[2];
						$grp = $row[4];
						$btch = $row[3];
						$stud_id = $row[0];
						$name5 = $row[5];
						$board = $row[6];
						$branch = $row[7];
						$student_photos = $row[8];
						$_SESSION['studid1']=$studid;
						$_SESSION['stnd1']=$stnd;
						$_SESSION['grp1']=$grp;
						$_SESSION['btch1']=$btch;
						$_SESSION['sid']=$stud_id;
						$_SESSION['uname']=$name5;
						$_SESSION['board']=$board;
						$_SESSION['branch']=$branch;
						$_SESSION['student_photos']=$student_photos;
					}	
				}
			?>
			<div style="padding-top:30px;"><b>This site Works Best with Google Chrome.</div>
			<div>and Screen Resolution of (1366x768)  </b></div>
			</body>
			</html>
		<?php
			}
?>