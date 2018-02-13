<?php
	
	
	$where_form_is="http://".$_SERVER['SERVER_NAME'].strrev(strstr(strrev($_SERVER['PHP_SELF']),"/"));

	//include_once 'config.php';
		
		$recipients = 'sanjay.edutech@gmail.com';

		$headers['From']    = 'sanjay.edutech@gmail.com';
		$headers['To']      = 'sanjay.edutech@gmail.com';
		$headers['Subject'] = 'Test message';

		$body = 'Test message';

?>