<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
use Hyperf\HttpServer\Router\Router;
use \Hyperf\Tracer\Middleware\TraceMiddleware;

Router::addRoute(['GET', 'POST', 'HEAD'], '/', 'App\Controller\IndexController@index');

Router::get('/favicon.ico', function () {
    return '';
});

#获取列表数据
#Router::post('/planlist',"App\Controller\IndexController@planlist");

#商品分类
Router::addGroup('/category/',function (){
    #列表
    Router::post("index","App\Controller\Category\ProductClassController@index");
    Router::post("list","App\Controller\Category\ProductClassController@list");
    Router::post("test","App\Controller\Category\ProductClassController@test");
    #上传文件
    Router::post("photos","App\Controller\Category\ProductClassController@photos");
    #下载文件
    Router::get("download","App\Controller\Category\ProductClassController@downloads");
    #操作数据 与缓存
    Router::post("editdata","App\Controller\Category\ProductClassController@editdata");
    #获取一列值
    Router::post("pluck","App\Controller\Category\ProductClassController@pluckss");


    #获取单条数据
    Router::post("getone","App\Controller\Category\ProductClassController@getoneinfo");
});


#查询cname数据
Router::addGroup('/cname/',function (){
    #获取单条数据
    Router::post("index","App\Controller\CnameController@index");
    #获取列表数据
    Router::post("list","App\Controller\CnameController@listss");
    #添加数据
    Router::post("add","App\Controller\CnameController@addss");
    #更新数据
    Router::post("save","App\Controller\CnameController@savess");

    #查询明细数据 一对一
    Router::post("one","App\Controller\CnameController@oness");
});

//依赖注入-通过构造方法注入
//https://hyperf.wiki/2.1/#/zh-cn/di?id=%e9%80%9a%e8%bf%87%e6%9e%84%e9%80%a0%e6%96%b9%e6%b3%95%e6%b3%a8%e5%85%a5
Router::addGroup('/prone/',function () {
    Router::post("test", "App\Controller\ProductOneController@getinfotest");
});

//依赖注入-通过 @Inject 注解注入
//https://hyperf.wiki/2.1/#/zh-cn/di?id=%e9%80%9a%e8%bf%87-inject-%e6%b3%a8%e8%a7%a3%e6%b3%a8%e5%85%a5
Router::addGroup('/prtwo/',function () {
    Router::post("test", "App\Controller\ProductTwoController@getinfotest");
    Router::post("two", "App\Controller\ProductTwoController@testtwo");
});

//依赖注入-抽象对象注入
//https://hyperf.wiki/2.1/#/zh-cn/di?id=%e6%8a%bd%e8%b1%a1%e5%af%b9%e8%b1%a1%e6%b3%a8%e5%85%a5
Router::addGroup('/user/',function () {
    Router::post("getinfo", "App\Controller\UserController@getInfo");
    Router::post("getall", "App\Controller\UserController@getInfolist");
});