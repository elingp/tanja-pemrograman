<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PertanyaanModel extends Model
{
    protected $table = 'pertanyaan';
    public $timestamps = true;
//
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'penanya_id');
    }

    // public function tag()

}

