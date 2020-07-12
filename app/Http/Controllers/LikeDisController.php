<?php

namespace App\Http\Controllers;

use App\Models\LikeDisJawaban;
use App\Models\LikeDisPertanyaan;
use Illuminate\Http\Request;

class LikeDisController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeTanya(Request $request)
    {
        $request->validate([
            'user_id' => ['required', 'integer'],
            'pertanyaan_id' => ['required', 'integer'],
            'value' => ['required', 'integer'],
        ]);
        // Check to see if there is an existing vote
        $vote = LikeDisPertanyaan::where('pertanyaan_id', $request->pertanyaan_id)->where('user_id', $request->user_id)->first();
        if (!$vote)
        {
            // First time the user is voting
           LikeDisPertanyaan::create([
               'pertanyaan_id' => $request->pertanyaan_id,
               'user_id' => $request->user_id,
               'value' => $request->value,
            ]);
        } else {
            $vote->value == $request->value ? $vote->delete() : $vote->update(['value' => $request->value]);
        }
        // AJAX JSON RESPONSE
        return response()->json([
            'status' => 'success',
            'msg' => 'Vote berhasil dilakukan.'
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeJawab(Request $request)
    {
        $request->validate([
            'user_id' => ['required', 'integer'],
            'jawaban_id' => ['required', 'integer'],
            'value' => ['required', 'integer'],
        ]);
        // Check to see if there is an existing vote
        $vote = LikeDisJawaban::where('jawaban_id', $request->jawaban_id)->where('user_id', $request->user_id)->first();
        if (!$vote)
        {
            // First time the user is voting
            LikeDisJawaban::create([
               'jawaban_id' => $request->jawaban_id,
               'user_id' => $request->user_id,
               'value' => $request->value,
            ]);
        } else {
            $vote->value == $request->value ? $vote->delete() : $vote->update(['value' => $request->value]);
        }
        // AJAX JSON RESPONSE
        return response()->json([
            'status' => 'success',
            'msg' => 'Vote berhasil dilakukan.'
        ]);
    }

    public function isLogged()
    {
        return response()->json(array('status' => auth()->check()));
    }
}
