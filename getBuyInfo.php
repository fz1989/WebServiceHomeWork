<?php
header('Content-Type: text/html; charset=utf-8');
try {
	$flightNum = $_POST["flightNum"];
	$requireNum = $_POST["requireNum"];
    $client = new SoapClient(null,
        array('location' =>"http://219.245.98.140/soapserver.php",'uri' => "http://127.0.0.1/")
    );
    echo $client->getBuyInfo($flightNum, $requireNum);

} catch (SoapFault $fault){
    echo "Error: ",$fault->faultcode,", string: ",$fault->faultstring;
}
?>
