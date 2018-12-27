<?php
function connect() {
  $conn = mysqli_connect("localhost","root","root","baixiu");
return $conn;
}

function query($conn,$sql) {
$result = mysqli_query($conn,$sql);
//定义一个空数组  如果不定义空数组  如果返回值是null  则$row为null,直接跳过循环,则没有return返回值,就会报错
$arr=[];
while($row=mysqli_fetch_assoc($result)){
  $arr[]=$row;
}
return $arr;
}
?>