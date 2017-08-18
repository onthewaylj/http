<?php
//开启PHP fsockopen这个函数

//PHP fsockopen需要 PHP.ini 中 allow_url_fopen 选项开启。
//浏览器访问这个页面 即发送请求了  这种方式都用curl代替了
//get 方式
/*$fp = fsockopen('localhost', 80, $errno, $errstr, 10);//host 端口 错误码 错误消息 超时时间

if(!$fp){
	echo $errstr;die;
}

$http = "";
//请求行
$http = "GET /http/server.php?use=111&name=oop HTTP/1.1\r\n";//以\r\n结尾 固定格式 连接地址为绝对路径

//请求头
$http .= "Host: localhost\r\n";
$http .= "Connection: close\r\n\r\n";//close:返回结果后关闭连接 keep-alive 请求头结束：结尾两个\r\n

//get 请求方式没有请求体

fwrite($fp, $http);

$result = "";

while(!feof($fp)){
	$result .= fgets($fp);//默认一次取1k字节数据
}

echo  $result;*/


//post方式

$fp = fsockopen('localhost', 80, $errno, $errstr, 10);

if(!$fp){
	echo $errstr;exit();
}

$http = "";
//请求行
$http .= "POST /http/server.php HTTP/1.1 \r\n";
//请求头
$http .= "Host: localhost\r\n";
$http .= "Connection: close\r\n";
$http .= "Cookie: username=111;uid=2\r\n";
$http .= "User-agent: firefox\r\n";
$http .= "Content-type: application/x-www-form-urlencoded\r\n";//必须传
$http .= "Content-length: 31\r\n\r\n";//请求行和体中间两个\r\n strlen(trim("email=111@qq.com&username=admin"))

//请求体
$http .= "email=111@qq.com&username=admin\r\n";
//发送
fwrite($fp, $http);

$result = "";
while (!feof($fp)) {

	$result .= fgets($fp);
	
}

echo $result;

