
<?php
session_start();
//用isset检测  如果没有$_SESSION["userInfo"]这个变量,则跳转到登陆页面
if(!isset($_SESSION["userInfo"])){
    header("location:login.php");
}
?>