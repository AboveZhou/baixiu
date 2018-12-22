<?php
include_once "./common/mysql.php";
$listId = $_GET["listId"];
$connect  = connect();
$sql =  "SELECT p.title,p.feature,p.created,p.content,p.views,p.likes,u.nickname,c.name,
(select count(*) from comments where comments.post_id = p.id) as commentsCount
from posts as p
join users as u on p.user_id = u.id
join categories as c on p.category_id = c.id
where p.id =$listId
";
$detailArr = query($connect,$sql);
// print_r($detailArr);
?>






<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>阿里百秀-发现生活，发现美!</title>
    <link rel="stylesheet" href="static/assets/css/style.css">
    <link rel="stylesheet" href="static/assets/vendors/font-awesome/css/font-awesome.css">
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
     <!-- foreach 动态生成 -->
<?php  
foreach($detailArr as $value) : ?>
    <div class="article">
    <div class="breadcrumb">
        <dl>
            <dt>当前位置：</dt>
            <dd><a href="javascript:;"><?php echo $value['name'] ?></a></dd>
            <dd>变废为宝！将手机旧电池变为充电宝的Better RE移动电源</dd>
        </dl>
    </div>
    <h2 class="title">
        <a href="javascript:;"><?php echo $value['title'] ?></a>
    </h2>
    <div class="meta">
        <span><?php echo $value['nickname'] ?> 发布于 <?php echo $value['created'] ?></span>
        <p class="brief"><?php echo $value["content"] ?></p>
        <span>分类: <a href="javascript:;"><?php echo $value['name'] ?></a></span>
        <span>阅读: (<?php echo $value['views'] ?>)</span>
        <span>评论: (<?php echo $value['commentsCount'] ?>)</span>
    </div>
</div>


  <?php  endforeach   ?>


            



            <!-- <div class="article">
                <div class="breadcrumb">
                    <dl>
                        <dt>当前位置：</dt>
                        <dd><a href="javascript:;">奇趣事</a></dd>
                        <dd>变废为宝！将手机旧电池变为充电宝的Better RE移动电源</dd>
                    </dl>
                </div>
                <h2 class="title">
                    <a href="javascript:;">又现酒窝夹笔盖新技能 城里人是不让人活了！</a>
                </h2>
                <div class="meta">
                    <span>DUX主题小秘 发布于 2015-06-29</span>
                    <span>分类: <a href="javascript:;">奇趣事</a></span>
                    <span>阅读: (2421)</span>
                    <span>评论: (143)</span>
                </div>
            </div> -->




            <div class="panel hots">
                <h3>热门推荐</h3>
                <ul>
                    <li>
                        <a href="javascript:;">
                            <img src="static/uploads/hots_2.jpg" alt="">
                            <span>星球大战:原力觉醒视频演示 电影票68</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <img src="static/uploads/hots_3.jpg" alt="">
                            <span>你敢骑吗？全球第一辆全功能3D打印摩托车亮相</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <img src="static/uploads/hots_4.jpg" alt="">
                            <span>又现酒窝夹笔盖新技能 城里人是不让人活了！</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <img src="static/uploads/hots_5.jpg" alt="">
                            <span>实在太邪恶！照亮妹纸绝对领域与私处</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="footer">
            <p>© 2016 XIU主题演示 本站主题由 themebetter 提供</p>
        </div>
    </div>
</body>


</html>