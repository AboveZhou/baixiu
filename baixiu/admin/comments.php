<?php
require_once "../common/isset_session.php";
?>


<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <title>Comments &laquo; Admin</title>
    <link rel="stylesheet" href="../static/assets/vendors/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../static/assets/vendors/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../static/assets/vendors/nprogress/nprogress.css">
    <link rel="stylesheet" href="../static/assets/css/admin.css">
    <script src="../static/assets/vendors/nprogress/nprogress.js"></script>
</head>

<body>
    <script>
        NProgress.start()
    </script>

    <div class="main">
    <?php
include_once "../common/admin-nav.php";
    ?>
        <!-- <nav class="navbar">
            <button class="btn btn-default navbar-btn fa fa-bars"></button>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="profile.php"><i class="fa fa-user"></i>个人中心</a></li>
                <li><a href="login.php"><i class="fa fa-sign-out"></i>退出</a></li>
            </ul>
        </nav> -->
        <div class="container-fluid">
            <div class="page-title">
                <h1>所有评论</h1>
            </div>
            <!-- 有错误信息时展示 -->
            <div class="alert alert-danger" style="display:none">
        <strong>错误！</strong> <span id="error"></span>
      </div>
            <div class="page-action">
                <!-- show when multiple checked -->
                <div class="btn-batch" style="display: none">
                    <button class="btn btn-info btn-sm">批量批准</button>
                    <button class="btn btn-warning btn-sm">批量拒绝</button>
                    <button class="btn btn-danger btn-sm">批量删除</button>
                </div>
                <ul class="pagination pagination-sm pull-right">
                  
                </ul>
            </div>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="text-center" width="40"><input type="checkbox"></th>
                        <th>作者</th>
                        <th>评论</th>
                        <th>评论在</th>
                        <th>提交于</th>
                        <th>状态</th>
                        <th class="text-center" width="100">操作</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <tr class="danger">
                        <td class="text-center"><input type="checkbox"></td>
                        <td>大大</td>
                        <td>楼主好人，顶一个</td>
                        <td>《Hello world》</td>
                        <td>2016/10/07</td>
                        <td>未批准</td>
                        <td class="text-center">
                            <a href="post-add.php" class="btn btn-info btn-xs">批准</a>
                            <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><input type="checkbox"></td>
                        <td>大大</td>
                        <td>楼主好人，顶一个</td>
                        <td>《Hello world》</td>
                        <td>2016/10/07</td>
                        <td>已批准</td>
                        <td class="text-center">
                            <a href="post-add.php" class="btn btn-warning btn-xs">驳回</a>
                            <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><input type="checkbox"></td>
                        <td>大大</td>
                        <td>楼主好人，顶一个</td>
                        <td>《Hello world》</td>
                        <td>2016/10/07</td>
                        <td>已批准</td>
                        <td class="text-center">
                            <a href="post-add.php" class="btn btn-warning btn-xs">驳回</a>
                            <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
                        </td>
                    </tr> -->
                </tbody>
            </table>
        </div>
    </div>
    <?php
include_once "../common/admin-aside.php";
    ?>
    <!-- <div class="aside">
        <div class="profile">
            <img class="avatar" src="../static/uploads/avatar.jpg">
            <h3 class="name">布头儿</h3>
        </div>
        <ul class="nav">
            <li>
                <a href="index.php"><i class="fa fa-dashboard"></i>仪表盘</a>
            </li>
            <li>
                <a href="#menu-posts" class="collapsed" data-toggle="collapse">
                    <i class="fa fa-thumb-tack"></i>文章<i class="fa fa-angle-right"></i>
                </a>
                <ul id="menu-posts" class="collapse">
                    <li><a href="posts.php">所有文章</a></li>
                    <li><a href="post-add.php">写文章</a></li>
                    <li><a href="categories.php">分类目录</a></li>
                </ul>
            </li>
            <li class="active">
                <a href="comments.php"><i class="fa fa-comments"></i>评论</a>
            </li>
            <li>
                <a href="users.php"><i class="fa fa-users"></i>用户</a>
            </li>
            <li>
                <a href="#menu-settings" class="collapsed" data-toggle="collapse">
                    <i class="fa fa-cogs"></i>设置<i class="fa fa-angle-right"></i>
                </a>
                <ul id="menu-settings" class="collapse">
                    <li><a href="nav-menus.php">导航菜单</a></li>
                    <li><a href="slides.php">图片轮播</a></li>
                    <li><a href="settings.php">网站设置</a></li>
                </ul>
            </li>
        </ul>
    </div> -->

    <script src="../static/assets/vendors/jquery/jquery.js"></script>
    <script src="../static/assets/vendors/bootstrap/js/bootstrap.js"></script>
    <script src="../static/assets/vendors/art-template/template-web.js"></script>
    <script src="../static/assets/vendors/twbs-pagination/jquery.twbsPagination.js"></script>
    <script>
        NProgress.done()
    </script>
</body>
<script type="text/template" id="dangerTpl">
{{each data}}
                    <tr class="danger">
                        <td class="text-center"><input type="checkbox"></td>
                        <td>{{$value.author}}</td>
                        <td style="width:400px">{{$value.content}}</td>
                        <td>{{$value.title}}</td>
                        <td>{{$value.created}}</td>
                        <td>
            
                            {{if($value.status=='held')}} 待审核
                            {{else if ($value.status=='approved')}}  准许
                            {{else if ($value.status=='rejected')}} 拒绝
                            {{else if ($value.status=='trashed')}} 回收站
                            {{/if}}

                        </td>
                        <td class="text-center">
                            <a href="post-add.php" class="btn btn-info btn-xs">批准</a>
                            <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
                        </td>
                    </tr>
{{/each}}
</script>
<script>
    var currentPage = 1;
    var pageSize = 20;
    var maxPage;
    //调用函数
    getPageData(currentPage,pageSize);
    //将ajax封装函数
    function getPageData(currentPage,pageSize) {
        $.ajax({
            type: "post",
            url: "../api/getCommData.php",
            data:{
                "currentPage":currentPage,
                "pageSize":pageSize
            },
            dataType: "json",
            success: function (res) {
                // console.log(res.data);
                if(res.code==1) {
                    var html = template("dangerTpl",res);
                    $('tbody').html(html);
                    maxPage = Math.ceil(res.count/pageSize);
                    // 因为ajax请求是异步操作  所以此时数据还没有返回来  需要将此操作放入到ajax请求成功后的操作中
                    //分页插件
                    // 1.插入插件js
                    // 2.准备一个ul  将其放入其中
                    // 3.调用方法渲染在页面上
                    $('.pagination').twbsPagination({
                    totalPages: maxPage,
                    visiblePages: 5,
                    first:"首页",
                    prev:"上一页",
                    next:"下一页",
                    last:"尾页",
                    onPageClick: function (event, page) {
                        //修改当前页面
                        currentPage = page;
                        getPageData(currentPage,pageSize);
                    }
                    });
                } else {
                    $('.alert').show();
                    $('#error').text(res.msg)
                }
            }
        })
    }

 



</script>
</html>