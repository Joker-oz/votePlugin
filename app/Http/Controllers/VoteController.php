<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Handlers\ImageUploadHandler;
use App\Models\Vote;
use App\Models\Candidate;

class VoteController extends Controller
{
    /**
     * 加载创建投票的编辑界面
     * @method index
     * @return [type] [description]
     */
    public function index()
    {
        return view('');
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
        return view('', compact('voteInfo'));
    }

    /**
     * 直播界面，单个投票信息展示界面
     * @method show
     * @param  Vote   $vote [description]
     * @return [type]       [description]
     */
    public function show(Vote $vote)
    {
    }
}
