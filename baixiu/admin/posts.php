<?php
require_once "../common/isset_session.php";
?>




<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <title>Posts &laquo; Admin</title>
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
                <h1>所有文章</h1>
                <a href="post-add.php" class="btn btn-primary btn-xs">写文章</a>
            </div>
            <!-- 有错误信息时展示 -->
            <!-- <div class="alert alert-danger">
        <strong>错误！</strong>发生XXX错误
      </div> -->
            <div class="page-action">
                <!-- show when multiple checked -->
                <a class="btn btn-danger btn-sm" href="javascript:;" style="display: none">批量删除</a>
                <form class="form-inline">
                    <select id="category" class="form-control input-sm">
            <option value="all">所有分类</option>
            
          </select>
                    <select id="status" class="form-control input-sm">
            <option value="all">所有状态</option>
            <option value="drafted">草稿</option>
            <option value="published">已发布</option>
          </select>
                    <input type="button" id="filter" value="筛选" class="btn btn-default btn-sm">
                </form>
                <ul class="pagination pagination-sm pull-right">
                  
                </ul>
            </div>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="text-center" width="40"><input type="checkbox"></th>
                        <th>标题</th>
                        <th>作者</th>
                        <th>分类</th>
                        <th class="text-center">发表时间</th>
                        <th class="text-center">状态</th>
                        <th class="text-center" width="100">操作</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <tr>
                        <td class="text-center"><input type="checkbox"></td>
                        <td>随便一个名称</td>
                        <td>小小</td>
                        <td>潮科技</td>
                        <td class="text-center">2016/10/07</td>
                        <td class="text-center">已发布</td>
                        <td class="text-center">
                            <a href="javascript:;" class="btn btn-default btn-xs">编辑</a>
                            <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
                        </td>
                    </tr> -->
                    <!-- <tr>
                        <td class="text-center"><input type="checkbox"></td>
                        <td>随便一个名称</td>
                        <td>小小</td>
                        <td>潮科技</td>
                        <td class="text-center">2016/10/07</td>
                        <td class="text-center">已发布</td>
                        <td class="text-center">
                            <a href="javascript:;" class="btn btn-default btn-xs">编辑</a>
                            <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><input type="checkbox"></td>
                        <td>随便一个名称</td>
                        <td>小小</td>
                        <td>潮科技</td>
                        <td class="text-center">2016/10/07</td>
                        <td class="text-center">已发布</td>
                        <td class="text-center">
                            <a href="javascript:;" class="btn btn-default btn-xs">编辑</a>
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
            <li class="active">
                <a href="#menu-posts" data-toggle="collapse">
                    <i class="fa fa-thumb-tack"></i>文章<i class="fa fa-angle-right"></i>
                </a>
                <ul id="menu-posts" class="collapse in">
                    <li class="active"><a href="posts.php">所有文章</a></li>
                    <li><a href="post-add.php">写文章</a></li>
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

    <script src="../static/assets/vendors/jquery/jquery.js"></script>
    <script src="../static/assets/vendors/bootstrap/js/bootstrap.js"></script>
    <script src="../static/assets/vendors/art-template/template-web.js"></script>


    <script>
        NProgress.done()
    </script>
</body>
<script type="text/template" id="postTml">
{{each data}}
                    <tr>
                        <td class="text-center"><input type="checkbox"></td>
                        <td>{{$value.title}}</td>
                        <td>{{$value.nickname}}</td>
                        <td>{{$value.name}}</td>
                        <td class="text-center">{{$value.created}}</td>
                        <td class="text-center">
                        {{ if ($value.status=="drafted") }}
                                草稿
                           {{else if ($value.status=="published") }} 
                                已发布
                            {{else if($value.status=="trashed") }}
                                已作废
                        {{/if}} 
                            
                        </td>
                        <td class="text-center">
                            <a href="javascript:;" class="btn btn-default btn-xs">编辑</a>
                            <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
                        </td>
                    </tr>

{{/each}}
</script>


<script type="text/template" id="paginationTpl">

    <li {{if ((currentPage-1) <1)}} style="display:none" {{/if}} pageId="{{currentPage-1}}"><a href="#">上一页</a></li>
    <li {{if ((currentPage-2) <1)}} style="display:none" {{/if}} pageId="{{currentPage-2}}"><a href="#">{{currentPage-2}}</a></li>
    <li {{if ((currentPage-1) <1)}} style="display:none" {{/if}} pageId="{{currentPage-1}}"><a href="#">{{currentPage-1}}</a></li>
    <li class="active"> <a href="#">{{currentPage}}</a></li>
    <li {{if ((currentPage+1)>maxPage)}} style="display:none" {{/if}} pageId="{{currentPage+1}}"> <a href="#">{{currentPage+1}}</a></li>
    <li {{if ((currentPage+2)>maxPage)}} style="display:none" {{/if}} pageId="{{currentPage+2}}"> <a href="#">{{currentPage+2}}</a></li>
    <li {{if ((currentPage+1)>maxPage)}} style="display:none" {{/if}} pageId="{{currentPage+1}}"> <a href="#">下一页</a></li>


</script>


<script>
//定义当前页
var currentPage = 1;
//定义每页文章的篇数
var pageSize = 20;
//定义一个最大的分页页数
var maxPage = 0;
//定义所有分类的值
var category = "all";
//定义所有状态的值
var status = "all";
function getData(currentPage,pageSize,category,status) {
    $.ajax({
    type: "post",
    url: "../api/getPostData.php",
    data: {
        "currentPage":currentPage,
        "pageSize":pageSize,
        "category":category,
        " status": status
        },
    dataType: "json",
    success: function (res) {
        // console.log(res);
        if (res.code==1) {
            var html = template("postTml",res);
            $('tbody').html(html);
             maxPage = Math.ceil(res.count/pageSize);
            var paginationHtml = template("paginationTpl",{"currentPage":currentPage,"maxPage":maxPage});
            $('.pagination').html(paginationHtml)
        }
    }
})
}

getData(currentPage,pageSize,category,status) ;
//给分页上的分页按钮注册点击事件

$('.pagination').on("click","li",function(){

//获取当前点击的自定义属性id  这个id与将要显示的页数相等
   currentPage = parseInt($(this).attr('pageId'));
//   alert(currentPage);
getData(currentPage,pageSize,category,status) ;
})



//所有文章分类动态生成
$.ajax({
    type: "post",
    url: "../api/getCategory.php",
    dataType: "json",
    success: function (res) {
        if(res.code==1) {
            var html = '';
            res.data.forEach(function(value,index){
                html +=     '<option value="'+value.id+'">'+value.name+'</option>';
            })
                $('#category').append(html);
        }
    }
})


//给筛选按钮注册点击事件
$('#filter').click(function(){
    //获取所有分类的值
     category = $('#category').val();
   // 获取所有状态的值
     status = $('#status').val();
   //再次调用函数  因为ajax请求一致
   getData(currentPage,pageSize,category,status) ;

    
})

</script>
</html>