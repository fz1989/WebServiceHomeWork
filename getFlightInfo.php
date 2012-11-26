<?php
header('Content-Type: text/html; charset=utf-8');
try {
	$dest = $_POST["dest"];
	$src = $_POST["src"];
	$setOffDate = $_POST["setOffDate"];
    $client = new SoapClient(null,
        array('location' =>"http://219.245.98.140/soapserver.php",'uri' => "http://127.0.0.1/")
    );
    echo $client->getFlightInfo($dest,$src,$setOffDate);

} catch (SoapFault $fault){
    echo "Error: ",$fault->faultcode,", string: ",$fault->faultstring;
}
?>
