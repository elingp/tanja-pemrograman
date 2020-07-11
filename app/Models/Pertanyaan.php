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
    protected $fillable = [
        'judul', 'isi', 'tag', 'slug', 'penanya_id',
    ];

    /**
     * Get the user that owns the pertanyaan.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'penanya_id');
    }

    /**
     * Get the jawaban for the pertanyaan.
     */
    public function jawaban()
    {
        return $this->hasMany('App\Models\Jawaban');
    }

    /**
     * Get the comments for the pertanyaan.
     */
    public function comments()
    {
        return $this->hasMany('App\Models\KomenPertanyaan');
    }

    /**
     * Get the like and dislikes for the pertanyaan.
     */
    public function likedislikes()
    {
        return $this->hasMany('App\Models\LikeDisPertanyaan');
    }

}

