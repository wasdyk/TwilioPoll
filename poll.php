<?php
require 'Services/Twilio.php';
$response = new Services_Twilio_Twiml();
$gather = $response->gather(array(
	'action' => 'http://162.243.98.130/process_poll.php',
	'method' => 'GET',
	'numDigits' => '1'
));
$gather->say("What project should win first prize at Hack RU?");
$gather->say("If You Would Like Cheese Pizza Press 1");
$gather->say("If You Would Like Pepperoni Pizza Press 2");
$gather->say("If You Would Like Sausage Pizza Press 3");
$gather->say("If You Would Like Pineapple Pizza and Canadian Bacon Press 4");

header('Content-Type: text/xml');
print $response;
?>