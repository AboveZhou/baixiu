<?php
require_once "../common/isset_session.php";




?>



<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <title>Categories &laquo; Admin</title>
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
                <h1>分类目录</h1>
            </div>
            <!-- 有错误信息时展示 -->
            <div class="alert alert-danger" style="display:none">
        <strong>错误！</strong><span id="error"></span>
      </div>
            <div class="row">
                <div class="col-md-4">
                    <form>
                        <h2>添加新分类目录</h2>
                        <div class="form-group">
                            <label for="name">名称</label>
                            <input id="name" class="form-control" name="name" type="text" placeholder="分类名称">
                        </div>
                        <div class="form-group">
                            <label for="slug">别名</label>
                            <input id="slug" class="form-control" name="slug" type="text" placeholder="slug">
                            <!-- <p class="help-block">https://zce.me/category/<strong>slug</strong></p> -->
                        </div>
                        <div class="form-group">
                            <label for="classname">类名</label>
                            <input id="classname" class="form-control" name="classname" type="text" placeholder="类名">
                            <!-- <p class="help-block">https://zce.me/category/<strong>slug</strong></p> -->
                        </div>
                        <div class="form-group">
                        
                            <input type="button" value="添加" class="btn btn-primary" id="btn">
                            <input type="button" value="编辑" class="btn btn-primary" id="edit-btn" style="display:none">
                            <input type="button" value="取消编辑" class="btn btn-primary" id="cancel-btn" style="display:none">
                        </div>
                    </form>
                </div>
                <div class="col-md-8">
                    <div class="page-action">
                        <!-- show when multiple checked -->
                        <a class="btn btn-danger btn-sm" href="javascript:;" style="display: none" id="delBtn">批量删除</a>
                    </div>
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="text-center" width="40"><input type="checkbox" id="allCheck"></th>
                                <th>名称</th>
                                <th>Slug</th>
                                <th>类名</th>
                                <th class="text-center" width="100">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <tr>
                                <td class="text-center"><input type="checkbox"></td>
                                <td>未分类</td>
                                <td>uncategorized</td>
                                <td>类名</td>
                                <td class="text-center">
                                    <a href="javascript:;" class="btn btn-info btn-xs">编辑</a>
                                    <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center"><input type="checkbox"></td>
                                <td>未分类</td>
                                <td>uncategorized</td>
                                <td>类名</td>
                                <td class="text-center">
                                    <a href="javascript:;" class="btn btn-info btn-xs">编辑</a>
                                    <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center"><input type="checkbox"></td>
                                <td>未分类</td>
                                <td>uncategorized</td>
                                <td>类名</td>
                                <td class="text-center">
                                    <a href="javascript:;" class="btn btn-info btn-xs">编辑</a>
                                    <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
                                </td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
            </div>
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
                    <li><a href="post-add.php">写文章</a></li>
                    <li class="active"><a href="categories.php">分类目录</a></li>
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

    <script src="../static/assets/vendors/jquery/jquery.js"></script>
    <script src="../static/assets/vendors/bootstrap/js/bootstrap.js"></script>
    <script>
        NProgress.done()
    </script>
</body>
<script src="../static/assets/vendors/jquery/jquery.js"></script>
<script src="../static/assets/vendors/art-template/template-web.js"></script>
<script type="text/template" id="cat">
{{each data}}

     
                            <tr  edit-id="{{$value.id}}">
                                <td class="text-center"><input type="checkbox"></td>
                                <td>{{$value.name}}</td>
                                <td>{{$value.slug}}</td>
                                <td>{{$value.classname}}</td>
                                <td class="text-center">
                                    <a href="javascript:;" class="btn btn-info btn-xs" id="edit">编辑</a>
                                    <a href="javascript:;" class="btn btn-danger btn-xs" id="del">删除</a>
                                </td>
                            </tr>
                       
{{/each}}
</script>
<script type="text/template" id="insert">

                            <tr edit-id="{{id}}">
                                <td class="text-center"><input type="checkbox"></td>
                                <td>{{name}}</td>
                                <td>{{slug}}</td>
                                <td>{{classname}}</td>
                                <td class="text-center">
                                    <a href="javascript:;" class="btn btn-info btn-xs" id="edit">编辑</a>
                                    <a href="javascript:;" class="btn btn-danger btn-xs" id="del">删除</a>
                                </td>
                            </tr>
                       
</script>
<script>
$.ajax({
    type: "post",
    url: "../api/getCatPost.php",
    data: "data",
    dataType: "json",
    success: function (res) {
        // console.log(res);
        if(res.code==1) {
            var html = template("cat",res);
            $("tbody").append(html) ;
        }
    }
})



