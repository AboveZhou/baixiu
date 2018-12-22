<?php
$id = $_GET["id"];
include_once "./common/mysql.php";
$connect  = connect();
$list_sql =  "SELECT p.id,p.title,p.feature,p.created,p.content,p.views,p.likes,u.nickname,c.name,
(select count(*) from comments where comments.post_id = p.id) as commentsCount
from posts as p
join users as u on p.user_id = u.id
join categories as c on p.category_id = c.id
where p.category_id =$id
limit 10";
$listArr = query($connect,$list_sql);






// $conn = mysqli_connect("localhost","root","root","baixiu");
// $list_sql = "SELECT p.title,p.feature,p.created,p.content,p.views,p.likes,u.nickname,c.name,
// (select count(*) from comments where comments.post_id = p.id) as commentsCount
// from posts as p
// join users as u on p.user_id = u.id
// join categories as c on p.category_id = c.id
// where p.category_id =$id
// limit 3";
// $list_result = mysqli_query($conn,$list_sql);
// while($row = mysqli_fetch_assoc($list_result)){
//     $listArr[] = $row;
// }
// print_r($listArr);
?>



<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>阿里百秀-发现生活，发现美!</title>
    <link rel="stylesheet" href="static/assets/css/style.css">
    <link rel="stylesheet" href="static/assets/vendors/font-awesome/css/font-awesome.css">
    <script src="./static/assets/vendors/jquery/jquery.js"></script>
    <script src="./static/assets/vendors/art-template/template-web.js"></script>
</head>

<body>
    <div class="wrapper">
        <div class="topnav">
            <ul>
                <li><a href="javascript:;"><i class="fa fa-glass"></i>奇趣事</a></li>
                <li><a href="javascript:;"><i class="fa fa-phone"></i>潮科技</a></li>
                <li><a href="javascript:;"><i class="fa fa-fire"></i>会生活</a></li>
                <li><a href="javascript:;"><i class="fa fa-gift"></i>美奇迹</a></li>
            </ul>
        </div>
        <?php 
      include_once "./common/aside.php";
      ?>
        <div class="content">
            <div class="panel new">
                <h3><?php echo $listArr[0]["name"] ?></h3>


                <?php foreach($listArr as $value) : ?>
                    <div class="entry"> 
                    <div class="head"> 
                        <span class="sort"><?php echo $value["name"] ?></span>
                        <a href="detail.php?listId=<?php echo $value["id"] ?>"><?php echo $value["title"] ?></a>
                    </div>
                    <div class="main">
                        <p class="info"><?php echo $value["nickname"] ?> 发表于 <?php echo $value["created"] ?></p>
                        <p class="brief"><?php echo $value["content"] ?></p>
                        <p class="extra">
                            <span class="reading">阅读(<?php echo $value["views"] ?>)</span>
                            <span class="comment">评论(<?php echo $value["commentsCount"] ?>)</span>
                            <a href="javascript:;" class="like">
                                <i class="fa fa-thumbs-up"></i>
                                <span>赞(<?php echo $value["likes"] ?>)</span>
                            </a>
                            <a href="javascript:;" class="tags"> 
                分类：<span><?php echo $value["name"] ?></span>
              </a>
                        </p>
                        <a href="javascript:;" class="thumb">
                            <img src="<?php echo $value["feature"] ?>" alt="">
                        </a>
                    </div>
                </div>



                <?php endforeach ?>
                <!-- <div class="entry">
                    <div class="head">
                        <a href="javascript:;">星球大战：原力觉醒视频演示 电影票68</a>
                    </div>
                    <div class="main">
                        <p class="info">admin 发表于 2015-06-29</p>
                        <p class="brief">星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯</p>
                        <p class="extra">
                            <span class="reading">阅读(3406)</span>
                            <span class="comment">评论(0)</span>
                            <a href="javascript:;" class="like">
                                <i class="fa fa-thumbs-up"></i>
                                <span>赞(167)</span>
                            </a>
                            <a href="javascript:;" class="tags">
                分类：<span>星球大战</span>
              </a>
                        </p>
                        <a href="javascript:;" class="thumb">
                            <img src="static/uploads/hots_2.jpg" alt="">
                        </a>
                    </div>
                </div> -->
                <!-- <div class="entry">
                    <div class="head">
                        <a href="javascript:;">星球大战：原力觉醒视频演示 电影票68</a>
                    </div>
                    <div class="main">
                        <p class="info">admin 发表于 2015-06-29</p>
                        <p class="brief">星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯</p>
                        <p class="extra">
                            <span class="reading">阅读(3406)</span>
                            <span class="comment">评论(0)</span>
                            <a href="javascript:;" class="like">
                                <i class="fa fa-thumbs-up"></i>
                                <span>赞(167)</span>
                            </a>
                            <a href="javascript:;" class="tags">
                分类：<span>星球大战</span>
              </a>
                        </p>
                        <a href="javascript:;" class="thumb">
                            <img src="static/uploads/hots_2.jpg" alt="">
                        </a>
                    </div>
                </div>
                <div class="entry">
                    <div class="head">
                        <a href="javascript:;">星球大战：原力觉醒视频演示 电影票68</a>
                    </div>
                    <div class="main">
                        <p class="info">admin 发表于 2015-06-29</p>
                        <p class="brief">星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯</p>
                        <p class="extra">
                            <span class="reading">阅读(3406)</span>
                            <span class="comment">评论(0)</span>
                            <a href="javascript:;" class="like">
                                <i class="fa fa-thumbs-up"></i>
                                <span>赞(167)</span>
                            </a>
                            <a href="javascript:;" class="tags">
                分类：<span>星球大战</span>
              </a>
                        </p>
                        <a href="javascript:;" class="thumb">
                            <img src="static/uploads/hots_2.jpg" alt="">
                        </a>
                    </div>
                </div> -->

