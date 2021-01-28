<?php 

$basic  = new \Vonage\Client\Credentials\Basic(VONAGE_API_KEY, VONAGE_API_SECRET);
$client = new \Vonage\Client(new \Vonage\Client\Credentials\Container($basic));

$request = new \Vonage\Verify\Request(NUMBER, BRAND_NAME);
$response = $client->verify()->start($request);

echo "Started verification, `request_id` is " . $response->getRequestId();

?>