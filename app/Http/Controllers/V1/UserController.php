<?php
/**
 * Created by PhpStorm.
 * User: shengj
 * Date: 2017/11/28
 * Time: 17:33
 */

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Webpatser\Uuid\Uuid;

class UserController extends Controller
{
    /**
     * 注册
     *
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $data = [
            'email' => 'required',
            'name' => 'required',
            'password' => 'required',
        ];
        $validator = $this->checkValidator($request->input(), $data);
        if(!empty($validator)){
            return $validator;
        }


        $email = $request->get('email');
        $password = $request->get('password');

        $attributes = [
            'email' => $email,
            'uuid' => Uuid::generate()->string,
            'name' => $request->get('name'),
            'password' => app('hash')->make(md5($password)),
        ];

        $user = User::query()->create($attributes);

//        // 让user默认返回token数据
//        $token = Auth::fromUser($user);

        return $this->response->array(['results'=> $user]);

    }

    /**
     * 登录
     *
     * @param Request $request
     * @return mixed
     */
    public function login(Request $request)
    {
        $data = [
            'email' => 'required',
            'password' => 'required',
        ];
        $validator = $this->checkValidator($request->input(), $data);
        if(!empty($validator)){
            return $validator;
        }

        $email = $request->get('email');
        $password = $request->get('password');

        $attributes = [
            'email' => $email,
            'password' => $password,
        ];
        $token = Auth::attempt($attributes);

        return $this->response->array(['results'=> $token]);

    }

    /**
     * 展示
     *
     * @return mixed
     */
    public function show()
    {
        return $this->response->array(['results'=> $this->user()]);
    }

}