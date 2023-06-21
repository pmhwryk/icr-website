<?php
    if (!function_exists('send')) {
        function send($to, $message) {
            if(isset($message['data']) && !empty($message['data'])) {
        	    date_default_timezone_set("Asia/Karachi");
        	    $file_name =FIREBASE_API_LINK.'flexfit-91d4b-firebase-adminsdk-ok5b0-d3271cd166.json';
                putenv('GOOGLE_APPLICATION_CREDENTIALS='.$file_name);
        	    $client = new Google_Client();
        	    $client->useApplicationDefaultCredentials();
        	    $client->addScope('https://www.googleapis.com/auth/firebase.messaging');
        	    $httpClient = $client->authorize();
        	    $project = "flexfit-91d4b";
                // Creates a notification for subscribers to the debug topic
        	    $message = [
            	    "message" => [
            	        "token" => $to,
            	        "data" => $message['data'],
            	    ],
            	];
            	/*echo "<br>";
            	print_r($message);echo "<br><br><br>";*/
            	$response = $httpClient->post("https://fcm.googleapis.com/v1/projects/{$project}/messages:send", ['json' => $message]);
            	/*	print_r($response);
                echo "<br><br>";
            	$stream = $response->getBody();
                $contents = $stream->getContents(); // returns all the contents
                $contents = $stream->getContents(); // empty string
                $stream->rewind(); // Seek to the beginning
                $contents = $stream->getContents();
                echo "<br><br>stream<br>";
                print_r($stream);echo "<br><br>";
                echo "<br><br>contents<br>";
                print_r($contents);echo "<br><br>";*/
            }
        }
    }
    if(isset($fcmToken) && !empty($fcmToken) && isset($data) && !empty($data)) {
        require_once FIREBASE_API_LINK.'google-api-php-client/vendor/autoload.php';
        $fcmToken = array_unique($fcmToken);
    	foreach ($fcmToken as $key => $value):
        	send($value, $data);
        endforeach;
    }
?>