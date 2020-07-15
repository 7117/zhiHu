<?php

namespace App\Http\Controllers\ORM;

use App\UserModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function lst()
    {

        $data = UserModel::all();
        dd($data);

        return view('orm.lst', ['data' => $data]);
    }

    public function add(Request $request)
    {
        if ($request->isMethod('get')) {
            $user = UserModel::create(['name' => '1111', 'age' => '2222222']);
            $user->save();
            return redirect('/orm/lst');
        } elseif ($request->isMethod('post')) {
            return view('orm.add');
        }
    }

    public function edit(Request $request, $id)
    {
        if($request->isMethod('get')){
            $info = UserModel::find($id);
            return view('orm.edit',['info'=>$info]);
        }elseif ($request->isMethod('post')){

        }
    }

    public function del($id)
    {
        $user = UserModel::find($id);
        $user->delete();

        return redirect('/orm/lst');
    }
}
