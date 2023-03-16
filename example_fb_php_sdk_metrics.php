<?php
require_once 'path/to/facebook-php-sdk/autoload.php';

use Facebook\Facebook;

$access_token = 'your-access-token';
$domain = 'https://example.com';

$fb = new Facebook([
  'app_id' => 'your-app-id',
  'app_secret' => 'your-app-secret',
  'default_graph_version' => 'v13.0',
  'default_access_token' => $access_token,
]);

try {
  $response = $fb->get('/?id=' . urlencode($domain) . '&fields=engagement');
  $json = $response->getDecodedBody();

  $likes = $json['engagement']['reaction_count'];
  $shares = $json['engagement']['share_count'];
  $comments = $json['engagement']['comment_count'];

  echo "Likes: " . $likes . "<br>";
  echo "Shares: " . $shares . "<br>";
  echo "Comments: " . $comments . "<br>";
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
}
