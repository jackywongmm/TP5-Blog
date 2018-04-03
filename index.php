<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
//header("Access-Control-Allow-Origin: http://192.168.2.224:8082");
//header("Access-Control-Allow-Credentials: true");
//header("Access-Control-Allow-Headers", "Content-Type,Access-Token");

$origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : '';
$allow_origin = array(
    "http://192.168.2.224:8082",
    "http://192.168.2.196:8082",
    "http://192.168.2.111:8080",
);
if(in_array($origin, $allow_origin)){
    header('Access-Control-Allow-Origin:'.$origin);
//header('Access-Control-Allow-Origin:http://192.168.2.224:8082');
    header('Access-Control-Allow-Methods:POST,GET,DELETE');
    header("Access-Control-Allow-Credentials: true");
    header('Access-Control-Allow-Headers:x-requested-with,content-type');
}
if(strtoupper($_SERVER['REQUEST_METHOD'])== 'OPTIONS'){
    exit;
}
set_time_limit(0);
// [ 应用入口文件 ]

// 定义应用目录
define('APP_PATH', __DIR__ . '/application/');
// 加载框架引导文件
require __DIR__ . '/thinkphp/start.php';


