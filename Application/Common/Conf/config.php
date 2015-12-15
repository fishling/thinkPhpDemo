<?php
return array(
	//'配置项'=>'配置值'
    //禁止模块访问
    //'MODULE_DENY_LIST'=>array('Common','Runtime'),

    //允许模块访问
    //'MODULE_ALLOW_LIST'=>array('Home','Admin'),

    //默认加载模块
    //'DEFAULT_MODULE'=>'Admin',

    //只允许一个模块
    //'MULTI_MODULE'=>false,

    //设置分隔符
    //'URL_PATHINFO_DEPR'=>'_',

    //修改键的名称
    //'VAR_MODULE'=>'mm',
    //'VAR_CONTROLLER'=>'cc',
    //'VAR_ACTION'=>'aa',

    //mysql全局定义
    /*
    'DB_TYPE'=>'mysql',
    'DB_HOST'=>'localhost',
    'DB_USER'=>'root',
    'DB_PWD'=>'',
    'DB_NAME'=>'thinktest',
    'DB_PORT'=>'3306',
    'DB_PREFIX'=>'think_',*/

    //pdo全局定义
    //3.2.3版本，由于全部采用PDO方式，所以DB_TYPE需要配置为实际的数据库类型，不再支持设置为PDO
    'DB_TYPE'=>'mysql',
    'DB_USER'=>'root',
    'DB_PWD'=>'',
    'DB_PREFIX'=>'think_',
    'DB_DSN'=>'mysql:host=localhost;dbname=thinktest;charset=UTF8',

    //页面调试工具
    'SHOW_PAGE_TRACE'=>true,
);