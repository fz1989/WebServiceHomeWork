<?php
	header('Content-Type: text/html; charset=utf-8');
?>
<html>
	<META http-equiv='Content-Type' content='text/html; charset=utf-8'>
	<head>
		<script src="webserviceHomework.js" type="text/javascript"></script>
	</head>
	<body>
		<center>
			<h3>航空订票系统欢迎您的到来</h3>
			<br></br>
			<form name = "flightInfo"> 
				<p>起飞地：<input type = "text" id = "dest" /></p>
				<p>降落地：<input type = "text" id = "src" /></p> 
				<p>日期：<input type = "text" id = "setOffDate" /></p> 				
				<input type="button" value="查询" onClick="getFlightInfo()">
			</form> 
			<div id="rtl"></div>
		</center>
	</body>
</html>