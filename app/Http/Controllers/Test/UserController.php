<?php

namespace App\Http\Controllers\Test;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function lst()
    {
        $data = [
            ['name' => 'xiaoming', 'age' => 20],
            ['name' => 'xiaohei', 'age' => 22],
            ['name' => 'xheihei', 'age' => 23],
        ];
        return view('User.lst', ['dddd' => 'name', 'data' => $data]);
    }

    //依赖注入   给add方法注入一个request的对象
    public function add(Request $request)
    {
        // dd($request->all());
        // dd($request->input('name'));

        if ($request->isMethod('get')){
            return view('lst');
        }elseif($request->isMethod('post')){
        //    数据处理
            return "post";
        }

    }
}
