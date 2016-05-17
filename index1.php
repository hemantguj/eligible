<?php

//phpinfo();
//http://test.cvlkra.com/paninquiry.asmx/GetPassword?password=%2f%2fqGiJcCQOSaWVRl3Cgbsg%3d%3d&PassKey=12345%20HTTP/1.1


//http://stackoverflow.com/questions/12298634/how-to-call-php-soap-client-dorequest   ---need to give answer

//WuGK0fx%2bq9jxagsjgX6n%2fg6Kh4jIAvtYxo8Uie2Xd2TpHYgcxR%2fjkA%3d%3d

//http://test.cvlkra.com/paninquiry.asmx?WSDL

$request = '<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
  <soap:Body>
    <GetPassword xmlns="https://www.cvlkra.com/">
      <password>%2f%2fqGiJcCQOSaWVRl3Cgbsg%3d%3d</password>
      <PassKey>12345</PassKey>
    </GetPassword>
  </soap:Body>
</soap:Envelope>';


$headers = array(             
    //"Content-type: text/xml; charset=utf-8", 
    "Accept: text/xml", 
    "Cache-Control: no-cache", 
    "Pragma: no-cache", 
    //"SOAPAction: GetPassword", 
    "Content-length: ".strlen($request),
); 

	$url = 'https://www.cvlkra.com/PanInquiry.asmx/GetPassword';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url); 
	//curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	//curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30); 
	
   //curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); 
    curl_setopt($ch, CURLOPT_POST, 1); 
    curl_setopt($ch, CURLOPT_POSTFIELDS, $request); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
   //curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: text/xml','Content-Type: text/xml'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $xmlResponse = curl_exec($ch); 

     
        $curl_errorno  = curl_errno($ch);
 
        if ($curl_errorno == CURLE_OK) {
            $curl_statuscode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        }
        $curl_errormsg  = curl_error($ch);
 
       
       curl_close($ch);
 echo '<br/>===Request==='.$request;
		
	echo '===Response==='.$xmlResponse;
	
	
	/*$xmlstring ='<string>pkDYKT2AfJAhjQ6Zt0FD2M35ljZC710x2%2fPpFgpoDzY%3d</string>';
	$xml = simplexml_load_string($xmlstring);
$json = json_encode($xml);
$array = json_decode($json,TRUE);
print_r($array);*/
?>
