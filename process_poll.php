<?php
	require 'Services/Twilio.php';
	// Connect to MySQL, and connect to the Database
	$dbhost = '127.0.0.1';
	$dbuser = 'root';
	$dbpass = 'password';
	mysql_connect($dbhost, $dbuser, $dbpass) or die(mysql_error());
	mysql_select_db('poll') or die(mysql_error());

	// @start snippet
	// Check if values have been entered
	$digit = isset($_REQUEST['Digits']) ? $_REQUEST['Digits'] : null;
	$choices = array(
		'1' => 'Project1',
		'2' => 'Project2',
		'3' => 'Project3',
		'4' => 'Project4',
	);
	if (isset($choices[$digit])) {
		mysql_query("INSERT INTO results (`" . $choices[$digit] . "`) VALUES ('1')");
		$say = 'Thank you. Your choice has been tallied.';
	} else {
		$say = "Sorry, the option you've chosen isn't valid.";
	}
	// @end snippet
	// @start snippet
    $response = new Services_Twilio_Twiml();
	$response->say($say);
	$response->hangup();
	//header('Content-Type: text/xml');
	print $response;
	// @end snippet

?>