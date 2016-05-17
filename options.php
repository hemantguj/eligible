<?php
/*public ExtendedClient extends SoapClient {

   function __construct($wsdl, $options = null) {
      parent::__construct($wsdl, $options);
   }

   function __doRequest($request, $location, $action, $version) {
      //doRequest
      return parent::__doRequest($request, $location, $action, $version);
   }

   
}
*/
$request = '<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
  <soap:Body>
    <GetPassword xmlns="https://www.cvlkra.com/">
      <password>%2f%2fqGiJcCQOSaWVRl3Cgbsg%3d%3d</password>
      <PassKey>12345</PassKey>
    </GetPassword>
  </soap:Body>
</soap:Envelope>';
		
$location = 'https://www.cvlkra.com/PanInquiry.asmx';
$action = 'https://www.cvlkra.com/GetPassword';
$client = new SoapClient();
$response = $client->__doRequest($request, $location, $action, '1');
echo $response;



/////////

$xml=simplexml_load_file("note.xml") or die("Error: Cannot create object");
print_r($xml);


/////
$xml = simplexml_load_string($xmlstring);
$json = json_encode($xml);
$array = json_decode($json,TRUE);

?>