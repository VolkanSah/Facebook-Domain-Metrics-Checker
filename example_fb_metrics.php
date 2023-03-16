<?php
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