//给添加按钮注册点击事件
$('#btn').click(function(){
    var name = $('#name').val();
    var slug = $('#slug').val();
    var classname = $('#classname').val();
  $.ajax({
      type: "post",
      url: "../api/getCatdata.php",
      data: {
          "name":name,
          "slug":slug,
          "classname":classname
          },
      dataType: "json",
      beforeSend: function() {
if(name.trim()==''||slug.trim()==''||classname.trim()=='') {
    $('.alert').show();
    $('#error').text("数据不完整,请填写完整");
    return false;
}
      },
      success: function (res) {
        //   console.log(res.id);
        if(res.code==1) {
var html = template("insert",{
         "id":res.id,
          "name":name,
          "slug":slug,
          "classname":classname
          });
         $('tbody').append(html);
         $('#name').val('');
         $('#classname').val('');
         $('#slug').val('');
         $('.alert').hide();
        } else if (res.code==0) {
            $('.alert').show();
    $('#error').text(res.msg);
        }     
      }
  })
})


//给动态生成的编辑按钮添加点击事件
//记录列表中的当前行
var currentRow = null;
$('tbody').on('click','#edit',function(){
    //获取当前行  即当前tr
    currentRow = $(this).parent().parent();
    //获取当前行的id
    var editId = currentRow.attr('edit-id');
    // alert(editId);
    //将当前行的id传给分类目录中的编辑id   即给分类目录中编辑添加自定义属性
    $('#edit-btn').attr('edit-id',editId);
    //获取编辑内容这一行的值  赋值给分类目录
    var name= currentRow.children().eq(1).text();
    // alert(name);
    var slug= currentRow.children().eq(2).text();
    var classname= currentRow.children().eq(3).text();
    $('#name').val(name);
    $('#classname').val(slug);
    $('#slug').val(classname);
    //隐藏增加按钮  显示编辑和取消编辑按钮
    $('#btn').hide();
    $('#edit-btn').show();
    $('#cancel-btn').show();
})


// 给分类编辑添加点击事件
$('#edit-btn').click(function(){
    //获取id   
    var id = $('#edit-btn').attr('edit-id');
    // alert(id);
    var name = $('#name').val();
    var slug = $('#slug').val();
    var classname = $('#classname').val();
    $.ajax({
        type: "post",
        url: "../api/getEditData.php",
        data: {
        "id":id ,
        "name":name,
        "slug":slug,
        "classname":classname
        },
      dataType: "json",
      beforeSend: function() {
if(name.trim()==''||slug.trim()==''||classname.trim()=='') {
    $('.alert').show();
    $('#error').text("数据不完整,请填写完整");
    return false;
}
      },
        dataType: "json",
        success: function (res) {
            // console.log(res);
            if(res.code==1) {
                currentRow.children().eq(1).text(name);
                currentRow.children().eq(2).text(slug);
                currentRow.children().eq(3).text(classname);
                $('#btn').show();
                $('#edit-btn').hide();
                $('#cancel-btn').hide();
                $('#name').val('');
                $('#classname').val('');
                $('#slug').val('');
            } else {
                $('.alert').show();
                $('#error').text(res.msg);
            }
        }
    })
})


//给取消编辑按钮注册点击事件
$('#cancel-btn').click(function(){
    $('#btn').show();
                $('#edit-btn').hide();
                $('#cancel-btn').hide();
                $('#name').val('');
                $('#classname').val('');
                $('#slug').val('');
})



//给动态生成的删除按钮添加点击事件
$('tbody').on('click','#del',function(){
    currentRow = $(this).parent().parent();
    var delId = currentRow.attr('edit-id');
    $.ajax({
        type: "post",
        url: "../api/delCatData.php",
        data: {"id":delId},
        dataType: "json",
        success: function (res) {
            if(res.code==1) {
                currentRow.remove();
            } else {
                $('.alert').show();
                $('#error').text(res.msg);
            }
        }
    });
})



//全选
$('#allCheck').click(function(){
    var allChecked = $('#allCheck').prop('checked');
    $('tbody :checkbox').prop('checked',allChecked);
})
//是否全选
$('tbody').on('click',':checkbox',function(){
    var length1 = $('tbody :checkbox:checked').length;
    var length2 = $('tbody :checkbox').length;
    if (length1==length2) {
        $('#allCheck').prop('checked',true);
    } else {
        $('#allCheck').prop('checked',false);
    }
    if (length1>=2) {
        $('#delBtn').show();
    } else {
        $('#delBtn').hide();
    }
})



//给批量删除按钮添加点击事件
$('#delBtn').click(function(){
    var that = $(this);
     //定义一个空数组  去接收循环所得的id
     var arr =[];
    //获取选中状态的id  需要循环得到
    $('tbody :checkbox:checked').each(function(index,value){
        var id = $(value).parent().parent().attr('edit-id');
        arr.push(id);
    })
    var ids = arr.join(',');
$.ajax({
    type: "post",
    url: "../api/delAllCatData.php",
    data: {"ids":ids},
    dataType: "json",
    success: function (res) {
        // console.log(res);
        if (res.code==1) {
            $('tbody :checkbox:checked').parent().parent().remove();
            that.hide();
        }else {
            $('.alert').show();
                $('#error').text(res.msg);
        }
    }
 })
})


</script>
</html>