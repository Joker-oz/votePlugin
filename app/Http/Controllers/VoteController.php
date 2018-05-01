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
        $this->middleware('auth', ['except' => [ 'addScore','showToOther']]);
    }

    /**
     * 加载创建投票的编辑界面
     * @method index
     * @return [type] [description]
     */
    public function index()
    {
        $voteInfos = Vote::Orderby('created_at', 'desc')->take(10)->select(['id','title'])->get();
        return view('createVote', compact('voteInfos'));
    }

    // /**
    //  * 加载创建投票的编辑界面
    //  * @method index
    //  * @return [type] [description]
    //  */
    // public function addThing()
    // {
    //     $voteInfos = Vote::all()->select(['id','title'])->get();
    //     return view('createVote', compact('voteInfos'));
    // }

    /**
     * 储存投票中的信息
     * @method store
     * @param  Request $request [description]
     * @return [Json]           [投票中的基本信息]
     */
    public function store(Request $request, ImageUploadHandler $uploader)
    {
        $vote = new Vote();
        $vote->fill($request->all());
        $vote->save();
        $vote->qr_link = $vote->showQR($vote->id);
        $vote->created_at = Carbon::now();
        $vote->updated_at = Carbon::now()->addMinutes($request->inputEndTime);
        $vote->save();
        $num = 1;
        while (true) {
            $string = 'file'.$num;

            if (isset($request->$string)) {
                // dd($request->all());

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
            // dd($candidate);
            } else {
                break;
            }
        }
        // dd($request);

        return redirect()->route('vote.show', $vote->id);
    }

    public function endVote(Request $request)
    {
        $vote = Vote::where('id', $request->vId)->first();
        $vote->status = 0;
        $vote->save();
        return redirect()->route('vote.show', $vote->id);
    }

    /**
     * 直播界面，游客投票信息展示界面
     * @method show
     * @param  Vote   $vote [description]
     * @return [type]       [description]
     */
    public function show($vId)
    {
        $meg = Vote::where('id', $vId)->with('candidate')->first();
        //如果没有缓存的话，将候选数据填入缓存中。投票持续时间为缓存的生命时长
        // \Cache::flush();
        // if (!\Cache::has('vote')) {
        //     $voteInfo->candidateRedis($vId);
        // }
        $data1 = [];
        $data2 = [];
        foreach ($meg->candidate as $key => $value) {
            $data1[$key] = $value->c_name;
            $data2[$key] = $value->c_score;
        }
        $voteInfo = [];
        $voteInfo['0'] = $data1;
        $voteInfo['1'] = $data2;
        $voteInfo['label'] = $meg['title'];
        $voteInfo['id'] = $meg['id'];
        $voteInfo['endTime'] = $meg['updated_at'];
        $voteInfo['qr_link'] = $meg['qr_link'];
        $voteInfo['status'] = $meg['status'];
        return view('showing', compact('voteInfo'));
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

        return view('voteInterface', compact('voteInfo'));
        // return $voteInfo;
    }

    /**
     * 游客投票动作
     * @method addScore
     * @param  [type]   $cId [description]
     */
    public function addScore(Request $request)
    {
        // dd(Cookie::get('userInfo'));
        $message = Cookie::get('userInfo');
        // dd($message);
        if (empty($message) && strcmp($request->c_id, $message['cid']) != 0) {
            $userInfo = array('cid' => $request->c_id, 'uuid' => $request->c_id);
            Cookie::queue('userInfo', $userInfo, 5);
            $candidate = Candidate::where('c_id', $request->c_id)->first();
            $nowTime = date('Y-m-d H:i:s');
            $vote = $candidate->vote()->first();
            if ($nowTime > $vote->updated_at) {
                $vote->status = 0;
                $vote->update();
                return Session('danger', '投票已经结束');
            }
            $candidate->increment('c_score', 1);
            return Session('success', '投票成功');
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
        $candidate['0']->nowTime = date('Y-m-d H:i:s');
        $candidate['0']->status = $vote->status;
        // dd($candidate);
        return $candidate;
    }
}
