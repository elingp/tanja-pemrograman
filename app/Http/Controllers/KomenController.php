<?php

namespace App\Http\Controllers;

use App\Models\KomenPertanyaan;
use App\Models\KomenJawaban;
use Illuminate\Http\Request;


class KomenController extends Controller
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
            'pengomentar_id' => ['required', 'integer'],
            'isi' => ['required', 'min:30', 'max:65535'],
        ]);
        KomenPertanyaan::create([
            'isi' => $request->isi,
            'pengomentar_id' => $request->pengomentar_id,
            'pertanyaan_id' => $request->pertanyaan_id,
        ]);
        toast('Komentar berhasil dikirim!', 'success');
        return back();
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
            'pengomentar_id' => ['required', 'integer'],
            'isi' => ['required', 'min:30', 'max:65535'],
        ]);
        KomenJawaban::create([
            'isi' => $request->isi,
            'pengomentar_id' => $request->pengomentar_id,
            'jawaban_id' => $request->jawaban_id,
        ]);
        toast('Komentar berhasil dikirim!', 'success');
        return back();
    }
}
