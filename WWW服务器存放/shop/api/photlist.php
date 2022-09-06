<?php
	//跨域请求设置，通用可以复制
    header('Content-Type: application/json;charset=utf-8');	
    header('Access-Control-Allow-Origin:*'); // *代表允许任何网址请求
    header('Access-Control-Allow-Methods:POST,GET,OPTIONS,DELETE'); // 允许请求的类型
    header('Access-Control-Allow-Credentials: true'); // 设置是否允许发送 cookies
    header('Access-Control-Allow-Headers: Content-Type,Content-Length,Accept-Encoding,X-Requested-with, Origin'); 
	header('Access-Control-Allow-Credentials: true');
	// Content-Type	application/json; charset=utf-8
	
	//设置允许自定义请求头的字段
	//返回请求的数据
	//$pid=isset($_GET["pid"])?$_GET["pid"]:0;
	$conn=mysqli_connect('127.20.4.30','root','lwn04301314') or die('database connected failed');
	mysqli_select_db($conn,"shop")or die("database do not exist");
	$sql1 = 'set names utf8';
	mysqli_query($conn,$sql1);
	$sql2="select * from product where is_hot=1";
	$result=mysqli_query($conn,$sql2);
	$arr=array();
	while($row=mysqli_fetch_assoc($result))
	{
		$row['attr']=json_decode($row['attr']);
		$arr[]=$row;
	}
	$arrfinal['result']=$arr;
	//$arr=array('name'=>'wzqget','age'=>241);
	echo json_encode($arrfinal);
	//echo $arr;
?>