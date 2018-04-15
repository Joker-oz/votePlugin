<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $table = 'v_candidate';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'c_id', 'c_name', 'c_score', 'c_img'
    ];

    protected $hidden = [
     'v_id'
    ];
    public $timestamps = false;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */


    public function vote()
    {
        return $this->belongsTo('App\Models\Vote', 'v_id', 'id');
    }
}
