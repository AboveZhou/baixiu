<?php
require_once "../common/mysql.php";
$category = $_POST['category'];
$status = $_POST['status'];
$currentPage = $_POST['currentPage'];
$pageSize = $_POST['pageSize'];
$offSet = ($currentPage-1)*$pageSize;
// echo $offSet;
$conn=connect() ;
//因为请求页面进来的时候  $category  和  $status 的状态值都是all  所以需要定义一个where
$where = " where 1 = 1 " ;
//如果$category  和  $status的值不是all  需要做字符串拼接
if ($category != 'all') {
  $where .= " and p.category_id = '$category' ";
}
if ($status != 'all') {
  $where .= " and p.status = '$status' ";
}
$sql = "select p.title,p.created,p.status,cat.name,u.nickname from posts as p
join categories as cat on cat.id = p.category_id
join users as u on u.id = p.user_id
$where
limit $offSet,$pageSize";
$resu = query($conn,$sql);
//从数据库中获取文章总的篇数
$countSql = "select count(*) as count from posts as p $where";
$count = query($conn,$countSql)[0]['count'];
$res = ['code'=>0,'msg'=>'获取数据失败'];

if($resu) {
$res['code']=1;
$res['msg']="数据添加成功";
$res['data']=$resu;
$res['count']=$count;
}

echo json_encode($res);




?>