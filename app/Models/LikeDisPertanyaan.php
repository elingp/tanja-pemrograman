<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikeDisPertanyaan extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'likedispertanyaan';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'pertanyaan_id', 'value'
    ];
}
