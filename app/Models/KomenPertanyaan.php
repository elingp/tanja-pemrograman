<?php

namespace App;

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
        'isi', 'pengomentar_id', 'pertanyaan_id'
    ];
}
