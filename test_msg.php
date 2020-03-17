<?php 

$data = [
    'phone' => '+91 80 8867595833', // Receivers phone
    'body' => 'Hello, balaji!', // Message
];
$json = json_encode($data); // Encode data to JSON
// URL for request POST /message
$url = 'https://api.chat-api.com/message?token=q8z8dm42khczh0zq';
// Make a POST request
$options = stream_context_create(['http' => [
        'method'  => 'POST',
        'header'  => 'Content-type: application/json',
        'content' => $json
    ]
]);
// Send a request
$result = file_get_contents($url, false, $options);

?>