<div class="loadmore">
<span class="btn">加载更多</span>

</div>
            </div>
        </div>
        <div class="footer">
            <p>© 2016 XIU主题演示 本站主题由 themebetter 提供</p>
        </div>
    </div>
</body>
<script type="text/template" id="tep">
{{each data}}
           <div class="entry">
                    <div class="head">
                        <a href="detail.php?listId={{$value.id}}">{{$value.title}}</a>
                    </div>
                    <div class="main">
                        <p class="info">{{$value.nickname}} 发表于 {{$value.created}}</p>
                        <p class="brief">{{$value.content}}</p>
                        <p class="extra">
                            <span class="reading">阅读({{$value.views}})</span>
                            <span class="comment">评论({{$value.commentsCount}})</span>
                            <a href="javascript:;" class="like">
                                <i class="fa fa-thumbs-up"></i>
                                <span>赞({{$value.likes}})</span>
                            </a>
                            <a href="javascript:;" class="tags">
                分类：<span>{{$value.name}}</span>
              </a>
                        </p>
                        <a href="javascript:;" class="thumb">
                            <img src="{{$value.feature}}" alt="">
                        </a>
                    </div>
                </div>
{{/each}}
</script>
<script>
//用location获取当前分类id
var categoriesId = location.search.split("=")[1];
// console.log(categoriesId);
//定义当前页数为1
var currentPage = 1;
//定义一页有多少条数据
var  pageSize = 10;
$('.loadmore>.btn').click(function(){
$.ajax({
    type:"post",
    url:"./api/getMorePost.php",
   data:{
       "categoriesId":categoriesId,
       "currentPage":++currentPage,
       "pageSize":10
   },
   dataType:"json",
   success:function(res){
// console.log(res);
if(res.code==1) {
    console.log(res.data);
    var html = template("tep",res)
        //将html加载在loadmore这个div前面
   $(html).insertBefore(".loadmore");

   var countPage = res.count;
//    console.log(countPage);
   var total = Math.ceil(countPage/pageSize);
   if (currentPage==total) {
       $(".loadmore").hide();
   }
   
}
   }
})
});




</script>
</html>