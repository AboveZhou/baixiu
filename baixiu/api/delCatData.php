<?php

require_once "../common/mysql.php";
$id = $_POST['id'];
$conn=connect() ;
$sql = "delete from categories where id = $id";
$result = mysqli_query($conn,$sql);
$res = array('code'=>0,'msg'=>'删除失败');
if($result) {
$res['code']=1;
$res['msg']="删除成功";
}
//返回json格式数据
echo json_encode($res);




?>