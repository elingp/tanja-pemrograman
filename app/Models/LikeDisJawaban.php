<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikeDisJawaban extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'likedisjawaban';

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
        'user_id', 'jawaban_id', 'value'
    ];
}
