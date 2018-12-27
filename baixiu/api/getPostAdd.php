<?php
// print_r($_FILES);
$str = strrchr($_FILES['file']['name'],'.');
$filename = time().mt_rand(1000,9999).$str;
$bool = move_uploaded_file($_FILES['file']['tmp_name'],"../static/uploads/".$filename);
$res = array('code'=>0,'msg'=>"上传失败");
if($bool) {
$res['code'] = 1;
$res['msg'] = "上传成功";
$res['src'] = "/static/uploads/".$filename;
}


echo json_encode($res);

?>