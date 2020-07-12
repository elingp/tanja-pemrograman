<?php

namespace App\Http\Controllers;

use App\Models\LikeDisJawaban;
use App\Models\LikeDisPertanyaan;
use App\Models\Pertanyaan;
use App\Models\Jawaban;
use App\Models\User;
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
            'pertanyaan_id' => ['required', 'integer'],
            'value' => ['required', 'integer'],
        ]);
        // Check whether it's a downvote and the user is eligible
        if ($request->user()->profile->reputation < 15 && $request->value == -1) {
            toast('Reputasi user belum mencapai 15!', 'error');
            return response()->json([
                'status' => 'error',
                'msg' => 'Reputasi user belum mencapai 15.'
            ]);
        }
        // Check to see if there is an existing vote
        $vote = LikeDisPertanyaan::where('pertanyaan_id', $request->pertanyaan_id)->where('user_id', $request->user()->id)->first();
        if (!$vote)
        {
            // First time the user is voting
           $vote = LikeDisPertanyaan::create([
               'pertanyaan_id' => $request->pertanyaan_id,
               'user_id' => $request->user()->id,
               'value' => $request->value,
            ]);
            $this->changeReputation($vote->pertanyaan->user->id, $request->value, True, False);
        } else {
            $isDeleted = $vote->value == $request->value;
           $isDeleted ? $vote->delete() : $vote->update(['value' => $request->value]);
           $this->changeReputation($vote->pertanyaan->user->id, $request->value, False, $isDeleted);
        }
        // AJAX JSON RESPONSE
        $value = Pertanyaan::find($request->pertanyaan_id)->likedislikes->sum('values');
        return response()->json([
            'status' => 'success',
            'msg' => 'Vote berhasil dilakukan.',
            'vote' => $value
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
            'jawaban_id' => ['required', 'integer'],
            'value' => ['required', 'integer'],
        ]);
        // Check whether it's a downvote and the user is eligible
        if ($request->user()->profile->reputation < 15 && $request->value == -1) {
            toast('Reputasi user belum mencapai 15!', 'error');
            return response()->json([
                'status' => 'error',
                'msg' => 'Reputasi user belum mencapai 15.'
            ]);
        }
        // Check to see if there is an existing vote
        $vote = LikeDisJawaban::where('jawaban_id', $request->jawaban_id)->where('user_id', $request->user()->id)->first();
        if (!$vote)
        {
            // First time the user is voting
            $vote = LikeDisJawaban::create([
               'jawaban_id' => $request->jawaban_id,
               'user_id' => $request->user_id,
               'value' => $request->value,
            ]);
            $this->changeReputation($vote->jawaban->user->id, $request->value, True, False);
        } else {
            $isDeleted = $vote->value == $request->value;
            $isDeleted ? $vote->delete() : $vote->update(['value' => $request->value]);
            $this->changeReputation($vote->jawaban->user->id, $request->value, False, $isDeleted);
        }
        // AJAX JSON RESPONSE
        return response()->json([
            'status' => 'success',
            'msg' => 'Vote berhasil dilakukan.',
            'vote' => $vote->jawaban->user->profile->value
        ]);
    }

    public function isLogged()
    {
        return response()->json(array('status' => auth()->check()));
    }

    public function changeReputation(int $id, int $value, bool $isNew, bool $isDeleted)
    {
        if (!$isNew) {
            switch ($value) {
                case 1:
                    User::find($id)->profile->decrement('reputation', 10);
                    break;
                case -1:
                    User::find($id)->profile->increment('reputation', 1);
                    break;
                default:
            }
        }
        if (!$isDeleted) {
            switch ($value) {
                case 1:
                    User::find($id)->profile->increment('reputation', 10);
                    break;
                case -1:
                    User::find($id)->profile->decrement('reputation', 1);
                    break;
                default:
            }
        }
    }
}
