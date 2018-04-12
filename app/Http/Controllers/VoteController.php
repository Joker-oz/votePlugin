<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Handlers\ImageUploadHandler;
use App\Models\Vote;
use App\Models\Candidate;
use Cookie;

class VoteController extends Controller
{
    /**
     * 加载创建投票的编辑界面
     * @method index
     * @return [type] [description]
     */
    public function index()
    {
        return view('create_vote');
    }

    /**
     * 储存投票中的信息
     * @method store
     * @param  Request $request [description]
     * @return [Json]           [投票中的基本信息]
     */
    public function store(Request $request, ImageUploadHandler $uploader)
    {
        // dd($request->all());
        $vote = new Vote();
        $vote->fill($request->all());
        $vote->save();
        $vote->qr_link = $vote->showQR($vote->id);
        $vote->save();
        $num = 0;
        while (true) {
            $string = 'file'.$num;
            if (isset($request->$string)) {
                $candidate = new Candidate();
                $result = $uploader->save($request->$string, 'images', $vote->id);
                if ($result) {
                    $candidate->c_img = $result['path'];
                }
                $cname = 'c_name'.$num;
                $candidate->c_name = $request->$cname;
                $candidate->c_id = $vote->id.'_'.$num;
                $candidate->v_id =  $vote->id;
                $candidate->save();
                $num++;
            } else {
                break;
            }
        }

        $voteInfo = $vote->where('id', $vote->id)->with('candidate')->first();
        return view('show', compact('voteInfo'));
    }

    /**
     * 直播界面，游客投票信息展示界面
     * @method show
     * @param  Vote   $vote [description]
     * @return [type]       [description]
     */
    public function show($vId)
    {
        $voteInfo = Vote::where('id', $vId)->with('candidate')->first();

        return view('show', compact('voteInfo'));
    }

    /**
     * 游客投票动作
     * @method addScore
     * @param  [type]   $cId [description]
     */
    public function addScore($cId, Request $request)
    {
        // dd(Cookie::get('userInfo'));
        if (empty(Cookie::get('userInfo'))) {
            $userInfo = array('cid' => $cId, 'uuid' => $request->check);
            Cookie::queue('userInfo', $userInfo, 10);
            $candidate = Candidate::where('c_id', $cId)->first();
            $candidate->increment('c_score', 1);
            return  $candidate;
        }
        return Session('danger', '只能投1次');
    }

    /**
     * 无限发送数据
     * @method sendScore
     * @param  [type]    $vId [description]
     * @return [type]         [description]
     */
    public function sendScore($vId)
    {
        $vote = Vote::where('id', $vId)->with('candidate')->first();
        $candidate = $vote->candidate;
        return $candidate;
    }
}
