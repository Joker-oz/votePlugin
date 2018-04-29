<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use QrCode;
use Carbon\Carbon;

class Vote extends Model
{
    protected $table = 'v_info';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'title','object', 'status', 'qr_link', 'created_at', 'updated_at','body'
  ];
    public $timestamps = false;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public function candidate()
    {
        return $this->hasMany('App\Models\Candidate', 'v_id', 'id');
    }

    public function showQR($vid)
    {
        $adrress = '/pictures/'.str_random(10).'.png';
        $qr = QrCode::format('png')
            ->size(600)
            ->margin(1)
            ->encoding('UTF-8')
            ->errorCorrection("H")
            ->generate(config('app.url').'/vote/'.$vid.'/show', public_path().$adrress);

        return $adrress;
    }

    /**
     * 缓存当前投票候选人的分数
     * @method candidateRedis
     * @param  [type]         $v_id [description]
     * @return boolean              [description]
     */
    public function candidateRedis($v_id)
    {
        $vote = Vote::where('id', $v_id)->with('candidate')->first();
        $minute=floor((strtotime($vote->updated_at)-strtotime($vote->created_at))%86400/60);
        \Cache::add('vote', 'woring', $minute);
        foreach ($vote->candidate as $key => $value) {
            $key = (string)$value->c_id;
            $score = (string)$value->c_score;
            \Cache::add($key, $score, $minute);
        }
    }
}
