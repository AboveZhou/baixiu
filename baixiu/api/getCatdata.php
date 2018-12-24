<?php
require_once "../common/mysql.php";
$name = $_POST['name'];
$slug = $_POST['slug'];
$classname= $_POST['classname'];
$conn=connect() ;
$countSql = "select count(*) as count from categories where name = '$name'";
$countArr = query($conn,$countSql);
// print_r($countArr);
$count = $countArr[0]['count'];
$res = ['code'=>0,'msg'=>'获取数据失败'];
//如果$count大于0 ,则说明名称重复   如果等于说明数据库内没有这个名称,就可以添加  然后再把数据添加到数据库
if ($count > 0) {
$res['msg']= '名称重复,请重新输入';
}else {
$insertSql = "insert into categories values(null,'$slug','$name','$classname')";
$result = mysqli_query($conn,$insertSql);
if($result) {
$res['code']=1;
$res['msg']="数据添加成功";
}
}
echo json_encode($res);



?>