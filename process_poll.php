<?php
	require 'Services/Twilio.php';
	// Connect to MySQL, and connect to the Database
	mysql_connect('http://162.243.98.130/', 'root', '') or die(mysql_error());
	mysql_select_db('poll') or die(mysql_error());

	// @start snippet
	// Check if values have been entered
	$digit = isset($_REQUEST['Digits']) ? $_REQUEST['Digits'] : null;
	$choices = array(
		'1' => 'Cheese',
		'2' => 'Pepperoni',
		'3' => 'Sausage',
		'4' => 'Pineapple_Bacon',
	);
	if (isset($choices[$digit])) {
		mysql_query("INSERT INTO `results` (`" . $choices[$digit] . "`) VALUES ('1')");
		$say = 'Thank you. Your choice has been tallied.';
	} else {
		$say = "Sorry, I don't have that topping.";
	}
	// @end snippet
	// @start snippet
    require 'Services/Twilio.php';
	$response = new Services_Twilio_Twiml();
	$response->say($say);
	$response->hangup();
	header('Content-Type: text/xml');
	print $response;
	// @end snippet

