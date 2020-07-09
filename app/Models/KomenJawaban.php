<?php

namespace App;

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
        'isi', 'pengomentar_id', 'jawaban_id'
    ];
}
