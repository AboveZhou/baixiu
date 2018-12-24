<?php
require_once "../common/mysql.php";
$conn=connect() ;
$sql = "select * from categories";
$catArr = query($conn,$sql);
$res= ["code"=>0,"msg"=>"请求数据失败"];
if($catArr){
    $res["code"]=1;
    $res["msg"]="请求成功";
    $res["data"]= $catArr;
}

echo json_encode($res);




?>