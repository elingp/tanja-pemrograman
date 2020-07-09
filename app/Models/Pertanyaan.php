<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pertanyaan';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['judul', 'isi', 'slug', 'tag', 'penanya_id'];

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'penanya_id');
    }

    // public function tag()

}

