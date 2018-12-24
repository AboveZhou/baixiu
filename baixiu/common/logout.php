<?php
//退出   先开启session  然后清除session  最后跳转到登陆页面
session_start();
session_destroy();
header("location:../admin/login.php");
?>