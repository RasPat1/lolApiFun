<?php

echo "Enter Summoner Name:";
$handle = fopen ("php://stdin", "r");
$line = fgets($handle);

// html encode summer names
$sName = htmlentities(trim($line));
$reqURL = "https://na.api.pvp.net/api/lol/na/v1.4/summoner/by-name/";

include_once "authVars.php";
$apiKey = getenv('API_KEY');

// map query param names to values
$data = array("api_key" => $apiKey);

$urlParams = http_build_query($data);

$url = $reqURL . $sName . "?" . $urlParams;


// Remember when getting serious to try to use multi curl
// http://www.phpied.com/simultaneuos-http-requests-in-php-with-curl/
$ch = curl_init($url);
$fp = fopen("summoner_" . $sName, "w");

curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_HEADER, 0);

curl_exec($ch);
curl_close($ch);
fclose($fp);