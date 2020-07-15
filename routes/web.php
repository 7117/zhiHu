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

// use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route;


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

//
// Route::get('/user/add', 'Test\UserController@add');
// Route::post('/user/add', 'Test\UserController@add');

Route::match(['get', 'post'], '/user/add', 'Test\UserController@add');

//设置响应
Route::get('/response', function () {
    return response('hello world', 200)->header('content-type', 'text/html;charset-utf-8');
});

// 设置cookie
Route::get('/response/cookie', function () {
    echo "success";
    return response('')->withCookie('name', 'xiaoming', 10);
});

Route::get('/cookie', function () {
    dd(Cookie::get('name'));
});

//ajax  json
Route::get('/ajax', function () {
    return view('ajax');
});
Route::get('/response/ajax', function () {
    return response()->json(['name' => 'xiao', 'age' => '222']);
});

Route::get('/db/insert', function () {
    $rs = DB::insert("insert into it_user values (null,'xiaoming','111111')");
    dd($rs);
});

Route::get('/db/select', function () {
    $rs = DB::select("select * from it_user");
    dd($rs);
});

Route::get('/db/update', function () {
    $rs = DB::update("update it_user set name='xiaomeiaa' where id=1 ");
    dd($rs);
});

Route::get('/db/selectp', function () {
    $rs = DB::select("select * from it_user where id=:id", ['id' => 2]);
    dd($rs);
});


Route::get('/db/delete', function () {
    $rs = DB::delete("delete from it_user where id=:id", ['id' => 2]);
    dd($rs);
});

Route::get('/db/get', function () {
    $rs = DB::table('user')->get();
    dd($rs);
});

Route::get('/db/get', function () {
    $rs = DB::table('user')->pluck('id');
    dd($rs);
});

Route::get('/db/get', function () {
    $rs = DB::table('user')->where('id', '=', 1)->get();
    dd($rs);
});

Route::get('/db/insert', function () {
    $rs = DB::table('user')->insert(['name' => 'www', 'password' => '222']);
    dd($rs);
});

Route::get('/db/delete', function () {
    $rs = DB::table('user')->where('id', '>', '3')->delete();
    dd($rs);
});

//列表的路由
Route::get('/orm/lst', 'ORM\UserController@lst');
// 添加的路由
Route::match(['get', 'post'], '/orm/add', 'ORM\UserController@add');
// 修改的路由
Route::match(['get', 'post'], '/orm/edit/{id}', 'ORM\UserController@edit');
//删除的路由
Route::get('/orm/del/{id}', 'ORM\UserController@del')->where('id', '\d+');