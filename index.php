<?php

//phpinfo();

$request = '<?xml version="1.0" encoding="utf-8"?> <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
  <soap:Body>
    <GetPanStatus xmlns="https://www.cvlkra.com/">
      <panNo>EX52AD4RO9</panNo>
      <userName>userName</userName>
      <PosCode>PosCode</PosCode>
      <password>WuGK0fx%2bq9jxagsjgX6n%2fg6Kh4jIAvtYxo8Uie2Xd2TpHYgcxR%2fjkA%3d%3d</password>
      <PassKey>12345</PassKey>
    </GetPanStatus>
  </soap:Body>
</soap:Envelope>';

$action_URL = 'https://www.cvlkra.com/GetPANDetails';
//$action_URL = 'https://www.cvlkra.com/GetPANFetch';
$wsdl = 'http://test.cvlkra.com/paninquiry.asmx?WSDL';
$location_URL="http://test.cvlkra.com/paninquiry.asmx";
//$action_URL = 'GetPassword';

$client = new SoapClient($wsdl, array(
            "location" => $location_URL,
            "uri"      => "",
            "trace"    => 1,
    ));
    $data = $client->__doRequest($request,$location_URL,$action_URL,1);


echo '<br/>===Request==='.$request;

echo '<br/>===Response==='.$data;

//To Convert XML To Array
$xml = simplexml_load_string($data);
$json = json_encode($xml);
$array = json_decode($json,TRUE);
echo '<pre>';
print_r($array);

?>
