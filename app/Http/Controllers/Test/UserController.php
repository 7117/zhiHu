<?php

namespace App\Http\Controllers\Test;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function lst()
    {
        $data = [
            ['name'=>'xiaoming','age'=>20],
            ['name'=>'xiaohei','age'=>22],
            ['name'=>'xheihei','age'=>23],
        ];
        return view('User.lst',['dddd'=>'name','data'=>$data]);
    }
}
