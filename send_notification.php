
 <form action="" method="post">
        <label for="txtmensagem">Message:</label>
        <input type="text" name="message" size="30"/>
        <input type="submit"  value="Send"/>
    </form>

<?php
// Put your device token here (without spaces):
$deviceToken = '2ea5de54089ba70767f77cdc2fbe0450495cb225a07fd0e6a8e0abdba7cfd55b';

// Put your private key's passphrase here:

$passphrase = 'MyApps';

// Put your alert message here:
 $message=isset($_POST['message']); 
//$message = 'Hi Matin Addhoc !A push notification has been sent!';

////////////////////////////////////////////////////////////////////////////////

$ctx = stream_context_create();
// must be include ck.pem file 
stream_context_set_option($ctx, 'ssl', 'local_cert', 'ck.pem');
stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);

// Open a connection to the APNS server
$fp = stream_socket_client('ssl://gateway.push.apple.com:2195', $err, $errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);

if (!$fp)
	exit("Failed to connect: $err $errstr" . PHP_EOL);

echo 'Connected to APNS' . PHP_EOL;

// Create the payload body
$body['aps'] = array(
	'alert' => array(
        'body' => $message,
		'action-loc-key' => 'Bango App',
    ),
    'badge' => 2,
	'sound' => 'oven.caf',
	);

// Encode the payload as JSON
$payload = json_encode($body);

// Build the binary notification
$msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;

// Send it to the server
$result = fwrite($fp, $msg, strlen($msg));

if (!$result)
	echo $message.'Message not delivered' . PHP_EOL;
else
	echo $message.'Message successfully delivered' . PHP_EOL;

// Close the connection to the server
fclose($fp);


?>