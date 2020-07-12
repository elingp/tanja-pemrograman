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
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'pertanyaan_id' => ['required', 'integer'],
            'penjawab_id' => ['required', 'integer'],
            'isi' => ['required', 'min:30', 'max:65535'],
        ]);
        Jawaban::create([
            'isi' => $request->isi,
            'penjawab_id' => $request->penjawab_id,
            'pertanyaan_id' => $request->pertanyaan_id,
        ]);
        toast('Jawaban berhasil dikirim!', 'success');

        return back();
    }
}
