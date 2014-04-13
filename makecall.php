<?php
require 'Services/Twilio.php';

// Set our AccountSid and AuthToken
$sid = 'AC668fe1f2de4f29b979fa665b5e9bf7c5';
$token = 'dd940f389f0fa6f709fcc9430fcfb237';

// @start snippet
// List of phone numbers
$numbers = array('862-209-0221');
// @end snippet
// @start snippet
// Instantiate a client to Twilio's REST API
$client = new Services_Twilio($sid, $token);

foreach ($numbers as $number) {
	try {
		$call = $client->account->calls->create(
			'973-775-9990',									// Caller ID
			$number,												// Your friend's number
			'http://hackathonpoll.sip.twilio.com/poll.php'	 // Location of your TwiML
		);
		echo "Started call: $call->sid\n";
	} catch (Exception $e) {
		echo 'Error starting phone call: ' . $e->getMessage() . "\n";
	}
}
// @end snippet
?>