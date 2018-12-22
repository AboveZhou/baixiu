<?php
//获取邮箱和密码
$email=$_POST["email"];
$password = $_POST["password"];
//连接数据库
//传入文件  调用函数
include_once "../common/mysql.php";
$conn  = connect();
$sql = "select * from users WHERE email = '$email' and `password` = '$password' and `status` = 'activated'";
$loginArr = query($conn,$sql);
// print_r($loginArr);
//定义一个初始化数组  $res
$res = ["code"=>0,"msg"=>"登陆失败"];
if($loginArr) {
  $res["code"]=1;
  $res["msg"]="登陆成功";
  session_start();
  $_SESSION["userInfo"]=$loginArr[0];
}
echo json_encode($res);

?>