<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KomenPertanyaan extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'komenpertanyaan';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'isi', 'pengomentar_id', 'pertanyaan_id',
    ];

    /**
     * Get the pertanyaan that owns the comment.
     */
    public function pertanyaan()
    {
        return $this->belongsTo('App\Models\Pertanyaan');
    }

    /**
     * Get the user that owns the comment.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'pengomentar_id');
    }
}
