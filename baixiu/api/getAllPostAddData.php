<?php
require_once "../common/mysql.php";

$title = $_POST['title'];

$content = $_POST['content'];
// print_r($content);
$slug = $_POST['slug'];

$category = $_POST['category'];

$created = $_POST['created'];

$status = $_POST['status'];

// print_r($_FILES);
$str = strrchr($_FILES['file']['name'],'.');
$filename = time().mt_rand(1000,9999).$str;
$bool = move_uploaded_file($_FILES['file']['tmp_name'],"../static/uploads/".$filename);
$feature = "../static/uploads/".$filename;
$conn=connect() ;
$sql = "insert into posts(slug,title,feature,created,content,status,category_id) values('$slug','$title','$feature','$created','$content','$status','$category')";
$resu = mysqli_query($conn,$sql);
// var_dump($resu);
$res = array('code'=>0,'msg'=>"上传失败");
if($resu) {
$res['code'] = 1;
$res['msg'] = "上传成功";
$res['src'] = $feature;
}
echo json_encode($res);
?>