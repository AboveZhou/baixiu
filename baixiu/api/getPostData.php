<?php
require_once "../common/mysql.php";
$currentPage = $_POST['currentPage'];
$pageSize = $_POST['pageSize'];
$offSet = ($currentPage-1)*$pageSize;
// echo $offSet;
$conn=connect() ;
$sql = "select p.title,p.created,p.status,cat.name,u.nickname from posts as p
join categories as cat on cat.id = p.category_id
join users as u on u.id = p.user_id
limit $offSet,$pageSize";
$result = query($conn,$sql);
//从数据库中获取文章总的篇数
$countSql = "select count(*) as count from posts";
$count = query($conn,$countSql)[0]['count'];
$res = ['code'=>0,'msg'=>'获取数据失败'];

if($result) {
$res['code']=1;
$res['msg']="数据添加成功";
$res['data']=$result;
$res['count']=$count;
}

echo json_encode($res);




?>