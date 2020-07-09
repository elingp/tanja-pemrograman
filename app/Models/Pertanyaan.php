<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    protected $table = 'pertanyaan';

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'penanya_id');
    }

    // public function tag()

}

