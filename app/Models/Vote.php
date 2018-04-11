<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
