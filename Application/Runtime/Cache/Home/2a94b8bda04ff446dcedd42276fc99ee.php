<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <title>权限系统</title>
    <meta charset="UTF-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!-- intoHead  -->
    <link rel="stylesheet" type="text/css" href="/Public/Css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Css/console1412.css"/>
    <!-- 全局公共样式 -->
    <link rel="stylesheet" type="text/css" href="/Public/Css/global.css"/>
    <!-- jQuery2.0库 -->
    <!-- <script type="text/javascript" src="/Public/Js/jquery-2.1.1.min.js"></script> -->
    <script type="text/javascript" src="/Public/Js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="/Public/Js/jquery.form.js"></script>
    <!-- LayerUi库 -->
    <script type="text/javascript" src="/Public/Resources/LayerUI/layer.js"></script>
    <script type="text/javascript" src="/Public/Resources/LayerUI/laypage/laypage.js"></script>
    <script type="text/javascript" src="/Public/Js/jquery.confirm.js"></script>
    <!-- 后台JS -->
    <script type="text/javascript" src="/Public/Js/index.js"></script>
    <script type="text/javascript" src="/Public/Js/layerUi.js"></script>
    <script type="text/javascript" src="/Public/Js/global.js"></script>
    <script type="text/javascript">
        document.oncontextmenu = function () {
            return false
        }
    </script>
    <script>
        $(function () {
            var h = $('.viewFramework-sidebar', parent.document).height();
            $('.home-container').css('height', h - 30);
        });
    </script>
    <!-- /intoHead  -->
</head>
<body class="iframe-body" data-setTime="598" data-actionUrl="Admin/Index/index">
<!-- header  -->
<div class="viewFramework-topbar ng-scope">
    <!-- topbar -->
    <div class="aliyun-console-topbar ng-isolate-scope">
        <div class="topbar-wrap topbar-clearfix">
            <div class="topbar-head topbar-left">
                <a href="<?php echo U('Index/index');?>" target="_blank" class="topbar-logo topbar-left">
                    <span class="icon-logo1"></span>
                </a>
                <a href="<?php echo U('Index/index');?>" target="_self" class="topbar-home-link topbar-btn topbar-left">
                    <span class="ng-binding">管理控制台</span>
                </a>
            </div>
            <div class="topbar-info topbar-right topbar-clearfix">
                <div class="topbar-left topbar-help topbar-info-item ng-scope" ng-if="navLinks.help.show">
                    <div class="dropdown"><a href="javascript:;" class="dropdown-toggle topbar-btn"><span
                            class="ng-binding" id="help">等待添加</span><!-- ngIf: navLinks.help.showNew --><span
                            class="icon-arrow-down"></span></a>
                        <ul class="dropdown-menu">
                            <!-- ngRepeat: link in navLinks.help.links -->
                            <li class="topbar-info-btn ng-scope">
                                <a href="#" target="_blank"><span class="ng-binding">等待添加</span><!-- ngIf: link.showNew --></a>
                            </li>
                            <!-- end ngRepeat: link in navLinks.help.links -->
                        </ul>
                    </div>
                </div>
                <!-- user -->
                <!-- ngIf: navLinks.user.show -->
                <div class="topbar-left ng-scope">
                    <div id='loginOut' class="dropdown topbar-info-item">
                        <a href="javascript:;" class="dropdown-toggle topbar-btn">
                            <span class="ng-binding"><?php echo ($__USER__["username"]); ?></span>
                            <span class="icon-arrow-down"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- ngRepeat: link in navLinks.user.links -->
                            <li class="topbar-info-btn ng-scope">
                                <a href="<?php echo U('Public/logout');?>" target="_self"><span
                                        class="ng-binding">退出</span></a>
                            </li>
                            <!-- end ngRepeat: link in navLinks.user.links -->
                        </ul>
                    </div>
                </div>
                <!-- end ngIf: navLinks.user.show -->
            </div>
        </div>
    </div>
    <!-- /topbar -->
</div>
<!-- /header  -->

