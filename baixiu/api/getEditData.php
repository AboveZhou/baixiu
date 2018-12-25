<?php
require_once "../common/mysql.php";
$id = $_POST['id'];
$name = $_POST['name'];
$slug = $_POST['slug'];
$classname= $_POST['classname'];
$conn=connect() ;
$sql = "update categories set slug='$slug',name='$name',classname='$classname' where id = $id";
$result = mysqli_query($conn,$sql);
$res = array('code'=>0,'msg'=>'编辑失败');
if($result) {
$res['code']=1;
$res['msg']="编辑成功";
}
//返回json格式数据
echo json_encode($res);

