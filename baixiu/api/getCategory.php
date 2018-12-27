<?php

require_once "../common/mysql.php";
$conn=connect() ;
$sql = "select * from categories";
$result = query($conn,$sql);
$res = array('code'=>0,'msg'=>'删除失败');
if($result) {
$res['code']=1;
$res['msg']="删除成功";
$res['data']= $result;
}
//返回json格式数据
echo json_encode($res);


?>