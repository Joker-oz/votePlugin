<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use QrCode;

class Vote extends Model
{
    protected $table = 'v_info';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'title','object', 'status', 'qr_link', 'created_at', 'updated_at'
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
            ->merge(public_path().'/pictures/demo.jpg', .3, true)
            ->encoding('UTF-8')
            ->errorCorrection("H")
            ->generate(config('app.url').'/vote/'.$vid.'/showing', public_path().$adrress);

        return $adrress;
    }
}
