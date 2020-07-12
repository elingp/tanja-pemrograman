<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KomenJawaban extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'komenjawaban';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'isi', 'pengomentar_id', 'jawaban_id',
    ];

    /**
     * Get the jawaban that owns the comment.
     */
    public function jawaban()
    {
        return $this->belongsTo('App\Models\Jawaban');
    }

    /**
     * Get the user that owns the comment.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'pengomentar_id');
    }
}
