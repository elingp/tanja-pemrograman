<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the jawaban for the user.
     */
    public function jawaban()
    {
        return $this->hasMany('App\Models\Jawaban', 'penjawab_id');
    }

    /**
     * Get the comments jawaban for the user.
     */
    public function commentsJawaban()
    {
        return $this->hasMany('App\Models\KomenJawaban', 'pengomentar_id');
    }

    /**
     * Get the comments pertanyaan for the user.
     */
    public function commentsPertanyaan()
    {
        return $this->hasMany('App\Models\KomenPertanyaan', 'pengomentar_id');
    }

    /**
     * Get the like and dislikes jawaban for the user.
     */
    public function likedislikesJawaban()
    {
        return $this->hasMany('App\Models\LikeDisJawaban');
    }

    /**
     * Get the like and dislikes pertanyaan for the user.
     */
    public function likedislikesPertanyaan()
    {
        return $this->hasMany('App\Models\LikeDisPertanyaan');
    }

    /**
     * Get the pertanyaan for the user.
     */
    public function pertanyaan()
    {
        return $this->hasMany('App\Models\Pertanyaan', 'penanya_id');
    }

    /**
     * Get the profile associated with the user.
     */
    public function profile()
    {
        return $this->hasOne('App\Models\Profile');
    }
}
