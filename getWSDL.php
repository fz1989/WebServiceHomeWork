<?php
	include("SoapDiscovery.class.php");
	include("soapserver.php");
	$disco = new SoapDiscovery('Service', 'flightINfo'); //第一个参数是类名（生成的wsdl文件就是以它来命名的），即Service类，第二个参数是服务的名字（这个可以随便写）。 
	$ret =  $disco->getWSDL();
?>