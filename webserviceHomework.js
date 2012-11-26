function InitAjax()
		{
			var ajax=false;
			try {
				ajax = new ActiveXObject("Msxml2.XMLHTTP");
			} catch (e) {
				try {
					ajax = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (E) {
					ajax = false;
				}
			}
			if (!ajax && typeof XMLHttpRequest!='undefined') {
				ajax = new XMLHttpRequest();
			}
			return ajax;
		}
		function getFlightInfo()
		{
			var rtl = document.getElementById("rtl");
			var dest = document.getElementById("dest").value;
			var src = document.getElementById("src").value;
			var setOffDate = document.getElementById("setOffDate").value;
			//接收表单的URL地址 
			var url = "/getFlightInfo.php";	
			//需要POST的值，把每个变量都通过&来联接 
			var postStr = "dest="+ dest +"&src="+ src +"&setOffDate="+ setOffDate;
			//实例化Ajax
			var ajax = InitAjax();
			//通过Post方式打开连接 
			ajax.open("POST", url, true);
			//定义传输的文件HTTP头信息 
			ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
			//发送POST数据 
			ajax.send(postStr);
			
			//获取执行状态 
			ajax.onreadystatechange = function() {
				//如果执行状态成功，那么就把返回信息写到指定的层里 
				if (ajax.readyState == 4 && ajax.status == 200) {
					rtl.innerHTML = ajax.responseText;
				}
			}
		}
		function getBuyInfo()
		{
			var rtl = document.getElementById("rtl");
			var flightNum = document.getElementById("flightNum").value;
			var requireNum = document.getElementById("requireNum").value;
			//接收表单的URL地址 
			var url = "/getBuyInfo.php";	
			//需要POST的值，把每个变量都通过&来联接 
			var postStr = "flightNum="+ flightNum +"&requireNum="+ requireNum;
			//实例化Ajax
			var ajax = InitAjax();
			//通过Post方式打开连接 
			ajax.open("POST", url, true);
			//定义传输的文件HTTP头信息 
			ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
			//发送POST数据 
			ajax.send(postStr);
			
			//获取执行状态 
			ajax.onreadystatechange = function() {
				//如果执行状态成功，那么就把返回信息写到指定的层里 
				if (ajax.readyState == 4 && ajax.status == 200) {
					rtl.innerHTML = ajax.responseText;
				}
			}
		}