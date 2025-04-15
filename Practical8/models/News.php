<?php
class News
{
    public function getNewsData()
    {
        $secrets = require __DIR__ . '/../secrets.php';
        $apiKey = $secrets['api_key'];
        $apiUrl = "https://newsdata.io/api/1/news?apikey={$apiKey}&country=my&category=business";
        $response = file_get_contents($apiUrl);
        if ($response === false) {
            return ["error" => "Failed to retrieve news. Try again later."];
        }
        $data = json_decode($response, true);
        if (!isset($data["results"]) || empty($data["results"])) {
            return [
                "error" => "No business news articles found. Try again later.",
            ];
        }
        return $data["results"]; // Return only the articles
    }
}
?>