<div id='sidebar-left' class="viewFramework-body viewFramework-sidebar-full">
    <div class="viewFramework-sidebar">
        <!-- sidebar -->
        <div id="sidebar" product-id="account" class="sidebar-content">
            <!-- ngIf: !loadingState -->
            <div class="sidebar-inner ng-scope">
                <!-- ngIf: versionGreaterThan1_3_21 -->
                <div id='sidebar-icon' class="sidebar-fold ng-scope icon-unfold"></div>
                <!-- end ngIf: versionGreaterThan1_3_21 -->
                <!--
                <div class="sidebar-nav main-nav">
                    <div class="sidebar-title">
                        <div class="sidebar-title-inner ng-scope"><span
                                class="sidebar-title-icon icon-arrow-down"></span><span
                                class="sidebar-title-text ng-binding">快捷方式菜单</span>
                            <span class="sidebar-manage ng-scope"><a class="icon-setup ng-isolate-scope"></a></span>
                        </div>
                    </div>
                    <ul class="sidebar-trans" style="height:auto;">
                        &lt;!&ndash; ngRepeat: item in productList track by $index &ndash;&gt;
                        <li class="nav-item ng-scope">
                            <a href="/index.php?s=/Index/home.html" class="sidebar-trans ng-scope">
                                <div class="nav-icon sidebar-trans"><span class="icon-wo-sitebuild"></span></div>
                                <span class="nav-title ng-binding">首页&nbsp;</span>
                            </a>
                        </li>
                        &lt;!&ndash; end ngRepeat: item in productList track by $index &ndash;&gt;
                        &lt;!&ndash; ngRepeat: item in productList track by $index &ndash;&gt;
                        &lt;!&ndash; <li class="nav-item ng-scope">
                            <a href="/index.php?s=/Access/roleList.html" class="sidebar-trans ng-scope">
                                <div class="nav-icon sidebar-trans"><span class="icon-rds"></span></div><span class="nav-title ng-binding">角色管理&nbsp;</span>
                            </a>
                        </li> &ndash;&gt;
                        &lt;!&ndash; end ngRepeat: item in productList track by $index &ndash;&gt;
                    </ul>
                </div>
                -->
                <div class="sidebar-nav">
                    <!--
                    <div class="sidebar-title">
                              <div class="sidebar-title-inner ng-scope"><span class="sidebar-title-icon"><span
                                      class="icon-arrow-down"></span></span><span
                                      class="sidebar-title-text ng-binding">用户中心</span>
                          <span class="sidebar-manage ng-scope">
                              <a class="icon-setup ng-isolate-scope" title="自定义用户中心快捷入口"></a>
                              </span>
                              </div>
                          </div>
                          -->
                    <ul class="entrance-nav sidebar-trans" id="nav" style="height:auto;">
                        <!-- <li class="nav-item ng-scope active">
                            <a href="#" class="ng-scope">
                                <div class="nav-icon"><span class="icon-account-2"></span></div><span class="nav-title ng-binding">全局</span>
                            </a>
                        </li> -->
                        <?php if(is_array($nav)): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="nav-item ng-scope">
                                <a href="javascript:;" data-submenu="<?php echo ($vo["id"]); ?>" data-count="5" data-url="<?php echo ($vo["url"]); ?>"
                                   class="ng-scope">
                                    <div class="nav-icon"><span class="<?php echo ($vo["class"]); ?>"></span></div>
                                    <span class="nav-title ng-binding"><?php echo ($vo["label"]); ?></span>
                                </a>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /sidebar -->
    </div>

    <div id='sidebal-middle' class="viewFramework-product">
    <!-- <div class="viewFramework-product-navbar-bg"></div> -->
    <!-- ngIf: config.productNavBar != 'disabled' -->
    <div class="viewFramework-product-navbar ng-scope hidden">
        <!-- product nav -->
        <div class="product-nav-stage ng-scope product-nav-stage-main">
            <div class="product-nav-scene product-nav-main-scene">
                <div class="product-nav-title ng-binding">账号管理</div>
                <!-- 自定义内容插入点，比如商标、logo -->
                <div customized-content="" class="ng-isolate-scope"></div>
                <div class="product-nav-list" id="product-nav-list">
                    <?php if(is_array($subnav)): $i = 0; $__LIST__ = $subnav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><ul class="submenu-<?php echo ($key); ?> hidden" data-submenu="<?php echo ($key); ?>">
                            <?php if(is_array($subnav[$key])): $i = 0; $__LIST__ = $subnav[$key];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                                    <div class="ng-isolate-scope">
                                        <a href="<?php echo ($vo["url"]); ?>" data-url="<?php echo ($vo["url"]); ?>" class="ng-scope">
                                            <div class="nav-icon"></div>
                                            <div class="nav-title ng-binding"><?php echo ($vo["label"]); ?></div>
                                        </a>
                                    </div>
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
            <div class="product-nav-scene product-nav-sub-scene">
                <div class="product-nav-title">
                    <!-- ngIf: config.backNav -->
                </div>
                <div class="product-nav-list">
                    <ul>
                        <!-- ngRepeat: item in config.subNav -->
                    </ul>
                </div>
            </div>
        </div>
        <!-- /product nav -->
    </div>
    <!-- end ngIf: config.productNavBar != 'disabled' -->
    <!-- product nav collapse-->
    <!-- ngIf: config.productNavBar != 'disabled' -->
    <div class="viewFramework-product-navbar-collapse ng-scope hidden">
        <div class="product-navbar-collapse-inner">
            <div class="product-navbar-collapse-bg"></div>
            <div id='icon-left' class="product-navbar-collapse">
                <span class="icon-collapse-left"></span>
                <span class="icon-collapse-right"></span>
            </div>
        </div>
    </div>
    <!-- end ngIf: config.productNavBar != 'disabled' -->
    <!-- /product nav collapse-->
    <div class="viewFramework-product-body" id="mainFrameBody">
        <!-- product body -->
            
    <ul>
        <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                <a href="<?php echo U($vo['path'],true,false,true);?>"><?php echo U($vo['path'],true,false,true);?></a><?php echo ($vo['allow']?'(true)':''); ?>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>

        <!-- /product body -->
    </div>
</div>
</div>
</body>
</html>