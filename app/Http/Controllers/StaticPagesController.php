<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vote;
use App\Models\Candidate;

class StaticPagesController extends Controller
{
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
     * 登录后的首页
     * @method show
     * @return [type] [description]
     */
    public function show()
    {
        $votes = Vote::Orderby('created_at', 'desc')->get();
        return view('index', compact('votes'));
    }
}
