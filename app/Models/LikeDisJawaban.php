<?php

namespace App\Models;

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

    /**
     * Get the jawaban that owns the like or dislike.
     */
    public function jawaban()
    {
        return $this->belongsTo('App\Models\Jawaban');
    }

    /**
     * Get the user that owns the like or dislike.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
