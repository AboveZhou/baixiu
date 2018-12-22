<?php
$categoriesId= $_POST["categoriesId"];
// echo $categoriesId;
$currentPage=$_POST["currentPage"];
$pageSize = $_POST["pageSize"];
$offset = ($currentPage-1)*$pageSize;
include_once "../common/mysql.php";
//链接服务器
$connect  = connect();
$sql =  "SELECT p.id,p.title,p.feature,p.created,p.content,p.views,p.likes,u.nickname,c.name,
(select count(*) from comments where comments.post_id = p.id) as commentsCount
from posts as p
join users as u on p.user_id = u.id
join categories as c on p.category_id = c.id
where p.category_id =$categoriesId
limit $offset,$pageSize";
$poststArr = query($connect,$sql);
$countSql = "select count(id) as countId from posts as p where p.category_id= $categoriesId";
$countArr = query($connect,$countSql);
// print_r($countArr);
$res=["code"=>0,"msg"=>"获取数据失败"];
//如果$poststArr存在  则给它重新赋值  获取数据成功  
if($poststArr) {
  $res["code"]=1;
$res["msg"]= "获取数据成功";
$res["data"]=$poststArr;
$res["count"]=$countArr[0]["countId"];
}

// print_r($res);
echo json_encode($res);



?>

