<?php

echo "Enter Summoner Name:";
$handle = fopen ("php://stdin", "r");
$line = fgets($handle);

$sName = trim($line);
$reqURL = "https://na.api.pvp.net/api/lol/na/v1.4/summoner/by-name/";

$apiKey = "PLACEHOLDER";

// map query param names to values
$data = array("api_key" => $APIKey);

$urlParams = http_build_query($data);

$url = $reqURL . $sName . $urlParams;

$ch = curl_init($url);
$fp = fopen("summoner_" . $sName, "w");

curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_HEADER, 0);

curl_exec($ch);
curl_close($ch);
fclose($fp);