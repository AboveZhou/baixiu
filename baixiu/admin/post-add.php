<?php
require_once "../common/isset_session.php";
?>





<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <title>Add new post &laquo; Admin</title>
    <link rel="stylesheet" href="../static/assets/vendors/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../static/assets/vendors/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../static/assets/vendors/nprogress/nprogress.css">
    <link rel="stylesheet" href="../static/assets/css/admin.css">
    <script src="../static/assets/vendors/jquery/jquery.js"></script>
    <script src="../static/assets/vendors/bootstrap/js/bootstrap.js"></script>
    <script src="../static/assets/vendors/nprogress/nprogress.js"></script>
    <script src="../static/assets/vendors/ckeditor/ckeditor.js"></script>

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
                <h1>写文章</h1>
            </div>
            <!-- 有错误信息时展示 -->
            <!-- <div class="alert alert-danger">
        <strong>错误！</strong>发生XXX错误
      </div> -->
            <form class="row" id="form">
                <div class="col-md-9">
                    <div class="form-group">
                        <label for="title">标题</label>
                        <input id="title" class="form-control input-lg" name="title" type="text" placeholder="文章标题">
                    </div>
                    <div class="form-group">
                        <label for="content">标题</label>
                        <textarea id="content" class="form-control input-lg" name="content" cols="30" rows="10" placeholder="内容"></textarea>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="slug">别名</label>
                        <input id="slug" class="form-control" name="slug" type="text" placeholder="slug">
                        <p class="help-block">https://zce.me/post/<strong>slug</strong></p>
                    </div>
                    <div class="form-group">
                        <label for="feature">特色图像</label>
                        <!-- show when image chose -->
                        <img class="help-block thumbnail" style="display: none">
                        <input id="feature" class="form-control" name="feature" type="file">
                    </div>
                    <div class="form-group">
                        <label for="category">所属分类</label>
                        <select id="category" class="form-control" name="category">
              <option value="1">未分类</option>
              <option value="2">潮生活</option>
            </select>
                    </div>
                    <div class="form-group">
                        <label for="created">发布时间</label>
                        <input id="created" class="form-control" name="created" type="datetime-local">
                    </div>
                    <div class="form-group">
                        <label for="status">状态</label>
                        <select id="status" class="form-control" name="status">
              <option value="drafted">草稿</option>
              <option value="published">已发布</option>
            </select>
                    </div>
                    <div class="form-group">
                        
                        <input id="btn-save" type="button" value="保存" class="btn btn-primary" type="submit">
                    </div>
                </div>
            </form>
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
            <li class="active">
                <a href="#menu-posts" data-toggle="collapse">
                    <i class="fa fa-thumb-tack"></i>文章<i class="fa fa-angle-right"></i>
                </a>
                <ul id="menu-posts" class="collapse in">
                    <li><a href="posts.php">所有文章</a></li>
                    <li class="active"><a href="post-add.php">写文章</a></li>
                    <li><a href="categories.php">分类目录</a></li>
                </ul>
            </li>
            <li>
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

    
    <script>
        NProgress.done()
    </script>
</body>
<script>
//上传文件提交事件用change
$('#feature').change(function(){
    // console.dir(this);
    var file = this.files[0];
    var formdata = new FormData();
    formdata.append("file",file);
    $.ajax({
        type: "post",
        url: "../api/getPostAdd.php",
        data: formdata,
        // 告诉jQuery不要去设置Content-Type请求头
        contentType:false,
        // 告诉jQuery不要去处理发送的数据
        processData:false,
        dataType: "json",
        success: function (res) {
            if (res.code==1) {
                $('.help-block').show();
                $('.help-block').attr("src",res.src);
            }
        }
    })

})


//富文本
//1.引入ckeditor.js文件
//2.文本域
//3.调用方法CKEDITOR.replace('id');

CKEDITOR.replace('content');

//给保存按钮注册点击事件
$('#btn-save').click(function(){
    CKEDITOR.instances.content.updateElement();

//    var data = $('#form').serialize();
//    console.log(data);
        var title = $('#title').val();
        var content = $('#content').val();
        var slug = $('#slug').val();
        var category = $('#category').val();
        var created = $('#created').val();
        var status = $('#status').val();

    var file = $('#feature')[0].files[0];
    // console.log(file);
    
    var formdata = new FormData();
    formdata.append("file",file);
    formdata.append("title",title);
    formdata.append("content",content);
    formdata.append("slug",slug);
    formdata.append("category",category);
    formdata.append("created",created);
    formdata.append("status",status);
    // formdata.append("data",data);
   $.ajax({
       type: "post",
       url: "../api/getAllPostAddData.php",
       data: formdata,
        // 告诉jQuery不要去设置Content-Type请求头
        contentType:false,
        // 告诉jQuery不要去处理发送的数据
        processData:false,
       dataType: "json",
       success: function (res) {
        //    console.log(res);
        if (res.code==1) {
        $('#title').val('');
        $('#content').val('');
         $('#slug').val('');
        //  $('#category').val('');
        //  $('#created').val('');
        // $('#status').val('');
        $('.help-block').hide();
        }
           
       }
   });
})


</script>
</html>