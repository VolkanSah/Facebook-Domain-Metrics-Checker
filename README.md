# Facebook-Domain-Metrics-Checker
This PHP script uses the Facebook Graph API to retrieve engagement metrics for a specific domain, including likes, shares, and comments.


- Code example in PHP that uses the Facebook Graph API to retrieve the number of likes, shares, and comments for a specific domain.
```php
$access_token = "your-access-token";
$domain = "https://example.com";

$request_url = "https://graph.facebook.com/v13.0/?id=" . urlencode($domain) . "&fields=engagement&access_token=" . $access_token;

$response = file_get_contents($request_url);
$json = json_decode($response, true);

$likes = $json['engagement']['reaction_count'];
$shares = $json['engagement']['share_count'];
$comments = $json['engagement']['comment_count'];

echo "Likes: " . $likes . "<br>";
echo "Shares: " . $shares . "<br>";
echo "Comments: " . $comments . "<br>";
```
## or use  Facebook PHP SDK

```json
{
  "require": {
    "facebook/graph-sdk": "^7.0"
  }
}
```
``` composer
composer install
```

```php

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
```
copyright Volkan Sah
