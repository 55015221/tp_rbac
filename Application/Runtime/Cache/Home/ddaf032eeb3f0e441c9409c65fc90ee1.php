<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <title>系统登录</title>
    <meta charset="UTF-8">
    <meta name="keywords" content="系统登录">
    <meta name="description" content="系统登录">
    <link rel="stylesheet" href="/Public/Css/login.css">
    <!-- jQuery2.0库 -->
    <script type="text/javascript" src="/Public/Js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="/Public/Js/jquery.form.js"></script>
    <!-- validate  -->
    <script type="text/javascript" src="/Public/Js/Validform_v5.3.2_min.js"></script>
    <script type="text/javascript" src="/Public/Js/Validform_Datatype.js"></script>
    <!-- /validate  -->
    <script type="text/javascript">
        document.oncontextmenu=function(){ return false }
        if (window.top != window.self) {
            window.top.location.reload();
        }
    </script>
    <style>
        h2 {
            font-size: 31.5px;
            font-family: 'Microsoft Yahei',"Helvetica Neue", Helvetica, Arial, sans-serif;
        }
        h1, h2, h3, h4, h5, h6 {
            margin: 0px 0;
            font-family: inherit;
            font-weight: bold;
            color: inherit;
            text-rendering: optimizelegibility;
        }

    </style>
</head>
<body>
<div class="up-container clearfix ng-scope" ui-view="">
    <div class="landing-header ng-scope">
        <div class="landing-logo">
            <div class="control-group normal_text">
                <h2 style="color:#B2DFEE;font-size:28px;font-family: 'Microsoft Yahei',"Helvetica Neue", Helvetica, Arial, sans-serif;">AUTH权限通用后台管理系统</h2>
                <span style="font-size:14px;color:#B2DFEE;">版权所有 ? 北京铭扬致远科技有限公司 2015-2018</span>
            </div>
        </div>

    </div>
    <div class="landing-body ng-scope">
        <div class='wh'>
            <form class="form-login" name="auth_form" action="" method='post' onsubmit="return false">
                <div class="alert alert-danger fade ng-binding out">
                </div>
                <div class="form-group">
                    <input type="text" name="username" id="username" class="text_input" datatype="*3-20" placeholder="用户名" tabindex="1" autocomplete='off' nullmsg="请填写管理员账户！">
                    <span class="Validform_checktip "></span>
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="password" class="text_input" datatype="*5-16" placeholder="请输入5-16位密码" tabindex="2" autocomplete='off' nullmsg="请填写密码！">
                    <span class="Validform_checktip "></span>
                </div>
                <div class="form-group clearfix">
                    <button type="submit" id="submit" class="btn btn-normal btn-lg active col-md-5 button" tabindex="4" data-val="登 录">登 录</button>
                </div>
                <p class="lost-pw">
                    <a href="#" translate="" class="ng-scope" style="font-size:13px;">忘记密码？</a>
                </p>
                <hr class="login-hr">
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    //提交表单 //返回的状态是1的时候 成功
    $(function() {
        var demo = $(".form-login").Validform({tiptype:function(msg,o,c){var type=o.type;if(type==3){error(msg,o)}},showAllError:false,ajaxPost:true,callback:function(data){if(data.status==1){$('#submit').attr("disabled",true);success(data,2)}else{error(data.info)}return false}});
        function error(m){$("#submit").text(m).addClass('btn-error disabled');returnInitBtn(2)}function success(data,time){var btn=$("#submit");btn.text(data.info).removeClass('btn-error disabled').addClass('btn-success');setTimeout(function(){if(data.url){location.href=data.url}},time*1000)}function returnInitBtn(time){setTimeout(function(){var btn=$("#submit");if(!btn.hasClass('btn-success')){btn.text(btn.data('val')).removeClass('btn-error disabled')}},time*1000)}
    });
</script>
</body>
</html>