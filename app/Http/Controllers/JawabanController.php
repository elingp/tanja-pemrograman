<?php

namespace App\Http\Controllers;

use App\Models\Jawaban;
use Illuminate\Http\Request;

class JawabanController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* bingung */
        // dd($request);
        // $request->validate([
        //     'penanya_id' => ['required', 'integer'],
        //     'isi' => ['required', 'max:65535']
        // ]);
        // Jawaban::create([
        //     'isi' => $request->isi,
        //     'penjawab_id' => $request->penjawab_id,
        //     'pertanyaan_id' => $request->pertanyaan_id
        // ]);
         /* bingung jadi pake cara biasa*/
        $new_data = Jawaban::insert($request->all());
        return redirect('/pertanyaan/'. $request->pertanyaan_id.'/'. $request->slug);
    }
}
