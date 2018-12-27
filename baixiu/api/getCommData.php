<?php

require_once "../common/mysql.php";
$currentPage = $_POST['currentPage'];
$pageSize = $_POST['pageSize'];
$offset = ($currentPage-1)*$pageSize;
$conn = connect();
$sql = "select comm.author,comm.created,comm.content,comm.status,p.title from comments as comm
join posts as p on p.id = comm.post_id
limit $offset,$pageSize";
$result = query($conn,$sql);
// print_r($result);
//查询总共的评论条数
$countSql = "select count(*) as count from comments";
$count = query($conn,$countSql)[0]['count'];
$res = array('code'=>0,'msg'=>"获取数据失败");
if ($result) {
  $res['code'] = 1;
  $res['msg'] = "获取数据成功";
  $res['data'] = $result;
  $res['count'] = $count;
}

echo json_encode($res);











?>