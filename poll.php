<?php
require 'Services/Twilio.php';
$response = new Services_Twilio_Twiml();
$gather = $response->gather(array(
	'action' => 'http://162.243.98.130/process_poll.php',
	'method' => 'GET',
	'numDigits' => '1'
));
$gather->say("What project should win first prize at Hack RU?");
$gather->say("Press 1 for project 1");
$gather->say("Press 2 for project 2");
$gather->say("Press 3 for project 3");
$gather->say("Press 4 for project 4");

header('Content-Type: text/xml');
print $response;
?>