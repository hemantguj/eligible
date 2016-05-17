<?php

//phpinfo();

$url = 'http://test.cvlkra.com/paninquiry.asmx/GetPassword?password=%2f%2fqGiJcCQOSaWVRl3Cgbsg%3d%3d&PassKey=12345%20HTTP/1.1';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url); 	
curl_setopt($ch, CURLOPT_POST, false);   
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$xmlResponse = curl_exec($ch); 

$curl_errorno  = curl_errno($ch);
if ($curl_errorno == CURLE_OK) {
$curl_statuscode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
}
$curl_errormsg  = curl_error($ch);
curl_close($ch);
echo '===Response==='.$xmlResponse;

$xml = simplexml_load_string($xmlResponse);
$json = json_encode($xml);
$array = json_decode($json,TRUE);
echo '<pre>';
print_r($array);
?>