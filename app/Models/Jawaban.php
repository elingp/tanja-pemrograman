<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'jawaban';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'isi', 'penanya_id', 'pertanyaan_id'
    ];
}
