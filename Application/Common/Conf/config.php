<?php
return array(
    //'配置项'=>'配置值'

    'APP_DEBUG' => true,
    'URL_MODEL' => 0,
    'URL_CASE_INSENSITIVE' => true,

    /* 数据库设置 */
    'DB_TYPE' => 'mysql',        // 数据库类型
    'DB_HOST' => '10.1.0.10',    // 服务器地址
    'DB_NAME' => 'mt',      // 数据库名
    'DB_USER' => 'root',        // 用户名
    'DB_PWD' => 'root',        // 密码
    'DB_PORT' => '3306',        // 端口
    'DB_PREFIX' => 'mt_',        // 数据库表前缀
    'DB_DEBUG' => true,            // 数据库调试模式 开启后可以记录SQL日志
    'SHOW_PAGE_TRACE' => true,        // 显示页面Trace信息

    'TMPL_ACTION_SUCCESS' => 'Public:dispatch_jump',        //自定义success跳转页面
    'TMPL_ACTION_ERROR' => 'Public:dispatch_jump',        //自定义error跳转页面

);