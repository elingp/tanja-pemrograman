<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
        'isi', 'penjawab_id', 'pertanyaan_id',
    ];

    /**
     * Get the user that owns the jawaban.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'penjawab_id');
    }

    /**
     * Get the pertanyaan that owns the jawaban.
     */
    public function pertanyaan()
    {
        return $this->belongsTo('App\Models\Pertanyaan');
    }

    /**
     * Get the comments for the jawaban.
     */
    public function comments()
    {
        return $this->hasMany('App\Models\KomenJawaban');
    }

    /**
     * Get the like and dislikes for the jawaban.
     */
    public function likedislikes()
    {
        return $this->hasMany('App\Models\LikeDisJawaban');
    }

    public static function insert($data)
    {
        $new_data = DB::table('jawaban')
            ->insert([
                'isi' => $data['isi'],
                'penjawab_id' => $data['penjawab_id'],
                'pertanyaan_id' => $data['pertanyaan_id'],
                'created_at' => now(),
            ]);

        return $new_data;
    }
}
