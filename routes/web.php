<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return "基本路由";
}
);

//必选参数
Route::get('/testp/{id}', function ($id) {
    return "基本路由" . $id;
}
);

//可选参数
Route::get('/testop/{id?}', function ($id = 0) {
    return "基本路由?" . $id;
}
);

// 正则约束
Route::get('/testrule/{id}', function ($id) {
    return "正则?" . $id;
})->where('id', '\d+');

// 多参数
Route::get('/testrule/{name}/{age}', function ($name, $age) {
    return "多参数" . $name . $age;
})->where(['name' => '\w+', 'age' => '\d+']);

// 路由的控制器方法
Route::get('/test/fn', 'TestController@lst');
Route::get('/user/lst', 'Test\UserController@lst');

// 中间件测试
Route::get('/login', function () {
    session(['uid' => '100']);
    return "这里是login登录页面";
});
//访问setting会交给中间件进行处理
//处理成功会进行执行回调函数
//处理失败
Route::get('/setting', function () {
    return "这里是middleware的login登录页面处理成功的uid" . session('uid');
})->middleware('login');
