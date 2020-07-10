<?php

namespace App\Models;

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

    /**
     * Get the pertanyaan that owns the like or dislike.
     */
    public function pertanyaan()
    {
        return $this->belongsTo('App\Models\Pertanyaan');
    }

    /**
     * Get the user that owns the like or dislike.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
