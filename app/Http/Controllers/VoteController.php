<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Handlers\ImageUploadHandler;
use App\Models\Vote;
use App\Models\Candidate;
use Carbon\Carbon;
use Cookie;

class VoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show', 'addScore']]);
    }

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
     * 加载创建投票的编辑界面
     * @method index
     * @return [type] [description]
     */
    public function addThing()
    {
        return view('createVote');
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
        $vote->created_at = Carbon::now();
        $vote->updated_at = Carbon::now()->addMinutes($request->inputEndTime);
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
                $candidate->c_id = $vote->id.$num;
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

    public function endVote(Request $request)
    {
        $vote = Vote::where('id', $request->vId)->first();
        $vote->status = 0;
        $vote->save();
        return redirect()->route('index');
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
        //如果没有缓存的话，将候选数据填入缓存中。投票持续时间为缓存的生命时长
        \Cache::flush();
        if (!\Cache::has('vote')) {
            $voteInfo->candidateRedis($vId);
        }
        return view('show', compact('voteInfo'));
        // return $voteInfo;
    }

    /**
     * 游客投票界面界面，游客投票信息展示界面
     * @method show
     * @param  Vote   $vote [description]
     * @return [type]       [description]
     */
    public function showToOther($vId)
    {
        $voteInfo = Vote::where('id', $vId)->with('candidate')->first();
        //如果没有缓存的话，将候选数据填入缓存中。投票持续时间为缓存的生命时长
        \Cache::flush();
        if (!\Cache::has('vote')) {
            $voteInfo->candidateRedis($vId);
        }
        return view('mobel', compact('voteInfo'));
        // return $voteInfo;
    }

    /**
     * 游客投票动作
     * @method addScore
     * @param  [type]   $cId [description]
     */
    public function addScore($cId, Request $request)
    {
        // dd(Cookie::get('userInfo'));
        // if (empty(Cookie::get('userInfo'))) {
        //     if (\Cache::has('vote')) {
        //         $cId = (string)$cId;
        //         \Cache::increment($cId);
        //         $userInfo = array('cid' => $cId, 'uuid' => $request->check);
        //         Cookie::queue('userInfo', $userInfo, 10);
        //     } else {
        $candidate = Candidate::where('c_id', $cId)->first();
        $candidate->increment('c_score', 1);
        //     }
        // }
        // return Session('danger', '只能投1次');
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
