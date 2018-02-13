<?php
//	include_once 'config.php';
	
	$where_form_is="http://".$_SERVER['SERVER_NAME'].strrev(strstr(strrev($_SERVER['PHP_SELF']),"/"));

	$studid = $_GET['dt'];
	$studid = trim($studid);

	$link = mysql_connect("localhost","edutechviewer34","edutechviewer34") or die(mysql_error());
//	$link = mysql_connect("localhost","root","") or die(mysql_error());
	mysql_select_db("learning34") or die(mysql_error());
	
	$studid = mysql_real_escape_string($studid, $link);
	
	if(!is_numeric($studid) || $studid == "" || $studid<=2050 || $studid >5257)
	{
		echo "Please enter your 4-digit Student ID written on your Test receipt.";
	}
	else
	{
		if(isset($studid))
		{
		$result=mysql_query("SELECT name,password,email,username FROM student WHERE edutech_student_id=".$studid);
		$rst=mysql_query("SELECT per FROM percentile WHERE edutech_id=".$studid);	
			$row=mysql_fetch_array($result);
			if($row != "")
			{
				$studid = $_GET['dt'];
				$student_email_id = $row['email'];
				$student_name = $row['name'];
				$student_username = $row['username'];
				$student_pass = $row['password'];
			}
			else
			{
	$studid = $student_email_id = $student_name = $student_username = $student_pass = "Not Found";
			}
			
			$rw=mysql_fetch_array($rst);
			if($rw != "")
			{
				$percentile_data = $rw['per'];				
			}
			else
			{
				$percentile_data = "Not Found";	
			}
			
			
		//	echo $student_username."   hh   ".$student_pass;
			$from_address = "info@globaledutest.com";
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'From: Global EduTest Ventures <info@globaledutest.com>' . "\r\n";

			if ($student_email_id != ""){
				/*mail($student_email_id,
				"Username and Password for JEE/NEET Mock Test on 3rd February 2013",
				"
				<html>
				<head>
					<title>
						Username and Password for JEE/NEET Mock Test on 3rd February 2013
					</title>
				</head>
				<body>
				Dear ". $student_name . ",<p></p><p></p>". 
			"You have successfully get your username and password for the JEE/NEET Mock and Readiness Test. ".
			"The details of the username and password are given as follows:<p></p><p></p>
			<table border=\"1\">
				<tr>
					<td>Your ID:</td><td> $studid</td>
				</tr>
				<tr>
					<td>Username:</td><td>$student_username </td>
				</tr>
				<tr>
					<td>Password:</td><td>$student_pass </td>
				</tr>
			</table>".
			" You can see the list of Edutech India branches at ".
			"<a href=\"http://www.edutechindiaonline.com/contact%20us.html\">www.edutechindiaonline.com/contactus.html</a><p></p><p></p>In case of any queries, please feel free to call and enquire at your nearest Edutech India center.<p></p><p>Regards<br>Test Associate<br>Global EduTest Ventures</p></body><html>", $headers
				);*/
			}
			
			else {
				//echo "You have not registered with your email address. Please contact at info@globaledutest.com";
			}
			
			if(is_numeric($studid) && $studid!="" && $studid>2050 && $studid <5000){
			//	echo "Username: " . $student_username . "   Password: " . $student_pass."<br/>";
			//	echo "Your Percentile is ".$percentile_data."%<br/>";
				echo "<br/><a href=\"pdf2server.php?dt1=" . $studid . "\">Click here to download your Diagnostic Test report directly.</a>";
			}
			else if(is_numeric($studid) && $studid!="" && $studid>5000 && $studid <5257){
			//	echo "Username: " . $student_username . "   Password: " . $student_pass."<br/>";
			//	echo "Your Percentile is ".$percentile_data."%<br/>";
			
				$result1=mysql_query("SELECT * FROM report_mapping WHERE stud_id IN
				(SELECT id FROM student WHERE edutech_student_id=".$studid.")");
				$row1=mysql_num_rows($result1);
				
				if($row1 == 0)
				{
					echo "Your score is still being processed due to certain errors in marking your OMR answer sheet. Please check back after some time.";
				}
				else
				{		
					echo "<br/>	Click here to download your Diagnostic Test report";
					echo "<br/><a href=\"pdf2server.php?dt1=" . $studid . "\"> Report (English).</a>";
					echo "<br/><a href=\"pdf2server2.php?dt1=" . $studid . "\"> Report (Gujarati).</a>";
				}
			}
			else 
			{
				echo "Incorrect Student ID specified. Please enter the student ID given on your receipt.";
			}
			
			
		//	include("confirm.html");
			//echo "Your Username and Password send your registered email address.<br/>";
			
		
		}
		else
		{
			echo "No Data found.";
		}
	}
?>