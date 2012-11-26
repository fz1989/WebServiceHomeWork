<?php
header('Content-Type: text/html; charset=utf-8');
class Service {
	public function getFlightInfo($dest,$src,$date){
		$con = mysql_connect("localhost","root","fz1989");
		$ret = "";
		$header = "<p><table border='4'>
					<tr>
					<th>航班号</th>
					<th>票价</th>
					<th>剩余票数</th>
					<th>起飞时间</th>
					<th>降落时间</th>
					</tr>"; 
		if (!$con)
		{
			die('Could not connect: ' . mysql_error());
		}
		mysql_select_db("webservice", $con);
		$sql= "select * from flight where dest = '$dest' and src = '$src' and date ='$date'";
		$result = mysql_query($sql);
		while	($row = mysql_fetch_array($result))
		{
			if ($ret == "") {
				$ret = $ret . $header;
			}
			$ret = $ret . "<tr>";
			$ret = $ret . "<td>" . $row['flightNum'] . "</td>";
			$ret = $ret . "<td>" . $row['Price'] . "</td>";
			$ret = $ret . "<td>" . $row['remainNum'] . "</td>";
			$ret = $ret . "<td>" . $row['utime'] . "</td>";
			$ret = $ret . "<td>" . $row['dtime'] . "</td>";
			$ret = $ret . "</tr>";
		}
		if ($ret == "") {
			$ret = "<p>请重新在输入吧！</p>";
			return $ret;
		}
		$ret = $ret . "</table></p>";
		$ret = $ret . "<form name = \"BuyInfo\"> 
							<p>航班号：<input type = \"text\" id = \"flightNum\" /></p>
							<p>票数：<input type = \"text\" id = \"requireNum\" /></p> 				
							<p><input type=\"button\" value=\"买票\" onClick=\"getBuyInfo()\"></p>
						</form>
						";					
		mysql_close($con);
		return $ret;
	}

	public function getBuyInfo($flightNum, $needNum) {
		$ret = "";
		$con = mysql_connect("localhost","root","fz1989");
		$ret = ""; 
		if (!$con)
		{
			die('Could not connect: ' . mysql_error());
		}
		mysql_select_db("webservice", $con);
		$sql= "select * from flight where flightNum = '$flightNum'";
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);
		if ($row['remainNum'] < $needNum) {
			$ret = "<p>余票不足!</p>";
			return $ret;
		}
		$ret = "购买航班号为" . $flightNum . "的" . $needNum . "张票，总计" . $needNum * $row['Price'];
		$sql = "update flight set remainNum = remainNum - $needNum where flightNum = '$flightNum'";
		$result = mysql_query($sql);
		return $ret;
	}
}
$server = new SoapServer(null,array('uri'=>"http://219.245.98.140"));//This uri is your SERVER ip.
$server->setClass("Service");
$server->handle();


?>