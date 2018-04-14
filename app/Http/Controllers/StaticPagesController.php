<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vote;
use App\Models\Candidate;
use Auth;

use Cache;
use App\Http\Requests\LoginRequest;

class StaticPagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'login']]);
    }
    /**
     * 管理员登录界面
     * @method index
     * @return [type] [description]
     */
    public function index()
    {
        return view('login');
    }

    /**
     * 登录验证
     * @method login
     * @param  LoginRequest $request [description]
     * @return [type]                [description]
     */
    public function login(LoginRequest $request)
    {
        $credentials = [
        'uuid' => $request->account,
        'password'=> $request->password,
        ];
        if (!Auth::attempt($credentials)) {
            return Session('danger', '账号或者密码错误');
        }

        return redirect()->route('index');
    }

    /**
     * 登录后的首页
     * @method show
     * @return [type] [description]
     */
    public function show()
    {
        $votes = Vote::Orderby('created_at', 'desc')->paginate(10);
        return view('index', compact('votes'));
    }

    //退出登陆
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
